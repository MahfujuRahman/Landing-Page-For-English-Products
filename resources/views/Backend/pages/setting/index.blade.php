@extends('Backend.layouts.master')

@section('content')
    <main class="app-main">
        <div class="container mt-5">
            <!-- Display Success Message -->
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="d-flex setting border rounded justify-content-center align-items-center mb-2 p-2">
                <h2>Setting's</h2>
            </div>

            <div class="setting d-flex p-4 border rounded shadow-sm">
                <!-- Left Side: Dynamic Buttons -->
                <div class="left border-end pe-4">
                    <ul class="list-unstyled">
                        @foreach ($data as $item)
                            <li class="mb-1">
                                <a href="{{ route('setting.fetch', $item->id) }}"
                                    class="btn w-100 toggle-button {{ request()->is('setting/' . $item->id) ? 'active' : '' }}"
                                    data-target="#field-group-{{ $item->id }}">
                                    {{ $item->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Right Side: Dynamic Input Fields -->
                <div class="right flex-grow-1 ps-4">
                    @if (isset($details))
                        <div id="field-group-{{ $details->id }}" class="field-group">
                            <form action="{{ route('setting.update', $details->id) }}" method="POST">
                                @csrf

                                <input type="text" hidden name="user_id" value="{{ Auth::user()->id }}">

                                <div class="mb-4 position-relative">
                                    <label for="website_id" class="form-label">Website Name</label>
                                    <select class="form-control" id="website_id" name="website_id" required>
                                        <option value="" disabled {{ !isset($data) ? 'selected' : '' }}>Select website
                                        </option>
                                        @foreach ($website as $item)
                                            <option value="{{ $item->id }}"
                                                {{ (old('website_id') ?? ($website_active_id->user_website_active ?? ($data->website_id ?? ''))) == $item->id ? 'selected' : '' }}>
                                                {{ $item->site_name }} - {{ $item->site_url }}.{{ $item->domain_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="title-{{ $details->id }}" class="form-label">Title</label>
                                    <input type="text" name="title" id="title-{{ $details->id }}"
                                        class="form-control" value="{{ $details->title }}" placeholder="Enter title">
                                </div>

                                @if ($details->type == 'text')
                                    <div class="mb-3">
                                        <label for="value-{{ $details->id }}" class="form-label">Value</label>
                                        <textarea class="form-control ck-editor" id="value-{{ $details->id }}" name="value"
                                            placeholder="Enter Setting value" required>{{ $details->value }}</textarea>
                                    </div>
                                @elseif ($details->type == 'number' || $details->type == 'string')
                                    <label for="value-{{ $details->id }}" class="form-label">Value</label>
                                    <input class="form-control mb-3" id="value-{{ $details->id }}" name="value"
                                        placeholder="Enter Setting value" required value="{{ $details->value }}" />
                                @elseif ($details->type == 'file')
                                    <label for="value-{{ $details->id }}" class="form-label">Value</label>
                                    <input type="file" class="form-control mb-3" id="value-{{ $details->id }}" name="value"
                                        placeholder="Enter Setting value" required value="{{ $details->value }}" />
                                @endif

                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </form>
                        </div>
                    @else
                        <p class="text-muted">Select a setting to edit its details.</p>
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection

@push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <script>
        // Ensure CKEditor is only applied to the currently rendered textarea
        const editorElement = document.querySelector('.ck-editor');
        if (editorElement) {
            ClassicEditor
                .create(editorElement)
                .then(editor => {
                    editor.ui.view.editable.element.style.height = '200px';
                })
                .catch(error => {
                    console.error(error);
                });
        }
        try {
            document.querySelector(`a[href="${location.href}"]`).classList.add('active')
        } catch (error) {
            console.error(error);
        }
    </script>
@endpush
