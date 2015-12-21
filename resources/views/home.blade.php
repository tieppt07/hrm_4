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
                            <th>Position</th>
                            <th>Phone</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($staffs as $staff)
                            <tr>
                                <td>{{ $staff->id }}</td>
                                <td>{{ $staff->name }}</td>
                                <td>{{ $staff->email }}</td>
                                <td>{{ $staff->position->name }}</td>
                                <td>{{ $staff->phone }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $staffs->render() !!}
            </div>          
        </div>
    </div>
@endsection