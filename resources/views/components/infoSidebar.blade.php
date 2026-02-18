<div class="xs-sidebar-group info-group info-sidebar">
    <div class="xs-overlay xs-bg-black"></div>
    <div class="xs-sidebar-widget">
        <div class="sidebar-widget-container">
            <div class="widget-heading">
                <a href="#" class="close-side-widget" aria-label="Close">
                    <i class="fa fa-times"></i>
                </a>
            </div>
            <div class="sidebar-textwidget">
                <div class="content-inner">
                    <div class="logo">
                        <a href="{{ route('index') }}">
                            <img src="{{ asset('assets/images/resources/logoMed.png') }}" alt="Med Open Press" style="display:block; width:100%; max-width:172px; height:auto; object-fit:contain;">
                        </a>
                    </div>

                    <h4>Language</h4>
                    <div class="content-box">
                        <p style="margin-bottom: 10px;">Choose your preferred language.</p>
                        <p style="margin-bottom: 0;">
                            <a href="{{ route('set-locale', ['locale' => 'en']) }}" style="color: #fff;">English</a>
                            <span style="color: rgba(255,255,255,.6); padding: 0 8px;">|</span>
                            <a href="{{ route('set-locale', ['locale' => 'zh']) }}" style="color: #fff;">中文</a>
                            <span style="color: rgba(255,255,255,.6); padding: 0 8px;">|</span>
                            <a href="{{ route('set-locale', ['locale' => 'ar']) }}" style="color: #fff;">العربية</a>
                        </p>
                    </div>

                    <h4>Account</h4>
                    <div class="content-box">
                        <p style="margin-bottom: 0;">
                            <a href="{{ route('login') }}" style="color: #fff;">Login</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
