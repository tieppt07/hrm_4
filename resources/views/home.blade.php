@extends('master')
@section('title', 'Home')
@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-12 main">
            {!! Form::open(['id' => 'form-filter']) !!}
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="department" class="control-label">Department</label>
                            {!! Form::select('department', $departments, null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}
            <div class="table-responsive">
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
                                <td>{{ $user->department->name }}</td>
                                <td>{{ $user->position->name }}</td>
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
                {!! $users->render() !!}
            </div>          
        </div>
    </div>
@endsection
