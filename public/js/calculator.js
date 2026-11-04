/**
 * SHRISTIYAM INTERACTIVE EPR & ESG CALCULATOR ENGINE
 * Multi-stream compliance, emission reduction, and socio-environmental impact model
 */

document.addEventListener('DOMContentLoaded', () => {
  initEprCalculator();
});

function initEprCalculator() {
  const volumeSlider = document.getElementById('volumeSlider');
  const volumeBadge = document.getElementById('volumeBadge');
  const wasteStreamSelect = document.getElementById('wasteStreamSelect');
  const streamBtns = document.querySelectorAll('.calc-stream-btn');
  const categoriesRow = document.getElementById('categoriesRow');

  const resultTargetEpr = document.getElementById('resultTargetEpr');
  const resultCo2Offset = document.getElementById('resultCo2Offset');
  const resultOilSaved = document.getElementById('resultOilSaved');
  const resultLandfillSaved = document.getElementById('resultLandfillSaved');
  const resultMaterialsRecovered = document.getElementById('resultMaterialsRecovered');
  const resultLivelihoods = document.getElementById('resultLivelihoods');
  const downloadReportBtn = document.getElementById('downloadReportBtn');

  if (!volumeSlider) return;

  let currentStream = 'plastic';
  let currentCategory = 'all';
  let currentVolume = parseFloat(volumeSlider.value) || 1200;

  // Stream-specific Category Definitions
  const streamCategories = {
    plastic: [
      {
        id: 'all',
        label: 'All Blended<br>Matrix',
        icon: '<rect x="3" y="3" width="18" height="18" rx="3"></rect><circle cx="8" cy="8" r="1.5" fill="currentColor"></circle><circle cx="16" cy="8" r="1.5" fill="currentColor"></circle><circle cx="8" cy="16" r="1.5" fill="currentColor"></circle><circle cx="16" cy="16" r="1.5" fill="currentColor"></circle>'
      },
      {
        id: 'rigid',
        label: 'Rigid<br>Plastic',
        icon: '<path d="M9 3h6v2H9z"></path><path d="M8 5h8a2 2 0 0 1 2 2v13a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2z"></path>'
      },
      {
        id: 'flexible',
        label: 'Flexible<br>Plastic',
        icon: '<path d="M6 3h12a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2z"></path><path d="M9 3v4a3 3 0 0 0 6 0V3"></path>'
      },
      {
        id: 'multi',
        label: 'Multilayer<br>Plastic',
        icon: '<polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline>'
      }
    ],
    ewaste: [
      {
        id: 'all',
        label: 'All Blended<br>Matrix',
        icon: '<rect x="3" y="3" width="18" height="18" rx="3"></rect><circle cx="8" cy="8" r="1.5" fill="currentColor"></circle><circle cx="16" cy="8" r="1.5" fill="currentColor"></circle><circle cx="8" cy="16" r="1.5" fill="currentColor"></circle><circle cx="16" cy="16" r="1.5" fill="currentColor"></circle>'
      },
      {
        id: 'consumer_it',
        label: 'Consumer IT &<br>Telecom',
        icon: '<rect x="2" y="3" width="20" height="14" rx="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line>'
      },
      {
        id: 'appliances',
        label: 'Large<br>Appliances',
        icon: '<rect x="4" y="2" width="16" height="20" rx="2"></rect><line x1="4" y1="10" x2="20" y2="10"></line>'
      },
      {
        id: 'devices',
        label: 'Small Medical &<br>Office Devices',
        icon: '<rect x="5" y="2" width="14" height="20" rx="3"></rect><circle cx="12" cy="17" r="1"></circle>'
      }
    ],
    battery: [
      {
        id: 'all',
        label: 'All Blended<br>Matrix',
        icon: '<rect x="3" y="3" width="18" height="18" rx="3"></rect><circle cx="8" cy="8" r="1.5" fill="currentColor"></circle><circle cx="16" cy="8" r="1.5" fill="currentColor"></circle><circle cx="8" cy="16" r="1.5" fill="currentColor"></circle><circle cx="16" cy="16" r="1.5" fill="currentColor"></circle>'
      },
      {
        id: 'lead_acid',
        label: 'Lead-Acid<br>Batteries',
        icon: '<rect x="2" y="6" width="18" height="12" rx="2"></rect><line x1="7" y1="12" x2="11" y2="12"></line>'
      },
      {
        id: 'lithium_ion',
        label: 'Lithium-Ion<br>EV Packs',
        icon: '<rect x="2" y="6" width="18" height="12" rx="2"></rect><line x1="22" y1="11" x2="22" y2="13"></line>'
      },
      {
        id: 'industrial_cells',
        label: 'Industrial &<br>UPS Cells',
        icon: '<circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline>'
      }
    ],
    oil: [
      {
        id: 'all',
        label: 'All Blended<br>Matrix',
        icon: '<rect x="3" y="3" width="18" height="18" rx="3"></rect><circle cx="8" cy="8" r="1.5" fill="currentColor"></circle><circle cx="16" cy="8" r="1.5" fill="currentColor"></circle><circle cx="8" cy="16" r="1.5" fill="currentColor"></circle><circle cx="16" cy="16" r="1.5" fill="currentColor"></circle>'
      },
      {
        id: 'engine_oil',
        label: 'Automotive<br>Engine Oil',
        icon: '<path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"></path>'
      },
      {
        id: 'hydraulic',
        label: 'Hydraulic &<br>Gear Lubricant',
        icon: '<path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"></path>'
      },
      {
        id: 'transformer',
        label: 'Transformer &<br>Turbine Oil',
        icon: '<path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"></path>'
      }
    ],
    tyre: [
      {
        id: 'all',
        label: 'All Blended<br>Matrix',
        icon: '<rect x="3" y="3" width="18" height="18" rx="3"></rect><circle cx="8" cy="8" r="1.5" fill="currentColor"></circle><circle cx="16" cy="8" r="1.5" fill="currentColor"></circle><circle cx="8" cy="16" r="1.5" fill="currentColor"></circle><circle cx="16" cy="16" r="1.5" fill="currentColor"></circle>'
      },
      {
        id: 'commercial',
        label: 'Truck & Bus<br>(CV / Heavy)',
        icon: '<circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="4"></circle>'
      },
      {
        id: 'passenger',
        label: 'Passenger Car<br>(PCR)',
        icon: '<circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="4"></circle>'
      },
      {
        id: 'two_wheeler',
        label: 'Two / Three<br>Wheeler Tyres',
        icon: '<circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="4"></circle>'
      }
    ],
    industrial: [
      {
        id: 'all',
        label: 'All Blended<br>Matrix',
        icon: '<rect x="3" y="3" width="18" height="18" rx="3"></rect><circle cx="8" cy="8" r="1.5" fill="currentColor"></circle><circle cx="16" cy="8" r="1.5" fill="currentColor"></circle><circle cx="8" cy="16" r="1.5" fill="currentColor"></circle><circle cx="16" cy="16" r="1.5" fill="currentColor"></circle>'
      },
      {
        id: 'hazardous',
        label: 'Hazardous Sludge<br>& Chemicals',
        icon: '<path d="M2 20h20M4 20V8l4 4V8l4 4V4h8v16"></path>'
      },
      {
        id: 'non_haz',
        label: 'Non-Hazardous<br>Solid Scrap',
        icon: '<path d="M2 20h20M4 20V8l4 4V8l4 4V4h8v16"></path>'
      },
      {
        id: 'coprocess',
        label: 'Refuse Derived<br>Fuel (RDF)',
        icon: '<polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>'
      }
    ],
    agricultural: [
      {
        id: 'all',
        label: 'All Blended<br>Matrix',
        icon: '<rect x="3" y="3" width="18" height="18" rx="3"></rect><circle cx="8" cy="8" r="1.5" fill="currentColor"></circle><circle cx="16" cy="8" r="1.5" fill="currentColor"></circle><circle cx="8" cy="16" r="1.5" fill="currentColor"></circle><circle cx="16" cy="16" r="1.5" fill="currentColor"></circle>'
      },
      {
        id: 'paddy_straw',
        label: 'Paddy Straw &<br>Crop Stubble',
        icon: '<path d="M12 2v20M7 8a4 4 0 0 1 5-3 4 4 0 0 1 5 3M5 14a5 5 0 0 1 7-4 5 5 0 0 1 7 4"></path>'
      },
      {
        id: 'biomass',
        label: 'Agro Biomass<br>Pellet / Briquette',
        icon: '<path d="M12 2v20M7 8a4 4 0 0 1 5-3 4 4 0 0 1 5 3M5 14a5 5 0 0 1 7-4 5 5 0 0 1 7 4"></path>'
      },
      {
        id: 'agro_processing',
        label: 'Food & Grain<br>Processing Waste',
        icon: '<path d="M12 2v20M7 8a4 4 0 0 1 5-3 4 4 0 0 1 5 3M5 14a5 5 0 0 1 7-4 5 5 0 0 1 7 4"></path>'
      }
    ]
  };

  // Render Category Chips
  function renderCategories(streamKey) {
    if (!categoriesRow) return;
    const cats = streamCategories[streamKey] || streamCategories.plastic;
    categoriesRow.innerHTML = '';

    cats.forEach((cat, idx) => {
      const btn = document.createElement('button');
      btn.type = 'button';
      btn.className = `calc-cat-card ${cat.id === currentCategory || (idx === 0 && !cats.some(c => c.id === currentCategory)) ? 'active' : ''}`;
      btn.setAttribute('data-cat', cat.id);
      btn.innerHTML = `
        <div class="calc-cat-icon">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            ${cat.icon}
          </svg>
        </div>
        <span class="calc-cat-text">${cat.label}</span>
      `;

      btn.addEventListener('click', () => {
        categoriesRow.querySelectorAll('.calc-cat-card').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        currentCategory = cat.id;
        calculateAndRender();
      });

      categoriesRow.appendChild(btn);
    });

    if (!cats.some(c => c.id === currentCategory)) {
      currentCategory = cats[0].id;
    }
  }

  // Set active stream in top header and dropdown
  function setStream(streamKey) {
    currentStream = streamKey;
    if (wasteStreamSelect && wasteStreamSelect.value !== streamKey) {
      wasteStreamSelect.value = streamKey;
    }

    streamBtns.forEach(btn => {
      if (btn.getAttribute('data-stream') === streamKey) {
        btn.classList.add('active');
      } else {
        btn.classList.remove('active');
      }
    });

    renderCategories(streamKey);
    calculateAndRender();
  }

  // Bind top stream buttons
  streamBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      const stream = btn.getAttribute('data-stream');
      setStream(stream);
    });
  });

  // Bind dropdown select
  if (wasteStreamSelect) {
    wasteStreamSelect.addEventListener('change', (e) => {
      setStream(e.target.value);
    });
  }

  // Bind category cards click delegation for initially rendered chips
  const initialCategoryCards = categoriesRow ? categoriesRow.querySelectorAll('.calc-cat-card') : [];
  initialCategoryCards.forEach(btn => {
    btn.addEventListener('click', () => {
      categoriesRow.querySelectorAll('.calc-cat-card').forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      currentCategory = btn.getAttribute('data-cat') || 'all';
      calculateAndRender();
    });
  });

  // Slider Input
  volumeSlider.addEventListener('input', (e) => {
    currentVolume = parseFloat(e.target.value) || 0;
    if (volumeBadge) {
      volumeBadge.textContent = currentVolume.toLocaleString();
    }
    calculateAndRender();
  });

  function calculateAndRender() {
    // Baseline Multipliers for Plastic
    let eprRatio = 0.85;
    let co2Factor = 1.68;
    let oilFactor = 16.3;
    let landfillFactor = 2.4;
    let materialRecoveryRatio = 1.6;
    let workerDaysFactor = 8.5;

    // Stream-specific variance
    if (currentStream === 'ewaste') {
      eprRatio = 0.80;
      co2Factor = 1.95;
      oilFactor = 12.4;
      landfillFactor = 2.1;
      materialRecoveryRatio = 1.45;
      workerDaysFactor = 9.2;
    } else if (currentStream === 'battery') {
      eprRatio = 0.90;
      co2Factor = 2.15;
      oilFactor = 14.1;
      landfillFactor = 1.8;
      materialRecoveryRatio = 1.7;
      workerDaysFactor = 7.8;
    } else if (currentStream === 'oil') {
      eprRatio = 0.88;
      co2Factor = 1.75;
      oilFactor = 24.5;
      landfillFactor = 0.9;
      materialRecoveryRatio = 1.5;
      workerDaysFactor = 6.4;
    } else if (currentStream === 'tyre') {
      eprRatio = 0.82;
      co2Factor = 1.60;
      oilFactor = 18.2;
      landfillFactor = 3.2;
      materialRecoveryRatio = 1.55;
      workerDaysFactor = 8.1;
    } else if (currentStream === 'industrial') {
      eprRatio = 0.85;
      co2Factor = 1.55;
      oilFactor = 15.0;
      landfillFactor = 2.6;
      materialRecoveryRatio = 1.6;
      workerDaysFactor = 8.0;
    } else if (currentStream === 'agricultural') {
      eprRatio = 0.80;
      co2Factor = 1.40;
      oilFactor = 11.5;
      landfillFactor = 2.8;
      materialRecoveryRatio = 1.65;
      workerDaysFactor = 10.2;
    }

    // Category modifiers
    if (currentCategory === 'rigid' || currentCategory === 'lead_acid' || currentCategory === 'consumer_it') {
      eprRatio = Math.min(1.0, eprRatio * 1.05);
      co2Factor *= 1.1;
    } else if (currentCategory === 'flexible' || currentCategory === 'lithium_ion' || currentCategory === 'appliances') {
      eprRatio *= 0.96;
      co2Factor *= 0.95;
    } else if (currentCategory === 'multi' || currentCategory === 'coprocess') {
      eprRatio *= 0.92;
      co2Factor *= 0.90;
    }

    const targetEpr = currentVolume * eprRatio;
    const co2Offset = targetEpr * co2Factor;
    const oilSaved = targetEpr * oilFactor;
    const landfillSaved = targetEpr * landfillFactor;
    const materialsRecovered = currentVolume * materialRecoveryRatio;
    const livelihoodDays = targetEpr * workerDaysFactor;

    if (resultTargetEpr) resultTargetEpr.textContent = `${Math.round(targetEpr).toLocaleString()} MT`;
    if (resultCo2Offset) resultCo2Offset.textContent = `${Math.round(co2Offset).toLocaleString()} MT CO₂e`;
    if (resultOilSaved) resultOilSaved.textContent = `${Math.round(oilSaved).toLocaleString()} Barrels`;
    if (resultLandfillSaved) resultLandfillSaved.textContent = `${Math.round(landfillSaved).toLocaleString()} m³`;
    if (resultMaterialsRecovered) resultMaterialsRecovered.textContent = `${Math.round(materialsRecovered).toLocaleString()} MT`;
    if (resultLivelihoods) resultLivelihoods.textContent = `${Math.round(livelihoodDays).toLocaleString()} Work Days`;
  }

  // Initial calculation
  calculateAndRender();

  // Download / Print Assessment Summary
  if (downloadReportBtn) {
    downloadReportBtn.addEventListener('click', (e) => {
      e.preventDefault();
      generatePrintAssessment(currentVolume, currentStream, currentCategory);
    });
  }
}

function generatePrintAssessment(volume, stream, category) {
  const streamLabels = {
    plastic: 'Plastic Waste',
    ewaste: 'E-waste',
    battery: 'Battery Waste',
    oil: 'Used Oil',
    tyre: 'Waste Tyres',
    industrial: 'Industrial Waste',
    agricultural: 'Agricultural Waste'
  };

  const streamName = streamLabels[stream] || 'Plastic Waste';

  const eprTarget = Math.round(volume * 0.85);
  const co2 = Math.round(eprTarget * 1.68);
  const oil = Math.round(eprTarget * 16.3);
  const landfill = Math.round(eprTarget * 2.4);
  const materials = Math.round(volume * 1.6);
  const livelihoods = Math.round(eprTarget * 8.5);

  const assessmentHtml = `
    <!DOCTYPE html>
    <html>
      <head>
        <title>SHRISTIYAM - EPR & ESG Impact Assessment Report</title>
        <style>
          body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; padding: 40px; color: #0f172a; line-height: 1.6; }
          .header { border-bottom: 2px solid #37704b; padding-bottom: 16px; margin-bottom: 24px; display: flex; justify-content: space-between; align-items: flex-end; }
          .header h1 { color: #37704b; margin: 0; font-size: 24px; }
          .meta-info { font-size: 13px; color: #64748b; margin-bottom: 24px; }
          .summary-card { background: #f0fdf4; border: 1px solid #bbf7d0; border-radius: 10px; padding: 18px 24px; margin-bottom: 24px; }
          .summary-card h2 { color: #37704b; margin: 0 0 6px; font-size: 18px; }
          .meta-table { width: 100%; border-collapse: collapse; margin: 20px 0; }
          .meta-table td, .meta-table th { padding: 12px 14px; border: 1px solid #e2e8f0; text-align: left; font-size: 14px; }
          .meta-table th { background-color: #f8fafc; font-weight: 600; color: #334155; }
          .highlight { font-size: 1.15rem; color: #37704b; font-weight: 700; }
          .footer { margin-top: 40px; font-size: 12px; color: #94a3b8; border-top: 1px solid #e2e8f0; padding-top: 16px; text-align: center; }
        </style>
      </head>
      <body>
        <div class="header">
          <div>
            <h1>SHRISTIYAM CIRCULAR SOLUTIONS</h1>
            <p style="margin: 4px 0 0; color: #475569; font-size: 14px;">Statutory EPR Compliance & ESG Impact Assessment Summary</p>
          </div>
          <div style="text-align: right; font-size: 12px; color: #64748b;">
            Aligned with CPCB & MoEFCC Guidelines
          </div>
        </div>

        <div class="meta-info">
          <strong>Assessment Date:</strong> ${new Date().toLocaleDateString('en-GB', { day: 'numeric', month: 'short', year: 'numeric' })} | 
          <strong>Selected Waste Stream:</strong> ${streamName} | 
          <strong>Matrix Category:</strong> ${category.toUpperCase()}
        </div>

        <div class="summary-card">
          <h2>Annual Packaging Baseline Volume: ${volume.toLocaleString()} MT / year</h2>
          <p style="margin: 0; color: #37704b; font-size: 13px;">Calculations derived from certified circular lifecycle models, verified emission factors, and statutory fulfillment ratios.</p>
        </div>
        
        <table class="meta-table">
          <thead>
            <tr>
              <th>Environmental / Statutory Metric</th>
              <th>Estimated Fulfillment Target</th>
              <th>Standard Regulatory Basis</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><strong>Mandatory EPR Credit Target</strong></td>
              <td><span class="highlight">${eprTarget.toLocaleString()} MT</span></td>
              <td>CPCB Statutory Obligation Schedule</td>
            </tr>
            <tr>
              <td><strong>Projected CO₂ Reduction</strong></td>
              <td><span class="highlight">${co2.toLocaleString()} MT CO₂e</span></td>
              <td>Verified Lifecycle Emission Factor Model</td>
            </tr>
            <tr>
              <td><strong>Crude Oil Conserved</strong></td>
              <td><span class="highlight">${oil.toLocaleString()} Barrels</span></td>
              <td>Primary Polymer Feedstock Abatement</td>
            </tr>
            <tr>
              <td><strong>Landfill Space Saved</strong></td>
              <td><span class="highlight">${landfill.toLocaleString()} m³</span></td>
              <td>Circular Waste Diversion Standard</td>
            </tr>
            <tr>
              <td><strong>Materials Recovered</strong></td>
              <td><span class="highlight">${materials.toLocaleString()} MT</span></td>
              <td>Mechanical & Chemical Recovery Yield</td>
            </tr>
            <tr>
              <td><strong>Dignified Livelihood Impact</strong></td>
              <td><span class="highlight">${livelihoods.toLocaleString()} Work Days</span></td>
              <td>Safai Saathi Social Upliftment Factor</td>
            </tr>
          </tbody>
        </table>
        
        <p style="font-size: 13px; color: #475569; margin-top: 24px;">
          <em>Notice: This document provides official baseline projections for compliance planning and ESG disclosure. Audit verification requires certified EPR portal credit locking.</em>
        </p>
        
        <div class="footer">
          <p>© ${new Date().getFullYear()} SHRISTIYAM Waste Management & Circular Solutions. All Rights Reserved.</p>
        </div>
      </body>
    </html>
  `;

  const printWindow = window.open('', '_blank', 'width=850,height=750');
  if (printWindow) {
    printWindow.document.write(assessmentHtml);
    printWindow.document.close();
    printWindow.focus();
    setTimeout(() => {
      printWindow.print();
    }, 300);
  }
}
