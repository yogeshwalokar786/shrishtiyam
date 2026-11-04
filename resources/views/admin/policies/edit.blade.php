@extends('layouts.admin')

@section('title', 'Edit Policy')
@section('page_title', 'Edit Policy')

@section('content')
<div class="content-header" style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 24px;">
    <div>
        <h1 class="page-title">Edit Policy</h1>
    </div>
    <div style="display: flex; gap: 10px; align-items: center;">
        @if($policy->is_published)
            <a href="{{ $policy->url }}" target="_blank" class="btn btn-secondary" style="text-decoration: none;">
                View Live Page ↗
            </a>
        @endif
        <a href="{{ route('admin.policies.index') }}" class="btn btn-secondary" style="text-decoration: none;">
            &larr; Back to Policies
        </a>
    </div>
</div>

<div class="card" style="max-width: 900px; padding: 28px;">
    <form action="{{ route('admin.policies.update', $policy->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Title -->
        <div class="form-group" style="margin-bottom: 20px;">
            <label for="title" class="form-label" style="display: block; font-weight: 700; margin-bottom: 8px;">
                Policy Title <span style="color: #ef4444;">*</span>
            </label>
            <input 
                type="text" 
                id="title" 
                name="title" 
                class="form-control" 
                value="{{ old('title', $policy->title) }}" 
                required
                style="width: 100%; padding: 10px 14px; font-size: 0.95rem; border: 1px solid var(--border-medium); border-radius: var(--radius-md);"
            >
            @error('title')
                <div style="color: #ef4444; font-size: 0.82rem; margin-top: 4px;">{{ $message }}</div>
            @enderror
        </div>

        <div style="display: grid; grid-template-columns: 2fr 1fr 1fr; gap: 16px; margin-bottom: 20px;">
            <!-- Custom Slug -->
            <div>
                <label for="slug" class="form-label" style="display: block; font-weight: 700; margin-bottom: 8px;">
                    URL Slug <span style="color: #ef4444;">*</span>
                </label>
                <div style="display: flex; align-items: center;">
                    <span style="background: var(--bg-surface-elevated); border: 1px solid var(--border-medium); border-right: none; padding: 10px 12px; font-size: 0.85rem; color: var(--text-muted); border-radius: var(--radius-md) 0 0 var(--radius-md); font-family: var(--font-mono);">
                        /policy/
                    </span>
                    <input 
                        type="text" 
                        id="slug" 
                        name="slug" 
                        class="form-control" 
                        value="{{ old('slug', $policy->slug) }}" 
                        required
                        style="width: 100%; padding: 10px 14px; font-size: 0.9rem; border: 1px solid var(--border-medium); border-radius: 0 var(--radius-md) var(--radius-md) 0;"
                    >
                </div>
                @error('slug')
                    <div style="color: #ef4444; font-size: 0.82rem; margin-top: 4px;">{{ $message }}</div>
                @enderror
            </div>

            <!-- Sort Order -->
            <div>
                <label for="sort_order" class="form-label" style="display: block; font-weight: 700; margin-bottom: 8px;">
                    Display Order
                </label>
                <input 
                    type="number" 
                    id="sort_order" 
                    name="sort_order" 
                    class="form-control" 
                    value="{{ old('sort_order', $policy->sort_order) }}" 
                    style="width: 100%; padding: 10px 14px; font-size: 0.95rem; border: 1px solid var(--border-medium); border-radius: var(--radius-md);"
                >
            </div>

            <!-- Published Status -->
            <div>
                <label for="is_published" class="form-label" style="display: block; font-weight: 700; margin-bottom: 8px;">
                    Status
                </label>
                <select name="is_published" id="is_published" class="form-control" style="width: 100%; padding: 10px 14px; font-size: 0.95rem; border: 1px solid var(--border-medium); border-radius: var(--radius-md); background: #ffffff;">
                    <option value="1" {{ old('is_published', $policy->is_published ? '1' : '0') == '1' ? 'selected' : '' }}>Published</option>
                    <option value="0" {{ old('is_published', $policy->is_published ? '1' : '0') == '0' ? 'selected' : '' }}>Draft</option>
                </select>
            </div>
        </div>

        <!-- Meta Description (SEO) -->
        <div class="form-group" style="margin-bottom: 20px;">
            <label for="meta_description" class="form-label" style="display: block; font-weight: 700; margin-bottom: 8px;">
                Meta Description
            </label>
            <input 
                type="text" 
                id="meta_description" 
                name="meta_description" 
                class="form-control" 
                value="{{ old('meta_description', $policy->meta_description) }}" 
                placeholder="Meta description" 
                style="width: 100%; padding: 10px 14px; font-size: 0.9rem; border: 1px solid var(--border-medium); border-radius: var(--radius-md);"
            >
            @error('meta_description')
                <div style="color: #ef4444; font-size: 0.82rem; margin-top: 4px;">{{ $message }}</div>
            @enderror
        </div>

        <!-- Content -->
        <div class="form-group" style="margin-bottom: 28px;">
            <label for="content" class="form-label" style="display: block; font-weight: 700; margin-bottom: 8px;">
                Policy Content <span style="color: #ef4444;">*</span>
            </label>
            <textarea 
                id="content" 
                name="content" 
                rows="16" 
                class="form-control" 
                required
                style="width: 100%; padding: 14px; font-size: 0.92rem; line-height: 1.6; border: 1px solid var(--border-medium); border-radius: var(--radius-md); font-family: var(--font-sans);"
            >{{ old('content', $policy->content) }}</textarea>
            @error('content')
                <div style="color: #ef4444; font-size: 0.82rem; margin-top: 4px;">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit Buttons -->
        <div style="display: flex; gap: 12px; align-items: center; border-top: 1px solid var(--border-medium); padding-top: 20px;">
            <button type="submit" class="btn btn-primary" style="padding: 11px 26px;">
                Update Policy
            </button>
            <a href="{{ route('admin.policies.index') }}" class="btn btn-secondary">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
