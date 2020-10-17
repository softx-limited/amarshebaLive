@extends('frontend.app')
@section('title',"about us")

@section('content')
<section class="about-section section-padding clearfix">
    <div class="container">
        <div class="row justify-content-center">
            <!-- about left -->
            <div class="col-xl-6 col-lg-6 col-md-8">
                <div class="about-left">
                    <img class="w-100" src="{{ asset('frontend/assets/images/about/about.jpg') }}" alt="about">
                </div>
            </div>

            <!-- about right -->
            <div class="col-xl-6 col-lg-6 col-md-12">
                <div class="about-right">
                    <!-- about title -->
                    <div class="about-title">
                        <h3>Welcome to <span>our company</span></h3>
                    </div>
                    <!-- about content -->
                    <div class="about-content">
                       {!! $about_info->about_us !!}
                    </div>
                    <!-- about button -->
                    {{-- <div class="about-button">
                        <a class="hvr-float-shadow" href="#">Learn More</a>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ===================================END ABOUT SECTION MENU ===================================== -->

<!-- ================================= START OUR TEAM SECTION ========================================== -->
<section class="our-team-section section-padding clearfix">
    <div class="container">
        <div class="row">
            <!-- section title -->
            <div class="col-12 text-center">
                <div class="section-title">
                    <h2>Meet Our <span>Team</span></h2>
                    {{-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam quam, autem, iusto mollitia beatae maxime ut illum sapiente excepturi veniam.</p> --}}
                </div>
            </div>
        </div>
            <!-- our team -->
            <div class="row our-team owl-carousel owl-theme no-gutters">
                <!-- single team -->
                @foreach ($teams as $item)
                         
                   
                <div class="col-xl-12 text-center">
                    <div class="our-team-single-item">
                        <div class="card">
                            <img class="w-100" src="{{asset('team/'.$item->image)}}" alt="">
                            <div class="card-body">
                               <h4>{{ $item->name }}</h4>
                               <small>{{ $item->designation }}</small>
                               {{-- <div class="team-social-link">
                                   <a class="hvr-float-shadow" href="#"><i class="fab fa-facebook-f"></i></a>
                                   <a class="hvr-float-shadow" href="#"><i class="fab fa-twitter"></i></a>
                                   <a class="hvr-float-shadow" href="#"><i class="fab fa-instagram"></i></a>
                                   <a class="hvr-float-shadow" href="#"><i class="fab fa-pinterest-p"></i></a>
                               </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- single team -->
            
           
        </div>
    </div>
</section>
@endsection