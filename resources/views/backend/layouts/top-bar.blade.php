@php
    $admin = $admin ?? \Illuminate\Support\Facades\Auth::guard('admin')->user();
    // A missing/renamed avatar must never render a broken image.
    $avatarFilename = basename((string) ($admin?->avatar ?? ''));
    $adminAvatar = \App\Support\WebsiteMedia::url('media/admin/' . $avatarFilename, 'media/admin/default.png');
    $profileRoute = $admin ? route('backend_Admins_Edit', $admin->id) : route('backend_Admins_Index');
@endphp
<div class="header">
    <!-- navbar -->
    <nav class="navbar-default navbar navbar-expand-lg">
        <a id="nav-toggle" href="#">
            <i class="fe fe-menu"></i>
        </a>
        <div class="ms-lg-3 d-none d-md-none d-lg-block">
            <!-- Form -->
            <form class="d-flex align-items-center">
                <span class="position-absolute ps-3 search-icon">
                    <i class="fe fe-search"></i>
                </span>
                <input type="search" class="form-control ps-6" placeholder="Search Entire Dashboard">
            </form>
        </div>
        <!--Navbar nav -->
        <div class="ms-auto d-flex">
            <a href="#" class="form-check form-switch theme-switch btn btn-light btn-icon rounded-circle ">
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                <label class="form-check-label" for="flexSwitchCheckDefault"></label>

            </a>
            <ul class="navbar-nav navbar-right-wrap ms-2 d-flex nav-top-wrap">
                <li class="dropdown stopevent">
                    <a class="btn btn-light btn-icon rounded-circle indicator indicator-primary text-muted"
                        href="#" role="button" id="dropdownNotification" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fe fe-bell"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-lg"
                        aria-labelledby="dropdownNotification">
                        <div>
                            <div class="px-3 pb-3 border-bottom d-flex justify-content-between align-items-center">
                                <span class="mb-0 h4">Notifications</span>
                                <a href="# " class="text-muted">
                                    <span class="align-middle">
                                        <i class="fe fe-settings me-1"></i>
                                    </span>
                                </a>
                            </div>
                            <!-- List group -->
                            <ul class="list-group list-group-flush" data-simplebar style="max-height: 300px;">
                            
                                {{-- <li class="list-group-item">
                                    <div class="row">
                                        <div class="col">
                                            <a class="text-body" href="#">
                                                <div class="d-flex">
                                                    <img src="{{ asset('backend') }}/assets/images/avatar/avatar-4.jpg"
                                                        alt="" class="avatar-md rounded-circle">
                                                    <div class="ms-3">
                                                        <h5 class="mb-1 fw-bold">Sina Ray</h5>
                                                        <p class="mb-3">
                                                            You earn new certificate for complete the
                                                            Javascript
                                                            Beginner course.
                                                        </p>
                                                        <span class="fs-6 text-muted">
                                                            <span><span
                                                                    class="fe fe-award text-warning me-1"></span>Oct
                                                                9,</span>
                                                            <span class="ms-1">1:56 PM</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-auto text-center me-2">
                                            <a href="#" class="badge-dot bg-secondary" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Mark as unread">
                                            </a>
                                        </div>
                                    </div>
                                </li> --}}
                            </ul>
                            <div class="px-3 pt-3 pb-0 border-top">
                                <a href="#" class="text-link fw-semibold">
                                    See all Notifications
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
                <!-- List -->
                <li class="dropdown ms-2">
                    <a class="rounded-circle" href="#" role="button" id="dropdownUser" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <div class="avatar avatar-md avatar-indicators avatar-online">
                            <img alt="avatar" src="{{ $adminAvatar }}"
                                class="rounded-circle">
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownUser">
                        <div class="dropdown-item">
                            <a href="{{ $profileRoute }}" class="d-flex text-inherit text-decoration-none">
                                <div class="avatar avatar-md avatar-indicators avatar-online">
                                    <img alt="avatar" src="{{ $adminAvatar }}"
                                        class="rounded-circle">
                                </div>
                                <div class="ms-3 lh-1">
                                    <h5 class="mb-1 text-dark">{{ $admin?->name ?? 'Administrator' }}</h5>
                                    <p class="mb-0 text-muted">{{ $admin?->email ?? '' }}</p>
                                </div>
                            </a>
                        </div>
                        <div class="dropdown-divider"></div>
                        <ul class="list-unstyled">
                            <li class="dropdown-submenu dropstart-lg">
                                <a class="dropdown-item dropdown-list-group-item dropdown-toggle" href="javascript:void(0);">
                                    <i class="fe fe-circle me-2"></i> Status
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item status-select-item" href="javascript:void(0);" data-status="online">
                                            <span class="badge-dot bg-success me-2"></span> Online
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item status-select-item" href="javascript:void(0);" data-status="offline">
                                            <span class="badge-dot bg-secondary me-2"></span> Offline
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item status-select-item" href="javascript:void(0);" data-status="away">
                                            <span class="badge-dot bg-warning me-2"></span> Away
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item status-select-item" href="javascript:void(0);" data-status="busy">
                                            <span class="badge-dot bg-danger me-2"></span> Busy
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ $profileRoute }}">
                                    <i class="fe fe-user me-2"></i> Profile
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('backend_Membership_Index') }}">
                                    <i class="fe fe-star me-2"></i> Subscription
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('backend_Settings_Logo') }}">
                                    <i class="fe fe-settings me-2"></i> Settings
                                </a>
                            </li>
                        </ul>
                        <div class="dropdown-divider"></div>
                        <ul class="list-unstyled">
                            <li>
                                <a class="dropdown-item" href="{{ route('admin_Logout') }}">
                                    <i class="fe fe-power me-2"></i> Sign Out
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <script>
        (function () {
            var statusClasses = ['avatar-online', 'avatar-offline', 'avatar-away', 'avatar-busy'];

            function applyAdminPresence(status) {
                if (!statusClasses.includes('avatar-' + status)) {
                    status = 'online';
                }
                try {
                    localStorage.setItem('admin_presence_status', status);
                } catch (e) {}

                document.querySelectorAll('.avatar-indicators').forEach(function (avatar) {
                    statusClasses.forEach(function (cls) {
                        avatar.classList.remove(cls);
                    });
                    avatar.classList.add('avatar-' + status);
                });

                document.querySelectorAll('.status-select-item').forEach(function (item) {
                    if (item.getAttribute('data-status') === status) {
                        item.classList.add('active', 'fw-semibold');
                    } else {
                        item.classList.remove('active', 'fw-semibold');
                    }
                });
            }

            document.addEventListener('DOMContentLoaded', function () {
                var currentStatus = 'online';
                try {
                    currentStatus = localStorage.getItem('admin_presence_status') || 'online';
                } catch (e) {}
                applyAdminPresence(currentStatus);

                document.querySelectorAll('.status-select-item').forEach(function (elem) {
                    elem.addEventListener('click', function (e) {
                        e.preventDefault();
                        e.stopPropagation();
                        var targetStatus = this.getAttribute('data-status');
                        applyAdminPresence(targetStatus);
                    });
                });
            });
        })();
    </script>
</div>
