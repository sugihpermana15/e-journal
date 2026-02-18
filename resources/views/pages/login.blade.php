@extends('layouts.breadcrumbs')
@section('title', 'Login || Freshflow || Freshflow Laravel Template')
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/module-css/shop.css')}}"/>
@endpush
@php
    $bodyClass = 'custom-cursor';
    $title = ' Login ';
    $subtitle = ' Login to your account ';
@endphp
@section('content')
            <!--Start Login One-->
            <section class="login-one">
                <div class="container">
                    <div class="login-one__form">
                        <div class="inner-title text-center">
                            <h2>Login Here</h2>
                        </div>
                        <form id="login-one__form" name="Login-one_form" action="#" method="post">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <div class="input-box">
                                            <input type="email" name="form_email" id="formEmail" placeholder="Email..."
                                                required="" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <div class="input-box">
                                            <input type="text" name="form_password" id="formPassword"
                                                placeholder="Password..." required="" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <button class="thm-btn" type="submit" data-loading-text="Please wait...">Login
                                            Here<span><i class="icon-diagonal-arrow"></i></span></button>
                                    </div>
                                </div>
                                <div class="remember-forget">
                                    <div class="checked-box1">
                                        <input type="checkbox" name="saveMyInfo" id="saveinfo" checked="">
                                        <label for="saveinfo">
                                            <span></span>
                                            Remember me
                                        </label>
                                    </div>
                                    <div class="forget">
                                        <a href="#">Forget password?</a>
                                    </div>
                                </div>
    
                                <div class="create-account text-center">
                                    <p>Not registered yet? <a href="{{ route('sign-up') }}">Create an Account</a></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
            <!--End Login One-->

    <x-strickyHeader />
    <x-footer2 />
    <x-mobileMenu />
    <x-searchPopup />
    <x-scroll-to-top />
@endsection