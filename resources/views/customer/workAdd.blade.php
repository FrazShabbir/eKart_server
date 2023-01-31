@extends('layout.master')
@section('title', 'Home')
@section('customStyle')
<style>
    .report-txt {
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
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <div class="breadcrumb__links">
                        <a href="{{ route('homePage') }}">Home</a> /
                        <span>My Account</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="shop spad">
    <div class="container-fluid">
        <div class="row">
            @include('layout.customerMenu')
            <div class="col-lg-10 content-wrap content-reponsive">
                <div class="content-main pdbtm-none">
                    <div class="col-lg-12 col-md-12 edit-block">
                        <h6 class="checkout__title">Add New Report</h6>
                    </div>

                    <form method="post" action="{{ route('admin.report.save') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row" style="padding: 0 20px">
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
                                    @foreach ($subindustries as $subindustry )
                                        <option value="{{ $subindustry->id }}"> {{ $subindustry->subindustry }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row" style="padding: 0 20px">
                            <input type="hidden" name="action" value="manager"  />
                            @hasrole('Customer')
                                <input type="hidden" name="employee" value="{{Auth::user()->id }}" required />
                                <input type="hidden" name="action" value="customer" required/>
                            @endhasrole
                            <div class="col-sm-3 form-group">
                                <label>Region Type <span class="text-danger"> * </span></label>
                                <select class="form-control" name="region"    id="region">
                                    <option value="" disabled selected> Region  Type</option>
                                    @foreach ($regions as $region )
                                        <option value="{{ $region->id }}"> {{ $region->region }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-3 form-group">
                                <label>Select Country <span class="text-danger"> * </span></label>
                                <select class="form-control" name="country"   id="countries" >
                                    <option value="" disabled selected> Select  Country</option>

                                </select>
                            </div>


                            <div class="col-sm-3 form-group">
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
                        </div>
                        <div class="row" style="padding: 0 20px">
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
                        <div class="row" style="padding: 0 20px">
                            <div class="col-sm-6 form-group">
                                <label>Report Overview</label>
                                <textarea class="form-control report-txt summernote1"  placeholder="" name="overview"   ></textarea>

                            </div>
                            <div class="col-sm-6 form-group">
                                <label>FAQ's</label>

                                <textarea class="form-control report-txt summernote2"  placeholder="" name="faq"   ></textarea>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>
</section>
@endsection
@section('customJs')
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


    </script>

@endsection

