@extends('frontend.app')
@section('title',"about us")

@section('content')
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
@endsection