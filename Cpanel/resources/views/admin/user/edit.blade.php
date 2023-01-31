@extends('layout.admin_master')
@section('title','Edit User')
@section('content')

<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Update user</h1>
    </div>
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-md-12">
        <div class="ibox">
            <div class="ibox-body">
                <form method="post" action="{{ route('admin.user.update') }}">
                        @csrf
                        <input type="hidden" name="user_id" id="" value="{{ $user->id}}">
                            <div class="form-group">
                                <label>Account Type</label>
                                <select class="form-control" name="role" required>

                                    <option value="" disabled selected> Select Role </option>
                                        <option value="customer" @if($user->role == 'customer') selected @endif>  Customer </option>
                                        <option value="manager" @if($user->role == 'manager') selected @endif>  Manager </option>
                                </select>
                                @error('role')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                                <div class="form-group">
                                    <label>First Name</label>
                                    <input class="form-control" type="text" value="{{ $user->name }}" required name="name">
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input class="form-control" type="text" value="{{ $user->userDetail->last }}" required name="last">
                                    @error('last')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>


                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" type="email" value="{{ $user->email}}" disabled>
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Phone No.</label>
                                <input class="form-control" type="text" value="{{ $user->userDetail->phone }}" name="phone">
                                @error('phone')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>


                            <div class="form-group">
                                <label>Education Qualification</label>
                                <input class="form-control" type="text" value="{{ $user->userDetail->education }}" name="education">
                                @error('education')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Previous Work Exp</label>
                                <input class="form-control" type="text" value="{{ $user->userDetail->experience }}" name="experience">
                                @error('experience')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control" type="password" placeholder="password" name="password">
                                @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button class="btn btn-info" type="submit">Submit</button>
                                </div>
                        </form>
            </div>
        </div>
            </div>
        </div>
        <div>

        </div>
    </div>
    <!-- END PAGE CONTENT-->

</div>


@endsection
