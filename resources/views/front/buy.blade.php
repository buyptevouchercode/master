@extends('layouts.front.app')

@section('content')

    <div class=banner id=banner>
        <div class=glass>
            <div class="text-center ban-bot">

                <div class=callbacks_container id=top>
                    <div class=row>
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul id="error-list">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="col-md-5" hidden-xs hidden-sm>
                            <ul class=rslides id=slider3>
                                <li>
                                    <div class=ban-info><h3>Buy PTE Voucher Online</h3></div>
                                <li>
                                    <div class=ban-info><h3>Get 11 Scored Mock Test free</h3></div>
                                <li>
                                    <div class=ban-info><h3>24 X 7 Support</h3></div>
                                <li>
                                    <div class=ban-info><h3>SSL Certified & Secure Payment Process</h3></div>
                            </ul>
                        </div>
                        <div class="col-md-5" style="margin-top: 0" ; frm_container>
                            <div class="hidden-xs hidden-sm" style="min-height: 5em;"></div>
                            <form action="{{url('pte/payment-request')}}" name="app_add_form" id="app_form"
                                  style="border-radius: 0px;" method="post"
                                  class="form-horizontal group-border-dashed pte-frm">
                                <h3 style="color:#fff;font-weight:bold;">Limited Time Offer</h3>
                                <h1 style="color:#fff;">Buy PTE Voucher Code for &#8377;{{$rate or ''}} Only</h1>
                                <br>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <select class="form-control" name="state" id="state" required>
                                            <option value="">State</option>
                                            @if(count($state) > 0)
                                                @foreach($state as $row)
                                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>

                                        <input type="text" name="name" id="name" placeholder="Name"
                                               class="form-control" value="{{$name or ''}}" required/>

                                        <input type="email" name="email" id="email" placeholder="Email"
                                               class="form-control" value="{{$email or ''}}" required/>

                                    </div>
                                    <div class="col-xs-6">
                                        <input type="text" name="mobile" id="mobile" placeholder="Mobile" maxlength="10" minlength="10"
                                               class="form-control" value="{{$mobile or ''}}" required/>
                                        <select class="form-control" name="number_of_voucher" id="number_of_voucher"
                                                value="{{old('number_of_voucher')}}" required>
                                                <option value="">QTY.No of Discounted PTE Voucher</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                       </select>
                                        <br>
                                        <h4 style="color:#fff;font-weight:bold;">Rate : &#8377;{{$rate or ''}}/ Promo Code</h4>

                                        <h5 style="color:#fff;text-align:left;">Code Will Be Sent Out On Your Email
                                            Immediately.</h5>
                                    </div>
                                    <input type="hidden" name="user_id" value="{{$user_id or ''}}">

                                </div>
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-xs-12">
                                        <button type="submit" name="save" class="btn btn-success"
                                                style="border: 1px solid #FFF; background-color: #8dbd35;">Buy PTE Promo
                                            Code
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class=clearfix></div>
            </div>
        </div>
    </div>
    <div class=save-main>
        <div class=container><h2 style=color:#fff;font-weight:700>{{$title or ''}}</h2></div>
    </div>
@endsection
@push('script')
<script>
    $('#app_form').submit(function(ev) {
        if ($('#error-list li').length == 0) {
            $("#save").attr("disabled", true);
        }
    });
</script>
@endpush