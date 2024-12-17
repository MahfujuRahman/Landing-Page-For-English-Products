@extends('Backend.layouts.master')

@section('content')
    <main class="app-main">
        <div class="container my-5">
            <div class="card shadow-sm">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h2>Create About</h2>
                        </div>
                        <div>
                            <a href="{{ route('about.index') }}" class="btn btn-dark mb-3">Back</a>
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

                    <form action="{{ route('about.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input type="text" hidden name="user_id" value="{{ Auth::user()->id }}">

                       @include('Backend.includes.website_create')

                        <div class="mb-4 position-relative" id="title-row">
                            <label for="title" class="form-label">Title</label>
                            <div class="d-flex justify-content-between">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="title" name="title"
                                        placeholder="Enter About title" required>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4 position-relative" id="button_title-row">
                            <label for="button_title" class="form-label">Button Title</label>
                            <div class="d-flex justify-content-between">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="button_title" name="button_title"
                                        placeholder="Enter Button Title">
                                </div>
                            </div>
                        </div>

                        <div class="mb-4 position-relative" id="button_url-row">
                            <label for="button_url" class="form-label">Button Url</label>
                            <div class="d-flex justify-content-between">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="button_url" name="button_url"
                                        placeholder="Enter Button Url">
                                </div>
                            </div>
                        </div>

                        <div class="mb-4 position-relative" id="description_first-row">
                            <label for="description_first" class="form-label">Description Left</label>
                            <div class="d-flex justify-content-between">
                                <div class="col-md-12">
                                    <textarea class="form-control" id="description_first" name="description_first" placeholder="Enter Description 1st Part"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4 position-relative" id="description_second-row">
                            <label for="description_second" class="form-label">Description Right</label>
                            <div class="d-flex justify-content-between">
                                <div class="col-md-12">
                                    <textarea class="form-control" id="description_second" name="description_second"
                                        placeholder="Enter Description 2nd Part"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            <button type="submit" class="btn btn-primary px-4">Save About</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#description_first'))
            .then(editor => {
                editor.ui.view.editable.element.style.minHeight = '200px';
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#description_second'))
            .then(editor => {
                editor.ui.view.editable.element.style.minHeight = '200px';
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
