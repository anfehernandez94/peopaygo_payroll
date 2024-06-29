@extends('app')

@section('content')
<div class="container">
    <h2>Timesheets for Customer: {{ $customer->business_name }}</h2>

    @if($customer->timesheets->isEmpty())
    <p>No timesheets found for this customer.</p>
    @else
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Pay Period</th>
                <th scope="col">Check</th>
                <th scope="col">Status</th>
                <th scope="col">Note</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($customer->timesheets as $item)
            <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->pay_period_init}} to {{$item->pay_period_end}}</td>
                <td>{{$item->check}}</td>
                <td>{{$item->status}}</td>
                <td>{{$item->note}}</td>
                <td class="row" style="width: fit-content;">
                    <a class="col" href="{{route('timesheet.payroll',$item->id)}}">
                        <button type="button" class="btn btn-primary">Payroll</button>
                    </a>
                    <a class="col" href="{{route('timesheet.edit',$item->id)}}">
                        <button type="button" class="btn btn-primary">Edit</button>
                    </a>
                    <form class="col" action="{{ route('timesheet.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete it?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection