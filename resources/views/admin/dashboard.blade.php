@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard')

@section('content')
<!-- Welcome Banner -->
<div class="welcome-banner" style="margin-bottom: 24px;">
    <div>
        <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 6px; flex-wrap: wrap;">
            <h1 class="welcome-title" style="margin-bottom: 0;">Welcome back, {{ $currentUser->name }}</h1>
            <span style="display: inline-flex; align-items: center; gap: 5px; background: rgba(79, 70, 229, 0.1); border: 1px solid rgba(79, 70, 229, 0.25); color: var(--primary); font-size: 0.78rem; font-weight: 700; padding: 3px 10px; border-radius: 9999px;" title="Temporary: Work started date">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                    <line x1="16" y1="2" x2="16" y2="6"></line>
                    <line x1="8" y1="2" x2="8" y2="6"></line>
                    <line x1="3" y1="10" x2="21" y2="10"></line>
                </svg>
                Work Started: 26 Sept 2026
            </span>
        </div>
    </div>
    <div class="welcome-actions">
        <a href="{{ url('/') }}" target="_blank" class="btn btn-secondary">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="10"></circle>
                <line x1="2" y1="12" x2="22" y2="12"></line>
                <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
            </svg>
            <span>Live Site ↗</span>
        </a>
    </div>
</div>

<!-- Simple Stat Cards Row -->
<div class="kpi-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 20px; margin-bottom: 28px;">
    <!-- Messages Card -->
    <div class="card" style="padding: 22px; border-left: 4px solid #2563eb;">
        <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 12px;">
            <div style="font-size: 0.85rem; font-weight: 700; color: var(--text-muted); text-transform: uppercase;">
                Messages
            </div>
            <div style="width: 36px; height: 36px; border-radius: 8px; background: rgba(37, 99, 235, 0.1); color: #2563eb; display: flex; align-items: center; justify-content: center;">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                    <polyline points="22,6 12,13 2,6"></polyline>
                </svg>
            </div>
        </div>
        <div style="font-size: 2rem; font-weight: 800; color: var(--text-main); margin-bottom: 6px;">
            {{ $metrics['messages_count'] ?? 0 }}
        </div>
        <div style="display: flex; justify-content: space-between; align-items: center; font-size: 0.84rem;">
            @if(($metrics['new_messages_count'] ?? 0) > 0)
                <span style="color: #ef4444; font-weight: 700;">{{ $metrics['new_messages_count'] }} new unread</span>
            @else
                <span style="color: var(--text-muted);">All messages read</span>
            @endif
            <a href="{{ route('admin.enquiries.index') }}" style="color: var(--primary); font-weight: 600; text-decoration: none;">
                View &rarr;
            </a>
        </div>
    </div>

    <!-- Media Files Card -->
    <div class="card" style="padding: 22px; border-left: 4px solid #10b981;">
        <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 12px;">
            <div style="font-size: 0.85rem; font-weight: 700; color: var(--text-muted); text-transform: uppercase;">
                Media
            </div>
            <div style="width: 36px; height: 36px; border-radius: 8px; background: rgba(16, 185, 129, 0.1); color: #059669; display: flex; align-items: center; justify-content: center;">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="3" y="3" width="18" height="18" rx="2"></rect>
                    <circle cx="8.5" cy="8.5" r="1.5"></circle>
                    <polyline points="21 15 16 10 5 21"></polyline>
                </svg>
            </div>
        </div>
        <div style="font-size: 2rem; font-weight: 800; color: var(--text-main); margin-bottom: 6px;">
            {{ $metrics['media_count'] ?? 0 }}
        </div>
        <div style="display: flex; justify-content: space-between; align-items: center; font-size: 0.84rem;">
            <span style="color: var(--text-muted);">Photos & documents</span>
            <a href="{{ route('admin.media.index') }}" style="color: #059669; font-weight: 600; text-decoration: none;">
                Manage &rarr;
            </a>
        </div>
    </div>

    <!-- Policies Card -->
    <div class="card" style="padding: 22px; border-left: 4px solid #f59e0b;">
        <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 12px;">
            <div style="font-size: 0.85rem; font-weight: 700; color: var(--text-muted); text-transform: uppercase;">
                Policies
            </div>
            <div style="width: 36px; height: 36px; border-radius: 8px; background: rgba(245, 158, 11, 0.1); color: #d97706; display: flex; align-items: center; justify-content: center;">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                    <polyline points="14 2 14 8 20 8"></polyline>
                </svg>
            </div>
        </div>
        <div style="font-size: 2rem; font-weight: 800; color: var(--text-main); margin-bottom: 6px;">
            {{ $metrics['policies_count'] ?? 0 }}
        </div>
        <div style="display: flex; justify-content: space-between; align-items: center; font-size: 0.84rem;">
            <span style="color: var(--text-muted);">Legal pages</span>
            <a href="{{ route('admin.policies.index') }}" style="color: #d97706; font-weight: 600; text-decoration: none;">
                Manage &rarr;
            </a>
        </div>
    </div>

    <!-- Sitemap Card -->
    <div class="card" style="padding: 22px; border-left: 4px solid #7c3aed;">
        <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 12px;">
            <div style="font-size: 0.85rem; font-weight: 700; color: var(--text-muted); text-transform: uppercase;">
                Sitemap
            </div>
            <div style="width: 36px; height: 36px; border-radius: 8px; background: rgba(124, 58, 237, 0.1); color: #7c3aed; display: flex; align-items: center; justify-content: center;">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                    <polyline points="2 17 12 22 22 17"></polyline>
                    <polyline points="2 12 12 17 22 12"></polyline>
                </svg>
            </div>
        </div>
        <div style="font-size: 2rem; font-weight: 800; color: var(--text-main); margin-bottom: 6px;">
            Active
        </div>
        <div style="display: flex; justify-content: space-between; align-items: center; font-size: 0.84rem;">
            <span style="color: var(--text-muted);">Indexed pages</span>
            <a href="{{ route('admin.sitemap.index') }}" style="color: #7c3aed; font-weight: 600; text-decoration: none;">
                Open &rarr;
            </a>
        </div>
    </div>
</div>

<!-- Main Two-Column Section -->
<div style="display: grid; grid-template-columns: 2fr 1fr; gap: 24px; align-items: flex-start;">
    <!-- Recent Messages Table -->
    <div class="card" style="padding: 0; overflow: hidden;">
        <div style="padding: 18px 22px; border-bottom: 1px solid var(--border-medium); display: flex; justify-content: space-between; align-items: center;">
            <div>
                <h3 style="margin: 0; font-size: 1.1rem; font-weight: 700;">Recent Messages</h3>
            </div>
            <a href="{{ route('admin.enquiries.index') }}" class="btn btn-secondary btn-sm" style="padding: 6px 12px; font-size: 0.82rem;">
                All Messages &rarr;
            </a>
        </div>

        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; text-align: left; font-size: 0.86rem;">
                <thead>
                    <tr style="background: var(--bg-surface-elevated); border-bottom: 1px solid var(--border-medium); color: var(--text-muted); font-size: 0.76rem; text-transform: uppercase;">
                        <th style="padding: 12px 18px;">From</th>
                        <th style="padding: 12px 18px;">Subject</th>
                        <th style="padding: 12px 18px;">Status</th>
                        <th style="padding: 12px 18px;">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentEnquiries as $enq)
                        @php $badge = $enq->status_badge; @endphp
                        <tr style="border-bottom: 1px solid var(--border-subtle);">
                            <td style="padding: 14px 18px;">
                                <div style="font-weight: 700; color: var(--text-main);">{{ $enq->name }}</div>
                                <div style="font-size: 0.78rem; color: var(--text-muted);">{{ $enq->email }}</div>
                            </td>
                            <td style="padding: 14px 18px;">
                                <div style="color: var(--text-main); font-weight: 500;">
                                    {{ Str::limit($enq->subject ?? 'Inquiry', 35) }}
                                </div>
                            </td>
                            <td style="padding: 14px 18px;">
                                <span style="display: inline-block; font-size: 0.75rem; font-weight: 700; padding: 2px 8px; border-radius: 10px; background: {{ $badge['bg'] }}; color: {{ $badge['color'] }};">
                                    {{ $badge['label'] }}
                                </span>
                            </td>
                            <td style="padding: 14px 18px; color: var(--text-muted); font-size: 0.8rem; white-space: nowrap;">
                                {{ $enq->created_at->diffForHumans() }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" style="padding: 36px 18px; text-align: center; color: var(--text-muted);">
                                No messages yet. Incoming messages will show here.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Quick Shortcuts Card -->
    <div class="card" style="padding: 22px;">
        <h3 style="margin: 0 0 16px 0; font-size: 1.1rem; font-weight: 700;">Quick Shortcuts</h3>

        <div style="display: flex; flex-direction: column; gap: 10px;">
            <a href="{{ route('admin.enquiries.index') }}" class="btn btn-secondary" style="display: flex; align-items: center; justify-content: flex-start; gap: 10px; padding: 10px 14px; text-decoration: none;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                    <polyline points="22,6 12,13 2,6"></polyline>
                </svg>
                <span style="font-weight: 600;">View Messages</span>
            </a>

            <a href="{{ route('admin.policies.index') }}" class="btn btn-secondary" style="display: flex; align-items: center; justify-content: flex-start; gap: 10px; padding: 10px 14px; text-decoration: none;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                    <polyline points="14 2 14 8 20 8"></polyline>
                </svg>
                <span style="font-weight: 600;">Manage Policies</span>
            </a>

            <a href="{{ route('admin.media.index') }}" class="btn btn-secondary" style="display: flex; align-items: center; justify-content: flex-start; gap: 10px; padding: 10px 14px; text-decoration: none;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="3" y="3" width="18" height="18" rx="2"></rect>
                    <circle cx="8.5" cy="8.5" r="1.5"></circle>
                    <polyline points="21 15 16 10 5 21"></polyline>
                </svg>
                <span style="font-weight: 600;">Upload Media</span>
            </a>

            <a href="{{ route('admin.sitemap.index') }}" class="btn btn-secondary" style="display: flex; align-items: center; justify-content: flex-start; gap: 10px; padding: 10px 14px; text-decoration: none;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                    <polyline points="2 17 12 22 22 17"></polyline>
                    <polyline points="2 12 12 17 22 12"></polyline>
                </svg>
                <span style="font-weight: 600;">Update Sitemap</span>
            </a>

            <a href="{{ route('admin.settings.index') }}" class="btn btn-secondary" style="display: flex; align-items: center; justify-content: flex-start; gap: 10px; padding: 10px 14px; text-decoration: none;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="3"></circle>
                    <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                </svg>
                <span style="font-weight: 600;">General Settings</span>
            </a>

            <a href="{{ route('admin.profile') }}" class="btn btn-secondary" style="display: flex; align-items: center; justify-content: flex-start; gap: 10px; padding: 10px 14px; text-decoration: none;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg>
                <span style="font-weight: 600;">My Profile</span>
            </a>
        </div>
    </div>
</div>
@endsection
