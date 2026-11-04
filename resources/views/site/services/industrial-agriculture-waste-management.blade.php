@extends('layouts.site')

@section('title', 'Industrial Waste & Agriculture Waste Management - Circularity Through High-Quality Industrial Fuels | ' . setting('site_name', 'SHRISTIYAM'))
@section('meta_description', 'Circularity Through High-Quality Industrial Fuels. Shristiyam BioEnergy provides end-to-end agricultural and industrial waste management solutions, transforming suitable waste streams into high-quality biomass fuels.')

@section('head')
    <link rel="canonical" href="{{ url('/services/industrial-agriculture-waste-management') }}">
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "Service",
      "name": "Industrial Waste & Agriculture Waste Management",
      "serviceType": "Industrial Waste & Agricultural Biomass Fuel Co-Processing",
      "provider": {
        "@@type": "Organization",
        "name": "{{ setting('company_legal_name', 'SHRISTIYAM COMPLIANCE SOLUTIONS PRIVATE LIMITED') }}",
        "url": "{{ url('/') }}"
      },
      "description": "Circularity Through High-Quality Industrial Fuels. Transforming suitable agricultural and industrial waste streams into high-quality biomass fuels for industrial boilers and power generation.",
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
                <span style="color: #34d399; font-weight: 600;">Industrial Waste &amp; Agriculture Waste Management</span>
            </div>

            <!-- Quick Static Services Switcher Bar -->
            <div style="display: flex; gap: 8px; flex-wrap: wrap; margin-bottom: 36px; background: rgba(255, 255, 255, 0.06); padding: 8px 12px; border-radius: var(--radius-md); border: 1px solid rgba(255, 255, 255, 0.12); backdrop-filter: blur(8px);">
                <span style="font-size: 0.78rem; font-weight: 700; color: #cbd5e1; display: inline-flex; align-items: center; margin-right: 6px; text-transform: uppercase;">Our Services:</span>
                <a href="/services/plastic-epr-compliance" class="btn btn-outline" style="padding: 6px 14px; font-size: 0.8rem; border-radius: 999px; text-decoration: none; color: #ffffff; border-color: rgba(255,255,255,0.25);">1. Plastic EPR Compliance</a>
                <a href="/services/plastic-neutral-programme" class="btn btn-outline" style="padding: 6px 14px; font-size: 0.8rem; border-radius: 999px; text-decoration: none; color: #ffffff; border-color: rgba(255,255,255,0.25);">2. Plastic Neutral Programme</a>
                <a href="/services/esg-csr-projects" class="btn btn-outline" style="padding: 6px 14px; font-size: 0.8rem; border-radius: 999px; text-decoration: none; color: #ffffff; border-color: rgba(255,255,255,0.25);">3. ESG &amp; CSR Projects</a>
                <a href="/services/e-waste-battery-management" class="btn btn-outline" style="padding: 6px 14px; font-size: 0.8rem; border-radius: 999px; text-decoration: none; color: #ffffff; border-color: rgba(255,255,255,0.25);">4. E-Waste &amp; Battery</a>
                <a href="/services/industrial-agriculture-waste-management" class="btn btn-primary" style="padding: 6px 14px; font-size: 0.8rem; border-radius: 999px; text-decoration: none;">5. Industrial &amp; Agri Waste</a>
            </div>

            <!-- Main Hero Content -->
            <div class="reveal-on-scroll" style="max-width: 960px;">
                <div class="epr-ref-hero-tag">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                        <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
                    </svg>
                    <span>Circularity Through High-Quality Industrial Fuels</span>
                </div>

                <h1 class="epr-ref-hero-title">
                    Industrial Waste &amp; Agriculture Waste <span class="gradient-text" style="background: linear-gradient(135deg, #34d399 0%, #10b981 100%); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent;">Management</span>
                </h1>

                <div style="font-size: clamp(1.2rem, 2vw, 1.45rem); font-weight: 700; color: #34d399; margin-bottom: 18px; letter-spacing: -0.01em;">
                    Circularity Through High-Quality Industrial Fuels
                </div>

                <p class="epr-ref-hero-desc">
                    Shristiyam BioEnergy provides end-to-end agricultural and industrial waste management solutions, transforming suitable waste streams into high-quality biomass fuels and supporting waste-to-energy and power generation applications.
                </p>

                <p style="font-size: 1.02rem; color: #cbd5e1; line-height: 1.75; margin-bottom: 16px; max-width: 820px;">
                    From collection, segregation, and processing to fuel conversion and energy recovery, we help industries recover value from waste while reducing dependence on conventional fuels.
                </p>

                <p style="font-size: 1.02rem; color: #cbd5e1; line-height: 1.75; margin-bottom: 26px; max-width: 820px;">
                    Our solutions are built around consistent fuel quality, reliable performance, efficient energy generation, and responsible resource recovery.
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
                        <span>Convert Efficiently</span>
                    </div>
                    <div class="epr-ref-trust-item">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        <span>Power Industries Sustainably</span>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- =========================================================================
         2. OUR APPROACH (2-COLUMN BALANCED LAYOUT MATCHING SERVICE 1)
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
                        From Waste Streams to Energy Solutions
                    </h2>

                    <p style="font-size: 1.05rem; line-height: 1.8; color: #334155; margin-bottom: 24px;">
                        We go beyond waste disposal to create a resource-to-energy system that converts suitable agricultural and industrial waste into usable fuel for industrial and power applications.
                    </p>

                    <div style="padding: 18px 20px; background: rgba(5, 150, 105, 0.06); border: 1px solid rgba(5, 150, 105, 0.2); border-radius: 12px; display: flex; align-items: center; gap: 12px;">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#059669" stroke-width="2" style="flex-shrink: 0;">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                        </svg>
                        <div style="font-size: 0.9rem; color: #047857; font-weight: 600; line-height: 1.5;">
                            Collect responsibly. Convert efficiently. Power industries sustainably.
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
                            <strong style="color: #0f172a; font-size: 1rem; display: block; margin-bottom: 2px;">Waste Recovery</strong>
                            <span style="color: #64748b; font-size: 0.88rem; line-height: 1.5;">Identify and recover suitable agricultural and industrial waste streams.</span>
                        </div>
                    </div>

                    <!-- Pillar 2 -->
                    <div class="ewaste-pillar-card">
                        <div class="ewaste-pillar-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        </div>
                        <div>
                            <strong style="color: #0f172a; font-size: 1rem; display: block; margin-bottom: 2px;">Smart Segregation</strong>
                            <span style="color: #64748b; font-size: 0.88rem; line-height: 1.5;">Separate and prepare materials based on fuel requirements and quality.</span>
                        </div>
                    </div>

                    <!-- Pillar 3 -->
                    <div class="ewaste-pillar-card">
                        <div class="ewaste-pillar-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        </div>
                        <div>
                            <strong style="color: #0f172a; font-size: 1rem; display: block; margin-bottom: 2px;">Efficient Conversion</strong>
                            <span style="color: #64748b; font-size: 0.88rem; line-height: 1.5;">Process suitable waste into consistent, high-quality biomass fuel.</span>
                        </div>
                    </div>

                    <!-- Pillar 4 -->
                    <div class="ewaste-pillar-card">
                        <div class="ewaste-pillar-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        </div>
                        <div>
                            <strong style="color: #0f172a; font-size: 1rem; display: block; margin-bottom: 2px;">Energy Optimisation</strong>
                            <span style="color: #64748b; font-size: 0.88rem; line-height: 1.5;">Develop fuel solutions suited for industrial boilers and power-generation applications.</span>
                        </div>
                    </div>

                    <!-- Pillar 5 -->
                    <div class="ewaste-pillar-card">
                        <div class="ewaste-pillar-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        </div>
                        <div>
                            <strong style="color: #0f172a; font-size: 1rem; display: block; margin-bottom: 2px;">Resource Circularity</strong>
                            <span style="color: #64748b; font-size: 0.88rem; line-height: 1.5;">Turn waste into a productive resource while reducing reliance on conventional fuels.</span>
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
                    Waste Management. Fuel Conversion. Energy Recovery.
                </h2>
            </div>

            <!-- 6 Offerings Grid -->
            <div class="offerings-6col-grid reveal-on-scroll">
                <!-- Offer 1 -->
                <div class="epr-ref-service-card">
                    <div class="epr-ref-service-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                        </svg>
                    </div>
                    <h4>Agricultural Waste Management</h4>
                    <p>Collection and processing of suitable crop residues and agricultural by-products for productive energy recovery.</p>
                </div>

                <!-- Offer 2 -->
                <div class="epr-ref-service-card">
                    <div class="epr-ref-service-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                            <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                        </svg>
                    </div>
                    <h4>Industrial Waste Management</h4>
                    <p>Responsible recovery and processing of suitable industrial waste streams for conversion into alternative fuels.</p>
                </div>

                <!-- Offer 3 -->
                <div class="epr-ref-service-card">
                    <div class="epr-ref-service-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
                        </svg>
                    </div>
                    <h4>Biomass Fuel Solutions</h4>
                    <p>High-quality biomass fuels designed for industrial boilers, process heat, and energy-generation applications.</p>
                </div>

                <!-- Offer 4 -->
                <div class="epr-ref-service-card">
                    <div class="epr-ref-service-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"></circle>
                            <path d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M2 12h4M18 12h4M4.93 19.07l2.83-2.83M16.24 7.76l2.83-2.83"></path>
                        </svg>
                    </div>
                    <h4>Waste-to-Energy Solutions</h4>
                    <p>Support for converting suitable waste streams into fuel for waste-to-energy and power generation plants.</p>
                </div>

                <!-- Offer 5 -->
                <div class="epr-ref-service-card">
                    <div class="epr-ref-service-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="23 4 23 10 17 10"></polyline>
                            <polyline points="1 20 1 14 7 14"></polyline>
                            <path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path>
                        </svg>
                    </div>
                    <h4>Fuel Processing &amp; Preparation</h4>
                    <p>Segregation, size reduction, blending, drying, and processing to achieve consistent fuel characteristics.</p>
                </div>

                <!-- Offer 6 -->
                <div class="epr-ref-service-card">
                    <div class="epr-ref-service-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="12 6 12 12 16 14"></polyline>
                        </svg>
                    </div>
                    <h4>Resource Recovery</h4>
                    <p>Recover energy value from waste that may otherwise be disposed of, while supporting more circular industrial operations.</p>
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
                Partners in Industrial Energy &amp; Sustainability
            </h2>
            <p style="font-size: 0.95rem; color: #64748b; max-width: 620px; margin: 0 auto;">
                Industrial facilities, captive power plants, and agricultural aggregators collaborating with {{ setting('site_name', 'Shristiyam') }} for reliable alternative fuel recovery.
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
         5. OUR PROCESS (8 STEPS - BALANCED 2-COLUMN SEQUENCE)
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
                    Waste In. Energy Out.
                </h2>
            </div>

            <!-- Balanced 2-Column Process Flow (4 on Left, 4 on Right) -->
            <div class="ewaste-process-2col reveal-on-scroll">
                <!-- Column 1: Steps 01 to 04 -->
                <div>
                    <!-- Step 01 -->
                    <div class="epr-ref-step-item">
                        <div class="epr-ref-step-num">01</div>
                        <div>
                            <div class="epr-ref-step-title">01 — Waste Assessment</div>
                            <p class="epr-ref-step-desc">Identify suitable agricultural and industrial waste streams based on quantity, quality, and energy potential.</p>
                        </div>
                    </div>

                    <!-- Step 02 -->
                    <div class="epr-ref-step-item">
                        <div class="epr-ref-step-num">02</div>
                        <div>
                            <div class="epr-ref-step-title">02 — Collection</div>
                            <p class="epr-ref-step-desc">Source and collect suitable waste through organised recovery channels.</p>
                        </div>
                    </div>

                    <!-- Step 03 -->
                    <div class="epr-ref-step-item">
                        <div class="epr-ref-step-num">03</div>
                        <div>
                            <div class="epr-ref-step-title">03 — Segregation &amp; Sorting</div>
                            <p class="epr-ref-step-desc">Separate materials and remove unsuitable contaminants to prepare the feedstock.</p>
                        </div>
                    </div>

                    <!-- Step 04 -->
                    <div class="epr-ref-step-item">
                        <div class="epr-ref-step-num">04</div>
                        <div>
                            <div class="epr-ref-step-title">04 — Processing</div>
                            <p class="epr-ref-step-desc">Process, size, dry, and condition the waste according to the required fuel specifications.</p>
                        </div>
                    </div>
                </div>

                <!-- Column 2: Steps 05 to 08 -->
                <div>
                    <!-- Step 05 -->
                    <div class="epr-ref-step-item">
                        <div class="epr-ref-step-num">05</div>
                        <div>
                            <div class="epr-ref-step-title">05 — Fuel Conversion</div>
                            <p class="epr-ref-step-desc">Convert suitable waste into consistent biomass fuel designed for industrial and energy applications.</p>
                        </div>
                    </div>

                    <!-- Step 06 -->
                    <div class="epr-ref-step-item">
                        <div class="epr-ref-step-num">06</div>
                        <div>
                            <div class="epr-ref-step-title">06 — Quality Control</div>
                            <p class="epr-ref-step-desc">Monitor key fuel parameters to support consistent combustion, reliable performance, and efficient energy output.</p>
                        </div>
                    </div>

                    <!-- Step 07 -->
                    <div class="epr-ref-step-item">
                        <div class="epr-ref-step-num">07</div>
                        <div>
                            <div class="epr-ref-step-title">07 — Energy Application</div>
                            <p class="epr-ref-step-desc">Supply fuel for industrial boilers, process steam, waste-to-energy systems, and power-generation applications.</p>
                        </div>
                    </div>

                    <!-- Step 08 -->
                    <div class="epr-ref-step-item">
                        <div class="epr-ref-step-num">08</div>
                        <div>
                            <div class="epr-ref-step-title">08 — Measure &amp; Improve</div>
                            <p class="epr-ref-step-desc">Track fuel performance, waste utilisation, and resource recovery to continuously improve efficiency.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- =========================================================================
         6. MORE THAN WASTE MANAGEMENT (MATCHING SERVICE 1 SECTION 6)
         ========================================================================= -->
    <section class="epr-ref-impact-section" id="more-than-waste">
        <div class="container">
            <div class="reveal-on-scroll" style="text-align: left; max-width: 840px; margin-bottom: 36px;">
                <div style="display: inline-flex; align-items: center; gap: 8px; color: #10b981; font-size: 0.8rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.06em; margin-bottom: 12px;">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                    </svg>
                    <span>MORE THAN WASTE MANAGEMENT</span>
                </div>

                <h2 style="font-size: clamp(2.1rem, 3.6vw, 3rem); font-weight: 800; color: #ffffff; margin-bottom: 14px; line-height: 1.2; letter-spacing: -0.02em;">
                    Turning Waste Into Industrial Energy
                </h2>

                <p style="color: #94a3b8; font-size: 1.05rem; line-height: 1.7; margin: 0;">
                    Shristiyam BioEnergy looks beyond disposal and conventional waste handling. We create pathways that recover the energy value locked within agricultural and industrial waste.
                </p>
            </div>

            <!-- 5 Impact Cards Grid -->
            <div class="impact-5col-grid reveal-on-scroll">
                <!-- Card 1 -->
                <div class="epr-ref-impact-card">
                    <div class="epr-ref-impact-num">01</div>
                    <h4>Alternative Fuel Solutions</h4>
                    <p>Reduce dependence on conventional fuels with responsibly processed biomass fuel alternatives.</p>
                </div>

                <!-- Card 2 -->
                <div class="epr-ref-impact-card">
                    <div class="epr-ref-impact-num">02</div>
                    <h4>Industrial Energy Efficiency</h4>
                    <p>Support reliable combustion and consistent energy output through quality-controlled fuel solutions.</p>
                </div>

                <!-- Card 3 -->
                <div class="epr-ref-impact-card">
                    <div class="epr-ref-impact-num">03</div>
                    <h4>Waste-to-Energy Integration</h4>
                    <p>Enable suitable waste streams to become productive inputs for energy and power-generation systems.</p>
                </div>

                <!-- Card 4 -->
                <div class="epr-ref-impact-card">
                    <div class="epr-ref-impact-num">04</div>
                    <h4>Circular Resource Recovery</h4>
                    <p>Keep valuable energy resources in use by converting waste into fuel rather than treating it as a disposal problem.</p>
                </div>

                <!-- Card 5 -->
                <div class="epr-ref-impact-card">
                    <div class="epr-ref-impact-num">05</div>
                    <h4>Sustainable Industrial Transition</h4>
                    <p>Help industries move towards lower-waste, resource-efficient, and more circular energy systems.</p>
                </div>
            </div>

            <!-- Closing Callout & CTA (Exact User Text) -->
            <div class="reveal-on-scroll" style="margin-top: 50px; background: rgba(255, 255, 255, 0.04); border: 1px solid rgba(52, 211, 153, 0.25); border-radius: 18px; padding: 36px 32px; display: flex; justify-content: space-between; align-items: center; gap: 24px; flex-wrap: wrap;">
                <div style="max-width: 680px;">
                    <div style="font-size: 1.35rem; font-weight: 800; color: #ffffff; margin-bottom: 8px;">
                        From Waste to Fuel. From Fuel to Energy. From Energy to Impact.
                    </div>
                    <p style="color: #cbd5e1; font-size: 0.95rem; line-height: 1.6; margin: 0;">
                        Partner with Shristiyam BioEnergy to transform industrial and agricultural waste into sustainable alternative energy.
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
