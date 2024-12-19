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
            <h2>Global Discount
                <sub>
                    ({{ $website_active_id->website->site_url }}.{{ $website_active_id->website->domain_name }})
                </sub>
            </h2>
            <a href="{{ route('global-discounts.create') }}" class="btn btn-primary">Add Discount</a>
        </div>

        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Global Discount</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Discount</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $index => $discount)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $discount->title }}</td>
                                <td>{{ $discount->discount }}%</td>
                                <td>{{ \Carbon\Carbon::parse($discount->start_datetime)->format('M d, Y h:i A') }}</td>
                                <td>{{ \Carbon\Carbon::parse($discount->end_datetime)->format('M d, Y h:i A') }}</td>
                                <td>
                                    <a href="{{ route('global-discounts.edit', $discount->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('global-discounts.destroy', $discount->id) }}" method="POST" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this global discount?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-muted">No global discount available. Click "Add Discount" to create one.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection
