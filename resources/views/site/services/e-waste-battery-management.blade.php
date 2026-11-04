@extends('layouts.site')

@section('title', 'E-Waste & Battery Waste Management - Responsible Recovery. Compliant Recycling. | ' . setting('site_name', 'SHRISTIYAM'))
@section('meta_description', 'Responsible Recovery. Compliant Recycling. Shristiyam provides end-to-end e-waste and battery waste management solutions, helping businesses manage collection, channelisation, compliance, and responsible recycling.')

@section('head')
    <link rel="canonical" href="{{ url('/services/e-waste-battery-management') }}">
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "Service",
      "name": "E-Waste & Battery Waste Management",
      "serviceType": "E-Waste & Battery Waste Management and EPR Compliance",
      "provider": {
        "@@type": "Organization",
        "name": "{{ setting('company_legal_name', 'SHRISTIYAM COMPLIANCE SOLUTIONS PRIVATE LIMITED') }}",
        "url": "{{ url('/') }}"
      },
      "description": "Responsible Recovery. Compliant Recycling. End-to-end e-waste and battery waste management solutions for collection, channelisation, compliance, and responsible recycling.",
      "areaServed": "India"
    }
    </script>
@endsection

@section('content')

    <!-- =========================================================================
         1. HERO HEADER (CLEAN, FOCUSED, MATCHING SERVICE 1 AESTHETICS)
         ========================================================================= -->
    <section class="epr-ref-hero">
        <div class="container">
            <!-- Breadcrumb Navigation -->
            <div style="display: flex; align-items: center; gap: 8px; font-size: 0.84rem; color: #94a3b8; margin-bottom: 24px; flex-wrap: wrap;">
                <a href="/" style="color: #94a3b8; text-decoration: none;" onmouseover="this.style.color='#ffffff'" onmouseout="this.style.color='#94a3b8'">Home</a>
                <span>/</span>
                <a href="/solutions" style="color: #94a3b8; text-decoration: none;" onmouseover="this.style.color='#ffffff'" onmouseout="this.style.color='#94a3b8'">Services &amp; Solutions</a>
                <span>/</span>
                <span style="color: #34d399; font-weight: 600;">E-Waste &amp; Battery Waste Management</span>
            </div>

            <!-- Quick Static Services Switcher Bar -->
            <div style="display: flex; gap: 8px; flex-wrap: wrap; margin-bottom: 36px; background: rgba(255, 255, 255, 0.06); padding: 8px 12px; border-radius: var(--radius-md); border: 1px solid rgba(255, 255, 255, 0.12); backdrop-filter: blur(8px);">
                <span style="font-size: 0.78rem; font-weight: 700; color: #cbd5e1; display: inline-flex; align-items: center; margin-right: 6px; text-transform: uppercase;">Our Services:</span>
                <a href="/services/plastic-epr-compliance" class="btn btn-outline" style="padding: 6px 14px; font-size: 0.8rem; border-radius: 999px; text-decoration: none; color: #ffffff; border-color: rgba(255,255,255,0.25);">1. Plastic EPR Compliance</a>
                <a href="/services/plastic-neutral-programme" class="btn btn-outline" style="padding: 6px 14px; font-size: 0.8rem; border-radius: 999px; text-decoration: none; color: #ffffff; border-color: rgba(255,255,255,0.25);">2. Plastic Neutral Programme</a>
                <a href="/services/esg-csr-projects" class="btn btn-outline" style="padding: 6px 14px; font-size: 0.8rem; border-radius: 999px; text-decoration: none; color: #ffffff; border-color: rgba(255,255,255,0.25);">3. ESG &amp; CSR Projects</a>
                <a href="/services/e-waste-battery-management" class="btn btn-primary" style="padding: 6px 14px; font-size: 0.8rem; border-radius: 999px; text-decoration: none;">4. E-Waste &amp; Battery</a>
                <a href="/services/industrial-agriculture-waste-management" class="btn btn-outline" style="padding: 6px 14px; font-size: 0.8rem; border-radius: 999px; text-decoration: none; color: #ffffff; border-color: rgba(255,255,255,0.25);">5. Industrial &amp; Agri Waste</a>
            </div>

            <!-- Main Hero Content -->
            <div class="reveal-on-scroll" style="max-width: 960px;">
                <div class="epr-ref-hero-tag">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                        <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                        <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                    </svg>
                    <span>Responsible Recovery. Compliant Recycling.</span>
                </div>

                <h1 class="epr-ref-hero-title">
                    E-Waste &amp; Battery Waste <span class="gradient-text" style="background: linear-gradient(135deg, #34d399 0%, #10b981 100%); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent;">Management</span>
                </h1>

                <div style="font-size: clamp(1.2rem, 2vw, 1.45rem); font-weight: 700; color: #34d399; margin-bottom: 18px; letter-spacing: -0.01em;">
                    Responsible Recovery. Compliant Recycling.
                </div>

                <p class="epr-ref-hero-desc">
                    {{ setting('site_name', 'Shristiyam') }} provides end-to-end e-waste and battery waste management solutions, helping businesses manage collection, channelisation, compliance, and responsible recycling through authorised recyclers. We support producers with EPR registration, obligation management, documentation, certificate procurement, and regulatory reporting, while ensuring collected e-waste and battery waste reaches appropriate authorised recycling partners.
                </p>

                <!-- Action CTAs -->
                <div style="display: flex; gap: 14px; flex-wrap: wrap; align-items: center;">
                    <button type="button" class="btn btn-primary" data-open-modal="consultationModal" style="padding: 14px 28px; font-size: 0.98rem; font-weight: 700; box-shadow: 0 4px 20px rgba(5, 150, 105, 0.4);">
                        Book Free Consultation &rarr;
                    </button>
                    <a href="#approach" class="btn btn-outline" style="padding: 14px 24px; font-size: 0.98rem; font-weight: 600; text-decoration: none; color: #ffffff; border-color: rgba(255, 255, 255, 0.3); background: rgba(255, 255, 255, 0.05); backdrop-filter: blur(8px);">
                        Our Approach &darr;
                    </a>
                </div>

                <!-- Trust Row (3 Pillars Matching Service 1) -->
                <div class="epr-ref-trust-row">
                    <div class="epr-ref-trust-item">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        <span>Collect Responsibly</span>
                    </div>
                    <div class="epr-ref-trust-item">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        <span>Recycle Compliantly</span>
                    </div>
                    <div class="epr-ref-trust-item">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        <span>Recover Valuable Resources</span>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- =========================================================================
         2. OUR APPROACH (STRUCTURED 2-COLUMN LAYOUT MATCHING SERVICE 1)
         ========================================================================= -->
    <section class="epr-ref-approach-section" id="approach">
        <div class="container">
            <div class="epr-ref-approach-grid reveal-on-scroll">
                <!-- Left: Approach Narrative -->
                <div class="epr-ref-approach-copy">
                    <div class="section-tag" style="margin-bottom: 12px;">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="12 6 12 12 16 14"></polyline>
                        </svg>
                        <span>OUR APPROACH</span>
                    </div>

                    <h2 style="font-size: clamp(2rem, 3.2vw, 2.7rem); line-height: 1.25; font-weight: 800; color: #0f172a; margin-bottom: 18px; letter-spacing: -0.02em;">
                        Responsible by Design.<br>Traceable at Every Step.
                    </h2>

                    <p style="font-size: 1.05rem; line-height: 1.8; color: #334155; margin-bottom: 18px;">
                        Our approach goes beyond meeting EPR requirements. We build a structured system that connects compliance, collection, responsible recycling, and resource recovery.
                    </p>

                    <p style="font-size: 1.02rem; line-height: 1.8; color: #475569; margin-bottom: 24px;">
                        From collection to compliant recycling, we help businesses build a transparent, traceable, and responsible waste management system.
                    </p>

                    <div style="padding: 16px 20px; background: rgba(5, 150, 105, 0.06); border: 1px solid rgba(5, 150, 105, 0.2); border-radius: 12px; display: flex; align-items: center; gap: 12px;">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#059669" stroke-width="2" style="flex-shrink: 0;">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                        </svg>
                        <div style="font-size: 0.9rem; color: #047857; font-weight: 600; line-height: 1.5;">
                            Collect responsibly. Recycle compliantly. Recover valuable resources.
                        </div>
                    </div>
                </div>

                <!-- Right: 5 Approach Core Pillars -->
                <div class="ewaste-pillars-list">
                    <!-- Pillar 1 -->
                    <div class="ewaste-pillar-card">
                        <div class="ewaste-pillar-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        </div>
                        <div>
                            <strong style="color: #0f172a; font-size: 1rem; display: block; margin-bottom: 2px;">Compliance-First</strong>
                            <span style="color: #64748b; font-size: 0.88rem; line-height: 1.5;">Align waste management with applicable E-Waste and Battery Waste EPR requirements.</span>
                        </div>
                    </div>

                    <!-- Pillar 2 -->
                    <div class="ewaste-pillar-card">
                        <div class="ewaste-pillar-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        </div>
                        <div>
                            <strong style="color: #0f172a; font-size: 1rem; display: block; margin-bottom: 2px;">Responsible Collection</strong>
                            <span style="color: #64748b; font-size: 0.88rem; line-height: 1.5;">Enable organised collection and channelisation of e-waste and battery waste.</span>
                        </div>
                    </div>

                    <!-- Pillar 3 -->
                    <div class="ewaste-pillar-card">
                        <div class="ewaste-pillar-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        </div>
                        <div>
                            <strong style="color: #0f172a; font-size: 1rem; display: block; margin-bottom: 2px;">Authorised Recycling</strong>
                            <span style="color: #64748b; font-size: 0.88rem; line-height: 1.5;">Direct waste to appropriate authorised recycling partners for compliant processing.</span>
                        </div>
                    </div>

                    <!-- Pillar 4 -->
                    <div class="ewaste-pillar-card">
                        <div class="ewaste-pillar-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        </div>
                        <div>
                            <strong style="color: #0f172a; font-size: 1rem; display: block; margin-bottom: 2px;">End-to-End Traceability</strong>
                            <span style="color: #64748b; font-size: 0.88rem; line-height: 1.5;">Maintain visibility from collection and movement through recycling.</span>
                        </div>
                    </div>

                    <!-- Pillar 5 -->
                    <div class="ewaste-pillar-card">
                        <div class="ewaste-pillar-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        </div>
                        <div>
                            <strong style="color: #0f172a; font-size: 1rem; display: block; margin-bottom: 2px;">Resource Recovery</strong>
                            <span style="color: #64748b; font-size: 0.88rem; line-height: 1.5;">Move beyond disposal by recovering valuable materials and resources from waste.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- =========================================================================
         3. WHAT WE OFFER (6 BALANCED SUITE CARDS)
         ========================================================================= -->
    <section class="epr-ref-services-section" id="offerings">
        <div class="container">
            <div class="section-header reveal-on-scroll" style="text-align: left; max-width: 840px; margin-bottom: 24px;">
                <div class="section-tag" style="margin-bottom: 12px;">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="20 6 9 17 4 12"></polyline>
                    </svg>
                    <span>WHAT WE OFFER</span>
                </div>

                <h2 style="font-size: clamp(2rem, 3.2vw, 2.7rem); line-height: 1.25; font-weight: 800; color: #0f172a; margin-bottom: 10px; letter-spacing: -0.02em;">
                    More Than EPR. End-to-End Waste Management.
                </h2>
            </div>

            <!-- 6 Offerings Grid -->
            <div class="offerings-6col-grid reveal-on-scroll">
                <!-- Offer 1 -->
                <div class="epr-ref-service-card">
                    <div class="epr-ref-service-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <polyline points="14 2 14 8 20 8"></polyline>
                        </svg>
                    </div>
                    <h4>EPR Registration &amp; Obligation Management</h4>
                    <p>Support producers with registration, obligation assessment, compliance planning, and ongoing EPR requirements.</p>
                </div>

                <!-- Offer 2 -->
                <div class="epr-ref-service-card">
                    <div class="epr-ref-service-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="1" y="3" width="15" height="13"></rect>
                            <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon>
                            <circle cx="5.5" cy="18.5" r="2.5"></circle>
                            <circle cx="18.5" cy="18.5" r="2.5"></circle>
                        </svg>
                    </div>
                    <h4>E-Waste &amp; Battery Waste Collection</h4>
                    <p>Organised collection solutions designed to responsibly recover waste from businesses and defined collection points.</p>
                </div>

                <!-- Offer 3 -->
                <div class="epr-ref-service-card">
                    <div class="epr-ref-service-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="23 4 23 10 17 10"></polyline>
                            <polyline points="1 20 1 14 7 14"></polyline>
                            <path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path>
                        </svg>
                    </div>
                    <h4>Channelisation &amp; Authorised Recycling</h4>
                    <p>Ensure collected waste moves through appropriate authorised channels for responsible recycling and recovery.</p>
                </div>

                <!-- Offer 4 -->
                <div class="epr-ref-service-card">
                    <div class="epr-ref-service-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"></circle>
                            <path d="M12 6v6l4 2"></path>
                        </svg>
                    </div>
                    <h4>EPR Certificate Procurement</h4>
                    <p>Facilitate applicable EPR certificates through eligible authorised recycling partners.</p>
                </div>

                <!-- Offer 5 -->
                <div class="epr-ref-service-card">
                    <div class="epr-ref-service-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <line x1="16" y1="13" x2="8" y2="13"></line>
                            <line x1="16" y1="17" x2="8" y2="17"></line>
                        </svg>
                    </div>
                    <h4>Documentation &amp; Regulatory Reporting</h4>
                    <p>Manage records, certificates, recycling documentation, and reporting requirements to maintain a transparent compliance trail.</p>
                </div>

                <!-- Offer 6 -->
                <div class="epr-ref-service-card">
                    <div class="epr-ref-service-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                        </svg>
                    </div>
                    <h4>Resource Recovery</h4>
                    <p>Enable recovery of valuable materials from e-waste and batteries, supporting circular resource use.</p>
                </div>
            </div>
        </div>
    </section>


    <!-- =========================================================================
         4. PARTNERS IN COMPLIANCE (INFINITE AUTO-SCROLLING MARQUEE SLIDER)
         ========================================================================= -->
    <section class="epr-marquee-wrapper" id="partners">
        <div class="container">
            <div class="section-tag" style="margin-bottom: 10px; display: inline-flex;">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                    <circle cx="9" cy="7" r="4"></circle>
                </svg>
                <span>TRUSTED BY LEADING ENTERPRISES</span>
            </div>

            <h2 style="font-size: clamp(1.8rem, 2.8vw, 2.3rem); font-weight: 800; color: #0f172a; margin-bottom: 8px; letter-spacing: -0.02em;">
                Partners in Compliance
            </h2>
            <p style="font-size: 0.95rem; color: #64748b; max-width: 620px; margin: 0 auto;">
                Leading enterprises that rely on our verified collection, channelisation, and compliant recycling network.
            </p>
        </div>

        <!-- Infinite Auto-Scrolling Marquee Track -->
        <div class="epr-marquee-container" aria-label="Partner Brand Logos">
            <div class="epr-marquee-track">
                @if(isset($clientLogos) && count($clientLogos) > 0)
                    @foreach($clientLogos as $clientLogo)
                        <div class="epr-marquee-card">
                            @if(!empty($clientLogo->logo_image))
                                <img src="{{ $clientLogo->logo_image }}" alt="{{ $clientLogo->name }}" loading="lazy">
                            @else
                                <span style="font-weight: 700; color: #334155; font-size: 0.95rem;">{{ $clientLogo->name }}</span>
                            @endif
                        </div>
                    @endforeach
                @endif

                <!-- Set 1 -->
                <div class="epr-marquee-card"><img src="/assets/logos/logo-bisleri.svg" alt="Bisleri" loading="lazy"></div>
                <div class="epr-marquee-card"><img src="/assets/logos/logo-bluestar.svg" alt="Blue Star" loading="lazy"></div>
                <div class="epr-marquee-card"><img src="/assets/logos/logo-bosch.svg" alt="Bosch" loading="lazy"></div>
                <div class="epr-marquee-card"><img src="/assets/logos/logo-castrol.svg" alt="Castrol" loading="lazy"></div>
                <div class="epr-marquee-card"><img src="/assets/logos/logo-finolex.svg" alt="Finolex" loading="lazy"></div>
                <div class="epr-marquee-card"><img src="/assets/logos/logo-dabur.svg" alt="Dabur" loading="lazy"></div>
                <div class="epr-marquee-card"><img src="/assets/logos/logo-ecopack.png" alt="EcoPack" loading="lazy"></div>
                <div class="epr-marquee-card"><img src="/assets/logos/logo-verdia.png" alt="Verdia" loading="lazy"></div>
                <div class="epr-marquee-card"><img src="/assets/logos/logo-terrapak.png" alt="TerraPak" loading="lazy"></div>
                <div class="epr-marquee-card"><img src="/assets/logos/logo-nexus.png" alt="Nexus" loading="lazy"></div>

                @if(isset($clientLogos) && count($clientLogos) > 0)
                    @foreach($clientLogos as $clientLogo)
                        <div class="epr-marquee-card" aria-hidden="true">
                            @if(!empty($clientLogo->logo_image))
                                <img src="{{ $clientLogo->logo_image }}" alt="{{ $clientLogo->name }}" loading="lazy">
                            @else
                                <span style="font-weight: 700; color: #334155; font-size: 0.95rem;">{{ $clientLogo->name }}</span>
                            @endif
                        </div>
                    @endforeach
                @endif

                <!-- Set 2 -->
                <div class="epr-marquee-card" aria-hidden="true"><img src="/assets/logos/logo-bisleri.svg" alt="Bisleri" loading="lazy"></div>
                <div class="epr-marquee-card" aria-hidden="true"><img src="/assets/logos/logo-bluestar.svg" alt="Blue Star" loading="lazy"></div>
                <div class="epr-marquee-card" aria-hidden="true"><img src="/assets/logos/logo-bosch.svg" alt="Bosch" loading="lazy"></div>
                <div class="epr-marquee-card" aria-hidden="true"><img src="/assets/logos/logo-castrol.svg" alt="Castrol" loading="lazy"></div>
                <div class="epr-marquee-card" aria-hidden="true"><img src="/assets/logos/logo-finolex.svg" alt="Finolex" loading="lazy"></div>
                <div class="epr-marquee-card" aria-hidden="true"><img src="/assets/logos/logo-dabur.svg" alt="Dabur" loading="lazy"></div>
                <div class="epr-marquee-card" aria-hidden="true"><img src="/assets/logos/logo-ecopack.png" alt="EcoPack" loading="lazy"></div>
                <div class="epr-marquee-card" aria-hidden="true"><img src="/assets/logos/logo-verdia.png" alt="Verdia" loading="lazy"></div>
                <div class="epr-marquee-card" aria-hidden="true"><img src="/assets/logos/logo-terrapak.png" alt="TerraPak" loading="lazy"></div>
                <div class="epr-marquee-card" aria-hidden="true"><img src="/assets/logos/logo-nexus.png" alt="Nexus" loading="lazy"></div>
            </div>
        </div>
    </section>


    <!-- =========================================================================
         5. OUR PROCESS (SYMMETRICAL 2-COLUMN SEQUENCE MATCHING SERVICE 1)
         ========================================================================= -->
    <section class="epr-ref-process-section" id="process">
        <div class="container">
            <div class="reveal-on-scroll" style="max-width: 820px; margin-bottom: 12px;">
                <div style="display: inline-flex; align-items: center; gap: 8px; color: #34d399; font-size: 0.8rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.06em; margin-bottom: 12px;">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                        <polyline points="9 11 12 14 22 4"></polyline>
                        <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                    </svg>
                    <span>OUR PROCESS</span>
                </div>

                <h2 style="font-size: clamp(2.1rem, 3.6vw, 3rem); font-weight: 800; color: #ffffff; margin-bottom: 8px; line-height: 1.2; letter-spacing: -0.02em;">
                    From Waste to Verified Recovery
                </h2>
            </div>

            <!-- Balanced 2-Column Process Flow -->
            <div class="ewaste-process-2col reveal-on-scroll">
                <!-- Column 1: Steps 01 to 04 -->
                <div>
                    <!-- Step 01 -->
                    <div class="epr-ref-step-item">
                        <div class="epr-ref-step-num">01</div>
                        <div>
                            <div class="epr-ref-step-title">01 — Assess</div>
                            <p class="epr-ref-step-desc">Understand your waste generation, applicable obligations, and compliance requirements.</p>
                        </div>
                    </div>

                    <!-- Step 02 -->
                    <div class="epr-ref-step-item">
                        <div class="epr-ref-step-num">02</div>
                        <div>
                            <div class="epr-ref-step-title">02 — Register</div>
                            <p class="epr-ref-step-desc">Support required EPR registration and regulatory documentation.</p>
                        </div>
                    </div>

                    <!-- Step 03 -->
                    <div class="epr-ref-step-item">
                        <div class="epr-ref-step-num">03</div>
                        <div>
                            <div class="epr-ref-step-title">03 — Plan</div>
                            <p class="epr-ref-step-desc">Develop a collection and channelisation plan aligned with your waste volumes and obligations.</p>
                        </div>
                    </div>

                    <!-- Step 04 -->
                    <div class="epr-ref-step-item">
                        <div class="epr-ref-step-num">04</div>
                        <div>
                            <div class="epr-ref-step-title">04 — Collect</div>
                            <p class="epr-ref-step-desc">Coordinate responsible collection of e-waste and battery waste from defined locations.</p>
                        </div>
                    </div>
                </div>

                <!-- Column 2: Steps 05 to 07 -->
                <div>
                    <!-- Step 05 -->
                    <div class="epr-ref-step-item">
                        <div class="epr-ref-step-num">05</div>
                        <div>
                            <div class="epr-ref-step-title">05 — Channelise</div>
                            <p class="epr-ref-step-desc">Move collected waste through appropriate authorised recycling channels.</p>
                        </div>
                    </div>

                    <!-- Step 06 -->
                    <div class="epr-ref-step-item">
                        <div class="epr-ref-step-num">06</div>
                        <div>
                            <div class="epr-ref-step-title">06 — Recycle &amp; Recover</div>
                            <p class="epr-ref-step-desc">Ensure materials are processed through responsible recycling partners for resource recovery.</p>
                        </div>
                    </div>

                    <!-- Step 07 -->
                    <div class="epr-ref-step-item">
                        <div class="epr-ref-step-num">07</div>
                        <div>
                            <div class="epr-ref-step-title">07 — Certify &amp; Report</div>
                            <p class="epr-ref-step-desc">Compile certificates, documentation, and reporting records to support compliance closure.</p>
                        </div>
                    </div>

                    <!-- Process Assurance Notice -->
                    <div style="margin-top: 18px; padding: 18px 20px; background: rgba(5, 150, 105, 0.15); border: 1px solid rgba(52, 211, 153, 0.3); border-radius: 14px; display: flex; align-items: center; gap: 14px;">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#34d399" stroke-width="2" style="flex-shrink: 0;">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                        </svg>
                        <div style="font-size: 0.88rem; color: #d1fae5; line-height: 1.5;">
                            <strong>Transparent Compliance Trail:</strong> End-to-end documentation across state pollution control boards and central CPCB portal filings.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- =========================================================================
         6. MORE THAN JUST EPR & COMPLIANCE (MATCHING SERVICE 1 SECTION 6)
         ========================================================================= -->
    <section class="epr-ref-impact-section" id="more-than-epr">
        <div class="container">
            <div class="reveal-on-scroll" style="text-align: left; max-width: 840px; margin-bottom: 36px;">
                <div style="display: inline-flex; align-items: center; gap: 8px; color: #10b981; font-size: 0.8rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.06em; margin-bottom: 12px;">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                    </svg>
                    <span>MORE THAN JUST EPR &amp; COMPLIANCE</span>
                </div>

                <h2 style="font-size: clamp(2.1rem, 3.6vw, 3rem); font-weight: 800; color: #ffffff; margin-bottom: 14px; line-height: 1.2; letter-spacing: -0.02em;">
                    Compliance Is the Starting Point. Impact Is the Goal.
                </h2>

                <p style="color: #94a3b8; font-size: 1.05rem; line-height: 1.7; margin: 0;">
                    {{ setting('site_name', 'Shristiyam') }} goes beyond EPR obligations to help businesses build responsible, traceable, and circular waste management systems.
                </p>
            </div>

            <!-- 4 Beyond Compliance Cards -->
            <div class="epr-ref-impact-grid reveal-on-scroll">
                <!-- Card 1 -->
                <div class="epr-ref-impact-card">
                    <div class="epr-ref-impact-num">01</div>
                    <h4>CSR &amp; ESG Projects</h4>
                    <p>Custom e-waste and battery waste initiatives that turn sustainability commitments into measurable on-ground recovery and recycling impact.</p>
                </div>

                <!-- Card 2 -->
                <div class="epr-ref-impact-card">
                    <div class="epr-ref-impact-num">02</div>
                    <h4>Circularity Consulting</h4>
                    <p>Data-led strategies and actionable roadmaps to improve resource recovery, reduce waste, and build circularity into business operations.</p>
                </div>

                <!-- Card 3 -->
                <div class="epr-ref-impact-card">
                    <div class="epr-ref-impact-num">03</div>
                    <h4>Recovered &amp; Recycled Materials</h4>
                    <p>Support the recovery of valuable materials from e-waste and batteries, helping create more sustainable resource cycles.</p>
                </div>

                <!-- Card 4 -->
                <div class="epr-ref-impact-card">
                    <div class="epr-ref-impact-num">04</div>
                    <h4>Impact Reporting &amp; Certification</h4>
                    <p>Transparent reporting and documentation covering collection, recycling, certificates, recovery, and environmental outcomes to demonstrate measurable impact.</p>
                </div>
            </div>

            <!-- Closing Callout & CTA (Exact User Text) -->
            <div class="reveal-on-scroll" style="margin-top: 50px; background: rgba(255, 255, 255, 0.04); border: 1px solid rgba(52, 211, 153, 0.25); border-radius: 18px; padding: 36px 32px; display: flex; justify-content: space-between; align-items: center; gap: 24px; flex-wrap: wrap;">
                <div style="max-width: 680px;">
                    <div style="font-size: 1.35rem; font-weight: 800; color: #ffffff; margin-bottom: 8px;">
                        Beyond Compliance. Into Circularity. Into Impact.
                    </div>
                    <p style="color: #cbd5e1; font-size: 0.95rem; line-height: 1.6; margin: 0;">
                        Connect with {{ setting('site_name', 'Shristiyam') }} to build a compliant, traceable, and responsible e-waste and battery waste management program.
                    </p>
                </div>
                <div>
                    <button type="button" class="btn btn-primary" data-open-modal="consultationModal" style="padding: 14px 30px; font-weight: 700; font-size: 0.96rem; white-space: nowrap; box-shadow: 0 4px 20px rgba(5, 150, 105, 0.4);">
                        Book Free Consultation &rarr;
                    </button>
                </div>
            </div>
        </div>
    </section>

@endsection
