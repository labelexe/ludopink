@php
   $web = DB::table('websettings')->first();
   $home = DB::table('homedetails')->first();
@endphp
<!DOCTYPE html>
<html lang="zxx">
<head>
    <!-- Required Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Page Title -->
    <title>{{ $web->website_tagline }}</title>
    <!-- Favicon Icon -->
    <link rel="shortcut icon" href="{{ url('/') }}/storage/Brand/{{ $web->favicon }}">
    <!-- CSS Files -->
    <link rel="stylesheet" href="{{URL::asset('front-assets/css/animate.css')}}">
    <link rel="stylesheet" href="{{URL::asset('front-assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('front-assets//css/font-awsome-all.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('front-assets//css/slick.css')}}">
    <link rel="stylesheet" href="{{URL::asset('front-assets//css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{URL::asset('admin-assets/vendors/js/sweet-alert/sweetalert.css')}}">
    <link rel="stylesheet" href="{{URL::asset('admin-assets/vendors/js/sweet-alert/jquery.sweet-modal.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('front-assets//css/meanmenu.css')}}">
    <link rel="stylesheet" href="{{URL::asset('front-assets//css/style.css')}}">
</head>

<body>
    <!-- Preloader Starts -->
    <div class="preloader" id="preloader">
        <div class="preloader-inner">
            <div class="spinner">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>
        </div>
    </div>

    <header>
        <div id="main-header" class="header-area padding-10">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-3 col-4">
                        <div class="logo">
                            <a href="index.html"> <img src="{{ url('/') }}/storage/Brand/{{ $web->head_logo }}" style="width: 100px"></a>
                        </div>
                    </div>
                    <div class="col-lg-9 d-none d-lg-block">
                        <nav id="mobile-menu">
                            <ul class="main-menu main-menu3">
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li><a href="#about">About</a></li>
                                <li><a href="#feature">Features</a></li>
                                <li><a href="#screenshot">Screenshot</a></li>
                                <li><a href="{{ url('/') }}/a">Payment Request</a></li>
                                <li><a href="#contact">contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="mobile-menu mobile-menu3"></div>
            </div>
        </div>
    </header>

    <!-- features section -->
    <section id="contact" class="contact-area padding-bottom-115 padding-top-120">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 wow fadeInLeft">
                </div>
                <div class="col-lg-6 wow fadeInRight">
                    <div class="contact-right">
                        <div class="common-title text-center margin-bottom-30">
                            <h3>Add Coin</h3>
                            <p> Send Your Transaction details to us, we will send coin in your wallet within 24 hours.</p>
                        </div>
                        <div class="htcontact-form">
                            <form method="post" action="{{route('submit.coin.request.new')}}" enctype="multipart/form-data"
                            data-parsley-validate autocomplete="off">
                                @csrf
                                <div class="form-group">
                                    <label>Your Name <span class="text-danger required-sign">*</span></label>
                                    <input type="text" class="form-control" name="name" required />
                                  </div>
                                  <div class="form-group">
                                    <label>Enter Your Registerd Email <span class="text-danger required-sign">*</span></label>
                                    <input type="email" class="form-control" name="email" required />
                                  </div>
                                  <div class="form-group">
                                    <label>Add Coin <span class="text-danger required-sign">*</span></label>
                                    <input type="number" class="form-control" name="coin" required />
                                  </div>
                                  <div class="form-group">
                                    <label>Payment Proof Screenshot <span class="text-danger required-sign">*</span></label>
                                    <input type="file" accept="image/*" class="form-control" name="image" required />
                                  </div>
                                <button type="submit" class="btn btn-success" class="template-btn2">Request now</button>
                                </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 wow fadeInLeft">
                </div>
            </div>
        </div>
    </section>

    <!-- footer-area -->
    <footer>
        <div class="footer-area footer-area3">
            <div class="footer-top padding-top-100 padding-bottom-70">
                <div class="footer-t-shapes">
                    <img class="ftshp1" src="{{ url('/') }}/front-assets/images/footer-shape.png" alt="">
                    <img class="ftshp2 item-animateOne" src="{{ url('/') }}/front-assets/images/footer-shp2.png" alt="">
                    <img class="ftshp3 item-animateTwo" src="{{ url('/') }}/front-assets/images/footer-shp2.png" alt="">
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="widget text-center text-sm-left">
                                <div class="f-logo">
                                    <a href="index.html"> <img src="{{ url('/') }}/storage/Brand/{{ $web->footer_logo }}" style="width: 100px"></a>
                                </div>
                                <p>{{ $web->website_desc }}</p>
                                <div class="social-icons">
                                    <span class="si1"><a href="{{ $web->facebook }}"><i class="fab fa-facebook-f"></i></a></span>
                                    <span class="si2"><a href="{{ $web->twitter }}"><i class="fab fa-twitter"></i></a></span>
                                    <span class="si3"><a href="{{ $web->instagram }}"><i class="fab fa-instagram"></i></a></span>
                                    <span class="si3"><a href="{{ $web->pinterest }}"><i class="fab fa-pinterest-p"></i></a></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="widget text-center text-sm-left">
                                <h6>Important
                                     service</h6>
                                <ul class="footer-menu">
                                    <li><a href="{{ url('/') }}">home</a></li>
                                    <li><a href="{{url('/')}}/about-us">about us</a></li>
                                    <li><a href="#screenshot">screenshot</a></li>
                                    <li><a href="#contact">contact us</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="widget text-center text-sm-left">
                                <h6>more links</h6>
                                <ul class="footer-menu">
                                    <li><a href="{{url('/')}}/terms-condition">Terms & condition</a></li>
                                    <li><a href="{{url('/')}}/privacy-policy">privacy policy</a></li>
                                    <li><a href="{{ url('/') }}/storage/Brand/{{ $home->download_link }}" download>download</a></li>

                                    <li><a href="#feature">features</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="widget text-center text-sm-left">
                                <h6>contact</h6>
                                <ul>
                                    <li><i class="fas fa-phone-square-alt"></i> {{ $web->pnum }}</li>
                                    <li><i class="fas fa-envelope"></i> {{ $web->pemail }}</li>
                                    <li><i class="fas fa-home"></i> {{ $web->address }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="copyright-area d-flex justify-content-center align-items-center padding-15">
                    <p>{{ $web->copyright }}</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- ToTop Button -->
    <button class="scrollup scroll3"><i class="fas fa-angle-up"></i></button>
    <!-- Javascript Files -->
    <script src="{{URL::asset('front-assets/js/vendor/jquery-2.2.4.min.js')}}"></script>
    <script src="{{URL::asset('front-assets/js/vendor/bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('front-assets/js/vendor/slick.min.js')}}"></script>
    <script src="{{URL::asset('front-assets/js/vendor/counterup.min.js')}}"></script>
    <script src="{{URL::asset('front-assets/js/vendor/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{URL::asset('front-assets/js/vendor/waypoints.min.js')}}"></script>
    <script src="{{URL::asset('admin-assets/vendors/js/sweet-alert/jquery.sweet-modal.min.js')}}"></script>
    <script src="{{URL::asset('admin-assets/vendors/js/sweet-alert/sweet-alert.js')}}"></script>
    <script src="{{URL::asset('admin-assets/vendors/js/sweet-alert/sweetalert.min.js')}}"></script>
    <script src="{{URL::asset('front-assets/js/vendor/easing.min.js')}}"></script>
    <script src="{{URL::asset('front-assets/js/vendor/jquery.meanmenu.min.js')}}"></script>
    <script src="{{URL::asset('front-assets/js/vendor/wow.min.js')}}"></script>
    <script src="{{URL::asset('front-assets/js/main.js')}}"></script>
    <script src="{{URL::asset('admin-assets/css/custom/js/screenshot/screenshot.js')}}"></script>
</body>

</html>
