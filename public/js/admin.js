/**
 * Admin Panel Interactive Logic & Responsiveness
 */
document.addEventListener('DOMContentLoaded', function () {
    // --------------------------------------------------------------------------
    // 1. Mobile Sidebar Toggle & Backdrop
    // --------------------------------------------------------------------------
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    const sidebarCloseBtn = document.getElementById('sidebarCloseBtn');
    const sidebar = document.getElementById('adminSidebar');
    const sidebarBackdrop = document.getElementById('sidebarBackdrop');

    function openSidebar() {
        if (sidebar && sidebarBackdrop) {
            sidebar.classList.add('open');
            sidebarBackdrop.classList.add('active');
            document.body.style.overflow = 'hidden';
        }
    }

    function closeSidebar() {
        if (sidebar && sidebarBackdrop) {
            sidebar.classList.remove('open');
            sidebarBackdrop.classList.remove('active');
            document.body.style.overflow = '';
        }
    }

    if (mobileMenuBtn) {
        mobileMenuBtn.addEventListener('click', openSidebar);
    }
    if (sidebarCloseBtn) {
        sidebarCloseBtn.addEventListener('click', closeSidebar);
    }
    if (sidebarBackdrop) {
        sidebarBackdrop.addEventListener('click', closeSidebar);
    }

    // Close on Escape key
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            closeSidebar();
            closeAllDropdowns();
        }
    });

    // --------------------------------------------------------------------------
    // 2. Profile Dropdown Toggle
    // --------------------------------------------------------------------------
    const profileTriggerBtn = document.getElementById('profileTriggerBtn');
    const profileDropdownMenu = document.getElementById('profileDropdownMenu');

    function closeAllDropdowns() {
        if (profileDropdownMenu) {
            profileDropdownMenu.classList.remove('show');
        }
    }

    if (profileTriggerBtn && profileDropdownMenu) {
        profileTriggerBtn.addEventListener('click', function (e) {
            e.stopPropagation();
            profileDropdownMenu.classList.toggle('show');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function (e) {
            if (!profileTriggerBtn.contains(e.target) && !profileDropdownMenu.contains(e.target)) {
                profileDropdownMenu.classList.remove('show');
            }
        });
    }

    // --------------------------------------------------------------------------
    // 3. Password Visibility Toggles
    // --------------------------------------------------------------------------
    const passwordToggleButtons = document.querySelectorAll('.password-toggle-btn');
    passwordToggleButtons.forEach(button => {
        button.addEventListener('click', function () {
            const targetInputId = this.getAttribute('data-target');
            const targetInput = document.getElementById(targetInputId);
            if (!targetInput) return;

            if (targetInput.type === 'password') {
                targetInput.type = 'text';
                this.innerHTML = `
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path>
                        <line x1="1" y1="1" x2="23" y2="23"></line>
                    </svg>
                `;
            } else {
                targetInput.type = 'password';
                this.innerHTML = `
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                        <circle cx="12" cy="12" r="3"></circle>
                    </svg>
                `;
            }
        });
    });

    // --------------------------------------------------------------------------
    // 4. Quick Demo Fill (for Login Page)
    // --------------------------------------------------------------------------
    const fillDemoBtn = document.getElementById('fillDemoBtn');
    if (fillDemoBtn) {
        fillDemoBtn.addEventListener('click', function () {
            const emailInput = document.getElementById('email');
            const passwordInput = document.getElementById('password');
            if (emailInput && passwordInput) {
                emailInput.value = 'admin@admin.com';
                passwordInput.value = 'admin123';
                // Trigger visual feedback
                fillDemoBtn.textContent = 'Filled!';
                setTimeout(() => {
                    fillDemoBtn.textContent = 'Auto Fill';
                }, 1500);
            }
        });
    }

    // --------------------------------------------------------------------------
    // 5. Password Strength Meter & Real-time Validation (Change Password Page)
    // --------------------------------------------------------------------------
    const newPasswordInput = document.getElementById('password');
    const confirmPasswordInput = document.getElementById('password_confirmation');
    const strengthBarFill = document.getElementById('strengthBarFill');
    const strengthLabel = document.getElementById('strengthLabel');
    const matchIndicator = document.getElementById('passwordMatchIndicator');

    const ruleLength = document.getElementById('ruleLength');
    const ruleUpper = document.getElementById('ruleUpper');
    const ruleNumber = document.getElementById('ruleNumber');
    const ruleSpecial = document.getElementById('ruleSpecial');

    if (newPasswordInput && strengthBarFill) {
        newPasswordInput.addEventListener('input', function () {
            const val = this.value;
            let score = 0;

            const hasLength = val.length >= 8;
            const hasUpper = /[A-Z]/.test(val);
            const hasNumber = /[0-9]/.test(val);
            const hasSpecial = /[^A-Za-z0-9]/.test(val);

            // Update rule checklist icons
            updateRule(ruleLength, hasLength);
            updateRule(ruleUpper, hasUpper);
            updateRule(ruleNumber, hasNumber);
            updateRule(ruleSpecial, hasSpecial);

            if (hasLength) score += 25;
            if (hasUpper) score += 25;
            if (hasNumber) score += 25;
            if (hasSpecial) score += 25;

            strengthBarFill.style.width = score + '%';

            if (score <= 25) {
                strengthBarFill.style.backgroundColor = '#ef4444';
                strengthLabel.textContent = 'Weak';
                strengthLabel.style.color = '#ef4444';
            } else if (score <= 50) {
                strengthBarFill.style.backgroundColor = '#f59e0b';
                strengthLabel.textContent = 'Fair';
                strengthLabel.style.color = '#f59e0b';
            } else if (score <= 75) {
                strengthBarFill.style.backgroundColor = '#06b6d4';
                strengthLabel.textContent = 'Good';
                strengthLabel.style.color = '#06b6d4';
            } else {
                strengthBarFill.style.backgroundColor = '#10b981';
                strengthLabel.textContent = 'Strong';
                strengthLabel.style.color = '#10b981';
            }

            checkPasswordMatch();
        });
    }

    function updateRule(element, isValid) {
        if (!element) return;
        if (isValid) {
            element.classList.remove('invalid');
            element.classList.add('valid');
        } else {
            element.classList.remove('valid');
            element.classList.add('invalid');
        }
    }

    function checkPasswordMatch() {
        if (!confirmPasswordInput || !newPasswordInput || !matchIndicator) return;
        if (confirmPasswordInput.value.length === 0) {
            matchIndicator.textContent = '';
            return;
        }

        if (confirmPasswordInput.value === newPasswordInput.value) {
            matchIndicator.textContent = '✓ Passwords match';
            matchIndicator.style.color = '#10b981';
        } else {
            matchIndicator.textContent = '✗ Passwords do not match';
            matchIndicator.style.color = '#fb7185';
        }
    }

    if (confirmPasswordInput) {
        confirmPasswordInput.addEventListener('input', checkPasswordMatch);
    }

    // --------------------------------------------------------------------------
    // 6. Flash Alert Auto-dismiss
    // --------------------------------------------------------------------------
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(alert => {
        const closeBtn = alert.querySelector('.alert-close');
        if (closeBtn) {
            closeBtn.addEventListener('click', () => alert.remove());
        }
        setTimeout(() => {
            alert.style.transition = 'opacity 0.5s ease';
            alert.style.opacity = '0';
            setTimeout(() => alert.remove(), 500);
        }, 6000);
    });

    // --------------------------------------------------------------------------
    // 7. Sidebar Submenu Dropdowns
    // --------------------------------------------------------------------------
    window.toggleNavDropdown = function (btn) {
        const parent = btn.closest('.nav-item-dropdown');
        if (parent) {
            parent.classList.toggle('open');
        }
    };
});
