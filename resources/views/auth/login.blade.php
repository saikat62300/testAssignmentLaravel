@extends('layouts.login')
@section('content')
<style>
    .has-error{border: 1px solid red;}
</style>
<div class="login-form">
    <div class="main-div">
        <div class="panel">
            <h2>Admin Login</h2>
            <p>Please enter your email and password</p>
        </div>
        <form action="{{ URL::route('login') }}" name="form_login"  class="login-form" id="login-form" method="post">
                {{ csrf_field() }}
                <div class="alert alert-danger" style="display:none;"></div>
            <div class="form-group">
                <input type="text" name="username" class="form-control" id="username" placeholder="Username" required>
                @if ($errors->has('username'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('username') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Login</button>

        </form>
    </div>
</div>

<!--<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script>
        $(document).ready(function () {
           $('#Login').validate({// initialize the plugin
               rules: {
                   username: {
                       required: true
                   },
                   password: {
                       required: true
                   }
               },
               messages: {
                   username: "Username can not be blank!",
                   password: "Password can not be blank!",
               }
           });
        });
        </script>-->
        <script src="{{ asset('js/auth/login.js') }}" type="text/javascript"></script>
@endsection