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
                <h2>Product Groups</h2>
                <a href="{{ route('product-group.create') }}" class="btn btn-primary">Add Product Group</a>
            </div>

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Product Group List</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Website Name</th>
                                <th>Website Link</th>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->website->site_name }}</td>
                                    <td>
                                        <a href="{{ url($item->website->site_url) }}" target="_blank">
                                            {{ url($item->website->site_url) }}
                                        </a>
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <a href="{{ route('product-group.edit', $item->id) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('product-group.destroy', $item->id) }}" method="POST"
                                            class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure you want to delete this global discount?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-muted">No global discount available. Click "Add Discount"
                                        to create one.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
