@extends('admin.layout.master')
@section('title')
    All Testimonial List
@endsection
@section('css')
    <!--  link custom css link here -->
@endsection
@section('content')
    <!-- BEGIN: Content-->
    <div class="row">
        <!-- Bootstrap Validation -->
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-header">
                    <p class="card-title"><i class="las la-sliders-h"></i> All Testimonial List</p>
                    <a href="{{ url('/') }}/admin/testimonial/add"><button class="btn btn-orange border-0 round"><i
                                class="las la-plus-circle"></i> Add New Testimonial</button></a>
                </div>
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
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>User Name</th>
                                    <th>Designation</th>
                                    <th>User Mail</th>
                                    <th>No. Of Star</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $result)
                                    <tr>
                                        <td><span class="font-weight-bold">{{ $data->firstItem() + $key }}</span></td>
                                        <td><img src="{{ url('/') }}/storage/Testimonial/{{ $result->profile_image }}"
                                                width="30"></td>
                                        <td>{{ $result->username }}</td>
                                        <td>{{ $result->Designation }}</td>
                                        <td>{{ $result->usermail }}</td>
                                        <td>
                                            @if ($result->Star == '1')
                                                <i class="las la-star text-warning"></i>
                                            @elseif ($result->Star == '2')
                                                <i class="las la-star text-warning"></i>
                                                <i class="las la-star text-warning"></i>
                                            @elseif ($result->Star == '3')
                                                <i class="las la-star text-warning"></i>
                                                <i class="las la-star text-warning"></i>
                                                <i class="las la-star text-warning"></i>
                                            @elseif ($result->Star == '4')
                                                <i class="las la-star text-warning"></i>
                                                <i class="las la-star text-warning"></i>
                                                <i class="las la-star text-warning"></i>
                                                <i class="las la-star text-warning"></i>
                                            @elseif ($result->Star == '5')
                                                <i class="las la-star text-warning"></i>
                                                <i class="las la-star text-warning"></i>
                                                <i class="las la-star text-warning"></i>
                                                <i class="las la-star text-warning"></i>
                                                <i class="las la-star text-warning"></i>
                                            @endif
                                        </td>
                                        <td>
                                            <button type="button" view-id="{{ $result->id }}"
                                                view-username="{{ $result->username }}"
                                                view-Designation="{{ $result->Designation }}"
                                                view-usermail="{{ $result->usermail }}"
                                                view-Star="{{ $result->Star }}" view-Review="{{ $result->Review }}"
                                                view-date="{{ $result->submit_date }}" title="View" data-toggle="modal"
                                                data-target="#ViewDetails"
                                                class="btn btn-icon btn-icon rounded-circle btn-info bg-darken-4 border-0 view_buttion">
                                                <i class="las la-eye"></i>
                                            </button>
                                            <button type="button" delete-id="{{ $result->id }}" data-toggle="tooltip"
                                                data-placement="top" title="Delete"
                                                class="btn btn-icon btn-icon rounded-circle btn-danger bg-darken-4 border-0 delete_buuton">
                                                <i class="las la-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="my-1">
                        {{ $data->onEachSide(3)->links('vendor.pagination.custom') }}
                    </div>
                </div>
            </div>
        </div>
        <!-- /Bootstrap Validation -->
    </div>

    <div class="d-inline-block">
        <!-- Button trigger modal -->
        <!-- Modal -->
        <div class="modal fade text-left modal-success" id="ViewDetails" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel110" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel110"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <table class="table table-bordered">
                            <tr>
                                <td>User Name</td>
                                <td class="username"></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td class="useremail"></td>
                            </tr>
                            <tr>
                                <td>Designation</td>
                                <td class="userDesignation"></td>
                            </tr>
                            <tr>
                                <td>Start</td>
                                <td class="userstart"></td>
                            </tr>
                            <tr>
                                <td>Review</td>
                                <td class="userreview"></td>
                            </tr>
                            <tr>
                                <td>Submit Date</td>
                                <td class="submitdatehai"></td>
                            </tr>
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection
@section('js')
    <script src="{{ URL::asset('admin-assets/css/custom/js/Testimonial/Testimonial.js') }}"></script>
@endsection
