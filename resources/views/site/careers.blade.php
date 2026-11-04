@extends('layouts.site')

@section('title', 'Careers & Culture | ' . setting('site_name', 'SHRISTIYAM'))
@section('meta_description', 'Join Shristiyam Compliance Solutions. We are hiring across EPR compliance, industrial waste aggregation, alternative biomass fuels, and supply chain logistics.')

@section('content')
  <!-- Careers Hero Header (Dark Cinema Aesthetics matching Site Identity) -->
  <section class="section" style="background: radial-gradient(circle at top right, rgba(46, 115, 157, 0.22) 0%, rgba(5, 38, 27, 0.98) 60%), #05261b; color: #ffffff; padding: 150px 0 80px 0; position: relative; overflow: hidden;">
    <div class="container">
      <div style="max-width: 820px;">
        <div style="display: inline-flex; align-items: center; gap: 8px; padding: 6px 16px; background: rgba(102, 154, 43, 0.16); border: 1px solid rgba(102, 154, 43, 0.4); border-radius: 9999px; font-size: 0.8rem; font-weight: 700; color: #669a2b; text-transform: uppercase; letter-spacing: 0.08em; margin-bottom: 20px;">
          Careers at {{ setting('site_name', 'SHRISTIYAM') }}
        </div>
        <h1 style="font-size: clamp(2.2rem, 4.2vw, 3.4rem); font-weight: 800; line-height: 1.15; color: #ffffff; margin-bottom: 20px; font-family: var(--font-heading); letter-spacing: -0.02em;">
          Powering India's Circular Economy Through <span style="background: linear-gradient(135deg, #37704b 0%, #669a2b 50%, #3b6c83 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Purpose-Driven Careers</span>
        </h1>
        <p style="font-size: 1.1rem; line-height: 1.7; color: rgba(255, 255, 255, 0.82); margin-bottom: 32px; max-width: 720px;">
          We operate at the critical intersection of statutory compliance, environmental stewardship, and industrial alternative fuels. Join our mission to turn uncollected waste streams into valuable circular assets.
        </p>
        <div style="display: flex; gap: 14px; flex-wrap: wrap;">
          <a href="#open-roles" class="btn btn-primary" style="background: #669a2b; border-color: #669a2b;">Explore Opportunities ↓</a>
          <a href="/about" class="btn btn-secondary" style="border-color: rgba(255,255,255,0.3); color: #ffffff;">Our Story &amp; Vision →</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Open Departments & Core Roles -->
  <section class="section" id="open-roles" style="background: #ffffff; padding: 80px 0;">
    <div class="container">
      <div class="section-header" style="text-align: left; max-width: 760px; margin-bottom: 48px;">
        <span class="section-tag" style="background: rgba(102, 154, 43, 0.1); color: #37704b; border-color: rgba(102, 154, 43, 0.25);">Work With Purpose</span>
        <h2 style="font-size: 2.2rem; font-weight: 800; color: #1e293b; margin-top: 10px; margin-bottom: 12px; font-family: var(--font-heading);">
          Key Operational Pillars
        </h2>
        <p style="font-size: 1.05rem; color: #64748b; line-height: 1.6;">
          Whether you are a seasoned environmental auditor, an agile supply chain manager, or an industrial fuel technician, your contribution drives real measurable impact.
        </p>
      </div>

      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 24px;">
        <!-- Card 1 -->
        <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 16px; padding: 32px; transition: transform 0.2s, box-shadow 0.2s;">
          <div style="width: 44px; height: 44px; border-radius: 10px; background: rgba(102, 154, 43, 0.14); display: flex; align-items: center; justify-content: center; color: #669a2b; margin-bottom: 20px;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
          </div>
          <h3 style="font-size: 1.22rem; font-weight: 700; color: #0f172a; margin-bottom: 10px;">EPR &amp; Compliance Advisory</h3>
          <p style="font-size: 0.92rem; color: #64748b; line-height: 1.6; margin-bottom: 20px;">
            Auditing, CPCB portal quota allocation, PIBO target fulfillment, and statutory environmental returns filing.
          </p>
          <span style="font-size: 0.8rem; font-weight: 700; color: #669a2b; text-transform: uppercase; letter-spacing: 0.05em;">Nagpur HQ &bull; Full-time</span>
        </div>

        <!-- Card 2 -->
        <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 16px; padding: 32px; transition: transform 0.2s, box-shadow 0.2s;">
          <div style="width: 44px; height: 44px; border-radius: 10px; background: rgba(46, 115, 157, 0.14); display: flex; align-items: center; justify-content: center; color: #3b6c83; margin-bottom: 20px;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"></path></svg>
          </div>
          <h3 style="font-size: 1.22rem; font-weight: 700; color: #0f172a; margin-bottom: 10px;">BioEnergy &amp; Alternative Fuels</h3>
          <p style="font-size: 0.92rem; color: #64748b; line-height: 1.6; margin-bottom: 20px;">
            Processing agricultural and industrial solid waste into high-CV Refuse Derived Fuel (RDF) and industrial biomass pellets.
          </p>
          <span style="font-size: 0.8rem; font-weight: 700; color: #3b6c83; text-transform: uppercase; letter-spacing: 0.05em;">Plant Operations &bull; Central India</span>
        </div>

        <!-- Card 3 -->
        <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 16px; padding: 32px; transition: transform 0.2s, box-shadow 0.2s;">
          <div style="width: 44px; height: 44px; border-radius: 10px; background: rgba(102, 154, 43, 0.14); display: flex; align-items: center; justify-content: center; color: #669a2b; margin-bottom: 20px;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
          </div>
          <h3 style="font-size: 1.22rem; font-weight: 700; color: #0f172a; margin-bottom: 10px;">Supply Chain &amp; MRF Management</h3>
          <p style="font-size: 0.92rem; color: #64748b; line-height: 1.6; margin-bottom: 20px;">
            Direct municipal material recovery facility (MRF) aggregation, waste-worker formalization, and fair pricing mechanisms.
          </p>
          <span style="font-size: 0.8rem; font-weight: 700; color: #669a2b; text-transform: uppercase; letter-spacing: 0.05em;">Regional Hubs &bull; Field Operations</span>
        </div>
      </div>

      <!-- Application CTA Card -->
      <div style="margin-top: 50px; background: linear-gradient(135deg, #05261b 0%, #11382a 100%); border-radius: 20px; padding: 48px; color: #ffffff; display: flex; flex-direction: column; md:flex-row; align-items: center; justify-content: space-between; gap: 32px;">
        <div style="max-width: 600px;">
          <h3 style="font-size: 1.8rem; font-weight: 800; color: #ffffff; margin-bottom: 12px; font-family: var(--font-heading);">
            Don't see your specific role?
          </h3>
          <p style="font-size: 1rem; color: rgba(255, 255, 255, 0.8); line-height: 1.6; margin: 0;">
            We are always eager to connect with motivated talent. Send your curriculum vitae and an introduction to our talent desk, and our leadership team will reach out.
          </p>
        </div>
        <div>
          <a href="mailto:{{ setting('contact_email', 'admin@shristiyam.com') }}?subject=Career%20Application%20at%20Shristiyam" class="btn btn-primary" style="background: #669a2b; border-color: #669a2b; padding: 14px 28px; font-size: 0.95rem;">
            Submit Resume via Email →
          </a>
        </div>
      </div>
    </div>
  </section>
@endsection
