@extends('layouts.app')
@section('content')
<style>
    .error{color: red;}
</style>
<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="{{ URL::to('dashboard') }}">Home</a>
        </li>
        <li>
            <span>Dashboard</span>
        </li>
    </ul>    
</div>
<!-- END PAGE BAR -->
<!-- BEGIN PAGE TITLE-->
<h1 class="page-title"> Dashboard</h1>
<!-- END PAGE TITLE-->

<!-- BEGIN SAMPLE TABLE PORTLET-->

<!-- END SAMPLE TABLE PORTLET-->

@endsection
