@extends('frontend.app')
@section('title',"Nurse Service")

@section('content')


  <!-- =================================START CYLINDER SERVICE SECTION =================================== -->
  <section class="cylinder-service-section section-padding clearfix">
    <div class="container">
        @if( session()->has('success'))
       
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>{{session()->get('success') }}</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif
        <form action="{{ route('registration.nurse.service') }}" method="POST">
            @csrf
            <div class="cylinder-form">
                <div class="row justify-content-center">
                    <!-- Patient Information -->
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="patient-info">
                            <h4>Patient Information</h4>
                            <div class="form-group">
                                <label>Patient Name <span style="color:red"> *<span></label>
                                <input type="text" class="form-control" data-toggle="input-mask" name="patient_name" id="Patient_name"  placeholder="Patient Name" required>
                                {{-- <span style="color:red;display: none" id="error_nurse_name">Name field is Required</span> --}}
    
                                @error('patient_name')
                                    <div class="alert alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
    
                            </div>
    
    
                            <div class="form-group">
                                <label>Patient Age <span style="color:red"> *<span></label>
                                <input type="text" class="form-control" data-toggle="input-mask" name="patient_age" id="patient_age"  placeholder="Patient Age" required>
                                {{-- <span style="color:red;display: none" id="error_nurse_name">Name field is Required</span> --}}
    
                                @error('patient_age')
                                    <div class="alert alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
    
                            </div>
    
    
                            <div class="form-group">
                                <label>Gender <span style="color:red">*<span></label>
                                    <select class="form-control" name="patient_gender"  id="Patient_gender" required>
                                        <option value="">Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select>
                                      
                                @error('patient_gender')
                                    <div class="alert alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
    
                            </div>
    
    
    
                            
    
    
                            
    
                            <div class="form-group">
                                <label>Patient Mobile <span style="color:red"> *<span></label>
                                <input type="text" class="form-control" data-toggle="input-mask" name="patient_mobile" id="patient_mobile"  placeholder="Patient Mobile" required>
                                {{-- <span style="color:red;display: none" id="error_nurse_name">Name field is Required</span> --}}
    
                                @error('patient_mobile')
                                    <div class="alert alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
    
                            </div>                        
    
    
    
                            <div class="form-group">
                                <label>Patient Address <span style="color:red"> *<span></label>
                                <input type="text" class="form-control" data-toggle="input-mask" name="patient_address" id="patient_address"  placeholder="Patient Address" required>
                                {{-- <span style="color:red;display: none" id="error_nurse_name">Name field is Required</span> --}}
    
                                @error('patient_address')
                                    <div class="alert alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
    
                            </div>

                            <div class="form-group">
                                <label>Guardian Mobile Number <span style="color:red"> *<span></label>
                                <input type="text" class="form-control" data-toggle="input-mask" name="patient_gurdian_mobile" id="patient_gurdian_mobile"  placeholder="Guardian Mobile Number" required>
                                {{-- <span style="color:red;display: none" id="error_nurse_name">Name field is Required</span> --}}
    
                                @error('patient_gurdian_mobile')
                                    <div class="alert alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
    
                             </div>

                        </div>
                    </div>

                    <!-- Guardian Information -->
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="guardian-info">
                            <h4>Guardian Information</h4>
                           
                            <div class="form-group">
                                <label>Name <span style="color:red"> *<span></label>
                                <input type="text" class="form-control" data-toggle="input-mask" name="patient_gurdian_name" id="patient_gurdian_name"  placeholder="Patient Guardian Name" required>
                                {{-- <span style="color:red;display: none" id="error_nurse_name">Name field is Required</span> --}}
    
                                @error('patient_gurdian_name')
                                    <div class="alert alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
    
                            </div>
    
    
                            <div class="form-group">
                                <label>Age <span style="color:red"> *<span></label>
                                <input type="text" class="form-control" data-toggle="input-mask" name="patient_gurdian_age" id="patient_gurdian_age"  placeholder="Patient Guardian Age" required>
                                {{-- <span style="color:red;display: none" id="error_nurse_name">Name field is Required</span> --}}
    
                                @error('patient_gurdian_age')
                                    <div class="alert alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
    
                                </div>
    
    
                                <div class="form-group">
                                    <label>Address <span style="color:red"> *<span></label>
                                    <input type="text" class="form-control" data-toggle="input-mask" name="patient_gurdian_address" id="patient_gurdian_address"  placeholder="Patient Guardian Address" required>
                                    {{-- <span style="color:red;display: none" id="error_nurse_name">Name field is Required</span> --}}
        
                                    @error('patient_gurdian_address')
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
        
                                 </div>
    
                                 <div class="form-group">
                                    <label>NID <span style="color:red"> *<span></label>
                                    <input type="text" class="form-control" data-toggle="input-mask" name="patient_gurdian_nid" id="patient_gurdian_nid"  placeholder="Patient Guardian NID" required>
                                    {{-- <span style="color:red;display: none" id="error_nurse_name">Name field is Required</span> --}}
        
                                    @error('patient_gurdian_nid')
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
        
                                 </div>
    
    
                                 <div class="form-group">
                                    <label>Birth Certificate Number <span style="color:red"> *<span></label>
                                    <input type="text" class="form-control" data-toggle="input-mask" name="patient_gurdian_boc" id="patient_gurdian_boc"  placeholder="Guardian Birth Certificate Number" >
                                    {{-- <span style="color:red;display: none" id="error_nurse_name">Name field is Required</span> --}}
        
                                    @error('patient_gurdian_boc')
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
        
                                 </div>
    
    
    
    
                                 <div class="form-group">
                                    <label>Passport Number <span style="color:red"> *<span></label>
                                    <input type="text" class="form-control" data-toggle="input-mask" name="patient_gurdian_passport" id="patient_gurdian_passport"  placeholder="Guardian Passport Number" >
                                    {{-- <span style="color:red;display: none" id="error_nurse_name">Name field is Required</span> --}}
        
                                    @error('patient_gurdian_passport')
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
        
                                 </div>
    
    
                                
    
    
                                 <div class="form-group" style="display: none">
                                    <label>Budget <span style="color:red"> *<span></label>
                                    <input type="text" class="form-control" value="0" data-toggle="input-mask" name="total_budget" id="total_budget"  placeholder="Total Project Budget" required>
                                    {{-- <span style="color:red;display: none" id="error_nurse_name">Name field is Required</span> --}}
        
                                    @error('total_budget')
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
        
                                 </div>

                                 <div class="form-group" style="display: none">
                                    <label>Nurse Budget <span style="color:red"> *<span></label>
                                    <input type="text" class="form-control" value="0" data-toggle="input-mask" name="nurse_budget" id="nurse_budget"  placeholder="Nurse Budget" required>
                                    {{-- <span style="color:red;display: none" id="error_nurse_name">Name field is Required</span> --}}
        
                                    @error('nurse_budget')
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
        
                                 </div>

                            <div class="row justify-content-end">
                                <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12 mt-4">
                                <input type="submit" value="Submit" name="submit" class="form-control form-control-lg submit-button-bg">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<!-- =================================END CYLINDER SERVICE SECTION ===================================== -->


@endsection