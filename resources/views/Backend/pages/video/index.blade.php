@extends('Backend.layouts.master')

@section('content')
    <main class="app-main">
        <div class="container mt-5">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Video's</h2>
                <a href="{{ route('video.create') }}" class="btn btn-primary">Add Video</a>
            </div>

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Video</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Subtitle</th>
                                <th>Images</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @if ($videos == null)
                                <tr>
                                    <td colspan="6" class="text-muted">No banners available. Click "Add Banner" to create
                                        one.</td>
                                </tr>
                            @else
                                @foreach ($videos as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->sub_title ?? '-' }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                @if ($item->image)
                                                    <img src="{{ asset($item->image) }}" alt="Banner Image"
                                                        class="rounded me-2"
                                                        style="width: 50px; height: 50px; object-fit: cover;">
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{ route('video.edit', $item->id) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('video.destroy', $item->id) }}" method="POST"
                                                class="d-inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
