<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Human Resource Management - @yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}"/>  
    <link rel="stylesheet" href="{{ elixir('css/all.css') }}">
    <script src="{{ elixir('js/all.js') }}"></script>  
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/') }}">HRM</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('faq') }}">FAQ</a></li>
                    <li><a href="{{ url('about') }}">About</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if (!Auth::user())
                        <li><a href="{{ url('auth/login') }}">Login</a></li>
                        <li><a href="{{ url('auth/register') }}">Register</a></li>
                    @else
                        <li>
                            {!! Form::open(['class' => 'navbar-form navbar-left']) !!}
                                <div class="form-group">
                                    {!! Form::text('key', null, ['class' => 'form-control', 'placeholder' => 'Enter name or email']) !!}
                                    <button class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                                </div>

                            {!! Form::close() !!}
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="">Profile</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="{{ url('admin/dashboard') }}">Admin Panel</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="{{ url('auth/logout') }}">Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container-fluid">
        @yield('content')
    </div>
    
</body>
</html>
