@extends('layouts.site')

@section('title', 'Bio Energy Fuel | Industrial Biomass Pellets | ' . setting('site_name', 'SHRISTIYAM'))
@section('meta_description', 'SHRISTIYAM Bio Energy Fuel Series: Wood Pellets, Agro Waste Pellets, Mixed Fuel Pellets, and Energy Crop Pellets engineered for industrial boilers and clean energy generation.')

@section('head')
  <link rel="canonical" href="{{ url('/products/bio-energy-fuel') }}">
  <script type="application/ld+json">
  {
    "@@context": "https://schema.org",
    "@@type": "Product",
    "name": "Bio Energy Fuel",
    "image": "{{ asset('/assets/images/wood-pellets.jpeg') }}",
    "description": "High-calorific bioenergy fuels including Wood Pellets, Agro Waste Pellets, Mixed Fuel Pellets, and Energy Crop Pellets.",
    "brand": {
      "@@type": "Brand",
      "name": "{{ setting('site_name', 'SHRISTIYAM') }}"
    },
    "sku": "BIO-FUEL-SERIES"
  }
  </script>
@endsection

@section('content')
  <section class="pellet-catalog-section">
    <div class="container">
      
      <!-- Breadcrumbs -->
      <div style="display: flex; align-items: center; gap: 8px; font-size: 0.84rem; color: var(--text-muted); margin-bottom: 18px;">
        <a href="/">Home</a> <span>/</span> <a href="/products">Products</a> <span>/</span> <span style="color: var(--accent-emerald); font-weight: 600;">Bio Energy Fuel</span>
      </div>

      <!-- Quick Static Product Switcher Bar -->
      <div style="display: flex; gap: 8px; flex-wrap: wrap; margin-bottom: 30px; background: rgba(5, 150, 105, 0.04); padding: 8px 12px; border-radius: var(--radius-md); border: 1px solid rgba(5, 150, 105, 0.12);">
        <span style="font-size: 0.78rem; font-weight: 700; color: var(--text-muted); display: inline-flex; align-items: center; margin-right: 6px; text-transform: uppercase;">All Products (4):</span>
        <a href="/products/bio-energy-fuel" class="btn btn-primary" style="padding: 6px 14px; font-size: 0.8rem; border-radius: 999px; text-decoration: none;">1. Bio Energy Fuel</a>
        <a href="/products/refuse-derived-fuel" class="btn btn-outline" style="padding: 6px 14px; font-size: 0.8rem; border-radius: 999px; text-decoration: none;">2. Refuse Derived Fuel (RDF)</a>
        <a href="/products/rhdpe-blow-resin" class="btn btn-outline" style="padding: 6px 14px; font-size: 0.8rem; border-radius: 999px; text-decoration: none;">3. rHDPE Blow Resin</a>
        <a href="/products/rpp-injection-copolymer" class="btn btn-outline" style="padding: 6px 14px; font-size: 0.8rem; border-radius: 999px; text-decoration: none;">4. rPP Copolymer</a>
      </div>

      <!-- 4 Product Cards Grid (Exact Content from Reference Mockup) -->
      <div class="pellet-grid">

        <!-- ========================================== -->
        <!-- PRODUCT 1 : WOOD PELLETS (WP-01) -->
        <!-- ========================================== -->
        <div class="pellet-card">
          <div class="pellet-card-img-wrap">
            <img src="/assets/images/wood-pellets.jpeg" alt="Wood Pellets">
          </div>
          <div class="pellet-badge-row">
            <span class="pellet-code-badge">WP-01</span>
            <span class="pellet-cat-badge">Bio Energy Fuel</span>
          </div>
          <h3 class="pellet-card-title">Wood Pellets</h3>
          <p class="pellet-card-desc">
            Made from compacted sawdust, wood chips, and milling residues. High calorific value and low ash content, making them ideal for efficient industrial boilers and heating applications.
          </p>

          <div class="pellet-specs-box">
            <div class="pellet-spec-row">
              <span class="pellet-spec-lbl">Calorific Value:</span>
              <span class="pellet-spec-val">High</span>
            </div>
            <div class="pellet-spec-row">
              <span class="pellet-spec-lbl">Ash Content:</span>
              <span class="pellet-spec-val">Low</span>
            </div>
            <div class="pellet-spec-row">
              <span class="pellet-spec-lbl">Moisture Content:</span>
              <span class="pellet-spec-val">Controlled</span>
            </div>
            <div class="pellet-spec-row">
              <span class="pellet-spec-lbl">Size &amp; Density:</span>
              <span class="pellet-spec-val">Uniform</span>
            </div>
            <div class="pellet-spec-row">
              <span class="pellet-spec-lbl">Application:</span>
              <span class="pellet-spec-val">Industrial Boilers, Heating</span>
            </div>
          </div>

          <div class="pellet-card-actions">
            <button class="btn-pellet-tds" data-open-modal="consultationModal" data-product="Wood Pellets TDS">
              Full TDS Page
            </button>
            <button class="btn-pellet-inquire" data-open-modal="consultationModal" data-product="Wood Pellets">
              Inquire Specs
            </button>
          </div>
        </div>

        <!-- ========================================== -->
        <!-- PRODUCT 2 : AGRO WASTE PELLETS (AWP-02) -->
        <!-- ========================================== -->
        <div class="pellet-card">
          <div class="pellet-card-img-wrap">
            <img src="/assets/images/agro-waste-pellets.webp" alt="Agro Waste Pellets">
          </div>
          <div class="pellet-badge-row">
            <span class="pellet-code-badge">AWP-02</span>
            <span class="pellet-cat-badge">Bio Energy Fuel</span>
          </div>
          <h3 class="pellet-card-title">Agro Waste Pellets</h3>
          <p class="pellet-card-desc">
            Made from crop residues such as rice husk, straw, and corn cobs. Provide consistent fuel performance with moderate to high calorific value and higher ash content. Ideal for industrial boilers, process heating, and brick kilns.
          </p>

          <div class="pellet-specs-box">
            <div class="pellet-spec-row">
              <span class="pellet-spec-lbl">Calorific Value:</span>
              <span class="pellet-spec-val">Moderate to High</span>
            </div>
            <div class="pellet-spec-row">
              <span class="pellet-spec-lbl">Ash Content:</span>
              <span class="pellet-spec-val">Moderate to High</span>
            </div>
            <div class="pellet-spec-row">
              <span class="pellet-spec-lbl">Moisture Content:</span>
              <span class="pellet-spec-val">Controlled</span>
            </div>
            <div class="pellet-spec-row">
              <span class="pellet-spec-lbl">Size &amp; Density:</span>
              <span class="pellet-spec-val">Uniform</span>
            </div>
            <div class="pellet-spec-row">
              <span class="pellet-spec-lbl">Application:</span>
              <span class="pellet-spec-val">Boilers, Kilns, Process Heating</span>
            </div>
          </div>

          <div class="pellet-card-actions">
            <button class="btn-pellet-tds" data-open-modal="consultationModal" data-product="Agro Waste Pellets TDS">
              Full TDS Page
            </button>
            <button class="btn-pellet-inquire" data-open-modal="consultationModal" data-product="Agro Waste Pellets">
              Inquire Specs
            </button>
          </div>
        </div>

        <!-- ========================================== -->
        <!-- PRODUCT 3 : MIXED FUEL PELLETS (MFP-03) -->
        <!-- ========================================== -->
        <div class="pellet-card">
          <div class="pellet-card-img-wrap">
            <img src="/assets/images/mixed-waste-pellets.webp" alt="Mixed Fuel Pellets">
          </div>
          <div class="pellet-badge-row">
            <span class="pellet-code-badge">MFP-03</span>
            <span class="pellet-cat-badge">Bio Energy Fuel</span>
          </div>
          <h3 class="pellet-card-title">Mixed Fuel Pellets</h3>
          <p class="pellet-card-desc">
            Made from a controlled blend of industrial waste, paper sludge, bagasse, and other suitable biomass residues. Customizable fuel with consistent quality, suitable for co-firing in thermal power plants, cement kilns, and industrial boilers.
          </p>

          <div class="pellet-specs-box">
            <div class="pellet-spec-row">
              <span class="pellet-spec-lbl">Calorific Value:</span>
              <span class="pellet-spec-val">Customizable</span>
            </div>
            <div class="pellet-spec-row">
              <span class="pellet-spec-lbl">Ash Content:</span>
              <span class="pellet-spec-val">Controlled</span>
            </div>
            <div class="pellet-spec-row">
              <span class="pellet-spec-lbl">Moisture Content:</span>
              <span class="pellet-spec-val">Controlled</span>
            </div>
            <div class="pellet-spec-row">
              <span class="pellet-spec-lbl">Size &amp; Density:</span>
              <span class="pellet-spec-val">Uniform</span>
            </div>
            <div class="pellet-spec-row">
              <span class="pellet-spec-lbl">Application:</span>
              <span class="pellet-spec-val">Co-firing, Industrial Boilers, Kilns</span>
            </div>
          </div>

          <div class="pellet-card-actions">
            <button class="btn-pellet-tds" data-open-modal="consultationModal" data-product="Mixed Fuel Pellets TDS">
              Full TDS Page
            </button>
            <button class="btn-pellet-inquire" data-open-modal="consultationModal" data-product="Mixed Fuel Pellets">
              Inquire Specs
            </button>
          </div>
        </div>

        <!-- ========================================== -->
        <!-- PRODUCT 4 : ENERGY CROP PELLETS (ECP-04) -->
        <!-- ========================================== -->
        <div class="pellet-card">
          <div class="pellet-card-img-wrap">
            <img src="/assets/images/energy-crop-pellets.jpg" alt="Energy Crop Pellets">
          </div>
          <div class="pellet-badge-row">
            <span class="pellet-code-badge">ECP-04</span>
            <span class="pellet-cat-badge">Bio Energy Fuel</span>
          </div>
          <h3 class="pellet-card-title">Energy Crop Pellets</h3>
          <p class="pellet-card-desc">
            Made from dedicated energy crops such as switchgrass and miscanthus. Consistent biomass fuel designed for efficient and reliable energy generation. Ideal for CHP systems, industrial boilers, and clean energy generation.
          </p>

          <div class="pellet-specs-box">
            <div class="pellet-spec-row">
              <span class="pellet-spec-lbl">Calorific Value:</span>
              <span class="pellet-spec-val">Customizable</span>
            </div>
            <div class="pellet-spec-row">
              <span class="pellet-spec-lbl">Ash Content:</span>
              <span class="pellet-spec-val">Controlled</span>
            </div>
            <div class="pellet-spec-row">
              <span class="pellet-spec-lbl">Moisture Content:</span>
              <span class="pellet-spec-val">Controlled</span>
            </div>
            <div class="pellet-spec-row">
              <span class="pellet-spec-lbl">Size &amp; Density:</span>
              <span class="pellet-spec-val">Uniform</span>
            </div>
            <div class="pellet-spec-row">
              <span class="pellet-spec-lbl">Application:</span>
              <span class="pellet-spec-val">CHP Systems, Industrial Boilers, Co-firing</span>
            </div>
          </div>

          <div class="pellet-card-actions">
            <button class="btn-pellet-tds" data-open-modal="consultationModal" data-product="Energy Crop Pellets TDS">
              Full TDS Page
            </button>
            <button class="btn-pellet-inquire" data-open-modal="consultationModal" data-product="Energy Crop Pellets">
              Inquire Specs
            </button>
          </div>
        </div>

      </div>

    </div>
  </section>
@endsection
