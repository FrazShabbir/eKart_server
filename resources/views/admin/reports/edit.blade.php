@extends('layout.admin_master')
@section('title','Edit Report')
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
    </style>
@endsection
@section('content')
<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Edit Report</h1>
    </div>
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-md-12">
                <div class="ibox">
                    <div class="ibox-body">

                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="text-danger">{{ $error }}</li>
                            @endforeach
                        </ul>

                        <form method="post" action="{{ route('admin.report.update') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $report->id }}" name="report_id">
                            <input type="hidden" value="{{ $report->overview->id }}" name="overview_id">
                            <div class="row">
                                <div class="col-sm-3 form-group">
                                    <label>Project Type <span class="text-danger"> * </span> </label>
                                    <select class="form-control" name="projectType" required >

                                        @foreach ($projects as $project )
                                            <option @if($report->project_id  == $project->id ) selected @endif value="{{ $project->id }}"> {{ $project->projectType }} </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-sm-3 form-group">
                                    <label>Service Type <span class="text-danger"> * </span></label>
                                    <select class="form-control" name="serviceType" required  >

                                        @foreach ($services as $service )
                                            <option @if($report->service_id   == $service->id ) selected @endif value="{{ $service->id }}"> {{ $service->serviceType }} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-3 form-group">
                                    <label>Industry Type <span class="text-danger"> * </span></label>
                                    <select class="form-control" name="industryType" required  id="industry" >

                                        @foreach ($industries as $industry )
                                            <option @if($report->industry_id == $industry->id ) selected @endif value="{{ $industry->id }}"> {{ $industry->industryType }} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-3 form-group">
                                    <label>Select Sub-Industry <span class="text-danger"> * </span></label>
                                    <select class="form-control" name="subindustry" id="subindustry"   >

                                        @foreach ($subindustries as $subindustry )
                                         <option @if($report->subindustry_id == $subindustry->id ) selected @endif value="{{ $subindustry->id }}"> {{ $subindustry->subindustry }} </option>
                                         @endforeach
                                    </select>
                                </div>
                            </div>



                            <div class="row">
                                <input type="hidden" name="action" value="manager"  />
                                @hasrole('Customer')
                                    <input type="hidden" name="employee" value="{{Auth::user()->id }}" required />
                                    <input type="hidden" name="action" value="customer" required/>
                                @endhasrole
                                <div class=" @hasrole('Manager|Employee') col-sm-3  @endhasrole @hasrole('Customer') col-sm-6  @endhasrole  form-group">
                                    <label>Region Type <span class="text-danger"> * </span></label>
                                    <select class="form-control" name="region"   id="region">
                                        @foreach ($regions as $region)
                                            <option @if($report->region_id  == $region->id ) selected @endif value="{{ $region->id }}"> {{ $region->region }} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class=" @hasrole('Manager|Employee') col-sm-3  @endhasrole @hasrole('Customer') col-sm-6  @endhasrole form-group">
                                    <label>Select Country <span class="text-danger"> * </span></label>
                                    <select class="form-control" name="country"  id="countries" >
                                        <option value="" disabled selected> Select Country</option>
                                        @foreach ($countries as $country)
                                            <option @if($report->country_id  == $country->id ) selected @endif  value="{{ $country->id }}">
                                                      {{ $country->country }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                @hasrole('Manager|Employee')
                                <div class="@hasrole('Manager|Employee') col-sm-3  @endhasrole  form-group">
                                    <label>Select Manager</label>
                                    <select class="form-control" name="manager"   >
                                        <option value="" disabled selected> Select  Manager</option>
                                        @foreach ($managers as $manager )
                                            <option @if($report->manager_id  == $manager->id ) selected @endif value="{{ $manager->id }}"> {{ $manager->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-3 form-group">
                                    <label>Select Employee</label>
                                    <select class="form-control" name="employee"   >
                                        <option value="" disabled selected> Select  Employee</option>
                                        @foreach ($employees as $employee )
                                            <option @if($report->employee_id  == $employee->id ) selected @endif value="{{ $employee->id }}"> {{ $employee->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                                @endhasrole
                            </div>
                            <div class="row">
                                <div class="col-sm-3 form-group">
                                    <label>Title of the project</label>
                                    <input class="form-control" type="text" placeholder="" name="projectTitle"  value="{{ $report->title }}" >
                                </div>
                                <div class="col-sm-3 form-group">
                                    <label>Author Name</label>
                                    <input class="form-control" type="text" placeholder="" name="author" value="{{ $report->author }}"  >
                                </div>


                                <div class="col-sm-3 form-group">
                                    <label>Report Code</label>
                                    <input class="form-control" type="text" placeholder="" name="reportCode"  value="{{ $report->reportCode }}"  >
                                </div>
                                <div class="col-sm-3 form-group">
                                    <label>Total Pages</label>
                                    <input class="form-control" type="number" placeholder="" name="totalPages"  value="{{ $report->totalPages }}" >
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label>Report Overview</label>
                                    <textarea class="form-control report-txt summernote1"  placeholder=""
                                     name="overview">{{ $report->overview->overview }}</textarea>

                                </div>
                                <div class="col-sm-6 form-group">
                                    <label>FAQ's</label>

                                    <textarea class="form-control report-txt summernote2"  placeholder="" name="faq"   >{{ $report->overview->faq }}</textarea>
                                </div>
                            </div>
                            <div class="row  ">
                                <div class="col-lg-6 form-group">
                                    <label> <b>Table of contents </b></label><br/>
                                    <input id="file-upload" type="file"  name="contentFile"   />
                                </div>
                               

                                <div class="col-lg-6 form-group pt-3"> 
                                    <a href="{{asset('storage/data/reports/'.$report->overview->fileTableContent) }}" download="download" >
                                         <i class="fa fa-download"></i> &nbsp;Download
                                    </a>
                                </div>
                            </div>
                            <div class="row  ">
                                <div class="col-lg-6 form-group">

                                    <label> <b>Report Overview </b></label><br/>
                                    <input id="file-upload" type="file" name="overviewFile"   />
                                </div>
                                <div class="col-lg-6 form-group pt-3">

                                    <a href="{{asset('storage/data/reports/'.$report->overview->reportOverView) }}" download="download" >
                                        <i class="fa fa-download"></i> &nbsp;Download
                                   </a>

                                </div>
                            </div>

                            <div class="row  ">

                                <div class="col-lg-6 form-group">
                                    <label> <b>Upload Word/PDF File </b></label><br/>
                                    <input id="file-upload" type="file" name="docFile"   />
                                </div>
                                <div class="col-lg-6 form-group pt-3">
                                    <a href="{{asset('storage/data/reports/'.$report->overview->uploadDoc) }}" download="download" >
                                        <i class="fa fa-download"></i> &nbsp;Download
                                   </a>
                                </div>
                            </div>

                            <div class="row  ">
                                <div class="col-lg-6 form-group">
                                    <label> <b>Upload PPT/Excel File </b></label><br/>
                                    <input id="file-upload" type="file" name="pptFile"     />
                                </div>
                                <div class="col-lg-6 form-group pt-3">

                                    <a href="{{asset('storage/data/reports/'.$report->overview->uploadPpt) }}" download="download" >
                                        <i class="fa fa-download"></i> &nbsp;Download
                                   </a>

                                </div>

                            </div>
                            <div class="form-group table-contents-bg">
                                <h3 class="table-heading">Table of Contents Details</h3>
                                <div class="container-fluid">
                                    <table id="myTable" class=" table order-list">
                                        <thead>
                                            <tr>
                                                <td>Title / Chapter Name</td>
                                                <td>Content</td>
                                                <td>Total Pages</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           @foreach ($contents as $content )
                                            <tr>
                                                <input type="hidden" name="content_id[]" class="form-control" value="{{ $content->id }}"  />

                                                <td class="col-sm-2">
                                                    <input type="text" name="contentTitle[]" class="form-control" value="{{ $content->title }}"  />
                                                </td>
                                                <td class="col-sm-7">
                                                    
                                                    <textarea name="contentDetail[]" class="form-control summernote1">{{ $content->content }}</textarea>
                                                </td>
                                                <td class="col-sm-1">
                                                    <input type="number" name="contentPages[]" class="form-control" value="{{ $content->pages }}"  />
                                                </td>
                                                <td class="col-sm-2">
                                                    <input type="button" class="btn btn-md btn-danger deleteRow"
                                                    data-toggle="modal" data-target="#deleteModal" data-id="{{ $content->id }}"
                                                    onclick="deleteRec({{$content->id}})"
                                                    value="Delete">
                                                </td>
                                                </tr>

                                           @endforeach

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="5" style="text-align: left;">
                                                    <input type="button" class="btn btn-info" id="addrow" value="Add Row" />
                                                </td>
                                            </tr>
                                            <tr>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label>Select type</label>
                                    <select class="form-control" name="status">
                                        <option @if($report->status == 1) selected @endif value="1">Publish</option>
                                        <option @if($report->status == 0) selected @endif value="0">Draft</option>
                                    </select>

                                </div>
                                <div class="col-sm-6 form-group">
                                    <label>Project Price</label>
                                    <input class="form-control" type="number" name="price" value="{{ $report->price }}"   >
                                </div>
                            </div>
                            <div class="row mt-4">

                                <div class="col-sm-6 form-group">
                                    <label>Project image</label><br>
                                    <input id="file-upload" type="file" name="projectPhoto"    />
                                </div>

                                <div class="col-sm-6 form-group">
                                        <div class="img-thumbnail">
                                            <img src="{{asset('storage/data/reports/'.$report->photo) }}" alt=""

                                            class="img-thumbnail" width="100px">
                                        </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <button class="btn btn-info" type="submit">Update</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-12">
                        <form action="{{ route('admin.report.progress')}}" method="post" enctype="multipart/form-data">
                            @csrf
                        <table  class=" table order-list">
                            <thead>
                                <tr>
                                        <th colspan="3">  Project Progress </th>
                                </tr>
                                <tr>
                                    <th> Status </th>
                                    <th> Act By </th>
                                    <th> Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($progress as $progressing )
                                    <tr>
                                        <td> {{ $progressing->comment }} </td>
                                        <td> {{ $progressing->user->name }}  </td>
                                        <td> {{ $progressing->created_at->diffForHumans() }}  </td>
                                    </tr>
                                @endforeach


                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5" style="text-align: left;">
                                        <input type="hidden" name="reportId" value="{{ $report->id }}">
                                        <label for="" style="font-weight: bold">Project Status <span class="text-danger">*</span></label>
                                        <textarea  name="comment" class="form-control" placeholder="Please Enter New Project Status" required></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5" style="text-align: right;">
                                        <button class="btn btn-danger btn-sm" type="submit"> Add New Status </button>
                                    </td>
                                </tr>
                                <tr>
                                </tr>
                            </tfoot>
                        </table>
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

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Question</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('admin.question.delete') }}" method="post" >
            @csrf
        <div class="modal-body">
            <p>
                This record can't undo
            </p>
            <input type="hidden" id="delId" name="delete_id">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Delete Record</button>
        </div>
        </form>
      </div>
    </div>
</div>

@endsection
@section('custom_js')

<script type="text/javascript">
    $(function() {
        $('#example-table').DataTable({
            pageLength: 10,
            //"ajax": './assets/demo/data/table_data.json',
            /*"columns": [
                { "data": "name" },
                { "data": "office" },
                { "data": "extn" },
                { "data": "start_date" },
                { "data": "salary" }
            ]*/
        });
    })
</script>
<script>
    $(document).ready(function() {

      $('.summernote1').summernote({
        placeholder: 'Overview',
        tabsize:8,
        height: 200
      });

      $('.summernote2').summernote({
        placeholder: "Faq's",
        tabsize:8,
        height: 200
      });

        var counter = 0;

        $("#addrow").on("click", function() {
            var newRow = $("<tr>");
            var cols = "";

            cols += '<td><input type="text" class="form-control" required placeholder="Title" name="newContentTitle[]' + counter + '"/></td>';
            cols += '<td><input type="text" class="form-control" required placeholder="Content" name="newContentDetail[]' + counter + '"/></td>';
            cols += '<td><input type="number" class="form-control" required placeholder="Pages #" name="newContentPages[]' + counter + '"/></td>';

            cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
            newRow.append(cols);
            $("table.order-list").append(newRow);
            counter++;
        });



        $("table.order-list").on("click", ".ibtnDel", function(event) {
            $(this).closest("tr").remove();
            counter -= 1
        });


    });



    function calculateRow(row) {
        var price = +row.find('input[name^="price"]').val();

    }

    function calculateGrandTotal() {
        var grandTotal = 0;
        $("table.order-list").find('input[name^="price"]').each(function() {
            grandTotal += +$(this).val();
        });
        $("#grandtotal").text(grandTotal.toFixed(2));
    }




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




<script type="text/javascript">
      $(document).on("click", ".deleteRow", function () {
        var id = $(this).data('id');
        $('#delId').val(id);
    });
</script>

@endsection
