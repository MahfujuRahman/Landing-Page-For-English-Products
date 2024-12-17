@extends('Backend.layouts.master')

@section('content')
    <main class="app-main">
        <div class="container my-5">

            <div class="card shadow-sm">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h2>Create Coupon</h2>
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

                    <form action="{{ route('coupons.store') }}" method="POST">
                        @csrf

                        <input type="text" hidden name="user_id" value="{{ Auth::user()->id }}">

                        <div class="mb-4 position-relative">
                            <label for="website_id" class="form-label">Website Name</label>
                            <select class="form-control" id="website_id" name="website_id" required>
                                <option value="" disabled {{ !isset($data) ? 'selected' : '' }}>Select website
                                </option>
                                @foreach ($website as $item)
                                    <option value="{{ $item->id }}"
                                        {{ old('website_id', $website_active_id->user_website_active) == $item->id ? 'selected' : '' }}>
                                        {{ $item->site_name }} - {{ $item->site_url }}.{{ $item->domain_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="coupon_code" class="form-label">Coupon Code</label>
                            <input type="text" class="form-control" id="coupon_code" name="coupon_code"
                                placeholder="Enter Coupon Code" required>
                        </div>

                        <div class="mb-4">
                            <label for="discount" class="form-label">Discount Percentage</label>
                            <input type="number" class="form-control" id="discount" name="discount"
                                placeholder="Enter Discount Percentage" required>
                        </div>

                        <div class="mb-4">
                            <label for="is_active" class="form-label">Status</label>
                            <select class="form-control" id="is_active" name="is_active">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            <button type="submit" class="btn btn-primary px-4">Save Coupon</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
