<?php

namespace App\Http\Controllers\Backend\Video;

use App\Http\Controllers\AdminController;
use App\Models\Website;
use App\Models\Home\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;

class VideoController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $website_active_id = $this->website_active_id;

        $videos = Video::where('website_id', $website_active_id['user_website_active'])
            ->orderBy('id')->get();

        return view('Backend.pages.video.index', compact('videos'));
    }

    public function create()
    {
        $authUser = Auth::user()->id;
        $website = Website::where('user_id', $authUser)->get();
        return view('Backend.pages.video.create', compact('website'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'website_id' => 'required|integer|exists:websites,id',
            'title' => 'nullable|string|max:255',
            'sub_title' => 'nullable|string|max:255',
            'btn_title' => 'nullable|string|max:255',
            'button_url' => 'nullable|string|max:255',
            'image' => 'nullable|mimes:jpeg,png,jpg,webp',
        ]);

        DB::beginTransaction();

        try {

            $image_path = null;
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $image = $request->file('image');
                $filenameWithExtension = $this->generateUniqueFileName($image);
                $filenameWithWebP = pathinfo($filenameWithExtension, PATHINFO_FILENAME) . '.webp';
                $manager = new ImageManager(['driver' => 'gd']);
                $resizedImage = $manager->make($image->getRealPath())->resize(1920, 1080, function ($constraint) {
                    $constraint->aspectRatio();
                });

                $originalPath = public_path('uploads/video/images/');
                if (!file_exists($originalPath)) {
                    mkdir($originalPath, 0755, true);
                }

                $resizedImage->save($originalPath . $filenameWithWebP, env('IMAGE_QUALITY_SIZE', 90), 'webp');
                $image_path = 'uploads/video/images/' . $filenameWithWebP;
            }

            // if (!$image_path) {
            //     return back()->with('error', 'No image uploaded or image path is invalid.');
            // }

            Video::create([
                'user_id' => Auth::user()->id,
                'website_id' => $data['website_id'],
                'title' => $data['title'],
                'sub_title' => $data['sub_title'],
                'button_title' => $data['btn_title'],
                'button_url' => $data['button_url'],
                'image' => $image_path,
            ]);

            DB::commit();

            return redirect()->route('video.index')->with('success', 'Video created successfully!');
        } catch (\Exception $e) {
            DB::rollBack();

            return back()->with('error', value: 'Something went wrong: ' . $e->getMessage());
        }
    }

    private function generateUniqueFileName($file)
    {
        return uniqid(time() . '_') . '_' . $file->getClientOriginalName();
    }

    public function edit(Request $request, $id)
    {
        $website = $this->website;
        $website_active_id = $this->website_active_id['user_website_active'];

        $data = Video::where('user_id', Auth::user()->id)
            ->where('website_id', $website_active_id)
            ->first();

        if (!$data) {
            dd([
                'id' => $id,
                'user_id' => Auth::user()->id,
                "active_id" => $website_active_id
            ]);
        }


        return view('Backend.pages.video.edit', compact('data', 'website'));
    }


    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'website_id' => 'required|integer|exists:websites,id',
            'title' => 'required|string|max:255',
            'sub_title' => 'nullable|string|max:255',
            'btn_title' => 'nullable|string|max:255',
            'btn_url' => 'nullable|string|max:255',
            'image' => 'nullable|mimes:jpeg,png,jpg,webp',
        ]);


        DB::beginTransaction();

        try {

            $video = Video::findOrFail($id);

            $image_path = $video->image;

            if ($request->hasFile('image') && $request->file('image')->isValid()) {

                $image = $request->file('image');
                $filenameWithExtension = $this->generateUniqueFileName($image);
                $filenameWithWebP = pathinfo($filenameWithExtension, PATHINFO_FILENAME) . '.webp';

                $manager = new ImageManager(['driver' => 'gd']);
                $resizedImage = $manager->make($image->getRealPath())->resize(1920, 1080, function ($constraint) {
                    $constraint->aspectRatio();
                });

                $originalPath = public_path('uploads/video/images/');
                if (!file_exists($originalPath)) {
                    mkdir($originalPath, 0755, true);
                }

                if ($image_path && file_exists(public_path($image_path))) {
                    unlink(public_path($image_path));
                }

                $resizedImage->save($originalPath . $filenameWithWebP, env('IMAGE_QUALITY_SIZE', 90), 'webp');

                $image_path = 'uploads/video/images/' . $filenameWithWebP;
            }

            // if (!$image_path) {
            //     return back()->with('error', 'No image uploaded or image path is invalid.');
            // }

            $video->update([
                'user_id' => $data['user_id'],
                // 'website_id' => $data['website_id'],
                'title' => $data['title'],
                'sub_title' => $data['sub_title'],
                'button_title' => $data['btn_title'],
                'button_url' => $data['btn_url'],
                'image' => $image_path,
            ]);

            DB::commit();

            return redirect()->route('video.index')->with('success', 'Video updated successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();

        try {

            $product = Video::findOrFail($id);
            if ($product->image && file_exists(public_path($product->image))) {
                unlink(public_path($product->image));
            } else {
                Log::warning('Image not found for product ID: ' . $id);
            }

            $product->delete();

            DB::commit();

            return redirect()->route('video.index')->with('success', 'Video Image deleted successfully!');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->route('video.index')->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }
}
