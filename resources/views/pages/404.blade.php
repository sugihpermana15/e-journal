@extends('layouts.breadcrumbs')
@section('title', '404 Error')
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/module-css/error-page.css')}}"/>
@endpush
@php
    $bodyClass = 'custom-cursor';
    $title = '404 Error';
    $subtitle = 'Page Not Found';

@endphp
@section('content')
            <!--Error Page Start-->
        <section class="error-page">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="error-page__inner">
                            <div class="error-page__title-box">
                                <h2 class="error-page__title">404</h2>
                            </div>
                            <h3 class="error-page__tagline">Sorry we can't find that page!</h3>
                            <p class="error-page__text">The page you are looking for was never existed.</p>
                            <form class="error-page__form">
                                <div class="error-page__form-input">
                                    <input type="search" placeholder="Search here">
                                    <button type="submit"><i class="icon-search"></i></button>
                                </div>
                            </form>
                            <a href="{{route('index')}}" class="thm-btn error-page__btn">Back to home<span><i

                                        class="icon-diagonal-arrow"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Error Page End-->

    <x-strickyHeader />
    <x-footer2 />
    <x-mobileMenu />
    <x-searchPopup />
    <x-scroll-to-top />
@endsection
