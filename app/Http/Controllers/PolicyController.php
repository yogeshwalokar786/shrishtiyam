<?php

namespace App\Http\Controllers;

use App\Models\Policy;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PolicyController extends Controller
{
    /**
     * Display a listing of all policy pages.
     */
    public function index(Request $request)
    {
        $search = trim($request->get('search', ''));

        $query = Policy::query();

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('slug', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }

        $policies = $query->orderBy('sort_order', 'asc')
            ->orderBy('updated_at', 'desc')
            ->paginate(15)
            ->withQueryString();

        $stats = [
            'total' => Policy::count(),
            'published' => Policy::where('is_published', true)->count(),
            'drafts' => Policy::where('is_published', false)->count(),
        ];

        return view('admin.policies.index', compact('policies', 'stats', 'search'));
    }

    /**
     * Show the form for creating a new policy page.
     */
    public function create()
    {
        return view('admin.policies.create');
    }

    /**
     * Store a newly created policy page in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:policies,slug'],
            'content' => ['required', 'string'],
            'meta_description' => ['nullable', 'string', 'max:255'],
            'is_published' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer'],
        ]);

        $slug = !empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($validated['title']);

        // Ensure unique slug
        $baseSlug = $slug;
        $counter = 1;
        while (Policy::where('slug', $slug)->exists()) {
            $slug = "{$baseSlug}-{$counter}";
            $counter++;
        }

        $policy = Policy::create([
            'title' => $validated['title'],
            'slug' => $slug,
            'content' => $validated['content'],
            'meta_description' => $validated['meta_description'] ?? null,
            'is_published' => $request->boolean('is_published', true),
            'sort_order' => $validated['sort_order'] ?? 0,
        ]);

        return redirect()->route('admin.policies.index')
            ->with('success', "Policy '{$policy->title}' created successfully.");
    }

    /**
     * Show the form for editing an existing policy page.
     */
    public function edit(Policy $policy)
    {
        return view('admin.policies.edit', compact('policy'));
    }

    /**
     * Update the specified policy page in storage.
     */
    public function update(Request $request, Policy $policy)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', Rule::unique('policies')->ignore($policy->id)],
            'content' => ['required', 'string'],
            'meta_description' => ['nullable', 'string', 'max:255'],
            'is_published' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer'],
        ]);

        $policy->update([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['slug']),
            'content' => $validated['content'],
            'meta_description' => $validated['meta_description'] ?? null,
            'is_published' => $request->boolean('is_published'),
            'sort_order' => $validated['sort_order'] ?? 0,
        ]);

        return redirect()->route('admin.policies.index')
            ->with('success', "Policy '{$policy->title}' updated successfully.");
    }

    /**
     * Remove the specified policy page from storage.
     */
    public function destroy(Policy $policy)
    {
        $title = $policy->title;
        $policy->delete();

        return redirect()->route('admin.policies.index')
            ->with('success', "Policy '{$title}' deleted successfully.");
    }
}
