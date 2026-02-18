@extends('layouts.breadcrumbs')
@section('title', 'Testimonials')
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/module-css/testimonial.css')}}"/>
@endpush
@php
    $bodyClass = 'custom-cursor';
    $title = 'Testimonials';
    $subtitle = 'Testimonials';
@endphp
@section('content')
    <!--Testimonial Page Start-->
        <section class="testimonial-page">
            <div class="container">
                <div class="row">
                    <!--Testimonial Page Single Start-->
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="testimonial-one__single">
                            <div class="testimonial-one__quote-icon">
                                <img src="{{ asset('assets/images/icon/quote-icon-1.png') }}" alt="">
                            </div>
                            <div class="testimonial-one__client-info">
                                <div class="testimonial-one__client-content">
                                    <h4 class="testimonial-one__client-name"><a href="{{ route('testimonials') }}">Emily
                                            Carter</a></h4>
                                    <p class="testimonial-one__client-sub-title">Business Owner</p>
                                </div>
                                <div class="testimonial-one__client-img">
                                    <img src="{{ asset('assets/images/testimonial/testimonial-1-1.jpg') }}" alt="">
                                </div>
                            </div>
                            <span class="testimonial-one__sub-title">Worth every penny!</span>
                            <p class="testimonial-one__text">"Their attention to detail is unmatched. I’ve used
                                other cleaning services before, but this one stands out! I recommended tehm Their
                                attention to
                                detail is unmatched. I’ve used other cleaning services before,"</p>
                            <div class="testimonial-one__rating-and-date">
                                <div class="testimonial-one__rating">
                                    <span class="icon-star"></span>
                                    <span class="icon-star"></span>
                                    <span class="icon-star"></span>
                                    <span class="last-icon icon-star"></span>
                                    <span class="last-icon icon-star"></span>
                                </div>
                                <p class="testimonial-one__date">10 Days Ago</p>
                            </div>
                        </div>
                    </div>
                    <!--Testimonial Page Single End-->

                    <!--Testimonial Page Single Start-->
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="testimonial-one__single">
                            <div class="testimonial-one__quote-icon">
                                <img src="{{ asset('assets/images/icon/quote-icon-1.png') }}" alt="">
                            </div>
                            <div class="testimonial-one__client-info">
                                <div class="testimonial-one__client-content">
                                    <h4 class="testimonial-one__client-name"><a href="{{ route('testimonials') }}">Michael
                                            Brown</a></h4>
                                    <p class="testimonial-one__client-sub-title">Financial Analyst</p>
                                </div>
                                <div class="testimonial-one__client-img">
                                    <img src="{{ asset('assets/images/testimonial/testimonial-1-2.jpg') }}" alt="">
                                </div>
                            </div>
                            <span class="testimonial-one__sub-title">Efficient and reliable!</span>
                            <p class="testimonial-one__text">"Their attention to detail is unmatched. I’ve used
                                other cleaning services before, but this one stands out! I recommended tehm Their
                                attention to
                                detail is unmatched. I’ve used other cleaning services before,"</p>
                            <div class="testimonial-one__rating-and-date">
                                <div class="testimonial-one__rating">
                                    <span class="icon-star"></span>
                                    <span class="icon-star"></span>
                                    <span class="icon-star"></span>
                                    <span class="last-icon icon-star"></span>
                                    <span class="last-icon icon-star"></span>
                                </div>
                                <p class="testimonial-one__date">10 Days Ago</p>
                            </div>
                        </div>
                    </div>
                    <!--Testimonial Page Single End-->

                    <!--Testimonial Page Single Start-->
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="testimonial-one__single">
                            <div class="testimonial-one__quote-icon">
                                <img src="{{ asset('assets/images/icon/quote-icon-1.png') }}" alt="">
                            </div>
                            <div class="testimonial-one__client-info">
                                <div class="testimonial-one__client-content">
                                    <h4 class="testimonial-one__client-name"><a href="{{ route('testimonials') }}">Sarah
                                            Thompson</a></h4>
                                    <p class="testimonial-one__client-sub-title">Marketing Manager</p>
                                </div>
                                <div class="testimonial-one__client-img">
                                    <img src="{{ asset('assets/images/testimonial/testimonial-1-3.jpg') }}" alt="">
                                </div>
                            </div>
                            <span class="testimonial-one__sub-title">Spotless results every time!</span>
                            <p class="testimonial-one__text">"Their attention to detail is unmatched. I’ve used
                                other cleaning services before, but this one stands out! I recommended tehm Their
                                attention to
                                detail is unmatched. I’ve used other cleaning services before,"</p>
                            <div class="testimonial-one__rating-and-date">
                                <div class="testimonial-one__rating">
                                    <span class="icon-star"></span>
                                    <span class="icon-star"></span>
                                    <span class="icon-star"></span>
                                    <span class="last-icon icon-star"></span>
                                    <span class="last-icon icon-star"></span>
                                </div>
                                <p class="testimonial-one__date">10 Days Ago</p>
                            </div>
                        </div>
                    </div>
                    <!--Testimonial Page Single End-->

                    <!--Testimonial Page Single Start-->
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="testimonial-one__single">
                            <div class="testimonial-one__quote-icon">
                                <img src="{{ asset('assets/images/icon/quote-icon-1.png') }}" alt="">
                            </div>
                            <div class="testimonial-one__client-info">
                                <div class="testimonial-one__client-content">
                                    <h4 class="testimonial-one__client-name"><a href="{{ route('testimonials') }}">John
                                            Peterson</a></h4>
                                    <p class="testimonial-one__client-sub-title">Software Developer </p>
                                </div>
                                <div class="testimonial-one__client-img">
                                    <img src="{{ asset('assets/images/testimonial/testimonial-1-4.jpg') }}" alt="">
                                </div>
                            </div>
                            <span class="testimonial-one__sub-title">A true lifesaver!</span>
                            <p class="testimonial-one__text">"Their attention to detail is unmatched. I’ve used
                                other cleaning services before, but this one stands out! I recommended tehm Their
                                attention to
                                detail is unmatched. I’ve used other cleaning services before,"</p>
                            <div class="testimonial-one__rating-and-date">
                                <div class="testimonial-one__rating">
                                    <span class="icon-star"></span>
                                    <span class="icon-star"></span>
                                    <span class="icon-star"></span>
                                    <span class="last-icon icon-star"></span>
                                    <span class="last-icon icon-star"></span>
                                </div>
                                <p class="testimonial-one__date">10 Days Ago</p>
                            </div>
                        </div>
                    </div>
                    <!--Testimonial Page Single End-->

                    <!--Testimonial Page Single Start-->
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="testimonial-one__single">
                            <div class="testimonial-one__quote-icon">
                                <img src="{{ asset('assets/images/icon/quote-icon-1.png') }}" alt="">
                            </div>
                            <div class="testimonial-one__client-info">
                                <div class="testimonial-one__client-content">
                                    <h4 class="testimonial-one__client-name"><a href="{{ route('testimonials') }}">Sarah
                                            Thompson</a></h4>
                                    <p class="testimonial-one__client-sub-title">Marketing Manager</p>
                                </div>
                                <div class="testimonial-one__client-img">
                                    <img src="{{ asset('assets/images/testimonial/testimonial-1-5.jpg') }}" alt="">
                                </div>
                            </div>
                            <span class="testimonial-one__sub-title">Spotless results every time!</span>
                            <p class="testimonial-one__text">"Their attention to detail is unmatched. I’ve used
                                other cleaning services before, but this one stands out! I recommended tehm Their
                                attention to
                                detail is unmatched. I’ve used other cleaning services before,"</p>
                            <div class="testimonial-one__rating-and-date">
                                <div class="testimonial-one__rating">
                                    <span class="icon-star"></span>
                                    <span class="icon-star"></span>
                                    <span class="icon-star"></span>
                                    <span class="last-icon icon-star"></span>
                                    <span class="last-icon icon-star"></span>
                                </div>
                                <p class="testimonial-one__date">10 Days Ago</p>
                            </div>
                        </div>
                    </div>
                    <!--Testimonial Page Single End-->

                    <!--Testimonial Page Single Start-->
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="testimonial-one__single">
                            <div class="testimonial-one__quote-icon">
                                <img src="{{ asset('assets/images/icon/quote-icon-1.png') }}" alt="">
                            </div>
                            <div class="testimonial-one__client-info">
                                <div class="testimonial-one__client-content">
                                    <h4 class="testimonial-one__client-name"><a href="{{ route('testimonials') }}">Emily
                                            Carter</a></h4>
                                    <p class="testimonial-one__client-sub-title">Business Owner</p>
                                </div>
                                <div class="testimonial-one__client-img">
                                    <img src="{{ asset('assets/images/testimonial/testimonial-1-6.jpg') }}" alt="">
                                </div>
                            </div>
                            <span class="testimonial-one__sub-title">Worth every penny!</span>
                            <p class="testimonial-one__text">"Their attention to detail is unmatched. I’ve used
                                other cleaning services before, but this one stands out! I recommended tehm Their
                                attention to
                                detail is unmatched. I’ve used other cleaning services before,"</p>
                            <div class="testimonial-one__rating-and-date">
                                <div class="testimonial-one__rating">
                                    <span class="icon-star"></span>
                                    <span class="icon-star"></span>
                                    <span class="icon-star"></span>
                                    <span class="last-icon icon-star"></span>
                                    <span class="last-icon icon-star"></span>
                                </div>
                                <p class="testimonial-one__date">10 Days Ago</p>
                            </div>
                        </div>
                    </div>
                    <!--Testimonial Page Single End-->
                </div>
            </div>
        </section>
        <!--Testimonial Page End-->
    <x-strickyHeader />
    <x-footer2 />
    <x-mobileMenu />
    <x-searchPopup />
    <x-scroll-to-top />
@endsection