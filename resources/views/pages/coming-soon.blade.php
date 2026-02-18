@extends('layouts.breadcrumbs')
@section('title', 'Coming Soon')
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/module-css/coming-soon.css')}}"/>
@endpush
@php
    $bodyClass = 'custom-cursor';
    $title = 'Coming Soon';
    $subtitle = 'We are working on it';

@endphp
@section('content')
            <!--Start Coming Soon page-->
        <section class="coming-soon-page full-height">
            <div class="coming-soon-page__bg"
                style="background-image: url({{asset('assets/images/backgrounds/coming-soon-page-bg.jpg')}});"></div>
            <div class="coming-soon-page__content">
                <div class="inner">
                    <div class="big-title">We're Coming Soon...</div>
                    <div class="timer-box clearfix">
                        <div class="countdown-timer">
                            <div class="default-coundown">
                                <div class="box">
                                    <div class="countdown coming-soon-countdown" data-countdown-time="2025/12/28">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text">
                        <p>
                            Website is under construction. We'll be here soon with new<br>
                            awesome site, Subscribe to be notified.
                        </p>
                    </div>
                    <div class="coming-soon-page__subscribe-box">
                        <form class="subscribe-form" action="#">
                            <input placeholder="Enter your email address" type="email">
                            <button type="submit" class="thm-btn coming-soon-page__btn">Send Massage<span><i
                                        class="icon-diagonal-arrow"></i></span></button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!--End Coming Soon page-->
    <x-strickyHeader />
    <x-footer2 />
    <x-mobileMenu />
    <x-searchPopup />
    <x-scroll-to-top />
@endsection
