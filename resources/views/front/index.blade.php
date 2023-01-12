@php
$web = DB::table('websettings')->first();
$home = DB::table('homedetails')->first();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--favicon icon-->
    <link rel="icon" href="{{ url('/') }}/storage/Brand/{{ $web->favicon }}" type="image/png" sizes="16x16">
    <!--title-->
    <title>{{ $web->website_tagline }}</title>
    <!--build:css-->

    <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('admin-assets/fonts/line-awesome/line-awesome.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('admin-assets/vendors/js/sweet-alert/sweetalert.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('admin-assets/vendors/js/sweet-alert/jquery.sweet-modal.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('front-assets/css/main.css') }}">
    <!-- endbuild -->
</head>

<body>
    <!--preloader start-->
    <div id="preloader">
        <div class="preloader-wrap">
            <img src="{{ url('/') }}/storage/Brand/{{ $web->head_logo }}" alt="logo" width="80"
                class="img-fluid" />
            <div class="thecube">
                <div class="cube c1"></div>
                <div class="cube c2"></div>
                <div class="cube c4"></div>
                <div class="cube c3"></div>
            </div>
        </div>
    </div>
    <!--preloader end-->
    <!--header section start-->
    <header class="header">
        <!--start navbar-->
        <nav class="navbar navbar-expand-lg fixed-top bg-transparent">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}" style="height:45px;">
                    <img src="{{ url('/') }}/storage/Brand/{{ $web->head_logo }}" alt="logo" width="80"
                        class="img-fluid" style="margin-top:-17px;" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="ti-menu"></span>
                </button>

                <div class="collapse navbar-collapse h-auto" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto menu">
                        <li><a href="{{ url('/') }}" class=""> Home</a></li>
                        <li><a href="#about" class="page-scroll">About</a></li>
                        <li><a href="#features" class="page-scroll">Features</a></li>
                        <li><a href="#screenshots" class="page-scroll">Screenshots</a></li>
                        <li><a href="#faq" class="page-scroll">Faq</a></li>
                        <li><a href="#process" class="page-scroll">Review</a></li>
                        <li><a href="#contact" class="page-scroll">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!--header section end-->

    <div class="main">

        <!--hero section start-->
        <section class="ptb-100 bg-image overflow-hidden" image-overlay="10">
            <div class="hero-bottom-shape-two"
                style="background: url('assets/img/hero-bottom-shape-2.svg')no-repeat bottom center"></div>

            <div class="container">
                <div
                    class="row align-items-center justify-content-lg-between justify-content-md-center justify-content-sm-center">
                    <div class="col-md-12 col-lg-6">
                        <div class="hero-slider-content text-white py-5">
                            <h1 class="text-white">{{ $home->heading }}</h1>
                            <p class="lead">{{ $home->subheading }}</p>

                            <div class="action-btns mt-3">
                                <a href="{{ url('/') }}/storage/Brand/{{ $home->download_link }}"
                                    class="btn btn-brand-03 btn-rounded mr-3">Download Now <i
                                        class="fas fa-cloud-download-alt pl-2"></i></a>
                                <a href="{{ $home->contact_video }}"
                                    class="popup-youtube btn btn-white btn-circle btn-icon"><i
                                        class="fas fa-play"></i> </a> <span class="pl-2"> Watch Now</span>
                            </div>
                            <div class="hero-counter mt-4">
                                <div class="row">
                                    <div class="col-6 col-sm-4">
                                        <div class="counter-item d-flex align-items-center py-3">
                                            <div class="single-counter-item">
                                                <span
                                                    class="h4 count-number text-white">{{ $home->totalinstall }}</span>
                                                <h6 class="text-white mb-0">Total Install</h6>
                                            </div>
                                            <span class="color-6 ml-2 p-2 rounded-circle">
                                                <i class="fas fa-arrow-up icon-sm"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-4">
                                        <div class="counter-item d-flex align-items-center py-3">
                                            <div class="single-counter-item">
                                                <span
                                                    class="h4 count-number text-white">{{ $home->totaldownload }}</span>
                                                <h6 class="text-white mb-0">Total Download</h6>
                                            </div>
                                            <span class="color-6 ml-2 p-2 rounded-circle">
                                                <i class="fas fa-arrow-up icon-sm"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-4">
                                        <div class="counter-item d-flex align-items-center py-3">
                                            <div class="single-counter-item">
                                                <span
                                                    class="h4 count-number text-white">{{ $home->activeuser }}</span>
                                                <h6 class="text-white mb-0">Active Users</h6>
                                            </div>
                                            <span class="color-6 ml-2 p-2 rounded-circle">
                                                <i class="fas fa-arrow-up icon-sm"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-5">
                        <div class="img-wrap">
                            <img src="{{ url('/') }}/storage/Brand/{{ $home->bannerimg }}" alt="app image"
                                class="img-fluid">
                        </div>
                    </div>
                </div>
                <!--end of row-->
            </div>
            <!--end of container-->
        </section>
        <!--hero section end-->

        <!--promo section start-->
        <section class="promo-section ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-3">
                        <div class="card border-0 single-promo-card p-2 mt-4 shadow">
                            <div class="card-body">
                                <div class="pb-2">
                                    <span class="icon-size-md color-secondary">{!! $home->cardicon1 !!}</span>
                                </div>
                                <div class="pt-2 pb-3">
                                    <h5>{{ $home->cardtitle1 }}</h5>
                                    <p class="mb-0">{{ $home->carddescr1 }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card border-0 single-promo-card p-2 mt-4 shadow">
                            <div class="card-body">
                                <div class="pb-2">
                                    <span class="icon-size-md color-secondary">{!! $home->cardicon2 !!}</span>
                                </div>
                                <div class="pt-2 pb-3">
                                    <h5>{{ $home->cardtitle2 }}</h5>
                                    <p class="mb-0">{{ $home->carddescr2 }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card border-0 single-promo-card p-2 mt-4 shadow">
                            <div class="card-body">
                                <div class="pb-2">
                                    <span class="icon-size-md color-secondary">{!! $home->cardicon3 !!}</span>
                                </div>
                                <div class="pt-2 pb-3">
                                    <h5>{{ $home->cardtitle3 }}</h5>
                                    <p class="mb-0">{{ $home->carddescr3 }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card border-0 single-promo-card p-2 mt-4 shadow">
                            <div class="card-body">
                                <div class="pb-2">
                                    <span class="icon-size-md color-secondary">{!! $home->cardicon4 !!}</span>
                                </div>
                                <div class="pt-2 pb-3">
                                    <h5>{{ $home->cardtitle4 }}</h5>
                                    <p class="mb-0">{{ $home->carddescr4 }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--promo section end-->

        <!--about us section start-->
        <div class="overflow-hidden">
            <!--about us section start-->
            <section id="about" class="about-us ptb-100 background-shape-img position-relative">
                <div class="animated-shape-wrap">
                    <div class="animated-shape-item"></div>
                    <div class="animated-shape-item"></div>
                    <div class="animated-shape-item"></div>
                    <div class="animated-shape-item"></div>
                    <div class="animated-shape-item"></div>
                </div>
                <div class="container">
                    <div
                        class="row align-items-center justify-content-lg-between justify-content-md-center justify-content-sm-center">
                        <div class="col-md-12 col-lg-6 mb-5 mb-md-5 mb-sm-5 mb-lg-0">
                            <div class="about-content-left">
                                <h2 class="font-weight-bold">{{ $home->about_title }}</h2>
                                <p>{{ $home->about_desc }}</p>
                                <ul class="dot-circle pt-3">
                                    <li>{{ $home->about_setp1 }}</li>
                                    <li>{{ $home->about_step2 }}</li>
                                    <li>{{ $home->about_step3 }}</li>
                                </ul>
                                <div class="row pt-3">
                                    <div class="col-4 col-lg-3 border-right">
                                        <div class="count-data text-center">
                                            <h4 class="count-number mb-0 color-primary font-weight-bold">
                                                {{ $home->activeuser }}</h4>
                                            <span>Customers</span>
                                        </div>
                                    </div>
                                    <div class="col-4 col-lg-3 border-right">
                                        <div class="count-data text-center">
                                            <h4 class="count-number mb-0 color-primary font-weight-bold">
                                                {{ $home->totaldownload }}</h4>
                                            <span>Downloads</span>
                                        </div>
                                    </div>
                                    <div class="col-4 col-lg-3 border-right">
                                        <div class="count-data text-center">
                                            <h4 class="count-number mb-0 color-primary font-weight-bold">
                                                {{ $home->satisfieduser }}</h4>
                                            <span>Satisfied</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5 col-md-5 col-lg-4">
                            <div class="about-content-right">
                                <img src="{{ url('/') }}/storage/Brand/{{ $home->about_img }}" alt="about us"
                                    class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--about us section end-->
        </div>
        <!--about us section end-->

        <!--download section step start-->
        <section class="bg-image ptb-100 this_is_cusrtom" image-overlay="8">
            <div class="background-image-wraper"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-9 col-lg-8">
                        <div class="section-heading text-center mb-1 text-white">
                            <h2 class="text-white">{{ $home->download_title }}</h2>
                            <p>{{ $home->download_desc }}</p>
                            <div class="action-btns">
                                <ul class="list-inline">
                                    <li class="list-inline-item my-2">
                                        <a href="{{ url('/') }}/storage/Brand/{{ $home->download_link }}"
                                            class="d-flex align-items-center app-download-btn btn btn-brand-02 btn-rounded">
                                            <i class="lab la-android icon-size-sm mr-3"></i>
                                            <div class="download-text text-left">
                                                <small>Download</small>
                                                <h5 class="mb-0">Android App</h5>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
        </section>
        <!--download section step end-->
        <!--features section start-->
        <div id="features" class="feature-section ptb-100 ">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-9 col-lg-9">
                        <div class="section-heading text-center mb-5">
                            <h2 class="font-weight-bold">{{ $home->fe_title }}</h2>
                            <p>{{ $home->fe_desc }}</p>
                        </div>
                    </div>
                </div>

                <!--feature new style start-->
                <div class="row align-items-center justify-content-md-center">
                    <div class="col-lg-4 col-md-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex align-items-start mb-sm-0 mb-md-3 mb-lg-3">
                                    <span class="icon-size-md color-secondary mr-4">{!! $home->feicon1 !!}</span>
                                    <div class="icon-text">
                                        <h5 class="mb-2">{{ $home->fetitle1 }}</h5>
                                        <p>{{ $home->fedesc1 }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex align-items-start mb-sm-0 mb-md-3 mb-lg-3">
                                    <span class="icon-size-md color-secondary mr-4">{!! $home->feicon2 !!}</span>
                                    <div class="icon-text">
                                        <h5 class="mb-2">{{ $home->fetitle2 }}</h5>
                                        <p>{{ $home->fedesc2 }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex align-items-start mb-sm-0 mb-md-3 mb-lg-3">
                                    <span class="icon-size-md color-secondary mr-4">{!! $home->feicon3 !!}</span>
                                    <div class="icon-text">
                                        <h5 class="mb-2">{{ $home->fetitle3 }}</h5>
                                        <p>{{ $home->fedesc3 }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-5 d-none d-sm-none d-md-block d-lg-block">
                        <div class="position-relative pb-md-5 py-lg-0">
                            <img alt="Image placeholder"
                                src="{{ url('/') }}/storage/Brand/{{ $home->download_image }}"
                                class="img-center img-fluid">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex align-items-start mb-sm-0 mb-md-3 mb-lg-3">
                                    <span class="icon-size-md color-secondary mr-4">{!! $home->feicon4 !!}</span>
                                    <div class="icon-text">
                                        <h5 class="mb-2">{{ $home->fetitle4 }}</h5>
                                        <p>{{ $home->fedesc4 }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex align-items-start mb-sm-0 mb-md-3 mb-lg-3">
                                    <span class="icon-size-md color-secondary mr-4">{!! $home->feicon5 !!}</span>
                                    <div class="icon-text">
                                        <h5 class="mb-2">{{ $home->fetitle5 }}</h5>
                                        <p>{{ $home->fedesc5 }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex align-items-start mb-sm-0 mb-md-3 mb-lg-3">
                                    <span class="icon-size-md color-secondary mr-4">{!! $home->feicon6 !!}</span>
                                    <div class="icon-text">
                                        <h5 class="mb-2">{{ $home->fetitle6 }}</h5>
                                        <p>{{ $home->fedesc6 }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--feature new style end-->
            </div>
        </div>

        <!--features section end-->

        <!--screenshots section start-->
        <section id="screenshots" class="screenshots-section pb-100 pt-100 gray-light-bg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-9 col-lg-8">
                        <div class="section-heading text-center mb-5">
                            <h2 class="font-weight-bold">{{ $home->screenshot_title }}</h2>
                            <p>{{ $home->screenshot_desc }}</p>
                        </div>
                    </div>
                </div>
                <!--start app screen carousel-->
                <div class="screenshot-wrap">
                    <div class="screenshot-frame"></div>
                    @php
                        $screenshot = DB::table('screenshots')->get();
                    @endphp
                    <div class="screen-carousel owl-carousel owl-theme dot-indicator">
                        @foreach ($screenshot as $result)
                            <img src="{{ url('/') }}/storage/Screenshot/{{ $result->screenshot }}"
                                class="img-fluid screenshot_slider_image" alt="screenshots" />
                        @endforeach
                    </div>
                </div>
                <!--end app screen carousel-->
            </div>
        </section>
        <!--screenshots section end-->
        <!--counter section start-->
        <section class="counter-section gradient-bg ptb-40">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="text-white p-2 count-data text-center my-3">
                            <span class="las la-users icon-size-lg mb-2"></span>
                            <h3 class="count-number mb-1 text-white font-weight-bolder">{{ $home->totalinstall }}
                            </h3>
                            <span>Customers</span>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="text-white p-2 count-data text-center my-3">
                            <span class="las la-cloud-download-alt icon-size-lg mb-2"></span>
                            <h3 class="count-number mb-1 text-white font-weight-bolder">{{ $home->totaldownload }}
                            </h3>
                            <span>Downloads</span>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="text-white p-2 count-data text-center my-3">
                            <span class="las la-laugh-beam icon-size-lg mb-2"></span>
                            <h3 class="count-number mb-1 text-white font-weight-bolder">{{ $home->satisfieduser }}
                            </h3>
                            <span>Satisfied</span>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="text-white p-2 count-data text-center my-3">
                            <span class="las la-user-check icon-size-lg mb-2"></span>
                            <h3 class="count-number mb-1 text-white font-weight-bolder">{{ $home->activeuser }}</h3>
                            <span>Active User</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--counter section end-->

        <!--faq or accordion section start-->
        <section id="faq" class="ptb-100 ">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-9 col-lg-8">
                        <div class="section-heading text-center mb-5">
                            <h2 class="font-weight-bold">Frequently Asked Queries</h2>
                            <p></p>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-12 col-lg-6 mb-5 mb-md-5 mb-sm-5 mb-lg-0">
                        <div class="img-wrap">
                            <img src="{{ url('/') }}/storage/Brand/{{ $home->contact_image }}" alt="download"
                                class="img-fluid">
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6">
                        <div id="accordion" class="accordion faq-wrap">
                            @php
                                $faq = DB::table('faqs')->get();
                            @endphp

                            @foreach ($faq as $result)
                                <div class="card mb-3">
                                    <a class="card-header " data-toggle="collapse"
                                        href="#collapse{{ $result->id }}" aria-expanded="false">
                                        <h6 class="mb-0 d-inline-block">{{ $result->faq_title }}</h6>
                                    </a>
                                    <div id="collapse{{ $result->id }}" class="collapse"
                                        data-parent="#accordion" style="">
                                        <div class="card-body white-bg">
                                            <p>{{ $result->faq_desc }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--faq or accordion section end-->

        <!--testimonial section start-->
        <section id="process" class="position-relative gradient-bg ptb-100">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6 col-lg-5 mb-4 mb-sm-4 mb-md-0 mb-lg-0">
                        <div class="testimonial-heading text-white">
                            <h2 class="text-white font-weight-bold">{{ $home->testimonial_title }}</h2>
                            <p>{{ $home->testimonial_desc }}</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <div class="testimonial-content-wrap">
                            <div class="owl-carousel owl-theme client-testimonial-1 dot-indicator testimonial-shape">
                                @php
                                    $testimonial = DB::table('testimonials')->get();
                                @endphp
                                @foreach ($testimonial as $result)
                                    <div class="item">
                                        <div class="testimonial-quote-wrap">
                                            <div class="media author-info mb-3">
                                                <div class="author-img mr-3">
                                                    <img src="{{ url('/') }}/storage/Testimonial/{{ $result->profile_image }}"
                                                        alt="client" class="img-fluid">
                                                </div>
                                                <div class="media-body text-white">
                                                    <h5 class="mb-0 text-white">{{ $result->username }}</h5>
                                                    <span>{{ $result->Designation }}</span>
                                                </div>
                                                <i class="fas fa-quote-right text-white"></i>
                                            </div>
                                            <div class="client-say text-white">
                                                <p>{{ $result->Review }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--testimonial section end-->

        <!--our contact section start-->
        <section id="contact" class="contact-us-section ptb-100">
            <div class="container">
                <div class="row justify-content-around">
                    <div class="col-12 pb-3 message-box d-none">
                        <div class="alert alert-danger"></div>
                    </div>
                    <div class="col-md-12 col-lg-5 mb-5 mb-md-5 mb-sm-5 mb-lg-0">
                        <div class="contact-us-form gray-light-bg rounded p-5">
                            <h4>Ready to get started?</h4>
                            <form method="post" action="{{ route('create.contact.new') }}" id="contactForm"
                                class="contact_form_submit contact-us-form">
                                @csrf
                                <div class="form-row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="name"
                                                placeholder="Enter name" required="required">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email"
                                                placeholder="Enter email" required="required">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="subject"
                                                placeholder="Subject" required="required">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <textarea name="message" id="message" class="form-control" rows="7" cols="25" placeholder="Message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 mt-3">
                                        <button type="submit" class="btn btn-brand-02" id="btnContactUs">
                                            Send Message
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6">
                        <div class="contact-us-content">
                            <h2>{{ $home->contact_title }}</h2>
                            <p class="lead">{{ $home->contact_desc }}</p>
                            <hr class="my-5">

                            <ul class="contact-info-list">
                                <li class="d-flex pb-3">
                                    <div class="contact-icon mr-3">
                                        <span class="fas fa-location-arrow color-primary rounded-circle p-3"></span>
                                    </div>
                                    <div class="contact-text">
                                        <h5 class="mb-1">Company Location</h5>
                                        <p>
                                            {{ $web->address }}
                                        </p>
                                    </div>
                                </li>
                                <li class="d-flex pb-3">
                                    <div class="contact-icon mr-3">
                                        <span class="fas fa-envelope color-primary rounded-circle p-3"></span>
                                    </div>
                                    <div class="contact-text">
                                        <h5 class="mb-1">Email Address</h5>
                                        <p>
                                            {{ $web->pemail }}
                                        </p>
                                    </div>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--our contact section end-->
    </div>

    <!--footer section start-->
    <!--when you want to remove subscribe newsletter container then you should remove .footer-with-newsletter class-->
    <footer class="footer-1 gradient-bg ptb-60 footer-with-newsletter">
        <div class="container bottom_border">
            <div class="row">
                <div class=" col-sm-4 col-md col-sm-4  col-12 col">
                    <h5 class="headin5_amrc col_white_amrc pt2">About us</h5>
                    <!--headin5_amrc-->
                    <p class="mb10">
                        {{ \Illuminate\Support\Str::limit($home->about_desc, 250, $end = '...') }}</p>
                </div>


                <div class=" col-sm-4 col-md  col-6 col">
                    <h5 class="headin5_amrc col_white_amrc pt2">Quick links</h5>
                    <!--headin5_amrc-->
                    <ul class="footer_ul_amrc">
                        <li><a href="{{ url('/') }}" class=""> Home</a></li>
                        <li><a href="#features" class="page-scroll">Features</a></li>
                        <li><a href="#screenshots" class="page-scroll">Screenshots</a></li>
                        <li><a href="#faq" class="page-scroll">Faq</a></li>
                        <li><a href="#process" class="page-scroll">Review</a></li>
                    </ul>
                    <!--footer_ul_amrc ends here-->
                </div>


                <div class=" col-sm-4 col-md  col-6 col">
                    <h5 class="headin5_amrc col_white_amrc pt2">Quick links</h5>
                    <!--headin5_amrc-->
                    <ul class="footer_ul_amrc">
                        <li><a href="{{ url('/') }}/about-us">About Us</a></li>
                        <li><a href="{{ url('/') }}/privacy-policy">Privacy Policy</a></li>
                        <li><a href="{{ url('/') }}/terms-condition">Terms & Conditions</a></li>
                        <li><a href="{{ url('/') }}/refund-policy">Refund Policy</a></li>
                        <li><a href="{{ url('/') }}/contact-us">Contact</a></li>
                    </ul>
                    <!--footer_ul_amrc ends here-->
                </div>


                <div class=" col-sm-4 col-md  col-12 col">
                    <h5 class="headin5_amrc col_white_amrc pt2">Contact us</h5>
                    <!--headin5_amrc ends here-->

                    <ul class="footer_ul2_amrc">
                        <p><i class="las la-map-marked-alt icon-size-sm"></i> {{ $web->address }} </p>
                        <p><i class="las la-phone-volume icon-size-sm"></i> {{ $web->pnum }} </p>
                        <p><i class="las la-envelope icon-size-sm"></i> {{ $web->pemail }} </p>
                    </ul>
                    <!--footer_ul2_amrc ends here-->
                </div>
            </div>
        </div>


        <div class="container">
            <center>
                <div class="list-inline social-list-default background-color social-hover-2 mt-2">
                    <li class="list-inline-item"><a class="twitter" href="{{ $web->twitter }}"
                            target="_blank"><i class="fab fa-twitter"></i></a></li>
                    <li class="list-inline-item"><a class="youtube" href="{{ $web->youtube }}"
                            target="_blank"><i class="fab fa-youtube"></i></a></li>
                    <li class="list-inline-item"><a class="linkedin" href="{{ $web->linkedin }}"
                            target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                    <li class="list-inline-item"><a class="dribbble" href="{{ $web->instagram }}"
                            target="_blank"><i class="fab fa-instagram"></i></a></li>
                </div>
                <!--foote_bottom_ul_amrc ends here-->
                <p class="text-center">{{ $web->copyright }}</p>
            </center>
            <!--social_footer_ul ends here-->
        </div>
        <!--end of container-->
        <!--end of container-->
    </footer>
    <!--footer section end-->
    <!--scroll bottom to top button start-->
    <div class="scroll-top scroll-to-target primary-bg text-white" data-target="html">
        <span class="fas fa-hand-point-up"></span>
    </div>
    <!--scroll bottom to top button end-->
    <!--build:js-->
    <script src="{{ URL::asset('front-assets/js/vendors/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ URL::asset('front-assets/js/vendors/popper.min.js') }}"></script>
    <script src="{{ URL::asset('front-assets/js/vendors/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('front-assets/js/vendors/jquery.easing.min.js') }}"></script>
    <script src="{{ URL::asset('front-assets/js/vendors/owl.carousel.min.js') }}"></script>
    <script src="{{ URL::asset('front-assets/s/vendors/countdown.min.js') }}"></script>
    <script src="{{ URL::asset('front-assets/js/vendors/jquery.waypoints.min.js') }}"></script>
    <script src="{{ URL::asset('front-assets/js/vendors/jquery.rcounterup.js') }}"></script>
    <script src="{{ URL::asset('front-assets/js/vendors/magnific-popup.min.js') }}"></script>
    <script src="{{ URL::asset('front-assets/js/vendors/validator.min.js') }}"></script>
    <script src="{{ URL::asset('admin-assets/vendors/js/sweet-alert/sweet-alert.js') }}"></script>
    <script src="{{ URL::asset('admin-assets/vendors/js/sweet-alert/sweetalert.min.js') }}"></script>
    <script src="{{ URL::asset('admin-assets/css/custom/js/screenshot/screenshot.js') }}"></script>
    <script src="{{ URL::asset('front-assets/js/app.js') }}"></script>
    <!--endbuild-->
</body>

</html>
