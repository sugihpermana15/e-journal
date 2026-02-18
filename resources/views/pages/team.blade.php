@extends('layouts.breadcrumbs')
@section('title', 'Team')
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/module-css/team.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/css/module-css/office-gallery.css')}}"/>
@endpush
@php
    $bodyClass = 'custom-cursor';
    $title = 'Team Member';
    $subtitle = 'Team Member ';
@endphp
@section('content')
    <!--Team One Start-->
        <section class="team-one team-page">
            <div class="team-one__shape-1 float-bob-y">
                <img src="{{ asset('assets/images/shapes/team-one-shape-1.png') }}" alt="">
            </div>
            <div class="team-one__shape-2 float-bob-x">
                <img src="{{ asset('assets/images/shapes/team-one-shape-2.png') }}" alt="">
            </div>
            <div class="team-one__shape-3"></div>
            <div class="team-one__shape-4"></div>
            <div class="container">
                <div class="row">
                    <!--Team One Single Start-->
                    <div class="col-xl-3 col-lg-6 col-md-6">
                        <div class="team-one__single">
                            <div class="team-one__img-box">
                                <div class="team-one__img">
                                    <img src="{{ asset('assets/images/team/team-1-1.jpg') }}" alt="">
                                </div>
                                <div class="team-one__share-and-social">
                                    <div class="team-one__share">
                                        <span class="icon-share"></span>
                                    </div>
                                    <div class="team-one__social">
                                        <a href="#"><span class="icon-facebook-app-symbol"></span></a>
                                        <a href="#"><span class="icon-pinterest"></span></a>
                                        <a href="#"><span class="icon-linkedin-big-logo"></span></a>
                                        <a href="#"><span class="icon-instagram"></span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="team-one__content">
                                <div class="team-one__title-box">
                                    <h3 class="team-one__title"><a href="{{ route('team-details') }}">Emily Carter</a></h3>
                                    <p class="team-one__sub-title">Operations Manager</p>
                                </div>
                                <div class="team-one__arrow">
                                    <a href="{{ route('team-details') }}"><span class="icon-diagonal-arrow"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Team One Single End-->
                    <!--Team One Single Start-->
                    <div class="col-xl-3 col-lg-6 col-md-6">
                        <div class="team-one__single">
                            <div class="team-one__img-box">
                                <div class="team-one__img">
                                    <img src="{{ asset('assets/images/team/team-1-2.jpg') }}" alt="">
                                </div>
                                <div class="team-one__share-and-social">
                                    <div class="team-one__share">
                                        <span class="icon-share"></span>
                                    </div>
                                    <div class="team-one__social">
                                        <a href="#"><span class="icon-facebook-app-symbol"></span></a>
                                        <a href="#"><span class="icon-pinterest"></span></a>
                                        <a href="#"><span class="icon-linkedin-big-logo"></span></a>
                                        <a href="#"><span class="icon-instagram"></span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="team-one__content">
                                <div class="team-one__title-box">
                                    <h3 class="team-one__title"><a href="{{ route('team-details') }}">Michael Bennett</a></h3>
                                    <p class="team-one__sub-title">Team Leader</p>
                                </div>
                                <div class="team-one__arrow">
                                    <a href="{{ route('team-details') }}"><span class="icon-diagonal-arrow"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Team One Single End-->
                    <!--Team One Single Start-->
                    <div class="col-xl-3 col-lg-6 col-md-6">
                        <div class="team-one__single">
                            <div class="team-one__img-box">
                                <div class="team-one__img">
                                    <img src="{{ asset('assets/images/team/team-1-3.jpg') }}" alt="">
                                </div>
                                <div class="team-one__share-and-social">
                                    <div class="team-one__share">
                                        <span class="icon-share"></span>
                                    </div>
                                    <div class="team-one__social">
                                        <a href="#"><span class="icon-facebook-app-symbol"></span></a>
                                        <a href="#"><span class="icon-pinterest"></span></a>
                                        <a href="#"><span class="icon-linkedin-big-logo"></span></a>
                                        <a href="#"><span class="icon-instagram"></span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="team-one__content">
                                <div class="team-one__title-box">
                                    <h3 class="team-one__title"><a href="{{ route('team-details') }}">Sophia Ramirez</a></h3>
                                    <p class="team-one__sub-title">Quality Control Supervisor</p>
                                </div>
                                <div class="team-one__arrow">
                                    <a href="{{ route('team-details') }}"><span class="icon-diagonal-arrow"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Team One Single End-->
                    <!--Team One Single Start-->
                    <div class="col-xl-3 col-lg-6 col-md-6">
                        <div class="team-one__single">
                            <div class="team-one__img-box">
                                <div class="team-one__img">
                                    <img src="{{ asset('assets/images/team/team-1-4.jpg') }}" alt="">
                                </div>
                                <div class="team-one__share-and-social">
                                    <div class="team-one__share">
                                        <span class="icon-share"></span>
                                    </div>
                                    <div class="team-one__social">
                                        <a href="#"><span class="icon-facebook-app-symbol"></span></a>
                                        <a href="#"><span class="icon-pinterest"></span></a>
                                        <a href="#"><span class="icon-linkedin-big-logo"></span></a>
                                        <a href="#"><span class="icon-instagram"></span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="team-one__content">
                                <div class="team-one__title-box">
                                    <h3 class="team-one__title"><a href="{{ route('team-details') }}">Ethan Collins</a></h3>
                                    <p class="team-one__sub-title">Customer Service Coordinator</p>
                                </div>
                                <div class="team-one__arrow">
                                    <a href="{{ route('team-details') }}"><span class="icon-diagonal-arrow"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Team One Single End-->
                    <!--Team One Single Start-->
                    <div class="col-xl-3 col-lg-6 col-md-6">
                        <div class="team-one__single">
                            <div class="team-one__img-box">
                                <div class="team-one__img">
                                    <img src="{{ asset('assets/images/team/team-1-5.jpg') }}" alt="">
                                </div>
                                <div class="team-one__share-and-social">
                                    <div class="team-one__share">
                                        <span class="icon-share"></span>
                                    </div>
                                    <div class="team-one__social">
                                        <a href="#"><span class="icon-facebook-app-symbol"></span></a>
                                        <a href="#"><span class="icon-pinterest"></span></a>
                                        <a href="#"><span class="icon-linkedin-big-logo"></span></a>
                                        <a href="#"><span class="icon-instagram"></span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="team-one__content">
                                <div class="team-one__title-box">
                                    <h3 class="team-one__title"><a href="{{ route('team-details') }}">Tim M. Battler</a></h3>
                                    <p class="team-one__sub-title">Customer Service Coordinator</p>
                                </div>
                                <div class="team-one__arrow">
                                    <a href="{{ route('team-details') }}"><span class="icon-diagonal-arrow"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Team One Single End-->
                    <!--Team One Single Start-->
                    <div class="col-xl-3 col-lg-6 col-md-6">
                        <div class="team-one__single">
                            <div class="team-one__img-box">
                                <div class="team-one__img">
                                    <img src="{{ asset('assets/images/team/team-1-6.jpg') }}" alt="">
                                </div>
                                <div class="team-one__share-and-social">
                                    <div class="team-one__share">
                                        <span class="icon-share"></span>
                                    </div>
                                    <div class="team-one__social">
                                        <a href="#"><span class="icon-facebook-app-symbol"></span></a>
                                        <a href="#"><span class="icon-pinterest"></span></a>
                                        <a href="#"><span class="icon-linkedin-big-logo"></span></a>
                                        <a href="#"><span class="icon-instagram"></span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="team-one__content">
                                <div class="team-one__title-box">
                                    <h3 class="team-one__title"><a href="{{ route('team-details') }}">Jecia D. Singha</a></h3>
                                    <p class="team-one__sub-title">Team Leader</p>
                                </div>
                                <div class="team-one__arrow">
                                    <a href="{{ route('team-details') }}"><span class="icon-diagonal-arrow"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Team One Single End-->
                    <!--Team One Single Start-->
                    <div class="col-xl-3 col-lg-6 col-md-6">
                        <div class="team-one__single">
                            <div class="team-one__img-box">
                                <div class="team-one__img">
                                    <img src="{{ asset('assets/images/team/team-1-7.jpg') }}" alt="">
                                </div>
                                <div class="team-one__share-and-social">
                                    <div class="team-one__share">
                                        <span class="icon-share"></span>
                                    </div>
                                    <div class="team-one__social">
                                        <a href="#"><span class="icon-facebook-app-symbol"></span></a>
                                        <a href="#"><span class="icon-pinterest"></span></a>
                                        <a href="#"><span class="icon-linkedin-big-logo"></span></a>
                                        <a href="#"><span class="icon-instagram"></span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="team-one__content">
                                <div class="team-one__title-box">
                                    <h3 class="team-one__title"><a href="{{ route('team-details') }}">Ivor Herbertson</a></h3>
                                    <p class="team-one__sub-title">Operations Manager</p>
                                </div>
                                <div class="team-one__arrow">
                                    <a href="{{ route('team-details') }}"><span class="icon-diagonal-arrow"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Team One Single End-->
                    <!--Team One Single Start-->
                    <div class="col-xl-3 col-lg-6 col-md-6">
                        <div class="team-one__single">
                            <div class="team-one__img-box">
                                <div class="team-one__img">
                                    <img src="{{ asset('assets/images/team/team-1-8.jpg') }}" alt="">
                                </div>
                                <div class="team-one__share-and-social">
                                    <div class="team-one__share">
                                        <span class="icon-share"></span>
                                    </div>
                                    <div class="team-one__social">
                                        <a href="#"><span class="icon-facebook-app-symbol"></span></a>
                                        <a href="#"><span class="icon-pinterest"></span></a>
                                        <a href="#"><span class="icon-linkedin-big-logo"></span></a>
                                        <a href="#"><span class="icon-instagram"></span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="team-one__content">
                                <div class="team-one__title-box">
                                    <h3 class="team-one__title"><a href="{{ route('team-details') }}">Smaira Warnore</a></h3>
                                    <p class="team-one__sub-title">Quality Control Supervisor</p>
                                </div>
                                <div class="team-one__arrow">
                                    <a href="{{ route('team-details') }}"><span class="icon-diagonal-arrow"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Team One Single End-->
                </div>
            </div>
        </section>
        <!--Team One End-->

        <!--Office Gallery Start-->
        <section class="office-gallery">
            <div class="office-gallery__shape-bg"
                style="background-image: url({{ asset('assets/images/shapes/office-gallery-shape-bg-1.png') }});"></div>
            <div class="container">
                <div class="section-title text-center sec-title-animation animation-style1">
                    <div class="section-title__tagline-box">
                        <div class="section-title__tagline-shape-box">
                            <div class="section-title__tagline-shape"></div>
                            <div class="section-title__tagline-shape-2"></div>
                        </div>
                        <span class="section-title__tagline">OFFICE GALLERY</span>
                    </div>
                    <h2 class="section-title__title title-animation">Discover Our Office and<br>
                        <span>Explore our Creativity</span>
                    </h2>
                </div>
                <div class="row">
                    <div class="col-xl-8">
                        <div class="office-gallery__left">
                            <div class="row">
                                <div class="col-xl-6 col-md-6">
                                    <div class="office-gallery__single">
                                        <div class="office-gallery__img">
                                            <img src="{{ asset('assets/images/resources/office-gallery-1-1.jpg') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-md-6">
                                    <div class="office-gallery__single">
                                        <div class="office-gallery__img">
                                            <img src="{{ asset('assets/images/resources/office-gallery-1-2.jpg') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-md-12">
                                    <div class="office-gallery__single">
                                        <div class="office-gallery__img">
                                            <img src="{{ asset('assets/images/resources/office-gallery-1-3.jpg') }}" alt="">
                                            <div class="office-gallery__video-link">
                                                <a href="https://www.youtube.com/watch?v=MLpWrANjFbI"
                                                    class="video-popup">
                                                    <div class="office-gallery__video-icon">
                                                        <span class="icon-play"></span>
                                                        <i class="ripple"></i>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="office-gallery__right">
                            <div class="office-gallery__carousel owl-carousel owl-theme">
                                <div class="item">
                                    <div class="office-gallery__carousel-single">
                                        <div class="office-gallery__carousel-img">
                                            <img src="{{ asset('assets/images/resources/office-gallery-carousel-img-1-1.jpg') }}"
                                                alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="office-gallery__carousel-single">
                                        <div class="office-gallery__carousel-img">
                                            <img src="{{ asset('assets/images/resources/office-gallery-carousel-img-1-2.jpg') }}"
                                                alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="office-gallery__carousel-single">
                                        <div class="office-gallery__carousel-img">
                                            <img src="{{ asset('assets/images/resources/office-gallery-carousel-img-1-3.jpg') }}"
                                                alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="office-gallery__experience-box">
                                <div class="office-gallery__experience-year">
                                    <h3 class="odometer" data-count="25">00</h3>
                                </div>
                                <h4 class="office-gallery__experience-text">years of <br>
                                    experience</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Office Gallery End-->

    <x-strickyHeader />
    <x-footer2 />
    <x-mobileMenu />
    <x-searchPopup />
    <x-scroll-to-top />
@endsection