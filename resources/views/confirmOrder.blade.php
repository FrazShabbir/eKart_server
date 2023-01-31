@extends('layout.master')
@section('title', 'Contact Us')
@section('customStyle')
    <style>
            .mb{
                margin-bottom: 10px!important;
            }
    </style>
@endsection
@section('content')

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <div class="breadcrumb__links">
                            <a href="{{ route('homePage') }}">Home</a> /
                            <span>Order Confirm</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-6">
                    <div class="contact__text">
                        <div class="section-title">
                            <span>Information</span>
                            <h2> Thanks for you order</h2>
                            <p>As you might expect of a company that began as a high-end interiors contractor, we pay
                                strict attention.</p>
                        </div>
                        <ul>
                            <li>
                                <h4>Byreddy Consulting</h4>
                                <p><i class="fa fa-map-marker let-add-icons"></i> Flat 101, Vigneshwara residency <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Vani Nagar, Malkajgiri, Hyderabad, 500047 <br /><br />
                                   <i class="fa fa-volume-control-phone let-add-icons"></i> +91 9966779325 <br /><br />
                                   <i class="fa fa-envelope let-add-icons"></i> info@byreddyconsulting.com
                                </p>
                            </li>

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection

@section('customJs')

@endsection
