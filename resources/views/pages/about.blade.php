@extends('layouts.breadcrumbs')
@section('title', 'About')
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/module-css/about.css') }}?v={{ filemtime(public_path('assets/css/module-css/about.css')) }}"/>
<link rel="stylesheet" href="{{asset('assets/css/module-css/team.css')}}"/>
<link rel="stylesheet" href="{{ asset('assets/css/module-css/testimonial.css') }}?v={{ filemtime(public_path('assets/css/module-css/testimonial.css')) }}"/>
@endpush
@php
    $bodyClass = 'custom-cursor';
    $title = 'About Us';
    $subtitle = 'About Us';

    $home = $homeSettings ?? [];
    $homeAbout = (array) data_get($home, 'about', []);
    $aboutPage = (array) data_get($home, 'about_page', []);

    $aboutTagline = (string) data_get($aboutPage, 'tagline', data_get($homeAbout, 'tagline', 'About Us'));
    $aboutHeadingHtml = data_get($aboutPage, 'heading_html');
    if (!is_string($aboutHeadingHtml) || trim($aboutHeadingHtml) === '') {
        $aboutHeadingHtml = 'Our Story, Mission, Born from a passion\nfor innovation, <span>& Values</span><br> <span>That Drive Us Forward</span>';
    }
    $aboutText = (string) data_get($aboutPage, 'text', data_get($homeAbout, 'text', ''));
    if ($aboutText === '') {
        $aboutText = 'Med Open Press is a distinguished publishing entity devoted to the advancement of medical science through the dissemination of high-caliber books and rigorously peer-reviewed journals. Our mission is to contribute to the global medical discourse by providing access to the latest research findings, educational tools, and authoritative reference materials. Each publication under our banner undergoes stringent editorial scrutiny to ensure it meets the highest standards of scientific validity and relevance, thus serving the needs of clinicians, researchers, and educators across the healthcare continuum.';
    }

    $aboutPoints = (array) data_get($homeAbout, 'points', []);
    if (count($aboutPoints) === 0) {
        $aboutPoints = [
            ['icon' => 'icon-check', 'text' => 'Peer review & editorial rigor'],
            ['icon' => 'icon-check', 'text' => 'Global accessibility & knowledge equity'],
            ['icon' => 'icon-check', 'text' => 'Innovation through collaboration'],
            ['icon' => 'icon-check', 'text' => 'Ethics, transparency & integrity'],
        ];
    }

    $consultText = (string) data_get($aboutPage, 'consultation_button_text', 'Consultation');
    $consultUrl = (string) data_get($aboutPage, 'consultation_button_url', 'https://wa.me/628971399093');
    $officeHours = (string) data_get($aboutPage, 'office_hours', data_get($homeAbout, 'office_hours', 'Office Hours: 10:00 AM - 8:00 PM'));
    $phoneDisplay = (string) data_get($aboutPage, 'phone', data_get($homeAbout, 'phone', '+62 897 1399 093'));
    $phoneTel = preg_replace('/[^0-9\+]/', '', $phoneDisplay) ?: $phoneDisplay;

    $aboutPageImages = (array) data_get($aboutPage, 'images', []);
    $img1 = data_get($aboutPageImages, '0.image');
    $img2 = data_get($aboutPageImages, '1.image');
    $img3 = data_get($aboutPageImages, '2.image');
    $img4 = data_get($aboutPageImages, '3.image');
    $img1Url = $img1 ? asset('storage/' . ltrim($img1, '/')) : asset('assets/images/resources/about-two-img-1.jpg');
    $img2Url = $img2 ? asset('storage/' . ltrim($img2, '/')) : asset('assets/images/resources/about-two-img-2.jpg');
    $img3Url = $img3 ? asset('storage/' . ltrim($img3, '/')) : asset('assets/images/resources/about-two-img-3.jpg');
    $img4Url = $img4 ? asset('storage/' . ltrim($img4, '/')) : asset('assets/images/resources/about-two-img-4.jpg');

    $aboutPageCounters = (array) data_get($aboutPage, 'counters', []);
    $c1 = (array) data_get($aboutPageCounters, '0', ['count' => 25, 'suffix' => '+', 'label' => 'years of editorial experience']);
    $c2 = (array) data_get($aboutPageCounters, '1', ['count' => 98, 'suffix' => '%', 'label' => 'author satisfaction']);
    $c3 = (array) data_get($aboutPageCounters, '2', ['count' => 198, 'suffix' => '+', 'label' => 'published works']);

    $vision = (array) data_get($aboutPage, 'vision', []);
    $visionTitle = (string) data_get($vision, 'title', 'Our Vision');
    $visionSubtitle = (string) data_get($vision, 'subtitle', 'A global exchange of knowledge that advances medicine.');
    $visionText = (string) data_get($vision, 'text', 'Med Open Press envisions itself as a preeminent force in medical publishing, facilitating the global exchange of knowledge that fosters innovation, enhances clinical practice, and drives progress in medical science. Our goal is to empower healthcare professionals and researchers with the resources necessary to confront and overcome the most significant health challenges of our time.');

    $mission = (array) data_get($aboutPage, 'mission', []);
    $missionTitle = (string) data_get($mission, 'title', 'Our Mission');
    $missionSubtitle = (string) data_get($mission, 'subtitle', 'How we deliver excellence, access, and trust.');
    $missionPoints = (array) data_get($mission, 'points', []);
    if (count($missionPoints) === 0) {
        $missionPoints = [
            ['title' => 'Excellence in Publishing:', 'text' => 'To produce and disseminate peer-reviewed medical literature of the highest quality, reflecting the forefront of research and clinical practice.'],
            ['title' => 'Global Accessibility:', 'text' => 'To ensure the worldwide accessibility of our publications, thereby bridging disparities in knowledge and practice across diverse healthcare settings.'],
            ['title' => 'Promotion of Innovation:', 'text' => 'To collaborate with leading experts, academic institutions, and professional societies in medicine, thereby fostering the development and dissemination of pioneering research.'],
            ['title' => 'Commitment to Education:', 'text' => 'To provide robust educational resources that support the continuous professional development of healthcare providers, enhancing their ability to deliver superior patient care.'],
            ['title' => 'Adherence to Ethical Standards:', 'text' => 'To uphold the utmost ethical principles in all facets of publishing, guaranteeing transparency, accountability, and integrity in our operations and outputs.'],
        ];
    }
    $missionLeft = array_slice($missionPoints, 0, (int) ceil(count($missionPoints) / 2));
    $missionRight = array_slice($missionPoints, count($missionLeft));

@endphp
@section('content')
     <!--About Two Start -->
        <section class="about-two about-page">
            <div class="about-two__shape-1 float-bob-y">
                <img src="{{ asset('assets/images/shapes/about-two-shape-1.png') }}" alt="">
            </div>
            <div class="about-two__shape-2 rotate-me">
                <img src="{{ asset('assets/images/shapes/about-two-shape-2.png') }}" alt="">
            </div>
            <div class="about-two__shape-3 img-bounce">
                <img src="{{ asset('assets/images/shapes/about-two-shape-3.png') }}" alt="">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="about-two__left">
                            <div class="about-two__img-shape-1 img-bounce"></div>
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                                    <div class="about-two__left-img-box">
                                        <div class="about-two__img-1">
                                            <img src="{{ $img1Url }}" alt="">
                                        </div>
                                        <div class="about-two__img-2">
                                            <img src="{{ $img2Url }}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                                    <div class="about-two__left-img-box-2">
                                        <div class="about-two__img-3">
                                            <img src="{{ $img3Url }}" alt="">
                                        </div>
                                        <div class="about-two__img-4">
                                            <img src="{{ $img4Url }}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="about-two__right">
                            <div class="section-title text-left sec-title-animation animation-style2">
                                <div class="section-title__tagline-box">
                                    <div class="section-title__tagline-shape-box">
                                        <div class="section-title__tagline-shape"></div>
                                        <div class="section-title__tagline-shape-2"></div>
                                    </div>
                                    <span class="section-title__tagline">{{ $aboutTagline }}</span>
                                </div>
                                <h2 class="section-title__title title-animation">{!! $aboutHeadingHtml !!}</h2>
                            </div>
                                <p class="about-two__text">{{ $aboutText }}</p>
                            <div class="about-two__experience-and-counter">
                                <div class="about-two__counter">
                                    <ul class="about-two__counter-list list-unstyled">
                                        <li>
                                            <div class="about-two__counter-single">
                                                <div class="about-two__counter-count">
                                                    <h3 class="odometer" data-count="{{ (int) data_get($c1, 'count', 25) }}">00</h3>
                                                    <span>{{ (string) data_get($c1, 'suffix', '+') }}</span>
                                                </div>
                                                <p>{{ (string) data_get($c1, 'label', 'years of editorial experience') }}</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="about-two__counter-single">
                                                <div class="about-two__counter-count">
                                                    <h3 class="odometer" data-count="{{ (int) data_get($c2, 'count', 98) }}">00</h3>
                                                    <span>{{ (string) data_get($c2, 'suffix', '%') }}</span>
                                                </div>
                                                <p>{{ (string) data_get($c2, 'label', 'author satisfaction') }}</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="about-two__counter-single">
                                                <div class="about-two__counter-count">
                                                    <h3 class="odometer" data-count="{{ (int) data_get($c3, 'count', 198) }}">00</h3>
                                                    <span>{{ (string) data_get($c3, 'suffix', '+') }}</span>
                                                </div>
                                                <p>{{ (string) data_get($c3, 'label', 'published works') }}</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="about-two__points-and-mission-box">
                                <ul class="about-two__points list-unstyled">
                                    @foreach($aboutPoints as $p)
                                        @php
                                            $pIcon = (string) data_get($p, 'icon', 'icon-check');
                                            $pText = (string) data_get($p, 'text', '');
                                        @endphp
                                        @if($pText !== '')
                                            <li>
                                                <div class="icon">
                                                    <span class="{{ $pIcon }}"></span>
                                                </div>
                                                <p>{{ $pText }}</p>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                            <div class="about-two__btn-and-contact">
                                <div class="about-two__btn-box">
                                    <a href="{{ $consultUrl }}" class="thm-btn">{{ $consultText }}<span><i
                                                class="icon-diagonal-arrow"></i></span></a>
                                </div>
                                <div class="about-two__contact-box">
                                    <div class="about-two__contact-icon">
                                        <span class="icon-customer-service"></span>
                                    </div>
                                    <div class="about-two__contact-content">
                                        <p>{{ $officeHours }}</p>
                                        <h4><a href="tel:{{ $phoneTel }}">{{ $phoneDisplay }}</a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--About Two End -->

        <!--Vision & Mission Start -->
        <section class="about-three about-page">
            <div class="container">
                <div class="section-title text-center sec-title-animation animation-style1">
                    <div class="section-title__tagline-box">
                        <div class="section-title__tagline-shape-box">
                            <div class="section-title__tagline-shape"></div>
                            <div class="section-title__tagline-shape-2"></div>
                        </div>
                        <span class="section-title__tagline">Vision &amp; Mission</span>
                    </div>
                    <h2 class="section-title__title title-animation">Guided by Purpose, Built on <span>Scientific</span><br>
                        Integrity &amp; Global <span>Impact</span>
                    </h2>
                </div>

                <div class="row">
                    <div class="col-xl-6 col-lg-6 wow fadeInUp" data-wow-delay="100ms">
                        <div class="about-three__form-box">
                            <div class="about-three__form-title-box">
                                <h3 class="about-three__form-title">{{ $visionTitle }}</h3>
                                <p class="about-three__form-sub-title">{{ $visionSubtitle }}</p>
                            </div>
                            <div class="about-three__form">
                                <p>{{ $visionText }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-6 wow fadeInUp" data-wow-delay="200ms">
                        <div class="about-three__form-box">
                            <div class="about-three__form-title-box">
                                <h3 class="about-three__form-title">{{ $missionTitle }}</h3>
                                <p class="about-three__form-sub-title">{{ $missionSubtitle }}</p>
                            </div>
                            <div class="about-three__form">
                                <div class="about-three__points-box">
                                    <ul class="list-unstyled about-three__points">
                                        @foreach($missionLeft as $p)
                                            @php
                                                $pTitle = (string) data_get($p, 'title', '');
                                                $pText = (string) data_get($p, 'text', '');
                                            @endphp
                                            @if($pTitle !== '' || $pText !== '')
                                                <li>
                                                    <div class="icon">
                                                        <span class="icon-check"></span>
                                                    </div>
                                                    <div class="text">
                                                        <p>
                                                            @if($pTitle !== '')<strong>{{ $pTitle }}</strong> @endif
                                                            {{ $pText }}
                                                        </p>
                                                    </div>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                    <ul class="list-unstyled about-three__points about-three__points--two">
                                        @foreach($missionRight as $p)
                                            @php
                                                $pTitle = (string) data_get($p, 'title', '');
                                                $pText = (string) data_get($p, 'text', '');
                                            @endphp
                                            @if($pTitle !== '' || $pText !== '')
                                                <li>
                                                    <div class="icon">
                                                        <span class="icon-check"></span>
                                                    </div>
                                                    <div class="text">
                                                        <p>
                                                            @if($pTitle !== '')<strong>{{ $pTitle }}</strong> @endif
                                                            {{ $pText }}
                                                        </p>
                                                    </div>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Vision & Mission End -->

    <x-strickyHeader />
    <x-footer2 />
    <x-mobileMenu />
    <x-searchPopup />
    <x-scroll-to-top />
@endsection
