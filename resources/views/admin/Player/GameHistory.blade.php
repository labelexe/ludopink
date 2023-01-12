@extends('admin.layout.master')
@section('title')
 {{$UserData->username}} Game History
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
        <p class="card-title"><i class="las la-sliders-h"></i> {{$UserData->username}} Game History</p>
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
                    <th>Seat</th>
                    <th>Bid Amount</th>
                    <th>Status</th>
                    <th>Win Amount</th>
                    <th>Loss Amount</th>
                    <th>Final Amount</th>
                    <th>Play Time</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($data as $key =>$result)
                  <tr>
                    <td><span class="font-weight-bold">{{ $data->firstItem() + $key }}</span></td>
                    <td>{{ $result->seat_limit }} Player</td>
                    <td>{{ $result->bid_amount }} ₹</td>
                    <td>
                        @if($result->status == "win")
                      <div class="badge badge-light-success">Win</div>
                      @else
                     <div class="badge badge-light-danger">Loss</div>
                      @endif

                    </td>
                    <td>
                      @if($result->status == "loss")
                      0 ₹
                      @else
                      {{ $result->Win_amount-$result->bid_amount }} ₹
                      @endif


                        </td>
                    <td>
                      @if($result->status == "win")
                      0 ₹
                      @else
                      {{ $result->loss_amount }} ₹
                      @endif
                    </td>
                    <td>{{ $result->finalamount }} ₹</td>
                    <td>{{ $result->playtime }}</td>
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
    <!-- END: Content-->
@endsection
@section('js')
@endsection
