<div class="card rounded-3">
    <!-- Table -->
    <div class="px-3 p-2 border {{ request()->routeIs('backend_Settings_Logo') ? 'active_menu' : '' }}">
        <a class="text-dark" href="{{ route('backend_Settings_Logo') }}">
            <i class="fa-solid fa-gear me-2"></i>
            Logo
        </a>
    </div>
    <div class="px-3 p-2 border {{ request()->routeIs('admin_Settings_Sitemap') ? 'active_menu' : '' }}">
        <a class="text-dark" href="{{ route('admin_Settings_Sitemap') }}">
            <i class="fa-solid fa-gear me-2"></i>
            Sitemap
        </a>
    </div>
    <div class="px-3 p-2 border {{ request()->routeIs('admin_Settings_Cache') ? 'active_menu' : '' }}">
        <a class="text-dark" href="{{ route('admin_Settings_Cache') }}">
            <i class="fa-solid fa-gear me-2"></i>
            Cache Section
        </a>
    </div>
    <div class="px-3 p-2 border {{ request()->routeIs('admin.hero.*', 'admin.spotlight.*', 'admin.services.*', 'admin.consultation.*', 'admin.ratings.*', 'admin.benefits.*', 'admin.clients.*', 'admin.testimonials.*', 'admin.gallery.*') ? 'active_menu' : '' }}">
        <a class="text-dark" href="{{ route('admin.hero.index') }}">
            <i class="fa-solid fa-layer-group me-2"></i>
            Section Manage
        </a>
    </div>
    <div class="px-3 p-2 border {{ request()->routeIs('backend_Settings_Header') ? 'active_menu' : '' }}">
        <a class="text-dark" href="{{ route('backend_Settings_Header') }}">
            <i class="fa-solid fa-heading me-2"></i>
            Header
        </a>
    </div>
    <div class="px-3 p-2 border {{ request()->routeIs('backend_Settings_Footer') ? 'active_menu' : '' }}">
        <a class="text-dark" href="{{ route('backend_Settings_Footer') }}">
            <i class="fa-solid fa-shoe-prints me-2"></i>
            Footer
        </a>
    </div>
</div>
