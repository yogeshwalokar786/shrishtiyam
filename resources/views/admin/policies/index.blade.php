@extends('layouts.admin')

@section('title', 'Policies')
@section('page_title', 'Policies')

@section('content')
<div class="content-header" style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 24px;">
    <div>
        <h1 class="page-title">Policies</h1>
    </div>
    <div>
        <a href="{{ route('admin.policies.create') }}" class="btn btn-primary" style="display: inline-flex; align-items: center; gap: 8px; text-decoration: none;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
            <span>Add Policy</span>
        </a>
    </div>
</div>

<!-- Stat Cards -->
<div class="kpi-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 18px; margin-bottom: 24px;">
    <div class="card" style="padding: 20px; border-left: 4px solid var(--primary);">
        <div style="font-size: 0.82rem; font-weight: 700; color: var(--text-muted); text-transform: uppercase; margin-bottom: 8px;">Total Policies</div>
        <div style="font-size: 1.85rem; font-weight: 800; color: var(--text-main);">{{ $stats['total'] }}</div>
    </div>

    <div class="card" style="padding: 20px; border-left: 4px solid #10b981;">
        <div style="font-size: 0.82rem; font-weight: 700; color: #059669; text-transform: uppercase; margin-bottom: 8px;">Published</div>
        <div style="font-size: 1.85rem; font-weight: 800; color: #059669;">{{ $stats['published'] }}</div>
    </div>

    <div class="card" style="padding: 20px; border-left: 4px solid #f59e0b;">
        <div style="font-size: 0.82rem; font-weight: 700; color: #d97706; text-transform: uppercase; margin-bottom: 8px;">Drafts</div>
        <div style="font-size: 1.85rem; font-weight: 800; color: #d97706;">{{ $stats['drafts'] }}</div>
    </div>
</div>

<!-- Search & Filter Bar -->
<div class="card" style="margin-bottom: 24px; padding: 18px 22px;">
    <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 16px;">
        <form method="GET" action="{{ route('admin.policies.index') }}" style="display: flex; gap: 8px; width: 100%; max-width: 400px;">
            <input type="text" name="search" value="{{ $search }}" placeholder="Search policy title or slug..." 
                   class="form-control" style="width: 100%; padding: 8px 14px; font-size: 0.88rem;">
            <button type="submit" class="btn btn-secondary" style="padding: 8px 16px; font-size: 0.88rem;">Search</button>
            @if(!empty($search))
                <a href="{{ route('admin.policies.index') }}" class="btn btn-secondary" style="padding: 8px 12px; font-size: 0.88rem;" title="Clear">✕</a>
            @endif
        </form>

        <div style="font-size: 0.84rem; color: var(--text-muted);">
            Showing {{ $policies->total() }} policy {{ Str::plural('page', $policies->total()) }}
        </div>
    </div>
</div>

<!-- Policies Table -->
<div class="card" style="padding: 0; overflow: hidden;">
    <div style="overflow-x: auto;">
        <table style="width: 100%; border-collapse: collapse; text-align: left; font-size: 0.88rem;">
            <thead>
                <tr style="background: var(--bg-surface-elevated); border-bottom: 1px solid var(--border-medium); color: var(--text-muted); font-size: 0.78rem; text-transform: uppercase; letter-spacing: 0.5px;">
                    <th style="padding: 14px 20px;">Title & Slug</th>
                    <th style="padding: 14px 20px;">Status</th>
                    <th style="padding: 14px 20px;">Order</th>
                    <th style="padding: 14px 20px;">Last Updated</th>
                    <th style="padding: 14px 20px; text-align: right;">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($policies as $item)
                    <tr style="border-bottom: 1px solid var(--border-subtle); transition: background 0.15s ease;">
                        <td style="padding: 16px 20px; vertical-align: top;">
                            <div style="font-weight: 700; font-size: 0.95rem; color: var(--text-main);">
                                {{ $item->title }}
                            </div>
                            <div style="font-size: 0.82rem; margin-top: 4px; display: flex; align-items: center; gap: 8px;">
                                <code style="font-family: var(--font-mono); color: var(--text-muted); background: var(--bg-surface-elevated); padding: 2px 6px; border-radius: 4px;">/policy/{{ $item->slug }}</code>
                                @if($item->is_published)
                                    <a href="{{ $item->url }}" target="_blank" style="color: var(--primary); text-decoration: none; font-weight: 600; font-size: 0.78rem; display: inline-flex; align-items: center; gap: 3px;" title="View Live Page">
                                        <span>View live ↗</span>
                                    </a>
                                @endif
                            </div>
                        </td>

                        <td style="padding: 16px 20px; vertical-align: top;">
                            @if($item->is_published)
                                <span style="display: inline-block; font-size: 0.75rem; font-weight: 700; padding: 4px 10px; border-radius: 12px; background: rgba(16, 185, 129, 0.12); color: #059669; border: 1px solid rgba(16, 185, 129, 0.25);">
                                    Published
                                </span>
                            @else
                                <span style="display: inline-block; font-size: 0.75rem; font-weight: 700; padding: 4px 10px; border-radius: 12px; background: rgba(148, 163, 184, 0.15); color: #64748b; border: 1px solid rgba(148, 163, 184, 0.3);">
                                    Draft
                                </span>
                            @endif
                        </td>

                        <td style="padding: 16px 20px; vertical-align: top; font-size: 0.84rem; color: var(--text-muted);">
                            {{ $item->sort_order }}
                        </td>

                        <td style="padding: 16px 20px; vertical-align: top; font-size: 0.82rem; color: var(--text-muted); white-space: nowrap;">
                            {{ $item->updated_at->format('M d, Y') }}<br>
                            <span style="font-size: 0.78rem;">{{ $item->updated_at->diffForHumans() }}</span>
                        </td>

                        <td style="padding: 16px 20px; vertical-align: top; text-align: right; white-space: nowrap;">
                            <a href="{{ route('admin.policies.edit', $item->id) }}" class="btn btn-secondary btn-sm" style="padding: 6px 12px; font-size: 0.82rem; text-decoration: none;">
                                Edit
                            </a>

                            <form method="POST" action="{{ route('admin.policies.destroy', $item->id) }}" style="display: inline-block; margin-left: 6px;" onsubmit="return confirm('Are you sure you want to delete policy \'{{ $item->title }}\'?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" style="padding: 6px 10px; font-size: 0.82rem;" title="Delete policy">
                                    ✕
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="padding: 48px 20px; text-align: center; color: var(--text-muted);">
                            <div style="font-size: 1.1rem; font-weight: 600; margin-bottom: 12px;">No policies found</div>
                            <a href="{{ route('admin.policies.create') }}" class="btn btn-primary btn-sm">Add Policy</a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($policies->hasPages())
        <div style="padding: 16px 20px; border-top: 1px solid var(--border-medium);">
            {{ $policies->links() }}
        </div>
    @endif
</div>
@endsection
