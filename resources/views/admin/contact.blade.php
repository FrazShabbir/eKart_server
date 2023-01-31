@extends('layout.admin_master')
@section('title','Contact Us')

@section('content')

<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">All Contact Enquires</h1>
    </div>
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-body" style="min-height:600px">
                <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Company / Institute</th>
                            <th>Job Title</th>
                            <th>Contact No.</th>
                            <th>Industry</th>
                            <th>Comments</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>S.No</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Company / Institute</th>
                            <th>Job Title</th>
                            <th>Contact No.</th>
                            <th>Industry</th>
                            <th>Comments</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        @foreach ($contacts as $contact )

                        <tr>
                            <td> {{ $loop->iteration}} </td>
                            <td> {{ $contact->name }} </td>
                            <td> {{ $contact->last }} </td>
                            <td> {{ $contact->company }}</td>
                            <td> {{ $contact->title }} </td>
                            <td> {{ $contact->number }} </td>
                            <td> {{ $contact->industry }} </td>
                            <td> {{ $contact->desc }} </td>
                            <td> {{ $contact->company_email }} </td>
                            <td>
                                <button class="btn btn-default btn-xs deleteRec"
                                data-toggle="modal" data-target="#delquery"data-id="{{ $contact->id }}"
                                data-original-title="Delete"><i class="fa fa-trash font-14"></i>
                                </button>
                            </td>
                        </tr>


                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
        <div>

        </div>
    </div>
    <!-- END PAGE CONTENT-->


      <!-- Modal -->
      <div class="modal fade" id="delquery" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Delete Record</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <form action="{{route('admin.delete.enquiry')}}" method="post" >
                @csrf
                <input type="hidden" name="quId" id="id">
                <div class="modal-body">

                    <p>
                        Are you sure to delete record ?
                    </p>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Delete</button>
                </div>
            </form>
          </div>
        </div>
      </div>


</div>

@endsection
@section('custom_js')
    <script>
        $(document).ready(function(){

            $(document).on("click", ".deleteRec", function() {

                var id = $(this).data('id');
                $('#id').val(id);

            });

        });
    </script>
@endsection
