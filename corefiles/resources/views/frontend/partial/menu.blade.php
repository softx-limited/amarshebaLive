<nav class="menu-area  clearfix">
    <div class="container">
        <div class="main-menu clearfix">
            <div class="menu-left clearfix">
                <ul class="current-page">
                    <li><a href="{{ route('homepage') }}">Home</a></li>
                    <li><a href="{{ route('aboutus') }}">About Us</a></li>
                    <li><a href="{{ route('service') }}">Services</a></li>
                    <li><a href="{{ route('contact_us') }}">Contact Us</a></li>
                </ul>
            </div>
            <div class="menu-right clearfix">
                <ul>
                    <li><a class="menu-right-border" href="#">Online Agreement</a>
                        <!-- agreement sub menu -->
                        <ul>
                            <li><a href="{{ route('cylinder.service') }}">Cylinder Rent service</a></li>
                            <li><a href="{{ route('nurse.service') }}">Nursing service</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
 
<!-- =================================END HEADER SECTION   ============================================= -->


<!-- ================================START MOBILE MENU  ========================================= --> 
<div class="mobile-menu-area">
   <div class="top-header">
        <div class="container">
            <div class="main-header">
                <div class="row py-3">
                    <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 text-center">
                        <div class="header-address">
                            <ul class="d-flex">
                                <li> <span><i class="fas fa-map-marker-alt"></i></span></li>
                                <li class="text-left"> {{ $site_info->address }}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 text-right">
                        <div class="header-contact">
                            <ul class="d-flex justify-content-end">
                                <li><span><i class="fas fa-phone-alt"></i> </span></li>
                                <li><a href="tel:{{ $site_info->mobile_no }}">{{ $site_info->mobile_no }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>       
   </div>
    <nav class="navbar navbar-light bg-light navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="/"><img class="logo-size " src="{{ asset('website/'.$site_info->logo) }}" alt=""></a>

            <button class="navbar-toggler navbar-toggler-right" data-toggle="collapse" data-target="#myNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="myNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="{{ route('homepage') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('aboutus') }}">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('service') }}">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('contact_us') }}">Contact Us</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Online Agreement</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('cylinder.service') }}">Cylinder Rent service</a>
                            <a class="dropdown-item" href="{{ route('nurse.service') }}">Nursing service</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<!-- =================================END MOBILE MENU  ============================================= -->
