@extends('layout.admin_master')
@section('title', 'Reports')

@section('content')

    <div class="content-wrapper">
        <!-- START PAGE CONTENT-->
        <div class="page-heading">
            <div class="row">
                <div class="col-6">
                    <h1 class="page-title">Why Us Section</h1>
                </div>
                <div class="col-6">
                    <div class="float-right page-title">
                        <button id="createModal" class="btn btn-primary">Add New</button>
                    </div>
                </div>


            </div>
            <div class="page-content fade-in-up" style="min-height:700px;">
                <div class="ibox">
                    <div class="ibox-body">
                        <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0"
                            width="100%">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Title</th>
                                    <th>Tag Line</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>S.No</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($whys as $why)
                                    <tr>
                                        <td> {{ $loop->iteration }} </td>

                                        <td> {{ $why->title }} </td>
                                        <td> {{ $why->description }} </td>
                                        <td><img src="https://ekart22.com/byreddy/{{ $why->icon }}" alt="" style="max-width: 50px" alt="{{ $why->title }}"></td>
                                        <td>
                                           <form action="{{route('admin.cms.why.delete',$why->id)}}" method="POST">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <button class="btn btn-default btn-xs delete" 
                                            type="submit"><i class="fa fa-trash font-14"></i></button>
                                           </form>
                                         
                                        </td>
                                    </tr>
                                @endforeach






                            </tbody>
                        </table>


                        <div class="modal fade" id="updateStatus" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form action="{{ route('admin.update.report.status') }}" method="post">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Update Status</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="reportId" id="reportId">
                                            <label>
                                                Are you sure to change status ?
                                            </label>

                                            <select name="status" id="reportStatus" class="form-control">
                                                <option value="2"> Approve </option>
                                                <option value="0"> Pending </option>
                                            </select>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>

                </div>
            </div>
            <!-- END PAGE CONTENT-->
            <div class="modal fade" id="createMODAL" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Section</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('admin.cms.why.store') }}" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="title">Title:</label>
                                    <input type="text" class="form-control" name="title" placeholder="Enter title"
                                        id="title">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description:</label>
                                    <textarea  class="form-control" name="description" placeholder="Enter description"
                                        id="description"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="icon">Icon:</label>
                                    <input type="file" class="form-control" name="icon" 
                                        id="icon">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary"> Add New </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    @endsection
    @section('custom_js')

        <script>
            $(document).on("click", "#createModal", function() {
                $('#createMODAL').modal('show');
            });
        </script>
    @endsection
