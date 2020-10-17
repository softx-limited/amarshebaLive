@extends('frontend.app')
@section('title',"")

@section('content')
 
        <!-- =================================START SERVICE DETAILS  ======================================= -->
        <section class="service-details-section section-padding clearfix">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-8 col-md-8">
                        <div class="col-md-12">
                            <div class="services-img">
                                <img class="w-100" src="{{asset('service/'.$service->service_image)}}" alt="">
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="service-title mt-5 mb-3">
                                <h3>{{ $service->service_title }}</h3>
                            </div>
                            <div class="service-content ">
                            {!! $service->service_details !!}
                            </div>
                        </div>
                    </div>
                    <!-- sidebar -->
                    <div class="col-xl-4 col-lg-4 col-md-4 d-md-block d-none ">
                        <div class="sidebar">
                            <ul class="list-group">
                                @foreach ($services as $item)
                                <li class="list-group-item list-group-item-action"> <a href="{{ route('service.details',$item->slug) }}">{{ $item->service_title }}</a></li>
                        
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ===================================END SERVICE DETAILS  ======================================= -->

@endsection