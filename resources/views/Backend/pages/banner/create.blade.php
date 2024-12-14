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

                        <!-- Site Name -->

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
                        <div class="mb-4 position-relative" id="title-row">
                            <label for="title" class="form-label">Title</label>
                            <div class="d-flex justify-content-between">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="title" name="title"
                                        placeholder="Enter banner title" required>
                                    @error('title')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-3 image-preview-container">
                                    <!-- Preview will be shown here if any image is selected -->
                                </div>
                            </div>
                        </div>

                        <!-- Subtitle -->
                        <div class="mb-4 position-relative" id="subtitle-row">
                            <label for="subtitle" class="form-label">Subtitle</label>
                            <div class="d-flex justify-content-between">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="subtitle" name="subtitle"
                                        placeholder="Enter banner subtitle">
                                </div>
                                <div class="col-md-3 image-preview-container">
                                    <!-- Preview will be shown here if any image is selected -->
                                </div>
                            </div>
                            <button type="button" class="btn btn-danger btn-sm mt-2 remove-row"
                                style="position: absolute; top: 0; right: 0; display: none;">Remove</button>
                        </div>


                        <div class="row">
                            <div class="col-lg-6">
                                <!-- btn_title_1 -->
                                <div class="mb-4 position-relative" id="btn_title_1-row">
                                    <label for="btn_title_1" class="form-label">Button 1 Title</label>
                                    <div class="d-flex justify-content-between">
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" id="btn_title_1" name="btn_title_1"
                                                placeholder="Enter banner Button Title 1">
                                        </div>
                                        <div class="col-md-3 image-preview-container">
                                            <!-- Preview will be shown here if any image is selected -->
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-danger btn-sm mt-2 remove-row"
                                        style="position: absolute; top: 0; right: 0; display: none;">Remove</button>
                                </div>

                            </div>
                            <div class="col-lg-6">
                                <!-- btn_url_1 -->
                                <div class="mb-4 position-relative" id="btn_url_1-row">
                                    <label for="btn_url_1" class="form-label">Button Url 1</label>
                                    <div class="d-flex justify-content-between">
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" id="btn_url_1" name="btn_url_1"
                                                placeholder="Enter banner Button Url 1">
                                        </div>
                                        <div class="col-md-3 image-preview-container">
                                            <!-- Preview will be shown here if any image is selected -->
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-danger btn-sm mt-2 remove-row"
                                        style="position: absolute; top: 0; right: 0; display: none;">Remove</button>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <!-- btn_title_12 -->
                                <div class="mb-4 position-relative" id="btn_title_2-row">
                                    <label for="btn_title_2" class="form-label">Button 2 Title</label>
                                    <div class="d-flex justify-content-between">
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" id="btn_title_2" name="btn_title_2"
                                                placeholder="Enter Button 2 Title">
                                        </div>
                                        <div class="col-md-3 image-preview-container">
                                            <!-- Preview will be shown here if any image is selected -->
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-danger btn-sm mt-2 remove-row"
                                        style="position: absolute; top: 0; right: 0; display: none;">Remove</button>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <!-- btn_url_2 -->
                                <div class="mb-4 position-relative" id="btn_url_1-row">
                                    <label for="btn_url_2" class="form-label">Button Url 2</label>
                                    <div class="d-flex justify-content-between">
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" id="btn_url_2" name="btn_url_2"
                                                placeholder="Enter banner Button Url 2">
                                        </div>
                                        <div class="col-md-3 image-preview-container">
                                            <!-- Preview will be shown here if any image is selected -->
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-danger btn-sm mt-2 remove-row"
                                        style="position: absolute; top: 0; right: 0; display: none;">Remove</button>
                                </div>
                            </div>
                        </div>

                        <!-- Images -->
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
                                <div class="col-md-12 pt-4 image-preview-container">
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
        <script>
            // Handle adding another image input
            document.getElementById('add-image-btn').addEventListener('click', function() {
                const imageContainer = document.getElementById('image-container');
                const newImageInput = document.createElement('div');
                newImageInput.classList.add('row', 'mb-3');
                newImageInput.innerHTML = `
                <div class="col-md-9">
                    <input type="file" class="form-control" name="images[]" accept="image/*">
                </div>
                <div class="col-md-3 image-preview-container"></div>
            `;
                imageContainer.appendChild(newImageInput);

                // Handle remove button for the newly added image input
                const removeButton = document.createElement('button');
                removeButton.classList.add('btn', 'btn-danger', 'btn-sm', 'mt-2', 'remove-row');
                removeButton.textContent = 'Remove';
                removeButton.style.display = 'inline-block';
                newImageInput.appendChild(removeButton);

                removeButton.addEventListener('click', function() {
                    newImageInput.remove();
                });
            });

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
                        img.style.borderRadius = '5px';

                        // Add remove button
                        const removeButton = document.createElement('button');
                        removeButton.classList.add('btn', 'btn-danger', 'btn-sm', 'mt-2', 'remove-image', 'ms-4');
                        removeButton.textContent = 'Remove';
                        removeButton.addEventListener('click', function() {
                            previewContainer.innerHTML = ''; // Clear preview
                            inputElement.value = ''; // Clear input field
                        });

                        previewContainer.appendChild(img);
                        previewContainer.appendChild(removeButton);
                    };
                    reader.readAsDataURL(file);
                }
            }

            // Function to remove the input and preview (same remove button for both)
            function removeImageInput(imageInputContainer) {
                const previewContainer = imageInputContainer.querySelector('.image-preview-container');
                const inputField = imageInputContainer.querySelector('input[type="file"], input[type="text"]');

                // Remove input field and image preview
                if (inputField) {
                    inputField.value = ''; // Clear the file input
                }
                previewContainer.innerHTML = ''; // Clear image preview

                // Hide the remove button for this row
                const removeButton = imageInputContainer.querySelector('.remove-row');
                if (removeButton) {
                    removeButton.style.display = 'none';
                }

                // Remove the entire row after clearing
                imageInputContainer.remove();
            }

            // Handle remove row button for already existing input fields
            const removeRowButtons = document.querySelectorAll('.remove-row');
            removeRowButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const row = this.closest('.mb-3');
                    removeImageInput(row);
                });
            });
        </script>
    @endpush

@endsection
