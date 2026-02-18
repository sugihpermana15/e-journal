@extends('layouts.breadcrumbs')
@section('title', 'Blog Details || Med Open Press')
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/module-css/blog.css')}}"/>
@endpush
@php
    $bodyClass = 'custom-cursor';
    $title = 'Blog Details';
    $subtitle = 'Blog Details';

    $home = (array) ($homeSettings ?? []);
    $blogDetail = (array) data_get($home, 'blog_detail', []);

    $blogSidebar = (array) data_get($home, 'blog_sidebar', []);
    $blogSidebarSearch = (array) data_get($blogSidebar, 'search', []);
    $sidebarCategories = $sidebarCategories ?? collect();


    $postDetail = is_array($post ?? null) ? $post : null;
    $blogDetailHero = (string) data_get($postDetail, 'hero', (string) data_get($blogDetail, 'hero', 'assets/images/blog/blog-details-img-1.jpg'));
    $blogDetailTitle = (string) data_get($postDetail, 'title', (string) data_get($blogDetail, 'title', 'Scientific News: How AI “Digital Twins” Support Surgical Planning'));
    $blogDetailAuthor = (string) data_get($postDetail, 'author', (string) data_get($blogDetail, 'author', 'Med Open Press Editorial'));
    $blogDetailComments = (string) data_get($postDetail, 'comments', (string) data_get($blogDetail, 'comments', '0 Comments'));
    $blogDetailPublished = (string) data_get($postDetail, 'published', (string) data_get($blogDetail, 'published', 'February 15, 2026'));
    $blogDetailAuthorImage = (string) data_get($postDetail, 'author_image', 'assets/images/blog/blog-details-meta-client-img-1.jpg');
    $blogDetailContent = (string) data_get($postDetail, 'content', '');

    $galleryImage1 = (string) data_get($postDetail, 'gallery_image_1', 'assets/images/blog/blog-details-img-box-img-1.jpg');
    $galleryImage2 = (string) data_get($postDetail, 'gallery_image_2', 'assets/images/blog/blog-details-img-box-img-2.jpg');

    $detailTitle2 = (string) data_get($postDetail, 'detail_title_2', 'What a Digital Twin Can Do');
    $detailText2 = (string) data_get($postDetail, 'detail_text_2', 'These tools are not meant to replace clinical judgment. Their value is in making planning more testable—helping teams compare strategies, anticipate constraints, and align around a shared plan.');
    $detailText3 = (string) data_get($postDetail, 'detail_text_3', 'In practice, a useful digital twin goes beyond a 3D visualization. It may combine anatomy with simulation to estimate how flow, geometry, or devices might behave under different assumptions.');
    $detailText4 = (string) data_get($postDetail, 'detail_text_4', 'Because models depend on data quality and assumptions, results should be treated as decision support—helpful for discussion and preparation, not a guarantee.');

    $detailTitle3 = (string) data_get($postDetail, 'detail_title_3', 'Where It Helps Clinicians');
    $detailPoints = (array) data_get($postDetail, 'detail_points', [
        'Scenario testing in procedural planning: compare strategies and device positioning before the day of surgery.',
        'Risk anticipation: flag anatomy- or flow-related constraints that may affect sealing, obstruction risk, or access.',
        'Team alignment: make assumptions explicit and reviewable, reducing surprises mid-case.',
    ]);

    $detailTitle4 = (string) data_get($postDetail, 'detail_title_4', 'Guardrails Still Matter');
    $detailText5 = (string) data_get($postDetail, 'detail_text_5', 'Any predictive tool needs validation and clinical context. Teams still have to weigh uncertainty, limitations of the underlying data, and whether a simulated outcome maps to the real decision at hand.');

    $detailQuoteText = (string) data_get($postDetail, 'detail_quote_text', '“Simulation doesn’t replace expertise—it helps teams explore more scenarios before real time runs out.”');
    $detailQuoteAuthor = (string) data_get($postDetail, 'detail_quote_author_name', 'Med Open Press Editorial');
    $detailQuoteAuthorImage = (string) data_get($postDetail, 'detail_quote_author_image', 'assets/images/blog/blog-details-quote-client-img-1.jpg');

    $detailTitle5 = (string) data_get($postDetail, 'detail_title_5', 'From Planning to the Operating Room');
    $detailText6 = (string) data_get($postDetail, 'detail_text_6', 'A related direction is near-real-time support: applying analysis to intraoperative data streams to improve situational awareness and decision-making while preserving clinician control.');

    $detailFeatureImage = (string) data_get($postDetail, 'detail_feature_image', 'assets/images/blog/blog-details-points-img-1.jpg');
    $detailFeaturePoints = (array) data_get($postDetail, 'detail_feature_points', [
        'Scenario comparisons',
        'Risk stratification',
        'Shared planning assumptions',
        'Decision support',
        'Workflow alignment',
    ]);

    $detailText7 = (string) data_get($postDetail, 'detail_text_7', 'Explore more Scientific News topics via our category pages. Each category collects simplified, editorial summaries to keep the same template design while making the content easy to scan.');

    $detailTags = (array) data_get($postDetail, 'tags', ['Cardiology', 'Surgery', 'AI in Medicine']);

    $sharePinterestUrl = trim((string) data_get($postDetail, 'share_pinterest_url', ''));
    $shareLinkedinUrl = trim((string) data_get($postDetail, 'share_linkedin_url', ''));
    $shareInstagramUrl = trim((string) data_get($postDetail, 'share_instagram_url', ''));
    $shareFacebookUrl = trim((string) data_get($postDetail, 'share_facebook_url', ''));

    $prev = is_array($prevPost ?? null) ? $prevPost : null;
    $next = is_array($nextPost ?? null) ? $nextPost : null;
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
                                            <span class="icon-bubble-chat"></span>
                                        </div>
                                        <div class="content">
                                            <span>Comments</span>
                                            <h5>{{ $blogDetailComments }}</h5>
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
                                @else
                                    <p class="blog-details__text-1">Scientific News highlights how modern simulation and
                                        modeling can help clinical teams plan complex procedures. One emerging approach is
                                        the “digital twin”: a patient-specific model built from clinical data (often
                                        imaging) that supports structured “what-if” exploration before a case begins.</p>
                                    <p class="blog-details__text-2">These tools are not meant to replace clinical
                                        judgment. Their value is in making planning more testable—helping teams compare
                                        strategies, anticipate constraints, and align around a shared plan.</p>
                                    <h4 class="blog-details__title-2">What a Digital Twin Can Do</h4>
                                    <p class="blog-details__text-3">In practice, a useful digital twin goes beyond a 3D
                                        visualization. It may combine anatomy with simulation to estimate how flow,
                                        geometry, or devices might behave under different assumptions.</p>
                                    <p class="blog-details__text-4">Because models depend on data quality and
                                        assumptions, results should be treated as decision support—helpful for discussion
                                        and preparation, not a guarantee.</p>
                                @endif
                                <div class="blog-details__img-box">
                                    <div class="row">
                                        <div class="col-xl-6 col-lg-6 col-md-6">
                                            <div class="blog-details__img-box-img-1">
                                                <img src="{{ asset($galleryImage1) }}" alt="">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6">
                                            <div class="blog-details__img-box-img-1">
                                                <img src="{{ asset($galleryImage2) }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="blog-details__title-3">{{ $detailTitle3 }}</h4>
                                <ul class="blog-details__points-list list-unstyled">
                                    @foreach($detailPoints as $point)
                                        @php
                                            $point = trim((string) $point);
                                            if ($point === '') {
                                                continue;
                                            }
                                        @endphp
                                        <li>
                                            <div class="icon"></div>
                                            <p>{{ $point }}</p>
                                        </li>
                                    @endforeach
                                </ul>
                                <h4 class="blog-details__title-4">{{ $detailTitle4 }}</h4>
                                <p class="blog-details__text-5">{{ $detailText5 }}</p>
                                <div class="blog-details__quote-box">
                                    <div class="blog-details__quote-icon">
                                        <span class="icon-left"></span>
                                    </div>
                                    <div class="blog-details__quote-text-box">
                                        <p class="blog-details__quote-text">{{ $detailQuoteText }}</p>
                                        <div class="blog-details__quote-client-box">
                                            <div class="blog-details__quote-client-img">
                                                <img src="{{ asset($detailQuoteAuthorImage) }}" alt="">
                                            </div>
                                            <div class="blog-details__quote-client-content">
                                                <span>ATHOR BY</span>
                                                <p>{{ $detailQuoteAuthor }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="blog-details__title-5">{{ $detailTitle5 }}</h4>
                                <p class="blog-details__text-6">{{ $detailText6 }}</p>
                                <div class="blog-details__img-and-points">
                                    <div class="blog-details__points-img">
                                        <img src="{{ asset($detailFeatureImage) }}" alt="">
                                    </div>
                                    <ul class="blog-details__points list-unstyled">
                                        @foreach($detailFeaturePoints as $point)
                                            @php
                                                $point = trim((string) $point);
                                                if ($point === '') {
                                                    continue;
                                                }
                                            @endphp
                                            <li>
                                                <div class="icon">
                                                    <span class="icon-check-1"></span>
                                                </div>
                                                <p>{{ $point }}</p>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <p class="blog-details__text-7">{{ $detailText7 }}</p>
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
                                <div class="blog-details__prev-next">
                                    <div class="blog-details__prev">
                                        <div class="blog-details__prev-img">
                                            <img src="{{ asset(data_get($prev, 'image', 'assets/images/blog/blog-details-prev-img.jpg')) }}" alt="">
                                        </div>
                                        <div class="content">
                                            <p><a href="{{ data_get($prev, 'link_url', '#') }}">PREV PROJECT</a></p>
                                            <h5>{{ data_get($prev, 'title', 'Sparkle & Shine Services') }}</h5>
                                        </div>
                                    </div>
                                    <div class="blog-details__next">
                                        <div class="content">
                                            <p><a href="{{ data_get($next, 'link_url', '#') }}">NEXT PROJECT</a></p>
                                            <h5>{{ data_get($next, 'title', 'Retail store cleaning') }}</h5>
                                        </div>
                                        <div class="blog-details__next-img">
                                            <img src="{{ asset(data_get($next, 'image', 'assets/images/blog/blog-details-next-img.jpg')) }}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="comment-one">
                                    <div class="section-title text-left sec-title-animation animation-style2">
                                        <div class="section-title__tagline-box">
                                            <div class="section-title__tagline-shape-box">
                                                <div class="section-title__tagline-shape"></div>
                                                <div class="section-title__tagline-shape-2"></div>
                                            </div>
                                            <span class="section-title__tagline">BLOG COMMENTS</span>
                                        </div>
                                        <h2 class="section-title__title title-animation">Total 120 Comments</h2>
                                    </div>
                                    <ul class="comment-one__single-list list-unstyled">
                                        <li>
                                            <div class="comment-one__single">
                                                <div class="comment-one__image-and-name">
                                                    <div class="comment-one__image-box">
                                                        <div class="comment-one__image">
                                                            <img src="{{ asset('assets/images/blog/comment-1-1.jpg') }}" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="comment-one__name-and-btn">
                                                        <h3>John Smith<span
                                                                class="icon-right-arrow arrow-icon-box"></span>
                                                            <span class="date-box"> September 19, 2024</span>
                                                        </h3>
                                                        <div class="comment-one__btn">
                                                            <a href="#">Reply</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class=" comment-one__single-text">Clear overview. The “virtual rehearsal”
                                                    framing makes it easier to understand how simulation can support
                                                    planning without replacing clinical judgment.</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="comment-one__single">
                                                <div class="comment-one__image-and-name">
                                                    <div class="comment-one__image-box">
                                                        <div class="comment-one__image">
                                                            <img src="{{ asset('assets/images/blog/comment-1-2.jpg') }}" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="comment-one__name-and-btn">
                                                        <h3>Linda Harrison<span
                                                                class="icon-right-arrow arrow-icon-box"></span>
                                                            <span class="date-box"> August 19, 2024</span>
                                                        </h3>
                                                        <div class="comment-one__btn">
                                                            <a href="#">Reply</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class=" comment-one__single-text">Helpful breakdown of what a digital
                                                    twin can and cannot do. The emphasis on validation and assumptions is
                                                    important.</p>
                                            </div>
                                            <ul
                                                class="comment-one__single-list comment-one__single-list-2 list-unstyled">
                                                <li>
                                                    <div class="comment-one__single">
                                                        <div class="comment-one__image-and-name">
                                                            <div class="comment-one__image-box">
                                                                <div class="comment-one__image">
                                                                    <img src="{{ asset('assets/images/blog/comment-1-3.jpg') }}"
                                                                        alt="">
                                                                </div>
                                                            </div>
                                                            <div class="comment-one__name-and-btn">
                                                                <h3>Mark Collins<span
                                                                        class="icon-right-arrow arrow-icon-box"></span>
                                                                    <span class="date-box">August 19, 2024</span>
                                                                </h3>
                                                                <div class="comment-one__btn">
                                                                    <a href="#">Reply</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <p class=" comment-one__single-text">I’d love to see more posts
                                                            that connect these tools to real clinical workflows and
                                                            outcomes tracking.</p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <div class="comment-one__single">
                                                <div class="comment-one__image-and-name">
                                                    <div class="comment-one__image-box">
                                                        <div class="comment-one__image">
                                                            <img src="{{ asset('assets/images/blog/comment-1-4.jpg') }}" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="comment-one__name-and-btn">
                                                        <h3>Jessica Turner<span
                                                                class="icon-right-arrow arrow-icon-box"></span>
                                                            <span class="date-box"> March 19, 2024</span>
                                                        </h3>
                                                        <div class="comment-one__btn">
                                                            <a href="#">Reply</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class=" comment-one__single-text">Good read. The idea of making
                                                    intraoperative signals more measurable is interesting—especially for
                                                    faster decision-making.</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="comment-form">
                                    <p class="comment-form__sub-title">Comments Form</p>
                                    <h3 class="comment-form__title">Put Your Comments</h3>
                                    <form class="contact-form-validated comment-form__form"
                                        action="assets/inc/sendemail.php" method="post" novalidate="novalidate">
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6">
                                                <h4 class="comment-form__input-title">Frist Name</h4>
                                                <div class="comment-form__input-box">
                                                    <input type="text" name="name" placeholder="Jordan" required="">
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6">
                                                <h4 class="comment-form__input-title">Last Name</h4>
                                                <div class="comment-form__input-box">
                                                    <input type="text" name="name" placeholder="Andric" required="">
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <h4 class="comment-form__input-title">Enter Your Email</h4>
                                                <div class="comment-form__input-box">
                                                    <input type="email" name="email" placeholder="jordan@example.com"
                                                        required="">
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <h4 class="comment-form__input-title">Write Comments</h4>
                                                <div class="comment-form__input-box text-message-box">
                                                    <textarea name="message"
                                                        placeholder="Write something here..."></textarea>
                                                </div>
                                                <div class="comment-form__btn-box">
                                                    <button type="submit" class="thm-btn">Send Message<span><i
                                                                class="icon-diagonal-arrow"></i></span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="result"></div>
                                </div>
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