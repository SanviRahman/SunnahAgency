<!--Footer Section Start-->
@php
    $websiteInfo = $websiteInfo ?? \App\Models\WebsiteInfo::first();
    $personalInfo = $personalInfo ?? \App\Models\PersonalInfo::first();

    $footerAddress = $websiteInfo?->address ?: $personalInfo?->address;
    $footerEmail = $websiteInfo?->email ?: $personalInfo?->email;
    $footerNumber = $websiteInfo?->number ?: $personalInfo?->number;
    $footerWhatsapp = $websiteInfo?->wattsup_number ?: $personalInfo?->wattsup_number;

    $footerFacebook = $websiteInfo?->facebook ?: ($personalInfo?->facebook_page_url ?: $personalInfo?->facebook);
    $footerInstagram = $websiteInfo?->instagram ?: $personalInfo?->instagram;
    $footerTwitter = $websiteInfo?->twitter ?: $personalInfo?->twitter;
    $footerLinkedin = $websiteInfo?->linkdin ?: $personalInfo?->linkdin;
    $footerYoutube = $personalInfo?->youtube;
@endphp
<section class="footer-section sda-footer-dark">
    {{-- Decorative dotted corner graphics intentionally removed. --}}
    <div class="container">
        <div class="footer-top pt-120 pb-80">
            <div class="row g-4">
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 ">
                    <div class="widget-items">
                        <div class="footer-head">
                            <a href="{{ route('home_Index') }}" class="footer-logo1">
                                <img src="{{ \App\Support\WebsiteMedia::url('media/logo/' . ($logo->frontlogo ?? 'frontlogo.png')) }}" alt="logo-img"
                                    style="height: 60px;">
                            </a>
                        </div>
                        <div class="content-area">
                            <p>
                                {{ $websiteInfo?->sort_descroption ?? ($personalInfo?->sort_description ?? '') }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6 ">
                    <div class="widget-items">
                        <div class="footer-head">
                            <h4 class="title">
                                Quick Links
                            </h4>
                        </div>
                        <div class="content-area">
                            <ul class="quick-link">
                                <li>
                                    <a href="{{ route('frontend_Project_Index') }}">
                                        Project
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('frontend_About_Index') }}">
                                        About us
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('frontend_Blog_Index') }}">
                                        Our Blog
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('frontend_Team_Index') }}">
                                        Our Team
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('frontend_Contact_Index') }}">
                                        Contact
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6 ">
                    <div class="widget-items">
                        <div class="footer-head">
                            <h4 class="title">
                                Company
                            </h4>
                        </div>
                        <div class="content-area">
                            <ul class="footer-contact-list">
                                <li>
                                    <a href="{{ route('frontend_About_Index') }}">
                                        About us
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('frontend_Service_Index') }}">
                                        How I Work
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('frontend_Contact_Index') }}">
                                        Careers
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('frontend_Success_Story_Index') }}">
                                        Customer Reviews
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('frontend_Contact_Index') }}">
                                        FeedBack
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 ">
                    <div class="widget-items">
                        <div class="footer-head">
                            <h4 class="title">
                                Say Hello
                            </h4>
                        </div>
                        <ul class="hellow">
                            @if(!empty($footerAddress))
                                <li>
                                    <a href="https://maps.google.com/?q={{ urlencode($footerAddress) }}" target="_blank" rel="noopener noreferrer">
                                        {{ $footerAddress }}
                                    </a>
                                </li>
                            @endif
                            @if(!empty($footerEmail))
                                <li>
                                    <a href="mailto:{{ $footerEmail }}">
                                        {{ $footerEmail }}
                                    </a>
                                </li>
                            @endif
                            @if(!empty($footerNumber))
                                <li>
                                    <a href="tel:{{ preg_replace('/[^0-9+]/', '', $footerNumber) }}">
                                        {{ $footerNumber }}
                                    </a>
                                </li>
                            @endif
                        </ul>
                        <div class="content-area">
                            <ul class="footer-social">
                                @if(!empty($footerFacebook))
                                    <li>
                                        <a href="{{ $footerFacebook }}" target="_blank" rel="noopener noreferrer" title="Facebook">
                                            <i class="fab fa-facebook"></i>
                                        </a>
                                    </li>
                                @endif
                                @if(!empty($footerInstagram))
                                    <li>
                                        <a href="{{ $footerInstagram }}" target="_blank" rel="noopener noreferrer" title="Instagram">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                @endif
                                @if(!empty($footerTwitter))
                                    <li>
                                        <a href="{{ $footerTwitter }}" target="_blank" rel="noopener noreferrer" title="Twitter">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                @endif
                                @if(!empty($footerLinkedin))
                                    <li>
                                        <a href="{{ $footerLinkedin }}" target="_blank" rel="noopener noreferrer" title="LinkedIn">
                                            <i class="fab fa-linkedin-in"></i>
                                        </a>
                                    </li>
                                @endif
                                @if(!empty($footerYoutube))
                                    <li>
                                        <a href="{{ $footerYoutube }}" target="_blank" rel="noopener noreferrer" title="YouTube">
                                            <i class="fab fa-youtube"></i>
                                        </a>
                                    </li>
                                @endif
                                @if(!empty($footerWhatsapp))
                                    <li>
                                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $footerWhatsapp) }}" target="_blank" rel="noopener noreferrer" title="WhatsApp">
                                            <i class="fab fa-whatsapp"></i>
                                        </a>
                                    </li>
                                @endif
                                @if(empty($footerFacebook) && empty($footerInstagram) && empty($footerTwitter) && empty($footerLinkedin))
                                    <li><a href="javascript:void(0);"><i class="fab fa-facebook"></i></a></li>
                                    <li><a href="javascript:void(0);"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="javascript:void(0);"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="javascript:void(0);"><i class="fab fa-linkedin-in"></i></a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>Copyright &copy;2023
                <a href="http://sunnahdigitalagency.com/" target="_blank" class="text-base">Sunnah Digital Agency.</a> All Rights Reserved
            </p>
            <ul class="footer-bottom-link">
                <li>
                    <a href="{{ route('frontend_Contact_Index') }}">
                        Support
                    </a>
                </li>
                <li>
                    <a href="{{ route('frontend_Service_Index') }}">
                        Services
                    </a>
                </li>
                <li>
                    <a href="{{ route('frontend_About_Index') }}">
                        Terms & Condition
                    </a>
                </li>
            </ul>
        </div>
    </div>
</section>
<!--Footer Section End-->
