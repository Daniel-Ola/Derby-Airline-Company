<!DOCTYPE html>
<html lang="en">
<head>
    @include('pages.includes.landing.header')
</head>

<body>
<div class="loader-wrapper">
    <div class="loaders">
        <div class="loader-logo-pulse">
            <img src="{{ asset('dist/images/logo.svg') }}" alt="Derby Airline">
        </div>
        <div class="loader-1">
        </div>
    </div>
</div>

<div class="wrapper">
    <!-- Header Start -->
    <header id="menu" class="header navbar-fixed-top op-header" style="background-color: #fafbfd !important;">
        <nav class="navbar">
            <div class="container">
                <div class="menu-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="top-bar"></span>
                        <span class="middle-bar"></span>
                        <span class="bottom-bar"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="nav-logo" style="background-color: red*;">
                        <a class="logo" href="index" style="width: 100px !important; height: 80px !important;">
                            <img class="logo-dark" src="{{ asset('dist/landing/assets/images/airplane/logo.png') }}" alt="Derby Airline" style="width: 100%; height: 100%;">
                        </a>
                    </div>
                </div>
                <div class="collapse navbar-collapse nav-collapse">
                    <ul class="nav navbar-nav" >
                        <li class="nav-item">
                            <a class="scroll-to" href="#hero">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="scroll-to" href="#about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="scroll-to" href="#portfolio">Partnership</a>
                        </li>
                        <li>
                            <a class="scroll-to" href="#news">Book Flight</a>
                        </li>
                        <li class="nav-item">
                            <a class="scroll-to" href="#contact">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- Header End -->


    <!-- Hero Start -->
    <section id="hero" style="background-repeat: no-repeat; background-image: url({{ asset('dist/landing/assets/images/airplane/plane-bg.jpg') }}); background-size: cover">
        <div class="tp-banner-container">
            <div class="tp-banner rev-banner-fullscreen">
                <ul>
                    <li data-index="rs-353" data-transition="crossfade" data-slotamount="default" data-masterspeed="2000">
                        <div class="tp-caption tp-resizeme rs-parallaxlevel-2"
                             id="slide-1-layer-1"
                             data-x="['right','right','right','right']" data-hoffset="['-700','-700','-220','-220']"
                             data-y="['center','center','center','center']" data-voffset="['40','-40','0','0']"
                             data-width="none"
                             data-height="none"
                             data-whitespace="nowrap"
                             data-transform_in="x:50;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;s:1000"
                             data-transform_idle="o:1;"
                             data-start="500"
                             data-responsive_offset="on"
                             style="z-index: 7;">
                        </div>
                        <div class="tp-caption tp-resizeme secondary-font text-dark"
                             id="slide-1-layer-2"
                             data-x="['left','left','left','left']" data-hoffset="['-50','-50','15','15']"
                             data-y="['center','center','center','center']" data-voffset="['-90','-90','-100','-100']"
                             data-fontsize="['40','40','30','30']"
                             data-lineheight="['40','40','40','40']"
                             data-width="['400','356','334','277']"
                             data-height="['none','none','76','68']"
                             data-whitespace="normal"
                             data-transform_idle="o:1;"
                             data-transform_in="x:-50px;opacity:0;s:1000;e:Power2.easeOut;"
                             data-start="1200"
                             data-responsive_offset="on"
                             style="z-index: 8; letter-spacing: 1px;">
                            <span class="font-secondarys text-white" style="font-size: 32px;">Derby Airline Company</span>
                        </div>
                        <div class="tp-caption"
                             id="slide-1-layer-3"
                             data-x="['left','left','left','left']" data-hoffset="['-50','-50','15','15']"
                             data-y="['center','center','center','center']" data-voffset="['0','0','-40','-40']"
                             data-fontsize="['15','15','15','15']"
                             data-lineheight="['27','27','27','27']"
                             data-width="['500','356','250','250']"
                             data-height="['none','none','76','68']"
                             data-whitespace="normal"
                             data-transform_idle="o:1;"
                             data-transform_in="x:-50px;opacity:0;s:1000;e:Power2.easeOut;"
                             data-responsive_offset="on"
                             data-start="1200"
                             style="z-index: 8;">
                            <p class="text-white" style="font-size: 13px">
                                Derby Airline is an airline operating mainly from Derby International Airport.
                                We are second to none in bringing excellence and comfortability to airline travel around the globe.
                            </p>
                        </div>
                        <div class="tp-caption tp-resizeme mt-5"
                             id="slide-1-layer-4"
                             data-x="['left','left','left','left']" data-hoffset="['-50','-50','15','15']"
                             data-y="['center','center','center','center']" data-voffset="['90','90','130','130']"
                             data-transform_idle="o:1;"
                             data-transform_in="x:-50px;opacity:0;s:1000;e:Power2.easeOut;"
                             data-responsive_offset="on"
                             data-start="1200"
                             style="z-index: 8; letter-spacing: 1px; margin-top: 15px;">
                            <a class="btn btn-lg btn-theme mt-5" href="#news">Book Flight Now! <i class="ei ei-right-arrow pdd-left-10"></i></a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- Hero End -->


    <!-- About Start -->
    <section id="about" class="section-1">
        <div class="container">
            <div class="text-center">
                <p class="theme-color"><b>An Experience to call royal</b></p>
                <h2>Journey with us now</h2>
                <p class="width-50 mrg-horizon-auto mrg-top-15">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy  text ever since the 1500s</p>
            </div><!-- /text-center -->
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <img class="img-responsive mrg-horizon-auto" src="{{ asset('dist/landing/assets/images/img-3.png') }}" alt="">
                </div>
            </div>
            <div class="row mrg-top-70">
                <div class="col-md-4">
                    <div class="features-block-3">
                        <i class="ei ei-insurance"></i>
                        <div class="features-info">
                            <h4 class="features-tittle">Safety and Security</h4>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's.</p>
                        </div><!-- /features-info -->
                    </div><!-- /features-block-3 -->
                </div>
                <div class="col-md-4">
                    <div class="features-block-3">
                        <i class="ei ei-folder-check"></i>
                        <div class="features-info">
                            <h4 class="features-tittle">Comfortability</h4>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's.</p>
                        </div><!-- /features-info -->
                    </div><!-- /features-block-3 -->
                </div>
                <div class="col-md-4">
                    <div class="features-block-3">
                        <i class="ei ei-pencil"></i>
                        <div class="features-info">
                            <h4 class="features-tittle">Value</h4>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's.</p>
                        </div><!-- /features-info -->
                    </div><!-- /features-block-3 -->
                </div>
            </div>
        </div>
    </section>
    <!-- About End -->


    <!-- Portfolio Start -->
    <section id="portfolio" class="section-1 bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="stack-object-1">
                        <div class="row">
                            <div class="col-md-8 col-sm-8 col-xs-8">
                                <img class="object-1 img-responsive" src="{{ asset('dist/landing/assets/images/airplane/partners.jpg') }}" alt="" data-parallax='{"y": -30}'>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-4 hidden">
                                <img class="object-2 img-responsive" src="{{ asset('dist/landing/assets/images/img-5.png') }}" alt="" data-parallax='{"y": 30}'>
                            </div>
                        </div>
                    </div><!-- /stacked-img -->
                </div>
                <div class="col-md-5 col-md-offset-1">
                    <h2 class="heading-1 left mrg-top-120"><span class="theme-color">Derby</span> Airline Partnership</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy  text ever since the 1500s, when an unknown printer took a galley of type and scrambled it.</p>
                    <div class="mrg-top-40">
                        <a href="javascript:void(0);" class="mrg-right-10">
                            <img src="{{ asset('dist/landing/assets/images/thumb/android.png') }}" alt="">
                        </a>
                        <a href="javascript:void(0);">
                            <img src="{{ asset('dist/landing/assets/images/thumb/apple.png') }}" alt="">
                        </a>
                    </div>
                </div><!-- column -->
            </div>
        </div>
    </section>
    <!-- Portfolio End -->


    <!-- News Start -->
    <section id="news" class="section-1">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="mrg-top-30">Travellers Said</h2>
                    <div class="testimonial-3 mrg-btm-30">
                        <div class="tab-content">
                            <div id="client-1" class="active tab-pane fade in">
                                <div class="client clearfix mrg-top-30">
                                    <img class="client-img" src="{{ asset('dist/landing/assets/images/thumb/testimonial-1.jpg') }}" alt="">
                                    <div class="client-info">
                                        <h4 class="client-name theme-color">Carte Doe</h4>
                                        <!-- <p class="font-size-13">Apple.Inc</p> -->
                                    </div>
                                </div>
                                <p class="mrg-top-10">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.It has survived not only five centuries,</p>
                            </div>
                            <div id="client-2" class="tab-pane fade">
                                <div class="client clearfix mrg-top-30">
                                    <img class="client-img" src="{{ asset('dist/landing/assets/images/thumb/testimonial-1.jpg') }}" alt="">
                                    <div class="client-info">
                                        <h4 class="client-name theme-color">John Doe</h4>
                                        <p class="font-size-13">Apple.Inc</p>
                                    </div>
                                </div>
                                <p class="mrg-top-10">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.It has survived not only five centuries,</p>
                            </div>
                            <div id="client-3" class="tab-pane fade">
                                <div class="client clearfix mrg-top-30">
                                    <img class="client-img" src="{{ asset('dist/landing/assets/images/thumb/testimonial-1.jpg') }}" alt="">
                                    <div class="client-info">
                                        <h4 class="client-name theme-color">Snow Doe</h4>
                                        <p class="font-size-13">Apple.Inc</p>
                                    </div>
                                </div>
                                <p class="mrg-top-10">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.It has survived not only five centuries,</p>
                            </div>
                            <div id="client-4" class="tab-pane fade">
                                <div class="client clearfix mrg-top-30">
                                    <img class="client-img" src="{{ asset('dist/landing/assets/images/thumb/testimonial-1.jpg') }}" alt="">
                                    <div class="client-info">
                                        <h4 class="client-name theme-color">Vincent Doe</h4>
                                        <p class="font-size-13">Apple.Inc</p>
                                    </div>
                                </div>
                                <p class="mrg-top-10">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.It has survived not only five centuries,</p>
                            </div>
                        </div>
                        <div class="swiper-3 swiper-container hidden">
                            <ul class="swiper-wrapper client-tab">
                                <li class="swiper-slide active">
                                    <a data-toggle="tab" href="#client-1">
                                        <img class="img-responsive mrg-horizon-auto" src="{{ asset('dist/landing/assets/images/airplane/cheverolet-120x50.jpg') }}" alt="">
                                    </a>
                                </li>
                                <li class="swiper-slide">
                                    <a data-toggle="tab" href="#client-2">
                                        <img class="img-responsive mrg-horizon-auto" src="{{ asset('dist/landing/assets/images/logo/client-2.png') }}" alt="">
                                    </a>
                                </li>
                                <li class="swiper-slide">
                                    <a data-toggle="tab" href="#client-3">
                                        <img class="img-responsive mrg-horizon-auto" src="{{ asset('dist/landing/assets/images/logo/client-3.png') }}" alt="">
                                    </a>
                                </li>
                                <li class="swiper-slide">
                                    <a data-toggle="tab" href="#client-4">
                                        <img class="img-responsive mrg-horizon-auto" src="{{ asset('dist/landing/assets/images/logo/client-4.png') }}" alt="">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-md-offset-2" style="background: none !important;">
                    <div class="pricing-1 recommended" data-parallax='{"y": -50}'>
                        <!-- there -->
                        <!-- <div class="col-md-8 col-md-offset-2"> -->
                        <div class="">
                            <h2>Book a Flight Now!</h2>
                            <form class="contact-form-wrapper" name="contactForm" id="contact_form" method="post" action="{{ route('flights.book.no-auth') }}">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <select class="selectpicker" data-live-search="true" name="flightnum" required>
                                            @foreach($flights as $flight)
                                                <option value="{{ $flight['flightnum'] }}">
                                                    {{ $flight['origin'] }} - {{ $flight['dest'] }} (Take off time {{ \Carbon\Carbon::parse($flight['take_off_time'])->toDayDateTimeString() }} )
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" name="surname" placeholder="Surname" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control input-email fill-this" name="name" placeholder="Name" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" name="phone" placeholder="Phone Number" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="email" class="form-control" name="email" placeholder="Email Address" required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <textarea class="form-control" name="address" rows="3" placeholder="Address" required></textarea>
                                    </div>
                                    @if($message = Session::get('message'))
                                        <script>
                                            alert('{{ $message }}');
                                        </script>
                                        <div class="form-group col-md-12">
                                            <div id="mail_success" class="success">
                                                {{ $message }}
                                            </div>
                                            <div id="mail_fail" class="error" style="display:none;">
                                                An error occured, please try again later !
                                            </div>
                                        </div>
                                    @endif
                                    <div class="form-group col-md-12" id="submit">
                                        <button class="btn btn-md btn-dark" type="submit">
                                            Book Flight
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- News End -->


    <!-- Contact Start -->
    <section id="contact">
        <div class="content-block-2">
            <div class="image-container col-md-6">
                <div class="background-holder has-content" style="background-image: url({{ asset('dist/landing/assets/images/airplane/boarding-plane.jpg') }})">
                    <div class="content">
                        <div class="row">
                            <!-- here -->
                            <div class="col-md-8 col-md-offset-2">
                                <div class="card padding-30 mrg-vertical-40">
                                    <form class="contact-form-wrapper" name="contactForm" id="contact_form" method="post" action="#">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control" name="name" placeholder="Name">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="email" class="form-control input-email fill-this" name="email" placeholder="Email">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <input type="text" class="form-control" name="subject" placeholder="Subject">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <textarea class="form-control" name="message" rows="3" placeholder="Meassage"></textarea>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <div id="mail_success" class="success" style="display:none;">
                                                    Thank You ! Your email has been delivered.
                                                </div>
                                                <div id="mail_fail" class="error" style="display:none;">
                                                    An error occured, please try again later !
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12" id="submit">
                                                <input class="btn btn-md btn-dark" type="submit" id="send_message" value="Send Message" disabled>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-md-offset-6 ">
                        <div class="text-content bg-gray">
                            <div class="mrg-btm-30">
                                <h2>Contact Us</h2>
                                <p class="width-80">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                            </div>
                            <p>
                                <b class="text-dark">Contact Number:</b>
                                <span>021-234-8888</span>
                            </p>
                            <p>
                                <b class="text-dark">Email Adress:</b>
                                <span>your@email.com</span>
                            </p>
                            <div class="row mrg-top-30">
                                <div class="col-md-9">
                                    <p class="font-size-17 text-dark"><b>Adress</b></p>
                                    <p>74 5th Avenueat St. Marks Place Brooklyn, NY 11217</p>
                                </div>
                            </div>
{{--                            <div class="row mrg-top-30">--}}
{{--                                <div class="col-md-9">--}}
{{--                                    <p class="font-size-17 text-dark"><b>Office Hours</b></p>--}}
{{--                                    <ul>--}}
{{--                                        <li class="text-gray mrg-btm-5">Weekdays  <span class="mrg-left-10">5am – 11pm</span></li>--}}
{{--                                        <li class="text-gray mrg-btm-5">Weekends  <span class="mrg-left-10">Closed</span></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <ul class="social-btn mrg-top-30">
                                <li><a class="btn icon-btn-md btn-dark-inverse hover-facebook border-radius-round" href="javascript:void(0);"><i class="ei ei-facebook"></i></a></li>
                                <li><a class="btn icon-btn-md btn-dark-inverse hover-twitter border-radius-round" href="javascript:void(0);"><i class="ei ei-twitter"></i></a></li>
                                <li><a class="btn icon-btn-md btn-dark-inverse hover-google-plus border-radius-round" href="javascript:void(0);"><i class="ei ei-google-plus"></i></a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact End -->

</div>
<!-- wrapper -->


<!-- Footer Start -->
<section class="footer-default footer-reveal">
    <div class="footer-reveal-wrapper">

{{--        <div class="container hidden">--}}
{{--            <div class="row mrg-btm-30">--}}
{{--                <div class="col-md-3">--}}
{{--                    <div class="widget widget-about">--}}
{{--                        <img class="img-responsive" src="{{ asset('dist/landing/assets/images/logo/logo-1.png') }}" alt="">--}}
{{--                        <p class="mrg-top-30">Lorem Ipsum is simply dummy text of the printing and typesettingindustry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-4 col-md-offset-1">--}}
{{--                    <div class="widget widget-link">--}}
{{--                        <h3 class="widget-tittle">Useful Link</h3>--}}
{{--                        <div class="row mrg-btm-30">--}}
{{--                            <div class="col-md-6">--}}
{{--                                <ul class="link">--}}
{{--                                    <li><a href="#">Home</a></li>--}}
{{--                                    <li><a href="#">About</a></li>--}}
{{--                                    <li><a href="#">Career</a></li>--}}
{{--                                    <li><a href="#">Contact</a></li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-6">--}}
{{--                                <ul class="link">--}}
{{--                                    <li><a href="#">Home</a></li>--}}
{{--                                    <li><a href="#">About</a></li>--}}
{{--                                    <li><a href="#">Career</a></li>--}}
{{--                                    <li><a href="#">Contact</a></li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-4 hidden">--}}
{{--                    <div class="widget widget-news">--}}
{{--                        <h3 class="widget-tittle">News</h3>--}}
{{--                        <div class="news-item">--}}
{{--                            <div class="news-media">--}}
{{--                                <img class="img-responsive" src="{{ asset('dist/landing/assets/images/news-1.jpg') }}" alt="">--}}
{{--                            </div>--}}
{{--                            <div class="news-info">--}}
{{--                                <a href="#" class="news-tittle">Feel the Inovation</a>--}}
{{--                                <span class="news-meta">By <a href="#" class="author">Hendry Chew</a> 3 April</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="news-item">--}}
{{--                            <div class="news-media">--}}
{{--                                <img class="img-responsive" src="{{ asset('dist/landing/assets/images/news-2.jpg') }}" alt="">--}}
{{--                            </div>--}}
{{--                            <div class="news-info">--}}
{{--                                <a href="#" class="news-tittle">Feel the Inovation</a>--}}
{{--                                <span class="news-meta">By <a href="#" class="author">Hendry Chew</a> 3 April</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

        <div class="footer-bottom">
            <div class="container">
                <span class="copyright">
{{--                    <img class="pdd-right-10" src="{{ asset('dist/landing/assets/images/airplane/logo.png') }}" alt="Derby Airline">--}}
{{--                    <img class="logo-dark" src="{{ asset('dist/landing/assets/images/airplane/logo.png') }}" alt="Derby Airline" style="width: 100%; height: 100%;">--}}
                    Copyright © 2021  <a href="#">Derby Airline</a>
                </span>
                <ul class="social-btn pull-right mrg-top-5">
                    <li><a href="#" class="btn btn-gray icon-btn-sm icon-btn-round"><i class="ei ei-facebook"></i></a></li>
                    <li><a href="#" class="btn btn-gray icon-btn-sm icon-btn-round"><i class="ei ei-twitter"></i></a></li>
                    <li><a href="#" class="btn btn-gray icon-btn-sm icon-btn-round"><i class="ei ei-google-plus"></i></a></li>
                    <li><a href="#" class="btn btn-gray icon-btn-sm icon-btn-round"><i class="ei ei-dribble"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- Footer End -->


@include('pages.includes.landing.footer')

</body>

</html>
