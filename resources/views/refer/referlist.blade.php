@extends('layouts.common')
@section('pageTitle')
    Refer Friend
@endsection
@push('externalCssLoad')
<link rel="stylesheet" href="{{url('css/plugins/jquery.datetimepicker.css')}}" type="text/css"/>
@endpush
@push('internalCssLoad')

@endpush
@section('content')
    <div class="be-content">
        <div class="page-head">
            <h2>Refer Friend Management</h2>
            <ol class="breadcrumb">
                <li><a href="{{url('/dashboard')}}">{{trans('app.admin_home')}}</a></li>
                <li class="active">Refer Friend Listing</li>
            </ol>
        </div>
        <div class="main-content container-fluid">

            <!-- Caontain -->
            <div class="panel panel-default panel-border-color panel-border-color-primary pull-left">
                <div class="row">
                    <div class="col-sm-12 col-xs-12">

                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <div class="activity-but activity-space pull-left">
                            <div class="pull-left">
                                <a href="javascript:void(0);" class="btn btn-warning func_SearchGridData"><i
                                            class="icon mdi mdi-search"></i> Search</a>
                            </div>
                            <div class="pull-left">
                                <a href="javascript:void(0);" class="btn btn-danger func_ResetGridData"
                                   style="margin-left: 10px;">Reset</a>
                            </div>
                            <div class="addreport pull-right">
                                <a href="javascript:void(0);" class="export">
                                    <button class="btn btn-space btn-primary"><i
                                                class="icon mdi mdi-plus "></i> Export
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="deta-table user-table pull-left">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-default panel-table">
                                <label>TO:</label> <input type="text" name="filterDate[tbl_refer.created_at]" id="date1" style="width: 100px;" value="" />
                                <label>FROM:</label> <input type="text" name="filterDate1[tbl_refer.created_at]" id="date2" style="width: 100px;" value="" />
                                <div class="panel-body">
                                    <table id="dataTable"
                                           class="table display dt-responsive responsive nowrap table-striped table-hover table-fw-widget"
                                           style="width: 100%;">
                                        <thead>

                                        <tr>
                                            <th>Email</th>
                                            <th>Refer Date</th>
                                        </tr>

                                        </thead>
                                        <thead>
                                        <tr>
                                            <th>
                                                <input type="text" name="filter[email]" style="width: 80px;" id="
                                                       email" value="" />
                                            </th>
                                            <th>
                                            </th>

                                            <input type="hidden" name="filterExport[export_excel]"  id="export_excel" value="0" />

                                        </tr>
                                        </thead>

                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('externalJsLoad')
<script src="{{url('js/appDatatable.js')}}"></script>
<script src="{{url('js/modules/refer.js')}}"></script>
@endpush
@push('internalJsLoad')
<script>
    app.refer.init();
    $( function() {
        $( "#date" ).datepicker({dateFormat: 'dd-mm-yy'});
        $( "#date1" ).datepicker({dateFormat: 'dd-mm-yy'});
        $( "#date2" ).datepicker({dateFormat: 'dd-mm-yy'});
    } );
    $(document).ready(function () {
        $(document).on('click', '.export', function () {
            $('#export_excel').val('1');
            dataTable.ajax.reload();
            $('#export_excel').val('0');
        });

    });
</script>
@endpush