<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (App::runningInConsole()) {
            return;
        }

        $locale = session('app_locale');
        if (is_string($locale) && in_array($locale, ['en', 'zh', 'ar'], true)) {
            App::setLocale($locale);
        }
    }
}
