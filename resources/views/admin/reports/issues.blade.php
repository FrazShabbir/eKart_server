@extends('layout.admin_master')
@section('title','Report Issues')

@section('content')

<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Report Issues</h1>
    </div>
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-body" style="min-height:600px">
                <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Post By</th>
                            <th>Submit By</th>
                            <th>Time Ago</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($issues as $issue )

                        <tr>
                            <td> {{ $loop->iteration}} </td>
                            <td> {{ $issue->question_user->name }} </td>
                            <td> @if($issue->resolve_by != '') <button class="btn   btn-outline-success btn-sm"> Submit By {{ $issue->answer_user->name }} </button>  @else <button class="btn   btn-outline-danger btn-sm"> Pending </button>  @endif</td>
                            <td> {{ $issue->created_at->diffForhumans() }}</td>
                            <td>

                                <button class="btn btn-default btn-xs details"
                                data-toggle="modal" data-target="#details"data-id="{{$issue->id}}" data-question="{{$issue->question}}"
                                data-answer="{{$issue->answer}}"
                                data-original-title="Delete"><i class="fa fa-eye font-14"></i>
                                </button>


                                <button class="btn btn-default btn-xs deleteRec"
                                data-toggle="modal" data-target="#delquery"data-id="{{ $issue->id }}"
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

            <form action="{{route('admin.report.issues.delete')}}" method="post" >
                @csrf
                <input type="hidden" name="delete_id" id="deL_id">
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

      <div class="modal fade" id="details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Issue Details</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <form action="{{route('admin.report.issues.submit')}}" method="post" >
                @csrf
                <input type="hidden" name="question_id" id="question_id">
                <div class="modal-body">
                    <p style="" id="question"> </p>
                    <div class="form-group">
                        <label for="" style="font-weight: bold"> Submit Solution</label>
                        <textarea name="answer" id="answer" class="form-control" placeholder="Type Solution Here ... " required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary"> Update</button>
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

            $(document).on("click", ".details", function() {
                var id = $(this).data('id');
                var question = $(this).data('question');
                var answer =  $(this).data('answer');
                $('#question_id').val(id);
                $('#question').html(question);


                $('#answer').val(answer);

            });


            $(document).on("click", ".deleteRec", function() {
                var id = $(this).data('id');
                $('#deL_id').val(id);

            });

        });
    </script>
@endsection
