@extends('admin.layout.master')
@section('title')
 All Player
@endsection
@section('css')
 <!--  link custom css link here -->
 <link rel="stylesheet" type="text/css" href="{{URL::asset('admin-assets/css/plugins/charts/chart-apex.min.css')}}">
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
    <div class="col-xl-8 col-lg-8 col-md-7">
      <div class="card user-card">
        <div class="card-body">
          <div class="row">
            <div class="col-xl-12 col-lg-12 d-flex flex-column justify-content-between border-container-lg">
              <div class="user-avatar-section">
                <div class="d-flex justify-content-start">
                    @if($data['data'] == null)
                    {{-- <img src="https://xp.io/storage/6YUfyNd.png" width="50"> --}}
                    <img class="img-fluid rounded" src="https://xp.io/storage/6YUfyNd.png" height="104" width="104" alt="User avatar"
                  />
                    @else
                    <img class="img-fluid rounded" src="{{$data->photo}}" height="104" width="104" alt="User avatar"
                    />
                   @endif

                  <div class="d-flex flex-column ml-1">
                    <div class="user-info mb-1">
                      <h4 class="mb-1">{{$data->username}}</h4>
                      <span class="card-text">{{$data->userphone}}</span>
                    </div>
                    <div class="d-flex flex-wrap mb-1">
                      {{-- <button data-toggle="modal" data-target="#EditUser" data-id="{{$data->playerid}}" data-username="{{$data->username}}" data-phone="{{$data->userphone}}" data-email="{{$data->useremail}}" data-coin="{{$data->points}}" data-wincoin="{{$data->winning_amount}}" data-kyc="{{$data->kyc_status}}" class="btn-sm btn-info mr-1 border-0 rounded-0 EditUserDetails">Edit</button> --}}
                      {{-- @if($data->banned == 1)
<button data-id="{{$data->userid}}" data-banned="{{$data->banned}}" class="btn-sm btn-warning mr-1 border-0 rounded-0 block_btn">Block</button>
                      @else
<button data-id="{{$data->userid}}" data-banned="{{$data->banned}}" class="btn-sm btn-danger mr-1 border-0 rounded-0 block_btn">Unblock</button>
                      @endif --}}
                      <button delete-id="{{$data->id}}" class="btn-sm btn-danger mr-1 border-0 rounded-0 delete_buuton">Delete</button>
                      <button data-coin="{{$data->totalcoin}}" data-id="{{$data->playerid}}" data-wincoin="{{$data->wincoin}}" data-username="{{$data->username}}" class="btn-sm btn-success mr-1 border-0 rounded-0 addCoinButton" data-toggle="modal" data-target="#addCoin">Add Coin</button>
                      <button data-coin="{{$data->totalcoin}}" data-wincoin="{{$data->wincoin}}" data-id="{{$data->playerid}}" data-username="{{$data->username}}" class="btn-sm btn-primary mr-1 border-0 rounded-0 CutCoinButton" data-toggle="modal" data-target="#CutCoin">Deduct Coin</button>
                      <a href="{{url('admin/player/transction/'.Crypt::encrypt($data->playerid))}}"><button class="btn-sm btn-warning mr-1 border-0 rounded-0 TransactionHistory">Transaction History</button></a>
                      <a href="{{url('admin/player/withdraw/'.Crypt::encrypt($data->playerid))}}"><button class="btn-sm btn-pink mr-1 mt-1 border-0 rounded-0 WithHistory">Withdraw History</button></a>
                      <a href="{{url('admin/player/gamehistory/'.Crypt::encrypt($data->playerid))}}"><button class="btn-sm btn-blue mr-1 mt-1 border-0 rounded-0 WithHistory">Game History</button></a>

                    </div>
                    <div class="d-flex flex-wrap">

                    </div>
                  </div>
                </div>
              </div>
              <div class="d-flex align-items-center user-total-numbers mt-1">
                <div class="d-flex align-items-center mr-2">
                  <div class="color-box bg-primary">
                    <i data-feather="dollar-sign" class="text-primary"></i>
                  </div>
                  <div class="ml-1">
                    <h5 class="mb-0">{{$data->totalcoin}} ₹</h5>
                    <small>Current Amount</small>
                  </div>
                </div>
                <div class="d-flex align-items-center">
                  <div class="color-box bg-success">
                    <i data-feather="trending-up" class="text-success"></i>
                  </div>
                  <div class="ml-1">
                    <h5 class="mb-0">{{$data->wincoin}} ₹</h5>
                    <small>Current Winning Amount</small>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /User Card Ends-->

  <div class="col-xl-4 col-lg-8 col-md-7">
      <div class="card user-card">
        <div class="card-body">
          <div class="row">
            <div class="col-xl-12 col-lg-12 d-flex flex-column justify-content-between border-container-lg">
              <div class="user-avatar-section">
                <div class="d-flex justify-content-start">
                    <div class="d-flex flex-column ml-1">
                    <div class="user-info mb-1">
                      {{-- <button data-id="{{$data->userid}}" data-username="{{$data->username}}" class="btn-sm btn-success mr-1 border-0 mb-1 rounded SendNotification" data-toggle="modal" data-target="#SendNotification"><i class="las la-bell"></i> Send Notification</button> --}}
                      <p class="card-text">Player ID - {{$data->playerid}}</p>
                      <p class="card-text">Email - {{$data->useremail}}</p>
                      {{-- <p class="card-text">Total Refer - {{$data->referral_count}}
                        <a href="{{url('admin/player/referd/user/'.Crypt::encrypt($data->userid))}}"><button class="btn-sm btn-info mr-1 border-0 rounded WithHistory"><i class="las la-eye"></i> View Refered User </button></a>
                      </p> --}}
                      <p class="card-text">Register Date - {{$data->registerDate}}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



    <!-- /Plan CardEnds -->
  </div>
  <!-- User Card & Plan Ends -->

  <section id="statistics-card">


 <!-- Line Chart Card -->
  <div class="row">
    <div class="col-lg-4 col-sm-6 col-12">
      <div class="card">
        <div class="card-header align-items-start pb-0">
          <div>
            <h2 class="font-weight-bolder">
              @if($data->totalcoin > 1000)
              {{$data->totalcoin/1000}} K ₹
              @else
              {{$data->totalcoin}} ₹
              @endif
            </h2>
            <p class="card-text">Current Wallet Amount</p>
          </div>
          <div class="avatar bg-light-primary p-50">
            <div class="avatar-content">
              <i class="las la-rupee-sign font-medium-5"></i>
            </div>
          </div>
        </div>
        <div id="line-area-chart-5"></div>
      </div>
    </div>
    <div class="col-lg-4 col-sm-6 col-12">
      <div class="card">
        <div class="card-header align-items-start pb-0">
          <div>
            <h2 class="font-weight-bolder">
               @if($withdrawAmount > 1000)
              {{$withdrawAmount/1000}} K ₹
              @else
              {{$withdrawAmount}} ₹
              @endif
            </h2>
            <p class="card-text">Total Withdraw Amount</p>
          </div>
          <div class="avatar bg-light-success p-50">
            <div class="avatar-content">
              <i class="las la-file-invoice-dollar font-medium-5"></i>
            </div>
          </div>
        </div>
        <div id="line-area-chart-6"></div>
      </div>
    </div>
    <div class="col-lg-4 col-sm-6 col-12">
      <div class="card">
        <div class="card-header align-items-start pb-0">
          <div>
            <h2 class="font-weight-bolder">{{$NoOfWithdraw}}</h2>
            <p class="card-text">Total Number Of Withdraw</p>
          </div>
          <div class="avatar bg-light-warning p-50">
            <div class="avatar-content">
              <i class="las la-hand-holding-usd font-medium-5"></i>
            </div>
          </div>
        </div>
        <div id="line-area-chart-7"></div>
      </div>
    </div>
  </div>
  <!--/ Line Chart Card -->
  <!-- Line Area Chart Card -->
  <div class="row">
    <div class="col-lg-3 col-sm-6 col-12">
      <div class="card">
        <div class="card-header flex-column align-items-start pb-0">
          <div class="avatar bg-primary p-50 m-0">
            <div class="avatar-content">
             <i class="las la-rupee-sign font-medium-5"></i>
            </div>
          </div>
          <h2 class="font-weight-bolder mt-1">
            @if($TotalTrans > 1000)
            {{$TotalTrans/1000}} K
            @else
            {{$TotalTrans}}
            @endif
          </h2>
          <p class="card-text">Total Transaction</p>
        </div>
        <div id="line-area-chart-1"></div>
      </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12">
      <div class="card">
        <div class="card-header flex-column align-items-start pb-0">
          <div class="avatar bg-success p-50 m-0">
            <div class="avatar-content">
             <i class="las la-exchange-alt font-medium-5"></i>
            </div>
          </div>
          <h2 class="font-weight-bolder mt-1">
            @if($TotalSuccessTrans > 1000)
            {{$TotalSuccessTrans/1000}} K
            @else
            {{$TotalSuccessTrans}}
            @endif
          </h2>
          <p class="card-text">Total Success Transaction</p>
        </div>
        <div id="line-area-chart-2"></div>
      </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12">
      <div class="card">
        <div class="card-header flex-column align-items-start pb-0">
          <div class="avatar bg-danger p-50 m-0">
            <div class="avatar-content">
              <i class="las la-exchange-alt font-medium-5"></i>
            </div>
          </div>
          <h2 class="font-weight-bolder mt-1">
            @if($TotalFailedTrans > 1000)
            {{$TotalFailedTrans/1000}} K
            @else
            {{$TotalFailedTrans}}
            @endif
          </h2>
          <p class="card-text">Total Failed Transaction</p>
        </div>
        <div id="line-area-chart-3"></div>
      </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12">
      <div class="card">
        <div class="card-header flex-column align-items-start pb-0">
          <div class="avatar bg-warning p-50 m-0">
            <div class="avatar-content">
             <i class="las la-users font-medium-5"></i>
            </div>
          </div>
          <h2 class="font-weight-bolder mt-1">
            {{$data->referral_count*$Websetting->refer_bonus}}
          </h2>
          <p class="card-text">Total Refer Earning</p>
        </div>
        <div id="line-area-chart-4"></div>
      </div>
    </div>
  </div>
  <!--/ Line Area Chart Card -->

</section>


    <div class="d-inline-block">
              <!-- Button trigger modal -->
              <!-- Modal -->
        <div class="modal fade text-left modal-success" id="addCoin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel110" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="myModalLabel110">Add Coin</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form method="post" action="{{route('add.user.coin')}}" data-parsley-validate autocomplete="off">
                        @csrf
                        <div class="form-group">
                        <label>Player ID <span class="text-danger required-sign">*</span></label>
                        <input type="text" readonly class="form-control player_id" name="PlayerID" required />
                        </div>
                        <div class="form-group">
                        <label>Player Name <span class="text-danger required-sign">*</span></label>
                        <input type="text" readonly class="form-control player_name" name="PlayerName" required />
                        </div>
                        <div class="form-group">
                        <label>Total Play Coin <span class="text-danger required-sign">*</span></label>
                        <input type="text" readonly class="form-control total_coin" name="TotalCoin" required />
                        </div>
                        <div class="form-group">
                        <label>Total Winning Coin <span class="text-danger required-sign">*</span></label>
                        <input type="text" readonly class="form-control totalwin_coin" name="TotalWinCoin" required />
                        </div>
                        <div class="form-group">
                        <label>Add Coin In Play <span class="text-danger required-sign">*</span></label>
                        <input type="number" class="form-control coin_value" name="CoinValue" />
                        </div>
                        <div class="form-group">
                        <label>Add Coin In Winning <span class="text-danger required-sign">*</span></label>
                        <input type="number" class="form-control wincoin_value" value="0" name="WinValue" required />
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


            <!-- send notification -->

                <div class="d-inline-block">
              <!-- Button trigger modal -->
              <!-- Modal -->
        <div class="modal fade text-left modal-success" id="SendNotification" tabindex="-1" role="dialog" aria-labelledby="myModalLabel110" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="myModalLabel110">Send Notification</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form method="post" action="{{route('send.single.notofication')}}" data-parsley-validate autocomplete="off">
                        @csrf
                        <div class="form-group">
                        <label>User ID <span class="text-danger required-sign">*</span></label>
                        <input type="text" readonly class="form-control userID" name="userID" required />
                        </div>
                        <div class="form-group">
                        <label>Player Name <span class="text-danger required-sign">*</span></label>
                        <input type="text" readonly class="form-control player_name" name="PlayerName" required />
                        </div>
                        <div class="form-group">
                        <label>Notification Title <span class="text-danger required-sign">*</span></label>
                        <input type="text" class="form-control coin_value" name="noti_title" required />
                        </div>
                        <div class="form-group">
                        <label>Notification Message<span class="text-danger required-sign">*</span></label>
                        <textarea class="form-control faq_desc" required name="message" rows="8"></textarea>
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




              <div class="d-inline-block">
              <!-- Button trigger modal -->
              <!-- Modal -->
              <div class="modal fade text-left modal-success" id="CutCoin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel110"
                aria-hidden="true"
              >
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="myModalLabel110">Deduct Coin</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form method="post" action="{{route('cut.user.coin')}}" data-parsley-validate autocomplete="off">
                        @csrf
                        <div class="form-group">
                        <label>Player ID <span class="text-danger required-sign">*</span></label>
                        <input type="text" readonly class="form-control player_id" name="PlayerID" required />
                        </div>
                        <div class="form-group">
                        <label>Player Name <span class="text-danger required-sign">*</span></label>
                        <input type="text" readonly class="form-control player_name" name="PlayerName" required />
                        </div>
                        <div class="form-group">
                        <label>Total Play Coin <span class="text-danger required-sign">*</span></label>
                        <input type="text" readonly class="form-control total_coin" name="TotalCoin" required />
                        </div>
                        <div class="form-group">
                        <label>Total Winning Coin <span class="text-danger required-sign">*</span></label>
                        <input type="text" readonly class="form-control totalwin_coin" name="TotalWinCoin"  />
                        </div>
                       <div class="form-group">
                       <label>Deduct In Play Coin <span class="text-danger required-sign">*</span></label>
                       <input type="number" class="form-control coin_value" name="CoinValue" />
                       <small class="text-danger d-none warning-not"><b>Please Enter Less then of Total Play Coin Value</b></small>
                       </div>
                        <div class="form-group">
                       <label>Deduct In Winning Coin <span class="text-danger required-sign">*</span></label>
                       <input type="number" class="form-control wincoin_value" required name="WinValue" value="0" />
                       <small class="text-danger d-none warning-notice"><b>Please Enter Less then of Total Winning Coin Value</b></small>
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

<!-- edit user model -->

 <div class="d-inline-block">
              <!-- Button trigger modal -->
              <!-- Modal -->
        <div class="modal fade text-left modal-success" id="EditUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel110" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title userTitle" id="myModalLabel110"></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form method="post" action="{{route('update.user.details')}}" data-parsley-validate autocomplete="off">
                        @csrf
                        <div class="form-group">
                        <label>Player ID <span class="text-danger required-sign">*</span></label>
                        <input type="text" readonly class="form-control player_id" name="PlayerID" required />
                        </div>
                        <div class="form-group">
                        <label>Player Name <span class="text-danger required-sign">*</span></label>
                        <input type="text" class="form-control player_name" name="PlayerName" required />
                        </div>
                        <div class="form-group">
                        <label>Player Phone <span class="text-danger required-sign">*</span></label>
                        <input type="text" class="form-control player_phone" name="PlayerPhone" required />
                        </div>
                        <div class="form-group">
                        <label>Player Email <span class="text-danger required-sign">*</span></label>
                        <input type="text" class="form-control player_email" name="PlayerEmail" required />
                        </div>
                        <div class="form-group">
                        <label>Total Play Coin <span class="text-danger required-sign">*</span></label>
                        <input type="text" class="form-control total_coin" name="TotalCoin" required />
                        </div>
                        <div class="form-group">
                        <label>Total Winning Coin <span class="text-danger required-sign">*</span></label>
                        <input type="text" class="form-control total_wincoin" name="TotalWinCoin" required />
                        </div>
                        <div class="form-group">
                        <label>Kyc Status <span class="text-danger required-sign">*</span></label>
                         <select class="select2 form-control form-control-lg kyc_status" name="KycStatus">

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
 <script src="{{URL::asset('admin-assets/vendors/js/charts/apexcharts.min.js')}}"></script>
  <script src="{{URL::asset('admin-assets/js/scripts/cards/card-statistics.min.js')}}"></script>
<script src="{{URL::asset('admin-assets/css/custom/js/player/player.js')}}"></script>
@endsection
