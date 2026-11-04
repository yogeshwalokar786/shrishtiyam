/**
 * NovaPlatform - Coming Soon Interactive Scripts
 */

document.addEventListener('DOMContentLoaded', function () {
    // ------------------------------------------------------------------------
    // 1. Dynamic Countdown Timer
    // ------------------------------------------------------------------------
    // Target launch date: 42 days from now or fixed target
    const now = new Date().getTime();
    let launchDate = localStorage.getItem('nova_launch_date');

    if (!launchDate) {
        // Set target 45 days ahead
        const target = new Date();
        target.setDate(target.getDate() + 45);
        target.setHours(9, 0, 0, 0);
        launchDate = target.getTime();
        localStorage.setItem('nova_launch_date', launchDate);
    } else {
        launchDate = parseInt(launchDate, 10);
    }

    const daysEl = document.getElementById('countDays');
    const hoursEl = document.getElementById('countHours');
    const minutesEl = document.getElementById('countMinutes');
    const secondsEl = document.getElementById('countSeconds');

    function updateCountdown() {
        const currentTime = new Date().getTime();
        const distance = launchDate - currentTime;

        if (distance <= 0) {
            if (daysEl) daysEl.textContent = '00';
            if (hoursEl) hoursEl.textContent = '00';
            if (minutesEl) minutesEl.textContent = '00';
            if (secondsEl) secondsEl.textContent = '00';
            return;
        }

        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        if (daysEl) daysEl.textContent = String(days).padStart(2, '0');
        if (hoursEl) hoursEl.textContent = String(hours).padStart(2, '0');
        if (minutesEl) minutesEl.textContent = String(minutes).padStart(2, '0');
        if (secondsEl) secondsEl.textContent = String(seconds).padStart(2, '0');
    }

    updateCountdown();
    setInterval(updateCountdown, 1000);

    // ------------------------------------------------------------------------
    // 2. Interactive "Notify Me" Form
    // ------------------------------------------------------------------------
    const notifyForm = document.getElementById('notifyForm');
    const emailInput = document.getElementById('notifyEmail');
    const submitBtn = document.getElementById('notifySubmitBtn');
    const successBox = document.getElementById('notifySuccess');
    const confirmedEmail = document.getElementById('confirmedEmail');

    // Check if user already subscribed
    const savedSubscriber = localStorage.getItem('nova_subscriber_email');
    if (savedSubscriber && successBox && notifyForm) {
        notifyForm.style.display = 'none';
        successBox.style.display = 'flex';
        if (confirmedEmail) confirmedEmail.textContent = savedSubscriber;
    }

    if (notifyForm) {
        notifyForm.addEventListener('submit', function (e) {
            e.preventDefault();
            const email = (emailInput.value || '').trim();

            if (!email || !validateEmail(email)) {
                emailInput.focus();
                emailInput.style.borderColor = '#ef4444';
                setTimeout(() => {
                    emailInput.style.borderColor = '';
                }, 2000);
                return;
            }

            // Button loading state
            const originalContent = submitBtn.innerHTML;
            submitBtn.disabled = true;
            submitBtn.innerHTML = `
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="spin-icon">
                    <circle cx="12" cy="12" r="10" stroke-opacity="0.25"></circle>
                    <path d="M12 2a10 10 0 0 1 10 10"></path>
                </svg>
                <span>Securing Access...</span>
            `;

            // Style for spinner
            if (!document.getElementById('spinStyles')) {
                const style = document.createElement('style');
                style.id = 'spinStyles';
                style.textContent = `
                    @keyframes csSpin { to { transform: rotate(360deg); } }
                    .spin-icon { animation: csSpin 0.75s linear infinite; }
                `;
                document.head.appendChild(style);
            }

            // Simulate immediate fast confirmation
            setTimeout(() => {
                localStorage.setItem('nova_subscriber_email', email);
                notifyForm.style.display = 'none';
                successBox.style.display = 'flex';
                if (confirmedEmail) confirmedEmail.textContent = email;
            }, 600);
        });
    }

    function validateEmail(email) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    }
});
