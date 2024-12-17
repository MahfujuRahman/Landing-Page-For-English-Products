@extends('Backend.layouts.master')

@section('content')
    <main class="app-main">
        <div class="container mt-5">

            <div class="card shadow-sm">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h2>Edit Video</h2>
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

                    <form action="{{ route('video.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <input type="text" hidden name="user_id" value="{{ Auth::user()->id }}">

                        <!-- Site Name -->
                        @include('Backend.includes.website_create')

                        <!-- Title -->
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title"
                                value="{{ $data->title }}" required>
                        </div>

                        <!-- Subtitle -->
                        <div class="mb-3">
                            <label for="sub_title" class="form-label">Subtitle</label>
                            <input type="text" class="form-control" id="sub_title" name="sub_title"
                                value="{{ $data->sub_title }}">
                        </div>

                        <!-- btn_title_1 -->
                        <div class="mb-3">
                            <label for="btn_title" class="form-label">Button Title</label>
                            <input type="text" class="form-control" id="btn_title" name="btn_title"
                                value="{{ $data->button_title }}">
                        </div>

                        <!-- btn_title_1 -->
                        <div class="mb-3">
                            <label for="btn_url" class="form-label">Button Url</label>
                            <input type="text" class="form-control" id="btn_url_1" name="btn_url"
                                value="{{ $data->button_url }}">
                        </div>

                        <!-- Existing Images -->
                        <div class="mb-3">
                            <label class="form-label">Existing Images</label>
                            <div class="row">
                                <div class="col-md-3 image-preview-container">
                                    <div class="card">
                                        <img src="{{ asset($data->image) }}" class="card-img-top" alt="Banner Image"
                                            style="max-width: 100%; height: 200px;">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Add New Images -->
                        <div class="mb-3" id="image-row">
                            <label for="images" class="form-label">Add New Images</label>
                            <div id="image-container" class="row">
                                <div class="col-md-9">
                                    <input type="file" class="form-control" name="image">
                                </div>
                                <div class="col-md-12 pt-4 image-preview-container"></div>
                            </div>

                            <div id="image-preview-container" class="row mt-3"></div>
                            <small class="text-muted">You can select multiple images. (Supported: JPG, PNG, GIF)</small>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-flex justify-content-end mt-4">
                            <button type="submit" class="btn btn-primary px-4">Update Video</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    @push('scripts')
        <script>
            document.getElementById('image-container').addEventListener('change', function(e) {
                if (e.target.type === 'file') {
                    showImagePreview(e.target);
                }
            });

            function showImagePreview(inputElement) {
                const previewContainer = inputElement.closest('.row').querySelector('.image-preview-container');
                previewContainer.innerHTML = '';

                const file = inputElement.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.style.maxWidth = '200px';
                        img.style.height = 'auto';
                        img.style.borderRadius = '5px';

                        previewContainer.appendChild(img);
                    };
                    reader.readAsDataURL(file);
                }
            }
        </script>
    @endpush
@endsection
