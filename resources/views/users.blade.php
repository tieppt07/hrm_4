@extends('master')
@section('title', 'Home')
@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-12 main">
            {!! Form::open(['id' => 'form-filter', 'method' => 'GET']) !!}
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            @if (isset($departmentId))
                                {!! Form::select('department', $departments, $departmentId, ['class' => 'form-control']) !!}
                            @else
                                {!! Form::select('department', $departments, null, ['class' => 'form-control']) !!}
                            @endif
                        </div>
                    </div>
                    {!! Form::submit('Filter', ['class' => 'btn btn-primary']) !!}
                </div>
            {!! Form::close() !!}
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal">New Staff</button>
            @include('partial.add_user')
            <div class="table-responsive">
                @include('partial.showing_error')
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Birthday</th>
                            <th>Department</th>
                            <th>Position</th>
                            <th>Phone</th>
                            <th>Status</th>
                            @if (Auth::user()->isAdmin())
                                <th>Edit</th>
                                <th>Delete</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->birthday }}</td>
                                <td>{{ $user->department->name or 'Not Defined' }}</td>
                                <td>{{ $user->position->name or 'Not Defined' }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->showStatus() }}</td>
                                @if (Auth::user()->isAdmin())
                                    <td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal{{$user->id}}">Edit</button>
                                        @include('partial.edit_user')
                                    </td>
                                    <td>
                                        {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                                            {!! Form::submit('Delete', ['onclick' => 'return confirm("Are you sure to delete?")', 'class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $users->appends(Request::except('page'))->render() !!}
            </div>          
        </div>
    </div>
@endsection
