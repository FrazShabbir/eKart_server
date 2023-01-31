@extends('layout.admin_master')
@section('title','Order Details')

@section('content')

<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Order Details</h1>
    </div>
    <div class="page-content fade-in-up" style="min-height:700px;">
        <div class="ibox">
            <div class="ibox-body">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr class="tab-content">
                                    <th scope="col">Title / Chapter Name</th>
                                    <th scope="col">Pages</th>

                                  </tr>
                              </thead>
                            <tbody>
                                @foreach ($orderdetails as $orderdetail )
                                <tr>
                                    <td>
                                         {{ $orderdetail->report->title }}
                                    </td>
                                    <td>
                                        {{ $orderdetail->report->totalPages }}
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

</div>


@endsection
