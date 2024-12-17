<?php

namespace App\Http\Controllers\Backend\ImageGallery;

use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use App\Models\Home\ImageGalleryTitle;
use App\Models\Home\ImageGalleryValue;
use App\Http\Controllers\AdminController;

class ImageGalleryController extends AdminController
{
    public function index()
    {
        $data = ImageGalleryTitle::with('images')->orderBy('id')->get();
        return view('Backend.pages.image_gallery.index', compact('data'));
    }

    public function create()
    {
        $authUser = auth()->user()->id;
        $website = Website::where('user_id', $authUser)->get();

        return view('Backend.pages.image_gallery.create', compact('website'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'website_id' => 'required|integer|exists:websites,id',
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'btn_title' => 'nullable|string|max:255',
            'btn_url' => 'nullable|string|max:255',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,webp',
        ]);

        DB::beginTransaction();

        try {

            $banner = ImageGalleryTitle::create([
                'user_id' => $data['user_id'],
                'website_id' => $data['website_id'],
                'title' => $data['title'],
                'subtitle' => $data['subtitle'],
                'btn_title' => $data['btn_title'],
                'btn_url' => $data['btn_url'],
            ]);

            if ($request->hasFile('images')) {
                $images = $request->file('images');

                foreach ($images as $index => $image) {
                    $filenameWithExtension = $this->generateUniqueFileName($image);
                    $filenameWithWebP = pathinfo($filenameWithExtension, PATHINFO_FILENAME) . '.webp';
                    $manager = new ImageManager(['driver' => 'gd']);

                    $resizedImage = $manager->make($image->getRealPath())->resize(400, 400, function ($constraint) {
                        $constraint->aspectRatio();
                    });

                    $originalPath = public_path('uploads/image-gallery/images/');
                    if (!file_exists($originalPath)) {
                        mkdir($originalPath, 0755, true);
                    }

                    $resizedImage->save($originalPath . $filenameWithWebP, env('IMAGE_QUALITY_SIZE', 90), 'webp'); // Use the environment variable for quality

                    ImageGalleryValue::create([
                        'image_gallery_title_id' => $banner->id,
                        'image' => 'uploads/image-gallery/images/' . $filenameWithWebP,
                        'order' => $index + 1,
                    ]);
                }
            }

            DB::commit();

            return redirect()->route('image-gallery.index')->with('success', 'Image Gallery created successfully!');
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
        $website = $this->website;
        $website_id = $this->website_active_id;

        $data = ImageGalleryTitle::where('user_id', Auth::user()->id)
            ->where('website_id', $website_id['user_website_active'])
            ->orderBy('id')->with('images')->first();

        return view('Backend.pages.image_gallery.edit', compact('data', 'website'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'website_id' => 'required|integer|exists:websites,id',
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'btn_title' => 'nullable|string|max:255',
            'btn_url' => 'nullable|string|max:255',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,webp',
        ]);

        DB::beginTransaction();

        try {
            $title = ImageGalleryTitle::findOrFail($id);

            $title->update([
                'user_id' => $data['user_id'],
                'website_id' => $data['website_id'],
                'title' => $data['title'],
                'subtitle' => $data['subtitle'],
                'btn_title' => $data['btn_title'],
                'btn_url' => $data['btn_url'],
            ]);

            if ($request->has('deleted_images')) {
                $deletedImages = explode(',', $request->input('deleted_images'));

                foreach ($deletedImages as $deletedImageId) {
                    $image = ImageGalleryValue::find($deletedImageId);

                    if ($image) {
                        $imagePath = public_path($image->image);
                        if (file_exists($imagePath)) {
                            unlink($imagePath);
                        }
                        $image->delete();
                    }
                }
            }

            if ($request->hasFile('images')) {
                $images = $request->file('images');

                foreach ($images as $index => $image) {
                    $filenameWithExtension = $this->generateUniqueFileName($image);
                    $filenameWithWebP = pathinfo($filenameWithExtension, PATHINFO_FILENAME) . '.webp';
                    $manager = new ImageManager(['driver' => 'gd']);

                    $resizedImage = $manager->make($image->getRealPath())->resize(400, 400, function ($constraint) {
                        $constraint->aspectRatio();
                    });

                    $originalPath = public_path('uploads/image-gallery/images/');
                    if (!file_exists($originalPath)) {
                        mkdir($originalPath, 0755, true);
                    }

                    $resizedImage->save($originalPath . $filenameWithWebP, env('IMAGE_QUALITY_SIZE', 90), 'webp'); // Use the environment variable for quality

                    ImageGalleryValue::create([
                        'image_gallery_title_id' => $title->id,
                        'image' => 'uploads/image-gallery/images/' . $filenameWithWebP,
                        'order' => $index + 1,
                    ]);
                }
            }


            DB::commit();

            return redirect()->route('image-gallery.index')->with('success', 'Image updated successfully!');
        } catch (\Exception $e) {
            DB::rollBack();

            return back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }


    public function destroy($id)
    {

        DB::beginTransaction();

        try {
            $image_gallery = ImageGalleryTitle::findOrFail($id);

            foreach ($image_gallery->images as $image) {
                $imagePath = public_path($image->image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
                $image->delete();
            }
            $image_gallery->delete();

            DB::commit();
            return redirect()->route('image-gallery.index')->with('success', 'Image Gallery and its images deleted successfully!');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->route('image_gallery.index')->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }
}
