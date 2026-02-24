<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @php
        $appName = (string) config('app.name', 'E-Journal');

        $pageTitleRaw = trim($__env->yieldContent('title'));
        $pageTitle = $pageTitleRaw !== '' ? ($pageTitleRaw . ' || ' . $appName) : $appName;

        $headerSettings = (array) \App\Models\Ejournal\Setting::getValue('header', []);
        $faviconPath = data_get($headerSettings, 'favicon_path');
        $faviconUrl = $faviconPath ? asset('storage/' . ltrim($faviconPath, '/')) : null;

        $routeName = request()->route()?->getName();
        $pageTitlePlain = $pageTitleRaw !== '' ? $pageTitleRaw : $appName;

        $defaultDescriptions = [
            'index' => 'Med Open Press provides end-to-end medical publishing services, journal support, and scientific news updates.',
            'about' => 'Learn about Med Open Press: our mission, editorial workflow, and publishing support for authors and journals.',
            'services' => 'Explore our publishing services: manuscript support, peer review coordination, production, DOI & metadata readiness.',
            'services-detail' => 'Service details: publishing workflow, highlights, and FAQs to support journals and authors.',
            'journals' => 'Browse published journals and featured publications supported by Med Open Press.',
            'blog' => 'Read Scientific News and insights: editorial updates, publishing tips, and research highlights.',
            'blog-details' => 'Scientific News details and article insights.',
            'blog-category' => 'Scientific News by category.',
            'contact' => 'Contact Med Open Press for publishing support, editorial workflow questions, and journal services.',
            'login' => 'Admin login for Med Open Press E-Journal.',
        ];

        $metaDescription = trim($__env->yieldContent('meta_description'));
        if ($metaDescription === '') {
            $metaDescription = (string) ($defaultDescriptions[$routeName] ?? $defaultDescriptions['index']);
        }

        $canonical = trim($__env->yieldContent('canonical'));
        if ($canonical === '') {
            $canonical = url()->current();
        }

        $metaImage = trim($__env->yieldContent('meta_image'));
        if ($metaImage === '') {
            $metaImage = asset('assets/images/resources/logoMed.png');
        }

        $ogType = trim($__env->yieldContent('og_type'));
        if ($ogType === '') {
            $ogType = in_array($routeName, ['blog-details'], true) ? 'article' : 'website';
        }

        $gtmId = (string) data_get(config('services.google_tag_manager', []), 'id', '');
    @endphp

    <title>{{ $pageTitle }}</title>

    <link rel="canonical" href="{{ $canonical }}">
    <meta name="description" content="{{ $metaDescription }}">

    @if(app()->environment('production'))
        <meta name="robots" content="index,follow,max-image-preview:large,max-snippet:-1,max-video-preview:-1">
    @else
        <meta name="robots" content="noindex,nofollow">
    @endif

    <meta property="og:site_name" content="{{ $appName }}">
    <meta property="og:type" content="{{ $ogType }}">
    <meta property="og:title" content="{{ $pageTitlePlain }}">
    <meta property="og:description" content="{{ $metaDescription }}">
    <meta property="og:url" content="{{ $canonical }}">
    <meta property="og:image" content="{{ $metaImage }}">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $pageTitlePlain }}">
    <meta name="twitter:description" content="{{ $metaDescription }}">
    <meta name="twitter:image" content="{{ $metaImage }}">

    <!-- Favicons -->
    @if($faviconUrl)
        <link rel="icon" href="{{ $faviconUrl }}">
        <link rel="shortcut icon" href="{{ $faviconUrl }}">
        <link rel="apple-touch-icon" href="{{ $faviconUrl }}">
    @else
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/favicons/apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/favicons/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicons/favicon-16x16.png') }}">
    @endif
    <link rel="manifest" href="{{ asset('assets/images/favicons/site.webmanifest') }}">

    @if(trim($gtmId) !== '')
        <!-- Google Tag Manager -->
        <script>
            (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            })(window,document,'script','dataLayer','{{ $gtmId }}');
        </script>
        <!-- End Google Tag Manager -->
    @endif

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,200..800&display=swap"
        rel="stylesheet">

    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/custom-animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/swiper.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome-all.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/jarallax.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/odometer.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/aos.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/twentytwenty.css') }}" />

    <!-- Module most usese Styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/page-header.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/banner.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/slider.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/newsletter.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/footer.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/sliding-text.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/counter.css') }}" />
    <link rel="stylesheet" href="{{asset('assets/css/module-css/awards.css')}}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/before-and-after.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/process.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/why-choose.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/office-location.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/brand.css') }}" />
 
    <!-- Template Styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <!-- Additional Styles -->
    @stack('styles')

    @php
        $siteUrl = rtrim((string) config('app.url', url('/')), '/');
        if ($siteUrl === '') {
            $siteUrl = url('/');
        }

        $orgSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => $appName,
            'url' => $siteUrl,
            'logo' => asset('assets/images/resources/logoMed.png'),
        ];

        $websiteSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'WebSite',
            'name' => $appName,
            'url' => $siteUrl,
        ];
    @endphp

    <script type="application/ld+json">{!! json_encode($orgSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
    <script type="application/ld+json">{!! json_encode($websiteSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>

    @stack('head')
</head>
