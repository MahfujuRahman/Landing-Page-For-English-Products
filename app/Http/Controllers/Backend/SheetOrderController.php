<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class SheetOrderController extends Controller
{

    public $product_items = [
        [
            "id" => 1,
            "name" => "বিজ্ঞান বিভাগ",
            "price" => 1395,
            "image" => "fcommerce/products/science.jpg",
        ],
        [
            "id" => 2,
            "name" => "ব্যবসায় শিক্ষা বিভাগ",
            "price" => 1080,
            "image" => "fcommerce/products/commerce.jpg",
        ],
        [
            "id" => 3,
            "name" => "মানবিক বিভাগ",
            "price" => 1000,
            "image" => "fcommerce/products/arts.jpg",
        ],
    ];

    public $global_discount = 0;

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
        $this->global_discount = Carbon::now() < '2024-11-30' ? 10 : 0;
    }

    public function form()
    {
        return view('products', [
            'product_items' => $this->product_items,
            'global_discount' => $this->global_discount,
            'shipping_cost' => $this->shipping_cost,
        ]);
    }

    public function invoice($slug)
    {
        try {
            $order = DB::table('order_sheets')->where('slug', $slug)->first();
        } catch (\Throwable $th) {
            $order = session()->get('order');
        }
        $products = json_decode($order->product_details);
        return view('product_invoice', [
            'order' => $order,
            'products' => $products,
        ]);
    }

    public function save_order()
    {
        $data = request()->all();
        $cart = $data['cart'];
        $couponCode = $data['couponCode'];
        $address = $this->formatAddress($data);

        $shipping_area = $data['shipping_area'];
        $shipping_charge = $this->shipping_cost[$shipping_area] ?? 90;

        $productDetails = [];
        $orderTotal = 0;
        $couponDiscount = 0;
        $total_qty = 0;

        foreach ($cart as $cartItem) {
            foreach ($this->product_items as $product) {
                if ($product['id'] == $cartItem['id']) {
                    $orderTotal += ($product['price'] * $cartItem['qty']);
                    $total_qty += $cartItem['qty'];

                    $productDetails[] = [
                        'id' => $product['id'],
                        'name' => $product['name'],
                        'price' => $product['price'],
                        'qty' => $cartItem['qty'],
                    ];
                    break;
                }
            }
        }

        $globalDiscountAmount = ($this->global_discount / 100) * $orderTotal;
        $coupon_discount_amount = 0;
        if ($couponCode && isset($this->validCoupons[$couponCode])) {
            $coupon_discount_amount = $this->validCoupons[$couponCode];
            $couponDiscount = ($this->validCoupons[$couponCode] / 100) * $orderTotal;
        }

        // $shipping_charge = $total_qty * $shipping_charge;
        $shipping_charge = $this->calc_shipping($total_qty, $shipping_area);

        $grandTotal = $orderTotal - $globalDiscountAmount - $couponDiscount + $shipping_charge;
        $slug = Str::slug('MC') . '-' . now()->format('dmyHis');
        $insertedId = '';

        $table_data =  [
            'full_name' => $data['full_name'],
            'phone_number' => $data['phone_number'],
            'address' => $address,
            'order_total' => $orderTotal,

            'global_discount_amount' => $this->global_discount,
            'global_discount' => $globalDiscountAmount,

            'coupon' => $data['couponCode'],
            'coupon_discount_amount' => $coupon_discount_amount,
            'coupon_discount' => $couponDiscount,

            'shipping_area' => $shipping_area,
            'shipping_charge' => $shipping_charge,
            'grand_total' => $grandTotal,

            'product_details' => json_encode($productDetails),

            'slug' => $slug,
            'created_at' => now()->format('Y-m-d H:i:s'),
        ];


        try {

            $insertedId = DB::table('order_sheets')->insertGetId($table_data);
            $slug .= $insertedId;
            DB::table('order_sheets')
                ->where('id', $insertedId)
                ->update(['slug' => $slug]);

        } catch (\Throwable $th) {
            // return $th->getMessage();
        }


        $delivery_data = [
            'invoice' => $slug,
            'recipient_name' => $table_data["full_name"],
            'recipient_address' => $table_data["address"],
            'recipient_phone' => $table_data["phone_number"],
            // 'cod_amount' => $grandTotal - $shipping_charge,
            'cod_amount' => $grandTotal,
            'note' => "sheet order",
        ];


        try{
            $delivery_info = $this->delivery($delivery_data);
            $delivery_id = $delivery_info->consignment->consignment_id;

            DB::table('order_sheets')
                ->where('id', $insertedId)
                ->update([
                    'delivery_id' => $delivery_id,
                    'delivery_details' => json_encode($delivery_info),
                ]);

        } catch (\Throwable $th){

            // return $th->getMessage();

        }

        try{
            $sms_res = $this->sendSms($table_data["phone_number"], $slug);

            DB::table('order_sheets')
                ->where('id', $insertedId)
                ->update([
                    'sms_status' => $sms_res->response_code,
                    'sms_details' => json_encode($sms_res),
                ]);
        } catch (\Throwable $th){

        }

        try{
            $this->sendMessage($insertedId);
        } catch (\Throwable $th){

        }

        try{
            $ip = \Request::getClientIp(true);
            $check = DB::table('order_visitors')->where('ip', $ip)->whereDate('date', Carbon::now()->toDateString())->first();
            if(!$check){
                DB::table('order_visitors')->insert([
                    'ip' => $ip,
                    'buy' => 1,
                ]);
            }else{
                DB::table('order_visitors')
                    ->where('ip', $ip)
                    ->whereDate('date', Carbon::now()->toDateString())
                    ->update([
                        'ip' => $ip,
                        'buy' => $check->buy + 1 ?? 1,
                    ]);
            }
        } catch (\Throwable $th){

        }

        session()->put('order', (object) $table_data);
        return redirect('/sheets/invoice/' . $slug);
    }

    public function calc_shipping($quantity, $location) {
        if (!in_array($location, ['inside', 'outside'])) {
            throw new InvalidArgumentException("Invalid location. Choose 'inside' or 'outside'.");
        }

        $additionalKgCost = 20;

        $costPerUnit = ($location === 'inside') ? $this->shipping_cost["inside"] + $additionalKgCost : $this->shipping_cost["outside"] + $additionalKgCost;

        $firstKgCost = ($location === 'inside') ? $this->shipping_cost["inside"] : $this->shipping_cost["outside"];

        $totalWeight = $quantity * 2;

        $shippingCost = $firstKgCost;
        if ($totalWeight > 1) {
            $shippingCost += ($totalWeight - 1) * $additionalKgCost;
        }

        return $shippingCost;
    }

    public function delivery(array $data)
    {
        $api_key = '0wopsbuo7d2oomu6kezflwaexenykbmj';
        $secret_key = 'y1cdokbrjs9t3b6pkuz7b9wc';

        $response = Http::withHeaders([
            'Api-Key' => $api_key,
            'Secret-Key' => $secret_key,
            'Content-Type' => 'application/json',
        ])->post('https://portal.packzy.com/api/v1/create_order', $data);

        return json_decode($response->body());
    }

    public function sendSms($number, $invoiceId)
    {
        // Ensure the number starts with the country code (880)
        if (!str_starts_with($number, '880')) {
            $number = '880' . ltrim($number, '0'); // Add country code and remove leading '0' if exists
        }

        // Prefix message and dynamic invoice link
        $prefixMessage = 'Thanks for your meritcare sheet order, check your invoice';
        $invoiceLink = "https://meritcareacademy.com/sheets/invoice/{$invoiceId}";
        $message = "{$prefixMessage} {$invoiceLink}";

        // SMS API credentials and parameters
        $api_key = 'Q7oadHu0oeABlUB9GTRY';
        $sender_id = '8809617621351';
        $url = 'https://bulksmsbd.net/api/smsapi';

        // Prepare the API request
        $response = Http::get($url, [
            'api_key' => $api_key,
            'type' => 'text',
            'number' => $number,
            'senderid' => $sender_id,
            'message' => $message,
        ]);

        // Parse and return the response
        return json_decode($response->body());
    }

    private function formatAddress()
    {
        $data = request()->all();
        return "{$data['address']}, {$data['upazila_name']}, {$data['zila_name']}";
    }

    public function sendMessage($order_id)
    {

        $order = DB::table('order_sheets')->where('id', $order_id)->first();
        $order_details = json_decode($order->product_details);
        $ip = \Request::getClientIp(true);

        $text = "আসসালামু আলাইকুম ওয়ারহমাতুল্লাহ। \n";
        $text .= "নতুন অর্ডার এসেছে \n";
        $text .= "অর্ডার এর সময়:  ".\Carbon\Carbon::now()->format('d M Y, D, h:i a')."  \n";
        $text .= "IP:  ".$ip."  \n";
        $text .= "অর্ডার এর বিবরণ \n";

        $subtotal = 0;
        $shipping_charge = $order->shipping_charge;
        $coupon = $order->coupon;
        $coupon_discount = $order->coupon_discount_amount;
        $discount = $order->global_discount;

        $text .= "-------------------  \n";
        foreach($order_details as $key=>$item){
            $no = $key + 1;
            $price = $item->price;
            $qty = $item->qty;
            $p_total = $price * $qty;

            $text .= "$no. ".$item->name." -    \n";
            $text .= "\t ৳ $price x $qty = ৳ $p_total    \n";

            $subtotal += $p_total;
        }

        $grand_total = $subtotal + $shipping_charge - $discount;
        $full_name = $order->full_name;
        $phone_number = $order->phone_number;
        $address = $order->address;

        $text .= "-------------------  \n";

        $text .= "সাবটোটাল - ৳ $subtotal  \n";
        $text .= "Coupon - $coupon  \n";
        $text .= "Coupon discount =  ৳ $coupon_discount    \n";
        $text .= "Discount = ৳ $discount    \n \n";

        $after_discount = $subtotal - $coupon_discount - $discount;
        $text .= "After Discount = ৳ $after_discount    \n\n";

        $text .= "ডেলিভারি চার্জ - ৳ $shipping_charge   \n";
        $text .= "সর্বমোট মূল্য - ৳ $grand_total     \n";

        $text .= "-------------------\n";
        $text .= "অর্ডারকারীর বিবরণ \n";
        $text .= "নাম : $full_name \n";
        $text .= "মোবাইল নাম্বার : $phone_number \n";
        $text .= "ঠিকানা : $address \n";
        $text .= "-------------------  \n";

        $text .= "বিস্তারিত  \n";
        $text .= url('/sheets/invoice/' . $order->slug);


        $users = (object) [
            "murad" => '974700296', // murad hossain
            "shefat" => '7320473939', // shefat
            "suhail" => '5350808597', // suhail
            "abdullah" => '5695580228', // abdullah
            "sazeeb" => '623121647', // abdullah
            "saifullah" => '1815018896', // Saifullah
        ];

        $botToken = '7850150301:AAEsuYvyLk8XcEdR00C98suzw1QEQXZ784I';

        foreach($users as $name=>$item){
            Http::post("https://api.telegram.org/bot{$botToken}/sendMessage", [
                'chat_id' => $item,
                'text' => $text,
            ]);
        }

    }
}