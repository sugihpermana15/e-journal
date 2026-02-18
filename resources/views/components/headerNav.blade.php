<header class="main-header-three">
    @php
        $header = (array) \App\Models\Ejournal\Setting::getValue('header', []);

        $contacts = data_get($header, 'contacts');
        if (!is_array($contacts) || count($contacts) === 0) {
            $email = (string) data_get($header, 'email', 'medopenpress@outlook.com');
            $phone = (string) data_get($header, 'phone', '+62 897 1399 093');
            $phoneHref = (string) data_get($header, 'phone_href', '+628971399093');
            $location = (string) data_get($header, 'location', 'Jakarta, Indonesia');

            $contacts = [
                ['icon' => 'icon-mail', 'text' => $email, 'href' => $email ? ('mailto:' . $email) : ''],
                ['icon' => 'icon-phone-call', 'text' => $phone, 'href' => $phoneHref ? ('tel:' . $phoneHref) : ''],
                ['icon' => 'icon-pin-1', 'text' => $location, 'href' => ''],
            ];
        }

        $followTitle = (string) data_get($header, 'follow_title', 'Follow Us');
        $socials = data_get($header, 'socials');
        if (!is_array($socials) || count($socials) === 0) {
            $social = (array) data_get($header, 'social', []);
            $socials = [
                ['icon' => 'icon-facebook-app-symbol', 'url' => (string) data_get($social, 'facebook', '')],
                ['icon' => 'icon-pinterest', 'url' => (string) data_get($social, 'pinterest', '')],
                ['icon' => 'icon-linkedin-big-logo', 'url' => (string) data_get($social, 'linkedin', '')],
                ['icon' => 'icon-instagram', 'url' => (string) data_get($social, 'instagram', '')],
            ];
        }

        $logoPath = data_get($header, 'logo_path');
        $logoUrl = $logoPath ? asset('storage/' . ltrim($logoPath, '/')) : asset('assets/images/resources/logoMed.png');
        $logoAlt = (string) data_get($header, 'logo_alt', 'Logo');

        $consultationText = (string) data_get($header, 'consultation_text', 'Consultation');
        $consultationUrl = (string) data_get($header, 'consultation_url', 'https://wa.me/628971399093');
    @endphp
    <div class="main-menu-three__top">
        <div class="container">
            <div class="main-menu-three__top-inner">
                <ul class="list-unstyled main-menu-three__contact-list">
                    @foreach((array) $contacts as $c)
                        @php
                            $icon = (string) data_get($c, 'icon', '');
                            $text = (string) data_get($c, 'text', '');
                            $href = (string) data_get($c, 'href', '');
                        @endphp
                        @if(trim($text) !== '')
                            <li>
                                <div class="icon">
                                    <i class="{{ trim($icon) !== '' ? $icon : 'icon-pin-1' }}"></i>
                                </div>
                                <div class="text">
                                    @if(trim($href) !== '')
                                        <p><a href="{{ $href }}">{{ $text }}</a></p>
                                    @else
                                        <p>{{ $text }}</p>
                                    @endif
                                </div>
                            </li>
                        @endif
                    @endforeach
                </ul>
                <div class="main-menu-three__top-social-box">
                    <h4 class="main-menu-three__top-social-title">{{ $followTitle }}</h4>
                    <div class="main-menu-three__top-social">
                        @foreach((array) $socials as $s)
                            @php
                                $icon = (string) data_get($s, 'icon', '');
                                $url = (string) data_get($s, 'url', '');
                            @endphp
                            @if(trim($icon) !== '' && trim($url) !== '')
                                <a href="{{ $url }}" target="_blank" rel="noopener"><span class="{{ $icon }}"></span></a>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="main-menu main-menu-three">
        <div class="main-menu-three__wrapper">
            <div class="container">
                <div class="main-menu-three__wrapper-inner">
                    <div class="main-menu-three__left">
                        <div class="main-menu-three__logo">
                            <a href="{{ route('index') }}"><img class="logo-med" src="{{ $logoUrl }}" alt="{{ $logoAlt }}"></a>
                        </div>
                    </div>
                    <div class="main-menu-three__main-menu-box">
                        <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                        <x-navbar />
                    </div>
                    <div class="main-menu-three__right">
                        <div class="main-menu-three__btn-box">
                            <a href="{{ $consultationUrl }}" class="thm-btn">{{ $consultationText }}<span><i class="icon-diagonal-arrow"></i></span></a>
                        </div>
                        <div class="main-menu-three__nav-sidebar-icon">
                            <a class="navSidebar-button" href="#">
                                <span class="icon-app"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>