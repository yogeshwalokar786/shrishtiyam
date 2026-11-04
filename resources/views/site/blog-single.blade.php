@extends('layouts.site')

@section('title', $blog->meta_title ?: ($blog->title . ' | CircuFlow Blog'))
@section('meta_description', $blog->meta_description ?: Str::limit(strip_tags($blog->excerpt ?: $blog->content), 155))

@section('content')
<!-- Article Header -->
  <section class="section" style="padding-top: 140px; padding-bottom: 30px;">
    <div class="container">
      <div class="article-header reveal-on-scroll">
        <div style="display: flex; align-items: center; justify-content: center; gap: 8px; font-size: 0.84rem; color: var(--text-muted); margin-bottom: 16px;">
          <a href="{{ route('home') }}" style="color: inherit; text-decoration: none;">Home</a> 
          <span>/</span> 
          <a href="{{ route('blogs') }}" style="color: inherit; text-decoration: none;">Blogs</a> 
          @if($blog->category)
            <span>/</span> 
            <a href="{{ route('blogs', ['category' => $blog->category->slug]) }}" style="color: var(--accent-emerald); text-decoration: none;">
              {{ $blog->category->name }}
            </a>
          @endif
        </div>
        
        <h1 style="font-size: clamp(2.1rem, 3.8vw, 3.1rem); margin-bottom: 18px; line-height: 1.2;">
          {{ $blog->title }}
        </h1>
        
        <div style="display: flex; align-items: center; justify-content: center; gap: 16px; flex-wrap: wrap; font-size: 0.86rem; color: var(--text-muted);">
          <span style="font-weight: 700; color: var(--text-main);">By {{ $blog->author_name }}</span>
          <span>•</span>
          <span>Published {{ $blog->formatted_date }}</span>
          <span>•</span>
          <span>{{ $blog->read_time ?? '5 Min Read' }}</span>
          @if($blog->category)
            <span>•</span>
            <span class="cert-pill" style="font-size: 0.72rem;">{{ $blog->category->name }}</span>
          @endif
        </div>
      </div>
    </div>
  </section>

  <!-- Article Content -->
  <section class="section" style="padding-top: 0;">
    <div class="container">
      <div class="article-content reveal-on-scroll">
        @if($blog->image)
          <div style="width: 100%; border-radius: var(--radius-lg); overflow: hidden; margin-bottom: 32px; border: 1px solid var(--border-medium); box-shadow: var(--shadow-sm);">
            <img src="{{ $blog->image_url }}" alt="{{ $blog->title }}" style="width: 100%; max-height: 480px; object-fit: cover; display: block;">
          </div>
        @endif

        @if($blog->excerpt)
          <p style="font-size: 1.12rem; font-weight: 500; color: var(--text-main); line-height: 1.7; margin-bottom: 28px; border-left: 3px solid var(--accent-emerald); padding-left: 18px;">
            {{ $blog->excerpt }}
          </p>
        @endif

        <div class="article-body-content" style="line-height: 1.8; font-size: 1.02rem; color: var(--text-body);">
          {!! $blog->content !!}
        </div>

        <!-- Author Box -->
        <div style="background: var(--bg-surface-elevated); border: 1px solid var(--border-medium); border-radius: var(--radius-md); padding: 24px; margin-top: 48px; display: flex; align-items: center; gap: 18px;">
          <div style="width: 54px; height: 54px; border-radius: 50%; background: var(--gradient-brand); display: flex; align-items: center; justify-content: center; font-weight: 800; color: #ffffff; font-size: 1.2rem; flex-shrink: 0;">
            {{ strtoupper(substr($blog->author_name, 0, 2)) }}
          </div>
          <div>
            <h4 style="font-size: 1.1rem; margin-bottom: 4px;">{{ $blog->author_name }}</h4>
            <p style="font-size: 0.88rem; color: var(--text-muted); margin: 0;">
              {{ $blog->author_role ?: 'Contributing sustainability author and circular materials analyst.' }}
            </p>
          </div>
        </div>

        <!-- Related Articles -->
        @if(isset($relatedBlogs) && $relatedBlogs->isNotEmpty())
          <div style="margin-top: 60px; padding-top: 40px; border-top: 1px solid var(--border-subtle);">
            <h3 style="font-size: 1.5rem; margin-bottom: 24px;">Related Insights</h3>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 24px;">
              @foreach($relatedBlogs as $rel)
                <div class="blog-card" style="margin: 0;">
                  <div class="blog-thumbnail" style="height: 180px;">
                    @if($rel->category)
                      <span class="blog-category-tag">{{ $rel->category->name }}</span>
                    @endif
                    <img src="{{ $rel->image_url }}" alt="{{ $rel->title }}" class="blog-thumb-img">
                  </div>
                  <div class="blog-card-body" style="padding: 18px;">
                    <div class="blog-meta-row" style="margin-bottom: 10px;">
                      <div class="blog-meta-item">
                        <span>{{ $rel->read_time ?? '5 Min Read' }}</span>
                      </div>
                      <div class="blog-meta-item">
                        <span>{{ $rel->formatted_date }}</span>
                      </div>
                    </div>
                    <h4 style="font-size: 1.05rem; margin-bottom: 10px; line-height: 1.4;">
                      <a href="{{ $rel->url }}" style="color: inherit; text-decoration: none;">{{ $rel->title }}</a>
                    </h4>
                    <div class="blog-footer" style="margin-top: auto; padding-top: 10px;">
                      <a href="{{ $rel->url }}" style="font-size: 0.84rem; font-weight: 600; color: var(--primary); text-decoration: none; display: flex; align-items: center; gap: 4px;">
                        <span>Read Article</span>
                        <span>→</span>
                      </a>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        @endif

        <div style="text-align: center; margin-top: 48px;">
          <a href="{{ route('blogs') }}" class="btn btn-secondary">← Back to All Knowledge Hub Articles</a>
        </div>
      </div>
    </div>
  </section>
@endsection
