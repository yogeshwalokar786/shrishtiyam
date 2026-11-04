@extends('layouts.site')

@section('title', 'rHDPE High-Density Blow Resin (PCR-HDPE-02) | Technical TDS | ' . setting('site_name', 'SHRISTIYAM'))
@section('meta_description', 'Technical Datasheet for high-ESCR post-consumer recycled HDPE resin for blow molding, jerry cans, detergent bottles, and industrial containers.')

@section('head')
  <link rel="canonical" href="{{ url('/products/rhdpe-blow-resin') }}">
  <script type="application/ld+json">
  {
    "@@context": "https://schema.org",
    "@@type": "Product",
    "name": "rHDPE High-Density Blow Resin",
    "image": "{{ asset('/assets/images/product-rhdpe-pellets.jpg') }}",
    "description": "Engineered for high Environmental Stress Crack Resistance (ESCR). Premium resin for home care, industrial drums, and packaging.",
    "brand": {
      "@@type": "Brand",
      "name": "{{ setting('site_name', 'SHRISTIYAM') }}"
    },
    "sku": "PCR-HDPE-02"
  }
  </script>
@endsection

@section('content')
  <!-- Product Showcase Section -->
  <section class="section" style="padding-top: 140px; padding-bottom: 50px;">
    <div class="container">
      <!-- Breadcrumbs -->
      <div style="display: flex; align-items: center; gap: 8px; font-size: 0.84rem; color: var(--text-muted); margin-bottom: 18px;">
        <a href="/">Home</a> <span>/</span> <a href="/products">Products</a> <span>/</span> <span style="color: var(--accent-emerald); font-weight: 600;">rHDPE Blow Resin</span>
      </div>

      <!-- Quick Static Product Switcher Bar -->
      <div style="display: flex; gap: 8px; flex-wrap: wrap; margin-bottom: 30px; background: rgba(5, 150, 105, 0.04); padding: 8px 12px; border-radius: var(--radius-md); border: 1px solid rgba(5, 150, 105, 0.12);">
        <span style="font-size: 0.78rem; font-weight: 700; color: var(--text-muted); display: inline-flex; align-items: center; margin-right: 6px; text-transform: uppercase;">All Products:</span>
        <a href="/products/rpet-food-grade-granules" class="btn btn-outline" style="padding: 6px 14px; font-size: 0.8rem; border-radius: 999px; text-decoration: none;">1. rPET Food-Grade</a>
        <a href="/products/rhdpe-blow-resin" class="btn btn-primary" style="padding: 6px 14px; font-size: 0.8rem; border-radius: 999px; text-decoration: none;">2. rHDPE Blow Resin</a>
        <a href="/products/rpp-injection-copolymer" class="btn btn-outline" style="padding: 6px 14px; font-size: 0.8rem; border-radius: 999px; text-decoration: none;">3. rPP Copolymer</a>
        <a href="/products/industrial-rdf-fuel" class="btn btn-outline" style="padding: 6px 14px; font-size: 0.8rem; border-radius: 999px; text-decoration: none;">4. Industrial RDF Fuel</a>
      </div>

      <div class="grid-2" style="align-items: start; gap: 48px;">
        <div class="reveal-on-scroll">
          <div style="background: #ffffff; border: 1px solid var(--border-medium); border-radius: var(--radius-lg); overflow: hidden; box-shadow: var(--shadow-md); padding: 18px; margin-bottom: 16px;">
            <img src="/assets/images/product-rhdpe-pellets.jpg" alt="rHDPE High-Density Pellets" style="width: 100%; height: 380px; object-fit: contain; display: block; border-radius: var(--radius-sm);">
          </div>
        </div>

        <div class="reveal-on-scroll reveal-delay-1">
          <div class="product-badge-row" style="margin-bottom: 12px;">
            <span class="polymer-code" style="font-size: 0.9rem; padding: 6px 14px;">GRADE: PCR-HDPE-02</span>
            <span class="grade-pill" style="font-size: 0.85rem; padding: 6px 14px;">High ESCR Blow Grade</span>
          </div>
          <h1 style="font-size: clamp(2rem, 3.5vw, 2.8rem); line-height: 1.25; margin-bottom: 14px;">
            rHDPE High-Density <span class="gradient-text">Blow Resin</span>
          </h1>
          <p style="font-size: 1.02rem; color: var(--text-muted); line-height: 1.7; margin-bottom: 22px;">
            Engineered for high Environmental Stress Crack Resistance (ESCR). Premium resin for home care, industrial drums, jerry cans, and packaging containers.
          </p>

          <div class="tech-specs-mini" style="grid-template-columns: repeat(2, 1fr); padding: 20px; margin-bottom: 24px; gap: 14px;">
            <div style="display: flex; align-items: center; gap: 10px;">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--accent-emerald)" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
              <div><span class="spec-mini-k" style="display: block; font-size: 0.76rem;">Melt Flow Index (MFI):</span> <span class="spec-mini-v">0.30 - 0.45 g/10min</span></div>
            </div>
            <div style="display: flex; align-items: center; gap: 10px;">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--accent-emerald)" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
              <div><span class="spec-mini-k" style="display: block; font-size: 0.76rem;">Polymer Purity:</span> <span class="spec-mini-v">99.5%</span></div>
            </div>
            <div style="display: flex; align-items: center; gap: 10px;">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--accent-emerald)" stroke-width="2"><line x1="12" y1="2" x2="12" y2="22"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
              <div><span class="spec-mini-k" style="display: block; font-size: 0.76rem;">Density @ 23°C:</span> <span class="spec-mini-v">0.954 g/cm³</span></div>
            </div>
            <div style="display: flex; align-items: center; gap: 10px;">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--accent-emerald)" stroke-width="2"><circle cx="12" cy="12" r="5"></circle></svg>
              <div><span class="spec-mini-k" style="display: block; font-size: 0.76rem;">Color:</span> <span class="spec-mini-v">Natural &amp; Blue</span></div>
            </div>
          </div>

          <div style="display: flex; gap: 14px; flex-wrap: wrap;">
            <button class="btn btn-primary btn-lg" data-open-modal="consultationModal">Request Sample Kit &amp; Pricing</button>
            <a href="#tds-table" class="btn btn-secondary btn-lg">View Full TDS Matrix ↓</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Complete TDS Table -->
  <section class="section" id="tds-table" style="background: var(--bg-surface-elevated);">
    <div class="container">
      <div class="section-header reveal-on-scroll">
        <div class="section-tag">Laboratory Specifications</div>
        <h2 class="section-title">Technical Data Sheet <span class="gradient-text">(TDS) Matrix</span></h2>
        <p class="section-desc">Certified values for rHDPE Blow Molding Grade.</p>
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
              <td style="padding: 14px 20px; font-weight: 600;">Melt Flow Index (190°C / 2.16kg)</td>
              <td style="padding: 14px 20px; font-family: var(--font-mono); color: var(--text-muted);">ASTM D1238</td>
              <td style="padding: 14px 20px;">g/10 min</td>
              <td style="padding: 14px 20px; font-weight: 700; color: var(--accent-emerald);">0.30 – 0.45</td>
            </tr>
            <tr style="border-bottom: 1px solid var(--border-subtle); background: var(--bg-surface-elevated);">
              <td style="padding: 14px 20px; font-weight: 600;">Density @ 23°C</td>
              <td style="padding: 14px 20px; font-family: var(--font-mono); color: var(--text-muted);">ASTM D792</td>
              <td style="padding: 14px 20px;">g/cm³</td>
              <td style="padding: 14px 20px; font-weight: 700;">0.954</td>
            </tr>
            <tr style="border-bottom: 1px solid var(--border-subtle);">
              <td style="padding: 14px 20px; font-weight: 600;">Tensile Strength at Yield</td>
              <td style="padding: 14px 20px; font-family: var(--font-mono); color: var(--text-muted);">ASTM D638</td>
              <td style="padding: 14px 20px;">MPa</td>
              <td style="padding: 14px 20px; font-weight: 700;">≥ 24</td>
            </tr>
            <tr style="border-bottom: 1px solid var(--border-subtle); background: var(--bg-surface-elevated);">
              <td style="padding: 14px 20px; font-weight: 600;">ESCR (Condition B, 10% Igepal)</td>
              <td style="padding: 14px 20px; font-family: var(--font-mono); color: var(--text-muted);">ASTM D1693</td>
              <td style="padding: 14px 20px;">Hours</td>
              <td style="padding: 14px 20px; font-weight: 700; color: var(--accent-emerald);">&gt; 45 Hours</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </section>
@endsection
