@extends('layout.admin_master')
@section('title','Article Category')
@section('customCss')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection
@section('content')
<div class="content-wrapper" >
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Article Category</h1>
    </div>
    <div class="page-content fade-in-up" style="min-height:700px;">
        <div class="row">
            <div class="col-md-6">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">All Article Category</div>
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
                                <th> Title</th>
                                <th> Icon </th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category )
                            <tr>
                                <td> {{ $loop->iteration}}</td>
                                <td> {{  $category->title}}</td>
                                <td> 
                                    <img src="{{ $category->getFirstMediaUrl('article_photo', 'thumb') }}"
                                    alt="" class="img-thumbnail" height="50" width="50"> </td>
                                <td>
                                    <button class="btn btn-default btn-xs m-r-5 editProjectType"
                                    data-toggle="modal" data-target="#editProject"
                                    data-id="{{ $category->id }}"
                                    data-description="{!! $category->description !!}"
                                    data-title="{{ $category->title }}">
                                    <i class="fa fa-pencil font-14"></i>
                                    </button>

                                    <button class="btn btn-default btn-xs deleteProjectType"
                                    data-toggle="modal" data-target="#deleteProject"
                                    data-deld="{{ $category->id }}">
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
                        <div class="ibox-title">Add New Article Category </div>
                        <div class="ibox-tools">
                            <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                        </div>
                    </div>
                    <div class="ibox-body">
                        <form class="form-horizontal" method="post" action="{{ route('admin.report.article.category.save')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"> Title <small class="text-danger"> * </small> </label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" placeholder="Title" name="title" required>
                                    @error('projectType')
                                            <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Image <small class="text-danger"> * </small></label>
                                <div class="col-sm-10">
                                <input id="file-upload" type="file" name="photo"  required/>
                                @error('imageIcon')
                                            <small class="text-danger">{{ $message }}</small>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Description <small class="text-danger"> * </small></label>
                                <div class="col-sm-10">
                                    <textarea class="form-control summernote1" type="text" placeholder="" name="description" ></textarea>
                                    @error('dec')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror

                                </div>
                            </div>
                            

                            <div class="form-group row">
                                <div class="col-sm-10 ml-sm-auto">
                                    <button class="btn btn-info" type="submit">Add Category</button>
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
                <h5 class="modal-title" id="exampleModalLabel">Delete Service</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.report.article.category.delete') }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="delId" name="category_id">

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
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Article Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.report.article.category.update') }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="proid" name="id">
                    <div class="form-group">
                        <label for="">
                            Title
                        </label>
                        <input type="text" id="type" name="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">
                            Description
                        </label>
                        <textarea type="text"  name="description" class="summernote1 description form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">
                            Icon
                        </label>
                        <input type="file" name="photo" class="form-control">
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
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>

    $('.summernote1').summernote({
        placeholder: 'Description',
        tabsize:8,
        height: 200
      });

    $(document).on("click", ".editProjectType", function () {
        var id = $(this).data('id');
        var title = $(this).data('title');
        var description = $(this).data('description');
        $('#proid').val(id);
        $('#type').val(title);
        $('.description').html(description);
        $('.description').summernote('code', description);
      
    });

    $(document).on("click", ".deleteProjectType", function () {
        var delId = $(this).data('deld');
        $('#delId').val(delId);
    });
</script>

@endsection
