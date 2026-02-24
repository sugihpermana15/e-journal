@extends('layouts.breadcrumbs')
@section('title', 'IPR Management || Med Open Press')
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/services.css') }}?v={{ filemtime(public_path('assets/css/module-css/services.css')) }}"/>
    <link rel="stylesheet" href="{{asset('assets/css/module-css/project.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/module-css/faq.css')}}"/>
@endpush
@php
    $bodyClass = 'custom-cursor';
    $title = 'IPR Management';
    $subtitle = 'Publishing Services';
@endphp
@section('content')
    <!--Service details Start-->
        <section class="services-details">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-7">
                        <div class="services-details__left">
                            <h3 class="services-details__title-1">Rights, permissions, and licensing support for compliant publication</h3>
                            <p class="services-details__text-1">Med Open Press helps authors and institutions manage intellectual property considerations in publishing—clarifying ownership, permissions, and licensing pathways. We support clear documentation and consistent rights handling to reduce risk and support responsible dissemination.</p>
                            <div class="services-details__img-box">
                                <div class="services-details__img">
                                    <img src="{{ asset('assets/images/services/services-details-img-4.jpg') }}" alt="">
                                </div>
                            </div>
                            <h3 class="services-details__title-2">Service Highlights</h3>
                            <p class="services-details__text-2">Good rights management protects authors and improves reuse clarity. We help identify common publishing needs such as permissions for figures, third-party content, and licensing terms for distribution.</p>
                            <div class="services-details__points-box">
                                <ul class="services-details__points list-unstyled">
                                    <li>
                                        <div class="icon"><span class="icon-star-1"></span></div>
                                        <p>Copyright and ownership clarity</p>
                                    </li>
                                    <li>
                                        <div class="icon"><span class="icon-star-1"></span></div>
                                        <p>Permissions support for third-party content</p>
                                    </li>
                                    <li>
                                        <div class="icon"><span class="icon-star-1"></span></div>
                                        <p>Licensing pathway guidance</p>
                                    </li>
                                </ul>
                                <ul class="services-details__points list-unstyled">
                                    <li>
                                        <div class="icon"><span class="icon-star-1"></span></div>
                                        <p>Reuse statements and attribution consistency</p>
                                    </li>
                                    <li>
                                        <div class="icon"><span class="icon-star-1"></span></div>
                                        <p>Policy-aligned publication documentation</p>
                                    </li>
                                    <li>
                                        <div class="icon"><span class="icon-star-1"></span></div>
                                        <p>Support for institutional publishing needs</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="services-details__service-single-box">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="services-details__services-single">
                                            <div class="services-details__services-icon">
                                                <span class="icon-completed-task"></span>
                                            </div>
                                            <h3 class="services-details__services-title">Compliance Support</h3>
                                            <p class="services-details__services-text">Align rights statements and documentation<br> with journal or institutional policies<br> for responsible publishing.</p>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="services-details__services-single">
                                            <div class="services-details__services-icon">
                                                <span class="icon-share"></span>
                                            </div>
                                            <h3 class="services-details__services-title">Licensing Pathways</h3>
                                            <p class="services-details__services-text">Clarify reuse permissions and licensing<br> options to support broader dissemination<br> across channels.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h3 class="services-details__title-3">IPR Workflow Summary</h3>
                            <p class="services-details__text-3">Rights work typically starts with content inventory (what is original vs. third-party), then permission checks, rights statements, and final documentation aligned to publication needs. Clear rights handling reduces delays late in production.</p>
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
                            <p class="services-details__text-4">We help you implement practical rights handling without slowing down publication.</p>
                            <p class="services-details__text-5">We focus on clarity: what can be reused, how to attribute, and how to document permissions consistently.</p>
                            <div class="services-details__points-and-img-box">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="services-details__points-3">
                                            <ul class="services-details__points-list-3 list-unstyled">
                                                <li>
                                                    <div class="icon"><span class="icon-star-1"></span></div>
                                                    <p>Clear documentation and statements</p>
                                                </li>
                                                <li>
                                                    <div class="icon"><span class="icon-star-1"></span></div>
                                                    <p>Permissions awareness for figures and tables</p>
                                                </li>
                                                <li>
                                                    <div class="icon"><span class="icon-star-1"></span></div>
                                                    <p>Licensing guidance for wider distribution</p>
                                                </li>
                                                <li>
                                                    <div class="icon"><span class="icon-star-1"></span></div>
                                                    <p>Workflow-friendly, practical approach</p>
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
                            <p class="services-details__text-6">If you have a specific journal policy or institutional requirement, we can align rights statements and licensing information to match that framework.</p>
                            <h3 class="services-details__title-5">Permissions and Reuse Readiness</h3>
                            <p class="services-details__text-7">We can help identify common permission gaps early (third-party images, adapted figures, reused questionnaires) and provide a checklist for resolution before final production, reducing last-minute publication delays.</p>
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
                                    <li>
                                        <a href="{{ route('journal-publication') }}"><span class="icon-diagonal-arrow"></span>Scientific Journal Publication</a>
                                    </li>
                                    <li class="active">
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
                                <h3 class="project-details__get-touch-title">Need help with rights and permissions?</h3>
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
                                    <span>IPR Management FAQs</span></h2>
                            </div>
                            <p class="faq-one__text">Answers about permissions, reuse, and licensing statements.</p>
                            <ul class="list-unstyled faq-one__points">
                                <li>
                                    <div class="icon"><span class="icon-star-1"></span></div>
                                    <div class="text"><p>Practical guidance for publishing compliance</p></div>
                                </li>
                                <li>
                                    <div class="icon"><span class="icon-star-1"></span></div>
                                    <div class="text"><p>Reduce delays during production</p></div>
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
                                        <h4>What does IPR management cover in publishing?</h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                            <p>It covers ownership clarity, permissions for reused content, licensing information, and consistent rights statements so publication is compliant and reuse is clear.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accrodion active">
                                    <div class="accrodion-title">
                                        <h4>Do I need permission for figures or adapted materials?</h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                            <p>Often, yes—especially for third-party images, adapted figures, or copyrighted instruments. We can help identify what needs permission and what documentation should be prepared.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accrodion">
                                    <div class="accrodion-title">
                                        <h4>Can you help with licensing statements for distribution?</h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                            <p>We can help clarify licensing pathways and ensure the published work includes consistent reuse and attribution statements aligned to your chosen distribution approach.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accrodion">
                                    <div class="accrodion-title">
                                        <h4>When should rights checks happen?</h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                            <p>Earlier is better. Identifying third-party content during preparation reduces last-minute production delays and supports smoother publication.</p>
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
