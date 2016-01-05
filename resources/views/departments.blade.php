@extends('master')
@section('title', 'Home')
@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-12 main">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">Create</button>
            @include('partial.add_department')
            <div class="table-responsive">
                @include('partial.showing_error')
                @if ($departments->count() > 0)
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Number of Staffs</th>
                                <th>Description</th>
                                @if (Auth::user()->isAdmin())
                                    <th>Edit</th>
                                    <th>Delete</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($departments as $department)
                                <tr>
                                    <td>{{ $department->id }}</td>
                                    <td>{{ $department->name }}</td>
                                    <td>{{ $department->users()->count() }}</td>
                                    <td>{{ $department->description }}</td>
                                    @if (Auth::user()->isAdmin())
                                        <td>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal{{$department->id}}">Edit</button>
                                            @include('partial.edit_department')
                                        </td>
                                        <td>
                                            {!! Form::open(['route' => ['departments.destroy', $department->id], 'method' => 'delete']) !!}
                                                {!! Form::submit('Delete', ['onclick' => 'return confirm("Are you sure to delete?")', 'class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $departments->appends(Request::except('page'))->render() !!}
                @else
                    No result!
                @endif
            </div>          
        </div>
    </div>
@endsection
