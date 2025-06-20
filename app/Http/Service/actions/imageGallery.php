<?php

namespace App\Http\Service\actions;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Home\ImageGalleryTitle;
use App\Models\Home\ImageGalleryValue;

class imageGallery
{
    public function execute($id)
    {
        $gallery_id = ImageGalleryTitle::create([
            'user_id' => Auth::user()->id,
            'website_id' => $id,
            'title' => 'প্রোডাক্ট গ্যালারি',
            'subtitle' => "সব ধরনের শীতের প্রোডাক্ট এখানে পাওয়া যাবে",
            'btn_title' => "অর্ডার করুন",
            'btn_url' => url('/#order'),
        ]);

        ImageGalleryValue::create([
            'image_gallery_title_id' => $gallery_id->id,
            'image' => 'dummy_image/product-4.jpg',
            'order' => 1,
        ]);

        ImageGalleryValue::create([
            'image_gallery_title_id' => $gallery_id->id,
            'image' => 'dummy_image/product-5.jpg',
            'order' => 2,
        ]);

        ImageGalleryValue::create([
            'image_gallery_title_id' => $gallery_id->id,
            'image' => 'dummy_image/product-6.jpg',
            'order' => 3,
        ]);

        return;
    }
}
