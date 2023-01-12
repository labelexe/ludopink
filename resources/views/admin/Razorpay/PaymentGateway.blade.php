@php
    $websettings = DB::table('websettings')->first();
@endphp

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Webplustech Solutinos,Ludo Game,Ludo Game Development Company">
    <meta name="keywords" content="Webplustech Solutinos,Ludo Game,Ludo Game Development Company">
    <meta name="author" content="Webplustech Solutinos">
    @include('admin.layout.header')
  </head>
  <!-- END: Head-->
  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern navbar-floating footer-static" data-menu="vertical-menu-modern">

    <!-- BEGIN: Header-->
    <nav class="header-navbar bg-warning navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow">
      <h4><strong class="text-center ml-2 text-dark">Choose Payment Method</strong></h4>
    </nav>
    <!-- END: Header-->
    <!-- BEGIN: Content-->
    <div class="app-content content ">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">

         <!-- Stats Horizontal Card -->
  <div class="row">
    <div class="col-lg-3 col-sm-6 col-12">
      <div class="card bg-success">
        <div class="card-header">
          <img src="{{url('/')}}/admin-assets/images/Razorpay_logo.svg" width="100">
          <a href="{{ url('api/razorpay/payment/selected') }}" class="btn btn-danger">Pay Now</a>
        </div>
      </div>
    </div>

     <div class="col-lg-3 col-sm-6 col-12">
      <div class="card bg-danger">
        <div class="card-header">
          <h5 class="text-light">More Gateway Coming Soon</h5>
        </div>
      </div>
    </div>

  <!--     <div class="col-lg-3 col-sm-6 col-12">
      <div class="card bg-success">
        <div class="card-header">
          <img src="{{url('/')}}/admin-assets/images/paypal.png" width="100">
          <a href="#" class="btn btn-danger">Pay Now</a>
        </div>
      </div>
    </div> -->

  </div>
  <!--/ Stats Horizontal Card -->

        </div>
      </div>
    </div>
    <!-- END: Content-->
    </div>
 @include('admin.layout.footer')
  </body>
  <!-- END: Body-->
</html>
