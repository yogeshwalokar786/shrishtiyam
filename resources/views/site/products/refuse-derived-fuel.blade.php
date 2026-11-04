@extends('layouts.site')

@section('title', 'Refuse Derived Fuel (RDF-KILN-05) | Alternative Fuel Product | ' . setting('site_name', 'SHRISTIYAM'))
@section('meta_description', 'High-calorific alternative fuel manufactured from segregated non-recyclable combustible plastic fractions and packaging laminates for cement kilns and industrial captive boilers.')

@section('head')
  <link rel="canonical" href="{{ url('/products/refuse-derived-fuel') }}">
  <script type="application/ld+json">
  {
    "@@context": "https://schema.org",
    "@@type": "Product",
    "name": "Refuse Derived Fuel (RDF Fluff / Briquettes)",
    "image": "{{ asset('/assets/images/service-rdf-fuel.jpg') }}",
    "description": "High-calorific alternative fuel manufactured from non-recyclable segregated combustible fractions, engineered for kiln co-processing.",
    "brand": {
      "@@type": "Brand",
      "name": "{{ setting('site_name', 'SHRISTIYAM') }}"
    },
    "sku": "RDF-KILN-05"
  }
  </script>
@endsection

@section('content')
  <!-- SVG Definition for Hero Organic Curved Cut -->
  <svg width="0" height="0" style="position: absolute; pointer-events: none;">
    <defs>
      <clipPath id="heroCurveCut" clipPathUnits="objectBoundingBox">
        <path d="M 0,0 L 0.90,0 C 0.98,0.18 1.02,0.38 0.94,0.60 C 0.88,0.78 0.82,0.90 0.74,1.0 L 0,1.0 Z" />
      </clipPath>
    </defs>
  </svg>

  <div class="rdf-page-wrap">
    <div class="container">

      <!-- Breadcrumbs -->
      <div style="display: flex; align-items: center; gap: 8px; font-size: 0.84rem; color: var(--text-muted); margin-bottom: 18px;">
        <a href="/">Home</a> <span>/</span> <a href="/products">Products</a> <span>/</span> <span style="color: var(--accent-emerald); font-weight: 600;">Refuse Derived Fuel</span>
      </div>

      <!-- Quick Static Product Switcher Bar -->
      <div style="display: flex; gap: 8px; flex-wrap: wrap; margin-bottom: 36px; background: rgba(5, 150, 105, 0.04); padding: 8px 12px; border-radius: var(--radius-md); border: 1px solid rgba(5, 150, 105, 0.12);">
        <span style="font-size: 0.78rem; font-weight: 700; color: var(--text-muted); display: inline-flex; align-items: center; margin-right: 6px; text-transform: uppercase;">All Products (4):</span>
        <a href="/products/bio-energy-fuel" class="btn btn-outline" style="padding: 6px 14px; font-size: 0.8rem; border-radius: 999px; text-decoration: none;">1. Bio Energy Fuel</a>
        <a href="/products/refuse-derived-fuel" class="btn btn-primary" style="padding: 6px 14px; font-size: 0.8rem; border-radius: 999px; text-decoration: none;">2. Refuse Derived Fuel (RDF)</a>
        <a href="/products/rhdpe-blow-resin" class="btn btn-outline" style="padding: 6px 14px; font-size: 0.8rem; border-radius: 999px; text-decoration: none;">3. rHDPE Blow Resin</a>
        <a href="/products/rpp-injection-copolymer" class="btn btn-outline" style="padding: 6px 14px; font-size: 0.8rem; border-radius: 999px; text-decoration: none;">4. rPP Copolymer</a>
      </div>

      <!-- ================================================================== -->
      <!-- SECTION 1: HERO SHOWCASE (CURVED CUT + 2x2 SPECS + ACTIONS)        -->
      <!-- ================================================================== -->
      <div class="rdf-hero-grid">
        <!-- Left: Image with organic curved cut & floating badge -->
        <div class="rdf-hero-img-wrap">
          <div class="rdf-hero-img-box">
            <img src="/assets/images/service-rdf-fuel.jpg" alt="Refuse Derived Fuel Facility">
          </div>
          <div class="rdf-hero-floating-card">
            <div class="rdf-hero-floating-icon">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M7 19H4.815a1.83 1.83 0 0 1-1.57-.881 1.785 1.785 0 0 1-.004-1.784L7.196 9.5"></path><path d="M11 19h8.203a1.83 1.83 0 0 0 1.556-.89 1.784 1.784 0 0 0 0-1.775l-1.226-2.12"></path><path d="m14 16-3 3 3 3"></path><path d="M8.293 13.596 4 6.5 12 2l4 6.5"></path><path d="m15.5 8.5 3-3-3-3"></path></svg>
            </div>
            <div>
              <div class="rdf-hero-floating-title">Sustainable Fuel.</div>
              <div class="rdf-hero-floating-title">Cleaner Future.</div>
              <div class="rdf-hero-floating-tag">Recover. Convert. Fuel Industry.</div>
            </div>
          </div>
        </div>

        <!-- Right: Grade Badges, Title, Desc, 2x2 Specs & Action Buttons -->
        <div class="rdf-hero-content">
          <div class="rdf-badge-row">
            <span class="rdf-grade-badge">GRADE: RDF-KILN-05</span>
            <span class="rdf-cat-badge">Kiln Co-Processing Fuel</span>
          </div>

          <h1 class="rdf-hero-title">
            Refuse Derived Fuel<br>
            <span>(RDF Fluff / Briquettes)</span>
          </h1>

          <p class="rdf-hero-desc">
            High-calorific alternative fuel manufactured from segregated non-recyclable combustible plastic fractions and packaging laminates. Engineered to substitute fossil coal in cement kilns and industrial captive boilers.
          </p>

          <!-- 2x2 Technical Parameter Grid -->
          <div class="rdf-specs-grid">
            <div class="rdf-spec-card">
              <div class="rdf-spec-icon">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
              </div>
              <div class="rdf-spec-info">
                <span class="rdf-spec-lbl">Calorific Value</span>
                <span class="rdf-spec-val">&gt; 3,800 kcal/kg</span>
              </div>
            </div>

            <div class="rdf-spec-card">
              <div class="rdf-spec-icon">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"></path></svg>
              </div>
              <div class="rdf-spec-info">
                <span class="rdf-spec-lbl">Moisture Content</span>
                <span class="rdf-spec-val">&lt; 12% Max</span>
              </div>
            </div>

            <div class="rdf-spec-card">
              <div class="rdf-spec-icon">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
              </div>
              <div class="rdf-spec-info">
                <span class="rdf-spec-lbl">Chlorine Level</span>
                <span class="rdf-spec-val">&lt; 0.5% (Refractory Safe)</span>
              </div>
            </div>

            <div class="rdf-spec-card">
              <div class="rdf-spec-icon">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="3" y1="15" x2="21" y2="15"></line><line x1="9" y1="3" x2="9" y2="21"></line><line x1="15" y1="3" x2="15" y2="21"></line></svg>
              </div>
              <div class="rdf-spec-info">
                <span class="rdf-spec-lbl">Dispatched Form</span>
                <span class="rdf-spec-val">&lt; 30mm Fluff / Briquette</span>
              </div>
            </div>
          </div>

          <!-- Buttons -->
          <div class="rdf-actions-row">
            <button class="btn-rdf-primary" data-open-modal="consultationModal" data-product="RDF Bulk Supply Contract">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
              Request Bulk Supply Contract
            </button>
            <a href="#tds-table" class="btn-rdf-outline">
              View Full Specifications ↓
            </a>
          </div>
        </div>
      </div>

      <!-- ================================================================== -->
      <!-- SECTION 2: ABOUT RDF (DARK GREEN CURVED CONTAINER + 2x2 MRF CARDS) -->
      <!-- ================================================================== -->
      <div class="rdf-about-section">
        <div class="rdf-about-grid">
          <!-- Left Column -->
          <div class="rdf-about-left">
            <div class="rdf-about-tag">ABOUT RDF</div>
            <h2 class="rdf-about-title">
              From MRF to RDF.<br>
              <span>From Waste to Industrial Fuel.</span>
            </h2>

            <p class="rdf-about-p">
              Our MRF network collects and processes dry waste across 24 Gram Panchayats in Maharashtra, with operations scaling pan-India. Waste is sorted, segregated, and processed to maximise material recovery and minimise landfill disposal.
            </p>
            <p class="rdf-about-p">
              Recyclables such as PET, plastics, and paper are channelled for responsible recycling, while the combustible, non-recyclable fraction is recovered and processed into Refuse-Derived Fuel (RDF).
            </p>
            <p class="rdf-about-p">
              With dedicated sorting, baling, cutting, weighing, and material-handling infrastructure, our facility currently processes 5+ tons of dry waste every day.
            </p>
            <p class="rdf-about-p">
              The recovered RDF is processed into a consistent alternative industrial fuel and supplied to energy-intensive industries, including cement and other high-temperature applications.
            </p>

            <div class="rdf-about-pill">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z"></path><path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12"></path></svg>
              Recover. Convert. Fuel Industry.
            </div>
          </div>

          <!-- Right Column (2x2 MRF Feature Cards) -->
          <div class="rdf-mrf-grid">
            <div class="rdf-mrf-card">
              <div class="rdf-mrf-icon">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>
              </div>
              <h4>Dedicated Infrastructure</h4>
              <p>Equipped with advanced MRF infrastructure for efficient waste processing.</p>
            </div>

            <div class="rdf-mrf-card">
              <div class="rdf-mrf-icon">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M7 19H4.815a1.83 1.83 0 0 1-1.57-.881 1.785 1.785 0 0 1-.004-1.784L7.196 9.5"></path><path d="M11 19h8.203a1.83 1.83 0 0 0 1.556-.89 1.784 1.784 0 0 0 0-1.775l-1.226-2.12"></path><path d="m14 16-3 3 3 3"></path><path d="M8.293 13.596 4 6.5 12 2l4 6.5"></path><path d="m15.5 8.5 3-3-3-3"></path></svg>
              </div>
              <h4>Multiple Waste Streams</h4>
              <p>Handles PET, plastics, paper, and mixed dry waste with operational traceability.</p>
            </div>

            <div class="rdf-mrf-card">
              <div class="rdf-mrf-icon">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>
              </div>
              <h4>High Daily Throughput</h4>
              <p>Processing 5+ tons of dry waste every day.</p>
            </div>

            <div class="rdf-mrf-card">
              <div class="rdf-mrf-icon">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z"></path><path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12"></path></svg>
              </div>
              <h4>Sustainable Outcome</h4>
              <p>Converting waste into RDF to reduce landfill and fuel dependence.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- ================================================================== -->
      <!-- SECTION 3: HOW IT WORKS - OUR PROCESS FLOW (5 STEP CARDS)           -->
      <!-- ================================================================== -->
      <div class="rdf-flow-section">
        <span class="rdf-flow-badge">HOW IT WORKS</span>
        <h2 class="rdf-flow-title">— Our Process Flow —</h2>
        <p class="rdf-flow-subtitle">An integrated journey that moves waste from collection to industrial fuel supply.</p>

        <div class="rdf-flow-grid">
          <!-- Step 1 -->
          <div class="rdf-flow-col">
            <div class="rdf-flow-step-num">01</div>
            <div class="rdf-flow-arrow">→</div>
            <div class="rdf-flow-card">
              <div class="rdf-flow-icon">
                <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>
              </div>
              <h4>Collection</h4>
              <div class="rdf-flow-text-block">
                <strong>MRF:</strong> Source and collect dry waste from identified collection networks.
              </div>
              <div class="rdf-flow-text-block">
                <strong>RDF:</strong> Identify and recover suitable combustible waste streams.
              </div>
            </div>
          </div>

          <!-- Step 2 -->
          <div class="rdf-flow-col">
            <div class="rdf-flow-step-num">02</div>
            <div class="rdf-flow-arrow">→</div>
            <div class="rdf-flow-card">
              <div class="rdf-flow-icon">
                <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><ellipse cx="12" cy="7" rx="6" ry="3"></ellipse><path d="M3 17h18"></path><circle cx="6" cy="17" r="2"></circle><circle cx="12" cy="17" r="2"></circle><circle cx="18" cy="17" r="2"></circle><path d="M4 14h16"></path></svg>
              </div>
              <h4>Segregation</h4>
              <div class="rdf-flow-text-block">
                <strong>MRF:</strong> Sort PET, plastics, paper, and other dry waste streams.
              </div>
              <div class="rdf-flow-text-block">
                <strong>RDF:</strong> Separate the non-recyclable, combustible fraction for fuel recovery.
              </div>
            </div>
          </div>

          <!-- Step 3 -->
          <div class="rdf-flow-col">
            <div class="rdf-flow-step-num">03</div>
            <div class="rdf-flow-arrow">→</div>
            <div class="rdf-flow-card">
              <div class="rdf-flow-icon">
                <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
              </div>
              <h4>Processing</h4>
              <div class="rdf-flow-text-block">
                <strong>MRF:</strong> Bale, cut, weigh, and prepare recovered materials for downstream recycling.
              </div>
              <div class="rdf-flow-text-block">
                <strong>RDF:</strong> Process and condition combustible waste into a consistent alternative fuel.
              </div>
            </div>
          </div>

          <!-- Step 4 -->
          <div class="rdf-flow-col">
            <div class="rdf-flow-step-num">04</div>
            <div class="rdf-flow-arrow">→</div>
            <div class="rdf-flow-card">
              <div class="rdf-flow-icon">
                <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M7 19H4.815a1.83 1.83 0 0 1-1.57-.881 1.785 1.785 0 0 1-.004-1.784L7.196 9.5"></path><path d="M11 19h8.203a1.83 1.83 0 0 0 1.556-.89 1.784 1.784 0 0 0 0-1.775l-1.226-2.12"></path><path d="m14 16-3 3 3 3"></path><path d="M8.293 13.596 4 6.5 12 2l4 6.5"></path><path d="m15.5 8.5 3-3-3-3"></path></svg>
              </div>
              <h4>Recovery &amp; Conversion</h4>
              <div class="rdf-flow-text-block">
                <strong>MRF:</strong> Direct recyclables to responsible recycling channels.
              </div>
              <div class="rdf-flow-text-block">
                <strong>RDF:</strong> Convert recovered non-recyclable waste into Refuse-Derived Fuel (RDF).
              </div>
            </div>
          </div>

          <!-- Step 5 -->
          <div class="rdf-flow-col">
            <div class="rdf-flow-step-num">05</div>
            <div class="rdf-flow-card">
              <div class="rdf-flow-icon">
                <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M2 20a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8l-7 5V8l-7 5V4H2z"></path><rect x="6" y="16" width="3" height="3"></rect><rect x="15" y="16" width="3" height="3"></rect></svg>
              </div>
              <h4>Industrial Supply</h4>
              <div class="rdf-flow-text-block">
                <strong>MRF:</strong> Maintain material traceability through weighing and handling systems.
              </div>
              <div class="rdf-flow-text-block">
                <strong>RDF:</strong> Supply processed RDF to cement and other energy-intensive industries.
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <!-- Complete Laboratory TDS Table (Anchor target for "View Full Specifications") -->
  <section class="section" id="tds-table" style="background: var(--bg-surface-elevated); padding: 60px 0;">
    <div class="container">
      <div class="section-header reveal-on-scroll">
        <div class="section-tag">Laboratory Specifications</div>
        <h2 class="section-title">Technical Fuel Data Sheet <span class="gradient-text">(TDS) Matrix</span></h2>
        <p class="section-desc">Certified values for Refuse Derived Fuel (GRADE: RDF-KILN-05) for Kiln Co-Processing.</p>
      </div>

      <div class="reveal-on-scroll" style="background: #ffffff; border: 1px solid var(--border-medium); border-radius: var(--radius-lg); overflow: hidden; box-shadow: var(--shadow-sm); max-width: 900px; margin: 0 auto;">
        <table style="width: 100%; border-collapse: collapse; text-align: left;">
          <thead>
            <tr style="background: var(--bg-surface-elevated); border-bottom: 2px solid var(--border-medium);">
              <th style="padding: 16px 20px; font-weight: 800; font-size: 0.88rem; color: var(--text-main);">Parameter</th>
              <th style="padding: 16px 20px; font-weight: 800; font-size: 0.88rem; color: var(--text-main);">Test Method</th>
              <th style="padding: 16px 20px; font-weight: 800; font-size: 0.88rem; color: var(--text-main);">Unit</th>
              <th style="padding: 16px 20px; font-weight: 800; font-size: 0.88rem; color: var(--accent-emerald);">Typical Value</th>
            </tr>
          </thead>
          <tbody style="font-size: 0.9rem; color: var(--text-body);">
            <tr style="border-bottom: 1px solid var(--border-subtle);">
              <td style="padding: 14px 20px; font-weight: 600;">Gross Calorific Value (GCV)</td>
              <td style="padding: 14px 20px; font-family: var(--font-mono); color: var(--text-muted);">ASTM D5865</td>
              <td style="padding: 14px 20px;">kcal/kg</td>
              <td style="padding: 14px 20px; font-weight: 700; color: var(--accent-emerald);">&gt; 3,800 – 4,200</td>
            </tr>
            <tr style="border-bottom: 1px solid var(--border-subtle); background: var(--bg-surface-elevated);">
              <td style="padding: 14px 20px; font-weight: 600;">Total Moisture Content</td>
              <td style="padding: 14px 20px; font-family: var(--font-mono); color: var(--text-muted);">ASTM D3173</td>
              <td style="padding: 14px 20px;">%</td>
              <td style="padding: 14px 20px; font-weight: 700;">&lt; 12%</td>
            </tr>
            <tr style="border-bottom: 1px solid var(--border-subtle);">
              <td style="padding: 14px 20px; font-weight: 600;">Total Chlorine (Cl) Content</td>
              <td style="padding: 14px 20px; font-family: var(--font-mono); color: var(--text-muted);">EN 15408</td>
              <td style="padding: 14px 20px;">%</td>
              <td style="padding: 14px 20px; font-weight: 700; color: var(--accent-emerald);">&lt; 0.5% (Refractory Safe)</td>
            </tr>
            <tr style="border-bottom: 1px solid var(--border-subtle); background: var(--bg-surface-elevated);">
              <td style="padding: 14px 20px; font-weight: 600;">Particle Sizing</td>
              <td style="padding: 14px 20px; font-family: var(--font-mono); color: var(--text-muted);">Screen Sieve</td>
              <td style="padding: 14px 20px;">mm</td>
              <td style="padding: 14px 20px; font-weight: 700;">&lt; 30mm Fluff / 50-80mm Briquette</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </section>
@endsection
