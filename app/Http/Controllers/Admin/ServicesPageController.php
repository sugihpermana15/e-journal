<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Services\UpdateServicesPageSettingsRequest;
use App\Models\Ejournal\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class ServicesPageController extends Controller
{
    public function edit()
    {
        $home = Setting::getValue('home', []);

        return view('admin.services.edit', [
            'home' => is_array($home) ? $home : [],
        ]);
    }

    public function update(UpdateServicesPageSettingsRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        return DB::transaction(function () use ($request, $validated) {
            $incomingServices = Arr::get($validated, 'services', []);
            if (!is_array($incomingServices)) {
                $incomingServices = [];
            }

            $incomingServicesDetail = Arr::get($validated, 'services_detail', []);
            if (!is_array($incomingServicesDetail)) {
                $incomingServicesDetail = [];
            }

            $incomingServicesPage = Arr::get($validated, 'services_page', []);
            if (!is_array($incomingServicesPage)) {
                $incomingServicesPage = [];
            }

            $existingHome = Setting::getValue('home', []);
            if (!is_array($existingHome)) {
                $existingHome = [];
            }

            $existingServices = Arr::get($existingHome, 'services', []);
            if (!is_array($existingServices)) {
                $existingServices = [];
            }

            $existingServicesDetail = Arr::get($existingHome, 'services_detail', []);
            if (!is_array($existingServicesDetail)) {
                $existingServicesDetail = [];
            }

            $existingServicesPage = Arr::get($existingHome, 'services_page', []);
            if (!is_array($existingServicesPage)) {
                $existingServicesPage = [];
            }

            $services = array_replace_recursive($existingServices, $incomingServices);
            $servicesDetail = array_replace_recursive($existingServicesDetail, $incomingServicesDetail);
            $servicesPage = array_replace_recursive($existingServicesPage, $incomingServicesPage);

            [$services, $servicesDetail] = $this->normalizeServicesSettings($services, $servicesDetail);
            $servicesPage = $this->normalizeServicesPageSettings($servicesPage);

            // Service tabs images
            $tabs = Arr::get($services, 'tabs', []);
            if (!is_array($tabs)) {
                $tabs = [];
            }
            foreach ($tabs as $i => $tab) {
                if ($request->hasFile("services.tabs.$i.image_file")) {
                    $path = $request->file("services.tabs.$i.image_file")
                        ->store('ejournal/home/services', 'public');
                    Arr::set($tabs, "$i.image", $path);
                }
                unset($tabs[$i]['image_file']);
            }
            Arr::set($services, 'tabs', $tabs);

            // Services Detail images
            if ($request->hasFile('services_detail.main_image_file')) {
                $path = $request->file('services_detail.main_image_file')
                    ->store('ejournal/services-detail', 'public');
                Arr::set($servicesDetail, 'main_image', $path);
            }
            if ($request->hasFile('services_detail.workflow_image_1_file')) {
                $path = $request->file('services_detail.workflow_image_1_file')
                    ->store('ejournal/services-detail', 'public');
                Arr::set($servicesDetail, 'workflow_image_1', $path);
            }
            if ($request->hasFile('services_detail.workflow_image_2_file')) {
                $path = $request->file('services_detail.workflow_image_2_file')
                    ->store('ejournal/services-detail', 'public');
                Arr::set($servicesDetail, 'workflow_image_2', $path);
            }
            if ($request->hasFile('services_detail.why_image_file')) {
                $path = $request->file('services_detail.why_image_file')
                    ->store('ejournal/services-detail', 'public');
                Arr::set($servicesDetail, 'why_image', $path);
            }
            if ($request->hasFile('services_detail.bottom_image_file')) {
                $path = $request->file('services_detail.bottom_image_file')
                    ->store('ejournal/services-detail', 'public');
                Arr::set($servicesDetail, 'bottom_image', $path);
            }

            $home = $existingHome;
            Arr::set($home, 'services', $services);
            Arr::set($home, 'services_page', $servicesPage);
            Arr::set($home, 'services_detail', $servicesDetail);

            Setting::putValue('home', $home);

            return redirect()
                ->route('admin.services.edit')
                ->with('success', 'Services settings saved successfully.');
        });
    }

    private function normalizeServicesSettings(array $services, array $servicesDetail): array
    {
        $headingHtml = Arr::get($services, 'heading_html');
        if (is_string($headingHtml)) {
            Arr::set($services, 'heading_html', strip_tags($headingHtml, '<br><span>'));
        }

        // Sanitize Services Detail FAQ HTML fields (allow only <br> and <span>)
        $detailFaqHeadingHtml = Arr::get($servicesDetail, 'faq.heading_html');
        if (is_string($detailFaqHeadingHtml)) {
            Arr::set($servicesDetail, 'faq.heading_html', strip_tags($detailFaqHeadingHtml, '<br><span>'));
        }

        $detailFaqContactTitleHtml = Arr::get($servicesDetail, 'faq.contact.title_html');
        if (is_string($detailFaqContactTitleHtml)) {
            Arr::set($servicesDetail, 'faq.contact.title_html', strip_tags($detailFaqContactTitleHtml, '<br><span>'));
        }

        // Services detail points (lines -> array)
        $hlLeftLines = Arr::get($servicesDetail, 'highlights_left_points_lines');
        if (is_string($hlLeftLines)) {
            Arr::set($servicesDetail, 'highlights_left_points', $this->splitLines($hlLeftLines));
        }
        Arr::forget($servicesDetail, 'highlights_left_points_lines');

        $hlRightLines = Arr::get($servicesDetail, 'highlights_right_points_lines');
        if (is_string($hlRightLines)) {
            Arr::set($servicesDetail, 'highlights_right_points', $this->splitLines($hlRightLines));
        }
        Arr::forget($servicesDetail, 'highlights_right_points_lines');

        $whyPointsLines = Arr::get($servicesDetail, 'why_points_lines');
        if (is_string($whyPointsLines)) {
            Arr::set($servicesDetail, 'why_points', $this->splitLines($whyPointsLines));
        }
        Arr::forget($servicesDetail, 'why_points_lines');

        $moreServicesLines = Arr::get($servicesDetail, 'sidebar.more_services_lines');
        if (is_string($moreServicesLines)) {
            Arr::set($servicesDetail, 'sidebar.more_services', $this->splitLines($moreServicesLines));
        }
        Arr::forget($servicesDetail, 'sidebar.more_services_lines');

        $detailFaqPointsLines = Arr::get($servicesDetail, 'faq.points_lines');
        if (is_string($detailFaqPointsLines)) {
            $points = $this->splitLines($detailFaqPointsLines);
            $points = array_map(function ($p) {
                return is_string($p) ? strip_tags($p, '<br><span>') : $p;
            }, $points);
            Arr::set($servicesDetail, 'faq.points', $points);
        }
        Arr::forget($servicesDetail, 'faq.points_lines');

        $detailFaqPoints = Arr::get($servicesDetail, 'faq.points', []);
        if (is_array($detailFaqPoints)) {
            foreach ($detailFaqPoints as $i => $p) {
                if (is_string($p)) {
                    $detailFaqPoints[$i] = strip_tags($p, '<br><span>');
                }
            }
            Arr::set($servicesDetail, 'faq.points', $detailFaqPoints);
        }

        // Remove file placeholders (never stored)
        $tabs = Arr::get($services, 'tabs', []);
        if (is_array($tabs)) {
            foreach ($tabs as $i => $tab) {
                unset($tabs[$i]['image_file']);
            }
            Arr::set($services, 'tabs', $tabs);
        }

        Arr::forget($servicesDetail, 'main_image_file');
        Arr::forget($servicesDetail, 'workflow_image_1_file');
        Arr::forget($servicesDetail, 'workflow_image_2_file');
        Arr::forget($servicesDetail, 'why_image_file');
        Arr::forget($servicesDetail, 'bottom_image_file');

        return [$services, $servicesDetail];
    }

    private function normalizeServicesPageSettings(array $servicesPage): array
    {
        // Sanitize heading html fields (allow only <br> and <span>)
        foreach ([
            'workflow.heading_html',
            'faq.heading_html',
            'faq.contact.title_html',
        ] as $path) {
            $value = Arr::get($servicesPage, $path);
            if (is_string($value)) {
                Arr::set($servicesPage, $path, strip_tags($value, '<br><span>'));
            }
        }

        // Sanitize workflow item title_html (allow only <br> and <span>)
        $workflowItems = Arr::get($servicesPage, 'workflow.items', []);
        if (is_array($workflowItems)) {
            foreach ($workflowItems as $i => $item) {
                $titleHtml = $item['title_html'] ?? null;
                if (is_string($titleHtml)) {
                    $workflowItems[$i]['title_html'] = strip_tags($titleHtml, '<br><span>');
                }
            }
            Arr::set($servicesPage, 'workflow.items', $workflowItems);
        }

        // Sanitize FAQ points (allow only <br> and <span>)
        $servicesFaqPoints = Arr::get($servicesPage, 'faq.points', []);
        if (is_array($servicesFaqPoints)) {
            foreach ($servicesFaqPoints as $i => $p) {
                if (is_string($p)) {
                    $servicesFaqPoints[$i] = strip_tags($p, '<br><span>');
                }
            }
            Arr::set($servicesPage, 'faq.points', $servicesFaqPoints);
        }

        // FAQ points (lines -> array)
        $servicesFaqPointsLines = Arr::get($servicesPage, 'faq.points_lines');
        if (is_string($servicesFaqPointsLines)) {
            $points = $this->splitLines($servicesFaqPointsLines);
            $points = array_map(function ($p) {
                return is_string($p) ? strip_tags($p, '<br><span>') : $p;
            }, $points);
            Arr::set($servicesPage, 'faq.points', $points);
        }
        Arr::forget($servicesPage, 'faq.points_lines');

        return $servicesPage;
    }

    private function splitLines(string $text): array
    {
        $lines = preg_split('/\r\n|\r|\n/', $text);
        $lines = array_map(fn ($v) => trim((string) $v), $lines);
        $lines = array_values(array_filter($lines, fn ($v) => $v !== ''));

        return $lines;
    }
}
