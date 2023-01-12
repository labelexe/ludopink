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
     <title>Admin Login</title>
    <link rel="apple-touch-icon" href="{{URL::asset('admin-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{URL::asset('admin-assets/images/ico/favicon.ico')}}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('admin-assets/vendors/css/vendors.min.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('admin-assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('admin-assets/css/bootstrap-extended.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('admin-assets/css/colors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('admin-assets/css/components.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('admin-assets/css/themes/dark-layout.min.css')}}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('admin-assets/css/core/menu/menu-types/vertical-menu.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('admin-assets/css/plugins/forms/form-validation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('admin-assets/css/pages/page-auth.min.css')}}">
    <!-- END: Page CSS-->

  </head>
  <!-- END: Head-->

  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static" data-open="click" data-menu="vertical-menu-modern" data-col="blank-page" token="{{ csrf_token() }}">

   @yield('content')


     <script src="{{URL::asset('admin-assets/vendors/js/vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{URL::asset('admin-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{URL::asset('admin-assets/js/core/app-menu.min.js')}}"></script>
    <script src="{{URL::asset('admin-assets/js/core/app.min.js')}}"></script>
    <!-- END: Theme JS-->
    @yield('js')
    <!-- BEGIN: Page JS-->
    <script src="{{URL::asset('admin-assets/js/scripts/pages/page-auth-login.js')}}"></script>
    <!-- END: Page JS-->
    <!-- END: Page JS-->

    <script>
      $(window).on('load',  function(){
        if (feather) {
          feather.replace({ width: 14, height: 14 });
        }
      })
    </script>
  </body>
  <!-- END: Body-->
</html>

