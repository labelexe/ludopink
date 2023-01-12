@extends('admin.layout.master')
@section('title')
 All Player
@endsection
@section('css')
 <!--  link custom css link here -->
@endsection
@section('content')
 <!-- BEGIN: Content-->
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
     <!-- User Card & Plan Starts -->
  <div class="row">
    <!-- User Card starts-->
    <div class="col-xl-6 col-lg-8 col-md-7">
      <div class="card user-card">
      	<div class="card-header bg-success">
            <p class="card-title"><i class="las la-sliders-h"></i> Player Details</p>
          </div>
        <div class="card-body mt-2">
          <div class="row">
            <div class="col-7">
            	<div class="d-flex justify-content-start">
                    <div class="d-flex flex-column ml-1">
                    <div class="user-info mb-1">
                      <h4 class="mb-1">Name - {{$userdata->username}}</h4>
                      <p class="card-text">Email - {{$userdata->useremail}}</p>
                      <p class="card-text">User ID - {{$userdata->userid}}</p>
                      <p class="card-text">Phone - {{$userdata->userphone}}</p>
                      <p class="card-text">Total Refer - {{$userdata->referral_count}}</p>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-5 text-center">
            	<form method="post" action="{{route('verify.user.kyc')}}" class="mb-2">
            		@csrf
            		<input type="hidden" value="{{$kycdata->id}}" name="id">
                <input type="hidden" value="{{$kycdata->userid}}" name="userid">
            		<button type="submit" class="btn btn-success border-0 view_buuton">Verify</button>
            	</form>
            	<form method="post" action="{{route('reject.user.kyc')}}" class="mb-2">
            		@csrf
            		<input type="hidden" value="{{$kycdata->id}}" name="id">
                <input type="hidden" value="{{$kycdata->userid}}" name="userid">
            		<button type="submit" class="btn btn-danger border-0 view_buuton">Reject</button>
            	</form>
            	<form method="post" action="{{route('pending.user.kyc')}}" >
            		@csrf
            		<input type="hidden" value="{{$kycdata->id}}" name="id">
                <input type="hidden" value="{{$kycdata->userid}}" name="userid">
            		<button type="submit" class="btn btn-warning border-0 view_buuton">Pending</button>
            	</form>
            	
            </div>

          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-6 col-lg-8 col-md-7">
      <div class="card user-card">
      	<div class="card-header bg-warning">
            <p class="card-title"><i class="las la-sliders-h"></i> Player Kyc Details</p>
          </div>
        <div class="card-body mt-2">
          <div class="row">
              <div class="col-7">
              	<div class="d-flex justify-content-start">
                    <div class="d-flex flex-column ml-1">
                    <div class="user-info mb-1">
                      <h4 class="mb-1">Name - {{$kycdata->first_name}} {{$kycdata->last_name}}</h4>
                      <p class="card-text">Docyment Type - {{$kycdata->document_type}}</p>
                      <p class="card-text">Docyment No. - {{$kycdata->document_number}}</p>
                      <p class="card-text">DOB - {{$kycdata->dob}}</p>
                      <p class="card-text">
                      	@if($kycdata->verification_status == 0)
                      	Verification Status - <b class="text-warning">Pending</b>
                      	@elseif($kycdata->verification_status == 1)
                      	Verification Status - <b class="text-success">Verified</b>
                      	@else
                      	Verification Status - <b class="text-danger">Rejected</b>
                      	@endif
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-5">
              	<img src="{{$kycdata->document_image}}" width="150" class="mb-1">
              </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-12 col-lg-8 col-md-7">
      <div class="card user-card">
        <div class="card-body">
          <div class="row">
  <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Player Name</th>
                    <th>Payment Method</th>
                    <th>Account</th>
                    <th>Amount</th>
                    <th>Txn ID</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($data as $key =>$result)
                  <tr>
                    <td><span class="font-weight-bold">{{ $data->firstItem() + $key }}</span></td>
                    <td>{{ $playerName->username }}</td>
                    <td>{{ $result->payment_method }}</td>
                    <td>
                      @if($result->payment_method == "Bank")
                       Name - {{ $result->bank_name }} <br>
                       A/C - {{ $result->account_number }}<br>
                       IFSC Code - {{ $result->ifsc_code }}<br>
                      @else
                       {{ $result->wallet_number }}
                      @endif
                    </td>
                    <td>{{ $result->amount }} INR</td>
                    <td>
                      @if($result->transaction_id !="")
                       {{$result->transaction_id}}
                      @else
                      Amount Pending
                      @endif
                    </td>
                    <td>
                    @if($result->status == 1)
                    <div class="badge badge-light-success">Success</div>
                    @elseif($result->status == 0)
                    <div class="badge badge-light-warning">Pending</div>
                    @else
                    <div class="badge badge-light-danger">Failed</div>
                    @endif
                   </td>
                   <td>
                        <button type="button" data-trans="{{$result->transaction_id}}" data-requestid="{{$result->id}}" data-pay="{{$result->payment_method}}" data-id="{{$result->userid}}" data-username="{{$playerName->username}}" data-status="{{$result->status}}" data-toggle="modal" data-target="#addCoin" title="Edit" class="btn btn-icon btn-icon rounded-circle btn-primary bg-darken-4 border-0 edit_buuton">
                         <i class="las la-highlighter"></i>
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
    </div>
  </div>
  <!-- User Card & Plan Ends -->


          <div class="d-inline-block">
              <!-- Button trigger modal -->
              <!-- Modal -->
        <div class="modal fade text-left modal-success" id="addCoin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel110" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title userTitle" id="myModalLabel110"></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form method="post" action="{{route('update.withdraw.status')}}" data-parsley-validate autocomplete="off">
                        @csrf
                        <div class="form-group d-none">
                        <label>Player ID <span class="text-danger required-sign">*</span></label>
                        <input type="text" value="" readonly class="form-control request_id" name="RequestID" required />
                        </div>
                        <div class="form-group">
                        <label>Player ID <span class="text-danger required-sign">*</span></label>
                        <input type="text" readonly class="form-control player_id" name="PlayerID" required />
                        </div>
                        <div class="form-group">
                        <label>Player Name <span class="text-danger required-sign">*</span></label>
                        <input type="text" readonly class="form-control player_name" name="PlayerName" required />
                        </div>
                        <div class="form-group">
                        <label>Payment Method <span class="text-danger required-sign">*</span></label>
                        <input type="text" readonly class="form-control payment_method" name="payment_method" required />
                        </div>
                        <div class="form-group">
                        <label>Transaction ID <span class="text-danger required-sign">*</span></label>
                        <input type="text" class="form-control transaction_id" name="transaction_id" required />
                        </div>
                        <div class="form-group">
                        <label>Transaction Status <span class="text-danger required-sign">*</span></label>
                         <select class="select2 form-control form-control-lg status" required name="status">
                         </select>
                       </div>
                       <div class="row my-2">
                      <div class="col-12">
                      <button type="submit" class="btn btn-orange float-right border-0 submit_btn">Submit</button>
                      </div>
                    </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
    <!-- END: Content-->
@endsection
@section('js')
<script src="{{URL::asset('admin-assets/css/custom/js/player/player.js')}}"></script>
@endsection
