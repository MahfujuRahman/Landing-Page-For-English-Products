<!-- Contact Section -->
<section id="order" class="contact section overflow-visible">

    <!-- Section Title -->
    <div class="container section-title">
        <h2 class="bn">
            অর্ডার ফর্ম
        </h2>
        <p class="bn">
            সুপার্ব হল স্টাইলিশ এবং মার্জিত পোশাকের জন্য একটি শীর্ষস্থানীয় গন্তব্য যা আভিজাত্য প্রকাশ করে।
        </p>
    </div><!-- End Section Title -->

    <div class="container">
        <div class="row gy-4 justify-content-center">

            <div class="col-lg-7">
                <p class="bn text-center">
                    <b>
                        জরুরি যোগাযোগ:
                        <a href="tel:+8809606990177" class="text-primary">
                            {{ \App\Helpers\ConvertHelper::convertToBanglaNumbers(8809606990177) }}৳
                        </a>
                    </b>
                </p>
                <form action="/academic-materials-order"
                    onsubmit="document.querySelector('body').insertAdjacentHTML('beforeend',`<div id='preloader'></div>`)"
                    method="post" class="php-email-form product_item_wrapper">
                    @csrf

                    <div class="row gy-4">
                        <div class="col-12">
                            <p class="bn">
                                প্রোডাক্ট বাছাই করুন
                            </p>
                        </div>

                        <script>
                            let site_product_items = @json($product_items);
                            let global_discount = +`{{ $global_discount }}`;
                            let shipping_cost = @json($shipping_cost);
                        </script>

                        @foreach ($product_items as $key => $item)
                            <div class="col-md-12">
                                <div class="border rounded-2 p-2">
                                    <div
                                        class="d-flex product_item_parent flex-wrap align-items-end align-content-center gap-4">

                                        <div class="flex-grow-1">
                                            <div class="mb-3">
                                                <label for="p{{ $item['id'] }}" class="bn">
                                                    <input onchange="add_to_cart({{ $item['id'] }})"
                                                        id="p{{ $item['id'] }}" value="{{ $item['id'] }}"
                                                        type="checkbox" class="form-check-input border-secondary">
                                                    <span class="btn btn-sm btn-outline-secondary">
                                                        কার্টে যোগ করুন
                                                    </span>
                                                </label>
                                            </div>
                                            <div
                                                class="flex-grow d-flex flex-wrap align-items-center align-content-center gap-4">
                                                <div>
                                                    <img style="max-width: 80px;" class="rounded-2"
                                                        src="/{{ $item['image'] }}" alt="">
                                                </div>
                                                <div>
                                                    <h4 class="bn product_name">
                                                        {{ $item['name'] }}
                                                    </h4>
                                                    <div>
                                                        <b class="me-3 mr-3">
                                                            {{ \App\Helpers\ConvertHelper::convertToBanglaNumbers(number_format($item['price'])) }}
                                                            </th>৳
                                                        </b>
                                                        <del>
                                                            {{ \App\Helpers\ConvertHelper::convertToBanglaNumbers(number_format($item['discount_price'])) }}৳
                                                        </del>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div style="width: 250px;max-width: 250px;"
                                            class="d-flex flex-wrap flex-grow-1 align-items-center gap-2 justify-content-between">
                                            <div class="d-inline-flex" style="max-width: 141px;">
                                                <button type="button" onclick="setItem('decrement', this)"
                                                    class="btn btn-sm btn-secondary rounded-0">
                                                    <i class="bi bi-dash"></i>
                                                </button>
                                                <input type="number" onkeyup="setItem('set', this)"
                                                    data-id="{{ $item['id'] }}" data-price="{{ $item['price'] }}"
                                                    style="max-width: 100px;" class="text-center form-control"
                                                    value="1" min="1">
                                                <button type="button" onclick="setItem('increment', this)"
                                                    class="btn btn-sm btn-secondary rounded-0">
                                                    <i class="bi bi-plus"></i>
                                                </button>
                                            </div>
                                            <div class="flex-grow text-end">
                                                <b>
                                                    <span class="cart-item-total">
                                                        {{ \App\Helpers\ConvertHelper::convertToBanglaNumbers(number_format($item['price'])) }}
                                                    </span> ৳
                                                </b>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="row gy-4 mt-4 submission_form">
                        <div class="col-md-6">
                            <label for="full_name" class="pb-2 bangla-font">
                                🖊️ সম্পূর্ণ নাম
                            </label>
                            <input type="text" class="form-control" name="full_name" id="full_name" required="">
                        </div>

                        <div class="col-md-6">
                            <label for="phone_number-field" class="pb-2 bangla-font">
                                📱 সচল মোবাইল নাম্বার
                            </label>
                            <input type="text" class="form-control" name="phone_number" id="phone_number-field"
                                required="">
                        </div>

                        <div class="col-md-6">
                            <label for="district_el" class="pb-2 bangla-font">
                                🏙️ জেলার নাম
                            </label>
                            <select name="zila" onchange="set_upazila(this.value)" class="form-select"
                                id="district_el">
                                <option value="">-- Select district --</option>
                            </select>
                            <input type="hidden" name="zila_name">
                        </div>

                        <div class="col-md-6">
                            <label for="upazila_el" class="pb-2 bangla-font">
                                🌍 উপজেলার নাম
                            </label>
                            <select name="upazila" onchange="set_upazila_name(this.value)" class="form-select"
                                id="upazila_el">
                                <option value="">-- Select upazila --</option>
                            </select>
                            <input type="hidden" name="upazila_name">
                        </div>

                        <div class="col-md-12">
                            <label for="address-field" class="pb-2 bangla-font">
                                📦 ডেলিভারি ঠিকানা
                            </label>
                            <textarea class="form-control" name="address" id="address-field" required=""></textarea>
                        </div>

                        <div class="col-12 d-none">
                            <div class="mt-4">
                                <label for="couponCode">Enter Coupon Code:</label>
                                <input type="text" id="couponCode" name="couponCode" class="form-control"
                                    placeholder="Enter coupon">
                                <button onclick="applyCoupon()" type="button" class="btn btn-primary mt-2">Apply
                                    Coupon</button>
                            </div>
                        </div>

                        <div class="col-12">
                            <style>
                                @media (max-width: 450px) {
                                    #cart-table-container {
                                        font-size: 12px;
                                    }
                                }
                            </style>
                            <div id="cart-table-container" class="table-responsive"></div>
                        </div>

                        <div class="col-md-12 text-center">
                            <button type="submit">
                                অর্ডার করুন <span id="total_in_submit">0</span> ৳
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
