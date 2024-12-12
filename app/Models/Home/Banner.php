<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $guarded = [];

    public function images()
    {
        return $this->hasMany(BannerImages::class)->orderBy('id');
    }
}