/**
 * CIRCUFLOW - NEXT-GEN CIRCULAR ECONOMY JAVASCRIPT ENGINE
 * Demo Template Interactive Controller
 */

document.addEventListener('DOMContentLoaded', () => {
  initNavbar();
  initScrollReveals();
  initCounters();
  initFaqAccordions();
  initHeroSlider();
  initHeroLoopVisualizer();
  initCircularPipeline();
  initIndiaMap();
  initTestimonialsSlider();
  initConsultationModal();
  initBlogFilters();
});

/* ==========================================================================
   1. NAVBAR & OFF-CANVAS SIDE-SLIDING SIDEBAR WITH SUBMENUS
   ========================================================================== */
function initNavbar() {
  const header = document.querySelector('.header-glass');
  const mobileToggle = document.getElementById('mobileToggle');
  const navMenu = document.getElementById('navMenu');
  const hasDarkHero = !!document.querySelector('.recircle-hero-slider, .about-hero-recircle, .epr-ref-hero');

  // Sticky and dynamic transparent-to-scrolled navbar on scroll
  function updateNavbar() {
    if (!hasDarkHero) {
      header?.classList.add('scrolled');
      return;
    }
    if (window.scrollY > 20 || navMenu?.classList.contains('open')) {
      header?.classList.add('scrolled');
    } else {
      header?.classList.remove('scrolled');
    }
  }

  window.addEventListener('scroll', updateNavbar, { passive: true });
  updateNavbar();

  if (mobileToggle && navMenu) {
    // Ensure mobile backdrop exists
    let backdrop = document.querySelector('.nav-backdrop');
    if (!backdrop) {
      backdrop = document.createElement('div');
      backdrop.className = 'nav-backdrop';
      document.body.appendChild(backdrop);
    }

    // Ensure drawer header exists inside navMenu with Shristiyam branding
    if (!navMenu.querySelector('.mobile-drawer-header')) {
      const drawerHeader = document.createElement('div');
      drawerHeader.className = 'mobile-drawer-header';
      drawerHeader.innerHTML = `
        <div style="display: flex; align-items: center; gap: 10px;">
          <img src="/storage/media/logo_1790773608_HGam0S.png" alt="SHRISTIYAM" style="max-height: 38px; width: auto; object-fit: contain;">
          <span style="font-family: var(--font-heading); font-weight: 800; font-size: 1.12rem; color: #1e293b; letter-spacing: -0.01em;">SHRISTIYAM</span>
        </div>
        <button class="mobile-drawer-close" aria-label="Close navigation sidebar">✕</button>
      `;
      navMenu.prepend(drawerHeader);
    }

    const drawerCloseBtn = navMenu.querySelector('.mobile-drawer-close');

    function openSideNav() {
      navMenu.classList.add('open');
      backdrop.classList.add('open');
      document.body.style.overflow = 'hidden';
      updateNavbar();
    }

    function closeSideNav() {
      navMenu.classList.remove('open');
      backdrop.classList.remove('open');
      document.body.style.overflow = '';
      updateNavbar();
    }

    mobileToggle.addEventListener('click', () => {
      if (navMenu.classList.contains('open')) {
        closeSideNav();
      } else {
        openSideNav();
      }
    });

    drawerCloseBtn?.addEventListener('click', closeSideNav);
    backdrop?.addEventListener('click', closeSideNav);

    // Close on Escape key
    window.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && navMenu.classList.contains('open')) {
        closeSideNav();
      }
    });

    // Mobile dropdown accordion toggles
    const dropdownItems = navMenu.querySelectorAll('.nav-dropdown');
    dropdownItems.forEach(drop => {
      const trigger = drop.querySelector('.nav-link');
      trigger?.addEventListener('click', (e) => {
        if (window.innerWidth <= 768) {
          e.preventDefault();
          const isCurrentlyOpen = drop.classList.contains('mobile-open');
          // Close other open mobile submenus
          dropdownItems.forEach(other => {
            if (other !== drop) other.classList.remove('mobile-open');
          });
          if (!isCurrentlyOpen) {
            drop.classList.add('mobile-open');
          } else {
            drop.classList.remove('mobile-open');
          }
        }
      });
    });

    // Close sidebar when clicking links inside dropdown items or drawer CTA
    navMenu.querySelectorAll('.dropdown-item, .nav-item:not(.nav-dropdown) .nav-link, .mobile-contact-btn').forEach(link => {
      link.addEventListener('click', () => {
        if (window.innerWidth <= 768) {
          closeSideNav();
        }
      });
    });
  }
}

/* ==========================================================================
   2. SCROLL REVEAL ANIMATIONS
   ========================================================================== */
function initScrollReveals() {
  const reveals = document.querySelectorAll('.reveal-on-scroll');
  if (!reveals.length) return;

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('revealed');
      }
    });
  }, { threshold: 0.1 });

  reveals.forEach(el => observer.observe(el));
}

/* ==========================================================================
   3. ANIMATED COUNTER ENGINE
   ========================================================================== */
function initCounters() {
  const counters = document.querySelectorAll('.count-up');
  if (!counters.length) return;

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting && !entry.target.classList.contains('counted')) {
        entry.target.classList.add('counted');
        animateCounter(entry.target);
      }
    });
  }, { threshold: 0.2 });

  counters.forEach(counter => observer.observe(counter));
}

function animateCounter(el) {
  const target = parseFloat(el.getAttribute('data-target')) || 0;
  const isFloat = el.getAttribute('data-target').includes('.');
  const duration = 2000;
  const startTime = performance.now();

  function update(now) {
    const elapsed = now - startTime;
    const progress = Math.min(elapsed / duration, 1);
    const easeProgress = 1 - Math.pow(1 - progress, 3);
    const current = target * easeProgress;

    if (isFloat) {
      el.textContent = current.toFixed(1);
    } else {
      el.textContent = Math.floor(current).toLocaleString();
    }

    if (progress < 1) {
      requestAnimationFrame(update);
    } else {
      el.textContent = isFloat ? target.toFixed(1) : target.toLocaleString();
    }
  }

  requestAnimationFrame(update);
}

/* ==========================================================================
   4. FAQ ACCORDION
   ========================================================================== */
function initFaqAccordions() {
  const faqItems = document.querySelectorAll('.faq-item');
  faqItems.forEach(item => {
    const question = item.querySelector('.faq-question');
    question?.addEventListener('click', () => {
      const isOpen = item.classList.contains('open');
      faqItems.forEach(other => other.classList.remove('open'));
      if (!isOpen) {
        item.classList.add('open');
      }
    });
  });
}

/* ==========================================================================
   5. HERO MULTI-SLIDE CAROUSEL ENGINE
   ========================================================================== */
function initHeroSlider() {
  const heroSection = document.getElementById('heroSliderSection');
  const slides = document.querySelectorAll('.hero-slide');
  const tabs = document.querySelectorAll('.hero-slide-tab');
  const dots = document.querySelectorAll('.hero-dot');
  const prevBtn = document.getElementById('heroPrevBtn');
  const nextBtn = document.getElementById('heroNextBtn');
  const progressBar = document.getElementById('heroSliderProgressBar');

  if (!slides.length) return;

  let currentSlide = 0;
  const totalSlides = slides.length;
  const slideDuration = 6000; // 6 seconds per slide
  let progressStart = null;
  let progressAnimationId = null;
  let isPaused = false;
  let elapsedBeforePause = 0;

  function updateSlide(index) {
    currentSlide = (index + totalSlides) % totalSlides;

    // Update Slide active state
    slides.forEach((slide, idx) => {
      const isActive = idx === currentSlide;
      slide.classList.toggle('active', isActive);
      slide.setAttribute('aria-hidden', isActive ? 'false' : 'true');
    });

    // Update Tabs active state
    tabs.forEach((tab, idx) => {
      const isActive = idx === currentSlide;
      tab.classList.toggle('active', isActive);
      tab.setAttribute('aria-selected', isActive ? 'true' : 'false');
      if (isActive) {
        const parent = tab.parentElement;
        if (parent && parent.scrollWidth > parent.clientWidth) {
          const scrollTarget = tab.offsetLeft - (parent.clientWidth / 2) + (tab.clientWidth / 2);
          parent.scrollTo({ left: scrollTarget, behavior: 'smooth' });
        }
      }
    });

    // Update Dots active state
    dots.forEach((dot, idx) => {
      dot.classList.toggle('active', idx === currentSlide);
    });

    // Reset and restart Progress Bar
    resetAndStartProgress();
  }

  function startProgress(remainingTime) {
    if (progressAnimationId) cancelAnimationFrame(progressAnimationId);

    progressStart = performance.now();

    function step(now) {
      if (isPaused) return;
      const elapsed = now - progressStart + elapsedBeforePause;
      const percent = Math.min((elapsed / slideDuration) * 100, 100);

      if (progressBar) {
        progressBar.style.width = `${percent}%`;
      }

      if (elapsed < slideDuration) {
        progressAnimationId = requestAnimationFrame(step);
      } else {
        elapsedBeforePause = 0;
        updateSlide(currentSlide + 1);
      }
    }

    progressAnimationId = requestAnimationFrame(step);
  }

  function resetAndStartProgress() {
    elapsedBeforePause = 0;
    if (progressBar) progressBar.style.width = '0%';
    startProgress(slideDuration);
  }

  function pauseSlider() {
    if (isPaused) return;
    isPaused = true;
    if (progressStart) {
      elapsedBeforePause += performance.now() - progressStart;
    }
    if (progressAnimationId) cancelAnimationFrame(progressAnimationId);
  }

  function resumeSlider() {
    if (!isPaused) return;
    isPaused = false;
    const remainingTime = Math.max(slideDuration - elapsedBeforePause, 200);
    startProgress(remainingTime);
  }

  // Prev / Next button actions
  prevBtn?.addEventListener('click', (e) => {
    e.preventDefault();
    updateSlide(currentSlide - 1);
  });

  nextBtn?.addEventListener('click', (e) => {
    e.preventDefault();
    updateSlide(currentSlide + 1);
  });

  // Tab click actions
  tabs.forEach((tab, idx) => {
    tab.addEventListener('click', (e) => {
      e.preventDefault();
      updateSlide(idx);
    });
  });

  // Dot click actions
  dots.forEach((dot, idx) => {
    dot.addEventListener('click', (e) => {
      e.preventDefault();
      updateSlide(idx);
    });
  });

  // Pause on hover
  heroSection?.addEventListener('mouseenter', pauseSlider);
  heroSection?.addEventListener('mouseleave', resumeSlider);

  // Touch Swipe Support for Mobile & Tablets
  let touchStartX = 0;
  let touchStartY = 0;

  heroSection?.addEventListener('touchstart', (e) => {
    if (e.changedTouches && e.changedTouches[0]) {
      touchStartX = e.changedTouches[0].screenX;
      touchStartY = e.changedTouches[0].screenY;
    }
    pauseSlider();
  }, { passive: true });

  heroSection?.addEventListener('touchend', (e) => {
    if (e.changedTouches && e.changedTouches[0]) {
      const touchEndX = e.changedTouches[0].screenX;
      const touchEndY = e.changedTouches[0].screenY;
      const diffX = touchEndX - touchStartX;
      const diffY = touchEndY - touchStartY;

      // Detect horizontal swipe if larger than vertical and threshold
      if (Math.abs(diffX) > 45 && Math.abs(diffX) > Math.abs(diffY)) {
        if (diffX < 0) {
          updateSlide(currentSlide + 1);
        } else {
          updateSlide(currentSlide - 1);
        }
      }
    }
    resumeSlider();
  }, { passive: true });

  // Initial launch
  updateSlide(0);

  // Pause when scrolled out of view
  if ('IntersectionObserver' in window && heroSection) {
    const visibilityObserver = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          resumeSlider();
        } else {
          pauseSlider();
        }
      });
    }, { threshold: 0.1 });
    visibilityObserver.observe(heroSection);
  }
}

/* ==========================================================================
   6. HERO CANVAS / VISUALIZER (LINEAR VS CIRCULAR)
   ========================================================================== */
function initHeroLoopVisualizer() {
  const linearBtn = document.getElementById('modeLinearBtn');
  const circularBtn = document.getElementById('modeCircularBtn');
  const canvasContainer = document.getElementById('heroVisualContainer') || document.querySelector('.hero-canvas-container');
  const statsMini = document.getElementById('heroStatsMini') || document.querySelector('.hero-stats-mini');

  if (!canvasContainer) return;

  const views = {
    circular: {
      html: `
        <div class="loop-graphic animate-fade-in">
          <div class="orbit-ring"></div>
          <div class="orbit-node node-1" title="Decentralized Collection">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path></svg>
          </div>
          <div class="orbit-node node-2" title="Optical NIR Segregation">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
          </div>
          <div class="orbit-node node-3" title="Twin-Screw Extrusion">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
          </div>
          <div class="orbit-node node-4" title="EPR Credit Fulfillment">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline></svg>
          </div>
          <div class="loop-center">
            <div class="loop-center-val">99.4%</div>
            <div class="loop-center-lbl">Circular Efficiency</div>
          </div>
        </div>
      `,
      stats: `
        <div class="stat-mini-item">
          <div class="stat-mini-val">0% Landfill Target</div>
          <div class="stat-mini-lbl">Diverted from Landfills & Dumps</div>
        </div>
        <div class="stat-mini-item">
          <div class="stat-mini-val">100% Traceable Value</div>
          <div class="stat-mini-lbl">End-to-End Digital Audit Trail</div>
        </div>
      `
    },
    linear: {
      html: `
        <div class="linear-graphic animate-fade-in" style="width: 100%; display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 14px; padding: 10px 0;">
          <div style="display: flex; align-items: center; gap: 10px; width: 100%; justify-content: center; flex-wrap: wrap;">
            <div style="background: #fee2e2; border: 1px solid #f87171; border-radius: var(--radius-sm); padding: 8px 12px; text-align: center;">
              <span style="font-size: 0.72rem; font-weight: 700; color: #b91c1c; display: block;">Fossil Extraction</span>
              <span style="font-size: 0.8rem; font-weight: 800; color: #7f1d1d;">Virgin Polymer</span>
            </div>
            <span style="color: #ef4444; font-weight: 800;">→</span>
            <div style="background: #fee2e2; border: 1px solid #f87171; border-radius: var(--radius-sm); padding: 8px 12px; text-align: center;">
              <span style="font-size: 0.72rem; font-weight: 700; color: #b91c1c; display: block;">Single-Use</span>
              <span style="font-size: 0.8rem; font-weight: 800; color: #7f1d1d;">Packaging</span>
            </div>
            <span style="color: #ef4444; font-weight: 800;">→</span>
            <div style="background: #fecaca; border: 1px solid #dc2626; border-radius: var(--radius-sm); padding: 8px 12px; text-align: center;">
              <span style="font-size: 0.72rem; font-weight: 700; color: #991b1b; display: block;">Landfill & Ocean</span>
              <span style="font-size: 0.8rem; font-weight: 800; color: #991b1b;">Permanent Waste</span>
            </div>
          </div>
          <div style="margin-top: 10px; background: #fff1f2; border: 1px dashed #f43f5e; padding: 10px 18px; border-radius: var(--radius-full); font-size: 0.82rem; color: #be123c; font-weight: 700; text-align: center;">
            100% Resource Depletion & High Statutory Penalties
          </div>
        </div>
      `,
      stats: `
        <div class="stat-mini-item" style="border-color: #fca5a5;">
          <div class="stat-mini-val" style="color: #dc2626;">+3.2 kg CO₂</div>
          <div class="stat-mini-lbl">Per kg Virgin Plastic Manufactured</div>
        </div>
        <div class="stat-mini-item" style="border-color: #fca5a5;">
          <div class="stat-mini-val" style="color: #dc2626;">0% Credit</div>
          <div class="stat-mini-lbl">Zero EPR Quota Fulfillment</div>
        </div>
      `
    }
  };

  function setMode(mode) {
    if (mode === 'linear') {
      linearBtn?.classList.add('active');
      circularBtn?.classList.remove('active');
      canvasContainer.innerHTML = views.linear.html;
      if (statsMini) statsMini.innerHTML = views.linear.stats;
    } else {
      circularBtn?.classList.add('active');
      linearBtn?.classList.remove('active');
      canvasContainer.innerHTML = views.circular.html;
      if (statsMini) statsMini.innerHTML = views.circular.stats;
    }
  }

  linearBtn?.addEventListener('click', () => setMode('linear'));
  circularBtn?.addEventListener('click', () => setMode('circular'));

  // Also support mode buttons in any other hero visual card (e.g. Slide 4)
  document.querySelectorAll('.hero-visual-card').forEach(card => {
    const cardLinear = card.querySelector('.mode-linear-btn');
    const cardCircular = card.querySelector('.mode-circular-btn');
    const cardCanvas = card.querySelector('.hero-canvas-container');
    const cardStats = card.querySelector('.hero-stats-mini');

    if (cardLinear && cardCircular && cardCanvas) {
      cardLinear.addEventListener('click', (e) => {
        e.preventDefault();
        cardLinear.classList.add('active');
        cardCircular.classList.remove('active');
        cardCanvas.innerHTML = views.linear.html;
        if (cardStats) cardStats.innerHTML = views.linear.stats;
      });
      cardCircular.addEventListener('click', (e) => {
        e.preventDefault();
        cardCircular.classList.add('active');
        cardLinear.classList.remove('active');
        cardCanvas.innerHTML = views.circular.html;
        if (cardStats) cardStats.innerHTML = views.circular.stats;
      });
    }
  });
}

/* ==========================================================================
   6. 5-STAGE INTERACTIVE CIRCULAR PIPELINE
   ========================================================================== */
function initCircularPipeline() {
  const stepTabs = document.querySelectorAll('.pipeline-step-tab');
  const card = document.getElementById('pipelineDetailCard');
  const cardTag = document.getElementById('pipelineStageTag');
  const cardTitle = document.getElementById('pipelineDetailTitle');
  const cardDesc = document.getElementById('pipelineDetailDesc');
  const specsList = document.getElementById('pipelineSpecsList');

  if (!stepTabs.length || !cardTitle) return;

  const pipelineStages = [
    {
      num: 'Stage 01 Architecture',
      title: '1. Decentralized Sourcing & GPS Traced Collection',
      desc: 'Empowering over 4,500+ local collection partners with fair digital compensation, safety gear, and geo-tagged collection points across municipal clusters.',
      specs: [
        { k: 'Traceability Standard', v: 'Geo-tagged QR Batching' },
        { k: 'Worker Integration', v: 'Direct Digital Banking' },
        { k: 'Sourcing Purity', v: 'Primary Segregated' },
        { k: 'Capacity Hubs', v: '10 - 100 MT/Day' }
      ]
    },
    {
      num: 'Stage 02 Architecture',
      title: '2. Optical Near-Infrared (NIR) & Density Sorting',
      desc: 'High-speed automated optical sorting lines separate rigid PET, HDPE, and PP fractions with 99.2% polymer classification accuracy and zero color cross-contamination.',
      specs: [
        { k: 'Optical Sensor', v: 'Multi-Spectral NIR' },
        { k: 'Throughput Speed', v: 'Up to 3.5 MT / Hour' },
        { k: 'Polymer Purity', v: '98.5% - 99.5%' },
        { k: 'Color Separation', v: 'Natural, Blue, Mixed' }
      ]
    },
    {
      num: 'Stage 03 Architecture',
      title: '3. Hot Alkaline Wash & Hydrodynamic Decontamination',
      desc: 'Multi-stage caustic hot washing eliminates surface adhesives, chemical residues, organoleptic odors, and micro-contaminants with 100% Zero Liquid Discharge.',
      specs: [
        { k: 'Wash Water Loop', v: '100% Zero Liquid Discharge' },
        { k: 'Flake Size Matrix', v: '8mm - 12mm Uniform' },
        { k: 'Moisture Target', v: '<0.8% Post-Centrifuge' },
        { k: 'PVC Contamination', v: '<25 ppm Guaranteed' }
      ]
    },
    {
      num: 'Stage 04 Architecture',
      title: '4. Twin-Screw Vacuum Degassing & Extrusion',
      desc: 'Continuous melt filtration down to 40 microns combined with high-vacuum volatiles extraction to restore virgin melt-flow indexes and structural impact resilience.',
      specs: [
        { k: 'Filtration Fineness', v: '40 Micron Continuous' },
        { k: 'Vacuum Level', v: '<5 mbar Degassing' },
        { k: 'Melt Flow Control', v: 'ASTM D1238 Calibrated' },
        { k: 'Pellet Geometry', v: '2.5mm Spherical Micro' }
      ]
    },
    {
      num: 'Stage 05 Architecture',
      title: '5. Certified Post-Consumer Resin (PCR) & EPR Credits',
      desc: 'Virgin-replacement polymers packed in moisture-barrier liner bags, accompanied by audited TDS certificates and statutory EPR credit transfers to brand portals.',
      specs: [
        { k: 'Grade Standards', v: 'Food-Contact & Blow Grade' },
        { k: 'Carbon Abatement', v: '-68% CO₂ Equiv. Offset' },
        { k: 'EPR Transfer', v: 'Direct Portal Credit' },
        { k: 'Batch Certificate', v: 'Complete TDS Report' }
      ]
    }
  ];

  function renderStage(index) {
    const stage = pipelineStages[index];
    if (!stage) return;

    if (cardTag) cardTag.textContent = stage.num;
    if (cardTitle) cardTitle.textContent = stage.title;
    if (cardDesc) cardDesc.textContent = stage.desc;

    if (specsList) {
      specsList.innerHTML = stage.specs.map(s => `
        <div class="spec-item">
          <span>${s.k}</span>
          <span>${s.v}</span>
        </div>
      `).join('');
    }

    // Gentle micro-animation feedback
    if (card) {
      card.classList.remove('animate-fade-in');
      void card.offsetWidth; // Trigger reflow
      card.classList.add('animate-fade-in');
    }
  }

  stepTabs.forEach((tab, index) => {
    tab.addEventListener('click', (e) => {
      e.preventDefault();
      stepTabs.forEach(t => t.classList.remove('active'));
      tab.classList.add('active');
      renderStage(index);
    });
  });

  renderStage(0);
}

/* ==========================================================================
   7. CONSULTATION & RFP MODAL CONTROLLER
   ========================================================================== */
function initConsultationModal() {
  const modalTriggers = document.querySelectorAll('[data-open-modal]');
  
  modalTriggers.forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.preventDefault();
      const modalId = btn.getAttribute('data-open-modal');
      const modal = document.getElementById(modalId);
      if (modal) {
        modal.classList.add('open');
        document.body.style.overflow = 'hidden';
      }
    });
  });

  const modals = document.querySelectorAll('.modal-backdrop');
  modals.forEach(modal => {
    const closeBtn = modal.querySelector('.modal-close-btn');
    closeBtn?.addEventListener('click', () => {
      modal.classList.remove('open');
      document.body.style.overflow = '';
    });

    modal.addEventListener('click', (e) => {
      if (e.target === modal) {
        modal.classList.remove('open');
        document.body.style.overflow = '';
      }
    });
  });

  const forms = document.querySelectorAll('#rfpForm, #quickConsultForm');
  forms.forEach(form => {
    form.addEventListener('submit', (e) => {
      e.preventDefault();
      modals.forEach(m => m.classList.remove('open'));
      document.body.style.overflow = '';
      showToast('Thank you! Your inquiry has been submitted successfully.');
      form.reset();
    });
  });
}

/* ==========================================================================
   8. BLOG SEARCH & CATEGORY FILTER ENGINE
   ========================================================================== */
function initBlogFilters() {
  const searchInput = document.getElementById('blogSearchInput');
  const filterBtns = document.querySelectorAll('.blog-filter-btn');
  const blogCards = document.querySelectorAll('.blog-card');

  if (!blogCards.length) return;

  function filterCards() {
    const searchTerm = searchInput ? searchInput.value.toLowerCase().trim() : '';
    const activeBtn = document.querySelector('.blog-filter-btn.active');
    const activeCat = activeBtn ? activeBtn.getAttribute('data-cat') : 'all';

    blogCards.forEach(card => {
      const cardCat = card.getAttribute('data-cat') || '';
      const cardText = card.innerText.toLowerCase();

      const matchesCat = (activeCat === 'all' || cardCat === activeCat);
      const matchesSearch = (!searchTerm || cardText.includes(searchTerm));

      if (matchesCat && matchesSearch) {
        card.style.display = 'flex';
      } else {
        card.style.display = 'none';
      }
    });
  }

  searchInput?.addEventListener('input', filterCards);

  filterBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      filterBtns.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      filterCards();
    });
  });
}

/* ==========================================================================
   9. INTERACTIVE ENTERPRISE TESTIMONIALS SLIDER / CAROUSEL (INFINITE LOOP)
   ========================================================================== */
function initTestimonialsSlider() {
  const track = document.getElementById('testimonialsTrack');
  const prevBtn = document.getElementById('prevTestimonialBtn');
  const nextBtn = document.getElementById('nextTestimonialBtn');
  const dotsContainer = document.getElementById('testimonialDots');
  const dots = dotsContainer ? dotsContainer.querySelectorAll('.slider-dot') : [];

  if (!track) return;

  const originalCards = Array.from(track.querySelectorAll('.testimonial-card'));
  const count = originalCards.length;
  if (count === 0) return;

  // Clone 2 sets (one before, one after) for seamless infinite wrapping
  const beforeClones = originalCards.map(c => c.cloneNode(true));
  const afterClones = originalCards.map(c => c.cloneNode(true));

  beforeClones.forEach(c => c.setAttribute('data-clone', 'true'));
  afterClones.forEach(c => c.setAttribute('data-clone', 'true'));

  beforeClones.forEach(c => track.insertBefore(c, track.firstChild));
  afterClones.forEach(c => track.appendChild(c));

  const allCards = Array.from(track.querySelectorAll('.testimonial-card'));

  function getStepWidth() {
    if (allCards.length > 1) {
      return allCards[1].offsetLeft - allCards[0].offsetLeft;
    }
    return 340;
  }

  const getSetWidth = () => count * getStepWidth();

  // Position at the start of the original middle set
  function initPosition() {
    track.style.scrollBehavior = 'auto';
    track.scrollLeft = getSetWidth();
    track.style.scrollBehavior = 'smooth';
    updateActiveDot();
  }

  setTimeout(initPosition, 60);
  window.addEventListener('resize', () => {
    track.style.scrollBehavior = 'auto';
    updateActiveDot();
    track.style.scrollBehavior = 'smooth';
  });

  function getNormalizedIndex() {
    const step = getStepWidth();
    if (step <= 0) return 0;
    const rawIdx = Math.round(track.scrollLeft / step);
    return ((rawIdx % count) + count) % count;
  }

  function updateActiveDot() {
    const activeIndex = getNormalizedIndex();
    dots.forEach((dot, idx) => {
      dot.classList.toggle('active', idx === activeIndex);
    });
  }

  let isWrapping = false;
  function checkBoundaryWrap() {
    if (isWrapping) return;
    const setW = getSetWidth();
    if (setW <= 0) return;

    // Past right end of middle set
    if (track.scrollLeft >= setW * 2) {
      isWrapping = true;
      track.style.scrollBehavior = 'auto';
      track.scrollLeft -= setW;
      requestAnimationFrame(() => {
        track.style.scrollBehavior = 'smooth';
        isWrapping = false;
      });
    }
    // Past left start of middle set
    else if (track.scrollLeft < setW * 0.4) {
      isWrapping = true;
      track.style.scrollBehavior = 'auto';
      track.scrollLeft += setW;
      requestAnimationFrame(() => {
        track.style.scrollBehavior = 'smooth';
        isWrapping = false;
      });
    }
  }

  function slideNext() {
    checkBoundaryWrap();
    const step = getStepWidth();
    track.scrollBy({ left: step, behavior: 'smooth' });
  }

  function slidePrev() {
    checkBoundaryWrap();
    const step = getStepWidth();
    track.scrollBy({ left: -step, behavior: 'smooth' });
  }

  nextBtn?.addEventListener('click', slideNext);
  prevBtn?.addEventListener('click', slidePrev);

  dots.forEach(dot => {
    dot.addEventListener('click', () => {
      const targetDotIdx = parseInt(dot.getAttribute('data-index') || '0', 10);
      const currentNormIdx = getNormalizedIndex();
      const diff = targetDotIdx - currentNormIdx;
      const step = getStepWidth();
      track.scrollBy({ left: diff * step, behavior: 'smooth' });
    });
  });

  // Real-time dot synchronization
  let scrollDebounce;
  track.addEventListener('scroll', () => {
    updateActiveDot();
    clearTimeout(scrollDebounce);
    scrollDebounce = setTimeout(checkBoundaryWrap, 120);
  }, { passive: true });

  // Mouse Drag to Scroll
  let isDown = false;
  let startX;
  let initialScrollLeft;

  track.addEventListener('mousedown', (e) => {
    isDown = true;
    startX = e.pageX - track.offsetLeft;
    initialScrollLeft = track.scrollLeft;
  });

  track.addEventListener('mouseleave', () => { isDown = false; });
  track.addEventListener('mouseup', () => { isDown = false; });

  track.addEventListener('mousemove', (e) => {
    if (!isDown) return;
    e.preventDefault();
    const x = e.pageX - track.offsetLeft;
    const walk = (x - startX) * 1.4;
    track.scrollLeft = initialScrollLeft - walk;
  });

  // Infinite Autoplay
  let autoTimer = setInterval(slideNext, 5000);
  track.addEventListener('mouseenter', () => clearInterval(autoTimer));
  track.addEventListener('mouseleave', () => {
    clearInterval(autoTimer);
    autoTimer = setInterval(slideNext, 5000);
  });
}

/* ==========================================================================
   10. PAN-INDIA CIRCULAR NETWORK & STATE HUB INTERACTION
   ========================================================================== */
function initIndiaMap() {
  const hubBtns = document.querySelectorAll('.india-hub-btn');
  const titleEl = document.getElementById('indiaHubTitle');
  const descEl = document.getElementById('indiaHubDesc');

  if (!hubBtns.length) return;

  const indiaHubData = [
    {
      title: "Western Hub (Gujarat & Maharashtra)",
      desc: "Dahej extrusion campus, Surat wash lines, and Mumbai urban baling networks handling high-volume rigid PET and HDPE bottles."
    },
    {
      title: "Northern Corridor (Delhi-NCR & Haryana)",
      desc: "Automated optical NIR sorting lines, FMCG brand statutory EPR fulfillment desk, and heavy baling infrastructure across industrial NCR."
    },
    {
      title: "Southern Hub (Bengaluru & Chennai)",
      desc: "Decontamination and wash plant processing IT corridor post-consumer plastics into food-grade rPET flakes and preforms."
    },
    {
      title: "Central Model Hub (Indore & MP)",
      desc: "Award-winning municipal zero-waste MRF model with 100% geo-tagged collection and formalized digital banking for informal workers."
    },
    {
      title: "Eastern Zone (Kolkata & Coastal Odisha)",
      desc: "Supplying non-recyclable high-calorific RDF briquettes to cement kilns and intercepting ocean-bound coastal plastic waste."
    }
  ];

  hubBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      hubBtns.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');

      const hubIdx = parseInt(btn.getAttribute('data-hub') || '0', 10);
      const data = indiaHubData[hubIdx];
      if (data && titleEl && descEl) {
        titleEl.textContent = data.title;
        descEl.textContent = data.desc;
      }
    });
  });
}

/* ==========================================================================
   11. GLOBAL TOAST NOTIFICATION UTILITY
   ========================================================================== */
window.showToast = function(message) {
  let container = document.querySelector('.toast-container');
  if (!container) {
    container = document.createElement('div');
    container.className = 'toast-container';
    document.body.appendChild(container);
  }

  const toast = document.createElement('div');
  toast.className = 'toast';
  toast.innerHTML = `
    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--accent-emerald)" stroke-width="2.5">
      <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
      <polyline points="22 4 12 14.01 9 11.01"></polyline>
    </svg>
    <span>${message}</span>
  `;

  container.appendChild(toast);

  setTimeout(() => toast.classList.add('show'), 10);
  setTimeout(() => {
    toast.classList.remove('show');
    setTimeout(() => toast.remove(), 400);
  }, 3500);
};
