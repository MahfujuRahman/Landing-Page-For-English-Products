@extends('Frontend.layouts.master')

@section('content')
    <main class="main">
        <!-- Contact Section -->
        <section id="order" class="contact mt-5 section overflow-visible">
            <!-- Section Title -->
            <div class="container section-title">
                <h2 class="bn">
                    অর্ডার বিবরণ
                </h2>
            </div><!-- End Section Title -->

            <div class="container">
                <div class="row gy-4 justify-content-center">

                    <div class="col-xl-7 col-lg-8">
                        <form action="/academic-materials-order" method="post" class="php-email-form product_item_wrapper">
                            @csrf

                            <div class="row">
                                <div class="col-12">
                                    <div id="cart-table-container" class="table-responsive">
                                        <table class="table text-nowrap bn cart_table table-bordered">
                                            <thead>
                                                <tr class="border-0">
                                                    <td class="border-0">
                                                        {{-- @php
                                                        $api_key = '0wopsbuo7d2oomu6kezflwaexenykbmj';
                                                        $secret_key = 'y1cdokbrjs9t3b6pkuz7b9wc';
                                                        $response = \Illuminate\Support\Facades\Http::withHeaders([
                                                            'Api-Key' => $api_key,
                                                            'Secret-Key' => $secret_key,
                                                            'Content-Type' => 'application/json',
                                                        ])->get('https://portal.packzy.com/api/v1/status_by_cid/'.$order->delivery_id);

                                                        $d_status = $response->json();
                                                    @endphp --}}
                                                        <h3>চালান</h3>
                                                        <p>
                                                            অর্ডার #{{ $order->slug }} <br />
                                                            অর্ডার ট্রাক : {{ $order->delivery_id ?? '' }} <br />
                                                            অর্ডার স্ট্যাটাস : {{ $d_status['delivery_status'] ?? '' }}
                                                            <br />
                                                        </p>
                                                    </td>
                                                    <td colspan="2" class="text-end border-0">
                                                        <b>তারিখ:
                                                            {{ Carbon\Carbon::parse($order->created_at)->format('d M, Y') }}</b>
                                                        <p class="bn">
                                                            সুপার বি - অনলাইন ইকমার্স শপিং
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr class="border-0">
                                                    <td class="border-0">
                                                        <b>Bill To:</b>
                                                        <div class="bn">
                                                            <div>{{ $order->full_name }}</div>
                                                            <div>{{ $order->phone_number }}</div>
                                                            <div class="text-wrap">{{ $order->address }}</div>
                                                        </div>
                                                    </td>
                                                    <td colspan="2" class="text-end align-top border-0">
                                                        <b>পেমেন্ট পদ্ধতি:</b>
                                                        <div>
                                                            ক্যাশ অন ডেলিভারি
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>প্রোডাক্ট</th>
                                                    <th>পরিমাণ</th>
                                                    <th>দাম</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($products as $item)
                                                    <tr>
                                                        <td>
                                                            {{ $item->name }}
                                                        </td>
                                                        <td>
                                                            {{ \App\Helpers\ConvertHelper::convertToBanglaNumbers($item->qty) }}
                                                            *
                                                            {{ \App\Helpers\ConvertHelper::convertToBanglaNumbers($item->price) }}৳
                                                        </td>
                                                        <td>
                                                            {{ \App\Helpers\ConvertHelper::convertToBanglaNumbers($item->price * $item->qty) }}
                                                            ৳
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="2" class="text-end">
                                                        সাবটোটাল
                                                    </td>
                                                    <td> {{ \App\Helpers\ConvertHelper::convertToBanglaNumbers($order->order_total) }}৳
                                                    </td>
                                                </tr>
                                                {{-- <tr>
                                                    <td colspan="2" class="text-end">
                                                        ছাড়
                                                    </td>
                                                    <td>- {{ $order->global_discount }} ৳</td>
                                                </tr> --}}
                                                {{-- <tr>
                                                    <td colspan="2" class="text-end">
                                                        Coupon Discount
                                                    </td>
                                                    <td>- {{ $order->coupon_discount }} ৳</td>
                                                </tr> --}}
                                                <tr>
                                                    <td colspan="2" class="text-end">
                                                        শিপিং চার্জ
                                                    </td>
                                                    <td>+
                                                        {{ \App\Helpers\ConvertHelper::convertToBanglaNumbers($order->shipping_charge) }}
                                                        ৳</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" class="text-end">
                                                        <b> সর্বমোট মূল্য </b>
                                                    </td>
                                                    <td><b>{{ \App\Helpers\ConvertHelper::convertToBanglaNumbers($order->grand_total) }}
                                                            ৳</b></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div><!-- End Contact Form -->
                </div>
            </div>
        </section><!-- /Contact Section -->
    </main>
@endsection
