@extends('app')

@section('content')
<div class="container">
    <h2>Employees for Customer: {{ $customer->business_name }}</h2>

    @if($customer->employees->isEmpty())
    <p>No employees found for this customer.</p>
    @else
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Pay Type</th>
                <th scope="col">Pay Rate</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customer->employees as $item)
            <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->name}}</td>
                <td>{{$item->pay_type}}</td>
                <td>{{$item->pay_rate}}</td>
                <td class="row" style="width: fit-content;">
                    <a class="col" href="{{route('employee.edit',$item->id)}}">
                        <button type="button" class="btn btn-primary">Edit</button>
                    </a>
                    <form class="col" action="{{ route('employee.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete it?');">
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