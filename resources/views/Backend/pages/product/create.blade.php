@extends('Backend.layouts.master')

@section('content')
    <main class="app-main">
        <div class="container mt-5">

            <div class="card shadow-sm">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h2>Create Product</h2>
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

                    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input type="text" hidden name="user_id" value="{{ Auth::user()->id }}">

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

                        <div class="mb-4 position-relative" id="name-row">
                            <label for="name" class="form-label">Name</label>
                            <div class="d-flex justify-content-between">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Enter banner name" required>
                                </div>
                            </div>
                            <button type="button" class="btn btn-danger btn-sm mt-2 remove-row"
                                style="position: absolute; top: 0; right: 0; display: none;">Remove</button>
                        </div>

                        <div class="mb-4 position-relative" id="price-row">
                            <label for="price" class="form-label">Price</label>
                            <div class="d-flex justify-content-between">
                                <div class="col-md-12">
                                    <input type="number" class="form-control" id="price" name="price"
                                        placeholder="Enter price">
                                </div>
                            </div>
                            <button type="button" class="btn btn-danger btn-sm mt-2 remove-row"
                                style="position: absolute; top: 0; right: 0; display: none;">Remove</button>
                        </div>

                        <div class="mb-4 position-relative" id="discount_price-row">
                            <label for="discount_price" class="form-label">discount_price</label>
                            <div class="d-flex justify-content-between">
                                <div class="col-md-12">
                                    <input type="number" class="form-control" id="discount_price" name="discount_price"
                                        placeholder="Enter discount price">
                                </div>
                            </div>
                            <button type="button" class="btn btn-danger btn-sm mt-2 remove-row"
                                style="position: absolute; top: 0; right: 0; display: none;">Remove</button>
                        </div>


                        <!-- Images -->
                        <div class="mb-4" id="image-row">
                            <label for="image" class="form-label">Image</label>
                            <div id="image-container" class="row">
                                <div class="col-md-9">
                                    <input type="file" class="form-control" name="image">
                                </div>
                                <div class="col-md-12 pt-4 image-preview-container">
                                    <!-- Image preview will be here -->
                                </div>
                            </div>
                            <div id="image-preview-container" class="row mt-3"></div>
                            <small class="text-muted">You can select image. (Supported: JPG, PNG, GIF)</small>
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            <button type="submit" class="btn btn-primary px-4">Save Product</button>
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
                        img.style.borderRadius = '8px';


                        previewContainer.appendChild(img);

                        const row = inputElement.closest('.mb-3');
                        row.querySelector('.remove-row').style.display = 'none';
                    };
                    reader.readAsDataURL(file);
                }
            }
        </script>
    @endpush

@endsection
