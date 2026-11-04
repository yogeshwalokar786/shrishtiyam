@extends('layouts.site')

@section('title', '404 - Page Not Found | CircuFlow')
@section('meta_description', 'The page you are looking for does not exist or has been moved. Explore CircuFlow\'s circular economy solutions and PCR polymer catalog.')

@section('content')
<!-- 404 Error Content -->
  <section class="section" style="padding-top: 160px; padding-bottom: 90px; min-height: 80vh; display: flex; align-items: center;">
    <div class="container">
      <div style="max-width: 780px; margin: 0 auto; text-align: center;" class="reveal-on-scroll">
        
        <!-- Animated 404 Badge & Graphic -->
        <div style="position: relative; display: inline-flex; align-items: center; justify-content: center; margin-bottom: 24px;">
          <div style="font-family: var(--font-heading); font-size: clamp(6.5rem, 16vw, 11rem); font-weight: 900; line-height: 0.9; letter-spacing: -0.05em; background: linear-gradient(135deg, rgba(5,150,105,0.2) 0%, rgba(8,145,178,0.2) 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
            404
          </div>
          <div style="position: absolute; width: 72px; height: 72px; border-radius: 50%; background: #ffffff; border: 2px solid var(--accent-emerald); box-shadow: var(--shadow-md); display: flex; align-items: center; justify-content: center; color: var(--accent-emerald);">
            <svg width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="12" cy="12" r="10"></circle>
              <line x1="4.93" y1="4.93" x2="19.07" y2="19.07"></line>
            </svg>
          </div>
        </div>

        <div class="section-tag" style="margin-bottom: 16px;">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
          <span>Resource Route Not Found</span>
        </div>

        <h1 style="font-size: clamp(2rem, 4vw, 2.8rem); margin-bottom: 16px;">
          This Page Has Been <span class="gradient-text">Diverted or Recycled</span>
        </h1>
        
        <p style="font-size: 1.08rem; color: var(--text-muted); line-height: 1.7; max-width: 600px; margin: 0 auto 36px;">
          The destination you requested may have been relocated, upgraded, or returned to our circular loop. Let's get you back on track with our verified resources.
        </p>

        <!-- Search Bar -->
        <div style="max-width: 520px; margin: 0 auto 36px;">
          <form action="blogs.html" method="GET" style="display: flex; background: #ffffff; border: 1px solid var(--border-medium); border-radius: var(--radius-full); padding: 6px 14px; box-shadow: var(--shadow-sm); align-items: center; gap: 10px;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--accent-emerald)" stroke-width="2.5"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
            <input type="text" name="q" placeholder="Search polymers, EPR compliance, or blogs..." style="flex: 1; border: none; outline: none; background: transparent; font-size: 0.92rem; color: var(--text-main); padding: 8px 0;">
            <button type="submit" class="btn btn-primary btn-sm">Search</button>
          </form>
        </div>

        <!-- Quick Hub Cards Grid -->
        <div class="grid-4" style="text-align: left; margin-bottom: 40px;">
          <a href="/" class="solution-card" style="padding: 20px;">
            <div class="solution-card-icon" style="width: 40px; height: 40px; margin-bottom: 12px;">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path></svg>
            </div>
            <h5 style="font-size: 1rem; margin-bottom: 4px;">Home</h5>
            <p style="font-size: 0.8rem; margin: 0; color: var(--text-muted);">Return to overview</p>
          </a>

          <a href="/products" class="solution-card" style="padding: 20px;">
            <div class="solution-card-icon" style="width: 40px; height: 40px; margin-bottom: 12px;">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path></svg>
            </div>
            <h5 style="font-size: 1rem; margin-bottom: 4px;">PCR Polymers</h5>
            <p style="font-size: 0.8rem; margin: 0; color: var(--text-muted);">View resin catalog</p>
          </a>

          <a href="/solutions" class="solution-card" style="padding: 20px;">
            <div class="solution-card-icon" style="width: 40px; height: 40px; margin-bottom: 12px;">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path></svg>
            </div>
            <h5 style="font-size: 1rem; margin-bottom: 4px;">Services & EPR</h5>
            <p style="font-size: 0.8rem; margin: 0; color: var(--text-muted);">Explore compliance</p>
          </a>

          <a href="/blogs" class="solution-card" style="padding: 20px;">
            <div class="solution-card-icon" style="width: 40px; height: 40px; margin-bottom: 12px;">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
            </div>
            <h5 style="font-size: 1rem; margin-bottom: 4px;">Knowledge Hub</h5>
            <p style="font-size: 0.8rem; margin: 0; color: var(--text-muted);">Read insights & guides</p>
          </a>
        </div>

        <!-- Action CTAs -->
        <div style="display: flex; justify-content: center; gap: 14px; flex-wrap: wrap;">
          <a href="/" class="btn btn-primary btn-lg">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="15 18 9 12 15 6"></polyline></svg>
            <span>Back to Homepage</span>
          </a>
          <a href="/contact" class="btn btn-secondary btn-lg">
            Contact Support Desk
          </a>
        </div>

      </div>
    </div>
  </section>
@endsection
