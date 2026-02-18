<?php

namespace App\Http\Controllers\Admin\Ejournal;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Ejournal\UpdateHomeSettingsRequest;
use App\Models\Ejournal\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class SettingsController extends Controller
{
    public function edit()
    {
        $home = Setting::getValue('home', []);

        return view('admin.ejournal.settings.edit', [
            'home' => is_array($home) ? $home : [],
        ]);
    }

    public function update(UpdateHomeSettingsRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        return DB::transaction(function () use ($request, $validated) {
            $home = Arr::get($validated, 'home', []);

            // Home "Featured Publications" now comes from Journals (DB), not settings.
            // Never persist any legacy featured configuration even if posted.
            Arr::forget($home, 'featured');

            $home = $this->normalizeHomeSettings($home);

            // Banner image upload
            if ($request->hasFile('home.banner.image_file')) {
                $path = $request->file('home.banner.image_file')->store('ejournal/home', 'public');
                Arr::set($home, 'banner.image', $path);
            }

            // Banner satisfied partner images (3)
            $partnerImages = Arr::get($home, 'banner.satisfied_partner.images', []);
            if (!is_array($partnerImages)) {
                $partnerImages = [];
            }
            foreach ($partnerImages as $i => $img) {
                if ($request->hasFile("home.banner.satisfied_partner.images.$i.image_file")) {
                    $path = $request->file("home.banner.satisfied_partner.images.$i.image_file")
                        ->store('ejournal/home/banner/partners', 'public');
                    Arr::set($partnerImages, "$i.image", $path);
                }
            }
            Arr::set($home, 'banner.satisfied_partner.images', $partnerImages);

            // Banner google rating image
            if ($request->hasFile('home.banner.google_rating.image_file')) {
                $path = $request->file('home.banner.google_rating.image_file')
                    ->store('ejournal/home/banner/google', 'public');
                Arr::set($home, 'banner.google_rating.image', $path);
            }

            // Service tabs images
            $tabs = Arr::get($home, 'services.tabs', []);
            foreach ($tabs as $i => $tab) {
                if ($request->hasFile("home.services.tabs.$i.image_file")) {
                    $path = $request->file("home.services.tabs.$i.image_file")->store('ejournal/home/services', 'public');
                    Arr::set($tabs, "$i.image", $path);
                }
            }
            Arr::set($home, 'services.tabs', $tabs);

            // Services Detail images
            if ($request->hasFile('home.services_detail.main_image_file')) {
                $path = $request->file('home.services_detail.main_image_file')->store('ejournal/services-detail', 'public');
                Arr::set($home, 'services_detail.main_image', $path);
            }
            if ($request->hasFile('home.services_detail.workflow_image_1_file')) {
                $path = $request->file('home.services_detail.workflow_image_1_file')->store('ejournal/services-detail', 'public');
                Arr::set($home, 'services_detail.workflow_image_1', $path);
            }
            if ($request->hasFile('home.services_detail.workflow_image_2_file')) {
                $path = $request->file('home.services_detail.workflow_image_2_file')->store('ejournal/services-detail', 'public');
                Arr::set($home, 'services_detail.workflow_image_2', $path);
            }
            if ($request->hasFile('home.services_detail.why_image_file')) {
                $path = $request->file('home.services_detail.why_image_file')->store('ejournal/services-detail', 'public');
                Arr::set($home, 'services_detail.why_image', $path);
            }
            if ($request->hasFile('home.services_detail.bottom_image_file')) {
                $path = $request->file('home.services_detail.bottom_image_file')->store('ejournal/services-detail', 'public');
                Arr::set($home, 'services_detail.bottom_image', $path);
            }

            // Contact images
            if ($request->hasFile('home.contact.image_main_file')) {
                $path = $request->file('home.contact.image_main_file')->store('ejournal/home/contact', 'public');
                Arr::set($home, 'contact.image_main', $path);
            }
            if ($request->hasFile('home.contact.image_small1_file')) {
                $path = $request->file('home.contact.image_small1_file')->store('ejournal/home/contact', 'public');
                Arr::set($home, 'contact.image_small1', $path);
            }
            if ($request->hasFile('home.contact.image_small2_file')) {
                $path = $request->file('home.contact.image_small2_file')->store('ejournal/home/contact', 'public');
                Arr::set($home, 'contact.image_small2', $path);
            }

            // Blog cards images
            $cards = Arr::get($home, 'blog.cards', []);
            foreach ($cards as $i => $card) {
                if ($request->hasFile("home.blog.cards.$i.image_file")) {
                    $path = $request->file("home.blog.cards.$i.image_file")->store('ejournal/home/blog', 'public');
                    Arr::set($cards, "$i.image", $path);
                }
            }
            Arr::set($home, 'blog.cards', $cards);

            // Blog detail hero image
            if ($request->hasFile('home.blog_detail.hero_file')) {
                $path = $request->file('home.blog_detail.hero_file')->store('ejournal/blog-detail', 'public');
                Arr::set($home, 'blog_detail.hero', $path);
            }

            // Testimonials images
            $testimonials = Arr::get($home, 'testimonials.items', []);
            if (is_array($testimonials)) {
                foreach ($testimonials as $i => $t) {
                    if ($request->hasFile("home.testimonials.items.$i.image_file")) {
                        $path = $request->file("home.testimonials.items.$i.image_file")
                            ->store('ejournal/home/testimonials', 'public');
                        Arr::set($testimonials, "$i.image", $path);
                    }
                }
                Arr::set($home, 'testimonials.items', $testimonials);
            }

            // About page images (4)
            $aboutPageImages = Arr::get($home, 'about_page.images', []);
            if (!is_array($aboutPageImages)) {
                $aboutPageImages = [];
            }
            foreach ($aboutPageImages as $i => $img) {
                if ($request->hasFile("home.about_page.images.$i.image_file")) {
                    $path = $request->file("home.about_page.images.$i.image_file")
                        ->store('ejournal/about-page/images', 'public');
                    Arr::set($aboutPageImages, "$i.image", $path);
                }
            }
            Arr::set($home, 'about_page.images', $aboutPageImages);

            Setting::putValue('home', $home);

            return redirect()
                ->route('admin.ejournal.settings.edit')
                ->with('success', 'Settings saved successfully.');
        });
    }

    private function normalizeHomeSettings(array $home): array
    {
        // Convert textarea lines into arrays
        $slidingLines = Arr::get($home, 'sliding_text_lines');
        if (is_string($slidingLines)) {
            $home['sliding_text'] = $this->splitLines($slidingLines);
        }
        unset($home['sliding_text_lines']);

        $pointsLines = Arr::get($home, 'about.points_lines');
        if (is_string($pointsLines)) {
            $rows = $this->splitLines($pointsLines);
            $points = [];
            foreach ($rows as $row) {
                // Format: icon|text  (icon optional)
                $parts = array_map('trim', explode('|', $row, 2));
                if (count($parts) === 2) {
                    $icon = $parts[0] !== '' ? $parts[0] : 'icon-check';
                    $text = $parts[1];
                } else {
                    $icon = 'icon-check';
                    $text = $parts[0];
                }

                if ($text === '') {
                    continue;
                }

                $points[] = [
                    'icon' => $icon,
                    'text' => $text,
                ];
            }
            Arr::set($home, 'about.points', $points);
        }
        Arr::forget($home, 'about.points_lines');

        // Contact subject options lines
        $subjectLines = Arr::get($home, 'contact.subject_options_lines');
        if (is_string($subjectLines)) {
            Arr::set($home, 'contact.subject_options', $this->splitLines($subjectLines));
        }
        Arr::forget($home, 'contact.subject_options_lines');

        // Blog sidebar keywords lines
        $keywordsLines = Arr::get($home, 'blog_sidebar.keywords_lines');
        if (is_string($keywordsLines)) {
            Arr::set($home, 'blog_sidebar.keywords', $this->splitLines($keywordsLines));
        }
        Arr::forget($home, 'blog_sidebar.keywords_lines');

        // Manuscript category options lines
        $categoryLines = Arr::get($home, 'manuscript.category_options_lines');
        if (is_string($categoryLines)) {
            Arr::set($home, 'manuscript.category_options', $this->splitLines($categoryLines));
        }
        Arr::forget($home, 'manuscript.category_options_lines');

        // Sanitize heading html fields (allow only <br> and <span>)
        foreach ([
            'about.heading_html',
            'about_page.heading_html',
            'services.heading_html',
            'services_page.workflow.heading_html',
            'services_page.faq.heading_html',
            'services_page.faq.contact.title_html',
            'blog.heading_html',
            'contact.heading_html',
            'contact_page.left_title_html',
            'testimonials.heading_html',
            'services_detail.faq.heading_html',
            'services_detail.faq.contact.title_html',
        ] as $path) {
            $value = Arr::get($home, $path);
            if (is_string($value)) {
                Arr::set($home, $path, strip_tags($value, '<br><span>'));
            }
        }

        // Sanitize simple HTML fields (allow only <br>)
        foreach ([
            'contact_page.address_html',
        ] as $path) {
            $value = Arr::get($home, $path);
            if (is_string($value)) {
                Arr::set($home, $path, strip_tags($value, '<br>'));
            }
        }

        // Sanitize workflow item title_html and FAQ points (allow only <br> and <span>)
        $workflowItems = Arr::get($home, 'services_page.workflow.items', []);
        if (is_array($workflowItems)) {
            foreach ($workflowItems as $i => $item) {
                $titleHtml = $item['title_html'] ?? null;
                if (is_string($titleHtml)) {
                    $workflowItems[$i]['title_html'] = strip_tags($titleHtml, '<br><span>');
                }
            }
            Arr::set($home, 'services_page.workflow.items', $workflowItems);
        }

        $servicesFaqPoints = Arr::get($home, 'services_page.faq.points', []);
        if (is_array($servicesFaqPoints)) {
            foreach ($servicesFaqPoints as $i => $p) {
                if (is_string($p)) {
                    $servicesFaqPoints[$i] = strip_tags($p, '<br><span>');
                }
            }
            Arr::set($home, 'services_page.faq.points', $servicesFaqPoints);
        }

        $detailFaqPoints = Arr::get($home, 'services_detail.faq.points', []);
        if (is_array($detailFaqPoints)) {
            foreach ($detailFaqPoints as $i => $p) {
                if (is_string($p)) {
                    $detailFaqPoints[$i] = strip_tags($p, '<br><span>');
                }
            }
            Arr::set($home, 'services_detail.faq.points', $detailFaqPoints);
        }

        // Services page FAQ points (lines -> array)
        $servicesFaqPointsLines = Arr::get($home, 'services_page.faq.points_lines');
        if (is_string($servicesFaqPointsLines)) {
            $points = $this->splitLines($servicesFaqPointsLines);
            $points = array_map(function ($p) {
                return is_string($p) ? strip_tags($p, '<br><span>') : $p;
            }, $points);
            Arr::set($home, 'services_page.faq.points', $points);
        }
        Arr::forget($home, 'services_page.faq.points_lines');

        // Services detail points (lines -> array)
        $hlLeftLines = Arr::get($home, 'services_detail.highlights_left_points_lines');
        if (is_string($hlLeftLines)) {
            Arr::set($home, 'services_detail.highlights_left_points', $this->splitLines($hlLeftLines));
        }
        Arr::forget($home, 'services_detail.highlights_left_points_lines');

        $hlRightLines = Arr::get($home, 'services_detail.highlights_right_points_lines');
        if (is_string($hlRightLines)) {
            Arr::set($home, 'services_detail.highlights_right_points', $this->splitLines($hlRightLines));
        }
        Arr::forget($home, 'services_detail.highlights_right_points_lines');

        $whyPointsLines = Arr::get($home, 'services_detail.why_points_lines');
        if (is_string($whyPointsLines)) {
            Arr::set($home, 'services_detail.why_points', $this->splitLines($whyPointsLines));
        }
        Arr::forget($home, 'services_detail.why_points_lines');

        $moreServicesLines = Arr::get($home, 'services_detail.sidebar.more_services_lines');
        if (is_string($moreServicesLines)) {
            Arr::set($home, 'services_detail.sidebar.more_services', $this->splitLines($moreServicesLines));
        }
        Arr::forget($home, 'services_detail.sidebar.more_services_lines');

        $detailFaqPointsLines = Arr::get($home, 'services_detail.faq.points_lines');
        if (is_string($detailFaqPointsLines)) {
            $points = $this->splitLines($detailFaqPointsLines);
            $points = array_map(function ($p) {
                return is_string($p) ? strip_tags($p, '<br><span>') : $p;
            }, $points);
            Arr::set($home, 'services_detail.faq.points', $points);
        }
        Arr::forget($home, 'services_detail.faq.points_lines');

        // About Page mission points (lines -> structured array)
        $missionPointsLines = Arr::get($home, 'about_page.mission.points_lines');
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
            Arr::set($home, 'about_page.mission.points', $points);
        }
        Arr::forget($home, 'about_page.mission.points_lines');

        // Remove file placeholders (never stored)
        Arr::forget($home, 'banner.image_file');
        Arr::forget($home, 'banner.google_rating.image_file');

        $partnerImages = Arr::get($home, 'banner.satisfied_partner.images', []);
        if (is_array($partnerImages)) {
            foreach ($partnerImages as $i => $img) {
                unset($partnerImages[$i]['image_file']);
            }
            Arr::set($home, 'banner.satisfied_partner.images', $partnerImages);
        }

        $tabs = Arr::get($home, 'services.tabs', []);
        if (is_array($tabs)) {
            foreach ($tabs as $i => $tab) {
                unset($tabs[$i]['image_file']);
            }
            Arr::set($home, 'services.tabs', $tabs);
        }

        // Remove services detail file placeholders (never stored)
        Arr::forget($home, 'services_detail.main_image_file');
        Arr::forget($home, 'services_detail.workflow_image_1_file');
        Arr::forget($home, 'services_detail.workflow_image_2_file');
        Arr::forget($home, 'services_detail.why_image_file');
        Arr::forget($home, 'services_detail.bottom_image_file');

        Arr::forget($home, 'contact.image_main_file');
        Arr::forget($home, 'contact.image_small1_file');
        Arr::forget($home, 'contact.image_small2_file');

        $cards = Arr::get($home, 'blog.cards', []);
        if (is_array($cards)) {
            foreach ($cards as $i => $card) {
                unset($cards[$i]['image_file']);
            }
            Arr::set($home, 'blog.cards', $cards);
        }

        $testimonials = Arr::get($home, 'testimonials.items', []);
        if (is_array($testimonials)) {
            foreach ($testimonials as $i => $t) {
                unset($testimonials[$i]['image_file']);
            }
            Arr::set($home, 'testimonials.items', $testimonials);
        }

        $aboutPageImages = Arr::get($home, 'about_page.images', []);
        if (is_array($aboutPageImages)) {
            foreach ($aboutPageImages as $i => $img) {
                unset($aboutPageImages[$i]['image_file']);
            }
            Arr::set($home, 'about_page.images', $aboutPageImages);
        }

        return $home;
    }

    private function splitLines(string $text): array
    {
        $lines = preg_split('/\r\n|\r|\n/', $text);
        $lines = array_map(fn ($v) => trim((string) $v), $lines);
        $lines = array_values(array_filter($lines, fn ($v) => $v !== ''));

        return $lines;
    }
}
