@extends('Backend.layouts.master')

@section('content')
    <main class="app-main">
        <div class="container my-5">
            <div class="card shadow-sm">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h2>Create Product Group</h2>
                        </div>
                        <div>
                            <a href="{{ route('product-group.index') }}" class="btn btn-dark mb-3">Back</a>
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

                    <form action="{{ route('product-group.store') }}" method="POST" onsubmit="return validateDates()">
                        @csrf

                        <input type="text" hidden name="user_id" value="{{ Auth::user()->id }}">

                        @include('Backend.includes.website_create')

                        <div class="mb-4">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Enter Product Group Name" required>
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            <button type="submit" class="btn btn-primary px-4">Save Product Group</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
