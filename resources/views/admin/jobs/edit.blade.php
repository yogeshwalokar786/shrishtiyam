@extends('layouts.admin')

@section('title', 'Edit Job Opening')
@section('page_title', 'Edit Job Opening')

@section('content')
<div class="content-header" style="margin-bottom: 24px;">
    <div style="display: flex; align-items: center; gap: 12px;">
        <a href="{{ route('admin.jobs.index') }}" class="btn btn-secondary" style="padding: 8px 12px; display: inline-flex; align-items: center; gap: 6px; text-decoration: none;" title="Back to Openings">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                <line x1="19" y1="12" x2="5" y2="12"></line>
                <polyline points="12 19 5 12 12 5"></polyline>
            </svg>
            <span>Back</span>
        </a>
        <div>
            <h1 class="page-title" style="margin: 0;">Edit Job Opening: {{ $job->title }}</h1>
            <p style="color: var(--text-muted); font-size: 0.88rem; margin: 4px 0 0 0;">
                Update role specifications, requirements, and publishing status for this position.
            </p>
        </div>
    </div>
</div>

<form action="{{ route('admin.jobs.update', $job->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 24px; align-items: flex-start;">
        <!-- Left Column: Core Role Information -->
        <div style="display: flex; flex-direction: column; gap: 24px;">
            <div class="card" style="padding: 24px;">
                <h3 style="font-size: 1.15rem; margin-bottom: 20px; color: var(--text-main);">Role Specifications</h3>

                <!-- Title -->
                <div style="margin-bottom: 20px;">
                    <label class="form-label" style="display: block; font-size: 0.86rem; font-weight: 600; margin-bottom: 6px;">
                        Position Title <span style="color: #ef4444;">*</span>
                    </label>
                    <input type="text" name="title" value="{{ old('title', $job->title) }}" required class="form-control" 
                           placeholder="e.g. EPR & Compliance Advisory Lead" style="width: 100%;">
                    @error('title')
                        <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Department & Slug -->
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 20px;">
                    <div>
                        <label class="form-label" style="display: block; font-size: 0.86rem; font-weight: 600; margin-bottom: 6px;">
                            Department / Practice Area
                        </label>
                        <input type="text" name="department" value="{{ old('department', $job->department) }}" class="form-control" 
                               placeholder="e.g. Compliance & Regulatory" style="width: 100%;">
                        @error('department')
                            <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <label class="form-label" style="display: block; font-size: 0.86rem; font-weight: 600; margin-bottom: 6px;">
                            Slug <span style="font-size: 0.78rem; color: var(--text-muted);">(URL friendly identifier)</span>
                        </label>
                        <input type="text" name="slug" value="{{ old('slug', $job->slug) }}" class="form-control" 
                               placeholder="e.g. epr-compliance-advisory" style="width: 100%;">
                        @error('slug')
                            <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Location & Employment Type & Experience -->
                <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 16px; margin-bottom: 20px;">
                    <div>
                        <label class="form-label" style="display: block; font-size: 0.86rem; font-weight: 600; margin-bottom: 6px;">
                            Location <span style="color: #ef4444;">*</span>
                        </label>
                        <input type="text" name="location" value="{{ old('location', $job->location) }}" required class="form-control" 
                               placeholder="e.g. Nagpur HQ or Plant Operations" style="width: 100%;">
                        @error('location')
                            <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <label class="form-label" style="display: block; font-size: 0.86rem; font-weight: 600; margin-bottom: 6px;">
                            Employment Type <span style="color: #ef4444;">*</span>
                        </label>
                        <select name="employment_type" class="form-control" style="width: 100%;">
                            <option value="Full-time" {{ old('employment_type', $job->employment_type) === 'Full-time' ? 'selected' : '' }}>Full-time</option>
                            <option value="Part-time" {{ old('employment_type', $job->employment_type) === 'Part-time' ? 'selected' : '' }}>Part-time</option>
                            <option value="Contract" {{ old('employment_type', $job->employment_type) === 'Contract' ? 'selected' : '' }}>Contract</option>
                            <option value="Internship" {{ old('employment_type', $job->employment_type) === 'Internship' ? 'selected' : '' }}>Internship</option>
                        </select>
                        @error('employment_type')
                            <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <label class="form-label" style="display: block; font-size: 0.86rem; font-weight: 600; margin-bottom: 6px;">
                            Required Experience
                        </label>
                        <input type="text" name="experience" value="{{ old('experience', $job->experience) }}" class="form-control" 
                               placeholder="e.g. 2 - 5 Years" style="width: 100%;">
                        @error('experience')
                            <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Short Overview (Displayed on Job Card) -->
                <div style="margin-bottom: 20px;">
                    <label class="form-label" style="display: block; font-size: 0.86rem; font-weight: 600; margin-bottom: 6px;">
                        Short Summary / Overview <span style="color: #ef4444;">*</span> <span style="font-size: 0.78rem; color: var(--text-muted);">(Displayed directly on the Career Card)</span>
                    </label>
                    <textarea name="overview" rows="3" required class="form-control" style="width: 100%;" 
                              placeholder="Auditing, CPCB portal quota allocation, PIBO target fulfillment, and statutory environmental returns filing.">{{ old('overview', $job->overview) }}</textarea>
                    @error('overview')
                        <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Detailed Description / Responsibilities (Optional) -->
                <div>
                    <label class="form-label" style="display: block; font-size: 0.86rem; font-weight: 600; margin-bottom: 6px;">
                        Full Description &amp; Responsibilities <span style="font-size: 0.78rem; color: var(--text-muted);">(Optional)</span>
                    </label>
                    <textarea name="description" rows="6" class="form-control" style="width: 100%; font-family: inherit;" 
                              placeholder="List key job requirements, qualifications, and core responsibilities...">{{ old('description', $job->description) }}</textarea>
                    @error('description')
                        <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Right Column: Settings & Publishing -->
        <div style="display: flex; flex-direction: column; gap: 24px;">
            <!-- Publish Settings Card -->
            <div class="card" style="padding: 24px;">
                <h3 style="font-size: 1.05rem; margin-bottom: 16px; color: var(--text-main);">Publishing Control</h3>

                <!-- Active Status -->
                <div style="margin-bottom: 20px;">
                    <label style="display: flex; align-items: center; gap: 10px; cursor: pointer;">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $job->is_active) ? 'checked' : '' }} style="width: 18px; height: 18px;">
                        <div>
                            <span style="font-weight: 600; font-size: 0.9rem;">Active on Careers Page</span>
                            <div style="font-size: 0.78rem; color: var(--text-muted);">When unchecked, this position will be hidden from public view.</div>
                        </div>
                    </label>
                </div>

                <!-- Sort Order -->
                <div style="margin-bottom: 20px;">
                    <label class="form-label" style="display: block; font-size: 0.84rem; font-weight: 600; margin-bottom: 6px;">
                        Sort Order
                    </label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $job->sort_order) }}" min="0" class="form-control" style="width: 100%;">
                    <div style="font-size: 0.76rem; color: var(--text-muted); margin-top: 4px;">Lower numbers appear first on the page.</div>
                </div>

                <!-- Card Icon Style -->
                <div style="margin-bottom: 20px;">
                    <label class="form-label" style="display: block; font-size: 0.84rem; font-weight: 600; margin-bottom: 6px;">
                        Card Icon Style
                    </label>
                    <select name="icon_type" class="form-control" style="width: 100%;">
                        <option value="shield" {{ old('icon_type', $job->icon_type) === 'shield' ? 'selected' : '' }}>Shield (Compliance &amp; Advisory)</option>
                        <option value="flame" {{ old('icon_type', $job->icon_type) === 'flame' ? 'selected' : '' }}>Flame (BioEnergy &amp; Thermal Fuels)</option>
                        <option value="truck" {{ old('icon_type', $job->icon_type) === 'truck' ? 'selected' : '' }}>Truck (Supply Chain &amp; Logistics)</option>
                        <option value="leaf" {{ old('icon_type', $job->icon_type) === 'leaf' ? 'selected' : '' }}>Leaf (Sustainability &amp; ESG)</option>
                        <option value="briefcase" {{ old('icon_type', $job->icon_type) === 'briefcase' ? 'selected' : '' }}>Briefcase (Corporate &amp; General)</option>
                    </select>
                </div>

                <!-- Badge Pill Text -->
                <div style="margin-bottom: 24px;">
                    <label class="form-label" style="display: block; font-size: 0.84rem; font-weight: 600; margin-bottom: 6px;">
                        Card Badge / Tagline <span style="font-size: 0.76rem; color: var(--text-muted);">(Optional)</span>
                    </label>
                    <input type="text" name="badge_text" value="{{ old('badge_text', $job->badge_text) }}" class="form-control" 
                           placeholder="e.g. Nagpur HQ • Full-time" style="width: 100%;">
                </div>

                <!-- Save Action Buttons -->
                <div style="display: flex; flex-direction: column; gap: 10px;">
                    <button type="submit" class="btn btn-primary" style="width: 100%; padding: 12px; font-weight: 700;">
                        Update Job Opening
                    </button>
                    <a href="{{ route('admin.jobs.index') }}" class="btn btn-secondary" style="width: 100%; text-align: center; text-decoration: none;">
                        Cancel
                    </a>
                </div>
            </div>

            <!-- Meta Information Card -->
            <div class="card" style="padding: 20px; font-size: 0.84rem; color: var(--text-muted);">
                <div style="margin-bottom: 8px;"><strong>Created:</strong> {{ $job->created_at->format('M d, Y H:i') }}</div>
                <div style="margin-bottom: 8px;"><strong>Updated:</strong> {{ $job->updated_at->format('M d, Y H:i') }}</div>
                <div><strong>Applications:</strong> {{ $job->applications()->count() }} received</div>
            </div>
        </div>
    </div>
</form>
@endsection

