@extends('layout.admin_master')
@section('title','Requirments')
@section('content')
<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
      <h1 class="page-title">Requirements </h1>
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
                      <th>Project Type</th>
                      <th>Service Type</th>
                      <th>Industry Type</th>
                      <th>Subindustry Type</th>
                      <th>Region</th>
                      <th>Country</th>
                      <th>Description</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody> @foreach ($requirments as $requirment ) <tr>
                      <td> {{ $loop->iteration}} </td>
                      <td> {{ $requirment->project->projectType}} </td>
                      <td> {{ $requirment->service->serviceType}} </td>
                      <td> {{ $requirment->industry->industryType}} </td>
                      <td> {{ $requirment->subIndustry->subindustry}} </td>
                      <td> {{ $requirment->region->region}} </td>
                      <td> {{ $requirment->country->country}} </td>
                      <td> <i class="fa fa-eye"></i></td>

                      <td>
                       <a href="{{ route('admin.requirements.edit',$requirment->id) }}" class="btn btn-default btn-xs deleteRegion">
                            <i class="fa fa-edit"></i>
                       </a>
                        <button class="btn btn-default btn-xs deleteRegion" data-toggle="modal" data-target="#deleteRegion" data-deld="{{ $requirment->id }}">
                          <i class="fa fa-trash font-14"></i>
                        </button>
                      </td>
                    </tr> @endforeach </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
         
      </div>
    </div>
    <!-- END PAGE CONTENT-->
  </div>
  
 

  <div class="modal fade" id="deleteRegion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Requirements
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>


        <form action="{{ route('admin.requirements.delete') }}" enctype="multipart/form-data" method="post">

            @csrf
            <div class="modal-body">
            <input type="hidden" id="region_id" name="region_id">

            <div class="form-group">
                    <p>
                        This Action Can't Undo
                    </p>
            </div>


          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary"> Delete Region </button>
          </div>
        </form>
      </div>
    </div>
  </div>


  <div class="modal fade" id="deleteCountry" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Country </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>


        <form action="{{ route('admin.country.delete') }}" enctype="multipart/form-data" method="post">

            @csrf
            <div class="modal-body">
            <input type="hidden" id="delId" name="countryId">

            <div class="form-group">
                    <p>
                        This Action Can't Undo
                    </p>
            </div>


          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary"> Delete Country </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  @endsection
  @section('custom_js')

  <script>
    $(document).on("click", ".editRegion", function() {
      var regionId = $(this).data('id');
      var region = $(this).data('region');
      var description = $(this).data('desc');
      $('#regionId').val(regionId);
      $('#region').val(region);
      $('#description').val(description);
    });


    $(document).on("click", ".editCountry", function() {
      var id = $(this).data('id');
      var country = $(this).data('country');
      var description = $(this).data('description');
      $('#id').val(id);
      $('#country').val(country);
      $('#description_country').val(description);

    });


    $(document).on("click", ".deleteCountry", function() {
      var delId = $(this).data('deld');
      $('#delId').val(delId);
    });


    $(document).on("click", ".deleteRegion", function() {
      var deld = $(this).data('deld');
      $('#region_id').val(deld);
    });


  </script>
  @endsection
