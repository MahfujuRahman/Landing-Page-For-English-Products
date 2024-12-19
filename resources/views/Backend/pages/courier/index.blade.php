@extends('Backend.layouts.master')

@section('content')
    <main class="app-main">
        <div class="container my-5">

            <div class="card shadow-sm">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h2>Courier Info
                                <sub>
                                    ({{ $website_active_id->website->site_url }}.{{ $website_active_id->website->domain_name }})
                                </sub>
                            </h2>
                        </div>
                        <div>
                            <a href="{{ route('courier.index') }}" class="btn btn-dark mb-3">Back</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('courier.store') }}">
                        @csrf <!-- Add CSRF token for security -->

                        <!-- Website Selection -->
                        <div class="mb-4 position-relative">
                            <label for="website_id" class="form-label">Website Name</label>
                            <select class="form-control" id="website_id" name="website_id" required>
                                <option value="" disabled {{ !isset($data) ? 'selected' : '' }}>Select website
                                </option>
                                @foreach ($navbarData as $item)
                                    <option value="{{ $item->id }}"
                                        {{ old('website_id', $website_active_id->user_website_active) == $item->id ? 'selected' : '' }}>
                                        {{ $item->site_name }} - {{ $item->site_url }}.{{ $item->domain_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Courier Name Input -->
                        <div class="mb-4">
                            <label for="courier_name" class="form-label">Courier Name</label>
                            <input type="text" class="form-control" id="courier_name" name="courier_name"
                                value="{{ old('courier_name', $data->courier_name ?? '') }}"
                                placeholder="Enter Courier Name" required>
                        </div>

                        <!-- App Key Input -->
                        <div class="mb-4">
                            <label for="app_key" class="form-label">App Key</label>
                            <input type="text" class="form-control" id="app_key" name="app_key"
                                value="{{ old('app_key', $data->app_key ?? '') }}" placeholder="Enter App Key" required>
                        </div>

                        <!-- App Secret Input -->
                        <div class="mb-4">
                            <label for="app_secret" class="form-label">App Secret</label>
                            <input type="text" class="form-control" id="app_secret" name="app_secret"
                                value="{{ old('app_secret', $data->app_secret ?? '') }}" placeholder="Enter App Secret"
                                required>
                        </div>

                        <!-- Status Dropdown -->
                        <div class="mb-4">
                            <label for="is_active" class="form-label">Status</label>
                            <select class="form-control" id="is_active" name="is_active" required>
                                <option value="1"
                                    {{ old('is_active', $data->is_active ?? '') == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0"
                                    {{ old('is_active', $data->is_active ?? '') == 0 ? 'selected' : '' }}>Inactive
                                </option>
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <div class="mb-4">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </main>
@endsection
