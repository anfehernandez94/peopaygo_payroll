@extends('app')

@section('content')
<h1>Edit</h1>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Timesheet') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('timesheet.update', $timesheet->id) }}">
                        @method("PATCH")
                        @csrf

                        <div class="mb-3">
                            <label for="customer_id" class="form-label">Customer ID</label>
                            <input type="text" id="customer_id" name="customer_id" class="form-control @error('customer_id') is-invalid @enderror" value="{{ old('customer_id', $timesheet->customer_id) }}" required>
                            @error('customer_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="pay_period_init" class="form-label">Pay Period Start</label>
                            <input type="date" id="pay_period_init" name="pay_period_init" class="form-control @error('pay_period_init') is-invalid @enderror" value="{{ old('pay_period_init', $timesheet->pay_period_init) }}" required>
                            @error('pay_period_init')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="pay_period_end" class="form-label">Pay Period End</label>
                            <input type="date" id="pay_period_end" name="pay_period_end" class="form-control @error('pay_period_end') is-invalid @enderror" value="{{ old('pay_period_end', $timesheet->pay_period_end) }}" required>
                            @error('pay_period_end')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="check" class="form-label">Check Date</label>
                            <input type="date" id="check" name="check" class="form-control @error('check') is-invalid @enderror" value="{{ old('check', $timesheet->check) }}" required>
                            @error('check')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select id="status" name="status" class="form-control @error('status') is-invalid @enderror" required>
                                <option value="">Select status</option>
                                <option value="pending" {{ old('status', $timesheet->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="approved" {{ old('status', $timesheet->status) == 'approved' ? 'selected' : '' }}>Approved</option>
                                <option value="rejected" {{ old('status', $timesheet->status) == 'rejected' ? 'selected' : '' }}>Rejected</option>
                            </select>
                            @error('status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="note" class="form-label">Note</label>
                            <textarea id="note" name="note" class="form-control @error('note') is-invalid @enderror">{{ old('note', $timesheet->note) }}</textarea>
                            @error('note')
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