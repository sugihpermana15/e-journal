@extends('layouts.layout1')
@section('title', 'Home || Med Open Press')
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/module-css/services.css') }}?v={{ filemtime(public_path('assets/css/module-css/services.css')) }}" />
<link rel="stylesheet" href="{{ asset('assets/css/module-css/project.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/module-css/team.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/module-css/testimonial.css') }}?v={{ filemtime(public_path('assets/css/module-css/testimonial.css')) }}" />
<link rel="stylesheet" href="{{ asset('assets/css/module-css/pricing.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/module-css/about.css') }}?v={{ filemtime(public_path('assets/css/module-css/about.css')) }}" />
<link rel="stylesheet" href="{{ asset('assets/css/module-css/contact.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/module-css/blog.css') }}?v={{ filemtime(public_path('assets/css/module-css/blog.css')) }}" />
@endpush
@section('content')

@php
    $home = $homeSettings ?? [];

    $banner = (array) data_get($home, 'banner', []);
    $slidingTexts = (array) data_get($home, 'sliding_text', []);

    $aboutText = (string) data_get($home, 'about.text', '');
    $aboutPoints = (array) data_get($home, 'about.points', []);

    $serviceTabs = (array) data_get($home, 'services.tabs', []);
    $counters = (array) data_get($home, 'counters', []);

    $featuredPublications = (array) data_get($home, 'featured.items', []);
    $featuredJournals = $featuredJournals ?? collect();
    $blogCards = $blogCards ?? (array) data_get($home, 'blog.cards', []);
    $blogCardsSource = $blogCardsSource ?? null;

    $bannerImage = data_get($banner, 'image');
    $bannerImageUrl = $bannerImage ? asset('storage/' . ltrim($bannerImage, '/')) : null;

    $authorsReviewersCountRaw = data_get($banner, 'satisfied_partner.count');
    $authorsReviewersCount = is_numeric($authorsReviewersCountRaw) ? (int) $authorsReviewersCountRaw : 200;
    $authorsReviewersSuffix = (string) data_get($banner, 'satisfied_partner.suffix', 'K+');
    $authorsReviewersLabel = (string) data_get($banner, 'satisfied_partner.label', 'Authors & Reviewers');

    $googleRatingCountRaw = data_get($banner, 'google_rating.count');
    $googleRatingCount = is_numeric($googleRatingCountRaw) ? (int) $googleRatingCountRaw : 12;
    $googleRatingSuffix = (string) data_get($banner, 'google_rating.suffix', 'k Ratings');

    $googleRatingStars = (int) data_get($banner, 'google_rating.stars', 2);
    $googleRatingStars = max(0, min(5, $googleRatingStars));
    $googleRatingImageRaw = data_get($banner, 'google_rating.image');
    $googleRatingImageUrl = $googleRatingImageRaw
        ? asset('storage/' . ltrim($googleRatingImageRaw, '/'))
        : asset('assets/images/resources/banner-one-google-rating-img.png');

    $partnerImagesRaw = (array) data_get($banner, 'satisfied_partner.images', []);
    $partnerImagesUrls = [];
    foreach ($partnerImagesRaw as $img) {
        $imgPath = data_get($img, 'image');
        if (!$imgPath) {
            continue;
        }
        $partnerImagesUrls[] = asset('storage/' . ltrim($imgPath, '/'));
    }
    $partnerImagesUrls = array_slice($partnerImagesUrls, 0, 3);

    $aboutTagline = (string) data_get($home, 'about.tagline', 'About Us');
    $aboutHeadingHtml = data_get($home, 'about.heading_html');
    $aboutButtonText = (string) data_get($home, 'about.button_text', 'Know More');
    $aboutButtonUrl = (string) data_get($home, 'about.button_url', route('about'));
    $aboutOfficeHours = (string) data_get($home, 'about.office_hours', 'Office Hours: 10:00 AM - 8:00 PM');
    $aboutPhone = (string) data_get($home, 'about.phone', '+62 897 1399 093');

    $manuscript = (array) data_get($home, 'manuscript', []);
    $manuscriptTitle = (string) data_get($manuscript, 'title', 'Submit Manuscript');
    $manuscriptSubtitle = (string) data_get($manuscript, 'subtitle', 'Request editorial guidance and publication information.');
    $manuscriptNamePlaceholder = (string) data_get($manuscript, 'name_placeholder', 'Your Name');
    $manuscriptEmailPlaceholder = (string) data_get($manuscript, 'email_placeholder', 'Your Email');
    $manuscriptPhonePlaceholder = (string) data_get($manuscript, 'phone_placeholder', 'Phone');
    $manuscriptCategoryPlaceholder = (string) data_get($manuscript, 'category_placeholder', 'Choose a Category');
    $manuscriptCategoryOptions = (array) data_get($manuscript, 'category_options', []);
    $manuscriptButtonText = (string) data_get($manuscript, 'button_text', 'Request Info');

    $servicesTagline = (string) data_get($home, 'services.tagline', 'Our Services');
    $servicesHeadingHtml = data_get($home, 'services.heading_html');

    $featuredTagline = (string) data_get($home, 'featured.tagline', 'Featured Publications');
    $featuredHeadingHtml = data_get($home, 'featured.heading_html');
    $featuredFilters = (array) data_get($home, 'featured.filters', []);
    $featuredCta = (array) data_get($home, 'featured.cta', []);

    $contact = (array) data_get($home, 'contact', []);
    $contactTagline = (string) data_get($contact, 'tagline', 'CALL TO ACTION');
    $contactHeadingHtml = data_get($contact, 'heading_html');
    $contactImageMainRaw = data_get($contact, 'image_main');
    $contactImageSmall1Raw = data_get($contact, 'image_small1');
    $contactImageSmall2Raw = data_get($contact, 'image_small2');
    $contactImageMainUrl = $contactImageMainRaw ? asset('storage/' . ltrim($contactImageMainRaw, '/')) : asset('assets/images/resources/contact-one-img-main.jpg');
    $contactImageSmall1Url = $contactImageSmall1Raw ? asset('storage/' . ltrim($contactImageSmall1Raw, '/')) : asset('assets/images/resources/contact-one-small-img-1.jpg');
    $contactImageSmall2Url = $contactImageSmall2Raw ? asset('storage/' . ltrim($contactImageSmall2Raw, '/')) : asset('assets/images/resources/contact-one-small-img-2.jpg');
    $contactNamePlaceholder = (string) data_get($contact, 'name_placeholder', 'Name*');
    $contactEmailPlaceholder = (string) data_get($contact, 'email_placeholder', 'Email*');
    $contactPhonePlaceholder = (string) data_get($contact, 'phone_placeholder', 'Phone*');
    $contactSubjectPlaceholder = (string) data_get($contact, 'subject_placeholder', 'Subject*');
    $contactSubjectOptions = (array) data_get($contact, 'subject_options', []);
    $contactMessagePlaceholder = (string) data_get($contact, 'message_placeholder', 'Write a your Message');
    $contactButtonText = (string) data_get($contact, 'button_text', 'Send Message');

    $testimonialsTagline = (string) data_get($home, 'testimonials.tagline', 'OUR TESTIMONIAL');
    $testimonialsHeadingHtml = data_get($home, 'testimonials.heading_html');
    $testimonialItems = (array) data_get($home, 'testimonials.items', []);

    $blogTagline = (string) data_get($home, 'blog.tagline', 'OUR INSIGHT');
    $blogHeadingHtml = data_get($home, 'blog.heading_html');
    $blogButtonText = (string) data_get($home, 'blog.button_text', 'View All Scientific News');
    $blogButtonUrl = (string) data_get($home, 'blog.button_url', route('blog'));
@endphp

<x-strickyHeader />
<!-- Banner One Start -->
<section class="banner-one">
    <div class="banner-one__shape-bg-1" style="background-image: url({{ asset('assets/images/shapes/banner-one-shape-bg-1.png') }});"></div>

    <div class="banner-one__shape-1"></div>
    <div class="banner-one__shape-2"></div>
    <div class="banner-one__shape-3"></div>
    <div class="banner-one__shape-4 float-bob-x">
        <img src="{{ asset('assets/images/shapes/banner-one-shape-4.png') }}" alt="">
    </div>

    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <div class="banner-one__left">
                    <div class="banner-one__title-box">
                        <h2 class="banner-one__title">{{ data_get($banner, 'title') ?: 'Advancing Medical Science Through' }} <br>
                            <span class="typed-effect banner-one__title-color" id="type-1" data-strings="{{ data_get($banner, 'typed_strings') ?: 'Peer-Reviewed Journals, High-Caliber Medical Books' }}"></span>
                        </h2>
                    </div>
                    <p class="banner-one__text">{{ data_get($banner, 'text') ?: 'Med Open Press publishes rigorously peer-reviewed medical journals and authoritative books to support clinicians, researchers, and educators worldwide.' }}</p>
                    <div class="banner-one__btn-box">
                        <a href="{{ data_get($banner, 'button_url') ?: route('journals') }}" class="thm-btn">{{ data_get($banner, 'button_text') ?: 'Explore Journals' }}<span><i class="icon-diagonal-arrow"></i></span></a>
                    </div>
                    <div class="banner-one__satisfied-partner">
                        <ul class="list-unstyled banner-one__satisfied-partner-list">
                            @if(!empty($partnerImagesUrls))
                                @foreach($partnerImagesUrls as $url)
                                    <li>
                                        <div class="banner-one__satisfied-partner-img">
                                            <img src="{{ $url }}" alt="">
                                        </div>
                                    </li>
                                @endforeach
                            @else
                                <li>
                                    <div class="banner-one__satisfied-partner-img">
                                        <img src="{{ asset('assets/images/resources/banner-one-satisfied-partner-1-1.jpg') }}" alt="">
                                    </div>
                                </li>
                                <li>
                                    <div class="banner-one__satisfied-partner-img">
                                        <img src="{{ asset('assets/images/resources/banner-one-satisfied-partner-1-2.jpg') }}" alt="">
                                    </div>
                                </li>
                                <li>
                                    <div class="banner-one__satisfied-partner-img">
                                        <img src="{{ asset('assets/images/resources/banner-one-satisfied-partner-1-3.jpg') }}" alt="">
                                    </div>
                                </li>
                            @endif
                        </ul>
                        <div class="banner-one__satisfied-partner-content">
                            <div class="banner-one__satisfied-partner-count-box">
                                <p class="odometer" data-count="{{ $authorsReviewersCount }}">00</p>
                                <span>{{ $authorsReviewersSuffix }}</span>
                            </div>
                            <p class="banner-one__satisfied-partner-text">{{ $authorsReviewersLabel }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="banner-one__right">
                    <div class="banner-one__img-box">
                        <div class="banner-one__img wow slideInRight" data-wow-delay="100ms" data-wow-duration="2500ms">
                            <img src="{{ $bannerImageUrl ?: asset('assets/images/resources/banner-one-img-1.png') }}" alt="">
                        </div>
                        <div class="banner-one__google-rating">
                            <div class="banner-one__google-rating-img">
                                <img src="{{ $googleRatingImageUrl }}" alt="">
                            </div>
                            <div class="banner-one__google-rating-box">
                                <div class="banner-one__google-rating-star">
                                    @for($i = 0; $i < $googleRatingStars; $i++)
                                        <span class="icon-star"></span>
                                    @endfor
                                </div>
                                <div class="banner-one__google-rating-count count-box">
                                    <p class="count-text" data-stop="{{ $googleRatingCount }}" data-speed="3000">00</p>
                                    <span>{{ $googleRatingSuffix }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Banner One End -->

<!-- Sliding Text One Start -->
<section class="sliding-text-one">
    <div class="sliding-text-one__wrap">
        <ul class="sliding-text__list list-unstyled marquee_mode">
            @if(!empty($slidingTexts))
                @foreach($slidingTexts as $item)
                    <li>
                        <h2 data-hover="{{ $item }}" class="sliding-text__title">{{ $item }}
                            <img src="{{ asset('assets/images/shapes/sliding-text-shape-1.png') }}" alt=""></h2>
                    </li>
                @endforeach
            @else
            <li>
                <h2 data-hover="Peer Review" class="sliding-text__title">Peer Review
                    <img src="{{ asset('assets/images/shapes/sliding-text-shape-1.png') }}" alt=""></h2>
            </li>
            <li>
                <h2 data-hover="Open Access" class="sliding-text__title">Open Access
                    <img src="{{ asset('assets/images/shapes/sliding-text-shape-1.png') }}" alt=""></h2>
            </li>
            <li>
                <h2 data-hover="Indexing" class="sliding-text__title">Indexing
                    <img src="{{ asset('assets/images/shapes/sliding-text-shape-1.png') }}" alt=""></h2>
            </li>
            <li>
                <h2 data-hover="Copyediting" class="sliding-text__title">Copyediting
                    <img src="{{ asset('assets/images/shapes/sliding-text-shape-1.png') }}" alt=""></h2>
            </li>
            <li>
                <h2 data-hover="Ethics" class="sliding-text__title">Ethics
                    <img src="{{ asset('assets/images/shapes/sliding-text-shape-1.png') }}" alt=""></h2>
            </li>
            <li>
                <h2 data-hover="Publishing" class="sliding-text__title">Publishing
                    <img src="{{ asset('assets/images/shapes/sliding-text-shape-1.png') }}" alt=""></h2>
            </li>
            @endif
        </ul>
    </div>
</section>
<!-- Sliding Text One End -->

<!-- About One Start -->
<section class="about-three">
    <div class="container">
        <div class="row">
            <div class="col-xl-7">
                <div class="about-three__left">
                    <div class="about-three__left-content-box">
                        <div class="section-title text-left sec-title-animation animation-style2">
                            <div class="section-title__tagline-box">
                                <div class="section-title__tagline-shape-box">
                                    <div class="section-title__tagline-shape"></div>
                                    <div class="section-title__tagline-shape-2"></div>
                                </div>
                                <span class="section-title__tagline">{{ $aboutTagline }}</span>
                            </div>
                            @if($aboutHeadingHtml)
                                <h2 class="section-title__title title-animation">{!! $aboutHeadingHtml !!}</h2>
                            @else
                                <h2 class="section-title__title title-animation">Our Story, Mission, Born from a
                                    <br>
                                    passion
                                    for innovation, <span>& Values</span> <br> <span>That Drive Us
                                        Forward</span>
                                </h2>
                            @endif
                        </div>
                        <p class="about-three__text">{{ $aboutText ?: 'Med Open Press is a distinguished publishing entity devoted to the advancement of medical science through the dissemination of high-caliber books and rigorously peer-reviewed journals. Each publication undergoes stringent editorial scrutiny to ensure scientific validity and clinical relevance.' }}</p>
                        <div class="about-three__points-box">
                            @if(!empty($aboutPoints))
                                @php
                                    $aboutPointsValues = array_values($aboutPoints);
                                    $aboutMid = (int) ceil(count($aboutPointsValues) / 2);
                                    $aboutCol1 = array_slice($aboutPointsValues, 0, $aboutMid);
                                    $aboutCol2 = array_slice($aboutPointsValues, $aboutMid);
                                @endphp
                                <ul class="list-unstyled about-three__points">
                                    @foreach($aboutCol1 as $point)
                                        <li>
                                            <div class="icon">
                                                <span class="{{ data_get($point, 'icon') ?: 'icon-check' }}"></span>
                                            </div>
                                            <div class="text">
                                                <p>{{ data_get($point, 'text') }}</p>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                                <ul class="list-unstyled about-three__points about-three__points--two">
                                    @foreach($aboutCol2 as $point)
                                        <li>
                                            <div class="icon">
                                                <span class="{{ data_get($point, 'icon') ?: 'icon-check' }}"></span>
                                            </div>
                                            <div class="text">
                                                <p>{{ data_get($point, 'text') }}</p>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <ul class="list-unstyled about-three__points">
                                    <li>
                                        <div class="icon">
                                            <span class="icon-check"></span>
                                        </div>
                                        <div class="text">
                                            <p>Excellence in peer review</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-check"></span>
                                        </div>
                                        <div class="text">
                                            <p>Global accessibility</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-check"></span>
                                        </div>
                                        <div class="text">
                                            <p>Promotion of innovation</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-check"></span>
                                        </div>
                                        <div class="text">
                                            <p>Commitment to education</p>
                                        </div>
                                    </li>
                                </ul>
                                <ul class="list-unstyled about-three__points about-three__points--two">
                                    <li>
                                        <div class="icon">
                                            <span class="icon-check"></span>
                                        </div>
                                        <div class="text">
                                            <p>Ethical publishing standards</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-check"></span>
                                        </div>
                                        <div class="text">
                                            <p>Transparent editorial policies</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-check"></span>
                                        </div>
                                        <div class="text">
                                            <p>Clinically relevant outputs</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-check"></span>
                                        </div>
                                        <div class="text">
                                            <p>Scientific validity & rigor</p>
                                        </div>
                                    </li>
                                </ul>
                            @endif
                        </div>
                        <div class="about-two__btn-and-contact">
                            <div class="about-two__btn-box">
                                <a href="{{ url($aboutButtonUrl) }}" class="thm-btn">{{ $aboutButtonText }}<span><i
                                            class="icon-diagonal-arrow"></i></span></a>
                            </div>
                            <div class="about-two__contact-box">
                                <div class="about-two__contact-icon">
                                    <span class="icon-customer-service"></span>
                                </div>
                                <div class="about-two__contact-content">
                                    <p>{{ $aboutOfficeHours }}</p>
                                    @php
                                        $aboutPhoneHref = preg_replace('/\s+/', '', $aboutPhone);
                                    @endphp
                                    <h4><a href="tel:{{ $aboutPhoneHref }}">{{ $aboutPhone }}</a></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-5">
                <div class="about-three__right wow slideInRight" data-wow-delay="100ms"
                    data-wow-duration="2500ms">
                    <div class="about-three__form-box">
                        <div class="about-three__form-title-box">
                            <h3 class="about-three__form-title">{{ $manuscriptTitle }}</h3>
                            <p class="about-three__form-sub-title">{{ $manuscriptSubtitle }}</p>
                        </div>
                        <form class="contact-form-validated about-three__form" action="assets/inc/sendemail.php"
                            method="post" novalidate="novalidate">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12">
                                    <div class="about-three__input-box">
                                        <input type="text" name="name" placeholder="{{ $manuscriptNamePlaceholder }}" required="">
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12">
                                    <div class="about-three__input-box">
                                        <input type="email" name="email" placeholder="{{ $manuscriptEmailPlaceholder }}" required="">
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12">
                                    <div class="about-three__input-box">
                                        <input type="text" name="Phone" placeholder="{{ $manuscriptPhonePlaceholder }}" required="">
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12">
                                    <div class="about-three__input-box">
                                        <div class="select-box">
                                            <select class="wide">
                                                <option data-display="{{ $manuscriptCategoryPlaceholder }}">{{ $manuscriptCategoryPlaceholder }}
                                                </option>
                                                @if(!empty($manuscriptCategoryOptions))
                                                    @foreach($manuscriptCategoryOptions as $opt)
                                                        @if(trim((string) $opt) !== '')
                                                            <option value="{{ $opt }}">{{ $opt }}</option>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <option value="1">Original Research</option>
                                                    <option value="2">Review Article</option>
                                                    <option value="3">Case Report</option>
                                                    <option value="4">Short Communication</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12">
                                    <div class="about-three__form-btn-box">
                                        <button type="submit" class="thm-btn contact-three__btn">{{ $manuscriptButtonText }}
                                            <span><i class="icon-diagonal-arrow"></i></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="result"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About One End -->

<!--Services Three Start -->
<section class="services-three">
    <div class="container">
        <div class="section-title text-center sec-title-animation animation-style1">
            <div class="section-title__tagline-box">
                <div class="section-title__tagline-shape-box">
                    <div class="section-title__tagline-shape"></div>
                    <div class="section-title__tagline-shape-2"></div>
                </div>
                <span class="section-title__tagline">{{ $servicesTagline }}</span>
            </div>
            @if($servicesHeadingHtml)
                <h2 class="section-title__title title-animation">{!! $servicesHeadingHtml !!}</h2>
            @else
                <h2 class="section-title__title title-animation">Medical <span>Publishing</span> Services<br>
                    <span>From submission to global dissemination</span>
                </h2>
            @endif
        </div>
        <div class="services-three__inner">
            <div class="services-three__main-tab-box tabs-box">
                <div class="services-three__tab-buttons-box">
                    <ul class="tab-buttons list-unstyled">
                        @if(!empty($serviceTabs))
                            @foreach($serviceTabs as $idx => $tab)
                                @php
                                    $tabId = data_get($tab, 'slug') ?: ('service-tab-' . ($idx + 1));
                                    $buttonLabel = (string) data_get($tab, 'button_label', 'Service');
                                @endphp
                                <li data-tab="#{{ $tabId }}" class="tab-btn {{ $idx === 0 ? 'active-btn' : '' }}">
                                    <div class="services-three__tab-buttons-single">
                                        <i class="{{ data_get($tab, 'icon') ?: 'icon-file' }}"></i>
                                        <span>{!! nl2br(e($buttonLabel)) !!}</span>
                                    </div>
                                </li>
                            @endforeach
                        @else
                        <li data-tab="#residential" class="tab-btn active-btn">
                            <div class="services-three__tab-buttons-single">
                                <i class="icon-file"></i>
                                <span>Book<br> Publishing</span>
                            </div>
                        </li>
                        <li data-tab="#commercial" class="tab-btn">
                            <div class="services-three__tab-buttons-single">
                                <i class="icon-review"></i>
                                <span>Scientific Journal<br> Publication</span>
                            </div>
                        </li>
                        <li data-tab="#deep" class="tab-btn">
                            <div class="services-three__tab-buttons-single">
                                <i class="icon-completed-task"></i>
                                <span>IPR<br> Management</span>
                            </div>
                        </li>
                        <li data-tab="#office" class="tab-btn">
                            <div class="services-three__tab-buttons-single">
                                <i class="icon-app"></i>
                                <span>Custom Publishing<br> Solutions</span>
                            </div>
                        </li>
                        <li data-tab="#sanitizing" class="tab-btn">
                            <div class="services-three__tab-buttons-single">
                                <i class="icon-share"></i>
                                <span>Distribution<br> & Licensing</span>
                            </div>
                        </li>
                        @endif
                    </ul>
                </div>
                <div class="tabs-content">
                    @if(!empty($serviceTabs))
                        @foreach($serviceTabs as $idx => $tab)
                            @php
                                $tabId = data_get($tab, 'slug') ?: ('service-tab-' . ($idx + 1));
                                $bgImageRaw = data_get($tab, 'image');
                                $bgImage = $bgImageRaw ? asset('storage/' . ltrim($bgImageRaw, '/')) : null;
                                $smallLabel = data_get($tab, 'small_label');
                                $smallSubLabel = data_get($tab, 'small_sublabel');
                            @endphp
                            <div class="tab {{ $idx === 0 ? 'active-tab' : '' }}" id="{{ $tabId }}">
                                <div class="services-three__tab-content-box">
                                    <div class="services-three__tab-img-1"
                                        style="background-image: url({{ $bgImage ?: asset('assets/images/services/services-three-tab-img-1.jpg') }});">
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="services-three__tab-left">
                                                <div class="services-three__shape-2">
                                                    <img src="{{ asset('assets/images/shapes/services-three-shape-2.png') }}" alt="">
                                                </div>
                                                <h3 class="services-three__tab-title">{{ data_get($tab, 'title') }}</h3>
                                                <p class="services-three__tab-text">{{ data_get($tab, 'text') }}</p>
                                                <div class="services-three__tab-doller-box">
                                                    <p class="services-three__tab-doller">{{ $smallLabel ?: 'Learn' }}</p>
                                                    <span class="services-three__tab-doller-sub-title">{{ $smallSubLabel ?: 'More' }}</span>
                                                </div>
                                                <div class="services-three__btn-box">
                                                    <a href="{{ data_get($tab, 'button_url') ?: route('services') }}" class="thm-btn">{{ data_get($tab, 'button_text') ?: 'Learn More' }}<span><i class="icon-diagonal-arrow"></i></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                    <div class="tab active-tab" id="residential">
                        <!-- Single Item -->
                        <div class="services-three__tab-content-box">
                            <div class="services-three__tab-img-1"
                                style="background-image: url({{ asset('assets/images/services/services-three-tab-img-1.jpg') }});">
                            </div>
                            <div class="row">
                                <div class="col-xl-6 col-lg-6">
                                    <div class="services-three__tab-left">
                                        <div class="services-three__shape-2">
                                            <img src="{{ asset('assets/images/shapes/services-three-shape-2.png') }}" alt="">
                                        </div>
                                        <h3 class="services-three__tab-title">Book Publishing</h3>
                                        <p class="services-three__tab-text">Medical books, monographs, and educational references
                                            supported by editorial review, professional copyediting, design, and production.</p>
                                        <div class="services-three__tab-doller-box">
                                            <p class="services-three__tab-doller">Books</p>
                                            <span class="services-three__tab-doller-sub-title">Publishing</span>
                                        </div>
                                        <div class="services-three__btn-box">
                                            <a href="{{ route('services') }}" class="thm-btn">Learn
                                                More<span><i class="icon-diagonal-arrow"></i></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Single Item -->
                    </div>

                    <div class="tab" id="commercial">
                        <!-- Single Item -->
                        <div class="services-three__tab-content-box">
                            <div class="services-three__tab-img-1"
                                style="background-image: url({{ asset('assets/images/services/services-three-tab-img-2.jpg') }});">
                            </div>
                            <div class="row">
                                <div class="col-xl-6 col-lg-6">
                                    <div class="services-three__tab-left">
                                        <div class="services-three__shape-2">
                                            <img src="{{ asset('assets/images/shapes/services-three-shape-2.png') }}" alt="">
                                        </div>
                                        <h3 class="services-three__tab-title">Scientific Journal Publication</h3>
                                        <p class="services-three__tab-text">End-to-end journal publishing workflows: submissions,
                                            peer review coordination, editorial decisions, production, and online publication.</p>
                                        <div class="services-three__tab-doller-box">
                                            <p class="services-three__tab-doller">Journals</p>
                                            <span class="services-three__tab-doller-sub-title">Workflow</span>
                                        </div>
                                        <div class="services-three__btn-box">
                                            <a href="{{ route('services') }}" class="thm-btn">Learn
                                                More<span><i class="icon-diagonal-arrow"></i></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Single Item -->
                    </div>

                    <div class="tab" id="deep">
                        <!-- Single Item -->
                        <div class="services-three__tab-content-box">
                            <div class="services-three__tab-img-1"
                                style="background-image: url({{ asset('assets/images/services/services-three-tab-img-3.jpg') }});">
                            </div>
                            <div class="row">
                                <div class="col-xl-6 col-lg-6">
                                    <div class="services-three__tab-left">
                                        <div class="services-three__shape-2">
                                            <img src="{{ asset('assets/images/shapes/services-three-shape-2.png') }}" alt="">
                                        </div>
                                        <h3 class="services-three__tab-title">Intellectual Property Rights Management (IPR)</h3>
                                        <p class="services-three__tab-text">Copyright, permissions, and licensing guidance to
                                            protect author rights and support compliant publication across formats and channels.</p>
                                        <div class="services-three__tab-doller-box">
                                            <p class="services-three__tab-doller">Rights</p>
                                            <span class="services-three__tab-doller-sub-title">Compliance</span>
                                        </div>
                                        <div class="services-three__btn-box">
                                            <a href="{{ route('services') }}" class="thm-btn">Learn More<span><i
                                                        class="icon-diagonal-arrow"></i></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Single Item -->
                    </div>

                    <div class="tab" id="office">
                        <!-- Single Item -->
                        <div class="services-three__tab-content-box">
                            <div class="services-three__tab-img-1"
                                style="background-image: url({{ asset('assets/images/services/services-three-tab-img-4.jpg') }});">
                            </div>
                            <div class="row">
                                <div class="col-xl-6 col-lg-6">
                                    <div class="services-three__tab-left">
                                        <div class="services-three__shape-2">
                                            <img src="{{ asset('assets/images/shapes/services-three-shape-2.png') }}" alt="">
                                        </div>
                                        <h3 class="services-three__tab-title">Custom Publishing Solutions</h3>
                                        <p class="services-three__tab-text">Tailored publishing programs for societies,
                                            institutions, special issues, and supplements with flexible workflows and timelines.</p>
                                        <div class="services-three__tab-doller-box">
                                            <p class="services-three__tab-doller">Custom</p>
                                            <span class="services-three__tab-doller-sub-title">Solutions</span>
                                        </div>
                                        <div class="services-three__btn-box">
                                            <a href="{{ route('services') }}" class="thm-btn">Learn More<span><i
                                                        class="icon-diagonal-arrow"></i></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Single Item -->
                    </div>

                    <div class="tab" id="sanitizing">
                        <!-- Single Item -->
                        <div class="services-three__tab-content-box">
                            <div class="services-three__tab-img-1"
                                style="background-image: url({{ asset('assets/images/services/services-three-tab-img-5.jpg') }});">
                            </div>
                            <div class="row">
                                <div class="col-xl-6 col-lg-6">
                                    <div class="services-three__tab-left">
                                        <div class="services-three__shape-2">
                                            <img src="{{ asset('assets/images/shapes/services-three-shape-2.png') }}" alt="">
                                        </div>
                                        <h3 class="services-three__tab-title">Distribution and Licensing</h3>
                                        <p class="services-three__tab-text">Digital/print distribution options and licensing
                                            pathways to expand reach responsibly across platforms, partners, and regions.</p>
                                        <div class="services-three__tab-doller-box">
                                            <p class="services-three__tab-doller">Reach</p>
                                            <span class="services-three__tab-doller-sub-title">Licensing</span>
                                        </div>
                                        <div class="services-three__btn-box">
                                            <a href="{{ route('services') }}" class="thm-btn">Learn More<span><i
                                                        class="icon-diagonal-arrow"></i></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Single Item -->
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<!--Services Three End -->

<!-- Counter One Start -->
<section class="counter-one">
    <div class="counter-one__bg-shape" style="background-image: url({{ asset('assets/images/shapes/counter-one-bg-shape.png') }});"></div>
    <div class="counter-one__shape-1 float-bob-y">
        <img src="{{ asset('assets/images/shapes/counter-one-shape-1.png') }}" alt="">
    </div>
    <div class="container">
        <ul class="row list-unstyled">
            @if(!empty($counters))
                @foreach($counters as $counter)
                    @php
                        $countValue = (int) (data_get($counter, 'count') ?? 0);
                        $suffixRaw = (string) (data_get($counter, 'suffixes') ?? '');
                        $suffixParts = $suffixRaw !== '' ? preg_split('/\s*\|\s*/', $suffixRaw) : [];
                    @endphp
                    <li class="col-xl-3 col-lg-6 col-md-6">
                        <div class="counter-one__single">
                            <div class="counter-one__icon">
                                <span class="{{ data_get($counter, 'icon') ?: 'icon-completed-task' }}"></span>
                            </div>
                            <div class="counter-one__content">
                                <div class="counter-one__count-box">
                                    <p class="odometer" data-count="{{ $countValue }}">00</p>
                                    @if(!empty($suffixParts))
                                        @foreach($suffixParts as $suffix)
                                            <span>{{ $suffix }}</span>
                                        @endforeach
                                    @endif
                                </div>
                                <p class="counter-one__count-text">{{ data_get($counter, 'label') }}</p>
                            </div>
                        </div>
                    </li>
                @endforeach
            @else
            <li class="col-xl-3 col-lg-6 col-md-6">
                <div class="counter-one__single">
                    <div class="counter-one__icon">
                        <span class="icon-completed-task"></span>
                    </div>
                    <div class="counter-one__content">
                        <div class="counter-one__count-box">
                            <p class="odometer" data-count="100">00</p>
                            <span>+</span>
                        </div>
                        <p class="counter-one__count-text">Articles published </p>
                    </div>
                </div>
            </li>
            <li class="col-xl-3 col-lg-6 col-md-6">
                <div class="counter-one__single">
                    <div class="counter-one__icon">
                        <span class="icon-review"></span>
                    </div>
                    <div class="counter-one__content">
                        <div class="counter-one__count-box">
                            <p class="odometer" data-count="98">00</p>
                            <span>%</span>
                        </div>
                        <p class="counter-one__count-text">Trusted by happy Customer!</p>
                    </div>
                </div>
            </li>
            <li class="col-xl-3 col-lg-6 col-md-6">
                <div class="counter-one__single">
                    <div class="counter-one__icon">
                        <span class="icon-experience"></span>
                    </div>
                    <div class="counter-one__content">
                        <div class="counter-one__count-box">
                            <p class="odometer" data-count="12">00</p>
                            <span>k</span>
                            <span>+</span>
                        </div>
                        <p class="counter-one__count-text">Positive Rating in Trustpilot</p>
                    </div>
                </div>
            </li>
            <li class="col-xl-3 col-lg-6 col-md-6">
                <div class="counter-one__single">
                    <div class="counter-one__icon">
                        <span class="icon-costumer"></span>
                    </div>
                    <div class="counter-one__content">
                        <div class="counter-one__count-box">
                            <p class="odometer" data-count="35">00</p>
                            <span>m</span>
                        </div>
                        <p class="counter-one__count-text">Rating in oy local City Network</p>
                    </div>
                </div>
            </li>
            @endif
        </ul>
    </div>
</section>
<!-- Counter One End -->

@if(isset($featuredJournals) && $featuredJournals->count())
<!--Project One Start-->
<section class="project-one">
    <div class="project-one__bg-shape" style="background-image: url({{ asset('assets/images/shapes/project-one-bg-shape.png') }});"></div>
    <div class="project-one__bg-shape-2" style="background-image: url({{ asset('assets/images/shapes/project-one-bg-shape-2.png') }});"></div>
    <div class="project-one__shape-1"></div>
    <div class="project-one__shape-2"></div>
    <div class="container">
        <div class="section-title text-center sec-title-animation animation-style1">
            <div class="section-title__tagline-box">
                <div class="section-title__tagline-shape-box">
                    <div class="section-title__tagline-shape"></div>
                    <div class="section-title__tagline-shape-2"></div>
                </div>
                <span class="section-title__tagline">{{ $featuredTagline }}</span>
            </div>
            @if($featuredHeadingHtml)
                <h2 class="section-title__title title-animation">{!! $featuredHeadingHtml !!}</h2>
            @else
                <h2 class="section-title__title title-animation">A selection of publications <span>that</span><br><span>
                        advance medical knowledge</span>
                </h2>
            @endif
        </div>
        <div class="project-one__inner">
            <div class="row filter-layout">
                @foreach($featuredJournals as $journal)
                    @php
                        $pubImg = $journal->cover_path
                            ? asset('storage/' . ltrim($journal->cover_path, '/'))
                            : asset('assets/images/project/project-1-1.jpg');
                        $pubLink = route('journals');
                        $filterClasses = $journal->category ? \Illuminate\Support\Str::slug($journal->category) : '';
                        $tagText = $journal->category ?: 'Journal';
                        $dateText = $journal->published_at?->format('M d')
                            ?? $journal->created_at?->format('M d')
                            ?? '';
                    @endphp
                    <div class="col-xl-4 col-lg-4 col-md-6 filter-item {{ $filterClasses }}">
                        <div class="project-one__single">
                            <div class="project-one__img-box">
                                <div class="project-one__img">
                                    <img src="{{ $pubImg }}" alt="">
                                </div>
                                <div class="project-one__view-box">
                                    <a href="{{ $pubLink }}" class="project-one__view">
                                        <i class="icon-diagonal-arrow"></i>
                                        <span>View More</span>
                                    </a>
                                </div>
                            </div>
                            <div class="project-one__content">
                                <p class="project-one__tag">{{ $tagText }}<span class="icon-right-arrow"></span>{{ $dateText }}</p>
                                <h3 class="project-one__title"><a href="{{ $pubLink }}">{{ $journal->title }}</a></h3>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!--Project One End-->
@endif

<!--Contact One Start-->
<section class="contact-one contact-one--no-callbox">
    <div class="contact-one__shape-1" style="background-image: url({{ asset('assets/images/shapes/contact-one-shape-1.png') }});"></div>
    <div class="contact-one__shape-2 zoom-fade">
        <img src="{{ asset('assets/images/shapes/contact-one-shape-2.png') }}" alt="">
    </div>
    <div class="contact-one__shape-3 zoom-fade">
        <img src="{{ asset('assets/images/shapes/contact-one-shape-3.png') }}" alt="">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <div class="contact-one__left wow slideInLeft" data-wow-delay="100ms" data-wow-duration="2500ms">
                    <div class="contact-one__img-box">
                        <div class="contact-one__img-main">
                            <img src="{{ $contactImageMainUrl }}" alt="">
                        </div>
                        <div class="contact-one__small-img-1 wow zoomIn animated animated" data-wow-delay="500ms" data-wow-duration="2500ms">
                            <img src="{{ $contactImageSmall1Url }}" alt="">
                        </div>
                        <div class="contact-one__small-img-2 wow zoomIn animated animated" data-wow-delay="700ms" data-wow-duration="2500ms">
                            <img src="{{ $contactImageSmall2Url }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="contact-one__right">
                    <div class="section-title text-left sec-title-animation animation-style2">
                        <div class="section-title__tagline-box">
                            <div class="section-title__tagline-shape-box">
                                <div class="section-title__tagline-shape"></div>
                                <div class="section-title__tagline-shape-2"></div>
                            </div>
                            <span class="section-title__tagline">{{ $contactTagline }}</span>
                        </div>
                        @if($contactHeadingHtml)
                            <h2 class="section-title__title title-animation">{!! $contactHeadingHtml !!}</h2>
                        @else
                            <h2 class="section-title__title title-animation">Connect with our editorial team,
                                discuss submissions, peer review, and publishing policies
                            </h2>
                        @endif
                    </div>
                    <div class="contact-one__inner">
                        <form class="contact-form-validated contact-one__form" action="#" method="post" novalidate="novalidate">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="contact-one__input-box">
                                        <input type="text" name="name" placeholder="{{ $contactNamePlaceholder }}" required="">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="contact-one__input-box">
                                        <input type="email" name="Email" placeholder="{{ $contactEmailPlaceholder }}" required="">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="contact-one__input-box">
                                        <input type="text" name="Phone" placeholder="{{ $contactPhonePlaceholder }}" required="">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="contact-one__input-box">
                                        <div class="select-box">
                                            <select class="selectmenu wide">
                                                <option selected="selected">{{ $contactSubjectPlaceholder }}</option>
                                                @if(!empty($contactSubjectOptions))
                                                    @foreach($contactSubjectOptions as $opt)
                                                        @if(trim((string) $opt) !== '')
                                                            <option>{{ $opt }}</option>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <option>Manuscript Submission</option>
                                                    <option>Peer Review</option>
                                                    <option>Publishing Ethics</option>
                                                    <option>Open Access</option>
                                                    <option>Indexing & Archiving</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="contact-one__input-box text-message-box">
                                        <textarea name="message" placeholder="{{ $contactMessagePlaceholder }}"></textarea>
                                    </div>
                                    <div class="contact-one__btn-box">
                                        <button type="submit" class="thm-btn">{{ $contactButtonText }}<span><i class="icon-diagonal-arrow"></i></span></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="result"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Contact One End-->

<!--Testimonial One Start -->
<section class="testimonial-one">
    <div class="testimonial-one__shape-1">
        <img src="{{ asset('assets/images/shapes/testimonial-one-shape-1.png') }}" alt="">
    </div>
    <div class="testimonial-one__shape-2"></div>
    <div class="testimonial-one__shape-3"></div>
    <div class="testimonial-one__wrap">
        <div class="section-title text-center sec-title-animation animation-style1">
            <div class="section-title__tagline-box">
                <div class="section-title__tagline-shape-box">
                    <div class="section-title__tagline-shape"></div>
                    <div class="section-title__tagline-shape-2"></div>
                </div>
                <span class="section-title__tagline">{{ $testimonialsTagline }}</span>
            </div>
            @if($testimonialsHeadingHtml)
                <h2 class="section-title__title title-animation">{!! $testimonialsHeadingHtml !!}</h2>
            @else
                <h2 class="section-title__title title-animation">Clients Have to Say <span>About
                        Their</span><br><span>Experience with Us!</span>
                </h2>
            @endif
        </div>
        <ul class="list-unstyled testimonial-one__list marquee_mode-2">
            @php
                $items = array_values(array_filter($testimonialItems, function ($t) {
                    return trim((string) data_get($t, 'name')) !== '' || trim((string) data_get($t, 'text')) !== '';
                }));
            @endphp

            @if(!empty($items))
                @foreach(array_slice($items, 0, 8) as $i => $t)
                    @php
                        $name = (string) data_get($t, 'name', '');
                        $role = (string) data_get($t, 'role', '');
                        $date = (string) data_get($t, 'date', '');
                        $subTitle = (string) data_get($t, 'sub_title', '');
                        $text = (string) data_get($t, 'text', '');
                        $rating = (int) data_get($t, 'rating', 5);
                        $rating = max(0, min(5, $rating));
                        $linkUrl = (string) data_get($t, 'link_url', route('about'));
                        $imgRaw = data_get($t, 'image');
                        $defaultIndex = min(((int) $i) + 1, 4);
                        $imgUrl = $imgRaw ? asset('storage/' . ltrim($imgRaw, '/')) : asset('assets/images/testimonial/testimonial-1-' . $defaultIndex . '.jpg');
                    @endphp
                    <li>
                        <div class="testimonial-one__single">
                            <div class="testimonial-one__quote-icon">
                                <img src="{{ asset('assets/images/icon/quote-icon-1.png') }}" alt="">
                            </div>
                            <div class="testimonial-one__client-info">
                                <div class="testimonial-one__client-content">
                                    <h4 class="testimonial-one__client-name"><a href="{{ url($linkUrl) }}">{{ $name }}</a></h4>
                                    <p class="testimonial-one__client-sub-title">{{ $role }}</p>
                                </div>
                                <div class="testimonial-one__client-img">
                                    <img src="{{ $imgUrl }}" alt="">
                                </div>
                            </div>
                            @if($subTitle !== '')
                                <span class="testimonial-one__sub-title">{{ $subTitle }}</span>
                            @endif
                            <p class="testimonial-one__text">{!! nl2br(e($text)) !!}</p>
                            <div class="testimonial-one__rating-and-date">
                                <div class="testimonial-one__rating">
                                    @for($s = 0; $s < $rating; $s++)
                                        <span class="icon-star"></span>
                                    @endfor
                                </div>
                                <p class="testimonial-one__date">{{ $date }}</p>
                            </div>
                        </div>
                    </li>
                @endforeach
            @else
            <li>
                <div class="testimonial-one__single">
                    <div class="testimonial-one__quote-icon">
                        <img src="{{ asset('assets/images/icon/quote-icon-1.png') }}" alt="">
                    </div>
                    <div class="testimonial-one__client-info">
                        <div class="testimonial-one__client-content">
                                <h4 class="testimonial-one__client-name"><a href="{{ route('about') }}">Emily
                                    Carter</a></h4>
                            <p class="testimonial-one__client-sub-title">Business Owner</p>
                        </div>
                        <div class="testimonial-one__client-img">
                            <img src="{{ asset('assets/images/testimonial/testimonial-1-1.jpg') }}" alt="">
                        </div>
                    </div>
                    <span class="testimonial-one__sub-title">Rigorous and transparent!</span>
                    <p class="testimonial-one__text">"The peer review process was thorough and constructive.<br>
                        The editorial communication was clear, timely, and professional."</p>
                    <div class="testimonial-one__rating-and-date">
                        <div class="testimonial-one__rating">
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                            <span class="last-icon icon-star"></span>
                            <span class="last-icon icon-star"></span>
                        </div>
                        <p class="testimonial-one__date">10 Days Ago</p>
                    </div>
                </div>
            </li>
            <li>
                <div class="testimonial-one__single">
                    <div class="testimonial-one__quote-icon">
                        <img src="{{ asset('assets/images/icon/quote-icon-1.png') }}" alt="">
                    </div>
                    <div class="testimonial-one__client-info">
                        <div class="testimonial-one__client-content">
                                <h4 class="testimonial-one__client-name"><a href="{{ route('about') }}">Michael
                                    Brown</a></h4>
                            <p class="testimonial-one__client-sub-title">Financial Analyst</p>
                        </div>
                        <div class="testimonial-one__client-img">
                            <img src="{{ asset('assets/images/testimonial/testimonial-1-2.jpg') }}" alt="">
                        </div>
                    </div>
                    <span class="testimonial-one__sub-title">Efficient and dependable!</span>
                    <p class="testimonial-one__text">"From submission to decision, the workflow was well-managed.<br>
                        The guidance helped us improve the manuscript substantially."</p>
                    <div class="testimonial-one__rating-and-date">
                        <div class="testimonial-one__rating">
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                            <span class="last-icon icon-star"></span>
                            <span class="last-icon icon-star"></span>
                        </div>
                        <p class="testimonial-one__date">10 Days Ago</p>
                    </div>
                </div>
            </li>
            <li>
                <div class="testimonial-one__single">
                    <div class="testimonial-one__quote-icon">
                        <img src="{{ asset('assets/images/icon/quote-icon-1.png') }}" alt="">
                    </div>
                    <div class="testimonial-one__client-info">
                        <div class="testimonial-one__client-content">
                                <h4 class="testimonial-one__client-name"><a href="{{ route('about') }}">Sarah
                                    Thompson</a></h4>
                            <p class="testimonial-one__client-sub-title">Marketing Manager</p>
                        </div>
                        <div class="testimonial-one__client-img">
                            <img src="{{ asset('assets/images/testimonial/testimonial-1-3.jpg') }}" alt="">
                        </div>
                    </div>
                    <span class="testimonial-one__sub-title">High-quality editorial support!</span>
                    <p class="testimonial-one__text">"Copyediting and production were excellent.<br>
                        The final publication was polished, readable, and consistent."</p>
                    <div class="testimonial-one__rating-and-date">
                        <div class="testimonial-one__rating">
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                            <span class="last-icon icon-star"></span>
                            <span class="last-icon icon-star"></span>
                        </div>
                        <p class="testimonial-one__date">10 Days Ago</p>
                    </div>
                </div>
            </li>
            <li>
                <div class="testimonial-one__single">
                    <div class="testimonial-one__quote-icon">
                        <img src="{{ asset('assets/images/icon/quote-icon-1.png') }}" alt="">
                    </div>
                    <div class="testimonial-one__client-info">
                        <div class="testimonial-one__client-content">
                                <h4 class="testimonial-one__client-name"><a href="{{ route('about') }}">John
                                    Peterson</a></h4>
                            <p class="testimonial-one__client-sub-title">Software Developer </p>
                        </div>
                        <div class="testimonial-one__client-img">
                            <img src="{{ asset('assets/images/testimonial/testimonial-1-4.jpg') }}" alt="">
                        </div>
                    </div>
                    <span class="testimonial-one__sub-title">A great publishing partner!</span>
                    <p class="testimonial-one__text">"We value the ethical standards and transparency.<br>
                        Open access distribution helped our work reach a broader audience."</p>
                    <div class="testimonial-one__rating-and-date">
                        <div class="testimonial-one__rating">
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                            <span class="last-icon icon-star"></span>
                            <span class="last-icon icon-star"></span>
                        </div>
                        <p class="testimonial-one__date">10 Days Ago</p>
                    </div>
                </div>
            </li>
            @endif
        </ul>
    </div>
</section>
<!--Testimonial One End -->

<!--Blog One Start-->
<section class="blog-one">
    <div class="blog-one__shape-bg" style="background-image: url({{ asset('assets/images/shapes/blog-one-shape-bg.png') }});">
    </div>
    <div class="container">
        <div class="blog-one__top">
            <div class="section-title text-left sec-title-animation animation-style2">
                <div class="section-title__tagline-box">
                    <div class="section-title__tagline-shape-box">
                        <div class="section-title__tagline-shape"></div>
                        <div class="section-title__tagline-shape-2"></div>
                    </div>
                    <span class="section-title__tagline">{{ $blogTagline }}</span>
                </div>
                @if($blogHeadingHtml)
                    <h2 class="section-title__title title-animation">{!! $blogHeadingHtml !!}</h2>
                @else
                    <h2 class="section-title__title title-animation">Discover Insights and <span>Tips </span> <br>
                        <span>in Our Latest Articles</span></h2>
                @endif
            </div>
            <div class="blog-one__btn-box">
                <a href="{{ url($blogButtonUrl) }}" class="thm-btn">{{ $blogButtonText }}<span><i class="icon-diagonal-arrow"></i></span></a>
            </div>
        </div>
        <div class="blog-one__bottom">
            <div class="row">
                @if(!empty($blogCards))
                    @foreach(array_slice($blogCards, 0, 4) as $i => $card)
                        @php
                            $imgRaw = data_get($card, 'image');
                            $defaultBlogIndex = min(((int) $i) + 1, 4);
                            $img = $imgRaw
                                ? asset('storage/' . ltrim($imgRaw, '/'))
                                : asset('assets/images/blog/blog-1-' . $defaultBlogIndex . '.jpg');
                            $link = data_get($card, 'link_url') ?: route('blog-details');
                            $day = data_get($card, 'day') ?: '01';
                            $month = data_get($card, 'month') ?: 'JAN';
                            $tagsRaw = (string) (data_get($card, 'tags') ?? '');
                            $tags = $tagsRaw !== '' ? preg_split('/\s*\|\s*/', $tagsRaw) : [];
                            $isAlt = $i % 2 === 1;
                        @endphp
                        <div class="col-xl-3 col-lg-6 col-md-6 wow {{ $isAlt ? 'fadeInRight' : 'fadeInLeft' }}" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="blog-one__single">
                                @if(!$isAlt)
                                    <div class="blog-one__img-box">
                                        <div class="blog-one__img">
                                            <img src="{{ $img }}" alt="">
                                        </div>
                                        <div class="blog-one__date">
                                            <p>{{ $day }}</p>
                                            <span>{{ $month }}</span>
                                        </div>
                                        @if(!empty($tags))
                                            <ul class="list-unstyled blog-one__tag">
                                                @foreach($tags as $tag)
                                                    <li><a href="{{ $link }}">{{ $tag }}</a></li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </div>
                                    <div class="blog-one__content">
                                        <h3 class="blog-one__title"><a href="{{ $link }}">{{ data_get($card, 'title') }}</a></h3>
                                        <p class="blog-one__text">{{ data_get($card, 'text') }}</p>
                                    </div>
                                @else
                                    <div class="blog-one__content blog-one__content--two">
                                        <h3 class="blog-one__title"><a href="{{ $link }}">{{ data_get($card, 'title') }}</a></h3>
                                        <p class="blog-one__text">{{ data_get($card, 'text') }}</p>
                                    </div>
                                    <div class="blog-one__img-box">
                                        <div class="blog-one__img">
                                            <img src="{{ $img }}" alt="">
                                        </div>
                                        <div class="blog-one__date">
                                            <p>{{ $day }}</p>
                                            <span>{{ $month }}</span>
                                        </div>
                                        @if(!empty($tags))
                                            <ul class="list-unstyled blog-one__tag">
                                                @foreach($tags as $tag)
                                                    <li><a href="{{ $link }}">{{ $tag }}</a></li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @elseif($blogCardsSource !== 'db')
                <!--Blog One Single Start-->
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="blog-one__single">
                        <div class="blog-one__img-box">
                            <div class="blog-one__img">
                                <img src="{{ asset('assets/images/blog/blog-1-1.jpg') }}" alt="">
                            </div>
                            <div class="blog-one__date">
                                <p>05</p>
                                <span>NOV</span>
                            </div>
                            <ul class="list-unstyled blog-one__tag">
                                <li><a href="{{ route('blog-details') }}">Cardiology and Cardiovascular Medicine</a></li>
                                <li><a href="{{ route('blog-details') }}">Internal Medicine</a></li>
                            </ul>
                        </div>
                        <div class="blog-one__content">
                            <h3 class="blog-one__title"><a href="{{ route('blog-details') }}">Reporting Standards for
                                Cardiology &amp; Internal Medicine Manuscripts</a></h3>
                            <p class="blog-one__text">Practical tips for outcomes, methods clarity, and ethical disclosures.</p>
                        </div>
                    </div>
                </div>
                <!--Blog One Single End-->
                <!--Blog One Single Start-->
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="blog-one__single">
                        <div class="blog-one__content blog-one__content--two">
                            <h3 class="blog-one__title"><a href="{{ route('blog-details') }}">Surgical Case Reports:
                                Orthopedics &amp; Neurosurgery Submission Essentials</a></h3>
                            <p class="blog-one__text">Consent, imaging, and follow-up reporting tips for high-quality cases.</p>
                        </div>
                        <div class="blog-one__img-box">
                            <div class="blog-one__img">
                                <img src="{{ asset('assets/images/blog/blog-1-2.jpg') }}" alt="">
                            </div>
                            <div class="blog-one__date">
                                <p>24</p>
                                <span>APR</span>
                            </div>
                            <ul class="list-unstyled blog-one__tag">
                                <li><a href="{{ route('blog-details') }}">Orthopedics and Sports Medicine</a></li>
                                <li><a href="{{ route('blog-details') }}">Neurosurgery</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--Blog One Single End-->
                <!--Blog One Single Start-->
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="blog-one__single">
                        <div class="blog-one__img-box">
                            <div class="blog-one__img">
                                <img src="{{ asset('assets/images/blog/blog-1-3.jpg') }}" alt="">
                            </div>
                            <div class="blog-one__date">
                                <p>12</p>
                                <span>Sep</span>
                            </div>
                            <ul class="list-unstyled blog-one__tag">
                                <li><a href="{{ route('blog-details') }}">Dermatology</a></li>
                                <li><a href="{{ route('blog-details') }}">Obstetrics &amp; Gynecology</a></li>
                            </ul>
                        </div>
                        <div class="blog-one__content">
                            <h3 class="blog-one__title"><a href="{{ route('blog-details') }}">Clinical Images &amp; Figures:
                                Dermatology and OB/GYN Best Practices</a></h3>
                            <p class="blog-one__text">Resolution, anonymization, and figure legends for submission.</p>
                        </div>
                    </div>
                </div>
                <!--Blog One Single End-->
                <!--Blog One Single Start-->
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="blog-one__single">
                        <div class="blog-one__content blog-one__content--two">
                            <h3 class="blog-one__title"><a href="{{ route('blog-details') }}">Ethics &amp; Sensitive Data:
                                Psychiatry and Urology Research Submissions</a></h3>
                            <p class="blog-one__text">Guidance on consent, confidentiality, and responsible reporting.</p>
                        </div>
                        <div class="blog-one__img-box">
                            <div class="blog-one__img">
                                <img src="{{ asset('assets/images/blog/blog-1-4.jpg') }}" alt="">
                            </div>
                            <div class="blog-one__date">
                                <p>30</p>
                                <span>DEC</span>
                            </div>
                            <ul class="list-unstyled blog-one__tag">
                                <li><a href="{{ route('blog-details') }}">Psychiatry and Mental Health</a></li>
                                <li><a href="{{ route('blog-details') }}">Urology</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--Blog One Single End-->
                @else
                    <div class="col-12">
                        <div class="blog-one__single" style="padding: 30px;">
                            <h3 class="blog-one__title">Belum ada artikel</h3>
                            <p class="blog-one__text">Konten Scientific News akan tampil di sini setelah admin mempublikasikan postingan.</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
<!--Blog One End-->
<x-footer2 />
<x-mobileMenu />
<x-searchPopup />
<x-scroll-to-top />
@endsection
