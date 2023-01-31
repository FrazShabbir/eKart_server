@extends('layout.master')
@section('title', 'Home')
@section('customStyle')
<style>
    .work-progress {
        background-color: lightcyan;
        color: #000;
        font-size: 14px;
        margin-bottom: 5px;
    }

    .toast-body {
        padding: 4px;
        color: #000;
    }

    .toast-header {
        padding: 5px;
        color: #000;
    }

    .alert.alert-warning.proje-pro-bg {
        height: 430px;
    }

    .project-heading {
        text-align: center !important;
        font-weight: 800;
        color: #fff;
        margin-bottom: 7px;
        font-size: 20px;
        background-color: black;
        padding: 7px;
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
                        <h6 class="checkout__title">All My Works</h6>

                            <div class="page-content fade-in-up">
                                <div class="ibox">
                                    <div class="ibox-body">
                                        <table class="table table-striped table-bordered table-hover" id="example-table"
                                            cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>Title</th>
                                                    <th>Project Type</th>
                                                    <th>Service Type</th>
                                                    <th>Industry</th>
                                                    <th>Region</th>
                                                    <th>Aprovel</th>
                                                    <th>Draft / Publish</th>
                                                    <th>Action</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>Title</th>
                                                    <th>Project Type</th>
                                                    <th>Service Type</th>
                                                    <th>Industry</th>
                                                    <th>Region</th>
                                                    <th>Aprovel</th>
                                                    <th>Draft / Publish</th>
                                                    <th>Action</th>
                                                    <th>Date</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>

                                                @foreach($reports as $report)
                                                <tr>
                                                    <td> {{ $loop->iteration }}     </td>
                                                    <td> {{ $report->title }}       </td>
                                                    <td> {{ $report->project->projectType }}  </td>
                                                    <td> {{ $report->service->serviceType }}  </td>
                                                    <td> {{ $report->industry->industryType }} </td>
                                                    <td> {{ $report->region->region }} </td>
                                                    <td>
                                                         @if($report->approve == 0)   <span class="badge badge-danger badge-pill m-b-5"> Pending</span>
                                                         @elseif($report->approve == 1) <span class="badge badge-primary badge-pill m-r-5 m-b-5"> Manager Verified</span>
                                                         @elseif($report->approve == 2) <span class="badge badge-success badge-pill m-r-5 m-b-5">  Approved by Admin </span>
                                                         @elseif($report->approve === null or $report->approve === '') <span class="badge badge-warning badge-pill m-b-5"> Unknown Status </span> @endif
                                                    </td>
                                                    <td>
                                                        @if($report->status == 0)
                                                            <span class="badge badge-warning badge-pill m-b-5"> Draft </span>
                                                        @elseif($report->status == 1)
                                                            <span class="badge badge-success badge-pill m-b-5"> Publish </span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('report.edit',$report->id) }}" class="btn btn-default btn-xs m-r-5" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil font-14"></i></a>
                                                        <button class="btn btn-default btn-xs" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash font-14"></i></button>
                                                    </td>
                                                    <td> {{ $report->created_at }} </td>

                                                </tr>

                                            @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div>

                                </div>
                            </div>


                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
