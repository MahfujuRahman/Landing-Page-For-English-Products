@extends('Backend.layouts.master')

@section('content')
    <main class="app-main">
        <div class="container mt-5">
            <div class="card shadow-sm">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h2>Edit Banner</h2>
                        </div>
                        <div>
                            <a href="{{ route('banners.index') }}" class="btn btn-dark mb-3">Back</a>
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

                    <form onsubmit="SubmitHandler()" action="{{ route('banners.update', $banner->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <input type="text" hidden name="user_id" value="{{ Auth::user()->id }}">

                        <!-- Site Name -->
                        <div class="mb-4 position-relative" id="title-row">
                            <label for="title" class="form-label">Website Name</label>
                            <div class="d-flex justify-content-between">
                                <div class="col-md-12">
                                    <select class="form-control" id="website_id" name="website_id" required>
                                        <option value="" disabled>Select website</option>
                                        @foreach ($website as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $item->id == $banner->website_id ? 'selected' : '' }}>
                                                {{ $item->site_url }}.{{ $item->domain_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title"
                                value="{{ $banner->title }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="subtitle" class="form-label">Subtitle</label>
                            <input type="text" class="form-control" id="subtitle" name="subtitle"
                                value="{{ $banner->subtitle }}">
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="btn_title_1" class="form-label">Button Title 1</label>
                                    <input type="text" class="form-control" id="btn_title_1" name="btn_title_1"
                                        value="{{ $banner->btn_title_1 }}">
                                </div>

                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="btn_url_1" class="form-label">Button URL 1</label>
                                    <input type="text" class="form-control" id="btn_url_1" name="btn_url_1"
                                        value="{{ $banner->btn_url_1 }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="btn_title_2" class="form-label">Button Title 2</label>
                                    <input type="text" class="form-control" id="btn_title_2" name="btn_title_2"
                                        value="{{ $banner->btn_title_2 }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="btn_url_2" class="form-label">Button URL 2</label>
                                    <input type="text" class="form-control" id="btn_url_2" name="btn_url_2"
                                        value="{{ $banner->btn_url_2 }}">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Existing Images</label>
                            <div class="row">
                                @foreach ($banner->images as $image)
                                    <div class="col-md-3 image-preview-container" id="image-{{ $image->id }}">
                                        <div class="card">
                                            <img src="{{ asset($image->image) }}" class="card-img-top" alt="Banner Image"
                                                style="max-width: 100%; height: 200px;">
                                            <div class="card-body text-center">
                                                <button type="button" class="btn btn-danger btn-sm remove-image"
                                                    data-image-id="{{ $image->id }}">Remove Image</button>
                                                <!-- Hidden checkbox to mark the image for deletion -->
                                                <input type="checkbox" name="deleted_images[]"
                                                    value="{{ $image->id }}" class="deleted-image-checkbox"
                                                    style="display: none;">
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
                                <div class="col-md-12 image-preview-container pt-4"></div>
                            </div>
                            <button type="button" class="btn btn-success btn-sm mt-3" id="add-image-btn">+ Add Another
                                Image</button>
                            <div id="image-preview-container" class="row mt-3"></div>
                            <small class="text-muted">You can select multiple images. (Supported: JPG, PNG, JPEG,
                                WEBP)</small>
                        </div>

                        <!-- Hidden input for deleted images (for form submission) -->
                        <input type="hidden" name="deleted_images" id="deleted_images" value="">

                        <!-- Submit Button -->
                        <div class="d-flex justify-content-end mt-4">
                            <button type="submit" class="btn btn-primary px-4">Update Banner</button>
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
