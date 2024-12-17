<?php

namespace App\Http\Service\actions;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order\GlobalDiscount as discount;

class globalDiscount
{
    public function execute($id)
    {
        discount::create([
            'user_id' => Auth::user()->id,
            'website_id' => $id,
            'title' => 'শীতের ডিসকাউন্ট - ৫০%',
            'discount' => 50,
            'start_datetime' => now(),
            'end_datetime' => now()->addDays(30),
        ]);

        return;
    }

}
