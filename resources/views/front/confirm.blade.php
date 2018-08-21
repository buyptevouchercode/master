@extends('layouts.front.app')

@section('content')
    <div class="main_content" style="background-color:#c1c1c100 ">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h1>Please confirm the Details</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="confirm_icon">
                <center>
                    <img style="align-items: center;width:100px;height:100px;" alt="Confirm Icon"
                         src={{url('css/front/images/confirm_icon.png')}}>
                </center>
            </div>
            <div class="col-md-12" >
                <form action="{{url('pte/payment-request')}}" name="app_add_form" id="app_form"
                      style="border-radius: 0px; background-color:#c1c1c100 !important;" method="post"
                      class="form-horizontal group-border-dashed pte-frm">


                    <div class="col-md-12">
                        <label class="col-sm-4 control-label">State<span class="error">*</span></label>
                        <div class="col-md-4">
                            <select class="form-control" name="state" id="state" required>
                                <option value="">State</option>
                                @if(count($state_name) > 0)
                                    @foreach($state_name as $row)
                                        <option value="{{$row->id}}" @if($requestData['state'] == $row->id){{"selected"}}@endif>{{$row->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                    </div>
                    <div class="col-md-12">
                        <label class="col-sm-4 control-label">Name<span class="error">*</span></label>
                        <div class="col-md-4">
                            <input type="text" name="name" id="name" placeholder="Name"
                                   class="form-control" value="{{$requestData['name'] or ''}}" required/>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label class="col-sm-4 control-label">Email<span class="error">*</span></label>
                        <div class="col-md-4">
                            <input type="email" name="email" id="email" placeholder="Email"
                                   class="form-control" value="{{$requestData['email'] or ''}}" required/>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label class="col-sm-4 control-label">Mobile<span class="error">*</span></label>
                        <div class="col-md-4">
                            <input type="text" name="mobile" id="mobile" placeholder="Mobile" maxlength="10"
                                   minlength="10"
                                   class="form-control" value="{{$requestData['mobile'] or ''}}" required/>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label class="col-sm-4 control-label">Number Of Voucher<span class="error">*</span></label>
                        <div class="col-md-4">
                            <select class="form-control" name="number_of_voucher" id="number_of_voucher"
                                    value="{{old('number_of_voucher')}}" required>
                                <option value="">QTY.No of Discounted Voucher</option>
                                <option value="1" @if('1' == $requestData['number_of_voucher']){{"selected"}}@endif>1
                                </option>
                                <option value="2" @if('2' == $requestData['number_of_voucher']){{"selected"}}@endif>2
                                </option>
                                <option value="3" @if('3' == $requestData['number_of_voucher']){{"selected"}}@endif>3
                                </option>
                                <option value="4" @if('4' == $requestData['number_of_voucher']){{"selected"}}@endif>4
                                </option>
                                <option value="5" @if('5' == $requestData['number_of_voucher']){{"selected"}}@endif>5
                                </option>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="user_id" value="{{$requestData['user_id'] or ''}}">
                    <div class="col-md-12">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <h5 style="color:red;padding-top:10px;padding-bottom: 10px;">Note: Please verify the email
                                and number as code will be send to mention details</h5>
                        </div>
                    </div>

                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-6">
                            <button type="submit" name="save" id="save" class="btn btn-success"
                                    style="border: 1px solid #FFF; background-color: #8dbd35;padding: 6px 40px;">PAY NOW
                            </button>
                        </div>
                        <div class="col-md-2"></div>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection
@push('script')
<script>
    $('#app_form').submit(function (ev) {
        if ($('#error-list li').length == 0) {
            $("#save").attr("disabled", true);
        }
    });
</script>
@endpush