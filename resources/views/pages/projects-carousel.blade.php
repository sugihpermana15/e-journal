@extends('layouts.breadcrumbs')
@section('title', 'Projects Carousel')
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/module-css/project.css')}}"/>
@endpush
@php
    $bodyClass = 'custom-cursor';
    $title = 'Projects Carousel';
    $subtitle = 'Projects Carousel';
@endphp
@section('content')
        <!--Projects Carousel Page Start-->
        <section class="project-carousel-page">
            <div class="container">
                <div class="project-one__inner">
                    <div class="project-carousel-style owl-carousel owl-theme carousel-dot-style">
                        <!--Project One Single Start-->
                        <div class="item">
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
                        <div class="item">
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
                        <div class="item">
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
                        <div class="item">
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
                        <div class="item">
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
                        <div class="item">
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
                        <div class="item">
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
                    </div>
                </div>
            </div>
        </section>
        <!--Projects Carousel Page End-->
    <x-strickyHeader />
    <x-footer2 />
    <x-mobileMenu />
    <x-searchPopup />
    <x-scroll-to-top />
@endsection