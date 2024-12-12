<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;

class BannerImages extends Model
{
    protected $guarded = [];

    public function banner()
    {
        return $this->belongsTo(Banner::class);
    }
}