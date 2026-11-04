<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Website Admin Panel">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin') | {{ setting('site_name', 'Admin') }}</title>
    @if(setting('site_favicon'))
        <link rel="icon" type="image/x-icon" href="{{ setting('site_favicon') }}">
    @endif
    
    <!-- Design System CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    @stack('styles')
</head>
<body>
    <div class="ambient-glow"></div>

    <div class="admin-wrapper">
        <!-- Sidebar Backdrop (Mobile) -->
        <div class="sidebar-backdrop" id="sidebarBackdrop"></div>

        <!-- ==================================================================
             Sidebar
             ================================================================== -->
        <aside class="sidebar" id="adminSidebar">
            <div class="sidebar-header">
                <div class="brand">
                    @if(setting('site_logo'))
                        <img src="{{ setting('site_logo') }}" alt="{{ setting('site_name', 'SHRISTIYAM') }}" style="max-height: 48px; max-width: 160px; object-fit: contain;">
                    @else
                        <div class="brand-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                                <polyline points="2 17 12 22 22 17"></polyline>
                                <polyline points="2 12 12 17 22 12"></polyline>
                            </svg>
                        </div>
                        <div class="brand-text">
                            <span class="brand-title">{{ setting('site_name', 'Admin') }}</span>
                        </div>
                    @endif
                </div>
                <button class="sidebar-close-btn" id="sidebarCloseBtn" aria-label="Close Sidebar">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>

            <nav class="sidebar-nav">
                <div>
                    <div class="nav-section-title">Menu</div>
                    <ul class="nav-list">
                        <li>
                            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                                <div class="nav-link-content">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="3" y="3" width="7" height="7"></rect>
                                        <rect x="14" y="3" width="7" height="7"></rect>
                                        <rect x="14" y="14" width="7" height="7"></rect>
                                        <rect x="3" y="14" width="7" height="7"></rect>
                                    </svg>
                                    <span>Dashboard</span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.enquiries.index') }}" class="nav-link {{ request()->routeIs('admin.enquiries.*') ? 'active' : '' }}">
                                <div class="nav-link-content">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                        <polyline points="22,6 12,13 2,6"></polyline>
                                    </svg>
                                    <span>Messages</span>
                                </div>
                                @if(($newEnquiriesCount ?? 0) > 0)
                                    <span class="nav-pill" style="background: rgba(239, 68, 68, 0.12); color: #ef4444; font-weight: 700;">{{ $newEnquiriesCount }}</span>
                                @endif
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.policies.index') }}" class="nav-link {{ request()->routeIs('admin.policies.*') ? 'active' : '' }}">
                                <div class="nav-link-content">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                        <polyline points="14 2 14 8 20 8"></polyline>
                                        <line x1="16" y1="13" x2="8" y2="13"></line>
                                        <line x1="16" y1="17" x2="8" y2="17"></line>
                                        <polyline points="10 9 9 9 8 9"></polyline>
                                    </svg>
                                    <span>Policies</span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.testimonials.index') }}" class="nav-link {{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}">
                                <div class="nav-link-content">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
                                    </svg>
                                    <span>Testimonials</span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.client-logos.index') }}" class="nav-link {{ request()->routeIs('admin.client-logos.*') ? 'active' : '' }}">
                                <div class="nav-link-content">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                                        <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                                    </svg>
                                    <span>Client Logos</span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.jobs.index') }}" class="nav-link {{ request()->routeIs('admin.jobs.*') ? 'active' : '' }}">
                                <div class="nav-link-content">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                                        <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                                    </svg>
                                    <span>Careers / Jobs</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item-dropdown {{ request()->routeIs('admin.blogs.*') || request()->routeIs('admin.blog-categories.*') ? 'open' : '' }}">
                            <button type="button" class="nav-link nav-dropdown-toggle {{ request()->routeIs('admin.blogs.*') || request()->routeIs('admin.blog-categories.*') ? 'active' : '' }}" onclick="toggleNavDropdown(this)">
                                <div class="nav-link-content">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                                        <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                                    </svg>
                                    <span>Blogs</span>
                                </div>
                                <svg class="dropdown-chevron" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="6 9 12 15 18 9"></polyline>
                                </svg>
                            </button>
                            <ul class="nav-submenu">
                                <li>
                                    <a href="{{ route('admin.blogs.index') }}" class="nav-sub-link {{ request()->routeIs('admin.blogs.index') || request()->routeIs('admin.blogs.edit') ? 'active' : '' }}">
                                        <span class="sub-dot"></span>
                                        <span>All Articles</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.blogs.create') }}" class="nav-sub-link {{ request()->routeIs('admin.blogs.create') ? 'active' : '' }}">
                                        <span class="sub-dot"></span>
                                        <span>Add Article</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.blog-categories.index') }}" class="nav-sub-link {{ request()->routeIs('admin.blog-categories.*') ? 'active' : '' }}">
                                        <span class="sub-dot"></span>
                                        <span>Categories</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('admin.media.index') }}" class="nav-link {{ request()->routeIs('admin.media.*') ? 'active' : '' }}">
                                <div class="nav-link-content">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                        <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                        <polyline points="21 15 16 10 5 21"></polyline>
                                    </svg>
                                    <span>Media</span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.sitemap.index') }}" class="nav-link {{ request()->routeIs('admin.sitemap.*') ? 'active' : '' }}">
                                <div class="nav-link-content">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                                        <polyline points="2 17 12 22 22 17"></polyline>
                                        <polyline points="2 12 12 17 22 12"></polyline>
                                    </svg>
                                    <span>Sitemap</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>

                <div>
                    <div class="nav-section-title">Settings</div>
                    <ul class="nav-list">
                        <li>
                            <a href="{{ route('admin.settings.index') }}" class="nav-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                                <div class="nav-link-content">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="12" cy="12" r="3"></circle>
                                        <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                                    </svg>
                                    <span>General Settings</span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.profile') }}" class="nav-link {{ request()->routeIs('admin.profile') ? 'active' : '' }}">
                                <div class="nav-link-content">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <span>Profile</span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.change-password') }}" class="nav-link {{ request()->routeIs('admin.change-password') ? 'active' : '' }}">
                                <div class="nav-link-content">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                    </svg>
                                    <span>Password</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="sidebar-footer">
                <div class="user-quick-profile">
                    <div class="user-avatar">
                        {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
                    </div>
                    <div class="user-quick-info">
                        <div class="user-quick-name">{{ Auth::user()->name ?? 'Administrator' }}</div>
                        <div class="user-quick-role">{{ Auth::user()->job_title ?? 'Super Admin' }}</div>
                    </div>
                </div>
            </div>
        </aside>

        <!-- ==================================================================
             Main Content Wrapper
             ================================================================== -->
        <div class="main-wrapper">
            <!-- Top Navigation -->
            <header class="topnav">
                <div class="topnav-left">
                    <button class="mobile-menu-btn" id="mobileMenuBtn" aria-label="Open Navigation Menu">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="3" y1="12" x2="21" y2="12"></line>
                            <line x1="3" y1="6" x2="21" y2="6"></line>
                            <line x1="3" y1="18" x2="21" y2="18"></line>
                        </svg>
                    </button>
                    <div class="breadcrumb">
                        <span>Admin</span>
                        <span>/</span>
                        <span class="breadcrumb-item active">@yield('page_title', 'Dashboard')</span>
                    </div>
                </div>

                <div class="topnav-right">
                    <!-- Temporary Project Started Badge (Can be deleted upon project completion) -->
                    <div style="display: inline-flex; align-items: center; gap: 6px; background: rgba(79, 70, 229, 0.08); border: 1px solid rgba(79, 70, 229, 0.2); padding: 5px 12px; border-radius: var(--radius-md); font-size: 0.78rem; color: var(--primary); font-weight: 600;">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="16" y1="2" x2="16" y2="6"></line>
                            <line x1="8" y1="2" x2="8" y2="6"></line>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                        </svg>
                        <span>Work Started: 26 Sept 2026</span>
                    </div>
                    <!-- View Live Website Button -->
                    <a href="{{ url('/') }}" target="_blank" class="btn btn-secondary" style="padding: 7px 14px; font-size: 0.82rem; font-weight: 600; text-decoration: none; display: inline-flex; align-items: center; gap: 6px;">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="2" y1="12" x2="22" y2="12"></line>
                            <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                        </svg>
                        <span>Live Site ↗</span>
                    </a>

                    <!-- User Profile Dropdown -->
                    <div class="profile-dropdown-container">
                        <button class="profile-trigger-btn" id="profileTriggerBtn" aria-label="Open profile options">
                            <div class="user-avatar" style="width: 32px; height: 32px; font-size: 0.85rem;">
                                {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
                            </div>
                            <span class="user-name-label" style="font-size: 0.88rem; font-weight: 600;">
                                {{ Auth::user()->name ?? 'Admin' }}
                            </span>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </button>

                        <div class="profile-dropdown-menu" id="profileDropdownMenu">
                            <div class="dropdown-user-header">
                                <div class="name">{{ Auth::user()->name ?? 'Administrator' }}</div>
                                <div class="email">{{ Auth::user()->email ?? 'admin@admin.com' }}</div>
                            </div>
                            <a href="{{ route('admin.profile') }}" class="dropdown-item">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                                <span>My Profile</span>
                            </a>
                            <a href="{{ route('admin.change-password') }}" class="dropdown-item">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                </svg>
                                <span>Change Password</span>
                            </a>
                            <a href="{{ route('admin.settings.index') }}" class="dropdown-item">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="12" r="3"></circle>
                                    <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                                </svg>
                                <span>General Settings</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item danger" style="width: 100%;">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                        <polyline points="16 17 21 12 16 7"></polyline>
                                        <line x1="21" y1="12" x2="9" y2="12"></line>
                                    </svg>
                                    <span>Log Out</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Body Content -->
            <main class="page-content">
                @if(session('success'))
                    <div class="alert alert-success">
                        <div style="display: flex; align-items: center; gap: 10px;">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                <polyline points="22 4 12 14.01 9 11.01"></polyline>
                            </svg>
                            <span>{{ session('success') }}</span>
                        </div>
                        <button class="alert-close" aria-label="Close Alert">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">
                        <div style="display: flex; align-items: center; gap: 10px;">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="12" y1="8" x2="12" y2="12"></line>
                                <line x1="12" y1="16" x2="12.01" y2="16"></line>
                            </svg>
                            <span>{{ session('error') }}</span>
                        </div>
                        <button class="alert-close" aria-label="Close Alert">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </button>
                    </div>
                @endif

                @yield('content')
            </main>

            <!-- ==============================================================
                 Footer
                 ============================================================== -->
            <footer class="footer">
                <div class="footer-left" style="display: flex; align-items: center; gap: 12px; flex-wrap: wrap;">
                    <span>&copy; {{ date('Y') }} {{ setting('site_name', 'Admin Panel') }}</span>
                    <span style="color: var(--border-color);">&bull;</span>
                    <span style="display: inline-flex; align-items: center; gap: 5px; font-size: 0.8rem; color: var(--text-muted);">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="16" y1="2" x2="16" y2="6"></line>
                            <line x1="8" y1="2" x2="8" y2="6"></line>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                        </svg>
                        Work Started: <strong style="color: var(--text-main); font-weight: 600;">26 Sept 2026</strong>
                    </span>
                </div>

                <div class="footer-right">
                    <a href="{{ url('/') }}" target="_blank" style="color: var(--primary); font-weight: 600; text-decoration: none;">View Website &rarr;</a>
                </div>
            </footer>
        </div>
    </div>

    <!-- Admin Modals Portal (Rendered directly under body to guarantee top-level stacking) -->
    @stack('modals')

    <!-- Frontend Interactive Script -->
    <script src="{{ asset('js/admin.js') }}"></script>
    @stack('scripts')
</body>
</html>
