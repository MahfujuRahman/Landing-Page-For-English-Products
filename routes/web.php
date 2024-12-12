<?php

use App\Models\Home\Video;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\About\AboutController;
use App\Http\Controllers\Backend\Video\VideoController;
use App\Http\Controllers\Backend\Banner\BannerController;
use App\Http\Controllers\Backend\Product\ProductController;
use App\Http\Controllers\Backend\Order\Order\OrderController;
use App\Http\Controllers\Backend\Order\Coupon\CouponController;
use App\Http\Controllers\Backend\Order\Setting\SettingController;
use App\Http\Controllers\Backend\ImageGallery\ImageGalleryController;
use App\Http\Controllers\Backend\Order\GlobalDiscount\GlobalDiscountController;
use App\Http\Controllers\Backend\Website\WebsiteController;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

Auth::routes();

//Backend
Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('banners', BannerController::class);
    Route::resource('about', AboutController::class);
    Route::resource('image-gallery', ImageGalleryController::class);
    Route::resource('product', ProductController::class);
    Route::resource('global-discounts', GlobalDiscountController::class);
    Route::resource('coupons', CouponController::class);
    Route::resource('video', VideoController::class);
    Route::resource('order', OrderController::class);

    Route::get('setting', [SettingController::class, 'index'])->name('setting');
    Route::get('setting/{slug}', [SettingController::class, 'fetchData'])->name('setting.fetch');
    Route::post('setting/{slug}', [SettingController::class, 'postData'])->name('setting.update');

    Route::resource('website', WebsiteController::class);
});

//Frontend
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/academic-materials-order', [HomeController::class, 'save_order'])->name('save_order');
Route::get('/invoice/{slug}', [HomeController::class, 'invoice'])->name('invoice');

Route::get('/set-visitor', function () {
    $clientIP = request()->ip();
    $lat = request()->lat;
    $lon = request()->lon;

    try {
        if (!$lat || !$lon) throw new Exception("lat lon missing", 500);

        $response = file_get_contents("https://api.opencagedata.com/geocode/v1/json?q=$lat%2C+$lon&pretty=1&no_annotations=1&key=200328b26fae49028bb62c851a78526a");
        $parse_data = json_decode($response, true);

        $result = $parse_data['results'][0]['components'];
        $city = $result['city'] ?? null;
        $region = $result['state_district'] ?? null;
        $country = $result['country'] ?? null;
        $location = $result['suburb'] ?? null;
        $org = $result['municipality'] ?? null;
        $postal = $result['postcode'] ?? null;
        $timezone = ($result['continent'] ?? 'Asia') . '/' . 'Dhaka';
    } catch (\Throwable $th) {

        $response = file_get_contents('https://ipinfo.io/json');
        $parse_data = json_decode($response, true);

        $city = $parse_data['city'];
        $region = $parse_data['region'];
        $country = $parse_data['country'];
        $location = $parse_data['loc'];
        $org = $parse_data['org'];
        $postal = $parse_data['postal'];
        $timezone = $parse_data['timezone'];
    }

    $ip = $clientIP;
    $url = request()->headers->get('referer');

    $check = DB::table('order_visitors')->where('ip', $ip)
        ->whereDate('date', Carbon::now()->toDateString())
        ->where('url', $url)
        ->orderBy('id', 'DESC')->first();

    $data = [
        'ip' => $ip,
        'lat' => $lat,
        'lon' => $lon,
        'url' => $url,
        'city' => $city,
        'region' => $region,
        'country' => $country,
        'ip_location' => $location,
        'org' => $org,
        'postal' => $postal,
        'timezone' => $timezone,
    ];

    if (!$check) {
        DB::table('order_visitors')->insert($data);
    } else {
        $data['count'] = $check->count + 1;
        DB::table('order_visitors')
            ->where('ip', $ip)
            ->whereDate('date', Carbon::now()->toDateString())
            ->update($data);
    }

    return $data;
});

Route::get('/get-sales-report', function () {
    $last7Days = DB::table('order_visitors')
        ->selectRaw('DATE(date) as day, COUNT(*) as visitors, SUM(buy) as buys')
        ->groupByRaw('DATE(date)')
        ->orderByRaw('DATE(date) DESC')
        ->limit(7)
        ->get();

    $mostVisitedRegion = DB::table('order_visitors')
        ->select('region', DB::raw('COUNT(*) as count'))
        ->groupBy('region')
        ->orderByDesc('count')
        ->first();
    
    $mostVisitedCity = DB::table('order_visitors')
        ->select('city', DB::raw('COUNT(*) as count'))
        ->groupBy('city')
        ->orderByDesc('count')
        ->first();

    $topUrls = DB::table('order_visitors')
        ->select('url', DB::raw('COUNT(*) as count'))
        ->groupBy('url')
        ->orderByDesc('count')
        ->limit(5)
        ->get();

    $mostVisitedDate = DB::table('order_visitors')
        ->selectRaw('DATE(date) as day, COUNT(*) as visitors')
        ->groupByRaw('DATE(date)')
        ->orderByDesc('visitors')
        ->first();

    return response()->json([
        'unique_visitors' => DB::table('order_visitors')->distinct('ip')->count('ip'),
        'total_sales' => DB::table('order_visitors')->where('buy', '>', 0)->count(),
        'repetitive_visitors' => DB::table('order_visitors')
            ->select('ip')
            ->groupBy('ip')
            ->havingRaw('COUNT(ip) > 1')
            ->count(),
        'most_visited_region' => ($mostVisitedRegion->region ?? 'dhaka').' - '.($mostVisitedRegion->count ?? 0),
        'most_visited_city' => ($mostVisitedCity->city ?? 'dhaka').' - '.($mostVisitedCity->count ?? 0),
        'last_7_days' => $last7Days,
        'visitor_buy_ratio' => DB::table('order_visitors')->count() > 0
            ? round(DB::table('order_visitors')->where('buy', '>', 0)->count() / DB::table('order_visitors')->count(), 2)
            : 0,
        'top_visited_urls' => $topUrls,
        'most_visited_date' => [
            'day' => $mostVisitedDate->day ?? null,
            'visitors' => $mostVisitedDate->visitors ?? 0,
        ],
    ]);
});

Route::get('/{site_url}', [HomeController::class, 'index']);

Route::fallback(function () {
    return response()->view('404', [], 404);
});
