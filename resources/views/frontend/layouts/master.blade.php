<!DOCTYPE html>
<html lang="en">

<head>
    @php
        $seo = App\Models\Seo::first();
        $logo = App\Models\Logo::first();
        $admin = App\Models\Admin::first();
        $websiteInfo = App\Models\WebsiteInfo::first();
    @endphp
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="keywords" content="@yield('meta_keywords', optional($seo)->keywords ?? 'sunnahdigitalagency.com'))" />
    <meta name="description" content="@yield('meta_description', optional($seo)->description ?? 'sunnahdigitalagency.com'))" />
    <meta name="author" content="Codescandy">
    <link rel="canonical" href="{{ url()->current() }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <meta property="og:title" content="@yield('title')" />
    <meta property="og:description" content="@yield('meta_description')" />
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('/media/logo') . '/' . $logo->frontlogo }}" />

    <meta name="twitter:site" content="@sunnahdigitalagency.com" />
    <meta name="twitter:title" content="@yield('meta_title', optional($seo)->title ?? 'sunnahdigitalagency.com'))" />
    <meta name="twitter:description" content="@yield('meta_description', optional($seo)->description ?? 'sunnahdigitalagency.com'))" />
    <meta name="twitter:keywords" content="@yield('meta_keywords', optional($seo)->keywords ?? 'sunnahdigitalagency.com'))" />
    <meta name="twitter:image" content="{{ asset('/media/logo') . '/' . $logo->frontlogo }}" />

    <title>@yield('title', 'Sunnah digital Agency')</title>
    <!--Favicon img-->
    <link rel="shortcut icon" href="{{ asset('/media/logo') . '/' . $logo->favicon }}">
    <!--Bootstarp min css-->
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/bootstrap.min.css">
    <!--Bootstarp map css-->
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/bootstrap.css.map">
    <!--Odometer css-->
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/odometer.css">
    <!--Animate css-->
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/animate.css">
    <!--Magnific Popup css-->
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/magnific-popup.css">
    <!--All min css-->
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/all.min.css">
    <!--Owl Carousel min css-->
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/owl.carousel.min.css">
    <!--main css-->
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/main.css">
</head>

<body>

    <!--Scroll Top Bottom-->
    <div id="progress">
        <span id="valiu"><img src="{{ asset('frontend') }}/assets/images/logo/top.png" alt="img-top"></span>
    </div>
    <!--Scroll Top Bottom-->

    <!--Preloader -->
    {{-- <div id="preloader">
        <div id="loader"></div>
    </div> --}}
    <!--Preloader -->

    <!-- Header -->
    @include('frontend.layouts.header')
    <!-- Header -->

    <!-- CONTENT AREA  -->
    @yield('content')
    <!-- CONTENT AREA  -->

    <!-- Footer -->
    @include('frontend.layouts.footer')
    <!-- Footer -->


    <!--Jquery 3 6 0 Min Js-->
    <script src="{{ asset('frontend') }}/assets/js/jquery-3.6.0.min.js"></script>
    <!--Bootstrap bundle Js-->
    <script src="{{ asset('frontend') }}/assets/js/bootstrap.bundle.js"></script>
    <!--Viewport Jquery Js-->
    <script src="{{ asset('frontend') }}/assets/js/viewport.jquery.js"></script>
    <!--Odometer min Js-->
    <script src="{{ asset('frontend') }}/assets/js/odometer.min.js"></script>
    <!--isotope min pkgd Js-->
    <script src="{{ asset('frontend') }}/assets/js/isotope.pkgd.min.js"></script>
    <!--Wow min Js-->
    <script src="{{ asset('frontend') }}/assets/js/wow.min.js"></script>
    <!--magnific Popup Js-->
    <script src="{{ asset('frontend') }}/assets/js/jquery.magnific-popup.min.js"></script>
    <!--Owl carousel Js-->
    <script src="{{ asset('frontend') }}/assets/js/owl.carousel.js"></script>
    <!--Owl carousel min Js-->
    <script src="{{ asset('frontend') }}/assets/js/owl.carousel.min.js"></script>
    <!--main Js-->
    <script src="{{ asset('frontend') }}/assets/js/main.js"></script>
</body>

</html>
