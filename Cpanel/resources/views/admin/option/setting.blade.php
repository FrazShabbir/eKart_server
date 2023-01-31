@extends('layout.admin_master')
@section('title','Setting')

@section('content')

<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title"> Options</h1>
    </div>
    <div class="page-content fade-in-up" style="min-height:700px;">
        <div class="ibox">
            <div class="ibox-body">
                <form action="{{ route('admin.contact.setting.update')}}" method="post" enctype="multipart/form-data">
                    <div class="row">
                        @csrf
                        <input type="hidden"  name="id" value="{{ $option->id }}">
                        <div class="col-lg-6 form-group">
                            <label for=""> <strong>Logo</strong> </label>
                            <input type="file" name="logo" class="form-control">
                        </div>

                        <div class="col-lg-6 form-group">
                            <label for=""> <strong>Scource</strong> </label> <br>
                            <img src="{{asset('storage/app/public/data/'.$option->logo) }}" class="img-thumbnail" style="width: 200px;height:100px" >
                        </div>
                    </div>

                    <div class="row">
                        @csrf
                        <div class="col-lg-6 form-group">
                            <label for=""> <strong>Address</strong> </label>
                            <input type="text" name="address" class="form-control" value="{{ $option->address }}">
                        </div>

                        <div class="col-lg-6 form-group">
                            <label for=""> <strong>Phone</strong> </label>
                            <input type="number" name="phone" class="form-control" value="{{ $option->phone }}">
                        </div>

                        <div class="col-lg-6 form-group">
                            <label for=""> <strong>Email</strong> </label>
                            <input type="email" name="email" class="form-control" value="{{ $option->email }}">
                        </div>

                        <div class="col-lg-3 form-group">
                            <label for=""> <strong>FaveIcon</strong> </label>
                            <input type="file" name="faveIcon" class="form-control">
                        </div>

                        <div class="col-lg-3 form-group">
                            <label for=""> <strong>Scource</strong> </label> <br>
                            <img src="{{asset('storage/app/public/data/'.$option->faveIcon) }}" class="img-thumbnail" style="width: 50px;height:50px" >
                        </div>

                        <div class="col-lg-12 form-group">
                            <label for=""> <strong>Copy Right</strong> </label>
                            <input type="text" name="cr" class="form-control" value="{{ $option->cr }}">
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-lg-12 " style="margin-bottom:10px;">
                            <strong> Social Media URL's</strong>

                        </div>
                        <div class="col-lg-3">
                             <label for=""> <strong>Facebook</strong> </label>
                            <input type="text" name="fb" class="form-control" value="{{ $option->fb }}">
                        </div>
                        <div class="col-lg-3">
                             <label for=""> <strong> Twitter </strong> </label>
                            <input type="text" name="twitter" class="form-control" value="{{ $option->twitter }}">
                        </div>
                        <div class="col-lg-3">
                             <label for=""> <strong> Pinterest </strong> </label>
                            <input type="text" name="pinterest" class="form-control" value="{{ $option->pinterest }}">
                        </div>
                        <div class="col-lg-3">
                            <label for=""> <strong> Instagram </strong> </label>
                           <input type="text" name="insta" class="form-control" value="{{ $option->insta }}">
                       </div>


                    </div>


                    <div class="row">
                        <div class="col-lg-12">
                            <br>
                            <input type="submit" name="" class="btn btn-info"  >
                        </div>
                    </div>


                </form>
            </div>
        </div>
        <div>

        </div>
    </div>
    <!-- END PAGE CONTENT-->

</div>


@endsection
