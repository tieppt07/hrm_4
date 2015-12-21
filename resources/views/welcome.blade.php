@extends('master')
@section('title', 'Welcome')

@section('content')
    <div class="jumbotron">
        <div class="container">
        <h1>Hello, world!</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae dolor voluptate placeat assumenda tempora nobis, deserunt veniam aspernatur maiores eligendi iste, ipsa, ex asperiores cupiditate eos exercitationem dicta inventore. Aspernatur iure blanditiis in ducimus, dolore? Cupiditate velit debitis sequi possimus.</p>
            <p><a class="btn btn-primary btn-lg" href="{{ url('auth/login') }}" role="button">Log in</a></p>
        </div>
    </div>
@endsection
