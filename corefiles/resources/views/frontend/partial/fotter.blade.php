<div class="caller-row">
    <div class="call-item">
        <div class="call-circle">
            <img src="{{asset('frontend/assets/images/call/call-girl.png')}}" alt="call girl">
        </div>
        <div class="call-number">
            <a href="tel:{{ $site_info->mobile_no }}">{{ $site_info->mobile_no }}</a>
        </div>
    </div>
</div>

<footer class="footer-section section-padding clearfix">
    <!-- footer top -->
    <div class="footer-top">
        <div class="container">
            <div class="row pb-5">
                <div class="col-lg-8 col-md-6  mt-lg-block part-about">
                    <a href="/"><img class="footer-logo-size " src="{{ asset('website/'.$site_info->logo) }}" alt="header logo"></a>
                     {!! $common_settings->short_description !!}
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-4 mt-5 mt-md-0 mt-lg-block part-link">
                    <h3>Menu</h3>
                    <ul>
                        <li class="d-block"><a href="{{ route('homepage') }}">Home </a></li>
                        <li class="d-block"><a href="{{ route('aboutus') }}">About Us</a></li>
                        <li class="d-block"><a href="{{ route('service') }}">Service </a></li>
                        <li class="d-block"><a href="{{ route('contact_us') }}">Contact us</a></li>

                        
                    </ul>
                </div>

                {{-- <div class="col-lg-2 col-md-3 col-sm-6 col-6 mt-5 mt-md-0 mt-lg-block part-link">
                    <h3>Our Expertise</h3>
                    <ul>
                        <li class="d-block"><a href="#">Web Application</a></li>
                        <li class="d-block"><a href="#">Mobile Apps</a></li>
                        <li class="d-block"><a href="#">UI/UX</a></li>
                        <li class="d-block"><a href="#">Plugin & Extension</a></li>
                        <li class="d-block"><a href="#">IT Consultancy</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-4 mt-5 mt-lg-0 col-sm-6 col-6 mt-lg-block part-link">
                    <h3>Terms</h3>
                    <ul>
                        <li class="d-block"><a href="#">Announcements</a></li>
                        <li class="d-block"><a href="#">Privacy Policy</a></li>
                        <li class="d-block"><a href="#">Terms of Service</a></li>
                        <li class="d-block"><a href="#">Refund Policy</a></li>
                        <li class="d-block"><a href="#">Licences info</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-4 mt-5 mt-lg-0 col-sm-6 col-6 mt-lg-block part-link">
                    <h3>Support</h3>
                    <ul>
                        <li class="d-block"><a href="#">F.A.Q.</a></li>
                        <li class="d-block"><a href="#">Get Support</a></li>
                        <li class="d-block"><a href="#">Our Forum</a></li>
                        <li class="d-block"><a href="#">Member Area</a></li>
                        <li class="d-block"><a href="#">Contact Us</a></li>
                    </ul>
                </div> --}}

            </div>
        </div>
    </div>
    <!-- footer top -->
    <!-- footer bottom -->
    <div class="footer-bottom">
        <div class="container border-top">
            <div class="row mt-5">
                <div class="col-lg-7 col-md-12 part-copyright">
                    <!-- <h3 class="text-white">&copy; 2011 - 2020 LOREMIPSUM. All Rights Reserved.</h3> -->
                    {{-- <p>LOREMIPSUM is not partnered with any other company or person. We work as a team and do not have any reseller, distributor or partner!</p> --}}
                </div>
                <div class="col-lg-5 col-md-12 part-social text-lg-right text-md-left ">
                    <h4 class="mt-lg-block">Stay Connected</h4>
                    <a href="{{ $common_settings->facebook }}"><i class="fab fa-facebook-f"></i></a>
                    <a href="{{ $common_settings->twitter }}"><i class="fab fa-twitter"></i></a>                     
                    <a href="{{ $common_settings->youtube }}"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- footer bottom -->
</footer>