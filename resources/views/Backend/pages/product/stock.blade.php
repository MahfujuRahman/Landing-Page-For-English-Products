@extends('Backend.layouts.master')

@section('content')
    <main class="app-main">
        <div class="container mt-5">
            <div class="card shadow-sm">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h2>Purchase Stock</h2>
                        </div>
                        <div>
                            <a href="{{ route('product.index') }}" class="btn btn-dark mb-3">Back</a>
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
                    <form action="{{ route('product.stock-update', $data->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="total_purchase" class="form-label">Adjust Type</label>
                            <select class="form-control" name="type" id="type">
                                <option value="sale">Sale</option>
                                <option value="purchase">purchase</option>
                                <option value="return">return</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="total_purchase" class="form-label">Adjust Amount</label>
                            <input type="number" class="form-control" id="total_purchase" name="total_purchase">
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            <button type="submit" class="btn btn-primary px-4">Update Stock</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
