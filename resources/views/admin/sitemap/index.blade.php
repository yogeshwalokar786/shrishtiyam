@extends('layouts.admin')

@section('title', 'Sitemap')
@section('page_title', 'Sitemap')

@section('content')
    <!-- ======================================================================
         Page Header
         ====================================================================== -->
    <div class="welcome-banner" style="margin-bottom: 24px;">
        <div>
            <h1 class="welcome-title">Sitemap</h1>
        </div>
        <div class="welcome-actions">
            <a href="{{ url('sitemap.xml') }}" target="_blank" class="btn btn-secondary">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="2" y1="12" x2="22" y2="12"></line>
                    <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                </svg>
                <span>View sitemap.xml ↗</span>
            </a>
            <form action="{{ route('admin.sitemap.generate') }}" method="POST" style="display: inline-block;">
                @csrf
                <button type="submit" class="btn btn-primary" id="regenerateBtn">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="23 4 23 10 17 10"></polyline>
                        <polyline points="1 20 1 14 7 14"></polyline>
                        <path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path>
                    </svg>
                    <span>Regenerate Sitemap</span>
                </button>
            </form>
        </div>
    </div>

    <!-- ======================================================================
         Sitemap Status KPI Overview
         ====================================================================== -->
    <div class="kpi-grid" style="grid-template-columns: repeat(3, 1fr); margin-bottom: 24px;">
        <!-- Card 1: File Status -->
        <div class="kpi-card">
            <div class="kpi-header">
                <div class="kpi-icon-wrapper kpi-icon-emerald">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                        <polyline points="14 2 14 8 20 8"></polyline>
                    </svg>
                </div>
                <span class="badge badge-success" style="font-size: 0.78rem;">
                    <span style="width: 6px; height: 6px; border-radius: 50%; background: currentColor;"></span>
                    Active
                </span>
            </div>
            <div class="kpi-title">File Size</div>
            <div class="kpi-value" style="font-size: 1.55rem;">
                {{ $fileInfo['size'] }}
            </div>
        </div>

        <!-- Card 2: Total Indexed URLs -->
        <div class="kpi-card">
            <div class="kpi-header">
                <div class="kpi-icon-wrapper kpi-icon-indigo">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="2" y1="12" x2="22" y2="12"></line>
                        <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                    </svg>
                </div>
                <span class="kpi-trend trend-up">Indexed</span>
            </div>
            <div class="kpi-title">Indexed Pages</div>
            <div class="kpi-value" style="font-size: 1.55rem;">
                {{ $fileInfo['total_urls'] }} Pages
            </div>
        </div>

        <!-- Card 3: Last Sync Timestamp -->
        <div class="kpi-card">
            <div class="kpi-header">
                <div class="kpi-icon-wrapper kpi-icon-cyan">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polyline points="12 6 12 12 16 14"></polyline>
                    </svg>
                </div>
                <span class="badge badge-primary" style="font-size: 0.75rem;">SEO Ready</span>
            </div>
            <div class="kpi-title">Last Generated</div>
            <div class="kpi-value" style="font-size: 1.15rem; font-family: var(--font-mono); margin-top: 4px;">
                {{ $fileInfo['last_modified'] }}
            </div>
        </div>
    </div>

    <!-- ======================================================================
         Main Grid: Add URL & Indexed Table
         ====================================================================== -->
    <div style="display: grid; grid-template-columns: 360px 1fr; gap: 24px; margin-bottom: 24px;">
        <!-- Left: Add New URL Form -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="12" y1="8" x2="12" y2="16"></line>
                        <line x1="8" y1="12" x2="16" y2="12"></line>
                    </svg>
                    <span>Add Page</span>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.sitemap.add') }}" method="POST">
                    @csrf

                    <!-- 1. Page Title -->
                    <div class="form-group">
                        <label for="title" class="form-label">Page Title</label>
                        <input 
                            type="text" 
                            id="title" 
                            name="title" 
                            class="form-control" 
                            placeholder="Page title"
                            value="{{ old('title') }}" 
                            required
                            style="width: 100%; padding: 10px 14px; border: 1px solid var(--border-color); border-radius: var(--radius-sm); font-size: 0.9rem;"
                        >
                        @error('title')
                            <div class="field-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- 2. URL or Path -->
                    <div class="form-group">
                        <label for="url" class="form-label">URL or Path</label>
                        <input 
                            type="text" 
                            id="url" 
                            name="url" 
                            class="form-control" 
                            placeholder="/path" 
                            value="{{ old('url') }}" 
                            required
                            style="width: 100%; padding: 10px 14px; border: 1px solid var(--border-color); border-radius: var(--radius-sm); font-size: 0.9rem;"
                        >
                        @error('url')
                            <div class="field-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- 3. Change Frequency -->
                    <div class="form-group">
                        <label for="changefreq" class="form-label">Change Frequency</label>
                        <select 
                            id="changefreq" 
                            name="changefreq" 
                            required
                            style="width: 100%; padding: 10px 14px; border: 1px solid var(--border-color); border-radius: var(--radius-sm); font-size: 0.9rem; background: #ffffff;"
                        >
                            <option value="daily">Daily</option>
                            <option value="weekly" selected>Weekly</option>
                            <option value="monthly">Monthly</option>
                            <option value="yearly">Yearly</option>
                            <option value="always">Always</option>
                            <option value="never">Never</option>
                        </select>
                        @error('changefreq')
                            <div class="field-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- 4. Priority -->
                    <div class="form-group">
                        <label for="priority" class="form-label">Priority</label>
                        <select 
                            id="priority" 
                            name="priority" 
                            required
                            style="width: 100%; padding: 10px 14px; border: 1px solid var(--border-color); border-radius: var(--radius-sm); font-size: 0.9rem; background: #ffffff;"
                        >
                            <option value="1.0">1.0</option>
                            <option value="0.9">0.9</option>
                            <option value="0.8" selected>0.8</option>
                            <option value="0.7">0.7</option>
                            <option value="0.6">0.6</option>
                            <option value="0.5">0.5</option>
                            <option value="0.3">0.3</option>
                        </select>
                        @error('priority')
                            <div class="field-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary" style="width: 100%; padding: 11px; margin-top: 10px; justify-content: center;">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                        <span>Add Page</span>
                    </button>
                </form>
            </div>
        </div>

        <!-- Right: Current Indexed URLs Table -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="8" y1="6" x2="21" y2="6"></line>
                        <line x1="8" y1="12" x2="21" y2="12"></line>
                        <line x1="8" y1="18" x2="21" y2="18"></line>
                        <line x1="3" y1="6" x2="3.01" y2="6"></line>
                        <line x1="3" y1="12" x2="3.01" y2="12"></line>
                        <line x1="3" y1="18" x2="3.01" y2="18"></line>
                    </svg>
                    <span>Indexed Pages</span>
                </h3>
                <span style="font-size: 0.82rem; color: var(--text-muted);">
                    {{ count($entries) }} URLs active
                </span>
            </div>
            <div class="table-responsive">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Page / Title</th>
                            <th>Frequency</th>
                            <th>Priority</th>
                            <th>Last Modified</th>
                            <th style="text-align: right;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($entries as $entry)
                            <tr>
                                <td>
                                    <div style="display: flex; flex-direction: column; gap: 3px;">
                                        <strong style="color: var(--text-primary); font-size: 0.88rem;">{{ $entry['title'] ?? 'Corporate URL' }}</strong>
                                        <a href="{{ $entry['url'] }}" target="_blank" style="font-family: var(--font-mono); font-size: 0.78rem; color: var(--primary-light); text-decoration: none; display: inline-flex; align-items: center; gap: 4px;">
                                            <span>{{ $entry['url'] }}</span>
                                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
                                                <polyline points="15 3 21 3 21 9"></polyline>
                                                <line x1="10" y1="14" x2="21" y2="3"></line>
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge" style="background: var(--bg-card); border: 1px solid var(--border-subtle); color: var(--text-secondary); text-transform: uppercase; font-size: 0.72rem; letter-spacing: 0.05em;">
                                        {{ $entry['changefreq'] }}
                                    </span>
                                </td>
                                <td>
                                    <div style="display: flex; align-items: center; gap: 6px;">
                                        <div style="width: 36px; height: 6px; background: #e2e8f0; border-radius: 3px; overflow: hidden;">
                                            <div style="width: {{ floatval($entry['priority']) * 100 }}%; height: 100%; background: var(--primary);"></div>
                                        </div>
                                        <span style="font-family: var(--font-mono); font-size: 0.82rem; font-weight: 700; color: var(--text-primary);">
                                            {{ $entry['priority'] }}
                                        </span>
                                    </div>
                                </td>
                                <td style="font-family: var(--font-mono); font-size: 0.8rem; color: var(--text-muted);">
                                    {{ $entry['lastmod'] ?? date('Y-m-d') }}
                                </td>
                                <td style="text-align: right;">
                                    @if(empty($entry['is_default']))
                                        <form action="{{ route('admin.sitemap.delete', $entry['id']) }}" method="POST" onsubmit="return confirm('Remove this URL from sitemap?');" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-secondary" style="padding: 6px 10px; color: #ef4444; border-color: rgba(239, 68, 68, 0.2);" title="Remove URL">
                                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                    <polyline points="3 6 5 6 21 6"></polyline>
                                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                </svg>
                                            </button>
                                        </form>
                                    @else
                                        <span class="badge" style="background: rgba(79, 70, 229, 0.08); color: var(--primary); font-size: 0.72rem;">Core Page</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" style="text-align: center; padding: 32px; color: var(--text-muted);">
                                    No sitemap URLs indexed yet.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- ======================================================================
         Live XML Code Preview Card
         ====================================================================== -->
    <div class="card" style="margin-bottom: 24px;">
        <div class="card-header">
            <h3 class="card-title">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polyline points="16 18 22 12 16 6"></polyline>
                    <polyline points="8 6 2 12 8 18"></polyline>
                </svg>
                <span>XML Preview (/sitemap.xml)</span>
            </h3>
            <div style="display: flex; gap: 10px; align-items: center;">
                <button type="button" class="btn btn-secondary" id="copyUrlBtn" style="padding: 7px 12px; font-size: 0.82rem;">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                    </svg>
                    <span>Copy URL</span>
                </button>
                <a href="{{ route('admin.sitemap.download') }}" class="btn btn-secondary" style="padding: 7px 12px; font-size: 0.82rem;">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                        <polyline points="7 10 12 15 17 10"></polyline>
                        <line x1="12" y1="15" x2="12" y2="3"></line>
                    </svg>
                    <span>Download</span>
                </a>
            </div>
        </div>
        <div class="card-body" style="padding: 0;">
            <pre style="margin: 0; padding: 20px; background: #0f172a; color: #e2e8f0; font-family: var(--font-mono); font-size: 0.85rem; line-height: 1.6; max-height: 340px; overflow-y: auto; border-bottom-left-radius: var(--radius-lg); border-bottom-right-radius: var(--radius-lg);"><code>{{ $xmlPreview }}</code></pre>
        </div>
    </div>

    <!-- Script for copy URL button -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const copyBtn = document.getElementById('copyUrlBtn');
            if (copyBtn) {
                copyBtn.addEventListener('click', function () {
                    const sitemapUrl = "{{ url('sitemap.xml') }}";
                    navigator.clipboard.writeText(sitemapUrl).then(() => {
                        const originalHtml = copyBtn.innerHTML;
                        copyBtn.innerHTML = `
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#10b981" stroke-width="2.5">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            <span style="color: #10b981; font-weight: 700;">Copied URL!</span>
                        `;
                        setTimeout(() => {
                            copyBtn.innerHTML = originalHtml;
                        }, 2500);
                    });
                });
            }
        });
    </script>
@endsection
