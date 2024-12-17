@extends('Backend.layouts.master')

@section('content')
    <main class="app-main">
        <div class="container my-5">
            <h2>Create Shipping Cost</h2>
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

                    <form action="{{ route('setting.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title"
                                placeholder="Enter Setting title" required>
                        </div>

                        <div class="mb-4">
                            <label for="value" class="form-label">Value</label>
                            <input type="text" class="form-control" id="value" name="value"
                                placeholder="Enter Setting value" required>
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            <button type="submit" class="btn btn-primary px-4">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
