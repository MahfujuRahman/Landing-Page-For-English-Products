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

                        @include('Backend.includes.website_create')

                        <div class="mb-4 position-relative">
                            <label for="group_id" class="form-label">Group Name</label>
                            <select class="form-control" id="group_id" name="group_id" required>
                                <option value="" disabled {{ !isset($data) ? 'selected' : '' }}>Select Group Name
                                </option>
                                @foreach ($product_group as $item)
                                    <option value="{{ $item->id }}"
                                        {{ old('group_id') == $item->id ? 'selected' : '' }}>
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4 position-relative" id="name-row">
                            <label for="name" class="form-label">Banner Name</label>
                            <div class="d-flex justify-content-between">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Enter banner name" required>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4 position-relative" id="price-row">
                            <label for="price" class="form-label">Price</label>
                            <div class="d-flex justify-content-between">
                                <div class="col-md-12">
                                    <input type="number" class="form-control" id="price" name="price"
                                        placeholder="Enter price">
                                </div>
                            </div>
                        </div>

                        <div class="mb-4 position-relative" id="discount_price-row">
                            <label for="discount_price" class="form-label">discount_price</label>
                            <div class="d-flex justify-content-between">
                                <div class="col-md-12">
                                    <input type="number" class="form-control" id="discount_price" name="discount_price"
                                        placeholder="Enter discount price">
                                </div>
                            </div>
                        </div>

                        <!-- Images -->
                        <div class="mb-4" id="image-row">
                            <label for="image" class="form-label">Image</label>
                            <div id="image-container" class="row">
                                <div class="col-md-9">
                                    <input type="file" class="form-control" name="image" required>
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
