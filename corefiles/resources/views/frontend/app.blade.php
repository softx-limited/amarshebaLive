<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title','amarsheba is the Best Nursing Service in BD')</title>
        <!-- favicon -->
        <link rel="icon" href="{{ asset('website/'.$site_info->fav_icon) }}  ">
        <!-- font awesome css -->
        <link rel="stylesheet" href="{{asset('frontend/assets/css/all.min.css')}}">
        <!-- bootstrap css -->
        <link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.min.css')}}">
        <!-- fonts -->
        <link rel="stylesheet" href="{{asset('frontend/assets/css/roboto-stylesheet.css')}}">
        <!-- carousel -->
        <link rel="stylesheet" href="{{asset('frontend/assets/css/owl.theme.default.min.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/assets/css/owl.carousel.min.css')}}">
        <!-- slick slider css -->
        <link rel="stylesheet" href="{{asset('frontend/assets/css/slickslick.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/assets/css/slick-theme.css')}}">
        <!-- hover css -->
        <link rel="stylesheet" href="{{asset('frontend/assets/css/hover-min.css')}}">
        <!-- main css -->
        <link rel="stylesheet" href="{{asset('frontend/assets/css/style.css')}}">
        <!-- responsive css -->
        <link rel="stylesheet" href="{{asset('frontend/assets/css/responsive.css')}}">
        <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    </head>
    <body>
        <!-- =================================START HEADER SECTION   ========================================= -->        
      
     @include('frontend.partial.header')

         <!-- start main menu -->
         @include('frontend.partial.menu')
    <!-- end main menu -->
 @yield('content')
        <!-- ================================= END OUR HAPPY CLIENT SECTION ==================================== -->


        
        <!-- ================================= ======START FOOTER  SECTION======= ============================== -->
        @include('frontend.partial.fotter')
        <!-- =====================================END FOOTER  SECTION ========================================== -->


        <!--==================================== all js link============================================ ========-->
        <!-- js link -->
        <script src="{{asset('frontend/assets/js/jquery.min.js')}}"></script>
        <!-- bootstrap js -->
        <script src="{{asset('frontend/assets/js/bootstrap.bundle.min.js')}}"></script>
        <!-- fixed navbar -->
        <script src="{{asset('frontend/assets/js/navbar-fixed.js')}}"></script>
        <!-- slick slider js -->
        <script src="{{asset('frontend/assets/js/slick.min.js')}}"></script>
        <!-- carousel -->
        <script src="{{asset('frontend/assets/js/owl.carousel.min.js')}}"></script>
        <!-- main js -->
        <script src="{{asset('frontend/assets/js/script.js')}}"></script>

        <script src="https://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        {!! Toastr::message() !!}

        <script>
        @if($errors->any())
                @foreach($errors->all() as $error)
                    toastr.error('{{ $error }}','Error',{
                        closeButton:true,
                        progressBar:true,
                    });
                @endforeach
            @endif
        </script>
    <body>
</html>