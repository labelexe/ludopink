@extends('admin.layout.master')
@section('title')
 All Tournament List
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
            <p class="card-title"><i class="las la-sliders-h"></i> All Tournament List</p>
            <a href="{{url('/')}}/admin/tournament/add"><button class="btn btn-orange border-0 round"><i class="las la-plus-circle"></i> Add New Tournament</button></a>
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
                    <th>Tournament Title</th>
                    <th>Bet Amount</th>
                    <th>Joining Time</th>
                    <th>No. Of Player</th>
                    <th>No. Of Winner</th>
                    <th>Winner Prize</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($data as $key =>$result)
                  <tr>
                    <td><span class="font-weight-bold">{{ $data->firstItem() + $key }}</span></td>
                    <td>{{ $result->title }}</td>
                    <td>{{ $result->bit_amount }} <i class="las la-rupee-sign"></i></td>
                    <td>{{ $result->tournament_interval }} Min</td>
                    <td>{{ $result->no_of_player }} <i class="las la-users"></i></td>
                    <td>
                      @if($result->no_of_player == "2")
                           1 <i class="las la-user-alt"></i>
                      @else
                      {{$result->no_of_winner}} <i class="las la-user-friends"></i>
                      @endif
                    </td>

                    <td>

                      @if($result->no_of_player == "2")
                       1st Price - {{$result->two_player_winning}} <i class="las la-rupee-sign"></i>
                      @else

                      @if($result->no_of_player == "4")
                      1st Price - @if($result->four_player_winning_1 !="") {{ $result->four_player_winning_1 }} <i class="las la-rupee-sign"></i> @else 0 <i class="las la-rupee-sign"></i> @endif <br>
                      2nd Price - @if($result->four_player_winning_2 !="") {{ $result->four_player_winning_2 }} <i class="las la-rupee-sign"></i> @else 0 <i class="las la-rupee-sign"></i> @endif<br>
                      3rd Price - @if($result->four_player_winning_3 !="") {{ $result->four_player_winning_3 }} <i class="las la-rupee-sign"></i> @else 0 <i class="las la-rupee-sign"></i> @endif

@endif

                      @endif
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

    <!-- END: Content-->
@endsection
@section('js')
@endsection
