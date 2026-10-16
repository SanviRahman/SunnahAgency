@extends('frontend.layouts.master')
{{-- @section('title', 'Course | Sunnah digital Agency') --}}
@section('content')

    <!--Banner Section Start-->
    <section class="banner-section">
        <div class="shape">
            <img src="{{ asset('frontend') }}/assets/images/vector/s-vector.png" alt="shape">
        </div>
        <div class="shape2">
            <img src="{{ asset('frontend') }}/assets/images/vector/s-vector.png" alt="shape">
        </div>
        <div class="d3-vector">
            <img src="{{ asset('frontend') }}/assets/images/vector/3r-vector.png" alt="3d-vector">
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-7 col-lg-7 wow fadeInDown" data-wow-delay="0.1s">
                    <div class="banner-content">
                        {{-- <div class="emoji">
                            <img src="{{ asset('frontend') }}/assets/images/banner/emoji.png" alt="emoji">
                        </div> --}}
                        <h5 class="sub">
                            {{ $banner->title }}
                        </h5>
                        <h1>
                            @php
                                $words = explode(' ', $banner->sort_title); // Split the string into an array of words
                                $lastWord = array_pop($words); // Remove and store the last word
                                $restOfTitle = implode(' ', $words); // Join the remaining words back into a string
                            @endphp

                            {{ $restOfTitle }}
                            <span class="text-base-2">{{ $lastWord }}</span>
                        </h1>
                        <p>
                            {{ $banner->description }}
                        </p>
                        <div class="btn-group">
                            <a href="{{ route('frontend_About_Index') }}" class="cmn--btn">
                                About us
                            </a>
                            <a href="{{ route('frontend_Contact_Index') }}" class="cmn--btn-2">
                                Contact us
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-5 col-md-8">
                    <div class="banner-thumb wow fadeInRight">
                        <img src="{{ asset('/media/banner') . '/' . $banner->image }}" alt="hero-img">
                        <div class="star1">
                            <img src="{{ asset('frontend') }}/assets/images/vector/vector1.png" alt="v-img">
                        </div>
                        <div class="star2">
                            <img src="{{ asset('frontend') }}/assets/images/vector/vector2.png" alt="v-img">
                        </div>
                        <div class="star3">
                            <img src="{{ asset('frontend') }}/assets/images/vector/vector3.png" alt="v-img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Banner Section End-->


    <!--Course Section Start-->
    <section class="protfolio-section bg-two py-5">
        <div class="shape">
            <img src="{{ asset('frontend') }}/assets/images/vector/s-vector.png" alt="shape">
        </div>
        <div class="shape2">
            <img src="{{ asset('frontend') }}/assets/images/vector/s-vector.png" alt="shape">
        </div>
        <div class="container">
            <div class="section-header section-center wow fadeInUp" data-wow-delay="0.2s">
                <h5 class="sub-center">
                    <span>Course</span>
                </h5>
                <h1 class="section-title">
                    Our Latest Course
                </h1>
            </div>
            <div class="row g-4 justify-content-center">
                @foreach ($courses as $course)
                    <div class="col-lg-4 col-md-6 col-sm-8 wow bounceInUp" data-wow-duration="2s">
                        <div class="protfolio-item">
                            <div class="protfolio-inner">
                                <div class="protfolio-thumb">
                                    <a href="protfolio-details.html">
                                        <img src="{{ asset('/media/course') . '/' . $course->image }}" alt="i-img">
                                    </a>
                                </div>
                                <div class="protfolio-content">
                                    <h4 class="title">
                                        <a href="protfolio-details.html">{{ $course->title }}</a>
                                    </h4>
                                    <p>
                                        {{ $course->sort_description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--Course Section End-->


    <!--About Section Start-->
    <section class="about-section bg-white py-5">
        <div class="shape">
            <img src="{{ asset('frontend') }}/assets/images/vector/s-vector.png" alt="shape">
        </div>
        <div class="shape2">
            <img src="{{ asset('frontend') }}/assets/images/vector/s-vector.png" alt="shape">
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-content">
                        <div class="section-header">
                            <div class="section-header wow fadeInUp" data-wow-delay="0.2s">
                                <h5 class="sub">
                                    About us
                                </h5>
                                <h1 class="section-title">
                                    {{ $about->title }}
                                </h1>
                                <p>
                                    {!! $about->description !!}
                                </p>
                            </div>
                        </div>
                        {{-- <div class="about-counter-wrapper">
                            <div class="counter-items odometer-item">
                                <div class="counter-content">
                                    <div class="cont d-flex align-items-center">
                                        <h2 class="odometer" data-odometer-final="24">
                                            0
                                        </h2>
                                    </div>
                                    <p>
                                        Project
                                    </p>
                                </div>
                            </div>
                            <div class="counter-items odometer-item">
                                <div class="counter-content">
                                    <div class="cont d-flex align-items-center">
                                        <h2 class="odometer" data-odometer-final="125">
                                            0
                                        </h2>
                                    </div>
                                    <p>
                                        Headquarters
                                    </p>
                                </div>
                            </div>
                            <div class="counter-items odometer-item">
                                <div class="counter-content">
                                    <div class="cont d-flex align-items-center">
                                        <h2 class="odometer" data-odometer-final="17">
                                            0
                                        </h2>
                                    </div>
                                    <p>
                                        Award Winner
                                    </p>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-thumb">
                        <div class="thumb-main wow fadeInUp" data-wow-duration="2s">
                            <img src="{{ asset('/media/about') . '/' . $about->image }}" alt="s-img">
                        </div>
                        <div class="ab-thumb wow fadeInDown" data-wow-duration="2s">
                            <img src="{{ asset('/media/about') . '/' . $about->image }}" alt="a-img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--About Section End-->

    <!--Service Section Start-->
    <section class="service-section pt-120 carousel-space pb-120">
        <div class="shape">
            <img src="{{ asset('frontend') }}/assets/images/vector/s-vector.png" alt="shape">
        </div>
        <div class="shape2">
            <img src="{{ asset('frontend') }}/assets/images/vector/s-vector.png" alt="shape">
        </div>
        <div class="container">
            <div class="section-header wow fadeInUp" data-wow-delay="0.2s">
                <h5 class="sub">
                    Service
                </h5>
                <h1 class="section-title">
                    What we’re offering??
                </h1>
            </div>
            <div class="tweet-slider owl-theme owl-carousel">
                @foreach ($services as $service)
                    <div class="service-item">
                        <div class="service-inner">
                            {{-- <div class="service-thumb">
                                <img src="{{ asset('/media/service') . '/' . $service->image }}" alt="i-img">
                            </div> --}}
                            <img src="{{ asset('/media/service') . '/' . $service->image }}" alt="i-img" class="mb-2"
                                style="height: 200px; width: 100%; object-fit:cover;">

                            <h4 class="title">
                                <a href="{{ route('frontend_Service_Single', $service->slug) }}">
                                    {{ $service->title }}
                                </a>
                            </h4>
                            <p>
                                {{ $service->sort_description }}
                            </p>
                            <a href="{{ route('frontend_Service_Single', $service->slug) }}" class="link-btn">
                                Get Started <i class="fas fa-angle-double-right"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--Service Section End-->


    <!--Team Section Start-->
    <section class="team-section bg-white py-5">
        <div class="shape">
            <img src="{{ asset('frontend') }}/assets/images/vector/s-vector.png" alt="shape">
        </div>
        <div class="shape2">
            <img src="{{ asset('frontend') }}/assets/images/vector/s-vector.png" alt="shape">
        </div>
        <div class="container">
            <div class="section-header section-center wow fadeInUp" data-wow-delay="0.2s">
                <h5 class="sub-center">
                    <span>Our Team</span>
                </h5>
                <h1 class="section-title">
                    We are here for you
                </h1>
            </div>
            <div class="row g-4 justify-content-center">
                @foreach ($teams as $team)
                    <div class="col-lg-4 col-md-6 col-sm-8 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="team-item">
                            <div class="team-inner">
                                <div class="team-thumb">
                                    <img src="{{ asset('/media/team') . '/' . $team->image }}" alt="i-img"
                                        style="object-fit: cover; height:350px">
                                    <ul class="team-social">
                                        <li>
                                            <a href="#0">
                                                <i class="fab fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#0">
                                                <i class="fas fa-envelope"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#0">
                                                <i class="fab fa-vimeo"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#0">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="team-content">
                                    <h4 class="title">
                                        <a href="team-details.html">
                                            {{ $team->name }}
                                        </a>
                                    </h4>
                                    <p>
                                        {{ $team->sort_description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--Team Section End-->

    <!--Testimonial Section Start-->
    <section class="testimonial-section bg-two test-space py-5">
        <div class="shape">
            <img src="{{ asset('frontend') }}/assets/images/vector/s-vector.png" alt="shape">
        </div>
        <div class="shape2">
            <img src="{{ asset('frontend') }}/assets/images/vector/s-vector.png" alt="shape">
        </div>
        <div class="container">
            <div class="section-header section-center wow fadeInUp" data-wow-delay="0.2s">
                <h5 class="sub-center">
                    <span>Client Testimonial</span>
                </h5>
                <h1 class="section-title">
                    Our Happy Customer Say
                    About Company
                </h1>
            </div>
            <div class="tweet-slider owl-theme owl-carousel">
                <div class="testimonial-item">
                    <div class="testimonial-inner">
                        <div class="testimonial-icon">
                            <i class="fas fa-quote-left"></i>
                        </div>
                        <ul class="ratting">
                            <li>
                                <i class="fas fa-star"></i>
                            </li>
                            <li>
                                <i class="fas fa-star"></i>
                            </li>
                            <li>
                                <i class="fas fa-star"></i>
                            </li>
                            <li>
                                <i class="fas fa-star"></i>
                            </li>
                            <li>
                                <i class="fas fa-star"></i>
                            </li>
                        </ul>
                        <h6 class="title">
                            NBC (National Broadcasting Company)
                        </h6>
                        <p>
                            I’ve written about creating a new business plan and the benefits of an agency sales process
                            here.
                        </p>
                    </div>
                </div>
                <div class="testimonial-item">
                    <div class="testimonial-inner">
                        <div class="testimonial-icon">
                            <i class="fas fa-quote-left"></i>
                        </div>
                        <ul class="ratting">
                            <li>
                                <i class="fas fa-star"></i>
                            </li>
                            <li>
                                <i class="fas fa-star"></i>
                            </li>
                            <li>
                                <i class="fas fa-star"></i>
                            </li>
                            <li>
                                <i class="fas fa-star"></i>
                            </li>
                            <li>
                                <i class="fas fa-star"></i>
                            </li>
                        </ul>
                        <h6 class="title">
                            FFI (Fly Far International LTD)
                        </h6>
                        <p>
                            I’ve written about creating a new business plan and the benefits of an agency sales process
                            here.
                        </p>
                    </div>
                </div>
                <div class="testimonial-item">
                    <div class="testimonial-inner">
                        <div class="testimonial-icon">
                            <i class="fas fa-quote-left"></i>
                        </div>
                        <ul class="ratting">
                            <li>
                                <i class="fas fa-star"></i>
                            </li>
                            <li>
                                <i class="fas fa-star"></i>
                            </li>
                            <li>
                                <i class="fas fa-star"></i>
                            </li>
                            <li>
                                <i class="fas fa-star"></i>
                            </li>
                            <li>
                                <i class="fas fa-star"></i>
                            </li>
                        </ul>
                        <h6 class="title">
                            BG (Bashundhara Group LTD)
                        </h6>
                        <p>
                            I’ve written about creating a new business plan and the benefits of an agency sales process
                            here.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Testimonial Section End-->

    <!--Solution Section Start-->
    <section class="solution-section bg-one py-5">
        <div class="shape">
            <img src="{{ asset('frontend') }}/assets/images/vector/s-vector.png" alt="shape">
        </div>
        <div class="shape2">
            <img src="{{ asset('frontend') }}/assets/images/vector/s-vector.png" alt="shape">
        </div>
        <div class="container">
            <div class="row g-4 align-items-center">
                <div class="solution-wrapper">
                    <div class="section-header section-center wow fadeInUp" data-wow-delay="0.2s">
                        <h5 class="sub-center">
                            <span>Let's Start</span>
                        </h5>
                        <h1 class="section-title">
                            Join our team to create the
                            best digital solutions.
                        </h1>
                        <p>
                            If there is anything I want readers to get from a post like this, its to understand that
                            even
                            though they may be bona fide rock stars at branding and writing website copy
                        </p>
                        <div class="btn-wrapper d-flex align-items-center justify-content-center">
                            <a href="contact.html" class="cmn--btn-2">
                                <span>Get Started</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Solution Section End-->
@endsection
