@extends('admin.layout.master')
@section('title')
 New Kyc Request
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
            <p class="card-title"><i class="las la-sliders-h"></i> New Kyc Request List</p>
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
                    <th>User Id</th>
                    <th>Name</th>
                    <th>Document Type</th>
                    <th>Document Number</th>
                    <th>Image</th>
                    <th>DOB</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($data as $key =>$result)
                  <tr>
                    <td><span class="font-weight-bold">{{ $data->firstItem() + $key }}</span></td>
                    <td>{{ $result->userid }}</td>
                    <td>{{ $result->first_name }} {{ $result->last_name }}</td>
                    <td>{{ $result->document_type }}</td>
                    <td>{{ $result->document_number }}</td>
                    <td><img src="{{$result->document_image}}" width="50"></td>
                    <td>{{ $result->dob }}</td>
                    <td><div class="badge badge-light-warning">Pending</div></td>
                    <td>
                      <a href="{{url('admin/kyc/view/'.Crypt::encrypt($result->id))}}">
                      <button type="button" data-toggle="modal" data-target="#KycStatus" delete-id="{{$result->id}}" data-toggle="tooltip" data-placement="top" title="View" class="btn btn-icon btn-icon rounded-circle btn-success bg-darken-4 border-0 view_buuton">
                       <i class="las la-eye"></i>
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
@endsection
@section('js')
<script src="{{URL::asset('admin-assets/css/custom/js/FAQ/faq.js')}}"></script>
@endsection
