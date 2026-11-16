@extends('backend.layouts.master')
@section('content')
    <!-- Container fluid -->
    <section class="p-4 container-fluid">
        <div class="p-0 border-bottom card">
            <div class="p-3 card-body">
                <h3 class="m-0">Theme Options - Header Settings</h3>
            </div>
        </div>
        <div class="card">
            <div class="row">
                <div class="col-lg-2 col-12">
                    <!-- Menu them -->
                    @include('backend.theme-option.components.theme-menu')
                    <!-- Menu them -->
                </div>
                <div class="col-lg-9 col-12">
                    @if ($errors->any())
                        <div class="alert alert-danger" style="background: #DA1D25; color:#ffffff">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (Session::get('success'))
                        <div class="alert alert-success">
                            {{ session::get('success') }}
                        </div>
                    @endif
                    @if (Session::get('error'))
                        <div class="alert alert-danger">
                            {{ session::get('error') }}
                        </div>
                    @endif

                    <div class="p-4 rounded-3">
                        <div class="row g-4">
                            <!-- Header Logo Card -->
                            <div class="col-md-6 col-12">
                                <div class="border card h-100">
                                    <div class="card-header bg-light">
                                        <h5 class="mb-0"><i class="fa-solid fa-image me-2"></i>Header Logo</h5>
                                    </div>
                                    <div class="text-center card-body">
                                        <div class="p-3 mb-3 bg-dark rounded-3 d-inline-block">
                                            <img src="{{ \App\Support\WebsiteMedia::url('media/logo/' . ($logo->frontlogo ?? 'frontlogo.png')) }}" 
                                                 alt="Header Logo" style="height: 50px; max-width: 100%;">
                                        </div>
                                        <p class="text-muted small">Current Header Front Logo shown on website navigation.</p>
                                        <a href="{{ route('backend_Settings_Logo') }}" class="btn btn-outline-primary btn-sm">
                                            <i class="fa-solid fa-pen-to-square me-1"></i> Change Logo
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Header CTA Button Card -->
                            <div class="col-md-6 col-12">
                                <div class="border card h-100">
                                    <div class="card-header bg-light">
                                        <h5 class="mb-0"><i class="fa-solid fa-bullhorn me-2"></i>Header Action Button</h5>
                                    </div>
                                    <div class="card-body">
                                        <p class="mb-2"><strong>Button Label:</strong> <span class="badge bg-primary">Let's Talk</span></p>
                                        <p class="mb-3"><strong>Destination:</strong> Contact Us Page (<code>/contact</code>)</p>
                                        <p class="text-muted small">Guest users also see <strong>Login</strong> &amp; <strong>Register</strong> shortcuts on the top navigation bar.</p>
                                        <a href="{{ route('home_Index') }}" target="_blank" class="btn btn-outline-secondary btn-sm">
                                            <i class="fa-solid fa-arrow-up-right-from-square me-1"></i> Preview Frontend Header
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Navigation Menu Overview -->
                            <div class="col-12">
                                <div class="border card">
                                    <div class="card-header bg-light">
                                        <h5 class="mb-0"><i class="fa-solid fa-bars me-2"></i>Navigation Menu Items</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table mb-0 align-middle table-bordered">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Menu Item</th>
                                                        <th>Target URL</th>
                                                        <th>Manage Content</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><strong>Home</strong></td>
                                                        <td><code>/</code></td>
                                                        <td><a href="{{ route('admin.hero.index') }}" class="btn btn-sm btn-light">Manage Hero</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Service</strong></td>
                                                        <td><code>/service</code></td>
                                                        <td><a href="{{ route('backend_Services_Index') }}" class="btn btn-sm btn-light">Manage Services</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Course</strong></td>
                                                        <td><code>/courses</code></td>
                                                        <td><a href="{{ route('backend_Courses_Index') }}" class="btn btn-sm btn-light">Manage Courses</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Blog</strong></td>
                                                        <td><code>/blogs</code></td>
                                                        <td><a href="{{ route('backend_Blogs_Index') }}" class="btn btn-sm btn-light">Manage Blogs</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>About</strong></td>
                                                        <td><code>/about</code></td>
                                                        <td><a href="{{ route('backend_Abouts_Index') }}" class="btn btn-sm btn-light">Manage Abouts</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Apply</strong></td>
                                                        <td><code>/apply-course</code></td>
                                                        <td><a href="{{ route('backend_ApplyCourse_Index') }}" class="btn btn-sm btn-light">Manage Course Apply</a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
