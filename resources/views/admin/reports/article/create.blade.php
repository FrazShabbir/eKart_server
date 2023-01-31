@extends('layout.admin_master')
@section('title','Create New Report')
@section('customCss')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

    <style>
        .report-txt
        {
        height: 250px;
        }
        .form-group.table-contents-bg {
        background-color: #e8f4ff;
        padding: 18px;
        font-weight: 600;
        }
        .needToHide{
            display: none;
        }
    </style>
@endsection
@section('content')
<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Add New Article</h1>
    </div>
    <div class="page-content fade-in-up" style="height:850px">
        <div class="row">
            <div class="col-md-12">
                <div class="ibox">
                    <div class="ibox-body">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="text-danger">{{ $error }}</li>
                            @endforeach
                        </ul>
                        <form method="post" action="{{ route('admin.report.article.save') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-3 form-group">
                                    <label>Artice Type <span class="text-danger"> * </span> </label>
                                    <select class="form-control" name="articleType" required >
                                             <option value="" disabled selected> Artice Type</option>
                                             @foreach($categories as $category)
                                                <option value="{{ $category->id }}">   {{ $category->title }}  </option>
                                             @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-3 form-group">
                                    <label>Service Type <span class="text-danger"> * </span></label>
                                    <select class="form-control" name="serviceType" required  >
                                        <option value="" disabled selected> Select Type</option>
                                        @foreach ($services as $service )
                                            <option value="{{ $service->id }}"> {{ $service->serviceType }} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-3 form-group">
                                    <label>Industry Type <span class="text-danger"> * </span></label>
                                    <select class="form-control" name="industryType" required  id="industry" >
                                        <option value="" disabled selected> Industry Type</option>
                                        @foreach ($industries as $industry )
                                            <option value="{{ $industry->id }}"> {{ $industry->industryType }} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-3 form-group">
                                    <label>Select Sub-Industry <span class="text-danger"> * </span></label>
                                    <select class="form-control" name="subindustry" id="subindustry"   >
                                        <option value="" disabled selected> Select Sub-Industry</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <input type="hidden" name="action" value="manager"  />
                                @hasrole('Customer')
                                    <input type="hidden" name="employee" value="{{Auth::user()->id }}" required />
                                    <input type="hidden" name="action" value="customer" required/>
                                @endhasrole
                                <div class=" col-sm-3   form-group">
                                    <label>Region    <span class="text-danger"> * </span>  </label>
                                    <select class="form-control" name="region" id="region" required>
                                        <option value="" disabled selected> Region   </option>
                                        @foreach ($regions as $region )
                                            <option value="{{ $region->id }}"> {{ $region->region }} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class=" col-sm-3  form-group">
                                    <label>Select Country   <span class="text-danger"> * </span></label>
                                    <select class="form-control" name="country"   id="countries"  required>
                                        <option value="" disabled selected> Select  Country</option>
                                    </select>
                                </div>
                                <div class=" col-sm-3  form-group">
                                    <label>Article Title  <span class="text-danger"> * </span></label>
                                    <input class="form-control" type="text" placeholder="" name="title" required   >
                                </div>

                                <div class=" col-sm-5  form-group">
                                    <label>Article Author  <span class="text-danger"> * </span></label>
                                    <input class="form-control" type="text" placeholder="" name="author" required   >
                                </div>



                                <div class=" col-sm-3  form-group">
                                    <label>Article Photo  <span class="text-danger"> * </span></label>
                                    <input class="form-control" type="file" placeholder="" name="photo"  required  >
                                </div>

                                <div class="col-sm-6 form-group">
                                    <label>Small Description  <span class="text-danger"> * </span></label>
                                    <textarea class="form-control report-txt summernote1"  placeholder="" name="description" required  ></textarea>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label>Long Description  <span class="text-danger"> * </span></label>
                                    <textarea class="form-control report-txt summernote2"  placeholder="" name="long_description" required  ></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-info" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div>
        </div>
    </div>
    <!-- END PAGE CONTENT-->
</div>
@endsection
@section('custom_js')
<script>
    $(document).ready(function() {
      $('.summernote1').summernote({
        placeholder: 'Article Small Description',
        tabsize:8,
        height: 200
      });
      $('.summernote2').summernote({
        placeholder: "Article Long Description",
        tabsize:8,
        height: 200
      });
});
</script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script type="text/javascript">
            $("#industry").change(function(event){
                event.preventDefault();
                let industryVal = $("#industry").val();
                let _token   = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    url:'{{ route("admin.report.subIndustry") }}',
                    type:"get",
                    data:{
                    id:industryVal,
                },
                success:function(response){

                    $('#subindustry').empty();
                    $.each(response.subcategories,function(index, subcatObj){
                        $('#subindustry').append('<option value="'+subcatObj.id+'">'+subcatObj.subindustry+'</option>');
                    });
                },

                });
            });
</script>
<script type="text/javascript">
    $("#region").change(function(event){
        event.preventDefault();
        let regionVal = $("#region").val();
        let _token   = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url:'{{ route("admin.report.countries") }}',
            type:"get",
            data:{
            id:regionVal,
        },
        success:function(response){

            $('#countries').empty();
            $.each(response.countries,function(index, subcatObj){
                $('#countries').append('<option value="'+subcatObj.id+'">'+subcatObj.country+'</option>');
            });
        },

        });
    });
</script>

@endsection
