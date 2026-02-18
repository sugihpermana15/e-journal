@extends('layouts.breadcrumbs')
@section('title', 'Faq')
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/module-css/faq.css') }}"/>
@endpush
@php
    $bodyClass = 'custom-cursor';
    $title = ' Faq';
    $subtitle = 'Faq ';
@endphp
@section('content')
    <!--Faq Page Start-->
        <section class="faq-one faq-page">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="faq-page__single">
                            <div class="accrodion-grp" data-grp-name="faq-one-accrodion">
                                <div class="accrodion">
                                    <div class="accrodion-title">
                                        <h4>What types of cleaning services do you offer?</h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                            <p>Yes, we use eco-friendly and non-toxic cleaning products to ensure safety
                                                for your family, pets, and the environment. You can schedule a cleaning
                                                by calling us, booking online, or using our mobile app for flexible and
                                                convenient scheduling.
                                            </p>
                                        </div><!-- /.inner -->
                                    </div>
                                </div>
                                <div class="accrodion active">
                                    <div class="accrodion-title">
                                        <h4>Are your cleaning products eco-friendly?</h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                            <p>Yes, we use eco-friendly and non-toxic cleaning products to ensure safety
                                                for your family, pets, and the environment. You can schedule a cleaning
                                                by calling us, booking online, or using our mobile app for flexible and
                                                convenient scheduling.
                                            </p>
                                        </div><!-- /.inner -->
                                    </div>
                                </div>
                                <div class="accrodion">
                                    <div class="accrodion-title">
                                        <h4>Do I need to be home during the cleaning service?</h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                            <p>Yes, we use eco-friendly and non-toxic cleaning products to ensure safety
                                                for your family, pets, and the environment. You can schedule a cleaning
                                                by calling us, booking online, or using our mobile app for flexible and
                                                convenient scheduling.
                                            </p>
                                        </div><!-- /.inner -->
                                    </div>
                                </div>
                                <div class="accrodion">
                                    <div class="accrodion-title">
                                        <h4>What if I’m not satisfied with the cleaning service?</h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                            <p>Yes, we use eco-friendly and non-toxic cleaning products to ensure safety
                                                for your family, pets, and the environment. You can schedule a cleaning
                                                by calling us, booking online, or using our mobile app for flexible and
                                                convenient scheduling.
                                            </p>
                                        </div><!-- /.inner -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="faq-page__single">
                            <div class="accrodion-grp" data-grp-name="faq-one-accrodion">
                                <div class="accrodion">
                                    <div class="accrodion-title">
                                        <h4>What types of cleaning services do you offer?</h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                            <p>Yes, we use eco-friendly and non-toxic cleaning products to ensure safety
                                                for your family, pets, and the environment. You can schedule a cleaning
                                                by calling us, booking online, or using our mobile app for flexible and
                                                convenient scheduling.
                                            </p>
                                        </div><!-- /.inner -->
                                    </div>
                                </div>
                                <div class="accrodion">
                                    <div class="accrodion-title">
                                        <h4>Are your cleaning products eco-friendly?</h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                            <p>Yes, we use eco-friendly and non-toxic cleaning products to ensure safety
                                                for your family, pets, and the environment. You can schedule a cleaning
                                                by calling us, booking online, or using our mobile app for flexible and
                                                convenient scheduling.
                                            </p>
                                        </div><!-- /.inner -->
                                    </div>
                                </div>
                                <div class="accrodion">
                                    <div class="accrodion-title">
                                        <h4>Do I need to be home during the cleaning service?</h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                            <p>Yes, we use eco-friendly and non-toxic cleaning products to ensure safety
                                                for your family, pets, and the environment. You can schedule a cleaning
                                                by calling us, booking online, or using our mobile app for flexible and
                                                convenient scheduling.
                                            </p>
                                        </div><!-- /.inner -->
                                    </div>
                                </div>
                                <div class="accrodion">
                                    <div class="accrodion-title">
                                        <h4>What if I’m not satisfied with the cleaning service?</h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                            <p>Yes, we use eco-friendly and non-toxic cleaning products to ensure safety
                                                for your family, pets, and the environment. You can schedule a cleaning
                                                by calling us, booking online, or using our mobile app for flexible and
                                                convenient scheduling.
                                            </p>
                                        </div><!-- /.inner -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Faq Page End-->

    <x-strickyHeader />
    <x-footer2 />
    <x-mobileMenu />
    <x-searchPopup />
    <x-scroll-to-top />
@endsection