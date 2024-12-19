<?php

namespace App\Http\Controllers\Backend\Banner;

use App\Http\Controllers\AdminController;
use App\Models\Website;
use App\Models\Home\Banner;
use Illuminate\Http\Request;
use App\Models\Home\BannerImages;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;

class BannerController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $website_active_id = $this->website_active_id;

        $banners = Banner::with('images')
            ->where('website_id', $website_active_id['user_website_active'])
            ->orderBy('id')->get();

        return view('Backend.pages.banner.index', compact('banners'));
    }

    public function create()
    {
        $website_active_id = $this->website_active_id;
        $website = $this->website;
        return view('Backend.pages.banner.create', compact('website', 'website_active_id'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'website_id' => 'required|integer|exists:websites,id',
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'btn_title_1' => 'nullable|string|max:255',
            'btn_url_1' => 'nullable|string|max:255',
            'btn_title_2' => 'nullable|string|max:255',
            'btn_url_2' => 'nullable|string|max:255',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,webp',
        ]);

        $banner = Banner::where('user_id', $data['user_id'])
            ->where('website_id', $data['website_id'])
            ->first();

        if ($banner) {
            return redirect()->back()->withErrors([
                'banner' => 'You can\'t create a banner for this website. Banner already exists.',
            ]);
        }

        DB::beginTransaction();

        try {

            $banner = Banner::create([
                'user_id' => $data['user_id'],
                'website_id' => $data['website_id'],
                'title' => $data['title'],
                'subtitle' => $data['subtitle'],
                'btn_title_1' => $data['btn_title_1'],
                'btn_url_1' => $data['btn_url_1'],
                'btn_title_2' => $data['btn_title_2'],
                'btn_url_2' => $data['btn_url_2'],
            ]);

            if ($request->hasFile('images')) {
                $images = $request->file('images');

                foreach ($images as $index => $image) {
                    $filenameWithExtension = $this->generateUniqueFileName($image);
                    $filenameWithWebP = pathinfo($filenameWithExtension, PATHINFO_FILENAME) . '.webp';
                    $manager = new ImageManager(['driver' => 'gd']);
                    $resizedImage = $manager->make($image->getRealPath())->resize(800, 800, function ($constraint) {
                        $constraint->aspectRatio();
                    });

                    $originalPath = public_path('uploads/banners/images/');
                    if (!file_exists($originalPath)) {
                        mkdir($originalPath, 0755, true);
                    }

                    $resizedImage->save($originalPath . $filenameWithWebP, env('IMAGE_QUALITY_SIZE', 90), 'webp');

                    BannerImages::create([
                        'banner_id' => $banner->id,
                        'image' => 'uploads/banners/images/' . $filenameWithWebP,
                        'order' => $index + 1,
                        'size' => $resizedImage->filesize(),
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('banners.index')->with('success', 'Banner created successfully!');
        } catch (\Exception $e) {
            DB::rollBack();

            return back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    private function generateUniqueFileName($file)
    {
        return uniqid(time() . '_') . '_' . $file->getClientOriginalName();
    }

    public function edit(Banner $banner)
    {
        $website = $this->website;
        $website_id = $this->website_active_id;

        $banner = Banner::where('user_id', Auth::user()->id)
            ->where('website_id', $website_id['user_website_active'])
            ->orderBy('id')->first();

        return view('Backend.pages.banner.edit', compact('banner', 'website'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'website_id' => 'required|integer|exists:websites,id',
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'btn_title_1' => 'nullable|string|max:255',
            'btn_url_1' => 'nullable|string|max:255',
            'btn_title_2' => 'nullable|string|max:255',
            'btn_url_2' => 'nullable|string|max:255',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,webp',
        ]);

        DB::beginTransaction();

        try {
            $banner = Banner::findOrFail($id);

            $banner->update([
                'user_id' => $data['user_id'],
                'website_id' => $data['website_id'],
                'title' => $data['title'],
                'subtitle' => $data['subtitle'],
                'btn_title_1' => $data['btn_title_1'],
                'btn_url_1' => $data['btn_url_1'],
                'btn_title_2' => $data['btn_title_2'],
                'btn_url_2' => $data['btn_url_2'],
            ]);

            if ($request->has('deleted_images')) {
                $deletedImages = explode(',', $request->input('deleted_images'));

                foreach ($deletedImages as $deletedImageId) {
                    $image = BannerImages::find($deletedImageId);

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
                    $resizedImage = $manager->make($image->getRealPath())->resize(800, 800, function ($constraint) {
                        $constraint->aspectRatio();
                    });


                    $originalPath = public_path('uploads/banners/images/');
                    if (!file_exists($originalPath)) {
                        mkdir($originalPath, 0755, true);
                    }

                    $resizedImage->save($originalPath . $filenameWithWebP, env('IMAGE_QUALITY_SIZE', 90), 'webp');

                    BannerImages::create([
                        'banner_id' => $banner->id,
                        'image' => 'uploads/banners/images/' . $filenameWithWebP,
                        'order' => $index + 1,
                        'size' => $resizedImage->filesize(),
                    ]);
                }
            }

            DB::commit();

            return redirect()->route('banners.index')->with('success', 'Banner updated successfully!');
        } catch (\Exception $e) {
            DB::rollBack();

            return back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();

        try {
            $banner = Banner::findOrFail($id);
            foreach ($banner->images as $image) {
                $imagePath = public_path($image->image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
                $image->delete();
            }

            $banner->delete();
            DB::commit();

            return redirect()->route('banners.index')->with('success', 'Banner and its images deleted successfully!');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->route('banners.index')->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }
}
