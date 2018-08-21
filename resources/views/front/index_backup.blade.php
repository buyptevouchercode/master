@extends('layouts.front.app')

@section('content')

    <!-- Header Area wrapper End -->
    <!-- Form -->
    <div class="row">
        <div class="col-lg-5 col-md-12 col-xs-12 banner-form">
            <div class="container-form wow fadeInLeft" data-wow-delay="0.2s">
                <div class="form-wrapper">
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
                    <form role="form" method="post" action="{{url('pte/payment-request')}}"  name="contact-form" data-toggle="validator">
                        <div class="row">
                            <div class="col-md-6 form-line">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" required data-error="Please enter your name">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-6 form-line">
                                <div class="form-group">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required data-error="Please enter your Email">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12 form-line">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="phone" name="mobile" placeholder="Contact No." required data-error="Please enter your Contact No.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12 form-line">
                                <div class="form-group">
                                    <select type="text" class="form-control" id="name" name="number_of_voucher" placeholder="Quantity Of Voucher" required data-error="Please enter quantity">
                                        <option>--Select--</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <input type="hidden" name="state" value="1">
                            {{ csrf_field() }}
                            <div class="col-md-12">
                                <div class="form-submit">
                                    <button type="submit" class="btn btn-common" id="form-submit"><i class="fa fa-paper-plane" aria-hidden="true"></i>  Buy Now</button>
                                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- About Section Start -->
    <section id="about" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title-header text-center">
                        <h1 class="section-title wow fadeInUp" data-wow-delay="0.2s">About PTE Academic</h1>
                        <p class="wow fadeInDown" data-wow-delay="0.2s">Why should you take this exam?</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xs-12 wow fadeInRight" data-wow-delay="0.3s">
                    <div class="video">
                        <img class="img-fluid" src="{{url('css/front1/assets/img/about/about.jpg')}}" alt="">
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xs-12 wow fadeInLeft" data-wow-delay="0.3s">
                    <br>
                    <p class="intro-desc">The PTE Academic, or Pearson Test of English Academic, is a computer-based 3-hour test
                        session which is accepted by numerous well-known universities and colleges worldwide. To
                        study in English speaking countries, you need to assure your command on language too. PTE
                        academic is the fairest way to do so.
                    </p>
                    <br>
                    <p class="intro-desc">The result of the test is generated within the next 5 working days and allows with flexible dates
                        to the students. PTE Academic consists of three sections to be accomplished in 3 hours which
                        evaluates listening, speaking and writing (together) and reading. PTE Exam has multiple
                        question formats to make a perfect judgment of your skills.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section End -->

    <!-- About Section Start -->
    <section id="event-slides" class="section-padding" style="background-color:#cccccc6b;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title-header text-center">
                        <h1 class="section-title wow fadeInUp" data-wow-delay="0.2s">Why Buy PTE Voucher and what is it?</h1>
                        <p class="wow fadeInDown" data-wow-delay="0.2s">&nbsp;</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-6 col-xs-12 wow fadeInLeft" data-wow-delay="0.3s">
                    <p class="intro-desc">PTE voucher code is an alphanumeric code of 12 digits that can be used to pay PTE academic
                        fee. Buying and using PTE voucher would not only ease down the procedural complication but
                        also provides you handsome saving. PTE comes with two options, either pay the entire PTE
                        Academic fee through direct application or buy PTE voucher for additional benefits.
                    </p>
                    <h2 class="intro-title">How much will I Save With PTE Voucher?</h2>
                    <ul class="list-specification">
                        <li><i class="lni-check-mark-circle"></i> The voucher is worth way too less than Pearson’s PTE fee which, when redeemed against PTA Academic exam, would save you Rs. 1600 or more, India wide.</li>
                    </ul>

                    <h2 class="intro-title">Are there any Other Benefits of buying PTE Voucher?</h2>
                    <ul class="list-specification">
                        <li><i class="lni-check-mark-circle"></i> Along with this, the candidates will get PTE package inclusion with benefits of mock test series and reference material to support their exam preparation. The voucher is valid for the next 11
                            months to arise maximum chances of passing the exam. This voucher code can be used only
                            once.
                        </li>
                    </ul>
                </div>

                <div class="col-md-6 col-lg-6 col-xs-12 wow fadeInRight" data-wow-delay="0.3s">
                    <div class="video">
                        <img class="img-fluid" src="{{url('css/front1/assets/img/about/about2.jpg')}}" alt="">
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- About Section End -->

    <!-- Services Section Start -->
    <section id="services" class="services section-padding" >
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title-header text-center">
                        <h1 class="section-title wow fadeInUp" data-wow-delay="0.2s">Why Choose Us?</h1>
                        <!-- <p class="wow fadeInDown" data-wow-delay="0.2s">&nbsp;</p> -->
                    </div>
                </div>
            </div>
            <div class="row services-wrapper">
                <!-- Services item -->
                <div class="col-md-6 col-lg-4 col-xs-12 padding-none">
                    <div class="services-item wow fadeInDown" data-wow-delay="0.2s">
                        <div class="icon">
                            <i class="far fa-heart"></i>
                        </div>
                        <div class="services-content">
                            <h3><a href="#">We Offer a maximum <br>discount on PTE fee</a></h3>
                            <!-- <p>Lorem ipsum dolor sit amet, consectetuer commodo ligula eget dolor.</p> -->
                        </div>
                    </div>
                </div>
                <!-- Services item -->
                <div class="col-md-6 col-lg-4 col-xs-12 padding-none">
                    <div class="services-item wow fadeInDown" data-wow-delay="0.4s">
                        <div class="icon">
                            <i class="far fa-comment-alt"></i>
                        </div>
                        <div class="services-content">
                            <h3><a href="#">Live Chat Support <br>available</a></h3>
                            <!-- <p>Lorem ipsum dolor sit amet, consectetuer commodo ligula eget dolor.</p> -->
                        </div>
                    </div>
                </div>
                <!-- Services item -->
                <div class="col-md-6 col-lg-4 col-xs-12 padding-none">
                    <div class="services-item wow fadeInDown" data-wow-delay="0.6s">
                        <div class="icon">
                            <i class="far fa-credit-card"></i>
                        </div>
                        <div class="services-content">
                            <h3><a href="#">Flexible Payment <br>Modes</a></h3>
                            <!-- <p>Lorem ipsum dolor sit amet, consectetuer commodo ligula eget dolor.</p> -->
                        </div>
                    </div>
                </div>
                <!-- Services item -->
                <div class="col-md-6 col-lg-4 col-xs-12 padding-none">
                    <div class="services-item wow fadeInDown" data-wow-delay="0.8s">
                        <div class="icon">
                            <i class="far fa-calendar-alt"></i>
                        </div>
                        <div class="services-content">
                            <h3><a href="#">Test Centre &amp; Dates <br>Availability.</a></h3>
                            <!-- <p>Lorem ipsum dolor sit amet, consectetuer commodo ligula eget dolor.</p> -->
                        </div>
                    </div>
                </div>
                <!-- Services item -->
                <div class="col-md-6 col-lg-4 col-xs-12 padding-none">
                    <div class="services-item wow fadeInDown" data-wow-delay="1s">
                        <div class="icon">
                            <i class="fas fa-book-open"></i>
                        </div>
                        <div class="services-content">
                            <h3><a href="#">Free Reference <br>Material.</a></h3>
                            <!-- <p>Lorem ipsum dolor sit amet, consectetuer commodo ligula eget dolor.</p> -->
                        </div>
                    </div>
                </div>
                <!-- Services item -->
                <div class="col-md-6 col-lg-4 col-xs-12 padding-none">
                    <div class="services-item wow fadeInDown" data-wow-delay="1.2s">
                        <div class="icon">
                            <i class="fab fa-expeditedssl"></i>
                        </div>
                        <div class="services-content">
                            <h3><a href="#">SSL <br>Secured</a></h3>
                            <!-- <p>Lorem ipsum dolor sit amet, consectetuer commodo ligula eget dolor.</p> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services Section End -->


    <!-- Counter Area Start-->
    <section class="counter-section section-padding">
        <div class="container">
            <div class="row">
                <!-- Counter Item -->
                <div class="col-md-6 col-lg-3 col-xs-12 work-counter-widget text-center">
                    <div class="counter wow fadeInRight" data-wow-delay="0.3s">
                        <div class="icon"><i class="fas fa-user-graduate"></i></div>
                        <p>Students</p><br>
                        <span>25,000+</span>
                    </div>
                </div>
                <!-- Counter Item -->
                <div class="col-md-6 col-lg-3 col-xs-12 work-counter-widget text-center">
                    <div class="counter wow fadeInRight" data-wow-delay="0.6s">
                        <div class="icon"><i class="fas fa-users"></i></div>
                        <p>Happy Customers</p><br>
                        <span>100%</span>
                    </div>
                </div>
                <!-- Counter Item -->
                <div class="col-md-6 col-lg-3 col-xs-12 work-counter-widget text-center">
                    <div class="counter wow fadeInRight" data-wow-delay="0.9s">
                        <div class="icon"><i class="fas fa-chart-line"></i></div>
                        <p>Success rate.</p>    <br>
                        <span>100%</span>
                    </div>
                </div>
                <!-- Counter Item -->
                <div class="col-md-6 col-lg-3 col-xs-12 work-counter-widget text-center">
                    <div class="counter wow fadeInRight" data-wow-delay="1.2s">
                        <div class="icon"><i class="fas fa-dollar-sign"></i></div>
                        <p>Lowest Prices</p><br>
                        <span>100%</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Counter Area End-->

    <!-- FAQS Slider -->

    <section id="howuse" class="crumina-module crumina-module-slider pt100 section-padding">
        <div class="container">

            <div class="row">
                <div class="col-12">
                    <div class="section-title-header text-center">
                        <h1 class="section-title wow fadeInUp" data-wow-delay="0.2s">How to use the PTE Voucher Code?</h1>
                        <p class="wow fadeInDown" data-wow-delay="0.2s">&nbsp;</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="swiper-container navigation-bottom" data-effect="fade">
                        <div class="slider-slides">
                            <a href="#" class="slides-item">
                                1
                            </a>

                            <a href="#" class="slides-item">
                                2
                            </a>

                            <a href="#" class="slides-item">
                                3
                            </a>
                        </div>
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="row">
                                    <div class="col-lg-4 col-md-12 col-sm-12" data-swiper-parallax="-100">
                                        <div class="slider-faqs-thumb">
                                            <img class="utouch-icon" src="{{url('css/front1/svg-icons/payment-method.svg')}}" alt="image">
                                        </div>
                                    </div>

                                    <div class="col-lg-8 col-md-12 col-sm-12" data-swiper-parallax="-300">
                                        <h5 class="slider-faqs-title">Buy Prepaid Voucher</h5>

                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <p class="slider-faq-p">Covers your full test fees
                                                </p>
                                                <!-- <p>Gest etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum.</p> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="row">
                                    <div class="col-lg-4 col-md-12 col-sm-12" data-swiper-parallax="-100">
                                        <div class="slider-faqs-thumb">
                                            <img class="utouch-icon" src="{{url('css/front1/svg-icons/dial.svg')}}" alt="image">
                                        </div>
                                    </div>

                                    <div class="col-lg-8 col-md-12 col-sm-12" data-swiper-parallax="-300">
                                        <h5 class="slider-faqs-title">Enter Voucher Code</h5>
                                        <p class="slider-faq-p">On PTE Registration Website
                                        </p>


                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="row">
                                    <div class="col-lg-4 col-md-12 col-sm-12" data-swiper-parallax="-100">
                                        <div class="slider-faqs-thumb">
                                            <img class="utouch-icon" src="{{url('css/front1/svg-icons/devices.svg')}}" alt="image">
                                        </div>
                                    </div>

                                    <div class="col-lg-8 col-md-8 col-sm-12" data-swiper-parallax="-100">
                                        <h5 class="slider-faqs-title">Done</h5>
                                        <p class="slider-faq-p">Best wishes for your test! Did you practice from the book we sent?
                                        </p>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <!--Prev next buttons-->

                        <div class="btn-slider-wrap navigation-left-bottom">

                            <div class="btn-prev">
                                <svg class="utouch-icon icon-hover utouch-icon-arrow-left-1"><use xlink:href="#utouch-icon-arrow-left-1"></use></svg>
                                <svg class="utouch-icon utouch-icon-arrow-left1"><use xlink:href="#utouch-icon-arrow-left1"></use></svg>
                            </div>

                            <div class="btn-next">
                                <svg class="utouch-icon icon-hover utouch-icon-arrow-right-1"><use xlink:href="#utouch-icon-arrow-right-1"></use></svg>
                                <svg class="utouch-icon utouch-icon-arrow-right1"><use xlink:href="#utouch-icon-arrow-right1"></use></svg>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ... end FAQS Slider -->

    <!-- About Section Start -->
    <section id="BuyPTEVoucher" class="section-padding" style="background-color:#053E76;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title-header text-center">
                        <h1 class="section-title wow fadeInUp" data-wow-delay="0.2s"><span style="color:#fff !important;">About BuyPTEVoucher</span></h1>
                        <!-- <p class="wow fadeInDown" data-wow-delay="0.2s">&nbsp;</p>  -->
                        <br>
                    </div>
                </div>

                <div class="col-md-12 col-lg-12 col-xs-12 wow fadeInLeft" data-wow-delay="0.3s">
                    <p class="intro-desc" style="color:#fff;text-align:center;">To facilitate the dreams of Indian student to study abroad, buyptevoucher.in is the best and quickest solution to book exam at low prices using a voucher code. This would further benefit
                        you by providing relevant study material prepared and evaluated by experts, and the mock test would train your mind to act during an exam in a certain way.
                    </p>
                </div>
                <!--  <div class="col-md-6 col-lg-6 col-xs-12 wow fadeInRight" data-wow-delay="0.3s">
                   <div class="video">
                     <img class="img-fluid" src="assets/img/about/about.jpg" alt="">
                   </div>
                 </div> -->
            </div>
        </div>
    </section>
    <!-- About Section End -->


    <!-- Ask Question Section Start -->
    <section id="faq" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title-header text-center">
                        <h1 class="section-title wow fadeInUp" data-wow-delay="0.2s">Ask Question?</h1>
                        <p class="wow fadeInDown" data-wow-delay="0.2s">&nbsp;</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
                    <div class="accordion">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <div class="header-title" data-toggle="collapse" data-target="#questionOne" aria-expanded="true" aria-controls="collapseOne">
                                    <i class="lni-pencil"></i> How long will it take to receive my PTE Voucher?
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
                                    <i class="lni-pencil"></i>  How long is the PTE voucher valid?
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
                                    <i class="lni-pencil"></i>  How many times can I use this voucher code?
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
                                    <i class="lni-pencil"></i> How many times can I apply for PTE academic exam?
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
                                    <i class="lni-pencil"></i> How can I pay to buy PTE voucher?
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
                                    <i class="lni-pencil"></i> How can “buyptevoucher.in” help me?
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
                                    <i class="lni-pencil"></i> Can I reschedule a PTE-Academic exam?
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
                                    <i class="lni-pencil"></i> Can PTE Academic be used for Student Visa?
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
                                    <i class="lni-pencil"></i> What is the age requirement to take PTE academic exam?
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
                                    <i class="lni-pencil"></i> Can I change the exam center?
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
                <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
                    <div class="accordion">
                        <div class="card">
                            <div class="card-header" id="headingOne2">
                                <div class="header-title" data-toggle="collapse" data-target="#questionOne2" aria-expanded="true" aria-controls="collapseOne">
                                    <i class="lni-pencil"></i> What are the bases of PTE academic?
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
                                    <i class="lni-pencil"></i>  How much will PTE academic cost?
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
                                    <i class="lni-pencil"></i>Would my handwriting affect my scores in the writing module?
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
                                    <i class="lni-pencil"></i>  Can I refund an unused voucher?
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
                                    <i class="lni-pencil"></i>  How PTE Academic exam differs from PTE General?
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
                                    <i class="lni-pencil"></i>  Where can I use this PTE Voucher?
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
                                    <i class="lni-pencil"></i>  Can anyone else use the voucher code booked on my name?
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
                                    <i class="lni-pencil"></i>  Where are the centers to take PTE-A?
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
                                    <i class="lni-pencil"></i>  How long will the result take after the exam?
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
    <!-- Ask Question Section End -->

    <!-- Subscribe Area Start -->
    <div id="helpBlock">
        <div class="container-fluid">
            <div class="row justify-content-md-center">
                <div class="col-md-12 col-lg-12">
                    <div class="subscribe-inner wow fadeInDown" data-wow-delay="0.3s">
                        <h2 class="subscribe-title">Need help? Chat our support team 24*7 &nbsp;
                            <a href="#header-wrap"><button type="submit" class="btn btn-common sub-btn" data-style="zoom-in" data-spinner-size="30" name="submit" id="submit" style="background-color:#053E76;">
                                    <span class="ladda-label"><i class="lni-check-box"></i> Buy Now</span>
                                </button></a>
                        </h2>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Subscribe Area End -->


@endsection

