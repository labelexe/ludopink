<div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
      <p class="clearfix mb-0"><span class="float-md-right d-none d-md-block">{{$websettings->copyright}}</span></p>
    </footer>
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="las la-chevron-circle-up"></i></button>
    <!-- END: Footer-->
    <!-- BEGIN: Vendor JS-->
    <script src="{{URL::asset('admin-assets/vendors/js/vendors.min.js')}}"></script>
    <script src="{{URL::asset('admin-assets/vendors/css/parsleyjs/parsley.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->
    <script src="{{URL::asset('admin-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{URL::asset('admin-assets/js/scripts/forms/form-select2.min.js')}}"></script>
    <!-- BEGIN: Theme JS-->
    <script src="{{URL::asset('admin-assets/vendors/fancyuploder/jquery.ui.widget.js')}}"></script>
    <script src="{{URL::asset('admin-assets/vendors/fancyuploder/jquery.fileupload.js')}}"></script>
    <script src="{{URL::asset('admin-assets/vendors/fancyuploder/jquery.iframe-transport.js')}}"></script>
    <script src="{{URL::asset('admin-assets/vendors/fancyuploder/jquery.fancy-fileupload.js')}}"></script>
    <script src="{{URL::asset('admin-assets/vendors/fancyuploder/fancy-uploader.js')}}"></script>
    <script src="{{URL::asset('admin-assets/vendors/fileupload/js/dropify.js')}}"></script>
    <script src="{{URL::asset('admin-assets/js/scripts/forms/filupload.js')}}"></script>

    <!--editor js-->
		<script src="{{URL::asset('admin-assets/tinymce/tinymce.min.js')}}"></script>
		<script src="{{URL::asset('admin-assets/tinymce/init-tinymce.js')}}"></script>

    <script src="{{URL::asset('admin-assets/js/core/app-menu.min.js')}}"></script>
    <script src="{{URL::asset('admin-assets/js/core/app.min.js')}}"></script>
    <script src="{{URL::asset('admin-assets/vendors/js/sweet-alert/jquery.sweet-modal.min.js')}}"></script>
    <script src="{{URL::asset('admin-assets/vendors/js/sweet-alert/sweet-alert.js')}}"></script>
    <script src="{{URL::asset('admin-assets/vendors/js/sweet-alert/sweetalert.min.js')}}"></script>
    <script src="{{URL::asset('admin-assets/css/custom/js/Default.js')}}"></script>
    <script src="{{URL::asset('admin-assets/js/scripts/customizer.min.js')}}"></script>
    <!-- END: Theme JS-->
    @yield('js')
    <!-- BEGIN: Page JS-->
