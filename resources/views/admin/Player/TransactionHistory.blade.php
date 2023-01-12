@extends('admin.layout.master')
@section('title')
 {{$UserData->username}} Transaction History
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
        <p class="card-title"><i class="las la-sliders-h"></i> {{$UserData->username}} Transaction History</p>
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
                    <th>Order ID</th>
                    <th>Transaction ID</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Date</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($data as $key =>$result)
                  <tr>
                    <td><span class="font-weight-bold">{{ $data->firstItem() + $key }}</span></td>
                    <td>{{ $UserData->username }}</td>
                    <td>{{ $result->order_id }}</td>
                    <td>{{ $result->txn_id }}</td>
                    <td>{{ $result->amount }} INR</td>
                    <td>
                      @if($result->status == "Success")
                    <div class="badge badge-light-success">Success</div>
                    @else
                    <div class="badge badge-light-danger">Failed</div>
                    @endif
                   </td>
                   <td>{{ $result->trans_date }}</td>
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
