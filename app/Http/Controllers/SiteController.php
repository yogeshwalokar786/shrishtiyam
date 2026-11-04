<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\ClientLogo;
use App\Models\Enquiry;
use App\Models\Policy;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    /**
     * Display a published policy page.
     */
    public function policy(string $slug)
    {
        $policy = Policy::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        $allPolicies = Policy::published()->get();

        return view('site.policy', compact('policy', 'allPolicies'));
    }
    /**
     * Display corporate home page.
     */
    public function home()
    {
        $testimonials = Testimonial::active()->get();
        $clientLogos = ClientLogo::active()->get();

        return view('site.home', compact('testimonials', 'clientLogos'));
    }

    /**
     * Display corporate about page.
     */
    public function about()
    {
        return view('site.about');
    }

    /**
     * Display corporate careers page.
     */
    public function careers()
    {
        return view('site.careers');
    }

    /**
     * Display corporate solutions and services catalog.
     */
    public function solutions()
    {
        return view('site.solutions');
    }

    /**
     * Slug map for static service URLs and aliases.
     */
    public static array $serviceSlugMap = [
        'plastic-epr-compliance' => 'epr',
        'brand-epr-compliance' => 'epr',
        'epr' => 'epr',
        'plastic-neutral-programme' => 'plastic-neutral',
        'plastic-neutral' => 'plastic-neutral',
        'esg-csr-projects' => 'esg-csr',
        'esg-csr' => 'esg-csr',
        'e-waste-battery-management' => 'ewaste-battery',
        'ewaste-battery' => 'ewaste-battery',
        'industrial-agriculture-waste-management' => 'industrial-agri-waste',
        'industrial-agri-waste' => 'industrial-agri-waste',
        // Legacy aliases
        'municipal-mrf-deployment' => 'plastic-neutral',
        'mrf' => 'plastic-neutral',
        'industrial-co-processing' => 'industrial-agri-waste',
        'rdf' => 'industrial-agri-waste',
        'sustainability-csr' => 'esg-csr',
        'sustainability-esg-impact' => 'esg-csr',
        'csr' => 'esg-csr',
        'logistics' => 'epr',
        'reverse-logistics' => 'epr',
        'advisory' => 'epr',
        'environmental-advisory' => 'epr',
    ];

    /**
     * Dedicated static page for Service 1: Plastic EPR Compliance.
     */
    public function serviceEpr()
    {
        return $this->renderServicePage('epr', 'plastic-epr-compliance');
    }

    /**
     * Dedicated static page for Service 2: Plastic Neutral Programme.
     */
    public function servicePlasticNeutral()
    {
        return $this->renderServicePage('plastic-neutral', 'plastic-neutral-programme');
    }

    /**
     * Dedicated static page for Service 3: ESG & CSR Projects.
     */
    public function serviceEsgCsr()
    {
        return $this->renderServicePage('esg-csr', 'esg-csr-projects');
    }

    /**
     * Dedicated static page for Service 4: E-Waste & Battery Waste Management.
     */
    public function serviceEwasteBattery()
    {
        return $this->renderServicePage('ewaste-battery', 'e-waste-battery-management');
    }

    /**
     * Dedicated static page for Service 5: Industrial Waste & Agriculture Waste Management.
     */
    public function serviceIndustrialAgriWaste()
    {
        return $this->renderServicePage('industrial-agri-waste', 'industrial-agriculture-waste-management');
    }

    /**
     * Legacy redirects for old service methods.
     */
    public function serviceMrf()
    {
        return redirect()->route('service.plastic-neutral', [], 301);
    }

    public function serviceRdf()
    {
        return redirect()->route('service.industrial-agri-waste', [], 301);
    }

    public function serviceCsr()
    {
        return redirect()->route('service.esg-csr', [], 301);
    }

    /**
     * Resolve service by static slug or key.
     */
    public function serviceBySlug(string $slug)
    {
        $normalizedSlug = strtolower(trim($slug));
        if (isset(self::$serviceSlugMap[$normalizedSlug])) {
            $key = self::$serviceSlugMap[$normalizedSlug];
            return $this->renderServicePage($key, $normalizedSlug);
        }

        abort(404);
    }

    /**
     * Render the service page using dedicated static blade template or fallback.
     */
    protected function renderServicePage(string $serviceKey, string $slug = '')
    {
        $allServices = $this->getServicesCatalog();

        if (!array_key_exists($serviceKey, $allServices)) {
            $serviceKey = 'epr';
        }

        $service = $allServices[$serviceKey];
        $recentBlogs = Blog::published()->with('category')->latest('published_at')->limit(3)->get();
        $clientLogos = ClientLogo::active()->get();

        // 1. Try dedicated static slug template e.g. site.services.brand-epr-compliance
        if (!empty($slug) && view()->exists('site.services.' . $slug)) {
            return view('site.services.' . $slug, compact('service', 'allServices', 'serviceKey', 'recentBlogs', 'slug', 'clientLogos'));
        }

        // 2. Try static service key template e.g. site.services.epr
        if (view()->exists('site.services.' . $serviceKey)) {
            return view('site.services.' . $serviceKey, compact('service', 'allServices', 'serviceKey', 'recentBlogs', 'slug', 'clientLogos'));
        }

        // 3. Fallback to unified master dynamic view
        return view('site.service-single', compact('service', 'allServices', 'serviceKey', 'recentBlogs', 'slug', 'clientLogos'));
    }

    /**
     * Legacy route /service-single with automatic 301 permanent redirect to static URLs.
     */
    public function serviceSingle(Request $request)
    {
        $serviceKey = strtolower(trim($request->query('service', 'epr')));
        
        $staticRoutes = [
            'epr' => 'service.epr',
            'plastic-neutral' => 'service.plastic-neutral',
            'esg-csr' => 'service.esg-csr',
            'ewaste-battery' => 'service.ewaste-battery',
            'industrial-agri-waste' => 'service.industrial-agri-waste',
            // Legacy aliases
            'mrf' => 'service.plastic-neutral',
            'rdf' => 'service.industrial-agri-waste',
            'csr' => 'service.esg-csr',
        ];

        if (isset($staticRoutes[$serviceKey])) {
            return redirect()->route($staticRoutes[$serviceKey], [], 301);
        }

        return $this->renderServicePage($serviceKey);
    }

    public function serviceSingleFallback()
    {
        return view('site.service-single', [
            'service' => $this->getServicesCatalog()['epr'],
            'allServices' => $this->getServicesCatalog(),
            'serviceKey' => 'epr',
            'recentBlogs' => Blog::published()->limit(3)->get(),
            'slug' => 'epr',
        ]);
    }

    /**
     * Display circular products and alternative fuels catalog.
     */
    public function products()
    {
        return view('site.products');
    }

    /**
     * Static Product Page 1: Bio Energy Fuel.
     */
    public function productBioEnergy()
    {
        return view('site.products.bio-energy-fuel');
    }

    /**
     * Static Product Page 2: Refuse Derived Fuel (RDF).
     */
    public function productRdf()
    {
        return view('site.products.refuse-derived-fuel');
    }

    /**
     * Static Product Page 3: rHDPE Blow Resin.
     */
    public function productRhdpe()
    {
        return view('site.products.rhdpe-blow-resin');
    }

    /**
     * Static Product Page 4: rPP Injection Copolymer.
     */
    public function productRpp()
    {
        return view('site.products.rpp-injection-copolymer');
    }

    /**
     * Legacy /product-single fallback redirecting to Product 1.
     */
    public function productSingle()
    {
        return redirect()->route('product.bio-energy', [], 301);
    }

    /**
     * Display news and thought leadership articles with dynamic category filtering.
     */
    public function blogs(Request $request)
    {
        $search = trim($request->get('search', ''));
        $categorySlug = trim($request->get('category', ''));

        $categories = BlogCategory::active()
            ->withCount(['blogs' => function ($q) {
                $q->where('is_published', true);
            }])
            ->get();

        $query = Blog::published()->with('category');

        $currentCategory = null;
        if (!empty($categorySlug) && $categorySlug !== 'all') {
            $currentCategory = BlogCategory::where('slug', $categorySlug)->first();
            if ($currentCategory) {
                $query->where('category_id', $currentCategory->id);
            }
        }

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('excerpt', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%")
                  ->orWhere('author_name', 'like', "%{$search}%");
            });
        }

        // Featured lead article (if not filtering or searching)
        $featuredBlog = null;
        if (empty($search) && empty($categorySlug)) {
            $featuredBlog = Blog::published()->featured()->first() ?? Blog::published()->first();
        }

        $blogsQuery = clone $query;
        if ($featuredBlog && empty($search) && empty($categorySlug)) {
            $blogsQuery->where('id', '!=', $featuredBlog->id);
        }

        $blogs = $blogsQuery->paginate(6)->withQueryString();
        $totalPublishedCount = Blog::published()->count();

        return view('site.blogs', compact('blogs', 'categories', 'featuredBlog', 'currentCategory', 'search', 'categorySlug', 'totalPublishedCount'));
    }

    /**
     * Display single blog article by slug.
     */
    public function blogSingle(string $slug)
    {
        $blog = Blog::where('slug', $slug)
            ->where('is_published', true)
            ->with('category')
            ->firstOrFail();

        // Increment views count
        $blog->increment('views_count');

        // Related blogs in same category
        $relatedBlogs = Blog::published()
            ->where('id', '!=', $blog->id)
            ->when($blog->category_id, function ($q) use ($blog) {
                $q->where('category_id', $blog->category_id);
            })
            ->limit(3)
            ->get();

        if ($relatedBlogs->count() < 3) {
            $needed = 3 - $relatedBlogs->count();
            $moreBlogs = Blog::published()
                ->where('id', '!=', $blog->id)
                ->whereNotIn('id', $relatedBlogs->pluck('id'))
                ->limit($needed)
                ->get();
            $relatedBlogs = $relatedBlogs->concat($moreBlogs);
        }

        $categories = BlogCategory::active()
            ->withCount(['blogs' => function ($q) {
                $q->where('is_published', true);
            }])
            ->get();

        return view('site.blog-single', compact('blog', 'relatedBlogs', 'categories'));
    }

    /**
     * Legacy / convenience fallback for /blog-single.
     */
    public function blogSingleFallback()
    {
        $firstBlog = Blog::published()->featured()->first() ?? Blog::published()->first();
        if ($firstBlog) {
            return $this->blogSingle($firstBlog->slug);
        }

        $dummyBlog = new Blog([
            'title' => 'Circularity Insights & Market Intelligence',
            'slug' => 'circularity-insights-market-intelligence',
            'excerpt' => 'Authoritative insights and industry intelligence on circular polymers and sustainable packaging.',
            'content' => '<p>Welcome to the CircuFlow corporate insights and thought leadership knowledge hub.</p>',
            'author_name' => 'CircuFlow Editorial',
            'author_role' => 'Sustainability Team',
            'read_time' => '5 Min Read',
            'is_published' => true,
            'published_at' => now(),
        ]);
        $relatedBlogs = collect();
        $categories = collect();

        return response()->view('site.blog-single', [
            'blog' => $dummyBlog,
            'relatedBlogs' => $relatedBlogs,
            'categories' => $categories,
        ]);
    }

    /**
     * Display contact and consultation page.
     */
    public function contact()
    {
        return view('site.contact');
    }

    /**
     * Handle submission of public contact inquiry form.
     */
    public function submitContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:150',
            'email' => 'required|email|max:150',
            'phone' => 'nullable|string|max:60',
            'subject' => 'nullable|string|max:150',
            'message' => 'nullable|string|max:5000',
        ]);

        $enquiry = Enquiry::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'subject' => $validated['subject'] ?? 'General Corporate Inquiry',
            'requirement' => $validated['subject'] ?? null,
            'message' => $validated['message'] ?? null,
            'source' => 'contact_page',
            'status' => 'new',
            'ip_address' => $request->ip(),
        ]);

        $successMsg = 'Thank you! Your inquiry has been sent to our circularity desk. We will respond within 4 business hours.';

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => $successMsg,
                'id' => $enquiry->id,
            ]);
        }

        return redirect()->route('contact')
            ->with('success', $successMsg);
    }

    /**
     * Handle submission of modal consultation request form.
     */
    public function submitConsultation(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:150',
            'email' => 'required|email|max:150',
            'company' => 'nullable|string|max:150',
            'requirement' => 'nullable|string|max:150',
            'projected_volume' => 'nullable|string|max:150',
        ]);

        $enquiry = Enquiry::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'company' => $validated['company'] ?? null,
            'requirement' => $validated['requirement'] ?? 'Fast-Track Consultation',
            'subject' => $validated['requirement'] ?? 'Consultation Request',
            'projected_volume' => $validated['projected_volume'] ?? null,
            'source' => 'consultation_modal',
            'status' => 'new',
            'ip_address' => $request->ip(),
        ]);

        $successMsg = 'Thank you! Your consultation request has been registered. Our expert team will contact you within 4 hours.';

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => $successMsg,
                'id' => $enquiry->id,
            ]);
        }

        return redirect()->back()
            ->with('success', $successMsg);
    }

    /**
     * Optional coming-soon page.
     */
    public function comingSoon()
    {
        return view('coming-soon');
    }

    /**
     * Detailed catalog of all environmental services offered by the enterprise.
     */
    private function getServicesCatalog(): array
    {
        $siteName = setting('site_name', 'SHRISTIYAM');
        $companyName = setting('company_legal_name', 'SHRISTIYAM COMPLIANCE SOLUTIONS PRIVATE LIMITED');

        return [
            // Service 1: Plastic | Extended Producer Responsibility (EPR)
            'epr' => [
                'key' => 'epr',
                'nav_title' => 'Plastic | EPR Compliance',
                'nav_icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>',
                'title_plain' => 'Plastic | Extended Producer Responsibility (EPR)',
                'meta_desc' => "End-to-End Plastic Waste EPR Compliance in India by {$companyName}. CPCB registration, footprint assessment, traceable recovery, recycling, and annual return filing.",
                'tag' => 'PLASTIC | EXTENDED PRODUCER RESPONSIBILITY (EPR)',
                'headline_html' => 'End-to-End <span class="gradient-text">EPR Compliance</span> & Plastic Waste Management',
                'target_audience' => ['Producers', 'Importers', 'Brand Owners (PIBOs)', 'Manufacturers'],
                'hero_desc' => "{$siteName} helps Producers, Importers, and Brand Owners (PIBOs) manage their complete Plastic Waste EPR requirements in India. From CPCB registration and plastic footprint assessment to EPR obligation calculation, waste collection, recycling, certificate management, traceability, and annual return filing, we provide a simple, transparent, and compliant process aligned with applicable CPCB and Plastic Waste Management Rules.",
                'hero_image' => '/assets/images/blog-cpcb-epr.jpg',
                'metrics' => [
                    ['num' => '100%', 'label' => 'CPCB Portal Compliance & Filing', 'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>'],
                    ['num' => 'Pan-India', 'label' => 'Verified Recovery & Recycling', 'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>'],
                    ['num' => 'Zero', 'label' => 'Non-Compliance Penalties', 'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>'],
                    ['num' => 'End-to-End', 'label' => 'Registration to Annual Return', 'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>']
                ],
                'overview_points' => [
                    ['title' => 'Complete Category I-IV Unified Mandate', 'desc' => 'Rigid packaging (Cat I), flexible films (Cat II), multilayer non-recyclables (Cat III), and compostable plastics (Cat IV) managed under statutory guidelines.'],
                    ['title' => 'Direct CPCB Online Compliance Portal Integration', 'desc' => 'Direct API cryptographic transaction hash creation and quota transfer on the national CPCB portal with zero broker friction.'],
                    ['title' => 'Digital Weighbridge & Real-Time Telemetry', 'desc' => 'Every single inbound and outbound consignment is verified with digital weighbridge slips, GPS fleet tracking, and certified mass-balance reconciliation.'],
                    ['title' => 'Contractual Zero-Penalty Legal Indemnity', 'desc' => 'Statutory legal indemnity protecting corporate clients from Environmental Compensation (EC) levies and regulatory show-cause notices.']
                ],
                'specs_table' => [
                    ['param' => 'Plastic Categories Covered', 'spec' => 'Cat I (Rigid), Cat II (Flexible), Cat III (Multilayered), Cat IV (Compostable)', 'standard' => 'Plastic Waste Management Rules (Amended 2022/24)', 'sla' => 'Full Lifecycle Coverage'],
                    ['param' => 'Credit Verification Protocol', 'spec' => 'CPCB Centralized Portal Cryptographic Transaction Hash', 'standard' => 'Central Pollution Control Board Portal', 'sla' => 'Within 48-72 Business Hours'],
                    ['param' => 'Mass Balance Audit Standard', 'spec' => 'Third-Party Physical Mass Balance Certification', 'standard' => 'ISO 14001:2015 Accredited Facility Audits', 'sla' => 'Batch-wise Reconciliation'],
                    ['param' => 'Workforce Formalization Safeguards', 'spec' => 'Direct DBT Jan Dhan Banking & Biometric Roster', 'standard' => 'Schedule VII / Fair Wage Standard', 'sla' => 'Monthly Reporting'],
                    ['param' => 'Statutory Annual Return Submission', 'spec' => 'Complete Form IV Documentation & Legal Defense', 'standard' => 'CPCB / State Pollution Control Boards', 'sla' => 'Guaranteed Filing by June 30']
                ],
                'stages' => [
                    ['num' => 'Stage 01', 'title' => 'Obligation Profiling & SKU Audit', 'desc' => 'Detailed categorization of raw packaging consumption across Category I, II, and III, establishing precise statutory fulfillment quotas.', 'pill' => 'Quota Baseline', 'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line></svg>'],
                    ['num' => 'Stage 02', 'title' => 'Traceable Reverse Aggregation', 'desc' => 'Consolidation of post-consumer plastics across decentralized municipal MRFs and aggregators with calibrated digital weighbridges and vehicle GPS.', 'pill' => 'Geo-Tagged', 'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"></polygon></svg>'],
                    ['num' => 'Stage 03', 'title' => 'Certified Recycling & Co-Processing', 'desc' => 'Mechanical reprocessing of rigid polymers into circular PCR granules and thermal co-processing of non-recyclables in cement kilns.', 'pill' => 'Zero Landfill', 'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline></svg>'],
                    ['num' => 'Stage 04', 'title' => 'CPCB Portal Credit Transfer', 'desc' => 'Issuance of verified EPR recycling credits uploaded directly to the client account on the CPCB national portal with immutable transaction hashes.', 'pill' => 'Audit Proof', 'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>']
                ],
                'deliverables' => [
                    ['name' => 'CPCB National Compliance Portal Credit Certificates', 'proto' => 'Cryptographic Portal Hash', 'desc' => 'Official transaction transfer certificates generated directly via the CPCB centralized compliance portal.'],
                    ['name' => 'Geo-Tagged Weighbridge Slips & Transit E-Way Bills', 'proto' => '100% Time-Stamped GPS Logs', 'desc' => 'Tamper-proof digitized weighbridge receipts for every dispatch and receipt location across all state jurisdictions.'],
                    ['name' => 'Third-Party Audited Mass Balance Reports', 'proto' => 'ISO 14001 Accredited Audit', 'desc' => 'Certified recycling reconciliation verifying that physical inbound waste matches outbound PCR resin or RDF.'],
                    ['name' => 'Statutory Annual Return Dossier & Form IV Filings', 'proto' => 'Legal Defense Dossier', 'desc' => 'Complete end-of-year compliance filing dossier ready for regulatory submission to SPCB/CPCB with legal indemnity backing.'],
                    ['name' => 'Scope 3 Carbon Avoidance & Recycled Content Statement', 'proto' => 'GHG Protocol Verified', 'desc' => 'Corporate sustainability data supporting ESG disclosures, annual sustainability reports, and SEBI BRSR Core.']
                ],
                'faqs' => [
                    ['q' => 'What are the legal liabilities and financial penalties for non-fulfillment of EPR mandates in India?', 'a' => "Under the Plastic Waste Management (PWM) Rules and Environment Protection Act (EPA), Brand Owners, Importers, and Brand Manufacturers (PIBOs) that fail to meet their annual targets face statutory Environmental Compensation (EC) levies imposed by the Central Pollution Control Board (CPCB) and State Boards. Financial penalties range from ₹5,000 to ₹10,000+ per Metric Ton of shortfall, along with suspension of manufacturing licenses. {$siteName} provides complete legal indemnity and guaranteed zero-penalty fulfillment."],
                    ['q' => 'How does SHRISTIYAM prevent double-counting of EPR recycling credits?', 'a' => "Every consignment aggregated across our MRF and logistics network is assigned an immutable digital weighbridge record, vehicle GPS transit log, and recycler batch manifest. Once reprocessed, the physical mass balance is locked and uploaded directly to the centralized CPCB online portal. The portal generates a cryptographic transaction hash that permanently cancels the credit upon assignment to the client's account, preventing duplication."],
                    ['q' => 'What is the difference between recycling credits (Cat I & II) and thermal co-processing credits (Cat III)?', 'a' => "Category I (Rigid Plastics) and Category II (Flexible Films) must undergo mechanical or chemical recycling into reusable PCR pellets, with strict mandated percentages of recycled content. Category III (Multilayered Packaging) is heterogeneous and difficult to recycle mechanically; regulations mandate end-of-life disposal through thermal co-processing in cement kilns (as RDF) or waste-to-energy conversion with certified destruction certificates."],
                    ['q' => 'How quickly are EPR credits transferred after contract finalization?', 'a' => "For existing aggregated and processed inventories in our nationwide network, credit transfer requests are processed and uploaded to the centralized CPCB portal within 48 to 72 business hours upon statutory verification."]
                ],
                'form_title' => 'Request Instant EPR Quota & Pricing Proposal',
                'form_desc' => 'Specify your annual plastic packaging volume to receive a statutory quota breakdown, pricing schedule, and legal indemnity blueprint.',
                'form_volume_label' => 'Annual Plastic Packaging Volume (MT/Year)',
                'form_volume_placeholder' => 'e.g. 5,000 MT/Year',
                'default_service_option' => 'Plastic | Extended Producer Responsibility (EPR)'
            ],

            // Service 2: Plastic | Plastic Neutral Programme
            'plastic-neutral' => [
                'key' => 'plastic-neutral',
                'nav_title' => 'Plastic Neutral Programme',
                'nav_icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>',
                'title_plain' => 'Plastic | Plastic Neutral Programme',
                'meta_desc' => "Turn Your Plastic Footprint into Measurable Impact. Plastic Neutral Programme by {$companyName} offering 100% verified plastic footprint offset, ocean-bound recovery, and consumer trustmarks.",
                'tag' => 'PLASTIC | PLASTIC NEUTRAL PROGRAMME',
                'headline_html' => 'Turn Your Plastic Footprint into <span class="gradient-text">Measurable Impact</span>',
                'target_audience' => ['Consumer Goods & FMCG Brands', 'D2C Sustainable Enterprises', 'Retail & Packaging Converters', 'Hospitality & QSR Chains'],
                'hero_desc' => "Lead the circular economy beyond baseline statutory mandates. {$siteName}'s Plastic Neutral Programme scientifically measures your total packaging footprint, recovers an equivalent volume of high-leakage and ocean-bound post-consumer plastic waste across India, and provides verified plastic credit certificates, tamper-proof blockchain traceability, and certified consumer trustmarks for your products.",
                'hero_image' => '/assets/images/service-mrf-plant.jpg',
                'metrics' => [
                    ['num' => '100%', 'label' => 'Plastic Footprint Offset Ratio', 'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>'],
                    ['num' => 'Pan-India', 'label' => 'Coastline & Vulnerable Zone Recovery', 'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"></polygon></svg>'],
                    ['num' => '100%', 'label' => 'Digitally Audited Mass Balance', 'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>'],
                    ['num' => 'Verified', 'label' => 'Certified Consumer Trustmark', 'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>']
                ],
                'overview_points' => [
                    ['title' => 'Scientific SKU Plastic Footprint Quantification', 'desc' => 'Comprehensive packaging audit across primary, secondary, and tertiary packaging formats to quantify baseline plastic intensity.'],
                    ['title' => 'Targeted High-Leakage & Ocean-Bound Recovery', 'desc' => 'Plastic waste collected from ecological hotspots, coastal towns, and underserved municipal regions with verified mass balance.'],
                    ['title' => 'Ethical Frontline Sourcing & Fair Living Wages', 'desc' => 'Direct integration with formalized waste-picker cooperatives providing fair wages, occupational safety gear, and social inclusion.'],
                    ['title' => 'Consumer-Facing Trustmark & Digital QR Verification', 'desc' => 'Licensing of the "Certified Plastic Neutral" logo with consumer QR codes linking directly to immutable audit certificates.']
                ],
                'specs_table' => [
                    ['param' => 'Plastic Types Offset', 'spec' => 'Rigid Plastics (PET, HDPE, PP), Flexible Films, Multilayered Packaging (MLP)', 'standard' => 'ISO 14044 LCA / Verra Plastic Standard Aligned', 'sla' => '100% Volumetric Equivalence'],
                    ['param' => 'Collection Geo-Traceability', 'spec' => 'Geo-Fenced Fleet Telematics & Certified Weighbridge Slips', 'standard' => 'Digital Mass-Balance Audit Trail', 'sla' => 'Batch-by-Batch Manifests'],
                    ['param' => 'End-of-Life Processing', 'spec' => 'Mechanical Recycling into PCR Resins & Thermal Co-Processing', 'standard' => 'Zero-Landfill Processing Standard', 'sla' => 'Full Recycling Audit'],
                    ['param' => 'Neutrality Trustmark Rights', 'spec' => 'On-Pack "Certified Plastic Neutral" Logo & Marketing Rights', 'standard' => 'Third-Party Verified Neutrality Protocol', 'sla' => 'Annual Recertification'],
                    ['param' => 'Statutory Alignment', 'spec' => 'Surplus to Statutory PWM EPR Obligations', 'standard' => 'CPCB PWM Rules & Voluntary Standards', 'sla' => 'Zero Double-Counting']
                ],
                'stages' => [
                    ['num' => 'Stage 01', 'title' => 'Footprint Assessment & Goal Setting', 'desc' => 'Auditing enterprise packaging material bills of materials (BOM) to calculate precise annual plastic footprint.', 'pill' => 'Footprint Audit', 'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline></svg>'],
                    ['num' => 'Stage 02', 'title' => 'Targeted Reverse Recovery Grid', 'desc' => 'Mobilizing our collection infrastructure to retrieve equivalent post-consumer plastics from vulnerable leak zones.', 'pill' => 'Targeted Recovery', 'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"></polygon></svg>'],
                    ['num' => 'Stage 03', 'title' => 'Mechanized Recycling & Upcycling', 'desc' => 'High-grade reprocessing of collected polymers into high-purity PCR resins and cement kiln alternative fuel.', 'pill' => 'Closed-Loop', 'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path></svg>'],
                    ['num' => 'Stage 04', 'title' => 'Issuance of Neutrality Certification', 'desc' => 'Granting of verified Plastic Neutrality Certificate and digital QR badges for product packaging and marketing.', 'pill' => 'Certified Trustmark', 'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>']
                ],
                'deliverables' => [
                    ['name' => 'Official Certificate of Plastic Neutrality', 'proto' => 'Annual Audited Certification', 'desc' => 'Accredited certificate verifying that 100% of your company packaging footprint has been recovered and recycled.'],
                    ['name' => 'Licensed On-Pack "Certified Plastic Neutral" Badge', 'proto' => 'Vector Trustmark Package', 'desc' => 'Authorized artwork and guidelines for printing our certified neutral trustmark on retail packaging and bottles.'],
                    ['name' => 'Consumer-Facing QR Verification Landing Page', 'proto' => 'Live Cloud Registry', 'desc' => 'Interactive web page where your customers scan packaging to see verified collection locations and recycling milestones.'],
                    ['name' => 'Frontline Worker Fair Wage & Social Impact Audit', 'proto' => 'Social SROI Verified', 'desc' => 'Documented impact proof showing fair living wages and PPE provided to waste collectors who gathered the plastic.'],
                    ['name' => 'Scope 3 Circularity & ESG Annual Reporting Pack', 'proto' => 'GRI & BRSR Aligned', 'desc' => 'Complete data package quantifying ocean plastic avoided, fossil carbon emissions mitigated, and circularity gains.']
                ],
                'faqs' => [
                    ['q' => 'What does achieving "Plastic Neutral" mean for a brand?', 'a' => "Plastic Neutrality means your company recovers and responsibly recycles an equal or greater amount of post-consumer plastic waste than it introduces to the market through packaging, achieving net-zero plastic impact on the environment."],
                    ['q' => 'How does Plastic Neutrality differ from statutory EPR compliance?', 'a' => "Statutory EPR is a legally mandated quota set by CPCB based on specific rules. Plastic Neutrality is a comprehensive, voluntary 100% commitment covering all packaging types that enables brands to communicate authentic environmental leadership directly to consumers."],
                    ['q' => 'Can we print the Certified Plastic Neutral badge on our product packaging?', 'a' => "Yes! Once your baseline assessment is completed and recovery volume agreements are locked, {$siteName} licenses our official Certified Plastic Neutral trustmark along with custom QR codes for direct consumer verification."],
                    ['q' => 'How does Shristiyam ensure zero double-counting of plastic credits?', 'a' => "All plastic batches processed through our network are serialized with digitized weighbridge slips, GPS transit timestamps, and recycler gate passes. Plastic neutrality credits are retired in an immutable registry to prevent duplication."]
                ],
                'form_title' => 'Become a Certified Plastic Neutral Brand',
                'form_desc' => 'Enter your annual packaging volume to receive a custom footprint calculation, recovery roadmap, and trustmark licensing details.',
                'form_volume_label' => 'Estimated Packaging Footprint (MT/Year)',
                'form_volume_placeholder' => 'e.g. 1,200 MT/Year',
                'default_service_option' => 'Plastic | Plastic Neutral Programme'
            ],

            // Service 3: ESG & CSR Projects
            'esg-csr' => [
                'key' => 'esg-csr',
                'nav_title' => 'ESG & CSR Projects',
                'nav_icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle></svg>',
                'title_plain' => 'ESG & CSR Projects',
                'meta_desc' => "Creating Measurable Impact Where It Matters. Deploy statutory CSR capital into Schedule VII compliant frontline waste worker welfare, healthcare, and education by {$companyName}.",
                'tag' => 'ESG & CSR PROJECTS',
                'headline_html' => 'Creating <span class="gradient-text">Measurable Impact</span> Where It Matters',
                'target_audience' => ['Corporate CSR Committees', 'ESG Leadership Councils', 'Corporate Foundations', 'Institutional Impact Donors'],
                'hero_desc' => "Deploy corporate CSR capital into audited Schedule VII programs that bridge environmental circularity with human dignity. {$siteName} formalizes frontline waste collectors with biometric identification, direct Jan Dhan bank transfers, preventative medical camps, safety gear, and children educational scholarships—generating verifiable Social Return on Investment (SROI) and bulletproof board audit defense.",
                'hero_image' => '/assets/images/service-csr-welfare.jpg',
                'metrics' => [
                    ['num' => 'Schedule VII', 'label' => 'Companies Act 2013 Compliant', 'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>'],
                    ['num' => '5,000+', 'label' => 'Frontline Workers Formalized', 'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle></svg>'],
                    ['num' => '100% DBT', 'label' => 'Direct Benefit Cashless Banking', 'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect></svg>'],
                    ['num' => 'Audited SROI', 'label' => 'CA Fund Utilization Certified', 'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>']
                ],
                'overview_points' => [
                    ['title' => 'Schedule VII Companies Act Legal Compliance', 'desc' => 'Structured under poverty alleviation, healthcare, occupational safety, and vocational skill building guidelines.'],
                    ['title' => 'Zero-Middleman Direct Benefit Transfers (DBT)', 'desc' => 'Eliminating middlemen through direct Aadhaar-linked Jan Dhan bank accounts, ensuring waste collectors receive 100% of fair recycling payments.'],
                    ['title' => 'Occupational Health, Safety & Industrial PPE Kits', 'desc' => 'Quarterly health screenings, puncture-proof safety boots, heavy-duty puncture-resistant gloves, and respiratory masks for frontline teams.'],
                    ['title' => 'Audited Social Return on Investment (SROI)', 'desc' => 'Independent third-party financial audits, baseline surveys, and photographic proof providing unquestionable CSR audit defense.']
                ],
                'specs_table' => [
                    ['param' => 'Statutory CSR Eligibility', 'spec' => 'Schedule VII of the Companies Act, 2013 (Item i, ii, x)', 'standard' => 'Ministry of Corporate Affairs (MCA) Guidelines', 'sla' => '100% CSR Tax Eligible'],
                    ['param' => 'Beneficiary Accreditation', 'spec' => 'Biometric Smart Identity Cards & Aadhaar Linkage', 'standard' => 'National Occupational Standard / MoHUA', 'sla' => 'Formal Integration'],
                    ['param' => 'Financial Inclusion Standard', 'spec' => 'Zero-Balance Jan Dhan Bank Accounts with DBT Payment', 'standard' => 'Direct Benefit Transfer (DBT) Framework', 'sla' => 'Zero Middleman Leakage'],
                    ['param' => 'Healthcare & Safety Intervention', 'spec' => 'Quarterly Medical Checkups & Industrial PPE Kits', 'standard' => 'Occupational Safety & Health Guidelines', 'sla' => '12 Health Camps / Year'],
                    ['param' => 'Impact Verification Audit', 'spec' => 'Third-Party Statutory Auditor SROI Certification', 'standard' => 'Social Return on Investment (SROI) Methodology', 'sla' => 'Quarterly & Annual Audit']
                ],
                'stages' => [
                    ['num' => 'Stage 01', 'title' => 'Community Census & ID Issuance', 'desc' => 'Door-to-door identification and formal registration of informal waste collection families with biometric digital ID cards.', 'pill' => 'Identity Dignity', 'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path></svg>'],
                    ['num' => 'Stage 02', 'title' => 'Zero-Balance Banking Integration', 'desc' => 'Setting up personal bank accounts with zero middlemen, guaranteeing direct benefit transfers (DBT) for collected plastics.', 'pill' => 'Financial Inclusion', 'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect></svg>'],
                    ['num' => 'Stage 03', 'title' => 'Health Camps & Occupational PPE', 'desc' => 'Distribution of heavy-duty puncture-proof gloves, boots, masks, and quarterly preventative medical checkups.', 'pill' => 'Health & Safety', 'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 12h-4l-3 9L9 3l-3 9H2"></path></svg>'],
                    ['num' => 'Stage 04', 'title' => 'Audited Social Impact Reporting', 'desc' => 'Comprehensive Social Return on Investment (SROI) reports with photographic evidence and third-party financial audits.', 'pill' => 'Audited SROI', 'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path></svg>']
                ],
                'deliverables' => [
                    ['name' => 'Formal Worker Biometric Roster & ID Records', 'proto' => 'Aadhaar / EPFO Linked', 'desc' => 'Digitized directory of verified waste collectors with official government identification and biometric validation.'],
                    ['name' => 'Direct DBT Bank Statements & Wage Proofs', 'proto' => 'Zero-Cash Verification', 'desc' => 'Bank payment ledgers proving direct electronic transfer of compensation into beneficiary accounts.'],
                    ['name' => 'Medical Checkup Camp Records & Health Cards', 'proto' => 'Registered Physician Reports', 'desc' => 'Clinical health records, vaccination documentation, and medical consultation notes from licensed physicians.'],
                    ['name' => 'Children Scholarship & Educational Kit Receipts', 'proto' => 'Direct Beneficiary Signed', 'desc' => 'School enrollment records, textbook distribution logs, and scholarship fee payment receipts.'],
                    ['name' => 'Audited Schedule VII Corporate CSR Impact Statement', 'proto' => 'Statutory Auditor Certified', 'desc' => 'Formal impact and utilization certificate signed by a practicing Chartered Accountant for board filing.']
                ],
                'faqs' => [
                    ['q' => 'Are workforce formalization and welfare initiatives eligible under corporate CSR 2% budgets?', 'a' => "Yes. Our initiatives strictly comply with Schedule VII of the Companies Act, 2013, covering poverty alleviation, sanitation promotion, healthcare access, and vocational skill training. Enterprise sponsors receive statutory auditor certificates, baseline census documentation, and photographic Social Return on Investment (SROI) reports."],
                    ['q' => 'Can corporate sponsors brand the health camps and worker PPE distributions?', 'a' => "Yes. All welfare initiatives—including puncture-resistant uniforms, medical checkup camps, and educational scholarship drives—can carry co-branded corporate identity representing your brand's ESG commitment."],
                    ['q' => 'How is financial leakage prevented during beneficiary payments?', 'a' => "We enforce a strict 100% cashless Direct Benefit Transfer (DBT) model. Every worker has a biometric-linked Jan Dhan bank account, and payments are transferred electronically with automated bank ledger reconciliation."],
                    ['q' => 'What documentation is provided for the company’s annual CSR committee report?', 'a' => "Corporate partners receive a comprehensive CSR Dossier including a Chartered Accountant fund utilization certificate, beneficiary baseline and endline census, before-and-after income improvement metrics, and photographic impact archives."]
                ],
                'form_title' => 'Partner with Us on CSR & ESG Projects',
                'form_desc' => 'Design a custom corporate CSR program supporting waste collector education, healthcare, and formalization under Schedule VII.',
                'form_volume_label' => 'Proposed Annual CSR Grant Budget (₹)',
                'form_volume_placeholder' => 'e.g. ₹25 Lakhs / Custom',
                'default_service_option' => 'ESG & CSR Projects'
            ],

            // Service 4: E-Waste & Battery Waste Management
            'ewaste-battery' => [
                'key' => 'ewaste-battery',
                'nav_title' => 'E-Waste & Battery Management',
                'nav_icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>',
                'title_plain' => 'E-Waste & Battery Waste Management',
                'meta_desc' => "Responsible Recovery. Compliant Recycling. Authorized E-Waste and Battery Waste Management & EPR compliance across India by {$companyName}.",
                'tag' => 'E-WASTE & BATTERY WASTE MANAGEMENT',
                'headline_html' => 'Responsible Recovery. <span class="gradient-text">Compliant Recycling.</span>',
                'target_audience' => ['Electronics Producers & Importers', 'IT Enterprises & Data Centers', 'EV & Battery Manufacturers', 'Telecom Infrastructure'],
                'hero_desc' => "Authorized end-to-end management for electrical, electronic equipment, and battery waste under the E-Waste and Battery Waste Management (BWM) Rules. {$siteName} delivers certified IT Asset Disposition (ITAD), DoD-grade secure data wiping, nationwide reverse logistics, hydrometallurgical closed-loop recycling, and official CPCB portal credit fulfillment.",
                'hero_image' => '/assets/images/polymer-testing-lab.jpg',
                'metrics' => [
                    ['num' => '100%', 'label' => 'CPCB Portal Credit Transfer', 'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>'],
                    ['num' => 'DoD 5220', 'label' => 'Certified Military-Grade Data Wiping', 'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>'],
                    ['num' => 'Pan-India', 'label' => 'Compliant Hazmat Logistics Fleet', 'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>'],
                    ['num' => '98%+', 'label' => 'Critical Metal & Mineral Extraction', 'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>']
                ],
                'overview_points' => [
                    ['title' => 'Statutory E-Waste & Battery EPR Quota Fulfillment', 'desc' => 'End-to-end registration, collection target calculation, and credit transfers on the CPCB centralized compliance portal.'],
                    ['title' => 'Certified IT Asset Disposition (ITAD) & Data Destruction', 'desc' => 'DoD 5220.22-M and NIST SP 800-88 compliant digital wiping and degaussing with serialized certificates of erasure.'],
                    ['title' => 'Closed-Loop Hydrometallurgical Refining', 'desc' => 'Urban mining retrieving lithium, cobalt, nickel, copper, and precious metals for secondary battery manufacturing.'],
                    ['title' => 'SPCB Authorized Hazmat Transportation Fleet', 'desc' => 'Specialized GPS-monitored hazardous transit fleet operating under Form 10 manifests and strict inter-state environmental permits.']
                ],
                'specs_table' => [
                    ['param' => 'Regulatory Rules Covered', 'spec' => 'E-Waste (Management) Rules 2022 & Battery Waste Management Rules 2022', 'standard' => 'MoEFCC & CPCB Guidelines', 'sla' => '100% Legal Indemnity'],
                    ['param' => 'Data Sanitization Protocol', 'spec' => 'NIST SP 800-88 Rev. 1 & DoD 5220.22-M Certified Wiping', 'standard' => 'Enterprise IT Security Standards', 'sla' => 'Serialized Destruction Proof'],
                    ['param' => 'Battery Chemistries Handled', 'spec' => 'Lithium-ion (NMC, LFP, LCO), Lead-Acid, Nickel-Cadmium', 'standard' => 'Hydrometallurgical Extraction', 'sla' => 'Zero-Landfill Processing'],
                    ['param' => 'CPCB Credit Transfer SLA', 'spec' => 'Cryptographic Credit Hash Issued on Central Portal', 'standard' => 'CPCB Centralized Portal', 'sla' => 'Within 72 Business Hours'],
                    ['param' => 'Hazardous Transit Authorization', 'spec' => 'Form 10 Manifests with Live AIS-140 GPS Route Tracking', 'standard' => 'Central Motor Vehicles Hazmat Rules', 'sla' => 'Pan-India Coverage']
                ],
                'stages' => [
                    ['num' => 'Stage 01', 'title' => 'EPR Profiling & ITAD Inventory Audit', 'desc' => 'Quantifying electronic sales volumes or retiring IT assets with serialized barcode logging.', 'pill' => 'Audit & Inventory', 'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline></svg>'],
                    ['num' => 'Stage 02', 'title' => 'Military-Grade Data Sanitization', 'desc' => 'Certified software erasure or physical degaussing/shredding of data storage devices on-site or off-site.', 'pill' => 'Zero Data Risk', 'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect></svg>'],
                    ['num' => 'Stage 03', 'title' => 'Dismantling & Eco-Centric Refining', 'desc' => 'Separation of hazardous fractions (CRTs, batteries) followed by chemical metal recovery in authorized facilities.', 'pill' => '98% Recovery', 'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path></svg>'],
                    ['num' => 'Stage 04', 'title' => 'CPCB Credit Transfer & Dossier Handover', 'desc' => 'Credit retirement on the CPCB portal and issuance of statutory Form 10 documentation.', 'pill' => 'Portal Transfer', 'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>']
                ],
                'deliverables' => [
                    ['name' => 'CPCB Central Compliance Portal Credit Certificates', 'proto' => 'Official Portal Transfer Hash', 'desc' => 'Statutory certificates satisfying your annual E-Waste or Battery Waste EPR obligations.'],
                    ['name' => 'Serialized Certificate of Data Destruction (ITAD)', 'proto' => 'NIST SP 800-88 Compliant', 'desc' => 'Hardware serial-numbered audit certificate indemnifying your enterprise against data privacy leaks.'],
                    ['name' => 'State SPCB Hazardous Waste Form 10 Manifests', 'proto' => 'Signed & Stamped Manifests', 'desc' => 'Certified chain-of-custody documentation for legal transportation across interstate lines.'],
                    ['name' => 'Critical Raw Material Recovery Statement', 'proto' => 'Mass-Balance Certified', 'desc' => 'Quantified breakdown of secondary lithium, cobalt, and metals returned to the manufacturing ecosystem.'],
                    ['name' => 'Enterprise Scope 3 Circular Economy Audit Dossier', 'proto' => 'ESG / BRSR Verified', 'desc' => 'Detailed sustainability metrics highlighting electronic landfill diversion and carbon mitigation.']
                ],
                'faqs' => [
                    ['q' => 'What are the core obligations under the new Battery Waste Management Rules 2022?', 'a' => "Producers, importers, and EV manufacturers must register on the CPCB portal, achieve mandated recycling and recovery targets, and ensure that hazardous battery chemistries are channeled strictly to authorized hydrometallurgical recyclers."],
                    ['q' => 'How does Shristiyam guarantee 100% data security during IT asset disposal?', 'a' => "We deploy certified NIST SP 800-88 and DoD 5220.22-M multi-pass overwriting and electromagnetic degaussing. For hard drives designated for destruction, we provide dual-shaft physical shearing and issue tamper-proof serialized destruction certificates."],
                    ['q' => 'What types of e-waste and batteries are handled in your network?', 'a' => "We manage IT and telecommunications equipment, consumer electronics, solar PV panels, lithium-ion battery packs (EV and storage), lead-acid industrial batteries, and consumer cells."],
                    ['q' => 'Can corporate enterprises audit the recycling facility in person?', 'a' => "Yes. We welcome corporate compliance officers, EHS directors, and third-party sustainability auditors to inspect our partner recycling and data sanitation facilities."]
                ],
                'form_title' => 'Request E-Waste & Battery Recycling Proposal',
                'form_desc' => 'Inquire about annual EPR fulfillment, secure IT asset disposition (ITAD), or battery recycling contracts.',
                'form_volume_label' => 'Expected Equipment / Battery Weight (MT or Units)',
                'form_volume_placeholder' => 'e.g. 20 MT / 500 Enterprise Laptops',
                'default_service_option' => 'E-Waste & Battery Waste Management'
            ],

            // Service 5: Industrial Waste & Agriculture Waste Management
            'industrial-agri-waste' => [
                'key' => 'industrial-agri-waste',
                'nav_title' => 'Industrial & Agri Waste',
                'nav_icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"></path></svg>',
                'title_plain' => 'Industrial Waste & Agriculture Waste Management',
                'meta_desc' => "Circularity Through High-Quality Industrial Fuels by {$companyName}. Transforming non-recyclable industrial packaging, sludge, and agricultural crop stubble into engineered RDF and alternative fuels.",
                'tag' => 'INDUSTRIAL WASTE & AGRICULTURE WASTE MANAGEMENT',
                'headline_html' => 'Circularity Through <span class="gradient-text">High-Quality Industrial Fuels</span>',
                'target_audience' => ['Industrial Manufacturing Facilities', 'Cement Manufacturing Kilns', 'Captive Power Boilers', 'Agricultural Cooperatives'],
                'hero_desc' => "Transform industrial waste and agricultural crop residues into sustainable energy. {$siteName} bridges manufacturing plants and farming belts with heavy industry—converting non-recyclable industrial plastics, combustible packaging, and crop stubble (parali) into engineered Refuse Derived Fuel (RDF) and high-calorific alternative fuels for 15% to 25% thermal coal substitution in cement kilns and captive boilers.",
                'hero_image' => '/assets/images/service-rdf-fuel.jpg',
                'metrics' => [
                    ['num' => '>3,800 kcal', 'label' => 'Guaranteed Fuel GCV / kg', 'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>'],
                    ['num' => '< 0.5%', 'label' => 'Kiln-Safe Chlorine (Cl) Content', 'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>'],
                    ['num' => '100%', 'label' => 'Zero Ash (Clinker Absorbed)', 'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>'],
                    ['num' => 'Parali Zero', 'label' => 'Stubble Burning Elimination', 'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>']
                ],
                'overview_points' => [
                    ['title' => 'Stubble Burning Prevention & Farm Economy', 'desc' => 'Direct farm-level aggregation of paddy straw and mustard stalk, preventing seasonal smog and providing farmers secondary income.'],
                    ['title' => 'Industrial Zero Waste to Landfill (ZWTL) Solutions', 'desc' => 'Segregation and high-throughput shredding of non-recyclable industrial packaging, contaminated films, and production scrap.'],
                    ['title' => 'Kiln Refractory Protection (Cl < 0.5%)', 'desc' => 'Dual-stage chemical and optical de-chlorination checks ensure chlorine levels remain strictly under 0.5%, safeguarding kiln refractory brick linings.'],
                    ['title' => 'Complete Clinker Mineral Absorption (Zero Bottom Ash)', 'desc' => 'Combustion residue is 100% incorporated into cement clinker minerals, resulting in zero secondary fly ash or bottom ash disposal issues.']
                ],
                'specs_table' => [
                    ['param' => 'Primary Feedstocks', 'spec' => 'Agricultural Biomass (Paddy, Mustard, Bagasse), Industrial Non-Recyclable Packaging', 'standard' => 'Solid Recovered Fuels (SRF) / ASTM D5865', 'sla' => 'Guaranteed Multi-Stream Supply'],
                    ['param' => 'Gross Calorific Value (GCV)', 'spec' => '3,800 to 4,200 kcal / kg (Guaranteed)', 'standard' => 'ASTM D5865 Bomb Calorimeter Testing', 'sla' => 'Batch Laboratory Certificate'],
                    ['param' => 'Chlorine Content (Cl)', 'spec' => '< 0.5% by weight (Refractory Brick Safe)', 'standard' => 'EN 15408 Standard for Alternative Fuels', 'sla' => 'Kiln Refractory Indemnity'],
                    ['param' => 'Total Moisture Content', 'spec' => '< 12% Maximum Bound Moisture', 'standard' => 'ASTM D3173 Gravimetric Oven Method', 'sla' => 'Continuous Moisture Monitoring'],
                    ['param' => 'Statutory CPCB Category III Credit', 'spec' => 'End-of-Life Co-Processing Destruction Certificate', 'standard' => 'CPCB PWM Rules Schedule II (Cat III)', 'sla' => 'Direct Portal Credit Generation']
                ],
                'stages' => [
                    ['num' => 'Stage 01', 'title' => 'Agro-Residue & Industrial Aggregation', 'desc' => 'Sourcing post-harvest stubble from farming clusters and combustible dry scrap from manufacturing parks.', 'pill' => 'Multi-Source', 'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle></svg>'],
                    ['num' => 'Stage 02', 'title' => 'Multi-Stage Shredding & De-Stoning', 'desc' => 'High-torque primary and secondary shredding down to <30mm fluff with ballistic air separators removing inerts.', 'pill' => 'Precision Fluff', 'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path></svg>'],
                    ['num' => 'Stage 03', 'title' => 'Rotary Drying & Laboratory Testing', 'desc' => 'Moisture extraction below 12% and bomb calorimeter testing verifying energy density and chloride safety.', 'pill' => 'Refractory Safe', 'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>'],
                    ['num' => 'Stage 04', 'title' => 'Direct In-Kiln Co-Processing', 'desc' => 'Enclosed bulk delivery to kiln pre-calciners with online CPCB destruction certificates issued for Category III obligations.', 'pill' => 'Zero Ash', 'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="3" width="15" height="13"></rect></svg>']
                ],
                'deliverables' => [
                    ['name' => 'Batch-Wise GCV, Moisture & Chlorine Laboratory Test Reports', 'proto' => 'ASTM D5865 Certified', 'desc' => 'Individual lab certificates for every 100 MT batch verifying calorific density, ash percentage, and moisture.'],
                    ['name' => 'Kiln Refractory Protection Warranty (Low Chlorine)', 'proto' => 'Cl < 0.5% Guaranteed', 'desc' => 'Contractual guarantee protecting industrial kilns from acidic corrosion and refractory degradation.'],
                    ['name' => 'CPCB Category III Co-Processing Destruction Certificates', 'proto' => 'Statutory Portal Hash Verification', 'desc' => 'Official co-processing disposal credits uploaded directly to the CPCB centralized portal for PIBO clients.'],
                    ['name' => 'Crop Stubble Burning Diversion & Farmer Welfare Proof', 'proto' => 'Carbon Offset Audited', 'desc' => 'Documented verification of agricultural parali diverted from open fires into circular green fuel.'],
                    ['name' => 'Industrial Scope 1 Decarbonization Audit Dossier', 'proto' => 'GHG Protocol Certified', 'desc' => 'Quantified metric tons of fossil coal avoided and carbon offsets generated for industrial ESG reporting.']
                ],
                'faqs' => [
                    ['q' => 'How does co-processing agricultural residue and industrial waste reduce emissions?', 'a' => "Open stubble burning releases catastrophic smoke, methane, and particulate matter. By aggregating crop residues and processing them into industrial fuels alongside non-recyclable industrial plastics, we displace fossil coal in cement kilns operating above 1400°C—ensuring complete thermal destruction with zero residual ash."],
                    ['q' => 'What is the guaranteed calorific value of your industrial alternative fuels?', 'a' => "Our engineered industrial fuels provide a guaranteed Gross Calorific Value (GCV) between 3,800 and 4,200 kcal/kg, moisture under 12%, and chlorine strictly below 0.5% (Cl < 0.5%) to ensure seamless combustion without refractory wear."],
                    ['q' => 'Can industrial manufacturing facilities achieve Zero Waste to Landfill (ZWTL)?', 'a' => "Yes. We partner with automobile, chemical, pharmaceutical, and FMCG manufacturing plants to audit dry reject streams, redirecting non-recyclables into co-processing fuels with complete mass-balance documentation."],
                    ['q' => 'Are Category III Multilayer Plastic EPR credits linked to industrial waste co-processing?', 'a' => "Yes. Under CPCB PWM Rules, non-recyclable Category III plastic packaging can only be neutralized through certified thermal co-processing or waste-to-energy. Our co-processing contracts generate direct, audit-proof Category III disposal credits."]
                ],
                'form_title' => 'Inquire About Industrial Fuel & Waste Solutions',
                'form_desc' => 'Inquire about bulk off-take supply contracts, thermal coal substitution, or zero-landfill industrial waste management.',
                'form_volume_label' => 'Monthly Volume or Fuel Requirement (MT/Month)',
                'form_volume_placeholder' => 'e.g. 2,000 MT/Month',
                'default_service_option' => 'Industrial Waste & Agriculture Waste Management'
            ],
        ];
    }
}
