@extends('layouts.breadcrumbs')
@section('title', 'Services || Med Open Press')
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/module-css/services.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/css/module-css/faq.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/css/module-css/why-choose.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/css/module-css/pricing.css')}}"/>
@endpush
@php
    $bodyClass = 'custom-cursor';
    $title = 'Publishing Services';
    $subtitle = 'Publishing Services';

    $home = $homeSettings ?? [];
    $services = (array) data_get($home, 'services', []);

    $servicesTagline = (string) data_get($services, 'tagline', 'Our Services');
    $servicesHeadingHtml = data_get($services, 'heading_html');
    if (!is_string($servicesHeadingHtml) || trim($servicesHeadingHtml) === '') {
        $servicesHeadingHtml = 'Medical <span>Publishing</span> Services<br>\n<span>From submission to global dissemination</span>';
    }

    $fallbackButtonUrls = [
        route('book-publishing'),
        route('journal-publication'),
        route('ipr-management'),
        route('custom-publishing'),
        route('distribution-licensing'),
    ];

    $fallbackSmallLabels = ['Books', 'Journals', 'Rights', 'Custom', 'Reach'];
    $fallbackSmallSubLabels = ['Publishing', 'Workflow', 'Compliance', 'Solutions', 'Licensing'];
    $fallbackTabImages = [
        asset('assets/images/services/services-three-tab-img-1.jpg'),
        asset('assets/images/services/services-three-tab-img-2.jpg'),
        asset('assets/images/services/services-three-tab-img-3.jpg'),
        asset('assets/images/services/services-three-tab-img-4.jpg'),
        asset('assets/images/services/services-three-tab-img-5.jpg'),
    ];
    $fallbackSlugs = ['residential', 'commercial', 'deep', 'office', 'sanitizing'];

    $tabs = (array) data_get($services, 'tabs', []);
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
                'button_url' => $fallbackButtonUrls[0],
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
                'button_url' => $fallbackButtonUrls[1],
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
                'button_url' => $fallbackButtonUrls[2],
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
                'button_url' => $fallbackButtonUrls[3],
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
                'button_url' => $fallbackButtonUrls[4],
            ],
        ];
    }
    $tabs = array_slice(array_pad($tabs, 5, []), 0, 5);

    $slidingWords = (array) data_get($home, 'sliding_text', []);
    if (count($slidingWords) === 0) {
        $slidingWords = ['Peer Review', 'Open Access', 'Indexing', 'Copyediting', 'Ethics', 'Publishing'];
    }

    $servicesPage = (array) data_get($home, 'services_page', []);

    $workflow = (array) data_get($servicesPage, 'workflow', []);
    $workflowTagline = (string) data_get($workflow, 'tagline', 'WHY CHOOSE US');
    $workflowHeadingHtml = (string) data_get($workflow, 'heading_html', 'Our Editorial Workflow<br><span>From submission to publication</span>');
    $workflowItems = (array) data_get($workflow, 'items', []);
    if (count($workflowItems) === 0) {
        $workflowItems = [
            [
                'icon' => 'icon-file',
                'title_html' => 'Submit Your <br>Manuscript',
                'text' => 'Share your research with our editorial office and receive guidance on scope, requirements, and policies.',
                'url' => route('journals'),
            ],
            [
                'icon' => 'icon-review',
                'title_html' => 'Peer Review <br>& Revision',
                'text' => 'Independent expert review and constructive feedback to strengthen scientific validity and clinical relevance.',
                'url' => route('journals'),
            ],
            [
                'icon' => 'icon-completed-task',
                'title_html' => 'Editorial Decision <br>& Ethics',
                'text' => 'Transparent editorial decisions supported by ethical standards, accountability, and integrity.',
                'url' => route('journals'),
            ],
            [
                'icon' => 'icon-share',
                'title_html' => 'Production <br>& Publication',
                'text' => 'Copyediting, typesetting, and online publication to ensure quality and global accessibility.',
                'url' => route('journals'),
            ],
        ];
    }
    $workflowItems = array_slice(array_pad($workflowItems, 4, []), 0, 4);

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
    $faqContactButtonUrl = (string) data_get($faqContact, 'button_url', (string) data_get($home, 'about_page.consultation_button_url', 'https://wa.me/628971399093'));

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
                    <h2 class="section-title__title title-animation">{!! $servicesHeadingHtml !!}</h2>
                </div>
                <div class="services-three__inner">
                    <div class="services-three__main-tab-box tabs-box">
                        <div class="services-three__tab-buttons-box">
                            <ul class="tab-buttons list-unstyled">
                                @foreach($tabs as $i => $tab)
                                    @php
                                        $slug = (string) data_get($tab, 'slug', $fallbackSlugs[$i] ?? ('tab-' . $i));
                                        $icon = (string) data_get($tab, 'icon', 'icon-file');
                                        $buttonLabel = (string) data_get($tab, 'button_label', '');
                                        if ($buttonLabel === '') {
                                            $buttonLabel = (string) data_get($tab, 'title', '');
                                        }
                                    @endphp
                                    <li data-tab="#{{ $slug }}" class="tab-btn {{ $i === 0 ? 'active-btn' : '' }}">
                                        <div class="services-three__tab-buttons-single">
                                            <i class="{{ $icon }}"></i>
                                            <span>{!! nl2br(e($buttonLabel)) !!}</span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="tabs-content">
                            @foreach($tabs as $i => $tab)
                                @php
                                    $slug = (string) data_get($tab, 'slug', $fallbackSlugs[$i] ?? ('tab-' . $i));
                                    $titleText = (string) data_get($tab, 'title', '');
                                    $tabText = (string) data_get($tab, 'text', '');

                                    $smallLabel = (string) data_get($tab, 'small_label', $fallbackSmallLabels[$i] ?? '');
                                    $smallSubLabel = (string) data_get($tab, 'small_sublabel', $fallbackSmallSubLabels[$i] ?? '');

                                    $buttonText = (string) data_get($tab, 'button_text', 'Learn More');
                                    $buttonUrl = (string) data_get($tab, 'button_url', $fallbackButtonUrls[$i] ?? route('services'));

                                    $imagePath = (string) data_get($tab, 'image', '');
                                    $bgUrl = $imagePath !== '' ? asset('storage/' . ltrim($imagePath, '/')) : ($fallbackTabImages[$i] ?? $fallbackTabImages[0]);
                                @endphp
                                <div class="tab {{ $i === 0 ? 'active-tab' : '' }}" id="{{ $slug }}">
                                    <div class="services-three__tab-content-box">
                                        <div class="services-three__tab-img-1" style="background-image: url({{ $bgUrl }});"></div>
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6">
                                                <div class="services-three__tab-left">
                                                    <div class="services-three__shape-2">
                                                        <img src="{{ asset('assets/images/shapes/services-three-shape-2.png') }}" alt="">
                                                    </div>
                                                    <h3 class="services-three__tab-title">{{ $titleText }}</h3>
                                                    <p class="services-three__tab-text">{{ $tabText }}</p>
                                                    <div class="services-three__tab-doller-box">
                                                        <p class="services-three__tab-doller">{{ $smallLabel }}</p>
                                                        <span class="services-three__tab-doller-sub-title">{{ $smallSubLabel }}</span>
                                                    </div>
                                                    <div class="services-three__btn-box">
                                                        <a href="{{ $buttonUrl }}" class="thm-btn">{{ $buttonText }}<span><i class="icon-diagonal-arrow"></i></span></a>
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
        <!--Services Three End -->

        <!-- Sliding Text Three Start -->
        <section class="sliding-text-three">
            <div class="sliding-text-three__wrap">
                <ul class="sliding-text-three__list list-unstyled marquee_mode">
                    @foreach($slidingWords as $w)
                        @php $w = (string) $w; @endphp
                        @if(trim($w) !== '')
                            <li>
                                <h2 data-hover="{{ $w }}" class="sliding-text-three__title">{{ $w }}
                                    <span class="icon-star-2"></span></h2>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </section>
        <!-- Sliding Text Three End -->

        <!--Why Choose Three Start -->
        <section class="why-choose-three">
            <div class="why-choose-three__shape-bg-1"
                style="background-image: url({{ asset('assets/images/shapes/why-choose-three-shape-bg-1.png') }});"></div>
            <div class="why-choose-three__shape-1">
                <img src="{{asset('assets/images/shapes/why-choose-three-shape-1.png')}}" alt="">
            </div>
            <div class="why-choose-three__shape-2">
                <img src="{{asset('assets/images/shapes/why-choose-three-shape-2.png')}}" alt="">
            </div>
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
                <div class="why-choose-three__inner">
                    <ul class="row list-unstyled">
                        @foreach($workflowItems as $i => $it)
                            @php
                                $delay = (($i + 1) * 100) . 'ms';
                                $fade = $i < 2 ? 'fadeInLeft' : 'fadeInRight';
                                $icon = (string) data_get($it, 'icon', 'icon-file');
                                $titleHtml = (string) data_get($it, 'title_html', '');
                                $text = (string) data_get($it, 'text', '');
                                $url = (string) data_get($it, 'url', route('journals'));
                            @endphp
                            <li class="col-xl-3 col-lg-6 col-md-6 wow {{ $fade }}" data-wow-delay="{{ $delay }}" data-wow-duration="1500ms">
                                <div class="why-choose-three__single">
                                    <div class="why-choose-three__icon">
                                        <span class="{{ $icon }}"></span>
                                        <div class="why-choose-three__count"></div>
                                    </div>
                                    <h3 class="why-choose-three__title"><a href="{{ $url }}">{!! $titleHtml !!}</a></h3>
                                    <p class="why-choose-three__text">{{ $text }}</p>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </section>
        <!--Why Choose Three End -->

        <!--Faq One Start -->
        <section class="faq-one">
            <div class="faq-one__shape-bg-1"
                style="background-image: url({{ asset('assets/images/shapes/faq-two-shape-bg-1.png') }});"></div>
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
                                    <a href="{{ $faqContactButtonUrl }}" class="thm-btn">{{ $faqContactButtonText }}<span><i
                                                class="icon-diagonal-arrow"></i></span></a>
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