<?php

namespace App\Http\Controllers\Backend\Order\SmsGateWay;

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use App\Models\Order\SmsGatewayInfo;
use Illuminate\Support\Facades\Auth;

class SmsGatewayController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
        $user = Auth::user()->id;

        $website_id = $this->website_active_id;

        $data = SmsGatewayInfo::where('user_id', $user)
            ->where('website_id', $website_id['user_website_active'] ?? 0)
            ->orderBy('id')->first();
        $website = $this->website;

        return view('Backend.pages.sms-gateway.index', compact('data', 'website'));
    }

    public function store(Request $request)
    {
        $user = Auth::user()->id;

        $data = $request->validate([
            'website_id' => 'required|integer|exists:websites,id',
            'gateway_name' => 'required|string|max:255',
            'app_key' => 'required|string|max:255',
            'app_secret' => 'required|string|max:255',
            'is_active' => 'required|boolean',
        ]);

        $courier = SmsGatewayInfo::where('user_id', $user)
            ->where('website_id', $data['website_id'])
            ->first();

        if ($courier) {
            $courier->update([
                'gateway_name' => $data['gateway_name'],
                'app_key' => $data['app_key'],
                'app_secret' => $data['app_secret'],
                'is_active' => $data['is_active'],
                'creator' => $user,
            ]);

            $message = 'Sms Gateway updated successfully!';
        } else {
            SmsGatewayInfo::create([
                'user_id' => $user,
                'website_id' => $data['website_id'],
                'gateway_name' => $data['gateway_name'],
                'app_key' => $data['app_key'],
                'app_secret' => $data['app_secret'],
                'is_active' => $data['is_active'],
                'creator' => $user,
            ]);

            $message = 'Sms Gateway added successfully!';
        }

        return redirect()->route('sms-gateway.index')->with('success', $message);
    }
}