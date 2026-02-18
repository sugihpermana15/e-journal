@extends('layouts.breadcrumbs')
@section('title', 'Wishlist || Freshflow || Freshflow Laravel Template')
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/module-css/shop.css')}}"/>
@endpush
@php
    $bodyClass = 'custom-cursor';
    $title = 'Wishlist';
    $subtitle = 'Wishlist';
@endphp
@section('content')
                   <!--Start Wishlist Page-->
        <section class="wishlist-page">
            <div class="container">
                <div class="table-responsive">
                    <table class="table wishlist-table">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Unit Price</th>
                                <th>Stock Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>
                                    <div class="product-box">
                                        <div class="cross-icon">
                                            <a href="{{ route('wishlist') }}"><i class="fas fa-times"></i></a>
                                        </div>
                                        <div class="img-box">
                                            <img src="{{ asset('assets/images/shop/wishlist-page-img-1.jpg') }}" alt="">
                                        </div>
                                        <h3><a href="{{ route('product-details') }}">bucket cleaning</a></h3>
                                    </div>
                                </td>
                                <td>$120.99</td>
                                <td>In Stock</td>
                                <td>
                                    <div class="product-select">
                                        <a class="thm-btn wishlist-page__btn" href="{{ route('wishlist') }}">
                                            Select Product
                                            <span><i class="icon-diagonal-arrow"></i></span>
                                        </a>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="product-box">
                                        <div class="cross-icon">
                                            <a href="{{ route('wishlist') }}"><i class="fas fa-times"></i></a>
                                        </div>
                                        <div class="img-box">
                                            <img src="{{ asset('assets/images/shop/wishlist-page-img-2.jpg') }}" alt="">
                                        </div>
                                        <h3><a href="{{ route('product-details') }}">Dalli Activ Cleaner</a></h3>
                                    </div>
                                </td>
                                <td>$100.99</td>
                                <td>In Stock</td>
                                <td>
                                    <div class="product-select">
                                        <a class="thm-btn wishlist-page__btn" href="{{ route('wishlist') }}">
                                            Select Product
                                            <span><i class="icon-diagonal-arrow"></i></span>
                                        </a>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="product-box">
                                        <div class="cross-icon">
                                            <a href="{{ route('wishlist') }}"><i class="fas fa-times"></i></a>
                                        </div>
                                        <div class="img-box">
                                            <img src="{{ asset('assets/images/shop/wishlist-page-img-3.jpg') }}" alt="">
                                        </div>
                                        <h3><a href="{{ route('product-details') }}">White Detergent</a></h3>
                                    </div>
                                </td>
                                <td>$106.99</td>
                                <td>In Stock</td>
                                <td>
                                    <div class="product-select">
                                        <a class="thm-btn wishlist-page__btn" href="{{ route('wishlist') }}">
                                            Select Product
                                            <span><i class="icon-diagonal-arrow"></i></span>
                                        </a>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="product-box">
                                        <div class="cross-icon">
                                            <a href="{{ route('wishlist') }}"><i class="fas fa-times"></i></a>
                                        </div>
                                        <div class="img-box">
                                            <img src="{{ asset('assets/images/shop/wishlist-page-img-4.jpg') }}" alt="">
                                        </div>
                                        <h3><a href="{{ route('product-details') }}">xtra Window Cleaner</a></h3>
                                    </div>
                                </td>
                                <td>$170.00</td>
                                <td>In Stock</td>
                                <td>
                                    <div class="product-select">
                                        <a class="thm-btn wishlist-page__btn" href="{{ route('wishlist') }}">
                                            Select Product
                                            <span><i class="icon-diagonal-arrow"></i></span>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="product-details__social two">
                    <div class="title">
                        <h3>Share with friends:</h3>
                    </div>
                    <div class="product-details__social-link">
                        <a href="#"><span class="fab fa-twitter"></span></a>
                        <a href="#"><span class="fab fa-facebook"></span></a>
                        <a href="#"><span class="fab fa-pinterest-p"></span></a>
                        <a href="#"><span class="fab fa-instagram"></span></a>
                    </div>
                </div>
            </div>
        </section>
        <!--End Wishlist Page-->

    <x-strickyHeader />
    <x-footer2 />
    <x-mobileMenu />
    <x-searchPopup />
    <x-scroll-to-top />
@endsection