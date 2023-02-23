@extends('layout.master')
@section('title', 'All Applied Requirements')
@section('customStyle')

@endsection
@section('content')
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <div class="breadcrumb__links">
                            <a href="{{ route('homePage') }}">Home</a> /
                            <a href="{{ route('customer.orders') }}">Requirements</a> /
                            <span>Applied</span>
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
                            <h6 class="checkout__title">All Applied Requirements</h6>
                            <div class="row">
                                <div class="ibox invoice" style="width:100%;">
                                    <div class="invoice-header">
                                        <div class="row">
                                            <div class="col-12">
                                                <table class="table table-striped ">
                                                    <thead>
                                                        <tr class="tab-content">
                                                            <th>
                                                                S #
                                                            </th>
                                                            <th>
                                                                Project Type
                                                            </th>
                                                            <th>
                                                                Service Type
                                                            </th>
                                                            <th>
                                                                Industry Type
                                                            </th>
                                                            <th>
                                                                Subindustry Type
                                                            </th>
                                                            <th>
                                                                Region
                                                            </th>
                                                            <th>
                                                                Country
                                                            </th>
                                                            <th>
                                                                View Requirements
                                                            </th>
                                                            <th>
                                                                Action
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($requirements as $requirment)
                                                            @if (Auth::user())
                                                                @php
                                                                    $applied = App\Models\ApplyRequirement::where('user_id', Auth::user()->id)
                                                                        ->where('requirement_id', $requirment->id)
                                                                        ->first();
                                                                    
                                                                @endphp
                                                                  @if ($applied)
                                                                <tr>
                                                                    <td>
                                                                        {{ $loop->iteration }}
                                                                    </td>
                                                                    <td> {{ $requirment->project->projectType }}
                                                                        {{ $requirment->id }}</td>
                                                                    <td> {{ $requirment->service->serviceType }} </td>
                                                                    <td> {{ $requirment->industry->industryType }} </td>
                                                                    <td> {{ $requirment->subIndustry->subindustry }} </td>
                                                                    <td> {{ $requirment->region->region }} </td>
                                                                    <td> {{ $requirment->country->country }} </td>
                                                                    <td> {{ $requirment->description }} </td>
                                                                    <td>


                                                                        @if ($applied)
                                                                            <button type="button" disabled
                                                                                class="btn btn-sm btn-info"
                                                                                title="Already Applied"> Applied </button>
                                                                       
                                                                                @endif
                                                                    </td>
                                                                </tr>
                                                                @endif
                                                            @else
                                                                <button type="button" disabled class="btn btn-sm btn-info"
                                                                    title="Login In to Apply"> Login to Apply </button>
                                                            @endif
                                                        @endforeach
                                                    </tbody>
                                                </table>

                                            </div>

                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
