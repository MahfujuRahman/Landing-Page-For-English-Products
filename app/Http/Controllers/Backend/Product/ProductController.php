<?php

namespace App\Http\Controllers\Backend\Product;

use App\Http\Controllers\AdminController;
use App\Models\Website;
use App\Models\Home\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Intervention\Image\ImageManager;

class ProductController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $data = Product::orderBy('id')->get();
        return view('Backend.pages.product.index', compact('data'));
    }

    public function create()
    {
        $authUser = auth()->user()->id;
        $website = Website::where('user_id', $authUser)->get();

        return view('Backend.pages.product.create', compact('website'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'website_id' => 'required|integer|exists:websites,id',
            'name' => 'required|string|max:255',
            'price' => 'nullable|numeric',
            'discount_price' => 'nullable|numeric',
            'image' => 'required|mimes:jpeg,png,jpg,webp',
        ]);

        DB::beginTransaction();

        try {

            $image_path = null;
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $image = $request->file('image');
                $filenameWithExtension = $this->generateUniqueFileName($image);
                $filenameWithWebP = pathinfo($filenameWithExtension, PATHINFO_FILENAME) . '.webp';
                $manager = new ImageManager(['driver' => 'gd']);
                $resizedImage = $manager->make($image->getRealPath())->resize(400, 400, function ($constraint) {
                    $constraint->aspectRatio();
                });

                $originalPath = public_path('uploads/product/images/');
                if (!file_exists($originalPath)) {
                    mkdir($originalPath, 0755, true);
                }

                $resizedImage->save($originalPath . $filenameWithWebP, env('IMAGE_QUALITY_SIZE', 90), 'webp');
                $image_path = 'uploads/product/images/' . $filenameWithWebP;
            } else {
                return back()->with('error', 'Invalid or no image uploaded.');
            }

            if (!$image_path) {
                return back()->with('error', 'No image uploaded or image path is invalid.');
            }

            $product = Product::create([
                'user_id' => $data['user_id'],
                'website_id' => $data['website_id'],
                'name' => $data['name'],
                'price' => $data['price'],
                'discount_price' => $data['discount_price'],
                'image' => $image_path,
            ]);

            if ($product) {
                Log::info('Product created successfully: ', $product->toArray());
            } else {
                Log::error('Failed to create the product.');
            }

            DB::commit();

            return redirect()->route('product.index')->with('success', 'Product created successfully!');
        } catch (\Exception $e) {
            DB::rollBack();

            return back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }


    private function generateUniqueFileName($file)
    {
        return uniqid(time() . '_') . '_' . $file->getClientOriginalName();
    }

    public function edit(Request $request, $id)
    {
        $data = Product::findOrFail($id);
        $authUser = auth()->user()->id;
        $website = Website::where('user_id', $authUser)->get();

        return view('Backend.pages.product.edit', compact('data','website'));
    }

    public function update(Request $request, $id)
    {

        $data = $request->validate([
            'website_id' => 'required|integer|exists:websites,id',
            'name' => 'required|string|max:255',
            'price' => 'nullable|numeric',
            'discount_price' => 'nullable|numeric',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif|max:8192',
        ]);

        DB::beginTransaction();

        try {

            $product = Product::findOrFail($id);

            $image_path = $product->image;

            if ($request->hasFile('image') && $request->file('image')->isValid()) {

                $image = $request->file('image');
                $filenameWithExtension = $this->generateUniqueFileName($image);
                $filenameWithWebP = pathinfo($filenameWithExtension, PATHINFO_FILENAME) . '.webp';

                $manager = new ImageManager(['driver' => 'gd']);
                $resizedImage = $manager->make($image->getRealPath())->resize(400, 400, function ($constraint) {
                    $constraint->aspectRatio();
                });

                $originalPath = public_path('uploads/product/images/');
                if (!file_exists($originalPath)) {
                    mkdir($originalPath, 0755, true);
                }

                if ($image_path && file_exists(public_path($image_path))) {
                    unlink(public_path($image_path));
                }

                $resizedImage->save($originalPath . $filenameWithWebP, env('IMAGE_QUALITY_SIZE', 90), 'webp');

                $image_path = 'uploads/product/images/' . $filenameWithWebP;
            } else {
                // return back()->with('error', 'Invalid or no image uploaded.');
            }

            $product->update([
                'user_id' => auth()->user()->id,
                'website_id' => $data['website_id'],
                'name' => $data['name'],
                'price' => $data['price'],
                'discount_price' => $data['discount_price'],
                'image' => $image_path,
            ]);

            DB::commit();

            return redirect()->route('product.index')->with('success', 'Product updated successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error updating product: ' . $e->getMessage(), ['exception' => $e]);

            return back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();

        try {
            // Find the product by ID
            $product = Product::findOrFail($id);

            if ($product->image && file_exists(public_path($product->image))) {

                unlink(public_path($product->image));

                Log::info('Deleted image: ' . public_path($product->image));
            } else {
                Log::warning('Image not found for product ID: ' . $id);
            }

            $product->delete();

            DB::commit();

            return redirect()->route('product.index')->with('success', 'Product and its image deleted successfully!');
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Error deleting product: ' . $e->getMessage(), ['exception' => $e]);

            return redirect()->route('product.index')->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }
}
