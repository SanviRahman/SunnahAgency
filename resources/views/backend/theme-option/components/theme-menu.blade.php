<div class="card rounded-3">
    <!-- Table -->
    <div class="px-3 p-2 border {{ request()->routeIs('backend_Settings_Logo') ? 'active_menu' : '' }}">
        <a class="text-dark" href="{{ Route::has('backend_Settings_Logo') ? route('backend_Settings_Logo') : url('admin/dashboard/settings/theme-options') }}">
            <i class="fa-solid fa-gear me-2"></i>
            Logo
        </a>
    </div>
    <div class="px-3 p-2 border {{ request()->routeIs('admin_Settings_Sitemap') ? 'active_menu' : '' }}">
        <a class="text-dark" href="{{ Route::has('admin_Settings_Sitemap') ? route('admin_Settings_Sitemap') : url('admin/dashboard/settings/sitemap') }}">
            <i class="fa-solid fa-gear me-2"></i>
            Sitemap
        </a>
    </div>
    <div class="px-3 p-2 border {{ request()->routeIs('admin_Settings_Cache') ? 'active_menu' : '' }}">
        <a class="text-dark" href="{{ Route::has('admin_Settings_Cache') ? route('admin_Settings_Cache') : url('admin/dashboard/settings/cache') }}">
            <i class="fa-solid fa-gear me-2"></i>
            Cache Section
        </a>
    </div>
    <div class="px-3 p-2 border {{ request()->routeIs('admin.hero.*', 'admin.spotlight.*', 'admin.services.*', 'admin.consultation.*', 'admin.ratings.*', 'admin.benefits.*', 'admin.clients.*', 'admin.testimonials.*', 'admin.gallery.*') ? 'active_menu' : '' }}">
        <a class="text-dark" href="{{ Route::has('admin.hero.index') ? route('admin.hero.index') : url('admin/dashboard/homepage/hero') }}">
            <i class="fa-solid fa-layer-group me-2"></i>
            Section Manage
        </a>
    </div>
    <div class="px-3 p-2 border {{ request()->routeIs('backend_Settings_Header') ? 'active_menu' : '' }}">
        <a class="text-dark" href="{{ Route::has('backend_Settings_Header') ? route('backend_Settings_Header') : url('admin/dashboard/settings/theme-options/header') }}">
            <i class="fa-solid fa-heading me-2"></i>
            Header
        </a>
    </div>
    <div class="px-3 p-2 border {{ request()->routeIs('backend_Settings_Footer') ? 'active_menu' : '' }}">
        <a class="text-dark" href="{{ Route::has('backend_Settings_Footer') ? route('backend_Settings_Footer') : url('admin/dashboard/settings/theme-options/footer') }}">
            <i class="fa-solid fa-shoe-prints me-2"></i>
            Footer
        </a>
    </div>
</div>
