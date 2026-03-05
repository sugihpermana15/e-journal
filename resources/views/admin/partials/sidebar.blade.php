<aside class="pe-app-sidebar" id="sidebar">
    <style>
        /* Sidebar icon mode: keep menu aligned & prevent text overflow */
        [data-sidebar="icon"] .pe-app-sidebar .pe-main-menu > .pe-slide > .pe-nav-link {
            justify-content: center;
            gap: 0;
        }

        [data-sidebar="icon"] .pe-app-sidebar .pe-main-menu > .pe-slide > .pe-nav-link .pe-nav-content,
        [data-sidebar="icon"] .pe-app-sidebar .pe-main-menu > .pe-slide > .pe-nav-link .pe-nav-arrow {
            display: none !important;
        }

        [data-sidebar="icon"] .pe-app-sidebar .pe-main-menu > .pe-slide > .pe-nav-link .pe-nav-icon {
            margin: 0 auto;
        }

        /* Sidebar logo: shrink on collapsed + very small screens */
        [data-sidebar="icon"] .pe-app-sidebar .pe-app-sidebar-logo img {
            height: 22px !important;
            width: auto;
        }

        @media (max-width: 420px) {
            .pe-app-sidebar .pe-app-sidebar-logo img {
                height: 22px !important;
                width: auto;
            }
        }
    </style>
    <div class="pe-app-sidebar-logo px-6 d-flex align-items-center position-relative">
        <!--begin::Brand Image-->
        <a href="{{ route('admin.dashboard') }}" class="fs-18 fw-semibold">
            <img height="30" class="pe-app-sidebar-logo-default d-none" alt="Med Open Press" src="{{ asset('assets/images/resources/logoMed.png') }}">
            <img height="30" class="pe-app-sidebar-logo-light d-none" alt="Med Open Press" src="{{ asset('assets/images/resources/logoMed.png') }}">
            <img height="30" class="pe-app-sidebar-logo-minimize d-none" alt="Med Open Press" src="{{ asset('assets/images/resources/logoMed.png') }}">
            <img height="30" class="pe-app-sidebar-logo-minimize-light d-none" alt="Med Open Press" src="{{ asset('assets/images/resources/logoMed.png') }}">
        </a>
        <!--end::Brand Image-->
    </div> 
    <nav class="pe-app-sidebar-menu nav nav-pills" data-simplebar id="sidebar-simplebar">
        <ul class="pe-main-menu list-unstyled">
            <li class="pe-menu-title">
                <span>Settings</span>
            </li>
            <li class="pe-slide">
                <a href="{{ route('admin.users.index') }}" class="pe-nav-link">
                    <i class="bi bi-people pe-nav-icon"></i>
                    <span class="pe-nav-content">Users</span>
                </a>
            </li>
            <li class="pe-slide">
                <a href="{{ route('admin.ejournal.settings.edit') }}" class="pe-nav-link">
                    <i class="bi bi-sliders pe-nav-icon"></i>
                    <span class="pe-nav-content">E-Journal Settings</span>
                </a>
            </li>
            <li class="pe-slide">
                <a href="{{ route('admin.about.edit') }}" class="pe-nav-link">
                    <i class="bi bi-info-circle pe-nav-icon"></i>
                    <span class="pe-nav-content">About Settings</span>
                </a>
            </li>
            <li class="pe-slide">
                <a href="{{ route('admin.services.edit') }}" class="pe-nav-link">
                    <i class="bi bi-grid-1x2 pe-nav-icon"></i>
                    <span class="pe-nav-content">Services Settings</span>
                </a>
            </li>
            <li class="pe-slide">
                <a href="{{ route('admin.ejournal.services.index') }}" class="pe-nav-link">
                    <i class="bi bi-list-check pe-nav-icon"></i>
                    <span class="pe-nav-content">Services (CRUD)</span>
                </a>
            </li>
            <li class="pe-slide">
                <a href="{{ route('admin.contact.edit') }}" class="pe-nav-link">
                    <i class="bi bi-telephone pe-nav-icon"></i>
                    <span class="pe-nav-content">Contact Settings</span>
                </a>
            </li>
            <li class="pe-slide">
                <a href="{{ route('admin.ejournal.header.edit') }}" class="pe-nav-link">
                    <i class="bi bi-layout-text-window pe-nav-icon"></i>
                    <span class="pe-nav-content">Header Settings</span>
                </a>
            </li>
            <li class="pe-slide">
                <a href="{{ route('admin.ejournal.journals.index') }}" class="pe-nav-link">
                    <i class="bi bi-journal-text pe-nav-icon"></i>
                    <span class="pe-nav-content">Journals</span>
                </a>
            </li>
            <li class="pe-slide">
                <a href="{{ route('admin.blog.posts.index') }}" class="pe-nav-link">
                    <i class="bi bi-newspaper pe-nav-icon"></i>
                    <span class="pe-nav-content">Scientific News Posts</span>
                </a>
            </li>
            <li class="pe-slide">
                <a href="{{ route('admin.blog.categories.index') }}" class="pe-nav-link">
                    <i class="bi bi-tags pe-nav-icon"></i>
                    <span class="pe-nav-content">Scientific News Categories</span>
                </a>
            </li>
        </ul>
    </nav>
</aside>
