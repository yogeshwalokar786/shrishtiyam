@extends('layouts.site')

@section('title', ($service['title_plain'] ?? 'Services & Solutions') . ' | ' . setting('site_name', 'SHRISTIYAM'))
@section('meta_description', $service['meta_desc'] ?? ('Comprehensive environmental solutions by ' . setting('company_legal_name', 'SHRISTIYAM COMPLIANCE SOLUTIONS PRIVATE LIMITED')))

@section('content')
  <!-- =========================================================================
       1. HERO HEADER & SERVICE SELECTOR PILLS
       ========================================================================= -->
  <section class="section" style="padding-top: 140px; padding-bottom: 40px;">
    <div class="container">
      <!-- Breadcrumb Navigation -->
      <div style="display: flex; align-items: center; gap: 8px; font-size: 0.84rem; color: var(--text-muted); margin-bottom: 24px; flex-wrap: wrap;">
        <a href="/" style="color: var(--text-muted); text-decoration: none;" onmouseover="this.style.color='var(--primary)'" onmouseout="this.style.color='var(--text-muted)'">Home</a>
        <span>/</span>
        <a href="/solutions" style="color: var(--text-muted); text-decoration: none;" onmouseover="this.style.color='var(--primary)'" onmouseout="this.style.color='var(--text-muted)'">Services &amp; Solutions</a>
        <span>/</span>
        <span style="color: var(--accent-emerald); font-weight: 600;">{{ $service['title_plain'] }}</span>
      </div>

      <!-- Main Hero Content -->
      <div class="grid-2" style="align-items: center; gap: 40px;">
        <div class="reveal-on-scroll">
          <div class="section-tag" style="margin-bottom: 14px;">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
              <polyline points="9 12 11 14 15 10"></polyline>
            </svg>
            <span>{{ $service['tag'] }}</span>
          </div>

          <h1 style="font-size: clamp(2.1rem, 3.8vw, 3.1rem); line-height: 1.22; margin-bottom: 16px;">
            {!! $service['headline_html'] !!}
          </h1>

          <!-- Target Stakeholder Audience Pills -->
          <div style="display: flex; gap: 8px; flex-wrap: wrap; margin-bottom: 18px;">
            @foreach($service['target_audience'] as $audience)
              <span class="cert-pill" style="font-size: 0.76rem; background: rgba(5, 150, 105, 0.08); color: var(--accent-emerald); border-color: rgba(5, 150, 105, 0.2);">
                ✓ {{ $audience }}
              </span>
            @endforeach
          </div>

          <p style="font-size: 1.02rem; color: var(--text-muted); line-height: 1.7; margin-bottom: 26px;">
            {{ $service['hero_desc'] }}
          </p>

          <!-- Action CTA Group -->
          <div style="display: flex; gap: 14px; flex-wrap: wrap;">
            <button type="button" class="btn btn-primary" data-open-modal="consultationModal" style="padding: 12px 24px; font-size: 0.95rem; font-weight: 600;">
              Request Service Proposal &rarr;
            </button>
            <a href="#deliverables" class="btn btn-secondary" style="padding: 12px 20px; font-size: 0.95rem; font-weight: 600; text-decoration: none;">
              View Deliverables ↓
            </a>
            <a href="#proposal-form" class="btn btn-outline" style="padding: 12px 20px; font-size: 0.95rem; font-weight: 600; text-decoration: none;">
              Instant Quote
            </a>
          </div>
        </div>

        <!-- Hero Visual Media Card -->
        <div class="reveal-on-scroll reveal-delay-2" style="position: relative;">
          <div style="border-radius: var(--radius-lg); overflow: hidden; border: 1px solid var(--border-medium); box-shadow: var(--shadow-md); background: #ffffff;">
            <img src="{{ $service['hero_image'] }}" alt="{{ $service['title_plain'] }}" style="width: 100%; height: 380px; object-fit: cover; display: block;">
            
            <!-- Bottom Verification Strip -->
            <div style="padding: 16px 20px; background: var(--bg-surface-elevated); border-top: 1px solid var(--border-subtle); display: flex; justify-content: space-between; align-items: center; font-size: 0.82rem; font-weight: 600; color: var(--text-main);">
              <span style="display: inline-flex; align-items: center; gap: 6px; color: var(--accent-emerald);">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                Statutory Regulatory Standard
              </span>
              <span style="font-family: var(--font-mono); color: var(--text-muted);">
                ISO 14001:2015 Accredited
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- =========================================================================
       2. REAL-TIME CAPABILITIES & KPI METRICS BAR
       ========================================================================= -->
  <section style="background: var(--bg-surface-elevated); border-top: 1px solid var(--border-subtle); border-bottom: 1px solid var(--border-subtle); padding: 34px 0;">
    <div class="container">
      <div class="metrics-grid" style="margin: 0;">
        @foreach($service['metrics'] as $idx => $m)
          <div class="metric-card reveal-on-scroll {{ $idx > 0 ? 'reveal-delay-' . $idx : '' }}">
            <div class="solution-card-icon" style="margin-bottom: 8px;">
              {!! $m['icon'] !!}
            </div>
            <span class="metric-number">{{ $m['num'] }}</span>
            <span class="metric-label">{{ $m['label'] }}</span>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- =========================================================================
       4. STEP-BY-STEP OPERATIONAL METHODOLOGY (4-STAGE ROADMAP)
       ========================================================================= -->
  <section class="section" style="background: var(--bg-surface-elevated); padding-top: 50px; padding-bottom: 50px;">
    <div class="container">
      <div class="section-header reveal-on-scroll">
        <div class="section-tag">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
          <span>Systematic Execution</span>
        </div>
        <h2 class="section-title">Step-by-Step <span class="gradient-text">Operational Workflow</span></h2>
        <p class="section-desc">A fully digitized lifecycle ensuring regulatory compliance, verified mass balance, and zero margin for error.</p>
      </div>

      <div class="grid-4 reveal-on-scroll" style="grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 20px;">
        @foreach($service['stages'] as $stg)
          <div class="solution-card" style="padding: 24px; display: flex; flex-direction: column;">
            <div class="solution-card-icon" style="margin-bottom: 12px;">
              {!! $stg['icon'] !!}
            </div>
            <div style="font-family: var(--font-mono); font-size: 0.76rem; font-weight: 800; color: var(--accent-emerald); text-transform: uppercase; margin-bottom: 6px;">
              {{ $stg['num'] }}
            </div>
            <h4 style="font-size: 1.15rem; margin-bottom: 10px; color: var(--text-main);">{{ $stg['title'] }}</h4>
            <p style="font-size: 0.88rem; color: var(--text-muted); line-height: 1.6; margin-bottom: 16px; flex-grow: 1;">
              {{ $stg['desc'] }}
            </p>
            <span class="cert-pill" style="align-self: flex-start; font-size: 0.74rem;">
              {{ $stg['pill'] }}
            </span>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- =========================================================================
       5. DETAILED DELIVERABLES PACKAGE & FAST-TRACK PROPOSAL GENERATOR
       ========================================================================= -->
  <section class="section" id="proposal-form" style="padding-top: 50px; padding-bottom: 50px;">
    <div class="container">
      <div class="grid-2" style="gap: 40px; align-items: start;">
        <!-- Left: Mandatory Deliverables Checklist -->
        <div class="reveal-on-scroll">
          <div class="section-tag" style="margin-bottom: 12px;">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
            <span>Contractual Deliverables</span>
          </div>
          <h2 style="font-size: clamp(1.8rem, 3.2vw, 2.4rem); margin-bottom: 16px; line-height: 1.25;">
            What's Included in Your <span class="gradient-text">Service Contract</span>
          </h2>
          <p style="color: var(--text-muted); line-height: 1.7; margin-bottom: 24px;">
            Every client engagement executed by {{ setting('company_legal_name', 'SHRISTIYAM COMPLIANCE SOLUTIONS PRIVATE LIMITED') }} includes complete audit trails, verified documentation, and statutory legal defense.
          </p>

          <div style="background: #ffffff; border: 1px solid var(--border-medium); border-radius: var(--radius-lg); overflow: hidden; box-shadow: var(--shadow-sm); margin-bottom: 24px;">
            @foreach($service['deliverables'] as $d)
              <div style="padding: 16px 20px; border-bottom: 1px solid var(--border-subtle); display: flex; flex-direction: column; gap: 4px;">
                <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 8px;">
                  <strong style="color: var(--text-main); font-size: 0.94rem; display: flex; align-items: center; gap: 8px;">
                    <span style="color: var(--accent-emerald);">✓</span>
                    {{ $d['name'] }}
                  </strong>
                  <span class="cert-pill" style="font-size: 0.74rem;">{{ $d['proto'] }}</span>
                </div>
                <div style="font-size: 0.82rem; color: var(--text-muted); padding-left: 20px;">
                  {{ $d['desc'] }}
                </div>
              </div>
            @endforeach
          </div>

          <!-- Desk Routing Information -->
          <div style="display: flex; gap: 20px; align-items: center; flex-wrap: wrap;">
            <div>
              <div style="font-size: 0.74rem; font-weight: 700; text-transform: uppercase; color: var(--text-muted); margin-bottom: 2px;">Direct Compliance Desk</div>
              <a href="mailto:{{ setting('epr_desk_email', 'admin@shristiyam.com') }}" style="font-size: 0.95rem; font-weight: 700; color: var(--text-main); text-decoration: none;">
                {{ setting('epr_desk_email', 'admin@shristiyam.com') }}
              </a>
            </div>
            <div>
              <div style="font-size: 0.74rem; font-weight: 700; text-transform: uppercase; color: var(--text-muted); margin-bottom: 2px;">Desk Phone</div>
              <a href="tel:{{ preg_replace('/[^0-9+]/', '', explode('/', setting('contact_phone', '7020784898'))[0]) }}" style="font-size: 0.95rem; font-weight: 700; color: var(--primary); text-decoration: none; font-family: var(--font-mono);">
                {{ setting('contact_phone', '7020784898 / 9112327953') }}
              </a>
            </div>
          </div>
        </div>

        <!-- Right: Embedded Fast-Track Proposal Generator Form -->
        <div class="calc-container reveal-on-scroll reveal-delay-2" style="background: #ffffff; border: 1px solid var(--border-medium); border-radius: var(--radius-lg); box-shadow: var(--shadow-md); padding: 32px 28px;">
          <div class="section-tag" style="margin-bottom: 8px;">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
            <span>Direct Technical Advisory</span>
          </div>
          <h3 style="font-size: 1.45rem; margin-bottom: 6px; color: var(--text-main);">{{ $service['form_title'] }}</h3>
          <p style="font-size: 0.88rem; color: var(--text-muted); margin-bottom: 22px;">{{ $service['form_desc'] }}</p>

          <form method="POST" action="{{ route('consultation.submit') }}" onsubmit="handleConsultationSubmit(event, this)">
            @csrf

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 14px; margin-bottom: 14px;">
              <div class="form-group" style="margin-bottom: 0;">
                <label class="form-label">Full Name <span class="required-star">*</span></label>
                <input type="text" name="name" required placeholder="e.g. Alex Vance" class="form-control">
              </div>
              <div class="form-group" style="margin-bottom: 0;">
                <label class="form-label">Official Work Email <span class="required-star">*</span></label>
                <input type="email" name="email" required placeholder="alex@company.com" class="form-control">
              </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 14px; margin-bottom: 14px;">
              <div class="form-group" style="margin-bottom: 0;">
                <label class="form-label">Phone Number <span class="required-star">*</span></label>
                <input type="tel" name="phone" required placeholder="+91 98765 43210" class="form-control">
              </div>
              <div class="form-group" style="margin-bottom: 0;">
                <label class="form-label">Company / Entity Name <span class="required-star">*</span></label>
                <input type="text" name="company" required placeholder="e.g. Acme Corporation" class="form-control">
              </div>
            </div>

            <div class="form-group" style="margin-bottom: 14px;">
              <label class="form-label">Selected Service Line <span class="required-star">*</span></label>
              <select name="requirement" class="form-control">
                <option value="Brand EPR Statutory Compliance" {{ $service['default_service_option'] === 'Brand EPR Statutory Compliance' ? 'selected' : '' }}>Brand EPR Statutory Compliance</option>
                <option value="Municipal MRF Facility Deployment" {{ $service['default_service_option'] === 'Municipal MRF Facility Deployment' ? 'selected' : '' }}>Municipal MRF Facility Deployment</option>
                <option value="Bulk Industrial RDF Co-Processing" {{ $service['default_service_option'] === 'Bulk Industrial RDF Co-Processing' ? 'selected' : '' }}>Bulk Industrial RDF Co-Processing</option>
                <option value="Pan-India Reverse Logistics" {{ $service['default_service_option'] === 'Pan-India Reverse Logistics' ? 'selected' : '' }}>Pan-India Reverse Logistics</option>
                <option value="Workforce Formalization & CSR" {{ $service['default_service_option'] === 'Workforce Formalization & CSR' ? 'selected' : '' }}>Workforce Formalization &amp; CSR</option>
                <option value="Environmental Audit & Regulatory Filings" {{ $service['default_service_option'] === 'Environmental Audit & Regulatory Filings' ? 'selected' : '' }}>Environmental Audit &amp; Regulatory Filings</option>
              </select>
            </div>

            <div class="form-group" style="margin-bottom: 20px;">
              <label class="form-label">{{ $service['form_volume_label'] }}</label>
              <input type="text" name="projected_volume" placeholder="{{ $service['form_volume_placeholder'] }}" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary" style="width: 100%; font-size: 0.95rem; font-weight: 600; padding: 12px 18px;">
              Submit Proposal Request &rarr;
            </button>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- =========================================================================
       6. SERVICE-SPECIFIC FREQUENTLY ASKED QUESTIONS (FAQ ACCORDION)
       ========================================================================= -->
  <section class="section" style="background: var(--bg-surface-elevated); padding-top: 50px; padding-bottom: 60px;">
    <div class="container" style="max-width: 900px;">
      <div class="section-header reveal-on-scroll" style="margin-bottom: 36px;">
        <div class="section-tag">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
          <span>Service Clarifications</span>
        </div>
        <h2 class="section-title">Frequently Asked <span class="gradient-text">Questions</span></h2>
        <p class="section-desc">Key technical and statutory guidance regarding {{ $service['title_plain'] }}.</p>
      </div>

      <div class="faq-accordion reveal-on-scroll">
        @foreach($service['faqs'] as $fIndex => $faq)
          <div class="faq-item {{ $fIndex === 0 ? 'open' : '' }}">
            <div class="faq-question">
              <span>{{ $faq['q'] }}</span>
              <div class="faq-icon"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"></polyline></svg></div>
            </div>
            <div class="faq-answer">
              <p>{{ $faq['a'] }}</p>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- =========================================================================
       7. BLOGS OF SHRISTIYAM (KNOWLEDGE & INSIGHTS)
       ========================================================================= -->
  <section class="section" style="padding-top: 50px; padding-bottom: 70px;">
    <div class="container">
      <div class="section-header reveal-on-scroll">
        <div class="section-tag">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
          <span>Knowledge &amp; Insights</span>
        </div>
        <h2 class="section-title">Blogs of <span class="gradient-text">{{ setting('site_name', 'SHRISTIYAM') }}</span></h2>
        <p class="section-desc">Authoritative research, regulatory updates, and circular economy intelligence from {{ setting('site_name', 'SHRISTIYAM') }}.</p>
      </div>

      @php
        $serviceBlogs = $recentBlogs ?? \App\Models\Blog::published()->with('category')->latest('published_at')->limit(3)->get();
      @endphp

      @if($serviceBlogs && $serviceBlogs->count() > 0)
        <div class="blog-grid reveal-on-scroll">
          @foreach($serviceBlogs as $index => $item)
            <div class="blog-card reveal-on-scroll {{ $index % 3 == 1 ? 'reveal-delay-1' : ($index % 3 == 2 ? 'reveal-delay-2' : '') }}">
              <div class="blog-thumbnail">
                @if($item->category)
                  <span class="blog-category-tag">{{ $item->category->name }}</span>
                @endif
                <img src="{{ $item->image_url }}" alt="{{ $item->title }}" class="blog-thumb-img">
              </div>
              <div class="blog-card-body">
                <div class="blog-meta-row">
                  <div class="blog-meta-item">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                    <span>{{ $item->read_time ?? '5 Min Read' }}</span>
                  </div>
                  <div class="blog-meta-item">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                    <span>{{ $item->formatted_date }}</span>
                  </div>
                </div>
                <h3 class="blog-title">
                  <a href="{{ $item->url }}">{{ $item->title }}</a>
                </h3>
                <p class="blog-excerpt">
                  {{ Str::limit($item->excerpt, 115) }}
                </p>
                <div class="blog-footer">
                  <a href="{{ $item->url }}" style="color: inherit; text-decoration: none; display: inline-flex; align-items: center; gap: 6px; font-weight: 600;">
                    <span>Read Insight</span>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                  </a>
                </div>
              </div>
            </div>
          @endforeach
        </div>

        <div style="margin-top: 40px; text-align: center;" class="reveal-on-scroll">
          <a href="{{ route('blogs') }}" class="btn btn-secondary" style="padding: 10px 24px; font-size: 0.9rem; font-weight: 600;">
            Explore All Blogs &amp; Insights &rarr;
          </a>
        </div>
      @else
        <!-- Curated Fallback Articles -->
        <div class="blog-grid reveal-on-scroll">
          <div class="blog-card">
            <div class="blog-thumbnail">
              <span class="blog-category-tag">EPR Compliance</span>
              <img src="/assets/images/blog-cpcb-epr.jpg" alt="EPR Compliance Strategic Roadmap" class="blog-thumb-img">
            </div>
            <div class="blog-card-body">
              <div class="blog-meta-row">
                <div class="blog-meta-item">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                  <span>6 Min Read</span>
                </div>
              </div>
              <h3 class="blog-title"><a href="/blogs">Navigating New EPR Mandates: A Strategic Roadmap for Brands</a></h3>
              <p class="blog-excerpt">How enterprise brands are transitioning from compliance risk to value creation with food-grade PCR resins.</p>
              <div class="blog-footer">
                <a href="/blogs" style="color: inherit; text-decoration: none; display: inline-flex; align-items: center; gap: 6px; font-weight: 600;">
                  <span>Read Insight</span>
                  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                </a>
              </div>
            </div>
          </div>

          <div class="blog-card">
            <div class="blog-thumbnail">
              <span class="blog-category-tag">PCR Science</span>
              <img src="/assets/images/blog-rpet-bottles.jpg" alt="High-Performance rPET" class="blog-thumb-img">
            </div>
            <div class="blog-card-body">
              <div class="blog-meta-row">
                <div class="blog-meta-item">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                  <span>5 Min Read</span>
                </div>
              </div>
              <h3 class="blog-title"><a href="/blogs">Overcoming Intrinsic Viscosity Loss in High-Performance rPET</a></h3>
              <p class="blog-excerpt">Vacuum degassing and solid-state polycondensation techniques that maintain structural clarity in recycled polymers.</p>
              <div class="blog-footer">
                <a href="/blogs" style="color: inherit; text-decoration: none; display: inline-flex; align-items: center; gap: 6px; font-weight: 600;">
                  <span>Read Insight</span>
                  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                </a>
              </div>
            </div>
          </div>

          <div class="blog-card">
            <div class="blog-thumbnail">
              <span class="blog-category-tag">Circularity Hub</span>
              <img src="/assets/images/facility-mrf-sorting.jpg" alt="Decentralized MRFs" class="blog-thumb-img">
            </div>
            <div class="blog-card-body">
              <div class="blog-meta-row">
                <div class="blog-meta-item">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                  <span>7 Min Read</span>
                </div>
              </div>
              <h3 class="blog-title"><a href="/blogs">The Economics of Decentralized MRFs in Smart Cities</a></h3>
              <p class="blog-excerpt">Analyzing capital expenditure, optical NIR sensor throughput, and local community integration models.</p>
              <div class="blog-footer">
                <a href="/blogs" style="color: inherit; text-decoration: none; display: inline-flex; align-items: center; gap: 6px; font-weight: 600;">
                  <span>Read Insight</span>
                  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                </a>
              </div>
            </div>
          </div>
        </div>

        <div style="margin-top: 40px; text-align: center;" class="reveal-on-scroll">
          <a href="{{ route('blogs') }}" class="btn btn-secondary" style="padding: 10px 24px; font-size: 0.9rem; font-weight: 600;">
            Explore All Blogs &amp; Insights &rarr;
          </a>
        </div>
      @endif
    </div>
  </section>
@endsection
