<?php

namespace App\Http\Controllers;

use App\Models\JobOpening;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class JobOpeningController extends Controller
{
    /**
     * Display a listing of job openings.
     */
    public function index(Request $request)
    {
        $search = trim($request->get('search', ''));
        $status = $request->get('status', 'all');

        $query = JobOpening::withCount('applications');

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('department', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%")
                  ->orWhere('overview', 'like', "%{$search}%");
            });
        }

        if ($status === 'active') {
            $query->where('is_active', true);
        } elseif ($status === 'inactive') {
            $query->where('is_active', false);
        }

        $jobs = $query->orderBy('sort_order', 'asc')
            ->orderBy('id', 'asc')
            ->paginate(15)
            ->withQueryString();

        $stats = [
            'total' => JobOpening::count(),
            'active' => JobOpening::where('is_active', true)->count(),
            'inactive' => JobOpening::where('is_active', false)->count(),
        ];

        return view('admin.jobs.index', compact('jobs', 'stats', 'search', 'status'));
    }

    /**
     * Show the form for creating a new job opening.
     */
    public function create()
    {
        $nextSortOrder = (JobOpening::max('sort_order') ?? 0) + 1;
        return view('admin.jobs.create', compact('nextSortOrder'));
    }

    /**
     * Store a newly created job opening in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:job_openings,slug',
            'department' => 'nullable|string|max:150',
            'location' => 'required|string|max:150',
            'employment_type' => 'required|string|max:100',
            'experience' => 'nullable|string|max:100',
            'overview' => 'required|string|max:1000',
            'description' => 'nullable|string',
            'icon_type' => 'nullable|string|in:shield,flame,truck,leaf,briefcase,settings,users,globe',
            'badge_text' => 'nullable|string|max:50',
            'is_active' => 'nullable|boolean',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        $validated['is_active'] = $request->has('is_active');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;
        $validated['icon_type'] = $validated['icon_type'] ?? 'briefcase';

        $job = JobOpening::create($validated);

        return redirect()->route('admin.jobs.index')
            ->with('success', "Job opening '{$job->title}' has been successfully created.");
    }

    /**
     * Show the form for editing the specified job opening.
     */
    public function edit($id)
    {
        $job = JobOpening::findOrFail($id);
        return view('admin.jobs.edit', compact('job'));
    }

    /**
     * Update the specified job opening in storage.
     */
    public function update(Request $request, $id)
    {
        $job = JobOpening::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('job_openings', 'slug')->ignore($job->id)],
            'department' => 'nullable|string|max:150',
            'location' => 'required|string|max:150',
            'employment_type' => 'required|string|max:100',
            'experience' => 'nullable|string|max:100',
            'overview' => 'required|string|max:1000',
            'description' => 'nullable|string',
            'icon_type' => 'nullable|string|in:shield,flame,truck,leaf,briefcase,settings,users,globe',
            'badge_text' => 'nullable|string|max:50',
            'is_active' => 'nullable|boolean',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        $validated['is_active'] = $request->has('is_active');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;
        $validated['icon_type'] = $validated['icon_type'] ?? 'briefcase';

        $job->update($validated);

        return redirect()->route('admin.jobs.index')
            ->with('success', "Job opening '{$job->title}' has been updated successfully.");
    }

    /**
     * Toggle the active status of the specified job opening.
     */
    public function toggleStatus($id)
    {
        $job = JobOpening::findOrFail($id);
        $job->is_active = !$job->is_active;
        $job->save();

        $statusLabel = $job->is_active ? 'activated' : 'deactivated';

        if (request()->expectsJson()) {
            return response()->json([
                'success' => true,
                'is_active' => $job->is_active,
                'message' => "Job '{$job->title}' has been {$statusLabel}.",
            ]);
        }

        return redirect()->back()
            ->with('success', "Job '{$job->title}' has been {$statusLabel}.");
    }

    /**
     * Remove the specified job opening from storage.
     */
    public function destroy($id)
    {
        $job = JobOpening::findOrFail($id);
        $title = $job->title;
        $job->delete();

        return redirect()->route('admin.jobs.index')
            ->with('success', "Job opening '{$title}' has been deleted.");
    }
}
