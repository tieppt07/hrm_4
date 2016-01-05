@extends('master')
@section('title', 'Home')
@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-12 main">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">Create</button>
            @include('partial.add_position')
            <div class="table-responsive">
                @include('partial.showing_error')
                @if ($positions->count() > 0)
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Description</th>
                                @if (Auth::user()->isAdmin())
                                    <th>Edit</th>
                                    <th>Delete</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($positions as $position)
                                <tr>
                                    <td>{{ $position->id }}</td>
                                    <td>{{ $position->name }}</td>
                                    <td>{{ $position->description }}</td>
                                    @if (Auth::user()->isAdmin())
                                        <td>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal{{$position->id}}">Edit</button>
                                            @include('partial.edit_position')
                                        </td>
                                        <td>
                                            {!! Form::open(['route' => ['positions.destroy', $position->id], 'method' => 'delete']) !!}
                                                {!! Form::submit('Delete', ['onclick' => 'return confirm("Are you sure to delete?")', 'class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $positions->appends(Request::except('page'))->render() !!}
                @else
                    No result!
                @endif
            </div>          
        </div>
    </div>
@endsection
