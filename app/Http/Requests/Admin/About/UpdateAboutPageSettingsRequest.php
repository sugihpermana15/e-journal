<?php

namespace App\Http\Requests\Admin\About;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAboutPageSettingsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'about_page' => ['required', 'array'],

            'about_page.tagline' => ['nullable', 'string', 'max:120'],
            'about_page.heading_html' => ['nullable', 'string', 'max:2500'],
            'about_page.text' => ['nullable', 'string'],
            'about_page.consultation_button_text' => ['nullable', 'string', 'max:120'],
            'about_page.consultation_button_url' => ['nullable', 'string', 'max:255'],
            'about_page.office_hours' => ['nullable', 'string', 'max:255'],
            'about_page.phone' => ['nullable', 'string', 'max:60'],

            'about_page.images' => ['nullable', 'array'],
            'about_page.images.*.image_file' => ['nullable', 'image', 'max:4096'],
            'about_page.images.*.image' => ['nullable', 'string', 'max:255'],

            'about_page.counters' => ['nullable', 'array'],
            'about_page.counters.*.count' => ['nullable', 'integer', 'min:0'],
            'about_page.counters.*.suffix' => ['nullable', 'string', 'max:10'],
            'about_page.counters.*.label' => ['nullable', 'string', 'max:255'],

            'about_page.vision' => ['nullable', 'array'],
            'about_page.vision.title' => ['nullable', 'string', 'max:120'],
            'about_page.vision.subtitle' => ['nullable', 'string', 'max:255'],
            'about_page.vision.text' => ['nullable', 'string'],

            'about_page.mission' => ['nullable', 'array'],
            'about_page.mission.title' => ['nullable', 'string', 'max:120'],
            'about_page.mission.subtitle' => ['nullable', 'string', 'max:255'],
            'about_page.mission.points_lines' => ['nullable', 'string'],
            'about_page.mission.points' => ['nullable', 'array'],
            'about_page.mission.points.*.title' => ['nullable', 'string', 'max:255'],
            'about_page.mission.points.*.text' => ['nullable', 'string'],
        ];
    }
}
