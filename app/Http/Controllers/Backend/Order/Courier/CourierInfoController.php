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
        $data = CourierInfo::orderBy('id')->get();

        return view('Backend.pages.courier.index', compact('data'));
    }

    public function create()
    {
        $authUser = auth()->user()->id;
        $website = Website::where('user_id', $authUser)->get();
        return view('Backend.pages.coupon.create', compact('website'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'website_id' => 'required|integer|exists:websites,id',
            'coupon_code' => 'required|string|max:255|unique:coupons,coupon_code',
            'discount' => 'required|numeric|min:0|max:100',
            'is_active' => 'required|boolean',
        ]);

        Coupons::create([
            'user_id' => $data['user_id'],
            'website_id' => $data['website_id'],
            'coupon_code' => $data['coupon_code'],
            'discount' => $data['discount'],
            'is_active' => $data['is_active'],
        ]);

        return redirect()->route('coupons.index')->with('success', 'Coupon added successfully!');
    }

    public function edit($id)
    {
        $coupon = Coupons::findOrFail($id);
        $authUser = auth()->user()->id;
        $website = Website::where('user_id', $authUser)->get();
        return view('Backend.pages.coupon.edit', compact('coupon', 'website'));
    }

    public function update(Request $request, $id)
    {
        $coupon = Coupons::findOrFail($id);

        $data = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'website_id' => 'required|integer|exists:websites,id',
            'coupon_code' => 'required|string|max:255|unique:coupons,coupon_code,' . $id,
            'discount' => 'required|numeric|min:0|max:100',
            'is_active' => 'required|boolean',
        ]);

        $coupon->update([
            'user_id' => $data['user_id'],
            'website_id' => $data['website_id'],
            'coupon_code' => $data['coupon_code'],
            'discount' => $data['discount'],
            'is_active' => $data['is_active'],
        ]);

        return redirect()->route('coupons.index')->with('success', 'Coupon updated successfully!');
    }

    public function destroy($id)
    {
        $coupon = Coupons::findOrFail($id);
        $coupon->delete();

        return redirect()->route('coupons.index')->with('success', 'Coupon deleted successfully!');
    }

    // public function update(Request $request, $id)
    // {
    //     $data = $request->validate([
    //         'website_id' => 'required|exists:websites,id',
    //         'courier_name' => 'required|string|max:255',
    //         'app_key' => 'required|string|max:255',
    //         'app_secret' => 'required|string|max:255',
    //         'is_active' => 'required|boolean',
    //     ]);

    //     $courier = CourierInfo::findOrFail($id);

    //     $courier->update([
    //         'user_id' => Auth::user()->id,
    //         'website_id' => $data['website_id'],
    //         'courier_name' => $data['courier_name'],
    //         'app_key' => $data['app_key'],
    //         'app_secret' => $data['app_secret'],
    //         'is_active' => $data['is_active'],
    //     ]);

    //     return redirect()->route('couriers.index')->with('success', 'Courier updated successfully.');
    // }
}
