@extends('layouts.breadcrumbs')
@section('title', 'Deep Cleaning')
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/module-css/services.css') }}?v={{ filemtime(public_path('assets/css/module-css/services.css')) }}"/>
 <link rel="stylesheet" href="{{asset('assets/css/module-css/project.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/css/module-css/faq.css')}}"/>
@endpush
@php
    $bodyClass = 'custom-cursor';
    $title = 'Deep Cleaning';
    $subtitle = 'Deep Cleaning';
@endphp
@section('content')
     <!--Service details Start-->
        <section class="services-details">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-7">
                        <div class="services-details__left">
                            <h3 class="services-details__title-1">Enjoy a spotless home without lifting a finger. Our
                                residential cleaning services include</h3>
                            <p class="services-details__text-1">Comprehensive cleaning services tailored to your needs,
                                including residential, commercial, deep cleaning, move-in/move-out, and specialty
                                solutions. Our professional team ensures spotless results with eco-friendly products and
                                flexible scheduling—guaranteeing your satisfaction every step of the way!</p>
                            <div class="services-details__img-box">
                                <div class="services-details__img">
                                    <img src="{{ asset('assets/images/services/services-details-img-3.jpg') }}" alt="">
                                </div>
                            </div>
                            <h3 class="services-details__title-2">Services Core Features</h3>
                            <p class="services-details__text-2">"Professional cleaning services for homes, offices, and
                                special occasions, including deep cleaning, move-in/move-out, and post-construction
                                care. With flexible scheduling, eco-friendly products, and attention to detail, we
                                ensure your space shines effortlessly!</p>
                            <div class="services-details__points-box">
                                <ul class="services-details__points list-unstyled">
                                    <li>
                                        <div class="icon">
                                            <span class="icon-star-1"></span>
                                        </div>
                                        <p>Dusting and vacuuming</p>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-star-1"></span>
                                        </div>
                                        <p>Mopping and sweeping floors</p>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-star-1"></span>
                                        </div>
                                        <p>Commercial Cleaning</p>
                                    </li>
                                </ul>
                                <ul class="services-details__points list-unstyled">
                                    <li>
                                        <div class="icon">
                                            <span class="icon-star-1"></span>
                                        </div>
                                        <p>Sanitizing kitchens and bathrooms</p>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-star-1"></span>
                                        </div>
                                        <p>Organizing living spaces</p>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-star-1"></span>
                                        </div>
                                        <p>Window cleaning</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="services-details__service-single-box">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="services-details__services-single">
                                            <div class="services-details__services-icon">
                                                <span class="icon-cleaning-1"></span>
                                            </div>
                                            <h3 class="services-details__services-title">Commercial Cleaning</h3>
                                            <p class="services-details__services-text">Create a clean and productive
                                                work<br> environment with our commercial <br>cleaning solutions.</p>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="services-details__services-single">
                                            <div class="services-details__services-icon">
                                                <span class="icon-sanitary"></span>
                                            </div>
                                            <h3 class="services-details__services-title">Deep Cleaning</h3>
                                            <p class="services-details__services-text">Perfect for seasonal refreshes or
                                                when<br> your space needs extra attention. Grout<br> and tile cleaning
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h3 class="services-details__title-3">Specialty Cleaning summry</h3>
                            <p class="services-details__text-3">Specialty cleaning refers to cleaning services or
                                techniques tailored to address specific, often unique, cleaning needs. This type of
                                cleaning is often used for environments, materials, or situations that require
                                specialized expertise, tools, or products. Here are some common categories</p>
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
                            <h3 class="services-details__title-4">Why Choose Our Services?</h3>
                            <p class="services-details__text-4">Choose us for experienced, professional cleaners,
                                flexible scheduling, eco-friendly products, and a 100% satisfaction guarantee.</p>
                            <p class="services-details__text-5">We deliver top-quality cleaning that leaves your space
                                spotless and refreshed! We deliver top-quality cleaning that leaves your space spotless
                                and refreshed!</p>
                            <div class="services-details__points-and-img-box">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="services-details__points-3">
                                            <ul class="services-details__points-list-3 list-unstyled">
                                                <li>
                                                    <div class="icon">
                                                        <span class="icon-star-1"></span>
                                                    </div>
                                                    <p>Experienced and professional staff</p>
                                                </li>
                                                <li>
                                                    <div class="icon">
                                                        <span class="icon-star-1"></span>
                                                    </div>
                                                    <p>Flexible scheduling to fit your needs</p>
                                                </li>
                                                <li>
                                                    <div class="icon">
                                                        <span class="icon-star-1"></span>
                                                    </div>
                                                    <p>Eco-friendly products for a healthier environment</p>
                                                </li>
                                                <li>
                                                    <div class="icon">
                                                        <span class="icon-star-1"></span>
                                                    </div>
                                                    <p>100% satisfaction guarantee</p>
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
                            <p class="services-details__text-6">We deliver top-quality cleaning that leaves your space
                                spotless and refreshed! We deliver top-quality cleaning that leaves your space spotless
                                and refreshed!</p>
                            <h3 class="services-details__title-5">Industrial and Commercial Cleaning.</h3>
                            <p class="services-details__text-7">Carpet and Upholstery Cleaning: Specialized methods for
                                cleaning delicate fabrics and carpets using techniques like steam cleaning, dry
                                cleaning, or deep cleaning to remove dirt, stains, and allergens. Cleaning after
                                building or renovation work, including removing dust, debris, and leftover materials to
                                make spaces ready for use.</p>
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
                                        <a href="{{ route('residential-cleaning') }}"><span
                                                class="icon-diagonal-arrow"></span>Residential Cleaning</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('commercial-cleaning') }}"><span
                                                class="icon-diagonal-arrow"></span>Commercial Cleaning</a>
                                    </li>
                                    <li class="active">
                                        <a href="{{ route('deep-cleaning') }}"><span class="icon-diagonal-arrow"></span>Deep
                                            Cleaning</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('office-cleaning') }}"><span class="icon-diagonal-arrow"></span>Office
                                            Cleaning</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('sanitizing-mopping') }}"><span
                                                class="icon-diagonal-arrow"></span>Sanitizing & Mopping</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="project-details__get-touch">
                                <h3 class="project-details__get-touch-title">Feel free to reach out to us anytime.</h3>
                                <div class="project-details__get-touch-btn-box">
                                    <a href="{{ route('contact') }}" class="thm-btn">Contact Us<span><i
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
                                    <span>Explore Our FAQs</span></h2>
                            </div>
                            <p class="faq-one__text">Everything you need to know. Detailed <br> overview of our
                                frequently asked questions</p>
                            <ul class="list-unstyled faq-one__points">
                                <li>
                                    <div class="icon">
                                        <span class="icon-star-1"></span>
                                    </div>
                                    <div class="text">
                                        <p>A Comprehensive Guide to Our Frequently Asked <br> Questions</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <span class="icon-star-1"></span>
                                    </div>
                                    <div class="text">
                                        <p>Find the Information You’re Looking For</p>
                                    </div>
                                </li>
                            </ul>
                            <div class="faq-one__contact-box">
                                <div class="faq-one__contact-img">
                                    <img src="{{ asset('assets/images/resources/faq-one-contact-img.png') }}" alt="">
                                </div>
                                <div class="faq-one__contact-big-text">Get In Touch</div>
                                <h3 class="faq-one__contact-title">If you have any other <br> questions, please contact
                                    <br> us here</h3>
                                <div class="faq-one__btn-box">
                                    <a href="{{ route('contact') }}" class="thm-btn">Contact Us<span><i
                                                class="icon-diagonal-arrow"></i></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="faq-one__right">
                            <div class="accrodion-grp" data-grp-name="faq-one-accrodion">
                                <div class="accrodion">
                                    <div class="accrodion-title">
                                        <h4>What types of cleaning services do you offer?</h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                            <p>Yes, we use eco-friendly and non-toxic cleaning products to ensure safety
                                                for your family, pets, and the environment. You can schedule a cleaning
                                                by calling us, booking online, or using our mobile app for flexible and
                                                convenient scheduling.
                                            </p>
                                        </div><!-- /.inner -->
                                    </div>
                                </div>
                                <div class="accrodion active">
                                    <div class="accrodion-title">
                                        <h4>Are your cleaning products eco-friendly?</h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                            <p>Yes, we use eco-friendly and non-toxic cleaning products to ensure safety
                                                for your family, pets, and the environment. You can schedule a cleaning
                                                by calling us, booking online, or using our mobile app for flexible and
                                                convenient scheduling.
                                            </p>
                                        </div><!-- /.inner -->
                                    </div>
                                </div>
                                <div class="accrodion">
                                    <div class="accrodion-title">
                                        <h4>Do I need to be home during the cleaning service?</h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                            <p>Yes, we use eco-friendly and non-toxic cleaning products to ensure safety
                                                for your family, pets, and the environment. You can schedule a cleaning
                                                by calling us, booking online, or using our mobile app for flexible and
                                                convenient scheduling.
                                            </p>
                                        </div><!-- /.inner -->
                                    </div>
                                </div>
                                <div class="accrodion">
                                    <div class="accrodion-title">
                                        <h4>What if I’m not satisfied with the cleaning service?</h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                            <p>Yes, we use eco-friendly and non-toxic cleaning products to ensure safety
                                                for your family, pets, and the environment. You can schedule a cleaning
                                                by calling us, booking online, or using our mobile app for flexible and
                                                convenient scheduling.
                                            </p>
                                        </div><!-- /.inner -->
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