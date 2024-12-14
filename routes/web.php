<?php

use Carbon\Carbon;
use App\Models\Home\Video;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\SelectedWebsite;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\About\AboutController;
use App\Http\Controllers\Backend\RelatedDataController;
use App\Http\Controllers\Backend\Video\VideoController;
use App\Http\Controllers\Backend\Banner\BannerController;
use App\Http\Controllers\Backend\Website\SalesController;
use App\Http\Controllers\Backend\Product\ProductController;
use App\Http\Controllers\Backend\Website\VisitorController;
use App\Http\Controllers\Backend\Website\WebsiteController;
use App\Http\Controllers\Backend\Order\Order\OrderController;
use App\Http\Controllers\Backend\Order\Coupon\CouponController;
use App\Http\Controllers\Backend\Order\Setting\SettingController;
use App\Http\Controllers\Backend\ImageGallery\ImageGalleryController;
use App\Http\Controllers\Backend\Order\Courier\CourierInfoController;
use App\Http\Controllers\Backend\Order\SaveOrder\SaveOrderController;
use App\Http\Controllers\Backend\Order\SmsGateWay\SmsGatewayController;
use App\Http\Controllers\Backend\Order\GlobalDiscount\GlobalDiscountController;

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
    Route::resource('sms-gateway', SmsGatewayController::class);
    Route::resource('courier', CourierInfoController::class);
    Route::resource('website', WebsiteController::class);

    Route::get('setting', [SettingController::class, 'index'])->name('setting');
    Route::get('setting/{slug}', [SettingController::class, 'fetchData'])->name('setting.fetch');
    Route::post('setting/{slug}', [SettingController::class, 'postData'])->name('setting.update');

    Route::get('/set-selected-site/{website_id}', [SelectedWebsite::class, 'storeSelectedWebsite'])->name('set.selectedSite');
});

//Frontend
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/academic-materials-order', [SaveOrderController::class, 'save_order'])->name('save_order');
Route::get('/invoice/{slug}', [HomeController::class, 'invoice'])->name('invoice');

Route::get('/set-visitor', [VisitorController::class, 'index']);
Route::get('/get-sales-report', [SalesController::class, 'index']);

Route::get('/{site_url}', [HomeController::class, 'index']);

Route::fallback(function () {
    return response()->view('404', [], 404);
});
