<div class="lets-connect-bg">
    <div class="lets-connect-part">
        <div class="col-md-12 lets-connect-heading">
            <h2>Let's Connect</h2><br>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                of type and scrambled it to make a type specimen book.</p>
        </div>
        <!-- Contact Section Begin -->
        <section class="contact spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-5">
                        <div class="contact__text">
                            <div class="section-title">
                                <p><strong class="ready-text">Ready to take the next step?</strong> Fill out the
                                    form to the right, send us an email or give us a call, and a client
                                    solutions executive will be in touch.</p>
                            </div>
                            <ul>
                                <li>
                                    <h4>Byreddy Consulting</h4>
                                    <p><i class="fa fa-map-marker let-add-icons"></i> {{ $option->address }} <br /><br />
                                        <i class="fa fa-volume-control-phone let-add-icons"></i> {{ $option->phone }}
                                        <br /><br />
                                        <i class="fa fa-envelope let-add-icons"></i>{{ $option->email }}
                                    </p>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-1">

                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="contact__form">
                            <form action="{{ route('about.connect')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <input type="text" placeholder="First Name" required
                                         class="@error('name') is-invalid @enderror" name="name">
                                        @error('name')
                                             <small class="text-danger"> {{ $message  }}  </small>
                                        @enderror

                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" placeholder="Last Name" required
                                        class="@error('last') is-invalid @enderror" name="last">
                                        @error('last')
                                            <small class="text-danger"> {{ $message  }}  </small>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="email" placeholder="Email" required
                                        class="@error('email') is-invalid @enderror" name="email">
                                        @error('email')
                                             <small class="text-danger"> {{ $message  }}  </small>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="tel" placeholder="Phone Number" required
                                         class="@error('phone') is-invalid @enderror" name="phone">
                                        @error('phone')
                                             <small class="text-danger"> {{ $message  }}  </small>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" placeholder="Country Name" required
                                        class="@error('country') is-invalid @enderror" name="country">
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" placeholder="Company Name" required
                                        class="@error('company') is-invalid @enderror" name="company">
                                        @error('company')
                                             <small class="text-danger"> {{ $message  }}  </small>
                                        @enderror

                                    </div>
                                    <div class="col-lg-12">
                                        <textarea  placeholder="Please write your description here..." required
                                         class="@error('description') is-invalid @enderror" name="description"></textarea>
                                        <p>We respect yor privacy and Committed to Protect it. We will contact
                                            you for the relevent requirements as mentioned in the "Requirement
                                            Description" box.</p>

                                        <div class="checkout__input__checkbox">
                                            <label for="acc">
                                                Please click the box to receive updates. To unsubscribe, please
                                                go to our <a class="cont-privacy" href="#">Privacy Policy.</a>
                                                <input type="checkbox" id="acc"   class="@error('terms') is-invalid @enderror" name="terms">
                                                <span class="checkmark"></span>
                                            </label>
                                            <p>By clicking "Sbumit", you allow us to store and process the
                                                information provided above.</p>
                                        </div>

                                        <button type="submit" class="site-btn">Request More Info</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact Section End -->
    </div>
</div>
