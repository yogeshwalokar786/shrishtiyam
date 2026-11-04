/**
 * CIRCUFLOW - DYNAMIC SINGLE SERVICE CONTROLLER
 * Renders dedicated data for EPR, MRF, RDF, and CSR based on URL query parameters
 */

const serviceData = {
  epr: {
    id: "epr",
    tag: "CPCB Authorized Producer Responsibility Organisation",
    title: "Brand EPR Compliance & <span class='gradient-text'>Statutory Quota Fulfillment</span>",
    breadcrumb: "Brand EPR Compliance",
    desc: "End-to-end statutory plastic quota collection, certified mechanical recycling, and direct portal hash credit transfer for Category I, II, and III plastics under CPCB mandates.",
    image: "/assets/images/blog-cpcb-epr.jpg",
    metrics: [
      { num: "100%", label: "Audit-Proof CPCB Filing", icon: "<svg viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2'><path d='M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z'></path></svg>" },
      { num: "120,000+", label: "MT/Yr Registered Capacity", icon: "<svg viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2'><circle cx='12' cy='12' r='10'></circle><polyline points='12 6 12 12 16 14'></polyline></svg>" },
      { num: "Zero", label: "Non-Compliance Penalties", icon: "<svg viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2'><path d='M22 11.08V12a10 10 0 1 1-5.93-9.14'></path><polyline points='22 4 12 14.01 9 11.01'></polyline></svg>" },
      { num: "48 Hrs", label: "Digital Certificate Turnaround", icon: "<svg viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2'><rect x='2' y='3' width='20' height='14' rx='2' ry='2'></rect><line x1='8' y1='21' x2='16' y2='21'></line><line x1='12' y1='17' x2='12' y2='21'></line></svg>" }
    ],
    stages: [
      { num: "Stage 01", title: "Obligation Assessment", desc: "Detailed categorization of sales volume across Category I (Rigid), Category II (Flexible), and Category III (Multilayered) plastic packaging.", pill: "Quota Audit", icon: "<svg viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2'><path d='M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z'></path><polyline points='14 2 14 8 20 8'></polyline><line x1='16' y1='13' x2='8' y2='13'></line><line x1='16' y1='17' x2='8' y2='17'></line></svg>" },
      { num: "Stage 02", title: "Geo-Tagged Sourcing", desc: "Centralized collection from decentralized MRFs with live weighbridge telemetry, vehicle GPS tracking, and manifest logs.", pill: "100% Traceable", icon: "<svg viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2'><circle cx='12' cy='12' r='10'></circle><polygon points='16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76'></polygon></svg>" },
      { num: "Stage 03", title: "Mechanical Recycling & RDF", desc: "Reprocessing into premium PCR granules for rigid packaging and certified co-processing in cement kilns for multi-layer films.", pill: "Zero Landfill", icon: "<svg viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2'><path d='M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z'></path><polyline points='3.27 6.96 12 12.01 20.73 6.96'></polyline></svg>" },
      { num: "Stage 04", title: "CPCB Portal Credit Transfer", desc: "Issuance of verified EPR recycling credits uploaded directly to the CPCB centralized online compliance portal.", pill: "CPCB Validated", icon: "<svg viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2'><path d='M22 11.08V12a10 10 0 1 1-5.93-9.14'></path><polyline points='22 4 12 14.01 9 11.01'></polyline></svg>" }
    ],
    deliverables: [
      { name: "CPCB National Portal Certificate Generation", proto: "Direct Portal API Hash", icon: "<svg width='18' height='18' viewBox='0 0 24 24' fill='none' stroke='var(--accent-emerald)' stroke-width='2'><path d='M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71'></path><path d='M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71'></path></svg>" },
      { name: "Digital Weighbridge Receipts & Transit Invoices", proto: "100% Geo-tagged Logs", icon: "<svg width='18' height='18' viewBox='0 0 24 24' fill='none' stroke='var(--accent-emerald)' stroke-width='2'><circle cx='12' cy='12' r='10'></circle><polyline points='12 6 12 12 16 14'></polyline></svg>" },
      { name: "Third-Party Audited Mass Balance Reports", proto: "ISO 14001 Accredited", icon: "<svg width='18' height='18' viewBox='0 0 24 24' fill='none' stroke='var(--accent-emerald)' stroke-width='2'><path d='M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z'></path><polyline points='14 2 14 8 20 8'></polyline></svg>" },
      { name: "Formal Workforce Wage Compliance", proto: "DBT Bank Statements", icon: "<svg width='18' height='18' viewBox='0 0 24 24' fill='none' stroke='var(--accent-emerald)' stroke-width='2'><rect x='1' y='4' width='22' height='16' rx='2' ry='2'></rect><line x1='1' y1='10' x2='23' y2='10'></line></svg>" },
      { name: "Annual ESG & Scope 3 Carbon Offset Statement", proto: "GHG Protocol Verified", icon: "<svg width='18' height='18' viewBox='0 0 24 24' fill='none' stroke='var(--accent-emerald)' stroke-width='2'><path d='M22 12h-4l-3 9L9 3l-3 9H2'></path></svg>" }
    ],
    formTitle: "Get an Instant EPR Quota Estimate",
    formDesc: "Provide your annual plastic packaging volume to receive a statutory quota breakdown and pricing proposal.",
    formInputLabel: "Annual Plastic Packaging Volume (MT)",
    formPlaceholder: "e.g. 5,000 MT"
  },

  mrf: {
    id: "mrf",
    tag: "Urban Local Body & Smart City Infrastructure",
    title: "Decentralized <span class='gradient-text'>Municipal MRF Deployment</span>",
    breadcrumb: "Municipal MRF Setup",
    desc: "Turnkey establishment and operational management of high-capacity Material Recovery Facilities (MRFs) with NIR optical sorting, digital waste ERP, and landfill diversion up to 94%.",
    image: "/assets/images/service-mrf-plant.jpg",
    metrics: [
      { num: "10-100 MT", label: "Daily Processing Capacity", icon: "<svg viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2'><path d='M3 21h18M3 7v14M21 7v14M6 11h4M6 15h4M14 11h4M14 15h4M9 3h6v4H9z'></path></svg>" },
      { num: "98.5%", label: "NIR Segregation Accuracy", icon: "<svg viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2'><circle cx='12' cy='12' r='10'></circle><polyline points='12 6 12 12 16 14'></polyline></svg>" },
      { num: "Up to 94%", label: "Landfill Diversion Rate", icon: "<svg viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2'><path d='M22 11.08V12a10 10 0 1 1-5.93-9.14'></path><polyline points='22 4 12 14.01 9 11.01'></polyline></svg>" },
      { num: "60 Days", label: "Turnkey Modular Setup", icon: "<svg viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2'><rect x='2' y='3' width='20' height='14' rx='2' ry='2'></rect><line x1='8' y1='21' x2='16' y2='21'></line><line x1='12' y1='17' x2='12' y2='21'></line></svg>" }
    ],
    stages: [
      { num: "Stage 01", title: "Waste Characterization & Design", desc: "Detailed municipal waste stream characterization, flow rate modeling, and modular civil-mechanical MRF engineering blueprint.", pill: "Site Survey", icon: "<svg viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2'><path d='M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z'></path><polyline points='14 2 14 8 20 8'></polyline></svg>" },
      { num: "Stage 02", title: "Mechanized Line Installation", desc: "Deployment of optical NIR sorting, ballistic separators, magnetic eddy current separators, and automatic baling presses.", pill: "High Tech", icon: "<svg viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2'><circle cx='12' cy='12' r='10'></circle><polygon points='16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76'></polygon></svg>" },
      { num: "Stage 03", title: "Digital ERP & Weighbridge Setup", desc: "Cloud-connected inventory management tracking segregated polymer bales, shift outputs, and digital dispatch manifests.", pill: "Live Telemetry", icon: "<svg viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2'><rect x='2' y='3' width='20' height='14' rx='2' ry='2'></rect></svg>" },
      { num: "Stage 04", title: "Long-Term O&M Operations", desc: "Full operations and maintenance, ensuring statutory SWM compliance and guaranteed monetized recyclables off-take.", pill: "Zero O&M Risk", icon: "<svg viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2'><path d='M22 11.08V12a10 10 0 1 1-5.93-9.14'></path><polyline points='22 4 12 14.01 9 11.01'></polyline></svg>" }
    ],
    deliverables: [
      { name: "Turnkey MRF Engineering & Civil Blueprints", proto: "CPHEEO Standards Approved", icon: "<svg width='18' height='18' viewBox='0 0 24 24' fill='none' stroke='var(--accent-emerald)' stroke-width='2'><path d='M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z'></path></svg>" },
      { name: "Optical NIR Polymer Sorting Lines", proto: "98.5% Segregation Purity", icon: "<svg width='18' height='18' viewBox='0 0 24 24' fill='none' stroke='var(--accent-emerald)' stroke-width='2'><circle cx='12' cy='12' r='10'></circle></svg>" },
      { name: "Live Cloud-Connected Waste ERP Dashboard", proto: "Real-Time ULB Portal Access", icon: "<svg width='18' height='18' viewBox='0 0 24 24' fill='none' stroke='var(--accent-emerald)' stroke-width='2'><rect x='2' y='3' width='20' height='14' rx='2' ry='2'></rect></svg>" },
      { name: "Worker Health, ESI/PF & Safety Equipment", proto: "100% Social Compliance", icon: "<svg width='18' height='18' viewBox='0 0 24 24' fill='none' stroke='var(--accent-emerald)' stroke-width='2'><rect x='1' y='4' width='22' height='16' rx='2' ry='2'></rect></svg>" },
      { name: "Monthly Certified Landfill Diversion Audit", proto: "CPCB / MoHUA Compliant", icon: "<svg width='18' height='18' viewBox='0 0 24 24' fill='none' stroke='var(--accent-emerald)' stroke-width='2'><path d='M22 12h-4l-3 9L9 3l-3 9H2'></path></svg>" }
    ],
    formTitle: "Discuss Smart City MRF Partnership",
    formDesc: "Request a feasibility report, operational blueprint, or PPP model presentation for your urban local body.",
    formInputLabel: "Estimated Daily Municipal Dry Waste (MT/Day)",
    formPlaceholder: "e.g. 50 MT/day"
  },

  rdf: {
    id: "rdf",
    tag: "Thermal Substitution for Cement Kilns & Boilers",
    title: "High-Calorific <span class='gradient-text'>Refuse Derived Fuel (RDF) Supply</span>",
    breadcrumb: "Industrial RDF Co-Processing",
    desc: "Supplying precision-shredded, low-chlorine alternative fuel fluff and dense briquettes with Gross Calorific Value (GCV) >3,800 kcal/kg, enabling 15-25% thermal coal replacement in heavy industry.",
    image: "/assets/images/service-rdf-fuel.jpg",
    metrics: [
      { num: ">3,800 kcal", label: "Guaranteed GCV / kg", icon: "<svg viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2'><polygon points='13 2 3 14 12 14 11 22 21 10 12 10 13 2'></polygon></svg>" },
      { num: "< 12%", label: "Controlled Moisture Content", icon: "<svg viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2'><circle cx='12' cy='12' r='10'></circle><polyline points='12 6 12 12 16 14'></polyline></svg>" },
      { num: "< 0.5%", label: "Kiln-Safe Chlorine (Cl)", icon: "<svg viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2'><path d='M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z'></path></svg>" },
      { num: "5,000 MT", label: "Monthly Bulk Supply Capacity", icon: "<svg viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2'><rect x='1' y='3' width='15' height='13'></rect></svg>" }
    ],
    stages: [
      { num: "Stage 01", title: "Non-Recyclable Fraction Segregation", desc: "Automated extraction of high-energy combustible multilayer plastics and contaminated dry packaging from MRFs.", pill: "High Calorific", icon: "<svg viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2'><circle cx='12' cy='12' r='10'></circle></svg>" },
      { num: "Stage 02", title: "Multi-Stage Shredding & Drying", desc: "Dual-shaft high-torque shredding down to <30mm fluff, followed by rotary moisture conditioning below 12%.", pill: "Uniform Fluff", icon: "<svg viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2'><path d='M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z'></path></svg>" },
      { num: "Stage 03", title: "Chlorine Decontamination & Baling", desc: "Chemical de-chlorination checks ensuring <0.5% chloride threshold to protect industrial refractory brick linings.", pill: "Kiln Safe", icon: "<svg viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2'><path d='M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z'></path></svg>" },
      { num: "Stage 04", title: "Direct Pneumatic Kiln Offtake", desc: "Bulk dedicated carrier fleet dispatch with certified batch calorific testing and 100% bottom ash clinker absorption.", pill: "Zero Ash Residue", icon: "<svg viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2'><rect x='1' y='3' width='15' height='13'></rect></svg>" }
    ],
    deliverables: [
      { name: "Batch-Wise GCV & Moisture Laboratory Test Reports", proto: "ASTM D5865 Certified", icon: "<svg width='18' height='18' viewBox='0 0 24 24' fill='none' stroke='var(--accent-emerald)' stroke-width='2'><path d='M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z'></path></svg>" },
      { name: "Kiln Refractory Protection (Low Chlorine) Warranty", proto: "Cl < 0.5% Guaranteed", icon: "<svg width='18' height='18' viewBox='0 0 24 24' fill='none' stroke='var(--accent-emerald)' stroke-width='2'><path d='M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z'></path></svg>" },
      { name: "CPCB Category III Co-Processing Disposal Certificates", proto: "Statutory Hash Verification", icon: "<svg width='18' height='18' viewBox='0 0 24 24' fill='none' stroke='var(--accent-emerald)' stroke-width='2'><path d='M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71'></path></svg>" },
      { name: "Dedicated Enclosed Bulk Trucking Fleet", proto: "100% Geo-Tracked Logistics", icon: "<svg width='18' height='18' viewBox='0 0 24 24' fill='none' stroke='var(--accent-emerald)' stroke-width='2'><rect x='1' y='3' width='15' height='13'></rect></svg>" },
      { name: "Thermal Coal Carbon Offset Offset Credits", proto: "Verified Scope 1 & 2 Reduction", icon: "<svg width='18' height='18' viewBox='0 0 24 24' fill='none' stroke='var(--accent-emerald)' stroke-width='2'><path d='M22 12h-4l-3 9L9 3l-3 9H2'></path></svg>" }
    ],
    formTitle: "Request Industrial RDF Supply Contract",
    formDesc: "Inquire about annual bulk off-take contracts, thermal substitution rates, and sample testing parameters.",
    formInputLabel: "Monthly Fuel Requirement (MT/Month)",
    formPlaceholder: "e.g. 1,000 MT/Month"
  },

  csr: {
    id: "csr",
    tag: "Social ROI & ESG Community Development",
    title: "Workforce Formalization & <span class='gradient-text'>Measurable CSR Impact</span>",
    breadcrumb: "Workforce Welfare & CSR",
    desc: "Empowering frontline waste collectors and recycling workers with formal identity accreditation, Jan Dhan banking, occupational health insurance, and child educational scholarships under Schedule VII CSR.",
    image: "/assets/images/service-csr-welfare.jpg",
    metrics: [
      { num: "4,500+", label: "Workers Formally Integrated", icon: "<svg viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2'><path d='M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2'></path><circle cx='9' cy='7' r='4'></circle></svg>" },
      { num: "100%", label: "Direct DBT Bank Transfers", icon: "<svg viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2'><rect x='1' y='4' width='22' height='16' rx='2' ry='2'></rect></svg>" },
      { num: "12 / Yr", label: "Occupational Medical Camps", icon: "<svg viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2'><path d='M22 12h-4l-3 9L9 3l-3 9H2'></path></svg>" },
      { num: "Schedule VII", label: "Statutory CSR Compliant", icon: "<svg viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2'><path d='M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z'></path></svg>" }
    ],
    stages: [
      { num: "Stage 01", title: "Community Census & ID Issuance", desc: "Door-to-door identification and formal registration of informal waste collection families with biometric digital ID cards.", pill: "Identity Dignity", icon: "<svg viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2'><path d='M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2'></path></svg>" },
      { num: "Stage 02", title: "Zero-Balance Banking Integration", desc: "Setting up personal bank accounts with zero middlemen, guaranteeing direct benefit transfers (DBT) for collected plastics.", pill: "Financial Inclusion", icon: "<svg viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2'><rect x='1' y='4' width='22' height='16' rx='2' ry='2'></rect></svg>" },
      { num: "Stage 03", title: "Health Camps & Occupational PPE", desc: "Distribution of heavy-duty puncture-proof gloves, boots, masks, and quarterly preventative medical checkups.", pill: "Health & Safety", icon: "<svg viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2'><path d='M22 12h-4l-3 9L9 3l-3 9H2'></path></svg>" },
      { num: "Stage 04", title: "Audited Social Impact Reporting", desc: "Comprehensive Social Return on Investment (SROI) reports with photographic evidence and third-party financial audits.", pill: "Audited SROI", icon: "<svg viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2'><path d='M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z'></path></svg>" }
    ],
    deliverables: [
      { name: "Formal Worker Biometric Roster & ID Records", proto: "Aadhaar / EPFO Linked", icon: "<svg width='18' height='18' viewBox='0 0 24 24' fill='none' stroke='var(--accent-emerald)' stroke-width='2'><path d='M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2'></path></svg>" },
      { name: "Direct DBT Bank Statements & Wage Proofs", proto: "Zero-Cash Verification", icon: "<svg width='18' height='18' viewBox='0 0 24 24' fill='none' stroke='var(--accent-emerald)' stroke-width='2'><rect x='1' y='4' width='22' height='16' rx='2' ry='2'></rect></svg>" },
      { name: "Medical Checkup Camp Records & Health Cards", proto: "Registered Physician Reports", icon: "<svg width='18' height='18' viewBox='0 0 24 24' fill='none' stroke='var(--accent-emerald)' stroke-width='2'><path d='M22 12h-4l-3 9L9 3l-3 9H2'></path></svg>" },
      { name: "Children Scholarship & Educational Kit Receipts", proto: "Direct Beneficiary Signed", icon: "<svg width='18' height='18' viewBox='0 0 24 24' fill='none' stroke='var(--accent-emerald)' stroke-width='2'><path d='M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z'></path></svg>" },
      { name: "Audited Schedule VII Corporate CSR Impact Statement", proto: "Statutory Auditor Certified", icon: "<svg width='18' height='18' viewBox='0 0 24 24' fill='none' stroke='var(--accent-emerald)' stroke-width='2'><path d='M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z'></path></svg>" }
    ],
    formTitle: "Partner with Us on CSR Impact",
    formDesc: "Design a custom corporate CSR program supporting waste collector education, healthcare, and formalization.",
    formInputLabel: "Proposed Annual CSR Grant Budget",
    formPlaceholder: "e.g. ₹25 Lakhs / Custom"
  },

  logistics: {
    id: "logistics",
    tag: "Pan-India Traceable Supply Chain Infrastructure",
    title: "Pan-India <span class='gradient-text'>Reverse Logistics & Traceability</span>",
    breadcrumb: "Reverse Logistics Network",
    desc: "A centralized reverse-supply chain network connecting urban local bodies, aggregator hubs, authorized recyclers, and industrial co-processing kilns with tamper-proof digital accountability across 22+ states.",
    image: "/assets/images/regional-network-map.jpg",
    metrics: [
      { num: "22+", label: "States & UTs Covered", icon: "<svg viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2'><path d='M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z'></path><circle cx='12' cy='10' r='3'></circle></svg>" },
      { num: "100%", label: "Geo-Fenced Fleet Telematics", icon: "<svg viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2'><rect x='1' y='3' width='15' height='13'></rect><polygon points='16 8 20 8 23 11 23 16 16 16 16 8'></polygon><circle cx='5.5' cy='18.5' r='2.5'></circle><circle cx='18.5' cy='18.5' r='2.5'></circle></svg>" },
      { num: "Zero", label: "Double Counting Risk", icon: "<svg viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2'><path d='M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z'></path></svg>" },
      { num: "24/7", label: "Client Portal Telemetry", icon: "<svg viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2'><circle cx='12' cy='12' r='10'></circle><polyline points='12 6 12 12 16 14'></polyline></svg>" }
    ],
    stages: [
      { num: "Stage 01", title: "Decentralized Aggregation", desc: "Consolidation of post-consumer plastics, e-waste, and scrap from authorized municipal MRFs and regional sorting yards.", pill: "Source Aggregation", icon: "<svg viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2'><path d='M3 21h18M3 7v14M21 7v14M6 11h4M6 15h4M14 11h4M14 15h4M9 3h6v4H9z'></path></svg>" },
      { num: "Stage 02", title: "Digital Manifest Generation", desc: "Automated weight recording via calibrated weighbridges, time-stamping, and cryptographic QR transit manifest dispatch.", pill: "Tamper Proof", icon: "<svg viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2'><rect x='2' y='3' width='20' height='14' rx='2' ry='2'></rect></svg>" },
      { num: "Stage 03", title: "Enclosed Fleet Transit", desc: "Transportation via dedicated GPS-monitored vehicle fleet preventing transit loss, cargo pilferage, and environmental leakage.", pill: "GPS Tracked", icon: "<svg viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2'><rect x='1' y='3' width='15' height='13'></rect></svg>" },
      { num: "Stage 04", title: "Recycler Inward Reconciliation", desc: "Delivery confirmation at registered recycling plants with physical mass-balance verification and instant digital sign-off.", pill: "Closed Loop", icon: "<svg viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2'><path d='M22 11.08V12a10 10 0 1 1-5.93-9.14'></path><polyline points='22 4 12 14.01 9 11.01'></polyline></svg>" }
    ],
    deliverables: [
      { name: "Live GPS Fleet Telematics & Trip Playback", proto: "100% Geo-Tracked Records", icon: "<svg width='18' height='18' viewBox='0 0 24 24' fill='none' stroke='var(--accent-emerald)' stroke-width='2'><circle cx='12' cy='12' r='10'></circle></svg>" },
      { name: "Electronic Weighbridge Slips & Transit E-Way Bills", proto: "Statutory GST / CPCB Hash", icon: "<svg width='18' height='18' viewBox='0 0 24 24' fill='none' stroke='var(--accent-emerald)' stroke-width='2'><path d='M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z'></path></svg>" },
      { name: "Certified Recycler Inward Batch Manifests", proto: "Mass Balance Locked", icon: "<svg width='18' height='18' viewBox='0 0 24 24' fill='none' stroke='var(--accent-emerald)' stroke-width='2'><rect x='2' y='3' width='20' height='14' rx='2' ry='2'></rect></svg>" },
      { name: "Multi-State SPCB Transportation Permits", proto: "100% Inter-State Authorized", icon: "<svg width='18' height='18' viewBox='0 0 24 24' fill='none' stroke='var(--accent-emerald)' stroke-width='2'><path d='M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z'></path></svg>" },
      { name: "Enterprise Supply Chain Dashboard Access", proto: "Real-Time Telemetry API", icon: "<svg width='18' height='18' viewBox='0 0 24 24' fill='none' stroke='var(--accent-emerald)' stroke-width='2'><path d='M22 12h-4l-3 9L9 3l-3 9H2'></path></svg>" }
    ],
    formTitle: "Inquire on Reverse Logistics Solutions",
    formDesc: "Request route mapping, freight economics, or national aggregation support for your supply chain.",
    formInputLabel: "Expected Monthly Reverse Tonnage (MT)",
    formPlaceholder: "e.g. 500 MT/month"
  },

  advisory: {
    id: "advisory",
    tag: "CPCB / SPCB Regulatory Advisory & Technical Due Diligence",
    title: "Environmental Advisory, <span class='gradient-text'>Audits & Legal Defense</span>",
    breadcrumb: "Regulatory Advisory & Audits",
    desc: "Comprehensive environmental engineering advisory, plastic baseline footprint accounting, Design for Recyclability (DfR) packaging transition, and statutory defense before central and state pollution boards.",
    image: "/assets/images/polymer-testing-lab.jpg",
    metrics: [
      { num: "100%", label: "Notice Defense Success Rate", icon: "<svg viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2'><path d='M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z'></path></svg>" },
      { num: "500+", label: "Corporate Audits Completed", icon: "<svg viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2'><path d='M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z'></path></svg>" },
      { num: "ISO 14040", label: "LCA Method Standard", icon: "<svg viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2'><circle cx='12' cy='12' r='10'></circle><polyline points='12 6 12 12 16 14'></polyline></svg>" },
      { num: "Zero", label: "Audit Deficiencies Reported", icon: "<svg viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2'><path d='M22 11.08V12a10 10 0 1 1-5.93-9.14'></path><polyline points='22 4 12 14.01 9 11.01'></polyline></svg>" }
    ],
    stages: [
      { num: "Stage 01", title: "Baseline Footprint Audit", desc: "SKU-level analysis of raw material consumption, polymer classification (Cat I, II, III), and statutory obligation profiling.", pill: "SKU Mapping", icon: "<svg viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2'><path d='M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z'></path></svg>" },
      { num: "Stage 02", title: "Recyclability Redesign (DfR)", desc: "Transition advisory from complex multi-material films to monomaterial PE/PP structures and verified post-consumer recycled content.", pill: "Eco-Design", icon: "<svg viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2'><path d='M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z'></path></svg>" },
      { num: "Stage 03", title: "Annual Portal Filing & Filing Defense", desc: "Preparation and submission of annual returns on the CPCB portal with full invoice reconciliation and mass balance sign-offs.", pill: "100% Compliant", icon: "<svg viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2'><path d='M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z'></path></svg>" },
      { num: "Stage 04", title: "ESG & BRSR Disclosures", desc: "Formulation of Business Responsibility and Sustainability Reporting (BRSR) environmental indicators for stock exchange filing.", pill: "Scope 3 / BRSR", icon: "<svg viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2'><rect x='2' y='3' width='20' height='14' rx='2' ry='2'></rect></svg>" }
    ],
    deliverables: [
      { name: "CPCB / SPCB Annual Compliance Filing Dossier", proto: "Statutory Portal Submission", icon: "<svg width='18' height='18' viewBox='0 0 24 24' fill='none' stroke='var(--accent-emerald)' stroke-width='2'><path d='M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z'></path></svg>" },
      { name: "Packaging Design for Recyclability (DfR) Roadmap", proto: "Monomaterial Engineering", icon: "<svg width='18' height='18' viewBox='0 0 24 24' fill='none' stroke='var(--accent-emerald)' stroke-width='2'><circle cx='12' cy='12' r='10'></circle></svg>" },
      { name: "Environmental Notice & Show-Cause Legal Representation", proto: "Specialized Legal Defense", icon: "<svg width='18' height='18' viewBox='0 0 24 24' fill='none' stroke='var(--accent-emerald)' stroke-width='2'><path d='M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z'></path></svg>" },
      { name: "Life Cycle Assessment (LCA) Carbon Study", proto: "ISO 14040/44 Certified", icon: "<svg width='18' height='18' viewBox='0 0 24 24' fill='none' stroke='var(--accent-emerald)' stroke-width='2'><path d='M22 12h-4l-3 9L9 3l-3 9H2'></path></svg>" },
      { name: "BRSR / ESG Environmental Chapter Formulation", proto: "SEBI Mandated Disclosure", icon: "<svg width='18' height='18' viewBox='0 0 24 24' fill='none' stroke='var(--accent-emerald)' stroke-width='2'><rect x='2' y='3' width='20' height='14' rx='2' ry='2'></rect></svg>" }
    ],
    formTitle: "Book an Environmental Advisory Session",
    formDesc: "Speak directly with our senior environmental engineers and legal counsel regarding your compliance posture.",
    formInputLabel: "Entity Type & Scope of Audit",
    formPlaceholder: "e.g. FMCG Brand - Annual Return & DfR Audit"
  }
};

document.addEventListener('DOMContentLoaded', () => {
  renderSingleService();
});

function renderSingleService() {
  const params = new URLSearchParams(window.location.search);
  const serviceKey = params.get('service') || 'epr';
  const data = serviceData[serviceKey] || serviceData.epr;

  // Breadcrumb
  const breadcrumbEl = document.getElementById('serviceBreadcrumb');
  if (breadcrumbEl) breadcrumbEl.textContent = data.breadcrumb;

  // Tag
  const tagEl = document.getElementById('serviceTag');
  if (tagEl) tagEl.innerHTML = `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg><span>${data.tag}</span>`;

  // Title
  const titleEl = document.getElementById('serviceTitle');
  if (titleEl) titleEl.innerHTML = data.title;

  // Description
  const descEl = document.getElementById('serviceDesc');
  if (descEl) descEl.textContent = data.desc;

  // Hero Image
  const imgEl = document.getElementById('serviceHeroImg');
  if (imgEl) imgEl.src = data.image;

  // Metrics
  const metricsEl = document.getElementById('serviceMetrics');
  if (metricsEl) {
    metricsEl.innerHTML = data.metrics.map(m => `
      <div class="metric-card">
        <div class="solution-card-icon" style="margin-bottom: 8px;">${m.icon}</div>
        <span class="metric-number">${m.num}</span>
        <span class="metric-label">${m.label}</span>
      </div>
    `).join('');
  }

  // Stages
  const stagesEl = document.getElementById('serviceStages');
  if (stagesEl) {
    stagesEl.innerHTML = data.stages.map(s => `
      <div class="solution-card">
        <div class="solution-card-icon">${s.icon}</div>
        <div style="font-family: var(--font-mono); font-size: 0.8rem; font-weight: 800; color: var(--accent-emerald); text-transform: uppercase; margin-bottom: 6px;">${s.num}</div>
        <h4>${s.title}</h4>
        <p>${s.desc}</p>
        <span class="cert-pill" style="margin-top: auto;">${s.pill}</span>
      </div>
    `).join('');
  }

  // Deliverables
  const delivEl = document.getElementById('serviceDeliverables');
  if (delivEl) {
    delivEl.innerHTML = data.deliverables.map(d => `
      <div style="padding: 16px 20px; border-bottom: 1px solid var(--border-subtle); display: flex; justify-content: space-between; align-items: center; font-size: 0.88rem;">
        <span style="display: flex; align-items: center; gap: 8px;">
          ${d.icon}
          ${d.name}
        </span>
        <span class="spec-mini-v" style="color: var(--accent-emerald);">${d.proto}</span>
      </div>
    `).join('');
  }

  // Form Customization
  const formTitleEl = document.getElementById('serviceFormTitle');
  if (formTitleEl) formTitleEl.textContent = data.formTitle;

  const formDescEl = document.getElementById('serviceFormDesc');
  if (formDescEl) formDescEl.textContent = data.formDesc;

  const formInputLabelEl = document.getElementById('serviceFormInputLabel');
  if (formInputLabelEl) formInputLabelEl.textContent = data.formInputLabel;

  const formInputEl = document.getElementById('serviceFormInput');
  if (formInputEl) formInputEl.placeholder = data.formPlaceholder;
}
