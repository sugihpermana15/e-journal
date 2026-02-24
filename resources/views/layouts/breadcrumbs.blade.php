<!DOCTYPE html>
<html lang="en">

<x-head />

<body class="{{ trim('custom-cursor ' . ($bodyClass ?? '')) }}">

    <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div>

    <div class="page-wrapper">

        <x-headerNav />

        <!--Page Header Start-->
        <section class="page-header">
            <div class="page-header__bg"
                style="background-image: url({{ asset('assets/images/backgrounds/page-header-bg.jpg') }});">
            </div>
            <div class="page-header__social">
                <a href="#">LinkedIn</a>
                <a href="#">Pinterest</a>
                <a href="#">twitter-x</a>
                <a href="#">facebook</a>
            </div>
            <div class="container">
                <div class="page-header__inner">
                    <h2>{{ $title ?? 'Welcome' }}</h2>
                    <div class="thm-breadcrumb__box">
                        <ul class="thm-breadcrumb list-unstyled">
                            <li><a href="{{ route('index') }}">Home</a></li>
                            <li><span class="icon-arrow-right"></span></li>

                            @if (request()->routeIs(['blog', 'blog-details', 'blog-category']))
                                <li><a href="{{ route('blog') }}">Scientific News</a></li>
                                <li><span class="icon-arrow-right"></span></li>
                            @endif

                            <li>{{ $subtitle ?? 'Go to home' }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!--Page Header End-->

        @yield('content')

        <x-loader />

        <x-infoSidebar />

    </div>

    <x-scripts />

</body>

</html>
