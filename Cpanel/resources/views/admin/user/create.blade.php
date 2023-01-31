@extends('layout.admin_master')
@section('title','Users')

@section('content')

<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Add Employee / Manager</h1>
    </div>
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-md-12">
        <div class="ibox">
            <div class="ibox-body">
                <form method="post" action="{{ route('admin.user.store') }}">
                        @csrf
                            <div class="form-group">
                                <label>Account Type</label>
                                <select class="form-control" name="role" required>
                                    <option value="" disabled selected> Select Role </option>
                                        <option value="customer">  Customer </option>
                                        <option value="manager">  Manager </option>
                                </select>
                                @error('role')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                                <div class="form-group">
                                    <label>First Name</label>
                                    <input class="form-control" type="text" placeholder="" required name="name">
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input class="form-control" type="text" placeholder="" required name="last">
                                    @error('last')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>


                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" type="email" placeholder="email" name="email">
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Phone No.</label>
                                <input class="form-control" type="text" placeholder="Phone" name="phone">
                                @error('phone')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>


                            <div class="form-group">
                                <label>Education Qualification</label>
                                <input class="form-control" type="text" placeholder="Education" name="education">
                                @error('education')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Previous Work Exp</label>
                                <input class="form-control" type="text" placeholder="Experience" name="experience">
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
