@extends('app')

@section('content')
<h1>Index</h1>
<div class="container mt-4">
    <div class="row justify-content-center">
        @if(session('success'))
        <span class="alert alert-success" role="alert">
            <strong>{{ session('success')}}</strong>
        </span>
        @endif
        <a href="{{route('timesheet.create')}}">
            <button type="button" class="btn btn-primary">Create</button>
        </a>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">CustomerID</th>
                    <th scope="col">Pay Period</th>
                    <th scope="col">Check</th>
                    <th scope="col">Status</th>
                    <th scope="col">Note</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($timesheets as $item)
                <tr>
                    <th scope="row">{{$item->id}}</th>
                    <td>{{$item->customer_id}}</td>
                    <td>{{$item->pay_period_init}} to {{$item->pay_period_end}}</td>
                    <td>{{$item->check}}</td>
                    <td>{{$item->status}}</td>
                    <td>{{$item->note}}</td>
                    <td class="row" style="width: fit-content;">
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
    </div>
</div>
@endsection