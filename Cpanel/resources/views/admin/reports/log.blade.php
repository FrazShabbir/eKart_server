@extends('layout.admin_master')
@section('title', 'Report Tracking')

@section('content')

    <div class="content-wrapper">
        <!-- START PAGE CONTENT-->
        <div class="page-heading">
            <h1 class="page-title">User Wise View Track</h1>
        </div>
        <div class="page-content fade-in-up">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-6 form-group text-center">
                    <label><b>SELECT USER TO VIEW REPORT</b></label>
                    <form action="{{route('admin.fetch.log')}}" method="post">
                        @csrf
                        <select class="form-control userLogs" name="users">
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}"> {{ $user->name }} </option>
                            @endforeach
                        </select>
                        <br/>
                        <button class="btn btn-sm btn-info" type="submit"> Filter </button>
                        <a href="{{ route('admin.report.user.track') }}" class="btn btn-sm btn-warning" > Reset </a>
                    </form>

                </div>
                <div class="col-md-4"></div>
            </div>
            <div class="ibox">
                <div class="ibox-body" style="min-height:600px">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>User Name</th>
                                <th>E-Mail ID</th>
                                <th>Contact No</th>
                                <th>Country/City</th>
                                <th>Report / Project Title</th>
                                <th>Date of View</th>

                            </tr>
                        </thead>
                        <tbody id="logDataTable">
                            @isset($logs)
                                @foreach ($logs as $log)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>  {{ $log->user->name }} </td>
                                        <th> {{ $log->user->email}} </th>
                                        <th> @if($log->user->userDetail) {{ $log->user->userDetail->phone}} @endif</th>
                                        <th> @if($log->user->userDetail){{ $log->user->userDetail->city}} @endif </th>
                                        <td>@if($log->user->userDetail)  {{ $log->report->title }} @endif	</td>
                                        <td> {{ $log->created_at }}</td>

                                    </tr>
                                @endforeach
                            @endisset
                            @isset($reports)
                                @foreach ($reports as $report)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td> {{ $report->user->name }} </td>
                                        <th> {{ $report->user->email}} </th>
                                        <th> {{ $report->user->userDetail->phone}}</th>
                                        <th> {{ $report->user->userDetail->city}} </th>
                                        <td> {{ $report->report->title }}	</td>
                                        <td> {{ $report->created_at }}</td>

                                    </tr>
                                @endforeach
                            @endisset

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

@section('custom_js')
    <script>

    </script>
@endsection
