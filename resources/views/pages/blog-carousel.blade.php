@extends('layouts.breadcrumbs')
@section('title', 'Blog Carousel || Med Open Press')
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/module-css/blog.css')}}"/>
@endpush
@php
    $bodyClass = 'custom-cursor';
    $title = 'Blog Carousel';
    $subtitle = 'Blog Carousel';
@endphp
@section('content')
         <!--Blog Carousel page Start-->
         <section class="blog-carousel-page">
            <div class="container">
                <div class="blog-one__bottom">
                    <div class="blog-carousel-style owl-carousel owl-theme carousel-dot-style">
                        <!--Blog One Single Start-->
                        <div class="item" data-wow-duration="1500ms">
                            <div class="blog-one__single">
                                <div class="blog-one__img-box">
                                    <div class="blog-one__img">
                                        <img src="{{ asset('assets/images/blog/blog-1-1.jpg') }}" alt="">
                                    </div>
                                    <div class="blog-one__date">
                                        <p>05</p>
                                        <span>NOV</span>
                                    </div>
                                    <ul class="list-unstyled blog-one__tag">
                                        <li><a href="{{ route('blog-details') }}">Cardiology and Cardiovascular Medicine</a></li>
                                        <li><a href="{{ route('blog-details') }}">Internal Medicine</a></li>
                                    </ul>
                                </div>
                                <div class="blog-one__content">
                                    <h3 class="blog-one__title"><a href="{{ route('blog-details') }}">Writing a Strong Abstract
                                        for Cardiology &amp; Internal Medicine</a></h3>
                                    <p class="blog-one__text">A practical structure for objectives, methods, results,
                                    and conclusions.</p>
                                </div>
                            </div>
                        </div>
                        <!--Blog One Single End-->
                        <!--Blog One Single Start-->
                        <div class="item" data-wow-duration="1500ms">
                            <div class="blog-one__single">
                                <div class="blog-one__content blog-one__content--two">
                                    <h3 class="blog-one__title"><a href="{{ route('blog-details') }}">Surgical Manuscripts:
                                        Orthopedics &amp; Neurosurgery Submission Essentials</a></h3>
                                    <p class="blog-one__text">Consent, imaging, and follow-up reporting tips for high-quality cases.</p>
                                </div>
                                <div class="blog-one__img-box">
                                    <div class="blog-one__img">
                                        <img src="{{ asset('assets/images/blog/blog-1-2.jpg') }}" alt="">
                                    </div>
                                    <div class="blog-one__date">
                                        <p>24</p>
                                        <span>APR</span>
                                    </div>
                                    <ul class="list-unstyled blog-one__tag">
                                        <li><a href="{{ route('blog-details') }}">Orthopedics and Sports Medicine</a></li>
                                        <li><a href="{{ route('blog-details') }}">Neurosurgery</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--Blog One Single End-->
                        <!--Blog One Single Start-->
                        <div class="item" data-wow-duration="1500ms">
                            <div class="blog-one__single">
                                <div class="blog-one__img-box">
                                    <div class="blog-one__img">
                                        <img src="{{ asset('assets/images/blog/blog-1-3.jpg') }}" alt="">
                                    </div>
                                    <div class="blog-one__date">
                                        <p>12</p>
                                        <span>Sep</span>
                                    </div>
                                    <ul class="list-unstyled blog-one__tag">
                                        <li><a href="{{ route('blog-details') }}">Dermatology</a></li>
                                        <li><a href="{{ route('blog-details') }}">Obstetrics &amp; Gynecology</a></li>
                                    </ul>
                                </div>
                                <div class="blog-one__content">
                                    <h3 class="blog-one__title"><a href="{{ route('blog-details') }}">Patient Images:
                                        Dermatology and OB/GYN Submission Checklist</a></h3>
                                    <p class="blog-one__text">Prepare images, consent statements, and captions to reduce revisions.</p>
                                </div>
                            </div>
                        </div>
                        <!--Blog One Single End-->
                        <!--Blog One Single Start-->
                        <div class="item" data-wow-duration="1500ms">
                            <div class="blog-one__single">
                                <div class="blog-one__content blog-one__content--two">
                                    <h3 class="blog-one__title"><a href="{{ route('blog-details') }}">Sensitive Data:
                                        Psychiatry and Urology Research Ethics</a></h3>
                                    <p class="blog-one__text">Consent, confidentiality, and responsible reporting essentials.</p>
                                </div>
                                <div class="blog-one__img-box">
                                    <div class="blog-one__img">
                                        <img src="{{ asset('assets/images/blog/blog-1-4.jpg') }}" alt="">
                                    </div>
                                    <div class="blog-one__date">
                                        <p>30</p>
                                        <span>DEC</span>
                                    </div>
                                    <ul class="list-unstyled blog-one__tag">
                                        <li><a href="{{ route('blog-details') }}">Psychiatry and Mental Health</a></li>
                                        <li><a href="{{ route('blog-details') }}">Urology</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--Blog One Single End-->
                        <!--Blog One Single Start-->
                        <div class="item" data-wow-duration="1500ms">
                            <div class="blog-one__single">
                                <div class="blog-one__img-box">
                                    <div class="blog-one__img">
                                        <img src="{{ asset('assets/images/blog/blog-1-5.jpg') }}" alt="">
                                    </div>
                                    <div class="blog-one__date">
                                        <p>06</p>
                                        <span>Mar</span>
                                    </div>
                                    <ul class="list-unstyled blog-one__tag">
                                        <li><a href="{{ route('blog-details') }}">Cardiology and Cardiovascular Medicine</a></li>
                                        <li><a href="{{ route('blog-details') }}">Neurosurgery</a></li>
                                    </ul>
                                </div>
                                <div class="blog-one__content">
                                    <h3 class="blog-one__title"><a href="{{ route('blog-details') }}">Clinical Trials:
                                        Registration &amp; Reporting Essentials</a></h3>
                                    <p class="blog-one__text">Align trial IDs, endpoints, and flow diagrams before submitting.</p>
                                </div>
                            </div>
                        </div>
                        <!--Blog One Single End-->
                        <!--Blog One Single Start-->
                        <div class="item" data-wow-duration="1500ms">
                            <div class="blog-one__single">
                                <div class="blog-one__content blog-one__content--two">
                                    <h3 class="blog-one__title"><a href="{{ route('blog-details') }}">Systematic Reviews:
                                        PRISMA Essentials for Submission</a></h3>
                                    <p class="blog-one__text">Search strategy, selection flow, and bias assessment made clear.</p>
                                </div>
                                <div class="blog-one__img-box">
                                    <div class="blog-one__img">
                                        <img src="{{ asset('assets/images/blog/blog-1-6.jpg') }}" alt="">
                                    </div>
                                    <div class="blog-one__date">
                                        <p>20</p>
                                        <span>Sep</span>
                                    </div>
                                    <ul class="list-unstyled blog-one__tag">
                                        <li><a href="{{ route('blog-details') }}">Internal Medicine</a></li>
                                        <li><a href="{{ route('blog-details') }}">Dermatology</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--Blog One Single End-->
                        <!--Blog One Single Start-->
                        <div class="item" data-wow-duration="1500ms">
                            <div class="blog-one__single">
                                <div class="blog-one__img-box">
                                    <div class="blog-one__img">
                                        <img src="{{ asset('assets/images/blog/blog-1-7.jpg') }}" alt="">
                                    </div>
                                    <div class="blog-one__date">
                                        <p>12</p>
                                        <span>Oct</span>
                                    </div>
                                    <ul class="list-unstyled blog-one__tag">
                                        <li><a href="{{ route('blog-details') }}">Orthopedics and Sports Medicine</a></li>
                                        <li><a href="{{ route('blog-details') }}">Urology</a></li>
                                    </ul>
                                </div>
                                <div class="blog-one__content">
                                    <h3 class="blog-one__title"><a href="{{ route('blog-details') }}">Outcomes &amp; Follow-up:
                                        Sports Medicine and Urology Manuscripts</a></h3>
                                    <p class="blog-one__text">Define outcomes and report follow-up periods consistently.</p>
                                </div>
                            </div>
                        </div>
                        <!--Blog One Single End-->
                        <!--Blog One Single Start-->
                        <div class="item" data-wow-duration="1500ms">
                            <div class="blog-one__single">
                                <div class="blog-one__content blog-one__content--two">
                                <h3 class="blog-one__title"><a href="{{ route('blog-details') }}">Transparent Reporting:
                                    OB/GYN &amp; Mental Health Research Essentials</a></h3>
                                <p class="blog-one__text">A checklist to reduce revisions and improve clarity for reviewers.</p>
                                </div>
                                <div class="blog-one__img-box">
                                    <div class="blog-one__img">
                                        <img src="{{ asset('assets/images/blog/blog-1-8.jpg') }}" alt="">
                                    </div>
                                    <div class="blog-one__date">
                                        <p>12</p>
                                        <span>DEC</span>
                                    </div>
                                    <ul class="list-unstyled blog-one__tag">
                                        <li><a href="{{ route('blog-details') }}">Obstetrics &amp; Gynecology</a></li>
                                        <li><a href="{{ route('blog-details') }}">Psychiatry and Mental Health</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--Blog One Single End-->
                        <!--Blog One Single Start-->
                        <div class="item" data-wow-duration="1500ms">
                            <div class="blog-one__single">
                                <div class="blog-one__content blog-one__content--two">
                                <h3 class="blog-one__title"><a href="{{ route('blog-details') }}">Editorial Check Before Submission:
                                    What to Verify</a></h3>
                                <p class="blog-one__text">Scope fit, disclosures, references, and file completeness in one pass.</p>
                                </div>
                                <div class="blog-one__img-box">
                                    <div class="blog-one__img">
                                        <img src="{{ asset('assets/images/blog/blog-1-2.jpg') }}" alt="">
                                    </div>
                                    <div class="blog-one__date">
                                        <p>24</p>
                                        <span>APR</span>
                                    </div>
                                    <ul class="list-unstyled blog-one__tag">
                                        <li><a href="{{ route('blog-details') }}">Cardiology and Cardiovascular Medicine</a></li>
                                        <li><a href="{{ route('blog-details') }}">Internal Medicine</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--Blog One Single End-->
                    </div>
                </div>
            </div>
        </section>
        <!--Blog Carousel page End-->

    <x-strickyHeader />
    <x-footer2 />
    <x-mobileMenu />
    <x-searchPopup />
    <x-scroll-to-top />
@endsection