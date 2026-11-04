<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoriesData = [
            [
                'name' => 'EPR Compliance',
                'slug' => 'epr-compliance',
                'description' => 'Extended Producer Responsibility regulations, statutory compliance quotas, and audit guidelines.',
                'sort_order' => 1,
            ],
            [
                'name' => 'PCR Polymer Science',
                'slug' => 'pcr-polymer-science',
                'description' => 'Technical formulation, viscosity optimization, and material testing of recycled resins.',
                'sort_order' => 2,
            ],
            [
                'name' => 'Zero-Waste & ESG',
                'slug' => 'zero-waste-esg',
                'description' => 'Decentralized MRF operations, informal sector welfare, and corporate lifecycle sustainability.',
                'sort_order' => 3,
            ],
            [
                'name' => 'Digital Traceability',
                'slug' => 'digital-traceability',
                'description' => 'Cloud weighbridge ledgers, QR geo-tagging, and immutable circular audit documentation.',
                'sort_order' => 4,
            ],
        ];

        $categories = [];
        foreach ($categoriesData as $cat) {
            $categories[$cat['slug']] = BlogCategory::firstOrCreate(
                ['slug' => $cat['slug']],
                $cat
            );
        }

        $blogsData = [
            [
                'category_id' => $categories['epr-compliance']->id,
                'title' => 'Navigating New EPR Mandates: A Strategic Roadmap for Enterprise FMCG Brands',
                'slug' => 'navigating-new-epr-mandates-strategic-roadmap',
                'excerpt' => 'How progressive enterprise brands are transitioning from compliance risk to value creation by integrating food-grade PCR resins and automated digital weighbridge audit ledgers.',
                'content' => "<p>As environmental governance tightens globally, corporate Extended Producer Responsibility (EPR) is undergoing a major evolution. Where brands previously viewed recycling quotas purely as a compliance cost center, market leaders are now leveraging closed-loop PCR supply chains to insulate themselves from virgin petrochemical price volatility.</p>

<h2>The Shift to Immutable Digital Audit Trails</h2>
<p>Historically, the informal waste sector lacked digital tracking, exposing brand owners to compliance discrepancies and greenwashing accusations. Today, decentralized material recovery facilities utilize cloud-connected weighbridges, NIR multi-spectral optical sorting, and GPS geo-tagging at every handover point.</p>

<blockquote>
\"Circularity is no longer just about diverting tons from landfills; it is about guaranteeing purity, traceability, and verifiable carbon offset data that stands up to statutory audits.\"
</blockquote>

<h2>Three Core Directives for Enterprise Brands</h2>
<p>To establish a resilient compliance framework for current and upcoming regulatory cycles, supply chain directors should focus on three foundational pillars:</p>

<ul>
<li><strong>Polymer Rationalization:</strong> Transitioning from unrecyclable multi-material pouches to mono-material polyethylene (PE) or polypropylene (PP) barrier films that can be readily re-extruded.</li>
<li><strong>Minimum PCR Incorporation:</strong> Formulating rigid packaging lines to incorporate at least 25% to 50% food-grade rPET or blow-molding rHDPE without sacrificing drop-impact strength.</li>
<li><strong>Direct Proactive Auditing:</strong> Establishing long-term off-take contracts with accredited Producer Responsibility Organisations that maintain real-time digital registries.</li>
</ul>

<h2>Looking Ahead: The Value of High-Purity Resins</h2>
<p>With vacuum degassing and multi-stage alkaline washing, modern Post-Consumer Recycled resins meet stringent international food-contact safety thresholds. Forward-looking enterprises that integrate these materials early will secure premium tier quotas, lower ESG capital costs, and safeguard their global consumer trust.</p>",
                'image' => '/assets/images/blog-cpcb-epr.jpg',
                'author_name' => 'Alex Vance',
                'author_role' => 'Head of Sustainability & ESG',
                'read_time' => '6 Min Read',
                'is_featured' => true,
                'is_published' => true,
                'published_at' => now()->subDays(3),
                'meta_title' => 'Navigating New EPR Mandates: A Strategic Roadmap',
                'meta_description' => 'How enterprise brands are transitioning from statutory compliance risk to value creation with food-grade PCR resins and digital weighbridge audit ledgers.',
            ],
            [
                'category_id' => $categories['pcr-polymer-science']->id,
                'title' => 'Overcoming Intrinsic Viscosity Loss in High-Performance rPET',
                'slug' => 'overcoming-intrinsic-viscosity-loss-rpet',
                'excerpt' => 'Exploring solid-state polycondensation (SSP) and vacuum degassing techniques that maintain structural clarity in recycled beverage bottles.',
                'content' => "<p>One of the persistent engineering hurdles in closing the loop on PET bottles is the thermal and hydrolytic degradation that occurs during mechanical reprocessing. In this technical deep-dive, we examine the reaction kinetics of solid-state polycondensation (SSP) and how precise vacuum degassing preserves IV levels above 0.80 dL/g for high-speed stretch blow molding.</p>
<h2>Key Technical Findings</h2>
<p>Through closed-loop vacuum decontamination and molecular chain rebuilding, rPET can match the mechanical rigidity, crystal haze tolerance, and stress-crack resistance of virgin resin.</p>",
                'image' => '/assets/images/blog-rpet-bottles.jpg',
                'author_name' => 'Dr. R. Ramanathan',
                'author_role' => 'Lead Polymer Scientist',
                'read_time' => '5 Min Read',
                'is_featured' => false,
                'is_published' => true,
                'published_at' => now()->subDays(5),
                'meta_title' => 'Overcoming Intrinsic Viscosity Loss in High-Performance rPET',
                'meta_description' => 'Exploring solid-state polycondensation (SSP) and vacuum degassing techniques for rPET beverage bottles.',
            ],
            [
                'category_id' => $categories['epr-compliance']->id,
                'title' => 'Understanding Category I vs. Category II Statutory Targets',
                'slug' => 'understanding-category-i-vs-category-ii-statutory-targets',
                'excerpt' => 'A breakdown of recycling quotas, verification obligations, and penalty mitigation across rigid and flexible polymer matrices.',
                'content' => "<p>State and national environmental guidelines delineate packaging polymers into distinct compliance categories. Understanding the operational differences between Category I (rigid plastic packaging) and Category II (flexible plastic packaging of single or multi-layer) is vital for setting procurement targets.</p>
<h2>Compliance Benchmarks</h2>
<p>Producers, Importers, and Brand Owners (PIBOs) must account for scrap generation, recycling efficiency ratios, and submit authenticated proof of end-of-life processing on regulatory portal systems.</p>",
                'image' => '/assets/images/blog-cpcb-epr.jpg',
                'author_name' => 'Priya Sharma',
                'author_role' => 'Regulatory Affairs Lead',
                'read_time' => '4 Min Read',
                'is_featured' => false,
                'is_published' => true,
                'published_at' => now()->subDays(10),
                'meta_title' => 'Understanding Category I vs Category II Targets',
                'meta_description' => 'Statutory recycling targets, verification rules, and compliance guidance for rigid vs flexible polymers.',
            ],
            [
                'category_id' => $categories['digital-traceability']->id,
                'title' => 'Why Automated GPS & QR Geo-tagging is Ending Greenwashing',
                'slug' => 'automated-gps-qr-geotagging-ending-greenwashing',
                'excerpt' => 'How immutable audit trails protect brand reputation by linking recycled pellets directly back to authenticated municipal sourcing coordinates.',
                'content' => "<p>Greenwashing scrutiny has made paper certificates obsolete. Enterprise purchasers demanding institutional credibility now require batch-level traceability that verifies the origin, collection timestamp, logistics carrier, and processing facility coordinates of every metric ton recycled.</p>
<h2>Digital Chain of Custody</h2>
<p>By connecting weighbridge optical recognition cameras and mobile app check-ins, circular supply chains achieve absolute transparency from ward-level scrap collectors to finished polymer pallets.</p>",
                'image' => '/assets/images/facility-mrf-sorting.jpg',
                'author_name' => 'Vikram Sethi',
                'author_role' => 'VP of Digital Systems',
                'read_time' => '7 Min Read',
                'is_featured' => false,
                'is_published' => true,
                'published_at' => now()->subDays(14),
                'meta_title' => 'Why Automated GPS & QR Geo-tagging Ends Greenwashing',
                'meta_description' => 'How digital traceability and tamper-proof chain-of-custody ledgers protect brand reputation.',
            ],
            [
                'category_id' => $categories['zero-waste-esg']->id,
                'title' => 'Blueprint for Decentralized Material Recovery Facilities (MRFs)',
                'slug' => 'blueprint-decentralized-material-recovery-facilities-mrfs',
                'excerpt' => 'Examining the capital economics and operational flow of 25 MT/day modular MRF hubs deployed in smart city clusters.',
                'content' => "<p>Centralized mega-landfills are ecologically unviable. Modular, decentralized Material Recovery Facilities located at municipal periphery hubs offer superior route economics, reduced transport emissions, and faster turnaround times for dry waste segregation.</p>
<h2>Operational Economics</h2>
<p>A 25 MT/day facility with automated balers and magnetic eddy-current separators recovers over 92% of recyclable dry fractions, providing immediate local feedstock to recycling processors.</p>",
                'image' => '/assets/images/service-mrf-plant.jpg',
                'author_name' => 'Karan Patel',
                'author_role' => 'Director of Infrastructure',
                'read_time' => '5 Min Read',
                'is_featured' => false,
                'is_published' => true,
                'published_at' => now()->subDays(20),
                'meta_title' => 'Blueprint for Decentralized Material Recovery Facilities',
                'meta_description' => 'Operational design, capital outlay, and recovery efficiencies for 25 MT/day decentralized MRFs.',
            ],
            [
                'category_id' => $categories['zero-waste-esg']->id,
                'title' => 'Integrating the Informal Sector: Direct Financial Inclusion Metrics',
                'slug' => 'integrating-informal-sector-financial-inclusion-metrics',
                'excerpt' => 'How formal digital banking, transparent piece rates, and health insurance drive measurable Social Return on Investment (SROI).',
                'content' => "<p>Over 80% of waste collection in emerging economies is powered by informal waste pickers. Elevating their livelihoods through formal identity registrations, direct bank deposit payments, and protective safety gear is both a moral imperative and an operational strength.</p>
<h2>Measurable SROI Outcomes</h2>
<p>Providing dignity and financial independence to frontline green workers boosts worker retention, stabilizes raw material volumes, and fulfills corporate ESG criteria under global sustainability standards.</p>",
                'image' => '/assets/images/service-csr-welfare.jpg',
                'author_name' => 'Sunita Rao',
                'author_role' => 'Head of Social Welfare & CSR',
                'read_time' => '6 Min Read',
                'is_featured' => false,
                'is_published' => true,
                'published_at' => now()->subDays(26),
                'meta_title' => 'Integrating the Informal Sector: Social Impact Metrics',
                'meta_description' => 'Direct financial inclusion, fair piece rates, and social safety nets for frontline circular workforce.',
            ],
            [
                'category_id' => $categories['pcr-polymer-science']->id,
                'title' => 'Thermal Co-Processing of Multilayer Plastics in Cement Kilns',
                'slug' => 'thermal-co-processing-multilayer-plastics-cement-kilns',
                'excerpt' => 'Optimizing calorific value (>3,400 kcal/kg) and controlling chlorine content to safely replace fossil coal in heavy manufacturing.',
                'content' => "<p>Non-recyclable multi-layered plastics (MLP) present the greatest challenge for zero-waste initiatives. When mechanical recycling is unviable, engineered Refuse Derived Fuel (RDF) offers an environmentally sound alternative via high-temperature cement kiln co-processing.</p>
<h2>Clean Combustion Dynamics</h2>
<p>At kiln temperatures exceeding 1,400°C, combustible polymers undergo complete thermal mineralisation without forming dioxins or furans, substantially displacing fossil coal and lowering industrial net carbon emissions.</p>",
                'image' => '/assets/images/service-rdf-fuel.jpg',
                'author_name' => 'Dr. R. Ramanathan',
                'author_role' => 'Lead Polymer Scientist',
                'read_time' => '4 Min Read',
                'is_featured' => false,
                'is_published' => true,
                'published_at' => now()->subDays(32),
                'meta_title' => 'Thermal Co-Processing of Multilayer Plastics',
                'meta_description' => 'Energy recovery, kiln co-processing parameters, and emissions monitoring for non-recyclable polymer fractions.',
            ],
        ];

        foreach ($blogsData as $blog) {
            Blog::firstOrCreate(
                ['slug' => $blog['slug']],
                $blog
            );
        }
    }
}
