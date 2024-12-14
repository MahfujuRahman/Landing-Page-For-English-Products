<?php

namespace App\Http\Service\actions;

use App\Models\Home\Product as product_item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class product
{
    public function execute($id)
    {
        $product = product_item::create([
            'user_id' => Auth::user()->id,
            'website_id' => $id,
            'name' => 'Product Name',
            'price' => '1200',
            'discount_price' => '999',
            'image' => 'dummy_image/product-1.jpg',
        ]);

        return;
    }
}
