@extends('layouts.site')

@section('title', 'Services & Solutions | ' . setting('site_name', 'SHRISTIYAM'))
@section('meta_description', 'Comprehensive circular solutions: Plastic EPR Compliance, Plastic Neutral Programme, ESG & CSR Projects, E-Waste & Battery Management, and Industrial & Agri Waste.')

@section('content')
  <!-- Page Header -->
  <section class="section" style="padding-top: 140px; padding-bottom: 50px;">
    <div class="container">
      <div class="section-header reveal-on-scroll">
        <div class="section-tag" style="background: rgba(5, 150, 105, 0.1); color: #047857; border: 1px solid rgba(5, 150, 105, 0.2);">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><path d="m4.93 4.93 4.24 4.24"></path><path d="m14.83 9.17 4.24-4.24"></path><path d="m14.83 14.83 4.24 4.24"></path><path d="m9.17 14.83-4.24 4.24"></path></svg>
          <span>End-to-End Circular Ecosystem</span>
        </div>
        <h1 style="font-size: clamp(2.3rem, 4.4vw, 3.5rem); margin-bottom: 18px;">
          Tailored Services for <span class="gradient-text">Complete Circularity</span>
        </h1>
        <p class="section-desc">
          From statutory EPR compliance and verified plastic neutrality to corporate CSR workforce formalization, e-waste recovery, and industrial alternative fuel engineering.
        </p>
      </div>
    </div>
  </section>

  <!-- Deep Dive 1: Plastic EPR Compliance -->
  <section class="section" id="service-epr" style="padding-top: 10px;">
    <div class="container">
      <div class="grid-2" style="align-items: center;">
        <div class="reveal-on-scroll">
          <div class="section-tag" style="background: rgba(5, 150, 105, 0.1); color: #047857; border: 1px solid rgba(5, 150, 105, 0.2);">1. PLASTIC | EXTENDED PRODUCER RESPONSIBILITY (EPR)</div>
          <h2 style="margin-bottom: 18px;">End-to-End <span class="gradient-text">EPR Compliance</span> &amp; Plastic Waste Management</h2>
          <p style="margin-bottom: 18px;">
            {{ setting('site_name', 'Shristiyam') }} helps Producers, Importers, and Brand Owners (PIBOs) manage their complete Plastic Waste EPR requirements in India—from CPCB registration and target assessment to verified recovery, quota management, and annual return filing.
          </p>
          <ul class="spec-list" style="margin-bottom: 24px;">
            <li class="spec-item"><span>Category I (Rigid Plastics)</span><span>100% Recycling &amp; Certificate Transfer</span></li>
            <li class="spec-item"><span>Category II (Flexible Single Layer)</span><span>Collection &amp; High-Grade Reprocessing</span></li>
            <li class="spec-item"><span>Category III (Multilayered Packaging)</span><span>Certified RDF Thermal Co-Processing</span></li>
            <li class="spec-item"><span>CPCB Compliance Portal</span><span>Direct Hash Upload &amp; Zero-Penalty Legal Indemnity</span></li>
          </ul>
          <a href="/services/plastic-epr-compliance" class="btn btn-primary">View Full Service Breakdown →</a>
        </div>

        <div class="calc-results-card reveal-on-scroll reveal-delay-2" style="padding: 0; overflow: hidden; border-color: rgba(5, 150, 105, 0.2);">
          <img src="/assets/images/blog-cpcb-epr.jpg" alt="Plastic EPR Compliance" style="width: 100%; height: 210px; object-fit: cover; display: block;">
          <div style="padding: 24px;">
            <div class="calc-results-header" style="margin-bottom: 14px;">
              <h4>EPR Deliverables Matrix</h4>
              <span class="cert-pill" style="background: rgba(5, 150, 105, 0.1); color: #047857;">Audit Validated</span>
            </div>
            <div class="calc-results-list">
              <div class="result-row">
                <div class="result-lbl">Digital Weighbridge Receipts</div>
                <div class="result-val" style="font-size: 0.95rem; color: #047857; font-weight: 700;">100% Geo-tagged</div>
              </div>
              <div class="result-row">
                <div class="result-lbl">Recycling Facility Audits</div>
                <div class="result-val" style="font-size: 0.95rem; color: #047857; font-weight: 700;">ISO 14001 Certified</div>
              </div>
              <div class="result-row">
                <div class="result-lbl">CPCB Portal Quota Transfer</div>
                <div class="result-val" style="font-size: 0.95rem; color: #047857; font-weight: 700;">Within 48-72 Hours</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Deep Dive 2: Plastic Neutral Programme -->
  <section class="section" id="service-neutral" style="background: var(--bg-surface-elevated);">
    <div class="container">
      <div class="grid-2" style="align-items: center;">
        <div class="calc-results-card reveal-on-scroll" style="padding: 0; overflow: hidden; border-color: rgba(5, 150, 105, 0.2);">
          <img src="/assets/images/service-mrf-plant.jpg" alt="Plastic Neutral Programme" style="width: 100%; height: 210px; object-fit: cover; display: block;">
          <div style="padding: 24px;">
            <div class="calc-results-header" style="margin-bottom: 14px;">
              <h4>Plastic Neutrality Metrics</h4>
              <span class="cert-pill" style="background: rgba(5, 150, 105, 0.1); color: #047857;">Net-Zero Plastic</span>
            </div>
            <div class="calc-results-list">
              <div class="result-row">
                <div class="result-lbl">Footprint Offset Ratio</div>
                <div class="result-val" style="font-size: 0.95rem; color: #047857; font-weight: 700;">100% Volumetric Match</div>
              </div>
              <div class="result-row">
                <div class="result-lbl">Collection Geo-Traceability</div>
                <div class="result-val" style="font-size: 0.95rem; color: #047857; font-weight: 700;">High-Leakage &amp; Coastlines</div>
              </div>
              <div class="result-row">
                <div class="result-lbl">On-Pack Trustmark Rights</div>
                <div class="result-val" style="font-size: 0.95rem; color: #047857; font-weight: 700;">Certified QR Verification</div>
              </div>
            </div>
          </div>
        </div>

        <div class="reveal-on-scroll reveal-delay-2">
          <div class="section-tag" style="background: rgba(5, 150, 105, 0.1); color: #047857; border: 1px solid rgba(5, 150, 105, 0.2);">2. PLASTIC | PLASTIC NEUTRAL PROGRAMME</div>
          <h2 style="margin-bottom: 18px;">Turn Your Plastic Footprint into <span class="gradient-text">Measurable Impact</span></h2>
          <p style="margin-bottom: 18px;">
            Go beyond baseline compliance. We calculate your enterprise packaging mass, recover an equivalent volume of high-leakage post-consumer plastics from vulnerable ecosystems, and provide verified certificates and consumer trustmarks.
          </p>
          <ul class="spec-list" style="margin-bottom: 24px;">
            <li class="spec-item"><span>Footprint Assessment</span><span>SKU-by-SKU packaging mass calculation</span></li>
            <li class="spec-item"><span>Ocean-Bound Recovery</span><span>Targeted retrieval from vulnerable coastlines</span></li>
            <li class="spec-item"><span>Certified Trustmark</span><span>Authorized on-pack badge with consumer QR verification</span></li>
          </ul>
          <a href="/services/plastic-neutral-programme" class="btn btn-primary">View Full Service Breakdown →</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Deep Dive 3: ESG & CSR Projects -->
  <section class="section" id="service-csr">
    <div class="container">
      <div class="grid-2" style="align-items: center;">
        <div class="reveal-on-scroll">
          <div class="section-tag" style="background: rgba(5, 150, 105, 0.1); color: #047857; border: 1px solid rgba(5, 150, 105, 0.2);">3. ESG &amp; CSR PROJECTS</div>
          <h2 style="margin-bottom: 18px;">Creating <span class="gradient-text">Measurable Impact</span> Where It Matters</h2>
          <p style="margin-bottom: 18px;">
            Deploy mandatory 2% CSR capital into Schedule VII compliant programs that uplift informal waste pickers and frontline recyclers with biometric identification, direct Jan Dhan bank transfers, occupational healthcare, and educational grants.
          </p>
          <ul class="spec-list" style="margin-bottom: 24px;">
            <li class="spec-item"><span>Schedule VII Compliance</span><span>100% eligible under MCA corporate CSR guidelines</span></li>
            <li class="spec-item"><span>Direct DBT Banking</span><span>Zero middleman leakage into Aadhaar-linked accounts</span></li>
            <li class="spec-item"><span>Audited SROI Dossier</span><span>CA fund utilization certification and photo archives</span></li>
          </ul>
          <a href="/services/esg-csr-projects" class="btn btn-primary">View Full Service Breakdown →</a>
        </div>

        <div class="calc-results-card reveal-on-scroll reveal-delay-2" style="padding: 0; overflow: hidden; border-color: rgba(5, 150, 105, 0.2);">
          <img src="/assets/images/service-csr-welfare.jpg" alt="ESG and CSR Projects" style="width: 100%; height: 210px; object-fit: cover; display: block;">
          <div style="padding: 24px;">
            <div class="calc-results-header" style="margin-bottom: 14px;">
              <h4>CSR Impact Metrics</h4>
              <span class="cert-pill" style="background: rgba(5, 150, 105, 0.1); color: #047857;">Schedule VII</span>
            </div>
            <div class="calc-results-list">
              <div class="result-row">
                <div class="result-lbl">Workers Formalized</div>
                <div class="result-val" style="font-size: 0.95rem; color: #047857; font-weight: 700;">5,000+ Beneficiaries</div>
              </div>
              <div class="result-row">
                <div class="result-lbl">Payment Mechanism</div>
                <div class="result-val" style="font-size: 0.95rem; color: #047857; font-weight: 700;">100% Cashless DBT</div>
              </div>
              <div class="result-row">
                <div class="result-lbl">Medical Health Camps</div>
                <div class="result-val" style="font-size: 0.95rem; color: #047857; font-weight: 700;">Quarterly Screenings</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Deep Dive 4: E-Waste & Battery Waste Management -->
  <section class="section" id="service-ewaste" style="background: var(--bg-surface-elevated);">
    <div class="container">
      <div class="grid-2" style="align-items: center;">
        <div class="calc-results-card reveal-on-scroll" style="padding: 0; overflow: hidden; border-color: rgba(5, 150, 105, 0.2);">
          <img src="/assets/images/polymer-testing-lab.jpg" alt="E-Waste and Battery Recycling" style="width: 100%; height: 210px; object-fit: cover; display: block;">
          <div style="padding: 24px;">
            <div class="calc-results-header" style="margin-bottom: 14px;">
              <h4>Compliance &amp; Recovery</h4>
              <span class="cert-pill" style="background: rgba(5, 150, 105, 0.1); color: #047857;">E-Waste &amp; BWM Rules</span>
            </div>
            <div class="calc-results-list">
              <div class="result-row">
                <div class="result-lbl">Data Sanitization</div>
                <div class="result-val" style="font-size: 0.95rem; color: #047857; font-weight: 700;">DoD 5220 / NIST 800-88</div>
              </div>
              <div class="result-row">
                <div class="result-lbl">Metal Recovery Efficiency</div>
                <div class="result-val" style="font-size: 0.95rem; color: #047857; font-weight: 700;">&gt;98% Critical Minerals</div>
              </div>
              <div class="result-row">
                <div class="result-lbl">CPCB Portal Credit Transfer</div>
                <div class="result-val" style="font-size: 0.95rem; color: #047857; font-weight: 700;">Direct Transaction Hash</div>
              </div>
            </div>
          </div>
        </div>

        <div class="reveal-on-scroll reveal-delay-2">
          <div class="section-tag" style="background: rgba(5, 150, 105, 0.1); color: #047857; border: 1px solid rgba(5, 150, 105, 0.2);">4. E-WASTE &amp; BATTERY WASTE MANAGEMENT</div>
          <h2 style="margin-bottom: 18px;">Responsible Recovery. <span class="gradient-text">Compliant Recycling.</span></h2>
          <p style="margin-bottom: 18px;">
            Authorized management for electrical, electronic, and battery waste aligned with the E-Waste and Battery Waste Management (BWM) Rules. We deliver certified ITAD, secure military-grade data destruction, hydrometallurgical recycling, and CPCB portal credit transfers.
          </p>
          <ul class="spec-list" style="margin-bottom: 24px;">
            <li class="spec-item"><span>IT Asset Disposition (ITAD)</span><span>Serialized data wiping and destruction certificates</span></li>
            <li class="spec-item"><span>Battery Closed-Loop Recycling</span><span>Hydrometallurgical extraction of Li, Co, Ni, and Cu</span></li>
            <li class="spec-item"><span>SPCB Hazardous Permits</span><span>Form 10 transit manifests with GPS fleet telematics</span></li>
          </ul>
          <a href="/services/e-waste-battery-management" class="btn btn-primary">View Full Service Breakdown →</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Deep Dive 5: Industrial Waste & Agriculture Waste Management -->
  <section class="section" id="service-agri-waste">
    <div class="container">
      <div class="grid-2" style="align-items: center;">
        <div class="reveal-on-scroll">
          <div class="section-tag" style="background: rgba(5, 150, 105, 0.1); color: #047857; border: 1px solid rgba(5, 150, 105, 0.2);">5. INDUSTRIAL &amp; AGRICULTURE WASTE MANAGEMENT</div>
          <h2 style="margin-bottom: 18px;">Circularity Through <span class="gradient-text">High-Quality Industrial Fuels</span></h2>
          <p style="margin-bottom: 18px;">
            Bridge manufacturing parks and agricultural belts with heavy industry. Non-recyclable combustible industrial packaging and crop stubble (parali) are converted into engineered Refuse Derived Fuel (RDF) and biomass fuels, replacing 15% to 25% of fossil coal in cement kilns.
          </p>
          <ul class="spec-list" style="margin-bottom: 24px;">
            <li class="spec-item"><span>Gross Calorific Value (GCV)</span><span>&gt;3,800 - 4,200 kcal/kg guaranteed</span></li>
            <li class="spec-item"><span>Kiln Refractory Safety</span><span>Strictly controlled low chlorine (Cl &lt; 0.5%)</span></li>
            <li class="spec-item"><span>Zero Bottom Ash</span><span>100% clinker mineral absorption in cement kilns</span></li>
            <li class="spec-item"><span>Stubble Burning Prevention</span><span>Diversion of farm parali into circular green fuels</span></li>
          </ul>
          <a href="/services/industrial-agriculture-waste-management" class="btn btn-primary">View Full Service Breakdown →</a>
        </div>

        <div class="calc-results-card reveal-on-scroll reveal-delay-2" style="padding: 0; overflow: hidden; border-color: rgba(5, 150, 105, 0.2);">
          <img src="/assets/images/service-rdf-fuel.jpg" alt="Industrial RDF Co-processing Kiln" style="width: 100%; height: 210px; object-fit: cover; display: block;">
          <div style="padding: 24px;">
            <div class="calc-results-header" style="margin-bottom: 14px;">
              <h4>Alternative Fuel Specifications</h4>
              <span class="cert-pill" style="background: rgba(5, 150, 105, 0.1); color: #047857;">Coal Replacement</span>
            </div>
            <div class="calc-results-list">
              <div class="result-row">
                <div class="result-lbl">Thermal Substitution Rate (TSR)</div>
                <div class="result-val" style="font-size: 0.95rem; color: #047857; font-weight: 700;">15% - 25% Achievable</div>
              </div>
              <div class="result-row">
                <div class="result-lbl">Moisture Content</div>
                <div class="result-val" style="font-size: 0.95rem; color: #047857; font-weight: 700;">&lt; 12% Controlled</div>
              </div>
              <div class="result-row">
                <div class="result-lbl">Category III Destruction Credit</div>
                <div class="result-val" style="font-size: 0.95rem; color: #047857; font-weight: 700;">CPCB Portal Hash Issued</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
