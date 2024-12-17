@extends('Backend.layouts.master')

@section('content')
    <main class="app-main">
        <div class="container mt-5">
            <div class="card shadow-sm">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h2>Create Image Gallery</h2>
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

                    <form action="{{ route('image-gallery.store') }}" method="POST" enctype="multipart/form-data">
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

                        <div class="mb-4 position-relative" id="btn_title-row">
                            <label for="btn_title" class="form-label">Button Title</label>
                            <div class="d-flex justify-content-between">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="btn_title" name="btn_title"
                                        placeholder="Enter banner Button Title">
                                </div>
                            </div>
                        </div>

                        <div class="mb-4 position-relative" id="btn_url-row">
                            <label for="btn_url" class="form-label">Button Url</label>
                            <div class="d-flex justify-content-between">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="btn_url" name="btn_url"
                                        placeholder="Enter banner Button Url 1">
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
                            <small class="text-muted">You can select multiple images. (Supported: JPG, PNG, GIF)</small>
                        </div>

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
        <script src="{{ asset('backend/js/createblade.js') }}"></script>
    @endpush

@endsection
