@extends('payroll')

@section('create')
<h1>Create</h1>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Add Employee') }}</div>

                <div class="card-body">
                    <form action="{{ route('payroll.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="customer_id" class="form-label">Customer ID</label>
                            <input type="text" id="customer_id" name="customer_id" class="form-control @error('customer_id') is-invalid @enderror" value="{{ old('customer_id') }}" required>
                            @error('customer_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Add Employee</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection