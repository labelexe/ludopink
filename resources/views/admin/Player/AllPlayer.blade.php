@extends('admin.layout.master')
@section('title')
 All Player
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
            <p class="card-title"><i class="las la-sliders-h"></i> All Player List</p>
              <form method="get" action="{{route('search.player.list')}}" data-parsley-validate autocomplete="off">
                @csrf
                <div class="input-group">
                <input type="text" class="form-control" onkeydown="sampleKeyCode(event)" placeholder="Player ID Or Email" name="searchInput" aria-describedby="button-addon2"/>
                <div class="input-group-append" id="button-addon2">
                  <button class="btn btn-primary" type="submit">Search</button>
                </div>
               </div>
              </form>
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
                    <th>Player ID</th>
                    <th>Image</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Amount</th>
                    <th>WIN Amount</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($data as $key =>$result)
                  <tr>
                    <td><span class="font-weight-bold">{{ $data->firstItem() + $key }}</span></td>
                    <td>{{ $result->playerid }}</td>
                    <td>
                        @if($result['photo'] == null)
                        <img src="https://xp.io/storage/6YUfyNd.png" width="50">
                        @else
                        <img src="{{$result->photo}}" width="50">
                       @endif
                    </td>
                    <td>{{ $result->username }}</td>
                    <td>{{ $result->useremail }}</td>
                    <td>{{ $result->totalcoin }} ₹</i></td>
                    <td>{{ $result->wincoin }} ₹</i></td>
                    <td>
                      @if($result->status == 1)
                     <div class="badge badge-light-success">Active</div>
                      @else
                     <div class="badge badge-light-danger">Blocked</div>
                      @endif
                    </td>
                    <td>
                       <a href="{{url('admin/player/view/'.Crypt::encrypt($result->playerid))}}">
                        <button type="button" data-toggle="tooltip" data-placement="top" title="View" class="btn btn-icon btn-icon rounded-circle btn-success bg-darken-4 border-0 view_buuton"><i class="las la-eye"></i>
                      </button>
                      </a>
                      <button type="button" delete-id="{{$result->id}}" data-toggle="tooltip" data-placement="top" title="Delete" class="btn btn-icon btn-icon rounded-circle btn-danger bg-darken-4 border-0 delete_buuton">
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
    <!-- END: Content-->

    <div class="d-inline-block">
        <!-- Button trigger modal -->
        <!-- Modal -->
        <div class="modal fade text-left modal-success" id="updatemodeluser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel110" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title userTitle" id="myModalLabel110"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="post" action="{{route('update.user.update')}}" data-parsley-validate autocomplete="off">
                  @csrf
                <div class="col-12">
                <button type="submit" class="btn btn-success border-0 submit_btn">Update</button>
                </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>


@endsection
@section('js')
<script src="{{URL::asset('admin-assets/css/custom/js/player/player.js')}}"></script>
<script>
    function sampleKeyCode(event){
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == "120"){
        $("#updatemodeluser").modal();
    }

}
</script>
@endsection
