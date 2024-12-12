@extends('Backend.layouts.master')

@section('content')
    <main class="app-main">
        {{-- <div class="container my-5">
            <h2>Order Details</h2>
            <div class="card shadow-sm">
                <div class="card-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>Full Name</th>
                                <td>{{ $data->full_name ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Phone Number</th>
                                <td>{{ $data->phone_number ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>{{ $data->address ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Order Total</th>
                                <td>{{ number_format($data->order_total, 2) ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Global Discount Amount</th>
                                <td>{{ number_format($data->global_discount_amount, 2) ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Global Discount (%)</th>
                                <td>{{ $data->global_discount ?? 'N/A' }}%</td>
                            </tr>
                            <tr>
                                <th>Coupon</th>
                                <td>{{ $data->coupon ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Coupon Discount Amount</th>
                                <td>{{ number_format($data->coupon_discount_amount, 2) ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Coupon Discount (%)</th>
                                <td>{{ $data->coupon_discount ?? 'N/A' }}%</td>
                            </tr>
                            <tr>
                                <th>Shipping Area</th>
                                <td>{{ $data->shipping_area ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Shipping Charge</th>
                                <td>{{ number_format($data->shipping_charge, 2) ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Grand Total</th>
                                <td>{{ number_format($data->grand_total, 2) ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Product Details</th>
                                <td>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Product id</th>
                                                <th>Name</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($product as $item)
                                                <tr>
                                                    <td>{{ $item->id }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ number_format($item->price, 2) }}</td>
                                                    <td>{{ number_format($item->qty, 2) }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <th>Delivery Status</th>
                                <td>
                                    <form action="{{ route('order.update', $data->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PUT')
                                        <select name="delivery_status" class="form-select" style="width: auto;" onchange="this.form.submit()">
                                            <option value="pending" {{ $data->delivery_status === 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="accepted" {{ $data->delivery_status === 'accepted' ? 'selected' : '' }}>Accepted</option>
                                            <option value="rejected" {{ $data->delivery_status === 'rejected' ? 'selected' : '' }}>Rejected</option>
                                            <option value="delivered" {{ $data->delivery_status === 'delivered' ? 'selected' : '' }}>Delivered</option>
                                        </select>
                                    </form>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div> --}}

        <div class="container my-5">
            <section id="order" class="contact section overflow-visible">
                <!-- Section Title -->
                <div class="container section-title">
                    <h2 class="bn text-center">
                        Order Details
                    </h2>
                </div><!-- End Section Title -->

                <div class="container">
                    <div class="row gy-4 justify-content-center">

                        <div class="col-xl-7 col-lg-8">
                            <form action="/academic-materials-order" method="post"
                                class="php-email-form product_item_wrapper">
                                @csrf

                                <div class="row">
                                    <div class="col-12">
                                        <div id="cart-table-container" class="table-responsive bg-white p-3">
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
                                                            <h3>INVOICE</h3>
                                                            <p>
                                                                Order #{{ $data->id }} <br/>
                                                                Order track : {{ $data->delivery_id ?? '' }}  <br/>
                                                                Order status : {{ $d_status["delivery_status"] ?? '' }} <br/>
                                                            </p>
                                                        </td>
                                                        <td colspan="2" class="text-end border-0">
                                                            <b>Date: {{ Carbon\Carbon::parse($data->created_at)->format('d M, Y') }}</b>
                                                            <p class="bn">
                                                                মেরিট কেয়ার একাডেমি এন্ড পাবলিকেশন্স
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr class="border-0">
                                                        <td class="border-0">
                                                            <b>Bill To:</b>
                                                            <div class="bn">
                                                                <div>{{$data->full_name}}</div>
                                                                <div>{{$data->phone_number}}</div>
                                                                <div class="text-wrap">{{$data->address}}</div>
                                                            </div>
                                                        </td>
                                                        <td colspan="2" class="text-end align-top border-0">
                                                            <b>Payment Method:</b>
                                                            <div>
                                                                Cash on Delivery
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>পণ্য</th>
                                                        <th class="table_cell_width_200">পরিমাণ</th>
                                                        <th class="table_cell_width_200">মূল্য</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($product as $item)
                                                        <tr>
                                                            <td>
                                                                {{$item->name}}
                                                            </td>
                                                            <td class="table_cell_width_200">
                                                                {{$item->qty}} *
                                                                {{$item->price}} ৳
                                                            </td>
                                                            <td class="text_align_right">
                                                                {{$item->price * $item->qty}} ৳
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td colspan="2" class="text-end">
                                                            মোট মূল্য
                                                        </td>
                                                        <td class="text_align_right"> {{$data->order_total}} ৳</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" class="text-end">
                                                            ছাড়
                                                        </td>
                                                        <td class="text_align_right">-  {{$data->global_discount}} ৳</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" class="text-end">
                                                            Coupon Discount
                                                        </td>
                                                        <td class="text_align_right">- {{$data->coupon_discount}} ৳</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" class="text-end">
                                                            Shipping Charge
                                                        </td>
                                                        <td class="text_align_right">+ {{$data->shipping_charge}} ৳</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" class="text-end">
                                                            <b> সর্বমোট মূল্য </b>
                                                        </td>
                                                        <td class="text_align_right"><b>{{$data->grand_total}} ৳</b></td>
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
        </div>
    </main>
@endsection
