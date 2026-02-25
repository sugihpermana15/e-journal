<?php

namespace App\Http\Controllers\Admin\Ejournal;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Ejournal\UpdateHeaderSettingsRequest;
use App\Models\Ejournal\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class HeaderController extends Controller
{
    public function edit()
    {
        $header = Setting::getValue('header', []);

        return view('admin.ejournal.header.edit', [
            'header' => is_array($header) ? $header : [],
        ]);
    }

    public function update(UpdateHeaderSettingsRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        return DB::transaction(function () use ($request, $validated) {
            $incomingHeader = Arr::get($validated, 'header', []);
            if (!is_array($incomingHeader)) {
                $incomingHeader = [];
            }

            // Preserve previously saved settings that aren't posted by the form.
            // File inputs (logo/favicon/breadcrumb bg) do not send the existing path.
            $existingHeader = Setting::getValue('header', []);
            if (!is_array($existingHeader)) {
                $existingHeader = [];
            }

            $header = array_replace_recursive($existingHeader, $incomingHeader);

            $header = $this->normalizeHeaderSettings($header);

            if ($request->hasFile('header.logo_file')) {
                $path = $request->file('header.logo_file')->store('ejournal/header', 'public');
                Arr::set($header, 'logo_path', $path);
            }

            if ($request->hasFile('header.favicon_file')) {
                $path = $request->file('header.favicon_file')->store('ejournal/favicon', 'public');
                Arr::set($header, 'favicon_path', $path);
            }

            // Breadcrumb background image (page header)
            $removeBreadcrumbBg = (bool) Arr::get($incomingHeader, 'breadcrumb_bg_remove', false);
            if ($removeBreadcrumbBg) {
                $oldPath = Arr::get($existingHeader, 'breadcrumb_bg_path');
                if (is_string($oldPath) && $oldPath !== '') {
                    Storage::disk('public')->delete($oldPath);
                }
                Arr::forget($header, 'breadcrumb_bg_path');
            }
            if ($request->hasFile('header.breadcrumb_bg_file')) {
                $path = $request->file('header.breadcrumb_bg_file')->store('ejournal/breadcrumbs', 'public');
                Arr::set($header, 'breadcrumb_bg_path', $path);
            }

            Arr::forget($header, 'logo_file');
            Arr::forget($header, 'favicon_file');
            Arr::forget($header, 'breadcrumb_bg_file');
            Arr::forget($header, 'breadcrumb_bg_remove');

            Setting::putValue('header', $header);

            return redirect()
                ->route('admin.ejournal.header.edit')
                ->with('success', 'Header settings saved successfully.');
        });
    }

    private function normalizeHeaderSettings(array $header): array
    {
        $contacts = Arr::get($header, 'contacts', []);
        if (!is_array($contacts)) {
            $contacts = [];
        }

        $normalizedContacts = [];
        foreach ($contacts as $row) {
            if (!is_array($row)) {
                continue;
            }

            $icon = trim((string) ($row['icon'] ?? ''));
            $text = trim((string) ($row['text'] ?? ''));
            $href = trim((string) ($row['href'] ?? ''));

            if ($text === '' && $href === '') {
                continue;
            }

            $normalizedContacts[] = [
                'icon' => $icon,
                'text' => $text,
                'href' => $href,
            ];
        }
        Arr::set($header, 'contacts', array_values($normalizedContacts));

        $socials = Arr::get($header, 'socials', []);
        if (!is_array($socials)) {
            $socials = [];
        }

        $normalizedSocials = [];
        foreach ($socials as $row) {
            if (!is_array($row)) {
                continue;
            }

            $icon = trim((string) ($row['icon'] ?? ''));
            $url = trim((string) ($row['url'] ?? ''));

            if ($icon === '' || $url === '') {
                continue;
            }

            $normalizedSocials[] = [
                'icon' => $icon,
                'url' => $url,
            ];
        }
        Arr::set($header, 'socials', array_values($normalizedSocials));

        $breadcrumbSocials = Arr::get($header, 'breadcrumb_socials', []);
        if (!is_array($breadcrumbSocials)) {
            $breadcrumbSocials = [];
        }

        $normalizedBreadcrumbSocials = [];
        foreach ($breadcrumbSocials as $row) {
            if (!is_array($row)) {
                continue;
            }

            $label = trim((string) ($row['label'] ?? ''));
            $url = trim((string) ($row['url'] ?? ''));

            if ($label === '' || $url === '') {
                continue;
            }

            $normalizedBreadcrumbSocials[] = [
                'label' => $label,
                'url' => $url,
            ];
        }
        Arr::set($header, 'breadcrumb_socials', array_values($normalizedBreadcrumbSocials));

        return $header;
    }
}
