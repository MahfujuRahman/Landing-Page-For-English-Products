<?php

namespace App\Http\Controllers\Backend\Order\Order;

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use App\Models\Order\OrderSheet;

class OrderController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $website_active_id = $this->website_active_id;

        $data = OrderSheet::where('website_id', $website_active_id['user_website_active'])
            ->orderBy('id')->get();

        return view('Backend.pages.order.index', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $order = OrderSheet::findOrFail($id);

        $data = $request->validate([
            'delivery_status' => 'required|in:pending,processing,accepted,delivered,cancelled',
        ]);

        $order->update([
            'delivery_status' => $data['delivery_status'],
        ]);

        return redirect()->route('order.show', $order->id)->with('success', 'Order updated successfully!');
    }

    public function show($id)
    {
        $data = OrderSheet::findOrFail($id);
        $product = json_decode($data->product_details);
        return view('Backend.pages.order.show', compact('data', 'product'));
    }

    public function destroy($id)
    {
        $globalDiscount = OrderSheet::findOrFail($id);
        $globalDiscount->delete();

        return redirect()->route('order.index')->with('success', 'Order deleted successfully!');
    }
}
