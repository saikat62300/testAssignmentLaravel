<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>{{ config('app.name') }} - Admin Login</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="csrf-token" content="<?= csrf_token() ?>" />
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script>
            var app_consts = {"SITEURL": "http://127.0.0.1:8000/", "VIEW_JS": ""};
        </script>
    <style>
        body#LoginForm{background-image:url(https://hdwallsource.com/img/2014/9/blur-26347-27038-hd-wallpapers.jpg);background-repeat:no-repeat;background-position:center;background-size:cover;padding:10px}.form-heading{color:#fff;font-size:23px}.panel h2{color:#444;font-size:18px;margin:0 0 8px}.panel p{color:#777;font-size:14px;margin-bottom:30px;line-height:24px}.login-form .form-control{background:#f7f7f7;border:1px solid #d4d4d4;border-radius:4px;font-size:14px;height:50px;line-height:50px}.main-div{background:#fff;border-radius:2px;margin:10px auto 30px;max-width:38%;padding:50px 70px 70px 71px}.login-form .form-group{margin-bottom:10px}.login-form{text-align:center}.back,.forgot{text-align:left}.forgot a{color:#777;font-size:14px;text-decoration:underline}.login-form .btn.btn-primary{background:#f0ad4e;border-color:#f0ad4e;color:#fff;font-size:14px;width:100%;height:50px;line-height:50px;padding:0}.forgot{margin-bottom:30px}.botto-text{color:#fff;font-size:14px;margin:auto}.login-form .btn.btn-primary.reset{background:#f90}.back{margin-top:10px}.back a{color:#444;font-size:13px;text-decoration:none}.error{color:red;float: left;}
    </style>
</head>

<body id="LoginForm">
    <div class="container">
        @yield('content')
    </div>
    <script type = "text/javascript" src = "{{ asset('js/auth/plugins/jquery.validate.min.js') }}" ></script>
        <script type = "text/javascript" src = "{{ asset('js/auth/plugins/jquery.form.min.js') }}" ></script>
        <script type = "text/javascript" src = "{{ asset('js/auth/plugins/pnotify.custom.min.js ') }}" ></script>
        <script type = "text/javascript" src = "{{ asset('js/auth/plugins/form-submit.js?_=3') }}" ></script>
        <script type = "text/javascript" src = "{{ asset('js/auth/plugins/jquery.cookie.min.js?_=3') }}" ></script>
        <script src="{{ asset('js/auth/main.js') }}"></script>
</body>

</html>