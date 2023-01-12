@extends('admin.layout.master')
@section('title')
    Add New Testimonial
@endsection
@section('css')
@endsection
@section('content')
    <!-- BEGIN: Content-->
    <form class="create_product" method="post" action="{{ route('create.testimonial.new') }}" enctype="multipart/form-data"
        data-parsley-validate autocomplete="off">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <p class="card-title"><i class="las la-plus-circle"></i> Add New Testimonial</p>
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
                                                <label for="first-name-column">Name</label>
                                                <input type="text" placeholder="Jhone Doe" required class="form-control"
                                                    name="username" />
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">Designation</label>
                                                <input type="text" placeholder="Active User" required class="form-control"
                                                    name="Designation" />
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">Email ID</label>
                                                <input type="text" placeholder="jhon@gmail.com" required
                                                    class="form-control" name="usermail" />
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">Number Of Star</label>
                                                <select class="select2 form-control form-control-lg Star" required
                                                    name="Star">
                                                    <option value="">Select Number Of Star</option>
                                                    <option value="1">1 Star</option>
                                                    <option value="2">2 Star</option>
                                                    <option value="3">3 Star</option>
                                                    <option value="4">4 Star</option>
                                                    <option value="5">5 Star</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">Submit Date</label>
                                                <input type="text" readonly value="{{ date('l jS F Y h:i:s A') }}"
                                                    required class="form-control" name="submit_date" />
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Review Description<span
                                                        class="text-danger required-sign">*</span></label>
                                                <textarea placeholder="This is best application" class="form-control Review"
                                                    required name="Review" rows="8"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group ">
                                                <label class="form-label">Profile Image</label>
                                                <input type="file" accept="image/*" required class="dropify profile_image"
                                                    name="profile_image" data-height="126" />
                                            </div>
                                        </div>
                                        <div class="col-12 mt-3">
                                            <button type="submit"
                                                class="btn btn-orange round float-right border-0 submit_btn"><i
                                                    class="las la-plus-circle"></i> Create Testimonial</button>
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
