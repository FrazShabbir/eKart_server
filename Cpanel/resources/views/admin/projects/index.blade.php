@extends('layout.admin_master')
@section('title','Project Type')

@section('content')

<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Project Type</h1>
    </div>
    <div class="page-content fade-in-up" style="min-height:700px;">
        <div class="row">
            <div class="col-md-6">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">All Project Types</div>
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
                                        <th>Project Title</th>
                                        <th>Desc</th>
                                        <th>Enable Menu</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($projects as $project )
                                        <tr>
                                            <td> {{ $loop->iteration }} </td>
                                            <td> {{ $project->projectType }}</td>
                                            <td> {{ $project->description }}</td>
                                            <td> @if($project->status == 1)  Yes @else No @endif </td>
                                            <td>
                                                <button class="btn btn-default btn-xs m-r-5 editProjectType"
                                                    data-toggle="modal" data-target="#editProject"
                                                    data-id="{{ $project->id }}"
                                                    data-type="{{ $project->projectType }}"
                                                    data-desc="{{ $project->description }}">
                                                    <i class="fa fa-pencil font-14"></i>
                                                </button>
                                                <button class="btn btn-default btn-xs deleteProjectType"
                                                data-toggle="modal" data-target="#deleteProject"
                                                data-deld="{{ $project->id }}">
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
                        <div class="ibox-title">Add New Project Type</div>
                        <div class="ibox-tools">
                            <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                        </div>
                    </div>
                    <div class="ibox-body">
                        <form class="form-horizontal" method="post"
                            action="{{ route('admin.projects.create') }}">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Project Type <small class="text-danger"> *
                                    </small> </label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" placeholder="" name="projectType" required>
                                    @error('projectType')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Image icon <small class="text-danger"> *
                                    </small></label>
                                <div class="col-sm-10">
                                    <input id="file-upload" type="file" name="imageIcon"   />
                                    @error('imageIcon')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Description <small class="text-danger"> *
                                    </small></label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" placeholder="" name="description" >
                                    @error('dec')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Banner Image <small class="text-danger"> *
                                    </small></label>
                                <div class="col-sm-10">
                                    <input id="file-upload" type="file" name="banner"   />
                                    @error('banner')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="ui-checkbox col-md-12 col-form-label">
                                    <input type="checkbox" name="status" value="1">
                                    <span class="input-span"></span>Enable menu on FINANCIAL MARKETS</label>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10 ml-sm-auto">

                                    <button class="btn btn-info" type="submit">ADD PROJECT</button>
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


<div class="modal fade" id="editProject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Project</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.projects.update') }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="proid" name="projectId">
                    <div class="form-group">
                        <label for="">
                            Type
                        </label>
                        <input type="text" id="type" name="type" class="form-control">
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
                        <input type="file" name="icon" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">
                            Banner
                        </label>
                        <input type="file" name="banner" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="ui-checkbox col-md-12 col-form-label">
                            <input type="checkbox" name="status" value="1">
                            <span class="input-span"></span>Enable menu on FINANCIAL MARKETS</label>
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




<div class="modal fade" id="deleteProject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Project</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.projects.delete') }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="delId" name="projectId">

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

@endsection

@section('custom_js')

<script>
    $(document).on("click", ".editProjectType", function () {
        var proid = $(this).data('id');
        var type = $(this).data('type');
        var desc = $(this).data('desc');
        $('#proid').val(proid);
        $('#type').val(type);
        $('#desc').val(desc);
    });

    $(document).on("click", ".deleteProjectType", function () {
        var delId = $(this).data('deld');
        $('#delId').val(delId);
    });
</script>

@endsection
