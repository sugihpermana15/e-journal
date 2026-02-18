<?php
namespace App\Http\Controllers;

use App\Models\Ejournal\Journal;
use App\Models\Ejournal\Setting;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class PagesController extends Controller
{







    // ///////// Nav About //////////
    public function about()
    {
        $homeSettings = Setting::getValue('home', []);

        return view('pages.about', [
            'homeSettings' => is_array($homeSettings) ? $homeSettings : [],
        ]);
    }


    // ///////// Nav Journals //////////
    public function journals()
    {
        $journals = Journal::query()
            ->where('is_published', true)
            ->orderByDesc('published_at')
            ->orderByDesc('created_at')
            ->get();

        return view('pages.journals', compact('journals'));
    }







// ///////// Nav Pages //////////
    public function team()
    {
        return view('pages.team');
    }
    public function team_details()
    {
        return view('pages.team-details');
    }
    public function projects()
    {
        return view('pages.projects');
    }
    public function projects_carousel()
    {
        return view('pages.projects-carousel');
    }
    public function project_details()
    {
        return view('pages.project-details');
    }
    public function testimonials_carousel()
    {
        return view('pages.testimonials-carousel');
    }
    public function testimonials()
    {
        return view('pages.testimonials');
    }
    public function pricing()
    {
        return view('pages.pricing');
    }
    public function pricing_carousel()
    {
        return view('pages.pricing-carousel');
    }
    public function gallery()
    {
        return view('pages.gallery');
    }
    public function faq()
    {
        return view('pages.faq');
    }
    public function coming_soon()
    {
        return view('pages.coming-soon');
    }

    public function not_found()
    {
        return view('pages.404');
    }






// ///////// Nav services //////////
    public function services()
    {
        $homeSettings = Setting::getValue('home', []);

        return view('pages.services', [
            'homeSettings' => is_array($homeSettings) ? $homeSettings : [],
        ]);
    }
    public function residential_cleaning()
    {
        return view('pages.residential-cleaning');
    }

    public function commercial_cleaning()
    {
        return view('pages.commercial-cleaning');
    }
    public function deep_cleaning()
    {
        return view('pages.deep-cleaning');
    }
    public function office_cleaning()
    {
        return view('pages.office-cleaning');
    }
    public function sanitizing_mopping()
    {
        return view('pages.sanitizing-mopping');
    }

    public function services_detail()
    {
        $homeSettings = Setting::getValue('home', []);

        return view('pages.services-detail', [
            'homeSettings' => is_array($homeSettings) ? $homeSettings : [],
        ]);
    }

    public function book_publishing()
    {
        return view('pages.book-publishing');
    }

    public function journal_publication()
    {
        return view('pages.journal-publication');
    }

    public function ipr_management()
    {
        return view('pages.ipr-management');
    }

    public function custom_publishing()
    {
        return view('pages.custom-publishing');
    }

    public function distribution_licensing()
    {
        return view('pages.distribution-licensing');
    }




// ///////// Nav shop //////////
    public function products_left()
    {
        return view('pages.products-left');
    }
    public function products_right()
    {
        return view('pages.products-right');
    }
    public function product()
    {
        return view('pages.product');
    }
    public function product_details()
    {
        return view('pages.product_details');
    }
    public function cart()
    {
        return view('pages.cart');
    }
    public function checkout()
    {
        return view('pages.checkout');
    }
    public function wishlist()
    {
        return view('pages.wishlist');
    }
    public function sign_up()
    {
        return view('pages.sign-up');
    }
    public function login()
    {
        return view('pages.login');
    }











/////// ///////// Nav blog //////////
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
    public function blog_carousel()
    {
        return view('pages.blog-carousel');
    }

    public function blog_list(Request $request)
    {
        $homeSettings = Setting::getValue('home', []);
        $homeSettings = is_array($homeSettings) ? $homeSettings : [];

        $postsSource = $this->getBlogPostsFromDatabase();

        $posts = $this->paginatePosts($postsSource, $request, 4);
        return view('pages.blog-list', [
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

    private function getBlogPostsFromHomeSettings(array $homeSettings): array
    {
        $cards = data_get($homeSettings, 'blog.cards', []);
        if (!is_array($cards)) {
            $cards = [];
        }

        $cards = array_values(array_filter($cards, function ($card) {
            return trim((string) data_get($card, 'title')) !== ''
                || trim((string) data_get($card, 'text')) !== ''
                || trim((string) data_get($card, 'image')) !== '';
        }));

        if (count($cards) === 0) {
            return [];
        }

        $defaultAuthor = 'Med Open Press';
        $defaultAuthorImage = 'assets/images/blog/blog-list-client-img-1.jpg';
        $defaultImage = 'assets/images/blog/blog-list-1-1.jpg';

        return array_map(function ($card) use ($defaultAuthor, $defaultAuthorImage, $defaultImage) {
            $day = trim((string) data_get($card, 'day'));
            $month = trim((string) data_get($card, 'month'));
            $published = trim($day . ' ' . $month);

            $linkUrl = trim((string) data_get($card, 'link_url', ''));
            if ($linkUrl === '') {
                $linkUrl = route('blog-details');
            }

            return [
                'title' => (string) data_get($card, 'title', ''),
                'excerpt' => (string) data_get($card, 'text', ''),
                'tags' => $this->splitPipedTags((string) data_get($card, 'tags', '')),
                'published' => $published !== '' ? $published : '—',
                'comments' => '0 Comments',
                'image' => (string) data_get($card, 'image', $defaultImage),
                'author' => $defaultAuthor,
                'author_image' => $defaultAuthorImage,
                'link_url' => $linkUrl,
                'variant' => trim((string) data_get($card, 'image')) !== '' ? 'with-image' : 'no-image',
            ];
        }, $cards);
    }

    private function splitPipedTags(string $value): array
    {
        $parts = array_map('trim', explode('|', $value));
        return array_values(array_filter($parts, fn ($p) => $p !== ''));
    }

    private function getBlogIndexPosts(): array
    {
        // Curated index cards that link into our internal per-category blog detail pages.
        // (No external URLs; titles/excerpts are editorial summaries.)
        return [
            [
                'title' => 'AI “Digital Twins” Rehearse Surgery Before the Real Case',
                'excerpt' => 'A plain-language look at patient-specific simulation in procedural planning—what it can help teams test, and where guardrails still matter.',
                'category' => 'cardiology',
                'tags' => ['Surgery', 'Cardiology'],
                'author' => 'Orlensia Lie, MD',
                'published' => 'February 2026',
                'comments' => '12 Comments',
                'image' => 'assets/images/blog/blog-list-1-1.jpg',
                'author_image' => 'assets/images/blog/blog-list-client-img-1.jpg',
                'variant' => 'with-image',
            ],
            [
                'title' => 'The 10-Year Choice: Why Younger Heart Patients Are Rethinking TAVR',
                'excerpt' => 'Why “faster recovery” isn’t the only question—durability, future options, and long-term planning shape the decision for younger low-risk patients.',
                'category' => 'cardiology',
                'tags' => ['Cardiology', 'Surgery'],
                'author' => 'Orlensia Lie, MD',
                'published' => 'February 2026',
                'comments' => '12 Comments',
                'image' => 'assets/images/blog/blog-list-1-2.jpg',
                'author_image' => 'assets/images/blog/blog-list-client-img-2.jpg',
                'variant' => 'with-image',
            ],
            [
                'title' => 'The Price of Potency: Navigating the Side Effects of GLP-1 Agonists',
                'excerpt' => 'A balanced overview of common GI effects, muscle-mass concerns, and rare safety signals—plus why dosing and monitoring matter.',
                'category' => 'internal-medicine',
                'tags' => ['Internal Medicine'],
                'author' => 'Melvin Andrean, MD',
                'published' => 'February 2026',
                'comments' => '12 Comments',
                'image' => 'assets/images/blog/blog-list-1-3.jpg',
                'author_image' => 'assets/images/blog/blog-list-client-img-3.jpg',
                'variant' => 'no-image',
            ],
            [
                'title' => 'Motion is Lotion: Why the Gym Can Help Osteoarthritis',
                'excerpt' => 'Why smart resistance training can reduce joint stress, improve function, and help people with OA stay active—without chasing high-impact routines.',
                'category' => 'orthopedics',
                'tags' => ['Orthopedics', 'Sports Medicine'],
                'author' => 'dr. Komang Ayu',
                'published' => 'February 2026',
                'comments' => '12 Comments',
                'image' => 'assets/images/blog/blog-list-1-3.jpg',
                'author_image' => 'assets/images/blog/blog-list-client-img-4.jpg',
                'variant' => 'with-image',
            ],
            [
                'title' => 'Understanding Hemodialysis: A Beginner-Friendly Overview',
                'excerpt' => 'A clear introduction to what hemodialysis does, what sessions look like, and why education and planning can reduce anxiety for patients and families.',
                'category' => 'internal-medicine',
                'tags' => ['Internal Medicine'],
                'author' => 'Teddy Tjahyanto, M.D.',
                'published' => 'February 2026',
                'comments' => '12 Comments',
                'image' => 'assets/images/blog/blog-list-1-1.jpg',
                'author_image' => 'assets/images/blog/blog-list-client-img-1.jpg',
                'variant' => 'with-image',
            ],
            [
                'title' => 'Kidneys and Hypertension: Why the Silo Is Breaking',
                'excerpt' => 'Blood pressure and kidney function are tightly linked. Integrated care helps align targets, labs, and medication choices across specialties.',
                'category' => 'internal-medicine',
                'tags' => ['Internal Medicine'],
                'author' => 'dr. Sony A. Fatchurrahman',
                'published' => 'February 2026',
                'comments' => '12 Comments',
                'image' => 'assets/images/blog/blog-list-1-2.jpg',
                'author_image' => 'assets/images/blog/blog-list-client-img-2.jpg',
                'variant' => 'with-image',
            ],
            [
                'title' => 'When Do We Need Brain and Spine Surgery?',
                'excerpt' => 'A risk-benefit way to understand neurosurgical decisions—from emergencies to planned procedures—plus what “conservative treatment first” can mean.',
                'category' => 'neurosurgery',
                'tags' => ['Neurosurgery'],
                'author' => 'Andrew Wilbert Tanuwijaya, M.D.',
                'published' => 'February 2026',
                'comments' => '12 Comments',
                'image' => 'assets/images/blog/blog-list-1-1.jpg',
                'author_image' => 'assets/images/blog/blog-list-client-img-3.jpg',
                'variant' => 'with-image',
            ],
            [
                'title' => 'Rewiring the Ouch: Functional Neurosurgery and Chronic Pain',
                'excerpt' => 'When pain becomes a persistent network problem, neuromodulation can be an option. This overview explains the logic and the limits.',
                'category' => 'neurosurgery',
                'tags' => ['Neurosurgery'],
                'author' => 'Made Agus Mahendra Inggas, SpBS',
                'published' => 'February 2026',
                'comments' => '12 Comments',
                'image' => 'assets/images/blog/blog-list-1-3.jpg',
                'author_image' => 'assets/images/blog/blog-list-client-img-4.jpg',
                'variant' => 'with-image',
            ],
            [
                'title' => 'Understanding PCOS: A Practical Guide to Taking Control',
                'excerpt' => 'A structured starting point for PCOS: symptom domains, fertility goals, and long-term metabolic health—plus why follow-up is usually iterative.',
                'category' => 'obgyn',
                'tags' => ['ObGyn'],
                'author' => 'dr. Dilla Alfinda Risdiana',
                'published' => 'February 2026',
                'comments' => '12 Comments',
                'image' => 'assets/images/blog/blog-list-1-2.jpg',
                'author_image' => 'assets/images/blog/blog-list-client-img-1.jpg',
                'variant' => 'with-image',
            ],
            [
                'title' => 'Varicocelectomy Timing and Testicular Atrophy',
                'excerpt' => 'Why timing and follow-up matter in varicocele care—framed around symptoms, fertility goals, exam findings, and shared decision-making.',
                'category' => 'urology',
                'tags' => ['Urology'],
                'author' => 'Eka Asmara Juhan Putra, MD',
                'published' => 'February 2026',
                'comments' => '12 Comments',
                'image' => 'assets/images/blog/blog-list-1-1.jpg',
                'author_image' => 'assets/images/blog/blog-list-client-img-2.jpg',
                'variant' => 'with-image',
            ],
            [
                'title' => 'The Evolution of RSI: Why “No Ventilation” Is No Longer the Rule',
                'excerpt' => 'Modern RSI is a balance of aspiration risk and hypoxemia prevention. Patient selection, gentle technique, and backup plans matter.',
                'category' => 'anesthesiology',
                'tags' => ['Anesthesiology', 'Patient Safety'],
                'author' => 'Aulia Wiratama Putra, M.D.',
                'published' => 'February 2026',
                'comments' => '12 Comments',
                'image' => 'assets/images/blog/blog-list-1-3.jpg',
                'author_image' => 'assets/images/blog/blog-list-client-img-3.jpg',
                'variant' => 'with-image',
            ],
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





/////////// ///////// Nav contact //////////
    public function contact()
    {
        $homeSettings = Setting::getValue('home', []);

        return view('pages.contact', [
            'homeSettings' => is_array($homeSettings) ? $homeSettings : [],
        ]);
    }


}
