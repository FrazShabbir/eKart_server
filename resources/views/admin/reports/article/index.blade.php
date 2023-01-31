@extends('layout.admin_master')
@section('title', 'Reports')

@section('content')

    <div class="content-wrapper">
        <!-- START PAGE CONTENT-->
        <div class="page-heading">
            <h1 class="page-title">All Articles</h1>

        </div>


        <div class="page-content fade-in-up" style="min-height:700px; ">
            <div class="s text-right">
                <a href="{{ route('admin.report.article.create')}}" class="btn btn-info btn-sm"> Create New</a> <hr>
            </div>

            <div class="ibox">
                <div class="ibox-body">
                    <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0"
                        width="100%">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Article Type</th>
                                <th>Title</th>
                                <th>Service Type</th>
                                <th>Industry</th>
                                <th>Region</th>
                                <th>Country</th>
                                <th>Photo</th>
                                <th>Details</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($artices as $article)
                                <tr>
                                    <td> {{ $loop->iteration }}</td>
                                    <td> {{  $article->category->title}} </td>
                                    <td> {{  $article->title}} </td>
                                    <td> {{  $article->service->serviceType}} </td>
                                    <td> {{  $article->industry->industryType}} </td>
                                    <td> {{  $article->region->region}} </td>
                                    <td> {{  $article->country->country}} </td>
                                    <td>  <img 
                                        src="{{ $article->getFirstMediaUrl('article_main_photo', 'thumb') }}" 
                                        alt=""
                                        class="img-thumbnail" width="50px"> </td>
                                    <td><i class="fa fa-eye details" data-toggle="modal" data-target="#details"
                                            data-desc="{{  $article->description}} "
                                            data-longDesc="{{  $article->long_description}} "></i></td>
                                    <td>
                                        <a href="" class="btn btn-sm delete" data-toggle="modal" data-target="#delete"
                                            data-deld="{{ $article->id }}">
                                            <i class="fa fa-trash text-danger"> </i>
                                        </a>
                                        <a href="{{ route('admin.report.article.edit',$article->id) }}" class="btn btn-sm">
                                            <i class="fa fa-pencil text-warning"> </i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>



                </div>
            </div>
            <div>

            </div>
        </div>
        <!-- END PAGE CONTENT-->
        <div class="modal fade" id="details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Article Detail </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                    @csrf
                    <div class="modal-body">


                        <div class="form-group">
                            <strong> Description </strong> <hr>
                            <p id="description">

                            </p>

                        </div>
                        <div class="form-group">
                            <strong> Long Description </strong> <hr>
                            <p id="longDesc">

                            </p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    </div>

            </div>
        </div>
    </div>

        <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Article </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('admin.report.article.delete') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" id="delId" name="delete_id">

                            <div class="form-group">
                                <p>
                                    This Action Can't Undo
                                </p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger"> Delete </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('custom_js')

    <script>
        $(document).on("click", ".changeStatus", function() {
            var id = $(this).data('id');
            var status = $(this).data('status');
            $('#reportId').val(id);
            $('#reportStatus').val(status);
        });

        $(document).on("click", ".delete", function() {
            var delId = $(this).data('deld');
            $('#delId').val(delId);
        });

        $(document).on("click", ".details", function() {
            var desc = $(this).data('desc');
            var longdesc = $(this).data('longdesc');
            $('#description').html(desc);
            $('#longDesc').html(longdesc);

        });
    </script>
@endsection
