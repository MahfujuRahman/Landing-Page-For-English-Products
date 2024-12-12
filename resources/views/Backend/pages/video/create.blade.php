@extends('Backend.layouts.master')

@section('content')
    <main class="app-main">
        <div class="container mt-5">
            <div class="card shadow-sm">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h2>Create Video</h2>
                        </div>
                        <div>
                            <a href="{{ route('video.index') }}" class="btn btn-dark mb-3">Back</a>
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

                    <form action="{{ route('video.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input type="text" hidden name="user_id" value="{{ Auth::user()->id }}">

                        <!-- Site Name -->
                        <div class="mb-4 position-relative" id="title-row">
                            <label for="title" class="form-label">Website Name</label>
                            <div class="d-flex justify-content-between">
                                <div class="col-md-12">
                                    <select class="form-control" id="website_id" name="website_id" required>
                                        <option value="" disabled selected>Select website</option>
                                        @foreach ($website as $item)
                                            <option value="{{ $item->id }}">{{ $item->site_name }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                        </div>

                        <!-- Title -->
                        <div class="mb-4 position-relative" id="title-row">
                            <label for="title" class="form-label">Title</label>
                            <div class="d-flex justify-content-between">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="title" name="title"
                                        placeholder="Enter title" required>
                                </div>
                            </div>
                        </div>

                        <!-- Subtitle -->
                        <div class="mb-4 position-relative" id="subtitle-row">
                            <label for="sub_title" class="form-label">Subtitle</label>
                            <div class="d-flex justify-content-between">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="sub_title" name="sub_title"
                                        placeholder="Enter subtitle">
                                </div>
                            </div>
                        </div>

                        <!-- btn_title_1 -->
                        <div class="mb-4 position-relative" id="btn_title-row">
                            <label for="btn_title" class="form-label">Button Title</label>
                            <div class="d-flex justify-content-between">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="btn_title" name="btn_title"
                                        placeholder="Enter Button Title">
                                </div>
                            </div>
                        </div>

                        <!-- btn_url_1 -->
                        <div class="mb-4 position-relative" id="btn_url-row">
                            <label for="button_url" class="form-label">Button Url</label>
                            <div class="d-flex justify-content-between">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="button_url" name="button_url"
                                        placeholder="Enter Button Url">
                                </div>
                            </div>
                        </div>


                        <!-- Images -->
                        <div class="mb-4" id="image-row">
                            <label for="images" class="form-label">Images</label>
                            <div id="image-container" class="row">
                                <div class="col-md-9">
                                    <input type="file" class="form-control" name="image" accept="image/*">
                                    <small class="text-muted">You can select image. (Supported: JPG, PNG, GIF)</small>
                                </div>
                                <div class="col-md-12 pt-4 image-preview-container">
                                    <!-- Image preview will be here -->
                                </div>
                            </div>

                        </div>

                        <!-- Submit Button -->
                        <div class="d-flex justify-content-end mt-4">
                            <button type="submit" class="btn btn-primary px-4">Save Video</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    @push('scripts')
        <script>
            // Handle preview of selected images
            document.getElementById('image-container').addEventListener('change', function(e) {
                if (e.target.type === 'file') {
                    showImagePreview(e.target);
                }
            });

            function showImagePreview(inputElement) {
                const previewContainer = inputElement.closest('.row').querySelector('.image-preview-container');
                previewContainer.innerHTML = ''; // Clear previous preview

                const file = inputElement.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.style.maxWidth = '200px';
                        img.style.height = 'auto';
                        img.style.borderRadius = '8px';

                        previewContainer.appendChild(img);

                        // Hide remove button for the row if an image is added
                        const row = inputElement.closest('.mb-3');
                        row.querySelector('.remove-row').style.display = 'none';
                    };
                    reader.readAsDataURL(file);
                }
            }
        </script>
    @endpush

@endsection
