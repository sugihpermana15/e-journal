<?php

namespace App\Http\Controllers\Admin\Ejournal;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Ejournal\Services\StoreServiceRequest;
use App\Http\Requests\Admin\Ejournal\Services\UpdateServiceRequest;
use App\Models\Ejournal\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
	public function index()
	{
		$services = Service::query()
			->orderBy('sort_order')
			->orderBy('id')
			->get();

		return view('admin.ejournal.services.index', compact('services'));
	}

	public function create()
	{
		$service = new Service([
			'is_active' => true,
			'sort_order' => 0,
			'button_text' => 'Learn More',
			'icon' => 'icon-file',
			'detail' => $this->defaultServiceDetail(),
		]);

		return view('admin.ejournal.services.form', [
			'service' => $service,
			'mode' => 'create',
		]);
	}

	public function store(StoreServiceRequest $request): RedirectResponse
	{
		$payload = $this->buildPayload(
			$request->validated(),
			$request->file('image_file'),
			$request->file('detail_images')
		);

		DB::transaction(function () use ($payload) {
			Service::query()->create($payload);
		});

		return redirect()
			->route('admin.ejournal.services.index')
			->with('success', 'Service created.');
	}

	public function edit(Service $service)
	{
		$service->detail = $this->mergeWithDefaults(
			$this->defaultServiceDetail(),
			(array) ($service->detail ?? [])
		);

		return view('admin.ejournal.services.form', [
			'service' => $service,
			'mode' => 'edit',
		]);
	}

	public function update(UpdateServiceRequest $request, Service $service): RedirectResponse
	{
		$payload = $this->buildPayload(
			$request->validated(),
			$request->file('image_file'),
			$request->file('detail_images'),
			$service
		);

		DB::transaction(function () use ($service, $payload) {
			$service->update($payload);
		});

		return redirect()
			->route('admin.ejournal.services.edit', $service)
			->with('success', 'Service updated.');
	}

	public function destroy(Service $service): RedirectResponse
	{
		DB::transaction(function () use ($service) {
			$service->delete();
		});

		return redirect()
			->route('admin.ejournal.services.index')
			->with('success', 'Service deleted.');
	}

	private function buildPayload(array $validated, $imageFile, $detailImages, ?Service $existing = null): array
	{
		$payload = Arr::only($validated, [
			'slug',
			'title',
			'text',
			'button_label',
			'icon',
			'small_label',
			'small_sublabel',
			'button_text',
			'sort_order',
		]);

		$payload['is_active'] = (bool) data_get($validated, 'is_active', false);

		if ($imageFile) {
			$payload['image'] = $imageFile->store('ejournal/home/services', 'public');
		} elseif ($existing) {
			$payload['image'] = $existing->image;
		}

		$detail = (array) data_get($validated, 'detail', []);
		$detail = $this->normalizeDetail($detail);

		$storedDetail = $existing ? (array) ($existing->detail ?? []) : [];
		$detail = array_replace_recursive($storedDetail, $detail);
		$detail = $this->mergeWithDefaults($this->defaultServiceDetail(), $detail);
		$detail = $this->handleDetailImages($detail, $detailImages, $existing);

		$payload['detail'] = $detail;

		return $payload;
	}

	private function handleDetailImages(array $detail, $detailImages, ?Service $existing = null): array
	{
		$existingDetail = $existing ? (array) ($existing->detail ?? []) : [];

		$map = [
			'main_image_file' => 'main_image',
			'workflow_image_1_file' => 'workflow_image_1',
			'workflow_image_2_file' => 'workflow_image_2',
			'why_image_file' => 'why_image',
			'bottom_image_file' => 'bottom_image',
		];

		foreach ($map as $fileKey => $detailKey) {
			$file = is_array($detailImages) ? ($detailImages[$fileKey] ?? null) : null;
			if ($file) {
				$detail[$detailKey] = $file->store('ejournal/services-detail', 'public');
				continue;
			}

			$existingPath = (string) data_get($existingDetail, $detailKey, '');
			if ($existingPath !== '' && !array_key_exists($detailKey, $detail)) {
				$detail[$detailKey] = $existingPath;
			}
		}

		return $detail;
	}

	private function normalizeDetail(array $detail): array
	{
		$detail = $this->stripEmptyStrings($detail);

		$detail['highlights_left_points'] = $this->splitLines((string) data_get($detail, 'highlights_left_points_lines', ''));
		$detail['highlights_right_points'] = $this->splitLines((string) data_get($detail, 'highlights_right_points_lines', ''));
		$detail['why_points'] = $this->splitLines((string) data_get($detail, 'why_points_lines', ''));

		unset(
			$detail['highlights_left_points_lines'],
			$detail['highlights_right_points_lines'],
			$detail['why_points_lines']
		);

		$faq = (array) data_get($detail, 'faq', []);
		$faq['heading_html'] = $this->sanitizeHtml((string) data_get($faq, 'heading_html', ''));
		$faq['points'] = $this->splitLines((string) data_get($detail, 'faq.points_lines', ''));
		unset($faq['points_lines']);

		$faq['contact'] = (array) data_get($faq, 'contact', []);
		$faq['contact']['title_html'] = $this->sanitizeHtml((string) data_get($faq['contact'], 'title_html', ''));

		$accordions = (array) data_get($faq, 'accordions', []);
		$accordions = array_values(array_filter($accordions, function ($a) {
			return trim((string) data_get($a, 'question', '')) !== '' || trim((string) data_get($a, 'answer', '')) !== '';
		}));
		$faq['accordions'] = $accordions;

		$detail['faq'] = $faq;

		$detail['sidebar'] = (array) data_get($detail, 'sidebar', []);

		return $detail;
	}

	private function splitLines(string $text): array
	{
		$lines = preg_split('/\r\n|\r|\n/', $text) ?: [];
		$lines = array_map(fn ($l) => trim((string) $l), $lines);
		return array_values(array_filter($lines, fn ($l) => $l !== ''));
	}

	private function sanitizeHtml(string $html): string
	{
		$html = preg_replace('~<(?!/?(br|span)\b)[^>]*>~i', '', $html) ?? '';
		return (string) $html;
	}

	private function stripEmptyStrings(array $data): array
	{
		foreach ($data as $key => $value) {
			if (is_array($value)) {
				$data[$key] = $this->stripEmptyStrings($value);
				continue;
			}

			if (is_string($value)) {
				$data[$key] = trim($value);
			}
		}

		return $data;
	}

	private function defaultServiceDetail(): array
	{
		return [
			'intro_title' => "End-to-end journal publishing support for authors,\neditors, and institutions",
			'intro_text' => 'Med Open Press provides a complete publishing workflow—from initial manuscript checks and peer-review coordination to professional editing, layout (typesetting), DOI and metadata preparation, and final online publication.',
			'main_image' => '',
			'highlights_title' => 'Service Highlights',
			'highlights_text' => 'Our services are designed to help journals run smoothly and help authors publish with confidence.',
			'highlights_left_points' => [
				'Initial screening and format compliance',
				'Peer-review coordination and decision support',
				'Copyediting and language polishing',
			],
			'highlights_right_points' => [
				'Typesetting, proofing, and final files (PDF/HTML)',
				'DOI and metadata preparation (ORCID, references)',
				'Publication support and dissemination readiness',
			],
			'cards' => [
				[
					'icon' => 'icon-review',
					'title' => 'Peer Review & Editorial Support',
					'text' => "Structured review workflows,\nreviewer coordination, reminders, and clear\neditorial decisions.",
				],
				[
					'icon' => 'icon-file',
					'title' => 'Production & Publishing',
					'text' => "Copyediting, layout, proofing,\nand publication-ready files with consistent\njournal formatting.",
				],
			],
			'workflow_title' => 'Publishing Workflow Summary',
			'workflow_text' => 'A reliable publishing process helps reduce delays and improves quality.',
			'workflow_image_1' => '',
			'workflow_image_2' => '',
			'why_title' => 'Why Choose Med Open Press?',
			'why_text_1' => 'We combine professional editorial standards with practical production support.',
			'why_text_2' => 'From authors to editorial teams, we focus on consistent quality, ethical practices, and discoverability.',
			'why_points' => [
				'Editorial quality and publishing ethics focus',
				'Clear timelines and responsive communication',
				'Professional editing and consistent journal formatting',
				'Metadata-ready outputs for discoverability',
			],
			'why_image' => '',
			'post_text' => 'We can also support post-publication needs—such as minor corrections, metadata updates, and improvements that help readers find and cite your work.',
			'doi_title' => 'DOI, Metadata, and Indexing Support',
			'doi_text' => 'We help prepare publication-ready metadata for better discoverability: DOI preparation, author identifiers (e.g., ORCID), reference checks, and consistent article information.',
			'bottom_image' => '',
			'sidebar' => [
				'more_services_title' => 'More Services',
				'get_touch_title' => 'Need help with your manuscript or journal?',
				'button_text' => 'Contact Us',
				'button_url' => '',
				'call_label' => 'Call us for publishing support',
				'phone' => '+62 897 1399 093',
			],
			'faq' => [
				'tagline' => 'FAQs',
				'heading_html' => 'Your Questions Answered <br><span>Explore Our FAQs</span>',
				'text' => "Everything you need to know. Detailed <br> overview of our\nfrequently asked questions",
				'points' => [],
				'contact' => [
					'big_text' => 'Get In Touch',
					'title_html' => 'If you have any other <br> questions, please contact<br> us here',
					'button_text' => 'Contact Us',
					'button_url' => '',
				],
				'accordions' => [],
			],
		];
	}

	private function mergeWithDefaults(array $defaults, array $overrides): array
	{
		$result = [];

		foreach ($defaults as $key => $defaultValue) {
			if (!array_key_exists($key, $overrides)) {
				$result[$key] = $defaultValue;
				continue;
			}

			$overrideValue = $overrides[$key];

			if (is_array($defaultValue) && is_array($overrideValue)) {
				$isList = array_keys($defaultValue) === range(0, max(count($defaultValue) - 1, 0));
				if ($isList) {
					$result[$key] = count($overrideValue) > 0 ? $overrideValue : $defaultValue;
				} else {
					$result[$key] = $this->mergeWithDefaults($defaultValue, $overrideValue);
				}
				continue;
			}

			if (is_string($defaultValue)) {
				$overrideString = is_string($overrideValue) ? $overrideValue : '';
				$result[$key] = trim(strip_tags($overrideString)) !== '' ? $overrideString : $defaultValue;
				continue;
			}

			$result[$key] = ($overrideValue === null || $overrideValue === '') ? $defaultValue : $overrideValue;
		}

		foreach ($overrides as $key => $value) {
			if (!array_key_exists($key, $result)) {
				$result[$key] = $value;
			}
		}

		return $result;
	}
}

