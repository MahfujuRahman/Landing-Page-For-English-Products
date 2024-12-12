<?php

namespace App\Http\Controllers;

use App\Models\Website;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AdminController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public $website = [];
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {
            $this->getWebsiteData();
            return $next($request);
        });
    }

    public function getWebsiteData()
    {
        $authUser = Auth::user()->id;
        $website = Website::where('user_id', $authUser)->get();
        $this->website = $website;
    }
}
