@extends('layouts.admin')

@section('title', 'General Settings')
@section('page_title', 'General Settings')

@section('content')
<div class="settings-page-wrapper">
    <!-- Page Header Description -->
    <div style="margin-bottom: 24px;">
        <h1 style="font-size: 1.5rem; font-weight: 700; color: var(--text-main); margin-bottom: 4px;">
            General Settings
        </h1>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger" style="margin-bottom: 24px;">
            <div style="display: flex; flex-direction: column; gap: 4px;">
                <div style="font-weight: 700;">Please correct the highlighted issues:</div>
                <ul style="margin: 0; padding-left: 20px; font-size: 0.88rem;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" id="generalSettingsForm">
        @csrf
        @method('PUT')

        <div style="display: grid; grid-template-columns: 260px 1fr; gap: 24px; align-items: start;">
            <!-- Settings Navigation Tabs (Left Sidebar) -->
            <div class="card" style="padding: 12px; position: sticky; top: 90px;">
                <div style="font-size: 0.75rem; font-weight: 700; text-transform: uppercase; color: var(--text-muted); padding: 8px 12px 12px; letter-spacing: 0.05em;">
                    Settings Categories
                </div>
                <div class="settings-nav-tabs" style="display: flex; flex-direction: column; gap: 4px;">
                    <button type="button" class="tab-btn active" data-tab="branding" style="display: flex; align-items: center; gap: 10px; width: 100%; padding: 10px 14px; border: none; border-radius: var(--radius-md); font-size: 0.88rem; font-weight: 600; text-align: left; cursor: pointer; transition: all 0.2s ease;">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="3" width="18" height="18" rx="2"></rect>
                            <circle cx="8.5" cy="8.5" r="1.5"></circle>
                            <polyline points="21 15 16 10 5 21"></polyline>
                        </svg>
                        <span>Branding & Logo</span>
                    </button>

                    <button type="button" class="tab-btn" data-tab="contact" style="display: flex; align-items: center; gap: 10px; width: 100%; padding: 10px 14px; border: none; border-radius: var(--radius-md); font-size: 0.88rem; font-weight: 600; text-align: left; cursor: pointer; transition: all 0.2s ease;">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                        </svg>
                        <span>Contact & Desks</span>
                    </button>

                    <button type="button" class="tab-btn" data-tab="regulatory" style="display: flex; align-items: center; gap: 10px; width: 100%; padding: 10px 14px; border: none; border-radius: var(--radius-md); font-size: 0.88rem; font-weight: 600; text-align: left; cursor: pointer; transition: all 0.2s ease;">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                        </svg>
                        <span>Regulatory & PRO</span>
                    </button>

                    <button type="button" class="tab-btn" data-tab="localization" style="display: flex; align-items: center; gap: 10px; width: 100%; padding: 10px 14px; border: none; border-radius: var(--radius-md); font-size: 0.88rem; font-weight: 600; text-align: left; cursor: pointer; transition: all 0.2s ease;">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="2" y1="12" x2="22" y2="12"></line>
                            <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                        </svg>
                        <span>Localization</span>
                    </button>

                    <button type="button" class="tab-btn" data-tab="social" style="display: flex; align-items: center; gap: 10px; width: 100%; padding: 10px 14px; border: none; border-radius: var(--radius-md); font-size: 0.88rem; font-weight: 600; text-align: left; cursor: pointer; transition: all 0.2s ease;">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path>
                            <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path>
                        </svg>
                        <span>Social Media</span>
                    </button>

                    <button type="button" class="tab-btn" data-tab="seo" style="display: flex; align-items: center; gap: 10px; width: 100%; padding: 10px 14px; border: none; border-radius: var(--radius-md); font-size: 0.88rem; font-weight: 600; text-align: left; cursor: pointer; transition: all 0.2s ease;">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                        <span>SEO & Legal</span>
                    </button>
                </div>
            </div>

            <!-- Tab Content Panes (Right Side) -->
            <div class="settings-content-wrapper">
                <!-- ==========================================
                     TAB 1: BRANDING & LOGOS
                     ========================================== -->
                <div class="tab-pane active" id="pane-branding">
                    <div class="card" style="margin-bottom: 24px;">
                        <div class="card-header">
                            <h2 class="card-title">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="3" y="3" width="18" height="18" rx="2"></rect>
                                    <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                    <polyline points="21 15 16 10 5 21"></polyline>
                                </svg>
                                <span>Branding & Logo Assets</span>
                            </h2>
                        </div>
                        <div class="card-body">
                            <!-- Company / Brand Name -->
                            <div class="form-group" style="margin-bottom: 20px;">
                                <label for="site_name" class="form-label">
                                    Company / Brand Name <span style="color: #ef4444;">*</span>
                                </label>
                                <input 
                                    type="text" 
                                    id="site_name" 
                                    name="site_name" 
                                    class="form-control"
                                    value="{{ old('site_name', $settings['site_name'] ?? 'SHRISTIYAM') }}" 
                                    required 
                                    placeholder="e.g. SHRISTIYAM"
                                >
                            </div>

                            <hr style="border: 0; border-top: 1px solid var(--border-color); margin: 24px 0;">

                            <!-- 1. Primary Website Logo Section -->
                            <div style="background: var(--bg-hover); border: 1px solid var(--border-color); border-radius: var(--radius-md); padding: 20px; margin-bottom: 20px;">
                                <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 16px; gap: 16px; flex-wrap: wrap;">
                                    <div>
                                        <h3 style="font-size: 0.95rem; font-weight: 700; color: var(--text-main); margin: 0 0 4px 0; display: flex; align-items: center; gap: 8px;">
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <rect x="3" y="3" width="18" height="18" rx="2"></rect>
                                                <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                                <polyline points="21 15 16 10 5 21"></polyline>
                                            </svg>
                                            <span>Primary Website Logo</span>
                                        </h3>
                                    </div>

                                    <!-- Logo Preview Box (Clickable to open Media Manager) -->
                                    <div id="logoPreviewBox" onclick="chooseLogoFromMedia()" title="Click to choose or change logo from Media Manager" style="background: var(--bg-surface); border: 1.5px dashed var(--border-color); border-radius: var(--radius-md); padding: 12px 18px; min-width: 180px; min-height: 56px; display: flex; align-items: center; justify-content: center; cursor: pointer; transition: all 0.2s ease;">
                                        @if(!empty($settings['site_logo']))
                                            <img id="logoPreviewImg" src="{{ $settings['site_logo'] }}" alt="Logo Preview" style="max-height: 40px; max-width: 160px; object-fit: contain;">
                                            <span id="logoFallbackBadge" style="display: none; font-size: 0.78rem; color: var(--text-muted);">Default SVG Symbol</span>
                                        @else
                                            <img id="logoPreviewImg" src="" alt="Logo Preview" style="max-height: 40px; max-width: 160px; object-fit: contain; display: none;">
                                            <div id="logoFallbackBadge" style="display: flex; align-items: center; gap: 8px;">
                                                <div style="width: 28px; height: 28px; border-radius: 6px; background: rgba(5, 150, 105, 0.1); color: #059669; display: flex; align-items: center; justify-content: center;">
                                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M7 19H4.815a1.83 1.83 0 0 1-1.57-.881 1.785 1.785 0 0 1-.004-1.784L7.196 9.5"></path><path d="M11 19h8.203a1.83 1.83 0 0 0 1.556-.89 1.784 1.784 0 0 0 0-1.775l-1.226-2.12"></path><path d="m14 16-3 3 3 3"></path><path d="M8.293 13.596 4 6.5 12 2l4 6.5"></path><path d="m15.5 8.5 3-3-3-3"></path></svg>
                                                </div>
                                                <span style="font-size: 0.8rem; font-weight: 700; color: var(--text-main);">Default Vector Logo</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <!-- Action Buttons for Media Manager & Local PC Upload -->
                                <div style="display: flex; gap: 10px; align-items: center; flex-wrap: wrap; margin-bottom: 14px;">
                                    <button type="button" onclick="chooseLogoFromMedia()" class="btn btn-primary" style="display: inline-flex; align-items: center; gap: 8px; font-size: 0.85rem; padding: 9px 16px;">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <rect x="3" y="3" width="18" height="18" rx="2"></rect>
                                            <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                            <polyline points="21 15 16 10 5 21"></polyline>
                                        </svg>
                                        <span>Choose Logo from Media Manager</span>
                                    </button>

                                    <button type="button" onclick="document.getElementById('site_logo_file').click()" class="btn btn-secondary" style="display: inline-flex; align-items: center; gap: 6px; font-size: 0.85rem; padding: 9px 14px;" title="Upload new image from your computer">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                            <polyline points="17 8 12 3 7 8"></polyline>
                                            <line x1="12" y1="3" x2="12" y2="15"></line>
                                        </svg>
                                        <span>Upload from PC</span>
                                    </button>
                                </div>

                                <!-- Hidden PC file input -->
                                <input 
                                    type="file" 
                                    id="site_logo_file" 
                                    name="site_logo_file" 
                                    accept="image/png,image/jpeg,image/svg+xml,image/webp" 
                                    style="display: none;"
                                >

                                <!-- Selected Path or Direct URL -->
                                <div>
                                    <label for="site_logo" class="form-label" style="font-size: 0.82rem; color: var(--text-secondary);">Selected Logo File Path / URL</label>
                                    <div style="display: flex; gap: 8px;">
                                        <input 
                                            type="text" 
                                            id="site_logo" 
                                            name="site_logo" 
                                            class="form-control"
                                            value="{{ old('site_logo', $settings['site_logo'] ?? '') }}" 
                                            placeholder="/storage/media/your-logo.png"
                                            onclick="chooseLogoFromMedia()"
                                        >
                                        <button type="button" onclick="chooseLogoFromMedia()" class="btn btn-secondary" style="white-space: nowrap; padding: 0 16px; font-size: 0.85rem;">
                                            Browse
                                        </button>
                                    </div>
                                </div>

                                @if(!empty($settings['site_logo']))
                                    <div style="margin-top: 12px; display: flex; align-items: center; gap: 8px;">
                                        <label style="display: inline-flex; align-items: center; gap: 6px; font-size: 0.82rem; color: #ef4444; cursor: pointer;">
                                            <input type="checkbox" name="remove_site_logo" id="remove_site_logo" value="1" style="accent-color: #ef4444;">
                                            <span>Remove custom logo & revert to default vector symbol</span>
                                        </label>
                                    </div>
                                @endif
                            </div>

                            <!-- 2. Favicon Section -->
                            <div style="background: var(--bg-hover); border: 1px solid var(--border-color); border-radius: var(--radius-md); padding: 20px;">
                                <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 16px; gap: 16px; flex-wrap: wrap;">
                                    <div>
                                        <h3 style="font-size: 0.95rem; font-weight: 700; color: var(--text-main); margin: 0 0 4px 0; display: flex; align-items: center; gap: 8px;">
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <circle cx="12" cy="12" r="10"></circle>
                                                <circle cx="12" cy="12" r="4"></circle>
                                            </svg>
                                            <span>Website Browser Favicon</span>
                                        </h3>
                                    </div>

                                    <!-- Favicon Preview Box (Clickable to open Media Manager) -->
                                    <div id="favPreviewBox" onclick="chooseFaviconFromMedia()" title="Click to choose or change favicon from Media Manager" style="background: var(--bg-surface); border: 1.5px dashed var(--border-color); border-radius: var(--radius-md); padding: 12px 18px; min-width: 140px; min-height: 56px; display: flex; align-items: center; justify-content: center; gap: 8px; cursor: pointer; transition: all 0.2s ease;">
                                        @if(!empty($settings['site_favicon']))
                                            <img id="favPreviewImg" src="{{ $settings['site_favicon'] }}" alt="Favicon Preview" style="width: 28px; height: 28px; object-fit: contain;">
                                            <span style="font-size: 0.78rem; font-weight: 600; color: var(--text-muted);">Current</span>
                                        @else
                                            <img id="favPreviewImg" src="" alt="Favicon Preview" style="width: 28px; height: 28px; object-fit: contain; display: none;">
                                            <div id="favFallbackBadge" style="width: 24px; height: 24px; border-radius: 6px; background: #059669; display: flex; align-items: center; justify-content: center; color: white;">
                                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                            </div>
                                            <span style="font-size: 0.78rem; color: var(--text-muted);">Default Icon</span>
                                        @endif
                                    </div>
                                </div>

                                <!-- Action Buttons for Media Manager & Local PC Upload -->
                                <div style="display: flex; gap: 10px; align-items: center; flex-wrap: wrap; margin-bottom: 14px;">
                                    <button type="button" onclick="chooseFaviconFromMedia()" class="btn btn-primary" style="display: inline-flex; align-items: center; gap: 8px; font-size: 0.85rem; padding: 9px 16px;">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <rect x="3" y="3" width="18" height="18" rx="2"></rect>
                                            <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                            <polyline points="21 15 16 10 5 21"></polyline>
                                        </svg>
                                        <span>Choose Favicon from Media Manager</span>
                                    </button>

                                    <button type="button" onclick="document.getElementById('site_favicon_file').click()" class="btn btn-secondary" style="display: inline-flex; align-items: center; gap: 6px; font-size: 0.85rem; padding: 9px 14px;" title="Upload new favicon from your computer">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                            <polyline points="17 8 12 3 7 8"></polyline>
                                            <line x1="12" y1="3" x2="12" y2="15"></line>
                                        </svg>
                                        <span>Upload from PC</span>
                                    </button>
                                </div>

                                <!-- Hidden PC file input -->
                                <input 
                                    type="file" 
                                    id="site_favicon_file" 
                                    name="site_favicon_file" 
                                    accept=".ico,image/png,image/svg+xml,image/webp" 
                                    style="display: none;"
                                >

                                <!-- Selected Path or Direct URL -->
                                <div>
                                    <label for="site_favicon" class="form-label" style="font-size: 0.82rem; color: var(--text-secondary);">Selected Favicon File Path / URL</label>
                                    <div style="display: flex; gap: 8px;">
                                        <input 
                                            type="text" 
                                            id="site_favicon" 
                                            name="site_favicon" 
                                            class="form-control"
                                            value="{{ old('site_favicon', $settings['site_favicon'] ?? '') }}" 
                                            placeholder="/storage/media/favicon.ico"
                                            onclick="chooseFaviconFromMedia()"
                                        >
                                        <button type="button" onclick="chooseFaviconFromMedia()" class="btn btn-secondary" style="white-space: nowrap; padding: 0 16px; font-size: 0.85rem;">
                                            Browse
                                        </button>
                                    </div>
                                </div>

                                @if(!empty($settings['site_favicon']))
                                    <div style="margin-top: 12px; display: flex; align-items: center; gap: 8px;">
                                        <label style="display: inline-flex; align-items: center; gap: 6px; font-size: 0.82rem; color: #ef4444; cursor: pointer;">
                                            <input type="checkbox" name="remove_site_favicon" id="remove_site_favicon" value="1" style="accent-color: #ef4444;">
                                            <span>Remove custom favicon & restore system default</span>
                                        </label>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ==========================================
                     TAB 2: CONTACT & SPECIALIZED DESKS
                     ========================================== -->
                <div class="tab-pane" id="pane-contact">
                    <div class="card" style="margin-bottom: 24px;">
                        <div class="card-header">
                            <h2 class="card-title">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                </svg>
                                <span>Corporate Contact & Inquiry Desks</span>
                            </h2>
                        </div>
                        <div class="card-body">
                            <!-- Company Legal Name & CIN -->
                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 16px;">
                                <div class="form-group" style="margin-bottom: 0;">
                                    <label for="company_legal_name" class="form-label">Company Legal Name</label>
                                    <input 
                                        type="text" 
                                        id="company_legal_name" 
                                        name="company_legal_name" 
                                        class="form-control"
                                        value="{{ old('company_legal_name', $settings['company_legal_name'] ?? 'SHRISTIYAM COMPLIANCE SOLUTIONS PRIVATE LIMITED') }}" 
                                        placeholder="SHRISTIYAM COMPLIANCE SOLUTIONS PRIVATE LIMITED"
                                    >
                                </div>

                                <div class="form-group" style="margin-bottom: 0;">
                                    <label for="company_cin" class="form-label">Corporate Identity Number (CIN)</label>
                                    <input 
                                        type="text" 
                                        id="company_cin" 
                                        name="company_cin" 
                                        class="form-control"
                                        value="{{ old('company_cin', $settings['company_cin'] ?? 'U74900ME2026PTC473633') }}" 
                                        placeholder="U74900ME2026PTC473633"
                                    >
                                </div>
                            </div>

                            <!-- Main Helpline & Corporate Email -->
                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 16px;">
                                <div class="form-group" style="margin-bottom: 0;">
                                    <label for="contact_phone" class="form-label">Central Telephone / Helpline</label>
                                    <div class="input-icon-group">
                                        <span class="input-icon-left">
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                            </svg>
                                        </span>
                                        <input 
                                            type="text" 
                                            id="contact_phone" 
                                            name="contact_phone" 
                                            class="form-control"
                                            value="{{ old('contact_phone', $settings['contact_phone'] ?? '7020784898 / 9112327953') }}" 
                                            placeholder="7020784898 / 9112327953"
                                        >
                                    </div>
                                </div>

                                <div class="form-group" style="margin-bottom: 0;">
                                    <label for="contact_email" class="form-label">Primary Corporate Inquiries Email</label>
                                    <div class="input-icon-group">
                                        <span class="input-icon-left">
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                                <polyline points="22,6 12,13 2,6"></polyline>
                                            </svg>
                                        </span>
                                        <input 
                                            type="email" 
                                            id="contact_email" 
                                            name="contact_email" 
                                            class="form-control"
                                            value="{{ old('contact_email', $settings['contact_email'] ?? 'admin@shristiyam.com') }}" 
                                            placeholder="admin@shristiyam.com"
                                        >
                                    </div>
                                </div>
                            </div>

                            <!-- Dedicated B2B Desks (EPR Compliance & Polymer Materials) -->
                            <div style="background: rgba(5, 150, 105, 0.04); border: 1px solid rgba(5, 150, 105, 0.2); border-radius: var(--radius-md); padding: 18px; margin-bottom: 18px;">
                                <div style="font-size: 0.88rem; font-weight: 700; color: #059669; margin-bottom: 12px; display: flex; align-items: center; gap: 8px;">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>
                                    <span>Specialized B2B Department Desks</span>
                                </div>

                                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                                    <div class="form-group" style="margin-bottom: 0;">
                                        <label for="epr_desk_email" class="form-label">EPR Statutory Compliance Desk Email</label>
                                        <input 
                                            type="email" 
                                            id="epr_desk_email" 
                                            name="epr_desk_email" 
                                            class="form-control"
                                            value="{{ old('epr_desk_email', $settings['epr_desk_email'] ?? 'admin@shristiyam.com') }}" 
                                            placeholder="admin@shristiyam.com"
                                        >
                                    </div>

                                    <div class="form-group" style="margin-bottom: 0;">
                                        <label for="polymer_sales_email" class="form-label">Polymer Materials & Procurement Desk Email</label>
                                        <input 
                                            type="email" 
                                            id="polymer_sales_email" 
                                            name="polymer_sales_email" 
                                            class="form-control"
                                            value="{{ old('polymer_sales_email', $settings['polymer_sales_email'] ?? 'admin@shristiyam.com') }}" 
                                            placeholder="admin@shristiyam.com"
                                        >
                                    </div>
                                </div>
                            </div>

                            <!-- Operating Hours -->
                            <div class="form-group">
                                <label for="business_hours" class="form-label">Operating / Support Hours</label>
                                <div class="input-icon-group">
                                    <span class="input-icon-left">
                                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <polyline points="12 6 12 12 16 14"></polyline>
                                        </svg>
                                    </span>
                                    <input 
                                        type="text" 
                                        id="business_hours" 
                                        name="business_hours" 
                                        class="form-control"
                                        value="{{ old('business_hours', $settings['business_hours'] ?? 'Monday - Friday: 9:00 AM - 6:00 PM') }}" 
                                        placeholder="Monday - Friday: 9:00 AM - 6:00 PM"
                                    >
                                </div>
                            </div>

                            <!-- Registered Office Address -->
                            <div class="form-group" style="margin-bottom: 0;">
                                <label for="contact_address" class="form-label">Registered Office Address</label>
                                <textarea 
                                    id="contact_address" 
                                    name="contact_address" 
                                    rows="3" 
                                    class="form-control"
                                    placeholder="PL.NO.151, RAMDASPETH, NEAR TULI IMPERIAL HOTEL, Nagpur- 440010, Maharashtra"
                                >{{ old('contact_address', $settings['contact_address'] ?? 'PL.NO.151, RAMDASPETH, NEAR TULI IMPERIAL HOTEL, Nagpur- 440010, Maharashtra') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ==========================================
                     TAB 3: STATUTORY & REGULATORY
                     ========================================== -->
                <div class="tab-pane" id="pane-regulatory">
                    <div class="card" style="margin-bottom: 24px;">
                        <div class="card-header">
                            <h2 class="card-title">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                                </svg>
                                <span>Regulatory Accreditation & Badges</span>
                            </h2>
                        </div>
                        <div class="card-body">
                            <!-- PRO Accreditation Badge -->
                            <div class="form-group">
                                <label for="pro_badge" class="form-label">PRO Statutory Accreditation Label</label>
                                <input 
                                    type="text" 
                                    id="pro_badge" 
                                    name="pro_badge" 
                                    value="{{ old('pro_badge', $settings['pro_badge'] ?? 'Statutory Registered PRO') }}" 
                                    placeholder="e.g. Statutory Registered PRO"
                                >
                            </div>

                            <!-- Environmental Certifications -->
                            <div class="form-group" style="margin-bottom: 0;">
                                <label for="certifications" class="form-label">Audited Certifications (Comma Separated)</label>
                                <input 
                                    type="text" 
                                    id="certifications" 
                                    name="certifications" 
                                    value="{{ old('certifications', $settings['certifications'] ?? 'ISO 14001:2015, ISO 9001:2015, Ocean-Safe Certified') }}" 
                                    placeholder="e.g. ISO 14001:2015, ISO 9001:2015, Ocean-Safe Certified"
                                >
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ==========================================
                     TAB 4: SYSTEM & LOCALIZATION
                     ========================================== -->
                <div class="tab-pane" id="pane-localization">
                    <div class="card" style="margin-bottom: 24px;">
                        <div class="card-header">
                            <h2 class="card-title">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="2" y1="12" x2="22" y2="12"></line>
                                    <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                                </svg>
                                <span>System & Localization</span>
                            </h2>
                        </div>
                        <div class="card-body">
                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                                <!-- Timezone -->
                                <div class="form-group" style="margin-bottom: 0;">
                                    <label for="timezone" class="form-label">System Timezone</label>
                                    <select id="timezone" name="timezone" class="form-control" style="width: 100%; padding: 10px 14px; border: 1px solid var(--border-color); border-radius: var(--radius-md); background: var(--bg-surface); color: var(--text-main);">
                                        @foreach($timezones as $tzVal => $tzLabel)
                                            <option value="{{ $tzVal }}" {{ old('timezone', $settings['timezone'] ?? 'Asia/Kolkata') === $tzVal ? 'selected' : '' }}>
                                                {{ $tzLabel }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Date Format -->
                                <div class="form-group" style="margin-bottom: 0;">
                                    <label for="date_format" class="form-label">Date Display Format</label>
                                    <select id="date_format" name="date_format" class="form-control" style="width: 100%; padding: 10px 14px; border: 1px solid var(--border-color); border-radius: var(--radius-md); background: var(--bg-surface); color: var(--text-main);">
                                        @foreach($dateFormats as $dfVal => $dfLabel)
                                            <option value="{{ $dfVal }}" {{ old('date_format', $settings['date_format'] ?? 'd M Y') === $dfVal ? 'selected' : '' }}>
                                                {{ $dfLabel }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ==========================================
                     TAB 5: SOCIAL MEDIA
                     ========================================== -->
                <div class="tab-pane" id="pane-social">
                    <div class="card" style="margin-bottom: 24px;">
                        <div class="card-header">
                            <h2 class="card-title">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path>
                                    <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path>
                                </svg>
                                <span>Social Media Profiles</span>
                            </h2>
                        </div>
                        <div class="card-body">
                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                                <div class="form-group">
                                    <label for="social_linkedin" class="form-label">LinkedIn Corporate Page</label>
                                    <input 
                                        type="url" 
                                        id="social_linkedin" 
                                        name="social_linkedin" 
                                        value="{{ old('social_linkedin', $settings['social_linkedin'] ?? '') }}" 
                                        placeholder="https://linkedin.com/company/circuflow"
                                    >
                                </div>

                                <div class="form-group">
                                    <label for="social_twitter" class="form-label">Twitter / X Handle</label>
                                    <input 
                                        type="url" 
                                        id="social_twitter" 
                                        name="social_twitter" 
                                        value="{{ old('social_twitter', $settings['social_twitter'] ?? '') }}" 
                                        placeholder="https://twitter.com/circuflow"
                                    >
                                </div>

                                <div class="form-group">
                                    <label for="social_facebook" class="form-label">Facebook Organization Page</label>
                                    <input 
                                        type="url" 
                                        id="social_facebook" 
                                        name="social_facebook" 
                                        value="{{ old('social_facebook', $settings['social_facebook'] ?? '') }}" 
                                        placeholder="https://facebook.com/circuflow"
                                    >
                                </div>

                                <div class="form-group">
                                    <label for="social_youtube" class="form-label">YouTube Official Channel</label>
                                    <input 
                                        type="url" 
                                        id="social_youtube" 
                                        name="social_youtube" 
                                        value="{{ old('social_youtube', $settings['social_youtube'] ?? '') }}" 
                                        placeholder="https://youtube.com/@circuflow"
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ==========================================
                     TAB 6: SEO & LEGAL
                     ========================================== -->
                <div class="tab-pane" id="pane-seo">
                    <div class="card" style="margin-bottom: 24px;">
                        <div class="card-header">
                            <h2 class="card-title">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg>
                                <span>SEO & Legal Content</span>
                            </h2>
                        </div>
                        <div class="card-body">
                            <!-- Default Meta Title -->
                            <div class="form-group">
                                <label for="meta_title" class="form-label">Default SEO Title Tag</label>
                                <input 
                                    type="text" 
                                    id="meta_title" 
                                    name="meta_title" 
                                    class="form-control"
                                    value="{{ old('meta_title', $settings['meta_title'] ?? '') }}" 
                                    placeholder="CircuFlow | Next-Gen Circular Economy & Waste Management Solutions"
                                >
                            </div>

                            <!-- Default Meta Description -->
                            <div class="form-group">
                                <label for="meta_description" class="form-label">Default SEO Meta Description</label>
                                <textarea 
                                    id="meta_description" 
                                    name="meta_description" 
                                    rows="3" 
                                    class="form-control"
                                    placeholder="Meta description"
                                >{{ old('meta_description', $settings['meta_description'] ?? '') }}</textarea>
                            </div>

                            <!-- Copyright Notice -->
                            <div class="form-group" style="margin-bottom: 0;">
                                <label for="copyright_text" class="form-label">Footer Copyright Notice</label>
                                <input 
                                    type="text" 
                                    id="copyright_text" 
                                    name="copyright_text" 
                                    class="form-control"
                                    value="{{ old('copyright_text', $settings['copyright_text'] ?? '') }}" 
                                    placeholder="© 2026 CircuFlow Circular Solutions. All rights reserved."
                                >
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sticky Bottom Save Bar -->
                <div class="card" style="padding: 16px 20px; display: flex; justify-content: flex-end; align-items: center; background: var(--bg-surface); border: 1px solid var(--border-color); border-radius: var(--radius-md);">

                    <div style="display: flex; align-items: center; gap: 12px;">
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary" style="padding: 8px 18px; text-decoration: none;">
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-primary" style="padding: 8px 22px; display: inline-flex; align-items: center; gap: 8px; font-weight: 600;">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                                <polyline points="17 21 17 13 7 13 7 21"></polyline>
                                <polyline points="7 3 7 8 15 8"></polyline>
                            </svg>
                            <span>Save Settings</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- Reusable Internal Media Manager Modal -->
@include('partials.admin.media-picker-modal')
@endsection

@push('scripts')
<script>
// Global Media Picker Trigger for Primary Website Logo
window.chooseLogoFromMedia = function () {
    if (typeof openMediaPickerModal !== 'function') {
        console.error('Media picker modal not loaded');
        return;
    }
    openMediaPickerModal(function (selected) {
        const input = document.getElementById('site_logo');
        const fileInput = document.getElementById('site_logo_file');
        const preview = document.getElementById('logoPreviewImg');
        const badge = document.getElementById('logoFallbackBadge');
        const removeCheckbox = document.getElementById('remove_site_logo');

        if (input) input.value = selected.url;
        if (fileInput) fileInput.value = '';
        if (removeCheckbox) removeCheckbox.checked = false;
        if (preview) {
            preview.src = selected.url;
            preview.style.display = 'block';
        }
        if (badge) badge.style.display = 'none';
    }, {
        buttonText: 'Use as Website Logo',
        showAlt: false
    });
};

// Global Media Picker Trigger for Browser Favicon
window.chooseFaviconFromMedia = function () {
    if (typeof openMediaPickerModal !== 'function') {
        console.error('Media picker modal not loaded');
        return;
    }
    openMediaPickerModal(function (selected) {
        const input = document.getElementById('site_favicon');
        const fileInput = document.getElementById('site_favicon_file');
        const preview = document.getElementById('favPreviewImg');
        const badge = document.getElementById('favFallbackBadge');
        const removeCheckbox = document.getElementById('remove_site_favicon');

        if (input) input.value = selected.url;
        if (fileInput) fileInput.value = '';
        if (removeCheckbox) removeCheckbox.checked = false;
        if (preview) {
            preview.src = selected.url;
            preview.style.display = 'block';
        }
        if (badge) badge.style.display = 'none';
    }, {
        buttonText: 'Use as Browser Favicon',
        showAlt: false
    });
};

document.addEventListener('DOMContentLoaded', function () {
    // Tab switching logic
    const tabButtons = document.querySelectorAll('.settings-nav-tabs .tab-btn');
    const tabPanes = document.querySelectorAll('.settings-content-wrapper .tab-pane');

    tabButtons.forEach(button => {
        button.addEventListener('click', function () {
            const targetTab = this.getAttribute('data-tab');

            tabButtons.forEach(btn => {
                btn.classList.remove('active');
                btn.style.background = 'transparent';
                btn.style.color = 'var(--text-main)';
            });

            tabPanes.forEach(pane => {
                pane.classList.remove('active');
                pane.style.display = 'none';
            });

            this.classList.add('active');
            this.style.background = 'rgba(79, 70, 229, 0.1)';
            this.style.color = 'var(--primary)';

            const activePane = document.getElementById('pane-' + targetTab);
            if (activePane) {
                activePane.classList.add('active');
                activePane.style.display = 'block';
            }
        });
    });

    // Initialize first tab style
    if (tabButtons.length > 0) {
        tabButtons[0].style.background = 'rgba(79, 70, 229, 0.1)';
        tabButtons[0].style.color = 'var(--primary)';
    }

    // Instant local preview for logo file selection
    const logoFileInput = document.getElementById('site_logo_file');
    const logoPreviewImg = document.getElementById('logoPreviewImg');
    const logoFallbackBadge = document.getElementById('logoFallbackBadge');

    if (logoFileInput) {
        logoFileInput.addEventListener('change', function () {
            if (this.files && this.files[0]) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    if (logoPreviewImg) {
                        logoPreviewImg.src = e.target.result;
                        logoPreviewImg.style.display = 'block';
                    }
                    if (logoFallbackBadge) {
                        logoFallbackBadge.style.display = 'none';
                    }
                };
                reader.readAsDataURL(this.files[0]);
            }
        });
    }

    // Instant local preview for favicon file selection
    const favFileInput = document.getElementById('site_favicon_file');
    const favPreviewImg = document.getElementById('favPreviewImg');
    const favFallbackBadge = document.getElementById('favFallbackBadge');

    if (favFileInput) {
        favFileInput.addEventListener('change', function () {
            if (this.files && this.files[0]) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    if (favPreviewImg) {
                        favPreviewImg.src = e.target.result;
                        favPreviewImg.style.display = 'block';
                    }
                    if (favFallbackBadge) {
                        favFallbackBadge.style.display = 'none';
                    }
                };
                reader.readAsDataURL(this.files[0]);
            }
        });
    }

    // Real-time preview if logo path input changes manually
    const logoTextInput = document.getElementById('site_logo');
    if (logoTextInput) {
        logoTextInput.addEventListener('input', function () {
            const val = this.value.trim();
            if (val) {
                if (logoPreviewImg) {
                    logoPreviewImg.src = val;
                    logoPreviewImg.style.display = 'block';
                }
                if (logoFallbackBadge) logoFallbackBadge.style.display = 'none';
            }
        });
    }

    // Real-time preview if favicon path input changes manually
    const favTextInput = document.getElementById('site_favicon');
    if (favTextInput) {
        favTextInput.addEventListener('input', function () {
            const val = this.value.trim();
            if (val) {
                if (favPreviewImg) {
                    favPreviewImg.src = val;
                    favPreviewImg.style.display = 'block';
                }
                if (favFallbackBadge) favFallbackBadge.style.display = 'none';
            }
        });
    }

    // Revert preview on remove checkbox toggle
    const removeLogoCheckbox = document.getElementById('remove_site_logo');
    if (removeLogoCheckbox) {
        removeLogoCheckbox.addEventListener('change', function () {
            if (this.checked) {
                if (logoPreviewImg) logoPreviewImg.style.display = 'none';
                if (logoFallbackBadge) logoFallbackBadge.style.display = 'flex';
            } else {
                if (logoPreviewImg && logoPreviewImg.getAttribute('src')) {
                    logoPreviewImg.style.display = 'block';
                    if (logoFallbackBadge) logoFallbackBadge.style.display = 'none';
                }
            }
        });
    }

    const removeFavCheckbox = document.getElementById('remove_site_favicon');
    if (removeFavCheckbox) {
        removeFavCheckbox.addEventListener('change', function () {
            if (this.checked) {
                if (favPreviewImg) favPreviewImg.style.display = 'none';
                if (favFallbackBadge) favFallbackBadge.style.display = 'flex';
            } else {
                if (favPreviewImg && favPreviewImg.getAttribute('src')) {
                    favPreviewImg.style.display = 'block';
                    if (favFallbackBadge) favFallbackBadge.style.display = 'none';
                }
            }
        });
    }
});
</script>
<style>
.tab-pane {
    display: none;
}
.tab-pane.active {
    display: block;
}
.tab-btn:hover:not(.active) {
    background: var(--bg-hover) !important;
}
#logoPreviewBox:hover, #favPreviewBox:hover {
    border-color: var(--primary) !important;
    background: var(--bg-hover) !important;
    box-shadow: 0 0 0 2px rgba(79, 70, 229, 0.15);
}
</style>
@endpush
