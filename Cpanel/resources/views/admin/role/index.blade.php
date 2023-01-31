@extends('layout.admin_master')
@section('title','Home')

@section('content')

<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Home Page Text</h1>
    </div>
    <div class="page-content fade-in-up" style="min-height:700px;">
        <div class="ibox">
            <div class="ibox-body">
                <form action="{{ route('admin.role.create')}}" method="post" enctype="multipart/form-data">
                    <div class="row">
                        @csrf


                            <div class="col-sm-6 form-group">
                                <label>Add Role</label>
                                <input class="form-control @error('role') is-invalid @enderror" type="text" placeholder=""  required name="role" >
                            </div>


                    </div>
                    <button class="btn btn-info" type="submit"> Add New  </button>
                </form>

                <div class="table-responsive">
                    <hr>
                    <table style="width: 100%;" id="example1" class="table table-hover table-striped table-bordered">
                        <thead>
                            <th>S#</th>
                            <th>Name</th>
                            <th>Update</th>


                        </thead>
                        <tbody>
                            @foreach($roles as $role)

                                <tr>
                                    <form action="{{ route('admin.role.update')}}" method="post">
                                        @csrf
                                        <td>{{ $loop->iteration }}</td>
                                        <td> <input type="text" value="{{ $role->role }}" name="role" class="form-control">
                                            <input type="hidden" value="{{ $role->id}}" name="id"></td>
                                        <td> <button class="btn btn-sm btn-info"> Update </button> </td>
                                    </form>

                                </tr>

                            @endforeach
                           </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div>

        </div>
    </div>
    <!-- END PAGE CONTENT-->

</div>


@endsection
