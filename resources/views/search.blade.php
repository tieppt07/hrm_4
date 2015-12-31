@extends('master')
@section('title', 'Home')
@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-12 main">
            <div class="row">
                <div class="col-xs-8 col-sm-offset-2">
                    {!! Form::open(['url' => 'search', 'method' => 'GET', 'class' => 'form-group']) !!}
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-group">
                                {!! Form::label('key', 'Advanced Search:', ['class' => 'control-label']) !!}
                                {!! Form::text('key', $key, ['class' => 'form-control', 'placeholder' => 'Enter name or email or phone', 'required']) !!}
                            </div>
                        </div>
                        <div class="col-xs-5">
                            <div class="form-group">
                                {!! Form::label('department', 'Department:', ['class' => 'control-label']) !!}
                                @if (isset($departmentId))
                                    {!! Form::select('department', $departments, $departmentId, ['class' => 'form-control']) !!}
                                @else
                                    {!! Form::select('department', $departments, null, ['class' => 'form-control']) !!}
                                @endif
                            </div>
                        </div>
                        <div class="col-xs-5">
                            <div class="form-group">
                                {!! Form::label('position', 'Position:', ['class' => 'control-label']) !!}
                                @if (isset($positionId))
                                    {!! Form::select('position', $positions, $positionId, ['class' => 'form-control']) !!}
                                @else
                                    {!! Form::select('position', $positions, null, ['class' => 'form-control']) !!}
                                @endif
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <button type="submit" class="btn btn-default">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <caption>Results: {{ $users->count()  }}</caption>
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
