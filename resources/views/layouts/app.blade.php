<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="<?= csrf_token() ?>" />
    <title>{{ config('app.name') }}</title>
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/shop-item.css') }}" rel="stylesheet">
    <link href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <style>
        .page-bar{padding-top: 30px;}
        .portlet {
            background: #f2f2f2;
	padding: 20px;
    margin-bottom: 30px;
}

.portlet.portlet-gray {
	background: #f7f7f7;
}

.portlet.portlet-bordered {
	border: 1px solid #eee;
}

/* Portlet Title */
.portlet-title {
	padding: 0;
  	min-height: 40px;
  	border-bottom: 1px solid #777777;
  	margin-bottom: 18px;
}

.caption {
	float: left;
	display: inline-block;
	font-size: 18px;
	line-height: 18px;
}

.caption.caption-green .caption-subject,
.caption.caption-green i {
	color: #4db3a2;
	font-weight: 200;
}

.caption.caption-red .caption-subject,
.caption.caption-red i {
	color: #e26a6a;
	font-weight: 200;
}

.caption.caption-purple .caption-subject,
.caption.caption-purple i {
	color: #8775a7;
	font-weight: 400;
}

.caption i {
	color: #777;
	font-size: 15px;
	font-weight: 300;
	margin-top: 3px;
}

.caption-subject {
	color: #666;
	font-size: 16px;
	font-weight: 600;
}

.caption-helper {
	padding: 0;
	margin: 0;
	line-height: 13px;
	color: #9eacb4;
	font-size: 13px;
	font-weight: 400;
}

/* Actions */
.actions {
	float: right;
  	display: inline-block;
}

.actions a {
	margin-left: 3px;
}

.actions .btn {
	color: #666;
	padding: 3px 9px;
	font-size: 13px;
  	line-height: 1.5;
  	background-color: #fff;
  	border-color: #ccc;
  	border-radius: 50px;
}

.actions .btn i {
	font-size: 12px;
}

.actions .btn:hover {
	background: #f2f2f2;
}
    padding-bottom: 20px;}
   
    ul.page-breadcrumb {
    padding: 10px 16px;
    list-style: none;
}
ul.page-breadcrumb li {
    display: inline;
    font-size: 18px;
}
ul.page-breadcrumb li+li:before {
    padding: 8px;
    color: black;
    content: "/\00a0";
}
ul.page-breadcrumb li a {
    color: #0275d8;
    text-decoration: none;
}
ul.page-breadcrumb li a:hover {
    color: #01447e;
    text-decoration: underline;
}
.page-breadcrumb{
        background-color: #F2F2F2 !important;
    padding-top: 5px;
    padding-bottom: 5px;
    }

/* Pagination */
.pagination {
	margin: -3px 0 0;
	border-radius: 50px;
}

.pagination > li > a,
.pagination > li > span {
	padding: 4px 10px;
	font-size: 12px;
	color: #8775a7;
	background: #f7f7f7;
}

.pagination > li:hover > a,
.pagination > li.active > a,
.pagination > li.active:hover > a {
	color: #fff;
	background: #8775a7;
	border-color: #8775a7;
}
    </style
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ URL::route('dashboard.index') }}">{{ config('app.name') }}</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            @include('includes.topbar')            
        </div>
    </nav>

    <!-- Page Content -->
    <div class="container" style="min-height:500px;">

        <div class="row">

            <div class="col-lg-3">
                <h1 class="my-4">{{ config('app.name') }}</h1>
                @include('includes.sidebar')
            </div>
            <!-- /.col-lg-3 -->

            <div class="col-lg-9">

                    @yield('content')
                <!-- /.card -->

            </div>
            <!-- /.col-lg-9 -->

        </div>

    </div>
    <!-- /.container -->

    <!-- Footer -->
    @include('includes.footer')
    

    <!-- Bootstrap core JavaScript -->
    
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>