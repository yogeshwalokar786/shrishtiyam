<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', setting('meta_title', 'CircuFlow | Next-Gen Circular Economy & Waste Management Solutions'))</title>
  <meta name="description" content="@yield('meta_description', setting('meta_description', 'CircuFlow delivers high-grade PCR polymer resins, statutory EPR compliance, decentralized zero-waste municipal MRFs, and traceable circular supply chains.'))">
  @if(setting('site_favicon'))
    <link rel="icon" type="image/x-icon" href="{{ setting('site_favicon') }}">
  @else
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%23059669'><path d='M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5'/></svg>">
  @endif
  
  <!-- Google Fonts Preconnect & Stylesheet -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Manrope:wght@400;500;600;700;800&family=IBM+Plex+Sans:wght@400;500;600;700&family=IBM+Plex+Mono:wght@400;600&display=swap" rel="stylesheet">
  
  <!-- CSS Stylesheets -->
  <link rel="stylesheet" href="/css/style.css?v={{ @filemtime(public_path('css/style.css')) }}">
  <link rel="stylesheet" href="/css/components.css?v={{ @filemtime(public_path('css/components.css')) }}">
  <link rel="stylesheet" href="/css/animations.css?v={{ @filemtime(public_path('css/animations.css')) }}">

  @yield('head')
  @yield('styles')
  @stack('styles')
</head>
<body>

  <!-- Ambient Light Mesh -->
  <div class="ambient-mesh">
    <div class="ambient-glow-1"></div>
    <div class="ambient-glow-2"></div>
    <div class="ambient-grid"></div>
  </div>

  <!-- Common Header Navigation -->
  @include('partials.site.header')

  <!-- Main Content -->
  <main>
    @yield('content')
  </main>

  <!-- Common Modals -->
  @include('partials.site.modals')

  <!-- Common Footer -->
  @include('partials.site.footer')

  <!-- Core Scripts -->
  <script src="/js/main.js"></script>
  <script src="/js/calculator.js"></script>
  <script src="/js/products.js?v={{ @filemtime(public_path('js/products.js')) }}"></script>
  <script src="/js/services.js"></script>

  @yield('scripts')
  @stack('scripts')
</body>
</html>
