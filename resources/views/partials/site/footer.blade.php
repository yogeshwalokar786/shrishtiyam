<!-- Footer -->
<footer class="footer-main">
  <div class="container">
    <div class="footer-grid">
      <div class="footer-brand">
        <a href="/" class="brand-logo">
          @if(setting('site_logo'))
            <img src="{{ setting('site_logo') }}" alt="{{ setting('site_name', 'SHRISTIYAM') }}" style="max-height: 54px; width: auto; object-fit: contain; margin-bottom: 12px;">
          @else
            <div class="logo-symbol">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M7 19H4.815a1.83 1.83 0 0 1-1.57-.881 1.785 1.785 0 0 1-.004-1.784L7.196 9.5"></path><path d="M11 19h8.203a1.83 1.83 0 0 0 1.556-.89 1.784 1.784 0 0 0 0-1.775l-1.226-2.12"></path><path d="m14 16-3 3 3 3"></path><path d="M8.293 13.596 4 6.5 12 2l4 6.5"></path><path d="m15.5 8.5 3-3-3-3"></path></svg>
            </div>
            <div class="logo-text">
              <span class="logo-main">{{ strtoupper(setting('site_name', 'SHRISTIYAM')) }}</span>
            </div>
          @endif
        </a>
        <p>
          Transforming post-consumer waste into high-value circular resources. Authorized Producer Responsibility Organisation and advanced polymer platform.
        </p>
        <div class="footer-cert-pills">
          <span class="cert-pill">{{ setting('pro_badge', 'Statutory Registered PRO') }}</span>
          <span class="cert-pill">ISO 14001:2015</span>
          <span class="cert-pill">ISO 9001:2015</span>
          <span class="cert-pill">Ocean-Safe Certified</span>
        </div>
      </div>

      <div class="footer-col">
        <h5>Products</h5>
        <div class="footer-links">
          <a href="/products/bio-energy-fuel">Bio Energy Fuel</a>
          <a href="/products/refuse-derived-fuel">Refuse Derived Fuel (RDF)</a>
          <a href="/products/rhdpe-blow-resin">rHDPE Blow Resin</a>
          <a href="/products/rpp-injection-copolymer">rPP Copolymer</a>
          <a href="/products">All Products Matrix</a>
        </div>
      </div>

      <div class="footer-col">
        <h5>Services</h5>
        <div class="footer-links">
          <a href="/services/plastic-epr-compliance">Plastic | EPR Compliance</a>
          <a href="/services/plastic-neutral-programme">Plastic Neutral Programme</a>
          <a href="/services/esg-csr-projects">ESG &amp; CSR Projects</a>
          <a href="/services/e-waste-battery-management">E-Waste &amp; Battery Management</a>
          <a href="/services/industrial-agriculture-waste-management">Industrial &amp; Agriculture Waste</a>
          <a href="/#calculator">EPR Calculator</a>
        </div>
      </div>

      <div class="footer-col">
        <h5>Company</h5>
        <div class="footer-links">
          <a href="/about">Our Vision & Mission</a>
          <a href="/about#infrastructure">Infrastructure Map</a>
          <a href="/blogs">Knowledge Hub & Blogs</a>
          <a href="/contact">Contact & Hubs</a>
        </div>
      </div>

      <div class="footer-col footer-newsletter">
        <h5>Stay Updated</h5>
        <p>Subscribe to our monthly Circularity & Regulatory briefing.</p>
        <form class="newsletter-form" onsubmit="event.preventDefault(); window.showToast ? window.showToast('Thank you for subscribing to SHRISTIYAM briefing!') : alert('Thank you for subscribing to SHRISTIYAM briefing!');">
          <input type="email" placeholder="Your work email..." required>
          <button type="submit" class="btn btn-primary btn-sm">Join</button>
        </form>
        <div style="margin-top: 16px; font-size: 0.84rem; color: var(--text-muted);">
          {{ setting('site_name', 'SHRISTIYAM') }} • Circular Solutions
        </div>
      </div>
    </div>

    <div class="footer-bottom">
      <div>
        {{ setting('copyright_text', '© ' . date('Y') . ' SHRISTIYAM Circular Solutions. All rights reserved.') }}
      </div>
      <div class="footer-legal-links">
        @php
            $footerPolicies = \Illuminate\Support\Facades\Schema::hasTable('policies')
                ? \App\Models\Policy::published()->get()
                : collect();
        @endphp
        @forelse($footerPolicies as $fPol)
            <a href="{{ $fPol->url }}">{{ $fPol->title }}</a>
        @empty
            <a href="/policy/privacy-policy">Privacy Policy</a>
            <a href="/policy/terms-of-service">Terms of Service</a>
        @endforelse
      </div>
    </div>
  </div>
</footer>
