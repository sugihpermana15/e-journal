<!DOCTYPE html>
<html lang="en">

<x-head />

<body class="{{ trim('custom-cursor ' . ($bodyClass ?? '')) }}">
    @php($gtmId = (string) data_get(config('services.google_tag_manager', []), 'id', ''))
    @if(trim($gtmId) !== '')
        <!-- Google Tag Manager (noscript) -->
        <noscript>
            <iframe src="https://www.googletagmanager.com/ns.html?id={{ $gtmId }}" height="0" width="0"
                style="display:none;visibility:hidden"></iframe>
        </noscript>
        <!-- End Google Tag Manager (noscript) -->
    @endif

    <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div>

    <div class="page-wrapper">

        <x-headerNav />

        <!--Page Header Start-->
        @php
            $headerSettings = (array) \App\Models\Ejournal\Setting::getValue('header', []);
            $breadcrumbBgPath = (string) data_get($headerSettings, 'breadcrumb_bg_path', '');
            $breadcrumbBgUrl = $breadcrumbBgPath !== ''
                ? asset('storage/' . ltrim($breadcrumbBgPath, '/'))
                : asset('assets/images/backgrounds/page-header-bg.jpg');

            $breadcrumbSocials = data_get($headerSettings, 'breadcrumb_socials');
            if (!is_array($breadcrumbSocials)) {
                $breadcrumbSocials = [];
            }
            if (count($breadcrumbSocials) === 0) {
                $breadcrumbSocials = [
                    ['label' => 'LinkedIn', 'url' => '#'],
                    ['label' => 'Pinterest', 'url' => '#'],
                    ['label' => 'twitter-x', 'url' => '#'],
                    ['label' => 'facebook', 'url' => '#'],
                ];
            }
        @endphp
        <section class="page-header">
            <div class="page-header__bg"
                style="background-image: url({{ $breadcrumbBgUrl ?? asset('assets/images/backgrounds/page-header-bg.jpg') }});">
            </div>
            <div class="page-header__social">
                @foreach(($breadcrumbSocials ?? []) as $s)
                    @php
                        $label = trim((string) data_get($s, 'label', ''));
                        $url = trim((string) data_get($s, 'url', ''));
                    @endphp
                    @continue($label === '' || $url === '')
                    <a href="{{ $url }}" target="_blank" rel="noopener">{{ $label }}</a>
                @endforeach
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
