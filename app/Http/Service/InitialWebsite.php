<?php

namespace App\Http\Service;

use Illuminate\Http\Request;
use App\Http\Service\actions\about;
use App\Http\Service\actions\video;
use App\Http\Service\actions\banner;
use App\Http\Service\actions\coupon;
use App\Http\Service\actions\globalDiscount;
use App\Http\Service\actions\product;
use App\Http\Service\actions\imageGallery;
use App\Http\Service\actions\order;
use App\Http\Service\actions\setting;

class InitialWebsite
{

    public function __construct($website_id)
    {
        $this->createWebsite($website_id);
    }

    public function createWebsite($id)
    {
        $this->init_banner($id);
        $this->init_video($id);
        $this->init_about($id);
        $this->init_imageGallery($id);
        $this->init_product($id);
        $this->init_order($id);
        $this->init_global_discount($id);
        $this->init_coupon($id);
        $this->init_setting($id);
    }

    public function init_banner($id)
    {
        $banner = new banner();
        $banner->execute($id);
    }
    public function init_video($id)
    {
        $video = new video();
        $video->execute($id);
    }
    public function init_about($id)
    {
        $about = new about();
        $about->execute($id);
    }
    public function init_imageGallery($id)
    {
        $image = new imageGallery();
        $image->execute($id);
    }
    public function init_product($id)
    {
        $product = new product();
        $product->execute($id);
    }
    public function init_order($id)
    {
        $order = new order();
        $order->execute($id);
    }
    public function init_global_discount($id)
    {
        $discount = new globalDiscount();
        $discount->execute($id);
    }
    public function init_coupon($id)
    {
        $coupon = new coupon();
        $coupon->execute($id);
    }
    public function init_setting($id)
    {
        $setiing = new setting();
        $setiing->execute($id);
    }
}
