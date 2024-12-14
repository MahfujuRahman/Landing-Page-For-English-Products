<?php

namespace App\Providers;

use App\Models\Website;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
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

    public function boot(): void
    {
        $data = Website::orderBy('id')->select('site_name', 'site_url')->get();
        view()->share('navbarData', $data);

    }
}