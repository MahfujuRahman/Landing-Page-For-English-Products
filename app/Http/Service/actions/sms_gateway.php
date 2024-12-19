<?php

namespace App\Http\Service\actions;

use App\Models\Order\SmsGatewayInfo;
use Illuminate\Support\Facades\Auth;

class sms_gateway
{
    public function execute($id)
    {
        SmsGatewayInfo::create([
            'user_id' => Auth::user()->id,
            'website_id' => $id,
            'gateway_name' => 'Bulk Sms Bd',
            'app_key' => 'App-Key-MjAxNzEwMjIwMjAxNzEwMjIw',
            'app_secret' => "App-Secret-MjAxNzEwMjIwMjAxNzEwMjIw",
            'is_active' => 1,
        ]);

        return;
    }
}
