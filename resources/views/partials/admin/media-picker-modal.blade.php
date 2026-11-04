<!-- ======================================================================
     Internal Media Manager Modal for Blog Editor & Admin Forms
     ====================================================================== -->
@push('modals')
<div id="mediaPickerModal" style="display: none; position: fixed; inset: 0; background: rgba(15, 23, 42, 0.7); backdrop-filter: blur(4px); z-index: 99999; align-items: center; justify-content: center; padding: 20px;">
    <div class="card" style="width: 100%; max-width: 960px; max-height: 88vh; display: flex; flex-direction: column; padding: 0; overflow: hidden; box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.35); border: 1px solid var(--border-medium); border-radius: var(--radius-md);">
        
        <!-- Modal Header -->
        <div style="padding: 18px 24px; border-bottom: 1px solid var(--border-medium); display: flex; justify-content: space-between; align-items: center; background: #ffffff;">
            <div>
                <div style="display: flex; align-items: center; gap: 8px;">
                    <div style="width: 32px; height: 32px; border-radius: 8px; background: rgba(79, 70, 229, 0.1); color: var(--primary); display: flex; align-items: center; justify-content: center;">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                            <circle cx="8.5" cy="8.5" r="1.5"></circle>
                            <polyline points="21 15 16 10 5 21"></polyline>
                        </svg>
                    </div>
                    <h3 style="font-size: 1.2rem; margin: 0; color: var(--text-main);">Internal Media Manager</h3>
                </div>
            </div>
            <button type="button" onclick="closeMediaPickerModal()" style="background: none; border: none; font-size: 1.4rem; color: var(--text-muted); cursor: pointer; padding: 4px 8px; border-radius: 6px; line-height: 1;">✕</button>
        </div>

        <!-- Toolbar: Tabs + Search -->
        <div style="padding: 12px 24px; background: var(--bg-surface-elevated); border-bottom: 1px solid var(--border-medium); display: flex; justify-content: space-between; align-items: center; gap: 14px; flex-wrap: wrap;">
            <!-- Tab Buttons -->
            <div style="display: flex; gap: 6px;">
                <button type="button" id="tabLibraryBtn" onclick="switchMediaTab('library')" class="btn btn-sm btn-primary" style="padding: 6px 14px; font-size: 0.82rem; border-radius: 8px;">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right: 4px;">
                        <rect x="3" y="3" width="7" height="7"></rect>
                        <rect x="14" y="3" width="7" height="7"></rect>
                        <rect x="14" y="14" width="7" height="7"></rect>
                        <rect x="3" y="14" width="7" height="7"></rect>
                    </svg>
                    Browse Library (<span id="mediaLibraryCount">0</span>)
                </button>
                <button type="button" id="tabUploadBtn" onclick="switchMediaTab('upload')" class="btn btn-sm btn-secondary" style="padding: 6px 14px; font-size: 0.82rem; border-radius: 8px;">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right: 4px;">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                        <polyline points="17 8 12 3 7 8"></polyline>
                        <line x1="12" y1="3" x2="12" y2="15"></line>
                    </svg>
                    Upload New Image
                </button>
            </div>

            <!-- Live Search Box -->
            <div id="mediaSearchWrapper" style="position: relative; width: 260px; max-width: 100%;">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="var(--text-muted)" stroke-width="2" style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%);">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
                <input type="text" id="mediaPickerSearch" placeholder="Search images..." 
                       class="form-control form-control-sm" style="padding-left: 32px; font-size: 0.82rem; height: 34px;">
            </div>
        </div>

        <!-- Modal Body Content -->
        <div style="flex: 1; overflow-y: auto; padding: 20px 24px; min-height: 340px; background: #ffffff;">
            
            <!-- 1. Media Library Grid Tab -->
            <div id="mediaTabLibrary">
                <!-- Loading State -->
                <div id="mediaLoadingState" style="display: flex; flex-direction: column; align-items: center; justify-content: center; height: 260px; gap: 12px; color: var(--text-muted);">
                    <div style="width: 36px; height: 36px; border: 3px solid rgba(79, 70, 229, 0.2); border-top-color: var(--primary); border-radius: 50%; animation: spin 0.8s linear infinite;"></div>
                    <span style="font-size: 0.88rem;">Loading media library...</span>
                </div>

                <!-- Empty State -->
                <div id="mediaEmptyState" style="display: none; flex-direction: column; align-items: center; justify-content: center; height: 260px; gap: 10px; text-align: center; color: var(--text-muted);">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                        <circle cx="8.5" cy="8.5" r="1.5"></circle>
                        <polyline points="21 15 16 10 5 21"></polyline>
                    </svg>
                    <div style="font-size: 1rem; font-weight: 600; color: var(--text-main);">No images found</div>
                </div>

                <!-- Media Grid -->
                <div id="mediaPickerGrid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(180px, 1fr)); gap: 14px;">
                    <!-- Dynamically populated via JS -->
                </div>
            </div>

            <!-- 2. Fast Upload Tab -->
            <div id="mediaTabUpload" style="display: none;">
                <div id="mediaDropzone" style="border: 2px dashed var(--border-medium); border-radius: var(--radius-md); padding: 48px 24px; text-align: center; cursor: pointer; transition: all 0.2s ease; background: var(--bg-surface-elevated);"
                     onclick="document.getElementById('mediaFileInput').click()">
                    
                    <div style="width: 52px; height: 52px; border-radius: 50%; background: #ffffff; color: var(--primary); display: flex; align-items: center; justify-content: center; margin: 0 auto 16px; box-shadow: 0 4px 12px rgba(79, 70, 229, 0.15);">
                        <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                            <polyline points="17 8 12 3 7 8"></polyline>
                            <line x1="12" y1="3" x2="12" y2="15"></line>
                        </svg>
                    </div>

                    <h4 style="font-size: 1.05rem; margin-bottom: 16px; color: var(--text-main);">Upload or drag and drop image</h4>
                    
                    <button type="button" class="btn btn-primary btn-sm" style="pointer-events: none;">
                        Browse Image Files
                    </button>

                    <input type="file" id="mediaFileInput" accept="image/*" style="display: none;" onchange="handleMediaPickerUpload(this.files)">
                </div>

                <!-- Upload Progress & Status -->
                <div id="uploadProgressContainer" style="display: none; margin-top: 18px; padding: 14px 18px; border-radius: var(--radius-sm); background: var(--bg-surface-elevated); border: 1px solid var(--border-medium);">
                    <div style="display: flex; justify-content: space-between; font-size: 0.84rem; font-weight: 600; margin-bottom: 8px;">
                        <span id="uploadStatusText">Uploading...</span>
                        <span id="uploadPercentText">0%</span>
                    </div>
                    <div style="width: 100%; height: 6px; background: #e2e8f0; border-radius: 999px; overflow: hidden;">
                        <div id="uploadProgressBar" style="width: 0%; height: 100%; background: var(--primary); transition: width 0.2s ease;"></div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Modal Footer: Selected Item Preview + Insertion Actions -->
        <div style="padding: 14px 24px; border-top: 1px solid var(--border-medium); background: #ffffff; display: flex; justify-content: space-between; align-items: center; gap: 14px; flex-wrap: wrap;">
            
            <!-- Left: Selected Image Preview Pill -->
            <div id="selectedMediaPreview" style="display: flex; align-items: center; gap: 12px; min-height: 40px;">
                <span style="font-size: 0.82rem; color: var(--text-muted);">No image selected</span>
            </div>

            <!-- Right: Alt Text + Actions -->
            <div style="display: flex; align-items: center; gap: 10px; margin-left: auto;">
                <input type="text" id="mediaPickerAlt" placeholder="Alt text" 
                       class="form-control form-control-sm" style="width: 220px; font-size: 0.82rem; height: 36px; display: none;">

                <button type="button" id="deleteMediaPickerBtn" onclick="deleteSelectedPickerMedia()" class="btn btn-secondary btn-sm" style="padding: 8px 14px; color: #ef4444; border-color: rgba(239, 68, 68, 0.35); display: none;" title="Delete file">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right: 4px;">
                        <polyline points="3 6 5 6 21 6"></polyline>
                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                    </svg>
                    <span>Delete</span>
                </button>
                <button type="button" onclick="closeMediaPickerModal()" class="btn btn-secondary btn-sm" style="padding: 8px 16px;">
                    Cancel
                </button>
                <button type="button" id="insertMediaBtn" onclick="confirmMediaPickerSelection()" class="btn btn-primary btn-sm" style="padding: 8px 18px;" disabled>
                    Insert Selected Image
                </button>
            </div>

        </div>

    </div>
</div>
@endpush

@push('styles')
<style>
@keyframes spin {
    to { transform: rotate(360deg); }
}

.media-picker-card {
    border: 2px solid #e2e8f0;
    border-radius: 10px;
    overflow: hidden;
    cursor: pointer;
    background: #ffffff;
    transition: all 0.18s cubic-bezier(0.16, 1, 0.3, 1);
    position: relative;
    display: flex;
    flex-direction: column;
}

.media-picker-card:hover {
    border-color: #94a3b8;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(15, 23, 42, 0.08);
}

.media-picker-card.selected {
    border-color: var(--primary) !important;
    box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.25), 0 4px 12px rgba(79, 70, 229, 0.15) !important;
    background: #fdfefe;
}

.media-picker-thumb {
    width: 100%;
    aspect-ratio: 16/10;
    object-fit: cover;
    background: #f1f5f9;
    display: block;
}

.media-picker-check {
    position: absolute;
    top: 8px;
    right: 8px;
    width: 24px;
    height: 24px;
    border-radius: 50%;
    background: var(--primary);
    color: #ffffff;
    display: none;
    align-items: center;
    justify-content: center;
    font-size: 13px;
    font-weight: bold;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
}

.media-picker-card.selected .media-picker-check {
    display: flex;
}

.media-picker-meta {
    padding: 8px 10px;
    font-size: 0.76rem;
    color: var(--text-muted);
    border-top: 1px solid #f1f5f9;
    background: #fafafa;
}

.media-picker-name {
    font-weight: 600;
    color: var(--text-main);
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    margin-bottom: 2px;
}
</style>
@endpush

@push('scripts')
<script>
(function() {
    let mediaItems = [];
    let selectedItem = null;
    let pickerCallback = null;
    let isInitialized = false;

    // Open Modal
    window.openMediaPickerModal = function(callback, options = {}) {
        pickerCallback = callback || null;
        selectedItem = null;

        const modal = document.getElementById('mediaPickerModal');
        const altInput = document.getElementById('mediaPickerAlt');
        const insertBtn = document.getElementById('insertMediaBtn');
        const preview = document.getElementById('selectedMediaPreview');

        if (altInput) {
            altInput.value = options.defaultAlt || '';
            altInput.style.display = options.showAlt === false ? 'none' : 'block';
        }

        if (insertBtn) {
            insertBtn.disabled = true;
            insertBtn.textContent = options.buttonText || 'Insert Selected Image';
        }

        if (preview) {
            preview.innerHTML = '<span style="font-size: 0.82rem; color: var(--text-muted);">No image selected</span>';
        }

        const deleteBtn = document.getElementById('deleteMediaPickerBtn');
        if (deleteBtn) {
            deleteBtn.style.display = 'none';
            deleteBtn.disabled = false;
        }

        switchMediaTab('library');
        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden';

        if (!isInitialized || (mediaItems.length === 0)) {
            fetchMediaLibrary();
            isInitialized = true;
        } else {
            renderMediaGrid(mediaItems);
        }
    };

    // Close Modal
    window.closeMediaPickerModal = function() {
        const modal = document.getElementById('mediaPickerModal');
        if (modal) {
            modal.style.display = 'none';
        }
        document.body.style.overflow = '';
        selectedItem = null;
    };

    // Tab Switcher
    window.switchMediaTab = function(tab) {
        const libTab = document.getElementById('mediaTabLibrary');
        const upTab = document.getElementById('mediaTabUpload');
        const libBtn = document.getElementById('tabLibraryBtn');
        const upBtn = document.getElementById('tabUploadBtn');
        const searchBox = document.getElementById('mediaSearchWrapper');

        if (tab === 'library') {
            libTab.style.display = 'block';
            upTab.style.display = 'none';
            libBtn.className = 'btn btn-sm btn-primary';
            upBtn.className = 'btn btn-sm btn-secondary';
            if (searchBox) searchBox.style.display = 'block';
        } else {
            libTab.style.display = 'none';
            upTab.style.display = 'block';
            libBtn.className = 'btn btn-sm btn-secondary';
            upBtn.className = 'btn btn-sm btn-primary';
            if (searchBox) searchBox.style.display = 'none';
        }
    };

    // Fetch Media Items from Backend JSON API
    window.fetchMediaLibrary = function() {
        const loading = document.getElementById('mediaLoadingState');
        const empty = document.getElementById('mediaEmptyState');
        const grid = document.getElementById('mediaPickerGrid');

        if (loading) loading.style.display = 'flex';
        if (empty) empty.style.display = 'none';
        if (grid) grid.innerHTML = '';

        fetch("{{ route('admin.media.picker') }}")
            .then(res => res.json())
            .then(data => {
                if (loading) loading.style.display = 'none';
                if (data && data.success && data.media) {
                    mediaItems = data.media;
                    document.getElementById('mediaLibraryCount').textContent = mediaItems.length;
                    renderMediaGrid(mediaItems);
                } else {
                    if (empty) empty.style.display = 'flex';
                }
            })
            .catch(err => {
                console.error("Error loading media library:", err);
                if (loading) loading.style.display = 'none';
                if (empty) {
                    empty.style.display = 'flex';
                    empty.querySelector('div').textContent = "Failed to load media items";
                }
            });
    };

    // Render Grid Cards
    function renderMediaGrid(items) {
        const grid = document.getElementById('mediaPickerGrid');
        const empty = document.getElementById('mediaEmptyState');

        if (!grid) return;
        grid.innerHTML = '';

        if (!items || items.length === 0) {
            if (empty) empty.style.display = 'flex';
            return;
        }

        if (empty) empty.style.display = 'none';

        items.forEach(item => {
            const card = document.createElement('div');
            card.className = 'media-picker-card';
            card.dataset.id = item.id;
            card.dataset.url = item.url;
            card.dataset.name = item.name;

            if (selectedItem && selectedItem.url === item.url) {
                card.classList.add('selected');
            }

            card.innerHTML = `
                <img src="${item.url}" alt="${item.name}" class="media-picker-thumb" loading="lazy" onerror="this.src='/assets/images/blog-cpcb-epr.jpg'">
                <div class="media-picker-check">✓</div>
                <div class="media-picker-meta">
                    <div class="media-picker-name" title="${item.name}">${item.name}</div>
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span>${item.size || ''}</span>
                        <span style="font-size: 0.7rem; color: var(--primary);">${item.created_at || ''}</span>
                    </div>
                </div>
            `;

            // Click to select
            card.addEventListener('click', function() {
                document.querySelectorAll('.media-picker-card').forEach(c => c.classList.remove('selected'));
                card.classList.add('selected');
                selectMediaItem(item);
            });

            // Double click to insert directly
            card.addEventListener('dblclick', function() {
                selectMediaItem(item);
                confirmMediaPickerSelection();
            });

            grid.appendChild(card);
        });
    }

    // Select Item
    function selectMediaItem(item) {
        selectedItem = item;
        const insertBtn = document.getElementById('insertMediaBtn');
        const deleteBtn = document.getElementById('deleteMediaPickerBtn');
        const preview = document.getElementById('selectedMediaPreview');
        const altInput = document.getElementById('mediaPickerAlt');

        if (insertBtn) insertBtn.disabled = false;
        if (deleteBtn) {
            deleteBtn.style.display = 'inline-flex';
            deleteBtn.disabled = false;
        }

        if (preview) {
            preview.innerHTML = `
                <img src="${item.url}" style="width: 40px; height: 40px; object-fit: cover; border-radius: 6px; border: 1px solid #cbd5e1;">
                <div>
                    <div style="font-size: 0.85rem; font-weight: 700; color: var(--text-main); max-width: 280px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">${item.name}</div>
                    <div style="font-size: 0.74rem; color: var(--text-muted);">${item.size} • Selected</div>
                </div>
            `;
        }

        if (altInput && !altInput.value.trim()) {
            altInput.value = item.name;
        }
    }

    // Delete Selected Item from Everywhere in the System
    window.deleteSelectedPickerMedia = function() {
        if (!selectedItem || !selectedItem.id) return;

        if (!confirm('Are you sure you want to permanently delete "' + selectedItem.name + '" from the system?\n\nThis will remove the file from storage and any blog references.')) {
            return;
        }

        const deleteUrl = '/admin/media/' + selectedItem.id;
        const csrfMeta = document.querySelector('meta[name="csrf-token"]');
        const csrfToken = (csrfMeta ? csrfMeta.getAttribute('content') : '') || '{{ csrf_token() }}';

        const deleteBtn = document.getElementById('deleteMediaPickerBtn');
        if (deleteBtn) deleteBtn.disabled = true;

        fetch(deleteUrl, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                _token: csrfToken,
                _method: 'DELETE'
            })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                const deletedId = selectedItem.id;
                const deletedUrl = selectedItem.url;
                const deletedFilename = selectedItem.filename;

                // Remove from local array
                mediaItems = mediaItems.filter(item => item.id !== deletedId);
                selectedItem = null;

                const countEl = document.getElementById('mediaLibraryCount');
                if (countEl) countEl.textContent = mediaItems.length;

                if (deleteBtn) {
                    deleteBtn.style.display = 'none';
                    deleteBtn.disabled = false;
                }

                const insertBtn = document.getElementById('insertMediaBtn');
                if (insertBtn) insertBtn.disabled = true;

                const preview = document.getElementById('selectedMediaPreview');
                if (preview) {
                    preview.innerHTML = '<span style="font-size: 0.82rem; color: #10b981;">✓ File permanently deleted from everywhere.</span>';
                }

                // If currently set as featured image in blog form, remove preview too
                const featuredInput = document.getElementById('featuredImageUrlInput');
                if (featuredInput && (featuredInput.value === deletedUrl || featuredInput.value.includes(deletedFilename))) {
                    if (typeof removeFeaturedImage === 'function') {
                        removeFeaturedImage();
                    }
                }

                renderMediaGrid(mediaItems);
            } else {
                alert('Delete failed: ' + (data.message || 'Unknown error'));
                if (deleteBtn) deleteBtn.disabled = false;
            }
        })
        .catch(err => {
            console.error('Delete error', err);
            alert('An error occurred while deleting the file.');
            if (deleteBtn) deleteBtn.disabled = false;
        });
    };

    // Confirm & Insert
    window.confirmMediaPickerSelection = function() {
        if (!selectedItem) return;

        const altText = document.getElementById('mediaPickerAlt') ? document.getElementById('mediaPickerAlt').value.trim() : '';
        const result = {
            url: selectedItem.url,
            name: selectedItem.name,
            alt: altText || selectedItem.name
        };

        if (typeof pickerCallback === 'function') {
            pickerCallback(result);
        }

        closeMediaPickerModal();
    };

    // Live Search Filter
    const searchInput = document.getElementById('mediaPickerSearch');
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const query = this.value.toLowerCase().trim();
            if (!query) {
                renderMediaGrid(mediaItems);
                return;
            }
            const filtered = mediaItems.filter(item => {
                return (item.name && item.name.toLowerCase().includes(query)) ||
                       (item.filename && item.filename.toLowerCase().includes(query));
            });
            renderMediaGrid(filtered);
        });
    }

    // Drag-and-drop Dropzone Effects
    const dropzone = document.getElementById('mediaDropzone');
    if (dropzone) {
        ['dragenter', 'dragover'].forEach(eventName => {
            dropzone.addEventListener(eventName, function(e) {
                e.preventDefault();
                e.stopPropagation();
                dropzone.style.borderColor = 'var(--primary)';
                dropzone.style.background = 'rgba(79, 70, 229, 0.05)';
            }, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            dropzone.addEventListener(eventName, function(e) {
                e.preventDefault();
                e.stopPropagation();
                dropzone.style.borderColor = 'var(--border-medium)';
                dropzone.style.background = 'var(--bg-surface-elevated)';
            }, false);
        });

        dropzone.addEventListener('drop', function(e) {
            const dt = e.dataTransfer;
            if (dt && dt.files && dt.files.length > 0) {
                handleMediaPickerUpload(dt.files);
            }
        });
    }

    // AJAX Upload Handler
    window.handleMediaPickerUpload = function(files) {
        if (!files || files.length === 0) return;
        const file = files[0];

        const progressContainer = document.getElementById('uploadProgressContainer');
        const progressBar = document.getElementById('uploadProgressBar');
        const percentText = document.getElementById('uploadPercentText');
        const statusText = document.getElementById('uploadStatusText');

        if (progressContainer) progressContainer.style.display = 'block';
        if (progressBar) progressBar.style.width = '0%';
        if (percentText) percentText.textContent = '0%';
        if (statusText) statusText.textContent = `Uploading ${file.name}...`;

        const formData = new FormData();
        formData.append('file', file);
        formData.append('_token', '{{ csrf_token() }}');

        const xhr = new XMLHttpRequest();
        xhr.open('POST', "{{ route('admin.media.picker.upload') }}", true);

        xhr.upload.onprogress = function(e) {
            if (e.lengthComputable) {
                const percent = Math.round((e.loaded / e.total) * 100);
                if (progressBar) progressBar.style.width = percent + '%';
                if (percentText) percentText.textContent = percent + '%';
            }
        };

        xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 300) {
                try {
                    const res = JSON.parse(xhr.responseText);
                    if (res && res.success && res.item) {
                        if (statusText) statusText.textContent = 'Uploaded successfully!';
                        // Prepend newly uploaded item to library
                        mediaItems.unshift(res.item);
                        document.getElementById('mediaLibraryCount').textContent = mediaItems.length;

                        // Switch to library tab and auto-select this new item
                        setTimeout(() => {
                            if (progressContainer) progressContainer.style.display = 'none';
                            switchMediaTab('library');
                            renderMediaGrid(mediaItems);
                            selectMediaItem(res.item);
                        }, 500);
                    }
                } catch(e) {
                    console.error("Upload parse error", e);
                    if (statusText) statusText.textContent = 'Upload failed to process response.';
                }
            } else {
                if (statusText) statusText.textContent = 'Upload failed. Please check file format and size.';
            }
        };

        xhr.onerror = function() {
            if (statusText) statusText.textContent = 'Network error during upload.';
        };

        xhr.send(formData);
    };

    // Close on Escape or Backdrop Click
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            const modal = document.getElementById('mediaPickerModal');
            if (modal && modal.style.display !== 'none') {
                closeMediaPickerModal();
            }
        }
    });

    const modalBackdrop = document.getElementById('mediaPickerModal');
    if (modalBackdrop) {
        modalBackdrop.addEventListener('click', function(e) {
            if (e.target === modalBackdrop) {
                closeMediaPickerModal();
            }
        });
    }
})();
</script>
@endpush
