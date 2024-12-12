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
            'title' => 'Your Gellary Title Here',
            'subtitle' => "Your Gellary Subtitle Here",
            'btn_title' => "Your Button Title Here",
            'btn_url' => url('/'),
        ]);

        ImageGalleryValue::create([
            'image_gallery_title_id' => $gallery_id->id,
            'image' => 'dummy_image/product_1.jpg',
            'order' => 1,
        ]);

        ImageGalleryValue::create([
            'image_gallery_title_id' => $gallery_id->id,
            'image' => 'dummy_image/product_2.jpg',
            'order' => 2,
        ]);

        ImageGalleryValue::create([
            'image_gallery_title_id' => $gallery_id->id,
            'image' => 'dummy_image/product_3.jpg',
            'order' => 3,
        ]);

        return;
    }

}