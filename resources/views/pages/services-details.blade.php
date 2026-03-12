@extends('layouts.breadcrumbs')
@section('title', ($serviceTitle ?? 'Service Details'))

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/services.css') }}?v={{ filemtime(public_path('assets/css/module-css/services.css')) }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/awards.css') }}" />
@endpush

@php
    $bodyClass = 'custom-cursor';
    $title = $serviceTitle ?? 'Service Details';
    $subtitle = 'Service Details';

    $home = (array) ($homeSettings ?? []);
    $details = (array) data_get($home, 'services_detail', []);

    if (count($details) === 0) {
        $details = [
            'intro_title' => "End-to-end journal publishing support for authors,\neditors, and institutions",
            'intro_text' => 'Med Open Press provides a complete publishing workflow—from initial manuscript checks and peer-review coordination to professional editing, layout (typesetting), DOI and metadata preparation, and final online publication.',
            'highlights_title' => 'Service Highlights',
            'highlights_text' => 'Our services are designed to help journals run smoothly and help authors publish with confidence.',
            'highlights_left_points' => [
                'Initial screening and format compliance',
                'Peer-review coordination and decision support',
                'Copyediting and language polishing',
            ],
            'highlights_right_points' => [
                'Typesetting, proofing, and final files (PDF/HTML)',
                'DOI and metadata preparation (ORCID, references)',
                'Publication support and dissemination readiness',
            ],
            'cards' => [
                [
                    'icon' => 'icon-review',
                    'title' => 'Peer Review & Editorial Support',
                    'text' => "Structured review workflows,\nreviewer coordination, reminders, and clear\neditorial decisions.",
                ],
                [
                    'icon' => 'icon-file',
                    'title' => 'Production & Publishing',
                    'text' => "Copyediting, layout, proofing,\nand publication-ready files with consistent\njournal formatting.",
                ],
            ],
            'workflow_title' => 'Publishing Workflow Summary',
            'workflow_text' => 'A reliable publishing process helps reduce delays and improves quality.',
            'why_title' => 'Why Choose Med Open Press?',
            'why_text_1' => 'We combine professional editorial standards with practical production support.',
            'why_text_2' => 'From authors to editorial teams, we focus on consistent quality, ethical practices, and discoverability.',
            'why_points' => [
                'Editorial quality and publishing ethics focus',
                'Clear timelines and responsive communication',
                'Professional editing and consistent journal formatting',
                'Metadata-ready outputs for discoverability',
            ],
            'post_text' => 'We can also support post-publication needs—such as minor corrections, metadata updates, and improvements that help readers find and cite your work.',
            'doi_title' => 'DOI, Metadata, and Indexing Support',
            'doi_text' => 'We help prepare publication-ready metadata for better discoverability: DOI preparation, author identifiers (e.g., ORCID), reference checks, and consistent article information.',
            'sidebar' => [
                'more_services_title' => 'More Services',
                'get_touch_title' => 'Need help with your manuscript or journal?',
                'button_text' => 'Contact Us',
                'button_url' => 'https://wa.me/628971399093',
                'call_label' => 'Call us for publishing support',
                'phone' => '+62 897 1399 093',
            ],
            'faq' => [
                'tagline' => 'FAQs',
                'heading_html' => 'Your Questions Answered <br><span>Explore Our FAQs</span>',
                'text' => "Everything you need to know. Detailed <br> overview of our\nfrequently asked questions",
                'accordions' => [],
            ],
        ];
    }

    $introTitle = (string) data_get($details, 'intro_title', $serviceTitle ?? 'Service Details');
    $introText = (string) data_get($details, 'intro_text', '');

    $mainImageRaw = (string) data_get($details, 'main_image', '');
    $mainImageUrl = trim($mainImageRaw) !== ''
        ? asset('storage/' . ltrim($mainImageRaw, '/'))
        : asset('assets/images/services/services-details-img-1.jpg');

    $hlTitle = (string) data_get($details, 'highlights_title', 'Service Highlights');
    $hlText = (string) data_get($details, 'highlights_text', '');
    $hlLeft = (array) data_get($details, 'highlights_left_points', []);
    $hlRight = (array) data_get($details, 'highlights_right_points', []);

    $cards = (array) data_get($details, 'cards', []);
    $cards = array_slice(array_pad($cards, 2, []), 0, 2);

    $workflowTitle = (string) data_get($details, 'workflow_title', 'Workflow');
    $workflowText = (string) data_get($details, 'workflow_text', '');

    $whyTitle = (string) data_get($details, 'why_title', 'Why Choose Us');
    $whyText1 = (string) data_get($details, 'why_text_1', '');
    $whyText2 = (string) data_get($details, 'why_text_2', '');
    $whyPoints = (array) data_get($details, 'why_points', []);

    $postText = (string) data_get($details, 'post_text', '');
    $doiTitle = (string) data_get($details, 'doi_title', 'DOI & Metadata');
    $doiText = (string) data_get($details, 'doi_text', '');

    $sidebar = (array) data_get($details, 'sidebar', []);
    $moreServicesTitle = (string) data_get($sidebar, 'more_services_title', 'More Services');
    $getTouchTitle = (string) data_get($sidebar, 'get_touch_title', 'Need help?');
    $sidebarBtnText = (string) data_get($sidebar, 'button_text', 'Contact Us');
    $sidebarBtnUrl = (string) data_get($sidebar, 'button_url', route('contact'));
    $callLabel = (string) data_get($sidebar, 'call_label', 'Call us');
    $phone = (string) data_get($sidebar, 'phone', '+62 897 1399 093');
    $phoneTel = preg_replace('/[^0-9\+]/', '', $phone) ?: $phone;

    $faq = (array) data_get($details, 'faq', []);
    $faqTagline = (string) data_get($faq, 'tagline', 'FAQS');
    $faqHeadingHtml = (string) data_get($faq, 'heading_html', 'Your Questions Answered');
    $faqText = (string) data_get($faq, 'text', '');
    $faqAccordions = (array) data_get($faq, 'accordions', []);
    if (count($faqAccordions) === 0) {
        $faqAccordions = [
            [
                'question' => 'How do I start publishing with Med Open Press?',
                'answer' => 'Contact us via WhatsApp and share your manuscript or journal needs. We’ll confirm scope and guide you through submission, review steps, and the production timeline.',
            ],
            [
                'question' => 'How long does peer review and publication usually take?',
                'answer' => 'Timelines vary by journal and reviewer availability. We help coordinate review and decision steps, then proceed to editing, proofing, and publication once an article is accepted.',
            ],
            [
                'question' => 'Do you provide editing, formatting, and typesetting?',
                'answer' => 'Yes. We support copyediting, journal style formatting, and typesetting with proof rounds to produce consistent, publication-ready files.',
            ],
            [
                'question' => 'Can you help with DOI and indexing readiness?',
                'answer' => 'We can support DOI and metadata preparation and help ensure articles are packaged consistently for discoverability and common archiving expectations.',
            ],
        ];
    }

    $tabsList = (array) ($tabs ?? []);
@endphp

@section('content')
    <x-strickyHeader />

    <section class="services-details">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="services-details__left">
                        <h3 class="services-details__title-1">{!! nl2br(e($introTitle)) !!}</h3>
                        <p class="services-details__text-1">{{ $introText }}</p>

                        <div class="services-details__img-box">
                            <div class="services-details__img">
                                <img src="{{ $mainImageUrl }}" alt="">
                            </div>
                        </div>

                        <h3 class="services-details__title-2">{{ $hlTitle }}</h3>
                        <p>{{ $hlText }}</p>

                        <div class="services-details__points-box">
                            <ul class="services-details__points list-unstyled">
                                @foreach($hlLeft as $p)
                                    @if(is_string($p) && trim($p) !== '')
                                        <li>
                                            <div class="icon"><span class="icon-check"></span></div>
                                            <p>{{ $p }}</p>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                            <ul class="services-details__points list-unstyled">
                                @foreach($hlRight as $p)
                                    @if(is_string($p) && trim($p) !== '')
                                        <li>
                                            <div class="icon"><span class="icon-check"></span></div>
                                            <p>{{ $p }}</p>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>

                        <div class="services-details__service-single-box">
                            <div class="row">
                                @foreach($cards as $c)
                                    @php
                                        $icon = (string) data_get($c, 'icon', 'icon-file');
                                        $cardTitle = (string) data_get($c, 'title', '');
                                        $cardText = (string) data_get($c, 'text', '');
                                    @endphp
                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="services-details__services-single">
                                            <div class="services-details__services-icon"><span class="{{ $icon }}"></span></div>
                                            <h3 class="services-details__services-title">{{ $cardTitle }}</h3>
                                            <p>{!! nl2br(e($cardText)) !!}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <h3 class="services-details__title-3">{{ $workflowTitle }}</h3>
                        <p>{{ $workflowText }}</p>

                        <div class="services-details__img-box-2">
                            <div class="services-details__img-box-img-1">
                                <img src="{{ asset('assets/images/services/services-details-img-box-img-1.jpg') }}" alt="">
                            </div>
                            <div class="services-details__img-box-img-1">
                                <img src="{{ asset('assets/images/services/services-details-img-box-img-2.jpg') }}" alt="">
                            </div>
                        </div>

                        <h3 class="services-details__title-4">{{ $whyTitle }}</h3>
                        <p>{{ $whyText1 }}</p>
                        <p>{{ $whyText2 }}</p>

                        <div class="services-details__points-and-img-box">
                            <div class="services-details__points-3">
                                <ul class="services-details__points-list-3 list-unstyled">
                                    @foreach($whyPoints as $p)
                                        @if(is_string($p) && trim($p) !== '')
                                            <li>
                                                <div class="icon"><span class="icon-check"></span></div>
                                                <p>{{ $p }}</p>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                            <div class="services-details__points-img">
                                <img src="{{ asset('assets/images/services/services-details-points-img.jpg') }}" alt="">
                            </div>
                        </div>

                        @if(trim($postText) !== '')
                            <p>{{ $postText }}</p>
                        @endif

                        <h3 class="services-details__title-5">{{ $doiTitle }}</h3>
                        <p>{{ $doiText }}</p>

                        <div class="services-details__bottom-img">
                            <img src="{{ asset('assets/images/services/services-details-bottom-img.jpg') }}" alt="">
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-5">
                    <div class="services-details__right">
                        <div class="services-details__service-list-box">
                            <h3 class="services-details__service-list-title">{{ $moreServicesTitle }}</h3>
                            <ul class="services-details__service-list list-unstyled">
                                @if(count($tabsList) > 0)
                                    @foreach($tabsList as $t)
                                        @php
                                            $tabTitle = (string) data_get($t, 'title', 'Service');
                                            $rawUrl = (string) data_get($t, 'button_url', '');
                                            $path = $rawUrl !== '' ? (string) parse_url($rawUrl, PHP_URL_PATH) : '';
                                            $pathSlug = trim($path, '/');
                                            $pathSlug = $pathSlug !== '' ? \Illuminate\Support\Str::afterLast($pathSlug, '/') : '';
                                            $fallbackSlug = (string) data_get($t, 'slug', '');
                                            $linkSlug = $pathSlug !== '' ? $pathSlug : ($fallbackSlug !== '' ? $fallbackSlug : \Illuminate\Support\Str::slug($tabTitle));

                                            $linkUrl = $rawUrl !== '' ? $rawUrl : route('services-detail', ['slug' => $linkSlug]);
                                            $isActive = $serviceSlug === $linkSlug;
                                        @endphp
                                        <li class="{{ $isActive ? 'active' : '' }}">
                                            <a href="{{ $linkUrl }}"><span class="icon-diagonal-arrow"></span>{{ $tabTitle }}</a>
                                        </li>
                                    @endforeach
                                @else
                                    <li class="active"><a href="{{ route('services') }}"><span class="icon-diagonal-arrow"></span>{{ $serviceTitle ?? 'Services' }}</a></li>
                                @endif
                            </ul>
                        </div>

                        <div class="services-details__service-list-box">
                            <h3 class="services-details__service-list-title">{{ $getTouchTitle }}</h3>
                            <p>{{ $callLabel }}</p>
                            <ul class="services-details__service-list list-unstyled">
                                <li>
                                    <a href="{{ $sidebarBtnUrl }}"><span class="icon-diagonal-arrow"></span>{{ $sidebarBtnText }}</a>
                                </li>
                                <li>
                                    <a href="tel:{{ $phoneTel }}"><span class="icon-diagonal-arrow"></span>{{ $phone }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="awards-one">
        <div class="awards-one__sahpe-1">
            <img src="{{ asset('assets/images/shapes/award-one-shape-1.png') }}" alt="">
        </div>
        <div class="awards-one__sahpe-2">
            <img src="{{ asset('assets/images/shapes/award-one-shape-2.png') }}" alt="">
        </div>

        <div class="container">
            <div class="section-title text-center sec-title-animation animation-style1">
                <div class="section-title__tagline-box">
                    <div class="section-title__tagline-shape-box">
                        <div class="section-title__tagline-shape"></div>
                        <div class="section-title__tagline-shape-2"></div>
                    </div>
                    <span class="section-title__tagline">{{ $faqTagline }}</span>
                </div>
                <h2 class="section-title__title title-animation">{!! $faqHeadingHtml !!}</h2>
            </div>

            @if(trim(strip_tags($faqText)) !== '')
                <p class="text-center mb-4">{!! $faqText !!}</p>
            @endif

            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-10">
                    <div class="faq-one-accrodion">
                        <div class="accrodion-grp" data-grp-name="services-detail-faq">
                            @php
                                $activeIndex = count($faqAccordions) > 1 ? 1 : 0;
                            @endphp
                            @foreach(array_slice($faqAccordions, 0, 4) as $i => $a)
                                @php
                                    $q = (string) data_get($a, 'question', 'Question');
                                    $ans = (string) data_get($a, 'answer', '');
                                @endphp
                                <div class="accrodion {{ $i === $activeIndex ? 'active' : '' }}">
                                    <div class="accrodion-title">
                                        <h4>{{ $q }}</h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                            <div class="content-box">
                                                <p class="content-box-text">{{ $ans }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <x-footer2 />

@endsection
