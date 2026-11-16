@extends('backend.layouts.master')
@section('content')
    <!-- Container fluid -->
    <section class="p-4 container-fluid">
        <div class="p-0 border-bottom card">
            <div class="p-3 card-body">
                <h3 class="m-0">Theme Options - Footer Settings</h3>
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

                    <div class="py-4 px-2 rounded-3">
                        <form action="{{ Route::has('backend_Settings_Footer_Update') ? route('backend_Settings_Footer_Update') : url('admin/dashboard/settings/theme-options/footer/update') }}" method="POST">
                            @csrf
                            
                            <!-- Say Hello Contact Info -->
                            <div class="mb-4 card border">
                                <div class="card-header bg-light">
                                    <h5 class="mb-0"><i class="fa-solid fa-phone-volume me-2"></i>Say Hello / Footer Contact Info</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row gx-3">
                                        <div class="mb-3 col-md-12">
                                            <label class="form-label" for="address">
                                                Address <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" name="address"
                                                value="{{ old('address') ?? ($websiteinfo->address ?? '') }}"
                                                class="form-control" id="address" placeholder="e.g. ICT Tower (14 Floor), Agargaon, Dhaka">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label" for="email">
                                                Email <span class="text-danger">*</span>
                                            </label>
                                            <input type="email" name="email"
                                                value="{{ old('email') ?? ($websiteinfo->email ?? '') }}"
                                                class="form-control" id="email" placeholder="e.g. info@example.com">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label" for="number">
                                                Phone Number <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" name="number"
                                                value="{{ old('number') ?? ($websiteinfo->number ?? '') }}"
                                                class="form-control" id="number" placeholder="e.g. +8801965979368">
                                        </div>
                                        <div class="mb-3 col-md-12">
                                            <label class="form-label" for="wattsup_number">
                                                WhatsApp Number
                                            </label>
                                            <input type="text" name="wattsup_number"
                                                value="{{ old('wattsup_number') ?? ($websiteinfo->wattsup_number ?? '') }}"
                                                class="form-control" id="wattsup_number" placeholder="e.g. 01965979368">
                                        </div>
                                        <div class="mb-3 col-md-12">
                                            <label class="form-label" for="sort_descroption">
                                                Footer About / Short Description
                                            </label>
                                            <textarea name="sort_descroption" class="form-control" id="sort_descroption" rows="3"
                                                placeholder="Short summary under logo in footer">{{ old('sort_descroption') ?? ($websiteinfo->sort_descroption ?? '') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Social Links -->
                            <div class="mb-4 card border">
                                <div class="card-header bg-light">
                                    <h5 class="mb-0"><i class="fa-solid fa-share-nodes me-2"></i>Say Hello / Social Media Links</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row gx-3">
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label" for="facebook">
                                                <i class="fab fa-facebook text-primary me-1"></i> Facebook URL
                                            </label>
                                            <input type="url" name="facebook"
                                                value="{{ old('facebook') ?? ($websiteinfo->facebook ?? '') }}"
                                                class="form-control" id="facebook" placeholder="https://www.facebook.com/yourpage">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label" for="instagram">
                                                <i class="fab fa-instagram text-danger me-1"></i> Instagram URL
                                            </label>
                                            <input type="url" name="instagram"
                                                value="{{ old('instagram') ?? ($websiteinfo->instagram ?? '') }}"
                                                class="form-control" id="instagram" placeholder="https://www.instagram.com/yourprofile">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label" for="twitter">
                                                <i class="fab fa-twitter text-info me-1"></i> Twitter / X URL
                                            </label>
                                            <input type="url" name="twitter"
                                                value="{{ old('twitter') ?? ($websiteinfo->twitter ?? '') }}"
                                                class="form-control" id="twitter" placeholder="https://twitter.com/yourhandle">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label" for="linkdin">
                                                <i class="fab fa-linkedin text-primary me-1"></i> LinkedIn URL
                                            </label>
                                            <input type="url" name="linkdin"
                                                value="{{ old('linkdin') ?? ($websiteinfo->linkdin ?? '') }}"
                                                class="form-control" id="linkdin" placeholder="https://www.linkedin.com/in/yourprofile">
                                        </div>
                                        <div class="mb-3 col-md-4">
                                            <label class="form-label" for="tiktok">
                                                <i class="fab fa-tiktok me-1"></i> TikTok URL
                                            </label>
                                            <input type="url" name="tiktok"
                                                value="{{ old('tiktok') ?? ($websiteinfo->tiktok ?? '') }}"
                                                class="form-control" id="tiktok" placeholder="https://www.tiktok.com/@yourprofile">
                                        </div>
                                        <div class="mb-3 col-md-4">
                                            <label class="form-label" for="pintarest">
                                                <i class="fab fa-pinterest text-danger me-1"></i> Pinterest URL
                                            </label>
                                            <input type="url" name="pintarest"
                                                value="{{ old('pintarest') ?? ($websiteinfo->pintarest ?? '') }}"
                                                class="form-control" id="pintarest" placeholder="https://www.pinterest.com/yourprofile">
                                        </div>
                                        <div class="mb-3 col-md-4">
                                            <label class="form-label" for="radit">
                                                <i class="fab fa-reddit text-warning me-1"></i> Reddit URL
                                            </label>
                                            <input type="url" name="radit"
                                                value="{{ old('radit') ?? ($websiteinfo->radit ?? '') }}"
                                                class="form-control" id="radit" placeholder="https://www.reddit.com/user/yourprofile">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa-solid fa-floppy-disk me-1"></i> Update Footer Settings
                                </button>
                                <a href="{{ route('home_Index') }}" target="_blank" class="btn btn-outline-secondary ms-2">
                                    <i class="fa-solid fa-arrow-up-right-from-square me-1"></i> Preview Live Footer
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
