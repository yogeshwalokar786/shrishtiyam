@extends('layouts.admin')

@section('title', 'Client Testimonials')
@section('page_title', 'Client Testimonials')

@section('content')
<div class="content-header" style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 24px;">
    <div>
        <h1 class="page-title">Client Testimonials</h1>
        <p style="color: var(--text-muted); font-size: 0.88rem; margin-top: 4px;">
            Manage customer endorsements, ratings, and enterprise success reviews displayed on the website carousel.
        </p>
    </div>
    <div>
        <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary" style="display: inline-flex; align-items: center; gap: 8px; text-decoration: none;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
            <span>Add Testimonial</span>
        </a>
    </div>
</div>

<!-- Stat Cards -->
<div class="kpi-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(210px, 1fr)); gap: 18px; margin-bottom: 24px;">
    <div class="card" style="padding: 20px; border-left: 4px solid var(--primary);">
        <div style="font-size: 0.82rem; font-weight: 700; color: var(--text-muted); text-transform: uppercase; margin-bottom: 8px;">Total Reviews</div>
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

    <div class="card" style="padding: 20px; border-left: 4px solid #8b5cf6;">
        <div style="font-size: 0.82rem; font-weight: 700; color: #8b5cf6; text-transform: uppercase; margin-bottom: 8px;">Avg Rating</div>
        <div style="font-size: 1.85rem; font-weight: 800; color: #8b5cf6; display: flex; align-items: center; gap: 6px;">
            <span>{{ $stats['avg_rating'] }}</span>
            <span style="font-size: 1.1rem; color: #f59e0b;">★</span>
        </div>
    </div>
</div>

<!-- Search & Filter Bar -->
<div class="card" style="margin-bottom: 24px; padding: 18px 22px;">
    <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 16px;">
        <form method="GET" action="{{ route('admin.testimonials.index') }}" style="display: flex; gap: 8px; width: 100%; max-width: 520px; flex-wrap: wrap;">
            <input type="text" name="search" value="{{ $search }}" placeholder="Search client name, company, quote, badge..." 
                   class="form-control" style="flex: 1; min-width: 220px; padding: 8px 14px; font-size: 0.88rem;">
            
            <select name="status" class="form-control" style="width: auto; padding: 8px 12px; font-size: 0.88rem;">
                <option value="all" {{ $status === 'all' ? 'selected' : '' }}>All Status</option>
                <option value="active" {{ $status === 'active' ? 'selected' : '' }}>Active Only</option>
                <option value="inactive" {{ $status === 'inactive' ? 'selected' : '' }}>Hidden Only</option>
            </select>

            <button type="submit" class="btn btn-secondary" style="padding: 8px 16px; font-size: 0.88rem;">Filter</button>
            @if(!empty($search) || $status !== 'all')
                <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary" style="padding: 8px 12px; font-size: 0.88rem;" title="Clear Filters">✕</a>
            @endif
        </form>

        <div style="font-size: 0.84rem; color: var(--text-muted);">
            Showing {{ $testimonials->total() }} {{ Str::plural('testimonial', $testimonials->total()) }}
        </div>
    </div>
</div>

<!-- Testimonials Table -->
<div class="card" style="padding: 0; overflow: hidden;">
    <div style="overflow-x: auto;">
        <table style="width: 100%; border-collapse: collapse; text-align: left; font-size: 0.88rem;">
            <thead>
                <tr style="background: var(--bg-surface-elevated); border-bottom: 1px solid var(--border-medium); color: var(--text-muted); font-size: 0.78rem; text-transform: uppercase; letter-spacing: 0.5px;">
                    <th style="padding: 14px 20px; width: 70px;">Order</th>
                    <th style="padding: 14px 20px;">Client / Endorser</th>
                    <th style="padding: 14px 20px;">Rating & Badge</th>
                    <th style="padding: 14px 20px;">Quote / Review</th>
                    <th style="padding: 14px 20px;">Status</th>
                    <th style="padding: 14px 20px; text-align: right;">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($testimonials as $item)
                    <tr style="border-bottom: 1px solid var(--border-subtle); transition: background 0.15s ease;">
                        <td style="padding: 16px 20px; vertical-align: top; font-weight: 700; color: var(--text-muted); font-family: var(--font-mono);">
                            #{{ $item->sort_order }}
                        </td>

                        <td style="padding: 16px 20px; vertical-align: top; min-width: 200px;">
                            <div style="display: flex; align-items: center; gap: 12px;">
                                <img src="{{ $item->avatar_url }}" alt="{{ $item->author_name }}" 
                                     style="width: 44px; height: 44px; border-radius: 50%; object-fit: cover; border: 2px solid var(--border-medium); flex-shrink: 0; background: var(--bg-surface-elevated);"
                                     onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($item->author_name) }}&background=059669&color=ffffff';">
                                <div>
                                    <div style="font-weight: 700; font-size: 0.95rem; color: var(--text-main);">
                                        {{ $item->author_name }}
                                    </div>
                                    @if($item->author_role)
                                        <div style="font-size: 0.8rem; color: var(--text-muted); margin-top: 2px;">
                                            {{ $item->author_role }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </td>

                        <td style="padding: 16px 20px; vertical-align: top; white-space: nowrap;">
                            <div style="display: flex; align-items: center; gap: 3px; color: #f59e0b; margin-bottom: 6px;">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $item->rating)
                                        <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                                    @else
                                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                                    @endif
                                @endfor
                                <span style="font-size: 0.78rem; font-weight: 700; color: var(--text-muted); margin-left: 4px;">({{ $item->rating }}/5)</span>
                            </div>

                            @if($item->badge)
                                <span style="display: inline-block; font-size: 0.72rem; font-weight: 700; padding: 2px 8px; border-radius: 9999px; background: rgba(5, 150, 105, 0.12); color: var(--primary); border: 1px solid rgba(5, 150, 105, 0.25);">
                                    {{ $item->badge }}
                                </span>
                            @else
                                <span style="font-size: 0.75rem; color: var(--text-muted); font-style: italic;">No badge</span>
                            @endif
                        </td>

                        <td style="padding: 16px 20px; vertical-align: top; max-width: 320px;">
                            <p style="margin: 0; font-size: 0.85rem; line-height: 1.5; color: var(--text-secondary); display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                “{{ $item->quote }}”
                            </p>
                        </td>

                        <td style="padding: 16px 20px; vertical-align: top; white-space: nowrap;">
                            <form action="{{ route('admin.testimonials.toggle-status', $item) }}" method="POST" style="display: inline;">
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

                        <td style="padding: 16px 20px; vertical-align: top; text-align: right; white-space: nowrap;">
                            <div style="display: flex; gap: 8px; justify-content: flex-end;">
                                <a href="{{ route('admin.testimonials.edit', $item) }}" class="btn btn-secondary btn-sm" style="padding: 6px 12px; font-size: 0.8rem; text-decoration: none;" title="Edit Testimonial">
                                    Edit
                                </a>

                                <form action="{{ route('admin.testimonials.destroy', $item) }}" method="POST" onsubmit="return confirm('Are you sure you want to permanently delete this testimonial from {{ addslashes($item->author_name) }}?');" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" style="padding: 6px 10px; font-size: 0.8rem;" title="Delete Testimonial">
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
                                    <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
                                </svg>
                            </div>
                            <div style="font-weight: 700; font-size: 1.05rem; margin-bottom: 6px; color: var(--text-main);">No testimonials found</div>
                            <p style="color: var(--text-muted); font-size: 0.88rem; max-width: 400px; margin: 0 auto 18px;">
                                @if(!empty($search) || $status !== 'all')
                                    No testimonials match your filter criteria. Try resetting the filters.
                                @else
                                    No client testimonials have been created yet. Add your first client endorsement now!
                                @endif
                            </p>
                            @if(!empty($search) || $status !== 'all')
                                <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary" style="text-decoration: none;">Reset Filters</a>
                            @else
                                <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary" style="text-decoration: none;">Add First Testimonial</a>
                            @endif
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($testimonials->hasPages())
        <div style="padding: 16px 20px; border-top: 1px solid var(--border-subtle); display: flex; justify-content: center;">
            {{ $testimonials->links() }}
        </div>
    @endif
</div>
@endsection
