@extends('layouts.site')

@section('title', ($currentCategory ? $currentCategory->name . ' - ' : '') . 'Knowledge Hub & Blogs | CircuFlow')
@section('meta_description', $currentCategory ? $currentCategory->description : 'Explore the latest insights, regulatory updates, polymer engineering advances, and circular economy strategies.')

@section('content')
<!-- Page Header -->
  <section class="section" style="padding-top: 140px; padding-bottom: 40px;">
    <div class="container">
      <div class="section-header reveal-on-scroll">
        <div class="section-tag">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
          <span>Insights & Industry Intelligence</span>
        </div>
        <h1 style="font-size: clamp(2.3rem, 4.4vw, 3.5rem); margin-bottom: 16px;">
          @if($currentCategory)
            {{ $currentCategory->name }} <span class="gradient-text">Insights</span>
          @else
            Circular Economy <span class="gradient-text">Knowledge Hub</span>
          @endif
        </h1>
        <p class="section-desc">
          @if($currentCategory && $currentCategory->description)
            {{ $currentCategory->description }}
          @else
            Authoritative articles on Extended Producer Responsibility regulations, PCR resin formulation, carbon offset analytics, and zero-waste logistics.
          @endif
        </p>
      </div>

      <!-- Search & Category Filters -->
      <div style="max-width: 680px; margin: 0 auto 36px;" class="reveal-on-scroll">
        <form method="GET" action="{{ route('blogs') }}" style="display: flex; background: #ffffff; border: 1px solid var(--border-medium); border-radius: var(--radius-full); padding: 6px 16px; box-shadow: var(--shadow-sm); align-items: center; gap: 10px;">
          @if(!empty($categorySlug) && $categorySlug !== 'all')
            <input type="hidden" name="category" value="{{ $categorySlug }}">
          @endif
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--accent-emerald)" stroke-width="2.5"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
          <input type="text" name="search" value="{{ $search }}" placeholder="Search insights, topics, PCR grades, or EPR compliance..." style="flex: 1; border: none; outline: none; background: transparent; font-size: 0.95rem; color: var(--text-main); padding: 8px 0;">
          @if(!empty($search))
            <a href="{{ route('blogs', ['category' => $categorySlug]) }}" style="color: var(--text-muted); text-decoration: none; font-size: 0.85rem; padding: 0 6px;" title="Clear Search">✕</a>
          @endif
          <button type="submit" class="btn btn-primary btn-sm" style="border-radius: var(--radius-full); padding: 6px 16px;">Search</button>
        </form>
      </div>

      <div class="solution-tabs reveal-on-scroll" style="display: flex; justify-content: center; gap: 10px; flex-wrap: wrap;">
        <a href="{{ route('blogs', ['search' => $search]) }}" 
           class="solution-tab-btn {{ empty($categorySlug) || $categorySlug === 'all' ? 'active' : '' }}" 
           style="text-decoration: none;">
          All Articles ({{ $totalPublishedCount }})
        </a>
        @foreach($categories as $cat)
          <a href="{{ route('blogs', ['category' => $cat->slug, 'search' => $search]) }}" 
             class="solution-tab-btn {{ $categorySlug === $cat->slug ? 'active' : '' }}" 
             style="text-decoration: none;">
            {{ $cat->name }} ({{ $cat->blogs_count }})
          </a>
        @endforeach
      </div>
    </div>
  </section>

  @if($featuredBlog)
    <!-- Featured Lead Article -->
    <section class="section" style="padding-top: 0; padding-bottom: 30px;">
      <div class="container">
        <div class="featured-blog-card reveal-on-scroll">
          <div>
            <div class="blog-meta-row">
              <span class="cert-pill" style="font-size: 0.75rem;">
                {{ $featuredBlog->category ? $featuredBlog->category->name : 'Featured Guide' }}
              </span>
              <div class="blog-meta-item">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                <span>{{ $featuredBlog->read_time ?? '6 Min Read' }}</span>
              </div>
              <div class="blog-meta-item">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                <span>{{ $featuredBlog->formatted_date }}</span>
              </div>
            </div>
            <h2 style="font-size: clamp(1.6rem, 2.8vw, 2.2rem); margin-bottom: 14px;">
              <a href="{{ $featuredBlog->url }}" style="color: inherit; text-decoration: none;">{{ $featuredBlog->title }}</a>
            </h2>
            <p style="font-size: 1rem; color: var(--text-muted); line-height: 1.7; margin-bottom: 22px;">
              {{ $featuredBlog->excerpt }}
            </p>
            <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 14px;">
              <div style="display: flex; align-items: center; gap: 10px;">
                <div style="width: 38px; height: 38px; border-radius: 50%; background: var(--bg-surface-elevated); border: 2px solid var(--accent-emerald); display: flex; align-items: center; justify-content: center; font-weight: 700; color: var(--accent-emerald);">
                  {{ strtoupper(substr($featuredBlog->author_name, 0, 2)) }}
                </div>
                <div>
                  <span style="display: block; font-size: 0.88rem; font-weight: 700; color: var(--text-main);">{{ $featuredBlog->author_name }}</span>
                  <span style="display: block; font-size: 0.76rem; color: var(--text-muted);">{{ $featuredBlog->author_role ?? 'Circularity Specialist' }}</span>
                </div>
              </div>
              <a href="{{ $featuredBlog->url }}" class="btn btn-primary btn-sm">Read Complete Article →</a>
            </div>
          </div>

          <div class="blog-thumbnail" style="height: 100%; min-height: 260px; border-radius: var(--radius-md);">
            <img src="{{ $featuredBlog->image_url }}" alt="{{ $featuredBlog->title }}" class="blog-thumb-img">
          </div>
        </div>
      </div>
    </section>
  @endif

  <!-- Blog Cards Grid -->
  <section class="section" style="padding-top: 0;">
    <div class="container">
      @if($blogs->count() > 0)
        <div class="blog-grid">
          @foreach($blogs as $index => $item)
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
                  {{ $item->excerpt }}
                </p>
                <div class="blog-footer">
                  <span>Read Insight</span>
                  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                </div>
              </div>
            </div>
          @endforeach
        </div>

        <!-- Dynamic Pagination -->
        @if($blogs->hasPages())
          <div class="pagination-row">
            {{-- Previous Page Link --}}
            @if ($blogs->onFirstPage())
              <span class="page-btn" style="opacity: 0.5; cursor: not-allowed;">←</span>
            @else
              <a href="{{ $blogs->previousPageUrl() }}" class="page-btn" style="text-decoration: none;">←</a>
            @endif

            {{-- Numbered Page Links --}}
            @foreach ($blogs->getUrlRange(1, $blogs->lastPage()) as $page => $url)
              @if ($page == $blogs->currentPage())
                <span class="page-btn active">{{ $page }}</span>
              @else
                <a href="{{ $url }}" class="page-btn" style="text-decoration: none;">{{ $page }}</a>
              @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($blogs->hasMorePages())
              <a href="{{ $blogs->nextPageUrl() }}" class="page-btn" style="text-decoration: none;">→</a>
            @else
              <span class="page-btn" style="opacity: 0.5; cursor: not-allowed;">→</span>
            @endif
          </div>
        @endif
      @else
        <div style="background: #ffffff; border: 1px solid var(--border-medium); border-radius: var(--radius-lg); padding: 56px 24px; text-align: center; max-width: 600px; margin: 20px auto;">
          <div style="width: 56px; height: 56px; border-radius: 50%; background: var(--bg-surface-elevated); display: flex; align-items: center; justify-content: center; margin: 0 auto 16px; color: var(--text-muted);">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
          </div>
          <h3 style="font-size: 1.3rem; margin-bottom: 8px;">No Articles Found</h3>
          <p style="color: var(--text-muted); font-size: 0.92rem; margin-bottom: 24px;">
            @if(!empty($search))
              No articles matched your search query "{{ $search }}".
            @else
              There are currently no articles in this category.
            @endif
          </p>
          <a href="{{ route('blogs') }}" class="btn btn-secondary">View All Articles</a>
        </div>
      @endif
    </div>
  </section>

  <!-- Newsletter Lead Banner -->
  <section class="section" style="background: var(--bg-surface-elevated);">
    <div class="container">
      <div style="max-width: 680px; margin: 0 auto; text-align: center;" class="reveal-on-scroll">
        <h3 style="font-size: 1.8rem; margin-bottom: 12px;">Get Weekly Circularity Briefings</h3>
        <p style="color: var(--text-muted); margin-bottom: 24px;">Join over 4,500+ sustainability officers, packaging engineers, and supply chain leaders.</p>
        <form class="newsletter-form" onsubmit="event.preventDefault(); window.showToast ? window.showToast('Subscribed to CircuFlow Knowledge Hub!') : alert('Subscribed to CircuFlow Knowledge Hub!');" style="max-width: 480px; margin: 0 auto; display: flex; gap: 8px;">
          <input type="email" placeholder="Enter your work email..." required class="form-control" style="flex: 1; padding: 10px 14px;">
          <button type="submit" class="btn btn-primary">Subscribe</button>
        </form>
      </div>
    </div>
  </section>
@endsection
