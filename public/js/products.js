/**
 * CIRCUFLOW POST-CONSUMER RECYCLED (PCR) GRANULES & MATERIALS ENGINE
 * Product catalog filtering and technical specification modal (B2B Informational)
 */

const pcrProducts = [
  {
    id: 'rpet-clear',
    category: 'rpet',
    code: 'PCR-PET-01',
    name: 'rPET Food-Grade Natural Granules',
    image: 'assets/images/product-rpet-resin.webp',
    desc: 'High-clarity, decontaminated post-consumer PET granules ideal for food packaging, beverage bottles, and thermoformed trays.',
    grade: 'Bottle & Thermoform Grade',
    mfi: '28 - 32 g/10min (280°C / 2.16kg)',
    iv: '0.78 - 0.82 dL/g',
    density: '1.34 g/cm³',
    purity: '99.9%',
    color: 'Clear / Transparent Natural',
    applications: ['Beverage Bottles', 'Clamshell Packaging', 'Polyester Staple Fiber', 'Cosmetic Jars']
  },
  {
    id: 'rhdpe-blow',
    category: 'rhdpe',
    code: 'PCR-HDPE-02',
    name: 'rHDPE High-Density Natural / Blue Flakes & Granules',
    image: 'assets/images/product-rhdpe-pellets.jpg',
    desc: 'Engineered for high Environmental Stress Crack Resistance (ESCR). Premium resin for home care, industrial drums, and packaging.',
    grade: 'Blow Molding Grade',
    mfi: '0.30 - 0.45 g/10min (190°C / 2.16kg)',
    iv: 'High Mol. Weight',
    density: '0.954 g/cm³',
    purity: '99.5%',
    color: 'Natural Translucent & Blue',
    applications: ['Detergent Bottles', 'Jerry Cans & Drums', 'HDPE Pipes & Ducts', 'Storage Crates']
  },
  {
    id: 'rpp-injection',
    category: 'rpp',
    code: 'PCR-PP-03',
    name: 'rPP High-Impact Copolymer & Homopolymer',
    image: 'assets/images/product-rpp-copolymer.jpg',
    desc: 'High-rigidity recycled polypropylene granules formulated for automotive components, battery casings, furniture, and containers.',
    grade: 'Injection Molding Grade',
    mfi: '12 - 16 g/10min (230°C / 2.16kg)',
    iv: 'N/A',
    density: '0.905 g/cm³',
    purity: '99.2%',
    color: 'Black / Grey / Custom Colors',
    applications: ['Automotive Parts', 'Industrial Bins', 'Caps & Closures', 'Pallets & Crates']
  },
  {
    id: 'rldpe-film',
    category: 'rldpe',
    code: 'PCR-LDPE-04',
    name: 'rLDPE Optical Film Grade Granules',
    image: 'assets/images/product-rldpe-film.jpg',
    desc: 'Clean, flexible recycled low-density polyethylene pellets optimized for secondary shrink wrap, courier bags, and agricultural film.',
    grade: 'Blown Film Grade',
    mfi: '0.8 - 1.2 g/10min (190°C / 2.16kg)',
    iv: 'N/A',
    density: '0.922 g/cm³',
    purity: '99.1%',
    color: 'Semi-Transparent Natural',
    applications: ['Secondary Packaging Film', 'Courier Bags', 'Agricultural Mulch', 'Garbage Bags']
  },
  {
    id: 'rdf-fluff',
    category: 'rdf',
    code: 'RDF-KILN-05',
    name: 'Refuse Derived Fuel (RDF Fluff / Briquettes)',
    image: 'assets/images/service-rdf-fuel.jpg',
    desc: 'High-calorific alternative fuel manufactured from non-recyclable segregated combustible fractions, engineered for kiln co-processing.',
    grade: 'Industrial Co-Processing',
    mfi: 'Calorific: >3,400 kcal/kg',
    iv: 'Moisture <12%',
    density: 'Briquette / Fluff Form',
    purity: 'Chlorine <0.5%',
    color: 'Industrial Matrix',
    applications: ['Cement Plant Co-processing', 'Industrial Boilers', 'Waste-to-Energy Kilns']
  }
];

document.addEventListener('DOMContentLoaded', () => {
  initProductCatalog();
});

function initProductCatalog() {
  const catalogGrid = document.getElementById('pcrProductGrid');
  const filterBtns = document.querySelectorAll('.product-filter-btn');
  const productModal = document.getElementById('productSpecModal');

  if (!catalogGrid) return;

  function renderProducts(category = 'all') {
    const filtered = category === 'all' 
      ? pcrProducts 
      : pcrProducts.filter(p => p.category === category);

    catalogGrid.innerHTML = filtered.map(prod => `
      <div class="product-card">
        <a href="product-single.html" style="display: block; overflow: hidden; border-radius: var(--radius-sm);">
          <img src="${prod.image}" alt="${prod.name}" class="product-card-img">
        </a>
        <div class="product-badge-row">
          <span class="polymer-code">${prod.code}</span>
          <span class="grade-pill">${prod.grade}</span>
        </div>
        <h4><a href="product-single.html">${prod.name}</a></h4>
        <p>${prod.desc}</p>
        
        <div class="tech-specs-mini">
          <div><span class="spec-mini-k">MFI:</span> <span class="spec-mini-v">${prod.mfi.split(' ')[0]}</span></div>
          <div><span class="spec-mini-k">Purity:</span> <span class="spec-mini-v">${prod.purity}</span></div>
          <div><span class="spec-mini-k">Color:</span> <span class="spec-mini-v">${prod.color.split('/')[0]}</span></div>
          <div><span class="spec-mini-k">Density:</span> <span class="spec-mini-v">${prod.density}</span></div>
        </div>

        <div style="display: flex; gap: 8px; margin-top: auto;">
          <a href="product-single.html" class="btn btn-secondary btn-sm" style="flex: 1; text-align: center;">
            Full TDS Page
          </a>
          <button class="btn btn-primary btn-sm inquire-prod-btn" data-product-name="${prod.name}">
            Inquire Specs
          </button>
        </div>
      </div>
    `).join('');

    document.querySelectorAll('.view-specs-btn').forEach(btn => {
      btn.addEventListener('click', () => {
        const prodId = btn.getAttribute('data-product-id');
        openSpecsModal(prodId);
      });
    });

    document.querySelectorAll('.inquire-prod-btn').forEach(btn => {
      btn.addEventListener('click', () => {
        const prodName = btn.getAttribute('data-product-name');
        const consultModal = document.getElementById('consultationModal');
        if (consultModal) {
          consultModal.classList.add('open');
          document.body.style.overflow = 'hidden';
        }
      });
    });
  }

  filterBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      filterBtns.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      const cat = btn.getAttribute('data-category') || 'all';
      renderProducts(cat);
    });
  });

  function openSpecsModal(productId) {
    const prod = pcrProducts.find(p => p.id === productId);
    if (!prod || !productModal) return;

    const modalBody = productModal.querySelector('.modal-body-content');
    if (modalBody) {
      modalBody.innerHTML = `
        <div style="margin-bottom: 18px;">
          <span class="polymer-code">${prod.code}</span>
          <h3 style="margin-top: 8px; font-size: 1.5rem;">${prod.name}</h3>
          <p style="margin-top: 4px; font-size: 0.92rem; color: var(--text-muted);">${prod.desc}</p>
        </div>

        <h5 style="color: var(--accent-emerald); margin-bottom: 10px; text-transform: uppercase; font-size: 0.85rem; font-weight: 700;">Technical Specification (TDS Matrix)</h5>
        <div class="pipeline-specs-box" style="margin-bottom: 20px;">
          <div class="spec-list">
            <div class="spec-item"><span>Grade Classification</span><span>${prod.grade}</span></div>
            <div class="spec-item"><span>Melt Flow Index (MFI)</span><span>${prod.mfi}</span></div>
            <div class="spec-item"><span>Intrinsic Viscosity / MW</span><span>${prod.iv}</span></div>
            <div class="spec-item"><span>Specific Density</span><span>${prod.density}</span></div>
            <div class="spec-item"><span>Polymer Purity Score</span><span>${prod.purity}</span></div>
            <div class="spec-item"><span>Appearance / Color</span><span>${prod.color}</span></div>
          </div>
        </div>

        <h5 style="color: var(--accent-emerald); margin-bottom: 8px; text-transform: uppercase; font-size: 0.85rem; font-weight: 700;">Target Applications</h5>
        <div style="display: flex; flex-wrap: wrap; gap: 6px; margin-bottom: 24px;">
          ${prod.applications.map(app => `<span class="cert-pill" style="font-size: 0.8rem; padding: 4px 12px;">${app}</span>`).join('')}
        </div>

        <div style="display: flex; gap: 10px; flex-wrap: wrap;">
          <button class="btn btn-primary" onclick="document.getElementById('productSpecModal').classList.remove('open'); document.getElementById('consultationModal').classList.add('open');">
            Inquire with Polymer Sales Desk
          </button>
          <button class="btn btn-secondary" onclick="window.showToast('Technical Datasheet PDF (TDS) downloading...');">
            Download TDS (PDF)
          </button>
        </div>
      `;
    }

    productModal.classList.add('open');
    document.body.style.overflow = 'hidden';
  }

  renderProducts('all');
}
