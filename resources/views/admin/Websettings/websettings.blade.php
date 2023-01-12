@extends('admin.layout.master')
@section('title')
    Website Settings
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
                        <i class="las la-globe-europe font-medium-3 mr-1"></i>
                        <span class="font-weight-bold">General Settings</span>
                    </a>
                </li>
                <!-- change password -->
                <li class="nav-item">
                    <a class="nav-link" id="account-pill-logo" data-toggle="pill" href="#account-vertical-logo"
                        aria-expanded="false">
                        <i class="lab la-pagelines font-medium-3 mr-1"></i>
                        <span class="font-weight-bold">Logo Settings</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="account-pill-shipping" data-toggle="pill"
                        href="#account-vertical-shipping" aria-expanded="false">
                        <i class="las la-gamepad font-medium-3 mr-1"></i>
                        <span class="font-weight-bold">Game Config</span>
                    </a>
                </li>
                <!-- information -->
                <li class="nav-item">
                    <a class="nav-link" id="account-pill-social" data-toggle="pill" href="#account-vertical-social"
                        aria-expanded="false">
                        <i class="las la-share-alt font-medium-3 mr-1"></i>
                        <span class="font-weight-bold">Social Media</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="account-pill-notification" data-toggle="pill"
                        href="#account-vertical-notification" aria-expanded="true">
                        <i class="las la-sticky-note font-medium-3 mr-1"></i>
                        <span class="font-weight-bold">Notice</span>
                    </a>
                </li>
                <!-- social -->
                <li class="nav-item">
                    <a class="nav-link" id="account-pill-contact" data-toggle="pill" href="#account-vertical-contact"
                        aria-expanded="false">
                        <i class="las la-map-marked-alt font-medium-3 mr-1"></i>
                        <span class="font-weight-bold">Contact Us</span>
                    </a>
                </li>
                <!-- social -->
                <li class="nav-item">
                    <a class="nav-link" id="account-pill-about" data-toggle="pill" href="#account-vertical-about"
                        aria-expanded="false">
                        <i class="las la-user-tie font-medium-3 mr-1"></i>
                        <span class="font-weight-bold">About Us</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="account-pill-terms" data-toggle="pill" href="#account-vertical-terms"
                        aria-expanded="false">
                        <i class="las la-shield-alt font-medium-3 mr-1"></i>
                        <span class="font-weight-bold">Terms & Condition</span>
                    </a>
                </li>
                <!-- notification -->
                <li class="nav-item">
                    <a class="nav-link" id="account-pill-privacy" data-toggle="pill" href="#account-vertical-privacy"
                        aria-expanded="false">
                        <i class="las la-lock font-medium-3 mr-1"></i>
                        <span class="font-weight-bold">Privacy Policy</span>
                    </a>
                </li>
                <!-- notification -->
                <li class="nav-item">
                    <a class="nav-link" id="account-pill-refund" data-toggle="pill" href="#account-vertical-refund"
                        aria-expanded="false">
                        <i class="las la-undo-alt font-medium-3 mr-1"></i>
                        <span class="font-weight-bold">Refund Policy</span>
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
                        <div role="tabpanel" class="tab-pane active" id="account-vertical-general"
                            aria-labelledby="account-pill-general" aria-expanded="true">
                            <!-- form -->
                            <form class="general_setting" method="post" action="{{ route('update.general.setting') }}"
                                data-parsley-validate autocomplete="off">
                                @csrf
                                <div class="row">
                                    <!-- social header -->
                                    <div class="col-12">
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="las la-globe-europe font-medium-3 mr-1"></i>
                                            <h4 class="font-weight-bold mb-0 ml-75">General Settings</h4>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Website Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control website_name"
                                                value="{{ $websetting->website_name }}" name="website_name" required />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Website URL <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control website_url"
                                                value="{{ $websetting->website_url }}" name="website_url" required />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Website Tagline <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control website_tagline"
                                                value="{{ $websetting->website_tagline }}" name="website_tagline"
                                                required />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Website Keyword<span class="text-danger">*</span> <small
                                                    class="text-info">(Write Keywords With Commas)</small></label>
                                            <textarea class="form-control website_keyword" name="website_keyword"
                                                id="accountTextarea" rows="3"
                                                required>{{ $websetting->website_keyword }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Website Description <span class="text-danger">*</span></label>
                                            <textarea class="form-control website_desc" required name="website_desc"
                                                id="accountTextarea" rows="4">{{ $websetting->website_desc }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Footer - Copyright <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control copyright"
                                                value="{{ $websetting->copyright }}" name="copyright" required />
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Skin Mode</label>
                                            <select class="select2 form-control form-control-lg skin_mode" name="skin_mode">
                                                <option value="">Select Mode</option>
                                                @if ($websetting->skin_mode == '')
                                                    <option value="" selected>Light Mode</option>
                                                    <option value="dark-layout">Dark Mode</option>
                                                @else
                                                    <option value="dark-layout" selected>Dark Mode</option>
                                                    <option value="">Light Mode</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Side Menu Skin Mode</label>
                                            <select class="select2 form-control form-control-lg sideskin_mode"
                                                name="sideskin_mode">
                                                <option value="">Select Mode</option>
                                                @if ($websetting->sideskin_mode == 'menu-light')
                                                    <option value="menu-light" selected>Light Mode</option>
                                                    <option value="menu-dark">Dark Mode</option>
                                                @else
                                                    <option value="menu-dark" selected>Dark Mode</option>
                                                    <option value="menu-light">Light Mode</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary mt-2 mr-1 float-right">Update
                                            Setting</button>
                                    </div>
                                </div>
                            </form>
                            <!--/ form -->
                        </div>
                        <!--/ general tab -->

                        <!-- general tab -->
                        <div role="tabpanel" class="tab-pane" id="account-vertical-notification"
                            aria-labelledby="account-pill-notification" aria-expanded="true">
                            <!-- form -->
                            <form class="general_setting" method="post" action="{{ route('update.general.notification') }}"
                                data-parsley-validate autocomplete="off">
                                @csrf
                                <div class="row">
                                    <!-- social header -->
                                    <div class="col-12">
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="las la-globe-europe font-medium-3 mr-1"></i>
                                            <h4 class="font-weight-bold mb-0 ml-75">Notice Text</h4>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Notice Description <span class="text-danger">*</span></label>
                                            <textarea class="form-control notification" required name="notification"
                                                id="accountTextarea" rows="4">{{ $websetting->notification }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary mt-2 mr-1 float-right">Update
                                            Setting</button>
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
                            <form class="logo_setting" method="post" action="{{ route('update.logo') }}"
                                enctype="multipart/form-data" data-parsley-validate autocomplete="off">
                                @csrf
                                <div class="row">
                                    <!-- social header -->
                                    <div class="col-12">
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="lab la-pagelines font-medium-3 mr-1"></i>
                                            <h4 class="font-weight-bold mb-0 ml-75">Logo Settings</h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group ">
                                                <label class="form-label">Header Logo </label>
                                                <input type="file" accept="image/*" class="dropify head_logo"
                                                    name="head_logo" data-height="126" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group ">
                                                <label class="form-label">Footer Logo</label>
                                                <input type="file" accept="image/*" class="dropify footer_logo"
                                                    name="footer_logo" data-height="126" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group ">
                                                <label class="form-label">Favicon </label>
                                                <input type="file" accept="image/*" class="dropify favicon" name="favicon"
                                                    data-height="126" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4">
                                            <label class="form-label">Header Logo</label>
                                            <div class="home_top ml-5"><img
                                                    src="{{ url('/') }}/storage/Brand/{{ $websetting->head_logo }}"
                                                    width="100"></div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <label class="form-label">Footer Logo</label>
                                            <div class="home_bottom ml-5"><img
                                                    src="{{ url('/') }}/storage/Brand/{{ $websetting->footer_logo }}"
                                                    width="100"></div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <label class="form-label">Favicon</label>
                                            <div class="favicon ml-5"><img
                                                    src="{{ url('/') }}/storage/Brand/{{ $websetting->favicon }}"
                                                    width="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary mt-2 mr-1 float-right">Update
                                            Logo</button>
                                    </div>
                                </div>
                            </form>
                            <!--/ form -->
                        </div>
                        <!--/ change password -->

                        <!-- payment -->
                        <div class="tab-pane fade" id="account-vertical-payment" role="tabpanel"
                            aria-labelledby="account-pill-payment" aria-expanded="false">
                            <!-- form -->
                            <form class="payment_policy" method="post" action="{{ route('update.GameRule') }}"
                                data-parsley-validate autocomplete="off">
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
                                            <textarea type="text" class="form-control classic_rule" name="classic_rule"
                                                rows="7">{{ $websetting->classic_rule }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Quick Game Rule</label>
                                            <textarea type="text" class="form-control quick_rule" name="quick_rule"
                                                rows="7">{{ $websetting->quick_rule }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Arrow Game Rule</label>
                                            <textarea type="text" class="form-control arrow_rule" name="arrow_rule"
                                                rows="7">{{ $websetting->arrow_rule }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary mt-1 mr-1 float-right">Update Game
                                            Rule</button>
                                    </div>
                                </div>
                            </form>
                            <!--/ form -->
                        </div>
                        <!--/ payment-->
                        <!-- Shipping -->
                        <div class="tab-pane fade" id="account-vertical-shipping" role="tabpanel"
                            aria-labelledby="account-pill-shipping" aria-expanded="false">
                            <!-- form -->
                            <form class="shipping_policy" method="post" action="{{ route('update.gameConfig') }}"
                                data-parsley-validate autocomplete="off">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="las la-share-alt font-medium-3 mr-1"></i>
                                            <h4 class="font-weight-bold">Game Configreation</h4>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Admin Commission</label>
                                            <div class="input-group mb-2">
                                                <input type="number" class="form-control commission"
                                                    value="{{ $websetting->commission }}" name="commission" />
                                                <div class="input-group-append">
                                                    <span class="input-group-text">%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Signup Bonus<span class="text-danger">*</span></label>
                                            <input type="number" class="form-control signup_bonus"
                                                value="{{ $websetting->signup_bonus }}" required name="signup_bonus" />
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Refer Bonus<span class="text-danger">*</span></label>
                                            <input type="number" class="form-control refer_bonus"
                                                value="{{ $websetting->refer_bonus }}" required name="refer_bonus" />
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>App Version<span class="text-danger">*</span></label>
                                            <input type="number" class="form-control app_version"
                                                value="{{ $websetting->app_version }}" required name="app_version" />
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Min Withdraw Amount<span class="text-danger">*</span></label>
                                            <input type="number" class="form-control min_withdraw"
                                                value="{{ $websetting->min_withdraw }}" required name="min_withdraw" />
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Support Mail<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control support_mail"
                                                value="{{ $websetting->support_mail }}" required name="support_mail" />
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Whatsapp Link<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control whatsapp_link"
                                                value="{{ $websetting->whatsapp_link }}" required name="whatsapp_link" />
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Youtube Link<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control youtube_link"
                                                value="{{ $websetting->youtube_link }}" required name="youtube_link" />
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Telegram Link<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control telegram_link"
                                                value="{{ $websetting->telegram_link }}" required name="telegram_link" />
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 d-none">
                                        <div class="form-group">
                                            <label>purchase Link<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control purchase_link"
                                                value="{{ url('/') }}/razorpay/payment" required
                                                name="purchase_link" />
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Bot Status</label>
                                            <select class="select2 form-control form-control-lg bot_status"
                                                name="bot_status">
                                                <option value="">Select Bot Status</option>
                                                @if ($websetting->bot_status == 1)
                                                    <option value="1" selected>Active</option>
                                                    <option value="0">Deactive</option>
                                                @else
                                                    <option value="1">Active</option>
                                                    <option value="0" selected>Deactive</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                   <!--  <div class="col-12 mb-2">
                                        <div class="form-group">
                                            <label>FCM Server key<span class="text-danger">*</span></label>
                                            <textarea type="text" class="form-control server_key" required
                                                name="server_key">{{ $websetting->server_key }}</textarea>
                                        </div>
                                    </div> -->
                                    {{-- <div class="col-12">
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="las la-share-alt font-medium-3 mr-1"></i>
                                            <h4 class="font-weight-bold">Razorpay Payment Gateway</h4>
                                        </div>
                                    </div> --}}
                                    <div class="col-12">
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="las la-share-alt font-medium-3 mr-1"></i>
                                            <h4 class="font-weight-bold">Cashfree Gateway Settings</h4>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>APP ID<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control payment_apikey"
                                                value="{{ $websetting->payment_apikey }}" required name="payment_apikey" />
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Secret Key<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control payment_secret"
                                                value="{{ $websetting->payment_secret }}" required name="payment_secret" />
                                        </div>
                                    </div>
                                    {{-- <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Rocket Details<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control payment_secret"
                                                value="{{ $websetting->paytm_midid }}" required name="paytm_midid" />
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Upay Details<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control payment_secret"
                                                value="{{ $websetting->paytm_secret }}" required name="paytm_secret" />
                                        </div>
                                    </div> --}}
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary mt-1 mr-1 float-right">Update Game
                                            Configreation</button>
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
                            <form class="social_setting" method="post" action="{{ route('update.social') }}"
                                data-parsley-validate autocomplete="off">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="las la-share-alt font-medium-3 mr-1"></i>
                                            <h4 class="font-weight-bold">Social Media</h4>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Facebook<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control facebook"
                                                value="{{ $websetting->facebook }}" required name="facebook" />
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Youtube<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control youtube"
                                                value="{{ $websetting->youtube }}" required name="youtube" />
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Twitter<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control twitter"
                                                value="{{ $websetting->twitter }}" required name="twitter" />
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Whatsapp<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control whatsapp"
                                                value="{{ $websetting->whatsapp }}" required name="whatsapp" />
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Linkedin<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control linkedin"
                                                value="{{ $websetting->linkedin }}" required name="linkedin" />
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Pinterest<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control pinterest"
                                                value="{{ $websetting->pinterest }}" required name="pinterest" />
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Instagram<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control instagram"
                                                value="{{ $websetting->instagram }}" required name="instagram" />
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>GitHub</label>
                                            <input type="text" class="form-control github"
                                                value="{{ $websetting->github }}" name="github" />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary mt-1 mr-1 float-right">Update Social
                                            Media</button>
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
                            <form class="contact_setting" method="post" action="{{ route('update.contact') }}"
                                data-parsley-validate autocomplete="off">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="las la-map-marked-alt font-medium-3 mr-1"></i>
                                            <h4 class="font-weight-bold">Contact Us Setting</h4>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Primary Tollfree Number<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control pnum" value="{{ $websetting->pnum }}"
                                                required name="pnum" />
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Sec-Tollfree Number</label>
                                            <input type="text" class="form-control secnum"
                                                value="{{ $websetting->secnum }}" name="secnum" />
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Primary Email<span class="text-danger">*</span></label>
                                            <input type="email" class="form-control pemail"
                                                value="{{ $websetting->pemail }}" required name="pemail" />
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Sec-Email</label>
                                            <input type="text" class="form-control secemail"
                                                value="{{ $websetting->secemail }}" name="secemail" />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Address<span class="text-danger">*</span></label>
                                            <textarea class="form-control address" name="address" required
                                                id="accountTextarea" rows="4">{{ $websetting->address }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary mt-1 mr-1 float-right">Update
                                            Contact</button>
                                    </div>
                                </div>
                            </form>
                            <!--/ form -->
                        </div>
                        <!--/ social -->

                        <!-- about -->
                        <div class="tab-pane fade" id="account-vertical-about" role="tabpanel"
                            aria-labelledby="account-pill-about" aria-expanded="false">
                            <!-- form -->
                            <form class="about_setting" method="post" action="{{ route('update.Adminabout') }}"
                                data-parsley-validate autocomplete="off">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="las la-user-tie font-medium-3 mr-1"></i>
                                            <h4 class="font-weight-bold">About Us</h4>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>About Title<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control about_title"
                                                value="{{ $websetting->about_title }}" required name="about_title" />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>About Slug<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control about_slug"
                                                value="{{ $websetting->about_slug }}" required name="about_slug" />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>About Description<span class="text-danger">*</span></label>
                                            <textarea class="form-control tinymce about_desc" required name="about_desc"
                                                id="accountTextarea" rows="4">{{ $websetting->about_desc }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary mt-1 mr-1 float-right">Update
                                            About</button>
                                    </div>
                                </div>
                            </form>
                            <!--/ form -->
                        </div>
                        <!--/ about-->

                        <!-- Terms & Condition-->
                        <div class="tab-pane fade" id="account-vertical-terms" role="tabpanel"
                            aria-labelledby="account-pill-terms" aria-expanded="false">
                            <!-- form -->
                            <form class="terms_setting" method="post" action="{{ route('update.TermsPolicy') }}"
                                data-parsley-validate autocomplete="off">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="las la-shield-alt font-medium-3 mr-1"></i>
                                            <h4 class="font-weight-bold">Terms & Condition</h4>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Terms & Condition Title<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control terms_title" required
                                                value="{{ $websetting->terms_title }}" name="terms_title" />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Terms & Condition Slug<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control terms_slug" required
                                                value="{{ $websetting->terms_slug }}" name="terms_slug" />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Terms & Condition Description<span
                                                    class="text-danger">*</span></label>
                                            <textarea class="form-control terms_desc" required name="terms_desc"
                                                id="accountTextarea" rows="10">{{ $websetting->terms_desc }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary mt-1 mr-1 float-right">Update
                                            T&C</button>
                                    </div>
                                </div>
                            </form>
                            <!--/ form -->
                        </div>
                        <!--/ Terms & Condition -->
                        <!--Privacy Policy-->
                        <div class="tab-pane fade" id="account-vertical-privacy" role="tabpanel"
                            aria-labelledby="account-pill-privacy" aria-expanded="false">
                            <!-- form -->
                            <form class="privacy_policy" method="post" action="{{ route('update.PrivacyPolicy') }}"
                                data-parsley-validate autocomplete="off">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="las la-lock font-medium-3 mr-1"></i>
                                            <h4 class="font-weight-bold">Privacy Policy</h4>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Privacy Policy Title<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control privacy_title" required
                                                value="{{ $websetting->privacy_title }}" name="privacy_title" />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Privacy Policy Slug<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control privacy_slug" required
                                                value="{{ $websetting->privacy_slug }}" name="privacy_slug" />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Privacy Policy Description<span class="text-danger">*</span></label>
                                            <textarea class="form-control privacy_desc" required name="privacy_desc"
                                                id="accountTextarea" rows="10">{{ $websetting->privacy_desc }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary mt-1 mr-1 float-right">Update Privacy
                                            Policy</button>
                                    </div>
                                </div>
                            </form>
                            <!--/ form -->
                        </div>
                        <!--/ Privacy Policy -->
                        <!--Privacy Policy-->
                        <div class="tab-pane fade" id="account-vertical-refund" role="tabpanel"
                            aria-labelledby="account-pill-refund" aria-expanded="false">
                            <!-- form -->
                            <form class="privacy_policy" method="post" action="{{ route('update.RefundPolicy') }}"
                                data-parsley-validate autocomplete="off">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="las la-undo-alt font-medium-3 mr-1"></i>
                                            <h4 class="font-weight-bold">Refund Policy</h4>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Refund Policy Title<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control refund_title" required
                                                value="{{ $websetting->refund_title }}" name="refund_title" />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Refund Policy Slug<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control refund_slug" required
                                                value="{{ $websetting->refund_slug }}" name="refund_slug" />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Refund Policy Description<span class="text-danger">*</span></label>
                                            <textarea class="form-control refund_desc" required name="refund_desc"
                                                id="accountTextarea" rows="10">{{ $websetting->refund_desc }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary mt-1 mr-1 float-right">Update Refund
                                            Policy</button>
                                    </div>
                                </div>
                            </form>
                            <!--/ form -->
                        </div>
                        <!--/ Privacy Policy -->
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
