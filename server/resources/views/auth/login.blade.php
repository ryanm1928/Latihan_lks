@extends('layouts.base', ["hide_nav"=>true])

@section('content')
    <div id="form-login-wrapper">
        @if(Session::has("error")) 
            <div class="alert alert-danger">{{ Session::get('error') }}</div>
        @endif
        <form action="{{ url("/login") }}" method="post">
            @csrf
            <div class="form-group">
                <label for="" class="control-label">Username</label>
                <input type="text" class="form-control" required name="username" value="{{ old('username') }}" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="" class="control-label">Password</label>
                <input type="password" class="form-control" required name="password" autocomplete="off">
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>
@endsection

@section('stylesheets')
    <style>
        #form-login-wrapper {
            max-width: 400px;
        }
    </style>
@endsection