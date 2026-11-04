<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MediaController extends Controller
{
    /**
     * Display a listing of the media files.
     */
    public function index(Request $request)
    {
        // Auto-populate system assets into media library if library is currently empty
        if (Media::count() === 0) {
            (new \Database\Seeders\MediaSeeder())->run();
        }

        $query = Media::with('user')->orderBy('created_at', 'desc');

        // Filter by media category
        $selectedType = $request->query('type', 'all');
        if (in_array($selectedType, ['image', 'video', 'document'])) {
            $query->where('file_type', $selectedType);
        }

        // Search by filename
        $search = $request->query('search');
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('original_name', 'like', "%{$search}%")
                  ->orWhere('filename', 'like', "%{$search}%");
            });
        }

        $mediaItems = $query->paginate(12)->withQueryString();

        // Calculate summary metrics
        $metrics = [
            'total_count' => Media::count(),
            'total_size' => $this->formatBytes(Media::sum('file_size')),
            'images_count' => Media::where('file_type', 'image')->count(),
            'videos_count' => Media::where('file_type', 'video')->count(),
            'documents_count' => Media::where('file_type', 'document')->count(),
        ];

        return view('admin.media.index', compact('mediaItems', 'metrics', 'selectedType', 'search'));
    }

    /**
     * Provide JSON listing of media for the editor picker modal.
     */
    /**
     * Provide JSON listing of media for the editor picker modal.
     * Uses the Media database table as the single source of truth across the full system.
     */
    public function picker(Request $request)
    {
        $search = trim($request->query('search', ''));
        $type = $request->query('type', 'image');

        $query = Media::orderBy('created_at', 'desc');

        if ($type !== 'all') {
            $query->where('file_type', $type);
        }

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('original_name', 'like', "%{$search}%")
                  ->orWhere('filename', 'like', "%{$search}%");
            });
        }

        $items = $query->get()->map(function ($item) {
            return [
                'id' => $item->id,
                'name' => $item->original_name,
                'filename' => $item->filename,
                'url' => $item->url,
                'size' => $item->formatted_size,
                'type' => $item->file_type,
                'created_at' => $item->created_at ? $item->created_at->format('M d, Y') : '',
            ];
        })->values()->toArray();

        return response()->json([
            'success' => true,
            'media' => $items,
            'count' => count($items),
        ]);
    }

    /**
     * Handle fast AJAX image upload from the editor picker modal.
     */
    public function pickerUpload(Request $request)
    {
        $request->validate([
            'file' => ['required', 'file', 'max:51200'],
        ]);

        $file = $request->file('file');
        $originalName = $file->getClientOriginalName();
        $mimeType = $file->getMimeType() ?? 'application/octet-stream';
        $fileSize = $file->getSize();
        $extension = strtolower($file->getClientOriginalExtension());
        $fileType = $this->determineFileType($mimeType, $extension);

        $safeName = Str::slug(pathinfo($originalName, PATHINFO_FILENAME));
        $filename = time() . '_' . Str::random(8) . ($safeName ? '_' . $safeName : '') . '.' . $extension;

        $path = $file->storeAs('media', $filename, 'public');

        $media = Media::create([
            'user_id' => Auth::id(),
            'filename' => $filename,
            'original_name' => $originalName,
            'mime_type' => $mimeType,
            'file_type' => $fileType,
            'file_size' => $fileSize,
            'path' => $path,
        ]);

        return response()->json([
            'success' => true,
            'item' => [
                'id' => $media->id,
                'name' => $media->original_name,
                'filename' => $media->filename,
                'url' => $media->url,
                'size' => $media->formatted_size,
                'type' => $media->file_type,
                'created_at' => $media->created_at ? $media->created_at->format('M d, Y') : '',
            ],
            'message' => 'Image uploaded to Media Library successfully!',
        ]);
    }

    /**
     * Handle upload of one or multiple media files.
     */
    public function upload(Request $request)
    {
        $request->validate([
            'files' => ['required', 'array'],
            'files.*' => [
                'required',
                'file',
                'max:51200', // 50 MB max per file
            ],
        ], [
            'files.required' => 'Please select at least one file to upload.',
            'files.*.max' => 'Each file may not be greater than 50 megabytes.',
        ]);

        $uploadedCount = 0;

        foreach ($request->file('files') as $file) {
            $originalName = $file->getClientOriginalName();
            $mimeType = $file->getMimeType() ?? 'application/octet-stream';
            $fileSize = $file->getSize();
            $extension = strtolower($file->getClientOriginalExtension());

            // Detect category
            $fileType = $this->determineFileType($mimeType, $extension);

            // Generate sanitized unique filename
            $safeName = Str::slug(pathinfo($originalName, PATHINFO_FILENAME));
            $filename = time() . '_' . Str::random(8) . ($safeName ? '_' . $safeName : '') . '.' . $extension;

            // Store in storage/app/public/media
            $path = $file->storeAs('media', $filename, 'public');

            Media::create([
                'user_id' => Auth::id(),
                'filename' => $filename,
                'original_name' => $originalName,
                'mime_type' => $mimeType,
                'file_type' => $fileType,
                'file_size' => $fileSize,
                'path' => $path,
            ]);

            $uploadedCount++;
        }

        $message = $uploadedCount === 1
            ? 'File uploaded successfully!'
            : "{$uploadedCount} files uploaded successfully!";

        return redirect()->route('admin.media.index')->with('success', $message);
    }

    /**
     * Download a media file.
     */
    public function download(Media $medium)
    {
        if (!Storage::disk('public')->exists($medium->path)) {
            if (file_exists(public_path('assets/images/' . $medium->filename))) {
                return response()->download(public_path('assets/images/' . $medium->filename), $medium->original_name);
            }
            return back()->with('error', 'File not found on server storage.');
        }

        return Storage::disk('public')->download($medium->path, $medium->original_name);
    }

    /**
     * Delete a media file permanently from everywhere in the system.
     */
    public function destroy(Request $request, Media $medium)
    {
        $filename = $medium->original_name;
        $systemFilename = $medium->filename;
        $path = $medium->path;

        // 1. Delete from canonical public storage disk
        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }

        // Direct path in storage/app/public/media
        $storageFile = storage_path('app/public/media/' . $systemFilename);
        if (File::exists($storageFile)) {
            File::delete($storageFile);
        }

        // 2. Delete from public/assets/images if file exists there
        $assetFile = public_path('assets/images/' . $systemFilename);
        if (File::exists($assetFile)) {
            File::delete($assetFile);
        }

        if ($filename !== $systemFilename) {
            $origAsset = public_path('assets/images/' . $filename);
            if (File::exists($origAsset)) {
                File::delete($origAsset);
            }
        }

        // 3. Delete from public/storage if exists
        $publicStorageFile = public_path('storage/' . $path);
        if (File::exists($publicStorageFile)) {
            @unlink($publicStorageFile);
        }

        // 4. Clean up any Blog references that used this deleted image
        $blogs = \App\Models\Blog::where('image', $path)
            ->orWhere('image', 'media/' . $systemFilename)
            ->orWhere('image', $systemFilename)
            ->orWhere('image', '/assets/images/' . $systemFilename)
            ->orWhere('image', 'assets/images/' . $systemFilename)
            ->orWhere('image', 'like', "%{$systemFilename}")
            ->get();

        foreach ($blogs as $blog) {
            $blog->image = null;
            $blog->save();
        }

        // 5. Delete record from database
        $mediumId = $medium->id;
        $medium->delete();

        // 6. Return response (JSON for AJAX / Picker modal, redirect for forms)
        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => "File \"{$filename}\" has been permanently deleted from everywhere.",
                'deleted_id' => $mediumId,
            ]);
        }

        return redirect()->route('admin.media.index')
            ->with('success', "File \"{$filename}\" has been permanently deleted from everywhere in the system.");
    }

    /**
     * Helper to classify media file type.
     */
    private function determineFileType(string $mimeType, string $extension): string
    {
        if (str_starts_with($mimeType, 'image/') || in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'svg', 'webp', 'bmp', 'ico'])) {
            return 'image';
        }

        if (str_starts_with($mimeType, 'video/') || in_array($extension, ['mp4', 'webm', 'avi', 'mov', 'mkv', 'wmv', 'flv'])) {
            return 'video';
        }

        return 'document';
    }

    /**
     * Format bytes to readable size string.
     */
    private function formatBytes(int $bytes): string
    {
        if ($bytes >= 1073741824) {
            return number_format($bytes / 1073741824, 2) . ' GB';
        } elseif ($bytes >= 1048576) {
            return number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            return number_format($bytes / 1024, 1) . ' KB';
        } else {
            return $bytes . ' B';
        }
    }
}
