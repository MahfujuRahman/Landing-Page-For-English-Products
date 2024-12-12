@extends('Backend.layouts.master')

@section('content')
    <main class="app-main">
        <div class="container my-5">
            <div class="card shadow-sm">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h2>Create Global Discount</h2>
                        </div>
                        <div>
                            <a href="{{ route('global-discounts.index') }}" class="btn btn-dark mb-3">Back</a>
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

                    <form action="{{ route('global-discounts.store') }}" method="POST" onsubmit="return validateDates()">
                        @csrf

                        <input type="text" hidden name="user_id" value="{{ Auth::user()->id }}">

                        <!-- Site Name -->
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

                        <div class="mb-4">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title"
                                placeholder="Enter Title" required>
                        </div>

                        <div class="mb-4">
                            <label for="discount" class="form-label">Discount Percentage</label>
                            <input type="number" class="form-control" id="discount" name="discount"
                                placeholder="Enter Discount Percentage" required>
                        </div>

                        <div class="mb-4">
                            <label for="start_datetime" class="form-label">Start Date</label>
                            <input type="datetime-local" class="form-control" id="start_datetime" name="start_datetime"
                                placeholder="Enter Date and Time" required>
                        </div>

                        <div class="mb-4">
                            <label for="end_datetime" class="form-label">End Date</label>
                            <input type="datetime-local" class="form-control" id="end_datetime" name="end_datetime"
                                placeholder="Enter Date and Time" required>
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            <button type="submit" class="btn btn-primary px-4">Save Global Discount</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('scripts')
    <script>
        function validateDates() {
            const startDate = new Date(document.getElementById('start_datetime').value);
            const endDate = new Date(document.getElementById('end_datetime').value);

            if (endDate <= startDate) {
                alert('End date must be after start date.');
                return false;
            }
            return true;
        }
    </script>
@endsection
