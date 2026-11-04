<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class BlogController extends Controller
{
    /**
     * Display a listing of blog posts.
     */
    public function index(Request $request)
    {
        $search = trim($request->get('search', ''));
        $categoryId = $request->get('category_id', '');
        $status = $request->get('status', 'all');

        $query = Blog::with('category');

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('slug', 'like', "%{$search}%")
                  ->orWhere('author_name', 'like', "%{$search}%")
                  ->orWhere('excerpt', 'like', "%{$search}%");
            });
        }

        if (!empty($categoryId) && is_numeric($categoryId)) {
            $query->where('category_id', $categoryId);
        }

        if ($status === 'published') {
            $query->where('is_published', true);
        } elseif ($status === 'draft') {
            $query->where('is_published', false);
        } elseif ($status === 'featured') {
            $query->where('is_featured', true);
        }

        $blogs = $query->orderBy('is_featured', 'desc')
            ->orderBy('published_at', 'desc')
            ->orderBy('id', 'desc')
            ->paginate(12)
            ->withQueryString();

        $categories = BlogCategory::active()->get();

        $stats = [
            'total' => Blog::count(),
            'published' => Blog::where('is_published', true)->count(),
            'drafts' => Blog::where('is_published', false)->count(),
            'featured' => Blog::where('is_featured', true)->count(),
        ];

        return view('admin.blogs.index', compact('blogs', 'categories', 'stats', 'search', 'categoryId', 'status'));
    }

    /**
     * Show the form for creating a new blog post.
     */
    public function create()
    {
        $categories = BlogCategory::active()->get();
        return view('admin.blogs.create', compact('categories'));
    }

    /**
     * Store a newly created blog post in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:blogs,slug'],
            'category_id' => ['nullable', 'exists:blog_categories,id'],
            'excerpt' => ['nullable', 'string', 'max:1000'],
            'content' => ['required', 'string'],
            'image_file' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,gif', 'max:5120'],
            'image_url' => ['nullable', 'string', 'max:500'],
            'author_name' => ['nullable', 'string', 'max:100'],
            'author_role' => ['nullable', 'string', 'max:100'],
            'read_time' => ['nullable', 'string', 'max:50'],
            'is_featured' => ['nullable', 'boolean'],
            'is_published' => ['nullable', 'boolean'],
            'published_at' => ['nullable', 'date'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:500'],
        ]);

        $slug = !empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($validated['title']);
        $baseSlug = $slug;
        $counter = 1;
        while (Blog::where('slug', $slug)->exists()) {
            $slug = "{$baseSlug}-{$counter}";
            $counter++;
        }

        $imagePath = $validated['image_url'] ?? null;
        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $originalName = $file->getClientOriginalName();
            $fileName = time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
            $targetDir = storage_path('app/public/media');
            if (!File::isDirectory($targetDir)) {
                File::makeDirectory($targetDir, 0755, true, true);
            }
            $file->move($targetDir, $fileName);
            $imagePath = 'media/' . $fileName;

            // Automatically register uploaded image in common Media Manager library
            Media::create([
                'user_id' => auth()->id(),
                'filename' => $fileName,
                'original_name' => $originalName,
                'mime_type' => $file->getClientMimeType() ?: ('image/' . $file->getClientOriginalExtension()),
                'file_type' => 'image',
                'file_size' => @filesize($targetDir . DIRECTORY_SEPARATOR . $fileName) ?: 0,
                'path' => $imagePath,
            ]);
        }

        $isPublished = $request->boolean('is_published', true);
        $publishedAt = $validated['published_at'] ?? ($isPublished ? now() : null);

        $user = auth()->user();
        $authorName = !empty($validated['author_name']) 
            ? $validated['author_name'] 
            : ($user ? $user->name : 'Admin');
        $authorRole = !empty($validated['author_role']) 
            ? $validated['author_role'] 
            : ($user ? ($user->job_title ?: 'Admin') : 'Admin');

        $readTime = !empty($validated['read_time'])
            ? $validated['read_time']
            : Blog::calculateReadTime($validated['content']);

        $metaTitle = !empty($validated['meta_title']) ? $validated['meta_title'] : $validated['title'];

        $blog = Blog::create([
            'title' => $validated['title'],
            'slug' => $slug,
            'category_id' => $validated['category_id'] ?? null,
            'excerpt' => $validated['excerpt'] ?? null,
            'content' => $validated['content'],
            'image' => $imagePath,
            'author_name' => $authorName,
            'author_role' => $authorRole,
            'read_time' => $readTime,
            'is_featured' => $request->boolean('is_featured', false),
            'is_published' => $isPublished,
            'published_at' => $publishedAt,
            'meta_title' => $metaTitle,
            'meta_description' => $validated['meta_description'] ?? null,
        ]);

        return redirect()->route('admin.blogs.index')
            ->with('success', "Blog article '{$blog->title}' created successfully.");
    }

    /**
     * Show the form for editing the specified blog post.
     */
    public function edit(Blog $blog)
    {
        $categories = BlogCategory::active()->get();
        return view('admin.blogs.edit', compact('blog', 'categories'));
    }

    /**
     * Update the specified blog post in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', Rule::unique('blogs')->ignore($blog->id)],
            'category_id' => ['nullable', 'exists:blog_categories,id'],
            'excerpt' => ['nullable', 'string', 'max:1000'],
            'content' => ['required', 'string'],
            'image_file' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,gif', 'max:5120'],
            'image_url' => ['nullable', 'string', 'max:500'],
            'author_name' => ['nullable', 'string', 'max:100'],
            'author_role' => ['nullable', 'string', 'max:100'],
            'read_time' => ['nullable', 'string', 'max:50'],
            'is_featured' => ['nullable', 'boolean'],
            'is_published' => ['nullable', 'boolean'],
            'published_at' => ['nullable', 'date'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:500'],
        ]);

        $imagePath = $blog->image;
        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $originalName = $file->getClientOriginalName();
            $fileName = time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
            $targetDir = storage_path('app/public/media');
            if (!File::isDirectory($targetDir)) {
                File::makeDirectory($targetDir, 0755, true, true);
            }
            $file->move($targetDir, $fileName);
            $imagePath = 'media/' . $fileName;

            // Automatically register uploaded image in common Media Manager library
            Media::create([
                'user_id' => auth()->id(),
                'filename' => $fileName,
                'original_name' => $originalName,
                'mime_type' => $file->getClientMimeType() ?: ('image/' . $file->getClientOriginalExtension()),
                'file_type' => 'image',
                'file_size' => @filesize($targetDir . DIRECTORY_SEPARATOR . $fileName) ?: 0,
                'path' => $imagePath,
            ]);
        } elseif ($request->has('image_url')) {
            $imagePath = $validated['image_url'];
        }

        $isPublished = $request->boolean('is_published');
        $publishedAt = $validated['published_at'] ?? ($isPublished && !$blog->published_at ? now() : $blog->published_at);

        $user = auth()->user();
        $authorName = !empty($validated['author_name']) 
            ? $validated['author_name'] 
            : ($blog->author_name ?: ($user ? $user->name : 'Admin'));
        $authorRole = !empty($validated['author_role']) 
            ? $validated['author_role'] 
            : ($blog->author_role ?: ($user ? ($user->job_title ?: 'Admin') : 'Admin'));

        $readTime = !empty($validated['read_time'])
            ? $validated['read_time']
            : Blog::calculateReadTime($validated['content']);

        $metaTitle = !empty($validated['meta_title']) ? $validated['meta_title'] : $validated['title'];

        $blog->update([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['slug']),
            'category_id' => $validated['category_id'] ?? null,
            'excerpt' => $validated['excerpt'] ?? null,
            'content' => $validated['content'],
            'image' => $imagePath,
            'author_name' => $authorName,
            'author_role' => $authorRole,
            'read_time' => $readTime,
            'is_featured' => $request->boolean('is_featured', false),
            'is_published' => $isPublished,
            'published_at' => $publishedAt,
            'meta_title' => $metaTitle,
            'meta_description' => $validated['meta_description'] ?? null,
        ]);

        return redirect()->route('admin.blogs.index')
            ->with('success', "Blog article '{$blog->title}' updated successfully.");
    }

    /**
     * Remove the specified blog post from storage.
     */
    public function destroy(Blog $blog)
    {
        $title = $blog->title;

        // Clean up uploaded image file if present
        if ($blog->image && Str::startsWith($blog->image, 'uploads/blogs/') && File::exists(public_path($blog->image))) {
            File::delete(public_path($blog->image));
        }

        $blog->delete();

        return redirect()->route('admin.blogs.index')
            ->with('success', "Blog article '{$title}' deleted successfully.");
    }
}
