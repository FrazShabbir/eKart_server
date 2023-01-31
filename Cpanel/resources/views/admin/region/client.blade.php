@extends('layout.admin_master')
@section('title','Region Client')

@section('content')

<div class="content-wrapper" >
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Clients</h1>
    </div>
    <div class="page-content fade-in-up" style="min-height:700px;">
        <div class="row">
            <div class="col-md-6">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">All Clients</div>
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
                                <th>Title</th>
                                <th>Logo</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clients as $client )


                            <tr>
                                <td> {{ $loop->iteration}}</td>
                                <td> {{  $client->title}}</td>
                                <td> <img src="{{asset('storage/app/public/data/clients/'.$client->logo) }}" alt="" class="img-thumbnail" height="50" width="50"> </td>
                                <td>


                                    <button class="btn btn-default btn-xs m-r-5 editProjectType"
                                    data-toggle="modal" data-target="#editProject"
                                    data-id="{{ $client->id }}"
                                    data-title="{{ $client->title }}">
                                    <i class="fa fa-pencil font-14"></i>
                                    </button>

                                    <button class="btn btn-default btn-xs deleteProjectType"
                                    data-toggle="modal" data-target="#deleteProject"
                                    data-deld="{{ $client->id }}">
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
                        <div class="ibox-title">Add New Client</div>
                        <div class="ibox-tools">
                            <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                        </div>
                    </div>
                    <div class="ibox-body">
                        <form class="form-horizontal" method="post" action="{{ route('admin.regions.create')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Title <small class="text-danger"> * </small> </label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" placeholder="" name="title" required>
                                    @error('title')
                                            <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Image icon <small class="text-danger"> * </small></label>
                                <div class="col-sm-10">
                                <input id="file-upload" type="file" name="logo" required />
                                @error('logo')
                                            <small class="text-danger">{{ $message }}</small>
                                @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <div class="col-sm-10 ml-sm-auto">
                                    <button class="btn btn-info" type="submit">Add Client</button>
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
                <h5 class="modal-title" id="exampleModalLabel">Delete Client</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.regions.delete') }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="id" name="client_id">

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
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Client</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.regions.update') }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="edit_id" name="client_id">
                    <div class="form-group">
                        <label for="">
                            Titel
                        </label>
                        <input type="text" id="title" name="title" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">
                            Logo
                        </label>
                        <input type="file" name="logo" class="form-control">
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
    $(document).on("click", ".editProjectType", function () {
        var id = $(this).data('id');
        var title = $(this).data('title');
        $('#edit_id').val(id);
        $('#title').val(title);
    });

    $(document).on("click", ".deleteProjectType", function () {
        var id = $(this).data('deld');
        $('#id').val(id);
    });
</script>

@endsection
