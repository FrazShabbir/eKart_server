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
    </style>
@endsection
@section('content')
<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Add New Report</h1>
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

                        <form method="post" action="{{ route('admin.report.save') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-3 form-group">
                                    <label>Project Type <span class="text-danger"> * </span> </label>
                                    <select class="form-control" name="projectType" required >
                                        <option value="" disabled selected> Select Type</option>
                                        @foreach ($projects as $project )
                                            <option value="{{ $project->id }}"> {{ $project->projectType }} </option>
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
                                <div class=" @hasrole('Manager|Employee') col-sm-3  @endhasrole @hasrole('Customer') col-sm-6  @endhasrole  form-group">
                                    <label>Region Type <span class="text-danger"> * </span></label>
                                    <select class="form-control" name="region"    id="region">
                                        <option value="" disabled selected> Region  Type</option>
                                        @foreach ($regions as $region )
                                            <option value="{{ $region->id }}"> {{ $region->region }} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class=" @hasrole('Manager|Employee') col-sm-3  @endhasrole @hasrole('Customer') col-sm-6  @endhasrole form-group">
                                    <label>Select Country <span class="text-danger"> * </span></label>
                                    <select class="form-control" name="country"   id="countries" >
                                        <option value="" disabled selected> Select  Country</option>

                                    </select>
                                </div>

                                @hasrole('Manager|Employee')
                                <div class="@hasrole('Manager|Employee') col-sm-3  @endhasrole  form-group">
                                    <label>Select Manager</label>
                                    <select class="form-control" name="manager"   >
                                        <option value="" disabled selected> Select  Manager</option>
                                        @foreach ($managers as $manager )
                                            <option value="{{ $manager->id }}"> {{ $manager->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-3 form-group">
                                    <label>Select Employee</label>
                                    <select class="form-control" name="employee"   >
                                        <option value="" disabled selected> Select  Employee</option>
                                        @foreach ($employees as $employee )
                                            <option value="{{ $employee->id }}"> {{ $employee->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                                @endhasrole
                            </div>
                            <div class="row">
                                <div class="col-sm-3 form-group">
                                    <label>Title of the project</label>
                                    <input class="form-control" type="text" placeholder="" name="projectTitle"   >
                                </div>
                                <div class="col-sm-3 form-group">
                                    <label>Author Name</label>
                                    <input class="form-control" type="text" placeholder="" name="author"   >
                                </div>


                                <div class="col-sm-3 form-group">
                                    <label>Report Code</label>
                                    <input class="form-control" type="text" placeholder="" name="reportCode"   >
                                </div>
                                <div class="col-sm-3 form-group">
                                    <label>Total Pages</label>
                                    <input class="form-control" type="number" placeholder="" name="totalPages"   >
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label>Report Overview</label>
                                    <textarea class="form-control report-txt summernote1"  placeholder="" name="overview"   ></textarea>

                                </div>
                                <div class="col-sm-6 form-group">
                                    <label>FAQ's</label>

                                    <textarea class="form-control report-txt summernote2"  placeholder="" name="faq"   ></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3 form-group">
                                    <label>Table of contents</label>
                                    <input id="file-upload" type="file"  name="contentFile"   />
                                </div>
                                <div class="col-sm-3 form-group">
                                    <label>Report Overview</label>
                                    <input id="file-upload" type="file" name="overviewFile"   />
                                </div>
                                <div class="col-sm-3 form-group">
                                    <label>Upload Word/PDF File</label>
                                    <input id="file-upload" type="file" name="docFile"   />
                                </div>
                                <div class="col-sm-3 form-group">
                                    <label>Upload PPT/Excel File</label>
                                    <input id="file-upload" type="file" name="pptFile"     />
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
                                            <tr>
                                                <td class="col-sm-4">
                                                    <input type="text" name="contentTitle[]" class="form-control"  placeholder="Title"  />
                                                </td>
                                                <td class="col-sm-7">
                                                    <input type="text" name="contentDetail[]" class="form-control" placeholder="Content"   />
                                                </td>
                                                <td class="col-sm-1">
                                                    <input type="number" name="contentPages[]" class="form-control" placeholder="Pages #"   />
                                                </td>
                                                <td class="col-sm-2"><a class="deleteRow"></a>

                                                </td>
                                            </tr>
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
                                <div class="col-sm-4 form-group">
                                    <label>Select type</label>
                                    <select class="form-control" name="status">
                                        <option value="1">Publish</option>
                                        <option value="0">Draft</option>
                                    </select>

                                </div>
                                <div class="col-sm-4 form-group">
                                    <label>Project Price</label>
                                    <input class="form-control" type="number" placeholder="" name="price"    >
                                </div>

                                <div class="col-sm-4 form-group">
                                    <label>Project image</label>
                                    <input id="file-upload" type="file" name="projectPhoto"    />
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

            cols += '<td><input type="text" class="form-control" required placeholder="Title" name="contentTitle[]' + counter + '"/></td>';
            cols += '<td><input type="text" class="form-control" required placeholder="Content" name="contentDetail[]' + counter + '"/></td>';
            cols += '<td><input type="number" class="form-control" required placeholder="Pages #" name="contentPages[]' + counter + '"/></td>';

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

@endsection
