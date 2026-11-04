@extends('layouts.admin')

@section('title', 'Blogs')
@section('page_title', 'Blogs')

@section('content')
<div class="content-header" style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 24px; flex-wrap: wrap; gap: 16px;">
    <div>
        <h1 class="page-title">Blog Articles</h1>
    </div>
    <div style="display: flex; gap: 10px; flex-wrap: wrap;">
        <a href="{{ route('admin.blog-categories.index') }}" class="btn btn-secondary" style="display: inline-flex; align-items: center; gap: 6px; text-decoration: none;">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <line x1="8" y1="6" x2="21" y2="6"></line>
                <line x1="8" y1="12" x2="21" y2="12"></line>
                <line x1="8" y1="18" x2="21" y2="18"></line>
                <line x1="3" y1="6" x2="3.01" y2="6"></line>
                <line x1="3" y1="12" x2="3.01" y2="12"></line>
                <line x1="3" y1="18" x2="3.01" y2="18"></line>
            </svg>
            <span>Categories</span>
        </a>
        <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary" style="display: inline-flex; align-items: center; gap: 8px; text-decoration: none;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
            <span>New Article</span>
        </a>
    </div>
</div>

<!-- KPI Cards -->
<div class="kpi-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 18px; margin-bottom: 24px;">
    <div class="card" style="padding: 20px; border-left: 4px solid var(--primary);">
        <div style="font-size: 0.82rem; font-weight: 700; color: var(--text-muted); text-transform: uppercase; margin-bottom: 8px;">Total Articles</div>
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

    <div class="card" style="padding: 20px; border-left: 4px solid #8b5cf6;">
        <div style="font-size: 0.82rem; font-weight: 700; color: #7c3aed; text-transform: uppercase; margin-bottom: 8px;">Featured</div>
        <div style="font-size: 1.85rem; font-weight: 800; color: #7c3aed;">{{ $stats['featured'] }}</div>
    </div>
</div>

<!-- Toolbar: Tabs, Categories Filter & Search -->
<div class="card" style="margin-bottom: 24px; padding: 18px 22px;">
    <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 16px;">
        <!-- Status Tabs -->
        <div style="display: flex; gap: 8px; flex-wrap: wrap;">
            <a href="{{ route('admin.blogs.index', ['status' => 'all', 'category_id' => $categoryId, 'search' => $search]) }}" 
               class="btn {{ $status === 'all' ? 'btn-primary' : 'btn-secondary' }}" style="padding: 6px 14px; font-size: 0.84rem;">
               All ({{ $stats['total'] }})
            </a>
            <a href="{{ route('admin.blogs.index', ['status' => 'published', 'category_id' => $categoryId, 'search' => $search]) }}" 
               class="btn {{ $status === 'published' ? 'btn-primary' : 'btn-secondary' }}" style="padding: 6px 14px; font-size: 0.84rem;">
               Published ({{ $stats['published'] }})
            </a>
            <a href="{{ route('admin.blogs.index', ['status' => 'draft', 'category_id' => $categoryId, 'search' => $search]) }}" 
               class="btn {{ $status === 'draft' ? 'btn-primary' : 'btn-secondary' }}" style="padding: 6px 14px; font-size: 0.84rem;">
               Drafts ({{ $stats['drafts'] }})
            </a>
            <a href="{{ route('admin.blogs.index', ['status' => 'featured', 'category_id' => $categoryId, 'search' => $search]) }}" 
               class="btn {{ $status === 'featured' ? 'btn-primary' : 'btn-secondary' }}" style="padding: 6px 14px; font-size: 0.84rem;">
               Featured ({{ $stats['featured'] }})
            </a>
        </div>

        <!-- Category & Search Form -->
        <form method="GET" action="{{ route('admin.blogs.index') }}" style="display: flex; gap: 8px; flex-wrap: wrap;">
            <input type="hidden" name="status" value="{{ $status }}">
            
            <select name="category_id" class="form-control" style="width: auto; padding: 7px 12px; font-size: 0.85rem;" onchange="this.form.submit()">
                <option value="">All Categories</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ (string)$categoryId === (string)$cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>

            <input type="text" name="search" value="{{ $search }}" placeholder="Search..." 
                   class="form-control" style="width: 220px; padding: 7px 12px; font-size: 0.85rem;">
            <button type="submit" class="btn btn-secondary" style="padding: 7px 14px; font-size: 0.85rem;">Search</button>
            @if(!empty($search) || !empty($categoryId))
                <a href="{{ route('admin.blogs.index', ['status' => $status]) }}" class="btn btn-secondary" style="padding: 7px 12px; font-size: 0.85rem;" title="Clear Filters">✕</a>
            @endif
        </form>
    </div>
</div>

<!-- Blogs Table -->
<div class="card" style="padding: 0; overflow: hidden;">
    <div style="overflow-x: auto;">
        <table style="width: 100%; border-collapse: collapse; text-align: left; font-size: 0.88rem;">
            <thead>
                <tr style="background: var(--bg-surface-elevated); border-bottom: 1px solid var(--border-medium); color: var(--text-muted); font-size: 0.78rem; text-transform: uppercase; letter-spacing: 0.5px;">
                    <th style="padding: 14px 20px;">Article</th>
                    <th style="padding: 14px 20px;">Category</th>
                    <th style="padding: 14px 20px;">Author</th>
                    <th style="padding: 14px 20px;">Views</th>
                    <th style="padding: 14px 20px;">Status</th>
                    <th style="padding: 14px 20px;">Date</th>
                    <th style="padding: 14px 20px; text-align: right;">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($blogs as $item)
                    <tr style="border-bottom: 1px solid var(--border-subtle); transition: background 0.15s ease;">
                        <td style="padding: 16px 20px; vertical-align: top; max-width: 360px;">
                            <div style="display: flex; gap: 14px;">
                                <img src="{{ $item->image_url }}" alt="{{ $item->title }}" 
                                     style="width: 64px; height: 48px; object-fit: cover; border-radius: 6px; border: 1px solid var(--border-medium); flex-shrink: 0;">
                                <div>
                                    <div style="font-weight: 700; font-size: 0.94rem; color: var(--text-main); line-height: 1.35; margin-bottom: 4px;">
                                        {{ $item->title }}
                                    </div>
                                    <div style="font-size: 0.8rem; display: flex; align-items: center; gap: 8px;">
                                        <code style="font-family: var(--font-mono); font-size: 0.75rem; color: var(--text-muted);">/blog/{{ $item->slug }}</code>
                                        @if($item->is_published)
                                            <a href="{{ $item->url }}" target="_blank" style="color: var(--primary); text-decoration: none; font-weight: 600; font-size: 0.78rem;" title="View Live Page">
                                                <span>View live ↗</span>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </td>

                        <td style="padding: 16px 20px; vertical-align: top;">
                            @if($item->category)
                                <span style="display: inline-block; font-size: 0.78rem; font-weight: 600; padding: 4px 8px; border-radius: 4px; background: rgba(59, 130, 246, 0.1); color: #2563eb;">
                                    {{ $item->category->name }}
                                </span>
                            @else
                                <span style="font-size: 0.8rem; color: var(--text-muted); font-style: italic;">Uncategorized</span>
                            @endif
                        </td>

                        <td style="padding: 16px 20px; vertical-align: top;">
                            <div style="font-weight: 600; color: var(--text-main); font-size: 0.86rem;">{{ $item->author_name }}</div>
                            <div style="font-size: 0.78rem; color: var(--text-muted); margin-top: 2px;">{{ $item->read_time ?? '5 Min Read' }}</div>
                        </td>

                        <td style="padding: 16px 20px; vertical-align: top; font-family: var(--font-mono); font-size: 0.85rem; color: var(--text-muted);">
                            {{ number_format($item->views_count) }}
                        </td>

                        <td style="padding: 16px 20px; vertical-align: top;">
                            <div style="display: flex; flex-direction: column; gap: 4px; align-items: flex-start;">
                                @if($item->is_published)
                                    <span style="font-size: 0.74rem; font-weight: 700; padding: 3px 8px; border-radius: 10px; background: rgba(16, 185, 129, 0.12); color: #059669; border: 1px solid rgba(16, 185, 129, 0.25);">
                                        Published
                                    </span>
                                @else
                                    <span style="font-size: 0.74rem; font-weight: 700; padding: 3px 8px; border-radius: 10px; background: rgba(148, 163, 184, 0.15); color: #64748b; border: 1px solid rgba(148, 163, 184, 0.3);">
                                        Draft
                                    </span>
                                @endif

                                @if($item->is_featured)
                                    <span style="font-size: 0.72rem; font-weight: 700; padding: 2px 7px; border-radius: 10px; background: rgba(139, 92, 246, 0.12); color: #7c3aed; border: 1px solid rgba(139, 92, 246, 0.25);">
                                        ★ Featured
                                    </span>
                                @endif
                            </div>
                        </td>

                        <td style="padding: 16px 20px; vertical-align: top; font-size: 0.82rem; color: var(--text-muted); white-space: nowrap;">
                            {{ $item->formatted_date }}
                        </td>

                        <td style="padding: 16px 20px; vertical-align: top; text-align: right; white-space: nowrap;">
                            <a href="{{ route('admin.blogs.edit', $item->id) }}" class="btn btn-secondary btn-sm" style="padding: 6px 12px; font-size: 0.82rem; text-decoration: none;">
                                Edit
                            </a>

                            <form method="POST" action="{{ route('admin.blogs.destroy', $item->id) }}" style="display: inline-block; margin-left: 6px;" onsubmit="return confirm('Are you sure you want to delete this article?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" style="padding: 6px 10px; font-size: 0.82rem;" title="Delete article">
                                    ✕
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" style="padding: 48px 20px; text-align: center; color: var(--text-muted);">
                            <div style="font-size: 1.1rem; font-weight: 600; margin-bottom: 12px;">No blog articles found</div>
                            <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary" style="text-decoration: none;">Add Article</a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($blogs->hasPages())
        <div style="padding: 16px 20px; border-top: 1px solid var(--border-medium);">
            {{ $blogs->links() }}
        </div>
    @endif
</div>
@endsection
