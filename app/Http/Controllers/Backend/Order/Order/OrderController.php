<?php

namespace App\Http\Controllers\Backend\Order\Order;

use Illuminate\Http\Request;
use App\Models\Order\OrderSheet;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        $data = OrderSheet::orderBy('id')->get();
        return view('Backend.pages.order.index', compact('data'));
    }

    public function create()
    {
        return view('Backend.pages.global_discount.create');
    }

    // public function store(Request $request)
    // {
    //     $data = $request->validate([
    //         'title' => 'required|string|max:255',
    //         'discount' => 'required|numeric|min:0|max:100',
    //         'start_datetime' => 'required|date',
    //         'end_datetime' => 'required|date|after:start_datetime',
    //     ]);

    //     GlobalDiscount::create([
    //         'title' => $data['title'],
    //         'discount' => $data['discount'],
    //         'start_datetime' => $data['start_datetime'],
    //         'end_datetime' => $data['end_datetime'],
    //     ]);

    //     return redirect()->route('global-discounts.index')->with('success', 'Global Discount added successfully!');
    // }

    // public function edit($id)
    // {
    //     $globalDiscount = GlobalDiscount::findOrFail($id);
    //     return view('Backend.pages.global_discount.edit', compact('globalDiscount'));
    // }

    public function update(Request $request, $id)
    {
        $globalDiscount = OrderSheet::findOrFail($id);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'discount' => 'required|numeric|min:0|max:100',
            'start_datetime' => 'required|date',
            'end_datetime' => 'required|date|after:start_datetime',
        ]);

        $globalDiscount->update([
            'title' => $data['title'],
            'discount' => $data['discount'],
            'start_datetime' => $data['start_datetime'],
            'end_datetime' => $data['end_datetime'],
        ]);

        return redirect()->route('order.index')->with('success', 'Order updated successfully!');
    }

    public function show($id)
    {
        $data = OrderSheet::findOrFail($id);
        $product = json_decode($data->product_details);
        return view('Backend.pages.order.show', compact('data','product'));
    }

    public function destroy($id)
    {
        $globalDiscount = OrderSheet::findOrFail($id);
        $globalDiscount->delete();

        return redirect()->route('order.index')->with('success', 'Order deleted successfully!');
    }
}
