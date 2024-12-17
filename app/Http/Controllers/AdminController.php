<?php

namespace App\Http\Controllers;

use App\Models\Website;
use App\Models\WebsiteActive;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AdminController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public $website = [];
    public $website_active_id = 0;

    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {
            $this->getWebsiteData();
            $this->getActiveWebsite();

            return $next($request);
        });
    }

    public function getWebsiteData()
    {

        $authUser = Auth::user()->id;

        $websites = Website::where('user_id', $authUser)->get();

        view()->share('navbarData', $websites);

        $this->website = $websites;
    }

    public function getActiveWebsite()
    {
        $user = Auth::user()->id;

        $active_website = WebsiteActive::where("user_id", $user)->select('id', 'user_website_active', 'user_id')->first();

        view()->share('website_active_id', $active_website);

        $this->website_active_id = $active_website;
    }
}
