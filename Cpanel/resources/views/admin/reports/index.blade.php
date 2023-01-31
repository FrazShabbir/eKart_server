@extends('layout.admin_master')
@section('title','Reports')

@section('content')

<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">All Reports</h1>
    </div>
    <div class="page-content fade-in-up" style="min-height:700px;">
        <div class="ibox">
            <div class="ibox-body">
                <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Title</th>
                            <th>Project Type</th>
                            <th>Service Type</th>
                            <th>Industry</th>
                            <th>Region</th>
                            <th>Manager by</th>
                            <th>Submited by</th>
                            <th>Approve Status</th>
                            <th>Publish Status</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>S.No</th>
                            <th>Title</th>
                            <th>Project Type</th>
                            <th>Service Type</th>
                            <th>Industry</th>
                            <th>Region</th>
                            <th>Manager by</th>
                            <th>Submited by</th>
                            <th>Approve Status</th>
                            <th>Publish Status</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($reports as $report)
                            <tr>
                                <td> {{ $loop->iteration }}     </td>
                                <td> {{ $report->title }}       </td>
                                <td>  @if($report->project) {{ $report->project->projectType }} @endif  </td>
                                <td>  @if($report->service) {{ $report->service->serviceType }}  @endif</td>
                                <td>  @if($report->industry) {{ $report->industry->industryType }} @endif</td>
                                <td>  @if($report->region) {{ $report->region->region }} @endif</td>
                                <td>  @if($report->manager_id != '') {{ $report->manager->name }} @endif  </td>
                                <td> @if($report->employee != '') {{ $report->employee->name }} @endif </td>
                                <td style="cursor: pointer">

                                     @if($report->approve == 0)   <span class="badge badge-danger badge-pill m-b-5 changeStatus"  data-id="{{ $report->id }}" data-status="{{ $report->approve }}" title="Click to Change Status" data-toggle="modal" data-target="#updateStatus"> Pending</span>
                                     @elseif($report->approve == 1) <span class="badge badge-primary badge-pill m-r-5 m-b-5"> Manager Verified</span>
                                     @elseif($report->approve == 2) <span class="badge badge-success badge-pill m-r-5 m-b-5">  Approved by Admin </span>
                                     @elseif($report->approve === null or $report->approve === '') <span class="badge badge-warning badge-pill m-b-5"> Unknown Status </span> @endif
                                </td>
                                <td>
                                    @if($report->status == 0)
                                        <span class="badge badge-warning badge-pill m-b-5"> Draft </span>
                                    @elseif($report->status == 1)
                                        <span class="badge badge-success badge-pill m-b-5"> Publish </span>
                                    @endif
                               </td>

                                <td>  {{ $report->created_at }} </td>
                                <td>
                                    <a href="{{ route('admin.report.edit',$report->id) }}" class="btn btn-default btn-xs m-r-5" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil font-14"></i></a>
                                    <button class="btn btn-default btn-xs delete" data-toggle="modal" data-target="#delete"   data-deld="{{ $report->id }}" ><i class="fa fa-trash font-14"></i></button>
                                </td>
                            </tr>

                        @endforeach






                    </tbody>
                </table>


                  <div class="modal fade" id="updateStatus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <form action="{{ route('admin.update.report.status')}}" method="post">
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
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Report </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.report.delete') }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="delId" name="delete_id">

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
</div>

@endsection
@section('custom_js')

    <script>
             $(document).on("click", ".changeStatus", function () {
                var id = $(this).data('id');
                var status = $(this).data('status');
                $('#reportId').val(id);
                $('#reportStatus').val(status);
             });

             $(document).on("click", ".delete", function() {
            var delId = $(this).data('deld');
            $('#delId').val(delId);
        });
    </script>
@endsection
