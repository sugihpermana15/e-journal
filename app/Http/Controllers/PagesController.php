<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\Ejournal\Journal;
use App\Models\Ejournal\Setting;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class PagesController extends Controller
{
    public function about()
    {
        $homeSettings = Setting::getValue('home', []);

        return view('pages.about', [
            'homeSettings' => is_array($homeSettings) ? $homeSettings : [],
        ]);
    }

    public function journals()
    {
        $journals = Journal::query()
            ->where('is_published', true)
            ->orderByDesc('published_at')
            ->orderByDesc('created_at')
            ->get();

        return view('pages.journals', compact('journals'));
    }

    public function services()
    {
        $homeSettings = Setting::getValue('home', []);

        return view('pages.services', [
            'homeSettings' => is_array($homeSettings) ? $homeSettings : [],
        ]);
    }

    public function services_detail(string $slug)
    {
        $homeSettings = Setting::getValue('home', []);
        $homeSettings = is_array($homeSettings) ? $homeSettings : [];

        $rawDetails = (array) data_get($homeSettings, 'services_detail', []);
        $homeSettings['services_detail'] = $this->mergeWithDefaults(
            $this->defaultServiceDetailContent(),
            $rawDetails
        );

        $tabs = (array) data_get($homeSettings, 'services.tabs', []);
        $tabs = array_values(array_filter($tabs, fn ($t) => is_array($t)));

        if (count($tabs) === 0) {
            $tabs = $this->defaultServiceTabs();
        }

        $normalizedSlug = trim($slug);
        $selectedTab = null;

        foreach ($tabs as $tab) {
            $tabSlug = (string) data_get($tab, 'slug', '');
            if ($tabSlug !== '' && $tabSlug === $normalizedSlug) {
                $selectedTab = $tab;
                break;
            }
        }

        if (!$selectedTab) {
            foreach ($tabs as $tab) {
                $url = (string) data_get($tab, 'button_url', '');
                $path = $url !== '' ? (string) parse_url($url, PHP_URL_PATH) : '';
                $pathSlug = trim($path, '/');
                $pathSlug = $pathSlug !== '' ? Str::afterLast($pathSlug, '/') : '';
                if ($pathSlug !== '' && $pathSlug === $normalizedSlug) {
                    $selectedTab = $tab;
                    break;
                }
            }
        }

        if (!$selectedTab) {
            foreach ($tabs as $tab) {
                $title = (string) data_get($tab, 'title', '');
                if ($title !== '' && Str::slug($title) === $normalizedSlug) {
                    $selectedTab = $tab;
                    break;
                }
            }
        }

        if (!$selectedTab && count($tabs) > 0) {
            $selectedTab = $tabs[0];
        }

        $serviceTitle = (string) data_get($selectedTab, 'title', 'Service Details');

        return view('pages.services-details', [
            'homeSettings' => $homeSettings,
            'tabs' => $tabs,
            'selectedTab' => $selectedTab,
            'serviceTitle' => $serviceTitle,
            'serviceSlug' => $normalizedSlug,
        ]);
    }

    private function defaultServiceDetailContent(): array
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
            'why_title' => 'Why Choose Med Open Press?',
            'why_text_1' => 'We combine professional editorial standards with practical production support.',
            'why_text_2' => 'From authors to editorial teams, we focus on consistent quality, ethical practices, and discoverability.',
            'why_points' => [
                'Editorial quality and publishing ethics focus',
                'Clear timelines and responsive communication',
                'Professional editing and consistent journal formatting',
                'Metadata-ready outputs for discoverability',
            ],
            'post_text' => 'We can also support post-publication needs—such as minor corrections, metadata updates, and improvements that help readers find and cite your work.',
            'doi_title' => 'DOI, Metadata, and Indexing Support',
            'doi_text' => 'We help prepare publication-ready metadata for better discoverability: DOI preparation, author identifiers (e.g., ORCID), reference checks, and consistent article information.',
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

    private function defaultServiceTabs(): array
    {
        return [
            [
                'button_label' => "Book\nPublishing",
                'slug' => 'book-publishing',
                'icon' => 'icon-file',
                'title' => 'Book Publishing',
                'text' => 'Medical books, monographs, and educational references supported by editorial review, professional copyediting, design, and production.',
                'small_label' => 'Books',
                'small_sublabel' => 'Publishing',
                'button_text' => 'Learn More',
                'button_url' => '/book-publishing',
            ],
            [
                'button_label' => "Scientific Journal\nPublication",
                'slug' => 'journal-publication',
                'icon' => 'icon-review',
                'title' => 'Scientific Journal Publication',
                'text' => 'End-to-end journal publishing workflows: submissions, peer review coordination, editorial decisions, production, and online publication.',
                'small_label' => 'Journals',
                'small_sublabel' => 'Workflow',
                'button_text' => 'Learn More',
                'button_url' => '/journal-publication',
            ],
            [
                'button_label' => "IPR\nManagement",
                'slug' => 'ipr-management',
                'icon' => 'icon-completed-task',
                'title' => 'Intellectual Property Rights Management (IPR)',
                'text' => 'Copyright, permissions, and licensing guidance to protect author rights and support compliant publication across formats and channels.',
                'small_label' => 'Rights',
                'small_sublabel' => 'Compliance',
                'button_text' => 'Learn More',
                'button_url' => '/ipr-management',
            ],
            [
                'button_label' => "Custom Publishing\nSolutions",
                'slug' => 'custom-publishing',
                'icon' => 'icon-app',
                'title' => 'Custom Publishing Solutions',
                'text' => 'Tailored publishing programs for societies, institutions, special issues, and supplements with flexible workflows and timelines.',
                'small_label' => 'Custom',
                'small_sublabel' => 'Solutions',
                'button_text' => 'Learn More',
                'button_url' => '/custom-publishing',
            ],
            [
                'button_label' => "Distribution\n& Licensing",
                'slug' => 'distribution-licensing',
                'icon' => 'icon-share',
                'title' => 'Distribution and Licensing',
                'text' => 'Digital/print distribution options and licensing pathways to expand reach responsibly across platforms, partners, and regions.',
                'small_label' => 'Reach',
                'small_sublabel' => 'Licensing',
                'button_text' => 'Learn More',
                'button_url' => '/distribution-licensing',
            ],
        ];
    }

    public function blog(Request $request)
    {
        $homeSettings = Setting::getValue('home', []);
        $homeSettings = is_array($homeSettings) ? $homeSettings : [];

        $postsSource = $this->getBlogPostsFromDatabase();
        $posts = $this->paginatePosts($postsSource, $request, 4);

        return view('pages.blog', [
            'posts' => $posts,
            'homeSettings' => $homeSettings,
            'sidebarCategories' => $this->getSidebarBlogCategories(),
        ]);
    }

    public function blog_details(?string $slug = null)
    {
        $homeSettings = Setting::getValue('home', []);
        $homeSettings = is_array($homeSettings) ? $homeSettings : [];

        $postsSource = $this->getBlogPostsFromDatabase();

        $postModel = $this->findBlogPostModelForDetail($slug);
        $post = $postModel ? $this->mapDbBlogPostToDetail($postModel) : $this->findBlogPostForDetail($slug);

        $prevPost = null;
        $nextPost = null;
        if ($postModel) {
            [$prevPost, $nextPost] = $this->findPrevNextBlogPosts($postModel);
        }

        return view('pages.blog-details', [
            'homeSettings' => $homeSettings,
            'posts' => $postsSource,
            'post' => $post,
            'prevPost' => $prevPost,
            'nextPost' => $nextPost,
            'sidebarCategories' => $this->getSidebarBlogCategories(),
        ]);
    }

    public function blog_category(Request $request, string $category)
    {
        $categoryQuery = BlogCategory::query()->where('slug', $category);
        if (Schema::hasColumn('blog_categories', 'is_active')) {
            $categoryQuery->where('is_active', true);
        }

        $categoryModel = $categoryQuery->firstOrFail();

        $categoryPostsQuery = BlogPost::query()->where('category_id', $categoryModel->id);
        $this->applyBlogPublishedFilter($categoryPostsQuery);
        $categoryPostsCount = $categoryPostsQuery->count();

        $categoryPosts = $this->paginatePosts(
            $this->getBlogPostsFromDatabaseByQuery(
                BlogPost::query()->with('blogCategory')->where('category_id', $categoryModel->id)
            ),
            $request,
            4
        );

        $sidebarCategoriesQuery = BlogCategory::query();
        if (Schema::hasColumn('blog_categories', 'is_active')) {
            $sidebarCategoriesQuery->where('is_active', true);
        }

        $sidebarCategories = $sidebarCategoriesQuery
            ->orderBy('name')
            ->get(['id', 'name', 'slug']);

        return view('pages.blog-category', [
            'categoryKey' => $categoryModel->slug,
            'category' => [
                'label' => $categoryModel->name,
                'tags' => [$categoryModel->name],
                'author' => 'Med Open Press',
                'published' => 'February 2026',
                'hero' => 'assets/images/blog/blog-details-img-1.jpg',
            ],
            'categoryPostsCount' => $categoryPostsCount,
            'categoryPosts' => $categoryPosts,
            'sidebarCategories' => $sidebarCategories,
        ]);
    }

    private function getBlogPostsFromDatabaseByQuery($query): array
    {
        $this->applyBlogPublishedFilter($query);

        $posts = $query
            ->orderByDesc('published_at')
            ->orderByDesc('created_at')
            ->limit(200)
            ->get();

        if ($posts->count() === 0) {
            return [];
        }

        return $posts->map(fn (BlogPost $post) => $this->mapDbBlogPostToCard($post))->all();
    }

    public function set_locale(Request $request, string $locale)
    {
        $allowed = ['en', 'zh', 'ar'];
        if (!in_array($locale, $allowed, true)) {
            abort(404);
        }

        $request->session()->put('app_locale', $locale);
        return redirect()->back();
    }

    public function contact()
    {
        $homeSettings = Setting::getValue('home', []);

        return view('pages.contact', [
            'homeSettings' => is_array($homeSettings) ? $homeSettings : [],
        ]);
    }

    private function getSidebarBlogCategories(): Collection
    {
        $query = BlogCategory::query();

        if (Schema::hasColumn('blog_categories', 'is_active')) {
            $query->where('is_active', true);
        }

        return $query
            ->withCount([
                'posts as published_posts_count' => function ($q) {
                    $this->applyBlogPublishedFilter($q);
                },
            ])
            ->orderBy('name')
            ->get(['id', 'name', 'slug']);
    }

    private function getBlogPostsFromDatabase(): array
    {
        $query = BlogPost::query()->with('blogCategory');

        $this->applyBlogPublishedFilter($query);

        $posts = $query
            ->orderByDesc('published_at')
            ->orderByDesc('created_at')
            ->limit(200)
            ->get();

        if ($posts->count() === 0) {
            return [];
        }

        return $posts->map(fn (BlogPost $post) => $this->mapDbBlogPostToCard($post))->all();
    }

    private function findBlogPostForDetail(?string $slug): ?array
    {
        $query = BlogPost::query()->with('blogCategory')->where('is_published', true);

        $post = null;
        if (is_string($slug) && trim($slug) !== '') {
            $post = (clone $query)->where('slug', $slug)->first();
        }

        if (!$post) {
            $post = (clone $query)
                ->orderByDesc('published_at')
                ->orderByDesc('created_at')
                ->first();
        }

        return $post ? $this->mapDbBlogPostToDetail($post) : null;
    }

    private function findBlogPostModelForDetail(?string $slug): ?BlogPost
    {
        $query = BlogPost::query()->with('blogCategory');
        $this->applyBlogPublishedFilter($query);

        $post = null;
        if (is_string($slug) && trim($slug) !== '') {
            $post = (clone $query)->where('slug', $slug)->first();
        }

        if (!$post) {
            $post = (clone $query)
                ->orderByDesc('published_at')
                ->orderByDesc('created_at')
                ->first();
        }

        return $post;
    }

    private function findPrevNextBlogPosts(BlogPost $post): array
    {
        $sortDate = $post->published_at ?? $post->created_at;

        $prev = null;
        $next = null;

        if ($sortDate) {
            $prevQuery = BlogPost::query();
            $this->applyBlogPublishedFilter($prevQuery);

            $prev = $prevQuery
                ->where('id', '!=', $post->id)
                ->where(function ($q) use ($sortDate) {
                    $q->where('published_at', '<', $sortDate)
                        ->orWhere(function ($q) use ($sortDate) {
                            $q->whereNull('published_at')->where('created_at', '<', $sortDate);
                        });
                })
                ->orderByDesc('published_at')
                ->orderByDesc('created_at')
                ->first();

            $nextQuery = BlogPost::query();
            $this->applyBlogPublishedFilter($nextQuery);

            $next = $nextQuery
                ->where('id', '!=', $post->id)
                ->where(function ($q) use ($sortDate) {
                    $q->where('published_at', '>', $sortDate)
                        ->orWhere(function ($q) use ($sortDate) {
                            $q->whereNull('published_at')->where('created_at', '>', $sortDate);
                        });
                })
                ->orderBy('published_at')
                ->orderBy('created_at')
                ->first();
        }

        $prevCard = $prev ? $this->mapDbBlogPostToCard($prev) : null;
        $nextCard = $next ? $this->mapDbBlogPostToCard($next) : null;

        return [$prevCard, $nextCard];
    }

    private function mapDbBlogPostToCard(BlogPost $post): array
    {
        $cardImage = null;
        if (is_string($post->hero_image_path) && trim($post->hero_image_path) !== '') {
            $cardImage = 'storage/' . ltrim($post->hero_image_path, '/');
        } elseif (is_string($post->detail_gallery_image_1_path) && trim($post->detail_gallery_image_1_path) !== '') {
            $cardImage = 'storage/' . ltrim($post->detail_gallery_image_1_path, '/');
        } elseif (is_string($post->detail_feature_image_path) && trim($post->detail_feature_image_path) !== '') {
            $cardImage = 'storage/' . ltrim($post->detail_feature_image_path, '/');
        }

        $cardImage = $cardImage ?: 'assets/images/blog/blog-list-1-1.jpg';

        $authorImage = $post->author_image_path
            ? 'storage/' . ltrim($post->author_image_path, '/')
            : 'assets/images/blog/blog-list-client-img-1.jpg';

        $published = $post->published_at
            ? $post->published_at->format('F Y')
            : ($post->created_at?->format('F Y') ?? '—');

        $dateForBadge = $post->published_at ?? $post->created_at;
        $day = $dateForBadge ? $dateForBadge->format('d') : '01';
        $month = $dateForBadge ? strtoupper($dateForBadge->format('M')) : 'JAN';

        $categorySlug = null;
        $categoryLabel = null;
        if ($post->relationLoaded('blogCategory') && $post->blogCategory) {
            $categorySlug = $post->blogCategory->slug;
            $categoryLabel = $post->blogCategory->name;
        }
        if (!is_string($categorySlug) || trim($categorySlug) === '') {
            $legacy = trim((string) ($post->category ?? ''));
            $categorySlug = $legacy !== '' ? Str::slug($legacy) : null;
            $categoryLabel = $categoryLabel ?: ($legacy !== '' ? $legacy : null);
        }

        return [
            'title' => (string) $post->title,
            'excerpt' => (string) ($post->excerpt ?? ''),
            'tags' => (array) ($post->tags ?? []),
            'published' => $published,
            'day' => $day,
            'month' => $month,
            'comments' => '0 Comments',
            'image' => $cardImage,
            'author' => (string) ($post->author_name ?? 'Med Open Press'),
            'author_image' => $authorImage,
            'link_url' => route('blog-details', ['slug' => $post->slug]),
            'variant' => $post->hero_image_path ? 'with-image' : 'no-image',
            'category' => $categorySlug,
            'category_label' => $categoryLabel,
            'slug' => $post->slug,
        ];
    }

    private function mapDbBlogPostToDetail(BlogPost $post): array
    {
        $hero = null;
        if (is_string($post->hero_image_path) && trim($post->hero_image_path) !== '') {
            $hero = 'storage/' . ltrim($post->hero_image_path, '/');
        } elseif (is_string($post->detail_gallery_image_1_path) && trim($post->detail_gallery_image_1_path) !== '') {
            $hero = 'storage/' . ltrim($post->detail_gallery_image_1_path, '/');
        } elseif (is_string($post->detail_feature_image_path) && trim($post->detail_feature_image_path) !== '') {
            $hero = 'storage/' . ltrim($post->detail_feature_image_path, '/');
        }

        $hero = $hero ?: 'assets/images/blog/blog-details-img-1.jpg';

        $authorImage = $post->author_image_path
            ? 'storage/' . ltrim($post->author_image_path, '/')
            : 'assets/images/blog/blog-details-meta-client-img-1.jpg';

        $published = $post->published_at
            ? $post->published_at->format('F j, Y')
            : ($post->created_at?->format('F j, Y') ?? '—');

        $gallery1 = $post->detail_gallery_image_1_path
            ? 'storage/' . ltrim($post->detail_gallery_image_1_path, '/')
            : '';

        $gallery1Caption = trim((string) ($post->detail_gallery_image_1_caption ?? ''));

        $quoteAuthorImage = $post->detail_quote_author_image_path
            ? 'storage/' . ltrim($post->detail_quote_author_image_path, '/')
            : 'assets/images/blog/blog-details-quote-client-img-1.jpg';

        $featureImage = $post->detail_feature_image_path
            ? 'storage/' . ltrim($post->detail_feature_image_path, '/')
            : 'assets/images/blog/blog-details-points-img-1.jpg';

        $sectionsRaw = $post->content_sections;
        $sectionsRaw = is_array($sectionsRaw) ? $sectionsRaw : [];
        $sections = [];
        foreach ($sectionsRaw as $section) {
            if (!is_array($section)) {
                continue;
            }

            $title = trim((string) ($section['title'] ?? ''));
            $text = trim((string) ($section['text'] ?? ''));

            if ($title === '' && $text === '') {
                continue;
            }

            $sections[] = [
                'title' => $title,
                'text' => $text,
            ];
        }

        return [
            'title' => (string) $post->title,
            'slug' => (string) $post->slug,
            'category' => $post->category,
            'tags' => (array) ($post->tags ?? []),
            'excerpt' => (string) ($post->excerpt ?? ''),
            'content' => (string) ($post->content ?? ''),
            'sections' => $sections,
            'hero' => $hero,
            'author' => (string) ($post->author_name ?? 'Med Open Press'),
            'author_image' => $authorImage,
            'published' => $published,
            'comments' => '0 Comments',

            'gallery_image_1' => $gallery1,
            'gallery_image_1_caption' => $gallery1Caption,
            'detail_title_2' => (string) ($post->detail_title_2 ?? ''),
            'detail_text_2' => (string) ($post->detail_text_2 ?? ''),
            'detail_text_3' => (string) ($post->detail_text_3 ?? ''),
            'detail_text_4' => (string) ($post->detail_text_4 ?? ''),
            'detail_title_3' => (string) ($post->detail_title_3 ?? ''),
            'detail_points' => (array) ($post->detail_points ?? []),
            'detail_title_4' => (string) ($post->detail_title_4 ?? ''),
            'detail_text_5' => (string) ($post->detail_text_5 ?? ''),
            'detail_quote_text' => (string) ($post->detail_quote_text ?? ''),
            'detail_quote_author_name' => (string) ($post->detail_quote_author_name ?? ''),
            'detail_quote_author_image' => $quoteAuthorImage,
            'detail_title_5' => (string) ($post->detail_title_5 ?? ''),
            'detail_text_6' => (string) ($post->detail_text_6 ?? ''),
            'detail_feature_image' => $featureImage,
            'detail_feature_points' => (array) ($post->detail_feature_points ?? []),
            'detail_text_7' => (string) ($post->detail_text_7 ?? ''),
            'share_pinterest_url' => (string) ($post->share_pinterest_url ?? ''),
            'share_linkedin_url' => (string) ($post->share_linkedin_url ?? ''),
            'share_instagram_url' => (string) ($post->share_instagram_url ?? ''),
            'share_facebook_url' => (string) ($post->share_facebook_url ?? ''),
        ];
    }

    private function paginatePosts(array $posts, Request $request, int $perPage): LengthAwarePaginator
    {
        $collection = Collection::make($posts);

        $total = $collection->count();
        $lastPage = max(1, (int) ceil($total / max(1, $perPage)));

        $page = max(1, (int) $request->query('page', 1));
        if ($page > $lastPage) {
            $page = $lastPage;
        }

        $items = $collection->slice(($page - 1) * $perPage, $perPage)->values();

        return new LengthAwarePaginator(
            $items,
            $total,
            $perPage,
            $page,
            [
                'path' => $request->url(),
                'query' => $request->query(),
            ]
        );
    }

    private function applyBlogPublishedFilter($query): void
    {
        if (!Schema::hasColumn('blog_posts', 'is_published')) {
            return;
        }

        $query->where(function ($q) {
            $q->where('is_published', true)
                ->orWhere('is_published', 1)
                ->orWhere('is_published', '1')
                ->orWhereIn('is_published', [
                    'true',
                    'TRUE',
                    'True',
                    'yes',
                    'YES',
                    'Yes',
                    'published',
                    'PUBLISHED',
                    'Published',
                ]);
        });
    }
}
