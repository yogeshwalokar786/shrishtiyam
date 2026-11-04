@extends('layouts.site')

@section('title', 'Plastic | Plastic Neutral Programme - Turn Your Plastic Footprint into Measurable Impact | ' . setting('site_name', 'SHRISTIYAM'))
@section('meta_description', 'Turn Your Plastic Footprint into Measurable Impact. Every business creates a plastic footprint. Shristiyam helps you take responsibility by measuring your plastic impact, enabling equivalent waste recovery through verified channels, and providing transparent documentation.')

@section('head')
    <link rel="canonical" href="{{ url('/services/plastic-neutral-programme') }}">
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "Service",
      "name": "Plastic | Plastic Neutral Programme",
      "serviceType": "Plastic Footprint Neutrality",
      "provider": {
        "@@type": "Organization",
        "name": "{{ setting('company_legal_name', 'SHRISTIYAM COMPLIANCE SOLUTIONS PRIVATE LIMITED') }}",
        "url": "{{ url('/') }}"
      },
      "description": "Turn Your Plastic Footprint into Measurable Impact. Measure footprint, facilitate verified equivalent waste recovery, and provide transparent documentation.",
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
                <span style="color: #34d399; font-weight: 600;">Plastic | Plastic Neutral Programme</span>
            </div>

            <!-- Quick Static Services Switcher Bar -->
            <div style="display: flex; gap: 8px; flex-wrap: wrap; margin-bottom: 36px; background: rgba(255, 255, 255, 0.06); padding: 8px 12px; border-radius: var(--radius-md); border: 1px solid rgba(255, 255, 255, 0.12); backdrop-filter: blur(8px);">
                <span style="font-size: 0.78rem; font-weight: 700; color: #cbd5e1; display: inline-flex; align-items: center; margin-right: 6px; text-transform: uppercase;">Our Services:</span>
                <a href="/services/plastic-epr-compliance" class="btn btn-outline" style="padding: 6px 14px; font-size: 0.8rem; border-radius: 999px; text-decoration: none; color: #ffffff; border-color: rgba(255,255,255,0.25);">1. Plastic EPR Compliance</a>
                <a href="/services/plastic-neutral-programme" class="btn btn-primary" style="padding: 6px 14px; font-size: 0.8rem; border-radius: 999px; text-decoration: none;">2. Plastic Neutral Programme</a>
                <a href="/services/esg-csr-projects" class="btn btn-outline" style="padding: 6px 14px; font-size: 0.8rem; border-radius: 999px; text-decoration: none; color: #ffffff; border-color: rgba(255,255,255,0.25);">3. ESG &amp; CSR Projects</a>
                <a href="/services/e-waste-battery-management" class="btn btn-outline" style="padding: 6px 14px; font-size: 0.8rem; border-radius: 999px; text-decoration: none; color: #ffffff; border-color: rgba(255,255,255,0.25);">4. E-Waste &amp; Battery</a>
                <a href="/services/industrial-agriculture-waste-management" class="btn btn-outline" style="padding: 6px 14px; font-size: 0.8rem; border-radius: 999px; text-decoration: none; color: #ffffff; border-color: rgba(255,255,255,0.25);">5. Industrial &amp; Agri Waste</a>
            </div>

            <!-- Main Hero Content -->
            <div class="reveal-on-scroll" style="max-width: 960px;">
                <div class="epr-ref-hero-tag">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                        <path d="M9 12l2 2 4-4"></path>
                    </svg>
                    <span>Take Responsibility for Your Plastic Footprint</span>
                </div>

                <h1 class="epr-ref-hero-title">
                    Plastic | Plastic Neutral <span class="gradient-text" style="background: linear-gradient(135deg, #34d399 0%, #10b981 100%); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent;">Programme</span>
                </h1>

                <div style="font-size: clamp(1.2rem, 2vw, 1.45rem); font-weight: 700; color: #34d399; margin-bottom: 18px; letter-spacing: -0.01em;">
                    Turn Your Plastic Footprint into Measurable Impact
                </div>

                <p class="epr-ref-hero-desc">
                    Every business creates a plastic footprint. {{ setting('site_name', 'Shristiyam') }} helps you take responsibility by measuring your plastic impact, enabling equivalent waste recovery through verified channels, and providing transparent documentation to support credible sustainability commitments.
                </p>

                <!-- Action CTA -->
                <div style="display: flex; gap: 14px; flex-wrap: wrap; align-items: center;">
                    <button type="button" class="btn btn-primary" data-open-modal="consultationModal" style="padding: 14px 28px; font-size: 0.98rem; font-weight: 700; box-shadow: 0 4px 20px rgba(5, 150, 105, 0.4);">
                        Book Free Consultation &rarr;
                    </button>
                    <a href="#concept" class="btn btn-outline" style="padding: 14px 24px; font-size: 0.98rem; font-weight: 600; text-decoration: none; color: #ffffff; border-color: rgba(255, 255, 255, 0.3); background: rgba(255, 255, 255, 0.05); backdrop-filter: blur(8px);">
                        The Concept &darr;
                    </a>
                </div>
            </div>
        </div>
    </section>


    <!-- =========================================================================
         2. THE CONCEPT (INCLUDING "HOW IT WORKS" 01-04 - NO EXTRA FILLER)
         ========================================================================= -->
    <section class="epr-ref-approach-section" id="concept">
        <div class="container">
            <div class="reveal-on-scroll" style="max-width: 900px; margin-bottom: 36px;">
                <div class="section-tag" style="margin-bottom: 12px;">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10"></circle>
                        <path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"></path>
                        <path d="M2 12h20"></path>
                    </svg>
                    <span>THE CONCEPT</span>
                </div>

                <h2 style="font-size: clamp(2rem, 3.2vw, 2.7rem); line-height: 1.25; font-weight: 800; color: #0f172a; margin-bottom: 12px; letter-spacing: -0.02em;">
                    What Is Plastic Neutrality?
                </h2>

                <div style="font-size: 1.18rem; font-weight: 700; color: #059669; margin-bottom: 20px; line-height: 1.4;">
                    Balance the plastic you introduce with the plastic you recover.
                </div>

                <p style="font-size: 1.02rem; color: #475569; line-height: 1.78; margin-bottom: 16px;">
                    Plastic neutrality means taking responsibility for the plastic your business puts into the market by recovering an equivalent quantity through verified collection and recycling.
                </p>

                <p style="font-size: 1.02rem; color: #475569; line-height: 1.78; margin: 0;">
                    At {{ setting('site_name', 'Shristiyam') }}, we help businesses measure their plastic footprint, identify reduction opportunities, facilitate verified waste recovery, and provide transparent documentation to support their Plastic Neutral commitment.
                </p>
            </div>

            <!-- HOW IT WORKS (The 4 steps provided under THE CONCEPT) -->
            <div style="padding-top: 32px; border-top: 1px solid rgba(0, 0, 0, 0.08);">
                <div style="font-size: 0.92rem; font-weight: 800; color: #059669; letter-spacing: 0.06em; text-transform: uppercase; margin-bottom: 24px; display: inline-flex; align-items: center; gap: 8px;">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                        <polyline points="9 11 12 14 22 4"></polyline>
                        <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                    </svg>
                    <span>HOW IT WORKS</span>
                </div>

                <div class="pn-4col-grid reveal-on-scroll" style="margin-top: 0;">
                    <!-- Step 01 -->
                    <div class="epr-ref-service-card">
                        <div style="font-size: 1.05rem; font-weight: 800; font-family: var(--font-mono, monospace); color: #047857; margin-bottom: 10px;">
                            01 | MEASURE
                        </div>
                        <p style="font-size: 0.94rem; color: #334155; line-height: 1.6; margin: 0;">
                            Quantify your business’s plastic footprint.
                        </p>
                    </div>

                    <!-- Step 02 -->
                    <div class="epr-ref-service-card">
                        <div style="font-size: 1.05rem; font-weight: 800; font-family: var(--font-mono, monospace); color: #047857; margin-bottom: 10px;">
                            02 | REDUCE
                        </div>
                        <p style="font-size: 0.94rem; color: #334155; line-height: 1.6; margin: 0;">
                            Identify opportunities to reduce plastic across operations and supply chains.
                        </p>
                    </div>

                    <!-- Step 03 -->
                    <div class="epr-ref-service-card">
                        <div style="font-size: 1.05rem; font-weight: 800; font-family: var(--font-mono, monospace); color: #047857; margin-bottom: 10px;">
                            03 | RECOVER
                        </div>
                        <p style="font-size: 0.94rem; color: #334155; line-height: 1.6; margin: 0;">
                            Recover an equivalent quantity through verified collection and recycling.
                        </p>
                    </div>

                    <!-- Step 04 -->
                    <div class="epr-ref-service-card">
                        <div style="font-size: 1.05rem; font-weight: 800; font-family: var(--font-mono, monospace); color: #047857; margin-bottom: 10px;">
                            04 | REPORT
                        </div>
                        <p style="font-size: 0.94rem; color: #334155; line-height: 1.6; margin: 0;">
                            Track recovery and maintain transparent documentation of your impact.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- =========================================================================
         3. THE CASE (EXACT USER CONTENT)
         ========================================================================= -->
    <section class="epr-ref-approach-section" id="the-case" style="background: #f8fafc; border-top: 1px solid rgba(0, 0, 0, 0.06); border-bottom: 1px solid rgba(0, 0, 0, 0.06);">
        <div class="container">
            <div class="section-header reveal-on-scroll" style="text-align: left; max-width: 840px; margin-bottom: 24px;">
                <div class="section-tag" style="margin-bottom: 12px;">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10"></circle>
                        <path d="M16 8l-8 8"></path>
                        <path d="M12 8v8"></path>
                    </svg>
                    <span>THE CASE</span>
                </div>

                <h2 style="font-size: clamp(2.1rem, 3.4vw, 2.9rem); line-height: 1.2; font-weight: 800; color: #0f172a; margin-bottom: 8px; letter-spacing: -0.02em;">
                    Plastic Neutrality Creates Real Value.
                </h2>
                <div style="font-size: 1.25rem; font-weight: 700; color: #047857; margin-bottom: 14px;">
                    For the planet. For your brand.
                </div>
                <p style="font-size: 1.02rem; color: #64748b; line-height: 1.7; margin: 0;">
                    Plastic neutrality helps businesses turn environmental responsibility into measurable impact, stronger brand trust, and credible sustainability action.
                </p>
            </div>

            <!-- 3 Value Cards Grid (Exact User Content) -->
            <div class="pn-3col-grid reveal-on-scroll">
                <!-- Card 1 -->
                <div class="pn-case-card">
                    <div class="pn-case-stat">81%</div>
                    <h3>Consumers Expect Action</h3>
                    <p>Show measurable environmental commitment beyond sustainability claims.</p>
                </div>

                <!-- Card 2 -->
                <div class="pn-case-card">
                    <div style="font-size: 1.6rem; font-weight: 800; color: #047857; line-height: 1.1; margin-bottom: 14px; letter-spacing: -0.02em;">
                        STAND OUT
                    </div>
                    <h3>Build Brand Trust</h3>
                    <p>Take responsibility for your plastic footprint and demonstrate real recovery.</p>
                </div>

                <!-- Card 3 -->
                <div class="pn-case-card">
                    <div style="font-size: 1.6rem; font-weight: 800; color: #047857; line-height: 1.1; margin-bottom: 14px; letter-spacing: -0.02em;">
                        INVESTOR READY
                    </div>
                    <h3>Strengthen ESG Credentials</h3>
                    <p>Transparent, measurable impact supports stronger ESG performance and long-term growth.</p>
                </div>
            </div>
        </div>
    </section>


    <!-- =========================================================================
         4. PARTNERS IN COMPLIANCE & RECOVERY (INFINITE AUTO-SCROLLING MARQUEE SLIDER)
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
                Leading brands and enterprises that rely on our verified plastic waste collection and recovery network across India.
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

                <!-- Duplicate (Set 2 for Continuous 100% Seamless Infinite Loop) -->
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
         5. OUR CREDENTIALS: WHY CHOOSE SHRISTIYAM? (DEEP FOREST GREEN MATCHING SERVICE 1)
         ========================================================================= -->
    <section class="epr-ref-process-section" id="credentials">
        <div class="container">
            <div class="reveal-on-scroll" style="max-width: 820px; margin-bottom: 40px;">
                <div style="display: inline-flex; align-items: center; gap: 8px; color: #34d399; font-size: 0.8rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.06em; margin-bottom: 12px;">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                        <polyline points="9 12 11 14 15 10"></polyline>
                    </svg>
                    <span>OUR CREDENTIALS</span>
                </div>

                <h2 style="font-size: clamp(2.1rem, 3.6vw, 3rem); font-weight: 800; color: #ffffff; margin-bottom: 12px; line-height: 1.2; letter-spacing: -0.02em;">
                    Why Choose Shristiyam?
                </h2>
            </div>

            <div class="pn-4col-grid reveal-on-scroll" style="margin-top: 0;">
                <!-- 01 -->
                <div style="background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(52, 211, 153, 0.2); border-radius: 16px; padding: 28px 24px; transition: transform 0.25s ease;">
                    <div class="epr-ref-step-num" style="margin-bottom: 16px;">01</div>
                    <h4 style="font-size: 1.15rem; font-weight: 700; color: #ffffff; margin-bottom: 10px;">Proven Expertise</h4>
                    <p style="font-size: 0.92rem; color: #cbd5e1; line-height: 1.65; margin: 0;">End-to-end plastic waste management backed by experience, a verified recovery network, and strong compliance capabilities.</p>
                </div>

                <!-- 02 -->
                <div style="background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(52, 211, 153, 0.2); border-radius: 16px; padding: 28px 24px; transition: transform 0.25s ease;">
                    <div class="epr-ref-step-num" style="margin-bottom: 16px;">02</div>
                    <h4 style="font-size: 1.15rem; font-weight: 700; color: #ffffff; margin-bottom: 10px;">Measurable Impact</h4>
                    <p style="font-size: 0.92rem; color: #cbd5e1; line-height: 1.65; margin: 0;">Every recovery is tracked and documented to ensure transparent, credible, and measurable outcomes.</p>
                </div>

                <!-- 03 -->
                <div style="background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(52, 211, 153, 0.2); border-radius: 16px; padding: 28px 24px; transition: transform 0.25s ease;">
                    <div class="epr-ref-step-num" style="margin-bottom: 16px;">03</div>
                    <h4 style="font-size: 1.15rem; font-weight: 700; color: #ffffff; margin-bottom: 10px;">Trusted Partnerships</h4>
                    <p style="font-size: 0.92rem; color: #cbd5e1; line-height: 1.65; margin: 0;">Strong partnerships across the waste management and recycling ecosystem enable reliable recovery and responsible processing.</p>
                </div>

                <!-- 04 -->
                <div style="background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(52, 211, 153, 0.2); border-radius: 16px; padding: 28px 24px; transition: transform 0.25s ease;">
                    <div class="epr-ref-step-num" style="margin-bottom: 16px;">04</div>
                    <h4 style="font-size: 1.15rem; font-weight: 700; color: #ffffff; margin-bottom: 10px;">Traceable Recovery</h4>
                    <p style="font-size: 0.92rem; color: #cbd5e1; line-height: 1.65; margin: 0;">From collection to processing, we maintain clear documentation and traceability for credible reporting and audits.</p>
                </div>
            </div>
        </div>
    </section>


    <!-- =========================================================================
         6. WHAT’S NEXT: MAKE YOUR PLASTIC IMPACT VISIBLE (MATCHING SERVICE 1 SECTION 6)
         ========================================================================= -->
    <section class="epr-ref-impact-section" id="whats-next">
        <div class="container">
            <div class="reveal-on-scroll" style="text-align: left; max-width: 820px; margin-bottom: 36px;">
                <div style="display: inline-flex; align-items: center; gap: 8px; color: #10b981; font-size: 0.8rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.06em; margin-bottom: 12px;">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                        <path d="M5 12h14"></path>
                        <path d="M12 5l7 7-7 7"></path>
                    </svg>
                    <span>WHAT’S NEXT</span>
                </div>

                <h2 style="font-size: clamp(2.1rem, 3.6vw, 3rem); font-weight: 800; color: #ffffff; margin-bottom: 14px; line-height: 1.2; letter-spacing: -0.02em;">
                    Make Your Plastic Impact Visible.
                </h2>

                <p style="color: #94a3b8; font-size: 1.02rem; line-height: 1.7; margin: 0;">
                    Going Plastic Neutral is more than a commitment—it’s an opportunity to showcase measurable action and build trust with your stakeholders.
                </p>
            </div>

            <!-- 3 Impact Cards (Exact User Content) -->
            <div class="pn-3col-grid reveal-on-scroll">
                <!-- 01 -->
                <div class="epr-ref-impact-card">
                    <div class="epr-ref-impact-num">01</div>
                    <h4>01 | SHOW YOUR COMMITMENT</h4>
                    <p>Use the Plastic Neutral mark across relevant brand and communication touchpoints.</p>
                </div>

                <!-- 02 -->
                <div class="epr-ref-impact-card">
                    <div class="epr-ref-impact-num">02</div>
                    <h4>02 | GET CERTIFIED</h4>
                    <p>Receive certification that validates your Plastic Neutral commitment and documented impact.</p>
                </div>

                <!-- 03 -->
                <div class="epr-ref-impact-card">
                    <div class="epr-ref-impact-num">03</div>
                    <h4>03 | TELL YOUR IMPACT STORY</h4>
                    <p>Communicate your recovery efforts and sustainability impact to customers, partners, and stakeholders.</p>
                </div>
            </div>

            <!-- Closing Statement & CTA -->
            <div class="reveal-on-scroll" style="margin-top: 48px; text-align: center; padding: 36px 24px; background: rgba(255, 255, 255, 0.03); border: 1px solid rgba(52, 211, 153, 0.2); border-radius: 16px;">
                <div style="font-size: 1.25rem; font-weight: 700; color: #34d399; margin-bottom: 20px;">
                    Make your impact visible. Build trust through action.
                </div>
                <button type="button" class="btn btn-primary" data-open-modal="consultationModal" style="padding: 14px 32px; font-weight: 700; font-size: 1rem; box-shadow: 0 4px 20px rgba(5, 150, 105, 0.4);">
                    Book Free Consultation &rarr;
                </button>
            </div>
        </div>
    </section>

@endsection
