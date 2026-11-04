@extends('layouts.admin')

@section('title', 'Add Blog Article')
@section('page_title', 'Add Blog Article')

@section('content')
<div class="content-header" style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 24px;">
    <div>
        <h1 class="page-title">Add Blog Article</h1>
    </div>
    <div>
        <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary" style="display: inline-flex; align-items: center; gap: 6px; text-decoration: none;">
            <span>← Back to Articles</span>
        </a>
    </div>
</div>

<form method="POST" action="{{ route('admin.blogs.store') }}" enctype="multipart/form-data">
    @csrf

    <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 24px; align-items: start;">
        <!-- Left Main Column -->
        <div style="display: flex; flex-direction: column; gap: 24px;">
            <!-- Article Body Details -->
            <div class="card" style="padding: 24px;">
                <h3 style="font-size: 1.15rem; margin-bottom: 20px; color: var(--text-main);">Article Content</h3>

                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-size: 0.86rem; font-weight: 600; margin-bottom: 6px;">
                        Article Title <span style="color: #ef4444;">*</span>
                    </label>
                    <input type="text" name="title" id="blogTitleInput" value="{{ old('title') }}" required
                           class="form-control" placeholder="e.g. Navigating New EPR Mandates: A Strategic Roadmap" 
                           style="width: 100%; font-size: 1rem; padding: 10px 14px;">
                    @error('title')
                        <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
                    @enderror
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-size: 0.86rem; font-weight: 600; margin-bottom: 6px;">
                        URL Slug (Optional)
                    </label>
                    <div style="display: flex; align-items: center; gap: 6px;">
                        <span style="font-size: 0.85rem; color: var(--text-muted); font-family: var(--font-mono);">/blog/</span>
                        <input type="text" name="slug" id="blogSlugInput" value="{{ old('slug') }}"
                               class="form-control" placeholder="e.g. navigating-new-epr-mandates" 
                               style="flex: 1; padding: 8px 12px; font-size: 0.88rem;">
                    </div>
                    @error('slug')
                        <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
                    @enderror
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-size: 0.86rem; font-weight: 600; margin-bottom: 6px;">
                        Short Excerpt / Summary
                    </label>
                    <textarea name="excerpt" rows="3" class="form-control" 
                              placeholder="Excerpt" 
                              style="width: 100%; font-size: 0.9rem; line-height: 1.5;">{{ old('excerpt') }}</textarea>
                    @error('excerpt')
                        <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
                    @enderror
                </div>

                <div style="margin-bottom: 12px;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
                        <label style="font-size: 0.86rem; font-weight: 600;">
                            Full Article Content <span style="color: #ef4444;">*</span>
                        </label>
                        <div style="display: flex; gap: 8px;">
                            <button type="button" onclick="triggerEditorMediaPicker()" class="btn btn-secondary btn-sm" style="padding: 4px 10px; font-size: 0.78rem; display: flex; align-items: center; gap: 5px;">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                    <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                    <polyline points="21 15 16 10 5 21"></polyline>
                                </svg>
                                <span>Media Manager</span>
                            </button>
                            <button type="button" id="htmlToggleBtn" onclick="toggleHtmlMode()" class="btn btn-secondary btn-sm" style="padding: 4px 10px; font-size: 0.78rem;">
                                &lt;/&gt; HTML Source
                            </button>
                        </div>
                    </div>

                    <!-- Visual WYSIWYG Quill Editor Container -->
                    <div id="quillWrapper">
                        <div id="quillEditor" style="min-height: 320px;"></div>
                    </div>

                    <!-- Raw Code / Synchronized Textarea Container -->
                    <div id="codeEditorContainer" style="display: none;">
                        <textarea name="content" id="articleContent" rows="18" class="form-control" 
                                  placeholder="Write your article content here..." 
                                  style="width: 100%; font-size: 0.9rem; line-height: 1.6; font-family: var(--font-mono);">{{ old('content') }}</textarea>
                    </div>

                    @error('content')
                        <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- SEO Card -->
            <div class="card" style="padding: 24px;">
                <h3 style="font-size: 1.15rem; margin-bottom: 18px; color: var(--text-main);">SEO Metadata (Optional)</h3>

                <div style="margin-bottom: 18px;">
                    <label class="form-label">
                        <span>Meta Title</span>
                    </label>
                    <input type="text" name="meta_title" id="metaTitleInput" value="{{ old('meta_title') }}" class="form-control" 
                           placeholder="Meta title" style="width: 100%;">
                </div>

                <div>
                    <label style="display: block; font-size: 0.86rem; font-weight: 600; margin-bottom: 6px;">Meta Description</label>
                    <textarea name="meta_description" rows="2" class="form-control" 
                              placeholder="Search engine snippet description..." style="width: 100%;">{{ old('meta_description') }}</textarea>
                </div>
            </div>
        </div>

        <!-- Right Sidebar Settings -->
        <div style="display: flex; flex-direction: column; gap: 24px;">
            <!-- Publishing & Status -->
            <div class="card" style="padding: 24px;">
                <h3 style="font-size: 1.05rem; margin-bottom: 18px; color: var(--text-main);">Publishing</h3>

                <div style="margin-bottom: 18px;">
                    <label style="display: flex; align-items: center; gap: 10px; cursor: pointer; font-size: 0.9rem; font-weight: 600;">
                        <input type="checkbox" name="is_published" value="1" {{ old('is_published', '1') ? 'checked' : '' }} 
                               style="width: 18px; height: 18px; accent-color: var(--primary);">
                        <span>Published (Visible on site)</span>
                    </label>
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: flex; align-items: center; gap: 10px; cursor: pointer; font-size: 0.9rem; font-weight: 600;">
                        <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }} 
                               style="width: 18px; height: 18px; accent-color: #8b5cf6;">
                        <span>Featured Lead Article</span>
                    </label>
                </div>

                <div style="border-top: 1px solid var(--border-medium); padding-top: 18px; display: flex; flex-direction: column; gap: 10px;">
                    <button type="submit" class="btn btn-primary" style="width: 100%; justify-content: center; padding: 10px;">
                        Save & Publish Article
                    </button>
                    <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary" style="width: 100%; text-align: center; text-decoration: none;">
                        Cancel
                    </a>
                </div>
            </div>

            <!-- Category Assignment -->
            <div class="card" style="padding: 24px;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
                    <h3 style="font-size: 1.05rem; color: var(--text-main); margin: 0;">Category</h3>
                    <a href="{{ route('admin.blog-categories.index') }}" target="_blank" style="font-size: 0.8rem; color: var(--primary); text-decoration: none;">
                        + Manage
                    </a>
                </div>

                <div>
                    <select name="category_id" class="form-control" style="width: 100%; padding: 9px 12px; font-size: 0.88rem;">
                        <option value="">Select Category</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Featured Image (Unified Media Manager Integration) -->
            <div class="card" style="padding: 24px;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 14px;">
                    <h3 style="font-size: 1.05rem; margin: 0; color: var(--text-main);">Featured Image</h3>
                    <span id="featuredImageBadge" class="badge badge-primary" style="display: {{ old('image_url') ? 'inline-flex' : 'none' }}; font-size: 0.72rem;">Selected</span>
                </div>

                <!-- Live Preview & Display Box -->
                <div id="featuredImagePreviewBox" style="position: relative; border-radius: var(--radius-md); overflow: hidden; border: 1.5px dashed var(--border-medium); background: var(--bg-surface-elevated); margin-bottom: 14px; min-height: 160px; display: flex; flex-direction: column; align-items: center; justify-content: center; text-align: center; transition: all 0.2s ease;">
                    
                    <!-- Image container when image is set -->
                    <div id="featuredImageContainer" style="display: {{ old('image_url') ? 'block' : 'none' }}; width: 100%; position: relative;">
                        <img id="featuredImagePreview" src="{{ old('image_url') }}" alt="Featured Image Preview" style="width: 100%; height: 180px; object-fit: cover; display: block;">
                        <div style="position: absolute; inset: 0; background: linear-gradient(to top, rgba(15, 23, 42, 0.7) 0%, transparent 60%); display: flex; align-items: flex-end; justify-content: space-between; padding: 12px 14px;">
                            <span id="featuredImageFilename" style="color: #ffffff; font-size: 0.78rem; font-family: var(--font-mono); text-shadow: 0 1px 2px rgba(0,0,0,0.6); max-width: 70%; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                {{ old('image_url') }}
                            </span>
                            <button type="button" onclick="removeFeaturedImage()" class="btn btn-sm btn-danger" style="padding: 4px 8px; font-size: 0.75rem; border-radius: 6px;">
                                ✕ Remove
                            </button>
                        </div>
                    </div>

                    <!-- Empty state placeholder when no image is set -->
                    <div id="featuredImagePlaceholder" style="display: {{ old('image_url') ? 'none' : 'flex' }}; flex-direction: column; align-items: center; justify-content: center; padding: 24px 16px; width: 100%; gap: 10px;">
                        <div style="width: 44px; height: 44px; border-radius: 10px; background: rgba(79, 70, 229, 0.1); color: var(--primary); display: flex; align-items: center; justify-content: center;">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                <polyline points="21 15 16 10 5 21"></polyline>
                            </svg>
                        </div>
                        <div style="font-size: 0.88rem; font-weight: 600; color: var(--text-main);">No featured image chosen</div>
                    </div>
                </div>

                <!-- Primary Action Buttons -->
                <div style="display: flex; gap: 8px; margin-bottom: 12px;">
                    <button type="button" onclick="chooseFeaturedImageFromMedia()" class="btn btn-secondary" style="flex: 1; justify-content: center; font-size: 0.82rem; padding: 8px 12px; gap: 6px;">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                            <circle cx="8.5" cy="8.5" r="1.5"></circle>
                            <polyline points="21 15 16 10 5 21"></polyline>
                        </svg>
                        <span>Choose from Media Manager</span>
                    </button>
                    <button type="button" onclick="document.getElementById('featuredImageFileInput').click()" class="btn btn-secondary" style="padding: 8px 12px; font-size: 0.82rem;" title="Upload new image from your computer">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                            <polyline points="17 8 12 3 7 8"></polyline>
                            <line x1="12" y1="3" x2="12" y2="15"></line>
                        </svg>
                    </button>
                </div>

                <!-- Hidden inputs maintaining complete form submission compatibility -->
                <input type="file" name="image_file" id="featuredImageFileInput" accept="image/*" style="display: none;" onchange="handleFeaturedFileUpload(this)">
                <input type="hidden" name="image_url" id="featuredImageUrlInput" value="{{ old('image_url') }}">

                @error('image_file')
                    <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
                @enderror
                @error('image_url')
                    <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
                @enderror

                <!-- Collapsible manual path/URL accordion for advanced users -->
                <div style="margin-top: 10px; border-top: 1px solid var(--border-subtle); padding-top: 10px;">
                    <details style="font-size: 0.78rem; color: var(--text-muted);">
                        <summary style="cursor: pointer; user-select: none; font-weight: 500;">Direct Image URL / Path (Advanced)</summary>
                        <div style="margin-top: 8px;">
                            <input type="text" id="manualImageUrlInput" value="{{ old('image_url') }}" class="form-control form-control-sm" 
                                   placeholder="e.g. /assets/images/blog-cpcb-epr.jpg or /storage/media/..." 
                                   oninput="handleManualUrlChange(this.value)" style="font-size: 0.78rem;">
                        </div>
                    </details>
                </div>
            </div>

            <!-- Author & Attribution -->
            <div class="card" style="padding: 24px;">
                <h3 style="font-size: 1.05rem; margin-bottom: 16px; color: var(--text-main);">Author & Attribution</h3>

                <div style="margin-bottom: 16px;">
                    <label class="form-label">
                        <span>Author Name</span>
                    </label>
                    <input type="text" name="author_name" value="{{ old('author_name', Auth::user()->name ?? 'Admin') }}" 
                           class="form-control" style="width: 100%;">
                </div>

                <div style="margin-bottom: 0;">
                    <label class="form-label">
                        <span>Author Role / Title</span>
                    </label>
                    <input type="text" name="author_role" value="{{ old('author_role', Auth::user()->job_title ?? 'Admin') }}" 
                           placeholder="Role / Title" class="form-control" style="width: 100%;">
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Include Reusable Internal Media Manager Modal -->
@include('partials.admin.media-picker-modal')

@push('styles')
<!-- Quill WYSIWYG Editor Styles -->
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet">
<style>
.ql-toolbar.ql-snow {
    background: var(--bg-surface-elevated);
    border-color: var(--border-medium);
    border-top-left-radius: var(--radius-md);
    border-top-right-radius: var(--radius-md);
    padding: 10px 14px;
}
.ql-container.ql-snow {
    border-color: var(--border-medium);
    border-bottom-left-radius: var(--radius-md);
    border-bottom-right-radius: var(--radius-md);
    background: #ffffff;
    font-family: inherit;
    font-size: 0.95rem;
}
.ql-editor {
    min-height: 320px;
    line-height: 1.7;
    color: var(--text-main);
}
.ql-editor.ql-blank::before {
    color: var(--text-muted);
    font-style: normal;
}
</style>
@endpush

@push('scripts')
<!-- Quill WYSIWYG Editor Script -->
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // 1. Initialize Quill Editor
    const quill = new Quill('#quillEditor', {
        theme: 'snow',
        placeholder: 'Write your article content, paragraphs, headings, and quotes here...',
        modules: {
            toolbar: [
                [{ 'header': [2, 3, 4, false] }],
                ['bold', 'italic', 'underline', 'strike'],
                [{ 'color': [] }, { 'background': [] }],
                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                ['blockquote', 'code-block'],
                [{ 'align': [] }],
                ['link', 'image'],
                ['clean']
            ]
        }
    });

    // Custom Toolbar Image Handler: click media icon to open internal media manager modal!
    const toolbar = quill.getModule('toolbar');
    toolbar.addHandler('image', function() {
        triggerEditorMediaPicker();
    });

    // Helper: open media picker and insert chosen image into Quill editor
    window.triggerEditorMediaPicker = function() {
        const range = quill.getSelection(true) || { index: quill.getLength() };
        openMediaPickerModal(function(selected) {
            quill.insertEmbed(range.index, 'image', selected.url);
            quill.setSelection(range.index + 1);
        }, {
            buttonText: 'Insert into Article',
            showAlt: true
        });
    };

    // Helper: update featured image preview and state
    function updateFeaturedPreview(url, filename) {
        const previewImg = document.getElementById('featuredImagePreview');
        const nameLabel = document.getElementById('featuredImageFilename');
        const container = document.getElementById('featuredImageContainer');
        const placeholder = document.getElementById('featuredImagePlaceholder');
        const badge = document.getElementById('featuredImageBadge');
        const manualInput = document.getElementById('manualImageUrlInput');
        const previewBox = document.getElementById('featuredImagePreviewBox');

        if (url) {
            if (previewImg) previewImg.src = url;
            if (nameLabel) nameLabel.textContent = filename || url.split('/').pop();
            if (container) container.style.display = 'block';
            if (placeholder) placeholder.style.display = 'none';
            if (badge) badge.style.display = 'inline-flex';
            if (manualInput) manualInput.value = url;
            if (previewBox) previewBox.style.borderStyle = 'solid';
        } else {
            if (previewImg) previewImg.src = '';
            if (container) container.style.display = 'none';
            if (placeholder) placeholder.style.display = 'flex';
            if (badge) badge.style.display = 'none';
            if (manualInput) manualInput.value = '';
            if (previewBox) previewBox.style.borderStyle = 'dashed';
        }
    }

    // Helper: select image from media library for featured image input
    window.chooseFeaturedImageFromMedia = function() {
        openMediaPickerModal(function(selected) {
            const featuredInput = document.getElementById('featuredImageUrlInput');
            const fileInput = document.getElementById('featuredImageFileInput');
            if (featuredInput) {
                featuredInput.value = selected.url;
            }
            if (fileInput) {
                fileInput.value = '';
            }
            updateFeaturedPreview(selected.url, selected.name || selected.filename);
        }, {
            buttonText: 'Set as Featured Image',
            showAlt: false
        });
    };

    // Helper: handle local file selection with instant preview
    window.handleFeaturedFileUpload = function(input) {
        if (input.files && input.files[0]) {
            const file = input.files[0];
            const reader = new FileReader();
            reader.onload = function(e) {
                const featuredInput = document.getElementById('featuredImageUrlInput');
                if (featuredInput) {
                    featuredInput.value = '';
                }
                updateFeaturedPreview(e.target.result, file.name + ' (' + (file.size / 1024).toFixed(0) + ' KB)');
            };
            reader.readAsDataURL(file);
        }
    };

    // Helper: remove selected featured image
    window.removeFeaturedImage = function() {
        const featuredInput = document.getElementById('featuredImageUrlInput');
        const fileInput = document.getElementById('featuredImageFileInput');
        if (featuredInput) featuredInput.value = '';
        if (fileInput) fileInput.value = '';
        updateFeaturedPreview('', '');
    };

    // Helper: handle manual URL typing
    window.handleManualUrlChange = function(val) {
        const featuredInput = document.getElementById('featuredImageUrlInput');
        const fileInput = document.getElementById('featuredImageFileInput');
        if (fileInput) fileInput.value = '';
        if (featuredInput) featuredInput.value = val.trim();
        if (val.trim()) {
            updateFeaturedPreview(val.trim(), val.trim());
        } else {
            updateFeaturedPreview('', '');
        }
    };

    const textarea = document.getElementById('articleContent');

    // Populate initial content if present
    if (textarea.value.trim().length > 0) {
        quill.root.innerHTML = textarea.value;
    }

    // Keep textarea synced on every text change
    quill.on('text-change', function() {
        textarea.value = quill.root.innerHTML;
    });

    // Ensure synced on form submission
    const form = textarea.closest('form');
    if (form) {
        form.addEventListener('submit', function() {
            const codeContainer = document.getElementById('codeEditorContainer');
            if (codeContainer && codeContainer.style.display !== 'none') {
                // Currently in raw HTML mode - use textarea content directly
            } else {
                textarea.value = quill.root.innerHTML;
            }
        });
    }

    // 2. Toggle Raw HTML Mode
    window.toggleHtmlMode = function() {
        const qContainer = document.getElementById('quillWrapper');
        const cContainer = document.getElementById('codeEditorContainer');
        const toggleBtn = document.getElementById('htmlToggleBtn');

        if (cContainer.style.display === 'none') {
            // Switch to raw HTML code mode
            textarea.value = quill.root.innerHTML;
            qContainer.style.display = 'none';
            cContainer.style.display = 'block';
            toggleBtn.textContent = '👁 Visual Editor';
            toggleBtn.classList.add('btn-primary');
            toggleBtn.classList.remove('btn-secondary');
        } else {
            // Switch back to WYSIWYG visual mode
            quill.root.innerHTML = textarea.value;
            cContainer.style.display = 'none';
            qContainer.style.display = 'block';
            toggleBtn.textContent = '</> HTML Source';
            toggleBtn.classList.remove('btn-primary');
            toggleBtn.classList.add('btn-secondary');
        }
    };

    // 3. Auto-fill slug and meta title if user hasn't explicitly typed one
    const titleInput = document.getElementById('blogTitleInput');
    const slugInput = document.getElementById('blogSlugInput');
    const metaTitleInput = document.getElementById('metaTitleInput');
    let slugManuallyChanged = false;
    let metaTitleManuallyChanged = false;

    if (metaTitleInput) {
        metaTitleInput.addEventListener('input', function() {
            metaTitleManuallyChanged = this.value.trim().length > 0;
        });
    }

    if (slugInput && titleInput) {
        slugInput.addEventListener('input', function() {
            slugManuallyChanged = this.value.trim().length > 0;
        });

        titleInput.addEventListener('input', function() {
            if (!slugManuallyChanged) {
                slugInput.value = this.value
                    .toLowerCase()
                    .replace(/[^\w\s-]/g, '')
                    .replace(/[\s_-]+/g, '-')
                    .replace(/^-+|-+$/g, '');
            }
            if (metaTitleInput && !metaTitleManuallyChanged) {
                metaTitleInput.value = this.value;
            }
        });
    }
});
</script>
@endpush
@endsection
