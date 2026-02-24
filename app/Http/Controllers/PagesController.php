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

        $tabs = (array) data_get($homeSettings, 'services.tabs', []);
        $tabs = array_values(array_filter($tabs, fn ($t) => is_array($t)));

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

        $categoryPostsCount = BlogPost::query()
            ->where('is_published', true)
            ->where('category_id', $categoryModel->id)
            ->count();

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
            'sidebarCategories' => $sidebarCategories,
        ]);
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
                    $q->where('is_published', true);
                },
            ])
            ->orderBy('name')
            ->get(['id', 'name', 'slug']);
    }

    private function getBlogPostsFromDatabase(): array
    {
        $posts = BlogPost::query()
            ->with('blogCategory')
            ->where('is_published', true)
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

        return $post;
    }

    private function findPrevNextBlogPosts(BlogPost $post): array
    {
        $sortDate = $post->published_at ?? $post->created_at;

        $prev = null;
        $next = null;

        if ($sortDate) {
            $prev = BlogPost::query()
                ->where('is_published', true)
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

            $next = BlogPost::query()
                ->where('is_published', true)
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
        $hero = $post->hero_image_path
            ? 'storage/' . ltrim($post->hero_image_path, '/')
            : 'assets/images/blog/blog-list-1-1.jpg';

        $authorImage = $post->author_image_path
            ? 'storage/' . ltrim($post->author_image_path, '/')
            : 'assets/images/blog/blog-list-client-img-1.jpg';

        $published = $post->published_at
            ? $post->published_at->format('F Y')
            : ($post->created_at?->format('F Y') ?? '—');

        $categorySlug = null;
        if ($post->relationLoaded('blogCategory') && $post->blogCategory) {
            $categorySlug = $post->blogCategory->slug;
        }
        if (!is_string($categorySlug) || trim($categorySlug) === '') {
            $legacy = trim((string) ($post->category ?? ''));
            $categorySlug = $legacy !== '' ? Str::slug($legacy) : null;
        }

        return [
            'title' => (string) $post->title,
            'excerpt' => (string) ($post->excerpt ?? ''),
            'tags' => (array) ($post->tags ?? []),
            'published' => $published,
            'comments' => '0 Comments',
            'image' => $hero,
            'author' => (string) ($post->author_name ?? 'Med Open Press'),
            'author_image' => $authorImage,
            'link_url' => route('blog-details', ['slug' => $post->slug]),
            'variant' => $post->hero_image_path ? 'with-image' : 'no-image',
            'category' => $categorySlug,
            'slug' => $post->slug,
        ];
    }

    private function mapDbBlogPostToDetail(BlogPost $post): array
    {
        $hero = $post->hero_image_path
            ? 'storage/' . ltrim($post->hero_image_path, '/')
            : 'assets/images/blog/blog-details-img-1.jpg';

        $authorImage = $post->author_image_path
            ? 'storage/' . ltrim($post->author_image_path, '/')
            : 'assets/images/blog/blog-details-meta-client-img-1.jpg';

        $published = $post->published_at
            ? $post->published_at->format('F j, Y')
            : ($post->created_at?->format('F j, Y') ?? '—');

        $gallery1 = $post->detail_gallery_image_1_path
            ? 'storage/' . ltrim($post->detail_gallery_image_1_path, '/')
            : 'assets/images/blog/blog-details-img-box-img-1.jpg';

        $gallery2 = $post->detail_gallery_image_2_path
            ? 'storage/' . ltrim($post->detail_gallery_image_2_path, '/')
            : 'assets/images/blog/blog-details-img-box-img-2.jpg';

        $quoteAuthorImage = $post->detail_quote_author_image_path
            ? 'storage/' . ltrim($post->detail_quote_author_image_path, '/')
            : 'assets/images/blog/blog-details-quote-client-img-1.jpg';

        $featureImage = $post->detail_feature_image_path
            ? 'storage/' . ltrim($post->detail_feature_image_path, '/')
            : 'assets/images/blog/blog-details-points-img-1.jpg';

        return [
            'title' => (string) $post->title,
            'slug' => (string) $post->slug,
            'category' => $post->category,
            'tags' => (array) ($post->tags ?? []),
            'excerpt' => (string) ($post->excerpt ?? ''),
            'content' => (string) ($post->content ?? ''),
            'hero' => $hero,
            'author' => (string) ($post->author_name ?? 'Med Open Press'),
            'author_image' => $authorImage,
            'published' => $published,
            'comments' => '0 Comments',

            'gallery_image_1' => $gallery1,
            'gallery_image_2' => $gallery2,
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

        $page = max(1, (int) $request->query('page', 1));
        $total = $collection->count();
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
}
