@extends('admin.layout.master')
@section('title')
    Homepage Settings
@endsection
@section('css')
    <!--  link custom css link here -->
    @endsection @section('content')
    <!-- BEGIN: Content-->
    @if (session()->get('error'))
        <div class="alert alert-danger alert-dismissible ml-1 mr-1" id="notice_msg" role="alert">
            <div class="alert-body">
                <b>{{ session()->get('error') }}</b>
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @elseif(session()->get('success'))
        <div class="alert alert-success alert-dismissible ml-1 mr-1" id="success_msg" role="alert">
            <div class="alert-body">
                <b>{{ session()->get('success') }}</b>
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
                    <a class="nav-link active" id="account-pill-general" data-toggle="pill" href="#account-vertical-general"
                        aria-expanded="true">
                        <i class="las la-photo-video font-medium-3 mr-1"></i>
                        <span class="font-weight-bold">Banner Image</span>
                    </a>
                </li>
                <!-- change password -->
                <li class="nav-item">
                    <a class="nav-link" id="account-pill-logo" data-toggle="pill" href="#account-vertical-logo"
                        aria-expanded="false">
                        <i class="las la-portrait font-medium-3 mr-1"></i>
                        <span class="font-weight-bold">About Us Image</span>
                    </a>
                </li>
                <!-- social -->
                <!--   <li class="nav-item">
                        <a class="nav-link" id="account-pill-payment" data-toggle="pill" href="#account-vertical-payment" aria-expanded="false">
                            <i class="las la-file-contract font-medium-3 mr-1"></i>
                            <span class="font-weight-bold">Game Rule</span>
                        </a>
                    </li> -->
                <!-- social -->
                <li class="nav-item">
                    <a class="nav-link" id="account-pill-shipping" data-toggle="pill"
                        href="#account-vertical-shipping" aria-expanded="false">
                        <i class="las la-image font-medium-3 mr-1"></i>
                        <span class="font-weight-bold">Features Image</span>
                    </a>
                </li>
                <!-- information -->
                {{-- <li class="nav-item">
                    <a class="nav-link" id="account-pill-social" data-toggle="pill" href="#account-vertical-social"
                        aria-expanded="false">
                        <i class="las la-image font-medium-3 mr-1"></i>
                        <span class="font-weight-bold">Features Image</span>
                    </a>
                </li> --}}
                <!-- social -->
                <li class="nav-item">
                    <a class="nav-link" id="account-pill-contact" data-toggle="pill" href="#account-vertical-contact"
                        aria-expanded="false">
                        <i class="las la-question-circle font-medium-3 mr-1"></i>
                        <span class="font-weight-bold">FAQ Image</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="account-pill-uploadapk" data-toggle="pill"
                        href="#account-vertical-uploadapk" aria-expanded="false">
                        <i class="lab la-google-play font-medium-3 mr-1"></i>
                        <span class="font-weight-bold">Upload APK</span>
                    </a>
                </li>
                <!-- social -->

            </ul>
        </div>
        <!--/ left menu section -->

        <!-- right content section -->
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <div class="tab-content">
                        <!-- general tab -->
                        <div role="tabpanel" class="tab-pane active" id="account-vertical-general"
                            aria-labelledby="account-pill-general" aria-expanded="true">
                            <!-- form -->
                            <form class="general_setting" method="post" action="{{ route('update.banner.image') }}"
                                enctype="multipart/form-data" data-parsley-validate autocomplete="off">
                                @csrf
                                <div class="row">
                                    <!-- social header -->
                                    <div class="col-12">
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="lab la-pagelines font-medium-3 mr-1"></i>
                                            <h4 class="font-weight-bold mb-0 ml-75">Homepage Banner Image</h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <small class="text-success">For Best Quality Upload 732x616 Pixels
                                                Image</small>
                                            <div class="form-group ">
                                                <label class="form-label">Banner Image </label>
                                                <input type="file" accept="image/*" required class="dropify head_logo"
                                                    name="bannerimg" data-height="176" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="favicon ml-5"><img
                                                    src="{{ url('/') }}/storage/Brand/{{ $homedetails->bannerimg }}"
                                                    width="300"></div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary mt-2 mr-1 float-right">Update
                                            Banner</button>
                                    </div>
                                </div>
                            </form>
                            <!--/ form -->
                        </div>
                        <!--/ general tab -->

                        <!-- change password -->
                        <div class="tab-pane fade" id="account-vertical-logo" role="tabpanel"
                            aria-labelledby="account-pill-logo" aria-expanded="false">
                            <!-- form -->
                            <form class="logo_setting" method="post" action="{{ route('update.about.image') }}"
                                enctype="multipart/form-data" data-parsley-validate autocomplete="off">
                                @csrf
                                <div class="row">
                                    <!-- social header -->
                                    <div class="col-12">
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="lab la-pagelines font-medium-3 mr-1"></i>
                                            <h4 class="font-weight-bold mb-0 ml-75">About Image</h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <small class="text-success">For Best Quality Upload 292x593 Pixels
                                                Image</small>
                                            <div class="form-group ">
                                                <label class="form-label">About Image </label>
                                                <input type="file" accept="image/*" required class="dropify head_logo"
                                                    name="about_img" data-height="176" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="favicon ml-5"><img
                                                    src="{{ url('/') }}/storage/Brand/{{ $homedetails->about_img }}"
                                                    width="300"></div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary mt-2 mr-1 float-right">Update About
                                            Image</button>
                                    </div>
                                </div>
                            </form>
                            <!--/ form -->
                        </div>
                        <!--/ change password -->

                        <!-- payment -->
                        {{-- <div class="tab-pane fade" id="account-vertical-payment" role="tabpanel" aria-labelledby="account-pill-payment" aria-expanded="false">
                      <!-- form -->
                      <form class="payment_policy" method="post" action="{{route('update.GameRule')}}" data-parsley-validate autocomplete="off">
                        @csrf
                          <div class="row">
                            <div class="col-12">
                                <div class="d-flex align-items-center mb-2">
                                  <i class="las la-rupee-sign font-medium-3 mr-1"></i>
                                  <h4 class="font-weight-bold">Game Rule</h4>
                                </div>
                            </div>
                              <div class="col-12">
                                  <div class="form-group">
                                      <label>Classic Game Rule</label>
                                      <textarea type="text" class="form-control classic_rule" name="classic_rule" rows="7">{{$websetting->classic_rule}}</textarea>
                                  </div>
                              </div>
                              <div class="col-12">
                                  <div class="form-group">
                                      <label>Quick Game Rule</label>
                                      <textarea type="text" class="form-control quick_rule" name="quick_rule" rows="7">{{$websetting->quick_rule}}</textarea>
                                  </div>
                              </div>
                              <div class="col-12">
                                  <div class="form-group">
                                      <label>Arrow Game Rule</label>
                                      <textarea type="text" class="form-control arrow_rule" name="arrow_rule" rows="7">{{$websetting->arrow_rule}}</textarea>
                                  </div>
                              </div>
                              <div class="col-12">
                                  <button type="submit" class="btn btn-primary mt-1 mr-1 float-right">Update Game Rule</button>
                              </div>
                          </div>
                      </form>
                      <!--/ form -->
                    </div> --}}
                        <!--/ payment-->
                        <!-- Shipping -->
                        <div class="tab-pane fade" id="account-vertical-shipping" role="tabpanel"
                            aria-labelledby="account-pill-shipping" aria-expanded="false">
                            <!-- form -->
                            <form class="logo_setting" method="post" action="{{ route('update.download.image') }}"
                                enctype="multipart/form-data" data-parsley-validate autocomplete="off">
                                @csrf
                                <div class="row">
                                    <!-- social header -->
                                    <div class="col-12">
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="lab la-pagelines font-medium-3 mr-1"></i>
                                            <h4 class="font-weight-bold mb-0 ml-75">Download Image</h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <small class="text-success">For Best Quality Upload 437x607 Pixels
                                                Image</small>
                                            <div class="form-group ">
                                                <label class="form-label">Download Image </label>
                                                <input type="file" accept="image/*" required class="dropify head_logo"
                                                    name="download_image" data-height="176" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="favicon ml-5"><img
                                                    src="{{ url('/') }}/storage/Brand/{{ $homedetails->download_image }}"
                                                    width="200"></div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary mt-2 mr-1 float-right">Update Download
                                            Image</button>
                                    </div>
                                </div>
                            </form>
                            <!--/ form -->
                        </div>
                        <!--/ Shipping-->

                        <!-- information -->
                        <div class="tab-pane fade" id="account-vertical-social" role="tabpanel"
                            aria-labelledby="account-pill-social" aria-expanded="false">
                            <!-- form -->
                            <form class="logo_setting" method="post" action="{{ route('update.features.icon') }}"
                                enctype="multipart/form-data" data-parsley-validate autocomplete="off">
                                @csrf
                                <div class="row">
                                    <!-- social header -->
                                    <div class="col-12">
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="lab la-pagelines font-medium-3 mr-1"></i>
                                            <h4 class="font-weight-bold mb-0 ml-75">Features Image</h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group ">
                                                <label class="form-label">1st Image </label>
                                                <input type="file" accept="image/*" class="dropify head_logo"
                                                    name="easy_icon" data-height="126" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group ">
                                                <label class="form-label">2nd Image</label>
                                                <input type="file" accept="image/*" class="dropify footer_logo"
                                                    name="de_icon" data-height="126" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group ">
                                                <label class="form-label">3rd Image </label>
                                                <input type="file" accept="image/*" class="dropify favicon" name="op_icon"
                                                    data-height="126" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4">
                                            <label class="form-label">1st Image</label>
                                            <div class="home_top ml-5"><img
                                                    src="{{ url('/') }}/storage/Brand/{{ $homedetails->easy_icon }}"
                                                    width="100"></div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <label class="form-label">2nd Image</label>
                                            <div class="home_bottom ml-5"><img
                                                    src="{{ url('/') }}/storage/Brand/{{ $homedetails->de_icon }}"
                                                    width="100"></div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <label class="form-label">3rd Image</label>
                                            <div class="favicon ml-5"><img
                                                    src="{{ url('/') }}/storage/Brand/{{ $homedetails->op_icon }}"
                                                    width="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary mt-2 mr-1 float-right">Update Features
                                            Icon</button>
                                    </div>
                                </div>
                            </form>
                            <!--/ form -->
                        </div>
                        <!--/ information -->

                        <!-- social -->
                        <div class="tab-pane fade" id="account-vertical-contact" role="tabpanel"
                            aria-labelledby="account-pill-contact" aria-expanded="false">
                            <!-- form -->
                            <form class="logo_setting" method="post" action="{{ route('update.contact.image') }}"
                                enctype="multipart/form-data" data-parsley-validate autocomplete="off">
                                @csrf
                                <div class="row">
                                    <!-- social header -->
                                    <div class="col-12">
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="lab la-pagelines font-medium-3 mr-1"></i>
                                            <h4 class="font-weight-bold mb-0 ml-75">Contact Image</h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <small class="text-success">For Best Quality Upload 602x523 Pixels
                                                Image</small>
                                            <div class="form-group ">
                                                <label class="form-label">Contact Image </label>
                                                <input type="file" accept="image/*" required class="dropify head_logo"
                                                    name="contact_image" data-height="176" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="favicon ml-5"><img
                                                    src="{{ url('/') }}/storage/Brand/{{ $homedetails->contact_image }}"
                                                    width="150"></div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary mt-2 mr-1 float-right">Update Contact
                                            Image</button>
                                    </div>
                                </div>
                            </form>
                            <!--/ form -->
                        </div>

                        <!-- social -->
                        <div class="tab-pane fade" id="account-vertical-uploadapk" role="tabpanel"
                            aria-labelledby="account-pill-uploadapk" aria-expanded="false">
                            <!-- form -->
                            <form class="logo_setting" method="post" action="{{ route('update.uploadapk.icon') }}"
                                enctype="multipart/form-data" data-parsley-validate autocomplete="off">
                                @csrf
                                <div class="row">
                                    <!-- social header -->
                                    <div class="col-12">
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="lab la-pagelines font-medium-3 mr-1"></i>
                                            <h4 class="font-weight-bold mb-0 ml-75">Upload APK</h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group ">
                                                <label class="form-label">Upload APK </label>
                                                <input type="file" accept=".apk" required class="dropify head_logo"
                                                    name="download_link" data-height="176" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="favicon ml-5">
                                                @if ($homedetails->download_link != null)
                                                    <h3 class="mt-4">Apk Uploded</h3>
                                                    <a href="{{ url('/') }}/storage/Brand/{{ $homedetails->download_link }}"
                                                        download><i class="lab la-google-play ml-4 mt-2"
                                                            style="font-size:50px;cursor:pointer"></i></a>
                                                @else
                                                    <h2 class="mt-4">Apk Not Uploded</h2>
                                                    <i class="las la-times-circle ml-4 mt-2" style="font-size:50px;"></i>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary mt-2 mr-1 float-right">Update
                                                APK</button>
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
    <!-- END: Content-->
    @endsection @section('js')
    <!-- link custom js link here -->
    <script src="{{ URL::asset('admin-assets/css/custom/js/websitesetting/websitesetting.js') }}"></script>
@endsection
