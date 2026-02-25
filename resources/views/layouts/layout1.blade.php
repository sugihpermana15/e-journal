<!DOCTYPE html>
@php
    $activeLocale = app()->getLocale();
@endphp
<html lang="{{ $activeLocale }}" dir="{{ $activeLocale === 'ar' ? 'rtl' : 'ltr' }}">

<x-head/>
<body class="custom-cursor">
    @php
        $gtmId = (string) data_get(config('services.google_tag_manager', []), 'id', '');
    @endphp
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
        
        <x-headerNav/>


    @yield('content')
    

    <x-loader/>

    <x-infoSidebar/>

   <x-scripts/>

</body>

</html>