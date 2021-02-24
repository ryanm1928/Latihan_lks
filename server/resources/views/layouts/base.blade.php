<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config("app.name") }}</title>

    <link rel="stylesheet" href="{{ url('/plugins/bootstrap/css/bootstrap.min.css')}}">
    @yield('stylesheets')
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand navbar-dark bg-dark mt-5">
            <div class="container-fluid">
                <a href="" class="navbar-brand">{{ config('app.name') }}</a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    @include('layouts.includes.header-menu')
                </div>
                @auth
                <form action="{{ url('/logout') }}" method="post">
                    @csrf
                    <button class="btn btn-default">Logout</button>
                </form>    
                @endauth
                @guest
                    <a href="{{ route('login') }}" class="btn btn-default bg-light">Login</a>
                @endguest
            </div>
        </nav>
        <main class="pt-2">
            @yield('content', "No contents here")
        </main>
    </div>

    <script src="{{ url('/js/app.js') }}"></script>
    <script src="{{ url('/plugins/jquery/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ url('/plugins/bootstrap/bootstrap.min.js') }}"></script>
    @yield('scripts')
</body>
</html>