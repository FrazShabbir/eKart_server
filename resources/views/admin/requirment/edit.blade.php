@extends('layout.admin_master')
@section('title','Requirments Edit')
@section('customCss')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection
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
              <div class="ibox-title"> Requirements Edit </div>
              <div class="ibox-tools">
                
              </div>
            </div>
            <div class="ibox-body">
              <div class="table-responsive">
                <form action="{{ route('admin.requirements.save')  }}"  method="post">
                    @csrf
                    <div class="row">
                        <input type="hidden" name="id" value="{{ $requirment->id }}"/>
                    <div class="col-sm-3 form-group">
                        <label>Project Type <span class="text-danger"> * </span> </label>
                        <select class="form-control project_id" name="project_id" required >
                            
                            @foreach ($projects as $project )
                                <option value="{{ $project->id }}"> {{ $project->projectType }} </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-sm-3 form-group">
                        <label>Service Type <span class="text-danger"> * </span></label>
                        <select class="form-control service_id" name="service_id" required  >
                            <option value="" disabled selected> Select Type</option>
                            @foreach ($services as $service )
                                <option value="{{ $service->id }}"> {{ $service->serviceType }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-3 form-group">
                        <label>Industry Type <span class="text-danger"> * </span></label>
                        <select class="form-control industry_id" name="industry_id" required  id="industry" >
                            <option value="" disabled selected> Industry Type</option>
                            @foreach ($industries as $industry )
                                <option value="{{ $industry->id }}"> {{ $industry->industryType }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-3 form-group">
                        <label>Select Sub-Industry <span class="text-danger"> * </span></label>
                        <select class="form-control subindustry_id" name="subindustry_id" required  >
                            <option value="" disabled selected> Select Sub-Industry</option>
                            @foreach ($subindustries as $subindustry )
                                <option value="{{ $subindustry->id }}"> {{ $subindustry->subindustry }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-3 form-group">
                        <label>Region Type <span class="text-danger"> * </span></label>
                        <select class="form-control region_id" name="region_id"     required>
                            <option value="" disabled selected> Region  Type</option>
                            @foreach ($regions as $region )
                                <option value="{{ $region->id }}"> {{ $region->region }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-3 form-group">
                        <label>Region Type <span class="text-danger"> * </span></label>
                        <select class="form-control country_id" name="country_id"  required>
                            <option value="" disabled selected> Country   </option>
                            @foreach ($countries as $country )
                                <option value="{{ $country->id }}"> {{ $country->country }} </option>
                            @endforeach
    
                        </select>
                    </div>
                    <div class="col-sm-12 form-group">
                        <label>Description <span class="text-danger"> * </span></label>
                        <textarea name="description"  class="form-control summernote1" cols="30" rows="10" required>{{ $requirment->description }}</textarea>
                    </div>

                </div>
                <button  type="submit" vclass="btn btn-sm btn-primary ">
                    Save Detail
                </button>
                </form>
                
              </div>
            </div>
          </div>
        </div>
         
      </div>
    </div>
    <!-- END PAGE CONTENT-->
  </div>
  
 
 

 

  @endsection
  @section('custom_js')
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
  <script>
     $('.summernote1').summernote({
        placeholder: 'Overview',
        tabsize:8,
        height: 100
      });
      
      $( document ).ready(function() {
    console.log( "ready!" );
});


     
      $('.project_id').val('{{ $requirment->project_id }}');
      $('.service_id').val('{{ $requirment->service_id }}');
      $('.industry_id').val('{{ $requirment->industry_id }}');
      $('.subindustry_id').val('{{ $requirment->subindustry_id }}');
      $('.region_id').val('{{ $requirment->region_id }}');
      $('.country_id').val('{{ $requirment->country_id }}');

  </script>
  @endsection
