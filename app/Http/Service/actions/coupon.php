<?php

namespace App\Http\Service\actions;

use App\Models\Order\Coupons as coupon_title;
use Illuminate\Support\Facades\Auth;

class coupon
{
    public function execute($id)
    {
        coupon_title::create([
            'user_id' => Auth::user()->id,
            'website_id' => $id,
            'coupon_code' => 'Discount10',
            'discount' => 10,
            'is_active' => 1,
        ]);

        coupon_title::create([
            'user_id' => Auth::user()->id,
            'website_id' => $id,
            'coupon_code' => 'Discount20',
            'discount' => 20,
            'is_active' => 0,
        ]);

        return;
    }

}
