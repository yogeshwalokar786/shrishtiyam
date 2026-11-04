@extends('layouts.site')

@section('title', $policy->title . ' | CircuFlow')
@section('meta_description', $policy->meta_description ?? 'Read the official ' . $policy->title . ' for CircuFlow Circular Solutions.')

@section('content')
<!-- Policy Page Header -->
<section class="section" style="padding-top: 130px; padding-bottom: 40px; background: linear-gradient(180deg, rgba(5, 150, 105, 0.04) 0%, transparent 100%);">
  <div class="container">
    <div style="max-width: 800px;">
      <div class="section-tag" style="margin-bottom: 12px;">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
        </svg>
        <span>Legal & Transparency</span>
      </div>
      <h1 style="font-size: clamp(2.2rem, 4vw, 3.2rem); margin-bottom: 12px; color: var(--text-main);">
        {{ $policy->title }}
      </h1>
      <p style="font-size: 0.95rem; color: var(--text-muted); margin: 0;">
        Last updated: <strong>{{ $policy->updated_at->format('F d, Y') }}</strong> • Official CircuFlow Governance
      </p>
    </div>
  </div>
</section>

<!-- Policy Content & Sidebar Section -->
<section class="section" style="padding-top: 20px; padding-bottom: 90px;">
  <div class="container">
    <div style="display: grid; grid-template-columns: 280px 1fr; gap: 40px; align-items: flex-start;">
      
      <!-- Left: Policy Index / Sidebar Navigation -->
      <aside style="position: sticky; top: 110px;">
        <div class="calc-container" style="padding: 24px; border-radius: var(--radius-md);">
          <h4 style="font-size: 1.05rem; font-weight: 700; margin-bottom: 16px; color: var(--text-main);">
            Policies & Legal
          </h4>
          <nav style="display: flex; flex-direction: column; gap: 8px;">
            @foreach($allPolicies as $navItem)
              <a href="{{ $navItem->url }}" 
                 style="display: flex; align-items: center; justify-content: space-between; padding: 10px 14px; border-radius: var(--radius-sm); text-decoration: none; font-size: 0.88rem; font-weight: 600; transition: all 0.2s ease;
                 {{ $navItem->id === $policy->id ? 'background: var(--primary); color: #ffffff;' : 'color: var(--text-muted); background: var(--bg-surface-elevated);' }}">
                <span>{{ $navItem->title }}</span>
                @if($navItem->id === $policy->id)
                  <span style="font-size: 0.75rem;">●</span>
                @endif
              </a>
            @endforeach
          </nav>

          <hr style="border: none; border-top: 1px solid var(--border-medium); margin: 20px 0;">

          <div style="font-size: 0.82rem; color: var(--text-muted); line-height: 1.5;">
            Questions about our policies? Contact our compliance desk at 
            <a href="/contact" style="color: var(--primary); font-weight: 600; text-decoration: none;">contact us</a>.
          </div>
        </div>
      </aside>

      <!-- Right: Main Policy Body -->
      <article class="calc-container" style="padding: 40px; border-radius: var(--radius-md); background: #ffffff;">
        <div class="policy-body" style="font-size: 1rem; line-height: 1.75; color: var(--text-main);">
          {!! $policy->content !!}
        </div>

        <div style="margin-top: 40px; padding-top: 24px; border-top: 1px solid var(--border-medium); display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 16px;">
          <div style="font-size: 0.84rem; color: var(--text-muted);">
            CircuFlow • Official Public Documentation
          </div>
          <button type="button" onclick="window.print()" class="btn btn-secondary btn-sm" style="display: inline-flex; align-items: center; gap: 6px;">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <polyline points="6 9 6 2 18 2 18 9"></polyline>
              <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path>
              <rect x="6" y="14" width="12" height="8"></rect>
            </svg>
            <span>Print Policy</span>
          </button>
        </div>
      </article>

    </div>
  </div>
</section>

<style>
  .policy-body h2 {
    font-size: 1.35rem;
    font-weight: 700;
    margin-top: 32px;
    margin-bottom: 12px;
    color: var(--text-main);
  }
  .policy-body h2:first-child {
    margin-top: 0;
  }
  .policy-body p {
    margin-bottom: 16px;
    color: var(--text-muted);
  }
  .policy-body ul, .policy-body ol {
    margin-bottom: 20px;
    padding-left: 24px;
    color: var(--text-muted);
  }
  .policy-body li {
    margin-bottom: 8px;
  }
  .policy-body strong {
    color: var(--text-main);
  }
  @media (max-width: 900px) {
    .container > div[style*="grid-template-columns"] {
      grid-template-columns: 1fr !important;
    }
  }
</style>
@endsection
