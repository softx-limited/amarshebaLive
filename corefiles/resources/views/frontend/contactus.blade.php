@extends('frontend.app')
@section('title',"contact us")

@section('content')
    <!-- =================================START CONTACT TOP SECTION===================================== -->
    <section class="contact-top-section section-padding clearfix">
        <div class="container">
            <div class="contact-top">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="section-title">
                            <h2>Get In <span>Touch</span></h2>
                            {{-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam quam, autem, iusto mollitia beatae maxime ut illum sapiente excepturi veniam.</p> --}}
                        </div>
                    </div>
                </div>
    
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="single-contact">
                            <div class="card">
                                <div class="card-body text-left">
                                    <ul class="d-flex">
                                        <li> <span><i class="fas fa-map-marker-alt mr-3"></i></span></li>
                                        <li> {{ $site_info->address }}</li>
                                    </ul>
                                </div>
                            </div>
                         </div>
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </section>
    <!-- ===================================END CONTACT TOP SECTION===================================== -->


    <!-- =================================START CONTACT US SECTION  ==================================== -->
    <section class="contact-section section-padding clearfix">
        <div class="container">
            <div class="row justify-content-center">
                <!-- contact left area -->
                <div class="col-xl-5 col-lg-5">
                    <div class="contact-left">
                        <div class="contact-title">
                            <h3>Contact Us</h3>
                        </div>
                        <div class="contact-left-subheading">
                           
                            {!! $about_info->short_description !!}
                        </div>
                         
                    </div>
                </div>
                <!-- contact right area-->
                <div class="col-xl-7 col-lg-7">
                    <div class="contact-right">
                        <!-- <div class="contact-right-title">
                            <h3>Call Back Service</h3>
                        </div> -->
                        <form action="#" method="">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-lg" placeholder="Name*" name="name">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <input type="tel" class="form-control form-control-lg" placeholder="Phome*" name="phone">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-lg" placeholder="Email*" name="email">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-lg" placeholder="Address*" name="address">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                       <textarea name="message" id="" cols="30" rows="" placeholder="Your Message"  class="form-control form-control-lg"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                       <input type="submit" class="form-control form-control-lg submit-button-bg" value="Submit">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                 
            </div>
        </div>
    </section>
    <!-- =================================END CONTACT US SECTION  ====================================== -->

    <!-- ======================================START MAP SECTION  ====================================== -->
     <!-- branch Loacation -->
     <div class="maps-area">
        <iframe src="{{ $about_info->google_map }}"></iframe>
    </div>
    <!-- ========================================END MAP SECTION  ====================================== -->

    
@endsection