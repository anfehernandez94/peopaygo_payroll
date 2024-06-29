@extends('app')

@section('content')
<h1>Edit</h1>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Employee') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('employee.update', $employee->id) }}">
                        @method("PATCH")
                        @csrf

                        <div class="mb-3">
                            <label for="customer_id" class="form-label">Customer ID</label>
                            <input type="text" id="customer_id" name="customer_id" class="form-control @error('customer_id') is-invalid @enderror" value="{{ old('customer_id', $employee->customer_id) }}" required>
                            @error('customer_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $employee->name) }}" required>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="pay_type" class="form-label">Pay Type</label>
                            <select id="pay_type" name="pay_type" class="form-control @error('pay_type') is-invalid @enderror" required>
                                <option value="">Select pay type</option>
                                <option value="hourly" {{ $employee->pay_type == 'hourly' ? 'selected' : '' }}>Hourly</option>
                                <option value="salary" {{ $employee->pay_type == 'salary' ? 'selected' : '' }}>Salary</option>
                            </select>
                            @error('pay_type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="pay_rate" class="form-label">Pay Rate</label>
                            <input type="number" id="pay_rate" name="pay_rate" class="form-control @error('pay_rate') is-invalid @enderror" value="{{ old('pay_rate', $employee->pay_rate) }}" required step="0.01" min="0">
                            @error('pay_rate')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection