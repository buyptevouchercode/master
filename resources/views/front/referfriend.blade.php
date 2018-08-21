@extends('layouts.front.app')

@section('content')

    <div class=hd>
        <div class=glass2 style=background:rgba(0,0,0,.6)><h1>Refer Friend</h1></div>
    </div>
    <div class=container style="padding:80px 0">
        <div class=row>
            <div class=col-md-1></div>
            <div class=col-md-6 style=padding:40px>

                <form action="{{url('refer/store')}}" name="app_add_form" id="app_form"  method="post" >
                    <h2>Refferal Form</h2><br>
                    <input class=form-control name="email" placeholder="Enter Your Friend Email" required><br>
                    <button class="btn btn-success" style='float:right;' type=submit><i
                                class="glyphicon glyphicon-send"></i> Refer Your Friend
                    </button>
                    {{ csrf_field() }}
                </form>
                <div style=clear:both;min-height:20px></div>
            </div>
            <div class=col-md-5 style=padding:40px><h1>Contact Details</h1><br>
                <table class=table>
                    <tr>
                        <th>E-mail
                        <td>info@ptepromocode.com
                    <tr>
                        <th style=min-width:100px>Contact No.
                        <td>+91 - 7434 - 009400
                    <tr>
                        <th>Address
                        <td>B-120, Balaji Industries Society, Part-2, Opp. Surya Plaza, Near Arancia Kuchen, Bhatar,
                            Surat - 395002 (Gujarat) INDIA.
                    <tr>
                        <th>
                        <td>
                </table>
            </div>
        </div>
    </div>
    <div></div>
@endsection
