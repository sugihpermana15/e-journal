<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\BlogPostController as AdminBlogPostController;
use App\Http\Controllers\Admin\BlogCategoryController as AdminBlogCategoryController;
use App\Http\Controllers\Admin\AboutPageController as AdminAboutPageController;
use App\Http\Controllers\Admin\ContactPageController as AdminContactPageController;
use App\Http\Controllers\Admin\ServicesPageController as AdminServicesPageController;
use App\Http\Controllers\Admin\Ejournal\SettingsController as AdminEjournalSettingsController;
use App\Http\Controllers\Admin\Ejournal\JournalController as AdminEjournalJournalController;
use App\Http\Controllers\Admin\Ejournal\HeaderController as AdminEjournalHeaderController;


////////// Home
Route::get('/', [HomeController::class, 'index'])
    ->name('index');


////////// about
Route::get('about', [PagesController::class, 'about'])->name('about');


////////// services
Route::get('services', [PagesController::class, 'services'])->name('services');
Route::get('services/{slug}', [PagesController::class, 'services_detail'])->name('services-detail');

// Legacy service detail URLs (used by default admin settings)
Route::get('book-publishing', [PagesController::class, 'services_detail'])->defaults('slug', 'book-publishing');
Route::get('journal-publication', [PagesController::class, 'services_detail'])->defaults('slug', 'journal-publication');
Route::get('ipr-management', [PagesController::class, 'services_detail'])->defaults('slug', 'ipr-management');
Route::get('custom-publishing', [PagesController::class, 'services_detail'])->defaults('slug', 'custom-publishing');
Route::get('distribution-licensing', [PagesController::class, 'services_detail'])->defaults('slug', 'distribution-licensing');


////////// journals
Route::get('journals', [PagesController::class, 'journals'])->name('journals');


////////// account (admin auth)
Route::get('login', [AdminAuthController::class, 'showLogin'])->name('login');
Route::post('login', [AdminAuthController::class, 'login'])->name('login.perform');
Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');

// Admin area
Route::prefix('admin')
    ->name('admin.')
    ->middleware('auth')
    ->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('about-page', [AdminAboutPageController::class, 'edit'])->name('about.edit');
        Route::put('about-page', [AdminAboutPageController::class, 'update'])->name('about.update');

        Route::get('contact-page', [AdminContactPageController::class, 'edit'])->name('contact.edit');
        Route::put('contact-page', [AdminContactPageController::class, 'update'])->name('contact.update');

        Route::get('services-page', [AdminServicesPageController::class, 'edit'])->name('services.edit');
        Route::put('services-page', [AdminServicesPageController::class, 'update'])->name('services.update');

        // E-Journal settings: accessible to all authenticated roles
        Route::prefix('ejournal')
            ->name('ejournal.')
            ->group(function () {
                Route::get('settings', [AdminEjournalSettingsController::class, 'edit'])->name('settings.edit');
                Route::put('settings', [AdminEjournalSettingsController::class, 'update'])->name('settings.update');
            });

        // Only admin role can create user accounts
        Route::middleware('admin.role')->group(function () {
            Route::get('users', [AdminUserController::class, 'index'])->name('users.index');
            Route::get('users/create', [AdminUserController::class, 'create'])->name('users.create');
            Route::post('users', [AdminUserController::class, 'store'])->name('users.store');
            Route::put('users/{user}', [AdminUserController::class, 'update'])->name('users.update');
            Route::delete('users/{user}', [AdminUserController::class, 'destroy'])->name('users.destroy');

            Route::prefix('ejournal')
                ->name('ejournal.')
                ->group(function () {
                    Route::get('header', [AdminEjournalHeaderController::class, 'edit'])->name('header.edit');
                    Route::put('header', [AdminEjournalHeaderController::class, 'update'])->name('header.update');

                    Route::get('journals', [AdminEjournalJournalController::class, 'index'])->name('journals.index');
                    Route::post('journals', [AdminEjournalJournalController::class, 'store'])->name('journals.store');
                    Route::put('journals/{journal}', [AdminEjournalJournalController::class, 'update'])->name('journals.update');
                    Route::delete('journals/{journal}', [AdminEjournalJournalController::class, 'destroy'])->name('journals.destroy');
                });

            Route::prefix('blog')
                ->name('blog.')
                ->group(function () {
                    Route::get('posts', [AdminBlogPostController::class, 'index'])->name('posts.index');
                    Route::get('posts/create', [AdminBlogPostController::class, 'create'])->name('posts.create');
                    Route::post('posts', [AdminBlogPostController::class, 'store'])->name('posts.store');
                    Route::get('posts/{post}/edit', [AdminBlogPostController::class, 'edit'])->name('posts.edit');
                    Route::put('posts/{post}', [AdminBlogPostController::class, 'update'])->name('posts.update');
                    Route::delete('posts/{post}', [AdminBlogPostController::class, 'destroy'])->name('posts.destroy');

                    Route::get('categories', [AdminBlogCategoryController::class, 'index'])->name('categories.index');
                    Route::get('categories/create', [AdminBlogCategoryController::class, 'create'])->name('categories.create');
                    Route::post('categories', [AdminBlogCategoryController::class, 'store'])->name('categories.store');
                    Route::get('categories/{category}/edit', [AdminBlogCategoryController::class, 'edit'])->name('categories.edit');
                    Route::put('categories/{category}', [AdminBlogCategoryController::class, 'update'])->name('categories.update');
                    Route::delete('categories/{category}', [AdminBlogCategoryController::class, 'destroy'])->name('categories.destroy');
                });
        });
    });


/////////// Blog
Route::get('blog', [PagesController::class, 'blog'])
    ->name('blog');
Route::get('blog-details/{slug?}', [PagesController::class, 'blog_details'])
    ->name('blog-details');

Route::get('blog/category/{category}', [PagesController::class, 'blog_category'])
    ->name('blog-category');

Route::get('lang/{locale}', [PagesController::class, 'set_locale'])
    ->name('set-locale');

/////////// Contact
Route::get('contact', [PagesController::class, 'contact'])->name('contact');


/////////// SEO (Sitemap)
Route::get('sitemap.xml', function () {
    $urls = [
        [
            'loc' => url('/'),
            'changefreq' => 'weekly',
            'priority' => '1.0',
        ],
        [
            'loc' => route('about'),
            'changefreq' => 'monthly',
            'priority' => '0.8',
        ],
        [
            'loc' => route('services'),
            'changefreq' => 'monthly',
            'priority' => '0.9',
        ],
        [
            'loc' => route('journals'),
            'changefreq' => 'weekly',
            'priority' => '0.9',
        ],
        [
            'loc' => route('blog'),
            'changefreq' => 'daily',
            'priority' => '0.9',
        ],
        [
            'loc' => route('contact'),
            'changefreq' => 'monthly',
            'priority' => '0.7',
        ],
    ];

    $posts = \App\Models\BlogPost::query()
        ->where('is_published', true)
        ->orderByDesc('published_at')
        ->limit(500)
        ->get(['slug', 'updated_at', 'published_at']);

    foreach ($posts as $post) {
        $lastMod = $post->updated_at ?? $post->published_at;
        $urls[] = [
            'loc' => route('blog-details', ['slug' => $post->slug]),
            'lastmod' => $lastMod ? $lastMod->toAtomString() : null,
            'changefreq' => 'weekly',
            'priority' => '0.7',
        ];
    }

    $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
    $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

    foreach ($urls as $u) {
        $xml .= "  <url>\n";
        $xml .= '    <loc>' . e($u['loc']) . '</loc>' . "\n";
        if (!empty($u['lastmod'])) {
            $xml .= '    <lastmod>' . e($u['lastmod']) . '</lastmod>' . "\n";
        }
        $xml .= '    <changefreq>' . e($u['changefreq']) . '</changefreq>' . "\n";
        $xml .= '    <priority>' . e($u['priority']) . '</priority>' . "\n";
        $xml .= "  </url>\n";
    }

    $xml .= '</urlset>';

    return response($xml, 200)->header('Content-Type', 'application/xml; charset=UTF-8');
});


///////////// 404 or not found
Route::fallback(function () {
    return response()->view('pages.404', [], 404);
})->name('not-found');