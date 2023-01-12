@extends('admin.layout.master')
@section('title')
 All Contact
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
            <p class="card-title"><i class="las la-sliders-h"></i> All Contact List</p>
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
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($contact as $key =>$result)
                  <tr>
                    <td><span class="font-weight-bold">{{ $contact->firstItem() + $key }}</span></td>
                    <td>{{ $result->name }}</td>
                    <td>{{ $result->email }}</td>
                    <td>{{ $result->subject }}</td>
                    <td>{{ $result->message }}</td>
                    <td>
                      <button type="button"  data-name="{{ $result->name }}" data-email="{{ $result->email }}" data-subject="{{ $result->subject }}" data-message="{{ $result->message }}"  data-toggle="modal" data-target="#addCoin" data-placement="top" title="View" class="btn btn-icon btn-icon rounded-circle btn-success bg-darken-4 border-0 view_buuton">
                       <i class="las la-eye"></i>
                      </button>
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
            {{ $contact->onEachSide(3)->links('vendor.pagination.custom') }}
            </div>
          </div>
        </div>
      </div>
      <!-- /Bootstrap Validation -->

<div class="d-inline-block">
        <!-- Button trigger modal -->
        <!-- Modal -->
  <div class="modal fade text-left modal-success" id="addCoin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel110" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel110"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="post" action="{{route('add.user.coin')}}" data-parsley-validate autocomplete="off">
                  @csrf
                  <div class="form-group">
                  <label>Player Name <span class="text-danger required-sign">*</span></label>
                  <input type="text" readonly class="form-control player_name border-0" name="PlayerName" required />
                  </div>
                  <div class="form-group">
                  <label>Email <span class="text-danger required-sign">*</span></label>
                  <input type="text" readonly class="form-control total_coin border-0" name="TotalCoin" required />
                  </div>
                  <div class="form-group">
                  <label>Subject <span class="text-danger required-sign">*</span></label>
                  <input type="text" readonly class="form-control totalwin_coin border-0" name="TotalWinCoin" required />
                  </div>
                  <div class="form-group">
                  <label>Message <span class="text-danger required-sign">*</span></label>
                  <textarea type="number" readonly class="form-control coin_value border-0" name="CoinValue" rows="4"></textarea>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>




  </div>
    <!-- END: Content-->
@endsection
@section('js')
<script src="{{URL::asset('admin-assets/css/custom/js/contact/contact.js')}}"></script>
@endsection
