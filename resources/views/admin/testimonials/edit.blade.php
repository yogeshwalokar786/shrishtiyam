@extends('layouts.admin')

@section('title', 'Edit Testimonial - ' . $testimonial->author_name)
@section('page_title', 'Edit Client Testimonial')

@section('content')
<div class="content-header" style="margin-bottom: 24px;">
    <div style="display: flex; align-items: center; gap: 12px;">
        <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary" style="padding: 8px 12px; display: inline-flex; align-items: center; gap: 6px; text-decoration: none;" title="Back to Testimonials">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                <line x1="19" y1="12" x2="5" y2="12"></line>
                <polyline points="12 19 5 12 12 5"></polyline>
            </svg>
            <span>Back</span>
        </a>
        <div>
            <h1 class="page-title" style="margin: 0;">Edit Client Testimonial</h1>
            <p style="color: var(--text-muted); font-size: 0.88rem; margin: 4px 0 0 0;">
                Updating endorsement from <strong style="color: var(--text-main);">{{ $testimonial->author_name }}</strong>
            </p>
        </div>
    </div>
</div>

<form action="{{ route('admin.testimonials.update', $testimonial) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 24px; align-items: flex-start;">
        <!-- Left Column: Testimonial Details -->
        <div style="display: flex; flex-direction: column; gap: 24px;">
            <div class="card" style="padding: 24px;">
                <h3 style="font-size: 1.15rem; margin-bottom: 20px; color: var(--text-main);">Client & Review Information</h3>

                <!-- Client Name -->
                <div style="margin-bottom: 20px;">
                    <label class="form-label" style="display: block; font-size: 0.86rem; font-weight: 600; margin-bottom: 6px;">
                        Client / Executive Name <span style="color: #ef4444;">*</span>
                    </label>
                    <input type="text" name="author_name" value="{{ old('author_name', $testimonial->author_name) }}" class="form-control" 
                           placeholder="e.g. Jonathan Reyes or Dr. Aris Thorne" required style="width: 100%;">
                    @error('author_name')
                        <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Designation and Company (Two Columns) -->
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 20px;">
                    <div>
                        <label class="form-label" style="display: block; font-size: 0.86rem; font-weight: 600; margin-bottom: 6px;">
                            Job Title / Designation
                        </label>
                        <input type="text" name="author_title" value="{{ old('author_title', $testimonial->author_title) }}" class="form-control" 
                               placeholder="e.g. VP of Sustainable Packaging" style="width: 100%;">
                        @error('author_title')
                            <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <label class="form-label" style="display: block; font-size: 0.86rem; font-weight: 600; margin-bottom: 6px;">
                            Company / Organization
                        </label>
                        <input type="text" name="company" value="{{ old('company', $testimonial->company) }}" class="form-control" 
                               placeholder="e.g. Aura Global or Metro Smart Cities" style="width: 100%;">
                        @error('company')
                            <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Rating & Highlight Badge (Two Columns) -->
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 20px;">
                    <div>
                        <label class="form-label" style="display: block; font-size: 0.86rem; font-weight: 600; margin-bottom: 6px;">
                            Star Rating <span style="color: #ef4444;">*</span>
                        </label>
                        <select name="rating" class="form-control" style="width: 100%;" required>
                            <option value="5" {{ old('rating', $testimonial->rating) == '5' ? 'selected' : '' }}>★★★★★ (5 Stars - Exceptional)</option>
                            <option value="4" {{ old('rating', $testimonial->rating) == '4' ? 'selected' : '' }}>★★★★☆ (4 Stars - Highly Satisfied)</option>
                            <option value="3" {{ old('rating', $testimonial->rating) == '3' ? 'selected' : '' }}>★★★☆☆ (3 Stars - Good)</option>
                            <option value="2" {{ old('rating', $testimonial->rating) == '2' ? 'selected' : '' }}>★★☆☆☆ (2 Stars - Average)</option>
                            <option value="1" {{ old('rating', $testimonial->rating) == '1' ? 'selected' : '' }}>★☆☆☆☆ (1 Star - Poor)</option>
                        </select>
                        @error('rating')
                            <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <label class="form-label" style="display: block; font-size: 0.86rem; font-weight: 600; margin-bottom: 6px;">
                            Highlight Badge / Metric <span style="font-weight: 400; color: var(--text-muted); font-size: 0.8rem;">(Optional)</span>
                        </label>
                        <input type="text" name="badge" value="{{ old('badge', $testimonial->badge) }}" class="form-control" 
                               placeholder="e.g. 18,250 MT EPR Fulfilled or 99.4% Batch Purity" style="width: 100%;">
                        @error('badge')
                            <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Testimonial Quote -->
                <div style="margin-bottom: 0;">
                    <label class="form-label" style="display: block; font-size: 0.86rem; font-weight: 600; margin-bottom: 6px;">
                        Testimonial Quote / Review Text <span style="color: #ef4444;">*</span>
                    </label>
                    <textarea name="quote" rows="5" class="form-control" 
                              placeholder="Write the verified endorsement or quote provided by the client..." 
                              required style="width: 100%; font-size: 0.92rem; line-height: 1.6;">{{ old('quote', $testimonial->quote) }}</textarea>
                    @error('quote')
                        <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Right Column: Settings & Avatar Photo -->
        <div style="display: flex; flex-direction: column; gap: 24px;">
            <!-- Publishing & Status Card -->
            <div class="card" style="padding: 24px;">
                <h3 style="font-size: 1.05rem; margin-bottom: 18px; color: var(--text-main);">Display Settings</h3>

                <div style="margin-bottom: 18px;">
                    <label style="display: flex; align-items: center; gap: 10px; cursor: pointer; font-size: 0.9rem; font-weight: 600;">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $testimonial->is_active) ? 'checked' : '' }} 
                               style="width: 18px; height: 18px; accent-color: var(--primary);">
                        <span>Active on Website Carousel</span>
                    </label>
                    <p style="font-size: 0.8rem; color: var(--text-muted); margin: 4px 0 0 28px;">
                        Uncheck to temporarily hide without deleting.
                    </p>
                </div>

                <div style="margin-bottom: 20px;">
                    <label class="form-label" style="display: block; font-size: 0.86rem; font-weight: 600; margin-bottom: 6px;">
                        Display Order (Sort Order)
                    </label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $testimonial->sort_order) }}" class="form-control" 
                           placeholder="0" style="width: 100%;">
                    <p style="font-size: 0.78rem; color: var(--text-muted); margin-top: 4px;">
                        Lower numbers appear first in the carousel sequence.
                    </p>
                    @error('sort_order')
                        <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
                    @enderror
                </div>

                <div style="border-top: 1px solid var(--border-medium); padding-top: 18px; display: flex; flex-direction: column; gap: 10px;">
                    <button type="submit" class="btn btn-primary" style="width: 100%; justify-content: center; padding: 10px;">
                        Update Testimonial
                    </button>
                    <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary" style="width: 100%; text-align: center; text-decoration: none;">
                        Cancel
                    </a>
                </div>
            </div>

            <!-- Client Avatar Photo Card -->
            <div class="card" style="padding: 24px;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 14px;">
                    <h3 style="font-size: 1.05rem; margin: 0; color: var(--text-main);">Client Photo / Avatar</h3>
                    <span id="avatarBadge" class="badge badge-primary" style="display: {{ old('author_avatar', $testimonial->author_avatar) ? 'inline-flex' : 'none' }}; font-size: 0.72rem;">Selected</span>
                </div>

                <!-- Live Preview & Display Box -->
                @php
                    $currentAvatar = old('author_avatar', $testimonial->author_avatar);
                @endphp
                <div id="avatarPreviewBox" style="position: relative; border-radius: var(--radius-md); overflow: hidden; border: 1.5px {{ $currentAvatar ? 'solid' : 'dashed' }} var(--border-medium); background: var(--bg-surface-elevated); margin-bottom: 14px; min-height: 140px; display: flex; flex-direction: column; align-items: center; justify-content: center; text-align: center; transition: all 0.2s ease;">
                    
                    <!-- Avatar image container when image is chosen -->
                    <div id="avatarContainer" style="display: {{ $currentAvatar ? 'flex' : 'none' }}; flex-direction: column; align-items: center; justify-content: center; padding: 18px; width: 100%;">
                        <img id="avatarPreview" src="{{ $currentAvatar }}" alt="Avatar Preview" 
                             style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover; border: 3px solid var(--primary); margin-bottom: 10px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);"
                             onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($testimonial->author_name) }}&background=059669&color=ffffff';">
                        <div id="avatarFilename" style="color: var(--text-muted); font-size: 0.78rem; font-family: var(--font-mono); max-width: 90%; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; margin-bottom: 10px;">
                            {{ $currentAvatar }}
                        </div>
                        <button type="button" onclick="removeAvatarImage()" class="btn btn-sm btn-danger" style="padding: 4px 10px; font-size: 0.75rem; border-radius: 6px;">
                            ✕ Remove Photo
                        </button>
                    </div>

                    <!-- Placeholder when no image is selected -->
                    <div id="avatarPlaceholder" style="display: {{ $currentAvatar ? 'none' : 'flex' }}; flex-direction: column; align-items: center; justify-content: center; padding: 20px 16px; width: 100%; gap: 8px;">
                        <div style="width: 48px; height: 48px; border-radius: 50%; background: rgba(5, 150, 105, 0.1); color: var(--primary); display: flex; align-items: center; justify-content: center;">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </div>
                        <div style="font-size: 0.85rem; font-weight: 600; color: var(--text-main);">No photo selected</div>
                        <p style="font-size: 0.75rem; color: var(--text-muted); margin: 0;">Auto-generated avatar will be used if left blank.</p>
                    </div>
                </div>

                <!-- Primary Action Buttons -->
                <div style="display: flex; gap: 8px; margin-bottom: 12px;">
                    <button type="button" onclick="chooseAvatarFromMedia()" class="btn btn-secondary" style="flex: 1; justify-content: center; font-size: 0.82rem; padding: 8px 12px; gap: 6px;">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                            <circle cx="8.5" cy="8.5" r="1.5"></circle>
                            <polyline points="21 15 16 10 5 21"></polyline>
                        </svg>
                        <span>Choose from Media</span>
                    </button>
                    <button type="button" onclick="document.getElementById('avatarFileInput').click()" class="btn btn-secondary" style="padding: 8px 12px; font-size: 0.82rem;" title="Upload photo from device">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                            <polyline points="17 8 12 3 7 8"></polyline>
                            <line x1="12" y1="3" x2="12" y2="15"></line>
                        </svg>
                    </button>
                </div>

                <!-- Hidden inputs for file upload, chosen URL, and removal flag -->
                <input type="file" name="avatar_file" id="avatarFileInput" accept="image/*" style="display: none;" onchange="handleAvatarFileUpload(this)">
                <input type="hidden" name="author_avatar" id="authorAvatarInput" value="{{ $currentAvatar }}">
                <input type="hidden" name="remove_avatar" id="removeAvatarFlag" value="0">

                @error('avatar_file')
                    <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
                @enderror
                @error('author_avatar')
                    <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
                @enderror

                <!-- Collapsible direct path accordion -->
                <div style="margin-top: 10px; border-top: 1px solid var(--border-subtle); padding-top: 10px;">
                    <details style="font-size: 0.78rem; color: var(--text-muted);">
                        <summary style="cursor: pointer; user-select: none; font-weight: 500;">Direct Image URL / Path (Advanced)</summary>
                        <div style="margin-top: 8px;">
                            <input type="text" id="manualAvatarUrlInput" value="{{ $currentAvatar }}" class="form-control form-control-sm" 
                                   placeholder="e.g. /assets/avatars/avatar-1.png" 
                                   oninput="handleManualAvatarUrlChange(this.value)" style="font-size: 0.78rem;">
                        </div>
                    </details>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Include Reusable Internal Media Manager Modal -->
@include('partials.admin.media-picker-modal')

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    function updateAvatarPreview(url, filename) {
        const previewImg = document.getElementById('avatarPreview');
        const nameLabel = document.getElementById('avatarFilename');
        const container = document.getElementById('avatarContainer');
        const placeholder = document.getElementById('avatarPlaceholder');
        const badge = document.getElementById('avatarBadge');
        const manualInput = document.getElementById('manualAvatarUrlInput');
        const previewBox = document.getElementById('avatarPreviewBox');
        const removeFlag = document.getElementById('removeAvatarFlag');

        if (url) {
            if (previewImg) previewImg.src = url;
            if (nameLabel) nameLabel.textContent = filename || url.split('/').pop();
            if (container) container.style.display = 'flex';
            if (placeholder) placeholder.style.display = 'none';
            if (badge) badge.style.display = 'inline-flex';
            if (manualInput) manualInput.value = url;
            if (previewBox) previewBox.style.borderStyle = 'solid';
            if (removeFlag) removeFlag.value = '0';
        } else {
            if (previewImg) previewImg.src = '';
            if (container) container.style.display = 'none';
            if (placeholder) placeholder.style.display = 'flex';
            if (badge) badge.style.display = 'none';
            if (manualInput) manualInput.value = '';
            if (previewBox) previewBox.style.borderStyle = 'dashed';
            if (removeFlag) removeFlag.value = '1';
        }
    }

    // Media Manager integration
    window.chooseAvatarFromMedia = function() {
        openMediaPickerModal(function(selected) {
            const avatarInput = document.getElementById('authorAvatarInput');
            const fileInput = document.getElementById('avatarFileInput');
            if (avatarInput) {
                avatarInput.value = selected.url;
            }
            if (fileInput) {
                fileInput.value = '';
            }
            updateAvatarPreview(selected.url, selected.name || selected.filename);
        }, {
            buttonText: 'Set as Client Photo',
            showAlt: false
        });
    };

    // File input change handler with FileReader preview
    window.handleAvatarFileUpload = function(input) {
        if (input.files && input.files[0]) {
            const file = input.files[0];
            const reader = new FileReader();
            reader.onload = function(e) {
                const avatarInput = document.getElementById('authorAvatarInput');
                if (avatarInput) {
                    avatarInput.value = '';
                }
                updateAvatarPreview(e.target.result, file.name + ' (' + (file.size / 1024).toFixed(0) + ' KB)');
            };
            reader.readAsDataURL(file);
        }
    };

    // Remove photo
    window.removeAvatarImage = function() {
        const avatarInput = document.getElementById('authorAvatarInput');
        const fileInput = document.getElementById('avatarFileInput');
        if (avatarInput) avatarInput.value = '';
        if (fileInput) fileInput.value = '';
        updateAvatarPreview('', '');
    };

    // Manual input typing
    window.handleManualAvatarUrlChange = function(val) {
        const avatarInput = document.getElementById('authorAvatarInput');
        const fileInput = document.getElementById('avatarFileInput');
        if (fileInput) fileInput.value = '';
        if (avatarInput) avatarInput.value = val.trim();
        if (val.trim()) {
            updateAvatarPreview(val.trim(), val.trim());
        } else {
            updateAvatarPreview('', '');
        }
    };
});
</script>
@endpush
@endsection
