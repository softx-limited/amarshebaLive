@extends('frontend.app')
@section('title',"")

@section('content')
           <!-- =================================START SLIDER SECTION ============================================= -->
           <section class="home-slider-section clearfix">
            <div class="home-slick-slider">
                <!-- slider item -->
                @foreach ($sliders as $item)
                <div>
                    <img class="w-100" src="{{asset('slider/'.$item->image_name)}}" alt="{{$item->image_title}}">
                </div>
                @endforeach
                
                <!-- slider item -->
              
            </div>
        </section>
        <!-- =================================END SLIDER SECTION =============================================== -->


        <!-- =================================START SERVICES SECTION =========================================== -->
        <section class="services-section section-padding clearfix" id="our-service">
            <div class="container">
                <!-- section title -->
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="section-title">
                            <h2>Our <span>Service</span></h2>
                            {{-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam quam, autem, iusto mollitia beatae maxime ut illum sapiente excepturi veniam.</p> --}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- single services -->

                    
                    @foreach ($services as $item)

                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-service clearfix">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="text-center">{{ $item->service_title }}</h4>
                                        <div class="card-image">
                                            <img class="w-100" src="{{asset('service/'.$item->service_front_image)}}" alt="">
                                            <div class="single-service-inner">
                                                <a href="{{ route('service.details',$item->slug) }}"><i class="fas fa-link"></i></a>
                                            </div>
                                        </div>
                                    <p class="text-center">{{ substr($item->service_details,0,200) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach

                    <!-- single services -->
                   
                   
                </div>
            </div>
        </section>
        <!-- =================================END SERVICES SECTION ============================================= -->
   

        <!-- ================================= START OUR TEAM SECTION ========================================== -->
        <section class="our-team-section section-padding clearfix">
            <div class="container">
                <div class="row">
                    <!-- section title -->
                    <div class="col-12 text-center">
                        <div class="section-title">
                            <h2>Our <span>Team</span></h2>
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
                    
                    
                </div>
            </div>
        </section>
        <!-- =================================  END OUR TEAM SECTION =========================================== -->

       <!-- ============================= START OUR MAIN POWER QUALITY SECTION ================================= -->
       <section class="services-section section-padding clearfix">
        <div class="container">
            <!-- section title -->
            <div class="row">
                <div class="col-12 text-center">
                    <div class="section-title">
                        <h2>Our <span>Man Power Quality</span></h2>
                        {{-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam quam, autem, iusto mollitia beatae maxime ut illum sapiente excepturi veniam.</p> --}}
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- single services -->
                @foreach ($manpowers as $item)
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-service clearfix">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="text-center">{{ $item->service_title }}</h4>
                                    <div class="card-image">
                                        <img class="w-100" src="{{asset('manpower/'. $item->service_front_image)}}" alt="">
                                        <div class="single-service-inner">
                                            <a href="{{ route('manpower.details',$item->slug) }}"><i class="fas fa-link"></i></a>
                                        </div>
                                    </div>
                                <p class="text-center">{{ substr($item->service_details,0,200) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
           @endforeach
             </div>
            </div>
        </section>
        <!-- ============================= END OUR MAIN POWER QUALITY SECTION ==================================== -->


        <!-- ================================= START OUR HAPPY CLIENT SECTION ================================== -->
        <section class="happy-client-section section-padding clearfix">
            <div class="container">
                <div class="row">

                    <!-- for mobile device -->
                     <div class="d-col-xl-6 col-lg-6 col-md-12 d-block d-lg-none mb-5">
                        <div class="happy-client-right mb-4">
                            <img class="w-100" src="{{asset('frontend/assets/images/happy-client/right/office-400x314.jpg')}}" alt="">
                        </div>
                    </div>
                    <!-- for mobile device -->

                    <!-- our team right -->
                    <div class="col-xl-6 col-lg-6 col-md-12 ">
                        <div class="col-12">
                            <div class="happy-client-title">
                                <h3>Happy <span>Client</span></h3>
                            </div>
                        </div>
                        <div class="happy-client-left">
                            <div class="row happy-client owl-carousel owl-theme">
                                <!-- single team -->
                                @foreach ($clients as $item)
                                    
                               
                                <div class="col-xl-12 ">
                                    <div class="single-team">
                                        <div class="card">
                                            <div class="card-body">
                                                <p>{!! $item->client_notation !!}</p>
                                                <div class="member-info d-flex">
                                                    <div class="member-img mr-2">
                                                        <img src="{{asset('client/'.$item->client_image)}}" alt="">
                                                    </div>
                                                    <div class="member-details">
                                                        <h5>{{ $item->client_name }}</h5>
                                                        <small>{{ $item->client_designation }}</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <!-- single team -->
                                 
                            </div>
                        </div>
                    </div>
                    <!-- ourt team left -->
                    <div class="col-xl-6 col-lg-6  d-none d-lg-block ">
                        <div class="happy-client-right ">
                            <img class="w-100" src="{{asset('frontend/assets/images/happy-client/right/office-400x314.jpg')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection