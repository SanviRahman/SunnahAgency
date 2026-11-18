@extends('backend.layouts.master')

@section('content')
    <section class="container-fluid p-4" style="max-width: 1080px">
        <a href="{{ route('admin.contact.inquiries.index') }}" class="btn btn-outline-secondary mb-3">
            ← Back to Contact Inquiries
        </a>

        <div class="d-flex justify-content-between align-items-start gap-3 flex-wrap mb-4">
            <div>
                <h1 class="h2 fw-bold mb-1">Contact Inquiry</h1>
                <p class="text-muted mb-0">
                    Submitted {{ $inquiry->created_at?->format('d M Y, H:i') }}
                </p>
            </div>
            <span class="badge bg-secondary fs-6">{{ ucfirst($inquiry->lead_status) }}</span>
        </div>

        @if (session('contact_admin_success'))
            <div class="alert alert-success" role="status">{{ session('contact_admin_success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger" role="alert">{{ $errors->first() }}</div>
        @endif

        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-white py-3">
                <h2 class="h5 mb-0">Submitted information</h2>
            </div>
            <div class="card-body">
                <div class="row g-4">
                    <div class="col-md-6">
                        <small class="text-muted d-block mb-1">Name</small>
                        <div class="fw-semibold">{{ $inquiry->name }}</div>
                    </div>
                    <div class="col-md-6">
                        <small class="text-muted d-block mb-1">Phone</small>
                        <div class="fw-semibold">{{ $inquiry->phone }}</div>
                    </div>
                    <div class="col-md-6">
                        <small class="text-muted d-block mb-1">Email</small>
                        <div class="fw-semibold">{{ $inquiry->email }}</div>
                    </div>
                    <div class="col-md-6">
                        <small class="text-muted d-block mb-1">Current situation</small>
                        <div>{{ $inquiry->current_status }}</div>
                    </div>
                    <div class="col-md-6">
                        <small class="text-muted d-block mb-1">Business type</small>
                        <div>{{ $inquiry->business_type }}</div>
                    </div>
                    <div class="col-md-6">
                        <small class="text-muted d-block mb-1">Business page / website</small>
                        @if ($inquiry->website_link)
                            <a href="{{ $inquiry->website_link }}" target="_blank" rel="noopener noreferrer">
                                {{ $inquiry->website_link }}
                            </a>
                        @else
                            <span class="text-muted">Not provided</span>
                        @endif
                    </div>
                    <div class="col-12">
                        <small class="text-muted d-block mb-1">Business / marketing challenge</small>
                        <div class="border rounded p-3" style="white-space: pre-wrap; overflow-wrap: anywhere;">{{ $inquiry->business_details }}</div>
                    </div>
                    <div class="col-md-6">
                        <small class="text-muted d-block mb-1">Consent time</small>
                        <div>{{ $inquiry->consented_at?->format('d M Y, H:i') }}</div>
                    </div>
                    <div class="col-md-6">
                        <small class="text-muted d-block mb-1">Tracking ID</small>
                        <div class="font-monospace small text-break">{{ $inquiry->public_id }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3">
                <h2 class="h5 mb-0">Manage inquiry</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.contact.inquiries.update', $inquiry) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label" for="lead-status">Lead status</label>
                        <select class="form-select" name="lead_status" id="lead-status">
                            @foreach (['new', 'contacted', 'qualified', 'closed', 'spam'] as $status)
                                <option value="{{ $status }}" {{ $inquiry->lead_status === $status ? 'selected' : '' }}>
                                    {{ ucfirst($status) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="internal-notes">Internal notes</label>
                        <textarea class="form-control" rows="5" id="internal-notes" name="internal_notes" maxlength="4000">{{ old('internal_notes', $inquiry->internal_notes) }}</textarea>
                    </div>

                    <button class="btn btn-primary" type="submit">Save Inquiry</button>
                </form>
            </div>
        </div>
    </section>
@endsection
