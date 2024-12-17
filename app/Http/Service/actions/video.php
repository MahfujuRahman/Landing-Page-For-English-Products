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
            'title' => 'আমাদের ভিডিও দেখুন',
            'sub_title' => 'আমাদের প্রোডাক্ট এবং সেবা সম্পর্কে বিস্তারিত জানুন',
            'button_title' => 'এখানে ক্লিক করুন',
            'button_url' => url('https://www.youtube.com/watch?v=eno--4Iviiw'),
            'image' => 'dummy_image/video_background.webp',
        ]);
        return;
    }
}
