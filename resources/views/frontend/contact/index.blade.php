@extends('frontend.layouts.master')

@section('title', 'যোগাযোগ | Sunnah Digital Agency')

@php
    $statusOptions = $contactSettings->status_options ?: \App\Models\ContactPageSetting::defaultStatusOptions();
    $businessTypeOptions = $contactSettings->business_type_options ?: \App\Models\ContactPageSetting::defaultBusinessTypeOptions();

    $contactAddress = $websiteInfo?->address ?: $personalInfo?->address;
    $contactEmail = $websiteInfo?->email ?: $personalInfo?->email;
    $contactPhone = $websiteInfo?->number ?: $personalInfo?->number;
    $contactWhatsapp = $websiteInfo?->wattsup_number ?: $personalInfo?->wattsup_number;

    $socialSources = [
        ['label' => 'Facebook', 'icon' => 'fab fa-facebook-f', 'url' => $websiteInfo?->facebook ?: ($personalInfo?->facebook_page_url ?: $personalInfo?->facebook)],
        ['label' => 'Instagram', 'icon' => 'fab fa-instagram', 'url' => $websiteInfo?->instagram ?: $personalInfo?->instagram],
        ['label' => 'Twitter', 'icon' => 'fab fa-twitter', 'url' => $websiteInfo?->twitter ?: $personalInfo?->twitter],
        ['label' => 'LinkedIn', 'icon' => 'fab fa-linkedin-in', 'url' => $websiteInfo?->linkdin ?: $personalInfo?->linkdin],
        ['label' => 'YouTube', 'icon' => 'fab fa-youtube', 'url' => $personalInfo?->youtube],
    ];

    $socialLinks = collect($socialSources)
        ->map(function ($item) {
            $url = is_string($item['url'] ?? null) ? trim($item['url']) : '';
            $item['url'] = preg_match('/^https?:\/\//i', $url) ? $url : null;
            return $item;
        })
        ->filter(fn ($item) => !empty($item['url']))
        ->values();

    $phoneHref = $contactPhone ? preg_replace('/[^0-9+]/', '', $contactPhone) : null;
    $whatsappHref = $contactWhatsapp ? preg_replace('/[^0-9]/', '', $contactWhatsapp) : null;
@endphp

@push('homepage_hero_after_main')
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/sda-contact.css') }}?v=1.0">
@endpush

@section('content')
    <main class="sda-contact-page">
        <section class="sda-contact-hero" aria-labelledby="sda-contact-title">
            <div class="sda-contact-hero__grid" aria-hidden="true"></div>

            <div class="container sda-contact-hero__container">
                <div class="sda-contact-hero__copy">
                    @if ($contactSettings->eyebrow)
                        <span class="sda-contact-kicker">{{ $contactSettings->eyebrow }}</span>
                    @endif

                    <h1 id="sda-contact-title">{{ $contactSettings->heading }}</h1>

                    @if ($contactSettings->description)
                        <p>{{ $contactSettings->description }}</p>
                    @endif

                    @if ($contactSettings->badge_text)
                        <div class="sda-contact-badge">
                            <span class="sda-contact-badge__dot" aria-hidden="true"></span>
                            <span>{{ $contactSettings->badge_text }}</span>
                        </div>
                    @endif
                </div>

                <nav class="sda-contact-breadcrumb" aria-label="Breadcrumb">
                    <a href="{{ route('home_Index') }}">হোম</a>
                    <span aria-hidden="true">/</span>
                    <span>যোগাযোগ</span>
                </nav>
            </div>
        </section>

        <section class="sda-contact-main" aria-labelledby="sda-contact-form-title">
            <div class="container sda-contact-main__container">
                <aside class="sda-contact-intro">
                    <span class="sda-contact-intro__eyebrow">চলুন কথা বলি</span>
                    <h2>আপনার আইডিয়াটা নিয়ে কথা বলি।</h2>
                    <p>
                        একটি ভালো কথোপকথন থেকেই অনেক সময় সঠিক সিদ্ধান্তের শুরু হয়।
                        আপনার ব্যবসা, আইডিয়া বা মার্কেটিংয়ের চ্যালেঞ্জ আমাদের জানান—
                        আমরা শুনব, বুঝব এবং প্রয়োজন অনুযায়ী গাইড করব।
                    </p>

                    <div class="sda-contact-info-list">
                        @if ($contactAddress)
                            <a class="sda-contact-info" href="https://maps.google.com/?q={{ urlencode($contactAddress) }}" target="_blank" rel="noopener noreferrer">
                                <span class="sda-contact-info__icon" aria-hidden="true"><i class="fas fa-location-dot"></i></span>
                                <span>
                                    <small>ঠিকানা</small>
                                    <strong>{{ $contactAddress }}</strong>
                                </span>
                            </a>
                        @endif

                        @if ($contactPhone)
                            <a class="sda-contact-info" href="tel:{{ $phoneHref }}">
                                <span class="sda-contact-info__icon" aria-hidden="true"><i class="fas fa-phone"></i></span>
                                <span>
                                    <small>ফোন</small>
                                    <strong>{{ $contactPhone }}</strong>
                                </span>
                            </a>
                        @endif

                        @if ($contactEmail)
                            <a class="sda-contact-info" href="mailto:{{ $contactEmail }}">
                                <span class="sda-contact-info__icon" aria-hidden="true"><i class="fas fa-envelope"></i></span>
                                <span>
                                    <small>ইমেইল</small>
                                    <strong>{{ $contactEmail }}</strong>
                                </span>
                            </a>
                        @endif

                        @if ($contactWhatsapp)
                            <a class="sda-contact-info" href="https://wa.me/{{ $whatsappHref }}" target="_blank" rel="noopener noreferrer">
                                <span class="sda-contact-info__icon" aria-hidden="true"><i class="fab fa-whatsapp"></i></span>
                                <span>
                                    <small>WhatsApp</small>
                                    <strong>{{ $contactWhatsapp }}</strong>
                                </span>
                            </a>
                        @endif
                    </div>

                    @if ($socialLinks->isNotEmpty())
                        <div class="sda-contact-social">
                            <span>সোশ্যাল মিডিয়া</span>
                            <div class="sda-contact-social__links">
                                @foreach ($socialLinks as $social)
                                    <a href="{{ $social['url'] }}" target="_blank" rel="noopener noreferrer" aria-label="{{ $social['label'] }}" title="{{ $social['label'] }}">
                                        <i class="{{ $social['icon'] }}" aria-hidden="true"></i>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </aside>

                <div class="sda-contact-form-card" id="contact-form">
                    <div class="sda-contact-form-card__top">
                        <span class="sda-contact-form-card__line" aria-hidden="true"></span>
                        <div>
                            <h2 id="sda-contact-form-title">{{ $contactSettings->form_heading }}</h2>
                            @if ($contactSettings->form_description)
                                <p>{{ $contactSettings->form_description }}</p>
                            @endif
                        </div>
                    </div>

                    @if (session('contact_success'))
                        <div class="sda-contact-alert sda-contact-alert--success" role="status">
                            <i class="fas fa-circle-check" aria-hidden="true"></i>
                            <span>{{ session('contact_success') }}</span>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="sda-contact-alert sda-contact-alert--error" role="alert">
                            <i class="fas fa-circle-exclamation" aria-hidden="true"></i>
                            <span>ফর্মের তথ্যগুলো একবার দেখে আবার চেষ্টা করুন।</span>
                        </div>
                    @endif

                    @if ($contactSettings->is_active)
                        <form method="POST" action="{{ route('frontend_Contact_Store') }}" class="sda-contact-form">
                            @csrf

                            <div class="sda-contact-honeypot" aria-hidden="true">
                                <label for="contact-honeypot">Website</label>
                                <input id="contact-honeypot" name="contact_honeypot" type="text" tabindex="-1" autocomplete="off">
                            </div>

                            <div class="sda-contact-form__grid">
                                <div class="sda-contact-field">
                                    <label for="contact-name">
                                        {{ $contactSettings->name_label }} <span>*</span>
                                    </label>
                                    <input
                                        id="contact-name"
                                        type="text"
                                        name="name"
                                        maxlength="140"
                                        autocomplete="name"
                                        value="{{ old('name') }}"
                                        placeholder="{{ $contactSettings->name_placeholder }}"
                                        required
                                        class="@error('name') is-invalid @enderror"
                                    >
                                    @error('name')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="sda-contact-field">
                                    <label for="contact-phone">
                                        {{ $contactSettings->phone_label }} <span>*</span>
                                    </label>
                                    <input
                                        id="contact-phone"
                                        type="tel"
                                        name="phone"
                                        maxlength="32"
                                        autocomplete="tel"
                                        inputmode="tel"
                                        value="{{ old('phone') }}"
                                        placeholder="{{ $contactSettings->phone_placeholder }}"
                                        required
                                        class="@error('phone') is-invalid @enderror"
                                    >
                                    @error('phone')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="sda-contact-field sda-contact-field--full">
                                    <label for="contact-email">
                                        {{ $contactSettings->email_label }} <span>*</span>
                                    </label>
                                    <input
                                        id="contact-email"
                                        type="email"
                                        name="email"
                                        maxlength="254"
                                        autocomplete="email"
                                        value="{{ old('email') }}"
                                        placeholder="{{ $contactSettings->email_placeholder }}"
                                        required
                                        class="@error('email') is-invalid @enderror"
                                    >
                                    @error('email')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>

                                <fieldset class="sda-contact-field sda-contact-field--full">
                                    <legend>{{ $contactSettings->status_label }} <span>*</span></legend>
                                    <div class="sda-contact-status-list">
                                        @foreach ($statusOptions as $option)
                                            <label class="sda-contact-radio">
                                                <input
                                                    type="radio"
                                                    name="current_status"
                                                    value="{{ $option }}"
                                                    {{ old('current_status') === $option ? 'checked' : '' }}
                                                    required
                                                >
                                                <span>{{ $option }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                    @error('current_status')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </fieldset>

                                @if ($contactSettings->website_label)
                                    <div class="sda-contact-field sda-contact-field--full">
                                        <label for="contact-website">
                                            {{ $contactSettings->website_label }}
                                        </label>
                                        <input
                                            id="contact-website"
                                            type="url"
                                            name="website_link"
                                            maxlength="512"
                                            inputmode="url"
                                            value="{{ old('website_link') }}"
                                            placeholder="{{ $contactSettings->website_placeholder }}"
                                            class="@error('website_link') is-invalid @enderror"
                                        >
                                        @error('website_link')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                @endif

                                <div class="sda-contact-field sda-contact-field--full">
                                    <label for="contact-business-type">
                                        {{ $contactSettings->business_type_label }} <span>*</span>
                                    </label>
                                    <select
                                        id="contact-business-type"
                                        name="business_type"
                                        required
                                        class="@error('business_type') is-invalid @enderror"
                                    >
                                        <option value="" disabled {{ old('business_type') ? '' : 'selected' }}>
                                            {{ $contactSettings->business_type_placeholder }}
                                        </option>
                                        @foreach ($businessTypeOptions as $option)
                                            <option value="{{ $option }}" {{ old('business_type') === $option ? 'selected' : '' }}>
                                                {{ $option }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('business_type')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="sda-contact-field sda-contact-field--full">
                                    <label for="contact-details">
                                        {{ $contactSettings->details_label }} <span>*</span>
                                    </label>
                                    <textarea
                                        id="contact-details"
                                        name="business_details"
                                        rows="5"
                                        minlength="20"
                                        maxlength="4000"
                                        placeholder="{{ $contactSettings->details_placeholder }}"
                                        required
                                        class="@error('business_details') is-invalid @enderror"
                                    >{{ old('business_details') }}</textarea>
                                    @error('business_details')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <label class="sda-contact-consent" for="contact-consent">
                                <input
                                    id="contact-consent"
                                    type="checkbox"
                                    name="consent"
                                    value="1"
                                    required
                                    {{ old('consent') ? 'checked' : '' }}
                                >
                                <span>{{ $contactSettings->consent_text }}</span>
                            </label>
                            @error('consent')
                                <small class="sda-contact-consent-error">{{ $message }}</small>
                            @enderror

                            <div class="sda-contact-submit-row">
                                <button type="submit" class="sda-contact-submit">
                                    <span>{{ $contactSettings->submit_button_text }}</span>
                                    <i class="fas fa-arrow-right" aria-hidden="true"></i>
                                </button>
                            </div>

                            @if ($contactSettings->privacy_note)
                                <p class="sda-contact-privacy">
                                    <i class="fas fa-lock" aria-hidden="true"></i>
                                    <span>{{ $contactSettings->privacy_note }}</span>
                                </p>
                            @endif
                        </form>
                    @else
                        <div class="sda-contact-inactive">
                            <div class="sda-contact-inactive__icon"><i class="fas fa-clock" aria-hidden="true"></i></div>
                            <h3>ফর্মটি এখন বন্ধ আছে</h3>
                            <p>{{ $contactSettings->inactive_message }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </section>
    </main>
@endsection
