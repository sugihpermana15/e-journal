@extends('layouts.breadcrumbs')
@section('title', 'Projects')
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/module-css/project.css')}}"/>
{{-- blog.css here for only pagination --}}
<link rel="stylesheet" href="{{asset('assets/css/module-css/blog.css')}}"/> 
@endpush
@php
    $bodyClass = 'custom-cursor';
    $title = 'Our Projects';
    $subtitle = 'Projects';
@endphp
@section('content')
    <!--Project One Start-->
        <section class="project-one project-page">
            <div class="project-one__bg-shape"
                style="background-image: url({{ asset('assets/images/shapes/project-one-bg-shape.png') }});"></div>
            <div class="project-one__bg-shape-2"
                style="background-image: url({{ asset('assets/images/shapes/project-one-bg-shape-2.png') }});"></div>
            <div class="project-one__shape-1"></div>
            <div class="project-one__shape-2"></div>
            <div class="container">

                <div class="project-one__inner">
                    <div class="row">
                        <!--Project One Single Start-->
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="project-one__single">
                                <div class="project-one__img-box">
                                    <div class="project-one__img">
                                        <img src="{{ asset('assets/images/project/project-1-1.jpg') }}" alt="">
                                    </div>
                                    <div class="project-one__view-box">
                                        <a href="{{ route('project-details') }}" class="project-one__view">
                                            <i class="icon-diagonal-arrow"></i>
                                            <span>View More</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="project-one__content">
                                    <p class="project-one__tag">Residential<span
                                            class="icon-right-arrow"></span>November 24</p>
                                    <h3 class="project-one__title"><a href="{{ route('project-details') }}">Sparkle & Shine
                                            Services</a></h3>
                                </div>
                            </div>
                        </div>
                        <!--Project One Single End-->
                        <!--Project One Single Start-->
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="project-one__single">
                                <div class="project-one__img-box">
                                    <div class="project-one__img">
                                        <img src="{{ asset('assets/images/project/project-1-2.jpg') }}" alt="">
                                    </div>
                                    <div class="project-one__view-box">
                                        <a href="{{ route('project-details') }}" class="project-one__view">
                                            <i class="icon-diagonal-arrow"></i>
                                            <span>View More</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="project-one__content">
                                    <p class="project-one__tag">Commercial<span class="icon-right-arrow"></span>November
                                        24</p>
                                    <h3 class="project-one__title"><a href="{{ route('project-details') }}">Pure Clean
                                            Solutions</a></h3>
                                </div>
                            </div>
                        </div>
                        <!--Project One Single End-->
                        <!--Project One Single Start-->
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="project-one__single">
                                <div class="project-one__img-box">
                                    <div class="project-one__img">
                                        <img src="{{ asset('assets/images/project/project-1-3.jpg') }}" alt="">
                                    </div>
                                    <div class="project-one__view-box">
                                        <a href="{{ route('project-details') }}" class="project-one__view">
                                            <i class="icon-diagonal-arrow"></i>
                                            <span>View More</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="project-one__content">
                                    <p class="project-one__tag">Deep CLEAN<span class="icon-right-arrow"></span>November
                                        24</p>
                                    <h3 class="project-one__title"><a href="{{ route('project-details') }}">Fresh Space
                                            Experts</a></h3>
                                </div>
                            </div>
                        </div>
                        <!--Project One Single End-->
                        <!--Project One Single Start-->
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="project-one__single">
                                <div class="project-one__img-box">
                                    <div class="project-one__img">
                                        <img src="{{ asset('assets/images/project/project-1-4.jpg') }}" alt="">
                                    </div>
                                    <div class="project-one__view-box">
                                        <a href="{{ route('project-details') }}" class="project-one__view">
                                            <i class="icon-diagonal-arrow"></i>
                                            <span>View More</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="project-one__content">
                                    <p class="project-one__tag">Moveout<span class="icon-right-arrow"></span>November 24
                                    </p>
                                    <h3 class="project-one__title"><a href="{{ route('project-details') }}">Eco Gleam Crew</a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <!--Project One Single End-->
                        <!--Project One Single Start-->
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="project-one__single">
                                <div class="project-one__img-box">
                                    <div class="project-one__img">
                                        <img src="{{ asset('assets/images/project/project-1-5.jpg') }}" alt="">
                                    </div>
                                    <div class="project-one__view-box">
                                        <a href="{{ route('project-details') }}" class="project-one__view">
                                            <i class="icon-diagonal-arrow"></i>
                                            <span>View More</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="project-one__content">
                                    <p class="project-one__tag">Specialized<span
                                            class="icon-right-arrow"></span>November 24</p>
                                    <h3 class="project-one__title"><a href="{{ route('project-details') }}">Neat Nest Pros</a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <!--Project One Single End-->
                        <!--Project One Single Start-->
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="project-one__single-2">
                                <div class="project-one__single-2-img">
                                    <img src="{{ asset('assets/images/project/project-one-single-two-img-1.png') }}" alt="">
                                </div>
                                <h3 class="project-one__title-2"><a href="{{ route('project-details') }}">Do you have any project
                                        <br>ideas in mind?</a></h3>
                                <div class="project-one__view-box-2">
                                    <a href="{{ route('project-details') }}" class="project-one__view-2">
                                        <i class="icon-diagonal-arrow"></i>
                                        <span>View More<br> Project</span>
                                    </a>
                                </div>
                                <ul class="project-one__sliding-text-list list-unstyled marquee_mode">
                                    <li>
                                        <h2 data-hover="Get In Touch" class="project-one__sliding-text-title"> Get In
                                            Touch</h2>
                                    </li>
                                </ul>
                                <div class="project-one__need-help">
                                    <p>Need Support?</p>
                                    <a href="tel:+628971399093">+62 897 1399 093</a>
                                </div>
                            </div>
                        </div>
                        <!--Project One Single End-->
                    </div>
                    <div class="project-page__pagination">
                        <div class="blog-list__pagination">
                            <ul class="pg-pagination list-unstyled">
                                <li class="prev">
                                    <a href="#" aria-label="prev"><i class="fas fa-arrow-left"></i></a>
                                </li>
                                <li class="count active"><a href="#">01</a></li>
                                <li class="count"><a href="#">02</a></li>
                                <li class="count"><a href="#">03</a></li>
                                <li class="next">
                                    <a href="#" aria-label="Next"><i class="fas fa-arrow-right"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Project One End-->

    <x-strickyHeader />
    <x-footer2 />
    <x-mobileMenu />
    <x-searchPopup />
    <x-scroll-to-top />
@endsection