@extends('layouts.admin')

@section('title', 'Careers & Job Openings')
@section('page_title', 'Careers & Job Openings')

@section('content')
<div class="content-header" style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 24px;">
    <div>
        <h1 class="page-title">Careers &amp; Job Openings</h1>
        <p style="color: var(--text-muted); font-size: 0.88rem; margin-top: 4px;">
            Manage the dynamic career positions, departmental requirements, and talent acquisition listings on the website.
        </p>
    </div>
    <div>
        <a href="{{ route('admin.jobs.create') }}" class="btn btn-primary" style="display: inline-flex; align-items: center; gap: 8px; text-decoration: none;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
            <span>Add Job Opening</span>
        </a>
    </div>
</div>

<!-- KPI Metrics Grid -->
<div class="kpi-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(210px, 1fr)); gap: 18px; margin-bottom: 24px;">
    <div class="card" style="padding: 20px; border-left: 4px solid var(--primary);">
        <div style="font-size: 0.82rem; font-weight: 700; color: var(--text-muted); text-transform: uppercase; margin-bottom: 8px;">Total Openings</div>
        <div style="font-size: 1.85rem; font-weight: 800; color: var(--text-main);">{{ $stats['total'] }}</div>
    </div>

    <div class="card" style="padding: 20px; border-left: 4px solid #10b981;">
        <div style="font-size: 0.82rem; font-weight: 700; color: #059669; text-transform: uppercase; margin-bottom: 8px;">Active on Site</div>
        <div style="font-size: 1.85rem; font-weight: 800; color: #059669;">{{ $stats['active'] }}</div>
    </div>

    <div class="card" style="padding: 20px; border-left: 4px solid #f59e0b;">
        <div style="font-size: 0.82rem; font-weight: 700; color: #d97706; text-transform: uppercase; margin-bottom: 8px;">Paused / Hidden</div>
        <div style="font-size: 1.85rem; font-weight: 800; color: #d97706;">{{ $stats['inactive'] }}</div>
    </div>

    <div class="card" style="padding: 20px; border-left: 4px solid #6366f1;">
        <div style="font-size: 0.82rem; font-weight: 700; color: #6366f1; text-transform: uppercase; margin-bottom: 8px;">Candidate Resumes</div>
        <div style="font-size: 1.85rem; font-weight: 800; color: #6366f1;">
            <a href="{{ route('admin.enquiries.index', ['status' => 'all']) }}" style="color: inherit; text-decoration: none;">View in Messages →</a>
        </div>
    </div>
</div>

<!-- Search & Filter Bar -->
<div class="card" style="margin-bottom: 24px; padding: 18px 22px;">
    <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 16px;">
        <form method="GET" action="{{ route('admin.jobs.index') }}" style="display: flex; gap: 8px; width: 100%; max-width: 540px; flex-wrap: wrap;">
            <input type="text" name="search" value="{{ $search }}" placeholder="Search position, department, location, overview..." 
                   class="form-control" style="flex: 1; min-width: 240px; padding: 8px 14px; font-size: 0.88rem;">
            
            <select name="status" class="form-control" style="width: auto; padding: 8px 12px; font-size: 0.88rem;">
                <option value="all" {{ $status === 'all' ? 'selected' : '' }}>All Status</option>
                <option value="active" {{ $status === 'active' ? 'selected' : '' }}>Active Only</option>
                <option value="inactive" {{ $status === 'inactive' ? 'selected' : '' }}>Paused Only</option>
            </select>

            <button type="submit" class="btn btn-secondary" style="padding: 8px 16px; font-size: 0.88rem;">Filter</button>
            @if(!empty($search) || $status !== 'all')
                <a href="{{ route('admin.jobs.index') }}" class="btn btn-secondary" style="padding: 8px 12px;" title="Reset Filters">✕</a>
            @endif
        </form>

        <div>
            <a href="{{ url('/careers') }}" target="_blank" class="btn btn-secondary" style="display: inline-flex; align-items: center; gap: 6px; font-size: 0.86rem; text-decoration: none;">
                <span>View Public Career Page</span>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>
            </a>
        </div>
    </div>
</div>

<!-- Jobs Table -->
<div class="card" style="padding: 0; overflow: hidden;">
    <div style="overflow-x: auto;">
        <table style="width: 100%; border-collapse: collapse; text-align: left; font-size: 0.88rem;">
            <thead>
                <tr style="background: var(--bg-surface-elevated); border-bottom: 1px solid var(--border-medium); color: var(--text-muted); font-size: 0.78rem; text-transform: uppercase; letter-spacing: 0.5px;">
                    <th style="padding: 14px 20px; width: 60px;">Order</th>
                    <th style="padding: 14px 20px;">Position &amp; Department</th>
                    <th style="padding: 14px 20px;">Location &amp; Type</th>
                    <th style="padding: 14px 20px;">Experience</th>
                    <th style="padding: 14px 20px;">Applications</th>
                    <th style="padding: 14px 20px;">Status</th>
                    <th style="padding: 14px 20px; text-align: right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($jobs as $job)
                    <tr style="border-bottom: 1px solid var(--border-subtle); transition: background 0.15s ease;">
                        <td style="padding: 16px 20px; vertical-align: top; font-weight: 700; color: var(--text-muted); font-family: var(--font-mono);">
                            #{{ $job->sort_order }}
                        </td>

                        <td style="padding: 16px 20px; vertical-align: top;">
                            <div style="font-weight: 700; font-size: 0.98rem; color: var(--text-main); margin-bottom: 4px;">
                                {{ $job->title }}
                            </div>
                            <div style="font-size: 0.82rem; color: var(--text-muted); margin-bottom: 6px;">
                                <span style="font-weight: 600; color: var(--primary);">{{ $job->department ?? 'General Department' }}</span>
                            </div>
                            @if($job->overview)
                                <div style="font-size: 0.82rem; color: var(--text-muted); line-height: 1.4; max-width: 360px; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                                    {{ $job->overview }}
                                </div>
                            @endif
                        </td>

                        <td style="padding: 16px 20px; vertical-align: top;">
                            <div style="font-weight: 600; color: var(--text-main); font-size: 0.86rem; margin-bottom: 4px;">
                                📍 {{ $job->location }}
                            </div>
                            <span style="display: inline-block; font-size: 0.74rem; font-weight: 700; padding: 2px 8px; border-radius: 4px; background: rgba(59, 130, 246, 0.1); color: #2563eb;">
                                {{ $job->employment_type }}
                            </span>
                        </td>

                        <td style="padding: 16px 20px; vertical-align: top; font-size: 0.85rem; color: var(--text-main);">
                            {{ $job->experience ?? 'Not specified' }}
                        </td>

                        <td style="padding: 16px 20px; vertical-align: top;">
                            @php $appCount = $job->applications_count ?? 0; @endphp
                            <a href="{{ route('admin.enquiries.index', ['search' => $job->title]) }}" 
                               style="display: inline-flex; align-items: center; gap: 4px; padding: 4px 10px; border-radius: 12px; font-size: 0.8rem; font-weight: 700; text-decoration: none; background: {{ $appCount > 0 ? 'rgba(16, 185, 129, 0.12)' : 'var(--bg-surface-elevated)' }}; color: {{ $appCount > 0 ? '#059669' : 'var(--text-muted)' }};">
                                <span>📄 {{ $appCount }}</span>
                                <span style="font-size: 0.72rem;">Applicants</span>
                            </a>
                        </td>

                        <td style="padding: 16px 20px; vertical-align: top;">
                            <form method="POST" action="{{ route('admin.jobs.toggle-status', $job->id) }}" style="display: inline;">
                                @csrf
                                @method('PATCH')
                                <button type="submit" style="background: none; border: none; padding: 0; cursor: pointer;" title="Click to toggle status">
                                    @if($job->is_active)
                                        <span style="display: inline-flex; align-items: center; gap: 5px; font-size: 0.78rem; font-weight: 700; padding: 4px 10px; border-radius: 12px; background: rgba(16, 185, 129, 0.1); color: #059669; border: 1px solid rgba(16, 185, 129, 0.25);">
                                            <span style="width: 6px; height: 6px; border-radius: 50%; background: #059669;"></span>
                                            Active
                                        </span>
                                    @else
                                        <span style="display: inline-flex; align-items: center; gap: 5px; font-size: 0.78rem; font-weight: 700; padding: 4px 10px; border-radius: 12px; background: rgba(107, 114, 128, 0.1); color: #6b7280; border: 1px solid rgba(107, 114, 128, 0.25);">
                                            <span style="width: 6px; height: 6px; border-radius: 50%; background: #6b7280;"></span>
                                            Paused
                                        </span>
                                    @endif
                                </button>
                            </form>
                        </td>

                        <td style="padding: 16px 20px; vertical-align: top; text-align: right; white-space: nowrap;">
                            <a href="{{ route('admin.jobs.edit', $job->id) }}" class="btn btn-secondary btn-sm" style="padding: 6px 12px; font-size: 0.82rem; text-decoration: none;">
                                Edit
                            </a>

                            <form method="POST" action="{{ route('admin.jobs.destroy', $job->id) }}" style="display: inline-block; margin-left: 6px;" onsubmit="return confirm('Are you sure you want to delete this job opening? Candidates who applied will remain in Messages.');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" style="padding: 6px 10px; font-size: 0.82rem;" title="Delete opening">
                                    ✕
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" style="padding: 48px 20px; text-align: center; color: var(--text-muted);">
                            <div style="font-size: 1.1rem; font-weight: 600; margin-bottom: 6px;">No job openings found</div>
                            <p style="font-size: 0.85rem; margin-bottom: 16px;">Create your first opening to display active recruitment opportunities on the careers page.</p>
                            <a href="{{ route('admin.jobs.create') }}" class="btn btn-primary btn-sm">+ Add Opening</a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($jobs->hasPages())
        <div style="padding: 16px 20px; border-top: 1px solid var(--border-medium);">
            {{ $jobs->links() }}
        </div>
    @endif
</div>
@endsection

