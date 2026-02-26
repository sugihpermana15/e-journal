@extends('admin.partials.Layouts.master')

@section('title', 'E-Journal Settings | Admin')
@section('title-sub', 'Settings')
@section('pagetitle', 'E-Journal Settings')

@section('css')
    <style>
        .ejournal-settings-sidebar {
            top: calc(var(--pe-app-header-height) + 1rem) !important;
        }

        [id^="section-"] {
            scroll-margin-top: calc(var(--pe-app-header-height) + 1.5rem);
        }

        @media (max-width: 991.98px) {
            .ejournal-settings-sidebar {
                position: static;
                max-height: none;
                overflow: visible;
            }
        }
    </style>
@endsection

@section('content')
    @php
        $home = (array) ($home ?? []);

        $defaults = [
            'banner' => [
                'title' => 'Advancing Medical Science Through',
                'typed_strings' => 'Peer-Reviewed Journals, High-Caliber Medical Books',
                'text' => 'Med Open Press publishes rigorously peer-reviewed medical journals and authoritative books to support clinicians, researchers, and educators worldwide.',
                'button_text' => 'Explore Journals',
                'button_url' => '/journals',
            ],
            'sliding_text' => ['Peer Review', 'Open Access', 'Indexing', 'Copyediting', 'Ethics', 'Publishing'],
            'about' => [
                'tagline' => 'About Us',
                'heading_html' => "Our Story, Mission, Born from a passion\nfor innovation, <span>& Values</span><br> <span>That Drive Us Forward</span>",
                'text' => 'Med Open Press is a distinguished publishing entity devoted to the advancement of medical science through the dissemination of high-caliber books and rigorously peer-reviewed journals. Each publication undergoes stringent editorial scrutiny to ensure scientific validity and clinical relevance.',
                'points' => [
                    ['icon' => 'icon-check', 'text' => 'Excellence in peer review'],
                    ['icon' => 'icon-check', 'text' => 'Global accessibility'],
                    ['icon' => 'icon-check', 'text' => 'Promotion of innovation'],
                    ['icon' => 'icon-check', 'text' => 'Commitment to education'],
                    ['icon' => 'icon-check', 'text' => 'Ethical publishing standards'],
                    ['icon' => 'icon-check', 'text' => 'Transparent editorial policies'],
                    ['icon' => 'icon-check', 'text' => 'Clinically relevant outputs'],
                    ['icon' => 'icon-check', 'text' => 'Scientific validity & rigor'],
                ],
                'button_text' => 'Know More',
                'button_url' => '/about',
                'office_hours' => 'Office Hours: 10:00 AM - 8:00 PM',
                'phone' => '+62 897 1399 093',
            ],
            'about_page' => [
                'tagline' => 'About Us',
                'heading_html' => "Our Story, Mission, Born from a passion\nfor innovation, <span>& Values</span><br> <span>That Drive Us Forward</span>",
                'text' => 'Med Open Press is a distinguished publishing entity devoted to the advancement of medical science through the dissemination of high-caliber books and rigorously peer-reviewed journals. Our mission is to contribute to the global medical discourse by providing access to the latest research findings, educational tools, and authoritative reference materials. Each publication under our banner undergoes stringent editorial scrutiny to ensure it meets the highest standards of scientific validity and relevance, thus serving the needs of clinicians, researchers, and educators across the healthcare continuum.',
                'consultation_button_text' => 'Consultation',
                'consultation_button_url' => 'https://wa.me/628971399093',
                'office_hours' => 'Office Hours: 10:00 AM - 8:00 PM',
                'phone' => '+62 897 1399 093',
                'counters' => [
                    ['count' => 25, 'suffix' => '+', 'label' => 'years of editorial experience'],
                    ['count' => 98, 'suffix' => '%', 'label' => 'author satisfaction'],
                    ['count' => 198, 'suffix' => '+', 'label' => 'published works'],
                ],
            ],
            'counters' => [
                ['icon' => 'icon-completed-task', 'count' => 100, 'suffixes' => '+', 'label' => 'Articles published'],
                ['icon' => 'icon-review', 'count' => 98, 'suffixes' => '%', 'label' => 'Trusted by happy Customer!'],
                ['icon' => 'icon-experience', 'count' => 12, 'suffixes' => 'k|+', 'label' => 'Positive Rating in Trustpilot'],
                ['icon' => 'icon-costumer', 'count' => 35, 'suffixes' => 'm', 'label' => 'Rating in oy local City Network'],
            ],
            'manuscript' => [
                'title' => 'Submit Manuscript',
                'subtitle' => 'Request editorial guidance and publication information.',
                'name_placeholder' => 'Your Name',
                'email_placeholder' => 'Your Email',
                'phone_placeholder' => 'Phone',
                'category_placeholder' => 'Choose a Category',
                'category_options' => ['Original Research', 'Review Article', 'Case Report', 'Short Communication'],
                'button_text' => 'Request Info',
            ],
            'testimonials' => [
                'tagline' => 'OUR TESTIMONIAL',
                'heading_html' => 'Clients Have to Say <span>About Their</span><br><span>Experience with Us!</span>',
                'items' => [
                    [
                        'name' => 'Emily Carter',
                        'role' => 'Business Owner',
                        'date' => '10 Days Ago',
                        'sub_title' => 'Rigorous and transparent!',
                        'text' => "The peer review process was thorough and constructive.\nThe editorial communication was clear, timely, and professional.",
                        'rating' => 5,
                        'link_url' => route('about'),
                    ],
                    [
                        'name' => 'Michael Brown',
                        'role' => 'Financial Analyst',
                        'date' => '10 Days Ago',
                        'sub_title' => 'Efficient and dependable!',
                        'text' => "From submission to decision, the workflow was well-managed.\nThe guidance helped us improve the manuscript substantially.",
                        'rating' => 5,
                        'link_url' => route('about'),
                    ],
                    [
                        'name' => 'Sarah Thompson',
                        'role' => 'Marketing Manager',
                        'date' => '10 Days Ago',
                        'sub_title' => 'High-quality editorial support!',
                        'text' => "Copyediting and production were excellent.\nThe final publication was polished, readable, and consistent.",
                        'rating' => 5,
                        'link_url' => route('about'),
                    ],
                    [
                        'name' => 'John Peterson',
                        'role' => 'Software Developer',
                        'date' => '10 Days Ago',
                        'sub_title' => 'A great publishing partner!',
                        'text' => "We value the ethical standards and transparency.\nOpen access distribution helped our work reach a broader audience.",
                        'rating' => 5,
                        'link_url' => route('about'),
                    ],
                ],
            ],
            'blog_detail' => [
                'hero' => 'assets/images/blog/blog-details-img-1.jpg',
                'title' => 'Scientific News: How AI “Digital Twins” Support Surgical Planning',
                'author' => 'Med Open Press Editorial',
                'comments' => '30 Comments',
                'published' => 'February 15, 2026',
            ],
            'blog' => [
                'tagline' => 'OUR INSIGHT',
                'heading_html' => 'Discover Insights and <span>Tips </span> <br><span>in Our Latest Articles</span>',
                'button_text' => 'View All Scientific News',
                'button_url' => '/blog',
                'cards' => [
                    [
                        'day' => '05',
                        'month' => 'NOV',
                        'tags' => 'Cardiology and Cardiovascular Medicine|Internal Medicine',
                        'title' => 'Reporting Standards for Cardiology & Internal Medicine Manuscripts',
                        'text' => 'Practical tips for outcomes, methods clarity, and ethical disclosures.',
                        'link_url' => '/blog-details',
                    ],
                    [
                        'day' => '24',
                        'month' => 'APR',
                        'tags' => 'Orthopedics and Sports Medicine|Neurosurgery',
                        'title' => 'Surgical Case Reports: Orthopedics & Neurosurgery Submission Essentials',
                        'text' => 'Consent, imaging, and follow-up reporting tips for high-quality cases.',
                        'link_url' => '/blog-details',
                    ],
                    [
                        'day' => '12',
                        'month' => 'Sep',
                        'tags' => 'Dermatology|Obstetrics & Gynecology',
                        'title' => 'Clinical Images & Figures: Dermatology and OB/GYN Best Practices',
                        'text' => 'Resolution, anonymization, and figure legends for submission.',
                        'link_url' => '/blog-details',
                    ],
                    [
                        'day' => '30',
                        'month' => 'DEC',
                        'tags' => 'Psychiatry and Mental Health|Urology',
                        'title' => 'Ethics & Sensitive Data: Psychiatry and Urology Research Submissions',
                        'text' => 'Guidance on consent, confidentiality, and responsible reporting.',
                        'link_url' => '/blog-details',
                    ],
                ],
            ],

            'blog_sidebar' => [
                'search' => [
                    'title' => 'Search Scientific News',
                    'text' => 'Search Explore a world of diverse scientific news topics to stay informed and inspired.',
                    'placeholder' => 'Search here',
                ],
                'categories' => [
                    ['slug' => 'cardiology', 'label' => 'Cardiology and Cardiovascular Medicine', 'count' => '15'],
                    ['slug' => 'orthopedics', 'label' => 'Orthopedics and Sports Medicine', 'count' => '20'],
                    ['slug' => 'dermatology', 'label' => 'Dermatology', 'count' => '42'],
                    ['slug' => 'internal-medicine', 'label' => 'Internal Medicine', 'count' => '89'],
                    ['slug' => 'anesthesiology', 'label' => 'Anesthesiology and Pain Medicine', 'count' => '9'],
                    ['slug' => 'psychiatry', 'label' => 'Psychiatry and Mental Health', 'count' => '12'],
                    ['slug' => 'neurosurgery', 'label' => 'Neurosurgery', 'count' => '18'],
                    ['slug' => 'urology', 'label' => 'Urology', 'count' => '10'],
                    ['slug' => 'obgyn', 'label' => 'Obstetrics & Gynecology', 'count' => '16'],
                ],
                'keywords' => [
                    'Peer Review',
                    'Reporting Standards',
                    'Ethics',
                    'Clinical Images',
                    'Statistics',
                    'Transparency',
                    'Open Access',
                ],
                'subscribe' => [
                    'title' => 'Subscribe',
                    'text' => 'Subscribe to our newsletter to get daily updates about our scientific news.',
                    'placeholder' => 'Enter Your Email',
                    'button_text' => 'Subscribe',
                ],
            ],
        ];

        $home = array_replace_recursive($defaults, $home);

        $setIfBlank = function (string $path) use (&$home, $defaults) {
            $current = data_get($home, $path);
            $default = data_get($defaults, $path);

            $currentIsBlank = is_string($current) ? trim($current) === '' : $current === null;
            $defaultIsUsable = is_string($default) ? trim($default) !== '' : $default !== null;

            if ($currentIsBlank && $defaultIsUsable) {
                data_set($home, $path, $default);
            }
        };

        $setIfEmptyArray = function (string $path) use (&$home, $defaults) {
            $current = (array) data_get($home, $path, []);
            if (count($current) === 0) {
                $default = (array) data_get($defaults, $path, []);
                if (count($default) > 0) {
                    data_set($home, $path, $default);
                }
            }
        };

        foreach ([
            'banner.title',
            'banner.typed_strings',
            'banner.text',
            'banner.button_text',
            'banner.button_url',
            'about.heading_html',
            'about.text',
            'about_page.heading_html',
            'about_page.text',
            'manuscript.subtitle',
            'testimonials.tagline',
            'testimonials.heading_html',
            'blog.heading_html',
            'blog_detail.hero',
            'blog_detail.title',
            'blog_detail.author',
            'blog_detail.comments',
            'blog_detail.published',
        ] as $path) {
            $setIfBlank($path);
        }

        foreach ([
            'sliding_text',
            'about.points',
            'counters',
            'manuscript.category_options',
            'testimonials.items',
            'blog.cards',
            'about_page.counters',
        ] as $path) {
            $setIfEmptyArray($path);
        }

        // If testimonials exists but all rows are blank, treat as empty and fallback to defaults.
        $testimonialItems = (array) data_get($home, 'testimonials.items', []);
        $testimonialItemsHasContent = count(array_filter($testimonialItems, function ($t) {
            return trim((string) data_get($t, 'name')) !== '' || trim((string) data_get($t, 'text')) !== '';
        })) > 0;
        if (!$testimonialItemsHasContent) {
            $defaultTestimonialItems = (array) data_get($defaults, 'testimonials.items', []);
            if (count($defaultTestimonialItems) > 0) {
                data_set($home, 'testimonials.items', $defaultTestimonialItems);
            }
        }

        $banner = (array) data_get($home, 'banner', []);

        $partnerImages = (array) data_get($banner, 'satisfied_partner.images', []);
        if (count($partnerImages) === 0) {
            $partnerImages = array_fill(0, 3, []);
        }

        $slidingTextLines = implode("\n", (array) data_get($home, 'sliding_text', []));

        $about = data_get($home, 'about', []);
        $aboutText = data_get($about, 'text', '');
        $aboutHeadingHtml = data_get($about, 'heading_html', '');
        $aboutPoints = (array) data_get($about, 'points', []);
        $aboutPointsLines = implode("\n", array_map(function ($p) {
            $icon = data_get($p, 'icon', 'icon-check');
            $text = data_get($p, 'text', '');
            return $icon . '|' . $text;
        }, $aboutPoints));

        $aboutPage = (array) data_get($home, 'about_page', []);
        $aboutPageTagline = (string) data_get($aboutPage, 'tagline', 'About Us');
        $aboutPageHeadingHtml = (string) data_get($aboutPage, 'heading_html', '');
        $aboutPageText = (string) data_get($aboutPage, 'text', '');
        $aboutPageConsultText = (string) data_get($aboutPage, 'consultation_button_text', 'Consultation');
        $aboutPageConsultUrl = (string) data_get($aboutPage, 'consultation_button_url', 'https://wa.me/628971399093');
        $aboutPageOfficeHours = (string) data_get($aboutPage, 'office_hours', 'Office Hours: 10:00 AM - 8:00 PM');
        $aboutPagePhone = (string) data_get($aboutPage, 'phone', '+62 897 1399 093');

        $aboutPageImages = (array) data_get($aboutPage, 'images', []);
        if (count($aboutPageImages) === 0) {
            $aboutPageImages = array_fill(0, 4, []);
        } else {
            $aboutPageImages = array_slice(array_pad($aboutPageImages, 4, []), 0, 4);
        }

        $aboutPageCounters = (array) data_get($aboutPage, 'counters', []);
        if (count($aboutPageCounters) === 0) {
            $aboutPageCounters = (array) data_get($defaults, 'about_page.counters', []);
        }
        $aboutPageCounters = array_slice(array_pad($aboutPageCounters, 3, []), 0, 3);

        $aboutPageVision = (array) data_get($aboutPage, 'vision', []);
        if (trim((string) data_get($aboutPageVision, 'title', '')) === ''
            && trim((string) data_get($aboutPageVision, 'subtitle', '')) === ''
            && trim((string) data_get($aboutPageVision, 'text', '')) === '') {
            $aboutPageVision = [
                'title' => 'Our Vision',
                'subtitle' => 'A global exchange of knowledge that advances medicine.',
                'text' => 'Med Open Press envisions itself as a preeminent force in medical publishing, facilitating the global exchange of knowledge that fosters innovation, enhances clinical practice, and drives progress in medical science. Our goal is to empower healthcare professionals and researchers with the resources necessary to confront and overcome the most significant health challenges of our time.',
            ];
        }

        $aboutPageMission = (array) data_get($aboutPage, 'mission', []);
        if (trim((string) data_get($aboutPageMission, 'title', '')) === ''
            && trim((string) data_get($aboutPageMission, 'subtitle', '')) === ''
            && count((array) data_get($aboutPageMission, 'points', [])) === 0) {
            $aboutPageMission = [
                'title' => 'Our Mission',
                'subtitle' => 'How we deliver excellence, access, and trust.',
                'points' => [
                    ['title' => 'Excellence in Publishing:', 'text' => 'To produce and disseminate peer-reviewed medical literature of the highest quality, reflecting the forefront of research and clinical practice.'],
                    ['title' => 'Global Accessibility:', 'text' => 'To ensure the worldwide accessibility of our publications, thereby bridging disparities in knowledge and practice across diverse healthcare settings.'],
                    ['title' => 'Promotion of Innovation:', 'text' => 'To collaborate with leading experts, academic institutions, and professional societies in medicine, thereby fostering the development and dissemination of pioneering research.'],
                    ['title' => 'Commitment to Education:', 'text' => 'To provide robust educational resources that support the continuous professional development of healthcare providers, enhancing their ability to deliver superior patient care.'],
                    ['title' => 'Adherence to Ethical Standards:', 'text' => 'To uphold the utmost ethical principles in all facets of publishing, guaranteeing transparency, accountability, and integrity in our operations and outputs.'],
                ],
            ];
        }

        $aboutPageMissionPoints = (array) data_get($aboutPageMission, 'points', []);
        $aboutPageMissionPointsLines = implode("\n", array_map(function ($p) {
            $title = (string) data_get($p, 'title', '');
            $text = (string) data_get($p, 'text', '');
            return $title . '|' . $text;
        }, $aboutPageMissionPoints));

        $counters = (array) data_get($home, 'counters', []);
        if (count($counters) === 0) {
            $counters = (array) data_get($defaults, 'counters', []);
        }
        $counters = array_slice(array_pad($counters, 4, []), 0, 4);

        $manuscript = (array) data_get($home, 'manuscript', []);
        $manuscriptCategoryLines = implode("\n", (array) data_get($manuscript, 'category_options', []));

        $testimonials = (array) data_get($home, 'testimonials.items', []);
        if (count($testimonials) === 0) {
            $testimonials = (array) data_get($defaults, 'testimonials.items', []);
        }
        $testimonials = array_slice(array_pad($testimonials, 4, []), 0, 4);

        $blogCards = (array) data_get($home, 'blog.cards', []);
        if (count($blogCards) === 0) {
            $blogCards = (array) data_get($defaults, 'blog.cards', []);
        }
        $blogCards = array_slice(array_pad($blogCards, 4, []), 0, 4);
    @endphp

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title mb-0">Home Page Settings</h5>
                        <div class="text-muted small">Edit Home content in one form (no CRUD). Changes are saved to <code>Settings: home</code>.</div>
                        <div class="text-muted small">Tip: If uploaded images don't show on the website, ensure storage link exists: <code>php artisan storage:link</code>.</div>
                    </div>
                    <a href="{{ url('/') }}" target="_blank" class="btn btn-outline-secondary btn-sm">
                        Preview Website
                    </a>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.ejournal.settings.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="border rounded">
                            <div class="row g-0">
                            <div class="col-12 col-lg-3 border-lg-end">
                                <div class="p-3 sticky-top ejournal-settings-sidebar">
                                    <div class="fw-semibold mb-2">Sections</div>

                                    <div class="text-muted small mb-2">Home</div>
                                    <div class="list-group mb-3">
                                        <a class="list-group-item list-group-item-action py-2" href="#section-banner">Banner</a>
                                        <a class="list-group-item list-group-item-action py-2" href="#section-sliding-text">Sliding Text</a>
                                        <a class="list-group-item list-group-item-action py-2" href="#section-about">About</a>
                                    </div>

                                    <div class="text-muted small mb-2">Other</div>
                                    <div class="list-group">
                                        <a class="list-group-item list-group-item-action py-2" href="#section-counters">Counters</a>
                                        <a class="list-group-item list-group-item-action py-2" href="#section-blog-cards">Scientific News Cards</a>
                                        <a class="list-group-item list-group-item-action py-2" href="#section-blog-sidebar">Scientific News Sidebar</a>
                                        <a class="list-group-item list-group-item-action py-2" href="#section-blog-detail">Scientific News Detail</a>
                                        <a class="list-group-item list-group-item-action py-2" href="#section-submit-manuscript">Submit Manuscript</a>
                                        <a class="list-group-item list-group-item-action py-2" href="#section-testimonials">Testimonials</a>
                                    </div>

                                    <hr class="my-3" />
                                    <button type="submit" class="btn btn-primary w-100">Save Settings</button>
                                </div>
                            </div>

                            <div class="col-12 col-lg-9">
                                <div class="p-3">
                                <div class="row g-3">
                            <div class="col-12" id="section-banner">
                                <h6 class="mb-1">Banner</h6>
                                <div class="text-muted small">Hero title, typed strings, button, and image.</div>
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label">Title</label>
                                <input class="form-control" name="home[banner][title]" value="{{ old('home.banner.title', data_get($banner, 'title')) }}">
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label">Typed Strings (comma-separated)</label>
                                <input class="form-control" name="home[banner][typed_strings]" value="{{ old('home.banner.typed_strings', data_get($banner, 'typed_strings')) }}">
                            </div>

                            <div class="col-12">
                                <label class="form-label">Text</label>
                                <textarea class="form-control" name="home[banner][text]" rows="3">{{ old('home.banner.text', data_get($banner, 'text')) }}</textarea>
                            </div>

                            <div class="col-12 col-md-4">
                                <label class="form-label">Button Text</label>
                                <input class="form-control" name="home[banner][button_text]" value="{{ old('home.banner.button_text', data_get($banner, 'button_text')) }}">
                            </div>
                            <div class="col-12 col-md-8">
                                <label class="form-label">Button URL</label>
                                <input class="form-control" name="home[banner][button_url]" value="{{ old('home.banner.button_url', data_get($banner, 'button_url')) }}">
                            </div>

                            <div class="col-12">
                                <div class="border rounded p-3">
                                    <div class="fw-semibold mb-2">Banner Stats</div>
                                    <div class="row g-3">
                                        <div class="col-12 col-md-4">
                                            <label class="form-label">Authors &amp; Reviewers Count</label>
                                            <input class="form-control" type="number" name="home[banner][satisfied_partner][count]" value="{{ old('home.banner.satisfied_partner.count', data_get($banner, 'satisfied_partner.count', 200)) }}">
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <label class="form-label">Authors &amp; Reviewers Suffix</label>
                                            <input class="form-control" name="home[banner][satisfied_partner][suffix]" value="{{ old('home.banner.satisfied_partner.suffix', data_get($banner, 'satisfied_partner.suffix', 'K+')) }}" placeholder="K+">
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <label class="form-label">Authors &amp; Reviewers Label</label>
                                            <input class="form-control" name="home[banner][satisfied_partner][label]" value="{{ old('home.banner.satisfied_partner.label', data_get($banner, 'satisfied_partner.label', 'Authors & Reviewers')) }}">
                                        </div>

                                        <div class="col-12 col-md-4">
                                            <label class="form-label">Google Rating Count</label>
                                            <input class="form-control" type="number" name="home[banner][google_rating][count]" value="{{ old('home.banner.google_rating.count', data_get($banner, 'google_rating.count', 12)) }}">
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <label class="form-label">Google Rating Suffix</label>
                                            <input class="form-control" name="home[banner][google_rating][suffix]" value="{{ old('home.banner.google_rating.suffix', data_get($banner, 'google_rating.suffix', 'k Ratings')) }}" placeholder="k Ratings">
                                        </div>

                                        <div class="col-12 col-md-4">
                                            <label class="form-label">Google Stars (0-5)</label>
                                            <input class="form-control" type="number" min="0" max="5" name="home[banner][google_rating][stars]" value="{{ old('home.banner.google_rating.stars', data_get($banner, 'google_rating.stars', 2)) }}">
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <label class="form-label">Google Rating Image Upload</label>
                                            <input class="form-control" type="file" name="home[banner][google_rating][image_file]" accept="image/*">
                                            @if(data_get($banner, 'google_rating.image'))
                                                <div class="form-text">Current: {{ data_get($banner, 'google_rating.image') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="border rounded p-3">
                                    <div class="fw-semibold mb-2">Banner Partner Images</div>
                                    <div class="text-muted small mb-2">Upload up to 3 small partner images.</div>
                                    <div class="row g-3">
                                        @foreach($partnerImages as $i => $img)
                                            <div class="col-12 col-md-4">
                                                <label class="form-label">Image #{{ $i + 1 }}</label>
                                                <input class="form-control" type="file" name="home[banner][satisfied_partner][images][{{ $i }}][image_file]" accept="image/*">
                                                @if(data_get($img, 'image'))
                                                    <div class="form-text">Current: {{ data_get($img, 'image') }}</div>
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label">Banner Image Upload</label>
                                <input class="form-control" type="file" name="home[banner][image_file]" accept="image/*">
                                @if(data_get($banner, 'image'))
                                    <div class="form-text">Current: {{ data_get($banner, 'image') }}</div>
                                @endif
                            </div>

                            <hr class="my-2" />

                            <div class="col-12" id="section-sliding-text">
                                <h6 class="mb-1">Sliding Text</h6>
                                <div class="text-muted small">One line per item.</div>
                            </div>
                            <div class="col-12">
                                <textarea class="form-control" name="home[sliding_text_lines]" rows="6">{{ old('home.sliding_text_lines', $slidingTextLines) }}</textarea>
                            </div>

                            <hr class="my-2" />

                            <div class="col-12" id="section-about">
                                <h6 class="mb-1">About</h6>
                                <div class="text-muted small">Text + points list (format: <code>icon-class|text</code>, icon optional).</div>
                                <div class="text-muted small">Used on Home page (section About). The About page (<code>/about</code>) has its own fields below.</div>
                            </div>

                            <div class="col-12 col-md-4">
                                <label class="form-label">Tagline</label>
                                <input class="form-control" name="home[about][tagline]" value="{{ old('home.about.tagline', data_get($about, 'tagline', 'About Us')) }}">
                            </div>

                            <div class="col-12">
                                <label class="form-label">Heading HTML (allowed: &lt;br&gt; and &lt;span&gt;)</label>
                                <textarea class="form-control" name="home[about][heading_html]" rows="3">{{ old('home.about.heading_html', $aboutHeadingHtml) }}</textarea>
                                <div class="form-text">If you need a line break, use <code>&lt;br&gt;</code>. Only <code>&lt;br&gt;</code> and <code>&lt;span&gt;</code> are saved.</div>
                            </div>

                            <div class="col-12">
                                <label class="form-label">About Text</label>
                                <textarea class="form-control" name="home[about][text]" rows="4">{{ old('home.about.text', $aboutText) }}</textarea>
                            </div>
                            <div class="col-12">
                                <label class="form-label">About Points</label>
                                <textarea class="form-control" name="home[about][points_lines]" rows="8">{{ old('home.about.points_lines', $aboutPointsLines) }}</textarea>
                                <div class="form-text">Example lines: <code>icon-check|Peer review &amp; editorial rigor</code> or just <code>Peer review &amp; editorial rigor</code>.</div>
                            </div>

                            <div class="col-12">
                                <div class="border rounded p-3">
                                    <div class="fw-semibold mb-2">About CTA</div>
                                    <div class="row g-3">
                                        <div class="col-12 col-md-4">
                                            <label class="form-label">Button Text</label>
                                            <input class="form-control" name="home[about][button_text]" value="{{ old('home.about.button_text', data_get($about, 'button_text', 'Know More')) }}">
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <label class="form-label">Button URL</label>
                                            <input class="form-control" name="home[about][button_url]" value="{{ old('home.about.button_url', data_get($about, 'button_url', '/about')) }}">
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="form-label">Office Hours</label>
                                            <input class="form-control" name="home[about][office_hours]" value="{{ old('home.about.office_hours', data_get($about, 'office_hours', 'Office Hours: 10:00 AM - 8:00 PM')) }}">
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="form-label">Phone</label>
                                            <input class="form-control" name="home[about][phone]" value="{{ old('home.about.phone', data_get($about, 'phone', '+62 897 1399 093')) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr class="my-2" />

                            <hr class="my-2" />

                            <div class="col-12" id="section-counters">
                                <h6 class="mb-1">Counters</h6>
                                <div class="text-muted small">Configure up to 4 counters.</div>
                            </div>

                            @foreach($counters as $i => $counter)
                                <div class="col-12 col-md-6">
                                    <div class="border rounded p-3">
                                        <div class="fw-semibold mb-2">Counter #{{ $i + 1 }}</div>
                                        <div class="row g-3">
                                            <div class="col-12">
                                                <label class="form-label">Icon Class</label>
                                                <input class="form-control" name="home[counters][{{ $i }}][icon]" value="{{ old('home.counters.' . $i . '.icon', data_get($counter, 'icon')) }}">
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label class="form-label">Count</label>
                                                <input class="form-control" type="number" name="home[counters][{{ $i }}][count]" value="{{ old('home.counters.' . $i . '.count', data_get($counter, 'count')) }}">
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label class="form-label">Suffixes (use | between)</label>
                                                <input class="form-control" name="home[counters][{{ $i }}][suffixes]" value="{{ old('home.counters.' . $i . '.suffixes', data_get($counter, 'suffixes')) }}" placeholder="k|+">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Label</label>
                                                <input class="form-control" name="home[counters][{{ $i }}][label]" value="{{ old('home.counters.' . $i . '.label', data_get($counter, 'label')) }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <hr class="my-2" />

                            <div class="col-12" id="section-blog-cards">
                                <h6 class="mb-1">Scientific News Cards</h6>
                                <div class="text-muted small">Configure 4 cards. Tags use | separator.</div>
                            </div>

                            <div class="col-12">
                                <div class="border rounded p-3">
                                    <div class="fw-semibold mb-2">Scientific News Heading</div>
                                    <div class="row g-3">
                                        <div class="col-12 col-md-4">
                                            <label class="form-label">Tagline</label>
                                            <input class="form-control" name="home[blog][tagline]" value="{{ old('home.blog.tagline', data_get($home, 'blog.tagline', 'OUR INSIGHT')) }}">
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Heading HTML (allowed: &lt;br&gt; and &lt;span&gt;)</label>
                                            <textarea class="form-control" name="home[blog][heading_html]" rows="3">{{ old('home.blog.heading_html', data_get($home, 'blog.heading_html')) }}</textarea>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <label class="form-label">Button Text</label>
                                            <input class="form-control" name="home[blog][button_text]" value="{{ old('home.blog.button_text', data_get($home, 'blog.button_text', 'View All Scientific News')) }}">
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <label class="form-label">Button URL</label>
                                            <input class="form-control" name="home[blog][button_url]" value="{{ old('home.blog.button_url', data_get($home, 'blog.button_url', '/blog')) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @foreach($blogCards as $i => $card)
                                <div class="col-12">
                                    <div class="border rounded p-3">
                                        <div class="fw-semibold mb-2">Card #{{ $i + 1 }}</div>
                                        <div class="row g-3">
                                            <div class="col-12 col-md-2">
                                                <label class="form-label">Day</label>
                                                <input class="form-control" name="home[blog][cards][{{ $i }}][day]" value="{{ old('home.blog.cards.' . $i . '.day', data_get($card, 'day')) }}" placeholder="05">
                                            </div>
                                            <div class="col-12 col-md-2">
                                                <label class="form-label">Month</label>
                                                <input class="form-control" name="home[blog][cards][{{ $i }}][month]" value="{{ old('home.blog.cards.' . $i . '.month', data_get($card, 'month')) }}" placeholder="NOV">
                                            </div>
                                            <div class="col-12 col-md-8">
                                                <label class="form-label">Tags (use | between)</label>
                                                <input class="form-control" name="home[blog][cards][{{ $i }}][tags]" value="{{ old('home.blog.cards.' . $i . '.tags', data_get($card, 'tags')) }}" placeholder="Tag 1|Tag 2">
                                            </div>

                                            <div class="col-12">
                                                <label class="form-label">Title</label>
                                                <input class="form-control" name="home[blog][cards][{{ $i }}][title]" value="{{ old('home.blog.cards.' . $i . '.title', data_get($card, 'title')) }}">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Text</label>
                                                <textarea class="form-control" name="home[blog][cards][{{ $i }}][text]" rows="2">{{ old('home.blog.cards.' . $i . '.text', data_get($card, 'text')) }}</textarea>
                                            </div>

                                            <div class="col-12">
                                                <label class="form-label">Link URL</label>
                                                <input class="form-control" name="home[blog][cards][{{ $i }}][link_url]" value="{{ old('home.blog.cards.' . $i . '.link_url', data_get($card, 'link_url')) }}">
                                            </div>

                                            <div class="col-12 col-md-6">
                                                <label class="form-label">Image Upload</label>
                                                <input class="form-control" type="file" name="home[blog][cards][{{ $i }}][image_file]" accept="image/*">
                                                @if(data_get($card, 'image'))
                                                    <div class="form-text">Current: {{ data_get($card, 'image') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            @php
                                $blogSidebar = (array) data_get($home, 'blog_sidebar', []);

                                $blogSidebarSearch = (array) data_get($blogSidebar, 'search', []);
                                $blogSidebarCategories = (array) data_get($blogSidebar, 'categories', []);
                                if (count($blogSidebarCategories) === 0) {
                                    $blogSidebarCategories = (array) data_get($defaults, 'blog_sidebar.categories', []);
                                }
                                $blogSidebarCategories = array_slice(array_pad($blogSidebarCategories, 9, []), 0, 9);

                                $blogSidebarKeywordsLines = implode("\n", (array) data_get($blogSidebar, 'keywords', []));
                                if (trim($blogSidebarKeywordsLines) === '') {
                                    $blogSidebarKeywordsLines = implode("\n", (array) data_get($defaults, 'blog_sidebar.keywords', []));
                                }

                                $blogSidebarSubscribe = (array) data_get($blogSidebar, 'subscribe', []);
                            @endphp

                            <hr class="my-2" />

                            <div class="col-12" id="section-blog-sidebar">
                                <h6 class="mb-1">Scientific News Sidebar</h6>
                                <div class="text-muted small">Controls Search / Category / Keywords / Subscribe blocks on Scientific News pages.</div>
                            </div>

                            <div class="col-12">
                                <div class="border rounded p-3">
                                    <div class="fw-semibold mb-2">Search Block</div>
                                    <div class="row g-3">
                                        <div class="col-12 col-md-4">
                                            <label class="form-label">Title</label>
                                            <input class="form-control" name="home[blog_sidebar][search][title]" value="{{ old('home.blog_sidebar.search.title', data_get($blogSidebarSearch, 'title')) }}">
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <label class="form-label">Text</label>
                                            <input class="form-control" name="home[blog_sidebar][search][text]" value="{{ old('home.blog_sidebar.search.text', data_get($blogSidebarSearch, 'text')) }}">
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="form-label">Placeholder</label>
                                            <input class="form-control" name="home[blog_sidebar][search][placeholder]" value="{{ old('home.blog_sidebar.search.placeholder', data_get($blogSidebarSearch, 'placeholder')) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="border rounded p-3">
                                    <div class="fw-semibold mb-2">Categories (max 9)</div>
                                    <div class="text-muted small mb-2">Each item links to <code>/blog/category/{slug}</code>. Count is display-only.</div>

                                    <div class="row g-3">
                                        @foreach($blogSidebarCategories as $i => $cat)
                                            <div class="col-12">
                                                <div class="border rounded p-3">
                                                    <div class="fw-semibold mb-2">Category #{{ $i + 1 }}</div>
                                                    <div class="row g-3">
                                                        <div class="col-12 col-md-4">
                                                            <label class="form-label">Slug</label>
                                                            <input class="form-control" name="home[blog_sidebar][categories][{{ $i }}][slug]" value="{{ old('home.blog_sidebar.categories.' . $i . '.slug', data_get($cat, 'slug')) }}" placeholder="cardiology">
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <label class="form-label">Label</label>
                                                            <input class="form-control" name="home[blog_sidebar][categories][{{ $i }}][label]" value="{{ old('home.blog_sidebar.categories.' . $i . '.label', data_get($cat, 'label')) }}">
                                                        </div>
                                                        <div class="col-12 col-md-2">
                                                            <label class="form-label">Count</label>
                                                            <input class="form-control" name="home[blog_sidebar][categories][{{ $i }}][count]" value="{{ old('home.blog_sidebar.categories.' . $i . '.count', data_get($cat, 'count')) }}" placeholder="15">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="border rounded p-3">
                                    <div class="fw-semibold mb-2">Keywords (one per line)</div>
                                    <textarea class="form-control" name="home[blog_sidebar][keywords_lines]" rows="5">{{ old('home.blog_sidebar.keywords_lines', $blogSidebarKeywordsLines) }}</textarea>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="border rounded p-3">
                                    <div class="fw-semibold mb-2">Subscribe Block</div>
                                    <div class="row g-3">
                                        <div class="col-12 col-md-4">
                                            <label class="form-label">Title</label>
                                            <input class="form-control" name="home[blog_sidebar][subscribe][title]" value="{{ old('home.blog_sidebar.subscribe.title', data_get($blogSidebarSubscribe, 'title')) }}">
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Text</label>
                                            <input class="form-control" name="home[blog_sidebar][subscribe][text]" value="{{ old('home.blog_sidebar.subscribe.text', data_get($blogSidebarSubscribe, 'text')) }}">
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="form-label">Email Placeholder</label>
                                            <input class="form-control" name="home[blog_sidebar][subscribe][placeholder]" value="{{ old('home.blog_sidebar.subscribe.placeholder', data_get($blogSidebarSubscribe, 'placeholder')) }}">
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="form-label">Button Text</label>
                                            <input class="form-control" name="home[blog_sidebar][subscribe][button_text]" value="{{ old('home.blog_sidebar.subscribe.button_text', data_get($blogSidebarSubscribe, 'button_text')) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr class="my-2" />

                            <div class="col-12" id="section-blog-detail">
                                <h6 class="mb-1">Scientific News Detail Page</h6>
                                <div class="text-muted small">Controls the <code>/blog-details</code> hero + meta. (Scientific News list uses Scientific News Cards above to avoid double input.)</div>
                            </div>

                            <div class="col-12">
                                <div class="border rounded p-3">
                                    <div class="row g-3">
                                        <div class="col-12 col-md-6">
                                            <label class="form-label">Hero Image Path</label>
                                            <input class="form-control" name="home[blog_detail][hero]" value="{{ old('home.blog_detail.hero', data_get($home, 'blog_detail.hero')) }}">
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="form-label">Hero Image Upload</label>
                                            <input class="form-control" type="file" name="home[blog_detail][hero_file]" accept="image/*">
                                            @if(data_get($home, 'blog_detail.hero'))
                                                <div class="form-text">Current: {{ data_get($home, 'blog_detail.hero') }}</div>
                                            @endif
                                        </div>

                                        <div class="col-12">
                                            <label class="form-label">Title</label>
                                            <input class="form-control" name="home[blog_detail][title]" value="{{ old('home.blog_detail.title', data_get($home, 'blog_detail.title')) }}">
                                        </div>

                                        <div class="col-12 col-md-4">
                                            <label class="form-label">Author</label>
                                            <input class="form-control" name="home[blog_detail][author]" value="{{ old('home.blog_detail.author', data_get($home, 'blog_detail.author')) }}">
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <label class="form-label">Comments Label</label>
                                            <input class="form-control" name="home[blog_detail][comments]" value="{{ old('home.blog_detail.comments', data_get($home, 'blog_detail.comments')) }}">
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <label class="form-label">Published Label</label>
                                            <input class="form-control" name="home[blog_detail][published]" value="{{ old('home.blog_detail.published', data_get($home, 'blog_detail.published')) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr class="my-2" />

                            <div class="col-12" id="section-submit-manuscript">
                                <h6 class="mb-1">Submit Manuscript Box</h6>
                                <div class="text-muted small">Title/subtitle + placeholders + category options.</div>
                            </div>
                            <div class="col-12">
                                <div class="border rounded p-3">
                                    <div class="row g-3">
                                        <div class="col-12 col-md-6">
                                            <label class="form-label">Title</label>
                                            <input class="form-control" name="home[manuscript][title]" value="{{ old('home.manuscript.title', data_get($manuscript, 'title', 'Submit Manuscript')) }}">
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="form-label">Subtitle</label>
                                            <input class="form-control" name="home[manuscript][subtitle]" value="{{ old('home.manuscript.subtitle', data_get($manuscript, 'subtitle')) }}">
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <label class="form-label">Name Placeholder</label>
                                            <input class="form-control" name="home[manuscript][name_placeholder]" value="{{ old('home.manuscript.name_placeholder', data_get($manuscript, 'name_placeholder', 'Your Name')) }}">
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <label class="form-label">Email Placeholder</label>
                                            <input class="form-control" name="home[manuscript][email_placeholder]" value="{{ old('home.manuscript.email_placeholder', data_get($manuscript, 'email_placeholder', 'Your Email')) }}">
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <label class="form-label">Phone Placeholder</label>
                                            <input class="form-control" name="home[manuscript][phone_placeholder]" value="{{ old('home.manuscript.phone_placeholder', data_get($manuscript, 'phone_placeholder', 'Phone')) }}">
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <label class="form-label">Category Placeholder</label>
                                            <input class="form-control" name="home[manuscript][category_placeholder]" value="{{ old('home.manuscript.category_placeholder', data_get($manuscript, 'category_placeholder', 'Choose a Category')) }}">
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <label class="form-label">Category Options (one line per option)</label>
                                            <textarea class="form-control" name="home[manuscript][category_options_lines]" rows="4">{{ old('home.manuscript.category_options_lines', $manuscriptCategoryLines) }}</textarea>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <label class="form-label">Button Text</label>
                                            <input class="form-control" name="home[manuscript][button_text]" value="{{ old('home.manuscript.button_text', data_get($manuscript, 'button_text', 'Request Info')) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr class="my-2" />

                            <div class="col-12" id="section-testimonials">
                                <h6 class="mb-1">Testimonials</h6>
                                <div class="text-muted small">Heading + up to 4 items.</div>
                            </div>

                            <div class="col-12">
                                <div class="border rounded p-3">
                                    <div class="row g-3">
                                        <div class="col-12 col-md-4">
                                            <label class="form-label">Tagline</label>
                                            <input class="form-control" name="home[testimonials][tagline]" value="{{ old('home.testimonials.tagline', data_get($home, 'testimonials.tagline', 'OUR TESTIMONIAL')) }}">
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Heading HTML (allowed: &lt;br&gt; and &lt;span&gt;)</label>
                                            <textarea class="form-control" name="home[testimonials][heading_html]" rows="3">{{ old('home.testimonials.heading_html', data_get($home, 'testimonials.heading_html')) }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @foreach($testimonials as $i => $t)
                                <div class="col-12">
                                    <div class="border rounded p-3">
                                        <div class="fw-semibold mb-2">Testimonial #{{ $i + 1 }}</div>
                                        <div class="row g-3">
                                            <div class="col-12 col-md-4">
                                                <label class="form-label">Name</label>
                                                <input class="form-control" name="home[testimonials][items][{{ $i }}][name]" value="{{ old('home.testimonials.items.' . $i . '.name', data_get($t, 'name')) }}">
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <label class="form-label">Role</label>
                                                <input class="form-control" name="home[testimonials][items][{{ $i }}][role]" value="{{ old('home.testimonials.items.' . $i . '.role', data_get($t, 'role')) }}">
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <label class="form-label">Date</label>
                                                <input class="form-control" name="home[testimonials][items][{{ $i }}][date]" value="{{ old('home.testimonials.items.' . $i . '.date', data_get($t, 'date')) }}">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Subtitle</label>
                                                <input class="form-control" name="home[testimonials][items][{{ $i }}][sub_title]" value="{{ old('home.testimonials.items.' . $i . '.sub_title', data_get($t, 'sub_title')) }}">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Text (allowed: &lt;br&gt;)</label>
                                                <textarea class="form-control" name="home[testimonials][items][{{ $i }}][text]" rows="3">{{ old('home.testimonials.items.' . $i . '.text', data_get($t, 'text')) }}</textarea>
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <label class="form-label">Rating (0-5)</label>
                                                <input class="form-control" type="number" min="0" max="5" name="home[testimonials][items][{{ $i }}][rating]" value="{{ old('home.testimonials.items.' . $i . '.rating', data_get($t, 'rating', 5)) }}">
                                            </div>
                                            <div class="col-12 col-md-8">
                                                <label class="form-label">Link URL</label>
                                                <input class="form-control" name="home[testimonials][items][{{ $i }}][link_url]" value="{{ old('home.testimonials.items.' . $i . '.link_url', data_get($t, 'link_url', route('about'))) }}">
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label class="form-label">Image Upload</label>
                                                <input class="form-control" type="file" name="home[testimonials][items][{{ $i }}][image_file]" accept="image/*">
                                                @if(data_get($t, 'image'))
                                                    <div class="form-text">Current: {{ data_get($t, 'image') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Save Settings</button>
                            </div>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
