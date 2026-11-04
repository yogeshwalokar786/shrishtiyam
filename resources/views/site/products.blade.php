@extends('layouts.site')

@section('title', 'Industrial Biofuels & Alternative Energy Products | ' . setting('site_name', 'SHRISTIYAM'))
@section('meta_description', 'High-calorific alternative fuels including Bio Energy Fuel (Biomass boiler fuel) and Refuse Derived Fuel (RDF) engineered for industrial coal replacement and zero-landfill co-processing.')

@section('content')
<!-- Page Header -->
  <section class="section" style="padding-top: 140px; padding-bottom: 36px;">
    <div class="container">
      <div class="section-header reveal-on-scroll">
        <div class="section-tag">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"></path></svg>
          <span>Alternative Energy Matrix</span>
        </div>
        <h1 style="font-size: clamp(2.3rem, 4.4vw, 3.5rem); margin-bottom: 16px;">
          Industrial <span class="gradient-text">Bioenergy &amp; Alternative Fuels</span>
        </h1>
        <p class="section-desc">
          Engineered from 100% agricultural residues and segregated combustible fractions to substitute fossil coal in industrial captive boilers and cement kilns.
        </p>
      </div>

      <!-- Filter Tabs -->
      <div class="solution-tabs reveal-on-scroll">
        <button class="solution-tab-btn product-filter-btn active" data-category="all">All Products (4)</button>
        <button class="solution-tab-btn product-filter-btn" data-category="bioenergy">Bio Energy Fuel</button>
        <button class="solution-tab-btn product-filter-btn" data-category="rdf">Refuse Derived Fuel (RDF)</button>
        <button class="solution-tab-btn product-filter-btn" data-category="rhdpe">rHDPE Blow Resin</button>
        <button class="solution-tab-btn product-filter-btn" data-category="rpp">rPP Copolymer</button>
      </div>
    </div>
  </section>

  <!-- Product Grid -->
  <section class="section" style="padding-top: 0;">
    <div class="container">
      <div class="grid-3" id="pcrProductGrid">
        <!-- Dynamically rendered by products.js -->
      </div>
    </div>
  </section>

  <!-- Technical Comparison Matrix -->
  <section class="section" style="background: var(--bg-surface-elevated);">
    <div class="container">
      <div class="section-header reveal-on-scroll">
        <div class="section-tag">Quality Benchmark</div>
        <h2 class="section-title">Products &amp; Fuels <span class="gradient-text">Comparison Matrix</span></h2>
        <p class="section-desc">Certified testing benchmarks under ASTM, EN, and ISO quality protocols.</p>
      </div>

      <div class="pipeline-specs-box reveal-on-scroll" style="overflow-x: auto; background: #ffffff;">
        <table style="width: 100%; border-collapse: collapse; min-width: 600px; text-align: left;">
          <thead>
            <tr style="border-bottom: 2px solid var(--border-medium); color: var(--accent-emerald); font-family: var(--font-mono); font-size: 0.88rem;">
              <th style="padding: 12px 14px;">Product</th>
              <th style="padding: 12px 14px;">Thermal / Melt Metric</th>
              <th style="padding: 12px 14px;">Moisture / Density</th>
              <th style="padding: 12px 14px;">Quality / Purity Benchmark</th>
              <th style="padding: 12px 14px;">Primary Industrial Application</th>
            </tr>
          </thead>
          <tbody style="font-size: 0.88rem;">
            <tr style="border-bottom: 1px solid var(--border-subtle);">
              <td style="padding: 14px 14px; font-weight: 700;">
                <a href="/products/bio-energy-fuel" style="color: var(--text-main); text-decoration: none;">1. Bio Energy Fuel</a>
              </td>
              <td style="padding: 14px 14px; font-family: var(--font-mono); color: var(--accent-emerald); font-weight: 700;">GCV &gt; 3,800 – 4,200 kcal/kg</td>
              <td style="padding: 14px 14px; font-family: var(--font-mono);">Moisture &lt; 10%</td>
              <td style="padding: 14px 14px; color: var(--text-main); font-weight: 600;">Ash &lt; 4.5% (Clean Burning)</td>
              <td style="padding: 14px 14px;">Industrial Captive Boilers &amp; Process Steam</td>
            </tr>
            <tr style="border-bottom: 1px solid var(--border-subtle); background: var(--bg-surface-elevated);">
              <td style="padding: 14px 14px; font-weight: 700;">
                <a href="/products/refuse-derived-fuel" style="color: var(--text-main); text-decoration: none;">2. Refuse Derived Fuel (RDF)</a>
              </td>
              <td style="padding: 14px 14px; font-family: var(--font-mono); color: var(--accent-emerald); font-weight: 700;">GCV &gt; 3,800 kcal/kg</td>
              <td style="padding: 14px 14px; font-family: var(--font-mono);">Moisture &lt; 12% Max</td>
              <td style="padding: 14px 14px; color: var(--text-main); font-weight: 600;">Chlorine &lt; 0.5% (Refractory Safe)</td>
              <td style="padding: 14px 14px;">Cement Kiln Co-Processing &amp; Heavy Boilers</td>
            </tr>
            <tr style="border-bottom: 1px solid var(--border-subtle);">
              <td style="padding: 14px 14px; font-weight: 700;">
                <a href="/products/rhdpe-blow-resin" style="color: var(--text-main); text-decoration: none;">3. rHDPE Blow Resin</a>
              </td>
              <td style="padding: 14px 14px; font-family: var(--font-mono); color: var(--accent-emerald); font-weight: 700;">MFI: 0.30 - 0.45 g/10m</td>
              <td style="padding: 14px 14px; font-family: var(--font-mono);">Density: 0.954 g/cm³</td>
              <td style="padding: 14px 14px; color: var(--text-main); font-weight: 600;">Purity &gt; 99.5%</td>
              <td style="padding: 14px 14px;">High ESCR Blow Molding Containers &amp; Drums</td>
            </tr>
            <tr style="border-bottom: 1px solid var(--border-subtle); background: var(--bg-surface-elevated);">
              <td style="padding: 14px 14px; font-weight: 700;">
                <a href="/products/rpp-injection-copolymer" style="color: var(--text-main); text-decoration: none;">4. rPP Copolymer</a>
              </td>
              <td style="padding: 14px 14px; font-family: var(--font-mono); color: var(--accent-emerald); font-weight: 700;">MFI: 12 - 16 g/10m</td>
              <td style="padding: 14px 14px; font-family: var(--font-mono);">Density: 0.905 g/cm³</td>
              <td style="padding: 14px 14px; color: var(--text-main); font-weight: 600;">Purity &gt; 99.2%</td>
              <td style="padding: 14px 14px;">Injection Molding Auto Parts &amp; Industrial Crates</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </section>

  <!-- Technical Spec Modal -->
@endsection
