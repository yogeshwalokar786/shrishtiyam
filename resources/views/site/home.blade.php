@extends('layouts.site')

@section('title', setting('site_name', 'SHRISTIYAM') . ' | Beyond Waste Into Values')
@section('meta_description', 'SHRISTIYAM transforms waste into values across plastics, industrial waste, agriculture waste, and food waste with end-to-end EPR support, high-quality industrial bioenergy fuels, and circular supply chains.')

@section('content')
  <!-- Multi-Slide Interactive Hero Slider Section -->
  <section class="section section-hero-slider" id="heroSliderSection">
    <!-- Top Interactive Category Selector Tabs -->
    <div class="hero-slider-nav-container container">
      <div class="hero-slide-tabs" id="heroSlideTabs" role="tablist">
        <button class="hero-slide-tab active" data-slide="0" role="tab" aria-selected="true" aria-controls="heroSlide0">
          <span class="slide-tab-num">01</span>
          <span class="slide-tab-text">Shristiyam</span>
        </button>
        <button class="hero-slide-tab" data-slide="1" role="tab" aria-selected="false" aria-controls="heroSlide1">
          <span class="slide-tab-num">02</span>
          <span class="slide-tab-text">Shristiyam BioEnergy</span>
        </button>
        <button class="hero-slide-tab" data-slide="2" role="tab" aria-selected="false" aria-controls="heroSlide2">
          <span class="slide-tab-num">03</span>
          <span class="slide-tab-text">Shristiyam EPR Services</span>
        </button>
        <button class="hero-slide-tab" data-slide="3" role="tab" aria-selected="false" aria-controls="heroSlide3">
          <span class="slide-tab-num">04</span>
          <span class="slide-tab-text">PCR Polymers & resins</span>
        </button>
        <button class="hero-slide-tab" data-slide="4" role="tab" aria-selected="false" aria-controls="heroSlide4">
          <span class="slide-tab-num">05</span>
          <span class="slide-tab-text">Industrial RDF Fuel</span>
        </button>
      </div>
    </div>

    <!-- Hero Slider Main Viewport Track -->
    <div class="hero-slides-wrapper" id="heroSlidesWrapper">
      
      <!-- Slide 1: Shristiyam - Beyond Waste Into Values -->
      <div class="hero-slide active" id="heroSlide0" role="tabpanel" data-slide-index="0" aria-hidden="false">
        <div class="container">
          <div class="hero-wrapper">
            <div class="hero-content">
              <div class="hero-badge-pill">
                <span class="live-dot"></span>
                <span>SHRISTIYAM &bull; Circular Values</span>
              </div>
              <h1 class="hero-title">
                BEYOND WASTE. <span class="gradient-text">INTO VALUE.</span>
              </h1>
              <p class="hero-subtitle">
                We transform waste into resources through responsible waste management, end-to-end EPR solutions, and recycled raw materials. Across plastics, industrial, agricultural, and food waste, we build traceable, scalable solutions that drive compliance, circularity, and measurable impact.
              </p>
              <div class="hero-actions">
                <a href="/about" class="btn btn-primary btn-lg">
                  <span>Explore Solutions</span>
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                    <polyline points="12 5 19 12 12 19"></polyline>
                  </svg>
                </a>
                <button class="btn btn-secondary btn-lg" data-open-modal="consultationModal">
                  Partner With Us
                </button>
              </div>
            </div>

            <!-- Slide 1 Interactive Card: Circular Loop Visualizer -->
            <div class="hero-visual-card">
              <div class="visual-mode-toggle">
                <button class="mode-btn" id="modeLinearBtn">Linear Disposal (Legacy)</button>
                <button class="mode-btn active" id="modeCircularBtn">Shristiyam Circular Loop</button>
              </div>
              <div class="hero-canvas-container" id="heroVisualContainer">
                <div class="loop-graphic">
                  <div class="orbit-ring" id="orbitRing"></div>
                  <div class="orbit-node node-1" title="Collection &amp; Sourcing"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path></svg></div>
                  <div class="orbit-node node-2" title="Segregation &amp; Recovery"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg></div>
                  <div class="orbit-node node-3" title="Value Upcycling"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg></div>
                  <div class="orbit-node node-4" title="Compliance &amp; Resource Reuse"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline></svg></div>
                  <div class="loop-center">
                    <div class="loop-center-val" id="loopCenterVal">100%</div>
                    <div class="loop-center-lbl" id="loopCenterLbl">Closed Loop Value</div>
                  </div>
                </div>
              </div>
              <div class="hero-stats-mini" id="heroStatsMini">
                <div class="stat-mini-item">
                  <div class="stat-mini-val" id="heroStatLandfill">Zero Landfill</div>
                  <div class="stat-mini-lbl">Diverted from Landfills &amp; Oceans</div>
                </div>
                <div class="stat-mini-item">
                  <div class="stat-mini-val" id="heroStatRecovery">100% Traceable Value</div>
                  <div class="stat-mini-lbl">End-to-End Digital Audit Trail</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Slide 2: Shristiyam BioEnergy -->
      <div class="hero-slide" id="heroSlide1" role="tabpanel" data-slide-index="1" aria-hidden="true">
        <div class="container">
          <div class="hero-wrapper">
            <div class="hero-content">
              <div class="hero-badge-pill">
                <span class="live-dot" style="background-color: var(--accent-amber);"></span>
                <span>SHRISTIYAM BIOENERGY &bull; Industrial Biofuels</span>
              </div>
              <h1 class="hero-title">
                CIRCULARITY THROUGH <span class="gradient-text">HIGH-QUALITY INDUSTRIAL FUELS</span>
              </h1>
              <p class="hero-subtitle">
                <strong style="color: var(--text-main); display: block; margin-bottom: 8px; font-size: 1.02rem;">Powering Industries. Fueling a Circular Future.</strong>
                We convert agricultural and industrial waste into high-quality biomass fuels for industrial boilers and process steam generation. Our solutions support efficient combustion, reduce reliance on conventional fuels, and turn waste into valuable energy resources.
                <br><br>
                <em style="color: var(--accent-emerald); font-weight: 600;">From Waste to Energy. Powering a Circular Future.</em>
              </p>
              <div class="hero-actions">
                <a href="/products" class="btn btn-primary btn-lg">
                  <span>Explore BioEnergy Fuels</span>
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                    <polyline points="12 5 19 12 12 19"></polyline>
                  </svg>
                </a>
                <button class="btn btn-secondary btn-lg" data-open-modal="consultationModal">
                  Request Boiler Offtake Specs
                </button>
              </div>
            </div>

            <!-- Slide 2 Interactive Card: Industrial Biofuel & Boiler Matrix Card -->
            <div class="hero-visual-card">
              <div class="slide-card-header">
                <div>
                  <span class="cert-pill">Industrial Boiler Grade</span>
                  <h4 style="margin-top: 6px; font-size: 1.15rem;">BioEnergy Fuel Performance Matrix</h4>
                </div>
                <span class="cert-pill" style="background: rgba(16, 185, 129, 0.15); color: #059669; border-color: rgba(16, 185, 129, 0.3);">100% Waste Biomass</span>
              </div>
              <div class="rdf-specs-grid">
                <div class="rdf-spec-box">
                  <span class="rdf-spec-lbl">Gross Calorific Value</span>
                  <span class="rdf-spec-num">&gt;3,800 kcal/kg</span>
                </div>
                <div class="rdf-spec-box">
                  <span class="rdf-spec-lbl">Moisture Content</span>
                  <span class="rdf-spec-num">&lt; 10.0%</span>
                </div>
                <div class="rdf-spec-box">
                  <span class="rdf-spec-lbl">Ash Content</span>
                  <span class="rdf-spec-num">&lt; 4.5% Clean</span>
                </div>
                <div class="rdf-spec-box">
                  <span class="rdf-spec-lbl">Boiler Process Steam</span>
                  <span class="rdf-spec-num">Consistent Output</span>
                </div>
              </div>
              <div class="hero-stats-mini">
                <div class="stat-mini-item">
                  <div class="stat-mini-val">100% Recycled</div>
                  <div class="stat-mini-lbl">Agro &amp; Industrial Byproducts</div>
                </div>
                <div class="stat-mini-item">
                  <div class="stat-mini-val">Eco Circular</div>
                  <div class="stat-mini-lbl">Reduced Fossil Fuel Footprint</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Slide 3: Shristiyam EPR Services -->
      <div class="hero-slide" id="heroSlide2" role="tabpanel" data-slide-index="2" aria-hidden="true">
        <div class="container">
          <div class="hero-wrapper">
            <div class="hero-content">
              <div class="hero-badge-pill">
                <span class="live-dot" style="background-color: var(--accent-cyan);"></span>
                <span>SHRISTIYAM EPR SERVICES &bull; Statutory Compliance Partner</span>
              </div>
              <h1 class="hero-title">
                END-TO-END PLASTIC WASTE &amp; <span class="gradient-text">EPR COMPLIANCE MANAGEMENT</span>
              </h1>
              <p class="hero-subtitle">
                Simplify plastic waste compliance with end-to-end EPR support, from CPCB registration and documentation to waste recovery, certificate management, reporting, and renewals.
                <br><br>
                We help businesses maintain regulatory compliance through transparent processes, reliable coordination, and traceable waste recovery.
                <br><br>
                <em style="color: var(--accent-cyan); font-weight: 600;">Simplifying Compliance. Enabling Circularity.</em>
              </p>
              <div class="hero-actions">
                <button class="btn btn-primary btn-lg" data-open-modal="consultationModal">
                  <span>Consult EPR Compliance Desk</span>
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                    <polyline points="12 5 19 12 12 19"></polyline>
                  </svg>
                </button>
                <a href="#calculator" class="btn btn-secondary btn-lg">
                  Launch EPR Calculator
                </a>
              </div>
            </div>

            <!-- Slide 3 Interactive Card: EPR Compliance Live Card -->
            <div class="hero-visual-card">
              <div class="slide-card-header">
                <div>
                  <span class="cert-pill">Statutory Compliance Portal</span>
                  <h4 style="margin-top: 6px; font-size: 1.15rem;">EPR Lifecycle Management</h4>
                </div>
                <span style="font-size: 0.76rem; font-family: var(--font-mono); color: var(--accent-emerald); font-weight: 700; background: var(--bg-surface-elevated); padding: 4px 10px; border-radius: var(--radius-full); border: 1px solid var(--border-medium);">100% Audit Ready</span>
              </div>
              <div class="epr-progress-list">
                <div class="epr-progress-item">
                  <div class="epr-progress-head">
                    <span>Category I: Rigid Plastic Packaging</span>
                    <span class="epr-val">100% Fulfilled</span>
                  </div>
                  <div class="epr-bar-track"><div class="epr-bar-fill" style="width: 100%;"></div></div>
                </div>
                <div class="epr-progress-item">
                  <div class="epr-progress-head">
                    <span>Category II: Flexible Plastic Packaging</span>
                    <span class="epr-val">100% Fulfilled</span>
                  </div>
                  <div class="epr-bar-track"><div class="epr-bar-fill" style="width: 100%;"></div></div>
                </div>
                <div class="epr-progress-item">
                  <div class="epr-progress-head">
                    <span>Category III: Multi-Layered Packaging (MLP)</span>
                    <span class="epr-val">100% Co-Processed</span>
                  </div>
                  <div class="epr-bar-track"><div class="epr-bar-fill" style="width: 100%;"></div></div>
                </div>
              </div>
              <div class="hero-stats-mini">
                <div class="stat-mini-item">
                  <div class="stat-mini-val">Timely Filing</div>
                  <div class="stat-mini-lbl">Reporting &amp; Renewals</div>
                </div>
                <div class="stat-mini-item">
                  <div class="stat-mini-val">Audit Prepared</div>
                  <div class="stat-mini-lbl">Accurate Record Management</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Slide 4: High-Purity PCR Resins -->
      <div class="hero-slide" id="heroSlide3" role="tabpanel" data-slide-index="3" aria-hidden="true">
        <div class="container">
          <div class="hero-wrapper">
            <div class="hero-content">
              <div class="hero-badge-pill">
                <span class="live-dot" style="background-color: var(--accent-emerald);"></span>
                <span>Next-Gen Circular Polymers</span>
              </div>
              <h1 class="hero-title">
                Transforming Waste Into <span class="gradient-text">High-Purity PCR Resins</span>
              </h1>
              <p class="hero-subtitle">
                CircuFlow manufactures food-grade rPET flakes, high-ESCR rHDPE, and rigid rPP copolymer granules with continuous vacuum degassing and calibrated melt flow indices.
              </p>
              <div class="hero-actions">
                <a href="/products" class="btn btn-primary btn-lg">
                  <span>Explore PCR Polymers</span>
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                    <polyline points="12 5 19 12 12 19"></polyline>
                  </svg>
                </a>
                <button type="button" class="btn btn-secondary btn-lg" data-open-modal="consultationModal">
                  Request Technical TDS
                </button>
              </div>
              <div class="hero-trust-bar">
                <div class="trust-item">
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                  <span>99.9% Decontamination Purity</span>
                </div>
                <div class="trust-item">
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                  <span>120,000+ MT/yr Capacity</span>
                </div>
                <div class="trust-item">
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                  <span>Zero Liquid Discharge (ZLD)</span>
                </div>
              </div>
            </div>

            <!-- Slide 4 Interactive Card: Circular Loop Visualizer -->
            <div class="hero-visual-card">
              <div class="visual-mode-toggle">
                <button type="button" class="mode-btn mode-linear-btn">Linear Disposal (Legacy)</button>
                <button type="button" class="mode-btn active mode-circular-btn">CircuFlow Circular Loop</button>
              </div>
              <div class="hero-canvas-container">
                <div class="loop-graphic">
                  <div class="orbit-ring"></div>
                  <div class="orbit-node node-1" title="Collection &amp; Sourcing"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path></svg></div>
                  <div class="orbit-node node-2" title="Optical NIR Segregation"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg></div>
                  <div class="orbit-node node-3" title="Twin-Screw Extrusion"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg></div>
                  <div class="orbit-node node-4" title="EPR Credit Fulfillment"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline></svg></div>
                  <div class="loop-center">
                    <div class="loop-center-val">99.4%</div>
                    <div class="loop-center-lbl">Circular Efficiency</div>
                  </div>
                </div>
              </div>
              <div class="hero-stats-mini">
                <div class="stat-mini-item">
                  <div class="stat-mini-val">0% Landfill Target</div>
                  <div class="stat-mini-lbl">Diverted from Landfills &amp; Oceans</div>
                </div>
                <div class="stat-mini-item">
                  <div class="stat-mini-val">100% Traceable Value</div>
                  <div class="stat-mini-lbl">End-to-End Digital Audit Trail</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Slide 5: Refuse Derived Fuel (RDF) For Cement Kilns -->
      <div class="hero-slide" id="heroSlide4" role="tabpanel" data-slide-index="4" aria-hidden="true">
        <div class="container">
          <div class="hero-wrapper">
            <div class="hero-content">
              <div class="hero-badge-pill">
                <span class="live-dot" style="background-color: var(--accent-forest, #059669);"></span>
                <span>Industrial Thermal Decarbonization</span>
              </div>
              <h1 class="hero-title">
                Refuse Derived Fuel (RDF) For <span class="gradient-text">Cement Kiln Co-Processing</span>
              </h1>
              <p class="hero-subtitle">
                Supplying low-chlorine, high-energy alternative fuel briquettes (&gt;3,800 kcal/kg) for cement and heavy industrial kilns, displacing fossil coal with zero residual bottom ash.
              </p>
              <div class="hero-actions">
                <a href="/products/refuse-derived-fuel" class="btn btn-primary btn-lg">
                  <span>Explore Industrial RDF</span>
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                    <polyline points="12 5 19 12 12 19"></polyline>
                  </svg>
                </a>
                <button type="button" class="btn btn-secondary btn-lg" data-open-modal="consultationModal">
                  Request Bulk Offtake RFP
                </button>
              </div>
              <div class="hero-trust-bar">
                <div class="trust-item">
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                  <span>&gt;3,800 kcal/kg Guaranteed CV</span>
                </div>
                <div class="trust-item">
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                  <span>&lt; 0.5% Kiln-Safe Chlorine</span>
                </div>
                <div class="trust-item">
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                  <span>Zero Clinker Bottom Ash</span>
                </div>
              </div>
            </div>

            <!-- Slide 5 Interactive Card: Heavy Industry RDF Card -->
            <div class="hero-visual-card">
              <div class="slide-card-header">
                <div>
                  <span class="cert-pill">Fossil Coal Replacement</span>
                  <h4 style="margin-top: 6px; font-size: 1.15rem;">Thermal Substitution Performance</h4>
                </div>
                <span class="cert-pill">ASTM D5865 Certified</span>
              </div>
              <div class="rdf-specs-grid">
                <div class="rdf-spec-box">
                  <span class="rdf-spec-lbl">Gross Calorific Value</span>
                  <span class="rdf-spec-num">&gt;3,800 kcal/kg</span>
                </div>
                <div class="rdf-spec-box">
                  <span class="rdf-spec-lbl">Controlled Moisture</span>
                  <span class="rdf-spec-num">&lt; 12.0%</span>
                </div>
                <div class="rdf-spec-box">
                  <span class="rdf-spec-lbl">Refractory Chlorine</span>
                  <span class="rdf-spec-num">&lt; 0.45% Safe</span>
                </div>
                <div class="rdf-spec-box">
                  <span class="rdf-spec-lbl">Thermal Substitution</span>
                  <span class="rdf-spec-num">15% - 25% TSR</span>
                </div>
              </div>
              <div class="hero-stats-mini">
                <div class="stat-mini-item">
                  <div class="stat-mini-val">38,000 MT/yr</div>
                  <div class="stat-mini-lbl">Fossil Coal Displaced</div>
                </div>
                <div class="stat-mini-item">
                  <div class="stat-mini-val">100% Absorption</div>
                  <div class="stat-mini-lbl">Integrated Clinker Matrix</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <!-- Slider Controls & Indicators -->
    <div class="hero-slider-bottom container">
      <div class="hero-slider-progress-track">
        <div class="hero-slider-progress-bar" id="heroSliderProgressBar"></div>
      </div>
      <div class="hero-slider-nav-actions">
        <div class="hero-arrow-btns">
          <button class="hero-arrow-btn" id="heroPrevBtn" aria-label="Previous Slide">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="15 18 9 12 15 6"></polyline></svg>
          </button>
          <button class="hero-arrow-btn" id="heroNextBtn" aria-label="Next Slide">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"></polyline></svg>
          </button>
        </div>
      </div>
    </div>
  </section>

  <!-- Live Impact Metrics Ticker -->
  <section class="metrics-strip">
    <div class="container">
      <div class="metrics-grid">
        <div class="metric-card reveal-on-scroll">
          <div class="metric-card-icon">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path
                d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z">
              </path>
            </svg>
          </div>
          <div class="metric-number-row">
            <span class="metric-number count-up" data-target="50000">0</span>
            <span class="metric-unit">MT+</span>
          </div>
          <div class="metric-label">Plastic Waste Diverted</div>
          <div class="metric-sub">Prevented from oceans and open dumps</div>
        </div>

        <div class="metric-card reveal-on-scroll reveal-delay-1">
          <div class="metric-card-icon">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
              <circle cx="9" cy="7" r="4"></circle>
              <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
              <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
            </svg>
          </div>
          <div class="metric-number-row">
            <span class="metric-number count-up" data-target="3200">0</span>
            <span class="metric-unit">+</span>
          </div>
          <div class="metric-label">Workers Empowered</div>
          <div class="metric-sub">With digital payments, health & safety kits</div>
        </div>

        <div class="metric-card reveal-on-scroll reveal-delay-2">
          <div class="metric-card-icon">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
            </svg>
          </div>
          <div class="metric-number-row">
            <span class="metric-number count-up" data-target="84000">0</span>
            <span class="metric-unit">MT</span>
          </div>
          <div class="metric-label">CO₂ Emissions Abated</div>
          <div class="metric-sub">Direct virgin petroleum displacement</div>
        </div>

        <div class="metric-card reveal-on-scroll reveal-delay-3">
          <div class="metric-card-icon">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
              <polyline points="22 4 12 14.01 9 11.01"></polyline>
            </svg>
          </div>
          <div class="metric-number-row">
            <span class="metric-number count-up" data-target="100">0</span>
            <span class="metric-unit">%</span>
          </div>
          <div class="metric-label">Audit Compliance Rate</div>
          <div class="metric-sub">Zero discrepancy across 80+ brand audits</div>
        </div>
      </div>
    </div>
  </section>

  <!-- About Us Section: Building a Circular Bharat -->
  <section class="section about-us-section" id="aboutUs">
    <div class="container" style="max-width: 1300px;">
      
      <div class="about-2col-grid">
        <!-- Left Column: Main Story & Mission -->
        <div class="about-col-story reveal-on-scroll revealed">
          <div class="about-badge-pill">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
              <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
            </svg>
            <span>SAWACCH BHARAT PAR DHYAAN</span>
          </div>

          <div class="about-eyebrow">BUILDING A CIRCULAR BHARAT</div>

          <h2 class="about-headline">
            Building Circular Systems for a <span class="calc-title-green">Changing Business Landscape</span>
          </h2>

          <div class="about-body-copy">
            <p class="about-lead">
              Our mission is to accelerate Bharat’s transition towards a circular, resource-efficient future by transforming waste into value and sustainability into measurable impact.
            </p>

            <p>
              From waste management and EPR compliance to recycled raw materials, CSR/ESG solutions, and BioEnergy fuels, <strong>SHRISTIYAM</strong> delivers scalable, traceable solutions that support industries and keep resources in circulation.
            </p>
          </div>

          <!-- Highlight Banner -->
          <div class="about-punchline-card">
            <div class="about-punchline-icon">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
              </svg>
            </div>
            <div class="about-punchline-text">
              Turning Waste into Value. Powering Industry. Building a Circular Bharat.
            </div>
          </div>
        </div>

        <!-- Right Column: Connected Approach Card -->
        <div class="about-col-card reveal-on-scroll revealed">
          <div class="about-connected-card">
            <div>
              <div class="about-card-top-tag">
                <span class="pulse-dot"></span>
                <span>Our Connected Approach</span>
              </div>

              <p class="about-card-desc">
                Our connected approach brings together waste management, EPR compliance, traceability, resource recovery, recycled materials, and bioenergy solutions—helping businesses turn waste into value while building more responsible, compliant, and resource-efficient operations.
              </p>

              <!-- 4 Step Process Badges -->
              <div class="about-steps-block">
                <div class="about-steps-heading">The Circular Value Chain</div>
                <div class="about-steps-grid">
                  <div class="about-step-pill">
                    <div class="step-num">01</div>
                    <div class="step-info">
                      <strong>Collect</strong>
                      <span>Source segregation</span>
                    </div>
                  </div>

                  <div class="about-step-pill">
                    <div class="step-num">02</div>
                    <div class="step-info">
                      <strong>Recover</strong>
                      <span>Material sorting</span>
                    </div>
                  </div>

                  <div class="about-step-pill">
                    <div class="step-num">03</div>
                    <div class="step-info">
                      <strong>Transform</strong>
                      <span>Refining & briquettes</span>
                    </div>
                  </div>

                  <div class="about-step-pill">
                    <div class="step-num">04</div>
                    <div class="step-info">
                      <strong>Reuse</strong>
                      <span>Circular loop</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Closing Motto Box -->
            <div class="about-motto-box">
              <div class="about-motto-icon">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <polyline points="23 4 23 10 17 10"></polyline>
                  <polyline points="1 20 1 14 7 14"></polyline>
                  <path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path>
                </svg>
              </div>
              <div class="about-motto-content">
                <strong>Closing loops. Creating value.</strong>
                <span>Building a Circular Bharat.</span>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
  </section>

  <!-- Interactive 5-Stage Circular Material Lifecycle -->
  <section class="section" id="pipelineSection">
    <div class="container">
      <!-- Decorative Ambient Foliage Leaf Graphic -->
      <div class="ce-leaf-decoration">
        <svg viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M180 180C140 180 100 150 90 110C80 70 100 30 140 20C180 10 190 60 180 100C170 140 160 170 180 180Z"
            fill="url(#ceLeafGrad1)" opacity="0.45" />
          <path d="M190 190C160 190 130 170 120 140C110 110 130 80 160 70C190 60 200 100 190 140C185 165 175 185 190 190Z"
            fill="url(#ceLeafGrad2)" opacity="0.3" />
          <defs>
            <linearGradient id="ceLeafGrad1" x1="90" y1="20" x2="180" y2="180" gradientUnits="userSpaceOnUse">
              <stop stop-color="#669a2b" />
              <stop offset="1" stop-color="#37704b" stop-opacity="0.1" />
            </linearGradient>
            <linearGradient id="ceLeafGrad2" x1="120" y1="70" x2="190" y2="190" gradientUnits="userSpaceOnUse">
              <stop stop-color="#669a2b" />
              <stop offset="1" stop-color="#3b6c83" stop-opacity="0.05" />
            </linearGradient>
          </defs>
        </svg>
      </div>

      <!-- Section Header -->
      <div class="ce-header-container">
        <div class="ce-header-pill">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
            stroke-linecap="round" stroke-linejoin="round">
            <path d="M22 12h-4l-3 9L9 3l-3 9H2" />
          </svg>
          <span>THE SHRISTIYAM CIRCULAR ENGINE</span>
        </div>
        <h2 class="ce-header-title">The SHRISTIYAM <span class="ce-title-accent">Circular Engine</span></h2>
        <p class="ce-header-desc">
          Follow waste through SHRISTIYAM’s circular process—from collection and segregation to recovery, recycling, and conversion into valuable resources.
        </p>
      </div>

      <!-- 5-Stage Stepper & Inner Card -->
      <div class="flow-pipeline">
        <div class="pipeline-static-wrap">
          <!-- Pure CSS Radio Controls (No JS Required) -->
          <input type="radio" name="pipeline_tab" id="pipeTab1" class="pipe-radio" checked>
          <input type="radio" name="pipeline_tab" id="pipeTab2" class="pipe-radio">
          <input type="radio" name="pipeline_tab" id="pipeTab3" class="pipe-radio">
          <input type="radio" name="pipeline_tab" id="pipeTab4" class="pipe-radio">
          <input type="radio" name="pipeline_tab" id="pipeTab5" class="pipe-radio">

          <!-- 5 Stepper Tabs with Horizontal Connector Line -->
          <div class="pipeline-tabs">
            <label for="pipeTab1" class="pipeline-step-tab tab-for-1">
              <div class="step-circle">01</div>
              <span class="step-label">Collection &amp;<br>Segregation</span>
            </label>
            <label for="pipeTab2" class="pipeline-step-tab tab-for-2">
              <div class="step-circle">02</div>
              <span class="step-label">Recovery &amp;<br>Processing</span>
            </label>
            <label for="pipeTab3" class="pipeline-step-tab tab-for-3">
              <div class="step-circle">03</div>
              <span class="step-label">ESG &amp;<br>CSR Projects</span>
            </label>
            <label for="pipeTab4" class="pipeline-step-tab tab-for-4">
              <div class="step-circle">04</div>
              <span class="step-label">E-Waste &amp;<br>Battery Waste</span>
            </label>
            <label for="pipeTab5" class="pipeline-step-tab tab-for-5">
              <div class="step-circle">05</div>
              <span class="step-label">Industrial &amp;<br>Agro Waste</span>
            </label>
          </div>

          <!-- Detail Panels -->
          <div class="pipeline-panels">

            <!-- Panel 1: Collection & Segregation (Matches Image Directly) -->
            <div class="pipeline-detail-card panel-1">
              <div class="pipeline-detail-main">
                <span class="ce-solution-badge">OUR SOLUTIONS</span>
                <h3 class="ce-card-title">PLASTIC | EXTENDED PRODUCER RESPONSIBILITY (EPR)</h3>
                <h4 class="ce-card-subtitle">End-to-End EPR Compliance &amp; Plastic Waste Management</h4>
                <div class="ce-bullet-list">
                  <div class="ce-bullet-item">
                    <div class="ce-bullet-icon">
                      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                        <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                        <path d="M9 12h6"></path>
                        <path d="M9 16h6"></path>
                        <path d="M9 8h6"></path>
                      </svg>
                    </div>
                    <div class="ce-bullet-text">
                      We simplify EPR compliance through structured waste collection, responsible recovery, traceability, and transparent reporting. From registration and documentation to implementation and renewals, SHRISTIYAM manages the complete compliance lifecycle.
                    </div>
                  </div>
                  <div class="ce-bullet-item">
                    <div class="ce-bullet-icon">
                      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                        <polyline points="9 12 11 14 15 10"></polyline>
                      </svg>
                    </div>
                    <div class="ce-bullet-text ce-bullet-highlight">
                      Comply with Confidence. Recover Responsibly. Build Circularity.
                    </div>
                  </div>
                </div>
              </div>

              <div class="ce-features-box">
                <div class="ce-feature-item">
                  <div class="ce-feature-icon">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"
                      stroke-linecap="round" stroke-linejoin="round">
                      <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                      <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                      <path d="m9 14 2 2 4-4"></path>
                    </svg>
                  </div>
                  <div class="ce-feature-content">
                    <h5 class="ce-feature-title">End-to-End EPR Management</h5>
                    <p class="ce-feature-desc">Complete support from registration to renewals and compliance reporting.
                    </p>
                  </div>
                </div>

                <div class="ce-feature-item">
                  <div class="ce-feature-icon">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"
                      stroke-linecap="round" stroke-linejoin="round">
                      <path d="M7 19H4.815a1.83 1.83 0 0 1-1.57-.881 1.785 1.785 0 0 1-.004-1.784L7.196 9.5"></path>
                      <path d="M11 19h8.2a1.8 1.8 0 0 0 1.6-1 1.8 1.8 0 0 0 0-1.8L17.5 10"></path>
                      <path d="m14 2-3 3.5 3 3.5"></path>
                      <path d="M11.5 5.5h7.7a1.8 1.8 0 0 1 1.6 1 1.8 1.8 0 0 1 0 1.8L19 11"></path>
                      <path d="m2 16 3.5 3.5L9 16"></path>
                    </svg>
                  </div>
                  <div class="ce-feature-content">
                    <h5 class="ce-feature-title">Responsible Waste Recovery</h5>
                    <p class="ce-feature-desc">Structured collection and recovery through verified and traceable
                      processes.</p>
                  </div>
                </div>

                <div class="ce-feature-item">
                  <div class="ce-feature-icon">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"
                      stroke-linecap="round" stroke-linejoin="round">
                      <line x1="18" y1="20" x2="18" y2="10"></line>
                      <line x1="12" y1="20" x2="12" y2="4"></line>
                      <line x1="6" y1="20" x2="6" y2="14"></line>
                      <line x1="2" y1="20" x2="22" y2="20"></line>
                      <polyline points="6 10 12 4 18 8 22 2"></polyline>
                    </svg>
                  </div>
                  <div class="ce-feature-content">
                    <h5 class="ce-feature-title">Transparent Compliance Reporting</h5>
                    <p class="ce-feature-desc">Clear documentation, reporting, and accountability at every stage.</p>
                  </div>
                </div>

                <div class="ce-feature-item">
                  <div class="ce-feature-icon">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"
                      stroke-linecap="round" stroke-linejoin="round">
                      <path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z"></path>
                      <path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12"></path>
                    </svg>
                  </div>
                  <div class="ce-feature-content">
                    <h5 class="ce-feature-title">Sustainable Impact</h5>
                    <p class="ce-feature-desc">Recover responsibly and build a circular future with measurable impact.</p>
                  </div>
                </div>
              </div>
            </div>

            <!-- Panel 2: Recovery & Processing (Matches Image Directly) -->
            <div class="pipeline-detail-card panel-2">
              <div class="pipeline-detail-main">
                <span class="ce-solution-badge">OUR SOLUTIONS</span>
                <h3 class="ce-card-title">PLASTIC | PLASTIC NEUTRAL PROGRAMME</h3>
                <h4 class="ce-card-subtitle">Turn Your Plastic Footprint into Measurable Impact</h4>
                <div class="ce-bullet-list">
                  <div class="ce-bullet-item">
                    <div class="ce-bullet-icon">
                      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="22 7 13.5 15.5 8.5 10.5 2 17"></polyline>
                        <polyline points="16 7 22 7 22 13"></polyline>
                      </svg>
                    </div>
                    <div class="ce-bullet-text">
                      A voluntary programme designed to help businesses take responsibility for their plastic footprint by
                      supporting the collection, recovery, and responsible recycling of low-value plastic waste (LVP).
                    </div>
                  </div>
                  <div class="ce-bullet-item">
                    <div class="ce-bullet-icon">
                      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M7 19H4.815a1.83 1.83 0 0 1-1.57-.881 1.785 1.785 0 0 1-.004-1.784L7.196 9.5"></path>
                        <path d="M11 19h8.2a1.8 1.8 0 0 0 1.6-1 1.8 1.8 0 0 0 0-1.8L17.5 10"></path>
                        <path d="m14 2-3 3.5 3 3.5"></path>
                        <path d="M11.5 5.5h7.7a1.8 1.8 0 0 1 1.6 1 1.8 1.8 0 0 1 0 1.8L19 11"></path>
                        <path d="m2 16 3.5 3.5L9 16"></path>
                      </svg>
                    </div>
                    <div class="ce-bullet-text">
                      SHRISTIYAM connects businesses with structured waste recovery systems that help divert plastic from
                      the environment, support responsible resource recovery, and create transparent, measurable impact.
                    </div>
                  </div>
                  <div class="ce-bullet-item">
                    <div class="ce-bullet-icon">
                      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z"></path>
                        <path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12"></path>
                      </svg>
                    </div>
                    <div class="ce-bullet-text ce-bullet-highlight">
                      Measure your footprint. Recover what you use. Move towards a more circular future.
                    </div>
                  </div>
                </div>
              </div>

              <div class="ce-features-box">
                <div class="ce-feature-item">
                  <div class="ce-feature-icon">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"
                      stroke-linecap="round" stroke-linejoin="round">
                      <circle cx="12" cy="12" r="10"></circle>
                      <circle cx="12" cy="12" r="6"></circle>
                      <circle cx="12" cy="12" r="2"></circle>
                    </svg>
                  </div>
                  <div class="ce-feature-content">
                    <h5 class="ce-feature-title">Plastic Footprint Accountability</h5>
                    <p class="ce-feature-desc">Measure and understand your plastic footprint across products, packaging,
                      and operations.</p>
                  </div>
                </div>

                <div class="ce-feature-item">
                  <div class="ce-feature-icon">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"
                      stroke-linecap="round" stroke-linejoin="round">
                      <path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z"></path>
                      <path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12"></path>
                    </svg>
                  </div>
                  <div class="ce-feature-content">
                    <h5 class="ce-feature-title">Responsible Recovery Network</h5>
                    <p class="ce-feature-desc">Access verified collection and recycling partners ensuring ethical and
                      compliant recovery.</p>
                  </div>
                </div>

                <div class="ce-feature-item">
                  <div class="ce-feature-icon">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"
                      stroke-linecap="round" stroke-linejoin="round">
                      <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                      <polyline points="14 2 14 8 20 8"></polyline>
                      <line x1="16" y1="13" x2="8" y2="13"></line>
                      <line x1="16" y1="17" x2="8" y2="17"></line>
                      <polyline points="10 9 9 9 8 9"></polyline>
                    </svg>
                  </div>
                  <div class="ce-feature-content">
                    <h5 class="ce-feature-title">Transparent Impact Reporting</h5>
                    <p class="ce-feature-desc">Real-time dashboards and reports to track recovery, diversion, and
                      environmental impact.</p>
                  </div>
                </div>

                <div class="ce-feature-item">
                  <div class="ce-feature-icon">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"
                      stroke-linecap="round" stroke-linejoin="round">
                      <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                      <polyline points="9 12 11 14 15 10"></polyline>
                    </svg>
                  </div>
                  <div class="ce-feature-content">
                    <h5 class="ce-feature-title">Towards Plastic Neutrality</h5>
                    <p class="ce-feature-desc">Support circular outcomes and contribute to a cleaner, more sustainable
                      planet.</p>
                  </div>
                </div>
              </div>
            </div>

            <!-- Panel 3: ESG & CSR Projects (Matches Image Directly) -->
            <div class="pipeline-detail-card panel-3">
              <div class="pipeline-detail-main">
                <span class="ce-solution-badge">STAGE 03 ARCHITECTURE</span>
                <h3 class="ce-card-title">ESG &amp; CSR PROJECTS</h3>
                <h4 class="ce-card-subtitle">Creating Measurable Impact Where It Matters</h4>
                <div class="ce-bullet-list">
                  <div class="ce-bullet-item">
                    <div class="ce-bullet-icon">
                      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                      </svg>
                    </div>
                    <div class="ce-bullet-text">
                      A voluntary programme helping businesses take responsibility for their plastic footprint through the collection, recovery, and responsible recycling of low-value plastic waste.
                    </div>
                  </div>
                  <div class="ce-bullet-item">
                    <div class="ce-bullet-icon">
                      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 10a6 6 0 0 0-6-6H3v3a6 6 0 0 0 6 6h3"></path>
                        <path d="M12 14a6 6 0 0 1 6-6h3v3a6 6 0 0 1-6 6h-3"></path>
                        <line x1="12" y1="10" x2="12" y2="21"></line>
                      </svg>
                    </div>
                    <div class="ce-bullet-text">
                      SHRISTIYAM enables traceable waste recovery and measurable environmental impact, supporting businesses in their journey towards circularity.
                    </div>
                  </div>
                  <div class="ce-bullet-item">
                    <div class="ce-bullet-icon">
                      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                        <polyline points="9 12 11 14 15 10"></polyline>
                      </svg>
                    </div>
                    <div class="ce-bullet-text ce-bullet-highlight">
                      Measure Your Footprint. Recover Responsibly. Build Circularity.
                    </div>
                  </div>
                </div>
              </div>

              <div class="ce-features-box">
                <div class="ce-feature-item">
                  <div class="ce-feature-icon">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"
                      stroke-linecap="round" stroke-linejoin="round">
                      <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                      <circle cx="9" cy="7" r="4"></circle>
                      <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                      <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                  </div>
                  <div class="ce-feature-content">
                    <h5 class="ce-feature-title">Community &amp; Livelihood Development</h5>
                    <p class="ce-feature-desc">Empowering communities through sustainable livelihoods and capacity
                      building.</p>
                  </div>
                </div>

                <div class="ce-feature-item">
                  <div class="ce-feature-icon">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"
                      stroke-linecap="round" stroke-linejoin="round">
                      <path d="M7 19H4.815a1.83 1.83 0 0 1-1.57-.881 1.785 1.785 0 0 1-.004-1.784L7.196 9.5"></path>
                      <path d="M11 19h8.2a1.8 1.8 0 0 0 1.6-1 1.8 1.8 0 0 0 0-1.8L17.5 10"></path>
                      <path d="m14 2-3 3.5 3 3.5"></path>
                      <path d="M11.5 5.5h7.7a1.8 1.8 0 0 1 1.6 1 1.8 1.8 0 0 1 0 1.8L19 11"></path>
                      <path d="m2 16 3.5 3.5L9 16"></path>
                    </svg>
                  </div>
                  <div class="ce-feature-content">
                    <h5 class="ce-feature-title">Environment Protection Initiatives</h5>
                    <p class="ce-feature-desc">Projects focused on waste reduction, recycling, and biodiversity
                      conservation.</p>
                  </div>
                </div>

                <div class="ce-feature-item">
                  <div class="ce-feature-icon">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"
                      stroke-linecap="round" stroke-linejoin="round">
                      <path d="M22 10v6M2 10l10-5 10 5-10 5z"></path>
                      <path d="M6 12v5c3 3 9 3 12 0v-5"></path>
                    </svg>
                  </div>
                  <div class="ce-feature-content">
                    <h5 class="ce-feature-title">Awareness &amp; Education Programs</h5>
                    <p class="ce-feature-desc">Driving change through education, training, and environmental awareness
                      campaigns.</p>
                  </div>
                </div>

                <div class="ce-feature-item">
                  <div class="ce-feature-icon">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"
                      stroke-linecap="round" stroke-linejoin="round">
                      <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                      <polyline points="14 2 14 8 20 8"></polyline>
                      <line x1="16" y1="13" x2="8" y2="13"></line>
                      <line x1="16" y1="17" x2="8" y2="17"></line>
                      <polyline points="10 9 9 9 8 9"></polyline>
                    </svg>
                  </div>
                  <div class="ce-feature-content">
                    <h5 class="ce-feature-title">Impact Measurement &amp; Reporting</h5>
                    <p class="ce-feature-desc">Transparent tracking, verification, and reporting to showcase measurable
                      impact.</p>
                  </div>
                </div>
              </div>
            </div>

            <!-- Panel 4: E-Waste & Battery Waste Management (Matches Image Directly) -->
            <div class="pipeline-detail-card panel-4">
              <div class="pipeline-detail-main">
                <span class="ce-solution-badge">OUR SOLUTIONS</span>
                <h3 class="ce-card-title">E-WASTE &amp; BATTERY WASTE MANAGEMENT</h3>
                <h4 class="ce-card-subtitle">Responsible Recovery. Compliant Recycling.</h4>
                <div class="ce-bullet-list">
                  <div class="ce-bullet-item">
                    <div class="ce-bullet-icon">
                      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                        <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                      </svg>
                    </div>
                    <div class="ce-bullet-text">
                      SHRISTIYAM provides end-to-end e-waste and battery waste management, covering collection, authorised recycling, EPR compliance, documentation, and regulatory reporting.
                    </div>
                  </div>
                  <div class="ce-bullet-item">
                    <div class="ce-bullet-icon">
                      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                        <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                        <path d="m9 14 2 2 4-4"></path>
                      </svg>
                    </div>
                    <div class="ce-bullet-text">
                      We ensure traceable recovery, responsible recycling, and streamlined compliance to help businesses manage waste efficiently.
                    </div>
                  </div>
                  <div class="ce-bullet-item">
                    <div class="ce-bullet-icon">
                      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                        <polyline points="9 12 11 14 15 10"></polyline>
                      </svg>
                    </div>
                    <div class="ce-bullet-text ce-bullet-highlight">
                      Collect Responsibly. Recycle Compliantly. Recover Value.
                    </div>
                  </div>
                </div>
              </div>

              <div class="ce-features-box">
                <div class="ce-feature-item">
                  <div class="ce-feature-icon">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"
                      stroke-linecap="round" stroke-linejoin="round">
                      <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                      <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                    </svg>
                  </div>
                  <div class="ce-feature-content">
                    <!-- Content will be added manually -->
                  </div>
                </div>

                <div class="ce-feature-item">
                  <div class="ce-feature-icon">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"
                      stroke-linecap="round" stroke-linejoin="round">
                      <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                      <polyline points="14 2 14 8 20 8"></polyline>
                      <line x1="16" y1="13" x2="8" y2="13"></line>
                      <line x1="16" y1="17" x2="8" y2="17"></line>
                      <polyline points="10 9 9 9 8 9"></polyline>
                    </svg>
                  </div>
                  <div class="ce-feature-content">
                    <!-- Content will be added manually -->
                  </div>
                </div>

                <div class="ce-feature-item">
                  <div class="ce-feature-icon">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"
                      stroke-linecap="round" stroke-linejoin="round">
                      <line x1="18" y1="20" x2="18" y2="10"></line>
                      <line x1="12" y1="20" x2="12" y2="4"></line>
                      <line x1="6" y1="20" x2="6" y2="14"></line>
                      <line x1="2" y1="20" x2="22" y2="20"></line>
                      <polyline points="6 10 12 4 18 8 22 2"></polyline>
                    </svg>
                  </div>
                  <div class="ce-feature-content">
                    <!-- Content will be added manually -->
                  </div>
                </div>

                <div class="ce-feature-item">
                  <div class="ce-feature-icon">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"
                      stroke-linecap="round" stroke-linejoin="round">
                      <path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z"></path>
                      <path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12"></path>
                    </svg>
                  </div>
                  <div class="ce-feature-content">
                    <!-- Content will be added manually -->
                  </div>
                </div>
              </div>
            </div>

            <!-- Panel 5: Industrial & Agriculture Waste Management (Matches Image Directly) -->
            <div class="pipeline-detail-card panel-5">
              <div class="pipeline-detail-main">
                <span class="ce-solution-badge">OUR SOLUTIONS</span>
                <h3 class="ce-card-title">INDUSTRIAL WASTE &amp; AGRICULTURE WASTE MANAGEMENT</h3>
                <h4 class="ce-card-subtitle">Circularity Through High-Quality Industrial Fuels</h4>
                <div class="ce-bullet-list">
                  <div class="ce-bullet-item">
                    <div class="ce-bullet-icon">
                      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M2 20a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8l-7 5V8l-7 5V4a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2Z">
                        </path>
                      </svg>
                    </div>
                    <div class="ce-bullet-text">
                      Shristiyam BioEnergy provides end-to-end agricultural and industrial waste management solutions,
                      transforming suitable waste streams into high-quality biomass fuels and supporting waste-to-energy
                      and power generation applications.
                    </div>
                  </div>
                  <div class="ce-bullet-item">
                    <div class="ce-bullet-icon">
                      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path
                          d="M8.5 14.5A2.5 2.5 0 0 0 11 12c0-1.38-.5-2-1-3-1.072-2.143-.224-4.054 2-6 .5 2.5 2 4.9 4 6.5 2 1.6 3 3.5 3 5.5a7 7 0 1 1-14 0c0-1.153.433-2.294 1-3a2.5 2.5 0 0 0 2.5 2.5z">
                        </path>
                      </svg>
                    </div>
                    <div class="ce-bullet-text">
                      From collection, segregation, and processing to fuel conversion and energy recovery, we help
                      industries recover value from waste while reducing dependence on conventional fuels.
                    </div>
                  </div>
                  <div class="ce-bullet-item">
                    <div class="ce-bullet-icon">
                      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <path d="m4.93 4.93 4.24 4.24"></path>
                        <path d="m14.83 9.17 4.24-4.24"></path>
                        <path d="m14.83 14.83 4.24 4.24"></path>
                        <path d="m9.17 14.83-4.24 4.24"></path>
                      </svg>
                    </div>
                    <div class="ce-bullet-text">
                      Our solutions are built around consistent fuel quality, reliable performance, efficient energy
                      generation, and responsible resource recovery.
                    </div>
                  </div>
                  <div class="ce-bullet-item">
                    <div class="ce-bullet-icon">
                      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                        <polyline points="9 12 11 14 15 10"></polyline>
                      </svg>
                    </div>
                    <div class="ce-bullet-text ce-bullet-highlight">
                      Collect responsibly. Convert efficiently. Power industries sustainably.
                    </div>
                  </div>
                </div>
              </div>

              <div class="ce-features-box">
                <div class="ce-feature-item">
                  <div class="ce-feature-icon">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"
                      stroke-linecap="round" stroke-linejoin="round">
                      <path d="M2 20a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8l-7 5V8l-7 5V4a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2Z">
                      </path>
                    </svg>
                  </div>
                  <div class="ce-feature-content">
                    <!-- Content will be added manually -->
                  </div>
                </div>

                <div class="ce-feature-item">
                  <div class="ce-feature-icon">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"
                      stroke-linecap="round" stroke-linejoin="round">
                      <path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z"></path>
                      <path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12"></path>
                    </svg>
                  </div>
                  <div class="ce-feature-content">
                    <!-- Content will be added manually -->
                  </div>
                </div>

                <div class="ce-feature-item">
                  <div class="ce-feature-icon">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"
                      stroke-linecap="round" stroke-linejoin="round">
                      <path
                        d="M8.5 14.5A2.5 2.5 0 0 0 11 12c0-1.38-.5-2-1-3-1.072-2.143-.224-4.054 2-6 .5 2.5 2 4.9 4 6.5 2 1.6 3 3.5 3 5.5a7 7 0 1 1-14 0c0-1.153.433-2.294 1-3a2.5 2.5 0 0 0 2.5 2.5z">
                      </path>
                    </svg>
                  </div>
                  <div class="ce-feature-content">
                    <!-- Content will be added manually -->
                  </div>
                </div>

                <div class="ce-feature-item">
                  <div class="ce-feature-icon">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"
                      stroke-linecap="round" stroke-linejoin="round">
                      <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                      <polyline points="9 12 11 14 15 10"></polyline>
                    </svg>
                  </div>
                  <div class="ce-feature-content">
                    <!-- Content will be added manually -->
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Interactive EPR & ESG Calculator -->
  <section class="section calc-section" id="calculator">
    <div class="container" style="max-width: 1280px;">

      <!-- Top Centered Header -->
      <div class="calc-header-centered reveal-on-scroll revealed">
        <div class="calc-pill-badge">
          <svg class="calc-badge-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <circle cx="12" cy="12" r="10"></circle>
            <circle cx="12" cy="12" r="6"></circle>
            <circle cx="12" cy="12" r="2" fill="currentColor"></circle>
          </svg>
          <span>ENVIRONMENTAL IMPACT ASSESSMENT &amp; CIRCULAR WASTE COMPLIANCE</span>
        </div>

        <h2 class="calc-main-title">
          Interactive <span class="calc-title-green">EPR &amp; ESG</span> Calculator
        </h2>

        <p class="calc-intro-text">
          We help businesses track EPR obligations, waste recovery, recycling, and environmental impact across plastic, e-waste, battery waste, used oil, waste tyres, and industrial and agricultural waste.
        </p>

        <p class="calc-intro-text">
          Aligned with CPCB and MoEFCC guidelines, our solutions simplify compliance tracking, certificate management, and the measurement of CO₂ reduction and resource savings.
        </p>

        <p class="calc-highlight-text">
          Simplifying Compliance. Measuring Impact. Driving Circularity.
        </p>
      </div>

      <!-- Bottom Interactive 2-Card Grid -->
      <div class="calc-interactive-grid reveal-on-scroll">
        <!-- Left: Input Controls -->
        <div class="calc-card calc-inputs-card">
          <!-- Step 1: Baseline Volume -->
          <div class="calc-field-group">
            <div class="calc-field-title">
              <span>1. Annual Waste / Material Baseline (Volume)</span>
              <span class="calc-info-tooltip"
                title="Estimated total annual waste generated or handled under EPR framework">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <circle cx="12" cy="12" r="10"></circle>
                  <line x1="12" y1="16" x2="12" y2="12"></line>
                  <line x1="12" y1="8" x2="12.01" y2="8"></line>
                </svg>
              </span>
            </div>

            <div class="calc-volume-display-row">
              <span class="calc-volume-num" id="volumeBadge">1,200</span>
              <span class="calc-volume-unit">MT / year</span>
            </div>

            <div class="calc-slider-wrapper">
              <input type="range" class="calc-range-slider" id="volumeSlider" min="100" max="25000" step="50"
                value="1200">
              <div class="calc-slider-labels">
                <span>100 MT</span>
                <span>25,000+ MT</span>
              </div>
            </div>
          </div>

          <!-- Step 2: Select Waste Stream Dropdown -->
          <div class="calc-field-group">
            <label class="calc-field-title" for="wasteStreamSelect">2. Select Waste Stream</label>
            <div class="calc-select-wrapper">
              <select class="calc-custom-select" id="wasteStreamSelect">
                <option value="plastic" selected>Plastic Waste</option>
                <option value="ewaste">E-waste</option>
                <option value="battery">Battery Waste</option>
                <option value="oil">Used Oil</option>
                <option value="tyre">Waste Tyres</option>
                <option value="industrial">Industrial Waste</option>
                <option value="agricultural">Agricultural Waste</option>
              </select>
              <span class="calc-select-caret">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <polyline points="6 9 12 15 18 9"></polyline>
                </svg>
              </span>
            </div>
          </div>

          <!-- Step 3: Waste Category / Material Type Chips -->
          <div class="calc-field-group">
            <label class="calc-field-title">3. Waste Category / Material Type</label>
            <div class="calc-categories-row" id="categoriesRow">
              <button type="button" class="calc-cat-card active" data-cat="all">
                <div class="calc-cat-icon">
                  <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="3" y="3" width="18" height="18" rx="3"></rect>
                    <circle cx="8" cy="8" r="1.5" fill="currentColor"></circle>
                    <circle cx="16" cy="8" r="1.5" fill="currentColor"></circle>
                    <circle cx="8" cy="16" r="1.5" fill="currentColor"></circle>
                    <circle cx="16" cy="16" r="1.5" fill="currentColor"></circle>
                  </svg>
                </div>
                <span class="calc-cat-text">All Blended<br>Matrix</span>
              </button>

              <button type="button" class="calc-cat-card" data-cat="rigid">
                <div class="calc-cat-icon">
                  <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M9 3h6v2H9z"></path>
                    <path d="M8 5h8a2 2 0 0 1 2 2v13a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2z"></path>
                  </svg>
                </div>
                <span class="calc-cat-text">Rigid<br>Plastic</span>
              </button>

              <button type="button" class="calc-cat-card" data-cat="flexible">
                <div class="calc-cat-icon">
                  <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M6 3h12a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2z"></path>
                    <path d="M9 3v4a3 3 0 0 0 6 0V3"></path>
                  </svg>
                </div>
                <span class="calc-cat-text">Flexible<br>Plastic</span>
              </button>

              <button type="button" class="calc-cat-card" data-cat="multi">
                <div class="calc-cat-icon">
                  <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                    <polyline points="2 17 12 22 22 17"></polyline>
                    <polyline points="2 12 12 17 22 12"></polyline>
                  </svg>
                </div>
                <span class="calc-cat-text">Multilayer<br>Plastic</span>
              </button>
            </div>
          </div>

          <!-- Bottom Disclaimer -->
          <div class="calc-disclaimer-box">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <circle cx="12" cy="12" r="10"></circle>
              <line x1="12" y1="16" x2="12" y2="12"></line>
              <line x1="12" y1="8" x2="12.01" y2="8"></line>
            </svg>
            <span>Calculations are based on CPCB & MoEFCC guidelines, standard regulatory recycling ratios, verified
              lifecycle emission models and recovery rates.</span>
          </div>
        </div>

        <!-- Right: Results Card -->
        <div class="calc-card calc-outputs-card">
          <div class="calc-results-title-row">
            <h3 class="calc-outputs-title">Your Estimated Compliance Impact</h3>
            <p class="calc-outputs-subtitle">Real-time EPR fulfillment model</p>
          </div>

          <!-- 6 Metric Cards -->
          <div class="calc-metrics-grid">
            <!-- 1: Mandatory EPR Credit Requirement -->
            <div class="calc-metric-tile">
              <div class="calc-metric-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <polyline points="23 4 23 10 17 10"></polyline>
                  <polyline points="1 20 1 14 7 14"></polyline>
                  <path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path>
                </svg>
              </div>
              <div class="calc-metric-content">
                <span class="calc-metric-name">Mandatory EPR<br>Credit Requirement</span>
                <span class="calc-metric-value" id="resultTargetEpr">1,020 MT</span>
              </div>
            </div>

            <!-- 2: Projected CO2 Reduction -->
            <div class="calc-metric-tile">
              <div class="calc-metric-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M18 10h-1.26A8 8 0 1 0 9 20h9a5 5 0 0 0 0-10z"></path>
                </svg>
              </div>
              <div class="calc-metric-content">
                <span class="calc-metric-name">Projected CO₂<br>Reduction</span>
                <span class="calc-metric-value" id="resultCo2Offset">1,714 MT CO₂e</span>
              </div>
            </div>

            <!-- 3: Crude Oil Conserved -->
            <div class="calc-metric-tile">
              <div class="calc-metric-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"></path>
                </svg>
              </div>
              <div class="calc-metric-content">
                <span class="calc-metric-name">Crude Oil<br>Conserved</span>
                <span class="calc-metric-value" id="resultOilSaved">16,626 Barrels</span>
              </div>
            </div>

            <!-- 4: Landfill Space Saved -->
            <div class="calc-metric-tile">
              <div class="calc-metric-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path
                    d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z">
                  </path>
                  <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                  <line x1="12" y1="22.08" x2="12" y2="12"></line>
                </svg>
              </div>
              <div class="calc-metric-content">
                <span class="calc-metric-name">Landfill Space<br>Saved</span>
                <span class="calc-metric-value" id="resultLandfillSaved">2,448 m³</span>
              </div>
            </div>

            <!-- 5: Materials Recovered (Span 2) -->
            <div class="calc-metric-tile calc-metric-tile-wide">
              <div class="calc-metric-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                  <polyline points="2 17 12 22 22 17"></polyline>
                  <polyline points="2 12 12 17 22 12"></polyline>
                </svg>
              </div>
              <div class="calc-metric-content">
                <span class="calc-metric-name">Materials Recovered</span>
                <span class="calc-metric-value" id="resultMaterialsRecovered">1,920 MT</span>
              </div>
            </div>

            <!-- 6: Dignified Livelihood Impact (Span 2) -->
            <div class="calc-metric-tile calc-metric-tile-wide">
              <div class="calc-metric-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                  <circle cx="9" cy="7" r="4"></circle>
                  <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                  <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                </svg>
              </div>
              <div class="calc-metric-content">
                <span class="calc-metric-name">Dignified Livelihood Impact</span>
                <span class="calc-metric-value" id="resultLivelihoods">8,670 Work Days</span>
              </div>
            </div>
          </div>

          <!-- Bottom Action Buttons -->
          <div class="calc-actions-row">
            <button type="button" class="calc-btn-primary" id="downloadReportBtn">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                <polyline points="7 10 12 15 17 10"></polyline>
                <line x1="12" y1="15" x2="12" y2="3"></line>
              </svg>
              <span>Print Official Summary</span>
            </button>

            <button type="button" class="calc-btn-outline" data-open-modal="consultationModal">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
              </svg>
              <span>Lock EPR Credits</span>
            </button>
          </div>
        </div>
      </div>

    </div>
  </section>

  <!-- Recovered Resources & Alternative Products Section (Tab-Wise Catalog) -->
  <!-- High-Grade PCR Granules Catalog Preview -->
  <section class="section home-products-section" id="productsSection">
    <div class="container">
      <div class="section-header reveal-on-scroll">
        <div class="section-tag">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="9"></circle></svg>
          <span>Engineered Recycled Polymers</span>
        </div>
        <h2 class="section-title">Premium <span class="gradient-text">PCR Granules Catalog</span></h2>
        <p class="section-desc">
          Food-grade, blow-molding, and injection-grade post-consumer resins manufactured with vacuum degassing and continuous MFI testing.
        </p>
      </div>

      <div class="solution-tabs reveal-on-scroll">
        <button type="button" class="solution-tab-btn product-filter-btn active" data-category="all">All Polymers</button>
        <button type="button" class="solution-tab-btn product-filter-btn" data-category="rpet">rPET Flakes & Resin</button>
        <button type="button" class="solution-tab-btn product-filter-btn" data-category="rhdpe">rHDPE Granules</button>
        <button type="button" class="solution-tab-btn product-filter-btn" data-category="rpp">rPP Copolymer</button>
        <button type="button" class="solution-tab-btn product-filter-btn" data-category="rldpe">rLDPE Film</button>
        <button type="button" class="solution-tab-btn product-filter-btn" data-category="rdf">Industrial RDF</button>
      </div>

      <div class="grid-3 reveal-on-scroll" id="pcrProductGrid">
        <!-- Injected dynamically by products.js / SSR Fallback -->
        <div class="product-card">
          <a href="/product-single" class="product-card-img-link">
            <img src="/assets/images/product-rpet-resin.jpg" alt="rPET Food-Grade Natural Granules" class="product-card-img">
          </a>
          <div class="product-badge-row">
            <span class="polymer-code">PCR-PET-01</span>
            <span class="grade-pill">Bottle &amp; Thermoform Grade</span>
          </div>
          <h4><a href="/product-single">rPET Food-Grade Natural Granules</a></h4>
          <p>Food-grade, SSP-decontaminated post-consumer PET resin formulated for bottle blow molding, beverage bottles, and thermoformed trays.</p>
          <div class="tech-specs-mini">
            <div><span class="spec-mini-k">MFI:</span> <span class="spec-mini-v">28</span></div>
            <div><span class="spec-mini-k">Purity:</span> <span class="spec-mini-v">99.9%</span></div>
            <div><span class="spec-mini-k">Color:</span> <span class="spec-mini-v">Clear</span></div>
            <div><span class="spec-mini-k">Density:</span> <span class="spec-mini-v">1.34 g/cm³</span></div>
          </div>
          <div class="prod-btn-row">
            <a href="/product-single" class="prod-btn-tds">Full TDS Page</a>
            <button type="button" class="prod-btn-inquire inquire-prod-btn" data-product-name="rPET Food-Grade Natural Granules">Inquire Specs</button>
          </div>
        </div>

        <div class="product-card">
          <a href="/products/rhdpe-blow-resin" class="product-card-img-link">
            <img src="/assets/images/product-rhdpe-pellets.jpg" alt="rHDPE High-Density Natural / Blue Flakes &amp; Granules" class="product-card-img">
          </a>
          <div class="product-badge-row">
            <span class="polymer-code">PCR-HDPE-02</span>
            <span class="grade-pill">Blow Molding Grade</span>
          </div>
          <h4><a href="/products/rhdpe-blow-resin">rHDPE High-Density Natural / Blue Flakes &amp; Granules</a></h4>
          <p>Engineered for high Environmental Stress Crack Resistance (ESCR). Premium resin for home care, industrial drums, and packaging.</p>
          <div class="tech-specs-mini">
            <div><span class="spec-mini-k">MFI:</span> <span class="spec-mini-v">0.30</span></div>
            <div><span class="spec-mini-k">Purity:</span> <span class="spec-mini-v">99.5%</span></div>
            <div><span class="spec-mini-k">Color:</span> <span class="spec-mini-v">Natural Translucent &amp; Blue</span></div>
            <div><span class="spec-mini-k">Density:</span> <span class="spec-mini-v">0.954 g/cm³</span></div>
          </div>
          <div class="prod-btn-row">
            <a href="/products/rhdpe-blow-resin" class="prod-btn-tds">Full TDS Page</a>
            <button type="button" class="prod-btn-inquire inquire-prod-btn" data-product-name="rHDPE High-Density Natural / Blue Flakes &amp; Granules">Inquire Specs</button>
          </div>
        </div>

        <div class="product-card">
          <a href="/products/rpp-injection-copolymer" class="product-card-img-link">
            <img src="/assets/images/extrusion-pelletizing-line.jpg" alt="rPP High-Impact Copolymer &amp; Homopolymer" class="product-card-img">
          </a>
          <div class="product-badge-row">
            <span class="polymer-code">PCR-PP-03</span>
            <span class="grade-pill">Injection Molding Grade</span>
          </div>
          <h4><a href="/products/rpp-injection-copolymer">rPP High-Impact Copolymer &amp; Homopolymer</a></h4>
          <p>High-rigidity recycled polypropylene granules formulated for automotive components, battery casings, furniture, and containers.</p>
          <div class="tech-specs-mini">
            <div><span class="spec-mini-k">MFI:</span> <span class="spec-mini-v">12</span></div>
            <div><span class="spec-mini-k">Purity:</span> <span class="spec-mini-v">99.2%</span></div>
            <div><span class="spec-mini-k">Color:</span> <span class="spec-mini-v">Black</span></div>
            <div><span class="spec-mini-k">Density:</span> <span class="spec-mini-v">0.905 g/cm³</span></div>
          </div>
          <div class="prod-btn-row">
            <a href="/products/rpp-injection-copolymer" class="prod-btn-tds">Full TDS Page</a>
            <button type="button" class="prod-btn-inquire inquire-prod-btn" data-product-name="rPP High-Impact Copolymer &amp; Homopolymer">Inquire Specs</button>
          </div>
        </div>

        <div class="product-card">
          <a href="/products" class="product-card-img-link">
            <img src="/assets/images/polymer-testing-lab.jpg" alt="rLDPE Optical Film Grade Granules" class="product-card-img">
          </a>
          <div class="product-badge-row">
            <span class="polymer-code">PCR-LDPE-04</span>
            <span class="grade-pill">Blown Film Grade</span>
          </div>
          <h4><a href="/products">rLDPE Optical Film Grade Granules</a></h4>
          <p>Clean, flexible recycled low-density polyethylene pellets optimized for secondary shrink wrap, courier bags, and agricultural film.</p>
          <div class="tech-specs-mini">
            <div><span class="spec-mini-k">MFI:</span> <span class="spec-mini-v">0.8</span></div>
            <div><span class="spec-mini-k">Purity:</span> <span class="spec-mini-v">99.1%</span></div>
            <div><span class="spec-mini-k">Color:</span> <span class="spec-mini-v">Semi-Transparent Natural</span></div>
            <div><span class="spec-mini-k">Density:</span> <span class="spec-mini-v">0.922 g/cm³</span></div>
          </div>
          <div class="prod-btn-row">
            <a href="/products" class="prod-btn-tds">Full TDS Page</a>
            <button type="button" class="prod-btn-inquire inquire-prod-btn" data-product-name="rLDPE Optical Film Grade Granules">Inquire Specs</button>
          </div>
        </div>

        <div class="product-card">
          <a href="/products/refuse-derived-fuel" class="product-card-img-link">
            <img src="/assets/images/service-rdf-fuel.jpg" alt="Refuse Derived Fuel (RDF Fluff / Briquettes)" class="product-card-img">
          </a>
          <div class="product-badge-row">
            <span class="polymer-code">RDF-KILN-05</span>
            <span class="grade-pill">Industrial Co-Processing</span>
          </div>
          <h4><a href="/products/refuse-derived-fuel">Refuse Derived Fuel (RDF Fluff / Briquettes)</a></h4>
          <p>High-calorific alternative fuel manufactured from non-recyclable segregated combustible fractions, engineered for kiln co-processing.</p>
          <div class="tech-specs-mini">
            <div><span class="spec-mini-k">MFI:</span> <span class="spec-mini-v">Calorific:</span></div>
            <div><span class="spec-mini-k">Purity:</span> <span class="spec-mini-v">Chlorine &lt;0.5%</span></div>
            <div><span class="spec-mini-k">Color:</span> <span class="spec-mini-v">Industrial Matrix</span></div>
            <div><span class="spec-mini-k">Density:</span> <span class="spec-mini-v">Briquette / Fluff Form</span></div>
          </div>
          <div class="prod-btn-row">
            <a href="/products/refuse-derived-fuel" class="prod-btn-tds">Full TDS Page</a>
            <button type="button" class="prod-btn-inquire inquire-prod-btn" data-product-name="Refuse Derived Fuel (RDF Fluff / Briquettes)">Inquire Specs</button>
          </div>
        </div>
      </div>

      <div style="text-align: center; margin-top: 42px;">
        <a href="/products" class="btn btn-secondary btn-lg view-catalog-cta">
          View Complete Product Matrix &amp; Technical Datasheets &rarr;
        </a>
      </div>
    </div>
  </section>

  <style>
    /* Premium PCR Granules Catalog Styles matching pixel-perfect design */
    #productsSection.home-products-section {
      position: relative;
      background-color: #fbfdfc;
      background-image: 
        radial-gradient(circle at 50% 18%, rgba(187, 247, 233, 0.45) 0%, rgba(240, 253, 250, 0.25) 50%, rgba(251, 253, 252, 0) 100%),
        linear-gradient(rgba(13, 148, 136, 0.045) 1px, transparent 1px),
        linear-gradient(90deg, rgba(13, 148, 136, 0.045) 1px, transparent 1px);
      background-size: 100% 100%, 42px 42px, 42px 42px;
      padding: 80px 0;
      border-top: 1px solid #edf2f7;
      border-bottom: 1px solid #edf2f7;
    }

    #productsSection .section-header {
      text-align: center;
      margin-bottom: 30px;
    }

    #productsSection .section-tag {
      display: inline-flex;
      align-items: center;
      gap: 7px;
      border: 1.5px solid rgba(5, 150, 105, 0.4);
      background: rgba(5, 150, 105, 0.06);
      color: #059669;
      font-weight: 700;
      font-size: 0.74rem;
      text-transform: uppercase;
      letter-spacing: 0.8px;
      border-radius: 9999px;
      padding: 6px 18px;
      margin-bottom: 14px;
    }

    #productsSection .section-tag svg {
      width: 13px;
      height: 13px;
    }

    #productsSection .section-title {
      font-size: clamp(2rem, 3.8vw, 2.75rem);
      font-weight: 800;
      color: #0f172a;
      margin-bottom: 12px;
      letter-spacing: -0.02em;
    }

    #productsSection .gradient-text {
      background: linear-gradient(135deg, #00a88f 0%, #0284c7 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    #productsSection .section-desc {
      max-width: 680px;
      margin: 0 auto;
      font-size: 0.96rem;
      color: #64748b;
      line-height: 1.6;
    }

    #productsSection .solution-tabs {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 10px;
      margin-bottom: 40px;
    }

    #productsSection .product-filter-btn {
      background: #ffffff;
      color: #334155;
      border: 1px solid #cbd5e1;
      border-radius: 9999px;
      padding: 9px 22px;
      font-size: 0.88rem;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.2s ease;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.03);
    }

    #productsSection .product-filter-btn:hover {
      border-color: #00a88f;
      color: #00a88f;
      background: #f8fafc;
    }

    #productsSection .product-filter-btn.active {
      background: #00a88f;
      color: #ffffff;
      border-color: #00a88f;
      box-shadow: 0 4px 14px rgba(0, 168, 143, 0.3);
    }

    #productsSection .grid-3 {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 26px;
    }

    @media (max-width: 991px) {
      #productsSection .grid-3 {
        grid-template-columns: repeat(2, 1fr);
      }
    }

    @media (max-width: 640px) {
      #productsSection .grid-3 {
        grid-template-columns: 1fr;
      }
    }

    #productsSection .product-card {
      background: #ffffff;
      border: 1px solid #e2e8f0;
      border-radius: 20px;
      padding: 18px;
      display: flex;
      flex-direction: column;
      box-shadow: 0 4px 20px rgba(15, 23, 42, 0.04);
      transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
    }

    #productsSection .product-card:hover {
      transform: translateY(-4px);
      border-color: #00a88f;
      box-shadow: 0 12px 28px rgba(0, 168, 143, 0.12);
    }

    #productsSection .product-card-img-link {
      display: block;
      overflow: hidden;
      border-radius: 12px;
      margin-bottom: 14px;
      background: #f8fafc;
    }

    #productsSection .product-card-img {
      width: 100%;
      height: 180px;
      object-fit: cover;
      display: block;
      border-radius: 12px;
      transition: transform 0.35s ease;
    }

    #productsSection .product-card:hover .product-card-img {
      transform: scale(1.03);
    }

    #productsSection .product-badge-row {
      display: flex;
      justify-content: space-between;
      align-items: center;
      gap: 8px;
      margin-bottom: 12px;
    }

    #productsSection .polymer-code {
      font-family: var(--font-mono, monospace);
      font-size: 0.72rem;
      font-weight: 700;
      background: #ecfdf5;
      color: #059669;
      border: 1px solid #a7f3d0;
      padding: 4px 10px;
      border-radius: 9999px;
      letter-spacing: 0.3px;
    }

    #productsSection .grade-pill {
      font-size: 0.72rem;
      font-weight: 600;
      color: #d97706;
      background: #fef3c7;
      border: 1px solid #fde68a;
      padding: 4px 10px;
      border-radius: 9999px;
    }

    #productsSection .product-card h4 {
      font-size: 1.1rem;
      font-weight: 700;
      color: #0f172a;
      line-height: 1.35;
      margin: 0 0 8px 0;
    }

    #productsSection .product-card h4 a {
      color: #0f172a;
      text-decoration: none;
      transition: color 0.2s ease;
    }

    #productsSection .product-card h4 a:hover {
      color: #00a88f;
    }

    #productsSection .product-card p {
      font-size: 0.85rem;
      color: #64748b;
      line-height: 1.55;
      margin: 0 0 16px 0;
      flex-grow: 1;
    }

    #productsSection .tech-specs-mini {
      background: #f0fdf9;
      border: 1px solid #ccfbf1;
      border-radius: 10px;
      padding: 12px 14px;
      margin-bottom: 18px;
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 8px 12px;
      font-size: 0.82rem;
      width: 100%;
    }

    #productsSection .spec-mini-k {
      color: #64748b;
      font-weight: 500;
    }

    #productsSection .spec-mini-v {
      color: #0f172a;
      font-weight: 700;
    }

    #productsSection .prod-btn-row {
      display: flex;
      gap: 10px;
      margin-top: auto;
    }

    #productsSection .prod-btn-tds {
      flex: 1;
      text-align: center;
      border-radius: 9999px;
      padding: 9px 12px;
      font-size: 0.85rem;
      font-weight: 600;
      background: #f1f5f9;
      color: #1e293b;
      border: 1px solid #e2e8f0;
      text-decoration: none;
      transition: all 0.2s ease;
      display: inline-flex;
      align-items: center;
      justify-content: center;
    }

    #productsSection .prod-btn-tds:hover {
      background: #e2e8f0;
      color: #0f172a;
    }

    #productsSection .prod-btn-inquire {
      flex: 1;
      text-align: center;
      border-radius: 9999px;
      padding: 9px 12px;
      font-size: 0.85rem;
      font-weight: 600;
      background: #00a88f;
      color: #ffffff;
      border: none;
      cursor: pointer;
      transition: all 0.2s ease;
      box-shadow: 0 2px 8px rgba(0, 168, 143, 0.25);
      display: inline-flex;
      align-items: center;
      justify-content: center;
    }

    #productsSection .prod-btn-inquire:hover {
      background: #028e7a;
      transform: translateY(-1px);
      box-shadow: 0 4px 12px rgba(0, 168, 143, 0.35);
    }

    #productsSection .view-catalog-cta {
      border-radius: 9999px;
      padding: 13px 32px;
      font-weight: 600;
      font-size: 0.95rem;
      background: #ffffff;
      color: #0f172a;
      border: 1px solid #cbd5e1;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
      display: inline-flex;
      align-items: center;
      justify-content: center;
      text-decoration: none;
      transition: all 0.2s ease;
    }

    #productsSection .view-catalog-cta:hover {
      border-color: #00a88f;
      color: #00a88f;
      box-shadow: 0 4px 14px rgba(0, 168, 143, 0.15);
    }
  </style>
  </section>

  <!-- Pan-India Circular Processing Network & State Map Section -->
  <section class="section">
    <div class="container">
      <div class="section-header reveal-on-scroll">
        <div class="section-tag">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6"></polygon>
            <line x1="8" y1="2" x2="8" y2="18"></line>
            <line x1="16" y1="6" x2="16" y2="22"></line>
          </svg>
          <span>Pan-India Circular Footprint</span>
        </div>
        <h2 class="section-title">Nationwide Processing & <span class="gradient-text">State Circulation Map</span></h2>
        <p class="section-desc">
          Powering circular plastic supply chains across major Indian industrial hubs, ports, and municipal corridors with
          CPCB-registered EPR compliance.
        </p>
      </div>

      <!-- India Map & Regional Hub Details -->
      <div class="india-map-card reveal-on-scroll">
        <div class="india-map-grid">
          <!-- Left: High-Res India Circular Map Visual -->
          <div class="india-map-visual-wrap">
            <img src="/assets/images/india-circular-map.jpg"
              alt="Pan-India Circular Plastic Recycling and Supply Chain Map" class="india-map-visual-img">
            <div class="india-map-badge">
              <span
                style="display: inline-block; width: 8px; height: 8px; border-radius: 50%; background: var(--accent-emerald);"></span>
              <span>CPCB Registered • 120,000+ MT/yr Pan-India Capacity</span>
            </div>
          </div>

          <!-- Right: Interactive Indian State Hub Selector -->
          <div class="india-map-sidebar">
            <div>
              <span class="section-tag" style="margin-bottom: 8px;">State Hub Network</span>
              <h4 id="indiaHubTitle" style="font-size: 1.25rem; margin-bottom: 6px;">Western Hub (Gujarat & Maharashtra)
              </h4>
              <p id="indiaHubDesc"
                style="font-size: 0.88rem; color: var(--text-muted); line-height: 1.6; margin-bottom: 14px;">
                Dahej extrusion campus, Surat wash lines, and Mumbai urban baling networks handling high-volume rigid PET
                and HDPE bottles.
              </p>

              <div class="india-hub-list">
                <button class="india-hub-btn active" data-hub="0">
                  <div>
                    <span class="india-hub-title">Western Hub (Gujarat & Maharashtra)</span>
                    <span class="india-hub-sub">Dahej, Surat & Mumbai Processing Plants</span>
                  </div>
                  <span class="india-hub-pill">50,000 MT/yr</span>
                </button>

                <button class="india-hub-btn" data-hub="1">
                  <div>
                    <span class="india-hub-title">Northern Corridor (Delhi-NCR & Haryana)</span>
                    <span class="india-hub-sub">Automated NIR Sorting & Brand EPR Hub</span>
                  </div>
                  <span class="india-hub-pill">35,000 MT/yr</span>
                </button>

                <button class="india-hub-btn" data-hub="2">
                  <div>
                    <span class="india-hub-title">Southern Hub (Bengaluru & Chennai)</span>
                    <span class="india-hub-sub">Food-Grade Decontamination & Tech Park Sourcing</span>
                  </div>
                  <span class="india-hub-pill">25,000 MT/yr</span>
                </button>

                <button class="india-hub-btn" data-hub="3">
                  <div>
                    <span class="india-hub-title">Central Model Hub (Indore & MP)</span>
                    <span class="india-hub-sub">Smart City Zero-Waste Municipal MRFs</span>
                  </div>
                  <span class="india-hub-pill">15,000 MT/yr</span>
                </button>

                <button class="india-hub-btn" data-hub="4">
                  <div>
                    <span class="india-hub-title">Eastern Zone (Kolkata & Coastal Odisha)</span>
                    <span class="india-hub-sub">Industrial Cement RDF & Ocean Plastics</span>
                  </div>
                  <span class="india-hub-pill">10,000 MT/yr</span>
                </button>
              </div>
            </div>

            <div style="display: flex; gap: 12px; margin-top: 10px; flex-wrap: wrap;">
              <a href="/about#infrastructure" class="btn btn-secondary btn-sm">Explore Indian Infrastructure →</a>
              <button class="btn btn-primary btn-sm" data-open-modal="consultationModal">CPCB EPR Filing Desk</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Indian Facility & Clean Operations Strip -->
      <div class="india-facility-strip reveal-on-scroll">
        <img src="/assets/images/india-mrf-facility.jpg" alt="Modern Plastic Recycling Plant in India"
          class="india-facility-img">
        <div class="india-facility-content">
          <span class="section-tag" style="margin-bottom: 10px;">Mechanized Clean India Infrastructure</span>
          <h3 style="font-size: 1.4rem; margin-bottom: 10px;">Automated Material Recovery & Workforce Welfare Across India
          </h3>
          <p style="font-size: 0.9rem; color: var(--text-muted); line-height: 1.65; margin-bottom: 18px;">
            Our ISO-audited Indian recycling campuses feature conveyorized optical sorting, automated granulation, and
            direct digital DBT wage disbursements to 4,500+ formalized collection workers.
          </p>
          <div style="display: flex; gap: 12px; flex-wrap: wrap;">
            <span class="cert-pill">CPCB Portal Registered</span>
            <span class="cert-pill">Zero Child Labor Verified</span>
            <span class="cert-pill">State Pollution Board Compliant</span>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- Client Testimonials & Enterprise Endorsements Section (Scrollable Carousel) -->
  <section class="section" style="background: var(--bg-surface-elevated);">
    <div class="container">
      <div class="section-header reveal-on-scroll">
        <div class="section-tag">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path
              d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z">
            </path>
          </svg>
          <span>Verified Client Testimonials</span>
        </div>
        <h2 class="section-title">Enterprise <span class="gradient-text">Endorsements & Reviews</span></h2>
        <p class="section-desc">
          What sustainability executives, procurement leaders, and municipal commissioners say about partnering with
          SHRISTIYAM.
        </p>
      </div>

      <!-- Scrollable Testimonials Carousel -->
      <div class="testimonials-slider-wrapper reveal-on-scroll">
        <div class="testimonials-track" id="testimonialsTrack">
          @forelse($testimonials as $index => $item)
            <div class="testimonial-card">
              <div class="testimonial-top-row">
                <div class="stars-rating" aria-label="{{ $item->rating }} out of 5 stars">
                  @for($i = 1; $i <= 5; $i++)
                    @if($i <= $item->rating)
                      <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                        <polygon
                          points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                        </polygon>
                      </svg>
                    @else
                      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polygon
                          points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                        </polygon>
                      </svg>
                    @endif
                  @endfor
                </div>
                @if(!empty($item->badge))
                  <span class="cert-pill">{{ $item->badge }}</span>
                @endif
              </div>
              <p class="testimonial-quote">
                “{{ $item->quote }}”
              </p>
              <div class="testimonial-author-row">
                <img src="{{ $item->avatar_url }}" alt="{{ $item->author_name }}" class="author-avatar-img"
                  onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($item->author_name) }}&background=059669&color=ffffff';">
                <div class="author-info">
                  <h5>{{ $item->author_name }}</h5>
                  @if(!empty($item->author_role))
                    <span>{{ $item->author_role }}</span>
                  @endif
                </div>
              </div>
            </div>
          @empty
            <div class="testimonial-card" style="text-align: center; padding: 36px 24px;">
              <p class="testimonial-quote" style="font-style: normal; color: var(--text-muted);">
                Client testimonials are being curated. Check back shortly.
              </p>
            </div>
          @endforelse
        </div>

        <!-- Slider Controls: Previous / Next & Pagination Dots -->
        <div class="slider-controls-row">
          <div class="slider-dots" id="testimonialDots">
            @if(isset($testimonials) && count($testimonials) > 0)
              @foreach($testimonials as $index => $item)
                <button class="slider-dot {{ $loop->first ? 'active' : '' }}" data-index="{{ $index }}"
                  aria-label="Slide {{ $index + 1 }}"></button>
              @endforeach
            @else
              <button class="slider-dot active" data-index="0" aria-label="Slide 1"></button>
            @endif
          </div>

          <div class="slider-nav-btns">
            <button class="slider-nav-btn" id="prevTestimonialBtn" aria-label="Previous Testimonial">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                <polyline points="15 18 9 12 15 6"></polyline>
              </svg>
            </button>
            <button class="slider-nav-btn" id="nextTestimonialBtn" aria-label="Next Testimonial">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                <polyline points="9 18 15 12 9 6"></polyline>
              </svg>
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>



  <!-- Worker Empowerment Spotlight -->
  <section class="section">
    <div class="container">
      <div class="safai-banner reveal-on-scroll">
        <div>
          <div class="section-tag">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
              <circle cx="9" cy="7" r="4"></circle>
            </svg>
            <span>Dignity at the Community</span>
          </div>
          <h2 style="font-size: clamp(1.9rem, 3.4vw, 2.5rem); margin-bottom: 16px;">
            Empowering <span class="gradient-text">3,200+ Waste Collectors</span>
          </h2>
          <p style="font-size: 1rem; line-height: 1.7; margin-bottom: 22px; color: var(--text-muted);">
            Informal waste collectors are the vital foundation of modern circular supply chains. SHRISTIYAM provides direct
            digital compensation, personal protective equipment, health camps, and formal recognition.
          </p>
          <a href="/about" class="btn btn-primary">
            Read Social Impact Case Studies →
          </a>
        </div>

        <div class="safai-stat-cards">
          <div class="safai-card">
            <div class="safai-card-val">42%</div>
            <div class="safai-card-lbl">Average Monthly Income Increase</div>
          </div>
          <div class="safai-card">
            <div class="safai-card-val">100%</div>
            <div class="safai-card-lbl">Direct Digital Wage Transparency</div>
          </div>
          <div class="safai-card">
            <div class="safai-card-val">65%</div>
            <div class="safai-card-lbl">Women Waste Leaders Empowered</div>
          </div>
          <div class="safai-card">
            <div class="safai-card-val">4,000+</div>
            <div class="safai-card-lbl">Health & Safety Kits Distributed</div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection