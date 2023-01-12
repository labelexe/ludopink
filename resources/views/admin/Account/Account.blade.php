@extends('admin.layout.master')
@section('title')
Account Settings
 @endsection
 @section('css')
<!--  link custom css link here -->
<link rel="stylesheet" type="text/css" href="{{URL::asset('admin-assets/vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL::asset('admin-assets/css/plugins/forms/pickers/form-flat-pickr.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL::asset('admin-assets/css/plugins/forms/pickers/form-pickadate.min.css')}}">
@endsection
@section('content')
<!-- BEGIN: Content-->
<div class="row">
    <div class="content-body">
        <!-- account setting page -->
        <section id="page-account-settings">
          @if(session()->get('error'))
        <div class="alert alert-danger alert-dismissible ml-1 mr-1" id="notice_msg" role="alert">
            <div class="alert-body">
             <b>{{session()->get('error')}}</b>
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
             @elseif(session()->get('success'))
                <div class="alert alert-success alert-dismissible ml-1 mr-1" id="success_msg" role="alert">
                    <div class="alert-body">
                     <b>{{session()->get('success')}}</b>
                    </div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="row">
                <!-- left menu section -->
                <div class="col-md-3 mb-2 mb-md-0">
                    <ul class="nav nav-pills flex-column nav-left">
                        <!-- general -->
                        <li class="nav-item">
                            <a class="nav-link active" id="account-pill-general" data-toggle="pill" href="#account-vertical-general" aria-expanded="true">
                                <i class="las la-user-tie font-medium-3 mr-1"></i>
                                <span class="font-weight-bold">General</span>
                            </a>
                        </li>
                        <!-- change password -->
                        <li class="nav-item">
                            <a class="nav-link" id="account-pill-password" data-toggle="pill" href="#account-vertical-password" aria-expanded="false">
                              <i class="las la-key font-medium-3 mr-1"></i>
                                <span class="font-weight-bold">Change Password</span>
                            </a>
                        </li>
                        <!-- information -->
                        <li class="nav-item">
                            <a class="nav-link" id="account-pill-info" data-toggle="pill" href="#account-vertical-info" aria-expanded="false">
                                <i class="las la-info-circle font-medium-3 mr-1"></i>
                                <span class="font-weight-bold">Information</span>
                            </a>
                        </li>
                        <!-- social -->
                        <li class="nav-item">
                            <a class="nav-link" id="account-pill-social" data-toggle="pill" href="#account-vertical-social" aria-expanded="false">
                                <i class="las la-share-alt font-medium-3 mr-1"></i>
                                <span class="font-weight-bold">Social</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!--/ left menu section -->

                <!-- right content section -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content">
                                <!-- general tab -->
                                <div role="tabpanel" class="tab-pane active" id="account-vertical-general" aria-labelledby="account-pill-general" aria-expanded="true">
                                    <!-- header media -->
                                    <div class="media">
                                        <a href="javascript:void(0);" class="mr-25">
                                              <img src="{{url('/')}}/storage/Profile/{{$admin['profile_img']}}" id="account-upload-img" class="rounded mr-50" alt="profile image" height="80" width="80" />
                                        </a>
                                        <!-- upload and reset button -->
                                        <!-- form -->
                                        <form method="post" action="{{route('update.profile.general')}}" enctype="multipart/form-data" class="image_form" data-parsley-validate autocomplete="off">
                                        @csrf
                                        <div class="media-body mt-75 ml-1">
                                            <label for="account-upload" class="btn btn-sm btn-primary mb-75 mr-75"><i class="las la-image"></i> Upload New</label><br>
                                            <span><b>Role - </b> {{$admin['role']}}</span>
                                            <input type="file" id="account-upload" name="profile_img" hidden accept="image/*" />
                                        </div>
                                        <!--/ upload and reset button -->
                                    </div>
                                    <br>
                                    <!--/ header media -->
                                        <div class="row">
                                            <div class="col-12 col-sm-6">
                                                <div class="form-group">
                                                    <label for="account-username">Username</label>
                                                    <input type="text" class="form-control" required name="username" value="{{$admin['username']}}" />
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <div class="form-group">
                                                    <label for="account-name">Name</label>
                                                    <input type="text" class="form-control" required name="name" value="{{$admin['name']}}" />
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <div class="form-group">
                                                    <label for="account-e-mail">E-mail</label>
                                                    <input type="email" class="form-control" required name="email" value="{{$admin['email']}}" />
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <div class="form-group">
                                                    <label for="account-company">Company</label>
                                                    <input type="text" class="form-control" name="company" value="{{$admin['company']}}" />
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary mr-1 mt-1"><i class="las la-sync-alt"></i> Update</button>
                                            </div>
                                        </div>
                                    </form>
                                    <!--/ form -->
                                </div>
                                <!--/ general tab -->

                                <!-- general tab -->
                                <div role="tabpanel" class="tab-pane" id="account-vertical-password" aria-labelledby="account-vertical-password" aria-expanded="true">
                                    <!-- form -->
                                    <form class="validate-form mt-2" method="post" action="{{route('update.password')}}" data-parsley-validate autocomplete="off">
                                      @csrf
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="account-username">Old Password</label>
                                                    <input type="password" class="form-control" placeholder="********" required name="password"/>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="account-name">New Password</label>
                                                    <input type="password" class="form-control" placeholder="********" required name="new_password"/>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="account-e-mail">Re-Enter New Password</label>
                                                    <input type="password" class="form-control" placeholder="********" required name="re_password" />
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary mr-1 mt-1"><i class="las la-sync-alt"></i> Update</button>
                                            </div>
                                        </div>
                                    </form>
                                    <!--/ form -->
                                </div>
                                <!--/ general tab -->

                                <!-- information -->
                                <div class="tab-pane fade" id="account-vertical-info" role="tabpanel" aria-labelledby="account-pill-info" aria-expanded="false">
                                    <!-- form -->
                                    <form class="validate-form" method="post" action="{{route('update.info')}}" data-parsley-validate autocomplete="off">
                                      @csrf
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="accountTextarea">Bio</label>
                                                    <textarea class="form-control" rows="4" name="bio" placeholder="Your Bio data here...">{{$admin['bio']}}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <div class="form-group">
                                                    <label for="account-birth-date">Birth date</label>
                                                    <input type="text" id="fp-default" class="form-control flatpickr flatpickr-basic" name="birthdate" value="{{$admin['birthdate']}}" />
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <div class="form-group">
                                                    <label for="accountSelect">Country</label>
                                                      <select class="select2 form-control form-control-lg country" name="country">
                                                        <option value="">Select Country</option>
                                                        @foreach($countrys as $country)
                                                        @if($admin['country'] == $country->name)
                                                        <option selected value="{{$country['name']}}">{{$country['name']}}</option>
                                                        @else
                                                        <option value="{{$country['name']}}">{{$country['name']}}</option>
                                                        @endif
                                                        @endforeach
                                                      </select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <div class="form-group">
                                                    <label for="account-website">Website</label>
                                                    <input type="text" class="form-control" value="{{$admin['website']}}" name="website" />
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <div class="form-group">
                                                    <label for="account-phone">Phone</label>
                                                    <input type="text" class="form-control" value="{{$admin['phone']}}" name="phone" />
                                                </div>
                                            </div>
                                            <div class="col-12">
                                              <button type="submit" class="btn btn-primary mr-1 mt-1"><i class="las la-sync-alt"></i> Update</button>
                                            </div>
                                        </div>
                                    </form>
                                    <!--/ form -->
                                </div>
                                <!--/ information -->

                                <!-- social -->
                                <div class="tab-pane fade" id="account-vertical-social" role="tabpanel" aria-labelledby="account-pill-social" aria-expanded="false">
                                    <!-- form -->
                                    <form class="validate-form" method="post" action="{{route('update.socialmedia')}}" data-parsley-validate autocomplete="off">
                                      @csrf
                                        <div class="row">
                                            <!-- social header -->
                                            <div class="col-12">
                                                <div class="d-flex align-items-center mb-2">
                                                    <i data-feather="link" class="font-medium-3"></i>
                                                    <h4 class="mb-0 ml-75">Social Links</h4>
                                                </div>
                                            </div>
                                            <!-- twitter link input -->
                                            <div class="col-12 col-sm-6">
                                                <div class="form-group">
                                                    <label for="account-twitter">Facebook</label>
                                                    <input type="text" class="form-control" value="{{$admin['facebook']}}" name="facebook"/>
                                                </div>
                                            </div>
                                            <!-- facebook link input -->
                                            <div class="col-12 col-sm-6">
                                                <div class="form-group">
                                                    <label for="account-facebook">Instagram</label>
                                                    <input type="text" class="form-control" value="{{$admin['instagram']}}" name="instagram" />
                                                </div>
                                            </div>
                                            <!-- google plus input -->
                                            <div class="col-12 col-sm-6">
                                                <div class="form-group">
                                                    <label for="account-google">Twitter</label>
                                                    <input type="text" class="form-control" value="{{$admin['twitter']}}" name="twitter"/>
                                                </div>
                                            </div>
                                            <!-- linkedin link input -->
                                            <div class="col-12 col-sm-6">
                                                <div class="form-group">
                                                    <label for="account-linkedin">LinkedIn</label>
                                                    <input type="text" class="form-control" value="{{$admin['linkedin']}}" name="linkedin"/>
                                                </div>
                                            </div>
                                            <!-- instagram link input -->
                                            <div class="col-12 col-sm-6">
                                                <div class="form-group">
                                                    <label for="account-instagram">Youtube</label>
                                                    <input type="text" class="form-control" value="{{$admin['youtube']}}" name="youtube"/>
                                                </div>
                                            </div>
                                            <!-- Quora link input -->
                                            <div class="col-12 col-sm-6">
                                                <div class="form-group">
                                                    <label for="account-quora">Whatsapp</label>
                                                    <input type="text" class="form-control" value="{{$admin['whatsapp']}}" name="whatsapp" />
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <!-- submit and cancel button -->
                                                <button type="submit" class="btn btn-primary mr-1 mt-1"><i class="las la-sync-alt"></i> Update</button>
                                            </div>
                                        </div>
                                    </form>
                                    <!--/ form -->
                                </div>
                                <!--/ social -->
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ right content section -->
            </div>
        </section>
        <!-- / account setting page -->
    </div>
</div>

@endsection @section('js')
<!-- link custom js link here -->
<script src="{{URL::asset('admin-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
<script src="{{URL::asset('admin-assets/js/scripts/forms/pickers/form-pickers.min.js')}}"></script>
@endsection
