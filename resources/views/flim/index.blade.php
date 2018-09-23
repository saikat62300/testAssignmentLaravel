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
            <span>Flims</span>
        </li>
    </ul>    
</div>
<!-- END PAGE BAR -->
<!-- BEGIN PAGE TITLE-->
<h1 class="page-title"> Manage Flims</h1>
<!-- END PAGE TITLE-->

@if(Session::has('success'))
<p class="alert alert-success">{{ Session::get('success') }}</p>
@endif
@if(Session::has('error'))
<p class="alert alert-danger">{{ Session::get('error') }}</p>
@endif
<!-- BEGIN SAMPLE TABLE PORTLET-->
<div class="portlet box green">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-list"></i> Flims Listing 
        </div>        
        <div class="pull-right">
            <a href="{{ URL::to('addFlim') }}" class="btn btn-primary">+ Add Flim</a>
        </div>
    </div>
    <div class="portlet-body flip-scroll">
        <table id="flim-table" class="table table-bordered table-striped table-condensed flip-content">
            <thead class="flip-content">
                <tr>
                    <th> Id </th>
                    <th> Name </th>
                    <th> Created At </th>
                    <th> Updated At </th>
                    <th> Action </th>
                </tr>
            </thead>            
        </table>
    </div>
</div>
<!-- END SAMPLE TABLE PORTLET-->

<script>
    $(function () {
        pageDatatable();
    });

    $(document).on('click', '.item-remove', function (e) {
        e.preventDefault();
        var _this = $(this);
        var request = $.ajax({
            url: "{{ URL::to('removeFlim') }}" + '?id=' + _this.data('id')+'&_token=<?= csrf_token() ?>',
            method: "POST",
            dataType: "json"
        });
        request.done(function (resp) {
            if (resp.type == 'success') {
                var table = $('#flim-table').DataTable();
                table.destroy();
                pageDatatable();
            }
        });
    });

    function pageDatatable() {
        $('#flim-table').DataTable({
            serverSide: true,
            processing: true,
            ajax: "{{ URL::to('manageFlims-data') }}",
            columns: [
                {data: 'id'},
                {data: 'name'},
                {data: 'created_at'},
                {data: 'updated_at'},
                {data: 'action', orderable: false, searchable: false}
            ]
        });
    }

</script>
@endsection
