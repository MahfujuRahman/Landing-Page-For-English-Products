@extends('Backend.layouts.master')

@section('content')
    <main class="app-main">
        <div class="container mt-5">
            <div class="card shadow-sm">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h2>Edit Product</h2>
                        </div>
                        <div>
                            <a href="{{ route('product.index') }}" class="btn btn-dark mb-3">Back</a>
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

                    <form action="{{ route('product.update', $data->id) }}" method="POST" enctype="multipart/form-data">
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

                        <div class="mb-4 position-relative">
                            <label for="group_id" class="form-label">Group Name</label>
                            <select class="form-control" id="group_id" name="group_id" required>
                                <option value="" disabled
                                    {{ old('group_id', $data->product_group_id) ? '' : 'selected' }}>
                                    Select Group Name
                                </option>
                                @foreach ($product_group as $item)
                                    <option value="{{ $item->id }}"
                                        {{ old('group_id', $data->product_group_id) == $item->id ? 'selected' : '' }}>
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Title -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Banner Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $data->name }}" required>
                        </div>

                        <!-- Subtitle -->
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" class="form-control" id="price" name="price"
                                value="{{ $data->price }}">
                        </div>

                        <!-- discount_price -->
                        <div class="mb-3">
                            <label for="discount_price" class="form-label">Discout Price</label>
                            <input type="number" class="form-control" id="discount_price" name="discount_price"
                                value="{{ $data->discount_price }}">
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

                        <div class="d-flex justify-content-end mt-4">
                            <button type="submit" class="btn btn-primary px-4">Update Product</button>
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
