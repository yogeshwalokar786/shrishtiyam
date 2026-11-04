@extends('layouts.site')

@section('title', 'rPET Food-Grade Natural Granules (PCR-PET-01) | Technical TDS | CircuFlow')
@section('meta_description', 'Technical Datasheet for high-intrinsic viscosity food-grade post-consumer recycled PET granules. Compliant with CPCB, US-FDA, and EFSA food-contact safety thresholds.')

@section('content')
<!-- Product Showcase Section -->
  <section class="section" style="padding-top: 140px; padding-bottom: 50px;">
    <div class="container">
      <!-- Breadcrumbs -->
      <div style="display: flex; align-items: center; gap: 8px; font-size: 0.84rem; color: var(--text-muted); margin-bottom: 24px;">
        <a href="/">Home</a> <span>/</span> <a href="/products">Products</a> <span>/</span> <span style="color: var(--accent-emerald); font-weight: 600;">rPET Food-Grade Granules</span>
      </div>

      <div class="grid-2" style="align-items: start; gap: 48px;">
        <!-- Left: Product Visual Gallery -->
        <div class="reveal-on-scroll">
          <div style="background: #ffffff; border: 1px solid var(--border-medium); border-radius: var(--radius-lg); overflow: hidden; box-shadow: var(--shadow-md); padding: 18px; margin-bottom: 16px;">
            <img src="/assets/images/product-rpet-resin.jpg" alt="rPET Food Grade Natural Granules" style="width: 100%; height: 380px; object-fit: contain; display: block; border-radius: var(--radius-sm);">
          </div>
          <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 12px;">
            <div style="border: 1px solid var(--border-medium); border-radius: var(--radius-sm); overflow: hidden; height: 90px; cursor: pointer;">
              <img src="/assets/images/product-rpet-resin.jpg" alt="Petri Dish Granules" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
            <div style="border: 1px solid var(--border-medium); border-radius: var(--radius-sm); overflow: hidden; height: 90px; cursor: pointer;">
              <img src="/assets/images/blog-rpet-bottles.jpg" alt="rPET Blow Molded Bottles" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
            <div style="border: 1px solid var(--border-medium); border-radius: var(--radius-sm); overflow: hidden; height: 90px; cursor: pointer;">
              <img src="/assets/images/polymer-testing-lab.jpg" alt="Quality Lab Testing" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
          </div>
        </div>

        <!-- Right: Commercial & Technical Overview -->
        <div class="reveal-on-scroll reveal-delay-1">
          <div class="product-badge-row" style="margin-bottom: 12px;">
            <span class="polymer-code" style="font-size: 0.9rem; padding: 6px 14px;">GRADE: PCR-PET-01</span>
            <span class="grade-pill" style="font-size: 0.85rem; padding: 6px 14px;">Food-Contact Compliant</span>
          </div>
          <h1 style="font-size: clamp(2rem, 3.5vw, 2.8rem); line-height: 1.25; margin-bottom: 14px;">
            rPET Food-Grade <span class="gradient-text">Natural Granules</span>
          </h1>
          <p style="font-size: 1.02rem; color: var(--text-muted); line-height: 1.7; margin-bottom: 22px;">
            Manufactured via twin-screw continuous vacuum degassing and solid-state polycondensation (SSP). Designed to replace 100% virgin PET in preforms, beverage bottles, cosmetic packaging, and thermoformed food trays.
          </p>

          <!-- Core Highlights Matrix with Icons -->
          <div class="tech-specs-mini" style="grid-template-columns: repeat(2, 1fr); padding: 20px; margin-bottom: 24px; gap: 14px;">
            <div style="display: flex; align-items: center; gap: 10px;">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--accent-emerald)" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
              <div><span class="spec-mini-k" style="display: block; font-size: 0.76rem;">Intrinsic Viscosity (IV):</span> <span class="spec-mini-v">0.78 - 0.82 dL/g</span></div>
            </div>
            <div style="display: flex; align-items: center; gap: 10px;">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--accent-emerald)" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
              <div><span class="spec-mini-k" style="display: block; font-size: 0.76rem;">Polymer Purity:</span> <span class="spec-mini-v">99.9% Food-Safe</span></div>
            </div>
            <div style="display: flex; align-items: center; gap: 10px;">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--accent-emerald)" stroke-width="2"><path d="M10 2v7.31"></path><path d="M14 9.3V1.99"></path><path d="M8.5 2h7"></path><path d="M14 9.3a6.5 6.5 0 1 1-4 0"></path></svg>
              <div><span class="spec-mini-k" style="display: block; font-size: 0.76rem;">Acetaldehyde (AA):</span> <span class="spec-mini-v">&lt; 1.0 ppm (No Taint)</span></div>
            </div>
            <div style="display: flex; align-items: center; gap: 10px;">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--accent-emerald)" stroke-width="2"><line x1="12" y1="2" x2="12" y2="22"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
              <div><span class="spec-mini-k" style="display: block; font-size: 0.76rem;">Bulk Density:</span> <span class="spec-mini-v">0.82 - 0.86 g/cm³</span></div>
            </div>
            <div style="display: flex; align-items: center; gap: 10px;">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--accent-emerald)" stroke-width="2"><circle cx="12" cy="12" r="5"></circle><line x1="12" y1="1" x2="12" y2="3"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line><line x1="1" y1="12" x2="3" y2="12"></line><line x1="21" y1="12" x2="23" y2="12"></line></svg>
              <div><span class="spec-mini-k" style="display: block; font-size: 0.76rem;">Color Index:</span> <span class="spec-mini-v">L* ≥ 75, b* ≤ 2.5</span></div>
            </div>
            <div style="display: flex; align-items: center; gap: 10px;">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--accent-emerald)" stroke-width="2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path></svg>
              <div><span class="spec-mini-k" style="display: block; font-size: 0.76rem;">Pellet Geometry:</span> <span class="spec-mini-v">2.5 - 3.0 mm Lens</span></div>
            </div>
          </div>

          <div style="display: flex; gap: 14px; flex-wrap: wrap;">
            <button class="btn btn-primary btn-lg" data-open-modal="consultationModal">Request 5kg Sample Kit & Pricing</button>
            <a href="#tds-table" class="btn btn-secondary btn-lg">View Full TDS Matrix ↓</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Complete Technical Data Sheet (TDS) Table -->
  <section class="section" id="tds-table" style="background: var(--bg-surface-elevated);">
    <div class="container">
      <div class="section-header reveal-on-scroll">
        <div class="section-tag">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line></svg>
          <span>Laboratory Verified Specifications</span>
        </div>
        <h2 class="section-title">Technical Data Sheet <span class="gradient-text">(TDS) Matrix</span></h2>
        <p class="section-desc">Certified values tested under standard ASTM laboratory conditions at 23°C and 50% relative humidity.</p>
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
              <td style="padding: 14px 20px; font-weight: 600;">Intrinsic Viscosity (IV)</td>
              <td style="padding: 14px 20px; font-family: var(--font-mono); color: var(--text-muted);">ASTM D4603</td>
              <td style="padding: 14px 20px;">dL/g</td>
              <td style="padding: 14px 20px; font-weight: 700; color: var(--accent-emerald);">0.80 ± 0.02</td>
            </tr>
            <tr style="border-bottom: 1px solid var(--border-subtle); background: var(--bg-surface-elevated);">
              <td style="padding: 14px 20px; font-weight: 600;">Melt Flow Index (MFI @ 280°C, 2.16kg)</td>
              <td style="padding: 14px 20px; font-family: var(--font-mono); color: var(--text-muted);">ASTM D1238</td>
              <td style="padding: 14px 20px;">g/10 min</td>
              <td style="padding: 14px 20px; font-weight: 700;">28 – 32</td>
            </tr>
            <tr style="border-bottom: 1px solid var(--border-subtle);">
              <td style="padding: 14px 20px; font-weight: 600;">Density @ 23°C</td>
              <td style="padding: 14px 20px; font-family: var(--font-mono); color: var(--text-muted);">ASTM D792</td>
              <td style="padding: 14px 20px;">g/cm³</td>
              <td style="padding: 14px 20px; font-weight: 700;">1.34</td>
            </tr>
            <tr style="border-bottom: 1px solid var(--border-subtle); background: var(--bg-surface-elevated);">
              <td style="padding: 14px 20px; font-weight: 600;">Melting Point (Peak DSC)</td>
              <td style="padding: 14px 20px; font-family: var(--font-mono); color: var(--text-muted);">ASTM D3418</td>
              <td style="padding: 14px 20px;">°C</td>
              <td style="padding: 14px 20px; font-weight: 700;">248 – 252</td>
            </tr>
            <tr style="border-bottom: 1px solid var(--border-subtle);">
              <td style="padding: 14px 20px; font-weight: 600;">Crystallinity</td>
              <td style="padding: 14px 20px; font-family: var(--font-mono); color: var(--text-muted);">Density Gradient</td>
              <td style="padding: 14px 20px;">%</td>
              <td style="padding: 14px 20px; font-weight: 700;">≥ 45%</td>
            </tr>
            <tr style="border-bottom: 1px solid var(--border-subtle); background: var(--bg-surface-elevated);">
              <td style="padding: 14px 20px; font-weight: 600;">Acetaldehyde (AA) Content</td>
              <td style="padding: 14px 20px; font-family: var(--font-mono); color: var(--text-muted);">Headspace GC-MS</td>
              <td style="padding: 14px 20px;">ppm</td>
              <td style="padding: 14px 20px; font-weight: 700; color: var(--accent-emerald);">&lt; 1.0 (Zero Taint)</td>
            </tr>
            <tr style="border-bottom: 1px solid var(--border-subtle);">
              <td style="padding: 14px 20px; font-weight: 600;">Color Value L* (Lightness)</td>
              <td style="padding: 14px 20px; font-family: var(--font-mono); color: var(--text-muted);">HunterLab CIE</td>
              <td style="padding: 14px 20px;">—</td>
              <td style="padding: 14px 20px; font-weight: 700;">≥ 75.0</td>
            </tr>
            <tr style="border-bottom: 1px solid var(--border-subtle); background: var(--bg-surface-elevated);">
              <td style="padding: 14px 20px; font-weight: 600;">Color Value b* (Yellowness)</td>
              <td style="padding: 14px 20px; font-family: var(--font-mono); color: var(--text-muted);">HunterLab CIE</td>
              <td style="padding: 14px 20px;">—</td>
              <td style="padding: 14px 20px; font-weight: 700;">≤ 2.5 (High Clarity)</td>
            </tr>
            <tr>
              <td style="padding: 14px 20px; font-weight: 600;">Residual Moisture Content</td>
              <td style="padding: 14px 20px; font-family: var(--font-mono); color: var(--text-muted);">Karl Fischer Titration</td>
              <td style="padding: 14px 20px;">%</td>
              <td style="padding: 14px 20px; font-weight: 700;">&lt; 0.3%</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </section>

  <!-- Processing Guidelines & Packaging Options -->
  <section class="section">
    <div class="container">
      <div class="grid-2" style="gap: 36px; align-items: stretch;">
        <!-- Processing Recommendations -->
        <div class="solution-card reveal-on-scroll">
          <div class="section-tag" style="margin-bottom: 12px;">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
            <span>Extrusion & Injection Advice</span>
          </div>
          <h3 style="font-size: 1.45rem; margin-bottom: 16px;">Recommended Processing Parameters</h3>
          <ul class="spec-list" style="margin-bottom: 18px;">
            <li class="spec-item">
              <span style="display: flex; align-items: center; gap: 8px;">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--accent-emerald)" stroke-width="2"><path d="M14 14.76V3.5a2.5 2.5 0 0 0-5 0v11.26a4.5 4.5 0 1 0 5 0z"></path></svg>
                Dehumidified Pre-Drying
              </span>
              <span>160°C – 175°C (4 to 6 Hours)</span>
            </li>
            <li class="spec-item">
              <span style="display: flex; align-items: center; gap: 8px;">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--accent-emerald)" stroke-width="2"><path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"></path></svg>
                Target Moisture Level
              </span>
              <span>&lt; 0.005% (50 ppm)</span>
            </li>
            <li class="spec-item">
              <span style="display: flex; align-items: center; gap: 8px;">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--accent-emerald)" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><path d="M12 6v6l4 2"></path></svg>
                Barrel Extrusion Zones
              </span>
              <span>265°C – 285°C</span>
            </li>
            <li class="spec-item">
              <span style="display: flex; align-items: center; gap: 8px;">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--accent-emerald)" stroke-width="2"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                Nozzle / Die Temperature
              </span>
              <span>275°C – 290°C</span>
            </li>
            <li class="spec-item">
              <span style="display: flex; align-items: center; gap: 8px;">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--accent-emerald)" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><path d="m4.93 4.93 4.24 4.24"></path><path d="m14.83 9.17 4.24-4.24"></path></svg>
                Mold Chilling Temperature
              </span>
              <span>8°C – 18°C</span>
            </li>
          </ul>
        </div>

        <!-- Packaging & Bulk Logistics -->
        <div class="solution-card reveal-on-scroll reveal-delay-1">
          <div class="section-tag" style="margin-bottom: 12px;">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>
            <span>Packaging & Supply Logistics</span>
          </div>
          <h3 style="font-size: 1.45rem; margin-bottom: 16px;">Commercial Supply Options</h3>
          <ul class="spec-list" style="margin-bottom: 18px;">
            <li class="spec-item">
              <span style="display: flex; align-items: center; gap: 8px;">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--accent-emerald)" stroke-width="2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path></svg>
                Standard Bag Packaging
              </span>
              <span>25 kg Multi-ply Poly-lined Bags</span>
            </li>
            <li class="spec-item">
              <span style="display: flex; align-items: center; gap: 8px;">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--accent-emerald)" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect></svg>
                Bulk Jumbo Octabins
              </span>
              <span>1,000 kg / 1,100 kg Big Bags</span>
            </li>
            <li class="spec-item">
              <span style="display: flex; align-items: center; gap: 8px;">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--accent-emerald)" stroke-width="2"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon></svg>
                Silo Tanker Delivery
              </span>
              <span>Bulk Pneumatic Discharge</span>
            </li>
            <li class="spec-item">
              <span style="display: flex; align-items: center; gap: 8px;">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--accent-emerald)" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                Minimum Order Quantity (MOQ)
              </span>
              <span>5 MT (Commercial) / 5 kg (Trial)</span>
            </li>
            <li class="spec-item">
              <span style="display: flex; align-items: center; gap: 8px;">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--accent-emerald)" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                Storage Shelf Life
              </span>
              <span>24 Months in dry sealed conditions</span>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- Target Applications Showcase -->
  <section class="section" style="background: var(--bg-surface-elevated);">
    <div class="container">
      <div class="section-header reveal-on-scroll">
        <div class="section-tag">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
          <span>Versatile Polymer Performance</span>
        </div>
        <h2 class="section-title">Engineered For <span class="gradient-text">Demanding Packaging</span></h2>
        <p class="section-desc">Delivering optical clarity, drop impact resistance, and zero smell across multiple molding processes.</p>
      </div>

      <div class="grid-4 reveal-on-scroll">
        <div class="solution-card">
          <img src="/assets/images/blog-rpet-bottles.jpg" alt="Beverage Bottles" class="solution-card-img">
          <div class="solution-card-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path></svg></div>
          <h4>Beverage & Water Bottles</h4>
          <p>Blow molding for mineral water, juices, and carbonated soft drink bottles with high barrier properties.</p>
        </div>

        <div class="solution-card">
          <img src="/assets/images/product-rpet-resin.jpg" alt="Thermoformed Food Packaging" class="solution-card-img">
          <div class="solution-card-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect></svg></div>
          <h4>Thermoformed Food Trays</h4>
          <p>Transparent clamshell containers, egg trays, and fresh bakery packaging with high stiffness.</p>
        </div>

        <div class="solution-card">
          <img src="/assets/images/polymer-testing-lab.jpg" alt="Cosmetic Jars" class="solution-card-img">
          <div class="solution-card-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><path d="M12 6v6l4 2"></path></svg></div>
          <h4>Cosmetic Jars & Closures</h4>
          <p>Injection molded premium cosmetic bottles, lotion pumps, and pharmaceutical containers.</p>
        </div>

        <div class="solution-card">
          <img src="/assets/images/product-rhdpe-pellets.jpg" alt="Polyester Staple Fiber" class="solution-card-img">
          <div class="solution-card-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon></svg></div>
          <h4>High-Tenacity Yarn & Strapping</h4>
          <p>Melt spinning for recycled polyester fiber, industrial strapping tapes, and non-woven fabrics.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Related Products Carousel -->
  <section class="section">
    <div class="container">
      <div class="section-header reveal-on-scroll">
        <div class="section-tag">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><path d="m4.93 4.93 4.24 4.24"></path><path d="m14.83 9.17 4.24-4.24"></path></svg>
          <span>Complete Circular Portfolio</span>
        </div>
        <h2 class="section-title">Related <span class="gradient-text">PCR Polymer Grades</span></h2>
        <p class="section-desc">Explore our full line of recycled engineering plastics.</p>
      </div>

      <div class="grid-3 reveal-on-scroll">
        <div class="product-card">
          <img src="/assets/images/product-rhdpe-pellets.jpg" alt="rHDPE Blow Molding Resin" class="product-card-img">
          <div class="solution-card-icon" style="margin-bottom: 8px;"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect></svg></div>
          <div class="product-badge-row">
            <span class="polymer-code">PCR-HDPE-02</span>
            <span class="grade-pill">Blow Molding Grade</span>
          </div>
          <h4>rHDPE High-Density Granules</h4>
          <p>Engineered for high Environmental Stress Crack Resistance (ESCR). Premium resin for home care and drums.</p>
          <a href="/products#rhdpe" class="btn btn-secondary btn-sm" style="margin-top: auto;">Explore rHDPE Specs →</a>
        </div>

        <div class="product-card">
          <img src="/assets/images/product-rpp-copolymer.jpg" alt="rPP Copolymer" class="product-card-img">
          <div class="solution-card-icon" style="margin-bottom: 8px;"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon></svg></div>
          <div class="product-badge-row">
            <span class="polymer-code">PCR-PP-03</span>
            <span class="grade-pill">Injection Grade</span>
          </div>
          <h4>rPP High-Impact Copolymer</h4>
          <p>High-rigidity recycled polypropylene granules formulated for automotive components and crates.</p>
          <a href="/products#rpp" class="btn btn-secondary btn-sm" style="margin-top: auto;">Explore rPP Specs →</a>
        </div>

        <div class="product-card">
          <img src="/assets/images/product-rldpe-film.jpg" alt="rLDPE Optical Film" class="product-card-img">
          <div class="solution-card-icon" style="margin-bottom: 8px;"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle></svg></div>
          <div class="product-badge-row">
            <span class="polymer-code">PCR-LDPE-04</span>
            <span class="grade-pill">Blown Film Grade</span>
          </div>
          <h4>rLDPE Optical Film Grade</h4>
          <p>Clean, flexible recycled low-density polyethylene pellets optimized for secondary shrink wrap.</p>
          <a href="/products#rldpe" class="btn btn-secondary btn-sm" style="margin-top: auto;">Explore rLDPE Specs →</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Modal Component -->
@endsection
