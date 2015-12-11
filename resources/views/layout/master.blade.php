<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PMIS</title>

    <link href="{{ asset('/css/all.css') }}" rel="stylesheet">
    @section('css')
    @show
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container">
        <div class="row">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                {{--<a class="navbar-brand" href="#">{ PMIS }</a>--}}
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="{{ Request::is('/') ? 'active': null}}"><a href="{{ url('/') }}"><i class="ion ion-ios-home"></i>&nbsp;Home</a></li>
                    <li class="{{ Request::is('client*') ? 'active': null}}"><a href="{{ url('/client') }}"><i class="ion ion-ios-home"></i>&nbsp;Clients</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row">
        @if(session()->has('error'))
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Warning!</strong> {{ session('error').session()->forget('error') }}.
            </div>

        @elseif(session()->has('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Success!</strong> {{ session('success').session()->forget('success') }}
            </div>

        @endif


    </div>
    @yield('content')
</div>
<script src="{{ asset('/js/app.js') }}"></script>
@section('js')
@show
</body>
</html>