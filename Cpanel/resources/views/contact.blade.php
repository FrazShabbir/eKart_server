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
                            <span>Contact Us</span>
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
                <div class="col-lg-6 col-md-6">
                    <div class="contact__text">
                        <div class="section-title">
                            <span>Information</span>
                            <h2>Get In Touch</h2>
                            <p>As you might expect of a company that began as a high-end interiors contractor, we pay
                                strict attention.</p>
                        </div>
                        <ul>
                            <li>
                                <h4>Byreddy Consulting</h4>
                                <p><i class="fa fa-map-marker let-add-icons"></i>  {{  $contact->address }} <br /><br />
                                   <i class="fa fa-volume-control-phone let-add-icons"></i> {{  $contact->phone }} <br /><br />
                                   <i class="fa fa-envelope let-add-icons"></i> {{  $contact->email }}
                                </p>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="contact__form">
                        <form action="{{ route('postQuery') }}" method="post" >
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" placeholder="First Name" name="name" required class="mb">

                                    @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                    @enderror

                                </div>
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Last Name" name="last" required class="mb">

                                    @error('last')
                                            <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Company / Institute Name" name="company" required class="mb">

                                    @error('company')
                                            <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Job Title" name="title" required class="mb">

                                    @error('title')
                                            <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-lg-12">
                                    <input type="text" placeholder="Company / Institute Email" name="company_email" required class="mb">

                                    @error('company_email')
                                            <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <input type="tel" placeholder="Contact Number" name="number" required class="mb">

                                    @error('number')
                                            <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <select class="custom_select" name="industry" required>
                                    <option value="" selected disabled >Select Industry</option>
                                    @foreach ($industries as $industry )
                                        <option value="{{ $industry->industryType }}"> {{ $industry->industryType }} </option>
                                    @endforeach
                                  </select>

                                  @error('industry')
                                    <small class="text-danger">{{ $message }}</small>
                                 @enderror
                                </div>
                                <div class="col-lg-12">
                                    <textarea placeholder="Please write your description here..." name="desc" required class="mb"></textarea>

                                    @error('desc')
                                            <small class="text-danger">{{ $message }}</small>
                                    @enderror

                                    <p>We respect yor privacy and Committed to Protect it. We will contact you for the relevent requirements as mentioned in the "Requirement Description" box.</p>

                                    <div class="checkout__input__checkbox">
                                <label for="acc">
                                    Please click the box to receive updates. To unsubscribe, please go to our <a class="cont-privacy" href="#">Privacy Policy.</a>
                                    <input type="checkbox" id="acc"   value="1">
                                    <span class="checkmark"></span>
                                </label>
                                        <p>By clicking "Submit", you allow us to store and process the information provided above.</p>
                            </div>

                                    <button type="submit" class="site-btn">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('customJs')

@endsection
