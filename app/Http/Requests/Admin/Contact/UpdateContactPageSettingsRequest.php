<?php

namespace App\Http\Requests\Admin\Contact;

use Illuminate\Foundation\Http\FormRequest;

class UpdateContactPageSettingsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'contact' => ['required', 'array'],
            'contact_page' => ['required', 'array'],

            'contact.tagline' => ['nullable', 'string', 'max:120'],
            'contact.heading_html' => ['nullable', 'string', 'max:2000'],
            'contact.name_placeholder' => ['nullable', 'string', 'max:120'],
            'contact.email_placeholder' => ['nullable', 'string', 'max:120'],
            'contact.phone_placeholder' => ['nullable', 'string', 'max:120'],
            'contact.subject_placeholder' => ['nullable', 'string', 'max:120'],
            'contact.subject_options_lines' => ['nullable', 'string'],
            'contact.message_placeholder' => ['nullable', 'string', 'max:255'],
            'contact.button_text' => ['nullable', 'string', 'max:120'],
            'contact.image_main_file' => ['nullable', 'image', 'max:4096'],
            'contact.image_small1_file' => ['nullable', 'image', 'max:4096'],
            'contact.image_small2_file' => ['nullable', 'image', 'max:4096'],
            'contact.image_main' => ['nullable', 'string', 'max:255'],
            'contact.image_small1' => ['nullable', 'string', 'max:255'],
            'contact.image_small2' => ['nullable', 'string', 'max:255'],

            // Contact page (public /contact)
            'contact_page.left_tagline' => ['nullable', 'string', 'max:120'],
            'contact_page.left_title_html' => ['nullable', 'string', 'max:2000'],
            'contact_page.left_text' => ['nullable', 'string', 'max:255'],
            'contact_page.address_title' => ['nullable', 'string', 'max:120'],
            'contact_page.address_html' => ['nullable', 'string', 'max:500'],
            'contact_page.contact_info_title' => ['nullable', 'string', 'max:120'],
            'contact_page.phone' => ['nullable', 'string', 'max:60'],
            'contact_page.email' => ['nullable', 'string', 'max:120'],
            'contact_page.working_time_title' => ['nullable', 'string', 'max:120'],
            'contact_page.time_label' => ['nullable', 'string', 'max:60'],
            'contact_page.time_value' => ['nullable', 'string', 'max:120'],
            'contact_page.days_label' => ['nullable', 'string', 'max:60'],
            'contact_page.days_value' => ['nullable', 'string', 'max:120'],
            'contact_page.right_tagline' => ['nullable', 'string', 'max:120'],
            'contact_page.right_title' => ['nullable', 'string', 'max:120'],
        ];
    }
}
