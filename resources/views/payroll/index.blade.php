@extends('app')

@section('content')
<h1>Index</h1>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Add Employee Payroll') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('payroll.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="employee_id" class="name">Employee</label>
                            <select id="employee_id" name="employee_id" class="form-control @error('employee_id') is-invalid @enderror" required>
                                <option value="">Select Employee</option>
                                @foreach ($employees as $item)
                                <option value="{{$item->id}}" data-pay-type="{{ $item->pay_type }}" data-pay-rate="{{$item->pay_rate}}">
                                    {{$item->name}}
                                </option>
                                @endforeach
                            </select>
                            @error('employee_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="pay_type" class="form-label">Pay Type</label>
                            <input type="text" id="pay_type" name="pay_type" class="form-control @error('pay_type') is-invalid @enderror" readonly disabled>
                            @error('pay_type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="pay_rate" class="form-label">Pay Rate</label>
                            <input type="text" id="pay_rate" name="pay_rate" class="form-control @error('pay_rate') is-invalid @enderror" readonly disabled>
                            @error('pay_rate')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div id="container-hour_worked" class="mb-3" style="display: none;">
                            <label for="hour_worked" class="form-label">Hours Worked</label>
                            <input type="number" id="hour_worked" name="hour_worked" class="form-control @error('hour_worked') is-invalid @enderror" value="{{ old('hour_worked') }}" required step="1" min="1">
                            @error('hour_worked')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">{{ __('Add') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-4">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Employee</th>
                <th scope="col">Pay Type</th>
                <th scope="col">Pay Rate</th>
                <th scope="col">Hours</th>
                <th scope="col">Gross Wages</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($payrolls as $item)
            <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->customer_id}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->pay_type}}</td>
                <td>{{$item->pay_rate}}</td>



                <td class="row" style="width: fit-content;">
                    <a class="col" href="{{route('payroll.edit',$item->id)}}">
                        <button type="button" class="btn btn-primary">Edit</button>
                    </a>
                    <form class="col" action="{{ route('payroll.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete it?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const employeeSelect = document.getElementById('employee_id');
        const payTypeInput = document.getElementById('pay_type');
        const payRateInput = document.getElementById('pay_rate');
        const hourWorkedContainer = document.getElementById("container-hour_worked");

        employeeSelect.addEventListener('change', function() {
            const selectedOption = employeeSelect.options[employeeSelect.selectedIndex];
            const payType = selectedOption.getAttribute('data-pay-type');
            const payRate = selectedOption.getAttribute('data-pay-rate');

            payTypeInput.value = payType;
            payRateInput.value = payRate;
            if (payType == "hourly") {
                hourWorkedContainer.style.display = 'block';
            } else {
                hourWorkedContainer.style.display = 'none';
            }
        });
    });
</script>
@endsection