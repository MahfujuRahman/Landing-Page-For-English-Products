<?php

namespace App\Http\Service\actions;

use Illuminate\Http\Request;
use App\Models\Home\BannerImages;
use Illuminate\Support\Facades\Auth;
use App\Models\Home\Banner as web_banner;

class banner
{
    public function execute($id)
    {
        $banner = web_banner::create([
            'user_id' => Auth::user()->id,
            'website_id' => $id,
            'title' => 'Banner Title',
            'subtitle' => 'Banner Subtitle',
            'btn_title_1' => "Button 1",
            'btn_url_1' => url('/'),
            'btn_title_2' => "Button 2",
            'btn_url_2' => url('/'),
        ]);

        BannerImages::create([
            'banner_id' => $banner->id,
            'image' => 'dummy_image/banner.webp',
            'order' => 1,
        ]);

        return;
    }
}