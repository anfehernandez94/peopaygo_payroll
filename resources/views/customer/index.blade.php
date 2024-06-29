<!-- resources/views/customers/create.blade.php -->

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
        <a href="{{route('customer.create')}}">
            <button type="button" class="btn btn-primary">Create</button>
        </a>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Business Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $item)
                <tr>
                    <th scope="row">{{$item->id}}</th>
                    <td>{{$item->business_name}}</td>
                    <td>{{$item->email}}</td>
                    <td class="row" style="width: fit-content;">
                        <a class="col" href="{{route('customer.show',$item->id)}}">
                            <button type="button" class="btn btn-primary">Show</button>
                        </a>
                        <a class="col" href="{{route('customer.edit',$item->id)}}">
                            <button type="button" class="btn btn-primary">Edit</button>
                        </a>
                        <form class="col" action="{{ route('customer.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete it?');">
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