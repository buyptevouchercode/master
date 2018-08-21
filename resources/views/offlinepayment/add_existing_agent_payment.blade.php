@extends('layouts.common')
@section('pageTitle')
    {{__('app.default_add_title',["app_name" => __('app.app_name'),"module"=> __('app.add_new_agent_payment')])}}
@endsection

@section('content')
    <div class="be-content">
        <div class="page-head">
            <h2>{{trans('app.offline')}} {{trans('app.management')}}</h2>
            <ol class="breadcrumb">
                <li><a href="{{url('/dashboard')}}">{{trans('app.admin_home')}}</a></li>
                <li><a href="{{url('/offline/add-existing-agent')}}">{{trans('app.offline')}} {{trans('app.management')}}</a></li>
                <li class="active">{{trans('app.add')}} {{trans('app.offline')}}</li>
            </ol>
        </div>
        <div class="main-content container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default panel-border-color panel-border-color-primary">
                        <div class="panel-heading panel-heading-divider"> {{trans('app.add_existing_agent_payment')}}</div>
                        <div class="panel-body">
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{url('/offline/store-existing-agent-payment')}}" name="app_add_form" id="app_form" style="border-radius: 0px;" method="post" class="form-horizontal group-border-dashed">

                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Agent List <span class="error">*</span></label>
                                    <div class="col-sm-6 col-md-4">
                                        <select class="form-control input-sm required" name="user_id" id="user_id">
                                            <option value="">{{trans('app.select')}} Agent</option>
                                            @if(count($agentData) > 0)
                                                @foreach($agentData as $row)
                                                    <option value="{{$row->id}}">{{$row->name}}- {{$row->email}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Number Of Voucher<span class="error">*</span></label>
                                    <div class="col-sm-6 col-md-4">
                                        <input type="number" name="number_of_voucher" id="number_of_voucher" placeholder="Number Of Voucher" class="form-control input-sm required" value="{{old('number_of_voucher')}}" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Rate<span class="error">*</span></label>
                                    <div class="col-sm-6 col-md-4">
                                        <input type="text" name="rate" id="rate" placeholder="Rate" class="form-control input-sm required" value="{{old('rate')}}" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Payment Id<span class="error">*</span></label>
                                    <div class="col-sm-6 col-md-4">
                                        <input type="text" name="payment_id" id="payment_id" placeholder="Payment Id" class="form-control input-sm required" value="{{old('payment_id')}}" />
                                    </div>
                                </div>


                                {{ csrf_field() }}

                                <div class="col-sm-6 col-md-8 savebtn">
                                    <p class="text-right">
                                        <button type="submit" class="btn btn-space btn-info btn-lg">{{trans('app.add')}} Payment</button>
                                        <a href="{{url('/offline/add-existing-agent-payment')}}" class="btn btn-space btn-danger btn-lg">Cancel</a>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

