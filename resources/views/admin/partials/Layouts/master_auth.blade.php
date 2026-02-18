<!DOCTYPE html>
<html lang="en">

<meta charset="utf-8" />
<title>@yield('title', ' | MedOpenPress Admin')</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta content="MedOpenPress Admin Panel" name="description" />
<meta content="MedOpenPress" name="author" />

<!-- layout setup -->
<script type="module" src="{{ asset('assets/admin/js/layout-setup.js') }}"></script>

<!-- App favicon -->
@php
	$headerSettings = (array) \App\Models\Ejournal\Setting::getValue('header', []);
	$faviconPath = data_get($headerSettings, 'favicon_path');
	$faviconUrl = $faviconPath ? asset('storage/' . ltrim($faviconPath, '/')) : asset('assets/images/favicons/favicon.ico');
@endphp
<link rel="shortcut icon" href="{{ $faviconUrl }}">

@yield('css')
@include('admin.partials.head-css') 

<body>

@yield('content')

@include('admin.partials.vendor-scripts')  

@yield('js')

</body>

</html>