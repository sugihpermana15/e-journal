<!DOCTYPE html>
@php($activeLocale = app()->getLocale())
<html lang="{{ $activeLocale }}" dir="{{ $activeLocale === 'ar' ? 'rtl' : 'ltr' }}">

<x-head/>
<body class="custom-cursor">
    
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