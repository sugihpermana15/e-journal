<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Contact\UpdateContactPageSettingsRequest;
use App\Models\Ejournal\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class ContactPageController extends Controller
{
    public function edit()
    {
        $home = Setting::getValue('home', []);

        return view('admin.contact.edit', [
            'home' => is_array($home) ? $home : [],
        ]);
    }

    public function update(UpdateContactPageSettingsRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        return DB::transaction(function () use ($request, $validated) {
            $incomingContact = Arr::get($validated, 'contact', []);
            if (!is_array($incomingContact)) {
                $incomingContact = [];
            }

            $incomingContactPage = Arr::get($validated, 'contact_page', []);
            if (!is_array($incomingContactPage)) {
                $incomingContactPage = [];
            }

            $existingHome = Setting::getValue('home', []);
            if (!is_array($existingHome)) {
                $existingHome = [];
            }

            $existingContact = Arr::get($existingHome, 'contact', []);
            if (!is_array($existingContact)) {
                $existingContact = [];
            }

            $existingContactPage = Arr::get($existingHome, 'contact_page', []);
            if (!is_array($existingContactPage)) {
                $existingContactPage = [];
            }

            $contact = array_replace_recursive($existingContact, $incomingContact);
            $contactPage = array_replace_recursive($existingContactPage, $incomingContactPage);

            [$contact, $contactPage] = $this->normalizeContactSettings($contact, $contactPage);

            // Contact images
            if ($request->hasFile('contact.image_main_file')) {
                $path = $request->file('contact.image_main_file')->store('ejournal/home/contact', 'public');
                Arr::set($contact, 'image_main', $path);
            }
            if ($request->hasFile('contact.image_small1_file')) {
                $path = $request->file('contact.image_small1_file')->store('ejournal/home/contact', 'public');
                Arr::set($contact, 'image_small1', $path);
            }
            if ($request->hasFile('contact.image_small2_file')) {
                $path = $request->file('contact.image_small2_file')->store('ejournal/home/contact', 'public');
                Arr::set($contact, 'image_small2', $path);
            }

            $home = $existingHome;
            Arr::set($home, 'contact', $contact);
            Arr::set($home, 'contact_page', $contactPage);

            Setting::putValue('home', $home);

            return redirect()
                ->route('admin.contact.edit')
                ->with('success', 'Contact settings saved successfully.');
        });
    }

    private function normalizeContactSettings(array $contact, array $contactPage): array
    {
        // Contact subject options lines
        $subjectLines = Arr::get($contact, 'subject_options_lines');
        if (is_string($subjectLines)) {
            Arr::set($contact, 'subject_options', $this->splitLines($subjectLines));
        }
        Arr::forget($contact, 'subject_options_lines');

        // Sanitize heading html fields (allow only <br> and <span>)
        foreach (['heading_html'] as $key) {
            $value = Arr::get($contact, $key);
            if (is_string($value)) {
                Arr::set($contact, $key, strip_tags($value, '<br><span>'));
            }
        }

        foreach (['left_title_html'] as $key) {
            $value = Arr::get($contactPage, $key);
            if (is_string($value)) {
                Arr::set($contactPage, $key, strip_tags($value, '<br><span>'));
            }
        }

        // Sanitize simple HTML fields (allow only <br>)
        foreach (['address_html'] as $key) {
            $value = Arr::get($contactPage, $key);
            if (is_string($value)) {
                Arr::set($contactPage, $key, strip_tags($value, '<br>'));
            }
        }

        // Remove file placeholders (never stored)
        Arr::forget($contact, 'image_main_file');
        Arr::forget($contact, 'image_small1_file');
        Arr::forget($contact, 'image_small2_file');

        return [$contact, $contactPage];
    }

    private function splitLines(string $text): array
    {
        $lines = preg_split('/\r\n|\r|\n/', $text);
        $lines = array_map(fn ($v) => trim((string) $v), $lines);
        $lines = array_values(array_filter($lines, fn ($v) => $v !== ''));

        return $lines;
    }
}
