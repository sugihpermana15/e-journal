@extends('layouts.breadcrumbs')
@section('title', 'Pricing Carousel')
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/module-css/pricing.css')}}"/>
@endpush
@php
    $bodyClass = 'custom-cursor';
    $title = 'Publishing Packages';
    $subtitle = 'Publishing Packages (Carousel)';
@endphp
@section('content')
        <section class="pricing-carousel-page">
            <div class="container">
                <div class="pricing-carousel-style owl-carousel owl-theme carousel-dot-style">
                    <!--Pricing Two Single Start -->
                    <div class="item">
                        <div class="pricing-two__single">
                            <div class="pricing-two__shape-1">
                                <img src="{{ asset('assets/images/shapes/pricing-two-shape-1.png') }}" alt="">
                            </div>
                            <div class="pricing-two__badge">
                                <p>Recommended</p>
                            </div>
                            <div class="pricing-two__pack-name">
                                <p>Essential</p>
                            </div>
                            <h3 class="pricing-two__price-box"> <span class="dolar">$</span> 220.00
                                <span class="validity">/Submission</span> </h3>
                            <p class="pricing-two__text">Submission-ready essentials <br> for a clean first pass.</p>
                            <div class="pricing-two__btn-box">
                                <a href="#" class="thm-btn">Choose Plan<span><i class="icon-plus"></i></span></a>
                            </div>
                            <div class="pricing-two__points-box">
                                <ul class="list-unstyled pricing-two__points">
                                    <li>
                                        <div class="icon">
                                            <span class="icon-check-1"></span>
                                        </div>
                                        <div class="text">
                                            <p>Manuscript screening &amp; scope check</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-check-1"></span>
                                        </div>
                                        <div class="text">
                                            <p>Journal formatting (structure &amp; style)</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-check-1"></span>
                                        </div>
                                        <div class="text">
                                            <p>Reference &amp; citation sanity check</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-check-1"></span>
                                        </div>
                                        <div class="text">
                                            <p>Submission checklist &amp; ready-to-upload files</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-check-1"></span>
                                        </div>
                                        <div class="text">
                                            <p>Email support during submission</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--Pricing Two Single End -->
                    <!--Pricing Two Single Start -->
                    <div class="item">
                        <div class="pricing-two__single pricing-two__single--two">
                            <div class="pricing-two__shape-1">
                                <img src="{{ asset('assets/images/shapes/pricing-two-shape-1.png') }}" alt="">
                            </div>
                            <div class="pricing-two__badge">
                                <p>Recommended</p>
                            </div>
                            <div class="pricing-two__pack-name">
                                <p>Professional</p>
                            </div>
                            <h3 class="pricing-two__price-box"> <span class="dolar">$</span> 240.00
                                <span class="validity">/Submission</span> </h3>
                            <p class="pricing-two__text">Deeper editorial support <br> to strengthen clarity and compliance.</p>
                            <div class="pricing-two__btn-box">
                                <a href="#" class="thm-btn">Choose Plan<span><i class="icon-plus"></i></span></a>
                            </div>
                            <div class="pricing-two__points-box">
                                <ul class="list-unstyled pricing-two__points">
                                    <li>
                                        <div class="icon">
                                            <span class="icon-check-1"></span>
                                        </div>
                                        <div class="text">
                                            <p>Professional copyediting (language &amp; style)</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-check-1"></span>
                                        </div>
                                        <div class="text">
                                            <p>Figure/table presentation review</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-check-1"></span>
                                        </div>
                                        <div class="text">
                                            <p>Similarity check support (report + guidance)</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-check-1"></span>
                                        </div>
                                        <div class="text">
                                            <p>Abstract &amp; keywords optimization</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-check-1"></span>
                                        </div>
                                        <div class="text">
                                            <p>Cover letter &amp; response-to-reviewers draft</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--Pricing Two Single End -->
                    <!--Pricing Two Single Start -->
                    <div class="item">
                        <div class="pricing-two__single">
                            <div class="pricing-two__shape-1">
                                <img src="{{ asset('assets/images/shapes/pricing-two-shape-1.png') }}" alt="">
                            </div>
                            <div class="pricing-two__badge">
                                <p>Recommended</p>
                            </div>
                            <div class="pricing-two__pack-name">
                                <p>Institutional</p>
                            </div>
                            <h3 class="pricing-two__price-box"> <span class="dolar">$</span> 350.00
                                <span class="validity">/Partnership</span> </h3>
                            <p class="pricing-two__text">For journals, societies, <br>
                                and institutional programs.</p>
                            <div class="pricing-two__btn-box">
                                <a href="#" class="thm-btn">Choose Plan<span><i class="icon-plus"></i></span></a>
                            </div>
                            <div class="pricing-two__points-box">
                                <ul class="list-unstyled pricing-two__points">
                                    <li>
                                        <div class="icon">
                                            <span class="icon-check-1"></span>
                                        </div>
                                        <div class="text">
                                            <p>Dedicated account &amp; production coordination</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-check-1"></span>
                                        </div>
                                        <div class="text">
                                            <p>Workflow setup &amp; editorial team onboarding</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-check-1"></span>
                                        </div>
                                        <div class="text">
                                            <p>Peer-review system support &amp; SOP templates</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-check-1"></span>
                                        </div>
                                        <div class="text">
                                            <p>Publishing schedule &amp; issue planning support</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-check-1"></span>
                                        </div>
                                        <div class="text">
                                            <p>Indexing readiness guidance &amp; metadata checks</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--Pricing Two Single End -->
                    <!--Pricing Two Single Start -->
                    <div class="item">
                        <div class="pricing-two__single">
                            <div class="pricing-two__shape-1">
                                <img src="{{ asset('assets/images/shapes/pricing-two-shape-1.png') }}" alt="">
                            </div>
                            <div class="pricing-two__badge">
                                <p>Recommended</p>
                            </div>
                            <div class="pricing-two__pack-name">
                                <p>Essential</p>
                            </div>
                            <h3 class="pricing-two__price-box"> <span class="dolar">$</span> 220.00
                                <span class="validity">/Submission</span> </h3>
                            <p class="pricing-two__text">Submission-ready essentials <br> for a clean first pass.</p>
                            <div class="pricing-two__btn-box">
                                <a href="#" class="thm-btn">Choose Plan<span><i class="icon-plus"></i></span></a>
                            </div>
                            <div class="pricing-two__points-box">
                                <ul class="list-unstyled pricing-two__points">
                                    <li>
                                        <div class="icon">
                                            <span class="icon-check-1"></span>
                                        </div>
                                        <div class="text">
                                            <p>Manuscript screening &amp; scope check</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-check-1"></span>
                                        </div>
                                        <div class="text">
                                            <p>Journal formatting (structure &amp; style)</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-check-1"></span>
                                        </div>
                                        <div class="text">
                                            <p>Reference &amp; citation sanity check</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-check-1"></span>
                                        </div>
                                        <div class="text">
                                            <p>Submission checklist &amp; ready-to-upload files</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-check-1"></span>
                                        </div>
                                        <div class="text">
                                            <p>Email support during submission</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--Pricing Two Single End -->
                    <!--Pricing Two Single Start -->
                    <div class="item">
                        <div class="pricing-two__single pricing-two__single--two">
                            <div class="pricing-two__shape-1">
                                <img src="{{ asset('assets/images/shapes/pricing-two-shape-1.png') }}" alt="">
                            </div>
                            <div class="pricing-two__badge">
                                <p>Recommended</p>
                            </div>
                            <div class="pricing-two__pack-name">
                                <p>Professional</p>
                            </div>
                            <h3 class="pricing-two__price-box"> <span class="dolar">$</span> 240.00
                                <span class="validity">/Submission</span> </h3>
                            <p class="pricing-two__text">Deeper editorial support <br> to strengthen clarity and compliance.</p>
                            <div class="pricing-two__btn-box">
                                <a href="#" class="thm-btn">Choose Plan<span><i class="icon-plus"></i></span></a>
                            </div>
                            <div class="pricing-two__points-box">
                                <ul class="list-unstyled pricing-two__points">
                                    <li>
                                        <div class="icon">
                                            <span class="icon-check-1"></span>
                                        </div>
                                        <div class="text">
                                            <p>Professional copyediting (language &amp; style)</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-check-1"></span>
                                        </div>
                                        <div class="text">
                                            <p>Figure/table presentation review</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-check-1"></span>
                                        </div>
                                        <div class="text">
                                            <p>Similarity check support (report + guidance)</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-check-1"></span>
                                        </div>
                                        <div class="text">
                                            <p>Abstract &amp; keywords optimization</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-check-1"></span>
                                        </div>
                                        <div class="text">
                                            <p>Cover letter &amp; response-to-reviewers draft</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--Pricing Two Single End -->
                    <!--Pricing Two Single Start -->
                    <div class="item">
                        <div class="pricing-two__single">
                            <div class="pricing-two__shape-1">
                                <img src="{{ asset('assets/images/shapes/pricing-two-shape-1.png') }}" alt="">
                            </div>
                            <div class="pricing-two__badge">
                                <p>Recommended</p>
                            </div>
                            <div class="pricing-two__pack-name">
                                <p>Institutional</p>
                            </div>
                            <h3 class="pricing-two__price-box"> <span class="dolar">$</span> 350.00
                                <span class="validity">/Partnership</span> </h3>
                            <p class="pricing-two__text">For journals, societies, <br>
                                and institutional programs.</p>
                            <div class="pricing-two__btn-box">
                                <a href="#" class="thm-btn">Choose Plan<span><i class="icon-plus"></i></span></a>
                            </div>
                            <div class="pricing-two__points-box">
                                <ul class="list-unstyled pricing-two__points">
                                    <li>
                                        <div class="icon">
                                            <span class="icon-check-1"></span>
                                        </div>
                                        <div class="text">
                                            <p>Dedicated account &amp; production coordination</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-check-1"></span>
                                        </div>
                                        <div class="text">
                                            <p>Workflow setup &amp; editorial team onboarding</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-check-1"></span>
                                        </div>
                                        <div class="text">
                                            <p>Peer-review system support &amp; SOP templates</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-check-1"></span>
                                        </div>
                                        <div class="text">
                                            <p>Publishing schedule &amp; issue planning support</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-check-1"></span>
                                        </div>
                                        <div class="text">
                                            <p>Indexing readiness guidance &amp; metadata checks</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--Pricing Two Single End -->
                    <!--Pricing Two Single Start -->
                    <div class="item">
                        <div class="pricing-two__single pricing-two__single--two">
                            <div class="pricing-two__shape-1">
                                <img src="{{ asset('assets/images/shapes/pricing-two-shape-1.png') }}" alt="">
                            </div>
                            <div class="pricing-two__badge">
                                <p>Recommended</p>
                            </div>
                            <div class="pricing-two__pack-name">
                                <p>Professional</p>
                            </div>
                            <h3 class="pricing-two__price-box"> <span class="dolar">$</span> 240.00
                                <span class="validity">/Submission</span> </h3>
                            <p class="pricing-two__text">Deeper editorial support <br> to strengthen clarity and compliance.</p>
                            <div class="pricing-two__btn-box">
                                <a href="#" class="thm-btn">Choose Plan<span><i class="icon-plus"></i></span></a>
                            </div>
                            <div class="pricing-two__points-box">
                                <ul class="list-unstyled pricing-two__points">
                                    <li>
                                        <div class="icon">
                                            <span class="icon-check-1"></span>
                                        </div>
                                        <div class="text">
                                            <p>Professional copyediting (language &amp; style)</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-check-1"></span>
                                        </div>
                                        <div class="text">
                                            <p>Figure/table presentation review</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-check-1"></span>
                                        </div>
                                        <div class="text">
                                            <p>Similarity check support (report + guidance)</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-check-1"></span>
                                        </div>
                                        <div class="text">
                                            <p>Abstract &amp; keywords optimization</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-check-1"></span>
                                        </div>
                                        <div class="text">
                                            <p>Cover letter &amp; response-to-reviewers draft</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--Pricing Two Single End -->
                </div>
            </div>
        </section>
        <!--Pricing Carousel Page End -->

    <x-strickyHeader />
    <x-footer2 />
    <x-mobileMenu />
    <x-searchPopup />
    <x-scroll-to-top />
@endsection