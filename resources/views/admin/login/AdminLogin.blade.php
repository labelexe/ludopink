@extends('admin.layout.loginmaster')
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><div class="auth-wrapper auth-v1 px-2">
  <div class="auth-inner py-2">
    <!-- Login v1 -->
    <div class="card mb-0">
        @php
         $web = DB::table('websettings')->first();
        @endphp
      <div class="card-body">
       <h2 class="brand-text text-primary text-center ml-1"><b>{{ $web->website_name }} Admin</b></h2>
        <p class="card-text text-dark text-center mb-2">Please Enter Valid Login Credentials</p>

        @if(session()->get('error'))
        <div class="demo-spacing-0">
            <div class="alert alert-danger alert-dismissible fade show" id="notice_msg" role="alert">
              <div class="alert-body">
                <b>{{session()->get('error')}}</b>
              </div>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          </div>
        @endif

        <form class="auth-login-form mt-2" action="{{route('admin.auth')}}" method="post">
          @csrf
          <div class="form-group">
            <label for="login-email" class="form-label">Email</label>
            <input type="text" class="form-control" id="login-email" name="email" placeholder="john@example.com" aria-describedby="login-email" tabindex="1" autofocus />
          </div>

          <div class="form-group">
            <div class="d-flex justify-content-between">
              <label for="login-password">Password</label>
            </div>
            <div class="input-group input-group-merge form-password-toggle">
              <input type="password" class="form-control form-control-merge" id="password" name="password" tabindex="2" placeholder="********" aria-describedby="login-password"/>
              <div class="input-group-append">
                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
              </div>
            </div>
          </div>
          <button class="btn btn-primary btn-block" type="submit" tabindex="4">Sign in</button>
        </form>
      </div>
    </div>
    <!-- /Login v1 -->
  </div>
</div>

        </div>
      </div>
    </div>
    <!-- END: Content-->
@endsection
@section('js')
<script src="{{URL::asset('admin-assets/js/custom/login.js')}}"></script>
@endsection
