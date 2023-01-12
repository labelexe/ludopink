@php
    $admin = DB::table('admins')->first();
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
  <body class="vertical-layout vertical-menu-modern navbar-floating footer-static {{$websettings->skin_mode}}" data-open="click" data-menu="vertical-menu-modern" data-col="" token="{{ csrf_token() }}">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow">
      @include('admin.layout.topbar')
    </nav>
    <!-- END: Header-->
   @include('admin.layout.sidebar')

    <!-- BEGIN: Content-->
    <div class="app-content content ">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">

         @yield('content')

        </div>
      </div>
    </div>
    <!-- END: Content-->
    </div>
 @include('admin.layout.footer')
  </body>
  <!-- END: Body-->
</html>
