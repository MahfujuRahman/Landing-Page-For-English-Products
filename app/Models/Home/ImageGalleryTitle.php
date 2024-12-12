<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;

class ImageGalleryTitle extends Model
{
    protected $guarded = [];

    public function images()
    {
        return $this->hasMany(ImageGalleryValue::class)->orderBy('id');
    }
}