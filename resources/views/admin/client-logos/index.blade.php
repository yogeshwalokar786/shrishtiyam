@extends('layouts.admin')

@section('title', 'Client Logos')
@section('page_title', 'Client Logos')

@section('content')
<div class="content-header" style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 24px;">
    <div>
        <h1 class="page-title">Client Logos</h1>
        <p style="color: var(--text-muted); font-size: 0.88rem; margin-top: 4px;">
            Manage enterprise brand logos, partners, and municipal collaborators featured in the running carousel on the homepage.
        </p>
    </div>
    <div>
        <a href="{{ route('admin.client-logos.create') }}" class="btn btn-primary" style="display: inline-flex; align-items: center; gap: 8px; text-decoration: none;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
            <span>Add Client Logo</span>
        </a>
    </div>
</div>

<!-- Stat Cards -->
<div class="kpi-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(210px, 1fr)); gap: 18px; margin-bottom: 24px;">
    <div class="card" style="padding: 20px; border-left: 4px solid var(--primary);">
        <div style="font-size: 0.82rem; font-weight: 700; color: var(--text-muted); text-transform: uppercase; margin-bottom: 8px;">Total Client Logos</div>
        <div style="font-size: 1.85rem; font-weight: 800; color: var(--text-main);">{{ $stats['total'] }}</div>
    </div>

    <div class="card" style="padding: 20px; border-left: 4px solid #10b981;">
        <div style="font-size: 0.82rem; font-weight: 700; color: #059669; text-transform: uppercase; margin-bottom: 8px;">Active on Site</div>
        <div style="font-size: 1.85rem; font-weight: 800; color: #059669;">{{ $stats['active'] }}</div>
    </div>

    <div class="card" style="padding: 20px; border-left: 4px solid #f59e0b;">
        <div style="font-size: 0.82rem; font-weight: 700; color: #d97706; text-transform: uppercase; margin-bottom: 8px;">Hidden / Inactive</div>
        <div style="font-size: 1.85rem; font-weight: 800; color: #d97706;">{{ $stats['inactive'] }}</div>
    </div>
</div>

<!-- Search & Filter Bar -->
<div class="card" style="margin-bottom: 24px; padding: 18px 22px;">
    <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 16px;">
        <form method="GET" action="{{ route('admin.client-logos.index') }}" style="display: flex; gap: 8px; width: 100%; max-width: 520px; flex-wrap: wrap;">
            <input type="text" name="search" value="{{ $search }}" placeholder="Search client name or URL..." 
                   class="form-control" style="flex: 1; min-width: 220px; padding: 8px 14px; font-size: 0.88rem;">
            
            <select name="status" class="form-control" style="width: auto; padding: 8px 12px; font-size: 0.88rem;">
                <option value="all" {{ $status === 'all' ? 'selected' : '' }}>All Status</option>
                <option value="active" {{ $status === 'active' ? 'selected' : '' }}>Active Only</option>
                <option value="inactive" {{ $status === 'inactive' ? 'selected' : '' }}>Hidden Only</option>
            </select>

            <button type="submit" class="btn btn-secondary" style="padding: 8px 16px; font-size: 0.88rem;">Filter</button>
            @if(!empty($search) || $status !== 'all')
                <a href="{{ route('admin.client-logos.index') }}" class="btn btn-secondary" style="padding: 8px 12px; font-size: 0.88rem;" title="Clear Filters">✕</a>
            @endif
        </form>

        <div style="font-size: 0.84rem; color: var(--text-muted);">
            Showing {{ $logos->total() }} {{ Str::plural('client logo', $logos->total()) }}
        </div>
    </div>
</div>

<!-- Client Logos Table -->
<div class="card" style="padding: 0; overflow: hidden;">
    <div style="overflow-x: auto;">
        <table style="width: 100%; border-collapse: collapse; text-align: left; font-size: 0.88rem;">
            <thead>
                <tr style="background: var(--bg-surface-elevated); border-bottom: 1px solid var(--border-medium); color: var(--text-muted); font-size: 0.78rem; text-transform: uppercase; letter-spacing: 0.5px;">
                    <th style="padding: 14px 20px; width: 70px;">Order</th>
                    <th style="padding: 14px 20px; width: 180px;">Logo Preview</th>
                    <th style="padding: 14px 20px;">Client / Brand Name</th>
                    <th style="padding: 14px 20px;">Website Link</th>
                    <th style="padding: 14px 20px; width: 110px;">Status</th>
                    <th style="padding: 14px 20px; text-align: right; width: 140px;">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($logos as $item)
                    <tr style="border-bottom: 1px solid var(--border-subtle); transition: background 0.15s ease;">
                        <td style="padding: 16px 20px; vertical-align: middle; font-weight: 700; color: var(--text-muted); font-family: var(--font-mono);">
                            #{{ $item->sort_order }}
                        </td>

                        <td style="padding: 16px 20px; vertical-align: middle;">
                            <div style="width: 130px; height: 50px; background: #ffffff; border: 1px solid var(--border-medium); border-radius: 8px; display: flex; align-items: center; justify-content: center; padding: 6px; box-shadow: 0 1px 3px rgba(0,0,0,0.04);">
                                <img src="{{ $item->logo_url }}" alt="{{ $item->name }}" 
                                     style="max-width: 100%; max-height: 100%; object-fit: contain;">
                            </div>
                        </td>

                        <td style="padding: 16px 20px; vertical-align: middle;">
                            <div style="font-weight: 700; font-size: 0.95rem; color: var(--text-main);">
                                {{ $item->name }}
                            </div>
                            <div style="font-size: 0.78rem; color: var(--text-muted); margin-top: 3px; font-family: var(--font-mono);">
                                {{ $item->logo_path }}
                            </div>
                        </td>

                        <td style="padding: 16px 20px; vertical-align: middle;">
                            @if($item->website_url)
                                <a href="{{ $item->website_url }}" target="_blank" rel="noopener noreferrer" 
                                   style="display: inline-flex; align-items: center; gap: 5px; color: var(--primary); font-size: 0.84rem; text-decoration: none; word-break: break-all;">
                                    <span>{{ Str::limit($item->website_url, 35) }}</span>
                                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
                                        <polyline points="15 3 21 3 21 9"></polyline>
                                        <line x1="10" y1="14" x2="21" y2="3"></line>
                                    </svg>
                                </a>
                            @else
                                <span style="font-size: 0.8rem; color: var(--text-muted); font-style: italic;">No URL linked</span>
                            @endif
                        </td>

                        <td style="padding: 16px 20px; vertical-align: middle; white-space: nowrap;">
                            <form action="{{ route('admin.client-logos.toggle-status', $item) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('PATCH')
                                <button type="submit" style="background: none; border: none; padding: 0; cursor: pointer;" title="Click to toggle status">
                                    @if($item->is_active)
                                        <span style="display: inline-flex; align-items: center; gap: 5px; font-size: 0.75rem; font-weight: 700; padding: 4px 10px; border-radius: 12px; background: rgba(16, 185, 129, 0.12); color: #059669; border: 1px solid rgba(16, 185, 129, 0.25);">
                                            <span style="width: 6px; height: 6px; border-radius: 50%; background: #10b981;"></span>
                                            Active
                                        </span>
                                    @else
                                        <span style="display: inline-flex; align-items: center; gap: 5px; font-size: 0.75rem; font-weight: 700; padding: 4px 10px; border-radius: 12px; background: rgba(148, 163, 184, 0.15); color: #64748b; border: 1px solid rgba(148, 163, 184, 0.3);">
                                            <span style="width: 6px; height: 6px; border-radius: 50%; background: #94a3b8;"></span>
                                            Hidden
                                        </span>
                                    @endif
                                </button>
                            </form>
                        </td>

                        <td style="padding: 16px 20px; vertical-align: middle; text-align: right; white-space: nowrap;">
                            <div style="display: flex; gap: 8px; justify-content: flex-end;">
                                <a href="{{ route('admin.client-logos.edit', $item) }}" class="btn btn-secondary btn-sm" style="padding: 6px 12px; font-size: 0.8rem; text-decoration: none;" title="Edit Client Logo">
                                    Edit
                                </a>

                                <form action="{{ route('admin.client-logos.destroy', $item) }}" method="POST" onsubmit="return confirm('Are you sure you want to permanently delete {{ addslashes($item->name) }} logo?');" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" style="padding: 6px 10px; font-size: 0.8rem;" title="Delete Client Logo">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="padding: 48px 24px; text-align: center;">
                            <div style="width: 56px; height: 56px; border-radius: 14px; background: rgba(5, 150, 105, 0.1); color: var(--primary); display: inline-flex; align-items: center; justify-content: center; margin-bottom: 14px;">
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                                    <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                                </svg>
                            </div>
                            <div style="font-weight: 700; font-size: 1.05rem; margin-bottom: 6px; color: var(--text-main);">No client logos found</div>
                            <p style="color: var(--text-muted); font-size: 0.88rem; max-width: 400px; margin: 0 auto 18px;">
                                @if(!empty($search) || $status !== 'all')
                                    No client logos match your filter criteria. Try resetting the filters.
                                @else
                                    No client logos have been created yet. Add your first brand logo to feature it on the website!
                                @endif
                            </p>
                            @if(!empty($search) || $status !== 'all')
                                <a href="{{ route('admin.client-logos.index') }}" class="btn btn-secondary" style="text-decoration: none;">Reset Filters</a>
                            @else
                                <a href="{{ route('admin.client-logos.create') }}" class="btn btn-primary" style="text-decoration: none;">Add First Client Logo</a>
                            @endif
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($logos->hasPages())
        <div style="padding: 16px 20px; border-top: 1px solid var(--border-subtle); display: flex; justify-content: center;">
            {{ $logos->links() }}
        </div>
    @endif
</div>
@endsection
