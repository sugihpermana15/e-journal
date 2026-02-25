@extends('admin.partials.Layouts.master')

@section('title', 'Contact Settings | Admin')
@section('title-sub', 'Settings')
@section('pagetitle', 'Contact Settings')

@section('content')
    @php
        $home = (array) ($home ?? []);

        $contact = (array) data_get($home, 'contact', []);
        $contactPage = (array) data_get($home, 'contact_page', []);

        $contactSubjectLines = implode("\n", (array) data_get($contact, 'subject_options', []));
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
                        <h5 class="card-title mb-0">Contact Settings</h5>
                        <div class="text-muted small">Controls content for the public <code>/contact</code> page + form placeholders.</div>
                        <div class="text-muted small">Tip: If uploaded images don't show, ensure <code>php artisan storage:link</code> is set on the server.</div>
                    </div>
                    <a href="{{ url('/contact') }}" target="_blank" class="btn btn-outline-secondary btn-sm">Preview Contact</a>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.contact.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row g-3">
                            <div class="col-12">
                                <h6 class="mb-1">Contact CTA Section</h6>
                                <div class="text-muted small">Heading, images, and placeholders for the contact form.</div>
                            </div>

                            <div class="col-12 col-md-4">
                                <label class="form-label">Tagline</label>
                                <input class="form-control" name="contact[tagline]" value="{{ old('contact.tagline', data_get($contact, 'tagline', 'CALL TO ACTION')) }}">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Heading HTML (allowed: &lt;br&gt; and &lt;span&gt;)</label>
                                <textarea class="form-control" name="contact[heading_html]" rows="3">{{ old('contact.heading_html', data_get($contact, 'heading_html')) }}</textarea>
                            </div>

                            <div class="col-12 col-md-4">
                                <label class="form-label">Name Placeholder</label>
                                <input class="form-control" name="contact[name_placeholder]" value="{{ old('contact.name_placeholder', data_get($contact, 'name_placeholder', 'Name*')) }}">
                            </div>
                            <div class="col-12 col-md-4">
                                <label class="form-label">Email Placeholder</label>
                                <input class="form-control" name="contact[email_placeholder]" value="{{ old('contact.email_placeholder', data_get($contact, 'email_placeholder', 'Email*')) }}">
                            </div>
                            <div class="col-12 col-md-4">
                                <label class="form-label">Phone Placeholder</label>
                                <input class="form-control" name="contact[phone_placeholder]" value="{{ old('contact.phone_placeholder', data_get($contact, 'phone_placeholder', 'Phone*')) }}">
                            </div>

                            <div class="col-12 col-md-4">
                                <label class="form-label">Subject Placeholder</label>
                                <input class="form-control" name="contact[subject_placeholder]" value="{{ old('contact.subject_placeholder', data_get($contact, 'subject_placeholder', 'Subject*')) }}">
                            </div>
                            <div class="col-12 col-md-8">
                                <label class="form-label">Subject Options (one line per option)</label>
                                <textarea class="form-control" name="contact[subject_options_lines]" rows="4">{{ old('contact.subject_options_lines', $contactSubjectLines) }}</textarea>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Message Placeholder</label>
                                <input class="form-control" name="contact[message_placeholder]" value="{{ old('contact.message_placeholder', data_get($contact, 'message_placeholder', 'Write a your Message')) }}">
                            </div>
                            <div class="col-12 col-md-4">
                                <label class="form-label">Button Text</label>
                                <input class="form-control" name="contact[button_text]" value="{{ old('contact.button_text', data_get($contact, 'button_text', 'Send Message')) }}">
                            </div>

                            <div class="col-12 col-md-4">
                                <label class="form-label">Left Image (Main) Upload</label>
                                <input class="form-control" type="file" name="contact[image_main_file]" accept="image/*">
                                @if (data_get($contact, 'image_main'))
                                    <div class="form-text">Current: {{ data_get($contact, 'image_main') }}</div>
                                @endif
                            </div>
                            <div class="col-12 col-md-4">
                                <label class="form-label">Left Image (Small #1) Upload</label>
                                <input class="form-control" type="file" name="contact[image_small1_file]" accept="image/*">
                                @if (data_get($contact, 'image_small1'))
                                    <div class="form-text">Current: {{ data_get($contact, 'image_small1') }}</div>
                                @endif
                            </div>
                            <div class="col-12 col-md-4">
                                <label class="form-label">Left Image (Small #2) Upload</label>
                                <input class="form-control" type="file" name="contact[image_small2_file]" accept="image/*">
                                @if (data_get($contact, 'image_small2'))
                                    <div class="form-text">Current: {{ data_get($contact, 'image_small2') }}</div>
                                @endif
                            </div>

                            <div class="col-12">
                                <hr class="my-2" />
                            </div>

                            <div class="col-12">
                                <h6 class="mb-1">Contact Page</h6>
                                <div class="text-muted small">Controls the <code>/contact</code> page texts (address/info). Form placeholders reuse <strong>Contact CTA</strong> above to avoid double input.</div>
                            </div>

                            <div class="col-12 col-md-4">
                                <label class="form-label">Left Tagline</label>
                                <input class="form-control" name="contact_page[left_tagline]" value="{{ old('contact_page.left_tagline', data_get($contactPage, 'left_tagline')) }}">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Left Title HTML (allowed: &lt;br&gt; and &lt;span&gt;)</label>
                                <textarea class="form-control" name="contact_page[left_title_html]" rows="2">{{ old('contact_page.left_title_html', data_get($contactPage, 'left_title_html')) }}</textarea>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Left Text</label>
                                <input class="form-control" name="contact_page[left_text]" value="{{ old('contact_page.left_text', data_get($contactPage, 'left_text')) }}">
                            </div>

                            <div class="col-12 col-md-4">
                                <label class="form-label">Address Title</label>
                                <input class="form-control" name="contact_page[address_title]" value="{{ old('contact_page.address_title', data_get($contactPage, 'address_title')) }}">
                            </div>
                            <div class="col-12 col-md-8">
                                <label class="form-label">Address HTML (allowed: &lt;br&gt;)</label>
                                <textarea class="form-control" name="contact_page[address_html]" rows="2">{{ old('contact_page.address_html', data_get($contactPage, 'address_html')) }}</textarea>
                            </div>

                            <div class="col-12 col-md-4">
                                <label class="form-label">Contact Info Title</label>
                                <input class="form-control" name="contact_page[contact_info_title]" value="{{ old('contact_page.contact_info_title', data_get($contactPage, 'contact_info_title')) }}">
                            </div>
                            <div class="col-12 col-md-4">
                                <label class="form-label">Phone</label>
                                <input class="form-control" name="contact_page[phone]" value="{{ old('contact_page.phone', data_get($contactPage, 'phone')) }}">
                            </div>
                            <div class="col-12 col-md-4">
                                <label class="form-label">Email</label>
                                <input class="form-control" name="contact_page[email]" value="{{ old('contact_page.email', data_get($contactPage, 'email')) }}">
                            </div>

                            <div class="col-12 col-md-4">
                                <label class="form-label">Working Time Title</label>
                                <input class="form-control" name="contact_page[working_time_title]" value="{{ old('contact_page.working_time_title', data_get($contactPage, 'working_time_title')) }}">
                            </div>
                            <div class="col-12 col-md-4">
                                <label class="form-label">Time Label</label>
                                <input class="form-control" name="contact_page[time_label]" value="{{ old('contact_page.time_label', data_get($contactPage, 'time_label')) }}">
                            </div>
                            <div class="col-12 col-md-4">
                                <label class="form-label">Time Value</label>
                                <input class="form-control" name="contact_page[time_value]" value="{{ old('contact_page.time_value', data_get($contactPage, 'time_value')) }}">
                            </div>

                            <div class="col-12 col-md-4">
                                <label class="form-label">Days Label</label>
                                <input class="form-control" name="contact_page[days_label]" value="{{ old('contact_page.days_label', data_get($contactPage, 'days_label')) }}">
                            </div>
                            <div class="col-12 col-md-8">
                                <label class="form-label">Days Value</label>
                                <input class="form-control" name="contact_page[days_value]" value="{{ old('contact_page.days_value', data_get($contactPage, 'days_value')) }}">
                            </div>

                            <div class="col-12 col-md-4">
                                <label class="form-label">Right Tagline</label>
                                <input class="form-control" name="contact_page[right_tagline]" value="{{ old('contact_page.right_tagline', data_get($contactPage, 'right_tagline')) }}">
                            </div>
                            <div class="col-12 col-md-8">
                                <label class="form-label">Right Title</label>
                                <input class="form-control" name="contact_page[right_title]" value="{{ old('contact_page.right_title', data_get($contactPage, 'right_title')) }}">
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Save Contact Settings</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
