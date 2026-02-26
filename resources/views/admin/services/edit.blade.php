@extends('admin.partials.Layouts.master')

@section('title', 'Services Settings | Admin')
@section('title-sub', 'Settings')
@section('pagetitle', 'Services Settings')

@section('content')
    @php
        $home = (array) ($home ?? []);

        $services = (array) data_get($home, 'services', []);
        $servicesPage = (array) data_get($home, 'services_page', []);
        $servicesDetail = (array) data_get($home, 'services_detail', []);

        $defaultTabs = [
            [
                'button_label' => "Book\nPublishing",
                'slug' => 'book-publishing',
                'icon' => 'icon-file',
                'title' => 'Book Publishing',
                'text' => 'Medical books, monographs, and educational references supported by editorial review, professional copyediting, design, and production.',
                'small_label' => 'Books',
                'small_sublabel' => 'Publishing',
                'button_text' => 'Learn More',
                'button_url' => '/book-publishing',
            ],
            [
                'button_label' => "Scientific Journal\nPublication",
                'slug' => 'journal-publication',
                'icon' => 'icon-review',
                'title' => 'Scientific Journal Publication',
                'text' => 'End-to-end journal publishing workflows: submissions, peer review coordination, editorial decisions, production, and online publication.',
                'small_label' => 'Journals',
                'small_sublabel' => 'Workflow',
                'button_text' => 'Learn More',
                'button_url' => '/journal-publication',
            ],
            [
                'button_label' => "IPR\nManagement",
                'slug' => 'ipr-management',
                'icon' => 'icon-completed-task',
                'title' => 'Intellectual Property Rights Management (IPR)',
                'text' => 'Copyright, permissions, and licensing guidance to protect author rights and support compliant publication across formats and channels.',
                'small_label' => 'Rights',
                'small_sublabel' => 'Compliance',
                'button_text' => 'Learn More',
                'button_url' => '/ipr-management',
            ],
            [
                'button_label' => "Custom Publishing\nSolutions",
                'slug' => 'custom-publishing',
                'icon' => 'icon-app',
                'title' => 'Custom Publishing Solutions',
                'text' => 'Tailored publishing programs for societies, institutions, special issues, and supplements with flexible workflows and timelines.',
                'small_label' => 'Custom',
                'small_sublabel' => 'Solutions',
                'button_text' => 'Learn More',
                'button_url' => '/custom-publishing',
            ],
            [
                'button_label' => "Distribution\n& Licensing",
                'slug' => 'distribution-licensing',
                'icon' => 'icon-share',
                'title' => 'Distribution and Licensing',
                'text' => 'Digital/print distribution options and licensing pathways to expand reach responsibly across platforms, partners, and regions.',
                'small_label' => 'Reach',
                'small_sublabel' => 'Licensing',
                'button_text' => 'Learn More',
                'button_url' => '/distribution-licensing',
            ],
        ];

        $tabs = (array) data_get($services, 'tabs', []);
        if (count($tabs) === 0) {
            $tabs = $defaultTabs;
        }
        $tabs = array_slice(array_pad($tabs, 5, []), 0, 5);

        $servicesPageDefaults = [
            'workflow' => [
                'tagline' => 'WHY CHOOSE US',
                'heading_html' => 'Our Editorial Workflow<br><span>From submission to publication</span>',
                'items' => [
                    [
                        'icon' => 'icon-file',
                        'title_html' => 'Submit Your <br>Manuscript',
                        'text' => 'Share your research with our editorial office and receive guidance on scope, requirements, and policies.',
                        'url' => '/journals',
                    ],
                    [
                        'icon' => 'icon-review',
                        'title_html' => 'Peer Review <br>& Revision',
                        'text' => 'Independent expert review and constructive feedback to strengthen scientific validity and clinical relevance.',
                        'url' => '/journals',
                    ],
                    [
                        'icon' => 'icon-completed-task',
                        'title_html' => 'Editorial Decision <br>& Ethics',
                        'text' => 'Transparent editorial decisions supported by ethical standards, accountability, and integrity.',
                        'url' => '/journals',
                    ],
                    [
                        'icon' => 'icon-share',
                        'title_html' => 'Production <br>& Publication',
                        'text' => 'Copyediting, typesetting, and online publication to ensure quality and global accessibility.',
                        'url' => '/journals',
                    ],
                ],
            ],
            'faq' => [
                'tagline' => 'FAQs',
                'heading_html' => 'Your Questions Answered <br><span>Publishing Support FAQs</span>',
                'text' => 'Everything you need to know about submissions, peer review, and publishing support.',
                'points' => [
                    'A practical guide to our editorial workflow <br> and support services',
                    'Find the information you’re looking for',
                ],
                'contact' => [
                    'big_text' => 'Get In Touch',
                    'title_html' => 'If you have any other <br> questions, please contact <br> our editorial office',
                    'button_text' => 'Contact Us',
                    'button_url' => 'https://wa.me/628971399093',
                ],
                'accordions' => [
                    [
                        'question' => 'What publishing services do you offer?',
                        'answer' => 'We support the end-to-end journal publishing workflow, including submission checks, editorial screening, peer review coordination, copyediting, production assistance, metadata preparation, and publication guidance aligned with research ethics.',
                    ],
                    [
                        'question' => 'How does submission and peer review work?',
                        'answer' => 'After you submit your manuscript, we perform an initial check for scope and basic compliance. Eligible submissions proceed to peer review, followed by author revisions. The editor then makes a decision based on reviewer feedback, quality, and ethical considerations.',
                    ],
                    [
                        'question' => 'Do you provide language editing and formatting support?',
                        'answer' => 'Yes. We can assist with manuscript formatting, reference style alignment, and copyediting to improve clarity and consistency. Support options vary by package and the journal’s author guidelines.',
                    ],
                    [
                        'question' => 'What if my manuscript requires major revisions or is not accepted?',
                        'answer' => 'We aim for a fair and constructive process. If revisions are requested, you’ll receive detailed feedback and guidance on how to respond. If a manuscript is not accepted, we can still provide improvement recommendations to help with a future submission.',
                    ],
                ],
            ],
        ];

        if (count($servicesPage) === 0) {
            $servicesPage = $servicesPageDefaults;
        }

        $servicesPageWorkflow = (array) data_get($servicesPage, 'workflow', []);
        if (count($servicesPageWorkflow) === 0) {
            $servicesPageWorkflow = (array) data_get($servicesPageDefaults, 'workflow', []);
        }
        $servicesPageWorkflowItems = (array) data_get($servicesPageWorkflow, 'items', []);
        if (count($servicesPageWorkflowItems) === 0) {
            $servicesPageWorkflowItems = (array) data_get($servicesPageDefaults, 'workflow.items', []);
        }
        $servicesPageWorkflowItems = array_slice(array_pad($servicesPageWorkflowItems, 4, []), 0, 4);

        $servicesPageFaq = (array) data_get($servicesPage, 'faq', []);
        if (count($servicesPageFaq) === 0) {
            $servicesPageFaq = (array) data_get($servicesPageDefaults, 'faq', []);
        }
        $servicesPageFaqAccordions = (array) data_get($servicesPageFaq, 'accordions', []);
        if (count($servicesPageFaqAccordions) === 0) {
            $servicesPageFaqAccordions = (array) data_get($servicesPageDefaults, 'faq.accordions', []);
        }
        $servicesPageFaqAccordions = array_slice(array_pad($servicesPageFaqAccordions, 4, []), 0, 4);
        $servicesPageFaqPointsLines = implode("\n", (array) data_get($servicesPageFaq, 'points', data_get($servicesPageDefaults, 'faq.points', [])));

        $servicesDetailDefaults = [
            'intro_title' => "End-to-end journal publishing support for authors,\neditors, and institutions",
            'intro_text' => 'Med Open Press provides a complete publishing workflow—from initial manuscript checks and peer-review coordination to professional editing, layout (typesetting), DOI and metadata preparation, and final online publication.',
            'highlights_title' => 'Service Highlights',
            'highlights_text' => 'Our services are designed to help journals run smoothly and help authors publish with confidence.',
            'highlights_left_points' => [
                'Initial screening and format compliance',
                'Peer-review coordination and decision support',
                'Copyediting and language polishing',
            ],
            'highlights_right_points' => [
                'Typesetting, proofing, and final files (PDF/HTML)',
                'DOI and metadata preparation (ORCID, references)',
                'Publication support and dissemination readiness',
            ],
            'cards' => [
                [
                    'icon' => 'icon-review',
                    'title' => 'Peer Review & Editorial Support',
                    'text' => "Structured review workflows,\nreviewer coordination, reminders, and clear\neditorial decisions.",
                ],
                [
                    'icon' => 'icon-file',
                    'title' => 'Production & Publishing',
                    'text' => "Copyediting, layout, proofing,\nand publication-ready files with consistent\njournal formatting.",
                ],
            ],
            'workflow_title' => 'Publishing Workflow Summary',
            'workflow_text' => 'A reliable publishing process helps reduce delays and improves quality.',
            'why_title' => 'Why Choose Med Open Press?',
            'why_text_1' => 'We combine professional editorial standards with practical production support.',
            'why_text_2' => 'From authors to editorial teams, we focus on consistent quality, ethical practices, and discoverability.',
            'why_points' => [
                'Editorial quality and publishing ethics focus',
                'Clear timelines and responsive communication',
                'Professional editing and consistent journal formatting',
                'Metadata-ready outputs for discoverability',
            ],
            'post_text' => 'We can also support post-publication needs—such as minor corrections, metadata updates, and improvements that help readers find and cite your work.',
            'doi_title' => 'DOI, Metadata, and Indexing Support',
            'doi_text' => 'We help prepare publication-ready metadata for better discoverability: DOI preparation, author identifiers (e.g., ORCID), reference checks, and consistent article information.',
            'sidebar' => [
                'more_services_title' => 'More Services',
                'more_services' => [
                    'Editorial & Copyediting',
                    'Peer Review Coordination',
                    'Typesetting & Proofing',
                    'DOI & Metadata',
                    'Indexing & Archiving Support',
                ],
                'get_touch_title' => 'Need help with your manuscript or journal?',
                'button_text' => 'Contact Us',
                'button_url' => 'https://wa.me/628971399093',
                'call_label' => 'Call us for publishing support',
                'phone' => '+62 897 1399 093',
            ],
            'faq' => [
                'tagline' => 'FAQs',
                'heading_html' => 'Your Questions Answered <br><span>Explore Our FAQs</span>',
                'text' => "Everything you need to know. Detailed <br> overview of our\nfrequently asked questions",
                'points' => [
                    'A Comprehensive Guide to Our Frequently Asked <br> Questions',
                    'Find the Information You’re Looking For',
                ],
                'contact' => [
                    'big_text' => 'Get In Touch',
                    'title_html' => 'If you have any other <br> questions, please contact <br> our editorial office',
                    'button_text' => 'Contact Us',
                    'button_url' => 'https://wa.me/628971399093',
                ],
                'accordions' => [
                    ['question' => '', 'answer' => ''],
                    ['question' => '', 'answer' => ''],
                    ['question' => '', 'answer' => ''],
                    ['question' => '', 'answer' => ''],
                ],
            ],
        ];

        if (count($servicesDetail) === 0) {
            $servicesDetail = $servicesDetailDefaults;
        }

        $servicesDetailHlLeftLines = implode("\n", (array) data_get($servicesDetail, 'highlights_left_points', data_get($servicesDetailDefaults, 'highlights_left_points', [])));
        $servicesDetailHlRightLines = implode("\n", (array) data_get($servicesDetail, 'highlights_right_points', data_get($servicesDetailDefaults, 'highlights_right_points', [])));
        $servicesDetailWhyPointsLines = implode("\n", (array) data_get($servicesDetail, 'why_points', data_get($servicesDetailDefaults, 'why_points', [])));

        $servicesDetailCards = (array) data_get($servicesDetail, 'cards', []);
        if (count($servicesDetailCards) === 0) {
            $servicesDetailCards = (array) data_get($servicesDetailDefaults, 'cards', []);
        }
        $servicesDetailCards = array_slice(array_pad($servicesDetailCards, 2, []), 0, 2);

        $servicesDetailSidebar = (array) data_get($servicesDetail, 'sidebar', []);
        if (count($servicesDetailSidebar) === 0) {
            $servicesDetailSidebar = (array) data_get($servicesDetailDefaults, 'sidebar', []);
        }
        $servicesDetailMoreServicesLines = implode("\n", (array) data_get($servicesDetailSidebar, 'more_services', data_get($servicesDetailDefaults, 'sidebar.more_services', [])));

        $servicesDetailFaq = (array) data_get($servicesDetail, 'faq', []);
        if (count($servicesDetailFaq) === 0) {
            $servicesDetailFaq = (array) data_get($servicesDetailDefaults, 'faq', []);
        }
        $servicesDetailFaqPointsLines = implode("\n", (array) data_get($servicesDetailFaq, 'points', data_get($servicesDetailDefaults, 'faq.points', [])));

        $servicesDetailFaqAccordions = (array) data_get($servicesDetailFaq, 'accordions', []);
        if (count($servicesDetailFaqAccordions) === 0) {
            $servicesDetailFaqAccordions = (array) data_get($servicesDetailDefaults, 'faq.accordions', []);
        }
        $servicesDetailFaqAccordions = array_slice(array_pad($servicesDetailFaqAccordions, 4, []), 0, 4);
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
                        <h5 class="card-title mb-0">Services Settings</h5>
                        <div class="text-muted small">Controls content for the public <code>/services</code> tabs and <code>/services/{slug}</code> detail page.</div>
                        <div class="text-muted small">Tip: If uploaded images don't show, ensure <code>php artisan storage:link</code> is set on the server.</div>
                    </div>
                    <a href="{{ url('/services') }}" target="_blank" class="btn btn-outline-secondary btn-sm">Preview Services</a>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.services.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row g-3">
                            <div class="col-12">
                                <h6 class="mb-1">Services Tabs</h6>
                                <div class="text-muted small">Configure up to 5 tabs shown on <code>/services</code>.</div>
                            </div>

                            <div class="col-12">
                                <div class="border rounded p-3">
                                    <div class="fw-semibold mb-2">Services Heading</div>
                                    <div class="row g-3">
                                        <div class="col-12 col-md-4">
                                            <label class="form-label">Tagline</label>
                                            <input class="form-control" name="services[tagline]" value="{{ old('services.tagline', data_get($services, 'tagline', 'Our Services')) }}">
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Heading HTML (allowed: &lt;br&gt; and &lt;span&gt;)</label>
                                            <textarea class="form-control" name="services[heading_html]" rows="3">{{ old('services.heading_html', data_get($services, 'heading_html')) }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @foreach($tabs as $i => $tab)
                                <div class="col-12">
                                    <div class="border rounded p-3">
                                        <div class="fw-semibold mb-2">Tab #{{ $i + 1 }}</div>

                                        <div class="row g-3">
                                            <div class="col-12 col-md-4">
                                                <label class="form-label">Button Label (supports line breaks with \n)</label>
                                                <input class="form-control" name="services[tabs][{{ $i }}][button_label]" value="{{ old('services.tabs.' . $i . '.button_label', data_get($tab, 'button_label')) }}">
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <label class="form-label">Slug (tab id)</label>
                                                <input class="form-control" name="services[tabs][{{ $i }}][slug]" value="{{ old('services.tabs.' . $i . '.slug', data_get($tab, 'slug')) }}">
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <label class="form-label">Icon Class</label>
                                                <input class="form-control" name="services[tabs][{{ $i }}][icon]" value="{{ old('services.tabs.' . $i . '.icon', data_get($tab, 'icon')) }}">
                                            </div>

                                            <div class="col-12">
                                                <label class="form-label">Title</label>
                                                <input class="form-control" name="services[tabs][{{ $i }}][title]" value="{{ old('services.tabs.' . $i . '.title', data_get($tab, 'title')) }}">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Text</label>
                                                <textarea class="form-control" name="services[tabs][{{ $i }}][text]" rows="3">{{ old('services.tabs.' . $i . '.text', data_get($tab, 'text')) }}</textarea>
                                            </div>

                                            <div class="col-12 col-md-6">
                                                <label class="form-label">Small Label</label>
                                                <input class="form-control" name="services[tabs][{{ $i }}][small_label]" value="{{ old('services.tabs.' . $i . '.small_label', data_get($tab, 'small_label')) }}">
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label class="form-label">Small Sub Label</label>
                                                <input class="form-control" name="services[tabs][{{ $i }}][small_sublabel]" value="{{ old('services.tabs.' . $i . '.small_sublabel', data_get($tab, 'small_sublabel')) }}">
                                            </div>

                                            <div class="col-12 col-md-4">
                                                <label class="form-label">Button Text</label>
                                                <input class="form-control" name="services[tabs][{{ $i }}][button_text]" value="{{ old('services.tabs.' . $i . '.button_text', data_get($tab, 'button_text')) }}">
                                            </div>
                                            <div class="col-12 col-md-8">
                                                <label class="form-label">Button URL</label>
                                                <input class="form-control" name="services[tabs][{{ $i }}][button_url]" value="{{ old('services.tabs.' . $i . '.button_url', data_get($tab, 'button_url')) }}">
                                                <div class="form-text">Jika kosong, frontend akan otomatis ke <code>/services/{slug}</code>.</div>
                                            </div>

                                            <div class="col-12 col-md-6">
                                                <label class="form-label">Background Image Upload</label>
                                                <input class="form-control" type="file" name="services[tabs][{{ $i }}][image_file]" accept="image/*">
                                                @if(data_get($tab, 'image'))
                                                    <div class="form-text">Current: {{ data_get($tab, 'image') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <div class="col-12">
                                <hr class="my-2" />
                            </div>

                            <div class="col-12">
                                <h6 class="mb-1">Services Page (Workflow &amp; FAQ)</h6>
                                <div class="text-muted small">Controls the public <code>/services</code> page sections below the tabs.</div>
                            </div>

                            <div class="col-12">
                                <div class="border rounded p-3">
                                    <div class="fw-semibold mb-2">Workflow Section</div>
                                    <div class="row g-3">
                                        <div class="col-12 col-md-4">
                                            <label class="form-label">Tagline</label>
                                            <input class="form-control" name="services_page[workflow][tagline]" value="{{ old('services_page.workflow.tagline', data_get($servicesPageWorkflow, 'tagline', data_get($servicesPageDefaults, 'workflow.tagline'))) }}">
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Heading HTML (allowed: &lt;br&gt; and &lt;span&gt;)</label>
                                            <textarea class="form-control" name="services_page[workflow][heading_html]" rows="2">{{ old('services_page.workflow.heading_html', data_get($servicesPageWorkflow, 'heading_html', data_get($servicesPageDefaults, 'workflow.heading_html'))) }}</textarea>
                                        </div>
                                    </div>

                                    <hr class="my-3" />

                                    <div class="fw-semibold mb-2">Workflow Items (4)</div>
                                    <div class="text-muted small mb-2">Maks 4 item. Jika diisi lebih, yang dipakai hanya 4 pertama.</div>
                                    <div class="row g-3">
                                        @foreach($servicesPageWorkflowItems as $i => $item)
                                            <div class="col-12">
                                                <div class="border rounded p-3">
                                                    <div class="fw-semibold mb-2">Item #{{ $i + 1 }}</div>
                                                    <div class="row g-3">
                                                        <div class="col-12 col-md-4">
                                                            <label class="form-label">Icon Class</label>
                                                            <input class="form-control" name="services_page[workflow][items][{{ $i }}][icon]" value="{{ old('services_page.workflow.items.' . $i . '.icon', data_get($item, 'icon')) }}">
                                                        </div>
                                                        <div class="col-12 col-md-8">
                                                            <label class="form-label">URL</label>
                                                            <input class="form-control" name="services_page[workflow][items][{{ $i }}][url]" value="{{ old('services_page.workflow.items.' . $i . '.url', data_get($item, 'url')) }}">
                                                        </div>
                                                        <div class="col-12">
                                                            <label class="form-label">Title HTML (allowed: &lt;br&gt; and &lt;span&gt;)</label>
                                                            <input class="form-control" name="services_page[workflow][items][{{ $i }}][title_html]" value="{{ old('services_page.workflow.items.' . $i . '.title_html', data_get($item, 'title_html')) }}">
                                                        </div>
                                                        <div class="col-12">
                                                            <label class="form-label">Text</label>
                                                            <textarea class="form-control" name="services_page[workflow][items][{{ $i }}][text]" rows="2">{{ old('services_page.workflow.items.' . $i . '.text', data_get($item, 'text')) }}</textarea>
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
                                    <div class="fw-semibold mb-2">FAQ Section</div>
                                    <div class="row g-3">
                                        <div class="col-12 col-md-4">
                                            <label class="form-label">Tagline</label>
                                            <input class="form-control" name="services_page[faq][tagline]" value="{{ old('services_page.faq.tagline', data_get($servicesPageFaq, 'tagline', data_get($servicesPageDefaults, 'faq.tagline'))) }}">
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Heading HTML (allowed: &lt;br&gt; and &lt;span&gt;)</label>
                                            <textarea class="form-control" name="services_page[faq][heading_html]" rows="2">{{ old('services_page.faq.heading_html', data_get($servicesPageFaq, 'heading_html', data_get($servicesPageDefaults, 'faq.heading_html'))) }}</textarea>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Text</label>
                                            <textarea class="form-control" name="services_page[faq][text]" rows="2">{{ old('services_page.faq.text', data_get($servicesPageFaq, 'text', data_get($servicesPageDefaults, 'faq.text'))) }}</textarea>
                                        </div>

                                        <div class="col-12">
                                            <label class="form-label">Points (one per line, HTML allowed: &lt;br&gt; and &lt;span&gt;)</label>
                                            <textarea class="form-control" name="services_page[faq][points_lines]" rows="3">{{ old('services_page.faq.points_lines', $servicesPageFaqPointsLines) }}</textarea>
                                            <div class="form-text">These become the two bullet lines under the FAQ text. Leave a line empty to remove.</div>
                                        </div>

                                        <div class="col-12">
                                            <div class="border rounded p-3">
                                                <div class="fw-semibold mb-2">Contact Box</div>
                                                <div class="row g-3">
                                                    <div class="col-12 col-md-4">
                                                        <label class="form-label">Big Text</label>
                                                        <input class="form-control" name="services_page[faq][contact][big_text]" value="{{ old('services_page.faq.contact.big_text', data_get($servicesPageFaq, 'contact.big_text', data_get($servicesPageDefaults, 'faq.contact.big_text'))) }}">
                                                    </div>
                                                    <div class="col-12">
                                                        <label class="form-label">Title HTML (allowed: &lt;br&gt; and &lt;span&gt;)</label>
                                                        <textarea class="form-control" name="services_page[faq][contact][title_html]" rows="2">{{ old('services_page.faq.contact.title_html', data_get($servicesPageFaq, 'contact.title_html', data_get($servicesPageDefaults, 'faq.contact.title_html'))) }}</textarea>
                                                    </div>
                                                    <div class="col-12 col-md-4">
                                                        <label class="form-label">Button Text</label>
                                                        <input class="form-control" name="services_page[faq][contact][button_text]" value="{{ old('services_page.faq.contact.button_text', data_get($servicesPageFaq, 'contact.button_text', data_get($servicesPageDefaults, 'faq.contact.button_text'))) }}">
                                                    </div>
                                                    <div class="col-12 col-md-8">
                                                        <label class="form-label">Button URL</label>
                                                        <input class="form-control" name="services_page[faq][contact][button_url]" value="{{ old('services_page.faq.contact.button_url', data_get($servicesPageFaq, 'contact.button_url', data_get($servicesPageDefaults, 'faq.contact.button_url'))) }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="border rounded p-3">
                                                <div class="fw-semibold mb-2">Accordions (4)</div>
                                                <div class="text-muted small mb-2">Maks 4 accordion. Jika diisi lebih, yang dipakai hanya 4 pertama.</div>
                                                <div class="row g-3">
                                                    @foreach($servicesPageFaqAccordions as $i => $a)
                                                        <div class="col-12">
                                                            <div class="border rounded p-3">
                                                                <div class="fw-semibold mb-2">Accordion #{{ $i + 1 }}</div>
                                                                <div class="row g-3">
                                                                    <div class="col-12">
                                                                        <label class="form-label">Question</label>
                                                                        <input class="form-control" name="services_page[faq][accordions][{{ $i }}][question]" value="{{ old('services_page.faq.accordions.' . $i . '.question', data_get($a, 'question')) }}">
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <label class="form-label">Answer</label>
                                                                        <textarea class="form-control" name="services_page[faq][accordions][{{ $i }}][answer]" rows="3">{{ old('services_page.faq.accordions.' . $i . '.answer', data_get($a, 'answer')) }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <h6 class="mb-1">Services Detail Page</h6>
                                <div class="text-muted small">Shared template for <code>/services/{slug}</code>.</div>
                            </div>

                            <div class="col-12">
                                <div class="border rounded p-3">
                                    <div class="fw-semibold mb-2">Intro</div>
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <label class="form-label">Title (supports line breaks)</label>
                                            <textarea class="form-control" name="services_detail[intro_title]" rows="2">{{ old('services_detail.intro_title', data_get($servicesDetail, 'intro_title', data_get($servicesDetailDefaults, 'intro_title'))) }}</textarea>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Text</label>
                                            <textarea class="form-control" name="services_detail[intro_text]" rows="3">{{ old('services_detail.intro_text', data_get($servicesDetail, 'intro_text', data_get($servicesDetailDefaults, 'intro_text'))) }}</textarea>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="form-label">Main Image Upload</label>
                                            <input class="form-control" type="file" name="services_detail[main_image_file]" accept="image/*">
                                            @if(data_get($servicesDetail, 'main_image'))
                                                <div class="form-text">Current: {{ data_get($servicesDetail, 'main_image') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="border rounded p-3">
                                    <div class="fw-semibold mb-2">Highlights</div>
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <label class="form-label">Title</label>
                                            <input class="form-control" name="services_detail[highlights_title]" value="{{ old('services_detail.highlights_title', data_get($servicesDetail, 'highlights_title', data_get($servicesDetailDefaults, 'highlights_title'))) }}">
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Text</label>
                                            <textarea class="form-control" name="services_detail[highlights_text]" rows="3">{{ old('services_detail.highlights_text', data_get($servicesDetail, 'highlights_text', data_get($servicesDetailDefaults, 'highlights_text'))) }}</textarea>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="form-label">Left Points (one per line)</label>
                                            <textarea class="form-control" name="services_detail[highlights_left_points_lines]" rows="4">{{ old('services_detail.highlights_left_points_lines', $servicesDetailHlLeftLines) }}</textarea>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="form-label">Right Points (one per line)</label>
                                            <textarea class="form-control" name="services_detail[highlights_right_points_lines]" rows="4">{{ old('services_detail.highlights_right_points_lines', $servicesDetailHlRightLines) }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="border rounded p-3">
                                    <div class="fw-semibold mb-2">Cards (2)</div>
                                    <div class="row g-3">
                                        @foreach($servicesDetailCards as $i => $c)
                                            <div class="col-12 col-md-6">
                                                <div class="border rounded p-3">
                                                    <div class="fw-semibold mb-2">Card #{{ $i + 1 }}</div>
                                                    <div class="row g-3">
                                                        <div class="col-12">
                                                            <label class="form-label">Icon Class</label>
                                                            <input class="form-control" name="services_detail[cards][{{ $i }}][icon]" value="{{ old('services_detail.cards.' . $i . '.icon', data_get($c, 'icon')) }}">
                                                        </div>
                                                        <div class="col-12">
                                                            <label class="form-label">Title</label>
                                                            <input class="form-control" name="services_detail[cards][{{ $i }}][title]" value="{{ old('services_detail.cards.' . $i . '.title', data_get($c, 'title')) }}">
                                                        </div>
                                                        <div class="col-12">
                                                            <label class="form-label">Text (supports line breaks)</label>
                                                            <textarea class="form-control" name="services_detail[cards][{{ $i }}][text]" rows="3">{{ old('services_detail.cards.' . $i . '.text', data_get($c, 'text')) }}</textarea>
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
                                    <div class="fw-semibold mb-2">Workflow Summary</div>
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <label class="form-label">Title</label>
                                            <input class="form-control" name="services_detail[workflow_title]" value="{{ old('services_detail.workflow_title', data_get($servicesDetail, 'workflow_title', data_get($servicesDetailDefaults, 'workflow_title'))) }}">
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Text</label>
                                            <textarea class="form-control" name="services_detail[workflow_text]" rows="3">{{ old('services_detail.workflow_text', data_get($servicesDetail, 'workflow_text', data_get($servicesDetailDefaults, 'workflow_text'))) }}</textarea>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="form-label">Workflow Image #1</label>
                                            <input class="form-control" type="file" name="services_detail[workflow_image_1_file]" accept="image/*">
                                            @if(data_get($servicesDetail, 'workflow_image_1'))
                                                <div class="form-text">Current: {{ data_get($servicesDetail, 'workflow_image_1') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="form-label">Workflow Image #2</label>
                                            <input class="form-control" type="file" name="services_detail[workflow_image_2_file]" accept="image/*">
                                            @if(data_get($servicesDetail, 'workflow_image_2'))
                                                <div class="form-text">Current: {{ data_get($servicesDetail, 'workflow_image_2') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="border rounded p-3">
                                    <div class="fw-semibold mb-2">Why Choose Us</div>
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <label class="form-label">Title</label>
                                            <input class="form-control" name="services_detail[why_title]" value="{{ old('services_detail.why_title', data_get($servicesDetail, 'why_title', data_get($servicesDetailDefaults, 'why_title'))) }}">
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Text 1</label>
                                            <textarea class="form-control" name="services_detail[why_text_1]" rows="2">{{ old('services_detail.why_text_1', data_get($servicesDetail, 'why_text_1', data_get($servicesDetailDefaults, 'why_text_1'))) }}</textarea>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Text 2</label>
                                            <textarea class="form-control" name="services_detail[why_text_2]" rows="2">{{ old('services_detail.why_text_2', data_get($servicesDetail, 'why_text_2', data_get($servicesDetailDefaults, 'why_text_2'))) }}</textarea>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="form-label">Points (one per line)</label>
                                            <textarea class="form-control" name="services_detail[why_points_lines]" rows="5">{{ old('services_detail.why_points_lines', $servicesDetailWhyPointsLines) }}</textarea>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="form-label">Why Image Upload</label>
                                            <input class="form-control" type="file" name="services_detail[why_image_file]" accept="image/*">
                                            @if(data_get($servicesDetail, 'why_image'))
                                                <div class="form-text">Current: {{ data_get($servicesDetail, 'why_image') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="border rounded p-3">
                                    <div class="fw-semibold mb-2">Bottom Section</div>
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <label class="form-label">Post Text</label>
                                            <textarea class="form-control" name="services_detail[post_text]" rows="2">{{ old('services_detail.post_text', data_get($servicesDetail, 'post_text', data_get($servicesDetailDefaults, 'post_text'))) }}</textarea>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">DOI Title</label>
                                            <input class="form-control" name="services_detail[doi_title]" value="{{ old('services_detail.doi_title', data_get($servicesDetail, 'doi_title', data_get($servicesDetailDefaults, 'doi_title'))) }}">
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">DOI Text</label>
                                            <textarea class="form-control" name="services_detail[doi_text]" rows="3">{{ old('services_detail.doi_text', data_get($servicesDetail, 'doi_text', data_get($servicesDetailDefaults, 'doi_text'))) }}</textarea>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="form-label">Bottom Image Upload</label>
                                            <input class="form-control" type="file" name="services_detail[bottom_image_file]" accept="image/*">
                                            @if(data_get($servicesDetail, 'bottom_image'))
                                                <div class="form-text">Current: {{ data_get($servicesDetail, 'bottom_image') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="border rounded p-3">
                                    <div class="fw-semibold mb-2">Sidebar</div>
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <label class="form-label">More Services Title</label>
                                            <input class="form-control" name="services_detail[sidebar][more_services_title]" value="{{ old('services_detail.sidebar.more_services_title', data_get($servicesDetailSidebar, 'more_services_title', data_get($servicesDetailDefaults, 'sidebar.more_services_title'))) }}">
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">More Services (one per line)</label>
                                            <textarea class="form-control" name="services_detail[sidebar][more_services_lines]" rows="5">{{ old('services_detail.sidebar.more_services_lines', $servicesDetailMoreServicesLines) }}</textarea>
                                        </div>

                                        <div class="col-12">
                                            <label class="form-label">Get Touch Title</label>
                                            <input class="form-control" name="services_detail[sidebar][get_touch_title]" value="{{ old('services_detail.sidebar.get_touch_title', data_get($servicesDetailSidebar, 'get_touch_title', data_get($servicesDetailDefaults, 'sidebar.get_touch_title'))) }}">
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <label class="form-label">Button Text</label>
                                            <input class="form-control" name="services_detail[sidebar][button_text]" value="{{ old('services_detail.sidebar.button_text', data_get($servicesDetailSidebar, 'button_text', data_get($servicesDetailDefaults, 'sidebar.button_text'))) }}">
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <label class="form-label">Button URL</label>
                                            <input class="form-control" name="services_detail[sidebar][button_url]" value="{{ old('services_detail.sidebar.button_url', data_get($servicesDetailSidebar, 'button_url', data_get($servicesDetailDefaults, 'sidebar.button_url'))) }}">
                                        </div>

                                        <div class="col-12 col-md-6">
                                            <label class="form-label">Call Label</label>
                                            <input class="form-control" name="services_detail[sidebar][call_label]" value="{{ old('services_detail.sidebar.call_label', data_get($servicesDetailSidebar, 'call_label', data_get($servicesDetailDefaults, 'sidebar.call_label'))) }}">
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="form-label">Phone (display)</label>
                                            <input class="form-control" name="services_detail[sidebar][phone]" value="{{ old('services_detail.sidebar.phone', data_get($servicesDetailSidebar, 'phone', data_get($servicesDetailDefaults, 'sidebar.phone'))) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="border rounded p-3">
                                    <div class="fw-semibold mb-2">FAQ</div>
                                    <div class="row g-3">
                                        <div class="col-12 col-md-4">
                                            <label class="form-label">Tagline</label>
                                            <input class="form-control" name="services_detail[faq][tagline]" value="{{ old('services_detail.faq.tagline', data_get($servicesDetailFaq, 'tagline', data_get($servicesDetailDefaults, 'faq.tagline'))) }}">
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Heading HTML (allowed: &lt;br&gt; and &lt;span&gt;)</label>
                                            <textarea class="form-control" name="services_detail[faq][heading_html]" rows="2">{{ old('services_detail.faq.heading_html', data_get($servicesDetailFaq, 'heading_html', data_get($servicesDetailDefaults, 'faq.heading_html'))) }}</textarea>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Text</label>
                                            <textarea class="form-control" name="services_detail[faq][text]" rows="2">{{ old('services_detail.faq.text', data_get($servicesDetailFaq, 'text', data_get($servicesDetailDefaults, 'faq.text'))) }}</textarea>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Points (one per line, HTML allowed: &lt;br&gt; and &lt;span&gt;)</label>
                                            <textarea class="form-control" name="services_detail[faq][points_lines]" rows="3">{{ old('services_detail.faq.points_lines', $servicesDetailFaqPointsLines) }}</textarea>
                                        </div>

                                        <div class="col-12">
                                            <div class="border rounded p-3">
                                                <div class="fw-semibold mb-2">Contact Box</div>
                                                <div class="row g-3">
                                                    <div class="col-12 col-md-4">
                                                        <label class="form-label">Big Text</label>
                                                        <input class="form-control" name="services_detail[faq][contact][big_text]" value="{{ old('services_detail.faq.contact.big_text', data_get($servicesDetailFaq, 'contact.big_text', data_get($servicesDetailDefaults, 'faq.contact.big_text'))) }}">
                                                    </div>
                                                    <div class="col-12">
                                                        <label class="form-label">Title HTML (allowed: &lt;br&gt; and &lt;span&gt;)</label>
                                                        <textarea class="form-control" name="services_detail[faq][contact][title_html]" rows="2">{{ old('services_detail.faq.contact.title_html', data_get($servicesDetailFaq, 'contact.title_html', data_get($servicesDetailDefaults, 'faq.contact.title_html'))) }}</textarea>
                                                    </div>
                                                    <div class="col-12 col-md-4">
                                                        <label class="form-label">Button Text</label>
                                                        <input class="form-control" name="services_detail[faq][contact][button_text]" value="{{ old('services_detail.faq.contact.button_text', data_get($servicesDetailFaq, 'contact.button_text', data_get($servicesDetailDefaults, 'faq.contact.button_text'))) }}">
                                                    </div>
                                                    <div class="col-12 col-md-8">
                                                        <label class="form-label">Button URL</label>
                                                        <input class="form-control" name="services_detail[faq][contact][button_url]" value="{{ old('services_detail.faq.contact.button_url', data_get($servicesDetailFaq, 'contact.button_url', data_get($servicesDetailDefaults, 'faq.contact.button_url'))) }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="border rounded p-3">
                                                <div class="fw-semibold mb-2">Accordions (4)</div>
                                                <div class="row g-3">
                                                    @foreach($servicesDetailFaqAccordions as $i => $a)
                                                        <div class="col-12">
                                                            <div class="border rounded p-3">
                                                                <div class="fw-semibold mb-2">Accordion #{{ $i + 1 }}</div>
                                                                <div class="row g-3">
                                                                    <div class="col-12">
                                                                        <label class="form-label">Question</label>
                                                                        <input class="form-control" name="services_detail[faq][accordions][{{ $i }}][question]" value="{{ old('services_detail.faq.accordions.' . $i . '.question', data_get($a, 'question')) }}">
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <label class="form-label">Answer</label>
                                                                        <textarea class="form-control" name="services_detail[faq][accordions][{{ $i }}][answer]" rows="3">{{ old('services_detail.faq.accordions.' . $i . '.answer', data_get($a, 'answer')) }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 d-flex justify-content-end mt-2">
                                <button type="submit" class="btn btn-primary">Save Services Settings</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
