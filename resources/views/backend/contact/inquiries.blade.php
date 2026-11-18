@extends('backend.layouts.master')

@section('content')
    <section class="container-fluid p-4" style="max-width: 1500px">
        <div class="d-flex justify-content-between align-items-start gap-3 border-bottom pb-3 mb-4 flex-wrap">
            <div>
                <h1 class="h2 fw-bold mb-1">Contact Inquiries</h1>
                <p class="text-muted mb-0">
                    Review and manage contact form submissions.
                </p>
            </div>
            <a class="btn btn-outline-secondary" href="{{ route('admin.contact.index') }}">
                Contact Settings
            </a>
        </div>

        @if (session('contact_admin_success'))
            <div class="alert alert-success" role="status">{{ session('contact_admin_success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger" role="alert">{{ $errors->first() }}</div>
        @endif

        <div class="card shadow-sm border-0">
            <div class="card-header bg-white d-flex justify-content-between align-items-center gap-2 flex-wrap py-3">
                <div>
                    <h2 class="h5 mb-1">All inquiries <span class="badge bg-light text-dark">{{ $leads->total() }}</span></h2>
                    <p class="small text-muted mb-0">Public contact form submissions are listed here for follow-up.</p>
                </div>

                <form method="GET" action="{{ route('admin.contact.inquiries.index') }}" class="d-flex gap-2 align-items-center">
                    <label class="small text-muted" for="contact-lead-status">Status</label>
                    <select id="contact-lead-status" name="lead_status" class="form-select form-select-sm">
                        <option value="">All</option>
                        @foreach ($leadStatuses as $status)
                            <option value="{{ $status }}" {{ $filter === $status ? 'selected' : '' }}>
                                {{ ucfirst($status) }}
                            </option>
                        @endforeach
                    </select>
                    <button class="btn btn-outline-primary btn-sm" type="submit">Filter</button>
                </form>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Current situation</th>
                            <th>Business type</th>
                            <th>Lead status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($leads as $lead)
                            <tr>
                                <td class="text-nowrap">{{ $lead->created_at?->format('d M Y, H:i') }}</td>
                                <td><strong>{{ $lead->name }}</strong></td>
                                <td>
                                    <span class="d-block">{{ $lead->email }}</span>
                                    <small class="text-muted">{{ $lead->phone }}</small>
                                </td>
                                <td>{{ $lead->current_status }}</td>
                                <td>{{ $lead->business_type }}</td>
                                <td>
                                    <span class="badge bg-secondary">{{ ucfirst($lead->lead_status) }}</span>
                                </td>
                                <td class="text-nowrap">
                                    <a class="btn btn-outline-primary btn-sm"
                                       href="{{ route('admin.contact.inquiries.show', $lead) }}">
                                        View
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted py-5">
                                    No contact inquiries yet.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if ($leads->hasPages())
                <div class="card-footer bg-white">
                    {{ $leads->links() }}
                </div>
            @endif
        </div>
    </section>
@endsection
