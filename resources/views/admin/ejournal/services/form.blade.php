@extends('admin.partials.Layouts.master')

@php
    /** @var \App\Models\Ejournal\Service $service */
    $mode = $mode ?? 'edit';
    $isCreate = $mode === 'create';

    $detail = (array) ($service->detail ?? []);

    $hlLeftLines = implode("\n", (array) data_get($detail, 'highlights_left_points', []));
    $hlRightLines = implode("\n", (array) data_get($detail, 'highlights_right_points', []));
    $whyLines = implode("\n", (array) data_get($detail, 'why_points', []));

    $faq = (array) data_get($detail, 'faq', []);
    $faqPointsLines = implode("\n", (array) data_get($faq, 'points', []));
    $faqAccordions = (array) data_get($faq, 'accordions', []);
    $faqAccordions = array_slice(array_pad($faqAccordions, 4, []), 0, 4);

    $faqContact = (array) data_get($faq, 'contact', []);
    $sidebar = (array) data_get($detail, 'sidebar', []);
@endphp

@section('title', ($isCreate ? 'Add Service' : 'Edit Service') . ' | Admin')
@section('title-sub', 'E-Journal')
@section('pagetitle', $isCreate ? 'Add Service' : 'Edit Service')

@section('content')
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

    <form method="POST" action="{{ $isCreate ? route('admin.ejournal.services.store') : route('admin.ejournal.services.update', $service) }}" enctype="multipart/form-data">
        @csrf
        @if(!$isCreate)
            @method('PUT')
        @endif

        <div class="card mb-3">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="card-title mb-0">Basic</h5>
                    <div class="text-muted small">This controls the service card/tab on <code>/services</code>.</div>
                </div>
                <a href="{{ route('admin.ejournal.services.index') }}" class="btn btn-outline-secondary btn-sm">Back</a>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-12 col-md-4">
                        <label class="form-label">Slug</label>
                        <input class="form-control" name="slug" value="{{ old('slug', $service->slug) }}" placeholder="e.g. journal-publication">
                        <div class="form-text">lowercase + dash only</div>
                    </div>
                    <div class="col-12 col-md-8">
                        <label class="form-label">Title</label>
                        <input class="form-control" name="title" value="{{ old('title', $service->title) }}">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Text</label>
                        <textarea class="form-control" name="text" rows="3">{{ old('text', $service->text) }}</textarea>
                    </div>
                    <div class="col-12 col-md-4">
                        <label class="form-label">Button Label (supports line breaks with \n)</label>
                        <input class="form-control" name="button_label" value="{{ old('button_label', $service->button_label) }}">
                    </div>
                    <div class="col-12 col-md-4">
                        <label class="form-label">Icon Class</label>
                        <input class="form-control" name="icon" value="{{ old('icon', $service->icon) }}" placeholder="icon-file">
                    </div>
                    <div class="col-12 col-md-4">
                        <label class="form-label">Sort Order</label>
                        <input class="form-control" type="number" name="sort_order" value="{{ old('sort_order', $service->sort_order) }}">
                    </div>
                    <div class="col-12 col-md-3">
                        <label class="form-label">Small Label</label>
                        <input class="form-control" name="small_label" value="{{ old('small_label', $service->small_label) }}">
                    </div>
                    <div class="col-12 col-md-3">
                        <label class="form-label">Small Sub Label</label>
                        <input class="form-control" name="small_sublabel" value="{{ old('small_sublabel', $service->small_sublabel) }}">
                    </div>
                    <div class="col-12 col-md-3">
                        <label class="form-label">Button Text</label>
                        <input class="form-control" name="button_text" value="{{ old('button_text', $service->button_text) }}">
                    </div>
                    <div class="col-12 col-md-3">
                        <label class="form-label">Active</label>
                        <select class="form-select" name="is_active">
                            <option value="1" @selected(old('is_active', $service->is_active ? 1 : 0) == 1)>Yes</option>
                            <option value="0" @selected(old('is_active', $service->is_active ? 1 : 0) == 0)>No</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label">Tab Background Image</label>
                        <input class="form-control" type="file" name="image_file" accept="image/*">
                        @if($service->image)
                            <div class="form-text">Current: {{ $service->image }}</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-header">
                <h5 class="card-title mb-0">Service Detail Template</h5>
                <div class="text-muted small">This controls the public <code>/services/{slug}</code> page.</div>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-12">
                        <label class="form-label">Intro Title (supports line breaks)</label>
                        <textarea class="form-control" name="detail[intro_title]" rows="2">{{ old('detail.intro_title', data_get($detail, 'intro_title')) }}</textarea>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Intro Text</label>
                        <textarea class="form-control" name="detail[intro_text]" rows="3">{{ old('detail.intro_text', data_get($detail, 'intro_text')) }}</textarea>
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label">Main Image</label>
                        <input class="form-control" type="file" name="detail_images[main_image_file]" accept="image/*">
                        @if(data_get($detail, 'main_image'))
                            <div class="form-text">Current: {{ data_get($detail, 'main_image') }}</div>
                        @endif
                    </div>

                    <div class="col-12">
                        <hr>
                    </div>

                    <div class="col-12 col-md-6">
                        <label class="form-label">Highlights Title</label>
                        <input class="form-control" name="detail[highlights_title]" value="{{ old('detail.highlights_title', data_get($detail, 'highlights_title')) }}">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Highlights Text</label>
                        <textarea class="form-control" name="detail[highlights_text]" rows="3">{{ old('detail.highlights_text', data_get($detail, 'highlights_text')) }}</textarea>
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label">Highlights Left Points (one per line)</label>
                        <textarea class="form-control" name="detail[highlights_left_points_lines]" rows="5">{{ old('detail.highlights_left_points_lines', $hlLeftLines) }}</textarea>
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label">Highlights Right Points (one per line)</label>
                        <textarea class="form-control" name="detail[highlights_right_points_lines]" rows="5">{{ old('detail.highlights_right_points_lines', $hlRightLines) }}</textarea>
                    </div>

                    <div class="col-12">
                        <hr>
                    </div>

                    <div class="col-12 col-md-6">
                        <label class="form-label">Workflow Title</label>
                        <input class="form-control" name="detail[workflow_title]" value="{{ old('detail.workflow_title', data_get($detail, 'workflow_title')) }}">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Workflow Text</label>
                        <textarea class="form-control" name="detail[workflow_text]" rows="3">{{ old('detail.workflow_text', data_get($detail, 'workflow_text')) }}</textarea>
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label">Workflow Image #1</label>
                        <input class="form-control" type="file" name="detail_images[workflow_image_1_file]" accept="image/*">
                        @if(data_get($detail, 'workflow_image_1'))
                            <div class="form-text">Current: {{ data_get($detail, 'workflow_image_1') }}</div>
                        @endif
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label">Workflow Image #2</label>
                        <input class="form-control" type="file" name="detail_images[workflow_image_2_file]" accept="image/*">
                        @if(data_get($detail, 'workflow_image_2'))
                            <div class="form-text">Current: {{ data_get($detail, 'workflow_image_2') }}</div>
                        @endif
                    </div>

                    <div class="col-12">
                        <hr>
                    </div>

                    <div class="col-12 col-md-6">
                        <label class="form-label">Why Title</label>
                        <input class="form-control" name="detail[why_title]" value="{{ old('detail.why_title', data_get($detail, 'why_title')) }}">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Why Text 1</label>
                        <textarea class="form-control" name="detail[why_text_1]" rows="2">{{ old('detail.why_text_1', data_get($detail, 'why_text_1')) }}</textarea>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Why Text 2</label>
                        <textarea class="form-control" name="detail[why_text_2]" rows="2">{{ old('detail.why_text_2', data_get($detail, 'why_text_2')) }}</textarea>
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label">Why Points (one per line)</label>
                        <textarea class="form-control" name="detail[why_points_lines]" rows="6">{{ old('detail.why_points_lines', $whyLines) }}</textarea>
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label">Why Image</label>
                        <input class="form-control" type="file" name="detail_images[why_image_file]" accept="image/*">
                        @if(data_get($detail, 'why_image'))
                            <div class="form-text">Current: {{ data_get($detail, 'why_image') }}</div>
                        @endif
                    </div>

                    <div class="col-12">
                        <hr>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Post Text</label>
                        <textarea class="form-control" name="detail[post_text]" rows="2">{{ old('detail.post_text', data_get($detail, 'post_text')) }}</textarea>
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label">DOI Title</label>
                        <input class="form-control" name="detail[doi_title]" value="{{ old('detail.doi_title', data_get($detail, 'doi_title')) }}">
                    </div>
                    <div class="col-12">
                        <label class="form-label">DOI Text</label>
                        <textarea class="form-control" name="detail[doi_text]" rows="3">{{ old('detail.doi_text', data_get($detail, 'doi_text')) }}</textarea>
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label">Bottom Image</label>
                        <input class="form-control" type="file" name="detail_images[bottom_image_file]" accept="image/*">
                        @if(data_get($detail, 'bottom_image'))
                            <div class="form-text">Current: {{ data_get($detail, 'bottom_image') }}</div>
                        @endif
                    </div>

                    <div class="col-12">
                        <hr>
                    </div>

                    <div class="col-12 col-md-6">
                        <label class="form-label">Sidebar: More Services Title</label>
                        <input class="form-control" name="detail[sidebar][more_services_title]" value="{{ old('detail.sidebar.more_services_title', data_get($sidebar, 'more_services_title')) }}">
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label">Sidebar: Get Touch Title</label>
                        <input class="form-control" name="detail[sidebar][get_touch_title]" value="{{ old('detail.sidebar.get_touch_title', data_get($sidebar, 'get_touch_title')) }}">
                    </div>
                    <div class="col-12 col-md-4">
                        <label class="form-label">Sidebar: Button Text</label>
                        <input class="form-control" name="detail[sidebar][button_text]" value="{{ old('detail.sidebar.button_text', data_get($sidebar, 'button_text')) }}">
                    </div>
                    <div class="col-12 col-md-8">
                        <label class="form-label">Sidebar: Button URL</label>
                        <input class="form-control" name="detail[sidebar][button_url]" value="{{ old('detail.sidebar.button_url', data_get($sidebar, 'button_url')) }}">
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label">Sidebar: Call Label</label>
                        <input class="form-control" name="detail[sidebar][call_label]" value="{{ old('detail.sidebar.call_label', data_get($sidebar, 'call_label')) }}">
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label">Sidebar: Phone</label>
                        <input class="form-control" name="detail[sidebar][phone]" value="{{ old('detail.sidebar.phone', data_get($sidebar, 'phone')) }}">
                    </div>

                    <div class="col-12">
                        <hr>
                    </div>

                    <div class="col-12 col-md-3">
                        <label class="form-label">FAQ Tagline</label>
                        <input class="form-control" name="detail[faq][tagline]" value="{{ old('detail.faq.tagline', data_get($faq, 'tagline')) }}">
                    </div>
                    <div class="col-12">
                        <label class="form-label">FAQ Heading HTML (allowed: &lt;br&gt; and &lt;span&gt;)</label>
                        <textarea class="form-control" name="detail[faq][heading_html]" rows="2">{{ old('detail.faq.heading_html', data_get($faq, 'heading_html')) }}</textarea>
                    </div>
                    <div class="col-12">
                        <label class="form-label">FAQ Text</label>
                        <textarea class="form-control" name="detail[faq][text]" rows="2">{{ old('detail.faq.text', data_get($faq, 'text')) }}</textarea>
                    </div>
                    <div class="col-12">
                        <label class="form-label">FAQ Points (one per line, HTML allowed: &lt;br&gt; and &lt;span&gt;)</label>
                        <textarea class="form-control" name="detail[faq][points_lines]" rows="3">{{ old('detail.faq.points_lines', $faqPointsLines) }}</textarea>
                    </div>

                    <div class="col-12">
                        <div class="border rounded p-3">
                            <div class="fw-semibold mb-2">FAQ Contact Box</div>
                            <div class="row g-3">
                                <div class="col-12 col-md-4">
                                    <label class="form-label">Big Text</label>
                                    <input class="form-control" name="detail[faq][contact][big_text]" value="{{ old('detail.faq.contact.big_text', data_get($faqContact, 'big_text')) }}">
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Title HTML (allowed: &lt;br&gt; and &lt;span&gt;)</label>
                                    <textarea class="form-control" name="detail[faq][contact][title_html]" rows="2">{{ old('detail.faq.contact.title_html', data_get($faqContact, 'title_html')) }}</textarea>
                                </div>
                                <div class="col-12 col-md-4">
                                    <label class="form-label">Button Text</label>
                                    <input class="form-control" name="detail[faq][contact][button_text]" value="{{ old('detail.faq.contact.button_text', data_get($faqContact, 'button_text')) }}">
                                </div>
                                <div class="col-12 col-md-8">
                                    <label class="form-label">Button URL</label>
                                    <input class="form-control" name="detail[faq][contact][button_url]" value="{{ old('detail.faq.contact.button_url', data_get($faqContact, 'button_url')) }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="border rounded p-3">
                            <div class="fw-semibold mb-2">FAQ Accordions (4)</div>
                            <div class="row g-3">
                                @foreach($faqAccordions as $i => $a)
                                    <div class="col-12">
                                        <div class="border rounded p-3">
                                            <div class="fw-semibold mb-2">Accordion #{{ $i + 1 }}</div>
                                            <div class="row g-3">
                                                <div class="col-12">
                                                    <label class="form-label">Question</label>
                                                    <input class="form-control" name="detail[faq][accordions][{{ $i }}][question]" value="{{ old('detail.faq.accordions.' . $i . '.question', data_get($a, 'question')) }}">
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label">Answer</label>
                                                    <textarea class="form-control" name="detail[faq][accordions][{{ $i }}][answer]" rows="3">{{ old('detail.faq.accordions.' . $i . '.answer', data_get($a, 'answer')) }}</textarea>
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

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">{{ $isCreate ? 'Create' : 'Save Changes' }}</button>
            @if(!$isCreate)
                <a target="_blank" href="{{ route('services-detail', ['slug' => $service->slug]) }}" class="btn btn-outline-secondary">Preview</a>
            @endif
        </div>
    </form>
@endsection
