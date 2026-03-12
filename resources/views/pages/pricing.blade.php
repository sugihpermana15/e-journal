@extends('layouts.breadcrumbs')
@section('title', 'Pricing')
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/module-css/pricing.css')}}"/>
@endpush
@php
    $bodyClass = 'custom-cursor';
    $title = 'Publishing Packages';
    $subtitle = 'Publishing Packages';
@endphp
@section('content')
     <!--Pricing Two Start -->
        <section class="pricing-two pricing-page">
            <div class="pricing-two__shape-bg"
                style="background-image: url({{ asset('assets/images/shapes/pricing-two-shape-bg.png') }});"></div>
            <div class="pricing-two__shape-2 img-bounce">
                <img src="{{ asset('assets/images/shapes/pricing-two-shape-2.png') }}" alt="">
            </div>
            <div class="pricing-two__shape-3 float-bob-y">
                <img src="{{ asset('assets/images/shapes/pricing-two-shape-3.png') }}" alt="">
            </div>
            <div class="container">
                <div class="section-title text-center sec-title-animation animation-style1">
                    <div class="section-title__tagline-box">
                        <div class="section-title__tagline-shape-box">
                            <div class="section-title__tagline-shape"></div>
                            <div class="section-title__tagline-shape-2"></div>
                        </div>
                        <span class="section-title__tagline">Plans & Pricing</span>
                    </div>
                    <h2 class="section-title__title title-animation">Choose the right <br> publishing support package
                        <span>for your manuscript or journal</span></h2>
                </div>
                <div class="pricing-two__inner">
                    <div class="pricing-two__main-tab-box tabs-box">
                        <div class="pricing-two__tab-buttons-box">
                            <div class="pricing-two__discount-box">
                                <p>Save 10%</p>
                            </div>
                            <div class="pricing-two__discount-shape-1">
                                <img src="{{ asset('assets/images/shapes/pricing-two-discount--shape-1.png') }}" alt="">
                            </div>
                            <ul class="tab-buttons list-unstyled">
                                <li data-tab="#monthly" class="tab-btn active-btn"><span>Per Submission</span></li>
                                <li data-tab="#yearly" class="tab-btn"><span>Annual Partnership</span></li>
                            </ul>
                        </div>
                        <div class="tabs-content">
                            <div class="tab active-tab" id="monthly">
                                <div class="pricing-two__tab-content-box">
                                    <div class="row">
                                        <!--Pricing Two Single Start -->
                                        <div class="col-xl-4 col-lg-6">
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
                                                    <a href="#" class="thm-btn">Choose Plan<span><i
                                                                class="icon-plus"></i></span></a>
                                                </div>
                                                <div class="pricing-two__points-box">
                                                    <ul class="list-unstyled pricing-two__points">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-check-1"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Light language polish (clarity &amp; consistency)</p>
                                                            </div>
                                                        </li>
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
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Pricing Two Single End -->
                                        <!--Pricing Two Single Start -->
                                        <div class="col-xl-4 col-lg-6">
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
                                                    <a href="#" class="thm-btn">Choose Plan<span><i
                                                                class="icon-plus"></i></span></a>
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
                                        <div class="col-xl-4 col-lg-6">
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
                                                <p class="pricing-two__text">For journals, societies, <br> and institutional programs.</p>
                                                <div class="pricing-two__btn-box">
                                                    <a href="#" class="thm-btn">Choose Plan<span><i
                                                                class="icon-plus"></i></span></a>
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
                                    </div>
                                </div>
                            </div>
                            <div class="tab" id="yearly">
                                <div class="pricing-two__tab-content-box">
                                    <div class="row">
                                        <!--Pricing Two Single Start -->
                                        <div class="col-xl-4 col-lg-6">
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
                                                    <span class="validity">/Annual</span> </h3>
                                                <p class="pricing-two__text">Annual publishing essentials <br> for consistent submissions.</p>
                                                <div class="pricing-two__btn-box">
                                                    <a href="#" class="thm-btn">Choose Plan<span><i
                                                                class="icon-plus"></i></span></a>
                                                </div>
                                                <div class="pricing-two__points-box">
                                                    <ul class="list-unstyled pricing-two__points">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-check-1"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Editorial helpdesk for submissions</p>
                                                            </div>
                                                        </li>
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
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Pricing Two Single End -->
                                        <!--Pricing Two Single Start -->
                                        <div class="col-xl-4 col-lg-6">
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
                                                    <span class="validity">/Annual</span> </h3>
                                                <p class="pricing-two__text">Editorial + production support <br> for multiple manuscripts per year.</p>
                                                <div class="pricing-two__btn-box">
                                                    <a href="#" class="thm-btn">Choose Plan<span><i
                                                                class="icon-plus"></i></span></a>
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
                                        <div class="col-xl-4 col-lg-6">
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
                                                    <span class="validity">/Annual</span> </h3>
                                                <p class="pricing-two__text">Annual partnership for journals <br>
                                                    and institutions.</p>
                                                <div class="pricing-two__btn-box">
                                                    <a href="#" class="thm-btn">Choose Plan<span><i
                                                                class="icon-plus"></i></span></a>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Pricing Two End -->

    <x-strickyHeader />
    <x-footer2 />
    <x-mobileMenu />
    <x-searchPopup />
    <x-scroll-to-top />
@endsection