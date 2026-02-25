@extends('admin.partials.Layouts.master')

@section('title', 'About Settings | Admin')
@section('title-sub', 'Settings')
@section('pagetitle', 'About Settings')

@section('content')
    @php
        $home = (array) ($home ?? []);

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
            $aboutPageCounters = [
                ['count' => 25, 'suffix' => '+', 'label' => 'years of editorial experience'],
                ['count' => 98, 'suffix' => '%', 'label' => 'author satisfaction'],
                ['count' => 198, 'suffix' => '+', 'label' => 'published works'],
            ];
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
                        <h5 class="card-title mb-0">About Page Settings</h5>
                        <div class="text-muted small">Controls content for the public <code>/about</code> page.</div>
                        <div class="text-muted small">Tip: If uploaded images don't show, ensure <code>php artisan storage:link</code> is set on the server.</div>
                    </div>
                    <a href="{{ url('/about') }}" target="_blank" class="btn btn-outline-secondary btn-sm">Preview About</a>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.about.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row g-3">
                            <div class="col-12">
                                <h6 class="mb-1">Header</h6>
                                <div class="text-muted small">Tagline, heading, and main text.</div>
                            </div>

                            <div class="col-12 col-md-4">
                                <label class="form-label">Tagline</label>
                                <input class="form-control" name="about_page[tagline]" value="{{ old('about_page.tagline', $aboutPageTagline) }}">
                            </div>

                            <div class="col-12">
                                <label class="form-label">Heading HTML (allowed: &lt;br&gt; and &lt;span&gt;)</label>
                                <textarea class="form-control" name="about_page[heading_html]" rows="3">{{ old('about_page.heading_html', $aboutPageHeadingHtml) }}</textarea>
                                <div class="form-text">Only <code>&lt;br&gt;</code> and <code>&lt;span&gt;</code> are saved.</div>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Text</label>
                                <textarea class="form-control" name="about_page[text]" rows="4">{{ old('about_page.text', $aboutPageText) }}</textarea>
                            </div>

                            <div class="col-12">
                                <hr class="my-2" />
                            </div>

                            <div class="col-12">
                                <h6 class="mb-1">Images (4)</h6>
                                <div class="text-muted small">Order: #1 top-left, #2 bottom-left, #3 top-right, #4 bottom-right.</div>
                            </div>

                            @foreach($aboutPageImages as $i => $img)
                                <div class="col-12 col-md-3">
                                    <label class="form-label">Image #{{ $i + 1 }}</label>
                                    <input class="form-control" type="file" name="about_page[images][{{ $i }}][image_file]" accept="image/*">
                                    @if(data_get($img, 'image'))
                                        <div class="form-text">Current: {{ data_get($img, 'image') }}</div>
                                    @endif
                                </div>
                            @endforeach

                            <div class="col-12">
                                <hr class="my-2" />
                            </div>

                            <div class="col-12">
                                <h6 class="mb-1">Counters (3)</h6>
                                <div class="text-muted small">Shown under the About Page paragraph.</div>
                            </div>

                            @foreach($aboutPageCounters as $i => $c)
                                <div class="col-12 col-md-4">
                                    <div class="border rounded p-2 h-100">
                                        <div class="fw-semibold mb-2">Counter #{{ $i + 1 }}</div>
                                        <label class="form-label">Count</label>
                                        <input class="form-control" type="number" min="0" name="about_page[counters][{{ $i }}][count]" value="{{ old('about_page.counters.' . $i . '.count', data_get($c, 'count')) }}">
                                        <label class="form-label mt-2">Suffix (ex: +, %)</label>
                                        <input class="form-control" name="about_page[counters][{{ $i }}][suffix]" value="{{ old('about_page.counters.' . $i . '.suffix', data_get($c, 'suffix')) }}">
                                        <label class="form-label mt-2">Label</label>
                                        <input class="form-control" name="about_page[counters][{{ $i }}][label]" value="{{ old('about_page.counters.' . $i . '.label', data_get($c, 'label')) }}">
                                    </div>
                                </div>
                            @endforeach

                            <div class="col-12">
                                <hr class="my-2" />
                            </div>

                            <div class="col-12">
                                <h6 class="mb-1">CTA + Contact</h6>
                                <div class="text-muted small">Use international phone format (example: <code>+62 ...</code>).</div>
                            </div>

                            <div class="col-12 col-md-4">
                                <label class="form-label">Button Text</label>
                                <input class="form-control" name="about_page[consultation_button_text]" value="{{ old('about_page.consultation_button_text', $aboutPageConsultText) }}">
                            </div>
                            <div class="col-12 col-md-8">
                                <label class="form-label">Button URL</label>
                                <input class="form-control" name="about_page[consultation_button_url]" value="{{ old('about_page.consultation_button_url', $aboutPageConsultUrl) }}">
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label">Office Hours</label>
                                <input class="form-control" name="about_page[office_hours]" value="{{ old('about_page.office_hours', $aboutPageOfficeHours) }}">
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label">Phone</label>
                                <input class="form-control" name="about_page[phone]" value="{{ old('about_page.phone', $aboutPagePhone) }}">
                            </div>

                            <div class="col-12">
                                <hr class="my-2" />
                            </div>

                            <div class="col-12">
                                <h6 class="mb-1">Vision</h6>
                            </div>

                            <div class="col-12 col-md-4">
                                <label class="form-label">Title</label>
                                <input class="form-control" name="about_page[vision][title]" value="{{ old('about_page.vision.title', data_get($aboutPageVision, 'title', 'Our Vision')) }}">
                            </div>
                            <div class="col-12 col-md-8">
                                <label class="form-label">Subtitle</label>
                                <input class="form-control" name="about_page[vision][subtitle]" value="{{ old('about_page.vision.subtitle', data_get($aboutPageVision, 'subtitle', 'A global exchange of knowledge that advances medicine.')) }}">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Text</label>
                                <textarea class="form-control" name="about_page[vision][text]" rows="4">{{ old('about_page.vision.text', data_get($aboutPageVision, 'text')) }}</textarea>
                            </div>

                            <div class="col-12">
                                <hr class="my-2" />
                            </div>

                            <div class="col-12">
                                <h6 class="mb-1">Mission</h6>
                            </div>

                            <div class="col-12 col-md-4">
                                <label class="form-label">Title</label>
                                <input class="form-control" name="about_page[mission][title]" value="{{ old('about_page.mission.title', data_get($aboutPageMission, 'title', 'Our Mission')) }}">
                            </div>
                            <div class="col-12 col-md-8">
                                <label class="form-label">Subtitle</label>
                                <input class="form-control" name="about_page[mission][subtitle]" value="{{ old('about_page.mission.subtitle', data_get($aboutPageMission, 'subtitle', 'How we deliver excellence, access, and trust.')) }}">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Mission Points (one per line: <code>Title|Text</code>)</label>
                                <textarea class="form-control" name="about_page[mission][points_lines]" rows="8">{{ old('about_page.mission.points_lines', $aboutPageMissionPointsLines) }}</textarea>
                                <div class="form-text">Each line becomes one item.</div>
                            </div>

                            <div class="col-12 d-flex justify-content-end mt-2">
                                <button type="submit" class="btn btn-primary">Save About Settings</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
