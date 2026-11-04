@extends('layouts.site')

@section('title', 'Contact Us | ' . setting('site_name', 'SHRISTIYAM'))
@section('meta_description', 'Contact ' . setting('company_legal_name', 'SHRISTIYAM COMPLIANCE SOLUTIONS PRIVATE LIMITED') . ' for statutory EPR compliance, recycling solutions, and regulatory advisory.')

@section('content')
<!-- Page Header -->
  <section class="section" style="padding-top: 140px; padding-bottom: 40px;">
    <div class="container">
      <div class="section-header reveal-on-scroll">
        <div class="section-tag">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
          <span>Get In Touch</span>
        </div>
        <h1 style="font-size: clamp(2.3rem, 4.4vw, 3.5rem); margin-bottom: 16px;">
          Connect with <span class="gradient-text">{{ setting('site_name', 'SHRISTIYAM') }}</span>
        </h1>
        <p class="section-desc">
          Get in touch with our team for statutory compliance, recycling frameworks, and environmental consulting.
        </p>
      </div>

      @if(session('success'))
        <div style="margin-bottom: 24px; padding: 16px 20px; border-radius: var(--radius-md); background: rgba(16, 185, 129, 0.08); border: 1px solid rgba(16, 185, 129, 0.25); color: #37704b; display: flex; align-items: center; gap: 12px; font-weight: 600;">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
          <span>{{ session('success') }}</span>
        </div>
      @endif

      @if($errors->any())
        <div style="margin-bottom: 24px; padding: 16px 20px; border-radius: var(--radius-md); background: rgba(239, 68, 68, 0.08); border: 1px solid rgba(239, 68, 68, 0.25); color: #b91c1c; font-weight: 500;">
          <strong style="display: block; margin-bottom: 4px;">Please review the form:</strong>
          <ul style="margin: 0; padding-left: 20px;">
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <!-- Contact Grid: Form + Info Cards -->
      <div class="grid-2" style="align-items: flex-start; gap: 40px;">
        <!-- Left: Form -->
        <div class="calc-container reveal-on-scroll">
          <h3 style="font-size: 1.45rem; margin-bottom: 6px;">Send Inquiry / Request Proposal</h3>
          <p style="font-size: 0.88rem; color: var(--text-muted); margin-bottom: 22px;">
            We respond promptly to your compliance requirements, inquiries, and technical advisory requests.
          </p>

          <form id="contactForm" method="POST" action="{{ route('contact.submit') }}">
            @csrf

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 16px;">
              <div class="form-group" style="margin-bottom: 0;">
                <label class="form-label">Full Name <span class="required-star">*</span></label>
                <input type="text" name="name" value="{{ old('name') }}" required placeholder="e.g. Alex Vance" class="form-control">
              </div>
              <div class="form-group" style="margin-bottom: 0;">
                <label class="form-label">Official Email <span class="required-star">*</span></label>
                <input type="email" name="email" value="{{ old('email') }}" required placeholder="alex@company.com" class="form-control">
              </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 16px;">
              <div class="form-group" style="margin-bottom: 0;">
                <label class="form-label">Phone / WhatsApp</label>
                <input type="tel" name="phone" value="{{ old('phone') }}" placeholder="+91 7020784898" class="form-control">
              </div>
              <div class="form-group" style="margin-bottom: 0;">
                <label class="form-label">Subject / Requirement <span class="required-star">*</span></label>
                <select name="subject" class="form-control">
                  <option value="EPR Compliance & Advisory" {{ old('subject') === 'EPR Compliance & Advisory' ? 'selected' : '' }}>EPR Compliance & Advisory</option>
                  <option value="Plastic Waste Management" {{ old('subject') === 'Plastic Waste Management' ? 'selected' : '' }}>Plastic Waste Management</option>
                  <option value="Battery Waste Compliance" {{ old('subject') === 'Battery Waste Compliance' ? 'selected' : '' }}>Battery Waste Compliance</option>
                  <option value="E-Waste Management" {{ old('subject') === 'E-Waste Management' ? 'selected' : '' }}>E-Waste Management</option>
                  <option value="Audit & Regulatory Filings" {{ old('subject') === 'Audit & Regulatory Filings' ? 'selected' : '' }}>Audit & Regulatory Filings</option>
                  <option value="General Corporate Inquiry" {{ old('subject') === 'General Corporate Inquiry' ? 'selected' : '' }}>General Corporate Inquiry</option>
                </select>
              </div>
            </div>

            <div class="form-group" style="margin-bottom: 22px;">
              <label class="form-label">Message / Project Specifics</label>
              <textarea name="message" rows="4" placeholder="Describe your compliance, audit, or consultation requirement..." class="form-control">{{ old('message') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary" style="width: 100%;">
              Send Inquiry
            </button>
          </form>
        </div>

        <!-- Right: Contact Information (Only Requested Details, All Dynamic) -->
        <div style="display: flex; flex-direction: column; gap: 18px;" class="reveal-on-scroll reveal-delay-2">
          <div class="solution-card" style="padding: 32px 28px; border: 1px solid var(--border-medium); border-radius: var(--radius-lg); background: var(--bg-surface); box-shadow: 0 10px 30px rgba(0, 0, 0, 0.04);">
            
            <!-- Company Legal Name & CIN Badge -->
            <div style="margin-bottom: 24px; padding-bottom: 20px; border-bottom: 1px solid var(--border-subtle);">
              <span class="cert-pill" style="display: inline-block; margin-bottom: 10px; font-size: 0.76rem; letter-spacing: 0.5px;">Registered Company</span>
              <h3 style="font-size: 1.25rem; font-weight: 800; color: var(--text-main); line-height: 1.4; margin: 0 0 12px 0;">
                {{ setting('company_legal_name', 'SHRISTIYAM COMPLIANCE SOLUTIONS PRIVATE LIMITED') }}
              </h3>
              @if(setting('company_cin'))
                <div style="display: inline-flex; align-items: center; gap: 6px; padding: 6px 12px; background: rgba(102, 154, 43, 0.08); border: 1px solid rgba(102, 154, 43, 0.25); border-radius: var(--radius-sm); font-size: 0.8rem; font-weight: 700; color: var(--accent-emerald); font-family: var(--font-mono);">
                  <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                  <span>CIN: {{ setting('company_cin', 'U74900ME2026PTC473633') }}</span>
                </div>
              @endif
            </div>

            <!-- Details List -->
            <div style="display: flex; flex-direction: column; gap: 22px;">
              
              <!-- 1. Registered Office Address -->
              <div style="display: flex; gap: 16px; align-items: flex-start;">
                <div style="width: 44px; height: 44px; border-radius: 10px; background: rgba(102, 154, 43, 0.1); color: var(--accent-emerald); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                  <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                    <circle cx="12" cy="10" r="3"></circle>
                  </svg>
                </div>
                <div>
                  <div style="font-size: 0.78rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; color: var(--text-muted); margin-bottom: 4px;">Registered Office Address</div>
                  <div style="font-size: 0.95rem; line-height: 1.55; color: var(--text-main); font-weight: 500;">
                    {!! nl2br(e(setting('contact_address', 'PL.NO.151, RAMDASPETH, NEAR TULI IMPERIAL HOTEL, Nagpur- 440010, Maharashtra'))) !!}
                  </div>
                </div>
              </div>

              <!-- 2. Main Phone Numbers -->
              <div style="display: flex; gap: 16px; align-items: flex-start;">
                <div style="width: 44px; height: 44px; border-radius: 10px; background: rgba(79, 70, 229, 0.1); color: var(--primary); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                  <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                  </svg>
                </div>
                <div>
                  <div style="font-size: 0.78rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; color: var(--text-muted); margin-bottom: 4px;">Main Phone</div>
                  <div style="font-size: 1.05rem; font-weight: 700; font-family: var(--font-mono); color: var(--text-main);">
                    @php
                      $rawPhones = setting('contact_phone', '7020784898 / 9112327953');
                      $phones = array_map('trim', explode('/', $rawPhones));
                    @endphp
                    @foreach($phones as $p)
                      <a href="tel:{{ preg_replace('/[^0-9+]/', '', $p) }}" style="color: var(--primary); text-decoration: none;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">{{ $p }}</a>{{ !$loop->last ? '  /  ' : '' }}
                    @endforeach
                  </div>
                </div>
              </div>

              <!-- 3. Department & Desk Emails (All 3 Dynamic Desks) -->
              <div style="display: flex; gap: 16px; align-items: flex-start;">
                <div style="width: 44px; height: 44px; border-radius: 10px; background: rgba(59, 108, 131, 0.1); color: #3b6c83; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                  <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                    <polyline points="22,6 12,13 2,6"></polyline>
                  </svg>
                </div>
                <div style="flex: 1; min-width: 0;">
                  <div style="font-size: 0.78rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; color: var(--text-muted); margin-bottom: 10px;">Corporate &amp; Department Desks</div>

                  <div style="display: flex; flex-direction: column; gap: 10px;">
                    <!-- 1. Corporate Inquiries -->
                    <div style="padding: 10px 14px; border-radius: var(--radius-md); background: rgba(59, 108, 131, 0.05); border: 1px solid rgba(59, 108, 131, 0.2);">
                      <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 3px; gap: 8px; flex-wrap: wrap;">
                        <span style="font-size: 0.72rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.4px; color: #3b6c83;">Corporate Inquiries</span>
                        <span style="font-size: 0.68rem; font-weight: 600; padding: 2px 7px; border-radius: 4px; background: rgba(59, 108, 131, 0.12); color: #3b6c83;">General</span>
                      </div>
                      <a href="mailto:{{ setting('contact_email', 'admin@shristiyam.com') }}" style="font-size: 0.95rem; font-weight: 700; color: var(--text-main); text-decoration: none; word-break: break-all; display: block;" onmouseover="this.style.color='#3b6c83'" onmouseout="this.style.color='var(--text-main)'">
                        {{ setting('contact_email', 'admin@shristiyam.com') }}
                      </a>
                    </div>

                    <!-- 2. EPR Statutory Compliance Desk -->
                    <div style="padding: 10px 14px; border-radius: var(--radius-md); background: rgba(102, 154, 43, 0.05); border: 1px solid rgba(102, 154, 43, 0.2);">
                      <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 3px; gap: 8px; flex-wrap: wrap;">
                        <span style="font-size: 0.72rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.4px; color: #669a2b;">EPR Statutory Compliance Desk</span>
                        <span style="font-size: 0.68rem; font-weight: 600; padding: 2px 7px; border-radius: 4px; background: rgba(102, 154, 43, 0.12); color: #37704b;">Compliance</span>
                      </div>
                      <a href="mailto:{{ setting('epr_desk_email', 'admin@shristiyam.com') }}" style="font-size: 0.95rem; font-weight: 700; color: var(--text-main); text-decoration: none; word-break: break-all; display: block;" onmouseover="this.style.color='#669a2b'" onmouseout="this.style.color='var(--text-main)'">
                        {{ setting('epr_desk_email', 'admin@shristiyam.com') }}
                      </a>
                    </div>

                    <!-- 3. Polymer Materials & Procurement Desk -->
                    <div style="padding: 10px 14px; border-radius: var(--radius-md); background: rgba(79, 70, 229, 0.05); border: 1px solid rgba(79, 70, 229, 0.2);">
                      <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 3px; gap: 8px; flex-wrap: wrap;">
                        <span style="font-size: 0.72rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.4px; color: var(--primary);">Industrial Fuels & Off-Take Desk</span>
                        <span style="font-size: 0.68rem; font-weight: 600; padding: 2px 7px; border-radius: 4px; background: rgba(79, 70, 229, 0.12); color: var(--primary);">Materials / Sales</span>
                      </div>
                      <a href="mailto:{{ setting('polymer_sales_email', 'admin@shristiyam.com') }}" style="font-size: 0.95rem; font-weight: 700; color: var(--text-main); text-decoration: none; word-break: break-all; display: block;" onmouseover="this.style.color='var(--primary)'" onmouseout="this.style.color='var(--text-main)'">
                        {{ setting('polymer_sales_email', 'admin@shristiyam.com') }}
                      </a>
                    </div>
                  </div>
                </div>
              </div>

              <!-- 4. Operating / Business Hours -->
              @if(setting('business_hours'))
              <div style="display: flex; gap: 16px; align-items: flex-start;">
                <div style="width: 44px; height: 44px; border-radius: 10px; background: rgba(245, 158, 11, 0.1); color: #d97706; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                  <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="10"></circle>
                    <polyline points="12 6 12 12 16 14"></polyline>
                  </svg>
                </div>
                <div>
                  <div style="font-size: 0.78rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; color: var(--text-muted); margin-bottom: 4px;">Operating Hours</div>
                  <div style="font-size: 0.95rem; font-weight: 600; color: var(--text-main);">
                    {{ setting('business_hours', 'Monday - Friday: 9:00 AM - 6:00 PM') }}
                  </div>
                </div>
              </div>
              @endif

            </div>

          </div>

        </div>
      </div>

      <!-- Department Communication Desks Section (3 Dynamic Channels) -->
      <div style="margin-top: 50px;" class="reveal-on-scroll">
        <div style="text-align: center; max-width: 640px; margin: 0 auto 32px;">
          <div class="section-tag" style="margin-bottom: 8px;">Direct Department Channels</div>
          <h2 style="font-size: clamp(1.6rem, 3vw, 2.2rem); margin-bottom: 10px;">
            Reach the <span class="gradient-text">Right Desk Directly</span>
          </h2>
          <p style="font-size: 0.92rem; color: var(--text-muted);">
            Dedicated communication channels for instant routing to our executive, compliance, and material supply teams.
          </p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 24px;">
          
          <!-- Desk 1: Corporate Inquiries -->
          <div class="solution-card" style="padding: 28px 24px; border-radius: var(--radius-lg); border: 1px solid var(--border-medium); background: var(--bg-surface); display: flex; flex-direction: column; justify-content: space-between; transition: all 0.25s ease;">
            <div>
              <div style="width: 48px; height: 48px; border-radius: 12px; background: rgba(59, 108, 131, 0.12); color: #3b6c83; display: flex; align-items: center; justify-content: center; margin-bottom: 18px;">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M3 21h18"></path>
                  <path d="M5 21V7l8-4v18"></path>
                  <path d="M19 21V11l-6-3"></path>
                  <line x1="9" y1="9" x2="9" y2="9.01"></line>
                  <line x1="9" y1="13" x2="9" y2="13.01"></line>
                  <line x1="9" y1="17" x2="9" y2="17.01"></line>
                </svg>
              </div>
              <span class="cert-pill" style="margin-bottom: 10px; display: inline-block; font-size: 0.72rem;">Central Office</span>
              <h4 style="font-size: 1.15rem; font-weight: 800; margin-bottom: 8px; color: var(--text-main);">Corporate Inquiries</h4>
              <p style="font-size: 0.88rem; color: var(--text-muted); line-height: 1.5; margin-bottom: 20px;">
                General queries, strategic alliances, media relations, and corporate communications.
              </p>
            </div>
            <a href="mailto:{{ setting('contact_email', 'admin@shristiyam.com') }}" class="btn btn-secondary" style="width: 100%; font-size: 0.86rem; text-decoration: none; display: inline-flex; align-items: center; justify-content: center; gap: 8px; word-break: break-all; padding: 10px 14px;">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
              <span>{{ setting('contact_email', 'admin@shristiyam.com') }}</span>
            </a>
          </div>

          <!-- Desk 2: EPR Statutory Compliance Desk -->
          <div class="solution-card" style="padding: 28px 24px; border-radius: var(--radius-lg); border: 1px solid rgba(102, 154, 43, 0.3); background: var(--bg-surface); display: flex; flex-direction: column; justify-content: space-between; transition: all 0.25s ease; box-shadow: 0 10px 30px rgba(102, 154, 43, 0.05);">
            <div>
              <div style="width: 48px; height: 48px; border-radius: 12px; background: rgba(102, 154, 43, 0.12); color: #669a2b; display: flex; align-items: center; justify-content: center; margin-bottom: 18px;">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                  <polyline points="9 12 11 14 15 10"></polyline>
                </svg>
              </div>
              <span class="cert-pill" style="margin-bottom: 10px; display: inline-block; font-size: 0.72rem; background: rgba(102, 154, 43, 0.1); color: #669a2b; border-color: rgba(102, 154, 43, 0.3);">Regulatory & PRO</span>
              <h4 style="font-size: 1.15rem; font-weight: 800; margin-bottom: 8px; color: var(--text-main);">EPR Compliance Desk</h4>
              <p style="font-size: 0.88rem; color: var(--text-muted); line-height: 1.5; margin-bottom: 20px;">
                Statutory brand obligations, CPCB & SPCB filings, EPR credits, audits, and compliance certificates.
              </p>
            </div>
            <a href="mailto:{{ setting('epr_desk_email', 'admin@shristiyam.com') }}" class="btn btn-primary" style="width: 100%; font-size: 0.86rem; text-decoration: none; display: inline-flex; align-items: center; justify-content: center; gap: 8px; word-break: break-all; padding: 10px 14px; background: #669a2b; border-color: #669a2b;">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
              <span>{{ setting('epr_desk_email', 'admin@shristiyam.com') }}</span>
            </a>
          </div>

          <!-- Desk 3: Polymer Materials & Procurement Desk -->
          <div class="solution-card" style="padding: 28px 24px; border-radius: var(--radius-lg); border: 1px solid var(--border-medium); background: var(--bg-surface); display: flex; flex-direction: column; justify-content: space-between; transition: all 0.25s ease;">
            <div>
              <div style="width: 48px; height: 48px; border-radius: 12px; background: rgba(79, 70, 229, 0.12); color: var(--primary); display: flex; align-items: center; justify-content: center; margin-bottom: 18px;">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                  <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                  <line x1="12" y1="22.08" x2="12" y2="12"></line>
                </svg>
              </div>
              <span class="cert-pill" style="margin-bottom: 10px; display: inline-block; font-size: 0.72rem;">Alternative Fuels</span>
              <h4 style="font-size: 1.15rem; font-weight: 800; margin-bottom: 8px; color: var(--text-main);">Industrial Fuels &amp; Off-Take Desk</h4>
              <p style="font-size: 0.88rem; color: var(--text-muted); line-height: 1.5; margin-bottom: 20px;">
                Bulk supply of Bio Energy Fuel &amp; Refuse Derived Fuel (RDF), technical datasheets (TDS), and industrial boiler agreements.
              </p>
            </div>
            <a href="mailto:{{ setting('polymer_sales_email', 'admin@shristiyam.com') }}" class="btn btn-secondary" style="width: 100%; font-size: 0.86rem; text-decoration: none; display: inline-flex; align-items: center; justify-content: center; gap: 8px; word-break: break-all; padding: 10px 14px;">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
              <span>{{ setting('polymer_sales_email', 'admin@shristiyam.com') }}</span>
            </a>
          </div>

        </div>
      </div>
    </div>
  </section>
@endsection
