@extends('Backend.layouts.master')

@section('content')
    <main class="app-main">
        <div class="container mt-5">
            <!-- Display Success Message -->
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Product's
                    <sub>
                        ({{ $website_active_id->website->site_url }}.{{ $website_active_id->website->domain_name }})
                    </sub>  
                </h2>
                <a href="{{ route('product.create') }}" class="btn btn-primary">Add Product</a>
            </div>

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Product List</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Group Name</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Discount Price</th>
                                <th>Available Stocks</th>
                                <th>Sold Stocks</th>
                                <th>Images</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($data as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->productGroup->name }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->price ?? '-' }}</td>
                                    <td>{{ $item->discount_price ?? '-' }}</td>
                                    <td>{{ $item->present_stock ?? '-' }}</td>
                                    <td>{{ $item->total_sold ?? '-' }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <img src="{{ asset($item->image) }}" alt="Banner Image" class="rounded me-2"
                                                style="width: 50px; height: 50px; object-fit: cover;">

                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{ route('product.edit', $item->id) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <a href="{{ route('product.stock', $item->id) }}"
                                            class="btn btn-success btn-sm">Adjust
                                            Stock</a>
                                        <form action="{{ route('product.destroy', $item->id) }}" method="POST"
                                            class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-muted">No Products available. Click "Add product" to
                                        create
                                        one.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
