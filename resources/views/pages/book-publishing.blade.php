@extends('layouts.breadcrumbs')
@section('title', 'Book Publishing || Med Open Press')
@push('styles')
    <link rel="stylesheet" href="{{asset('assets/css/module-css/services.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/module-css/project.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/module-css/faq.css')}}"/>
@endpush
@php
    $bodyClass = 'custom-cursor';
    $title = 'Book Publishing';
    $subtitle = 'Publishing Services';
@endphp
@section('content')
    <!--Service details Start-->
        <section class="services-details">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-7">
                        <div class="services-details__left">
                            <h3 class="services-details__title-1">Medical books, monographs, and educational references—produced with editorial quality</h3>
                            <p class="services-details__text-1">Med Open Press supports book projects from concept to publication: proposal and structure review, developmental editing, copyediting, design and layout, proofing, and publication-ready files. We help ensure clarity, consistency, and a professional reading experience across print and digital formats.</p>
                            <div class="services-details__img-box">
                                <div class="services-details__img">
                                    <img src="{{ asset('assets/images/services/services-details-img-4.jpg') }}" alt="">
                                </div>
                            </div>
                            <h3 class="services-details__title-2">Service Highlights</h3>
                            <p class="services-details__text-2">A structured book workflow reduces revisions and keeps production on track. We provide editorial guidance, clean design, and reliable production outputs aligned to your goals and audience.</p>
                            <div class="services-details__points-box">
                                <ul class="services-details__points list-unstyled">
                                    <li>
                                        <div class="icon"><span class="icon-star-1"></span></div>
                                        <p>Proposal and outline review</p>
                                    </li>
                                    <li>
                                        <div class="icon"><span class="icon-star-1"></span></div>
                                        <p>Developmental and structural editing</p>
                                    </li>
                                    <li>
                                        <div class="icon"><span class="icon-star-1"></span></div>
                                        <p>Copyediting and language polishing</p>
                                    </li>
                                </ul>
                                <ul class="services-details__points list-unstyled">
                                    <li>
                                        <div class="icon"><span class="icon-star-1"></span></div>
                                        <p>Interior layout and cover design support</p>
                                    </li>
                                    <li>
                                        <div class="icon"><span class="icon-star-1"></span></div>
                                        <p>Proof rounds and final corrections</p>
                                    </li>
                                    <li>
                                        <div class="icon"><span class="icon-star-1"></span></div>
                                        <p>Publication-ready outputs (PDF/print-ready)</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="services-details__service-single-box">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="services-details__services-single">
                                            <div class="services-details__services-icon">
                                                <span class="icon-file"></span>
                                            </div>
                                            <h3 class="services-details__services-title">Editorial Development</h3>
                                            <p class="services-details__services-text">Improve structure, flow, and clarity<br> across chapters with consistent terminology<br> and scientific tone.</p>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="services-details__services-single">
                                            <div class="services-details__services-icon">
                                                <span class="icon-completed-task"></span>
                                            </div>
                                            <h3 class="services-details__services-title">Design & Production</h3>
                                            <p class="services-details__services-text">Professional layout and proofing<br> to deliver a polished book experience<br> for readers.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h3 class="services-details__title-3">Book Publishing Workflow Summary</h3>
                            <p class="services-details__text-3">Book projects benefit from clear milestones. We align scope and structure early, then move through editing, design, proofing, and final deliverables. This keeps the work consistent across chapters and reduces last-minute changes.</p>
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
                            <p class="services-details__text-4">We bring publishing discipline and medical-domain awareness—focused on clarity, consistency, and professional presentation.</p>
                            <p class="services-details__text-5">Our process is transparent: defined stages, proof rounds, and reliable deliverables for authors, editors, and institutions.</p>
                            <div class="services-details__points-and-img-box">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="services-details__points-3">
                                            <ul class="services-details__points-list-3 list-unstyled">
                                                <li>
                                                    <div class="icon"><span class="icon-star-1"></span></div>
                                                    <p>Consistent style across chapters</p>
                                                </li>
                                                <li>
                                                    <div class="icon"><span class="icon-star-1"></span></div>
                                                    <p>Professional editing and proofing</p>
                                                </li>
                                                <li>
                                                    <div class="icon"><span class="icon-star-1"></span></div>
                                                    <p>Clean layout for print and digital use</p>
                                                </li>
                                                <li>
                                                    <div class="icon"><span class="icon-star-1"></span></div>
                                                    <p>Clear timelines and communication</p>
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
                            <p class="services-details__text-6">Need support for figure/table consistency or reference formatting? We can align these elements to your preferred style and ensure a cohesive final book.</p>
                            <h3 class="services-details__title-5">Deliverables and Outputs</h3>
                            <p class="services-details__text-7">We provide publication-ready files and structured deliverables, including final PDFs and print-ready assets where applicable. If you have a distribution plan, we can align outputs to platform requirements and ensure consistent metadata and front matter.</p>
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
                                    <li class="active">
                                        <a href="{{ route('book-publishing') }}"><span class="icon-diagonal-arrow"></span>Book Publishing</a>
                                    </li>
                                    <li>
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
                                <h3 class="project-details__get-touch-title">Need help with your book project?</h3>
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
                                    <span>Book Publishing FAQs</span></h2>
                            </div>
                            <p class="faq-one__text">Helpful answers about editing, design, production, and deliverables.</p>
                            <ul class="list-unstyled faq-one__points">
                                <li>
                                    <div class="icon"><span class="icon-star-1"></span></div>
                                    <div class="text"><p>A practical overview of our book workflow</p></div>
                                </li>
                                <li>
                                    <div class="icon"><span class="icon-star-1"></span></div>
                                    <div class="text"><p>Clear timelines and proof rounds</p></div>
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
                                        <h4>What types of books do you support?</h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                            <p>We support medical and health-related books, educational references, monographs, and institutional publications. If you have a specific audience and learning goals, we’ll align editing and design to match.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accrodion active">
                                    <div class="accrodion-title">
                                        <h4>Do you provide cover and interior design?</h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                            <p>Yes. We can assist with interior layout and design support, plus cover design direction aligned to your branding and content type. Final deliverables are prepared for professional presentation.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accrodion">
                                    <div class="accrodion-title">
                                        <h4>How many proof rounds are included?</h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                            <p>Proof rounds depend on the chosen package and project scope. We typically plan clear proof stages so authors can review changes before finalization.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accrodion">
                                    <div class="accrodion-title">
                                        <h4>What files will I receive at the end?</h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                            <p>We provide publication-ready outputs such as final PDFs and print-ready assets where applicable. If you have platform requirements, we can align file specifications accordingly.</p>
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
