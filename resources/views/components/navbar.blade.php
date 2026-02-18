<ul class="main-menu__list">
    <li class="@if (request()->routeIs('index')) current @endif">
        <a href="{{ route('index') }}">Home</a>
    </li>
    <li class="@if (request()->routeIs('about')) current @endif">
        <a href="{{ route('about') }}">About</a>
    </li>
    <li class="@if (request()->routeIs([
                'services',
                'residential-cleaning',
                'commercial-cleaning',
                'deep-cleaning',
                'office-cleaning',
                'sanitizing-mopping',
                ])) current @endif">
        <a href="{{ route('services') }}">Services</a>
    </li>
    <li class="@if (request()->routeIs('journals')) current @endif">
        <a href="{{ route('journals') }}">Journals</a>
    </li>
    <li class="@if (request()->routeIs([
                'blog',
                'blog-carousel',
                'blog-list',
                'blog-details',
                ])) current @endif">
        <a href="{{ route('blog') }}">Blog</a>
    </li>
    <li class="@if (request()->routeIs('contact')) current @endif">
        <a href="{{ route('contact') }}">Contact</a>
    </li>
</ul>
