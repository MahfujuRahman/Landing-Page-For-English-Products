@extends('Backend.layouts.master')

@section('content')
    <main class="app-main">
        <div class="container my-5">
            <div class="card shadow-sm">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h2>{{ $courier->exists ? 'Edit Courier' : 'Create Courier' }}</h2>
                    </div>
                </div>

                @dump($courier) {{-- Optional debug line to check courier data --}}

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

                    <form action="{{ isset($courier) ? route('couriers.update', $courier->id) : route('couriers.store') }}"
                        method="POST">
                        @csrf
                        @if (isset($courier))
                            @method('PUT') <!-- Use PUT method for updating -->
                        @endif

                        <div class="mb-4">
                            <label for="website_id" class="form-label">Website Name</label>
                            <select class="form-control" id="website_id" name="website_id" required>
                                <option value="" disabled selected>Select website</option>
                                @foreach ($websites as $item)
                                    <option value="{{ $item->id }}"
                                        {{ old('website_id', $courier->website_id ?? '') == $item->id ? 'selected' : '' }}>
                                        {{ $item->site_name }} - {{ $item->site_url }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Courier Name --}}
                        <div class="mb-4">
                            <label for="courier_name" class="form-label">Courier Name</label>
                            <input type="text" class="form-control" id="courier_name" name="courier_name"
                                value="{{ old('courier_name', $courier->courier_name ?? '') }}"
                                placeholder="Enter Courier Name" required>
                        </div>

                        {{-- App Key --}}
                        <div class="mb-4">
                            <label for="app_key" class="form-label">App Key</label>
                            <input type="text" class="form-control" id="app_key" name="app_key"
                                value="{{ old('app_key', $courier->app_key ?? '') }}" placeholder="Enter App Key" required>
                        </div>

                        {{-- App Secret --}}
                        <div class="mb-4">
                            <label for="app_secret" class="form-label">App Secret</label>
                            <input type="text" class="form-control" id="app_secret" name="app_secret"
                                value="{{ old('app_secret', $courier->app_secret ?? '') }}" placeholder="Enter App Secret"
                                required>
                        </div>

                        {{-- Status --}}
                        <div class="mb-4">
                            <label for="is_active" class="form-label">Status</label>
                            <select class="form-control" id="is_active" name="is_active" required>
                                <option value="1"
                                    {{ old('is_active', $courier->is_active ?? 1) == 1 ? 'selected' : '' }}>
                                    Active</option>
                                <option value="0"
                                    {{ old('is_active', $courier->is_active ?? 0) == 0 ? 'selected' : '' }}>
                                    Inactive</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            {{ isset($courier) ? 'Update' : 'Create' }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
