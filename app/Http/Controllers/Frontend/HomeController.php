<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\Home\About;
use App\Models\Home\Video;
use App\Models\Home\Banner;
use App\Models\Home\Product;
use App\Models\Order\Setting;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Order\GlobalDiscount;
use App\Models\Home\ImageGalleryTitle;
use App\Models\Website;

class HomeController extends Controller
{
    public $global_discount = 0;
    public $global_discount_start_time = 0;
    public $global_discount_end_time = 0;
    public $global_discount_title = 0;
    public $website = null;

    public $validCoupons = [
        "SAVE10" => 0,
        "SAVE20" => 0,
    ];
    public $shipping_cost = [
        "inside" => 50,
        "outside" => 90,
    ];

    public function __construct()
    {
        $website = Website::where('is_default', 1)->first();

        $site_url = request()->route()->parameterNames()[0] ?? '';
        if ($site_url == 'site_url') {
            $website_url = request()->segments()[0];
            $website = Website::where('site_url', $website_url)->first();
        }

        $this->website = $website;

        $global_discount = GlobalDiscount::whereDate('end_datetime', ">=", Carbon::now()->toDateTimeString())
            ->where('website_id', $website->id)
            ->whereDate("start_datetime", "<=", Carbon::now()->toDateTimeString())
            ->orderBy('id')->first();

        if ($global_discount) {
            $this->global_discount = $global_discount->discount;
            $this->global_discount_start_time = $global_discount->start_datetime;
            $this->global_discount_end_time = $global_discount->end_datetime;
            $this->global_discount_title = $global_discount->title;
        }

        $inside = Setting::where('title', 'inside Dhaka')->where('website_id', $website->id)->select('value')->first();
        $outside = Setting::where('title', 'outside Dhaka')->where('website_id', $website->id)->select('value')->first();

        if ($inside) {
            try {
                preg_match('/<p>(\d+)<\/p>/', $inside, $matches);
                $this->shipping_cost['inside'] = $matches[0];
            } catch (\Throwable $th) {
            }
        }

        if ($outside) {
            try {
                preg_match('/<p>(\d+)<\/p>/', $outside, $matches);
                $this->shipping_cost['outside'] = $matches[0];
            } catch (\Throwable $th) {
            }
        }
    }

    public function index()
    {
        $website = $this->website;

        $banner = Banner::with('images')->where('website_id', $website->id)->orderBy('id')->first();
        $about = About::orderBy('id')->where('website_id', $website->id)->first();
        $image_gallery = ImageGalleryTitle::with('images')->where('website_id', $website->id)->orderBy('id')->first();
        $product_items = Product::orderBy('id')->where('website_id', $website->id)->get();
        $video = Video::where('website_id', $website->id)->first();

        $global_discount_details = [
            "start_time" => $this->global_discount_start_time,
            "end_time" => $this->global_discount_end_time,
            "title" => $this->global_discount_title,
        ];

        return view(
            "Frontend.home.home",
            [
                "banner" => $banner,
                "about" => $about,
                "image_gallery" => $image_gallery,
                "product_items" => $product_items,
                "shipping_cost" => $this->shipping_cost,
                "global_discount" => $this->global_discount,
                "global_discount_details" => $global_discount_details,
                "video" => $video,
            ]
        );
    }

    public function invoice($slug)
    {
        try {
            $order = DB::table('order_sheets')->where('slug', $slug)->first();
        } catch (\Throwable $th) {
            $order = session()->get('order');
        }
        $products = json_decode($order->product_details);
        return view('Frontend.order.order', [
            'order' => $order,
            'products' => $products,
        ]);
    }
}
