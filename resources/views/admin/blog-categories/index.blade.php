@extends('layouts.admin')

@section('title', 'Blog Categories')
@section('page_title', 'Blog Categories')

@section('content')
<div class="content-header" style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 24px; flex-wrap: wrap; gap: 16px;">
    <div>
        <h1 class="page-title">Blog Categories</h1>
    </div>
    <div style="display: flex; gap: 10px;">
        <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary" style="display: inline-flex; align-items: center; gap: 6px; text-decoration: none;">
            <span>← Back to Blogs</span>
        </a>
        <button type="button" class="btn btn-primary" onclick="openCreateCategoryModal()" style="display: inline-flex; align-items: center; gap: 8px;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
            <span>Add Category</span>
        </button>
    </div>
</div>

<!-- KPI Stats -->
<div class="kpi-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 18px; margin-bottom: 24px;">
    <div class="card" style="padding: 20px; border-left: 4px solid var(--primary);">
        <div style="font-size: 0.82rem; font-weight: 700; color: var(--text-muted); text-transform: uppercase; margin-bottom: 8px;">Total Categories</div>
        <div style="font-size: 1.85rem; font-weight: 800; color: var(--text-main);">{{ $stats['total'] }}</div>
    </div>

    <div class="card" style="padding: 20px; border-left: 4px solid #10b981;">
        <div style="font-size: 0.82rem; font-weight: 700; color: #059669; text-transform: uppercase; margin-bottom: 8px;">Active</div>
        <div style="font-size: 1.85rem; font-weight: 800; color: #059669;">{{ $stats['active'] }}</div>
    </div>

    <div class="card" style="padding: 20px; border-left: 4px solid #94a3b8;">
        <div style="font-size: 0.82rem; font-weight: 700; color: #64748b; text-transform: uppercase; margin-bottom: 8px;">Inactive</div>
        <div style="font-size: 1.85rem; font-weight: 800; color: #64748b;">{{ $stats['inactive'] }}</div>
    </div>
</div>

<!-- Search & Filters -->
<div class="card" style="margin-bottom: 24px; padding: 18px 22px;">
    <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 16px;">
        <form method="GET" action="{{ route('admin.blog-categories.index') }}" style="display: flex; gap: 8px; width: 100%; max-width: 400px;">
            <input type="text" name="search" value="{{ $search }}" placeholder="Search category name or slug..." 
                   class="form-control" style="width: 100%; padding: 8px 14px; font-size: 0.88rem;">
            <button type="submit" class="btn btn-secondary" style="padding: 8px 16px; font-size: 0.88rem;">Search</button>
            @if(!empty($search))
                <a href="{{ route('admin.blog-categories.index') }}" class="btn btn-secondary" style="padding: 8px 12px; font-size: 0.88rem;" title="Clear">✕</a>
            @endif
        </form>

        <div style="font-size: 0.84rem; color: var(--text-muted);">
            Showing {{ $categories->total() }} {{ Str::plural('category', $categories->total()) }}
        </div>
    </div>
</div>

<!-- Categories Table -->
<div class="card" style="padding: 0; overflow: hidden;">
    <div style="overflow-x: auto;">
        <table style="width: 100%; border-collapse: collapse; text-align: left; font-size: 0.88rem;">
            <thead>
                <tr style="background: var(--bg-surface-elevated); border-bottom: 1px solid var(--border-medium); color: var(--text-muted); font-size: 0.78rem; text-transform: uppercase; letter-spacing: 0.5px;">
                    <th style="padding: 14px 20px;">Category</th>
                    <th style="padding: 14px 20px;">Slug</th>
                    <th style="padding: 14px 20px;">Articles Count</th>
                    <th style="padding: 14px 20px;">Status</th>
                    <th style="padding: 14px 20px;">Order</th>
                    <th style="padding: 14px 20px; text-align: right;">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $item)
                    <tr style="border-bottom: 1px solid var(--border-subtle); transition: background 0.15s ease;">
                        <td style="padding: 16px 20px; vertical-align: top;">
                            <div style="font-weight: 700; font-size: 0.95rem; color: var(--text-main);">
                                {{ $item->name }}
                            </div>
                            @if($item->description)
                                <div style="font-size: 0.82rem; color: var(--text-muted); margin-top: 4px; max-width: 380px;">
                                    {{ $item->description }}
                                </div>
                            @endif
                        </td>

                        <td style="padding: 16px 20px; vertical-align: top;">
                            <code style="font-family: var(--font-mono); font-size: 0.82rem; color: var(--text-muted); background: var(--bg-surface-elevated); padding: 3px 8px; border-radius: 4px;">
                                {{ $item->slug }}
                            </code>
                        </td>

                        <td style="padding: 16px 20px; vertical-align: top;">
                            <a href="{{ route('admin.blogs.index', ['category_id' => $item->id]) }}" style="font-weight: 700; color: var(--primary); text-decoration: none; display: inline-flex; align-items: center; gap: 4px;">
                                <span>{{ $item->blogs_count }} {{ Str::plural('article', $item->blogs_count) }}</span>
                                <span style="font-size: 0.75rem;">↗</span>
                            </a>
                        </td>

                        <td style="padding: 16px 20px; vertical-align: top;">
                            @if($item->is_active)
                                <span style="display: inline-block; font-size: 0.75rem; font-weight: 700; padding: 4px 10px; border-radius: 12px; background: rgba(16, 185, 129, 0.12); color: #059669; border: 1px solid rgba(16, 185, 129, 0.25);">
                                    Active
                                </span>
                            @else
                                <span style="display: inline-block; font-size: 0.75rem; font-weight: 700; padding: 4px 10px; border-radius: 12px; background: rgba(148, 163, 184, 0.15); color: #64748b; border: 1px solid rgba(148, 163, 184, 0.3);">
                                    Inactive
                                </span>
                            @endif
                        </td>

                        <td style="padding: 16px 20px; vertical-align: top; font-family: var(--font-mono); color: var(--text-muted);">
                            {{ $item->sort_order }}
                        </td>

                        <td style="padding: 16px 20px; vertical-align: top; text-align: right; white-space: nowrap;">
                            <button type="button" class="btn btn-secondary btn-sm" 
                                    onclick='openEditCategoryModal(@json($item))' 
                                    style="padding: 6px 12px; font-size: 0.82rem;">
                                Edit
                            </button>

                            <form method="POST" action="{{ route('admin.blog-categories.destroy', $item->id) }}" style="display: inline-block; margin-left: 6px;" onsubmit="return confirm('Are you sure you want to delete this category? Any associated articles will have their category unassigned.');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" style="padding: 6px 10px; font-size: 0.82rem;" title="Delete category">
                                    ✕
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="padding: 48px 20px; text-align: center; color: var(--text-muted);">
                            <div style="font-size: 1.1rem; font-weight: 600; margin-bottom: 12px;">No categories found</div>
                            <button type="button" class="btn btn-primary" onclick="openCreateCategoryModal()">Add Category</button>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($categories->hasPages())
        <div style="padding: 16px 20px; border-top: 1px solid var(--border-medium);">
            {{ $categories->links() }}
        </div>
    @endif
</div>
@endsection

@push('modals')
<!-- Modal: Create / Edit Category -->
<div id="categoryModal" style="display: none; position: fixed; inset: 0; background: rgba(15, 23, 42, 0.6); z-index: 99999; align-items: center; justify-content: center; padding: 20px;">
    <div class="card" style="width: 100%; max-width: 520px; padding: 28px; position: relative; box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);">
        <button type="button" onclick="closeCategoryModal()" style="position: absolute; top: 20px; right: 20px; background: none; border: none; font-size: 1.3rem; color: var(--text-muted); cursor: pointer;">✕</button>

        <h3 id="categoryModalTitle" style="font-size: 1.3rem; margin-bottom: 18px;">Add Category</h3>

        <form id="categoryForm" method="POST" action="{{ route('admin.blog-categories.store') }}">
            @csrf
            <input type="hidden" name="_method" id="categoryFormMethod" value="POST">

            <div style="margin-bottom: 16px;">
                <label style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 6px;">Category Name <span style="color: #ef4444;">*</span></label>
                <input type="text" name="name" id="catNameInput" required class="form-control" placeholder="Category Name" style="width: 100%;">
            </div>

            <div style="margin-bottom: 16px;">
                <label style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 6px;">URL Slug</label>
                <input type="text" name="slug" id="catSlugInput" class="form-control" placeholder="Slug" style="width: 100%;">
            </div>

            <div style="margin-bottom: 16px;">
                <label style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 6px;">Description</label>
                <textarea name="description" id="catDescInput" rows="3" class="form-control" placeholder="Description" style="width: 100%;"></textarea>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 22px;">
                <div>
                    <label style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 6px;">Sort Order</label>
                    <input type="number" name="sort_order" id="catOrderInput" value="0" class="form-control" style="width: 100%;">
                </div>
                <div style="display: flex; align-items: center; padding-top: 24px;">
                    <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; font-size: 0.88rem; font-weight: 600;">
                        <input type="checkbox" name="is_active" id="catActiveInput" value="1" checked style="width: 18px; height: 18px; accent-color: var(--primary);">
                        <span>Active</span>
                    </label>
                </div>
            </div>

            <div style="display: flex; justify-content: flex-end; gap: 10px;">
                <button type="button" onclick="closeCategoryModal()" class="btn btn-secondary">Cancel</button>
                <button type="submit" id="catSubmitBtn" class="btn btn-primary">Save Category</button>
            </div>
        </form>
    </div>
</div>
@endpush

@push('scripts')
<script>
function openCreateCategoryModal() {
    document.getElementById('categoryModalTitle').textContent = 'Add Category';
    document.getElementById('categoryForm').action = "{{ route('admin.blog-categories.store') }}";
    document.getElementById('categoryFormMethod').value = 'POST';
    document.getElementById('catNameInput').value = '';
    document.getElementById('catSlugInput').value = '';
    document.getElementById('catDescInput').value = '';
    document.getElementById('catOrderInput').value = '0';
    document.getElementById('catActiveInput').checked = true;
    document.getElementById('catSubmitBtn').textContent = 'Create Category';

    const modal = document.getElementById('categoryModal');
    modal.style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function openEditCategoryModal(item) {
    document.getElementById('categoryModalTitle').textContent = 'Edit Category';
    document.getElementById('categoryForm').action = '/admin/blog-categories/' + item.id;
    document.getElementById('categoryFormMethod').value = 'PUT';
    document.getElementById('catNameInput').value = item.name;
    document.getElementById('catSlugInput').value = item.slug;
    document.getElementById('catDescInput').value = item.description || '';
    document.getElementById('catOrderInput').value = item.sort_order || 0;
    document.getElementById('catActiveInput').checked = item.is_active;
    document.getElementById('catSubmitBtn').textContent = 'Update Category';

    const modal = document.getElementById('categoryModal');
    modal.style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function closeCategoryModal() {
    const modal = document.getElementById('categoryModal');
    modal.style.display = 'none';
    document.body.style.overflow = '';
}
</script>
@endpush
