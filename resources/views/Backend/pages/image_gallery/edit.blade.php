@extends('Backend.layouts.master')

@section('content')
    <main class="app-main">
        <div class="container mt-5">
            <div class="card shadow-sm">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h2>Edit Image Gallery</h2>
                        </div>
                        <div>
                            <a href="{{ route('image-gallery.index') }}" class="btn btn-dark mb-3">Back</a>
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

                    <form action="{{ route('image-gallery.update', $data->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <input type="text" hidden name="user_id" value="{{ Auth::user()->id }}">

                        <div class="mb-4 position-relative">
                            <label for="website_id" class="form-label">Website Name</label>
                            <select class="form-control" id="website_id" name="website_id" required>
                                <option value="" disabled {{ !isset($data) ? 'selected' : '' }}>Select website
                                </option>
                                @foreach ($website as $item)
                                    <option value="{{ $item->id }}"
                                        {{ (old('website_id') ?? (session('selectedWebsiteId') ?? ($data->website_id ?? ''))) == $item->id ? 'selected' : '' }}>
                                        {{ $item->site_name }} - {{ $item->site_url }}.{{ $item->domain_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Title -->
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title"
                                value="{{ $data->title }}" required>
                        </div>

                        <!-- Subtitle -->
                        <div class="mb-3">
                            <label for="subtitle" class="form-label">Subtitle</label>
                            <input type="text" class="form-control" id="subtitle" name="subtitle"
                                value="{{ $data->subtitle }}">
                        </div>

                        <!-- btn_title_1 -->
                        <div class="mb-3">
                            <label for="btn_title" class="form-label">Button Title</label>
                            <input type="text" class="form-control" id="btn_title" name="btn_title"
                                value="{{ $data->btn_title }}">
                        </div>

                        <!-- btn_title_1 -->
                        <div class="mb-3">
                            <label for="btn_url" class="form-label">Button Url</label>
                            <input type="text" class="form-control" id="btn_url" name="btn_url"
                                value="{{ $data->btn_url }}">
                        </div>


                        <!-- Existing Images -->
                        <div class="mb-3">
                            <label class="form-label">Existing Images</label>
                            <div class="row">
                                @foreach ($data->images as $image)
                                    <div class="col-md-3 image-preview-container" id="image-{{ $image->id }}">
                                        <div class="card">
                                            <img src="{{ asset($image->image) }}" class="card-img-top" alt="Banner Image"
                                                style="max-width: 100%; height: 200px;">
                                            <div class="card-body text-center">
                                                <button type="button" class="btn btn-danger btn-sm remove-image"
                                                    data-image-id="{{ $image->id }}">Remove Image</button>
                                                <!-- Hidden input to mark the image for deletion -->
                                                <input type="checkbox" name="deleted_images[]" value="{{ $image->id }}"
                                                    class="deleted-image-checkbox" style="display: none;">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Add New Images -->
                        <div class="mb-3" id="image-row">
                            <label for="images" class="form-label">Add New Images</label>
                            <div id="image-container" class="row">
                                <div class="col-md-9">
                                    <input type="file" class="form-control" name="images[]" accept="image/*">
                                </div>
                                <div class="col-md-12 pt-4 image-preview-container"></div>
                            </div>
                            <button type="button" class="btn btn-success btn-sm mt-3" id="add-image-btn">+ Add Another
                                Image</button>
                            <div id="image-preview-container" class="row mt-3"></div>
                            <small class="text-muted">You can select multiple images. (Supported: JPG, PNG, GIF)</small>
                        </div>

                        <!-- Hidden input for deleted images -->
                        <input type="hidden" name="deleted_images" id="deleted_images" value="">

                        <!-- Submit Button -->
                        <div class="d-flex justify-content-end mt-4">
                            <button type="submit" class="btn btn-primary px-4">Save Image Gallery</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>


    @push('scripts')
        <script src="{{ asset('backend/js/editblade.js') }}"></script>
    @endpush

@endsection
