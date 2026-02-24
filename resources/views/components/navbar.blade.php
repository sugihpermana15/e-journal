<ul class="main-menu__list">
    <li class="@if (request()->routeIs('index')) current @endif">
        <a href="{{ route('index') }}">Home</a>
    </li>
    <li class="@if (request()->routeIs('about')) current @endif">
        <a href="{{ route('about') }}">About</a>
    </li>
    <li class="@if (request()->routeIs(['services', 'services-detail'])) current @endif">
        <a href="{{ route('services') }}">Services</a>
    </li>
    <li class="@if (request()->routeIs('journals')) current @endif">
        <a href="{{ route('journals') }}">Journals</a>
    </li>
    <li class="@if (request()->routeIs([
                'blog',
                'blog-details',
                'blog-category',
                ])) current @endif">
        <a href="{{ route('blog') }}">Scientific News</a>
    </li>
    <li class="@if (request()->routeIs('contact')) current @endif">
        <a href="{{ route('contact') }}">Contact</a>
    </li>
</ul>
