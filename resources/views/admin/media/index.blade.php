@extends('layouts.admin')

@section('title', 'Media')
@section('page_title', 'Media')

@section('content')
    <!-- ======================================================================
         Media Manager Header & Upload Toggle
         ====================================================================== -->
    <div class="media-header">
        <div class="media-header-left">
            <h1>Media Library</h1>
        </div>
        <div>
            <button type="button" class="btn btn-primary" id="toggleUploadBtn">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                    <polyline points="17 8 12 3 7 8"></polyline>
                    <line x1="12" y1="3" x2="12" y2="15"></line>
                </svg>
                <span>Upload Media</span>
            </button>
        </div>
    </div>

    <!-- ======================================================================
         KPI Summary Cards
         ====================================================================== -->
    <div class="media-kpi-grid">
        <!-- Total Storage -->
        <div class="kpi-card" style="padding: 20px;">
            <div class="kpi-header" style="margin-bottom: 12px;">
                <div class="kpi-icon-wrapper kpi-icon-indigo" style="width: 40px; height: 40px;">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <ellipse cx="12" cy="5" rx="9" ry="3"></ellipse>
                        <path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path>
                        <path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path>
                    </svg>
                </div>
                <span class="kpi-trend trend-up">{{ $metrics['total_count'] }} files</span>
            </div>
            <div class="kpi-title">Total Storage Used</div>
            <div class="kpi-value" style="font-size: 1.6rem; font-family: var(--font-mono);">{{ $metrics['total_size'] }}</div>
        </div>

        <!-- Photos -->
        <a href="{{ route('admin.media.index', ['type' => 'image']) }}" class="kpi-card" style="padding: 20px; display: block; text-decoration: none;">
            <div class="kpi-header" style="margin-bottom: 12px;">
                <div class="kpi-icon-wrapper kpi-icon-emerald" style="width: 40px; height: 40px;">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                        <circle cx="8.5" cy="8.5" r="1.5"></circle>
                        <polyline points="21 15 16 10 5 21"></polyline>
                    </svg>
                </div>
                <span class="badge badge-success">Photos</span>
            </div>
            <div class="kpi-title">Image Assets</div>
            <div class="kpi-value" style="font-size: 1.6rem;">{{ $metrics['images_count'] }}</div>
        </a>

        <!-- Videos -->
        <a href="{{ route('admin.media.index', ['type' => 'video']) }}" class="kpi-card" style="padding: 20px; display: block; text-decoration: none;">
            <div class="kpi-header" style="margin-bottom: 12px;">
                <div class="kpi-icon-wrapper kpi-icon-cyan" style="width: 40px; height: 40px;">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polygon points="23 7 16 12 23 17 23 7"></polygon>
                        <rect x="1" y="5" width="15" height="14" rx="2" ry="2"></rect>
                    </svg>
                </div>
                <span class="badge" style="background: var(--accent-cyan-bg); color: var(--accent-cyan);">Videos</span>
            </div>
            <div class="kpi-title">Video Assets</div>
            <div class="kpi-value" style="font-size: 1.6rem;">{{ $metrics['videos_count'] }}</div>
        </a>

        <!-- Documents -->
        <a href="{{ route('admin.media.index', ['type' => 'document']) }}" class="kpi-card" style="padding: 20px; display: block; text-decoration: none;">
            <div class="kpi-header" style="margin-bottom: 12px;">
                <div class="kpi-icon-wrapper kpi-icon-amber" style="width: 40px; height: 40px;">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                        <polyline points="14 2 14 8 20 8"></polyline>
                        <line x1="16" y1="13" x2="8" y2="13"></line>
                        <line x1="16" y1="17" x2="8" y2="17"></line>
                    </svg>
                </div>
                <span class="badge" style="background: var(--accent-amber-bg); color: var(--accent-amber);">Docs</span>
            </div>
            <div class="kpi-title">Documents & Files</div>
            <div class="kpi-value" style="font-size: 1.6rem;">{{ $metrics['documents_count'] }}</div>
        </a>
    </div>

    <!-- ======================================================================
         Upload Dropzone Container (Collapsible / Dynamic)
         ====================================================================== -->
    <div class="media-upload-card" id="uploadContainer" style="display: {{ $errors->any() ? 'block' : 'none' }};">
        <form action="{{ route('admin.media.upload') }}" method="POST" enctype="multipart/form-data" id="mediaUploadForm">
            @csrf
            <div class="media-dropzone" id="dropzoneArea">
                <input type="file" name="files[]" id="fileInput" multiple style="display: none;">
                
                <div class="media-dropzone-icon">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                        <polyline points="17 8 12 3 7 8"></polyline>
                        <line x1="12" y1="3" x2="12" y2="15"></line>
                    </svg>
                </div>
                
                <h3 class="media-dropzone-title">Drag & drop photos, videos, or documents here</h3>

                <div style="display: flex; gap: 12px; justify-content: center; align-items: center;">
                    <button type="button" class="btn btn-secondary" id="browseFilesBtn">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path>
                        </svg>
                        <span>Browse Files</span>
                    </button>

                    <button type="submit" class="btn btn-primary" id="startUploadBtn" style="display: none;">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        <span>Start Upload</span>
                    </button>
                </div>

                <!-- Selected Files List Preview -->
                <div class="media-selected-files-list" id="selectedFilesList"></div>
            </div>

            @error('files')
                <div class="field-error" style="text-align: center; margin-top: 10px;">{{ $message }}</div>
            @enderror
            @error('files.*')
                <div class="field-error" style="text-align: center; margin-top: 10px;">{{ $message }}</div>
            @enderror
        </form>
    </div>

    <!-- ======================================================================
         Filter Tabs & Search Bar
         ====================================================================== -->
    <div class="media-filter-bar">
        <div class="media-tabs">
            <a href="{{ route('admin.media.index', ['type' => 'all', 'search' => $search]) }}" 
               class="media-tab {{ $selectedType === 'all' ? 'active' : '' }}">
                <span>All Assets</span>
                <span class="media-tab-badge">{{ $metrics['total_count'] }}</span>
            </a>
            <a href="{{ route('admin.media.index', ['type' => 'image', 'search' => $search]) }}" 
               class="media-tab {{ $selectedType === 'image' ? 'active' : '' }}">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                    <circle cx="8.5" cy="8.5" r="1.5"></circle>
                    <polyline points="21 15 16 10 5 21"></polyline>
                </svg>
                <span>Photos</span>
                <span class="media-tab-badge">{{ $metrics['images_count'] }}</span>
            </a>
            <a href="{{ route('admin.media.index', ['type' => 'video', 'search' => $search]) }}" 
               class="media-tab {{ $selectedType === 'video' ? 'active' : '' }}">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polygon points="23 7 16 12 23 17 23 7"></polygon>
                    <rect x="1" y="5" width="15" height="14" rx="2" ry="2"></rect>
                </svg>
                <span>Videos</span>
                <span class="media-tab-badge">{{ $metrics['videos_count'] }}</span>
            </a>
            <a href="{{ route('admin.media.index', ['type' => 'document', 'search' => $search]) }}" 
               class="media-tab {{ $selectedType === 'document' ? 'active' : '' }}">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                    <polyline points="14 2 14 8 20 8"></polyline>
                </svg>
                <span>Documents</span>
                <span class="media-tab-badge">{{ $metrics['documents_count'] }}</span>
            </a>
        </div>

        <!-- Search Form -->
        <form action="{{ route('admin.media.index') }}" method="GET" class="media-search-box">
            @if($selectedType !== 'all')
                <input type="hidden" name="type" value="{{ $selectedType }}">
            @endif
            <svg class="media-search-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="11" cy="11" r="8"></circle>
                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg>
            <input type="text" name="search" value="{{ $search }}" placeholder="Search files..." aria-label="Search media files">
        </form>
    </div>

    <!-- ======================================================================
         Media Items Grid
         ====================================================================== -->
    <div class="media-grid">
        @forelse($mediaItems as $item)
            <div class="media-card" id="media-card-{{ $item->id }}">
                <!-- Thumbnail Box -->
                <div class="media-thumb-wrapper" onclick="previewMedia({{ json_encode([
                    'id' => $item->id,
                    'name' => $item->original_name,
                    'url' => $item->url,
                    'type' => $item->file_type,
                    'mime' => $item->mime_type,
                    'size' => $item->formatted_size,
                    'date' => $item->created_at ? $item->created_at->format('M d, Y H:i') : 'Just now',
                    'user' => $item->user->name ?? 'Admin',
                    'downloadUrl' => route('admin.media.download', $item),
                    'deleteUrl' => route('admin.media.destroy', $item),
                ]) }})">
                    <span class="media-type-pill">{{ strtoupper(pathinfo($item->original_name, PATHINFO_EXTENSION) ?: $item->file_type) }}</span>

                    @if($item->isImage())
                        <img src="{{ $item->url }}" alt="{{ $item->original_name }}" class="media-thumb-img" loading="lazy">
                    @elseif($item->isVideo())
                        <div class="media-video-overlay-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                <polygon points="5 3 19 12 5 21 5 3"></polygon>
                            </svg>
                        </div>
                        <div class="media-thumb-icon-box">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <rect x="2" y="2" width="20" height="20" rx="2.18" ry="2.18"></rect>
                                <line x1="7" y1="2" x2="7" y2="22"></line>
                                <line x1="17" y1="2" x2="17" y2="22"></line>
                                <line x1="2" y1="12" x2="22" y2="12"></line>
                                <line x1="2" y1="7" x2="7" y2="7"></line>
                                <line x1="2" y1="17" x2="7" y2="17"></line>
                                <line x1="17" y1="17" x2="22" y2="17"></line>
                                <line x1="17" y1="7" x2="22" y2="7"></line>
                            </svg>
                        </div>
                    @else
                        <!-- Document File Icon -->
                        <div class="media-thumb-icon-box">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" style="color: var(--primary);">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                <polyline points="14 2 14 8 20 8"></polyline>
                                <line x1="16" y1="13" x2="8" y2="13"></line>
                                <line x1="16" y1="17" x2="8" y2="17"></line>
                                <polyline points="10 9 9 9 8 9"></polyline>
                            </svg>
                        </div>
                    @endif
                </div>

                <!-- Info Body -->
                <div class="media-card-body">
                    <div>
                        <h4 class="media-name" title="{{ $item->original_name }}">{{ $item->original_name }}</h4>
                        <div class="media-meta-line">
                            <span>{{ $item->formatted_size }}</span>
                            <span>{{ $item->created_at ? $item->created_at->format('M d, Y') : 'Just now' }}</span>
                        </div>
                    </div>

                    <!-- Footer Action Icons -->
                    <div class="media-card-footer">
                        <button type="button" class="btn btn-secondary" style="padding: 4px 10px; font-size: 0.78rem;" 
                                onclick="previewMedia({{ json_encode([
                                    'id' => $item->id,
                                    'name' => $item->original_name,
                                    'url' => $item->url,
                                    'type' => $item->file_type,
                                    'mime' => $item->mime_type,
                                    'size' => $item->formatted_size,
                                    'date' => $item->created_at ? $item->created_at->format('M d, Y H:i') : 'Just now',
                                    'user' => $item->user->name ?? 'Admin',
                                    'downloadUrl' => route('admin.media.download', $item),
                                    'deleteUrl' => route('admin.media.destroy', $item),
                                ]) }})">
                            Preview
                        </button>

                        <div class="media-action-btn-group">
                            <!-- Download -->
                            <a href="{{ route('admin.media.download', $item) }}" class="media-icon-btn" title="Download Asset" aria-label="Download file">
                                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                    <polyline points="7 10 12 15 17 10"></polyline>
                                    <line x1="12" y1="15" x2="12" y2="3"></line>
                                </svg>
                            </a>

                            <!-- Copy Link -->
                            <button type="button" class="media-icon-btn" title="Copy URL" onclick="copyMediaUrl('{{ $item->url }}', this)">
                                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                    <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                </svg>
                            </button>

                            <!-- Delete Form -->
                            <form action="{{ route('admin.media.destroy', $item) }}" method="POST" onsubmit="return confirm('Are you sure you want to permanently delete this file?');" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="media-icon-btn danger" title="Delete File" aria-label="Delete file">
                                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <polyline points="3 6 5 6 21 6"></polyline>
                                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="media-empty-state">
                <div class="media-empty-icon">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path>
                        <line x1="12" y1="11" x2="12" y2="17"></line>
                        <line x1="9" y1="14" x2="15" y2="14"></line>
                    </svg>
                </div>
                <h3 style="font-size: 1.15rem; font-weight: 700; color: var(--text-primary); margin-bottom: 16px;">
                    No media assets found
                </h3>
                <button type="button" class="btn btn-primary" onclick="document.getElementById('uploadContainer').style.display='block'; document.getElementById('fileInput').click();">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                    <span>Upload Media</span>
                </button>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($mediaItems->hasPages())
        <div class="card" style="margin-top: 28px; padding: 14px 20px;">
            {{ $mediaItems->links() }}
        </div>
    @endif

@endsection

@push('modals')
    <!-- ======================================================================
         Interactive Media Preview & Details Modal (Rendered at Root Body Portal)
         ====================================================================== -->
    <div class="media-modal-backdrop" id="mediaPreviewModal">
        <div class="media-modal-dialog">
            <div class="media-modal-header">
                <h3 class="media-modal-title" id="modalFileName">File Details</h3>
                <button type="button" class="sidebar-close-btn" style="display: block;" onclick="closeMediaModal()" aria-label="Close modal">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>

            <div class="media-modal-body">
                <!-- Preview area (left) -->
                <div class="media-modal-preview" id="modalPreviewArea"></div>

                <!-- Metadata details (right) -->
                <div class="media-modal-details">
                    <div>
                        <div style="margin-bottom: 20px;">
                            <span class="badge badge-primary" id="modalFileTypeBadge">Image</span>
                            <h4 id="modalFileTitle" style="font-size: 1.05rem; font-weight: 700; color: var(--text-primary); margin-top: 8px; word-break: break-all;"></h4>
                        </div>

                        <ul class="profile-meta-list" style="padding: 0;">
                            <li class="profile-meta-item">
                                <span class="profile-meta-label">MIME Type:</span>
                                <span class="profile-meta-val" id="modalMimeType" style="font-family: var(--font-mono); font-size: 0.8rem;"></span>
                            </li>
                            <li class="profile-meta-item">
                                <span class="profile-meta-label">File Size:</span>
                                <span class="profile-meta-val" id="modalFileSize"></span>
                            </li>
                            <li class="profile-meta-item">
                                <span class="profile-meta-label">Uploaded At:</span>
                                <span class="profile-meta-val" id="modalUploadDate"></span>
                            </li>
                            <li class="profile-meta-item">
                                <span class="profile-meta-label">Uploaded By:</span>
                                <span class="profile-meta-val" id="modalUploader"></span>
                            </li>
                        </ul>

                        <!-- Direct URL copy box -->
                        <div style="margin-top: 20px;">
                            <label class="form-label" style="font-size: 0.78rem; text-transform: uppercase; letter-spacing: 0.05em;">Direct Asset URL</label>
                            <div style="display: flex; gap: 8px;">
                                <input type="text" id="modalFileUrl" readonly style="font-size: 0.8rem; font-family: var(--font-mono); padding: 8px 12px; background: #f8fafc; border: 1px solid var(--border-subtle); border-radius: var(--radius-sm); width: 100%; color: var(--text-secondary);">
                                <button type="button" class="btn btn-secondary" style="padding: 8px 14px;" onclick="copyModalUrl(this)">
                                    Copy
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Actions Bottom -->
                    <div style="display: flex; gap: 10px; margin-top: 28px; padding-top: 18px; border-top: 1px solid var(--border-subtle);">
                        <a href="#" id="modalDownloadBtn" class="btn btn-primary" style="flex: 1; padding: 10px;">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                <polyline points="7 10 12 15 17 10"></polyline>
                                <line x1="12" y1="15" x2="12" y2="3"></line>
                            </svg>
                            <span>Download</span>
                        </a>

                        <form id="modalDeleteForm" action="#" method="POST" onsubmit="return confirm('Are you sure you want to permanently delete this file?');" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-secondary" style="color: var(--accent-rose); border-color: rgba(225,29,72,0.3); padding: 10px 16px;">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endpush

@push('scripts')
<script>
    // --------------------------------------------------------------------------
    // Upload Drawer Toggle & Drag/Drop
    // --------------------------------------------------------------------------
    const toggleUploadBtn = document.getElementById('toggleUploadBtn');
    const uploadContainer = document.getElementById('uploadContainer');
    const dropzoneArea = document.getElementById('dropzoneArea');
    const fileInput = document.getElementById('fileInput');
    const browseFilesBtn = document.getElementById('browseFilesBtn');
    const startUploadBtn = document.getElementById('startUploadBtn');
    const selectedFilesList = document.getElementById('selectedFilesList');

    if (toggleUploadBtn && uploadContainer) {
        toggleUploadBtn.addEventListener('click', function () {
            if (uploadContainer.style.display === 'none' || uploadContainer.style.display === '') {
                uploadContainer.style.display = 'block';
                uploadContainer.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            } else {
                uploadContainer.style.display = 'none';
            }
        });
    }

    if (browseFilesBtn && fileInput) {
        browseFilesBtn.addEventListener('click', function (e) {
            e.stopPropagation();
            fileInput.click();
        });
    }

    if (dropzoneArea && fileInput) {
        dropzoneArea.addEventListener('click', function (e) {
            if (e.target !== browseFilesBtn && e.target !== startUploadBtn) {
                fileInput.click();
            }
        });

        // Drag & Drop events
        ['dragenter', 'dragover'].forEach(eventName => {
            dropzoneArea.addEventListener(eventName, function (e) {
                e.preventDefault();
                e.stopPropagation();
                dropzoneArea.classList.add('dragover');
            });
        });

        ['dragleave', 'drop'].forEach(eventName => {
            dropzoneArea.addEventListener(eventName, function (e) {
                e.preventDefault();
                e.stopPropagation();
                dropzoneArea.classList.remove('dragover');
            });
        });

        dropzoneArea.addEventListener('drop', function (e) {
            const dt = e.dataTransfer;
            if (dt && dt.files.length) {
                fileInput.files = dt.files;
                handleSelectedFiles(dt.files);
            }
        });

        fileInput.addEventListener('change', function () {
            handleSelectedFiles(this.files);
        });
    }

    function handleSelectedFiles(files) {
        if (!selectedFilesList || !startUploadBtn) return;
        selectedFilesList.innerHTML = '';

        if (files.length > 0) {
            startUploadBtn.style.display = 'inline-flex';
            startUploadBtn.innerHTML = `<span>Upload ${files.length} File${files.length > 1 ? 's' : ''}</span>`;

            Array.from(files).forEach(file => {
                const sizeKb = (file.size / 1024).toFixed(1);
                const chip = document.createElement('div');
                chip.className = 'media-selected-file-chip';
                chip.innerHTML = `<span>📄 ${escapeHtml(file.name)}</span> <span style="color: var(--text-muted);">(${sizeKb} KB)</span>`;
                selectedFilesList.appendChild(chip);
            });
        } else {
            startUploadBtn.style.display = 'none';
        }
    }

    function escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }

    // --------------------------------------------------------------------------
    // Interactive Media Details / Preview Modal
    // --------------------------------------------------------------------------
    const previewModal = document.getElementById('mediaPreviewModal');
    const modalFileName = document.getElementById('modalFileName');
    const modalFileTitle = document.getElementById('modalFileTitle');
    const modalFileTypeBadge = document.getElementById('modalFileTypeBadge');
    const modalMimeType = document.getElementById('modalMimeType');
    const modalFileSize = document.getElementById('modalFileSize');
    const modalUploadDate = document.getElementById('modalUploadDate');
    const modalUploader = document.getElementById('modalUploader');
    const modalFileUrl = document.getElementById('modalFileUrl');
    const modalDownloadBtn = document.getElementById('modalDownloadBtn');
    const modalDeleteForm = document.getElementById('modalDeleteForm');
    const modalPreviewArea = document.getElementById('modalPreviewArea');

    window.previewMedia = function (data) {
        if (!previewModal) return;

        modalFileName.textContent = data.name;
        modalFileTitle.textContent = data.name;
        modalFileTypeBadge.textContent = data.type.toUpperCase();
        modalMimeType.textContent = data.mime;
        modalFileSize.textContent = data.size;
        modalUploadDate.textContent = data.date;
        modalUploader.textContent = data.user;
        modalFileUrl.value = data.url;
        modalDownloadBtn.href = data.downloadUrl;
        modalDeleteForm.action = data.deleteUrl;

        // Render preview content according to type
        if (data.type === 'image') {
            modalPreviewArea.innerHTML = `<img src="${data.url}" alt="${escapeHtml(data.name)}">`;
        } else if (data.type === 'video') {
            modalPreviewArea.innerHTML = `
                <video controls autoplay muted style="width: 100%;">
                    <source src="${data.url}" type="${data.mime}">
                    Your browser does not support the video tag.
                </video>
            `;
        } else {
            modalPreviewArea.innerHTML = `
                <div style="text-align: center; color: var(--text-muted); padding: 40px 20px;">
                    <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" style="color: var(--primary); margin-bottom: 14px;">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                        <polyline points="14 2 14 8 20 8"></polyline>
                        <line x1="16" y1="13" x2="8" y2="13"></line>
                        <line x1="16" y1="17" x2="8" y2="17"></line>
                    </svg>
                    <div style="font-weight: 700; color: var(--text-primary);">Document File Preview</div>
                </div>
            `;
        }

        previewModal.classList.add('show');
        document.body.style.overflow = 'hidden';
    };

    window.closeMediaModal = function () {
        if (!previewModal) return;
        previewModal.classList.remove('show');
        document.body.style.overflow = '';
        if (modalPreviewArea) modalPreviewArea.innerHTML = '';
    };

    if (previewModal) {
        previewModal.addEventListener('click', function (e) {
            if (e.target === previewModal) {
                closeMediaModal();
            }
        });
    }

    window.copyMediaUrl = function (url, btnElement) {
        navigator.clipboard.writeText(url).then(() => {
            const original = btnElement.innerHTML;
            btnElement.innerHTML = `<span style="font-size: 11px; font-weight: 700; color: var(--accent-emerald);">✓</span>`;
            setTimeout(() => {
                btnElement.innerHTML = original;
            }, 1500);
        });
    };

    window.copyModalUrl = function (btnElement) {
        const urlInput = document.getElementById('modalFileUrl');
        if (!urlInput) return;
        navigator.clipboard.writeText(urlInput.value).then(() => {
            const original = btnElement.textContent;
            btnElement.textContent = 'Copied!';
            setTimeout(() => {
                btnElement.textContent = original;
            }, 1500);
        });
    };
</script>
@endpush
