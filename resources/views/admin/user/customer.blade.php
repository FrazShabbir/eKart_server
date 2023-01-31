@extends('layout.admin_master')
@section('title','All Customers')

@section('content')

<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">All Customers</h1>
    </div>
    <div class="page-content fade-in-up" style="min-height:700px;">
        <div class="ibox">

            <div class="ibox-body">
                <a href='{{ route('admin.customer.create')}}' class="btn btn-sm btn-info"> Add New Customer</a>
                <hr>
                <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Company / Institute</th>
                            <th>Designation</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>S.No</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Company / Institute</th>
                            <th>Designation</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        @foreach ($users as  $user)
                        <tr>
                            <td> {{ $loop->iteration }} </td>
                            <td> {{ $user->name }} </td>
                            <td>   @if($user->userDetail){{ $user->userDetail->last}}@endif </td>
                            <td>   @if($user->userDetail){{ $user->userDetail->company}}@endif  </td>
                            <td>   @if($user->userDetail){{ $user->userDetail->designation}}@endif </td>
                            <td> @if($user->status == 2 )
                                    <span class="badge badge-success badge-pill m-r-5 m-b-5">Active</span>
                                 @elseif($user->status == 0 )
                                    <span class="badge badge-danger badge-pill m-r-5 m-b-5">Pending</span>
                                 @else
                                    <span class="badge badge-success badge-pill m-r-5 m-b-5"> Unknown </span>
                                 @endif
                            </td>
                            <td> {{ $user->created_at}} </td>
                            <td>
                            <a href="{{ route('admin.user.customer.edit',$user->id) }}" class="btn btn-default btn-xs m-r-5" data-toggle="tooltip" data-original-title="Edit">
                                    <i class="fa fa-pencil font-14"></i>
                            </a>
                            <button class="btn btn-default btn-xs deleteUser" data-toggle="modal" data-target="#deleteUser"
                            data-id="{{ $user->id }}">
                                <i class="fa fa-trash font-14"></i>
                            </button>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        <div>

        </div>
    </div>
    <!-- END PAGE CONTENT-->

</div>
@include('admin.user.user-delete-modal')

@endsection
@section('custom_js')
<script>
    $(document).on("click", ".deleteUser", function () {
        var user_id = $(this).data('id');
        $('#user_id').val(user_id);
    });
</script>
@endsection


