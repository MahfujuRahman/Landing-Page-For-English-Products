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
                            <button type="button" class="btn btn-danger btn-sm mt-2 remove-row"
                                style="position: absolute; top: 0; right: 0; display: none;">Remove</button>
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

                        <!-- btn_title -->
                        <div class="mb-4 position-relative" id="btn_title-row">
                            <label for="btn_title" class="form-label">Button Title</label>
                            <div class="d-flex justify-content-between">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="btn_title" name="btn_title"
                                        placeholder="Enter banner Button Title">
                                </div>
                                <div class="col-md-3 image-preview-container">
                                    <!-- Preview will be shown here if any image is selected -->
                                </div>
                            </div>
                            <button type="button" class="btn btn-danger btn-sm mt-2 remove-row"
                                style="position: absolute; top: 0; right: 0; display: none;">Remove</button>
                        </div>

                        <!-- btn_url -->
                        <div class="mb-4 position-relative" id="btn_url-row">
                            <label for="btn_url" class="form-label">Button Url</label>
                            <div class="d-flex justify-content-between">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="btn_url" name="btn_url"
                                        placeholder="Enter banner Button Url 1">
                                </div>
                                <div class="col-md-3 image-preview-container">
                                    <!-- Preview will be shown here if any image is selected -->
                                </div>
                            </div>
                            <button type="button" class="btn btn-danger btn-sm mt-2 remove-row"
                                style="position: absolute; top: 0; right: 0; display: none;">Remove</button>
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

                // Add remove button
                const removeButton = document.createElement('button');
                removeButton.classList.add('btn', 'btn-danger', 'btn-sm', 'mt-2', 'remove-row');
                removeButton.textContent = 'Remove';
                removeButton.style.display = 'inline-block';

                newImageInput.appendChild(removeButton);

                // Handle remove button for the newly added image input
                removeButton.addEventListener('click', function() {
                    removeImageInput(newImageInput);
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
                        img.style.borderRadius = '8px';

                        // Add remove button
                        const removeButton = document.createElement('button');
                        removeButton.classList.add('btn', 'btn-danger', 'btn-sm', 'mt-2', 'remove-image', 'ms-4');
                        removeButton.textContent = 'Remove';
                        removeButton.addEventListener('click', function() {
                            removeImageInput(inputElement.closest('.row'));
                        });

                        previewContainer.appendChild(img);
                        previewContainer.appendChild(removeButton);

                        // Hide remove button for the row if an image is added
                        const row = inputElement.closest('.mb-3');
                        row.querySelector('.remove-row').style.display = 'none';
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
