@extends('layouts.front.app')

@section('content')

    <!-- navbar ends -->
    <!-- home section starts -->
    <section id="home">
        <div class="container z10">
            <div class="row">
                <div class="col-md-12 text-center">
                </div>
            </div>
            <div class="row">
                <div class="col-md-7">
                    <h1 class="main-title">BUY PTE VOUCHER @ &#8377; <span class="bold"> {{$rate or ''}}</span>.</h1>
                    <div class="text-left home-content">
                        <h4>
                            Guarantee Lowest Price in Inida for booking PTE Exam.
                        </h4>
                        {{--<a href="#"><i class="fa fa-twitter fa-2x"></i></a>
                        <a href="#"><i class="fa fa-facebook fa-2x"></i></a>
                        <a href="#"><i class="fa fa-google-plus fa-2x"></i></a>--}}
                        <div class="button">
                            {{--<a href="https://www.youtube.com/" target="_blank">
                                <button class="btn btn-success"><i class="fa fa-play-circle"></i> WATCH VIDEO</button>
                            </a>
                            <button class="btn btn-primary"><i class="fa fa-paper-plane"></i> GET ACCESS</button>--}}
                        </div>
                    </div>
                </div>
                <div class="col-md-5 text-center">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul id="error-list">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="flash-message">
                        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                            @if(Session::has('alert-' . $msg))
                                <p class="alert alert-{{ $msg }}" style="text-align:center;">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                            @endif
                        @endforeach
                    </div>
                    <div class="access">
                        <h3>BUY PTE VOUCHER AT LOWEST PRICE</h3>
                        {{--<h5>
                            Laborum nulla tenetur corporis numquam placeat cum officiis deserunt beatae cum voluptas. Necessitatibus doloremque optio.
                        </h5>--}}
                        <form role="form" method="post" action="{{url('pte/payment-request')}}"  name="contact-form" data-toggle="validator">
                            <div class="form-group">
                                <input type="text" value="" placeholder="Name" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <input type="email" value="" placeholder="Email" class="form-control" name="email" required>
                            </div>

                            <div class="form-group">
                                <input type="text" value="" placeholder="Contact No" class="form-control" name="mobile" required>
                            </div>

                            <div class="form-group">
                                <select  class="form-control" id="number_of_voucher" name="number_of_voucher"  required data-error="Please enter quantity">
                                    <option>--Select--</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>

                            </div>

                            <button class="btn btn-success large green">BUY NOW</button>
                            <input type="hidden" name="state" value="1">
                            {{ csrf_field() }}

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- home section ends -->
    <!-- services section starts -->
    <section id="services">
        <div class="container-fluid">
            <h1 class="title">WHY BUY PTE VOUCHER AND WHAT IS IT</h1>
            <div class="row">
                <div class="col-md-6">
                    <img src="{{url('css/front/img/2.jpg')}}" alt="" class="img-responsive">
                </div>
                <div class="col-md-6">
                    <div class="info info-horizontal">
                        <div class="icon icon-info">
                            <i class="fa fa-gift"></i>
                        </div>
                        <div class="description">
                            <h4 class="info-title">WHAT IS IT ?</h4>
                                PTE voucher code is an alphanumeric code of 12 digits that can be used to pay PTE academic fee. Buying and using PTE voucher would not only ease down the procedural complication but also provides you handsome saving. PTE comes with two options, either pay the entire PTE Academic fee through direct application or buy PTE voucher for additional benefits.
                            </p>
                        </div>
                    </div>
                    <div class="info info-horizontal">
                        <div class="icon icon-danger">
                            <i class="fa fa-code"></i>
                        </div>
                        <div class="description">
                            <h4 class="info-title">HOW MUCH WILL I SAVE WITH PTE VOUCHER?</h4>
                            <p>
                                The voucher is worth way too less than Pearson’s PTE fee which, when redeemed against PTA Academic exam, would save you Rs. 1600 or more, India wide.
                            </p>
                        </div>
                    </div>
                    <div class="info info-horizontal">
                        <div class="icon icon-success">
                            <i class="fa fa-cubes"></i>
                        </div>
                        <div class="description">
                            <h4 class="info-title">ARE THERE ANY OTHER BENEFITS OF BUYING PTE VOUCHER?</h4>
                            <p>
                                The voucher is valid for the next 11 months to arise maximum chances of passing the exam. This voucher code can be used only once.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- service section ends -->
    <!-- about section starts -->
    <section id="about">
        <div class="container">
            <div class="section-heading text-center">
                <h1 class="title">ABOUT PTE ACADEMIC</h1>
                <h5 class="description">
                    Why should you take this exam?
                </h5>
            </div>
            <div class="row">
                {{--<div class="col-md-4">
                    <div class="info info-horizontal">
                        <div class="icon icon-info">
                            <i class="fa fa-gift"></i>
                        </div>
                        <div class="description">
                            <h4 class="info-title">Effective Commpunication</h4>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet nostrum voluptatum, facere saepe aut repudiandae dolor tempora nemo.
                            </p>
                            <a href="#up">More...</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info info-horizontal">
                        <div class="icon icon-danger">
                            <i class="fa fa-heartbeat"></i>
                        </div>
                        <div class="description">
                            <h4 class="info-title">Quality Design Work</h4>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet nostrum voluptatum, facere saepe aut repudiandae dolor tempora nemo.
                            </p>
                            <a href="#up">More...</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info info-horizontal">
                        <div class="icon icon-success">
                            <i class="fa fa-cubes"></i>
                        </div>
                        <div class="description">
                            <h4 class="info-title">Multipurpose</h4>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet nostrum voluptatum, facere saepe aut repudiandae dolor tempora nemo.
                            </p>
                            <a href="#up">More...</a>
                        </div>
                    </div>
                </div>--}}
                <h5 class="description">
                    The PTE Academic, or Pearson Test of English Academic, is a computer-based 3-hour test session which is accepted by numerous well-known universities and colleges worldwide. To study in English speaking countries, you need to assure your command on language too. PTE academic is the fairest way to do so.
                </h5>
                <h5 class="description">
                    The result of the test is generated within the next 5 working days and allows with flexible dates to the students. PTE Academic consists of three sections to be accomplished in 3 hours which evaluates listening, speaking and writing (together) and reading. PTE Exam has multiple question formats to make a perfect judgment of your skills.
                </h5>
            </div>
            {{--<div class="row">
                <div class="col-md-8">
                    <h4 class="info-title text-center progress-title">Our Progression Bar</h4>
                    <div class="progress-background">
                        <div class="progress">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                <span class="sr-only">60% Complete (success)</span> Development
                            </div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 75%">
                                <span class="sr-only">75% Complete</span> Design
                            </div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 58%">
                                <span class="sr-only">58% Complete (warning)</span> Photography
                            </div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 92%">
                                <span class="sr-only">93% Complete (danger)</span> Icon Design
                            </div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                                <span class="sr-only">70% Complete (danger)</span> Audio
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                </div>
            </div>--}}
        </div>
    </section>
    <!-- about section ends -->
    <!-- count section starts -->
    <section id="count">
        <div class="container z10">
            <div class="row">
                <h1 class="title">OUR ACHIEVEMENTS</h1>
                {{--<h3 class="text-center">
                    We have spent various amounts of time on activities. Oh and we like <br> coffee and free time as well.
                </h3>--}}
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div>
                        <a href="#"><i class="fa fa-graduation-cap"></i></a>
                        <h1>2500+</h1>
                        <h4>Student</h4>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div>
                        <a href="#"><i class="fa fa-users"></i></a>
                        <h1>100%</h1>
                        <h4>Statisfaction</h4>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div>
                        <a href="#"><i class="fa fa-line-chart"></i></a>
                        <h1>100%</h1>
                        <h4>Sucess rate</h4>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div>
                        <a href="#"><i class="fa fa-dollar"></i></a>
                        <h1>100%</h1>
                        <h4>Lowest price</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- count section ends -->
    <!-- profile section starts -->
    {{--<section id="profile">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="title" style="margin: 65px 0 30px;">Profile</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-5 col-xs-8">
                    <img class="profile-img" src="http://placehold.it/651x636" alt="M. Ali" class="img-responsive">
                    <div class="profile-contents">
                        <div class="inside-contents-line">
                            <div class="line">
                                <h6><span>Name:</span> Mark Steve</h6>
                            </div>
                            <div class="line">
                                <h6><span>Nationality:</span> American</h6>
                            </div>
                            <div class="line">
                                <h6><span>Position:</span> Manager</h6>
                            </div>
                            <div class="line">
                                <h6><span>Phone</span> (+12) 12345789</h6>
                            </div>
                            <div class="line">
                                <h6><span>Email:</span> tim@ex.com</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 col-sm-7">
                    <h3 class="about-subtitle" style="margin-top:0;">INTRO</h3>
                    <p>
                        Hi, my name is Tim Anderson. I am the Sellkey manager.
                    </p>
                    <p>
                        We have worked hard and we have absolutely put our effort and attempts over the Sellkey; so that it should become multipurpose, convenient and comfortable for you to use in personal and different purposes.
                    </p>
                    <p class="explaination">
                        You can purchase this template for any use that you intend; in next few weeks and months, I will design and fabricate different other multipurpose, admin and wordpress themes. I have set the price a little lower because it is my first experience in upploading my themes in www.themeforest.com. I am independent web designer and web developer;. And this one, whose name is Sellky, is available and present for you! Keep purchasing and keep enjoying using it in different purposes.
                    </p>
                    <a href="#up">Read More...</a>
                    <h3 class="about-subtitle">SKILLS</h3>
                    <div class="progress">
                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 58%">
                            <span class="sr-only">58% Complete (warning)</span> Photography
                        </div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 92%">
                            <span class="sr-only">93% Complete (danger)</span> Icon Design
                        </div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                            <span class="sr-only">70% Complete (danger)</span> Audio
                        </div>
                    </div>
                    <p>
                        Temporibus reprehenderit odio dolores earum possimus, ea, delectus.
                    </p>
                </div>
            </div>
        </div>
    </section>--}}

    <section id="how">
        <div class="container-fluid">
            <h1 class="title">HOW TO USE PTE VOUCHER ?</h1>
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <div class="pricing-box">
                    <h3 class="headline">BUY PREPAID VOUCHER</h3>
                        <img class="profile-img" src="{{url('css/front/img/discount.png')}}" alt="" style="padding-bottom: 20px;">
                    <div class="description">
                        <h4 class="info-title">This prepaid voucher will cover your full exam fees</h4>
                    </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="pricing-box">
                        <h3 class="headline">REGISTER & BOOK YOUR EXAM SLOT</h3>
                        <img class="profile-img" src="{{url('css/front/img/sign.png')}}" alt="" style="padding-bottom: 20px;">
                        <div class="description">
                            <h4 class="info-title">Open Pte registration website. <a href="https://pearsonpte.com/book" target="_blank" style="color: #8e24aa;">Register yourself</a> and book your exam over there. </h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="pricing-box">
                    <h3 class="headline">ENTER VOUCHER CODE</h3>
                        <img class="profile-img" src="{{url('css/front/img/enter.png')}}" alt="" style="padding-bottom: 20px;">
                    <div class="description">
                        <h4 class="info-title">Enter your voucher code on the payment page to avail the discount</h4>
                    </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- profile section ends -->
    <!-- team section starts -->
    <section id="team" style="overflow:hidden;">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                <li data-target="#carousel-example-generic" data-slide-to="4"></li>
            </ol>
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="{{url('css/front/img/happy.jpeg')}}" class="img-responsive" alt="Slider">
                    <div class="carousel-caption">
                        <div>
                            <img src="http://placehold.it/651x636" class="img-responsive team" alt="">
                            <h2>Mark Steve</h2>
                            <h5>Manager/ CEO</h5>
                            <p>
                                Dicta adipisci, sint autem necessitatibus fugiat. Tenetur maxime earum voluptas.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="{{url('css/front/img/happy.jpeg')}}" class="img-responsive" alt="Slider">
                    <div class="carousel-caption">
                        <div>
                            <img src="http://placehold.it/777x792" alt="" class="img-responsive team">
                            <h2>Mary Melinda</h2>
                            <h5>Designer</h5>
                            <p>
                                Esse atque labore earum nobis reiciendis cum voluptas placeat blanditiis officia doloremque, necessitatibus.
                            </p>

                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="{{url('css/front/img/happy.jpeg')}}" class="img-responsive" alt="Slider">
                    <div class="carousel-caption">
                        <div>
                            <img src="http://placehold.it/637x615" alt="" class="img-responsive team">
                            <h2>John Robert</h2>
                            <h5>Developer</h5>
                            <p>
                                Esse atque labore earum nobis reiciendis cum voluptas placeat blanditiis officia doloremque, necessitatibus.
                            </p>

                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="{{url('css/front/img/happy.jpeg')}}" class="img-responsive" alt="Slider">
                    <div class="carousel-caption">
                        <div>
                            <img src="http://placehold.it/466x452" alt="" class="img-responsive team">
                            <h2>David Rechard</h2>
                            <h5>Accounting</h5>
                            <p>
                                Esse atque labore earum nobis reiciendis cum voluptas placeat blanditiis officia doloremque, necessitatibus.
                            </p>

                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="{{url('css/front/img/happy.jpeg')}}" class="img-responsive" alt="Slider">
                    <div class="carousel-caption">
                        <div>
                            <img src="http://placehold.it/465x456" alt="" class="img-responsive team">
                            <h2>Daniel Paul</h2>
                            <h5>Traveler</h5>
                            <p>
                                Esse atque labore earum nobis reiciendis cum voluptas placeat blanditiis officia.
                            </p>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="fa fa-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="fa fa-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>
    <!-- team section ends -->
    <!-- pricing section starts -->
    <section id="pricing">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="title text-center">FAQS</h1>
                    <h5 class="description text-center">
                        Have any query ?
                    </h5>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12" style="padding-bottom: 20px">
                    <div class="accordion">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <div class="header-title" data-toggle="collapse" data-target="#questionOne" aria-expanded="true" aria-controls="collapseOne">
                                    <i class="fa fa-pencil"></i> How long will it take to receive my PTE Voucher?
                                </div>
                            </div>
                            <div id="questionOne" class="collapse" aria-labelledby="headingOne" data-parent="#question">
                                <div class="card-body">
                                    It will reach you within a few seconds after you pay for it.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <div class="header-title" data-toggle="collapse" data-target="#questionTwo" aria-expanded="false" aria-controls="questionTwo">
                                    <i class="fa fa-pencil"></i>  How long is the PTE voucher valid?
                                </div>
                            </div>
                            <div id="questionTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#question">
                                <div class="card-body">
                                    It has a validity of 11 months.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <div class="header-title" data-toggle="collapse" data-target="#questionThree" aria-expanded="false" aria-controls="questionThree">
                                    <i class="fa fa-pencil"></i>  How many times can I use this voucher code?
                                </div>
                            </div>
                            <div id="questionThree" class="collapse" aria-labelledby="headingThree" data-parent="#question">
                                <div class="card-body">
                                    It can be used only once within the span of 11 months.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingFour">
                                <div class="header-title" data-toggle="collapse" data-target="#questionFour" aria-expanded="false" aria-controls="questionFour">
                                    <i class="fa fa-pencil"></i> How many times can I apply for PTE academic exam?
                                </div>
                            </div>
                            <div id="questionFour" class="collapse" aria-labelledby="headingFour" data-parent="#question">
                                <div class="card-body">
                                    As many times as you want, but you can book one test at a time.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingFive">
                                <div class="header-title" data-toggle="collapse" data-target="#questionFive" aria-expanded="false" aria-controls="questionFive">
                                    <i class="fa fa-pencil"></i> How can I pay to buy PTE voucher?
                                </div>
                            </div>
                            <div id="questionFive" class="collapse" aria-labelledby="headingFive" data-parent="#question">
                                <div class="card-body">
                                    You can pay through a bank account, Net banking All Credits or Debit Cards, all are accepted.
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" id="headingSix">
                                <div class="header-title" data-toggle="collapse" data-target="#questionSix" aria-expanded="false" aria-controls="questionSix">
                                    <i class="fa fa-pencil"></i> How can “buyptevoucher.in” help me?
                                </div>
                            </div>
                            <div id="questionSix" class="collapse" aria-labelledby="headingSix" data-parent="#question">
                                <div class="card-body">
                                    Using this you can book your PTE academic exam at lower prices, with additional Visa consultation to the needy students.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingSeven">
                                <div class="header-title" data-toggle="collapse" data-target="#questionSeven" aria-expanded="false" aria-controls="questionSeven">
                                    <i class="fa fa-pencil"></i> Can I reschedule a PTE-Academic exam?
                                </div>
                            </div>
                            <div id="questionSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#question">
                                <div class="card-body">
                                    Yes, you can but it will take 25% of the current exam fee in India. You need to reschedule it at least 7 days before the original exam date.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingEight">
                                <div class="header-title" data-toggle="collapse" data-target="#questionEight" aria-expanded="false" aria-controls="questionEight">
                                    <i class="fa fa-pencil"></i> Can PTE Academic be used for Student Visa?
                                </div>
                            </div>
                            <div id="questionEight" class="collapse" aria-labelledby="headingEight" data-parent="#question">
                                <div class="card-body">
                                    All countries accept PTE to apply for a student visa application.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingNine">
                                <div class="header-title" data-toggle="collapse" data-target="#questionNine" aria-expanded="false" aria-controls="questionNine">
                                    <i class="fa fa-pencil"></i> What is the age requirement to take PTE academic exam?
                                </div>
                            </div>
                            <div id="questionNine" class="collapse" aria-labelledby="headingNine" data-parent="#question">
                                <div class="card-body">
                                    You should be at least 16 years old to go for it.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTen">
                                <div class="header-title" data-toggle="collapse" data-target="#questionTen" aria-expanded="false" aria-controls="questionTen">
                                    <i class="fa fa-pencil"></i> Can I change the exam center?
                                </div>
                            </div>
                            <div id="questionTen" class="collapse" aria-labelledby="headingTen" data-parent="#question">
                                <div class="card-body">
                                    Yes, it can be changed.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12" style="padding-bottom: 20px">
                    <div class="accordion">
                        <div class="card">
                            <div class="card-header" id="headingOne2">
                                <div class="header-title" data-toggle="collapse" data-target="#questionOne2" aria-expanded="true" aria-controls="collapseOne">
                                    <i class="fa fa-pencil"></i> What are the bases of PTE academic?
                                </div>
                            </div>
                            <div id="questionOne2" class="collapse" aria-labelledby="headingOne" data-parent="#question">
                                <div class="card-body">
                                    You should have an adequate hold over listening, speaking, reading, writing of the English language.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo2">
                                <div class="header-title" data-toggle="collapse" data-target="#questionTwo2" aria-expanded="false" aria-controls="questionTwo">
                                    <i class="fa fa-pencil"></i>  How much will PTE academic cost?
                                </div>
                            </div>
                            <div id="questionTwo2" class="collapse" aria-labelledby="headingTwo" data-parent="#question">
                                <div class="card-body">
                                    The cost of PTE Academic in India is ₹13101. By purchasing the voucher it will cost 11,499 which will save 1602INR.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree2">
                                <div class="header-title" data-toggle="collapse" data-target="#questionThree2" aria-expanded="false" aria-controls="questionThree2">
                                    <i class="fa fa-pencil"></i>Would my handwriting affect my scores in the writing module?
                                </div>
                            </div>
                            <div id="questionThree2" class="collapse" aria-labelledby="headingThree2" data-parent="#question">
                                <div class="card-body">
                                    No, it is a computer-based exam, no pen or pencil needed.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingFour2">
                                <div class="header-title" data-toggle="collapse" data-target="#questionFour2" aria-expanded="false" aria-controls="questionFour2">
                                    <i class="fa fa-pencil"></i>  Can I refund an unused voucher?
                                </div>
                            </div>
                            <div id="questionFour2" class="collapse" aria-labelledby="headingFour2" data-parent="#question">
                                <div class="card-body">
                                    There are certain conditions for return; Moreover, we will refund only 50% of the amount for an unused voucher code.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingFive2">
                                <div class="header-title" data-toggle="collapse" data-target="#questionFive2" aria-expanded="false" aria-controls="questionFive2">
                                    <i class="fa fa-pencil"></i>  How PTE Academic exam differs from PTE General?
                                </div>
                            </div>
                            <div id="questionFive2" class="collapse" aria-labelledby="headingFive2" data-parent="#question">
                                <div class="card-body">
                                    PTE Academic is valid for VISA application, PTE General is not.
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" id="headingSix2">
                                <div class="header-title" data-toggle="collapse" data-target="#questionSix2" aria-expanded="false" aria-controls="questionSix2">
                                    <i class="fa fa-pencil"></i>  Where can I use this PTE Voucher?
                                </div>
                            </div>
                            <div id="questionSix2" class="collapse" aria-labelledby="headingSix2" data-parent="#question">
                                <div class="card-body">
                                    You can use the voucher code to book and pay for Pearson exam while booking your slot through pearsonpte.com/book.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingSeven2">
                                <div class="header-title" data-toggle="collapse" data-target="#questionSeven2" aria-expanded="false" aria-controls="questionSeven2">
                                    <i class="fa fa-pencil"></i>  Can anyone else use the voucher code booked on my name?
                                </div>
                            </div>
                            <div id="questionSeven2" class="collapse" aria-labelledby="headingSeven2" data-parent="#question">
                                <div class="card-body">
                                    Yes, your friends and relatives can use it in your place.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingEight2">
                                <div class="header-title" data-toggle="collapse" data-target="#questionEight2" aria-expanded="false" aria-controls="questionEight2">
                                    <i class="fa fa-pencil"></i>  Where are the centers to take PTE-A?
                                </div>
                            </div>
                            <div id="questionEight2" class="collapse" aria-labelledby="headingEight2" data-parent="#question">
                                <div class="card-body">
                                    There are several centers search for the nearest around you. You can find them in Vijayawada,
                                    Rajkot, Pune, Patiala, Nagpur, Mumbai, Kolkata, Jalandhar, Hyderabad, Delhi, Coimbatore, Cochin, Chennai, Chandigarh, Bangalore, Ahmedabad etc.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingNine2">
                                <div class="header-title" data-toggle="collapse" data-target="#questionNine2" aria-expanded="false" aria-controls="questionNine2">
                                    <i class="fa fa-pencil"></i>  How long will the result take after the exam?
                                </div>
                            </div>
                            <div id="questionNine2" class="collapse" aria-labelledby="headingNine2" data-parent="#question">
                                <div class="card-body">
                                    The result is often declared in 5 working days. If it delays you can call on 0008004402020- person’s toll-free number for more details.
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- pricing section ends -->
    <!-- contact section starts -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="text-center">
                        <h1 class="title">GET IN TOUCH</h1>
                        <h4 style="color: #000">Contact us for any query related to the Pte Voucher</h4>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-5 col-xs-8">
                    <h3 class="about-subtitle" style="color: #000">CONTACT US</h3>
                    <div class="contact">
                        <h6 style="color: #000">Email: contactbuypte@gmail.com</h6>
                    </div>
                </div>
                <div class="col-md-8">
                    <form action="{{url('send-query')}}" id = "contactForm" method="POST">
                    <div class="row">

                        <div class="col-md-5 col-sm-3 col-xs-6">
                            <div class="form-group label-floating contact-form">
                                <label class="control-label">Subject*</label>
                                <input type="text" name="subject" class="form-control" required>
                            </div>
                            <div class="form-group label-floating contact-form">
                                <label class="control-label">Your Name*</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-3 col-xs-6">
                            <div class="form-group label-floating contact-form">
                                <label class="control-label">Phone*</label>
                                <input type="text" name="mobile" class="form-control" required>
                            </div>
                            <div class="form-group label-floating contact-form">
                                <label class="control-label">Email*</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10 col-sm-8 col-xs-9">
                            <div class="form-group label-floating contact-form">
                                <label class="control-label">Message*</label>
                                <textarea class="form-control" name="message" rows="5"></textarea>
                            </div>
                            <button class="btn btn-default text-right">SEND</button>
                        </div>
                    </div>
                        <input type="hidden" name="type" value="send_query">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- contact section ends -->
    <!-- footer section starts -->

    <!-- Subscribe Area End -->


@endsection

