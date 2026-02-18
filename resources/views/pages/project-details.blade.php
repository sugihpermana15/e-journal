@extends('layouts.breadcrumbs')
@section('title', 'Project Details')
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/module-css/project.css')}}"/>
@endpush
@php
    $bodyClass = 'custom-cursor';
    $title = 'Project Details';
    $subtitle = 'Project Details';
@endphp
@section('content')
          <!--Project Details Start-->
        <section class="project-details">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-5">
                        <div class="project-details__left">
                            <div class="project-details__project-info">
                                <h3 class="project-details__project-info-title">Project Info</h3>
                                <ul class="project-details__project-list list-unstyled">
                                    <li>
                                        <div class="icon">
                                            <span>Clients</span>
                                            <p>Garments Factory</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-money-bag"></span>
                                        </div>
                                        <div class="content">
                                            <span>Budget</span>
                                            <p>$300 USD</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-add"></span>
                                        </div>
                                        <div class="content">
                                            <span>Category</span>
                                            <p>Garments Factory</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-placeholder"></span>
                                        </div>
                                        <div class="content">
                                            <span>Location</span>
                                            <p>Eiffel Tower, Paris, France</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-time"></span>
                                        </div>
                                        <div class="content">
                                            <span>Duration</span>
                                            <p>4 Hours 30 Min</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="project-details__get-touch">
                                <h3 class="project-details__get-touch-title">Feel free to reach out to us anytime.</h3>
                                <div class="project-details__get-touch-btn-box">
                                    <a href="#" class="thm-btn">Contact Us<span><i
                                                class="icon-diagonal-arrow"></i></span></a>
                                </div>
                                <div class="project-details__call-box">
                                    <div class="project-details__call-icon">
                                        <span class="icon-support"></span>
                                    </div>
                                    <div class="project-details__call-content">
                                        <p>Call Us To Take this services</p>
                                        <a href="tel:+628971399093">+62 897 1399 093</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-7">
                        <div class="project-details__right">
                            <div class="project-details__img-box">
                                <div class="project-details__img">
                                    <img src="{{ asset('assets/images/project/project-details-img-1.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="project-details__content">
                                <h3 class="project-details__title-1">Sparkle & Shine Services</h3>
                                <p class="project-details__text-1">This project aims to create and implement a thorough
                                    digital marketing campaign to improve brand visibility, increase engagement, and
                                    elevate conversions. It utilizes a range of digital marketing strategies and tools
                                    to deliver measurable outcomes.</p>
                                <p class="project-details__text-2">Enhance brand recognition with focused online
                                    advertising. Direct traffic to the client's website and landing pages. Optimize
                                    conversion rates and monitor return on investment efficiently.</p>
                                <h4 class="project-details__title-2">Project Objectives</h4>
                                <p class="project-details__text-3">This project aims to create and implement a thorough
                                    digital marketing campaign to improve brand visibility, increase engagement, and
                                    elevate conversions. It utilizes a range of digital marketing strategies and tools
                                    to deliver measurable outcomes.</p>
                                <div class="project-details__img-box-2">
                                    <div class="row">
                                        <div class="col-xl-6 col-lg-6 col-md-6">
                                            <div class="project-details__img-box-img-1">
                                                <img src="{{ asset('assets/images/project/project-details-img-box-img-1.jpg') }}"
                                                    alt="">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6">
                                            <div class="project-details__img-box-img-1">
                                                <img src="{{ asset('assets/images/project/project-details-img-box-img-2.jpg') }}"
                                                    alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="project-details__points-box">
                                    <ul class="project-details__points-list list-unstyled">
                                        <li>
                                            <div class="icon">
                                                <span class="fas fa-badge-check"></span>
                                            </div>
                                            <p>To establish a trusted cleaning service brand with a focus on
                                                professionalism </p>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <span class="fas fa-badge-check"></span>
                                            </div>
                                            <p>To cater to both residential and commercial clients with customized
                                                cleaning plans. </p>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <span class="fas fa-badge-check"></span>
                                            </div>
                                            <p>To implement eco-friendly practices and products in all cleaning
                                                operations. </p>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <span class="fas fa-badge-check"></span>
                                            </div>
                                            <p>To ensure customer satisfaction through prompt service, trained staff,
                                                and modern equipment. </p>
                                        </li>
                                    </ul>
                                </div>
                                <h4 class="project-details__title-3">Scope of Services</h4>
                                <p class="project-details__text-4">Additionally, we specialize in carpet and upholstery
                                    cleaning, window washing, and sanitization services, ensuring a spotless and
                                    hygienic environment for every client. All our services prioritize eco-friendly
                                    practices and are tailored to meet individual needs.</p>
                                <div class="project-details__points-box-inner">
                                    <div class="project-details__points-box">
                                        <h5 class="project-details__points-list-title">Residential Cleaning</h5>
                                        <ul class="project-details__points-list-2 list-unstyled">
                                            <li>
                                                <div class="icon">
                                                    <span class="icon-check"></span>
                                                </div>
                                                <p>Regular home cleaning</p>
                                            </li>
                                            <li>
                                                <div class="icon">
                                                    <span class="icon-check"></span>
                                                </div>
                                                <p>Deep cleaning</p>
                                            </li>
                                            <li>
                                                <div class="icon">
                                                    <span class="icon-check"></span>
                                                </div>
                                                <p>Move-in/move-out cleaning</p>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="project-details__points-box">
                                        <h5 class="project-details__points-list-title">Commercial Cleaning:</h5>
                                        <ul class="project-details__points-list-2 list-unstyled">
                                            <li>
                                                <div class="icon">
                                                    <span class="icon-check"></span>
                                                </div>
                                                <p>Office cleaning</p>
                                            </li>
                                            <li>
                                                <div class="icon">
                                                    <span class="icon-check"></span>
                                                </div>
                                                <p>Retail store cleaning</p>
                                            </li>
                                            <li>
                                                <div class="icon">
                                                    <span class="icon-check"></span>
                                                </div>
                                                <p>Post-construction cleanup</p>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="project-details__points-box-2">
                                        <h5 class="project-details__points-list-title">Specialized Services:</h5>
                                        <ul class="project-details__points-list-2 list-unstyled">
                                            <li>
                                                <div class="icon">
                                                    <span class="icon-check"></span>
                                                </div>
                                                <p>Carpet and upholstery cleaning</p>
                                            </li>
                                            <li>
                                                <div class="icon">
                                                    <span class="icon-check"></span>
                                                </div>
                                                <p>Window washing</p>
                                            </li>
                                            <li>
                                                <div class="icon">
                                                    <span class="icon-check"></span>
                                                </div>
                                                <p>Sanitization and disinfection services</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="project-details__before-after">
                                    <div class="project-details__before-after-two-img-box">
                                        <div class="before-after">
                                            <div class="before-after-twentytwenty" id="wrinkle-before-after">
                                                <img src="{{ asset('assets/images/resources/project-details-before-after-two-img-1.jpg') }}"
                                                    alt="">
                                                <img src="{{ asset('assets/images/resources/project-details-before-after-two-img-2.jpg') }}"
                                                    alt="">
                                            </div>
                                        </div>
                                        <div class="before-after-two__tag"><span>Before</span></div>
                                        <div class="before-after-two__tag before-after-two__tag-2">
                                            <span>AFTER</span></div>
                                    </div>
                                </div>
                                <h4 class="project-details__title-4">Long-Term Vision:</h4>
                                <p class="project-details__text-5">To become a leading cleaning service provider known
                                    for reliability, professionalism, and eco-conscious practices, expanding to multiple
                                    cities within the next 5 years.</p>
                                <p class="project-details__text-6">Let me know if you’d like to refine or add more
                                    details!</p>
                                <div class="project-details__client-box">
                                    <div class="project-details__client-box-shape-1">
                                        <img src="{{ asset('assets/images/shapes/project-details-client-box-shape-1.png') }}" alt="">
                                    </div>
                                    <div class="project-details__client-box-shape-2">
                                        <img src="{{ asset('assets/images/shapes/project-details-client-box-shape-2.png') }}" alt="">
                                    </div>
                                    <div class="project-details__client-box-quote">
                                        <img src="{{ asset('assets/images/icon/project-details-client-box-quote-1.png') }}" alt="">
                                    </div>
                                    <div class="project-details__client-img-box">
                                        <div class="project-details__client-img">
                                            <img src="{{ asset('assets/images/project/project-details-client-img-1.jpg') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="project-details__client-content">
                                        <div class="project-details__client-ratting">
                                            <span class="icon-star"></span>
                                            <span class="icon-star"></span>
                                            <span class="icon-star"></span>
                                            <span class="icon-star"></span>
                                            <span class="icon-star"></span>
                                        </div>
                                        <p class="project-details__client-text">A massage is a transformative
                                            experience, much like being wrapped in a story where you are the main
                                            character. Imagine a moment where the outside world fades away, and all that
                                            remains is the soothing rhythm </p>
                                        <div class="project-details__client-shape"></div>
                                        <p class="project-details__client-name">Thomas Alison <span>- (Founder &
                                                CEO)</span></p>
                                    </div>
                                </div>
                                <div class="project-details__prev-next">
                                    <div class="project-details__prev">
                                        <div class="project-details__prev-img">
                                            <img src="{{ asset('assets/images/project/project-details-prev-img.jpg') }}" alt="">
                                        </div>
                                        <div class="content">
                                            <p><a href="#">PREV PROJECT</a></p>
                                            <h5>Sparkle & Shine Services</h5>
                                        </div>
                                    </div>
                                    <div class="project-details__next">
                                        <div class="content">
                                            <p><a href="#">NEXT PROJECT</a></p>
                                            <h5>Retail store cleaning</h5>
                                        </div>
                                        <div class="project-details__next-img">
                                            <img src="{{ asset('assets/images/project/project-details-next-img.jpg') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Project Details End-->

    <x-strickyHeader />
    <x-footer2 />
    <x-mobileMenu />
    <x-searchPopup />
    <x-scroll-to-top />
@endsection