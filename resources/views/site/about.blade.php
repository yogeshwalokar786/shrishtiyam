@extends('layouts.site')

@section('title', 'About Us | India’s Plastic Paradox & Our Vision | ' . setting('site_name', 'SHRISTIYAM'))
@section('meta_description', 'Learn about Shristiyam\'s roots, vision, and commitment to turning waste into resources. Headquartered in Nagpur, building a circular future where waste becomes value.')

@section('head')
    <link rel="canonical" href="{{ url('/about') }}">
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "Organization",
      "name": "{{ setting('company_legal_name', 'SHRISTIYAM COMPLIANCE SOLUTIONS PRIVATE LIMITED') }}",
      "alternateName": "{{ setting('site_name', 'SHRISTIYAM') }}",
      "url": "{{ url('/') }}",
      "logo": "{{ asset('assets/logos/logo.png') }}",
      "description": "Headquartered in Nagpur, Shristiyam operates at the intersection of industry, resource recovery, and environmental responsibility.",
      "address": {
        "@@type": "PostalAddress",
        "addressLocality": "Nagpur",
        "addressCountry": "India"
      }
    }
    </script>
@endsection

@section('content')

  <!-- 1. Hero: India’s Plastic Paradox (Exact ReCircle Layout & Visual Hierarchy) -->
  <section class="about-hero-recircle">
    <img src="{{ asset('assets/images/about-hero-bottle.webp') }}" alt="Plastic Bottle Recovery" class="about-hero-bg-media">
    <div class="about-hero-grad-x"></div>
    <div class="about-hero-grad-y"></div>

    <div class="about-page-container" style="position: relative; z-index: 3;">
      <div class="about-hero-content-wrap">
        <p class="about-hero-stat-eyebrow">India&rsquo;s Plastic Paradox</p>
        
        <div class="about-hero-display-stat">
          465 Crore+
          <span class="accent-line">Plastic Bottles</span>
        </div>
        
        <p class="about-hero-stat-period">Imported Annually</p>

        <div class="about-hero-narrative">
          <p>
            India generates enormous volumes of plastic waste, yet a significant share of valuable material remains uncollected, unrecovered, or outside formal recycling systems.
          </p>
          <p>
            At Shristiyam, we believe waste should never be treated as a dead end. It should be recovered, transformed, and returned to the economy as value.
          </p>
          <p>
            That belief drives our work&mdash;to build scalable systems that turn waste into resources and move India closer to a truly circular future.
          </p>
        </div>
      </div>
    </div>

    <!-- Scroll Indicator Line -->
    <div class="about-hero-scroll-cue">
      <div class="scroll-line"></div>
    </div>
  </section>

  <!-- 2. Section: OUR VISION (ReCircle Centered Vision & 3 Pillar Cards) -->
  <section class="about-vision-section about-section-spacing">
    <div class="about-page-container">
      <span class="about-eyebrow center">OUR VISION</span>

      <div class="about-quote-container">
        <span class="about-quote-mark top">&ldquo;</span>
        <p class="about-vision-quote-text">
          To create a circular future where resources stay in use, waste is transformed into value, and responsible growth becomes the norm.
        </p>
        <span class="about-quote-mark bottom">&rdquo;</span>
      </div>

      <div class="about-commitments-grid">
        <!-- 01 -->
        <div class="about-commitment-card">
          <div class="about-commitment-num">01</div>
          <h3 class="about-commitment-title">Keep Waste in the Loop</h3>
          <p class="about-commitment-desc">
            Divert waste from landfills and oceans through responsible recovery and recycling.
          </p>
        </div>

        <!-- 02 -->
        <div class="about-commitment-card">
          <div class="about-commitment-num">02</div>
          <h3 class="about-commitment-title">Build Inclusive Waste Systems</h3>
          <p class="about-commitment-desc">
            Strengthen and formalise waste management ecosystems while creating dignified opportunities across the value chain.
          </p>
        </div>

        <!-- 03 -->
        <div class="about-commitment-card">
          <div class="about-commitment-num">03</div>
          <h3 class="about-commitment-title">Turn Waste into Value</h3>
          <p class="about-commitment-desc">
            Accelerate a circular economy where waste is recognised as a resource and every material has the potential for a second life.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- 3. Section: OUR ROOTS (ReCircle Exact 2-Column Split) -->
  <section class="about-roots-section about-section-spacing">
    <div class="about-page-container">
      <div class="about-roots-grid">
        <div>
          <span class="about-eyebrow">OUR ROOTS</span>
          <h2 class="about-roots-title">
            Bridging the Gap Between Economy and Ecology
          </h2>
        </div>

        <div>
          <p class="about-roots-body">
            Headquartered in Nagpur, Shristiyam operates at the intersection of industry, resource recovery, and environmental responsibility. Our roots are built on a clear understanding that economic growth and environmental stewardship must progress together.
          </p>
          <p class="about-roots-body">
            We are committed to developing responsible waste management and resource recovery systems that create measurable value for businesses while advancing a more circular and sustainable future.
          </p>
          <p class="about-roots-closing">
            We enable businesses to pursue growth with greater resource efficiency, accountability, and environmental responsibility.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- 4. Section: ON OUR MIND (Dark Forest Emerald ReCircle Style) -->
  <section class="about-mind-dark about-section-spacing">
    <div class="about-page-container">
      <div class="about-mind-container">
        <span class="about-eyebrow light center">ON OUR MIND</span>
        <h2 class="about-mind-title">
          Waste Is Not the End. It Is the Beginning of a New Cycle.
        </h2>
        <p class="about-mind-body" style="margin-bottom: 22px;">
          Waste is often viewed as an environmental challenge, but with the right systems, it can become a valuable resource. Materials that are discarded today can be recovered, processed, and reintroduced into the economy as useful resources.
        </p>
        <p class="about-mind-body" style="margin-bottom: 26px;">
          At Shristiyam, we focus on making that transition possible—transforming waste streams into opportunities for recovery, reuse, recycling, and responsible resource management.
        </p>
        <p class="about-mind-highlight">
          Because a circular economy begins when we stop seeing waste as the end of a material’s journey—and start seeing its next possibility.
        </p>
      </div>
    </div>
  </section>

  <!-- 5. Section: OUR GROWTH (ReCircle 2-Column Split with Highlight Card) -->
  <section class="about-growth-section about-section-spacing">
    <div class="about-page-container">
      <div class="about-growth-grid">
        <div>
          <span class="about-eyebrow">OUR GROWTH</span>
          <h2 class="about-growth-title">
            Building Scale. Creating Lasting Impact.
          </h2>
          <p class="about-growth-body">
            What began as a commitment to responsible waste management has evolved into a growing ecosystem focused on resource recovery, circularity, and sustainable value creation.
          </p>
          <p class="about-growth-body">
            Today, Shristiyam works across diverse waste streams and industries, helping businesses recover resources, strengthen compliance, and integrate circular practices into their operations.
          </p>
        </div>

        <div style="display: flex; justify-content: flex-end;">
          <div class="about-growth-stat-card">
            <div class="about-growth-stat-tag">OUR MEASURE OF IMPACT</div>
            <p class="about-growth-quote">
              &ldquo;Our growth is measured not only by the scale of waste we manage, but by the value we recover, the systems we build, and the impact we create.&rdquo;
            </p>
            <div class="about-growth-sub">
              Shristiyam Resource Philosophy
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
