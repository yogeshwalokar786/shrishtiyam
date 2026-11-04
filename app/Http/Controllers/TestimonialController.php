<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class TestimonialController extends Controller
{
    /**
     * Display a listing of testimonials.
     */
    public function index(Request $request)
    {
        $search = trim($request->get('search', ''));
        $status = $request->get('status', 'all');

        $query = Testimonial::query();

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('author_name', 'like', "%{$search}%")
                  ->orWhere('author_title', 'like', "%{$search}%")
                  ->orWhere('company', 'like', "%{$search}%")
                  ->orWhere('badge', 'like', "%{$search}%")
                  ->orWhere('quote', 'like', "%{$search}%");
            });
        }

        if ($status === 'active') {
            $query->where('is_active', true);
        } elseif ($status === 'inactive') {
            $query->where('is_active', false);
        }

        $testimonials = $query->orderBy('sort_order', 'asc')
            ->orderBy('id', 'asc')
            ->paginate(15)
            ->withQueryString();

        $stats = [
            'total' => Testimonial::count(),
            'active' => Testimonial::where('is_active', true)->count(),
            'inactive' => Testimonial::where('is_active', false)->count(),
            'avg_rating' => round(Testimonial::avg('rating') ?: 5, 1),
        ];

        return view('admin.testimonials.index', compact('testimonials', 'stats', 'search', 'status'));
    }

    /**
     * Show the form for creating a new testimonial.
     */
    public function create()
    {
        // Suggest next sort order
        $nextOrder = (Testimonial::max('sort_order') ?? 0) + 1;

        return view('admin.testimonials.create', compact('nextOrder'));
    }

    /**
     * Store a newly created testimonial in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'author_name' => ['required', 'string', 'max:255'],
            'author_title' => ['nullable', 'string', 'max:255'],
            'company' => ['nullable', 'string', 'max:255'],
            'rating' => ['required', 'integer', 'min:1', 'max:5'],
            'badge' => ['nullable', 'string', 'max:120'],
            'quote' => ['required', 'string'],
            'sort_order' => ['nullable', 'integer'],
            'is_active' => ['nullable', 'boolean'],
            'author_avatar' => ['nullable', 'string', 'max:500'],
            'avatar_file' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:5120'],
        ]);

        $avatarPath = $validated['author_avatar'] ?? null;

        // Handle uploaded avatar image file
        if ($request->hasFile('avatar_file')) {
            $file = $request->file('avatar_file');
            $uploadDir = public_path('uploads/testimonials');
            if (!File::isDirectory($uploadDir)) {
                File::makeDirectory($uploadDir, 0755, true, true);
            }

            $fileName = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            $file->move($uploadDir, $fileName);
            $avatarPath = '/uploads/testimonials/' . $fileName;
        }

        $testimonial = Testimonial::create([
            'author_name' => $validated['author_name'],
            'author_title' => $validated['author_title'] ?? null,
            'company' => $validated['company'] ?? null,
            'rating' => $validated['rating'],
            'badge' => $validated['badge'] ?? null,
            'quote' => $validated['quote'],
            'author_avatar' => $avatarPath,
            'sort_order' => $validated['sort_order'] ?? 0,
            'is_active' => $request->boolean('is_active', true),
        ]);

        return redirect()->route('admin.testimonials.index')
            ->with('success', "Testimonial from '{$testimonial->author_name}' added successfully.");
    }

    /**
     * Show the form for editing the specified testimonial.
     */
    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    /**
     * Update the specified testimonial in storage.
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $validated = $request->validate([
            'author_name' => ['required', 'string', 'max:255'],
            'author_title' => ['nullable', 'string', 'max:255'],
            'company' => ['nullable', 'string', 'max:255'],
            'rating' => ['required', 'integer', 'min:1', 'max:5'],
            'badge' => ['nullable', 'string', 'max:120'],
            'quote' => ['required', 'string'],
            'sort_order' => ['nullable', 'integer'],
            'is_active' => ['nullable', 'boolean'],
            'author_avatar' => ['nullable', 'string', 'max:500'],
            'avatar_file' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:5120'],
        ]);

        $avatarPath = $testimonial->author_avatar;

        if ($request->has('remove_avatar') && $request->boolean('remove_avatar')) {
            $avatarPath = null;
        }

        // Direct manual or media manager selection
        if ($request->filled('author_avatar')) {
            $avatarPath = $request->input('author_avatar');
        }

        // Handle uploaded avatar image file
        if ($request->hasFile('avatar_file')) {
            $file = $request->file('avatar_file');
            $uploadDir = public_path('uploads/testimonials');
            if (!File::isDirectory($uploadDir)) {
                File::makeDirectory($uploadDir, 0755, true, true);
            }

            $fileName = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            $file->move($uploadDir, $fileName);
            $avatarPath = '/uploads/testimonials/' . $fileName;
        }

        $testimonial->update([
            'author_name' => $validated['author_name'],
            'author_title' => $validated['author_title'] ?? null,
            'company' => $validated['company'] ?? null,
            'rating' => $validated['rating'],
            'badge' => $validated['badge'] ?? null,
            'quote' => $validated['quote'],
            'author_avatar' => $avatarPath,
            'sort_order' => $validated['sort_order'] ?? 0,
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()->route('admin.testimonials.index')
            ->with('success', "Testimonial from '{$testimonial->author_name}' updated successfully.");
    }

    /**
     * Remove the specified testimonial from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        $name = $testimonial->author_name;
        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')
            ->with('success', "Testimonial from '{$name}' deleted successfully.");
    }

    /**
     * Toggle the active status of a testimonial.
     */
    public function toggleStatus(Testimonial $testimonial)
    {
        $testimonial->is_active = !$testimonial->is_active;
        $testimonial->save();

        $statusText = $testimonial->is_active ? 'activated' : 'deactivated';
        return redirect()->back()
            ->with('success', "Testimonial from '{$testimonial->author_name}' {$statusText}.");
    }
}
