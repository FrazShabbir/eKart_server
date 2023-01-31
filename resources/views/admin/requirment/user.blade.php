@extends('layout.admin_master')
@section('title','Requirments')
@section('content')
<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
      <h1 class="page-title">Applied User </h1>
    </div>
    <div class="page-content fade-in-up">
      <div class="row">
        <div class="col-md-12">
          <div class="ibox">
            <div class="ibox-head">
              <div class="ibox-title"> Requirements</div>
              <div class="ibox-tools">
                <a  class="btn btn-default btn-xs " href="{{ route('admin.requirements.create') }}">
                  Add New
                </a>
              </div>
            </div>
            <div class="ibox-body">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th >S.No</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Project</th>
                      <th>Service</th>
                      <th>Industry</th>
                      <th>Subindustry</th>
                      <th>Region</th>
                      <th>Country</th>
                      <th>Description</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody> 
                    @foreach ($users as $user ) 
                    <tr>
                      <td> {{ $loop->iteration}} </td>
                      <td> {{ $user->user->name}} </td>
                      <td> {{ $user->user->email}} </td> 
                      <td> {{ $user->requirement->project->projectType}} </td> 
                      <td> {{ $user->requirement->service->serviceType}} </td> 
                      <td> {{ $user->requirement->industry->industryType}} </td> 
                      <td> {{ $user->requirement->subIndustry->subindustry}} </td> 
                      <td> {{ $user->requirement->Region->region}} </td> 
                      <td> {{ $user->requirement->country->country}} </td> 
                      <td> {{ $user->requirement->description}} </td> 
                     

                      <td> <button class="btn btn-sm delete"  data-toggle="modal" data-target="#delete_details" data-id="{{  $user->id }}">
                             <i class="fa fa-trash"></i> 
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
         
      </div>
    </div>
    <!-- END PAGE CONTENT-->
  </div>
  
 

  <div class="modal fade" id="delete_details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete User Details
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('admin.requirements.user.delete') }}" enctype="multipart/form-data" method="post">
            @csrf
            <div class="modal-body">
            <input type="hidden" id="requirement_id" name="requirement_id">
            <div class="form-group">
                <p>
                    This Action Can't Undo
                </p>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary"> Delete  </button>
          </div>
        </form>
      </div>
    </div>
  </div>


  

  @endsection
  @section('custom_js')

  <script>
  


    $(document).on("click", ".delete", function() {
      var id = $(this).data('id');
      $('#requirement_id').val(id);
    });

 

  </script>
  @endsection
