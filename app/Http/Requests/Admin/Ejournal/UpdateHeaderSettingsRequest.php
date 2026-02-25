<?php

namespace App\Http\Requests\Admin\Ejournal;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHeaderSettingsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'header' => ['array'],

            // Backward-compatible single fields (kept optional)
            'header.email' => ['nullable', 'email', 'max:255'],
            'header.phone' => ['nullable', 'string', 'max:255'],
            'header.phone_href' => ['nullable', 'string', 'max:255'],
            'header.location' => ['nullable', 'string', 'max:255'],

            // New dynamic contact list
            'header.contacts' => ['array'],
            'header.contacts.*' => ['array'],
            'header.contacts.*.icon' => ['nullable', 'string', 'max:255'],
            'header.contacts.*.text' => ['nullable', 'string', 'max:255'],
            'header.contacts.*.href' => ['nullable', 'string', 'max:2048'],

            'header.follow_title' => ['nullable', 'string', 'max:255'],

            // Backward-compatible social map (kept optional)
            'header.social' => ['array'],
            'header.social.facebook' => ['nullable', 'url', 'max:255'],
            'header.social.pinterest' => ['nullable', 'url', 'max:255'],
            'header.social.linkedin' => ['nullable', 'url', 'max:255'],
            'header.social.instagram' => ['nullable', 'url', 'max:255'],

            // New dynamic social list
            'header.socials' => ['array'],
            'header.socials.*' => ['array'],
            'header.socials.*.icon' => ['nullable', 'string', 'max:255'],
            'header.socials.*.url' => ['nullable', 'url', 'max:255'],

            'header.logo_path' => ['nullable', 'string', 'max:2048'],
            'header.logo_file' => ['nullable', 'image', 'max:2048'],
            'header.logo_alt' => ['nullable', 'string', 'max:255'],

            'header.favicon_path' => ['nullable', 'string', 'max:2048'],
            'header.favicon_file' => ['nullable', 'image', 'max:1024'],

            'header.breadcrumb_bg_path' => ['nullable', 'string', 'max:2048'],
            'header.breadcrumb_bg_file' => ['nullable', 'image', 'max:4096'],
            'header.breadcrumb_bg_remove' => ['nullable', 'boolean'],

            // Breadcrumbs social links (page header)
            'header.breadcrumb_socials' => ['array'],
            'header.breadcrumb_socials.*' => ['array'],
            'header.breadcrumb_socials.*.label' => ['nullable', 'string', 'max:255'],
            'header.breadcrumb_socials.*.url' => ['nullable', 'string', 'max:2048'],

            'header.consultation_text' => ['nullable', 'string', 'max:255'],
            'header.consultation_url' => ['nullable', 'url', 'max:255'],
        ];
    }
}
