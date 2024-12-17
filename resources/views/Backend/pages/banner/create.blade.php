@extends('Backend.layouts.master')

@section('content')
    <main class="app-main">
        <div class="container my-5">
            <div class="card shadow-sm">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h2>Create Banner</h2>
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

                    <form action="{{ route('banners.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input type="text" hidden name="user_id" value="{{ Auth::user()->id }}">

                        @include('Backend.includes.website_create')

                        <div class="mb-4 position-relative" id="title-row">
                            <label for="title" class="form-label">Title</label>
                            <div class="d-flex justify-content-between">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="title" name="title"
                                        placeholder="Enter banner title" required>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4 position-relative" id="subtitle-row">
                            <label for="subtitle" class="form-label">Subtitle</label>
                            <div class="d-flex justify-content-between">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="subtitle" name="subtitle"
                                        placeholder="Enter banner subtitle">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-4 position-relative" id="btn_title_1-row">
                                    <label for="btn_title_1" class="form-label">Button 1 Title</label>
                                    <div class="d-flex justify-content-between">
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" id="btn_title_1" name="btn_title_1"
                                                placeholder="Enter banner Button Title 1">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4 position-relative" id="btn_url_1-row">
                                    <label for="btn_url_1" class="form-label">Button Url 1</label>
                                    <div class="d-flex justify-content-between">
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" id="btn_url_1" name="btn_url_1"
                                                placeholder="Enter banner Button Url 1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-4 position-relative" id="btn_title_2-row">
                                    <label for="btn_title_2" class="form-label">Button 2 Title</label>
                                    <div class="d-flex justify-content-between">
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" id="btn_title_2" name="btn_title_2"
                                                placeholder="Enter Button 2 Title">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4 position-relative" id="btn_url_1-row">
                                    <label for="btn_url_2" class="form-label">Button Url 2</label>
                                    <div class="d-flex justify-content-between">
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" id="btn_url_2" name="btn_url_2"
                                                placeholder="Enter banner Button Url 2">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4" id="image-row">
                            <label for="images" class="form-label">Images</label>
                            <div id="image-container" class="row">
                                <div class="col-md-9">
                                    <input type="file" class="form-control" name="images[]" accept="image/*">
                                    @error('images')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    @error('images.*')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-12 py-4 image-preview-container">
                                    <!-- Image preview will be here -->
                                </div>
                            </div>
                            <button type="button" class="btn btn-success btn-sm mt-3" id="add-image-btn">+ Add Another
                                Image</button>
                            <div id="image-preview-container" class="row mt-3"></div>
                            <small class="text-muted">You can select multiple images. (Supported: JPG, PNG, JPEG,
                                WEBP)</small>
                        </div>

                        <!-- Hidden input for deleted images -->
                        <input type="hidden" id="deleted_images" name="deleted_images" value="">

                        <!-- Submit Button -->
                        <div class="d-flex justify-content-end mt-4">
                            <button type="submit" class="btn btn-primary px-4">Save Banner</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    @push('scripts')
        <script src="{{ asset('backend/js/createblade.js') }}"></script>
    @endpush

@endsection
