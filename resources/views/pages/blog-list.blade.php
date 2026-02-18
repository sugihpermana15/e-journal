@extends('layouts.breadcrumbs')
@section('title', 'Blog List || Med Open Press')
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/module-css/blog.css')}}"/>
@endpush
@php
    $bodyClass = 'custom-cursor';
    $title = 'Blog';
    $subtitle = 'Blog';
    $home = (array) ($homeSettings ?? []);
    $blogSidebar = (array) data_get($home, 'blog_sidebar', []);
    $blogSidebarSearch = (array) data_get($blogSidebar, 'search', []);
    $blogSidebarKeywords = (array) data_get($blogSidebar, 'keywords', []);
    $blogSidebarSubscribe = (array) data_get($blogSidebar, 'subscribe', []);

    $sidebarCategories = $sidebarCategories ?? collect();
@endphp
@section('content')
           <!--Blog List Start-->
           <section class="blog-list">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-7">
                        <div class="blog-list__left">
                            @php
                                $posts = $posts ?? null;
                            @endphp
                            @if($posts && $posts->count())
                                @foreach($posts as $post)
                                    @php
                                        $postUrl = $post['link_url']
                                            ?? (isset($post['category'])
                                                ? route('blog-category', ['category' => $post['category']])
                                                : route('blog-details'));
                                    @endphp
                                    <!--Blog List Single Start-->
                                    <div class="blog-list__single {{ ($post['variant'] ?? 'with-image') === 'no-image' ? 'blog-list__single-3' : '' }}">
                                        @if(($post['variant'] ?? 'with-image') !== 'no-image')
                                            <div class="blog-list__img-box">
                                                <div class="blog-list__img">
                                                    <img src="{{ asset($post['image']) }}" alt="">
                                                </div>
                                                <div class="blog-list__meta-and-tag">
                                                    <ul class="blog-list__meta list-unstyled">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-calendar"></span>
                                                            </div>
                                                            <p>{{ $post['published'] }}</p>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-bubble-chat"></span>
                                                            </div>
                                                            <p>{{ $post['comments'] }}</p>
                                                        </li>
                                                    </ul>
                                                    <div class="blog-list__tag">
                                                        @foreach(($post['tags'] ?? []) as $tag)
                                                            <a href="#">#{{ str_replace(' ', '', $tag) }}</a>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        <div class="blog-list__content">
                                            <h3 class="blog-list__title"><a href="{{ $postUrl }}">{{ $post['title'] }}</a></h3>
                                            <p class="blog-list__text">{{ $post['excerpt'] }}</p>
                                            <div class="blog-list__btn-and-client-info">
                                                <div class="blog-list__btn-box">
                                                    <a href="{{ $postUrl }}" class="thm-btn">Learn More<span><i
                                                                class="icon-diagonal-arrow"></i></span></a>
                                                </div>
                                                <div class="blog-list__client-info">
                                                    <div class="blog-list__client-img">
                                                        <img src="{{ asset($post['author_image']) }}" alt="">
                                                    </div>
                                                    <div class="blog-list__client-content">
                                                        <span>Post By</span>
                                                        <p>{{ $post['author'] }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Blog List Single End-->
                                @endforeach
                            @else
                                <div class="blog-list__single">
                                    <div class="blog-list__img-box">
                                        <div class="blog-list__img">
                                            <img src="{{ asset('assets/images/blog/blog-list-1-1.jpg') }}" alt="">
                                        </div>
                                        <div class="blog-list__meta-and-tag">
                                            <ul class="blog-list__meta list-unstyled">
                                                <li>
                                                    <div class="icon">
                                                        <span class="icon-calendar"></span>
                                                    </div>
                                                    <p>—</p>
                                                </li>
                                                <li>
                                                    <div class="icon">
                                                        <span class="icon-bubble-chat"></span>
                                                    </div>
                                                    <p>0 Comments</p>
                                                </li>
                                            </ul>
                                            <div class="blog-list__tag">
                                                <a href="#">#Blog</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="blog-list__content">
                                        <h3 class="blog-list__title">Belum ada artikel</h3>
                                        <p class="blog-list__text">Konten blog akan tampil di sini setelah admin menambahkan postingan.</p>
                                        <div class="blog-list__btn-and-client-info">
                                            <div class="blog-list__btn-box">
                                                <a href="{{ route('blog-list') }}" class="thm-btn">Refresh<span><i class="icon-diagonal-arrow"></i></span></a>
                                            </div>
                                            <div class="blog-list__client-info">
                                                <div class="blog-list__client-img">
                                                    <img src="{{ asset('assets/images/blog/blog-list-client-img-1.jpg') }}" alt="">
                                                </div>
                                                <div class="blog-list__client-content">
                                                    <span>Status</span>
                                                    <p>Coming Soon</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="blog-list__pagination">
                                @if($posts && $posts->lastPage() > 1)
                                    <ul class="pg-pagination list-unstyled">
                                        <li class="prev">
                                            <a href="{{ $posts->previousPageUrl() ?? $posts->url(1) }}" aria-label="prev"><i class="fas fa-arrow-left"></i></a>
                                        </li>
                                        @for($page = 1; $page <= $posts->lastPage(); $page++)
                                            <li class="count {{ $page === $posts->currentPage() ? 'active' : '' }}"><a href="{{ $posts->url($page) }}">{{ str_pad((string)$page, 2, '0', STR_PAD_LEFT) }}</a></li>
                                        @endfor
                                        <li class="next">
                                            <a href="{{ $posts->nextPageUrl() ?? $posts->url($posts->lastPage()) }}" aria-label="Next"><i class="fas fa-arrow-right"></i></a>
                                        </li>
                                    </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="blog-details__right">
                            <div class="sidebar">
                                <div class="sidebar__single sidebar__search">
                                    <div class="sidebar__title-box">
                                        <div class="sidebar__title-shape"></div>
                                        <div class="sidebar__title-shape-2"></div>
                                           <h3 class="sidebar__title">{{ data_get($blogSidebarSearch, 'title', 'Search Blogs') }}</h3>
                                    </div>
                                       <p class="sidebar__search-text">{{ data_get($blogSidebarSearch, 'text', 'Search Explore a world of diverse blog topics to stay informed and inspired.') }}</p>
                                    <form action="#" class="sidebar__search-form">
                                           <input type="search" placeholder="{{ data_get($blogSidebarSearch, 'placeholder', 'Search here') }}">
                                        <button type="submit"><i class="icon-search"></i></button>
                                    </form>
                                </div>
                                <div class="sidebar__single sidebar__all-category">
                                    <div class="sidebar__title-box">
                                        <div class="sidebar__title-shape"></div>
                                        <div class="sidebar__title-shape-2"></div>
                                        <h3 class="sidebar__title">Category</h3>
                                    </div>
                                       <ul class="sidebar__all-category-list list-unstyled">
                                           @forelse($sidebarCategories as $cat)
                                               @php
                                                   $count = (string) ($cat->published_posts_count ?? '');
                                               @endphp
                                               <li>
                                                   <a href="{{ route('blog-category', ['category' => $cat->slug]) }}">{{ $cat->name }}
                                                       @if($count !== '')
                                                           <span>({{ $count }})</span>
                                                       @endif
                                                   </a>
                                               </li>
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
                                            $recentPosts = $posts ? collect($posts->items())->take(3) : collect();
                                        @endphp
                                        @if($recentPosts->count())
                                            @foreach($recentPosts as $recent)
                                                @php
                                                    $recentUrl = $recent['link_url']
                                                        ?? (isset($recent['category'])
                                                            ? route('blog-category', ['category' => $recent['category']])
                                                            : route('blog-details'));
                                                @endphp
                                                <li>
                                                    <div class="sidebar__post-image">
                                                        <img src="{{ asset($recent['image'] ?? 'assets/images/blog/lp-1-1.jpg') }}" alt="">
                                                    </div>
                                                    <div class="sidebar__post-content">
                                                        <h3>
                                                            <a href="{{ $recentUrl }}">{{ $recent['title'] ?? '' }}</a>
                                                        </h3>
                                                        <p class="sidebar__post-date"><span class="icon-calendar"></span>{{ $recent['published'] ?? '' }}</p>
                                                    </div>
                                                </li>
                                            @endforeach
                                        @else
                                            <li>
                                                <div class="sidebar__post-image">
                                                    <img src="{{ asset('assets/images/blog/lp-1-1.jpg') }}" alt="">
                                                </div>
                                                <div class="sidebar__post-content">
                                                    <h3>
                                                        <a href="{{ route('blog-details') }}">AI “Digital Twins” and Surgical
                                                            Rehearsals</a>
                                                    </h3>
                                                    <p class="sidebar__post-date"><span class="icon-calendar"></span>February
                                                        2026
                                                    </p>
                                                </div>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                                <div class="sidebar__single sidebar__tags">
                                    <div class="sidebar__title-box">
                                        <div class="sidebar__title-shape"></div>
                                        <div class="sidebar__title-shape-2"></div>
                                        <h3 class="sidebar__title">Keywords</h3>
                                    </div>
                                    <div class="sidebar__tags-list">
                                           @foreach($blogSidebarKeywords as $kw)
                                                       @php
                                                           $kw = trim((string) $kw);
                                                       @endphp
                                               @if($kw !== '')
                                                   <a href="#">{{ $kw }}</a>
                                               @endif
                                           @endforeach
                                    </div>
                                </div>
                                <div class="sidebar__single sidebar__subscribe">
                                    <div class="sidebar__title-box">
                                        <div class="sidebar__title-shape"></div>
                                        <div class="sidebar__title-shape-2"></div>
                                           <h3 class="sidebar__title">{{ data_get($blogSidebarSubscribe, 'title', 'Subscribe') }}</h3>
                                    </div>
                                       <p class="sidebar__subscribe-text">{{ data_get($blogSidebarSubscribe, 'text', 'Subscribe to our newsletter to get daily updates about our blogs.') }}</p>
                                    <form action="#" class="sidebar__newsletter-form">
                                        <div class="sidebar__newsletter-form-input-box">
                                            <div class="sidebar__newsletter-form-input-icon">
                                                <span class="icon-envelope"></span>
                                            </div>
                                               <input type="search" placeholder="{{ data_get($blogSidebarSubscribe, 'placeholder', 'Enter Your Email') }}">
                                        </div>
                                           <button type="submit" class="thm-btn">{{ data_get($blogSidebarSubscribe, 'button_text', 'Subscribe') }}<span><i
                                                    class="icon-send"></i></span></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Blog Details End-->
    <x-strickyHeader />
    <x-footer2 />
    <x-mobileMenu />
    <x-searchPopup />
    <x-scroll-to-top />
@endsection