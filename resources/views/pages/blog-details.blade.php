@extends('layouts.breadcrumbs')
@section('title', 'Scientific News Details || Med Open Press')
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/module-css/blog.css') }}?v={{ filemtime(public_path('assets/css/module-css/blog.css')) }}"/>
@endpush
@php
    $bodyClass = 'custom-cursor';
    $title = 'Scientific News Details';
    $subtitle = 'Scientific News Details';

    $home = (array) ($homeSettings ?? []);
    $blogDetail = (array) data_get($home, 'blog_detail', []);

    $blogSidebar = (array) data_get($home, 'blog_sidebar', []);
    $blogSidebarSearch = (array) data_get($blogSidebar, 'search', []);
    $sidebarCategories = $sidebarCategories ?? collect();


    $postDetail = is_array($post ?? null) ? $post : null;
    $blogDetailHero = (string) data_get($postDetail, 'hero', (string) data_get($blogDetail, 'hero', 'assets/images/blog/blog-details-img-1.jpg'));
    $blogDetailTitle = (string) data_get($postDetail, 'title', (string) data_get($blogDetail, 'title', 'Scientific News: How AI “Digital Twins” Support Surgical Planning'));
    $blogDetailAuthor = (string) data_get($postDetail, 'author', (string) data_get($blogDetail, 'author', 'Med Open Press Editorial'));
    $blogDetailPublished = (string) data_get($postDetail, 'published', (string) data_get($blogDetail, 'published', 'February 15, 2026'));
    $blogDetailAuthorImage = (string) data_get($postDetail, 'author_image', 'assets/images/blog/blog-details-meta-client-img-1.jpg');
    $blogDetailContent = (string) data_get($postDetail, 'content', '');
    $currentSlug = trim((string) data_get($postDetail, 'slug', ''));

    $contentImage = trim((string) data_get($postDetail, 'gallery_image_1', ''));
    $contentImageCaption = trim((string) data_get($postDetail, 'gallery_image_1_caption', ''));

    $sections = (array) data_get($postDetail, 'sections', []);
    $sections = array_values(array_filter($sections, fn ($s) => is_array($s)));
    $sections = array_values(array_filter($sections, function ($s) {
        $title = trim((string) ($s['title'] ?? ''));
        $text = trim((string) ($s['text'] ?? ''));
        return $title !== '' || $text !== '';
    }));

    $detailTags = (array) data_get($postDetail, 'tags', ['Cardiology', 'Surgery', 'AI in Medicine']);

    $sharePinterestUrl = trim((string) data_get($postDetail, 'share_pinterest_url', ''));
    $shareLinkedinUrl = trim((string) data_get($postDetail, 'share_linkedin_url', ''));
    $shareInstagramUrl = trim((string) data_get($postDetail, 'share_instagram_url', ''));
    $shareFacebookUrl = trim((string) data_get($postDetail, 'share_facebook_url', ''));
@endphp
@section('content')

        <!--Blog Details Start-->
        <section class="blog-details">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-7">
                        <div class="blog-details__left">
                            <div class="blog-details__img">
                                <img src="{{ asset($blogDetailHero) }}" alt="">
                            </div>
                            <div class="blog-details__content">
                                <h3 class="blog-details__title">{{ $blogDetailTitle }}</h3>
                                <ul class="blog-details__meta-list list-unstyled">
                                    <li>
                                        <div class="blog-details__meta-img">
                                            <img src="{{ asset($blogDetailAuthorImage) }}" alt="">
                                        </div>
                                        <div class="content">
                                            <span>Post By</span>
                                            <h5>{{ $blogDetailAuthor }}</h5>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-calendar"></span>
                                        </div>
                                        <div class="content">
                                            <span>Published</span>
                                            <h5>{{ $blogDetailPublished }}</h5>
                                        </div>
                                    </li>
                                </ul>
                                @if(trim($blogDetailContent) !== '')
                                    <div class="blog-details__text-1">{!! nl2br(e($blogDetailContent)) !!}</div>
                                @endif

                                @if($contentImage !== '')
                                    <div class="blog-details__img-box">
                                        <figure class="m-0">
                                            <div class="blog-details__img-box-img-1">
                                                <img src="{{ asset($contentImage) }}" alt="">
                                            </div>
                                            @if($contentImageCaption !== '')
                                                <figcaption class="blog-details__text-1 mt-2">
                                                    {!! nl2br(e($contentImageCaption)) !!}
                                                </figcaption>
                                            @endif
                                        </figure>
                                    </div>
                                @endif

                                @foreach($sections as $section)
                                    @php
                                        $sectionTitle = trim((string) ($section['title'] ?? ''));
                                        $sectionText = trim((string) ($section['text'] ?? ''));
                                    @endphp

                                    @if($sectionTitle !== '')
                                        <h4 class="blog-details__title-2">{{ $sectionTitle }}</h4>
                                    @endif
                                    @if($sectionText !== '')
                                        <div class="blog-details__text-1">{!! nl2br(e($sectionText)) !!}</div>
                                    @endif
                                @endforeach
                                <div class="blog-details__tag-and-social">
                                    <div class="blog-details__tag">
                                        <p>Tags:</p>
                                        <div class="blog-details__tag-list">
                                            @php
                                                $tags = array_values(array_filter(array_map(fn ($t) => trim((string) $t), (array) $detailTags)));
                                            @endphp
                                            @foreach($tags as $i => $tag)
                                                <a href="#">{{ $tag }}</a>
                                                @if($i < count($tags) - 1)
                                                    <span>//</span>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="blog-details__social">
                                        <p>Share:</p>
                                        <div class="blog-details__social-list">
                                            <a href="{{ $sharePinterestUrl !== '' ? $sharePinterestUrl : '#' }}"><span class="icon-pinterest"></span></a>
                                            <a href="{{ $shareLinkedinUrl !== '' ? $shareLinkedinUrl : '#' }}"><span class="icon-linkedin-big-logo"></span></a>
                                            <a href="{{ $shareInstagramUrl !== '' ? $shareInstagramUrl : '#' }}"><span class="icon-instagram"></span></a>
                                            <a href="{{ $shareFacebookUrl !== '' ? $shareFacebookUrl : '#' }}"><span class="icon-facebook-app-symbol"></span></a>
                                        </div>
                                    </div>
                                </div>

                                @php
                                    $allPosts = (array) ($posts ?? []);
                                    $suggestedPosts = array_values(array_filter($allPosts, function ($p) use ($currentSlug) {
                                        if (!is_array($p)) return false;
                                        if ($currentSlug === '') return true;
                                        return (string) data_get($p, 'slug', '') !== $currentSlug;
                                    }));
                                    $suggestedPosts = array_slice($suggestedPosts, 0, 4);
                                @endphp

                                @if(count($suggestedPosts))
                                    <div class="blog-one__bottom" style="margin-top: 40px;">
                                        <div class="row">
                                            @foreach($suggestedPosts as $i => $card)
                                                @php
                                                    $img = (string) data_get($card, 'image', 'assets/images/blog/blog-1-1.jpg');
                                                    $link = (string) data_get($card, 'link_url', route('blog-details'));
                                                    $day = (string) data_get($card, 'day', '01');
                                                    $month = (string) data_get($card, 'month', 'JAN');
                                                    $text = (string) data_get($card, 'excerpt', '');
                                                    $postTitle = (string) data_get($card, 'title', '');
                                                    $categorySlug = trim((string) data_get($card, 'category', ''));
                                                    $categoryLabel = trim((string) data_get($card, 'category_label', ''));
                                                    $tagUrl = $categorySlug !== '' ? route('blog-category', ['category' => $categorySlug]) : $link;
                                                    $tagLabel = $categoryLabel !== '' ? $categoryLabel : ($categorySlug !== '' ? $categorySlug : 'Scientific News');
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
                                                                <ul class="list-unstyled blog-one__tag">
                                                                    <li><a href="{{ $tagUrl }}">{{ $tagLabel }}</a></li>
                                                                </ul>
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
                                                                <ul class="list-unstyled blog-one__tag">
                                                                    <li><a href="{{ $tagUrl }}">{{ $tagLabel }}</a></li>
                                                                </ul>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
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
                                        <h3 class="sidebar__title">{{ data_get($blogSidebarSearch, 'title', 'Search Scientific News') }}</h3>
                                    </div>
                                    <p class="sidebar__search-text">{{ data_get($blogSidebarSearch, 'text', 'Search Explore a world of diverse scientific news topics to stay informed and inspired.') }}</p>
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
                                                <a href="{{ route('blog-category', ['category' => $cat->slug]) }}">
                                                    {{ $cat->name }}
                                                    @if($count !== '') <span>({{ $count }})</span>@endif
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
                                                $image = (string) data_get($post, 'image', 'assets/images/blog/lp-1-1.jpg');
                                                $title = (string) data_get($post, 'title', '');
                                                $published = (string) data_get($post, 'published', '');
                                            @endphp
                                            <li>
                                                <div class="sidebar__post-image">
                                                    <img src="{{ asset($image) }}" alt="">
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
                                                    <img src="{{ asset('assets/images/blog/lp-1-1.jpg') }}" alt="">
                                                </div>
                                                <div class="sidebar__post-content">
                                                    <h3>
                                                        <a href="{{ route('blog-category', ['category' => 'cardiology']) }}">AI “Digital Twins” and
                                                            Cardiac Planning</a>
                                                    </h3>
                                                    <p class="sidebar__post-date"><span class="icon-calendar"></span>February
                                                        2026
                                                    </p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="sidebar__post-image">
                                                    <img src="{{ asset('assets/images/blog/lp-1-2.jpg') }}" alt="">
                                                </div>
                                                <div class="sidebar__post-content">
                                                    <h3>
                                                        <a href="{{ route('blog-category', ['category' => 'internal-medicine']) }}">GLP-1 therapies:
                                                            benefits and trade-offs</a>
                                                    </h3>
                                                    <p class="sidebar__post-date"><span class="icon-calendar"></span>February
                                                        2026
                                                    </p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="sidebar__post-image">
                                                    <img src="{{ asset('assets/images/blog/lp-1-3.jpg') }}" alt="">
                                                </div>
                                                <div class="sidebar__post-content">
                                                    <h3>
                                                        <a href="{{ route('blog-category', ['category' => 'obgyn']) }}">PCOS:
                                                            taking control</a>
                                                    </h3>
                                                    <p class="sidebar__post-date"><span class="icon-calendar"></span>February
                                                        2026
                                                    </p>
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
        <!--Blog Details End-->

    <x-strickyHeader />
    <x-footer2 />
    <x-mobileMenu />
    <x-searchPopup />
    <x-scroll-to-top />
@endsection