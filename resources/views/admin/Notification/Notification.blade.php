@extends('admin.layout.master')
@section('title')
    Add New FAQ
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
    <form class="create_product" method="post" action="{{ route('send.all.notification') }}" enctype="multipart/form-data"
        data-parsley-validate autocomplete="off">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <p class="card-title"><i class="las la-plus-circle"></i> Send Notification</p>
                    </div>
                    <div class="card-body">
                        <!-- Basic multiple Column Form section start -->
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">Notification Title</label>
                                                <input type="text" required class="form-control" name="noti_title" />
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Notification Message<span class="text-danger required-sign">*</span></label>
                                                <textarea class="form-control faq_desc" required name="message" rows="8"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12 mt-3">
                                            <button type="submit"
                                                class="btn btn-orange round float-right border-0 submit_btn"><i
                                                    class="las la-paper-plane"></i> Send Now</button>
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
