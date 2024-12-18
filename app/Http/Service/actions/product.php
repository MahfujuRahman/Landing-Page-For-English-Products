<?php

namespace App\Http\Service\actions;

use App\Models\ProductGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Home\Product as product_item;

class product
{
    public function execute($id)
    {
        $product_group = ProductGroup::orderBy('id', "desc")->first();

        $product = product_item::create([
            'user_id' => Auth::user()->id,
            'website_id' => $id,
            'name' => 'প্রিমিয়াম পাফার জ্যাকেট',
            'price' => '1200',
            'discount_price' => '999',
            'product_group_id' => $product_group ? ($product_group->id + 1) : 1,
            'image' => 'dummy_image/product-1.jpg',
        ]);

        return;
    }
}