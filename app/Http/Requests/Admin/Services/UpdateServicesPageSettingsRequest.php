<?php

namespace App\Http\Requests\Admin\Services;

use Illuminate\Foundation\Http\FormRequest;

class UpdateServicesPageSettingsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'services' => ['required', 'array'],
            'services_page' => ['nullable', 'array'],
            'services_detail' => ['required', 'array'],

            'services.tagline' => ['nullable', 'string', 'max:120'],
            'services.heading_html' => ['nullable', 'string', 'max:2500'],

            'services.tabs' => ['nullable', 'array'],
            'services.tabs.*.button_label' => ['nullable', 'string', 'max:255'],
            'services.tabs.*.slug' => ['nullable', 'string', 'max:120'],
            'services.tabs.*.icon' => ['nullable', 'string', 'max:120'],
            'services.tabs.*.title' => ['nullable', 'string', 'max:255'],
            'services.tabs.*.text' => ['nullable', 'string'],
            'services.tabs.*.small_label' => ['nullable', 'string', 'max:120'],
            'services.tabs.*.small_sublabel' => ['nullable', 'string', 'max:120'],
            'services.tabs.*.button_text' => ['nullable', 'string', 'max:120'],
            'services.tabs.*.button_url' => ['nullable', 'string', 'max:255'],
            'services.tabs.*.image_file' => ['nullable', 'image', 'max:4096'],
            'services.tabs.*.image' => ['nullable', 'string', 'max:255'],

            // /services page sections below tabs
            'services_page.workflow' => ['nullable', 'array'],
            'services_page.workflow.tagline' => ['nullable', 'string', 'max:120'],
            'services_page.workflow.heading_html' => ['nullable', 'string', 'max:2500'],
            'services_page.workflow.items' => ['nullable', 'array'],
            'services_page.workflow.items.*.icon' => ['nullable', 'string', 'max:120'],
            'services_page.workflow.items.*.title_html' => ['nullable', 'string', 'max:2500'],
            'services_page.workflow.items.*.text' => ['nullable', 'string', 'max:2500'],
            'services_page.workflow.items.*.url' => ['nullable', 'string', 'max:255'],

            'services_page.faq' => ['nullable', 'array'],
            'services_page.faq.tagline' => ['nullable', 'string', 'max:120'],
            'services_page.faq.heading_html' => ['nullable', 'string', 'max:2500'],
            'services_page.faq.text' => ['nullable', 'string', 'max:2500'],
            'services_page.faq.points_lines' => ['nullable', 'string'],
            'services_page.faq.points' => ['nullable', 'array'],

            'services_page.faq.contact' => ['nullable', 'array'],
            'services_page.faq.contact.big_text' => ['nullable', 'string', 'max:120'],
            'services_page.faq.contact.title_html' => ['nullable', 'string', 'max:2500'],
            'services_page.faq.contact.button_text' => ['nullable', 'string', 'max:120'],
            'services_page.faq.contact.button_url' => ['nullable', 'string', 'max:255'],

            'services_page.faq.accordions' => ['nullable', 'array'],
            'services_page.faq.accordions.*.question' => ['nullable', 'string', 'max:255'],
            'services_page.faq.accordions.*.answer' => ['nullable', 'string'],

            'services_detail.intro_title' => ['nullable', 'string', 'max:2500'],
            'services_detail.intro_text' => ['nullable', 'string'],
            'services_detail.main_image_file' => ['nullable', 'image', 'max:4096'],
            'services_detail.main_image' => ['nullable', 'string', 'max:255'],

            'services_detail.highlights_title' => ['nullable', 'string', 'max:255'],
            'services_detail.highlights_text' => ['nullable', 'string'],
            'services_detail.highlights_left_points_lines' => ['nullable', 'string'],
            'services_detail.highlights_right_points_lines' => ['nullable', 'string'],
            'services_detail.highlights_left_points' => ['nullable', 'array'],
            'services_detail.highlights_right_points' => ['nullable', 'array'],

            'services_detail.cards' => ['nullable', 'array'],
            'services_detail.cards.*.icon' => ['nullable', 'string', 'max:120'],
            'services_detail.cards.*.title' => ['nullable', 'string', 'max:255'],
            'services_detail.cards.*.text' => ['nullable', 'string', 'max:2500'],

            'services_detail.workflow_title' => ['nullable', 'string', 'max:255'],
            'services_detail.workflow_text' => ['nullable', 'string'],
            'services_detail.workflow_image_1_file' => ['nullable', 'image', 'max:4096'],
            'services_detail.workflow_image_1' => ['nullable', 'string', 'max:255'],
            'services_detail.workflow_image_2_file' => ['nullable', 'image', 'max:4096'],
            'services_detail.workflow_image_2' => ['nullable', 'string', 'max:255'],

            'services_detail.why_title' => ['nullable', 'string', 'max:255'],
            'services_detail.why_text_1' => ['nullable', 'string'],
            'services_detail.why_text_2' => ['nullable', 'string'],
            'services_detail.why_points_lines' => ['nullable', 'string'],
            'services_detail.why_points' => ['nullable', 'array'],
            'services_detail.why_image_file' => ['nullable', 'image', 'max:4096'],
            'services_detail.why_image' => ['nullable', 'string', 'max:255'],

            'services_detail.post_text' => ['nullable', 'string', 'max:2500'],
            'services_detail.doi_title' => ['nullable', 'string', 'max:255'],
            'services_detail.doi_text' => ['nullable', 'string'],
            'services_detail.bottom_image_file' => ['nullable', 'image', 'max:4096'],
            'services_detail.bottom_image' => ['nullable', 'string', 'max:255'],

            'services_detail.sidebar' => ['nullable', 'array'],
            'services_detail.sidebar.more_services_title' => ['nullable', 'string', 'max:255'],
            'services_detail.sidebar.more_services_lines' => ['nullable', 'string'],
            'services_detail.sidebar.more_services' => ['nullable', 'array'],
            'services_detail.sidebar.get_touch_title' => ['nullable', 'string', 'max:255'],
            'services_detail.sidebar.button_text' => ['nullable', 'string', 'max:120'],
            'services_detail.sidebar.button_url' => ['nullable', 'string', 'max:255'],
            'services_detail.sidebar.call_label' => ['nullable', 'string', 'max:255'],
            'services_detail.sidebar.phone' => ['nullable', 'string', 'max:60'],

            'services_detail.faq' => ['nullable', 'array'],
            'services_detail.faq.tagline' => ['nullable', 'string', 'max:120'],
            'services_detail.faq.heading_html' => ['nullable', 'string', 'max:2500'],
            'services_detail.faq.text' => ['nullable', 'string', 'max:2500'],
            'services_detail.faq.points_lines' => ['nullable', 'string'],
            'services_detail.faq.points' => ['nullable', 'array'],

            'services_detail.faq.contact' => ['nullable', 'array'],
            'services_detail.faq.contact.big_text' => ['nullable', 'string', 'max:120'],
            'services_detail.faq.contact.title_html' => ['nullable', 'string', 'max:2500'],
            'services_detail.faq.contact.button_text' => ['nullable', 'string', 'max:120'],
            'services_detail.faq.contact.button_url' => ['nullable', 'string', 'max:255'],

            'services_detail.faq.accordions' => ['nullable', 'array'],
            'services_detail.faq.accordions.*.question' => ['nullable', 'string', 'max:255'],
            'services_detail.faq.accordions.*.answer' => ['nullable', 'string'],
        ];
    }
}
