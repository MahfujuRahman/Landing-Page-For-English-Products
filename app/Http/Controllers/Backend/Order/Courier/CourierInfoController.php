<?php

namespace App\Http\Controllers\Backend\Order\Courier;

use App\Models\Website;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Order\CourierInfo;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;

class CourierInfoController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $user = Auth::user()->id;
        $website_id = $this->website_active_id;
        $data = CourierInfo::where('user_id', $user)->where('website_id', $website_id['user_website_active'])->orderBy('id')->first();
        return view('Backend.pages.courier.index', compact('data'));
    }

    public function store(Request $request)
    {
        $user = Auth::user()->id;

        $data = $request->validate([
            'website_id' => 'required|integer|exists:websites,id',
            'courier_name' => 'required|string|max:255',
            'app_key' => 'required|string|max:255',
            'app_secret' => 'required|string|max:255',
            'is_active' => 'required|boolean',
        ]);

        $courier = CourierInfo::where('user_id', $user)
            ->where('website_id', $data['website_id'])
            ->first();

        if ($courier) {
            $courier->update([
                'courier_name' => $data['courier_name'],
                'app_key' => $data['app_key'],
                'app_secret' => $data['app_secret'],
                'is_active' => $data['is_active'],
            ]);

            $message = 'Courier updated successfully!';
        } else {
            CourierInfo::create([
                'user_id' => $user,
                'website_id' => $data['website_id'],
                'courier_name' => $data['courier_name'],
                'app_key' => $data['app_key'],
                'app_secret' => $data['app_secret'],
                'is_active' => $data['is_active'],
            ]);

            $message = 'Courier added successfully!';
        }

        return redirect()->route('courier.index')->with('success', $message);
    }
}