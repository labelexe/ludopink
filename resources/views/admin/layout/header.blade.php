    <title>@yield('title')</title>
    <link rel="apple-touch-icon" href="{{ URL::asset('admin-assets/images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="https://xp.io/storage/10ddGcqF.jpg">
    <link href='https://fonts.googleapis.com/css?family=Muli' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
        rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('admin-assets/vendors/css/extensions/toastr.min.css') }}">
    <!-- END: Vendor CSS-->
    <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('admin-assets/fonts/line-awesome/line-awesome.css') }}" />
    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin-assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin-assets/css/bootstrap-extended.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin-assets/css/colors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin-assets/css/components.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin-assets/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('admin-assets/vendors/css/forms/select/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin-assets/vendors/css/parsleyjs/parsley.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('admin-assets/css/core/menu/menu-types/vertical-menu.min.css') }}">

    <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('admin-assets/vendors/js/sweet-alert/jquery.sweet-modal.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('admin-assets/vendors/fancyuploder/fancy_fileupload.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('admin-assets/vendors/fileupload/css/fileupload.css') }}">

    <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('admin-assets/vendors/js/sweet-alert/sweetalert.css') }}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('admin-assets/css/pages/dashboard-ecommerce.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('admin-assets/css/plugins/extensions/ext-component-toastr.min.css') }}">
    <!-- END: Page CSS-->
    @yield('css')
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin-assets/css/custom/css/style.css') }}">
    <!-- END: Custom CSS-->
