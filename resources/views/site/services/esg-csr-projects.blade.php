@extends('layouts.site')

@section('title', 'ESG & CSR Projects - Creating Measurable Impact Where It Matters | ' . setting('site_name', 'SHRISTIYAM'))
@section('meta_description', 'Creating Measurable Impact Where It Matters. At Shristiyam, we design and deliver tailored CSR and waste management initiatives aligned with your brand’s sustainability goals.')

@section('head')
    <link rel="canonical" href="{{ url('/services/esg-csr-projects') }}">
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "Service",
      "name": "ESG & CSR Projects",
      "serviceType": "Corporate CSR & Frontline Waste Worker Welfare",
      "provider": {
        "@@type": "Organization",
        "name": "{{ setting('company_legal_name', 'SHRISTIYAM COMPLIANCE SOLUTIONS PRIVATE LIMITED') }}",
        "url": "{{ url('/') }}"
      },
      "description": "Creating Measurable Impact Where It Matters. Customized CSR and waste management initiatives transforming low-value plastic waste and pioneering circularity.",
      "areaServed": "India"
    }
    </script>
@endsection

@section('content')

    <!-- =========================================================================
         1. HERO HEADER (EXACT USER CONTENT & MATCHING SERVICE 1 STYLE)
         ========================================================================= -->
    <section class="epr-ref-hero">
        <div class="container">
            <!-- Breadcrumb Navigation -->
            <div style="display: flex; align-items: center; gap: 8px; font-size: 0.84rem; color: #94a3b8; margin-bottom: 24px; flex-wrap: wrap;">
                <a href="/" style="color: #94a3b8; text-decoration: none;" onmouseover="this.style.color='#ffffff'" onmouseout="this.style.color='#94a3b8'">Home</a>
                <span>/</span>
                <a href="/solutions" style="color: #94a3b8; text-decoration: none;" onmouseover="this.style.color='#ffffff'" onmouseout="this.style.color='#94a3b8'">Services &amp; Solutions</a>
                <span>/</span>
                <span style="color: #34d399; font-weight: 600;">ESG &amp; CSR Projects</span>
            </div>

            <!-- Quick Static Services Switcher Bar -->
            <div style="display: flex; gap: 8px; flex-wrap: wrap; margin-bottom: 36px; background: rgba(255, 255, 255, 0.06); padding: 8px 12px; border-radius: var(--radius-md); border: 1px solid rgba(255, 255, 255, 0.12); backdrop-filter: blur(8px);">
                <span style="font-size: 0.78rem; font-weight: 700; color: #cbd5e1; display: inline-flex; align-items: center; margin-right: 6px; text-transform: uppercase;">Our Services:</span>
                <a href="/services/plastic-epr-compliance" class="btn btn-outline" style="padding: 6px 14px; font-size: 0.8rem; border-radius: 999px; text-decoration: none; color: #ffffff; border-color: rgba(255,255,255,0.25);">1. Plastic EPR Compliance</a>
                <a href="/services/plastic-neutral-programme" class="btn btn-outline" style="padding: 6px 14px; font-size: 0.8rem; border-radius: 999px; text-decoration: none; color: #ffffff; border-color: rgba(255,255,255,0.25);">2. Plastic Neutral Programme</a>
                <a href="/services/esg-csr-projects" class="btn btn-primary" style="padding: 6px 14px; font-size: 0.8rem; border-radius: 999px; text-decoration: none;">3. ESG &amp; CSR Projects</a>
                <a href="/services/e-waste-battery-management" class="btn btn-outline" style="padding: 6px 14px; font-size: 0.8rem; border-radius: 999px; text-decoration: none; color: #ffffff; border-color: rgba(255,255,255,0.25);">4. E-Waste &amp; Battery</a>
                <a href="/services/industrial-agriculture-waste-management" class="btn btn-outline" style="padding: 6px 14px; font-size: 0.8rem; border-radius: 999px; text-decoration: none; color: #ffffff; border-color: rgba(255,255,255,0.25);">5. Industrial &amp; Agri Waste</a>
            </div>

            <!-- Main Hero Content -->
            <div class="reveal-on-scroll" style="max-width: 960px;">
                <div class="epr-ref-hero-tag">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                    </svg>
                    <span>ESG PROJECTS</span>
                </div>

                <h1 class="epr-ref-hero-title">
                    ESG &amp; CSR <span class="gradient-text" style="background: linear-gradient(135deg, #34d399 0%, #10b981 100%); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent;">Projects</span>
                </h1>

                <div style="font-size: clamp(1.2rem, 2vw, 1.45rem); font-weight: 700; color: #34d399; margin-bottom: 18px; letter-spacing: -0.01em;">
                    Creating Measurable Impact Where It Matters
                </div>

                <div style="background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(52, 211, 153, 0.25); border-radius: 14px; padding: 22px 24px; margin-bottom: 28px; max-width: 820px;">
                    <div style="font-size: 1.15rem; font-weight: 700; color: #ffffff; margin-bottom: 10px;">
                        Customized Impact Solutions for Your Brand
                    </div>
                    <p style="font-size: 1.02rem; color: #d1fae5; line-height: 1.75; margin-bottom: 12px;">
                        At {{ setting('site_name', 'Shristiyam') }}, we design and deliver tailored CSR and waste management initiatives aligned with your brand’s sustainability goals. From waste recovery to community-focused programmes, we turn commitments into measurable, transparent impact.
                    </p>
                    <p style="font-size: 0.98rem; font-weight: 600; color: #34d399; margin: 0;">
                        Partner with {{ setting('site_name', 'Shristiyam') }} to create CSR initiatives that deliver real, lasting change.
                    </p>
                </div>

                <!-- Action CTA -->
                <div style="display: flex; gap: 14px; flex-wrap: wrap; align-items: center;">
                    <button type="button" class="btn btn-primary" data-open-modal="consultationModal" style="padding: 14px 28px; font-size: 0.98rem; font-weight: 700; box-shadow: 0 4px 20px rgba(5, 150, 105, 0.4);">
                        Book Free Consultation &rarr;
                    </button>
                    <a href="#transforming-plastic" class="btn btn-outline" style="padding: 14px 24px; font-size: 0.98rem; font-weight: 600; text-decoration: none; color: #ffffff; border-color: rgba(255, 255, 255, 0.3); background: rgba(255, 255, 255, 0.05); backdrop-filter: blur(8px);">
                        Explore Impact &darr;
                    </a>
                </div>
            </div>
        </div>
    </section>


    <!-- =========================================================================
         2. TRANSFORMING LOW-VALUE PLASTIC WASTE (5 METRICS - EXACT USER CONTENT)
         ========================================================================= -->
    <section class="epr-ref-approach-section" id="transforming-plastic">
        <div class="container">
            <div class="reveal-on-scroll" style="max-width: 900px; margin-bottom: 32px;">
                <div class="section-tag" style="margin-bottom: 12px;">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="23 4 23 10 17 10"></polyline>
                        <polyline points="1 20 1 14 7 14"></polyline>
                        <path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path>
                    </svg>
                    <span>TRANSFORMING LOW-VALUE PLASTIC WASTE</span>
                </div>

                <h2 style="font-size: clamp(2rem, 3.2vw, 2.7rem); line-height: 1.25; font-weight: 800; color: #0f172a; margin-bottom: 14px; letter-spacing: -0.02em;">
                    Turning Hard-to-Recover Plastic into Resources
                </h2>

                <p style="font-size: 1.05rem; color: #475569; line-height: 1.8; margin: 0;">
                    {{ setting('site_name', 'Shristiyam') }} works to recover and responsibly manage low-value plastics that are often overlooked or sent to landfills. Through collection, recycling, co-processing, and community engagement, we help keep difficult-to-recover plastics in the circular economy.
                </p>
            </div>

            <!-- 5 Exact Metrics Grid -->
            <div class="esg-metrics-grid reveal-on-scroll">
                <!-- Metric 1 -->
                <div class="esg-metric-card">
                    <div class="esg-metric-val">3,609 <span style="font-size: 1rem; color: #059669;">TONS</span></div>
                    <p class="esg-metric-lbl">Low-value plastic waste diverted from landfills</p>
                </div>

                <!-- Metric 2 -->
                <div class="esg-metric-card">
                    <div class="esg-metric-val">2,838 <span style="font-size: 1rem; color: #059669;">TONS</span></div>
                    <p class="esg-metric-lbl">Sent for responsible co-processing</p>
                </div>

                <!-- Metric 3 -->
                <div class="esg-metric-card">
                    <div class="esg-metric-val">728.57 <span style="font-size: 1rem; color: #059669;">TONS</span></div>
                    <p class="esg-metric-lbl">Recovered through recycling</p>
                </div>

                <!-- Metric 4 -->
                <div class="esg-metric-card">
                    <div class="esg-metric-val">518</div>
                    <p class="esg-metric-lbl"><strong>SAFAI SAATHIS</strong> integrated into formal waste-management systems</p>
                </div>

                <!-- Metric 5 -->
                <div class="esg-metric-card">
                    <div class="esg-metric-val">45</div>
                    <p class="esg-metric-lbl"><strong>IEC ACTIVITIES</strong> conducted across sanitation, healthcare, and plastic waste management</p>
                </div>
            </div>

            <!-- Concluding Tagline -->
            <div class="reveal-on-scroll" style="margin-top: 36px; padding: 20px 24px; background: rgba(5, 150, 105, 0.06); border: 1px solid rgba(5, 150, 105, 0.18); border-radius: 12px; text-align: center;">
                <span style="font-size: 1.12rem; font-weight: 800; color: #047857; letter-spacing: 0.02em;">
                    Driving Circularity. Empowering Communities. Creating Measurable Impact.
                </span>
            </div>
        </div>
    </section>


    <!-- =========================================================================
         3. PIONEERING CIRCULARITY IN WASTE RECYCLING (PHASE 1, 2, TOTAL - EXACT CONTENT)
         ========================================================================= -->
    <section class="epr-ref-process-section" id="circularity">
        <div class="container">
            <div class="reveal-on-scroll" style="max-width: 860px; margin-bottom: 32px;">
                <div style="display: inline-flex; align-items: center; gap: 8px; color: #34d399; font-size: 0.8rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.06em; margin-bottom: 12px;">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                        <polyline points="23 4 23 10 17 10"></polyline>
                        <polyline points="1 20 1 14 7 14"></polyline>
                        <path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path>
                    </svg>
                    <span>PIONEERING CIRCULARITY IN WASTE RECYCLING</span>
                </div>

                <h2 style="font-size: clamp(2.1rem, 3.6vw, 3rem); font-weight: 800; color: #ffffff; margin-bottom: 12px; line-height: 1.2; letter-spacing: -0.02em;">
                    Giving Waste a New Purpose
                </h2>

                <p style="color: #cbd5e1; font-size: 1.02rem; line-height: 1.75; margin: 0;">
                    At {{ setting('site_name', 'Shristiyam') }}, we recover and responsibly process plastic and industrial waste through structured collection, recycling, and co-processing—diverting waste from landfills and creating value from materials that would otherwise be discarded.
                </p>
            </div>

            <!-- Phases Grid -->
            <div class="esg-phase-grid reveal-on-scroll">
                <!-- PHASE 1 -->
                <div class="esg-phase-card">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px; border-bottom: 1px solid rgba(255, 255, 255, 0.1); padding-bottom: 12px;">
                        <span style="font-size: 1.25rem; font-weight: 800; color: #34d399; font-family: var(--font-mono, monospace);">PHASE 1</span>
                        <span style="font-size: 0.82rem; color: #cbd5e1; background: rgba(255, 255, 255, 0.08); padding: 4px 10px; border-radius: 6px;">August 2025 – October 2026</span>
                    </div>

                    <div style="margin-bottom: 18px;">
                        <div style="font-size: 2.1rem; font-weight: 800; color: #ffffff; font-family: var(--font-mono, monospace);">1,080 <span style="font-size: 1.05rem; color: #a7f3d0;">TONS</span></div>
                        <p style="font-size: 0.92rem; color: #cbd5e1; line-height: 1.6; margin: 4px 0 0 0;">Industrial waste recovered across Ghaziabad and Uttar Pradesh.</p>
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 14px; padding-top: 14px; border-top: 1px solid rgba(255, 255, 255, 0.08);">
                        <div style="background: rgba(5, 150, 105, 0.15); padding: 12px 14px; border-radius: 10px; border: 1px solid rgba(52, 211, 153, 0.3);">
                            <div style="font-size: 1.15rem; font-weight: 800; color: #34d399; font-family: var(--font-mono, monospace);">630.88 TONS</div>
                            <div style="font-size: 0.76rem; font-weight: 700; color: #a7f3d0; margin-bottom: 4px;">48.46% OF TOTAL</div>
                            <div style="font-size: 0.8rem; color: #e2e8f0; line-height: 1.4;">Recycled and converted into usable raw materials.</div>
                        </div>

                        <div style="background: rgba(255, 255, 255, 0.04); padding: 12px 14px; border-radius: 10px; border: 1px solid rgba(255, 255, 255, 0.1);">
                            <div style="font-size: 1.15rem; font-weight: 800; color: #ffffff; font-family: var(--font-mono, monospace);">670.1 TONS</div>
                            <div style="font-size: 0.76rem; font-weight: 700; color: #cbd5e1; margin-bottom: 4px;">51.54% OF TOTAL</div>
                            <div style="font-size: 0.8rem; color: #cbd5e1; line-height: 1.4;">Co-processed as alternative fuel.</div>
                        </div>
                    </div>
                </div>

                <!-- PHASE 2 -->
                <div class="esg-phase-card">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px; border-bottom: 1px solid rgba(255, 255, 255, 0.1); padding-bottom: 12px;">
                        <span style="font-size: 1.25rem; font-weight: 800; color: #34d399; font-family: var(--font-mono, monospace);">PHASE 2</span>
                        <span style="font-size: 0.82rem; color: #cbd5e1; background: rgba(255, 255, 255, 0.08); padding: 4px 10px; border-radius: 6px;">June 2025 – September 2026</span>
                    </div>

                    <div style="margin-bottom: 18px;">
                        <div style="font-size: 2.1rem; font-weight: 800; color: #ffffff; font-family: var(--font-mono, monospace);">1,000 <span style="font-size: 1.05rem; color: #a7f3d0;">TONS</span></div>
                        <p style="font-size: 0.92rem; color: #cbd5e1; line-height: 1.6; margin: 4px 0 0 0;">Plastic and industrial waste recovered across Maharashtra, Gujarat, and Tamil Nadu.</p>
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 14px; padding-top: 14px; border-top: 1px solid rgba(255, 255, 255, 0.08);">
                        <div style="background: rgba(5, 150, 105, 0.15); padding: 12px 14px; border-radius: 10px; border: 1px solid rgba(52, 211, 153, 0.3);">
                            <div style="font-size: 1.15rem; font-weight: 800; color: #34d399; font-family: var(--font-mono, monospace);">500 TONS</div>
                            <div style="font-size: 0.8rem; color: #e2e8f0; line-height: 1.4; margin-top: 4px;">Recycled into usable raw materials.</div>
                        </div>

                        <div style="background: rgba(255, 255, 255, 0.04); padding: 12px 14px; border-radius: 10px; border: 1px solid rgba(255, 255, 255, 0.1);">
                            <div style="font-size: 1.15rem; font-weight: 800; color: #ffffff; font-family: var(--font-mono, monospace);">500 TONS</div>
                            <div style="font-size: 0.8rem; color: #cbd5e1; line-height: 1.4; margin-top: 4px;">Co-processed as alternative fuel.</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TOTAL IMPACT & TRACEABLE. MEASURABLE. SCALABLE. -->
            <div class="reveal-on-scroll" style="margin-top: 32px; background: rgba(0, 0, 0, 0.35); border: 1px solid rgba(52, 211, 153, 0.3); border-radius: 18px; padding: 32px; display: grid; grid-template-columns: 1fr 1.6fr; gap: 32px; align-items: center;">
                <div>
                    <div style="font-size: 0.84rem; font-weight: 800; color: #34d399; letter-spacing: 0.05em; text-transform: uppercase; margin-bottom: 6px;">TOTAL IMPACT</div>
                    <div style="font-size: clamp(2.2rem, 3.8vw, 3rem); font-weight: 800; color: #ffffff; font-family: var(--font-mono, monospace); line-height: 1;">
                        2,080 <span style="font-size: 1.2rem; color: #a7f3d0;">TONS</span>
                    </div>
                    <p style="font-size: 0.95rem; color: #cbd5e1; margin: 8px 0 0 0;">of plastic and industrial waste recovered across both phases.</p>
                </div>

                <div style="border-left: 1px solid rgba(255, 255, 255, 0.12); padding-left: 32px;">
                    <div style="font-size: 1.15rem; font-weight: 800; color: #34d399; letter-spacing: 0.04em; margin-bottom: 8px;">
                        TRACEABLE. MEASURABLE. SCALABLE.
                    </div>
                    <p style="font-size: 0.96rem; color: #cbd5e1; line-height: 1.7; margin: 0;">
                        Every stage is supported by structured documentation and traceability, enabling transparent recovery, responsible processing, and measurable circular impact.
                    </p>
                </div>
            </div>
        </div>
    </section>


    <!-- =========================================================================
         4. IMPACT IN ACTION: GLIMPSES FROM OUR PROJECTS (EXACT USER CONTENT)
         ========================================================================= -->
    <section class="epr-ref-impact-section" id="impact-in-action">
        <div class="container">
            <div class="reveal-on-scroll" style="text-align: left; max-width: 820px; margin-bottom: 36px;">
                <div style="display: inline-flex; align-items: center; gap: 8px; color: #10b981; font-size: 0.8rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.06em; margin-bottom: 12px;">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                        <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                    </svg>
                    <span>IMPACT IN ACTION &bull; GLIMPSES FROM OUR PROJECTS</span>
                </div>

                <h2 style="font-size: clamp(2.1rem, 3.6vw, 3rem); font-weight: 800; color: #ffffff; margin-bottom: 14px; line-height: 1.2; letter-spacing: -0.02em;">
                    Impact in Action
                </h2>

                <p style="color: #cbd5e1; font-size: 1.08rem; line-height: 1.7; margin: 0;">
                    A look at {{ setting('site_name', 'Shristiyam') }}’s work across waste recovery, recycling, and circularity.
                </p>
            </div>

            <!-- Authentic Project Glimpses Gallery -->
            <div class="esg-gallery-grid reveal-on-scroll">
                <!-- Glimpse 1 -->
                <div class="esg-gallery-card">
                    <img src="/assets/images/service-csr-welfare.jpg" alt="Safai Saathis Formalization & Healthcare" class="esg-gallery-img" style="height: 220px;">
                    <div class="esg-gallery-body" style="padding: 16px 20px; background: #ffffff;">
                        <h4 style="font-size: 1rem; font-weight: 700; color: #0f172a; margin: 0;">Safai Saathis Welfare &amp; Healthcare</h4>
                    </div>
                </div>

                <!-- Glimpse 2 -->
                <div class="esg-gallery-card">
                    <img src="/assets/images/facility-mrf-sorting.jpg" alt="Waste Recovery & Segregation" class="esg-gallery-img" style="height: 220px;">
                    <div class="esg-gallery-body" style="padding: 16px 20px; background: #ffffff;">
                        <h4 style="font-size: 1rem; font-weight: 700; color: #0f172a; margin: 0;">Low-Value Plastic Recovery</h4>
                    </div>
                </div>

                <!-- Glimpse 3 -->
                <div class="esg-gallery-card">
                    <img src="/assets/images/extrusion-pelletizing-line.jpg" alt="Mechanical Recycling & Raw Materials" class="esg-gallery-img" style="height: 220px;">
                    <div class="esg-gallery-body" style="padding: 16px 20px; background: #ffffff;">
                        <h4 style="font-size: 1rem; font-weight: 700; color: #0f172a; margin: 0;">Recycling &amp; Circular Raw Materials</h4>
                    </div>
                </div>

                <!-- Glimpse 4 -->
                <div class="esg-gallery-card">
                    <img src="/assets/images/service-rdf-fuel.jpg" alt="Alternative Fuel Co-Processing" class="esg-gallery-img" style="height: 220px;">
                    <div class="esg-gallery-body" style="padding: 16px 20px; background: #ffffff;">
                        <h4 style="font-size: 1rem; font-weight: 700; color: #0f172a; margin: 0;">Kiln Co-Processing Alternative Fuel</h4>
                    </div>
                </div>
            </div>

            <!-- Closing CTA Callout (Exact User Text) -->
            <div class="reveal-on-scroll" style="margin-top: 50px; background: rgba(255, 255, 255, 0.04); border: 1px solid rgba(52, 211, 153, 0.25); border-radius: 18px; padding: 36px 32px; display: flex; justify-content: space-between; align-items: center; gap: 24px; flex-wrap: wrap;">
                <div style="max-width: 680px;">
                    <div style="font-size: 1.35rem; font-weight: 800; color: #ffffff; margin-bottom: 8px;">
                        Partner with {{ setting('site_name', 'Shristiyam') }} to create CSR initiatives that deliver real, lasting change.
                    </div>
                    <p style="color: #cbd5e1; font-size: 0.95rem; line-height: 1.6; margin: 0;">
                        Customized CSR and waste management initiatives aligned with your brand’s sustainability goals.
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


    <!-- =========================================================================
         5. PARTNERS IN COMPLIANCE (INFINITE AUTO-SCROLLING MARQUEE SLIDER)
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
                Partners in Impact &amp; Sustainability
            </h2>
            <p style="font-size: 0.95rem; color: #64748b; max-width: 620px; margin: 0 auto;">
                Leading brands collaborating with {{ setting('site_name', 'Shristiyam') }} for community-driven waste recovery and circular impact initiatives.
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

@endsection
