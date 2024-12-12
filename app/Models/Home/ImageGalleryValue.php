<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;

class ImageGalleryValue extends Model
{
    protected $guarded = [];

    public function title()
    {
        return $this->belongsTo(ImageGalleryTitle::class);
    }
}