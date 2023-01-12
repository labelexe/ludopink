@extends('admin.layout.master')
@section('title')
    Add New FAQ
@endsection
@section('css')
@endsection
@section('content')
    <!-- BEGIN: Content-->
    <form class="create_product" method="post" action="{{ route('create.faq.new') }}" enctype="multipart/form-data"
        data-parsley-validate autocomplete="off">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <p class="card-title"><i class="las la-plus-circle"></i> Add New FAQ</p>
                        <a href="{{ url('/') }}/admin/faq/all">
                            <button type="button" class="btn btn-orange border-0 round"><i
                                    class="las la-arrow-alt-circle-left"></i> Back</button>
                        </a>
                    </div>
                    <div class="card-body">
                        <!-- Basic multiple Column Form section start -->
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-10">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">FAQ Title</label>
                                                <input type="text" required class="form-control" name="faq_title" />
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>FAQ Description<span class="text-danger required-sign">*</span></label>
                                                <textarea class="form-control faq_desc" required name="faq_desc" rows="8"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12 mt-3">
                                            <button type="submit"
                                                class="btn btn-orange round float-right border-0 submit_btn"><i
                                                    class="las la-plus-circle"></i> Create FAQ</button>
                                        </div>
                                    </div>
                                    <div class="col-md-1"></div>
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
