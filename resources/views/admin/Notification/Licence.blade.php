@extends('admin.layout.master')
@section('title')
    Licence
@endsection
@section('css')
@endsection
@section('content')
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
    <!-- BEGIN: Content-->
    <form class="create_product" data-parsley-validate autocomplete="off">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                      
                    </div>
                    <div class="card-body">
                        <!-- Basic multiple Column Form section start -->
                        <div class="row">

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-md-2"></div>

                                     <div class="col-md-8 verified-colum d-none">

                                            <div class="alert alert-success my-1" role="alert">
                                              <div class="alert-body"><strong>Welcome To Webplustech Solutions Family : Thanks For Purchased</strong></div>
                                            </div>

                                     <center><i class="las la-check-circle" style="font-size:200px;color: green;"></i></center>
                                    
                                    </div>


                                    <div class="col-md-8 unverified-colum d-none">
                                         <div class="demo-spacing-0">
                                            <div class="alert alert-danger my-1" role="alert">
                                              <div class="alert-body"><strong id="warning-text-desc">Warning - if you didn't verify your licence your data will be loss anytime so please first verified </strong></div>
                                            </div>
                                          </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">Envato Username</label>
                                                <input type="text" required class="form-control" id="username"/>
                                            </div>
                                        </div>
                                        
                                       <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">Licence Code</label>
                                                <input type="text" required class="form-control" id="licence" />
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">Domain Verified</label>
                                                <input readonly type="text" value="{{url('/')}}" id="urlcode" required class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-12 mt-3">
                                            <button type="submit"
                                                class="btn btn-orange round float-right border-0 submit_btn"><i
                                                    class="las la-paper-plane"></i> Verify Now</button>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                            </div>
                        </div>
                        <!-- Basic Floating Label Form section end -->
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- END: Content-->
@endsection
@section('js')
    <!-- link custom js link here -->
@endsection
