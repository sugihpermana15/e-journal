@extends('layouts.breadcrumbs')
@section('title', ($category['label'] ?? 'Scientific News Category'))
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/module-css/blog.css') }}?v={{ filemtime(public_path('assets/css/module-css/blog.css')) }}"/>
@endpush
@php
    $bodyClass = 'custom-cursor';
    $title = $category['label'] ?? 'Scientific News Category';
    $subtitle = $category['label'] ?? 'Scientific News';
@endphp

@section('content')
    <section class="blog-details">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="blog-details__left">
                        <div class="blog-details__content">
                            <h3 class="blog-details__title">{{ $category['label'] ?? 'Scientific News Category' }}</h3>

                            <ul class="blog-details__meta-list list-unstyled">
                                <li>
                                    <div class="blog-details__meta-img">
                                        <img src="{{ asset('assets/images/resources/logoMed.png') }}" alt="Med Open Press" style="width: 100%; height: 100%; object-fit: contain;">
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

                            @php
                                $categoryPosts = $categoryPosts ?? null;
                            @endphp

                            @if($categoryPosts && $categoryPosts->count())
                                <div class="blog-one__bottom" style="margin-top: 40px;">
                                    <div class="row">
                                        @foreach($categoryPosts as $i => $post)
                                            @php
                                                $img = (string) data_get($post, 'image', 'assets/images/blog/blog-1-1.jpg');
                                                $link = (string) data_get($post, 'link_url', route('blog-details'));
                                                $day = (string) data_get($post, 'day', '01');
                                                $month = (string) data_get($post, 'month', 'JAN');
                                                $text = (string) data_get($post, 'excerpt', '');
                                                $postTitle = (string) data_get($post, 'title', '');
                                                $tagLabel = (string) data_get($category ?? [], 'label', '');
                                                $isAlt = ((int) $i) % 2 === 1;
                                            @endphp
                                            <div class="col-xl-6 col-lg-6 col-md-6" style="margin-bottom: 30px;">
                                                <div class="blog-one__single">
                                                    @if(!$isAlt)
                                                        <div class="blog-one__img-box">
                                                            <div class="blog-one__img">
                                                                <img src="{{ asset($img) }}" alt="{{ e($postTitle) }}">
                                                            </div>
                                                            <div class="blog-one__date">
                                                                <p>{{ $day }}</p>
                                                                <span>{{ $month }}</span>
                                                            </div>
                                                            @if($tagLabel !== '')
                                                                <ul class="list-unstyled blog-one__tag">
                                                                    <li><a href="{{ route('blog-category', ['category' => $categoryKey]) }}">{{ $tagLabel }}</a></li>
                                                                </ul>
                                                            @endif
                                                        </div>
                                                        <div class="blog-one__content">
                                                            <h3 class="blog-one__title"><a href="{{ $link }}">{{ $postTitle }}</a></h3>
                                                            @if(trim($text) !== '')
                                                                <p class="blog-one__text">{{ $text }}</p>
                                                            @endif
                                                        </div>
                                                    @else
                                                        <div class="blog-one__content blog-one__content--two">
                                                            <h3 class="blog-one__title"><a href="{{ $link }}">{{ $postTitle }}</a></h3>
                                                            @if(trim($text) !== '')
                                                                <p class="blog-one__text">{{ $text }}</p>
                                                            @endif
                                                        </div>
                                                        <div class="blog-one__img-box">
                                                            <div class="blog-one__img">
                                                                <img src="{{ asset($img) }}" alt="{{ e($postTitle) }}">
                                                            </div>
                                                            <div class="blog-one__date">
                                                                <p>{{ $day }}</p>
                                                                <span>{{ $month }}</span>
                                                            </div>
                                                            @if($tagLabel !== '')
                                                                <ul class="list-unstyled blog-one__tag">
                                                                    <li><a href="{{ route('blog-category', ['category' => $categoryKey]) }}">{{ $tagLabel }}</a></li>
                                                                </ul>
                                                            @endif
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                    @if($categoryPosts->lastPage() > 1)
                                        <div class="blog-list__pagination" style="padding-top: 10px;">
                                            <ul class="pg-pagination list-unstyled">
                                                <li class="prev">
                                                    <a href="{{ $categoryPosts->previousPageUrl() ?? $categoryPosts->url(1) }}" aria-label="prev"><i class="fas fa-arrow-left"></i></a>
                                                </li>
                                                @for($page = 1; $page <= $categoryPosts->lastPage(); $page++)
                                                    <li class="count {{ $page === $categoryPosts->currentPage() ? 'active' : '' }}"><a href="{{ $categoryPosts->url($page) }}">{{ str_pad((string)$page, 2, '0', STR_PAD_LEFT) }}</a></li>
                                                @endfor
                                                <li class="next">
                                                    <a href="{{ $categoryPosts->nextPageUrl() ?? $categoryPosts->url($categoryPosts->lastPage()) }}" aria-label="Next"><i class="fas fa-arrow-right"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                            @endif
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
                                    @php
                                        $recentPosts = array_slice((array) ($posts ?? []), 0, 3);
                                    @endphp

                                    @forelse($recentPosts as $post)
                                        @php
                                            $url = trim((string) data_get($post, 'link_url', ''));
                                            if ($url === '') {
                                                $category = trim((string) data_get($post, 'category', ''));
                                                $url = $category !== ''
                                                    ? route('blog-category', ['category' => $category])
                                                    : route('blog-details');
                                            }

                                            $image = (string) data_get($post, 'image', 'assets/images/resources/logoMed.png');
                                            $title = (string) data_get($post, 'title', '');
                                            $published = (string) data_get($post, 'published', '');
                                        @endphp
                                        <li>
                                            <div class="sidebar__post-image">
                                                <img src="{{ asset($image) }}" alt="{{ e($title) }}">
                                            </div>
                                            <div class="sidebar__post-content">
                                                <h3>
                                                    <a href="{{ $url }}">{{ $title }}</a>
                                                </h3>
                                                <p class="sidebar__post-date"><span class="icon-calendar"></span>{{ $published }}</p>
                                            </div>
                                        </li>
                                    @empty
                                        <li>
                                            <div class="sidebar__post-image">
                                                <img src="{{ asset('assets/images/resources/logoMed.png') }}" alt="Med Open Press">
                                            </div>
                                            <div class="sidebar__post-content">
                                                <h3>
                                                    <a href="#">Belum ada postingan</a>
                                                </h3>
                                                <p class="sidebar__post-date"><span class="icon-calendar"></span>—</p>
                                            </div>
                                        </li>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <x-footer2 />
@endsection
