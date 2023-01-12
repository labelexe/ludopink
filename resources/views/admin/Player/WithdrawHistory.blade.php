@extends('admin.layout.master')
@section('title')
 {{$UserData->username}} Withdraw History
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
        <p class="card-title"><i class="las la-sliders-h"></i> {{$UserData->username}} Withdraw History</p>
        <a href="{{ url('/') }}/admin/player/all">
                            <button type="button" class="btn btn-orange border-0 round"><i
                                    class="las la-arrow-alt-circle-left"></i> Back</button>
                        </a>
          </div>
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
          <div class="card-body">
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
                     @php
                     $playerdata = DB::table('userdatas')->where('playerid',$result->userid)->first();
                     @endphp

                    <td><span class="font-weight-bold">{{ $data->firstItem() + $key }}</span></td>
                    <td>{{ $playerdata->username }}</td>
                    <td>{{ $result->payment_method }}</td>
                    <td>

                      @if($result->payment_method !='Bank Account')
                         Acount - {{ $result->account_number }}<br>
                      @else
                       Name - {{ $result->bank_name }} <br>
                       A/C - {{ $result->account_number }}<br>
                       IFSC Code - {{ $result->ifsc_code }}<br>
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
                        <button type="button" data-trans="{{$result->transaction_id}}" data-requestid="{{$result->id}}" data-pay="{{$result->payment_method}}" data-id="{{$result->userid}}" data-username="{{$UserData->username}}" data-status="{{$result->status}}" data-toggle="modal" data-target="#addCoin" title="Edit" class="btn btn-icon btn-icon rounded-circle btn-primary bg-darken-4 border-0 edit_buuton">
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
      <!-- /Bootstrap Validation -->

  </div>

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
