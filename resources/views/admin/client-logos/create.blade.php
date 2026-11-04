@extends('layouts.admin')

@section('title', 'Add Client Logo')
@section('page_title', 'Add Client Logo')

@section('content')
<div class="content-header" style="margin-bottom: 24px;">
    <div style="display: flex; align-items: center; gap: 12px;">
        <a href="{{ route('admin.client-logos.index') }}" class="btn btn-secondary" style="padding: 8px 12px; display: inline-flex; align-items: center; gap: 6px; text-decoration: none;" title="Back to Client Logos">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                <line x1="19" y1="12" x2="5" y2="12"></line>
                <polyline points="12 19 5 12 12 5"></polyline>
            </svg>
            <span>Back</span>
        </a>
        <div>
            <h1 class="page-title" style="margin: 0;">Add Client Logo</h1>
            <p style="color: var(--text-muted); font-size: 0.88rem; margin: 4px 0 0 0;">
                Add a new partner or enterprise client brand logo to the website marquee slider.
            </p>
        </div>
    </div>
</div>

<form action="{{ route('admin.client-logos.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 24px; align-items: flex-start;">
        <!-- Left Column: Client Details -->
        <div style="display: flex; flex-direction: column; gap: 24px;">
            <div class="card" style="padding: 24px;">
                <h3 style="font-size: 1.15rem; margin-bottom: 20px; color: var(--text-main);">Brand & Organization Information</h3>

                <!-- Client Name -->
                <div style="margin-bottom: 20px;">
                    <label class="form-label" style="display: block; font-size: 0.86rem; font-weight: 600; margin-bottom: 6px;">
                        Client / Brand Name <span style="color: #ef4444;">*</span>
                    </label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" 
                           placeholder="e.g. Aura Beverages, EcoPack Global, Nexus Automotive" required style="width: 100%;">
                    @error('name')
                        <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Website URL -->
                <div style="margin-bottom: 0;">
                    <label class="form-label" style="display: block; font-size: 0.86rem; font-weight: 600; margin-bottom: 6px;">
                        Website URL <span style="font-weight: 400; color: var(--text-muted); font-size: 0.8rem;">(Optional - provides clickable outbound link)</span>
                    </label>
                    <input type="url" name="website_url" value="{{ old('website_url') }}" class="form-control" 
                           placeholder="https://example.com" style="width: 100%;">
                    <p style="font-size: 0.78rem; color: var(--text-muted); margin-top: 5px;">
                        If provided, clicking the logo on the website will navigate visitors to this URL in a new tab.
                    </p>
                    @error('website_url')
                        <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Right Column: Display Settings & Logo Image -->
        <div style="display: flex; flex-direction: column; gap: 24px;">
            <!-- Publishing & Status Card -->
            <div class="card" style="padding: 24px;">
                <h3 style="font-size: 1.05rem; margin-bottom: 18px; color: var(--text-main);">Display Settings</h3>

                <div style="margin-bottom: 18px;">
                    <label style="display: flex; align-items: center; gap: 10px; cursor: pointer; font-size: 0.9rem; font-weight: 600;">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', '1') ? 'checked' : '' }} 
                                style="width: 18px; height: 18px; accent-color: var(--primary);">
                        <span>Active on Website Marquee</span>
                    </label>
                    <p style="font-size: 0.8rem; color: var(--text-muted); margin: 4px 0 0 28px;">
                        Uncheck to temporarily hide from the homepage carousel without deleting.
                    </p>
                </div>

                <div style="margin-bottom: 20px;">
                    <label class="form-label" style="display: block; font-size: 0.86rem; font-weight: 600; margin-bottom: 6px;">
                        Display Order (Sort Order)
                    </label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $nextOrder ?? 0) }}" class="form-control" 
                           placeholder="0" style="width: 100%;">
                    <p style="font-size: 0.78rem; color: var(--text-muted); margin-top: 4px;">
                        Lower numbers appear first in the scrolling sequence.
                    </p>
                    @error('sort_order')
                        <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
                    @enderror
                </div>

                <div style="border-top: 1px solid var(--border-medium); padding-top: 18px; display: flex; flex-direction: column; gap: 10px;">
                    <button type="submit" class="btn btn-primary" style="width: 100%; justify-content: center; padding: 10px;">
                        Save Client Logo
                    </button>
                    <a href="{{ route('admin.client-logos.index') }}" class="btn btn-secondary" style="width: 100%; text-align: center; text-decoration: none;">
                        Cancel
                    </a>
                </div>
            </div>

            <!-- Client Logo Image Card -->
            <div class="card" style="padding: 24px;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 14px;">
                    <h3 style="font-size: 1.05rem; margin: 0; color: var(--text-main);">Logo Image <span style="color: #ef4444;">*</span></h3>
                    <span id="logoBadge" class="badge badge-primary" style="display: {{ old('logo_path') ? 'inline-flex' : 'none' }}; font-size: 0.72rem;">Selected</span>
                </div>

                <!-- Live Preview & Display Box -->
                <div id="logoPreviewBox" style="position: relative; border-radius: var(--radius-md); overflow: hidden; border: 1.5px dashed var(--border-medium); background: #ffffff; margin-bottom: 14px; min-height: 120px; display: flex; flex-direction: column; align-items: center; justify-content: center; text-align: center; transition: all 0.2s ease;">
                    
                    <!-- Logo image container when image is chosen -->
                    <div id="logoContainer" style="display: {{ old('logo_path') ? 'flex' : 'none' }}; flex-direction: column; align-items: center; justify-content: center; padding: 16px; width: 100%;">
                        <div style="max-width: 100%; height: 70px; display: flex; align-items: center; justify-content: center; margin-bottom: 10px;">
                            <img id="logoPreview" src="{{ old('logo_path') }}" alt="Logo Preview" 
                                 style="max-height: 60px; max-width: 180px; object-fit: contain;">
                        </div>
                        <div id="logoFilename" style="color: var(--text-muted); font-size: 0.78rem; font-family: var(--font-mono); max-width: 90%; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; margin-bottom: 8px;">
                            {{ old('logo_path') }}
                        </div>
                        <button type="button" onclick="removeLogoImage()" class="btn btn-sm btn-danger" style="padding: 4px 10px; font-size: 0.75rem; border-radius: 6px;">
                            ✕ Remove Logo
                        </button>
                    </div>

                    <!-- Placeholder when no image is selected -->
                    <div id="logoPlaceholder" style="display: {{ old('logo_path') ? 'none' : 'flex' }}; flex-direction: column; align-items: center; justify-content: center; padding: 24px 16px; width: 100%; gap: 8px;">
                        <div style="width: 46px; height: 46px; border-radius: 50%; background: rgba(5, 150, 105, 0.1); color: var(--primary); display: flex; align-items: center; justify-content: center;">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                <polyline points="21 15 16 10 5 21"></polyline>
                            </svg>
                        </div>
                        <div style="font-size: 0.85rem; font-weight: 600; color: var(--text-main);">No logo selected</div>
                        <p style="font-size: 0.75rem; color: var(--text-muted); margin: 0;">Upload a PNG, SVG, or WebP logo file (transparent background recommended).</p>
                    </div>
                </div>

                <!-- Primary Action Buttons -->
                <div style="display: flex; gap: 8px; margin-bottom: 12px;">
                    <button type="button" onclick="chooseLogoFromMedia()" class="btn btn-secondary" style="flex: 1; justify-content: center; font-size: 0.82rem; padding: 8px 12px; gap: 6px;">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                            <circle cx="8.5" cy="8.5" r="1.5"></circle>
                            <polyline points="21 15 16 10 5 21"></polyline>
                        </svg>
                        <span>Choose from Media</span>
                    </button>
                    <button type="button" onclick="document.getElementById('logoFileInput').click()" class="btn btn-secondary" style="padding: 8px 12px; font-size: 0.82rem;" title="Upload logo from device">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                            <polyline points="17 8 12 3 7 8"></polyline>
                            <line x1="12" y1="3" x2="12" y2="15"></line>
                        </svg>
                    </button>
                </div>

                <!-- Hidden inputs for file upload and chosen URL -->
                <input type="file" name="logo_file" id="logoFileInput" accept="image/*" style="display: none;" onchange="handleLogoFileUpload(this)">
                <input type="hidden" name="logo_path" id="logoPathInput" value="{{ old('logo_path') }}">

                @error('logo_file')
                    <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
                @enderror
                @error('logo_path')
                    <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
                @enderror

                <!-- Collapsible direct path accordion -->
                <div style="margin-top: 10px; border-top: 1px solid var(--border-subtle); padding-top: 10px;">
                    <details style="font-size: 0.78rem; color: var(--text-muted);">
                        <summary style="cursor: pointer; user-select: none; font-weight: 500;">Direct Image Path / URL (Advanced)</summary>
                        <div style="margin-top: 8px;">
                            <input type="text" id="manualLogoUrlInput" value="{{ old('logo_path') }}" class="form-control form-control-sm" 
                                   placeholder="e.g. /assets/logos/logo-aura.png" 
                                   oninput="handleManualLogoUrlChange(this.value)" style="font-size: 0.78rem;">
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
    function updateLogoPreview(url, filename) {
        const previewImg = document.getElementById('logoPreview');
        const nameLabel = document.getElementById('logoFilename');
        const container = document.getElementById('logoContainer');
        const placeholder = document.getElementById('logoPlaceholder');
        const badge = document.getElementById('logoBadge');
        const manualInput = document.getElementById('manualLogoUrlInput');
        const previewBox = document.getElementById('logoPreviewBox');

        if (url) {
            if (previewImg) previewImg.src = url;
            if (nameLabel) nameLabel.textContent = filename || url.split('/').pop();
            if (container) container.style.display = 'flex';
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

    // Media Manager integration
    window.chooseLogoFromMedia = function() {
        openMediaPickerModal(function(selected) {
            const pathInput = document.getElementById('logoPathInput');
            const fileInput = document.getElementById('logoFileInput');
            if (pathInput) {
                pathInput.value = selected.url;
            }
            if (fileInput) {
                fileInput.value = '';
            }
            updateLogoPreview(selected.url, selected.name || selected.filename);
        }, {
            buttonText: 'Set as Client Logo',
            showAlt: false
        });
    };

    // File input change handler with FileReader preview
    window.handleLogoFileUpload = function(input) {
        if (input.files && input.files[0]) {
            const file = input.files[0];
            const reader = new FileReader();
            reader.onload = function(e) {
                const pathInput = document.getElementById('logoPathInput');
                if (pathInput) {
                    pathInput.value = '';
                }
                updateLogoPreview(e.target.result, file.name + ' (' + (file.size / 1024).toFixed(0) + ' KB)');
            };
            reader.readAsDataURL(file);
        }
    };

    // Remove logo
    window.removeLogoImage = function() {
        const pathInput = document.getElementById('logoPathInput');
        const fileInput = document.getElementById('logoFileInput');
        if (pathInput) pathInput.value = '';
        if (fileInput) fileInput.value = '';
        updateLogoPreview('', '');
    };

    // Manual input typing
    window.handleManualLogoUrlChange = function(val) {
        const pathInput = document.getElementById('logoPathInput');
        const fileInput = document.getElementById('logoFileInput');
        if (fileInput) fileInput.value = '';
        if (pathInput) pathInput.value = val.trim();
        if (val.trim()) {
            updateLogoPreview(val.trim(), val.trim());
        } else {
            updateLogoPreview('', '');
        }
    };
});
</script>
@endpush
@endsection
