
<div class="mobile-nav__wrapper">
    <div class="mobile-nav__overlay mobile-nav__toggler"></div>
    <!-- /.mobile-nav__overlay -->
    <div class="mobile-nav__content">
        <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

        <div class="logo-box">
            @php
                $header = (array) \App\Models\Ejournal\Setting::getValue('header', []);
                $logoPath = data_get($header, 'logo_path');
                $logoUrl = $logoPath ? asset('storage/' . ltrim($logoPath, '/')) : asset('assets/images/resources/logoMed.png');
                $logoAlt = (string) data_get($header, 'logo_alt', config('app.name', 'E-Journal'));
            @endphp
            <a href="{{ route('index') }}" aria-label="logo image">
                <img src="{{ $logoUrl }}" width="150" alt="{{ $logoAlt }}" />
            </a>
        </div>
        <!-- /.logo-box -->
        <div class="mobile-nav__container"></div>
        <!-- /.mobile-nav__container -->

        @php
            $appUrlHost = parse_url((string) config('app.url'), PHP_URL_HOST);
            $defaultContactEmail = $appUrlHost ? ('info@' . $appUrlHost) : 'info@example.com';
            $contactEmail = (string) (config('mail.from.address') ?: $defaultContactEmail);
        @endphp

        <ul class="mobile-nav__contact list-unstyled">
            <li>
                <i class="fa fa-envelope"></i>
                <a href="mailto:{{ $contactEmail }}">{{ $contactEmail }}</a>
            </li>
            <li>
                <i class="fas fa-phone"></i>
                <a href="tel:+628971399093">+62 897 1399 093</a>
            </li>
        </ul><!-- /.mobile-nav__contact -->
        <div class="mobile-nav__top">
            <div class="mobile-nav__social">
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-facebook-square"></a>
                <a href="#" class="fab fa-pinterest-p"></a>
                <a href="#" class="fab fa-instagram"></a>
            </div><!-- /.mobile-nav__social -->
        </div><!-- /.mobile-nav__top -->



    </div>
    <!-- /.mobile-nav__content -->
</div>
<!-- /.mobile-nav__wrapper -->