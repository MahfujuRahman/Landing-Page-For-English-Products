<?php

namespace App\Http\Service\actions;

use App\Models\ProductGroup;
use Illuminate\Support\Facades\Auth;

class product_group
{
    public function execute($id)
    {
        ProductGroup::create([
            'user_id' => Auth::user()->id,
            'website_id' => $id,
            'name' => 'প্রিমিয়াম জ্যাকেট',
        ]);

        return;
    }
}