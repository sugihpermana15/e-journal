@extends('layouts.breadcrumbs')
@section('title', 'Custom Publishing Solutions || Med Open Press')
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/services.css') }}?v={{ filemtime(public_path('assets/css/module-css/services.css')) }}"/>
    <link rel="stylesheet" href="{{asset('assets/css/module-css/project.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/module-css/faq.css')}}"/>
@endpush
@php
    $bodyClass = 'custom-cursor';
    $title = 'Custom Publishing Solutions';
    $subtitle = 'Publishing Services';
@endphp
@section('content')
    <!--Service details Start-->
        <section class="services-details">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-7">
                        <div class="services-details__left">
                            <h3 class="services-details__title-1">Tailored publishing programs for institutions, societies, special issues, and supplements</h3>
                            <p class="services-details__text-1">Med Open Press designs flexible workflows to match your objectives—whether you need a special issue program, institutional publishing support, conference proceedings assistance, or a custom editorial and production pipeline. We align scope, timelines, and deliverables early to keep execution predictable.</p>
                            <div class="services-details__img-box">
                                <div class="services-details__img">
                                    <img src="{{ asset('assets/images/services/services-details-img-4.jpg') }}" alt="">
                                </div>
                            </div>
                            <h3 class="services-details__title-2">Service Highlights</h3>
                            <p class="services-details__text-2">Custom projects need clarity and control. We define responsibilities, stages, and acceptance criteria so teams can collaborate smoothly and publish consistently.</p>
                            <div class="services-details__points-box">
                                <ul class="services-details__points list-unstyled">
                                    <li>
                                        <div class="icon"><span class="icon-star-1"></span></div>
                                        <p>Workflow design and timeline planning</p>
                                    </li>
                                    <li>
                                        <div class="icon"><span class="icon-star-1"></span></div>
                                        <p>Editorial operations support</p>
                                    </li>
                                    <li>
                                        <div class="icon"><span class="icon-star-1"></span></div>
                                        <p>Production pipeline setup</p>
                                    </li>
                                </ul>
                                <ul class="services-details__points list-unstyled">
                                    <li>
                                        <div class="icon"><span class="icon-star-1"></span></div>
                                        <p>Quality checks and consistency controls</p>
                                    </li>
                                    <li>
                                        <div class="icon"><span class="icon-star-1"></span></div>
                                        <p>Custom deliverables and reporting</p>
                                    </li>
                                    <li>
                                        <div class="icon"><span class="icon-star-1"></span></div>
                                        <p>Communication and coordination support</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="services-details__service-single-box">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="services-details__services-single">
                                            <div class="services-details__services-icon">
                                                <span class="icon-app"></span>
                                            </div>
                                            <h3 class="services-details__services-title">Program Design</h3>
                                            <p class="services-details__services-text">Define scope, responsibilities, and milestones<br> for predictable delivery across multiple<br> manuscripts or outputs.</p>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="services-details__services-single">
                                            <div class="services-details__services-icon">
                                                <span class="icon-file"></span>
                                            </div>
                                            <h3 class="services-details__services-title">Production Support</h3>
                                            <p class="services-details__services-text">Copyediting, layout, and proofing with<br> consistent templates and formats for a<br> cohesive release.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h3 class="services-details__title-3">Custom Workflow Summary</h3>
                            <p class="services-details__text-3">We start with discovery (goals, volume, timelines), then define workflow stages and deliverables. After that, we execute editorial and production steps with quality checks, keeping stakeholders informed throughout.</p>
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
                            <p class="services-details__text-4">We help teams publish reliably—without losing flexibility.</p>
                            <p class="services-details__text-5">Our approach combines clear planning with quality-focused execution so your outputs are consistent and ready for dissemination.</p>
                            <div class="services-details__points-and-img-box">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="services-details__points-3">
                                            <ul class="services-details__points-list-3 list-unstyled">
                                                <li>
                                                    <div class="icon"><span class="icon-star-1"></span></div>
                                                    <p>Flexible workflows matched to goals</p>
                                                </li>
                                                <li>
                                                    <div class="icon"><span class="icon-star-1"></span></div>
                                                    <p>Defined timelines and deliverables</p>
                                                </li>
                                                <li>
                                                    <div class="icon"><span class="icon-star-1"></span></div>
                                                    <p>Consistent editorial and production quality</p>
                                                </li>
                                                <li>
                                                    <div class="icon"><span class="icon-star-1"></span></div>
                                                    <p>Clear communication for stakeholders</p>
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
                            <p class="services-details__text-6">If you already have templates, policies, or internal processes, we can integrate them into the workflow to reduce change management.</p>
                            <h3 class="services-details__title-5">Special Issues, Supplements, and Institutional Programs</h3>
                            <p class="services-details__text-7">We can support structured publishing programs with consistent standards and production outputs—helping institutions publish collections, proceedings, or thematic releases with clear editorial oversight.</p>
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
                                    <li>
                                        <a href="{{ route('ipr-management') }}"><span class="icon-diagonal-arrow"></span>IPR Management</a>
                                    </li>
                                    <li class="active">
                                        <a href="{{ route('custom-publishing') }}"><span class="icon-diagonal-arrow"></span>Custom Publishing Solutions</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('distribution-licensing') }}"><span class="icon-diagonal-arrow"></span>Distribution &amp; Licensing</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="project-details__get-touch">
                                <h3 class="project-details__get-touch-title">Planning a custom publishing program?</h3>
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
                                    <span>Custom Publishing FAQs</span></h2>
                            </div>
                            <p class="faq-one__text">Answers about planning, scope, and execution for tailored programs.</p>
                            <ul class="list-unstyled faq-one__points">
                                <li>
                                    <div class="icon"><span class="icon-star-1"></span></div>
                                    <div class="text"><p>Define scope and roles early</p></div>
                                </li>
                                <li>
                                    <div class="icon"><span class="icon-star-1"></span></div>
                                    <div class="text"><p>Maintain quality across outputs</p></div>
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
                                        <h4>What can be customized in a publishing program?</h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                            <p>Workflow stages, timelines, templates, editorial responsibilities, production outputs, and reporting. We tailor the program to match your goals and capacity.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accrodion active">
                                    <div class="accrodion-title">
                                        <h4>Can you support special issues or supplements?</h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                            <p>Yes. We can help structure special issue workflows, coordinate production steps, and ensure consistent formatting and quality control across all included content.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accrodion">
                                    <div class="accrodion-title">
                                        <h4>How do you set timelines for multi-output projects?</h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                            <p>We define milestones and acceptance criteria per stage, then create a practical plan based on volume, review needs, and production capacity—keeping stakeholders informed throughout.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accrodion">
                                    <div class="accrodion-title">
                                        <h4>Can we use our existing templates and policies?</h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                            <p>Yes. We can integrate your current templates, brand assets, and policies into the workflow to reduce change management and maintain continuity.</p>
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
