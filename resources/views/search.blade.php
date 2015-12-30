@extends('master')
@section('title', 'Home')
@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-12 main">
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
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $users->appends(Request::except('page'))->render() !!}
            </div>
        </div>
    </div>
@endsection
