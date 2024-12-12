<?php

namespace App\Models;

use App\Http\Service\InitialWebsite;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
{

    protected $guarded = [];

    protected static function booted()
    {
        static::created(function ($website) {
            new InitialWebsite($website->id);
        });
    }
}
