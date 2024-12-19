<?php

namespace App\Http\Service\actions;

use App\Models\Order\Coupons as coupon_title;
use App\Models\Order\CourierInfo;
use Illuminate\Support\Facades\Auth;

class courier
{
    public function execute($id)
    {
        CourierInfo::create([
            'user_id' => Auth::user()->id,
            'website_id' => $id,
            'courier_name' => 'Pathao',
            'app_key' => 'App-Key-MjAxNzEwMjIwMjAxNzEwMjIw',
            'app_secret' => "App-Secret-MjAxNzEwMjIwMjAxNzEwMjIw",
            'is_active' => 1,
        ]);

        return;
    }   
}