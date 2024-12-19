<?php

namespace App\Http\Controllers\Backend\ProductGroup;

use App\Models\ProductGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;

class ProductGroupController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $website_active_id = $this->website_active_id;

        $data = ProductGroup::with('website')
            ->where('website_id', $website_active_id['user_website_active'])
            ->orderBy('id')->get();

        return view('Backend.pages.product_group.index', compact('data'));
    }

    public function create()
    {
        $website = $this->website;

        return view('Backend.pages.product_group.create', compact('website'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'website_id' => 'required|integer|exists:websites,id',
        ]);

        try {

            $product = ProductGroup::create([
                'name' => $data['name'],
                'user_id' => Auth::user()->id,
                'website_id' => $data['website_id'],
            ]);

            if ($product) {
                Log::info('Product Group created successfully: ', $product->toArray());
            } else {
                Log::error('Failed to create the product group.');
            }

            return redirect()->route('product-group.index')->with('success', 'Product Group created successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    public function edit(Request $request, $id)
    {
        $website = $this->website;
        $website_id = $this->website_active_id;

        $data = ProductGroup::where('user_id', Auth::user()->id)
            ->where('website_id', $website_id['user_website_active'])
            ->orderBy('id')->first();

        return view('Backend.pages.product_group.edit', compact('data', 'website'));
    }

    public function update(Request $request, $id)
    {

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'website_id' => 'required|integer|exists:websites,id',
        ]);

        try {

            $product = ProductGroup::findOrFail($id);
            $product->update([
                'user_id' => Auth::user()->id,
                'website_id' => $data['website_id'],
                'name' => $data['name'],
            ]);

            return redirect()->route('product-group.index')->with('success', 'Product Group updated successfully!');
        } catch (\Exception $e) {
            Log::error('Error updating product: ' . $e->getMessage(), ['exception' => $e]);
            return back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {

        try {
            $product = ProductGroup::findOrFail($id);

            $product->delete();
            return redirect()->route('product-group.index')->with('success', 'Product Group deleted successfully!');
        } catch (\Exception $e) {
            Log::error('Error deleting product: ' . $e->getMessage(), ['exception' => $e]);
            return redirect()->route('product-group.index')->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }
}
