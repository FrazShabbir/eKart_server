@extends('layout.admin_master')
@section('title', 'Edit Article')
@section('customCss')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

    <style>
        .report-txt {
            height: 250px;
        }

        .form-group.table-contents-bg {
            background-color: #e8f4ff;
            padding: 18px;
            font-weight: 600;
        }

        .needToHide {
            display: none;
        }
    </style>
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- START PAGE CONTENT-->
        <div class="page-heading">
            <h1 class="page-title">Edit Article</h1>
            <a href="{{ route('admin.report.article.index') }}"> All Articles </a>
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
                            <form method="post" action="{{ route('admin.report.article.update') }}"   enctype="multipart/form-data" id="update_form">
                                @csrf
                                <input type="hidden" name="artice" value="{{ $artice->id }}" required />
                                <div class="row">
                                    <div class="col-sm-3 form-group">
                                        <label>Artice Type <span class="text-danger"> * </span> </label>
                                        <select class="form-control" name="articleType" required>
                                            @foreach($articleCategories as $articleCategory)
                                            <option value="{{ $articleCategory->id }}" @if ($articleCategory->id == $artice->category_id) selected @endif>  
                                                {{ $articleCategory->title }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label>Service Type <span class="text-danger"> * </span></label>
                                        <select class="form-control" name="serviceType" required>
                                            <option value="" disabled selected> Select Type</option>
                                            @foreach ($services as $service)
                                                <option value="{{ $service->id }}"
                                                    @if ($artice->service_id == $service->id) selected @endif>
                                                    {{ $service->serviceType }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label>Industry Type <span class="text-danger"> * </span></label>
                                        <select class="form-control" name="industryType" required id="industry">
                                            <option value="" disabled selected> Industry Type</option>
                                            @foreach ($industries as $industry)
                                                <option value="{{ $industry->id }}"
                                                    @if ($artice->industry_id == $industry->id) selected @endif>
                                                    {{ $industry->industryType }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label>Select Sub-Industry <span class="text-danger"> * </span></label>
                                        <select class="form-control" name="subindustry" id="subindustry">
                                            <option value="" disabled selected> Select Sub-Industry</option>
                                            @foreach ($subindustries as $subindustry)
                                                <option value="{{ $subindustry->id }}"
                                                    @if ($artice->subindustry_id == $subindustry->id) selected @endif>
                                                    {{ $subindustry->subindustry }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <input type="hidden" name="action" value="manager" />
                                    @hasrole('Customer')
                                        <input type="hidden" name="employee" value="{{ Auth::user()->id }}" required />
                                        <input type="hidden" name="action" value="customer" required />
                                    @endhasrole
                                    <div class=" col-sm-3   form-group">
                                        <label>Region <span class="text-danger"> * </span> </label>
                                        <select class="form-control" name="region" id="region" required>
                                            <option value="" disabled selected> Region </option>
                                            @foreach ($regions as $region)
                                                <option value="{{ $region->id }}"
                                                    @if ($artice->region_id == $region->id) selected @endif>
                                                    {{ $region->region }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class=" col-sm-3  form-group">
                                        <label>Select Country <span class="text-danger"> * </span></label>
                                        <select class="form-control" name="country" id="countries" required>
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}"
                                                    @if ($artice->country_id == $country->id) selected @endif>
                                                    {{ $country->country }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class=" col-sm-3  form-group">
                                        <label>Article Title <span class="text-danger"> * </span></label>
                                        <input class="form-control" type="text" placeholder="" name="title" required
                                            value="{{ $artice->title }}">
                                    </div>

                                    <div class=" col-sm-5  form-group">
                                        <label>Article Author <span class="text-danger"> * </span></label>
                                        <input class="form-control" type="text" placeholder="" name="author" required
                                            value="{{ $artice->author }}">
                                    </div>

                                    <div class=" col-sm-3  form-group">
                                        <label>Article Photo <span class="text-danger"> * </span></label>
                                        <input class="form-control" type="file" name="photo">
                                    </div>

                                    <div class="col-sm-6 form-group">
                                        <label>Small Description <span class="text-danger"> * </span></label>
                                        <textarea class="form-control report-txt  " placeholder="" name="description" required>{{ $artice->description }}</textarea>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Long Description <span class="text-danger"> * </span></label>
                                        <textarea class="form-control report-txt  " placeholder="" name="long_description" required>{{ $artice->long_description }}</textarea>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Photo <span class="text-danger"> </span></label> <br>
                                        <img src="{{ $artice->getFirstMediaUrl('article_main_photo', 'thumb')  }}"
                                            alt="" class="img-thumbnail" width="100px">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-info" id="updateData">   Submit  </button>
                                    {{-- <input type="submit" class="btn btn-info" value="submit" /> --}}
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
                tabsize: 8,
                height: 200
            });
            $('.summernote2').summernote({
                placeholder: "Article Long Description",
                tabsize: 8,
                height: 200
            });
        });


    </script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <script type="text/javascript">
        $("#industry").change(function(event) {
            event.preventDefault();
            let industryVal = $("#industry").val();
            let _token = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: '{{ route('admin.report.subIndustry') }}',
                type: "get",
                data: {
                    id: industryVal,
                },
                success: function(response) {

                    $('#subindustry').empty();
                    $.each(response.subcategories, function(index, subcatObj) {
                        $('#subindustry').append('<option value="' + subcatObj.id + '">' +
                            subcatObj.subindustry + '</option>');
                    });
                },

            });
        });
    </script>
    <script type="text/javascript">
        $("#region").change(function(event) {
            event.preventDefault();
            let regionVal = $("#region").val();
            let _token = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: '{{ route('admin.report.countries') }}',
                type: "get",
                data: {
                    id: regionVal,
                },
                success: function(response) {

                    $('#countries').empty();
                    $.each(response.countries, function(index, subcatObj) {
                        $('#countries').append('<option value="' + subcatObj.id + '">' +
                            subcatObj.country + '</option>');
                    });
                },

            });
        });
    </script>

@endsection
