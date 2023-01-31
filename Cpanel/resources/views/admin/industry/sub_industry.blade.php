@extends('layout.admin_master')
@section('title', 'Sub Industry')

@section('content')

    <div class="content-wrapper">
        <!-- START PAGE CONTENT-->
        <div class="page-heading">
            <h1 class="page-title">Sub Industries</h1>
        </div>
        <div class="page-content fade-in-up" style="min-height:700px;">
            <div class="row">
                <div class="col-md-6">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">All Industry Types</div>
                            <div class="ibox-tools">
                                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                            </div>
                        </div>
                        <div class="ibox-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th width="50px">S.No</th>
                                            <th>Industry</th>
                                            <th>Sub Industry</th>
                                            <th>Category Price</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subindustries as $subindustry)
                                            <tr>
                                                <td> {{ $loop->iteration }}</td>
                                                <td> {{ $subindustry->industry->industryType }}</td>
                                                <td> {{ $subindustry->subindustry }}</td>
                                                <td> {{ $subindustry->category_price }}</td>
                                                <td>

                                                    <button class="btn btn-default btn-xs m-r-5 editProjectType"
                                                        data-toggle="modal" data-target="#editProject"
                                                        data-id="{{ $subindustry->id }}"
                                                        data-industary="{{ $subindustry->industry_id }}"
                                                        data-subindustary="{{ $subindustry->subindustry }}"
                                                        data-cat_price="{{ $subindustry->category_price }}"
                                                        data-desc="{{ $subindustry->description }}">
                                                        <i class="fa fa-pencil font-14"></i>
                                                    </button>

                                                    <button class="btn btn-default btn-xs deleteProjectType"
                                                        data-toggle="modal" data-target="#deleteProject"
                                                        data-deld="{{ $subindustry->id }}">
                                                        <i class="fa fa-trash font-14"></i>
                                                    </button>


                                                </td>
                                            </tr>
                                        @endforeach



                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Add New Sub Industry Type</div>
                            <div class="ibox-tools">
                                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                            </div>
                        </div>
                        <div class="ibox-body">
                            <form class="form-horizontal" method="post" action="{{ route('admin.subIndustry.create') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Industry Type <small class="text-danger"> *
                                        </small> </label>
                                    <div class="col-sm-10">
                                        <select class="form-control" required name="industryType">
                                            <option value="" selected disabled> Please Select </option>
                                            @foreach ($industries as $industry)
                                                <option value="{{ $industry->id }}"> {{ $industry->industryType }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('industryType')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Sub Industry <small class="text-danger"> *
                                        </small></label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="Sub Industry Title" name="subindustry"
                                            required>
                                        @error('subindustry')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror

                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Image icon <small class="text-danger"> *
                                        </small></label>
                                    <div class="col-sm-10">
                                        <input id="file-upload" type="file" name="imageIcon" required/>
                                        @error('imageIcon')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Description <small class="text-danger"> *
                                        </small></label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control"  placeholder="Description" name="description" required></textarea>
                                        @error('dec')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Banner Image <small class="text-danger"> *
                                        </small></label>
                                    <div class="col-sm-10">
                                        <input id="file-upload" type="file" name="banner" required/>
                                        @error('banner')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Category Pirce </label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="number"  name="category_price" value="0" min="0">
                                        @error('category_price')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-10 ml-sm-auto">
                                        <button class="btn btn-info" type="submit">Add Industry</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- END PAGE CONTENT-->

    </div>


    <div class="modal fade" id="deleteProject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Sub Industry </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.subIndustry.delete') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" id="delId" name="subId">

                        <div class="form-group">
                            <p>
                                This Action Can't Undo
                            </p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger"> Delete </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="editProject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true" enctype="multipart/form-data">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Sub Industry </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.subIndustry.update') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" id="proid" name="subindustry_id">

                        <div class="form-group">
                            <label for="">
                                Industry
                            </label>
                            <select class="form-control" name="industary" id="industary">

                                @foreach ($industries as $industry)
                                    <option value="{{ $industry->id }}"> {{ $industry->industryType }} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">
                                Sub Industry
                            </label>
                            <input type="text" id="subindustary" name="subindustary" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">
                                Description
                            </label>
                            <input type="text" id="desc" name="desc" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">
                                Icon
                            </label>
                            <input type="file" name="imageIcon" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">
                                Banner
                            </label>
                            <input type="file" name="banner" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">
                                Category Price
                            </label>
                            <input type="number" name="category_price" class="form-control" id="catPrice" required>
                        </div>



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary"> Update </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection



@section('custom_js')

    <script>
        $(document).on("click", ".editProjectType", function() {
            var proid = $(this).data('id');
            var industary = $(this).data('industary');
            var subindustary = $(this).data('subindustary');
            var desc = $(this).data('desc');
            var catPrice = $(this).data('cat_price');



            $('#proid').val(proid);
            $('#industary').val(industary);
            $('#subindustary').val(subindustary);
            $('#catPrice').val(catPrice);
            $('#desc').val(desc);
        });

        $(document).on("click", ".deleteProjectType", function() {
            var delId = $(this).data('deld');
            $('#delId').val(delId);
        });
    </script>

@endsection
