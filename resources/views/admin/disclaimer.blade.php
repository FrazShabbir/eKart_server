@extends('layout.admin_master')
@section('title','disclaimer')
@section('customCss')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection
@section('content')
<div class="content-wrapper">
    <!-- START PAGE CONTENT-->

    <div class="page-heading">
        <h1 class="page-title">Disclaimer </h1>
    </div>
    <div class="page-content fade-in-up" style="min-height:700px;">
        <div class="ibox">
            <div class="ibox-body">
                <form action="{{ route('admin.disclaimer.update')}}" method="post" enctype="multipart/form-data">
                    <div class="row">
                        @csrf
                            <input type="hidden" name="disclaimer_id"  value="{{$disclaimer->id }}">
                            <div class="col-sm-6 form-group">
                                <label >Heading</label>
                                <input class="form-control @error('heading') is-invalid @enderror" type="text" name="heading"
                                value="{{$disclaimer->heading}}" >
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Content Heading</label>
                                <input class="form-control @error('subhead1') is-invalid @enderror" type="text"
                                 value="{{$disclaimer->content_heading}}"  placeholder="" name="content_heading">
                            </div>


                            <div class="col-sm-6 form-group">
                                <label style="display: block">Upload Banner</label>
                                <input id="file-upload" type="file"    name="banner"/>
                            </div>
                            <div class="col-sm-6 form-group">
                                     @if($disclaimer->banner == '')
                                            @php $banner = 'no_img.png';  @endphp
                                     @else
                                            @php $banner =$disclaimer->banner;  @endphp
                                     @endif

                                    <img src="{{asset('storage/data/'.$banner)}}" alt="" class="img-thumbnail" width="100">
                            </div>

                            <div class="col-sm-12 form-group">
                                <label> Content</label>
                                <textarea class="form-control report-txt summernote3" name="content">{{$disclaimer->content }} </textarea>
                            </div>
                    </div>
                    <button class="btn btn-info" type="submit"> Update  </button>
                </form>
            </div>
        </div>
        <div>

        </div>
    </div>
</div>
@endsection

@section('custom_js')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
    $('.summernote1').summernote({
        placeholder: 'Main Description',
        tabsize: 8,
        height: 200
    });

    $('.summernote2').summernote({
        placeholder: 'Expertise Content',
        tabsize: 8,
        height: 200
    });

    $('.summernote3').summernote({
        placeholder: 'Our Solution Content',
        tabsize: 8,
        height: 200
    });
</script>

@endsection
