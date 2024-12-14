@extends('Backend.layouts.master')

@section('content')
    <main class="app-main">
        <div class="container my-5">

            <div class="card shadow-sm">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h2>Sms Gateway Info</h2>
                        </div>
                        <div>
                            <a href="{{ route('sms-gateway.index') }}" class="btn btn-dark mb-3">Back</a>
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

                    <form action="{{ route('sms-gateway.store') }}" method="POST">
                        @csrf

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

                        <div class="mb-4">
                            <label for="courier_name" class="form-label">Gateway Name</label>
                            <input type="text" class="form-control" id="gateway_name" name="gateway_name"
                                value="{{ old('gateway_name') ?? ($data->gateway_name ?? '') }}"
                                placeholder="Enter Gateway Name" required>
                        </div>

                        <div class="mb-4">
                            <label for="app_key" class="form-label">App Key</label>
                            <input type="text" class="form-control" id="app_key" name="app_key"
                                value="{{ old('app_key') ?? ($data->app_key ?? '') }}" placeholder="Enter App Key"
                                required>
                        </div>

                        <div class="mb-4">
                            <label for="app_secret" class="form-label">App Secret</label>
                            <input type="text" class="form-control" id="app_secret" name="app_secret"
                                value="{{ old('app_secret') ?? ($data->app_secret ?? '') }}" placeholder="Enter App Secret"
                                required>
                        </div>

                        <div class="mb-4">
                            <label for="is_active" class="form-label">Status</label>
                            <select class="form-control" id="is_active" name="is_active" required>
                                <option value="1"
                                    {{ (old('is_active') ?? ($data->is_active ?? '')) == 1 ? 'selected' : '' }}>
                                    Active
                                </option>
                                <option value="0"
                                    {{ (old('is_active') ?? ($data->is_active ?? '')) == 0 ? 'selected' : '' }}>
                                    Inactive
                                </option>
                            </select>
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            <button type="submit" class="btn btn-primary px-4">
                                {{ isset($data) ? 'Update Sms Gateway' : 'Save Sms Gateway' }}
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </main>
@endsection
