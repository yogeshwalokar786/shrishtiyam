<!-- Interactive Consultation & RFP Modal -->
<div class="modal-backdrop" id="consultationModal">
  <div class="modal-card">
    <button class="modal-close-btn" aria-label="Close modal">✕</button>
    <div class="section-tag" style="margin-bottom: 12px;">Fast-Track Consultation</div>
    <h3 style="font-size: 1.55rem; margin-bottom: 6px;">Request EPR Audit & Material Proposal</h3>
    <p style="font-size: 0.9rem; color: var(--text-muted); margin-bottom: 22px;">
      Connect with our circular economy experts. Receive customized compliance roadmaps and PCR pricing within 4 hours.
    </p>

    <div id="modalAlert" style="display: none; padding: 12px 16px; border-radius: var(--radius-sm); margin-bottom: 16px; font-size: 0.88rem; font-weight: 600;"></div>

    <form id="rfpForm" method="POST" action="{{ route('consultation.submit') }}" onsubmit="handleConsultationSubmit(event, this)">
      @csrf

      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 16px;">
        <div class="form-group" style="margin-bottom: 0;">
          <label class="form-label">Your Name <span class="required-star">*</span></label>
          <input type="text" name="name" required placeholder="e.g. Alex Vance" class="form-control">
        </div>
        <div class="form-group" style="margin-bottom: 0;">
          <label class="form-label">Work Email <span class="required-star">*</span></label>
          <input type="email" name="email" required placeholder="alex@company.com" class="form-control">
        </div>
      </div>

      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 16px;">
        <div class="form-group" style="margin-bottom: 0;">
          <label class="form-label">Company / Brand <span class="required-star">*</span></label>
          <input type="text" name="company" required placeholder="e.g. Global Packaging Ltd" class="form-control">
        </div>
        <div class="form-group" style="margin-bottom: 0;">
          <label class="form-label">Primary Requirement <span class="required-star">*</span></label>
          <select name="requirement" class="form-control">
            <option value="EPR Statutory Compliance">EPR Statutory Compliance</option>
            <option value="Bulk PCR Granules Procurement">Bulk PCR Granules Procurement</option>
            <option value="Municipal MRF Cluster Deployment">Municipal MRF Cluster Deployment</option>
            <option value="RDF Alternative Fuel Supply">RDF Alternative Fuel Supply</option>
            <option value="Corporate Social Impact Partnership">Corporate Social Impact Partnership</option>
          </select>
        </div>
      </div>

      <div class="form-group" style="margin-bottom: 22px;">
        <label class="form-label">Annual Plastic Baseline / Projected Volume</label>
        <input type="text" name="projected_volume" placeholder="e.g. 2,500 MT / year" class="form-control">
      </div>

      <button type="submit" id="rfpSubmitBtn" class="btn btn-primary" style="width: 100%;">
        Submit Consultation Request
      </button>
    </form>
  </div>
</div>

<!-- Technical Spec & Datasheet Modal -->
<div class="modal-backdrop" id="productSpecModal">
  <div class="modal-card">
    <button class="modal-close-btn" onclick="document.getElementById('productSpecModal').classList.remove('open'); document.body.style.overflow='';">✕</button>
    <div class="modal-body-content">
      <!-- Dynamically populated by products.js -->
    </div>
  </div>
</div>

<script>
function handleConsultationSubmit(e, form) {
    e.preventDefault();
    const btn = document.getElementById('rfpSubmitBtn');
    const originalText = btn.textContent;
    btn.disabled = true;
    btn.textContent = 'Submitting...';

    const formData = new FormData(form);

    fetch(form.action, {
        method: 'POST',
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json'
        },
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        btn.disabled = false;
        btn.textContent = originalText;
        if (data.success) {
            form.reset();
            const alertBox = document.getElementById('modalAlert');
            alertBox.style.display = 'block';
            alertBox.style.background = 'rgba(16, 185, 129, 0.1)';
            alertBox.style.color = '#047857';
            alertBox.style.border = '1px solid rgba(16, 185, 129, 0.25)';
            alertBox.textContent = data.message || 'Consultation request registered!';

            if (window.showToast) {
                window.showToast(data.message);
            }

            setTimeout(() => {
                document.getElementById('consultationModal').classList.remove('open');
                document.body.style.overflow = '';
                alertBox.style.display = 'none';
            }, 2500);
        } else {
            alert(data.message || 'An error occurred. Please try again.');
        }
    })
    .catch(err => {
        btn.disabled = false;
        btn.textContent = originalText;
        // Fallback to standard form submission if fetch failed
        form.submit();
    });
}
</script>
