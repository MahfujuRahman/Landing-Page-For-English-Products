@extends('Backend.layouts.master')

@section('content')
    <main class="app-main">
        <div class="container my-5">

            <div class="card shadow-sm">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h2>Edit Coupon</h2>
                        </div>
                        <div>
                            <a href="{{ route('coupons.index') }}" class="btn btn-dark mb-3">Back</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('coupons.update', $coupon->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <input type="text" hidden name="user_id" value="{{ Auth::user()->id }}">

                        <div class="mb-4 position-relative" id="title-row">
                            <label for="title" class="form-label">Website Name</label>
                            <div class="d-flex justify-content-between">
                                <div class="col-md-12">
                                    <select class="form-control" id="website_id" name="website_id" required>
                                        <option value="" disabled>Select website</option>
                                        @foreach ($website as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $item->id == $coupon->website_id ? 'selected' : '' }}>
                                                {{ $item->site_name }} - {{ $item->site_url }}.{{ $item->domain_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="coupon_code" class="form-label">Coupon Code</label>
                            <input type="text" class="form-control" id="coupon_code" name="coupon_code"
                                placeholder="Enter Coupon Code" value="{{ old('coupon_code', $coupon->coupon_code) }}"
                                required>
                        </div>

                        <div class="mb-4">
                            <label for="discount" class="form-label">Discount Percentage</label>
                            <input type="number" class="form-control" id="discount" name="discount"
                                placeholder="Enter Discount Percentage" value="{{ old('discount', $coupon->discount) }}"
                                required>
                        </div>

                        <div class="mb-4">
                            <label for="is_active" class="form-label">Status</label>
                            <select class="form-control" id="is_active" name="is_active">
                                <option value="1" {{ $coupon->is_active ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ !$coupon->is_active ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            <button type="submit" class="btn btn-primary px-4">Update Coupon</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
