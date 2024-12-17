<?php

namespace App\Http\Controllers\Backend\Order\GlobalDiscount;

use App\Models\Website;
use Illuminate\Http\Request;
use App\Models\Order\GlobalDiscount;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;

class GlobalDiscountController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $data = GlobalDiscount::orderBy('id')->get();
        return view('Backend.pages.global_discount.index', compact('data'));
    }

    public function create()
    {
        $authUser = auth()->user()->id;
        $website = Website::where('user_id', $authUser)->get();

        return view('Backend.pages.global_discount.create', compact('website'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'website_id' => 'required|integer|exists:websites,id',
            'title' => 'required|string|max:255',
            'discount' => 'required|numeric|min:0|max:100',
            'start_datetime' => 'required|date',
            'end_datetime' => 'required|date|after:start_datetime',
        ]);

        GlobalDiscount::create([
            'user_id' => $data['user_id'],
            'website_id' => $data['website_id'],
            'title' => $data['title'],
            'discount' => $data['discount'],
            'start_datetime' => $data['start_datetime'],
            'end_datetime' => $data['end_datetime'],
        ]);

        return redirect()->route('global-discounts.index')->with('success', 'Global Discount added successfully!');
    }

    public function edit($id)
    {
        $website = $this->website;
        $website_id = $this->website_active_id;

        $globalDiscount = GlobalDiscount::where('user_id', Auth::user()->id)
            ->where('website_id', $website_id['user_website_active'])
            ->orderBy('id')->first();

        return view('Backend.pages.global_discount.edit', compact('globalDiscount', 'website'));
    }

    public function update(Request $request, $id)
    {
        $globalDiscount = GlobalDiscount::findOrFail($id);

        $data = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'website_id' => 'required|integer|exists:websites,id',
            'title' => 'required|string|max:255',
            'discount' => 'required|numeric|min:0|max:100',
            'start_datetime' => 'required|date',
            'end_datetime' => 'required|date|after:start_datetime',
        ]);

        $globalDiscount->update([
            'user_id' => $data['user_id'],
            'website_id' => $data['website_id'],
            'title' => $data['title'],
            'discount' => $data['discount'],
            'start_datetime' => $data['start_datetime'],
            'end_datetime' => $data['end_datetime'],
        ]);

        return redirect()->route('global-discounts.index')->with('success', 'Global Discount updated successfully!');
    }

    public function destroy($id)
    {
        $globalDiscount = GlobalDiscount::findOrFail($id);
        $globalDiscount->delete();

        return redirect()->route('global-discounts.index')->with('success', 'Global Discount deleted successfully!');
    }
}
