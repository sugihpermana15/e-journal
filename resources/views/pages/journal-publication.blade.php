@extends('layouts.breadcrumbs')
@section('title', 'Scientific Journal Publication || Med Open Press')
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/services.css') }}?v={{ filemtime(public_path('assets/css/module-css/services.css')) }}"/>
    <link rel="stylesheet" href="{{asset('assets/css/module-css/project.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/module-css/faq.css')}}"/>
@endpush
@php
    $bodyClass = 'custom-cursor';
    $title = 'Scientific Journal Publication';
    $subtitle = 'Publishing Services';
@endphp
@section('content')
    <!--Service details Start-->
        <section class="services-details">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-7">
                        <div class="services-details__left">
                            <h3 class="services-details__title-1">End-to-end journal publishing workflows—from submission to online publication</h3>
                            <p class="services-details__text-1">Med Open Press supports journals with structured editorial operations: submission checks, editorial screening, peer-review coordination, revisions, and final production. We focus on transparency, research integrity, and publication outputs that are ready for readers and indexing systems.</p>
                            <div class="services-details__img-box">
                                <div class="services-details__img">
                                    <img src="{{ asset('assets/images/services/services-details-img-4.jpg') }}" alt="">
                                </div>
                            </div>
                            <h3 class="services-details__title-2">Service Highlights</h3>
                            <p class="services-details__text-2">A consistent workflow improves turnaround time and quality. We help keep authors informed, support editorial decisions, and ensure production is clean and consistent.</p>
                            <div class="services-details__points-box">
                                <ul class="services-details__points list-unstyled">
                                    <li>
                                        <div class="icon"><span class="icon-star-1"></span></div>
                                        <p>Initial screening and scope checks</p>
                                    </li>
                                    <li>
                                        <div class="icon"><span class="icon-star-1"></span></div>
                                        <p>Peer-review coordination and reminders</p>
                                    </li>
                                    <li>
                                        <div class="icon"><span class="icon-star-1"></span></div>
                                        <p>Editorial decision support and revision tracking</p>
                                    </li>
                                </ul>
                                <ul class="services-details__points list-unstyled">
                                    <li>
                                        <div class="icon"><span class="icon-star-1"></span></div>
                                        <p>Copyediting and layout (typesetting)</p>
                                    </li>
                                    <li>
                                        <div class="icon"><span class="icon-star-1"></span></div>
                                        <p>Metadata preparation (authors, references)</p>
                                    </li>
                                    <li>
                                        <div class="icon"><span class="icon-star-1"></span></div>
                                        <p>Online publication readiness and dissemination</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="services-details__service-single-box">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="services-details__services-single">
                                            <div class="services-details__services-icon">
                                                <span class="icon-review"></span>
                                            </div>
                                            <h3 class="services-details__services-title">Peer Review & Editorial Support</h3>
                                            <p class="services-details__services-text">Structured reviewer invitations,<br> reminders, and clear decisions<br> to reduce delays.</p>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="services-details__services-single">
                                            <div class="services-details__services-icon">
                                                <span class="icon-file"></span>
                                            </div>
                                            <h3 class="services-details__services-title">Production & Publication</h3>
                                            <p class="services-details__services-text">Copyediting, typesetting, proofing,<br> and publication-ready files with<br> consistent formatting.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h3 class="services-details__title-3">Journal Publishing Workflow Summary</h3>
                            <p class="services-details__text-3">We maintain clear stages to keep progress visible: submission checks, editorial review, peer review, revisions, acceptance, production, and publication. This helps journals operate consistently and helps authors understand next steps.</p>
                            <div class="services-details__img-box-2">
                                <div class="row">
                                    <div class="col-xl-6 col-md-6">
                                        <div class="services-details__img-box-img-1">
                                            <img src="{{ asset('assets/images/services/services-details-img-box-img-1.jpg') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6">
                                        <div class="services-details__img-box-img-1">
                                            <img src="{{ asset('assets/images/services/services-details-img-box-img-2.jpg') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h3 class="services-details__title-4">Why Choose Med Open Press?</h3>
                            <p class="services-details__text-4">We prioritize integrity, clear communication, and dependable production—supporting both editorial teams and authors.</p>
                            <p class="services-details__text-5">Outputs are structured for readability and discoverability, with attention to consistent formatting and metadata readiness.</p>
                            <div class="services-details__points-and-img-box">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="services-details__points-3">
                                            <ul class="services-details__points-list-3 list-unstyled">
                                                <li>
                                                    <div class="icon"><span class="icon-star-1"></span></div>
                                                    <p>Transparent editorial workflow</p>
                                                </li>
                                                <li>
                                                    <div class="icon"><span class="icon-star-1"></span></div>
                                                    <p>Professional editing and layout</p>
                                                </li>
                                                <li>
                                                    <div class="icon"><span class="icon-star-1"></span></div>
                                                    <p>Consistent article formatting</p>
                                                </li>
                                                <li>
                                                    <div class="icon"><span class="icon-star-1"></span></div>
                                                    <p>Metadata-ready publication outputs</p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="services-details__points-img">
                                            <img src="{{ asset('assets/images/services/services-details-points-img.jpg') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="services-details__text-6">We can assist with post-publication updates (minor corrections and metadata adjustments) to keep your records consistent and clear.</p>
                            <h3 class="services-details__title-5">DOI, Metadata, and Indexing Support</h3>
                            <p class="services-details__text-7">We support DOI and metadata preparation for better discoverability, including author identifiers and reference consistency. If your journal has specific indexing or archiving requirements, we can align outputs to those expectations where applicable.</p>
                            <div class="services-details__bottom-img">
                                <img src="{{ asset('assets/images/services/services-details-bottom-img.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="services-details__right">
                            <div class="services-details__service-list-box">
                                <h3 class="services-details__service-list-title">More Services</h3>
                                <ul class="services-details__service-list list-unstyled">
                                    <li>
                                        <a href="{{ route('book-publishing') }}"><span class="icon-diagonal-arrow"></span>Book Publishing</a>
                                    </li>
                                    <li class="active">
                                        <a href="{{ route('journal-publication') }}"><span class="icon-diagonal-arrow"></span>Scientific Journal Publication</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('ipr-management') }}"><span class="icon-diagonal-arrow"></span>IPR Management</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('custom-publishing') }}"><span class="icon-diagonal-arrow"></span>Custom Publishing Solutions</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('distribution-licensing') }}"><span class="icon-diagonal-arrow"></span>Distribution &amp; Licensing</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="project-details__get-touch">
                                <h3 class="project-details__get-touch-title">Need help running a journal workflow?</h3>
                                <div class="project-details__get-touch-btn-box">
                                    <a href="https://wa.me/628971399093" class="thm-btn">Contact Us<span><i class="icon-diagonal-arrow"></i></span></a>
                                </div>
                                <div class="project-details__call-box">
                                    <div class="project-details__call-icon">
                                        <span class="icon-support"></span>
                                    </div>
                                    <div class="project-details__call-content">
                                        <p>Call us for publishing support</p>
                                        <a href="tel:+628971399093">+62 897 1399 093</a>
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
                                    <span class="section-title__tagline">FAQs</span>
                                </div>
                                <h2 class="section-title__title title-animation">Your Questions Answered <br>
                                    <span>Journal Publishing FAQs</span></h2>
                            </div>
                            <p class="faq-one__text">Answers about submission checks, peer review, and production.</p>
                            <ul class="list-unstyled faq-one__points">
                                <li>
                                    <div class="icon"><span class="icon-star-1"></span></div>
                                    <div class="text"><p>A practical guide to our journal workflow</p></div>
                                </li>
                                <li>
                                    <div class="icon"><span class="icon-star-1"></span></div>
                                    <div class="text"><p>Clear steps for authors and editors</p></div>
                                </li>
                            </ul>
                            <div class="faq-one__contact-box">
                                <div class="faq-one__contact-img">
                                    <img src="{{ asset('assets/images/resources/faq-one-contact-img.png') }}" alt="">
                                </div>
                                <div class="faq-one__contact-big-text">Get In Touch</div>
                                <h3 class="faq-one__contact-title">If you have any other <br> questions, please contact
                                    <br> our editorial office</h3>
                                <div class="faq-one__btn-box">
                                    <a href="https://wa.me/628971399093" class="thm-btn">Contact Us<span><i class="icon-diagonal-arrow"></i></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="faq-one__right">
                            <div class="accrodion-grp" data-grp-name="faq-one-accrodion">
                                <div class="accrodion">
                                    <div class="accrodion-title">
                                        <h4>How do I start publishing with Med Open Press?</h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                            <p>Contact us via WhatsApp and share your manuscript or journal needs. We’ll confirm scope and basic requirements, then guide you through submission checks, review steps, and production timelines.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accrodion active">
                                    <div class="accrodion-title">
                                        <h4>How long does peer review and publication usually take?</h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                            <p>Timelines vary by journal and reviewer availability. We coordinate invitations, reminders, and decision steps to keep progress moving, then proceed to editing, proofing, and publication after acceptance.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accrodion">
                                    <div class="accrodion-title">
                                        <h4>Do you provide editing, formatting, and typesetting?</h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                            <p>Yes. We support copyediting, journal style formatting, and typesetting with proof rounds to deliver clear, consistent, publication-ready articles.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accrodion">
                                    <div class="accrodion-title">
                                        <h4>Can you help with DOI and indexing readiness?</h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                            <p>We can support DOI and metadata preparation and help ensure articles are packaged consistently for discoverability. If you have target indexing or archiving requirements, we’ll align formatting and metadata fields where applicable.</p>
                                        </div>
                                    </div>
                                </div>
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
