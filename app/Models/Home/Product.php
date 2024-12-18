<?php

namespace App\Models\Home;

use App\Models\ProductGroup;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function productGroup()
    {
        return $this->belongsTo(ProductGroup::class);
    }
}
