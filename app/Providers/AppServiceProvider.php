<?php

namespace App\Providers;

use App\Models\Website;
use Illuminate\Support\ServiceProvider;

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
        $data = Website::orderBy('id')->select('site_name','site_url')->get();
        view()->share('navbarData', $data);
    }
}