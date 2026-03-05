<?php

namespace App\Http\Requests\Admin\Ejournal\Services;

use Illuminate\Foundation\Http\FormRequest;

class UpdateServiceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $serviceId = $this->route('service')?->id;

        return [
            'slug' => ['required', 'string', 'max:120', 'regex:/^[a-z0-9\-]+$/', 'unique:m_ejournal_services,slug,' . $serviceId],
            'title' => ['required', 'string', 'max:255'],
            'text' => ['nullable', 'string'],
            'button_label' => ['nullable', 'string', 'max:255'],
            'icon' => ['nullable', 'string', 'max:255'],
            'small_label' => ['nullable', 'string', 'max:255'],
            'small_sublabel' => ['nullable', 'string', 'max:255'],
            'button_text' => ['nullable', 'string', 'max:255'],
            'is_active' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'image_file' => ['nullable', 'image', 'max:4096'],

            'detail' => ['nullable', 'array'],
            'detail.intro_title' => ['nullable', 'string'],
            'detail.intro_text' => ['nullable', 'string'],
            'detail.highlights_title' => ['nullable', 'string', 'max:255'],
            'detail.highlights_text' => ['nullable', 'string'],
            'detail.highlights_left_points_lines' => ['nullable', 'string'],
            'detail.highlights_right_points_lines' => ['nullable', 'string'],
            'detail.workflow_title' => ['nullable', 'string', 'max:255'],
            'detail.workflow_text' => ['nullable', 'string'],
            'detail.why_title' => ['nullable', 'string', 'max:255'],
            'detail.why_text_1' => ['nullable', 'string'],
            'detail.why_text_2' => ['nullable', 'string'],
            'detail.why_points_lines' => ['nullable', 'string'],
            'detail.post_text' => ['nullable', 'string'],
            'detail.doi_title' => ['nullable', 'string', 'max:255'],
            'detail.doi_text' => ['nullable', 'string'],

            'detail.sidebar' => ['nullable', 'array'],
            'detail.sidebar.more_services_title' => ['nullable', 'string', 'max:255'],
            'detail.sidebar.get_touch_title' => ['nullable', 'string', 'max:255'],
            'detail.sidebar.button_text' => ['nullable', 'string', 'max:255'],
            'detail.sidebar.button_url' => ['nullable', 'string', 'max:2048'],
            'detail.sidebar.call_label' => ['nullable', 'string', 'max:255'],
            'detail.sidebar.phone' => ['nullable', 'string', 'max:255'],

            'detail.faq' => ['nullable', 'array'],
            'detail.faq.tagline' => ['nullable', 'string', 'max:255'],
            'detail.faq.heading_html' => ['nullable', 'string'],
            'detail.faq.text' => ['nullable', 'string'],
            'detail.faq.points_lines' => ['nullable', 'string'],
            'detail.faq.accordions' => ['nullable', 'array'],
            'detail.faq.accordions.*.question' => ['nullable', 'string', 'max:255'],
            'detail.faq.accordions.*.answer' => ['nullable', 'string'],
            'detail.faq.contact' => ['nullable', 'array'],
            'detail.faq.contact.big_text' => ['nullable', 'string', 'max:255'],
            'detail.faq.contact.title_html' => ['nullable', 'string'],
            'detail.faq.contact.button_text' => ['nullable', 'string', 'max:255'],
            'detail.faq.contact.button_url' => ['nullable', 'string', 'max:2048'],

            'detail_images' => ['nullable', 'array'],
            'detail_images.main_image_file' => ['nullable', 'image', 'max:4096'],
            'detail_images.workflow_image_1_file' => ['nullable', 'image', 'max:4096'],
            'detail_images.workflow_image_2_file' => ['nullable', 'image', 'max:4096'],
            'detail_images.why_image_file' => ['nullable', 'image', 'max:4096'],
            'detail_images.bottom_image_file' => ['nullable', 'image', 'max:4096'],
        ];
    }
}
