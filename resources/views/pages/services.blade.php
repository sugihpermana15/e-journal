@extends('layouts.breadcrumbs')
@section('title', 'Publishing Services || Med Open Press')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/services.css') }}?v={{ filemtime(public_path('assets/css/module-css/services.css')) }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/sliding-text.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/process.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/faq.css') }}" />
@endpush

@php
    $bodyClass = 'custom-cursor';
    $title = 'Publishing Services';
    $subtitle = 'Publishing Services';

    $home = (array) ($homeSettings ?? []);
    $services = (array) data_get($home, 'services', []);
    $tabs = (array) data_get($services, 'tabs', []);
    $tabs = array_values(array_filter($tabs, fn($t) => is_array($t)));

    if (count($tabs) === 0) {
        $tabs = [
            [
                'button_label' => "Book\nPublishing",
                'slug' => 'residential',
                'icon' => 'icon-file',
                'title' => 'Book Publishing',
                'text' => 'Medical books, monographs, and educational references supported by editorial review, professional copyediting, design, and production.',
                'small_label' => 'Books',
                'small_sublabel' => 'Publishing',
                'button_text' => 'Learn More',
                'button_url' => '/book-publishing',
            ],
            [
                'button_label' => "Scientific Journal\nPublication",
                'slug' => 'commercial',
                'icon' => 'icon-review',
                'title' => 'Scientific Journal Publication',
                'text' => 'End-to-end journal publishing workflows: submissions, peer review coordination, editorial decisions, production, and online publication.',
                'small_label' => 'Journals',
                'small_sublabel' => 'Workflow',
                'button_text' => 'Learn More',
                'button_url' => '/journal-publication',
            ],
            [
                'button_label' => "IPR\nManagement",
                'slug' => 'deep',
                'icon' => 'icon-completed-task',
                'title' => 'Intellectual Property Rights Management (IPR)',
                'text' => 'Copyright, permissions, and licensing guidance to protect author rights and support compliant publication across formats and channels.',
                'small_label' => 'Rights',
                'small_sublabel' => 'Compliance',
                'button_text' => 'Learn More',
                'button_url' => '/ipr-management',
            ],
            [
                'button_label' => "Custom Publishing\nSolutions",
                'slug' => 'office',
                'icon' => 'icon-app',
                'title' => 'Custom Publishing Solutions',
                'text' => 'Tailored publishing programs for societies, institutions, special issues, and supplements with flexible workflows and timelines.',
                'small_label' => 'Custom',
                'small_sublabel' => 'Solutions',
                'button_text' => 'Learn More',
                'button_url' => '/custom-publishing',
            ],
            [
                'button_label' => "Distribution\n& Licensing",
                'slug' => 'sanitizing',
                'icon' => 'icon-share',
                'title' => 'Distribution and Licensing',
                'text' => 'Digital/print distribution options and licensing pathways to expand reach responsibly across platforms, partners, and regions.',
                'small_label' => 'Reach',
                'small_sublabel' => 'Licensing',
                'button_text' => 'Learn More',
                'button_url' => '/distribution-licensing',
            ],
        ];
    }

    $servicesTagline = (string) data_get($services, 'tagline', 'Our Services');
    $servicesHeadingHtml = data_get($services, 'heading_html');

    $slidingTexts = (array) data_get($home, 'sliding_text', []);
    $slidingTexts = array_values(array_filter($slidingTexts, fn($t) => is_string($t) && trim($t) !== ''));
    if (count($slidingTexts) === 0) {
        $slidingTexts = ['Peer Review', 'Open Access', 'Indexing', 'Copyediting', 'Ethics', 'Publishing'];
    }

    $servicesPage = (array) data_get($home, 'services_page', []);
    $workflow = (array) data_get($servicesPage, 'workflow', []);
    $workflowItems = (array) data_get($workflow, 'items', []);
    if (count($workflowItems) === 0) {
        $workflowItems = [
            [
                'icon' => 'icon-file',
                'title_html' => 'Submit Your <br>Manuscript',
                'text' => 'Share your research with our editorial office and receive guidance on scope, requirements, and policies.',
                'url' => '/journals',
            ],
            [
                'icon' => 'icon-review',
                'title_html' => 'Peer Review <br>& Revision',
                'text' => 'Independent expert review and constructive feedback to strengthen scientific validity and clinical relevance.',
                'url' => '/journals',
            ],
            [
                'icon' => 'icon-completed-task',
                'title_html' => 'Editorial Decision <br>& Ethics',
                'text' => 'Transparent editorial decisions supported by ethical standards, accountability, and integrity.',
                'url' => '/journals',
            ],
            [
                'icon' => 'icon-share',
                'title_html' => 'Production <br>& Publication',
                'text' => 'Copyediting, typesetting, and online publication to ensure quality and global accessibility.',
                'url' => '/journals',
            ],
        ];
    }

    $workflowTagline = (string) data_get($workflow, 'tagline', 'WHY CHOOSE US');
    $workflowHeadingHtml = (string) data_get($workflow, 'heading_html', 'Our Editorial Workflow<br><span>From submission to publication</span>');

    $faq = (array) data_get($servicesPage, 'faq', []);
    $faqTagline = (string) data_get($faq, 'tagline', 'FAQs');
    $faqHeadingHtml = (string) data_get($faq, 'heading_html', 'Your Questions Answered <br><span>Publishing Support FAQs</span>');
    $faqText = (string) data_get($faq, 'text', 'Everything you need to know about submissions, peer review, and publishing support.');
    $faqPoints = (array) data_get($faq, 'points', []);
    if (count($faqPoints) === 0) {
        $faqPoints = [
            'A practical guide to our editorial workflow <br> and support services',
            'Find the information you’re looking for',
        ];
    }
    $faqPoints = array_slice(array_pad($faqPoints, 2, ''), 0, 2);

    $faqContact = (array) data_get($faq, 'contact', []);
    $faqContactBigText = (string) data_get($faqContact, 'big_text', 'Get In Touch');
    $faqContactTitleHtml = (string) data_get($faqContact, 'title_html', 'If you have any other <br> questions, please contact <br> our editorial office');
    $faqContactButtonText = (string) data_get($faqContact, 'button_text', 'Contact Us');
    $faqContactButtonUrl = (string) data_get(
        $faqContact,
        'button_url',
        (string) data_get($home, 'about_page.consultation_button_url', 'https://wa.me/628971399093'),
    );

    $faqAccordions = (array) data_get($faq, 'accordions', []);

    if (count($faqAccordions) === 0) {
        $faqAccordions = [
            [
                'question' => 'What publishing services do you offer?',
                'answer' => 'We support the end-to-end journal publishing workflow, including submission checks, editorial screening, peer review coordination, copyediting, production assistance, metadata preparation, and publication guidance aligned with research ethics.',
            ],
            [
                'question' => 'How does submission and peer review work?',
                'answer' => 'After you submit your manuscript, we perform an initial check for scope and basic compliance. Eligible submissions proceed to peer review, followed by author revisions. The editor then makes a decision based on reviewer feedback, quality, and ethical considerations.',
            ],
            [
                'question' => 'Do you provide language editing and formatting support?',
                'answer' => 'Yes. We can assist with manuscript formatting, reference style alignment, and copyediting to improve clarity and consistency. Support options vary by package and the journal’s author guidelines.',
            ],
            [
                'question' => 'What if my manuscript requires major revisions or is not accepted?',
                'answer' => 'We aim for a fair and constructive process. If revisions are requested, you’ll receive detailed feedback and guidance on how to respond. If a manuscript is not accepted, we can still provide improvement recommendations to help with a future submission.',
            ],
        ];
    }
    $faqAccordions = array_slice(array_pad($faqAccordions, 4, []), 0, 4);
@endphp

@section('content')
    <x-strickyHeader />

    <!-- Services Three Start -->
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
                @if(is_string($servicesHeadingHtml) && trim($servicesHeadingHtml) !== '')
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
                            @foreach($tabs as $idx => $tab)
                                @php
                                    $tabId = (string) (data_get($tab, 'slug') ?: ('service-tab-' . ($idx + 1)));
                                    $buttonLabel = (string) data_get($tab, 'button_label', data_get($tab, 'title', 'Service'));
                                @endphp
                                <li data-tab="#{{ $tabId }}" class="tab-btn {{ $idx === 0 ? 'active-btn' : '' }}">
                                    <div class="services-three__tab-buttons-single">
                                        <i class="{{ (string) data_get($tab, 'icon', 'icon-file') }}"></i>
                                        <span>{!! nl2br(e($buttonLabel)) !!}</span>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="tabs-content">
                        @foreach($tabs as $idx => $tab)
                            @php
                                $tabId = (string) (data_get($tab, 'slug') ?: ('service-tab-' . ($idx + 1)));
                                $bgImageRaw = (string) data_get($tab, 'image', '');
                                $bgImage = trim($bgImageRaw) !== '' ? asset('storage/' . ltrim($bgImageRaw, '/')) : null;
                                $fallbackBg = asset('assets/images/services/services-three-tab-img-' . ($idx + 1) . '.jpg');

                                $tabTitle = (string) data_get($tab, 'title', 'Service');
                                $tabText = (string) data_get($tab, 'text', '');
                                $smallLabel = (string) data_get($tab, 'small_label', 'Learn');
                                $smallSubLabel = (string) data_get($tab, 'small_sublabel', 'More');
                                $btnText = (string) data_get($tab, 'button_text', 'Learn More');
                                $rawBtnUrl = trim((string) data_get($tab, 'button_url', ''));
                                $tabSlug = trim((string) data_get($tab, 'slug', ''));
                                $linkSlug = $tabSlug !== '' ? $tabSlug : \Illuminate\Support\Str::slug($tabTitle);
                                $btnUrl = $rawBtnUrl !== '' ? $rawBtnUrl : route('services-detail', ['slug' => $linkSlug]);
                            @endphp
                            <div class="tab {{ $idx === 0 ? 'active-tab' : '' }}" id="{{ $tabId }}">
                                <div class="services-three__tab-content-box">
                                    <div class="services-three__tab-img-1" style="background-image: url({{ $bgImage ?: $fallbackBg }});"></div>
                                    <div class="row">
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="services-three__tab-left">
                                                <div class="services-three__shape-2">
                                                    <img src="{{ asset('assets/images/shapes/services-three-shape-2.png') }}" alt="">
                                                </div>
                                                <h3 class="services-three__tab-title">{{ $tabTitle }}</h3>
                                                <p class="services-three__tab-text">{{ $tabText }}</p>
                                                <div class="services-three__tab-doller-box">
                                                    <p class="services-three__tab-doller">{{ $smallLabel }}</p>
                                                    <span class="services-three__tab-doller-sub-title">{{ $smallSubLabel }}</span>
                                                </div>
                                                <div class="services-three__btn-box">
                                                    <a href="{{ $btnUrl }}" class="thm-btn">{{ $btnText }}<span><i class="icon-diagonal-arrow"></i></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services Three End -->

    <!-- Sliding Text One Start -->
    <section class="sliding-text-one">
        <div class="sliding-text-one__wrap">
            <ul class="sliding-text__list list-unstyled marquee_mode">
                @foreach($slidingTexts as $item)
                    <li>
                        <h2 data-hover="{{ $item }}" class="sliding-text__title">{{ $item }}
                            <img src="{{ asset('assets/images/shapes/sliding-text-shape-1.png') }}" alt=""></h2>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
    <!-- Sliding Text One End -->

    <!-- Workflow Start -->
    <section class="process-one">
        <div class="container">
            <div class="section-title text-center sec-title-animation animation-style1">
                <div class="section-title__tagline-box">
                    <div class="section-title__tagline-shape-box">
                        <div class="section-title__tagline-shape"></div>
                        <div class="section-title__tagline-shape-2"></div>
                    </div>
                    <span class="section-title__tagline">{{ $workflowTagline }}</span>
                </div>
                <h2 class="section-title__title title-animation">{!! $workflowHeadingHtml !!}</h2>
            </div>

            <ul class="list-unstyled row">
                @foreach(array_slice($workflowItems, 0, 4) as $i => $item)
                    @php
                        $icon = (string) data_get($item, 'icon', 'icon-file');
                        $titleHtml = (string) data_get($item, 'title_html', 'Step');
                        $text = (string) data_get($item, 'text', '');
                        $url = (string) data_get($item, 'url', '');
                        $shapeImg = asset('assets/images/shapes/process-one-single-shape-' . ($i + 1) . '.png');
                    @endphp
                    <li class="col-xl-3 col-lg-3 col-md-6">
                        <div class="process-one__single">
                            <div class="process-one__single-shape-1">
                                <img src="{{ $shapeImg }}" alt="">
                            </div>
                            <h3 class="process-one__title">
                                @if(trim($url) !== '')
                                    <a href="{{ $url }}">{!! $titleHtml !!}</a>
                                @else
                                    {!! $titleHtml !!}
                                @endif
                            </h3>
                            <p class="process-one__text">{{ $text }}</p>
                            <div class="process-one__icon">
                                <span class="{{ $icon }}"></span>
                                <div class="process-one__count"></div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
    <!-- Workflow End -->

    <!--Faq One Start -->
    <section class="faq-one">
        <div class="faq-one__shape-bg-1" style="background-image: url({{ asset('assets/images/shapes/faq-two-shape-bg-1.png') }});"></div>
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
                        <p class="faq-one__text">{{ $faqText }}</p>
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
    <!--Faq One End -->

    <x-footer2 />

@endsection
