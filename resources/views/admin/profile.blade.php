@extends('layouts.admin')

@section('title', 'Profile')
@section('page_title', 'Profile')

@section('content')
    <div class="profile-page-grid">
        <!-- ==================================================================
             Left Column: Profile Edit Form
             ================================================================== -->
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                    <span>Edit Profile Details</span>
                </h2>
                <span style="font-size: 0.8rem; color: var(--text-muted);">
                    ID: <strong style="color: var(--text-primary); font-family: var(--font-mono);">#{{ $currentUser->id }}</strong>
                </span>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.profile.update') }}" method="POST" id="editProfileForm">
                    @csrf

                    <!-- 1. Full Name -->
                    <div class="form-group">
                        <label for="name" class="form-label">Full Name</label>
                        <div class="input-icon-group">
                            <span class="input-icon-left">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                            </span>
                            <input 
                                type="text" 
                                id="name" 
                                name="name" 
                                class="form-control"
                                value="{{ old('name', $currentUser->name) }}" 
                                placeholder="Full Name" 
                                required
                                autocomplete="name"
                            >
                        </div>
                        @error('name')
                            <div class="field-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- 2. Email Address -->
                    <div class="form-group">
                        <label for="email" class="form-label">Email Address</label>
                        <div class="input-icon-group">
                            <span class="input-icon-left">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                </svg>
                            </span>
                            <input 
                                type="email" 
                                id="email" 
                                name="email" 
                                class="form-control"
                                value="{{ old('email', $currentUser->email) }}" 
                                placeholder="Email Address" 
                                required
                                autocomplete="email"
                            >
                        </div>
                        @error('email')
                            <div class="field-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- 3. Phone Number -->
                    <div class="form-group">
                        <label for="phone" class="form-label">Phone Number</label>
                        <div class="input-icon-group">
                            <span class="input-icon-left">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                </svg>
                            </span>
                            <input 
                                type="text" 
                                id="phone" 
                                name="phone" 
                                class="form-control"
                                value="{{ old('phone', $currentUser->phone) }}" 
                                placeholder="Phone Number" 
                                autocomplete="tel"
                            >
                        </div>
                        @error('phone')
                            <div class="field-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- 4. Job Title / Role -->
                    <div class="form-group">
                        <label for="job_title" class="form-label">Role / Job Title</label>
                        <div class="input-icon-group">
                            <span class="input-icon-left">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                                    <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                                </svg>
                            </span>
                            <input 
                                type="text" 
                                id="job_title" 
                                name="job_title" 
                                class="form-control"
                                value="{{ old('job_title', $currentUser->job_title) }}" 
                                placeholder="Job Title" 
                            >
                        </div>
                        @error('job_title')
                            <div class="field-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- 5. Bio / Notes -->
                    <div class="form-group">
                        <label for="bio" class="form-label">About / Bio</label>
                        <div class="input-icon-group">
                            <span class="input-icon-left textarea-icon" style="top: 14px; transform: none;">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                    <polyline points="14 2 14 8 20 8"></polyline>
                                    <line x1="16" y1="13" x2="8" y2="13"></line>
                                    <line x1="16" y1="17" x2="8" y2="17"></line>
                                </svg>
                            </span>
                            <textarea 
                                id="bio" 
                                name="bio" 
                                rows="3" 
                                class="form-control"
                                placeholder="About / Bio"
                            >{{ old('bio', $currentUser->bio) }}</textarea>
                        </div>
                        @error('bio')
                            <div class="field-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Form Action Buttons -->
                    <div style="display: flex; gap: 14px; margin-top: 30px; align-items: center;">
                        <button type="submit" class="btn btn-primary" style="padding: 12px 28px;">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                                <polyline points="17 21 17 13 7 13 7 21"></polyline>
                                <polyline points="7 3 7 8 15 8"></polyline>
                            </svg>
                            <span>Save Profile</span>
                        </button>

                        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <!-- ==================================================================
             Right Column: Profile Overview Card & Quick Security Navigation
             ================================================================== -->
        <div>
            <!-- Profile Identity Card -->
            <div class="card" style="margin-bottom: 24px;">
                <div class="profile-avatar-banner">
                    <div class="profile-avatar-large">
                        {{ strtoupper(substr($currentUser->name ?? 'A', 0, 1)) }}
                    </div>
                    <h3 class="profile-name-lg">{{ $currentUser->name }}</h3>
                    <div class="profile-role-badge">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                        </svg>
                        <span>{{ $currentUser->job_title ?? 'Super Admin' }}</span>
                    </div>
                    <div style="font-size: 0.85rem; color: var(--text-muted); font-family: var(--font-mono);">
                        {{ $currentUser->email }}
                    </div>
                </div>

                <ul class="profile-meta-list">
                    <li class="profile-meta-item">
                        <span class="profile-meta-label">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                            </svg>
                            <span>Role</span>
                        </span>
                        <span class="profile-meta-val" style="color: var(--primary); font-weight: 600;">
                            {{ $currentUser->job_title ?? 'Admin' }}
                        </span>
                    </li>

                    <li class="profile-meta-item">
                        <span class="profile-meta-label">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="color: var(--text-muted);">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                            </svg>
                            <span>Member Since</span>
                        </span>
                        <span class="profile-meta-val">
                            {{ $currentUser->created_at ? $currentUser->created_at->format('M d, Y') : 'Sept 2026' }}
                        </span>
                    </li>

                    <li class="profile-meta-item">
                        <span class="profile-meta-label">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="color: var(--text-muted);">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="12 6 12 12 16 14"></polyline>
                            </svg>
                            <span>Last Updated</span>
                        </span>
                        <span class="profile-meta-val" style="font-family: var(--font-mono); font-size: 0.8rem;">
                            {{ $currentUser->updated_at ? $currentUser->updated_at->diffForHumans() : 'Just now' }}
                        </span>
                    </li>
                </ul>
            </div>

            <!-- Quick Password Box -->
            <div class="card" style="padding: 22px;">
                <div style="display: flex; align-items: flex-start; gap: 14px;">
                    <div style="width: 38px; height: 38px; border-radius: var(--radius-md); background: rgba(37, 99, 235, 0.1); color: var(--primary); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                        </svg>
                    </div>
                    <div>
                        <h4 style="font-size: 0.95rem; font-weight: 700; margin-bottom: 8px;">
                            Password
                        </h4>
                        <a href="{{ route('admin.change-password') }}" class="btn btn-secondary btn-sm" style="padding: 6px 12px; font-size: 0.82rem; text-decoration: none;">
                            Change Password &rarr;
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
