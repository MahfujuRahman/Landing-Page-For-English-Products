<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductGroup extends Model
{
    protected $guarded = [];

    public function website()
    {
        return $this->belongsTo(Website::class);
    }
}
