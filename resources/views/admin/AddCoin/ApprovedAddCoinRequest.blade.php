@extends('admin.layout.master')
@section('title')
    All Approved Request List
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
                    <p class="card-title"><i class="las la-sliders-h"></i> All Approved Request List</p>
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
                                    <th>Player ID</th>
                                    <th>User Name</th>
                                    <th>Email</th>
                                    <th>Request Coin</th>
                                    <th>Status</th>
                                    <th>Proof Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $result)
                                    <tr>
                                        <td><span class="font-weight-bold">{{ $data->firstItem() + $key }}</span></td>
                                        <td>{{ $result->playerid }}</td>
                                        <td>{{ $result->name }}</td>
                                        <td>{{ $result->email }}</td>
                                        <td>{{ $result->coin }} ₹</td>
                                        <td>
                                            <div class="badge badge-light-success">Success</div>
                                        </td>
                                        <td><img src="{{ url('/') }}/storage/Payment/{{ $result->image }}" width="30"></td>
                                        <td>
                                            <button type="button" view-id="{{ $result->id }}"
                                                view-playerid="{{ $result->playerid }}"
                                                view-name="{{ $result->name }}"
                                                view-email="{{ $result->email }}"
                                                view-coin="{{ $result->coin }}" view-image="{{ $result->image }}"
                                                view-date="{{ $result->trans_date }}" title="View" data-toggle="modal"
                                                data-target="#ViewDetails"
                                                class="btn btn-icon btn-icon rounded-circle btn-info bg-darken-4 border-0 view_buttion">
                                                <i class="las la-eye"></i>
                                            </button>
                                            <button type="button" delete-id="{{ $result->id }}" data-toggle="tooltip"
                                                data-placement="top" title="Approved"
                                                class="btn btn-icon btn-icon rounded-circle btn-success bg-darken-4 border-0 approved_button">
                                                <i class="las la-check-circle"></i>
                                            </button>
                                            <button type="button" delete-id="{{ $result->id }}" data-toggle="tooltip"
                                                data-placement="top" title="Reject"
                                                class="btn btn-icon btn-icon rounded-circle btn-danger bg-darken-4 border-0 reject_button">
                                                <i class="las la-ban"></i>
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
                                <td>Player ID</td>
                                <td class="playerid"></td>
                            </tr>
                            <tr>
                                <td>User Name</td>
                                <td class="username"></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td class="usermail"></td>
                            </tr>
                            <tr>
                                <td>Request Coin</td>
                                <td class="requestcoin"></td>
                            </tr>
                            <tr>
                                <td>Request Date</td>
                                <td class="requestdate"></td>
                            </tr>
                            <tr>
                                <td>Proof Image</td>
                                <td class="proofimage"></td>
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
    <script src="{{ URL::asset('admin-assets/css/custom/js/Addcoin/Addcoin.js') }}"></script>
@endsection
