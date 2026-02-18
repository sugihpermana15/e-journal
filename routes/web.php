<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\BlogPostController as AdminBlogPostController;
use App\Http\Controllers\Admin\BlogCategoryController as AdminBlogCategoryController;
use App\Http\Controllers\Admin\Ejournal\SettingsController as AdminEjournalSettingsController;
use App\Http\Controllers\Admin\Ejournal\JournalController as AdminEjournalJournalController;
use App\Http\Controllers\Admin\Ejournal\HeaderController as AdminEjournalHeaderController;


////////// Home
Route::get('/', [HomeController::class, 'index'])
    ->name('index');


////////// about
Route::get('about', [PagesController::class, 'about'])->name('about');


////////// journals
Route::get('journals', [PagesController::class, 'journals'])->name('journals');


///////// Pages
Route::get('team', [PagesController::class, 'team'])
    ->name('team');
Route::get('team-details', [PagesController::class, 'team_details'])
    ->name('team-details');
Route::get('projects', [PagesController::class, 'projects'])
    ->name('projects');
Route::get('projects-carousel', [PagesController::class, 'projects_carousel'])
    ->name('projects-carousel');
Route::get('project-details', [PagesController::class, 'project_details'])
    ->name('project-details');
Route::get('testimonials', [PagesController::class, 'testimonials'])
    ->name('testimonials');
Route::get('testimonials-carousel', [PagesController::class, 'testimonials_carousel'])
    ->name('testimonials-carousel');
Route::get('pricing', [PagesController::class, 'pricing'])
    ->name('pricing');
Route::get('pricing-carousel', [PagesController::class, 'pricing_carousel'])
    ->name('pricing-carousel');
Route::get('gallery', [PagesController::class, 'gallery'])
    ->name('gallery');    
Route::get('faq', [PagesController::class, 'faq'])
    ->name('faq');
Route::get('404', [PagesController::class, 'not_found'])
    ->name('404');
Route::get('coming-soon', [PagesController::class, 'coming_soon'])
->name('coming-soon');


//////////// Services
Route::get('services', [PagesController::class, 'services'])
    ->name('services');
Route::get('residential-cleaning', [PagesController::class, 'residential_cleaning'])
    ->name('residential-cleaning');
Route::get('commercial-cleaning', [PagesController::class, 'commercial_cleaning'])
    ->name('commercial-cleaning');
Route::get('deep-cleaning', [PagesController::class, 'deep_cleaning'])
    ->name('deep-cleaning');
Route::get('office-cleaning', [PagesController::class, 'office_cleaning'])
    ->name('office-cleaning');
Route::get('sanitizing-mopping', [PagesController::class, 'sanitizing_mopping'])
    ->name('sanitizing-mopping');

Route::get('services-detail', [PagesController::class, 'services_detail'])
    ->name('services-detail');

Route::get('book-publishing', [PagesController::class, 'book_publishing'])
    ->name('book-publishing');
Route::get('journal-publication', [PagesController::class, 'journal_publication'])
    ->name('journal-publication');
Route::get('ipr-management', [PagesController::class, 'ipr_management'])
    ->name('ipr-management');
Route::get('custom-publishing', [PagesController::class, 'custom_publishing'])
    ->name('custom-publishing');
Route::get('distribution-licensing', [PagesController::class, 'distribution_licensing'])
    ->name('distribution-licensing');


//////////// Shop
Route::get('product', [PagesController::class, 'product'])
    ->name('product');
Route::get('products-right', [PagesController::class, 'products_right'])
    ->name('products-right');
Route::get('products-left', [PagesController::class, 'products_left'])
    ->name('products-left');
Route::get('product-details', [PagesController::class, 'product_details'])
    ->name('product-details');
Route::get('cart', [PagesController::class, 'cart'])
    ->name('cart');
Route::get('checkout', [PagesController::class, 'checkout'])
    ->name('checkout');
Route::get('wishlist', [PagesController::class, 'wishlist'])
    ->name('wishlist');


////////// account
// Admin login (used by header sidebar Login link)
Route::get('login', [AdminAuthController::class, 'showLogin'])->name('login');
Route::post('login', [AdminAuthController::class, 'login'])->name('login.perform');
Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');

// Keep the old public login page accessible (if needed)
Route::get('account/login', [PagesController::class, 'login'])->name('account.login');

Route::get('sign-up', [PagesController::class, 'sign_up'])->name('sign-up');

// Admin area
Route::prefix('admin')
    ->name('admin.')
    ->middleware('auth')
    ->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

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
Route::get('blog-carousel', [PagesController::class, 'blog_carousel'])
    ->name('blog-carousel');
Route::get('blog-list', [PagesController::class, 'blog_list'])
    ->name('blog-list');
Route::get('blog-details/{slug?}', [PagesController::class, 'blog_details'])
    ->name('blog-details');

Route::get('blog/category/{category}', [PagesController::class, 'blog_category'])
    ->name('blog-category');

Route::get('lang/{locale}', [PagesController::class, 'set_locale'])
    ->name('set-locale');

/////////// Contact
Route::get('contact', [PagesController::class, 'contact'])->name('contact');


///////////// 404 or not found

Route::fallback([PagesController::class, 'not_found'])
    ->name('not-found');