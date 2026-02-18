@extends('layouts.breadcrumbs')
@section('title', ($category['label'] ?? 'Blog Category') . ' || Med Open Press')
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/module-css/blog.css')}}"/>
@endpush
@php
    $bodyClass = 'custom-cursor';
    $title = $category['label'] ?? 'Blog Category';
    $subtitle = $category['label'] ?? 'Blog Details';
@endphp

@section('content')
    <section class="blog-details">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="blog-details__left">
                        <div class="blog-details__img">
                            <img src="{{ asset($category['hero'] ?? 'assets/images/blog/blog-details-img-1.jpg') }}" alt="">
                        </div>

                        <div class="blog-details__content">
                            <h3 class="blog-details__title">{{ $category['label'] ?? 'Blog Category' }}</h3>

                            <ul class="blog-details__meta-list list-unstyled">
                                <li>
                                    <div class="blog-details__meta-img">
                                        <img src="{{ asset('assets/images/blog/blog-details-meta-client-img-1.jpg') }}" alt="">
                                    </div>
                                    <div class="content">
                                        <span>Post By</span>
                                        <h5>{{ $category['author'] ?? 'Med Open Press' }}</h5>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <span class="icon-calendar"></span>
                                    </div>
                                    <div class="content">
                                        <span>Published</span>
                                        <h5>{{ $category['published'] ?? 'February 2026' }}</h5>
                                    </div>
                                </li>
                            </ul>

                            @includeIf('pages.blog.categories.' . $categoryKey)

                            @if(($categoryPostsCount ?? 0) === 0)
                                <p class="blog-details__text-1">Belum ada artikel untuk kategori ini. Konten akan tampil setelah admin menambahkan postingan.</p>
                            @endif

                            <div class="blog-details__tag-and-social">
                                <div class="blog-details__tag">
                                    <p>Tags:</p>
                                    <div class="blog-details__tag-list">
                                        @php
                                            $tags = $category['tags'] ?? [];
                                        @endphp
                                        @forelse($tags as $index => $tag)
                                            <a href="#">{{ $tag }}</a>
                                            @if($index !== count($tags) - 1)
                                                <span>//</span>
                                            @endif
                                        @empty
                                            <a href="#">Med Open Press</a>
                                        @endforelse
                                    </div>
                                </div>
                                <div class="blog-details__social">
                                    <p>Share:</p>
                                    <div class="blog-details__social-list">
                                        <a href="#"><span class="icon-pinterest"></span></a>
                                        <a href="#"><span class="icon-linkedin-big-logo"></span></a>
                                        <a href="#"><span class="icon-instagram"></span></a>
                                        <a href="#"><span class="icon-facebook-app-symbol"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-5">
                    <div class="blog-details__right">
                        <div class="sidebar">
                            <div class="sidebar__single sidebar__all-category">
                                <div class="sidebar__title-box">
                                    <div class="sidebar__title-shape"></div>
                                    <div class="sidebar__title-shape-2"></div>
                                    <h3 class="sidebar__title">Category</h3>
                                </div>
                                <ul class="sidebar__all-category-list list-unstyled">
                                    @php
                                        $sidebarCategories = $sidebarCategories ?? collect();
                                    @endphp
                                    @forelse($sidebarCategories as $cat)
                                        <li><a href="{{ route('blog-category', ['category' => $cat->slug]) }}">{{ $cat->name }}</a></li>
                                    @empty
                                        <li><a href="#">Belum ada kategori</a></li>
                                    @endforelse
                                </ul>
                            </div>

                            <div class="sidebar__single sidebar__post">
                                <div class="sidebar__title-box">
                                    <div class="sidebar__title-shape"></div>
                                    <div class="sidebar__title-shape-2"></div>
                                    <h3 class="sidebar__title">Recent Post</h3>
                                </div>
                                <ul class="sidebar__post-list list-unstyled">
                                    <li>
                                        <div class="sidebar__post-image">
                                            <img src="{{ asset('assets/images/blog/lp-1-1.jpg') }}" alt="">
                                        </div>
                                        <div class="sidebar__post-content">
                                            <h3><a href="{{ route('blog-category', ['category' => 'cardiology']) }}">Cardiology</a></h3>
                                            <p class="sidebar__post-date"><span class="icon-calendar"></span>February 2026</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="sidebar__post-image">
                                            <img src="{{ asset('assets/images/blog/lp-1-2.jpg') }}" alt="">
                                        </div>
                                        <div class="sidebar__post-content">
                                            <h3><a href="{{ route('blog-category', ['category' => 'orthopedics']) }}">Orthopedics</a></h3>
                                            <p class="sidebar__post-date"><span class="icon-calendar"></span>February 2026</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="sidebar__post-image">
                                            <img src="{{ asset('assets/images/blog/lp-1-3.jpg') }}" alt="">
                                        </div>
                                        <div class="sidebar__post-content">
                                            <h3><a href="{{ route('blog-category', ['category' => 'internal-medicine']) }}">Internal Medicine</a></h3>
                                            <p class="sidebar__post-date"><span class="icon-calendar"></span>February 2026</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
