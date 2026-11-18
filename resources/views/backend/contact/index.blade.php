@extends('backend.layouts.master')

@section('content')
    @php
        $statusOptions = $settings->status_options ?: \App\Models\ContactPageSetting::defaultStatusOptions();
        $businessTypeOptions = $settings->business_type_options ?: \App\Models\ContactPageSetting::defaultBusinessTypeOptions();
        $websiteInfo = \App\Models\WebsiteInfo::first();
        $personalInfo = \App\Models\PersonalInfo::first();

        $contactAddress = $websiteInfo?->address ?: $personalInfo?->address;
        $contactEmail = $websiteInfo?->email ?: $personalInfo?->email;
        $contactPhone = $websiteInfo?->number ?: $personalInfo?->number;
    @endphp

    <section class="container-fluid p-4" style="max-width: 1500px">
        <div class="d-flex justify-content-between align-items-start gap-3 border-bottom pb-3 mb-4 flex-wrap">
            <div>
                <h1 class="h2 fw-bold mb-1">Contact Page</h1>
                <p class="text-muted mb-0">
                    Manage the public contact page copy, form fields, options and incoming inquiries from one place.
                </p>
            </div>
            <a class="btn btn-outline-secondary" href="{{ route('frontend_Contact_Index') }}" target="_blank" rel="noopener noreferrer">
                View Contact Page ↗
            </a>
        </div>

        @if (session('contact_admin_success'))
            <div class="alert alert-success" role="status">{{ session('contact_admin_success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.contact.settings.update') }}">
            @csrf
            @method('PUT')

            <div class="card mb-4 shadow-sm border-0">
                <div class="card-header bg-white py-3">
                    <h2 class="h5 mb-1">1. Page introduction</h2>
                    <p class="small text-muted mb-0">These values are rendered directly on the public Contact page.</p>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-lg-4">
                            <label class="form-label" for="contact-eyebrow">Eyebrow</label>
                            <input id="contact-eyebrow" class="form-control" name="eyebrow" maxlength="120"
                                value="{{ old('eyebrow', $settings->eyebrow) }}">
                        </div>
                        <div class="col-lg-8">
                            <label class="form-label" for="contact-heading">Main heading <span class="text-danger">*</span></label>
                            <input id="contact-heading" class="form-control" name="heading" required maxlength="200"
                                value="{{ old('heading', $settings->heading) }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="contact-description">Description</label>
                            <textarea id="contact-description" class="form-control" name="description" rows="3" maxlength="1600">{{ old('description', $settings->description) }}</textarea>
                        </div>
                        <div class="col-lg-8">
                            <label class="form-label" for="contact-badge">Badge / supporting line</label>
                            <input id="contact-badge" class="form-control" name="badge_text" maxlength="200"
                                value="{{ old('badge_text', $settings->badge_text) }}">
                        </div>
                        <div class="col-lg-4">
                            <label class="form-label" for="contact-active">Public form status</label>
                            <select id="contact-active" name="is_active" class="form-select">
                                <option value="1" {{ (int) old('is_active', $settings->is_active ? 1 : 0) === 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ (int) old('is_active', $settings->is_active ? 1 : 0) === 0 ? 'selected' : '' }}>Temporarily hidden</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="contact-inactive">Inactive message</label>
                            <input id="contact-inactive" class="form-control" name="inactive_message" maxlength="300"
                                value="{{ old('inactive_message', $settings->inactive_message) }}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-4 shadow-sm border-0">
                <div class="card-header bg-white py-3">
                    <h2 class="h5 mb-1">2. Form copy & fields</h2>
                    <p class="small text-muted mb-0">Labels, placeholders and button text are database-driven; changing them updates the frontend without editing Blade.</p>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-lg-6">
                            <label class="form-label" for="form-heading">Form heading <span class="text-danger">*</span></label>
                            <input id="form-heading" class="form-control" name="form_heading" required maxlength="200"
                                value="{{ old('form_heading', $settings->form_heading) }}">
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label" for="form-description">Form description</label>
                            <input id="form-description" class="form-control" name="form_description" maxlength="1000"
                                value="{{ old('form_description', $settings->form_description) }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="name-label">Name label <span class="text-danger">*</span></label>
                            <input id="name-label" class="form-control" name="name_label" required maxlength="120"
                                value="{{ old('name_label', $settings->name_label) }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="name-placeholder">Name placeholder</label>
                            <input id="name-placeholder" class="form-control" name="name_placeholder" maxlength="200"
                                value="{{ old('name_placeholder', $settings->name_placeholder) }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="phone-label">Phone label <span class="text-danger">*</span></label>
                            <input id="phone-label" class="form-control" name="phone_label" required maxlength="120"
                                value="{{ old('phone_label', $settings->phone_label) }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="phone-placeholder">Phone placeholder</label>
                            <input id="phone-placeholder" class="form-control" name="phone_placeholder" maxlength="200"
                                value="{{ old('phone_placeholder', $settings->phone_placeholder) }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="email-label">Email label <span class="text-danger">*</span></label>
                            <input id="email-label" class="form-control" name="email_label" required maxlength="120"
                                value="{{ old('email_label', $settings->email_label) }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="email-placeholder">Email placeholder</label>
                            <input id="email-placeholder" class="form-control" name="email_placeholder" maxlength="200"
                                value="{{ old('email_placeholder', $settings->email_placeholder) }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="status-label">Current status label <span class="text-danger">*</span></label>
                            <input id="status-label" class="form-control" name="status_label" required maxlength="160"
                                value="{{ old('status_label', $settings->status_label) }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="status-options">Current status options <span class="text-danger">*</span></label>
                            <textarea id="status-options" class="form-control" name="status_options" rows="4" required maxlength="1200">{{ old('status_options', implode("\n", $statusOptions)) }}</textarea>
                            <small class="text-muted">One option per line.</small>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="website-label">Business page / website label</label>
                            <input id="website-label" class="form-control" name="website_label" maxlength="220"
                                value="{{ old('website_label', $settings->website_label) }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="website-placeholder">Business page / website placeholder</label>
                            <input id="website-placeholder" class="form-control" name="website_placeholder" maxlength="300"
                                value="{{ old('website_placeholder', $settings->website_placeholder) }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="business-label">Business type label <span class="text-danger">*</span></label>
                            <input id="business-label" class="form-control" name="business_type_label" required maxlength="220"
                                value="{{ old('business_type_label', $settings->business_type_label) }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="business-placeholder">Business type placeholder</label>
                            <input id="business-placeholder" class="form-control" name="business_type_placeholder" maxlength="200"
                                value="{{ old('business_type_placeholder', $settings->business_type_placeholder) }}">
                        </div>

                        <div class="col-12">
                            <label class="form-label" for="business-options">Business type options <span class="text-danger">*</span></label>
                            <textarea id="business-options" class="form-control" name="business_type_options" rows="5" required maxlength="1500">{{ old('business_type_options', implode("\n", $businessTypeOptions)) }}</textarea>
                            <small class="text-muted">One option per line.</small>
                        </div>

                        <div class="col-12">
                            <label class="form-label" for="details-label">Business details label <span class="text-danger">*</span></label>
                            <input id="details-label" class="form-control" name="details_label" required maxlength="300"
                                value="{{ old('details_label', $settings->details_label) }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="details-placeholder">Business details placeholder</label>
                            <textarea id="details-placeholder" class="form-control" name="details_placeholder" rows="2" maxlength="1000">{{ old('details_placeholder', $settings->details_placeholder) }}</textarea>
                        </div>

                        <div class="col-12">
                            <label class="form-label" for="consent-text">Consent text <span class="text-danger">*</span></label>
                            <textarea id="consent-text" class="form-control" name="consent_text" rows="2" required maxlength="1000">{{ old('consent_text', $settings->consent_text) }}</textarea>
                        </div>

                        <div class="col-lg-7">
                            <label class="form-label" for="submit-text">Submit button text <span class="text-danger">*</span></label>
                            <input id="submit-text" class="form-control" name="submit_button_text" required maxlength="180"
                                value="{{ old('submit_button_text', $settings->submit_button_text) }}">
                        </div>
                        <div class="col-lg-5">
                            <label class="form-label" for="privacy-note">Privacy / helper note</label>
                            <input id="privacy-note" class="form-control" name="privacy_note" maxlength="500"
                                value="{{ old('privacy_note', $settings->privacy_note) }}">
                        </div>

                        <div class="col-12">
                            <label class="form-label" for="success-message">Success message <span class="text-danger">*</span></label>
                            <textarea id="success-message" class="form-control" name="success_message" rows="2" required maxlength="500">{{ old('success_message', $settings->success_message) }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-white d-flex justify-content-end">
                    <button class="btn btn-primary px-4" type="submit">Save Contact Page</button>
                </div>
            </div>
        </form>

        <div class="card mb-4 shadow-sm border-0">
            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center gap-3 flex-wrap">
                <div>
                    <h2 class="h5 mb-1">3. Existing contact information</h2>
                    <p class="small text-muted mb-0">Address, phone, email and social links continue to use the existing Website Info / Personal Info data so the footer and other pages stay consistent.</p>
                </div>
                <a class="btn btn-outline-primary btn-sm" href="{{ route('backend_Website_Info_Index') }}">Manage Website Info</a>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <div class="border rounded p-3 h-100">
                            <small class="text-muted d-block">Address</small>
                            <strong>{{ $contactAddress ?: 'Not configured' }}</strong>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="border rounded p-3 h-100">
                            <small class="text-muted d-block">Email</small>
                            <strong>{{ $contactEmail ?: 'Not configured' }}</strong>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="border rounded p-3 h-100">
                            <small class="text-muted d-block">Phone</small>
                            <strong>{{ $contactPhone ?: 'Not configured' }}</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
