<!-- Header Navigation with Dropdowns -->
<header class="header-glass">
  <div class="container">
    <nav class="nav-bar">
      <a href="/" class="brand-logo" style="display: inline-flex; align-items: center; text-decoration: none;">
        @if(setting('site_logo'))
          <img src="{{ setting('site_logo') }}" alt="{{ setting('site_name', 'SHRISTIYAM') }}"
            style="max-height: 48px; width: auto; object-fit: contain;">
        @else
          <div class="logo-symbol">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
              stroke-linecap="round" stroke-linejoin="round">
              <path d="M7 19H4.815a1.83 1.83 0 0 1-1.57-.881 1.785 1.785 0 0 1-.004-1.784L7.196 9.5"></path>
              <path d="M11 19h8.203a1.83 1.83 0 0 0 1.556-.89 1.784 1.784 0 0 0 0-1.775l-1.226-2.12"></path>
              <path d="m14 16-3 3 3 3"></path>
              <path d="M8.293 13.596 4 6.5 12 2l4 6.5"></path>
              <path d="m15.5 8.5 3-3-3-3"></path>
            </svg>
          </div>
          <div class="logo-text">
            <span class="logo-main">{{ strtoupper(setting('site_name', 'SHRISTIYAM')) }}</span>
          </div>
        @endif
      </a>

      <!-- Desktop Navigation with Submenus -->
      <div class="nav-menu" id="navMenu">
        <div class="nav-item">
          <a href="/" class="nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a>
        </div>

        <!-- Products Dropdown -->
        <div class="nav-item nav-dropdown">
          <a href="/products" class="nav-link {{ request()->is('products*') ? 'active' : '' }}">
            <span>Products</span>
            <svg class="dropdown-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
              <polyline points="6 9 12 15 18 9"></polyline>
            </svg>
          </a>
          <div class="dropdown-menu dropdown-menu-products">
            <a href="/products/bio-energy-fuel" class="dropdown-item">
              <div class="dropdown-icon"><svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2">
                  <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"></path>
                </svg></div>
              <div class="dropdown-info"><span class="dropdown-item-title">Bio Energy Fuel</span><span
                  class="dropdown-item-desc">Agro &amp; industrial biomass boiler fuel</span></div>
            </a>
            <a href="/products/refuse-derived-fuel" class="dropdown-item">
              <div class="dropdown-icon"><svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2">
                  <path
                    d="M8.5 14.5A2.5 2.5 0 0 0 11 12c0-1.38-.5-2-1-3-1.072-2.143-.224-4.054 2-6 .5 2.5 2 4.9 4 6.5 2 1.6 3 3.5 3 5.5a7 7 0 1 1-14 0c0-1.153.433-2.294 1-3a2.5 2.5 0 0 0 2.5 2.5z">
                  </path>
                </svg></div>
              <div class="dropdown-info"><span class="dropdown-item-title">Refuse Derived Fuel (RDF)</span><span
                  class="dropdown-item-desc">Industrial thermal alternative fuel</span></div>
            </a>
            <a href="/products/rhdpe-blow-resin" class="dropdown-item">
              <div class="dropdown-icon"><svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2">
                  <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                </svg></div>
              <div class="dropdown-info"><span class="dropdown-item-title">rHDPE Blow Resin</span><span
                  class="dropdown-item-desc">High ESCR for containers &amp; drums</span></div>
            </a>
            <a href="/products/rpp-injection-copolymer" class="dropdown-item">
              <div class="dropdown-icon"><svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2">
                  <rect x="3" y="3" width="18" height="18" rx="2"></rect>
                </svg></div>
              <div class="dropdown-info"><span class="dropdown-item-title">rPP Injection Copolymer</span><span
                  class="dropdown-item-desc">High-rigidity auto &amp; crate resin</span></div>
            </a>
          </div>
        </div>

        <!-- Services Dropdown -->
        <div class="nav-item nav-dropdown">
          <a href="/solutions"
            class="nav-link {{ (request()->is('solutions*') || request()->is('services*') || request()->is('service-single*')) ? 'active' : '' }}">
            <span>Services</span>
            <svg class="dropdown-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
              <polyline points="6 9 12 15 18 9"></polyline>
            </svg>
          </a>
          <div class="dropdown-menu dropdown-menu-services">
            <a href="/services/plastic-epr-compliance" class="dropdown-item">
              <div class="dropdown-icon"><svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2">
                  <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                </svg></div>
              <div class="dropdown-info"><span class="dropdown-item-title">PLASTIC | EPR COMPLIANCE</span><span
                  class="dropdown-item-desc">End-to-End EPR Compliance &amp; Plastic Waste</span></div>
            </a>
            <a href="/services/plastic-neutral-programme" class="dropdown-item">
              <div class="dropdown-icon"><svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2">
                  <circle cx="12" cy="12" r="10"></circle>
                  <polyline points="12 6 12 12 16 14"></polyline>
                </svg></div>
              <div class="dropdown-info"><span class="dropdown-item-title">PLASTIC | PLASTIC NEUTRAL
                  PROGRAMME</span><span class="dropdown-item-desc">Turn Your Plastic Footprint into Measurable
                  Impact</span></div>
            </a>
            <a href="/services/esg-csr-projects" class="dropdown-item">
              <div class="dropdown-icon"><svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2">
                  <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                  <circle cx="9" cy="7" r="4"></circle>
                </svg></div>
              <div class="dropdown-info"><span class="dropdown-item-title">ESG &amp; CSR PROJECTS</span><span
                  class="dropdown-info-desc">Creating Measurable Impact Where It Matters</span></div>
            </a>
            <a href="/services/e-waste-battery-management" class="dropdown-item">
              <div class="dropdown-icon"><svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2">
                  <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                  <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                </svg></div>
              <div class="dropdown-info"><span class="dropdown-item-title">E-WASTE &amp; BATTERY WASTE
                  MANAGEMENT</span><span class="dropdown-info-desc">Responsible Recovery. Compliant Recycling.</span>
              </div>
            </a>
            <a href="/services/industrial-agriculture-waste-management" class="dropdown-item">
              <div class="dropdown-icon"><svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2">
                  <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"></path>
                </svg></div>
              <div class="dropdown-info"><span class="dropdown-item-title">INDUSTRIAL &amp; AGRICULTURE
                  WASTE</span><span class="dropdown-info-desc">Circularity Through High-Quality Industrial Fuels</span>
              </div>
            </a>
          </div>
        </div>

        <div class="nav-item">
          <a href="/about" class="nav-link {{ request()->is('about*') ? 'active' : '' }}">About Us</a>
        </div>
        <div class="nav-item">
          <a href="/careers"
            class="nav-link {{ (request()->is('careers*') || request()->is('career*')) ? 'active' : '' }}">Careers</a>
        </div>
        <div class="nav-item">
          <a href="/blogs"
            class="nav-link {{ (request()->is('blogs*') || request()->is('blog-single*') || request()->is('blog/*')) ? 'active' : '' }}">Blogs</a>
        </div>
      </div>

      <!-- Navigation Action Buttons -->
      <div class="nav-actions">
        <a href="/#calculator" class="btn btn-secondary btn-sm">EPR Calculator</a>
        <a href="/contact" class="btn btn-primary btn-sm">Contact Us</a>

        <button class="mobile-toggle" id="mobileToggle" aria-label="Toggle Mobile Menu">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
            stroke-linejoin="round">
            <line x1="3" y1="12" x2="21" y2="12"></line>
            <line x1="3" y1="6" x2="21" y2="6"></line>
            <line x1="3" y1="18" x2="21" y2="18"></line>
          </svg>
        </button>
      </div>
    </nav>
  </div>
</header>