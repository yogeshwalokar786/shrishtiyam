<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="NovaPlatform Corporate Website is launching soon. Discover our corporate business divisions, investor media, leadership profiles, and company insights.">
    <title>NovaPlatform | Official Corporate Website &bull; Coming Soon</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@500;700;800&display=swap" rel="stylesheet">

    <!-- Coming Soon Dedicated Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/coming-soon.css') }}">
</head>
<body class="coming-soon-body">
    <!-- Ambient Background Lighting -->
    <div class="ambient-container">
        <div class="grid-overlay"></div>
        <div class="glow-orb glow-orb-1"></div>
        <div class="glow-orb glow-orb-2"></div>
        <div class="glow-orb glow-orb-3"></div>
    </div>

    <!-- Header Navigation -->
    <header class="cs-header">
        <a href="{{ url('/') }}" class="cs-brand">
            <div class="cs-brand-icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                    <polyline points="2 17 12 22 22 17"></polyline>
                    <polyline points="2 12 12 17 22 12"></polyline>
                </svg>
            </div>
            <div class="cs-brand-text">
                <span class="cs-brand-name">NovaPlatform</span>
                <span class="cs-brand-tagline">Corporate Group</span>
            </div>
        </a>

        <div class="cs-header-actions">
            @auth
                <a href="{{ route('admin.dashboard') }}" class="btn-admin-portal">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="3" width="7" height="7"></rect>
                        <rect x="14" y="3" width="7" height="7"></rect>
                        <rect x="14" y="14" width="7" height="7"></rect>
                        <rect x="3" y="14" width="7" height="7"></rect>
                    </svg>
                    <span>Go to Dashboard</span>
                </a>
            @else
                <a href="{{ route('login') }}" class="btn-admin-portal">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path>
                        <polyline points="10 17 15 12 10 7"></polyline>
                        <line x1="15" y1="12" x2="3" y2="12"></line>
                    </svg>
                    <span>Staff Sign In</span>
                </a>
            @endauth
        </div>
    </header>

    <!-- Main Content -->
    <main class="cs-main">
        <!-- Status Pill Badge -->
        <div class="cs-badge">
            <span class="cs-badge-dot"></span>
            <span>Official Corporate Website &bull; Launching Soon</span>
        </div>

        <!-- Hero Headline -->
        <h1 class="cs-hero-title">
            Our New Corporate Presence is<br>
            <span class="gradient-span">Arriving Soon.</span>
        </h1>

        <!-- Subtitle -->
        <p class="cs-hero-desc">
            We are preparing the official digital home for Nova Corporate Group — showcasing our global business divisions, leadership initiatives, investor media, and corporate insights.
        </p>

        <!-- Dynamic Countdown Grid -->
        <div class="countdown-grid">
            <div class="countdown-card">
                <span class="countdown-number" id="countDays">45</span>
                <span class="countdown-label">Days</span>
            </div>
            <div class="countdown-card">
                <span class="countdown-number" id="countHours">08</span>
                <span class="countdown-label">Hours</span>
            </div>
            <div class="countdown-card">
                <span class="countdown-number" id="countMinutes">24</span>
                <span class="countdown-label">Minutes</span>
            </div>
            <div class="countdown-card">
                <span class="countdown-number" id="countSeconds">36</span>
                <span class="countdown-label">Seconds</span>
            </div>
        </div>

        <!-- Notify Form / Early Access -->
        <div class="cs-form-wrapper">
            <form id="notifyForm" class="cs-form" novalidate>
                <div class="cs-input-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                        <polyline points="22,6 12,13 2,6"></polyline>
                    </svg>
                </div>
                <input 
                    type="email" 
                    id="notifyEmail" 
                    class="cs-input" 
                    placeholder="Enter your work email address..." 
                    required 
                    autocomplete="email"
                >
                <button type="submit" id="notifySubmitBtn" class="cs-btn-submit">
                    <span>Get Early Access</span>
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                        <polyline points="12 5 19 12 12 19"></polyline>
                    </svg>
                </button>
            </form>

            <!-- Success State Message -->
            <div id="notifySuccess" class="cs-success-state">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#10b981" stroke-width="2.5">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                </svg>
                <span>You're on the priority list (<strong id="confirmedEmail"></strong>)! We will invite you before launch.</span>
            </div>

            <div class="cs-privacy-note">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                </svg>
                <span>Zero spam. Unsubscribe at any time. Strictly confidential.</span>
            </div>
        </div>

        <!-- 3 Feature Teaser Cards -->
        <div class="cs-features-grid">
            <div class="cs-feature-card">
                <div class="cs-feature-icon icon-indigo">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="2" y1="12" x2="22" y2="12"></line>
                        <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                    </svg>
                </div>
                <h3 class="cs-feature-title">Global Strategy & Operations</h3>
                <p class="cs-feature-desc">Delivering transformative business solutions, international partnerships, and long-term sustainable growth.</p>
            </div>

            <div class="cs-feature-card">
                <div class="cs-feature-icon icon-cyan">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                        <circle cx="8.5" cy="8.5" r="1.5"></circle>
                        <polyline points="21 15 16 10 5 21"></polyline>
                    </svg>
                </div>
                <h3 class="cs-feature-title">Press & Media Center</h3>
                <p class="cs-feature-desc">A unified digital press room featuring executive photography, official corporate reports, and company announcements.</p>
            </div>

            <div class="cs-feature-card">
                <div class="cs-feature-icon icon-emerald">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                    </svg>
                </div>
                <h3 class="cs-feature-title">Corporate Governance</h3>
                <p class="cs-feature-desc">Uncompromising dedication to ethical integrity, corporate transparency, and stakeholder accountability.</p>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="cs-footer">
        <div>
            &copy; {{ date('Y') }} Nova Corporate Group. All rights reserved.
        </div>
        <div class="cs-footer-links">
            <a href="{{ route('login') }}">Staff Portal</a>
            <span>&bull;</span>
            <span style="color: var(--accent-emerald); font-weight: 600;">● Corporate Site Pre-Launch</span>
        </div>
    </footer>

    <!-- Interactive Script -->
    <script src="{{ asset('js/coming-soon.js') }}"></script>
</body>
</html>
