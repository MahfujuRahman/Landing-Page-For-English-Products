@extends('Backend.layouts.master')

@section('content')
    <main class="app-main">
        <div class="container mt-5">
            <div class="card shadow-sm">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h2>Edit Website</h2>
                        </div>
                        <div>
                            <a href="{{ route('website.index') }}" class="btn btn-dark mb-3">Back</a>
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

                    <form action="{{ route('website.update', $data->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4 position-relative" id="name-row">
                            <label for="site_name" class="form-label">Site Name</label>
                            <div class="d-flex justify-content-between">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="site_name" name="site_name"
                                        value="{{ old('site_name', $data->site_name) }}" placeholder="Enter Site Name">
                                </div>
                            </div>
                        </div>

                        <div class="mb-4 position-relative" id="price-row">
                            <label for="site_url" class="form-label">
                                Site Url
                                <sub class="text-success">(eg: hoodie.etek.com.bd)</sub>
                            </label>

                            <div class="d-flex justify-content-between">
                                <div class="col-md-12">
                                    <div class="d-flex">
                                        <div>
                                            <input type="text" class="form-control" id="site_url" name="site_url"
                                                value="{{ old('site_url', $data->site_url) }}"
                                                placeholder="Enter Sub-domain">
                                        </div>
                                        <div class="flex-grow-1 d-grid align-items-center ps-2">
                                            <input type="text" class="form-control" id="domain_name" name="domain_name"
                                                value="{{ old('domain_name', $data->domain_name) }}"
                                                placeholder="Enter Domain Name">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4 position-relative">
                            <label for="is_default" class="form-label">Is Default</label>
                            <div class="d-flex justify-content-between">
                                <div class="col-md-12">
                                    <select class="form-control" id="is_default" name="is_default">
                                        <option value="0" {{ $data->is_default == '0' ? 'selected' : '' }}>No</option>
                                        <option value="1" {{ $data->is_default == '1' ? 'selected' : '' }}>Yes</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4 position-relative" id="discount_price-row">
                            <label for="status" class="form-label">Status</label>
                            <div class="d-flex justify-content-between">
                                <div class="col-md-12">
                                    <select class="form-control" id="status" name="status">
                                        <option value="active" {{ $data->status == 'active' ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="inactive" {{ $data->status == 'inactive' ? 'selected' : '' }}>
                                            Inactive</option>
                                        <option value="deleted" {{ $data->status == 'deleted' ? 'selected' : '' }}>Deleted
                                        </option>
                                    </select>
                                </div>
                            </div>
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

@push('scripts')
    <script>
        document.getElementById('site_name').addEventListener('input', function() {
            const siteName = this.value.trim().toLowerCase();

            const formattedName = siteName
                .replace(/[^a-z0-9\s]/g, ' ')
                .replace(/\s+/g, '-');

            document.getElementById('site_url').value = formattedName;
        });
    </script>
@endpush
