<?php

namespace App\Http\Controllers\Admin\Ejournal;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Ejournal\UpdateHeaderSettingsRequest;
use App\Models\Ejournal\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

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
            $header = Arr::get($validated, 'header', []);

            $header = $this->normalizeHeaderSettings($header);

            if ($request->hasFile('header.logo_file')) {
                $path = $request->file('header.logo_file')->store('ejournal/header', 'public');
                Arr::set($header, 'logo_path', $path);
            }

            if ($request->hasFile('header.favicon_file')) {
                $path = $request->file('header.favicon_file')->store('ejournal/favicon', 'public');
                Arr::set($header, 'favicon_path', $path);
            }

            Arr::forget($header, 'logo_file');
            Arr::forget($header, 'favicon_file');

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

        return $header;
    }
}
