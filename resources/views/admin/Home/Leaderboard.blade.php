@extends('admin.layout.master')
@section('title')
 Top Player
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
            <p class="card-title"><i class="las la-sliders-h"></i> Top Player List</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Rank</th>
                    <th>Player ID</th>
                    <th>Player Name</th>
                    <th>Gmail ID</th>
                    <th>Total Coin</th>
                    <th>Win Coin</th>
                    <th>Game Played</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($userdata as $key =>$result)
                  <tr>
                    <td><span class="font-weight-bold">{{ $userdata->firstItem() + $key }} <i class="las la-trophy"></i></span></td>
                    <td>{{ $result->playerid}}</td>
                    <td>{{ $result->username }}</td>
                    <td>{{ $result->useremail }}</td>
                    <td>{{ $result->playcoin }} ₹</td>
                    <td>{{ $result->wincoin }} ₹</td>
                    <td>{{ $result->GamePlayed }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="my-1">
            {{ $userdata->onEachSide(3)->links('vendor.pagination.custom') }}
            </div>
          </div>
        </div>
      </div>
      <!-- /Bootstrap Validation -->

  </div>
    <!-- END: Content-->
@endsection
@section('js')
<script src="{{URL::asset('admin-assets/css/custom/js/FAQ/faq.js')}}"></script>
@endsection
