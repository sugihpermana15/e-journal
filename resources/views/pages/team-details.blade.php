@extends('layouts.breadcrumbs')
@section('title', 'Team Details || Freshflow || Freshflow Laravel Template')
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/module-css/team.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/css/module-css/experience-one.css')}}"/>
@endpush
@php
    $bodyClass = 'custom-cursor';
    $title = 'Team Details';
    $subtitle = 'Team Details ';
@endphp
@section('content')
    <!--Team Details Start-->
        <section class="team-details">
            <div class="team-details__shape-3"></div>
            <div class="team-details__shape-1 float-bob-y">
                <img src="{{ asset('assets/images/shapes/team-details-shape-1.png') }}" alt="">
            </div>
            <div class="team-details__shape-2 float-bob-x">
                <img src="{{ asset('assets/images/shapes/team-details-shape-2.png') }}" alt="">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="team-details__left">
                            <div class="team-details__img-box">
                                <div class="team-details__img">
                                    <img src="{{ asset('assets/images/team/team-details-img-1.jpg') }}" alt="">
                                </div>
                                <div class="team-details__experience-box">
                                    <div class="team-details__experience-icon">
                                        <span class="icon-trophy"></span>
                                    </div>
                                    <div class="team-details__count-box">
                                        <h5 class="odometer" data-count="10">00</h5>
                                        <span>+</span>
                                        <p>Years of </p>
                                    </div>
                                    <p class="team-details__count-text">Professional Work Experience</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="team-details__right">
                            <div class="team-details__client-name-and-social">
                                <div class="team-details__client-name-box">
                                    <h3 class="team-details__name">Jordan Walk</h3>
                                    <p class="team-details__sub-title">Lead Cleaning Technician</p>
                                </div>
                                <div class="team-details__social-box">
                                    <a href="#"><span class="icon-linkedin-big-logo"></span></a>
                                    <a href="#"><span class="icon-pinterest"></span></a>
                                    <a href="#"><span class="icon-facebook-app-symbol"></span></a>
                                    <a href="#"><span class="icon-instagram"></span></a>
                                </div>
                            </div>
                            <h3 class="team-details__title-1">About Me</h3>
                            <p class="team-details__text-1"> A Lead Cleaning Technician oversees cleaning operations,
                                ensuring high-quality standards are met. Responsibilities include managing cleaning
                                staff, delegating tasks, inspecting completed work, and maintaining supplies. </p>
                            <ul class="team-details__location-list list-unstyled">
                                <li>
                                    <span>Location:</span>
                                    <p>Florida, New York</p>
                                </li>
                                <li>
                                    <span>Phone:</span>
                                    <p><a href="tel:+628971399093">+62 897 1399 093</a></p>
                                </li>
                                <li>
                                    <span>Email:</span>
                                    <p><a href="mailto:alison@domain.com">alison@domain.com</a></p>
                                </li>
                                <li>
                                    <span>Education:</span>
                                    <p>Masters of Ui Degree</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Team Details End-->

        <!--Experience One Start-->
        <section class="experience-one">
            <div class="experience-one__bg-shape"
                style="background-image: url({{ asset('assets/images/shapes/experience-one-bg-shape.png') }});"></div>
            <div class="experience-one__shape-1">
                <img src="{{ asset('assets/images/shapes/experience-one-shape-1.png') }}" alt="">
            </div>
            <div class="experience-one__shape-2 float-bob-y">
                <img src="{{ asset('assets/images/shapes/experience-one-shape-2.png') }}" alt="">
            </div>
            <div class="experience-one__shape-3 float-bob-x">
                <img src="{{ asset('assets/images/shapes/experience-one-shape-3.png') }}" alt="">
            </div>
            <div class="experience-one__shape-4"></div>
            <div class="experience-one__shape-5"></div>
            <div class="experience-one__shape-6"></div>
            <div class="container">
                <div class="experience-one__top">
                    <h3 class="experience-one__top-title">Education</h3>
                    <ul class="experience-one__top-list list-unstyled">
                        <li>
                            <div class="icon">
                                <span class="fas fa-university"></span>
                            </div>
                            <div class="content">
                                <h5>Oxford University</h5>
                                <p>Certificate in Commercial Cleaning Management</p>
                                <span>Passing Year June 2015</span>
                            </div>
                        </li>
                        <li>
                            <div class="icon">
                                <span class="fas fa-university"></span>
                            </div>
                            <div class="content">
                                <h5>Oxford University</h5>
                                <p>Diploma in Environmental Science</p>
                                <span>Passing Year June 2020</span>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="experience-one__bottom">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6">
                            <div class="experience-one__bottom-left">
                                <h3 class="experience-one__core-title">Core Competencies:</h3>
                                <p class="experience-one__core-text">With a professional-level grasp of my craft, I
                                    bring a combination of technical expertise, creativity, and a results-driven mindset
                                    to everything I undertake.</p>
                                <ul class="experience-one__core-list list-unstyled">
                                    <li>
                                        <div class="icon">
                                            <span class="icon-check-1"></span>
                                        </div>
                                        <div class="content">
                                            <h4>Technical Proficiency:</h4>
                                            <p>Proficiency in specialized methods such as deep cleaning, sanitization,
                                                and stain removal for residential, commercial, and industrial spaces.
                                            </p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-check-1"></span>
                                        </div>
                                        <div class="content">
                                            <h4>Professional Equipment Usage: </h4>
                                            <p>Skilled in operating advanced tools such as industrial vacuum cleaners,
                                                steam cleaners, floor polishers, and pressure washers for optimal
                                                results.</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="experience-one__bottom-right">
                                <div class="section-title text-left sec-title-animation animation-style2">
                                    <div class="section-title__tagline-box">
                                        <div class="section-title__tagline-shape-box">
                                            <div class="section-title__tagline-shape"></div>
                                            <div class="section-title__tagline-shape-2"></div>
                                        </div>
                                        <span class="section-title__tagline">SKILS & EXPERTIES</span>
                                    </div>
                                    <h2 class="section-title__title title-animation">Experience Sparkling<br>
                                        <span>Clean Like</span></h2>
                                </div>
                                <ul class="experience-one__progress-list list-unstyled">
                                    <li>
                                        <div class="experience-one__progress">
                                            <h4 class="experience-one__progress-title">Spotless Home Solutions</h4>
                                            <div class="bar">
                                                <div class="bar-inner count-bar" data-percent="80%">
                                                    <div class="count-text">80%</div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="experience-one__progress">
                                            <h4 class="experience-one__progress-title">Pristine Shine Co.</h4>
                                            <div class="bar">
                                                <div class="bar-inner count-bar" data-percent="50%">
                                                    <div class="count-text">45%</div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="experience-one__progress">
                                            <h4 class="experience-one__progress-title">Fresh Space Pros</h4>
                                            <div class="bar">
                                                <div class="bar-inner count-bar" data-percent="90%">
                                                    <div class="count-text">90%</div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="experience-one__progress">
                                            <h4 class="experience-one__progress-title">Bright Touch Cleaning</h4>
                                            <div class="bar">
                                                <div class="bar-inner count-bar" data-percent="80%">
                                                    <div class="count-text">80%</div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Experience One End-->
    <x-strickyHeader />
    <x-footer2 />
    <x-mobileMenu />
    <x-searchPopup />
    <x-scroll-to-top />
@endsection