@extends('Backend.layouts.master')

@section('content')
    <main class="app-main">
        <div class="container my-5">
            <h2>Edit Setting</h2>
            <div class="card shadow-sm">
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

                    <form action="{{ route('setting.update', $setting->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title"
                                placeholder="Enter Title" value="{{ old('title', $setting->title) }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="value" class="form-label">Value</label>
                            <input type="number" class="form-control" id="value" name="value"
                                placeholder="Enter Value" value="{{ old('value', $setting->value) }}" required>
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            <button type="submit" class="btn btn-primary px-4">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
