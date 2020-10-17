@extends('frontend.app')
@section('title',"")

@section('content')
 
        <!-- =================================START SERVICE DETAILS  ======================================= -->
        <section class="service-details-section section-padding clearfix">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="col-md-12">
                             
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="service-title mt-5 mb-3">
                                <h3>{{ ucfirst($slug) }}</h3>
                            </div>
                            <div class="service-content ">
                            {!! $result->$slug !!}
                            </div>
                        </div>
                    </div>
                    <!-- sidebar -->
                    
                </div>
            </div>
        </section>
        <!-- ===================================END SERVICE DETAILS  ======================================= -->

@endsection