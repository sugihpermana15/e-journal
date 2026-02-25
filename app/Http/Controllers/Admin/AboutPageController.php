<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\About\UpdateAboutPageSettingsRequest;
use App\Models\Ejournal\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class AboutPageController extends Controller
{
    public function edit()
    {
        $home = Setting::getValue('home', []);

        return view('admin.about.edit', [
            'home' => is_array($home) ? $home : [],
        ]);
    }

    public function update(UpdateAboutPageSettingsRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        return DB::transaction(function () use ($request, $validated) {
            $incomingAbout = Arr::get($validated, 'about_page', []);
            if (!is_array($incomingAbout)) {
                $incomingAbout = [];
            }

            $existingHome = Setting::getValue('home', []);
            if (!is_array($existingHome)) {
                $existingHome = [];
            }

            $existingAbout = Arr::get($existingHome, 'about_page', []);
            if (!is_array($existingAbout)) {
                $existingAbout = [];
            }

            $aboutPage = array_replace_recursive($existingAbout, $incomingAbout);
            $aboutPage = $this->normalizeAboutPageSettings($aboutPage);

            // About page images (4)
            $aboutPageImages = Arr::get($aboutPage, 'images', []);
            if (!is_array($aboutPageImages)) {
                $aboutPageImages = [];
            }
            $aboutPageImages = array_slice(array_pad($aboutPageImages, 4, []), 0, 4);

            foreach ($aboutPageImages as $i => $img) {
                if ($request->hasFile("about_page.images.$i.image_file")) {
                    $path = $request->file("about_page.images.$i.image_file")
                        ->store('ejournal/about-page/images', 'public');
                    Arr::set($aboutPageImages, "$i.image", $path);
                }

                unset($aboutPageImages[$i]['image_file']);
            }
            Arr::set($aboutPage, 'images', $aboutPageImages);

            $home = $existingHome;
            Arr::set($home, 'about_page', $aboutPage);

            Setting::putValue('home', $home);

            return redirect()
                ->route('admin.about.edit')
                ->with('success', 'About page settings saved successfully.');
        });
    }

    private function normalizeAboutPageSettings(array $aboutPage): array
    {
        $headingHtml = Arr::get($aboutPage, 'heading_html');
        if (is_string($headingHtml)) {
            Arr::set($aboutPage, 'heading_html', strip_tags($headingHtml, '<br><span>'));
        }

        // About Page mission points (lines -> structured array)
        $missionPointsLines = Arr::get($aboutPage, 'mission.points_lines');
        if (is_string($missionPointsLines)) {
            $rows = $this->splitLines($missionPointsLines);
            $points = [];
            foreach ($rows as $row) {
                // Format: title|text
                $parts = array_map('trim', explode('|', $row, 2));
                $title = $parts[0] ?? '';
                $text = $parts[1] ?? '';
                if ($title === '' && $text === '') {
                    continue;
                }
                $points[] = [
                    'title' => $title,
                    'text' => $text,
                ];
            }
            Arr::set($aboutPage, 'mission.points', $points);
        }
        Arr::forget($aboutPage, 'mission.points_lines');

        // Remove file placeholders (never stored)
        $images = Arr::get($aboutPage, 'images', []);
        if (is_array($images)) {
            foreach ($images as $i => $img) {
                unset($images[$i]['image_file']);
            }
            Arr::set($aboutPage, 'images', $images);
        }

        return $aboutPage;
    }

    private function splitLines(string $text): array
    {
        $lines = preg_split('/\r\n|\r|\n/', $text);
        $lines = array_map(fn ($v) => trim((string) $v), $lines);
        $lines = array_values(array_filter($lines, fn ($v) => $v !== ''));

        return $lines;
    }
}
