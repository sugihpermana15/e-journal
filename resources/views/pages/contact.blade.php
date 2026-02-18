@extends('layouts.breadcrumbs')
@section('title', 'Contact || Freshflow || Freshflow Laravel Template')
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/module-css/contact.css')}}"/>
<link rel="stylesheet" href="{{ asset('assets/css/module-css/google-map.css') }}" />
@endpush
@php
    $bodyClass = 'custom-cursor';
    $title = 'Contact Us';
    $subtitle = 'Contact Us';

    $home = (array) ($homeSettings ?? []);
    $contactCta = (array) data_get($home, 'contact', []);
    $contactPage = (array) data_get($home, 'contact_page', []);

    $leftTagline = (string) data_get($contactPage, 'left_tagline', 'Get In touch');
    $leftTitleHtml = (string) data_get($contactPage, 'left_title_html', 'Reach Out to <span>Us for </span> <br><span>Assistance or Inquiries</span>');
    $leftText = (string) data_get($contactPage, 'left_text', "We're Here to Help—Contact Us Today!");

    $addressTitle = (string) data_get($contactPage, 'address_title', 'Our Address');
    $addressHtml = (string) data_get($contactPage, 'address_html', '567 Oak Avenue, Apartment 910,<br> Chicago, IL 60601, USA');

    $contactInfoTitle = (string) data_get($contactPage, 'contact_info_title', 'Contact Info');
    $phone = (string) data_get($contactPage, 'phone', '+62 897 1399 093');
    $phoneTel = preg_replace('/[^0-9+]/', '', $phone);
    $email = (string) data_get($contactPage, 'email', 'info@domain.com');

    $workingTimeTitle = (string) data_get($contactPage, 'working_time_title', 'Working Time');
    $timeLabel = (string) data_get($contactPage, 'time_label', 'Time:');
    $timeValue = (string) data_get($contactPage, 'time_value', '10:00 AM - 6:00 PM');
    $daysLabel = (string) data_get($contactPage, 'days_label', 'Days:');
    $daysValue = (string) data_get($contactPage, 'days_value', 'Monday - Friday');

    $rightTagline = (string) data_get($contactPage, 'right_tagline', 'Contact US');
    $rightTitle = (string) data_get($contactPage, 'right_title', 'Send Message');

    $namePlaceholder = (string) data_get($contactCta, 'name_placeholder', 'Name*');
    $emailPlaceholder = (string) data_get($contactCta, 'email_placeholder', 'Email*');
    $subjectPlaceholder = (string) data_get($contactCta, 'subject_placeholder', 'Subject*');
    $messagePlaceholder = (string) data_get($contactCta, 'message_placeholder', 'Write a your Message');
    $buttonText = (string) data_get($contactCta, 'button_text', 'Send Message');
@endphp
@section('content')
    <x-strickyHeader />

    <!--Contact Four Start-->
    <section class="contact-four">
        <div class="contact-four__shape-1 img-bounce">
            <img src="{{ asset('assets/images/shapes/contact-four-shape-1.png') }}" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-5">
                    <div class="contact-four__left">
                        <div class="section-title text-left sec-title-animation animation-style2">
                            <div class="section-title__tagline-box">
                                <div class="section-title__tagline-shape-box">
                                    <div class="section-title__tagline-shape"></div>
                                    <div class="section-title__tagline-shape-2"></div>
                                </div>
                                <span class="section-title__tagline">{{ $leftTagline }}</span>
                            </div>
                            <h2 class="section-title__title title-animation">{!! $leftTitleHtml !!}</h2>
                        </div>
                        <p class="contact-four__left-text">{{ $leftText }}</p>
                        <ul class="contact-four__contact-list list-unstyled">
                            <li>
                                <div class="icon">
                                    <span class="fas fa-map-marker-alt"></span>
                                </div>
                                <div class="content">
                                    <h5>{{ $addressTitle }}</h5>
                                    <p>{!! $addressHtml !!}</p>
                                </div>
                            </li>
                            <li>
                                <div class="contact-four__contact-list-shape-1">
                                    <img src="{{ asset('assets/images/shapes/contact-four-contact-list-shape-1.png') }}" alt="">
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <span class="far fa-clock"></span>
                                </div>
                                <div class="content">
                                    <h5>{{ $contactInfoTitle }}</h5>
                                    <p><span>Phone:</span> <a href="tel:{{ $phoneTel }}">{{ $phone }}</a></p>
                                    <p><span>Email:</span> <a href="mailto:{{ $email }}">{{ $email }}</a></p>
                                </div>
                            </li>
                            <li>
                                <div class="contact-four__contact-list-shape-1">
                                    <img src="{{ asset('assets/images/shapes/contact-four-contact-list-shape-1.png') }}" alt="">
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <span class="fas fa-map-marker-alt"></span>
                                </div>
                                <div class="content">
                                    <h5>{{ $workingTimeTitle }}</h5>
                                    <p><span>{{ $timeLabel }}</span> {{ $timeValue }}</p>
                                    <p><span>{{ $daysLabel }}</span> {{ $daysValue }}</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-7">
                    <div class="contact-four__right">
                        <div class="section-title text-left sec-title-animation animation-style2">
                            <div class="section-title__tagline-box">
                                <div class="section-title__tagline-shape-box">
                                    <div class="section-title__tagline-shape"></div>
                                    <div class="section-title__tagline-shape-2"></div>
                                </div>
                                <span class="section-title__tagline">{{ $rightTagline }}</span>
                            </div>
                            <h2 class="section-title__title title-animation">{{ $rightTitle }}</h2>
                        </div>
                        <form class="contact-form-validated contact-four__form" action="#"
                            method="post" novalidate="novalidate">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6">
                                    <h4 class="contact-four__input-title">Full Name *</h4>
                                    <div class="contact-four__input-box">
                                        <input type="text" name="name" placeholder="{{ $namePlaceholder }}" required="">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <h4 class="contact-four__input-title">Your Email *</h4>
                                    <div class="contact-four__input-box">
                                        <input type="email" name="email" placeholder="{{ $emailPlaceholder }}" required="">
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <h4 class="contact-four__input-title">Subjects *</h4>
                                    <div class="contact-four__input-box">
                                        <input type="text" name="Phone" placeholder="{{ $subjectPlaceholder }}"
                                            required="">
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <h4 class="contact-four__input-title">Write message *</h4>
                                    <div class="contact-four__input-box text-message-box">
                                        <textarea name="message" placeholder="{{ $messagePlaceholder }}"></textarea>
                                    </div>
                                    <div class="contact-four__btn-box">
                                        <button type="submit" class="thm-btn">{{ $buttonText }}<span><i class="icon-diagonal-arrow"></i></span></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="result"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Contact Four End-->

    <x-footer2 />
    <x-mobileMenu />
    <x-searchPopup />
    <x-scroll-to-top />
@endsection
