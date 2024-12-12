<?php

namespace App\Http\Service\actions;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Home\Video as video_item;

class video
{
    public function execute($id)
    {
        video_item::create([
            'user_id' => Auth::user()->id,
            'website_id' => $id,
            'title' => 'Your Title Here',
            'sub_title' => 'Your Subtitle Here',
            'button_title' => 'Button Title',
            'button_url' => url('/'),
            'image' => 'dummy_image/video_background.webp',
        ]);
        return;
    }

}
