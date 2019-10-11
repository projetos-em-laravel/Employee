@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{session('success')}}
                        </div>
                    @endif
                    <a href="{{route('employee.create')}}" class="btn btn-primary">Create</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employees as $employee)
                            <tr>
                                <td scope="row">{{$employee->name}}</td>
                                <td>{{$employee->email}}</td>
                                <td>
                                    <form action="{{route('employee.destroy', $employee->id)}}" method="POST">
                                        @csrf
                                        <a href="{{route('employee.show', $employee->id)}}" class="btn btn-primary">Show</a>
                                        <a href="{{route('employee.edit', $employee->id)}}" class="btn btn-warning">Edit</a>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
