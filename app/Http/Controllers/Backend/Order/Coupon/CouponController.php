<?php

namespace App\Http\Controllers\Backend\Order\Coupon;

use App\Models\Website;
use Illuminate\Http\Request;
use App\Models\Order\Coupons;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;

class CouponController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $data = Coupons::orderBy('id')->get();

        return view('Backend.pages.coupon.index', compact('data'));
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

        $website = $this->website;
        $website_id = $this->website_active_id;

        $coupon = Coupons::where('user_id', Auth::user()->id)
            ->where('website_id', $website_id['user_website_active'])
            ->orderBy('id')->first();


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
}
