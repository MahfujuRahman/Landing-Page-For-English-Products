<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserWebsiteActive extends Model
{
    protected $guarded = [];

    public function website()
    {
        return $this->belongsTo(Website::class, 'user_website_active');
    }
}