@extends('layouts.breadcrumbs')
@section('title', 'Services Detail || Med Open Press')
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/services.css') }}?v={{ filemtime(public_path('assets/css/module-css/services.css')) }}"/>
    <link rel="stylesheet" href="{{asset('assets/css/module-css/project.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/module-css/faq.css')}}"/>
@endpush
@php
    $bodyClass = 'custom-cursor';
    $title = 'Publishing Services';
    $subtitle = 'Publishing Services';

    $home = $homeSettings ?? [];
    $sd = (array) data_get($home, 'services_detail', []);

    $introTitle = (string) data_get($sd, 'intro_title', "End-to-end journal publishing support for authors,\neditors, and institutions");
    $introText = (string) data_get($sd, 'intro_text', 'Med Open Press provides a complete publishing workflow—from initial manuscript checks and peer-review coordination to professional editing, layout (typesetting), DOI and metadata preparation, and final online publication. We focus on clarity, integrity, and discoverability so your work is ready for readers and indexing.');

    $mainImagePath = (string) data_get($sd, 'main_image', '');
    $mainImageUrl = $mainImagePath !== '' ? asset('storage/' . ltrim($mainImagePath, '/')) : asset('assets/images/services/services-details-img-4.jpg');

    $highlightsTitle = (string) data_get($sd, 'highlights_title', 'Service Highlights');
    $highlightsText = (string) data_get($sd, 'highlights_text', 'Our services are designed to help journals run smoothly and help authors publish with confidence. We combine structured editorial processes, quality-focused production, and metadata-ready outputs to support wider dissemination.');

    $hlLeft = (array) data_get($sd, 'highlights_left_points', []);
    if (count($hlLeft) === 0) {
        $hlLeft = [
            'Initial screening and format compliance',
            'Peer-review coordination and decision support',
            'Copyediting and language polishing',
        ];
    }
    $hlLeft = array_slice(array_values($hlLeft), 0, 10);

    $hlRight = (array) data_get($sd, 'highlights_right_points', []);
    if (count($hlRight) === 0) {
        $hlRight = [
            'Typesetting, proofing, and final files (PDF/HTML)',
            'DOI and metadata preparation (ORCID, references)',
            'Publication support and dissemination readiness',
        ];
    }
    $hlRight = array_slice(array_values($hlRight), 0, 10);

    $cards = (array) data_get($sd, 'cards', []);
    if (count($cards) === 0) {
        $cards = [
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
        ];
    }
    $cards = array_slice(array_pad($cards, 2, []), 0, 2);

    $workflowTitle = (string) data_get($sd, 'workflow_title', 'Publishing Workflow Summary');
    $workflowText = (string) data_get($sd, 'workflow_text', 'A reliable publishing process helps reduce delays and improves quality. Our workflow is designed to keep authors informed at each step—from submission checks and review to editorial improvement, production, and final release.');
    $workflowImage1Path = (string) data_get($sd, 'workflow_image_1', '');
    $workflowImage2Path = (string) data_get($sd, 'workflow_image_2', '');
    $workflowImage1Url = $workflowImage1Path !== '' ? asset('storage/' . ltrim($workflowImage1Path, '/')) : asset('assets/images/services/services-details-img-box-img-1.jpg');
    $workflowImage2Url = $workflowImage2Path !== '' ? asset('storage/' . ltrim($workflowImage2Path, '/')) : asset('assets/images/services/services-details-img-box-img-2.jpg');

    $whyTitle = (string) data_get($sd, 'why_title', 'Why Choose Med Open Press?');
    $whyText1 = (string) data_get($sd, 'why_text_1', 'We combine professional editorial standards with practical production support. Our priority is a transparent process, clear communication, and publication outputs that are ready for readers and systems.');
    $whyText2 = (string) data_get($sd, 'why_text_2', 'From authors to editorial teams, we focus on consistent quality, ethical practices, and discoverability through strong metadata and formatting.');
    $whyPoints = (array) data_get($sd, 'why_points', []);
    if (count($whyPoints) === 0) {
        $whyPoints = [
            'Editorial quality and publishing ethics focus',
            'Clear timelines and responsive communication',
            'Professional editing and consistent journal formatting',
            'Metadata-ready outputs for discoverability',
        ];
    }
    $whyPoints = array_slice(array_values($whyPoints), 0, 20);
    $whyImagePath = (string) data_get($sd, 'why_image', '');
    $whyImageUrl = $whyImagePath !== '' ? asset('storage/' . ltrim($whyImagePath, '/')) : asset('assets/images/services/services-details-points-img.jpg');

    $postText = (string) data_get($sd, 'post_text', 'We can also support post-publication needs—such as minor corrections, metadata updates, and improvements that help readers find and cite your work.');

    $doiTitle = (string) data_get($sd, 'doi_title', 'DOI, Metadata, and Indexing Support');
    $doiText = (string) data_get($sd, 'doi_text', 'We help prepare publication-ready metadata for better discoverability: DOI preparation, author identifiers (e.g., ORCID), reference checks, and consistent article information. This supports smoother dissemination and helps your journal align with common indexing and archiving expectations.');

    $bottomImagePath = (string) data_get($sd, 'bottom_image', '');
    $bottomImageUrl = $bottomImagePath !== '' ? asset('storage/' . ltrim($bottomImagePath, '/')) : asset('assets/images/services/services-details-bottom-img.jpg');

    $sidebar = (array) data_get($sd, 'sidebar', []);
    $moreServicesTitle = (string) data_get($sidebar, 'more_services_title', 'More Services');
    $moreServices = (array) data_get($sidebar, 'more_services', []);
    if (count($moreServices) === 0) {
        $moreServices = [
            'Editorial & Copyediting',
            'Peer Review Coordination',
            'Typesetting & Proofing',
            'DOI & Metadata',
            'Indexing & Archiving Support',
        ];
    }
    $moreServices = array_slice(array_values($moreServices), 0, 10);

    $getTouchTitle = (string) data_get($sidebar, 'get_touch_title', 'Need help with your manuscript or journal?');
    $getTouchButtonText = (string) data_get($sidebar, 'button_text', 'Contact Us');
    $getTouchButtonUrl = (string) data_get($sidebar, 'button_url', (string) data_get($home, 'about_page.consultation_button_url', 'https://wa.me/628971399093'));
    $callLabel = (string) data_get($sidebar, 'call_label', 'Call us for publishing support');
    $phoneDisplay = (string) data_get($sidebar, 'phone', (string) data_get($home, 'about_page.phone', '+62 897 1399 093'));
    $phoneTel = preg_replace('/[^0-9\+]/', '', $phoneDisplay) ?: $phoneDisplay;

    $faq = (array) data_get($sd, 'faq', []);
    $faqTagline = (string) data_get($faq, 'tagline', 'FAQs');
    $faqHeadingHtml = (string) data_get($faq, 'heading_html', 'Your Questions Answered <br><span>Explore Our FAQs</span>');
    $faqText = (string) data_get($faq, 'text', "Everything you need to know. Detailed <br> overview of our\nfrequently asked questions");
    $faqPoints = (array) data_get($faq, 'points', []);
    if (count($faqPoints) === 0) {
        $faqPoints = [
            'A Comprehensive Guide to Our Frequently Asked <br> Questions',
            'Find the Information You’re Looking For',
        ];
    }
    $faqPoints = array_slice(array_pad($faqPoints, 2, ''), 0, 2);
    $faqAccordions = (array) data_get($faq, 'accordions', []);
    if (count($faqAccordions) === 0) {
        $faqAccordions = [
            [
                'question' => 'How do I start publishing with Med Open Press?',
                'answer' => 'Contact us via WhatsApp and share your manuscript or journal needs. We’ll confirm scope (journal policy, formatting, and workflow), then guide you through submission, review steps, and the production timeline.',
            ],
            [
                'question' => 'How long does peer review and publication usually take?',
                'answer' => 'Timelines vary by journal and reviewer availability. We help coordinate reviewer invitations, reminders, and decision steps to keep the process moving, then proceed to editing, proofing, and final publication once an article is accepted.',
            ],
            [
                'question' => 'Do you provide editing, formatting, and typesetting?',
                'answer' => 'Yes. We support copyediting and language refinement, journal style formatting, and typesetting with proof rounds. The goal is a clear, consistent article presentation aligned to your journal guidelines.',
            ],
            [
                'question' => 'Can you help with DOI and indexing readiness?',
                'answer' => 'We can support DOI and metadata preparation and help ensure articles are packaged consistently for discoverability. If you have target indexing or archiving requirements, we’ll align formatting and metadata fields to those expectations where applicable.',
            ],
        ];
    }
    $faqAccordions = array_slice(array_pad($faqAccordions, 4, []), 0, 4);
    $faqContact = (array) data_get($faq, 'contact', []);
    $faqContactBigText = (string) data_get($faqContact, 'big_text', 'Get In Touch');
    $faqContactTitleHtml = (string) data_get($faqContact, 'title_html', 'If you have any other <br> questions, please contact<br> us here');
    $faqContactButtonText = (string) data_get($faqContact, 'button_text', 'Contact Us');
    $faqContactButtonUrl = (string) data_get($faqContact, 'button_url', (string) data_get($home, 'about_page.consultation_button_url', 'https://wa.me/628971399093'));
@endphp
@section('content')
    <!--Service details Start-->
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
                            <h3 class="services-details__title-2">{{ $highlightsTitle }}</h3>
                            <p class="services-details__text-2">{{ $highlightsText }}</p>
                            <div class="services-details__points-box">
                                <ul class="services-details__points list-unstyled">
                                    @foreach($hlLeft as $p)
                                        @php $p = (string) $p; @endphp
                                        @if(trim($p) !== '')
                                            <li>
                                                <div class="icon">
                                                    <span class="icon-star-1"></span>
                                                </div>
                                                <p>{{ $p }}</p>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                                <ul class="services-details__points list-unstyled">
                                    @foreach($hlRight as $p)
                                        @php $p = (string) $p; @endphp
                                        @if(trim($p) !== '')
                                            <li>
                                                <div class="icon">
                                                    <span class="icon-star-1"></span>
                                                </div>
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
                                            $cIcon = (string) data_get($c, 'icon', 'icon-review');
                                            $cTitle = (string) data_get($c, 'title', '');
                                            $cText = (string) data_get($c, 'text', '');
                                        @endphp
                                        <div class="col-xl-6">
                                            <div class="services-details__services-single">
                                                <div class="services-details__services-icon">
                                                    <span class="{{ $cIcon }}"></span>
                                                </div>
                                                <h3 class="services-details__services-title">{{ $cTitle }}</h3>
                                                <p class="services-details__services-text">{!! nl2br(e($cText)) !!}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <h3 class="services-details__title-3">{{ $workflowTitle }}</h3>
                            <p class="services-details__text-3">{{ $workflowText }}</p>
                            <div class="services-details__img-box-2">
                                <div class="row">
                                    <div class="col-xl-6 col-md-6">
                                        <div class="services-details__img-box-img-1">
                                            <img src="{{ $workflowImage1Url }}" alt="">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6">
                                        <div class="services-details__img-box-img-1">
                                            <img src="{{ $workflowImage2Url }}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h3 class="services-details__title-4">{{ $whyTitle }}</h3>
                            <p class="services-details__text-4">{{ $whyText1 }}</p>
                            <p class="services-details__text-5">{{ $whyText2 }}</p>
                            <div class="services-details__points-and-img-box">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="services-details__points-3">
                                            <ul class="services-details__points-list-3 list-unstyled">
                                                @foreach($whyPoints as $p)
                                                    @php $p = (string) $p; @endphp
                                                    @if(trim($p) !== '')
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-star-1"></span>
                                                            </div>
                                                            <p>{{ $p }}</p>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="services-details__points-img">
                                            <img src="{{ $whyImageUrl }}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="services-details__text-6">{{ $postText }}</p>
                            <h3 class="services-details__title-5">{{ $doiTitle }}</h3>
                            <p class="services-details__text-7">{{ $doiText }}</p>
                            <div class="services-details__bottom-img">
                                <img src="{{ $bottomImageUrl }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="services-details__right">
                            <div class="services-details__service-list-box">
                                <h3 class="services-details__service-list-title">{{ $moreServicesTitle }}</h3>
                                <ul class="services-details__service-list list-unstyled">
                                    @foreach($moreServices as $i => $s)
                                        @php $s = (string) $s; @endphp
                                        @if(trim($s) !== '')
                                            <li class="{{ $i === 0 ? 'active' : '' }}">
                                                <a href="{{ route('services') }}"><span class="icon-diagonal-arrow"></span>{!! e($s) !!}</a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                            <div class="project-details__get-touch">
                                <h3 class="project-details__get-touch-title">{{ $getTouchTitle }}</h3>
                                <div class="project-details__get-touch-btn-box">
                                    <a href="{{ $getTouchButtonUrl }}" class="thm-btn">{{ $getTouchButtonText }}<span><i class="icon-diagonal-arrow"></i></span></a>
                                </div>
                                <div class="project-details__call-box">
                                    <div class="project-details__call-icon">
                                        <span class="icon-support"></span>
                                    </div>
                                    <div class="project-details__call-content">
                                        <p>{{ $callLabel }}</p>
                                        <a href="tel:{{ $phoneTel }}">{{ $phoneDisplay }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Services Details End-->

        <!--Faq One Start -->
        <section class="faq-one">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="faq-one__left">
                            <div class="section-title text-left sec-title-animation animation-style2">
                                <div class="section-title__tagline-box">
                                    <div class="section-title__tagline-shape-box">
                                        <div class="section-title__tagline-shape"></div>
                                        <div class="section-title__tagline-shape-2"></div>
                                    </div>
                                        <span class="section-title__tagline">{{ $faqTagline }}</span>
                                </div>
                                <h2 class="section-title__title title-animation">{!! $faqHeadingHtml !!}</h2>
                            </div>
                            <p class="faq-one__text">{!! nl2br(e($faqText)) !!}</p>
                            <ul class="list-unstyled faq-one__points">
                                <li>
                                    <div class="icon">
                                        <span class="icon-star-1"></span>
                                    </div>
                                    <div class="text">
                                        <p>{!! (string) ($faqPoints[0] ?? '') !!}</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <span class="icon-star-1"></span>
                                    </div>
                                    <div class="text">
                                        <p>{!! (string) ($faqPoints[1] ?? '') !!}</p>
                                    </div>
                                </li>
                            </ul>
                            <div class="faq-one__contact-box">
                                <div class="faq-one__contact-img">
                                    <img src="{{ asset('assets/images/resources/faq-one-contact-img.png') }}" alt="">
                                </div>
                                <div class="faq-one__contact-big-text">{{ $faqContactBigText }}</div>
                                <h3 class="faq-one__contact-title">{!! $faqContactTitleHtml !!}</h3>
                                <div class="faq-one__btn-box">
                                    <a href="{{ $faqContactButtonUrl }}" class="thm-btn">{{ $faqContactButtonText }}<span><i class="icon-diagonal-arrow"></i></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="faq-one__right">
                            <div class="accrodion-grp" data-grp-name="faq-one-accrodion">
                                @foreach($faqAccordions as $i => $a)
                                    @php
                                        $q = (string) data_get($a, 'question', '');
                                        $ans = (string) data_get($a, 'answer', '');
                                    @endphp
                                    <div class="accrodion {{ $i === 1 ? 'active' : '' }}">
                                        <div class="accrodion-title">
                                            <h4>{{ $q }}</h4>
                                        </div>
                                        <div class="accrodion-content">
                                            <div class="inner">
                                                <p>{{ $ans }}</p>
                                            </div><!-- /.inner -->
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Faq One End -->
    <x-strickyHeader />
    <x-footer2 />
    <x-mobileMenu />
    <x-searchPopup />
    <x-scroll-to-top />
@endsection
