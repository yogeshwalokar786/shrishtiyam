@extends('layouts.site')

@section('title', 'Careers & Culture | ' . setting('site_name', 'SHRISTIYAM'))
@section('meta_description', 'Join Shristiyam Compliance Solutions. We are hiring across EPR compliance, industrial waste aggregation, alternative biomass fuels, and supply chain logistics.')

@push('styles')
<style>
  .career-hero-btn,
  .career-hero-btn:visited,
  .career-hero-btn:link {
    background: #ffffff !important;
    background-color: #ffffff !important;
    color: #05261b !important;
    border: 1.5px solid #ffffff !important;
    font-weight: 700 !important;
    border-radius: var(--radius-full, 9999px) !important;
    padding: 13px 28px !important;
    transition: all 0.25s ease !important;
    box-shadow: 0 4px 14px rgba(0, 0, 0, 0.15) !important;
    text-decoration: none !important;
    display: inline-flex !important;
    align-items: center !important;
    justify-content: center !important;
  }
  .career-hero-btn:hover,
  .career-hero-btn:focus {
    background: #f1f5f9 !important;
    background-color: #f1f5f9 !important;
    color: #37704b !important;
    border-color: #f1f5f9 !important;
    transform: translateY(-2px) !important;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.25) !important;
  }
  .career-hero-btn * {
    color: #05261b !important;
  }
  .career-hero-btn:hover * {
    color: #37704b !important;
  }

  .career-talent-btn,
  .career-talent-btn:visited,
  .career-talent-btn:link {
    background: #ffffff !important;
    background-color: #ffffff !important;
    color: #05261b !important;
    border: 1.5px solid #ffffff !important;
    font-weight: 700 !important;
    white-space: nowrap !important;
    padding: 12px 28px !important;
    border-radius: var(--radius-full, 9999px) !important;
    transition: all 0.25s ease !important;
    box-shadow: 0 4px 14px rgba(0, 0, 0, 0.2) !important;
    text-decoration: none !important;
    display: inline-flex !important;
    align-items: center !important;
    gap: 8px !important;
  }
  .career-talent-btn:hover,
  .career-talent-btn:focus {
    background: #669a2b !important;
    background-color: #669a2b !important;
    color: #ffffff !important;
    border-color: #669a2b !important;
    transform: translateY(-2px) !important;
    box-shadow: 0 8px 22px rgba(102, 154, 43, 0.4) !important;
  }
  .career-talent-btn * {
    color: #05261b !important;
  }
  .career-talent-btn:hover * {
    color: #ffffff !important;
  }
</style>
@endpush

@section('content')
  <!-- Careers Hero Header (Dark Cinema Aesthetics matching Site Identity) -->
  <section class="section" style="background: radial-gradient(circle at top right, rgba(46, 115, 157, 0.22) 0%, rgba(5, 38, 27, 0.98) 60%), #05261b; color: #ffffff; padding: 150px 0 80px 0; position: relative; overflow: hidden;">
    <div class="container">
      <div style="max-width: 820px;">
        <div style="display: inline-flex; align-items: center; gap: 8px; padding: 6px 16px; background: rgba(102, 154, 43, 0.16); border: 1px solid rgba(102, 154, 43, 0.4); border-radius: 9999px; font-size: 0.8rem; font-weight: 700; color: #669a2b; text-transform: uppercase; letter-spacing: 0.08em; margin-bottom: 20px;">
          {{ setting('career_hero_badge', 'Careers at ' . setting('site_name', 'SHRISTIYAM')) }}
        </div>
        <h1 style="font-size: clamp(2.2rem, 4.2vw, 3.4rem); font-weight: 800; line-height: 1.15; color: #ffffff; margin-bottom: 20px; font-family: var(--font-heading); letter-spacing: -0.02em;">
          {!! setting('career_hero_title', 'Powering India\'s Circular Economy Through <span style="background: linear-gradient(135deg, #37704b 0%, #669a2b 50%, #3b6c83 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Purpose-Driven Careers</span>') !!}
        </h1>
        <p style="font-size: 1.1rem; line-height: 1.7; color: rgba(255, 255, 255, 0.82); margin-bottom: 32px; max-width: 720px;">
          {{ setting('career_hero_subtitle', 'We operate at the critical intersection of statutory compliance, environmental stewardship, and industrial alternative fuels. Join our mission to turn uncollected waste streams into valuable circular assets.') }}
        </p>
        <div style="display: flex; gap: 14px; flex-wrap: wrap;">
          <a href="#open-roles" class="btn btn-primary" style="background: #669a2b; border-color: #669a2b;">Explore Opportunities &darr;</a>
          <a href="#apply-form" 
             class="btn career-hero-btn" 
             style="background: #ffffff !important; background-color: #ffffff !important; color: #05261b !important; border: 1.5px solid #ffffff !important; padding: 13px 28px !important; font-weight: 700 !important; text-decoration: none !important; border-radius: var(--radius-full, 9999px) !important; transition: all 0.25s ease !important; box-shadow: 0 4px 14px rgba(0, 0, 0, 0.15) !important; display: inline-flex !important; align-items: center !important;"
             onmouseover="this.style.background='#f1f5f9'; this.style.backgroundColor='#f1f5f9'; this.style.color='#37704b'; this.style.borderColor='#f1f5f9';"
             onmouseout="this.style.background='#ffffff'; this.style.backgroundColor='#ffffff'; this.style.color='#05261b'; this.style.borderColor='#ffffff';">
            <span style="color: #05261b !important; font-weight: 700 !important; text-decoration: none;">Submit Resume Directly &darr;</span>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- Open Departments & Core Roles -->
  <section class="section" id="open-roles" style="background: #ffffff; padding: 80px 0 50px 0;">
    <div class="container">
      <div class="section-header" style="text-align: left; max-width: 760px; margin-bottom: 48px;">
        <span class="section-tag" style="background: rgba(102, 154, 43, 0.1); color: #37704b; border-color: rgba(102, 154, 43, 0.25);">Work With Purpose</span>
        <h2 style="font-size: 2.2rem; font-weight: 800; color: #1e293b; margin-top: 10px; margin-bottom: 12px; font-family: var(--font-heading);">
          {{ setting('career_roles_heading', 'Key Operational Pillars & Open Roles') }}
        </h2>
        <p style="font-size: 1.05rem; color: #64748b; line-height: 1.6;">
          {{ setting('career_roles_subtext', 'Whether you are a seasoned environmental auditor, an agile supply chain manager, or an industrial fuel technician, your contribution drives real measurable impact. Select a role below or submit your resume directly.') }}
        </p>
      </div>

      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 24px;">
        @forelse($jobs as $job)
          <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 16px; padding: 32px; display: flex; flex-direction: column; justify-content: space-between; transition: transform 0.2s, box-shadow 0.2s;">
            <div>
              <div style="width: 44px; height: 44px; border-radius: 10px; background: rgba(102, 154, 43, 0.14); display: flex; align-items: center; justify-content: center; color: #669a2b; margin-bottom: 20px;">
                @if($job->icon_type === 'flame')
                  <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"></path></svg>
                @elseif($job->icon_type === 'truck')
                  <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                @elseif($job->icon_type === 'leaf')
                  <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z"></path><path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12"></path></svg>
                @elseif($job->icon_type === 'briefcase')
                  <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>
                @else
                  <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                @endif
              </div>
              <h3 style="font-size: 1.22rem; font-weight: 700; color: #0f172a; margin-bottom: 6px;">{{ $job->title }}</h3>
              @if($job->department)
                <div style="font-size: 0.8rem; font-weight: 700; color: #37704b; margin-bottom: 10px; text-transform: uppercase; letter-spacing: 0.04em;">
                  {{ $job->department }}
                </div>
              @endif
              <p style="font-size: 0.92rem; color: #64748b; line-height: 1.6; margin-bottom: 16px;">
                {{ $job->overview }}
              </p>
              <div style="margin-bottom: 20px; display: flex; flex-wrap: wrap; gap: 8px;">
                <span style="font-size: 0.8rem; font-weight: 700; color: #669a2b; text-transform: uppercase; letter-spacing: 0.05em;">
                  {{ $job->badge_text ?? ($job->location . ' • ' . $job->employment_type) }}
                </span>
                @if($job->experience)
                  <span style="font-size: 0.76rem; font-weight: 600; color: #64748b; background: #e2e8f0; padding: 2px 8px; border-radius: 4px;">
                    {{ $job->experience }}
                  </span>
                @endif
              </div>
            </div>
            <div>
              <button type="button" onclick="applyForRole('{{ addslashes($job->title) }}')" class="btn btn-secondary" style="width: 100%; font-size: 0.88rem; padding: 9px 16px; border-color: #cbd5e1; color: #0f172a; font-weight: 600; background: #ffffff;">
                Apply for this Role ↓
              </button>
            </div>
          </div>
        @empty
          <div style="grid-column: 1 / -1; padding: 48px 24px; text-align: center; background: #f8fafc; border: 1px dashed #cbd5e1; border-radius: 16px;">
            <p style="color: #64748b; font-size: 1rem; margin-bottom: 16px;">No specific open positions currently listed. We always welcome proactive applications!</p>
            <a href="#apply-form" class="btn btn-primary" style="background: #669a2b; border-color: #669a2b;">Submit Your Resume Directly ↓</a>
          </div>
        @endforelse
      </div>
    </div>
  </section>

  <!-- Job Application & Resume Submission Form Section -->
  <section class="section" id="apply-form" style="background: #f8fafc; padding: 40px 0 100px 0;">
    <div class="container">
      <div style="max-width: 900px; margin: 0 auto;">
        
        <!-- Flash Success Notification -->
        @if(session('success'))
          <div style="margin-bottom: 30px; padding: 20px 24px; border-radius: 14px; background: rgba(16, 185, 129, 0.1); border: 1.5px solid rgba(16, 185, 129, 0.35); color: #065f46; display: flex; align-items: flex-start; gap: 14px; box-shadow: 0 4px 12px rgba(16, 185, 129, 0.08);">
            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#059669" stroke-width="2.5" style="flex-shrink: 0; margin-top: 2px;"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
            <div>
              <strong style="display: block; font-size: 1.05rem; margin-bottom: 4px; color: #047857;">Application Received!</strong>
              <div style="font-size: 0.94rem; line-height: 1.5;">{{ session('success') }}</div>
            </div>
          </div>
        @endif

        <!-- Validation Errors Notification -->
        @if($errors->any())
          <div style="margin-bottom: 30px; padding: 20px 24px; border-radius: 14px; background: rgba(239, 68, 68, 0.08); border: 1.5px solid rgba(239, 68, 68, 0.3); color: #991b1b; box-shadow: 0 4px 12px rgba(239, 68, 68, 0.06);">
            <strong style="display: block; font-size: 1rem; margin-bottom: 6px; font-weight: 700;">Please correct the highlighted fields:</strong>
            <ul style="margin: 0; padding-left: 20px; font-size: 0.92rem; line-height: 1.6;">
              @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <!-- Main Form Card -->
        <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 20px; padding: clamp(28px, 5vw, 48px); box-shadow: 0 20px 40px -15px rgba(15, 23, 42, 0.06);">
          <div style="margin-bottom: 32px; border-bottom: 1px solid #f1f5f9; padding-bottom: 24px;">
            <div style="display: inline-flex; align-items: center; gap: 8px; padding: 4px 12px; background: rgba(102, 154, 43, 0.1); border-radius: 6px; font-size: 0.78rem; font-weight: 700; color: #37704b; text-transform: uppercase; letter-spacing: 0.06em; margin-bottom: 10px;">
              Direct Talent Portal
            </div>
            <h2 style="font-size: clamp(1.6rem, 3vw, 2.2rem); font-weight: 800; color: #0f172a; margin-bottom: 8px; font-family: var(--font-heading);">
              Submit Your Resume &amp; Profile
            </h2>
            <p style="font-size: 0.96rem; color: #64748b; margin: 0; line-height: 1.6;">
              Looking to build a future in environmental compliance and sustainable industry? Complete this form and attach your CV. Our recruitment panel reviews every candidate submission.
            </p>
          </div>

          <form action="{{ route('careers.apply') }}" method="POST" enctype="multipart/form-data" id="careerApplicationForm">
            @csrf

            <!-- Name and Email Row -->
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 20px; margin-bottom: 20px;">
              <div class="form-group" style="margin-bottom: 0;">
                <label class="form-label" style="font-size: 0.88rem; font-weight: 600; color: #334155; margin-bottom: 8px; display: block;">
                  Full Name <span style="color: #ef4444;">*</span>
                </label>
                <input type="text" name="name" value="{{ old('name') }}" required placeholder="e.g. John Doe" class="form-control" style="width: 100%; padding: 12px 14px; border-radius: 10px; border: 1px solid #cbd5e1; font-size: 0.92rem;">
              </div>

              <div class="form-group" style="margin-bottom: 0;">
                <label class="form-label" style="font-size: 0.88rem; font-weight: 600; color: #334155; margin-bottom: 8px; display: block;">
                  Email Address <span style="color: #ef4444;">*</span>
                </label>
                <input type="email" name="email" value="{{ old('email') }}" required placeholder="e.g. john.doe@example.com" class="form-control" style="width: 100%; padding: 12px 14px; border-radius: 10px; border: 1px solid #cbd5e1; font-size: 0.92rem;">
              </div>
            </div>

            <!-- Phone and Role Row -->
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 20px; margin-bottom: 20px;">
              <div class="form-group" style="margin-bottom: 0;">
                <label class="form-label" style="font-size: 0.88rem; font-weight: 600; color: #334155; margin-bottom: 8px; display: block;">
                  Phone / WhatsApp Number <span style="color: #ef4444;">*</span>
                </label>
                <input type="tel" name="phone" value="{{ old('phone') }}" required placeholder="e.g. +91 98765 43210" class="form-control" style="width: 100%; padding: 12px 14px; border-radius: 10px; border: 1px solid #cbd5e1; font-size: 0.92rem;">
              </div>

              <div class="form-group" style="margin-bottom: 0;">
                <label class="form-label" style="font-size: 0.88rem; font-weight: 600; color: #334155; margin-bottom: 8px; display: block;">
                  Position / Area of Interest <span style="color: #ef4444;">*</span>
                </label>
                <select name="position" id="positionSelect" required class="form-control" style="width: 100%; padding: 12px 14px; border-radius: 10px; border: 1px solid #cbd5e1; font-size: 0.92rem; background-color: #ffffff;">
                  <option value="" disabled {{ old('position') ? '' : 'selected' }}>Select a Role...</option>
                  @if(isset($jobs) && count($jobs) > 0)
                    @foreach($jobs as $job)
                      <option value="{{ $job->title }}" {{ old('position') === $job->title ? 'selected' : '' }}>
                        {{ $job->title }} ({{ $job->location ?? 'Headquarters / Plant' }})
                      </option>
                    @endforeach
                  @else
                    <option value="EPR & Compliance Advisory" {{ old('position') === 'EPR & Compliance Advisory' ? 'selected' : '' }}>EPR & Compliance Advisory</option>
                    <option value="BioEnergy & Alternative Fuels" {{ old('position') === 'BioEnergy & Alternative Fuels' ? 'selected' : '' }}>BioEnergy & Alternative Fuels</option>
                    <option value="Supply Chain & MRF Management" {{ old('position') === 'Supply Chain & MRF Management' ? 'selected' : '' }}>Supply Chain & MRF Management</option>
                  @endif
                  <option value="General Application / Other" {{ old('position') === 'General Application / Other' ? 'selected' : '' }}>General Application / Other Opportunities</option>
                </select>
              </div>
            </div>

            <!-- Experience and Current Role Row -->
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 20px; margin-bottom: 24px;">
              <div class="form-group" style="margin-bottom: 0;">
                <label class="form-label" style="font-size: 0.88rem; font-weight: 600; color: #334155; margin-bottom: 8px; display: block;">
                  Total Relevant Experience
                </label>
                <select name="experience" class="form-control" style="width: 100%; padding: 12px 14px; border-radius: 10px; border: 1px solid #cbd5e1; font-size: 0.92rem; background-color: #ffffff;">
                  <option value="Fresher / Entry Level" {{ old('experience') === 'Fresher / Entry Level' ? 'selected' : '' }}>Fresher / Entry Level (&lt; 1 Year)</option>
                  <option value="1 - 3 Years" {{ old('experience') === '1 - 3 Years' ? 'selected' : '' }}>1 - 3 Years</option>
                  <option value="3 - 5 Years" {{ old('experience') === '3 - 5 Years' ? 'selected' : '' }}>3 - 5 Years</option>
                  <option value="5 - 8 Years" {{ old('experience') === '5 - 8 Years' ? 'selected' : '' }}>5 - 8 Years</option>
                  <option value="8+ Years (Senior / Leadership)" {{ old('experience') === '8+ Years (Senior / Leadership)' ? 'selected' : '' }}>8+ Years (Senior / Leadership)</option>
                </select>
              </div>

              <div class="form-group" style="margin-bottom: 0;">
                <label class="form-label" style="font-size: 0.88rem; font-weight: 600; color: #334155; margin-bottom: 8px; display: block;">
                  Current Designation / Employer <span style="font-size: 0.78rem; color: #94a3b8; font-weight: normal;">(Optional)</span>
                </label>
                <input type="text" name="current_role" value="{{ old('current_role') }}" placeholder="e.g. Environmental Engineer at XYZ Corp" class="form-control" style="width: 100%; padding: 12px 14px; border-radius: 10px; border: 1px solid #cbd5e1; font-size: 0.92rem;">
              </div>
            </div>

            <!-- Resume / CV Upload Box -->
            <div style="margin-bottom: 24px;">
              <label class="form-label" style="font-size: 0.88rem; font-weight: 600; color: #334155; margin-bottom: 8px; display: block;">
                Upload CV / Resume <span style="color: #ef4444;">*</span> <span style="font-size: 0.78rem; color: #64748b; font-weight: normal;">(PDF, DOC, or DOCX up to 10MB)</span>
              </label>
              
              <div style="border: 2px dashed #cbd5e1; border-radius: 12px; padding: 24px 20px; text-align: center; background: #f8fafc; transition: border-color 0.2s; position: relative;">
                <input type="file" name="resume" id="resumeFileInput" accept=".pdf,.doc,.docx,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" required onchange="handleResumeSelected(this)" style="position: absolute; inset: 0; width: 100%; height: 100%; opacity: 0; cursor: pointer; z-index: 10;">
                <div style="pointer-events: none;">
                  <div style="width: 48px; height: 48px; border-radius: 50%; background: rgba(102, 154, 43, 0.12); color: #669a2b; display: inline-flex; align-items: center; justify-content: center; margin-bottom: 10px;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" y1="3" x2="12" y2="15"></line></svg>
                  </div>
                  <div style="font-size: 0.95rem; font-weight: 700; color: #0f172a; margin-bottom: 4px;">
                    Click or Drag to Upload Resume
                  </div>
                  <div style="font-size: 0.82rem; color: #64748b;">
                    Supported formats: PDF, DOC, DOCX &bull; Maximum file size: 10 MB
                  </div>
                  <div id="selectedResumeInfo" style="display: none; margin-top: 12px; padding: 8px 14px; background: rgba(102, 154, 43, 0.14); border: 1px solid rgba(102, 154, 43, 0.3); border-radius: 8px; font-size: 0.86rem; color: #22543d; font-weight: 600;"></div>
                </div>
              </div>
            </div>

            <!-- Cover Note / Message -->
            <div class="form-group" style="margin-bottom: 28px;">
              <label class="form-label" style="font-size: 0.88rem; font-weight: 600; color: #334155; margin-bottom: 8px; display: block;">
                Brief Introduction / Cover Note <span style="font-size: 0.78rem; color: #94a3b8; font-weight: normal;">(Optional)</span>
              </label>
              <textarea name="message" rows="4" placeholder="Briefly describe your core expertise, key achievements, notice period, or why you want to join Shristiyam..." class="form-control" style="width: 100%; padding: 12px 14px; border-radius: 10px; border: 1px solid #cbd5e1; font-size: 0.92rem; line-height: 1.5;">{{ old('message') }}</textarea>
            </div>

            <!-- Submit Button -->
            <div style="display: flex; flex-direction: column; gap: 16px;">
              <button type="submit" id="submitResumeBtn" class="btn btn-primary" style="background: #669a2b; border-color: #669a2b; padding: 15px 32px; font-size: 1.02rem; font-weight: 700; border-radius: 10px; display: inline-flex; align-items: center; justify-content: center; gap: 10px; cursor: pointer; transition: all 0.2s;">
                <span>Submit Application &amp; Resume</span>
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
              </button>

              <div style="text-align: center; font-size: 0.88rem; color: #64748b;">
                Prefer emailing directly? You can also send your resume to 
                <a href="mailto:{{ setting('contact_email', 'admin@shristiyam.com') }}?subject=Career%20Application%20at%20Shristiyam" style="color: #37704b; font-weight: 700; text-decoration: underline;">
                  {{ setting('contact_email', 'admin@shristiyam.com') }}
                </a>
              </div>
            </div>
          </form>
        </div>

        <!-- Career FAQs / Work Culture Highlight -->
        <div style="margin-top: 48px; background: linear-gradient(135deg, #05261b 0%, #11382a 100%); border-radius: 20px; padding: 36px 40px; color: #ffffff; display: flex; flex-direction: column; md:flex-row; align-items: center; justify-content: space-between; gap: 24px;">
          <div>
            <h3 style="font-size: 1.35rem; font-weight: 800; color: #ffffff; margin-bottom: 8px; font-family: var(--font-heading);">
              Why build your career at {{ setting('site_name', 'SHRISTIYAM') }}?
            </h3>
            <p style="font-size: 0.94rem; color: rgba(255, 255, 255, 0.82); line-height: 1.6; margin: 0; max-width: 620px;">
              Direct exposure to statutory national EPR mandates, cutting-edge biomass alternative fuel technologies, industrial co-processing plants, and impactful grassroots waste formalization.
            </p>
          </div>
          <div>
            <a href="tel:{{ setting('contact_phone', '+917020784898') }}" 
               class="btn career-talent-btn" 
               style="background: #ffffff !important; background-color: #ffffff !important; color: #05261b !important; border: 1.5px solid #ffffff !important; font-weight: 700 !important; white-space: nowrap !important; font-size: 0.92rem !important; padding: 12px 28px !important; border-radius: var(--radius-full, 9999px) !important; text-decoration: none !important; display: inline-flex !important; align-items: center !important; gap: 8px !important; transition: all 0.25s ease !important; box-shadow: 0 4px 14px rgba(0, 0, 0, 0.2) !important;"
               onmouseover="this.style.background='#669a2b'; this.style.backgroundColor='#669a2b'; this.style.color='#ffffff'; this.style.borderColor='#669a2b';"
               onmouseout="this.style.background='#ffffff'; this.style.backgroundColor='#ffffff'; this.style.color='#05261b'; this.style.borderColor='#ffffff';">
              <span style="color: inherit; font-weight: 700;">Call Talent Desk &rarr;</span>
            </a>
          </div>
        </div>

      </div>
    </div>
  </section>
@endsection

@push('scripts')
<script>
  function applyForRole(roleName) {
    const positionSelect = document.getElementById('positionSelect');
    if (positionSelect) {
      positionSelect.value = roleName;
    }
    const formSection = document.getElementById('apply-form');
    if (formSection) {
      formSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
  }

  function handleResumeSelected(input) {
    const infoBox = document.getElementById('selectedResumeInfo');
    if (input.files && input.files[0]) {
      const file = input.files[0];
      const sizeMb = (file.size / (1024 * 1024)).toFixed(2);
      infoBox.innerHTML = '&#10004; Selected: <strong>' + file.name + '</strong> (' + sizeMb + ' MB)';
      infoBox.style.display = 'inline-block';
    } else {
      infoBox.style.display = 'none';
      infoBox.innerHTML = '';
    }
  }

  document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('careerApplicationForm');
    if (form) {
      form.addEventListener('submit', function () {
        const btn = document.getElementById('submitResumeBtn');
        if (btn) {
          btn.disabled = true;
          btn.innerHTML = 'Submitting Application...';
          btn.style.opacity = '0.8';
        }
      });
    }
  });
</script>
@endpush
