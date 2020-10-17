<header class="header-section clearfix">
    <div class="container">
        <!-- start header top -->
        <div class="main-header">
           <div class="row">
               <div class="col-xl-4 col-lg-4 col-md-4">
                    <!-- logo -->
                    <div class="header-logo">
                        <a href="/"><img class="logo-size " src="{{ asset('website/'.$site_info->logo) }}" alt="header logo"></a>
                    </div>
                    <!-- address -->
               </div>
               <div class="col-xl-5 col-lg-5 col-md-5 text-center">
                    <div class="header-address">
                        <ul class="d-flex">
                            <li> <span><i class="fas fa-map-marker-alt"></i></span></li>
                            <li> {{ $site_info->address }}</li>
                            
                        </ul>
                    </div>
               </div>
               <div class="col-xl-3 col-lg-3 col-md-3 text-right">
                    <div class="header-contact">
                        <ul class="d-flex justify-content-end">
                            <li><span><i class="fas fa-phone-alt"></i> </span></li>
                            <li><a href="tel:{{ $site_info->mobile_no }}"> {{ $site_info->mobile_no }}</a></li>
                            <li><a href="tel:{{ $site_info->telephone_no }}"> {{ $site_info->telephone_no }}</a></li>
                        </ul>
                   </div>
               </div>
           </div>
        </div>
        <!-- end header top -->
    </div>
</header>