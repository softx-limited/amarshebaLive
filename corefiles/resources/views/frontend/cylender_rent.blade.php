@extends('frontend.app')
@section('title',"Cylender rent Service")

@section('content')


  <!-- =================================START CYLINDER SERVICE SECTION =================================== -->
  <section class="cylinder-service-section section-padding clearfix">
    <div class="container">
        <h2>Request for cylinder rent service </h2>
        @if( session()->has('success'))
       
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>{{session()->get('success') }}</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif
        <form action="{{ route('cylinder.rent.service') }}" method="POST">
            @csrf
            <div class="cylinder-form">
                <div class="row justify-content-center">
                    <!-- Patient Information -->
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>  Name <span style="color:red"> *<span></label>
                            <input type="text" class="form-control" data-toggle="input-mask" name="customer_name" id="customer_name"  placeholder="Customer Name" required>
                            {{-- <span style="color:red;display: none" id="error_nurse_name">Name field is Required</span> --}}

                            @error('customer_name')
                                <div class="alert alert-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror

                        </div>

                        <div class="form-group">
                            <label>  Mobile <span style="color:red"> *<span></label>
                            <input type="text" class="form-control" data-toggle="input-mask" name="customer_mobile" id="customer_mobile"  placeholder="Customer Mobile" required>
                            {{-- <span style="color:red;display: none" id="error_nurse_name">Name field is Required</span> --}}

                            @error('customer_mobile')
                                <div class="alert alert-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror

                        </div>




                        <div class="form-group">
                            <label>  Email <span style="color:red"> *<span></label>
                            <input type="text" class="form-control" data-toggle="input-mask" name="customer_email" id="customer_email"  placeholder="Customer Email" required>
                            {{-- <span style="color:red;display: none" id="error_nurse_name">Name field is Required</span> --}}

                            @error('customer_email')
                                <div class="alert alert-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror

                        </div>



                        <div class="form-group">
                            <label>  Address <span style="color:red"> *<span></label>
                            <input type="text" class="form-control" data-toggle="input-mask" name="customer_address" id="customer_address"  placeholder="Customer Address" required>
                            {{-- <span style="color:red;display: none" id="error_nurse_name">Name field is Required</span> --}}

                            @error('customer_address')
                                <div class="alert alert-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror

                        </div>





                        <button type="submit" class="btn btn-primary">Submit Request </button>




                    </div>
                    
                   
                    
                   

                    
                </div>
            </div>
        </form>
    </div>
</section>
<!-- =================================END CYLINDER SERVICE SECTION ===================================== -->


@endsection