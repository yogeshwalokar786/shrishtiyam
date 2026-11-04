@extends('layouts.site')

@section('title', 'Plastic | Extended Producer Responsibility (EPR) - End-to-End Compliance | ' . setting('site_name', 'SHRISTIYAM'))
@section('meta_description', 'End-to-End Plastic Waste EPR Compliance in India by ' . setting('company_legal_name', 'SHRISTIYAM COMPLIANCE SOLUTIONS PRIVATE LIMITED') . '. CPCB registration, footprint assessment, traceable recovery, recycling, and annual return filing.')

@section('head')
    <link rel="canonical" href="{{ url('/services/plastic-epr-compliance') }}">
    <script type="application/ld+json">
                                      {
                                        "@@context": "https://schema.org",
                                        "@@type": "Service",
                                        "name": "Plastic | Extended Producer Responsibility (EPR)",
                                        "serviceType": "Plastic Waste EPR Compliance",
                                        "provider": {
                                          "@@type": "Organization",
                                          "name": "{{ setting('company_legal_name', 'SHRISTIYAM COMPLIANCE SOLUTIONS PRIVATE LIMITED') }}",
                                          "url": "{{ url('/') }}"
                                        },
                                        "description": "End-to-End Plastic Waste EPR Compliance for Producers, Importers, and Brand Owners (PIBOs) across India.",
                                        "areaServed": "India",
                                        "hasOfferCatalog": {
                                          "@@type": "OfferCatalog",
                                          "name": "Plastic EPR Compliance Services",
                                          "itemListElement": [
                                            { "@@type": "Offer", "itemOffered": { "@@type": "Service", "name": "EPR Registration & CPCB Compliance" } },
                                            { "@@type": "Offer", "itemOffered": { "@@type": "Service", "name": "Data-Driven Waste & Footprint Assessment" } },
                                            { "@@type": "Offer", "itemOffered": { "@@type": "Service", "name": "Traceable Waste Collection & Recovery" } },
                                            { "@@type": "Offer", "itemOffered": { "@@type": "Service", "name": "EPR Certificate Management & Verification" } },
                                            { "@@type": "Offer", "itemOffered": { "@@type": "Service", "name": "Annual Return & Compliance Reporting" } }
                                          ]
                                        }
                                      }
                                      </script>
@endsection

@section('content')

    <!-- =========================================================================
                                           1. HERO HEADER (MATCHING REFERENCE IMAGE WITH AUTHENTIC TRUCK BACKGROUND)
                                           ========================================================================= -->
    <section class="epr-ref-hero">
        <div class="container">
            <!-- Breadcrumb Navigation -->
            <div
                style="display: flex; align-items: center; gap: 8px; font-size: 0.84rem; color: #94a3b8; margin-bottom: 24px; flex-wrap: wrap;">
                <a href="/" style="color: #94a3b8; text-decoration: none;" onmouseover="this.style.color='#ffffff'"
                    onmouseout="this.style.color='#94a3b8'">Home</a>
                <span>/</span>
                <a href="/solutions" style="color: #94a3b8; text-decoration: none;" onmouseover="this.style.color='#ffffff'"
                    onmouseout="this.style.color='#94a3b8'">Services &amp; Solutions</a>
                <span>/</span>
                <span style="color: #34d399; font-weight: 600;">Plastic | Extended Producer Responsibility (EPR)</span>
            </div>

            <!-- Quick Static Services Switcher Bar -->
            <div
                style="display: flex; gap: 8px; flex-wrap: wrap; margin-bottom: 36px; background: rgba(255, 255, 255, 0.06); padding: 8px 12px; border-radius: var(--radius-md); border: 1px solid rgba(255, 255, 255, 0.12); backdrop-filter: blur(8px);">
                <span
                    style="font-size: 0.78rem; font-weight: 700; color: #cbd5e1; display: inline-flex; align-items: center; margin-right: 6px; text-transform: uppercase;">Our
                    Services:</span>
                <a href="/services/plastic-epr-compliance" class="btn btn-primary"
                    style="padding: 6px 14px; font-size: 0.8rem; border-radius: 999px; text-decoration: none;">1. Plastic
                    EPR Compliance</a>
                <a href="/services/plastic-neutral-programme" class="btn btn-outline"
                    style="padding: 6px 14px; font-size: 0.8rem; border-radius: 999px; text-decoration: none; color: #ffffff; border-color: rgba(255,255,255,0.25);">2.
                    Plastic Neutral Programme</a>
                <a href="/services/esg-csr-projects" class="btn btn-outline"
                    style="padding: 6px 14px; font-size: 0.8rem; border-radius: 999px; text-decoration: none; color: #ffffff; border-color: rgba(255,255,255,0.25);">3.
                    ESG &amp; CSR Projects</a>
                <a href="/services/e-waste-battery-management" class="btn btn-outline"
                    style="padding: 6px 14px; font-size: 0.8rem; border-radius: 999px; text-decoration: none; color: #ffffff; border-color: rgba(255,255,255,0.25);">4.
                    E-Waste &amp; Battery</a>
                <a href="/services/industrial-agriculture-waste-management" class="btn btn-outline"
                    style="padding: 6px 14px; font-size: 0.8rem; border-radius: 999px; text-decoration: none; color: #ffffff; border-color: rgba(255,255,255,0.25);">5.
                    Industrial &amp; Agri Waste</a>
            </div>

            <!-- Main Hero Content -->
            <div class="reveal-on-scroll" style="max-width: 960px;">
                <div class="epr-ref-hero-tag">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                        <polyline points="9 12 11 14 15 10"></polyline>
                    </svg>
                    <span>EPR Compliance</span>
                </div>

                <h1 class="epr-ref-hero-title">
                    End-to-End Plastic Waste <span class="gradient-text"
                        style="background: linear-gradient(135deg, #34d399 0%, #10b981 100%); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent;">EPR
                        Compliance</span>
                </h1>

                <p class="epr-ref-hero-desc">
                    {{ setting('site_name', 'Shristiyam') }} helps Producers, Importers, and Brand Owners (PIBOs) manage
                    their complete Plastic Waste EPR requirements in India. From CPCB registration and plastic footprint
                    assessment to EPR obligation calculation, waste collection, recycling, certificate management,
                    traceability, and annual return filing, we provide a simple, transparent, and compliant process aligned
                    with applicable CPCB and Plastic Waste Management Rules.
                </p>

                <!-- Action CTAs -->
                <div style="display: flex; gap: 14px; flex-wrap: wrap; align-items: center;">
                    <button type="button" class="btn btn-primary" data-open-modal="consultationModal"
                        style="padding: 14px 28px; font-size: 0.98rem; font-weight: 700; box-shadow: 0 4px 20px rgba(5, 150, 105, 0.4);">
                        Book Free Consultation &rarr;
                    </button>
                    <a href="#offerings" class="btn btn-outline"
                        style="padding: 14px 24px; font-size: 0.98rem; font-weight: 600; text-decoration: none; color: #ffffff; border-color: rgba(255, 255, 255, 0.3); background: rgba(255, 255, 255, 0.05); backdrop-filter: blur(8px);">
                        Our Suite of Services &darr;
                    </a>
                </div>

                <!-- Trust Checkmark Badges -->
                <div class="epr-ref-trust-row">
                    <div class="epr-ref-trust-item">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.5">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        <span>CPCB Compliant</span>
                    </div>
                    <div class="epr-ref-trust-item">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.5">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        <span>Pan-India Network</span>
                    </div>
                    <div class="epr-ref-trust-item">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.5">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        <span>100% Traceable &amp; Audit-Ready</span>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- =========================================================================
                                           2. OUR APPROACH (MATCHING REFERENCE SECTION 2)
                                           ========================================================================= -->
    <section class="epr-ref-approach-section" id="approach">
        <div class="container">
            <div class="epr-ref-approach-grid reveal-on-scroll">
                <!-- Left: Copy & Explanations -->
                <div class="epr-ref-approach-copy">
                    <div class="section-tag" style="margin-bottom: 12px;">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                        </svg>
                        <span>OUR APPROACH</span>
                    </div>

                    <h2
                        style="font-size: clamp(2rem, 3.2vw, 2.7rem); line-height: 1.25; font-weight: 800; color: #0f172a; margin-bottom: 22px; letter-spacing: -0.02em;">
                        End-to-End EPR Compliance for Businesses Across India
                    </h2>

                    <p>
                        <strong>Shristiyam provides end-to-end EPR compliance solutions</strong> for businesses of all
                        sizes, helping Producers, Importers, Brand Owners, and Manufacturers manage their plastic waste
                        obligations with accuracy, transparency, and complete traceability.
                    </p>

                    <p>
                        From CPCB registration and EPR obligation assessment to waste recovery, recycling, EPR certificate
                        management, documentation, and annual compliance reporting, Shristiyam manages every stage of the
                        EPR process in line with applicable Plastic Waste Management Rules and CPCB requirements.
                    </p>

                    <p>
                        With a pan-India recovery network, verified recycling partners, and transparent reporting, we help
                        businesses meet their EPR obligations while turning compliance data into measurable recycling,
                        resource recovery, and environmental impact.
                    </p>
                </div>

                <!-- Right: Official CPCB & Government Accreditation Cards -->
                <div>
                    <div class="epr-accred-cards-row">
                        <!-- CPCB Card -->
                        <div class="epr-accred-card">
                            <div class="epr-accred-logo-wrapper">
                                <img src="/assets/logos/cpcb-logo.svg" alt="Central Pollution Control Board"
                                    style="max-height: 72px; max-width: 140px; object-fit: contain;">
                            </div>
                            <div
                                style="font-size: 1.15rem; font-weight: 800; color: #047857; letter-spacing: 0.05em; margin-bottom: 2px;">
                                CPCB</div>
                            <div class="epr-accred-name">Central Pollution Control Board</div>
                            <div class="epr-accred-tag">Authorized PRO Entity</div>
                        </div>

                        <!-- MoEFCC Card -->
                        <div class="epr-accred-card">
                            <div class="epr-accred-logo-wrapper">
                                <img src="/assets/logos/moefcc-logo.svg"
                                    alt="Ministry of Environment, Forest and Climate Change"
                                    style="max-height: 72px; max-width: 150px; object-fit: contain;">
                            </div>
                            <div style="font-size: 1.05rem; font-weight: 800; color: #0f172a; margin-bottom: 2px;">Govt. of
                                India</div>
                            <div class="epr-accred-name">Ministry of Environment, Forest &amp; Climate Change</div>
                            <div class="epr-accred-tag">PWM Rules 2022/2024</div>
                        </div>
                    </div>

                    <div
                        style="margin-top: 18px; padding: 14px 18px; background: rgba(5, 150, 105, 0.05); border: 1px solid rgba(5, 150, 105, 0.15); border-radius: 12px; display: flex; align-items: center; gap: 12px;">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#059669" stroke-width="2"
                            style="flex-shrink: 0;">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                        </svg>
                        <div style="font-size: 0.85rem; color: #334155; line-height: 1.5;">
                            <strong>Contractual Legal Indemnity:</strong> Guaranteed fulfillment backed by physical
                            mass-balance verification and direct CPCB portal transaction hashes.
                        </div>
                    </div>
                </div>
            </div>

            <!-- 4 Metrics Stats Strip -->
            <div class="epr-ref-metrics-grid reveal-on-scroll">
                <div class="epr-ref-metric-card">
                    <div class="epr-ref-metric-val" style="color: #047857;">CPCB</div>
                    <div class="epr-ref-metric-lbl">Registered PRO &amp; Portal Validation</div>
                </div>

                <div class="epr-ref-metric-card">
                    <div class="epr-ref-metric-val" style="color: #059669;">500+</div>
                    <div class="epr-ref-metric-lbl">Network Recyclers &amp; Aggregators</div>
                </div>

                <div class="epr-ref-metric-card">
                    <div class="epr-ref-metric-val" style="color: #047857;">100%</div>
                    <div class="epr-ref-metric-lbl">Audit-Ready Annual Filing</div>
                </div>

                <div class="epr-ref-metric-card">
                    <div class="epr-ref-metric-val" style="color: #10b981;">Pan-India</div>
                    <div class="epr-ref-metric-lbl">Traceable Recovery Network</div>
                </div>
            </div>
        </div>
    </section>


    <!-- =========================================================================
                                           3. WHAT WE OFFER: OUR SUITE OF EPR COMPLIANCE SERVICES
                                           ========================================================================= -->
    <section class="epr-ref-services-section" id="offerings">
        <div class="container">
            <div class="section-header reveal-on-scroll" style="text-align: left; max-width: 820px; margin-bottom: 20px;">
                <div class="section-tag" style="margin-bottom: 12px;">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="20 6 9 17 4 12"></polyline>
                    </svg>
                    <span>WHAT WE OFFER</span>
                </div>
                <h2
                    style="font-size: clamp(2rem, 3.2vw, 2.7rem); line-height: 1.25; font-weight: 800; color: #0f172a; margin-bottom: 14px; letter-spacing: -0.02em;">
                    Complete EPR Compliance Services
                </h2>
                <p style="font-size: 1.02rem; color: #64748b; line-height: 1.7; margin: 0;">
                    From CPCB registration to annual compliance reporting, Shristiyam provides end-to-end support for
                    transparent, accurate, and traceable EPR compliance.
                </p>
            </div>

            <div class="epr-ref-services-grid reveal-on-scroll">
                <!-- Service 1 -->
                <div class="epr-ref-service-card">
                    <div class="epr-ref-service-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <polyline points="14 2 14 8 20 8"></polyline>
                            <line x1="16" y1="13" x2="8" y2="13"></line>
                            <line x1="16" y1="17" x2="8" y2="17"></line>
                        </svg>
                    </div>
                    <h4>EPR Registration &amp; CPCB Compliance</h4>
                    <p>CPCB registration, documentation and obligation assessment</p>
                </div>

                <!-- Service 2 -->
                <div class="epr-ref-service-card">
                    <div class="epr-ref-service-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="12 6 12 12 16 14"></polyline>
                        </svg>
                    </div>
                    <h4>Data-Driven Waste &amp; Footprint Assessment</h4>
                    <p>Calculate plastic footprint and applicable EPR obligations</p>
                </div>

                <!-- Service 3 -->
                <div class="epr-ref-service-card">
                    <div class="epr-ref-service-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M1 3h15v13H1zM16 8h4l3 3v5h-7V8z"></path>
                            <circle cx="5.5" cy="18.5" r="2.5"></circle>
                            <circle cx="18.5" cy="18.5" r="2.5"></circle>
                        </svg>
                    </div>
                    <h4>Traceable Waste Collection &amp; Recovery</h4>
                    <p>Verified collection, recycling and recovery through authorised partners</p>
                </div>

                <!-- Service 4 -->
                <div class="epr-ref-service-card">
                    <div class="epr-ref-service-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                        </svg>
                    </div>
                    <h4>EPR Certificate Management &amp; Verification</h4>
                    <p>Track, verify and manage EPR certificates and compliance records</p>
                </div>

                <!-- Service 5 -->
                <div class="epr-ref-service-card">
                    <div class="epr-ref-service-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                        </svg>
                    </div>
                    <h4>Annual Return &amp; Compliance Reporting</h4>
                    <p>Complete documentation, reporting and annual return support</p>
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

            <h2
                style="font-size: clamp(1.8rem, 2.8vw, 2.3rem); font-weight: 800; color: #0f172a; margin-bottom: 8px; letter-spacing: -0.02em;">
                Partners in Compliance
            </h2>
            <p style="font-size: 0.95rem; color: #64748b; max-width: 620px; margin: 0 auto;">
                Leading brands and enterprises that rely on our verified plastic waste collection and EPR compliance network
                across India.
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

                <!-- Primary Verified Partner Brand Logos (Set 1) -->
                <div class="epr-marquee-card"><img src="/assets/logos/logo-bisleri.svg" alt="Bisleri" loading="lazy"></div>
                <div class="epr-marquee-card"><img src="/assets/logos/logo-bluestar.svg" alt="Blue Star" loading="lazy">
                </div>
                <div class="epr-marquee-card"><img src="/assets/logos/logo-bosch.svg" alt="Bosch" loading="lazy"></div>
                <div class="epr-marquee-card"><img src="/assets/logos/logo-castrol.svg" alt="Castrol" loading="lazy"></div>
                <div class="epr-marquee-card"><img src="/assets/logos/logo-finolex.svg" alt="Finolex" loading="lazy"></div>
                <div class="epr-marquee-card"><img src="/assets/logos/logo-dabur.svg" alt="Dabur" loading="lazy"></div>
                <div class="epr-marquee-card"><img src="/assets/logos/logo-ecopack.png" alt="EcoPack" loading="lazy"></div>
                <div class="epr-marquee-card"><img src="/assets/logos/logo-verdia.png" alt="Verdia" loading="lazy"></div>
                <div class="epr-marquee-card"><img src="/assets/logos/logo-terrapak.png" alt="TerraPak" loading="lazy">
                </div>
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

                <!-- Duplicate (Set 2 for Continuous 100% Seamless Infinite CSS Animation) -->
                <div class="epr-marquee-card" aria-hidden="true"><img src="/assets/logos/logo-bisleri.svg" alt="Bisleri"
                        loading="lazy"></div>
                <div class="epr-marquee-card" aria-hidden="true"><img src="/assets/logos/logo-bluestar.svg" alt="Blue Star"
                        loading="lazy"></div>
                <div class="epr-marquee-card" aria-hidden="true"><img src="/assets/logos/logo-bosch.svg" alt="Bosch"
                        loading="lazy"></div>
                <div class="epr-marquee-card" aria-hidden="true"><img src="/assets/logos/logo-castrol.svg" alt="Castrol"
                        loading="lazy"></div>
                <div class="epr-marquee-card" aria-hidden="true"><img src="/assets/logos/logo-finolex.svg" alt="Finolex"
                        loading="lazy"></div>
                <div class="epr-marquee-card" aria-hidden="true"><img src="/assets/logos/logo-dabur.svg" alt="Dabur"
                        loading="lazy"></div>
                <div class="epr-marquee-card" aria-hidden="true"><img src="/assets/logos/logo-ecopack.png" alt="EcoPack"
                        loading="lazy"></div>
                <div class="epr-marquee-card" aria-hidden="true"><img src="/assets/logos/logo-verdia.png" alt="Verdia"
                        loading="lazy"></div>
                <div class="epr-marquee-card" aria-hidden="true"><img src="/assets/logos/logo-terrapak.png" alt="TerraPak"
                        loading="lazy"></div>
                <div class="epr-marquee-card" aria-hidden="true"><img src="/assets/logos/logo-nexus.png" alt="Nexus"
                        loading="lazy"></div>
            </div>
        </div>
    </section>


    <!-- =========================================================================
                                           5. OUR EPR COMPLIANCE PROCESS (MIDNIGHT NAVY WITH PORTAL MONITOR MOCKUP)
                                           ========================================================================= -->
    <section class="epr-ref-process-section" id="process">
        <div class="container">
            <div class="epr-ref-process-grid">
                <!-- Left: 5 Step Sequence -->
                <div class="reveal-on-scroll">
                    <div
                        style="display: inline-flex; align-items: center; gap: 8px; color: #34d399; font-size: 0.8rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.06em; margin-bottom: 12px;">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.5">
                            <polyline points="9 11 12 14 22 4"></polyline>
                            <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                        </svg>
                        <span>OUR PROCESS</span>
                    </div>

                    <h2
                        style="font-size: clamp(2.1rem, 3.6vw, 3rem); font-weight: 800; color: #ffffff; margin-bottom: 12px; line-height: 1.2; letter-spacing: -0.02em;">
                        A Seamless EPR Compliance Journey
                    </h2>

                    <p style="color: #94a3b8; font-size: 0.98rem; line-height: 1.7; margin-bottom: 36px; max-width: 620px;">
                        We simplify EPR compliance from registration to annual
                        reporting, ensuring every obligation is accurately assessed, transparently managed, and fully
                        documented.
                    </p>

                    <div>
                        <!-- Step 1 -->
                        <div class="epr-ref-step-item">
                            <div class="epr-ref-step-num">01</div>
                            <div>
                                <div class="epr-ref-step-title">EPR Registration</div>
                                <p class="epr-ref-step-desc">
                                    We register your business on the CPCB EPR Portal with accurate documentation and
                                    complete regulatory support.
                                </p>
                            </div>
                        </div>

                        <!-- Step 2 -->
                        <div class="epr-ref-step-item">
                            <div class="epr-ref-step-num">02</div>
                            <div>
                                <div class="epr-ref-step-title">EPR Obligation Assessment</div>
                                <p class="epr-ref-step-desc">
                                    We assess your plastic footprint and annual material introduction to calculate your
                                    applicable EPR targets.
                                </p>
                            </div>
                        </div>

                        <!-- Step 3 -->
                        <div class="epr-ref-step-item">
                            <div class="epr-ref-step-num">03</div>
                            <div>
                                <div class="epr-ref-step-title">Verified Waste Recovery</div>
                                <p class="epr-ref-step-desc">
                                    We facilitate waste recovery through our verified network, ensuring responsible
                                    collection, processing, and traceability.
                                </p>
                            </div>
                        </div>

                        <!-- Step 4 -->
                        <div class="epr-ref-step-item">
                            <div class="epr-ref-step-num">04</div>
                            <div>
                                <div class="epr-ref-step-title">EPR Credit Management</div>
                                <p class="epr-ref-step-desc">
                                    We source and verify eligible EPR certificates and align them with your compliance
                                    obligations for transparent target fulfilment.
                                </p>
                            </div>
                        </div>

                        <!-- Step 5 -->
                        <div class="epr-ref-step-item">
                            <div class="epr-ref-step-num">05</div>
                            <div>
                                <div class="epr-ref-step-title">Annual Return Filing</div>
                                <p class="epr-ref-step-desc">
                                    We manage your annual return filing, documentation, and portal submissions—keeping your
                                    compliance records accurate, complete, and audit-ready.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: Modern Desktop Monitor Mockup -->
                <div class="reveal-on-scroll reveal-delay-2" style="text-align: center;">
                    <div class="epr-monitor-frame">
                        <img src="/images/epr-portal-monitor.jpg" alt="EPR Compliance Live Portal Dashboard">
                    </div>
                    <div
                        style="margin-top: 14px; font-size: 0.82rem; color: #94a3b8; display: inline-flex; align-items: center; gap: 8px;">
                        <span
                            style="width: 8px; height: 8px; border-radius: 999px; background: #34d399; display: inline-block;"></span>
                        <span>Live CPCB Portal Telemetry &amp; Credit Allocation Dashboard</span>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- =========================================================================
                                           6. WHAT YOU GET WITH SHRISTIYAM EPR (BEYOND COMPLIANCE - DARK CHARCOAL)
                                           ========================================================================= -->
    <section class="epr-ref-impact-section">
        <div class="container">
            <div class="reveal-on-scroll" style="text-align: left; max-width: 800px;">
                <div
                    style="display: inline-flex; align-items: center; gap: 8px; color: #10b981; font-size: 0.8rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.06em; margin-bottom: 12px;">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                    </svg>
                    <span>BEYOND COMPLIANCE</span>
                </div>

                <h2
                    style="font-size: clamp(2.1rem, 3.6vw, 3rem); font-weight: 800; color: #ffffff; margin-bottom: 14px; line-height: 1.2; letter-spacing: -0.02em;">
                    More Than EPR. Built for Impact.
                </h2>

                <p style="color: #94a3b8; font-size: 1.02rem; line-height: 1.7; margin: 0;">
                    Go beyond compliance with {{ setting('site_name', 'Shristiyam') }}’s integrated sustainability
                    solutions—designed to strengthen circularity, improve resource efficiency, and deliver measurable
                    impact.
                </p>
            </div>

            <div class="epr-ref-impact-grid reveal-on-scroll">
                <!-- Card 1 -->
                <div class="epr-ref-impact-card">
                    <div class="epr-ref-impact-num">01</div>
                    <h4>CSR &amp; ESG Projects</h4>
                    <p>Custom projects that turn sustainability goals into measurable on-ground impact for communities and
                        ecosystems.</p>
                </div>

                <!-- Card 2 -->
                <div class="epr-ref-impact-card">
                    <div class="epr-ref-impact-num">02</div>
                    <h4>Circularity Consulting</h4>
                    <p>Data-led strategies and actionable roadmaps to build circularity and resource efficiency into your
                        business.</p>
                </div>

                <!-- Card 3 -->
                <div class="epr-ref-impact-card">
                    <div class="epr-ref-impact-num">03</div>
                    <h4>Recycled Raw Materials</h4>
                    <p>Reliable access to quality recycled materials (PCR resins, rHDPE, rPP, rPET) for more sustainable
                        production.</p>
                </div>

                <!-- Card 4 -->
                <div class="epr-ref-impact-card">
                    <div class="epr-ref-impact-num">04</div>
                    <h4>Impact Reporting &amp; Certification</h4>
                    <p>Transparent reporting and documentation to quantify and demonstrate your environmental impact for
                        BRSR &amp; audits.</p>
                </div>
            </div>
        </div>
    </section>

@endsection