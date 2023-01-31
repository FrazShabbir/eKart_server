@extends('layout.admin_master')
@section('title','Service Template')
@section('customCss')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection
@section('content')
<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Article Template</h1>
    </div>
    <div class="page-content fade-in-up" style="min-height:700px;">
        <div class="ibox">
            <form action="{{ route('admin.report.article.template.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="article_template_id" value="{{ $article_template->id }}">
                <div class="ibox-body">
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>Main Description</label>
                            <textarea class="form-control report-txt summernote1" required name="description">{{ $article_template->description }}</textarea>

                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Expertise Content</label>
                            <textarea class="form-control report-txt summernote2" required name="expertise">{{ $article_template->expertise }}</textarea>
                        </div>
                        <div class="col-sm-12 form-group">
                            <label>Our Solution Content</label>
                            <textarea class="form-control report-txt summernote3" required name="solution">{{ $article_template->solution	 }} </textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 form-group mb-4">
                            <label>Main Banner Image</label>
                            <input id="file-upload" type="file" name="article_template_photo" />
                        </div>

                        <div class="col-lg-6 form-group">
                            <div class="img-thumbnail">
                                <img src="{{  $article_template->getFirstMediaUrl('article_template_photo', 'thumb')  }}" alt=""
                                 class="img-thumbnail" width="100px">
                            </div>
                        </div>
                        <div class="col-lg-6 form-group">
                            <label>Expert Image</label>
                            <input id="file-upload" type="file" name="article_expert_photo" />
                        </div>
                        <div class="col-lg-6 form-group">
                            <div class="img-thumbnail">
                                <img src="{{  $article_template->getFirstMediaUrl('article_expert_photo', 'thumb')  }}" alt=""
                                            class="img-thumbnail" width="100px">
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-info"> Update </button>
                </div>
            </form>
        </div>
        <div>

        </div>
    </div>
    <!-- END PAGE CONTENT-->

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
