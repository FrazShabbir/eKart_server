@extends('layout.master')
@section('title', 'Requirements')
@section('content')
    <section class="hero">
        <div class="banner-overlay">
            <div class="container">
                <div class="row">
                    <div class="banner-text" style="padding-bottom:120px;">
                        <h2 class="pb-10"> Requirements</h2>

                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Banner Section Begin -->
    <section class="banner spad">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Requirements Details</h2>

                    </div>
                    <table class="table">
                        <thead>
                            <tr>
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
                        @foreach ($requiremnts as $requirment)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td> {{ $requirment->project->projectType }} </td>
                                <td> {{ $requirment->service->serviceType }} </td>
                                <td> {{ $requirment->industry->industryType }} </td>
                                <td> {{ $requirment->subIndustry->subindustry }} </td>
                                <td> {{ $requirment->region->region }} </td>
                                <td> {{ $requirment->country->country }} </td>
                                <td> {{ $requirment->description }} </td>
                                <td>
                                    @if (Auth::user())
                                        <button type="button" class="btn btn-sm btn-info applyNow" data-requirment_id="{{ $requirment->id }}">
                                            Apply Now
                                        </button>
                                    @else
                                        <button type="button" disabled class="btn btn-sm btn-info"
                                            title="Login In to Apply"> Login to Apply </button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>


        </div>
    </section>

    <div class="modal fade" id="confirm_requirment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('requirements.apply') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"> Apply on Requirements </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="requirnment_id" id="requirnment_id">
                        Are you sure to apply?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn-sm btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn-sm btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('customJs')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).on("click", ".applyNow", function(e) {
            var id = $(this).data('requirment_id');
             
            $.ajax("{{ route('requirements.apply') }}", {
                type: 'POST', // http method
                data: {
                    id: id
                },
                success: function(data) {
                    $('.table').load(' .table');
                    if(data.status == true){
                        Swal.fire(data.message)
                        
                    }
                    if(data.status == false){
                        Swal.fire(data.message)
                        
                    }
                   
                },
            });


        });
    </script>

@endsection
