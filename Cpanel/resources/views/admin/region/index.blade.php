@extends('layout.admin_master')
@section('title','Project Type')
@section('content')
<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
      <h1 class="page-title">Region & Countries </h1>
    </div>
    <div class="page-content fade-in-up">
      <div class="row">
        <div class="col-md-4">
          <div class="ibox">
            <div class="ibox-head">
              <div class="ibox-title">All Region</div>
              <div class="ibox-tools">
                <a class="ibox-collapse">
                  <i class="fa fa-minus"></i>
                </a>
              </div>
            </div>
            <div class="ibox-body">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th >S.No</th>
                      <th>Region</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody> @foreach ($regions as $region ) <tr>
                      <td> {{ $loop->iteration}} </td>
                      <td> {{ $region->region}} </td>

                      <td>
                        <button class="btn btn-default btn-xs m-r-5 editRegion" data-toggle="modal" data-target="#editRegion" data-id="{{ $region->id }}" data-region="{{ $region->region }}" data-desc="{{ $region->description }}">
                          <i class="fa fa-pencil font-14"></i>
                        </button>
                        <button class="btn btn-default btn-xs deleteRegion" data-toggle="modal" data-target="#deleteRegion" data-deld="{{ $region->id }}">
                          <i class="fa fa-trash font-14"></i>
                        </button>
                      </td>
                    </tr> @endforeach </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
            <div class="ibox">
              <div class="ibox-head">
                <div class="ibox-title">All Countries</div>
                <div class="ibox-tools">
                  <a class="ibox-collapse">
                    <i class="fa fa-minus"></i>
                  </a>
                </div>
              </div>
              <div class="ibox-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>S.No</th>
                        <th>Country</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($countries as $country )
                        <tr>
                            <td> {{ $loop->iteration}} </td>
                            <td> {{ $country->country}} </td>
                            <td> <button class="btn btn-default btn-xs m-r-5 editCountry"
                                 data-toggle="modal"  data-target="#editCountry"
                                 data-id="{{ $country->id }}"
                                 data-description="{{ $country->description }}"
                                 data-country="{{ $country->country }}">
                                    <i class="fa fa-pencil font-14"></i>
                                 </button>
                                 <button class="btn btn-default btn-xs deleteCountry" data-toggle="modal" data-target="#deleteCountry"
                                  data-deld="{{ $country->id }}">
                                     <i class="fa fa-trash font-14"></i>
                             </button>
                        </td>
                      </tr> @endforeach </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        <div class="col-md-4">
          <div class="ibox">

            <div class="ibox-body">
                <div class="ibox-head" style="padding-left:0;">
                    <div class="ibox-title">Add New Region </div>
                </div>
              <form class="form-horizontal" method="post" action="{{ route('admin.region.create')}}"> @csrf
                <div class="form-group">
                  <label>Region Name <span class="text-danger">*</span></label> <br>
                  <input class="form-control" type="text" placeholder="Region Name" name="region" required>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" type="text" name="description" placeholder="Region Description"  ></textarea>
                </div>
                <div class="form-group">
                  <label>Image icon <span class="text-danger">*</span> </label> <br>
                  <input id="file-upload" type="file" name="imageIcon"  required  />
                </div>
                <hr>
                <div class="form-group ">
                  <label>Banner Image</label> <br>
                  <input id="file-upload" type="file" name="banner"   />
                </div>
                <div class="form-group text-right">
                  <button class="btn btn-info" type="submit">ADD REGION</button>
                </div>
              </form>
              <div class="ibox-head" style="padding-left:0;">
                <div class="ibox-title">Add New Country </div>
            </div>
              <form class="form-horizontal" method="post" action="{{ route('admin.country.create')}}"> @csrf <div class="form-group">
                <label>Select Region <span class="text-danger">*</span> </label>
                <select class="form-control" name="region" required>
                  <option value="" disabled selected> Select Region </option> @foreach ($regions as $region ) <option value="{{  $region->id }}"> {{ $region->region }} </option> @endforeach
                </select>
              </div>
              <div class="form-group">
                <label>Country Name <span class="text-danger">*</span> </label>
                <input class="form-control" type="text" placeholder="Country Name" name="country" required>
              </div>
              <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" type="text" name="description" placeholder="Country Description"  ></textarea>
            </div>
              <div class="form-group">
                <label>Image icon</label>
                <br>
                <input id="file-upload" type="file" name="imageIcon"   />
              </div>
              <div class="form-group text-right">
                <button class="btn btn-info" type="submit">ADD COUNTRY</button>
              </div>
            </form>
            </div>
          </div>

        </div>
      </div>
    </div>
    <!-- END PAGE CONTENT-->
  </div>
  <div class="modal fade" id="editRegion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Region </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('admin.region.update') }}" enctype="multipart/form-data" method="post"> @csrf <div class="modal-body">
            <input type="hidden" id="regionId" name="regionId">
            <div class="form-group">
              <label for=""> Region </label>
              <input type="text" id="region" name="region" class="form-control">
            </div>
            <div class="form-group row">
              <div class="col-sm-10">
                <label class="col-form-label">Image icon</label>
                <br>
                <input id="file-upload" type="file" name="imageIcon" />
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Description</label>
              <div class="col-sm-10">
                <input class="form-control" type="text" name="description" id="description">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-10">
                <label class="  col-form-label">Banner Image</label>
                <br>
                <input id="file-upload" type="file" name="banner" />
              </div>
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


  <div class="modal fade" id="editCountry" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Country </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>


        <form action="{{ route('admin.country.update') }}" enctype="multipart/form-data" method="post"> @csrf <div class="modal-body">
            <input type="hidden" id="id" name="countryId">
            <div class="form-group">
              <label for=""> Country </label>
              <input type="text" id="country" name="country" class="form-control">
            </div>

            <div class="form-group">
                <label for=""> Description </label>
                <input type="text" id="description_country" name="description" class="form-control">
              </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Image icon</label>
                <div class="col-sm-10">
                  <input id="file-upload" type="file" name="imageIcon"   />
                </div>
              </div>


          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary"> Update Country </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="deleteRegion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Region </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>


        <form action="{{ route('admin.region.delete') }}" enctype="multipart/form-data" method="post">

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
