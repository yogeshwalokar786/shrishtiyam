@extends('layouts.admin')

@section('title', 'Password')
@section('page_title', 'Password')

@section('content')
    <div style="max-width: 620px; margin: 0 auto;">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                    </svg>
                    <span>Update Your Password</span>
                </h2>
                <span style="font-size: 0.8rem; color: var(--text-muted);">
                    User: <strong style="color: var(--text-primary);">{{ $currentUser->email }}</strong>
                </span>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.update-password') }}" method="POST" id="changePasswordForm">
                    @csrf

                    <!-- 1. Current Password Field -->
                    <div class="form-group">
                        <label for="current_password" class="form-label">Current Password</label>
                        <div class="input-icon-group">
                            <span class="input-icon-left">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M21 2l-2 2m-2-2l2 2M3 21l8-8m2 2l-2-2m-4 4l-2-2"></path>
                                    <circle cx="7.5" cy="7.5" r="4.5"></circle>
                                </svg>
                            </span>
                            <input 
                                type="password" 
                                id="current_password" 
                                name="current_password" 
                                class="form-control"
                                placeholder="Current password" 
                                required
                                autocomplete="current-password"
                            >
                            <button type="button" class="password-toggle-btn" data-target="current_password" aria-label="Toggle password view">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                            </button>
                        </div>
                        @error('current_password')
                            <div class="field-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- 2. New Password Field -->
                    <div class="form-group">
                        <label for="password" class="form-label">New Password</label>
                        <div class="input-icon-group">
                            <span class="input-icon-left">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                </svg>
                            </span>
                            <input 
                                type="password" 
                                id="password" 
                                name="password" 
                                class="form-control"
                                placeholder="New password" 
                                required
                                autocomplete="new-password"
                            >
                            <button type="button" class="password-toggle-btn" data-target="password" aria-label="Toggle password view">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                            </button>
                        </div>

                        <!-- Real-time Strength Meter -->
                        <div class="strength-meter-container">
                            <div class="strength-bar-track">
                                <div class="strength-bar-fill" id="strengthBarFill"></div>
                            </div>
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <span class="strength-label">Strength: <strong id="strengthLabel">Enter password</strong></span>
                            </div>
                        </div>

                        @error('password')
                            <div class="field-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- 3. Confirm New Password Field -->
                    <div class="form-group">
                        <label for="password_confirmation" class="form-label">Confirm New Password</label>
                        <div class="input-icon-group">
                            <span class="input-icon-left">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                            </span>
                            <input 
                                type="password" 
                                id="password_confirmation" 
                                name="password_confirmation" 
                                class="form-control"
                                placeholder="Confirm new password" 
                                required
                                autocomplete="new-password"
                            >
                            <button type="button" class="password-toggle-btn" data-target="password_confirmation" aria-label="Toggle password view">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                            </button>
                        </div>
                        <div id="passwordMatchIndicator" style="font-size: 0.8rem; margin-top: 6px; font-weight: 500;"></div>
                    </div>

                    <!-- Form Action Buttons -->
                    <div style="display: flex; gap: 14px; margin-top: 30px; align-items: center;">
                        <button type="submit" class="btn btn-primary" style="padding: 12px 28px;">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                                <polyline points="17 21 17 13 7 13 7 21"></polyline>
                                <polyline points="7 3 7 8 15 8"></polyline>
                            </svg>
                            <span>Save New Password</span>
                        </button>

                        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
