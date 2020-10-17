@extends('backend.app')
@section('title',"All Patient's information")
@push('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
@endpush

@section('content')

   <!-- Start Content-->
   <div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Homepage</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Patient</a></li>
                        <li class="breadcrumb-item active">Patient</li>
                    </ol>
                </div>
                <h4 class="page-title">Patient List</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            {{-- <button type="button"  data-toggle="modal" data-target="#custom-modal"></button> --}}

                        {{-- <a href=" " class="btn btn-danger waves-effect waves-light"> <i class="mdi mdi-plus-circle mr-1"></i>Add Patient </a> --}}

                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addPatient">
                            <i class="mdi mdi-plus-circle mr-1"></i>Add Patient
                          </button>


                          <!-- Add Patient Modal -->
            <div class="modal fade" id="addPatient" tabindex="-1" role="dialog" aria-labelledby="addPatient" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="addPatient">Patient Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                <form action="{{ route('patient.store') }}" method="post" enctype="multipart/form-data">

                        @csrf
                    <div class="modal-body">
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

                        <h5>Guardian Information</h5>


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


                             <div class="form-group">
                                <label>Mobile Number <span style="color:red"> *<span></label>
                                <input type="text" class="form-control" data-toggle="input-mask" name="patient_gurdian_mobile" id="patient_gurdian_mobile"  placeholder="Guardian Mobile Number" required>
                                {{-- <span style="color:red;display: none" id="error_nurse_name">Name field is Required</span> --}}
    
                                @error('patient_gurdian_mobile')
                                    <div class="alert alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
    
                             </div>


                             <div class="form-group">
                                <label>Budget <span style="color:red"> *<span></label>
                                <input type="text" class="form-control" data-toggle="input-mask" name="total_budget" id="total_budget"  placeholder="Total Project Budget" required>
                                {{-- <span style="color:red;display: none" id="error_nurse_name">Name field is Required</span> --}}
    
                                @error('total_budget')
                                    <div class="alert alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
    
                             </div>

{{-- 
                             <div class="form-group">
                                <label>Advance Payment <span style="color:red"> *<span></label>
                                <input type="text" class="form-control" data-toggle="input-mask" name="advance_payment" id="advance_payment"  placeholder="Advance Payment">
                                 
    
                                @error('advance_payment')
                                    <div class="alert alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
    
                             </div> --}}



                             <div class="form-group">
                                <label>Nurse Budget <span style="color:red"> *<span></label>
                                <input type="text" class="form-control" data-toggle="input-mask" name="nurse_budget" id="nurse_budget"  placeholder="Nurse Budget" required>
                                {{-- <span style="color:red;display: none" id="error_nurse_name">Name field is Required</span> --}}
    
                                @error('nurse_budget')
                                    <div class="alert alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
    
                             </div>


                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save </button>
                    </div>
                    </form>
                </div>
                </div>
            </div>


                        </div>
                        <div class="col-sm-8">

                        </div><!-- end col-->
                    </div>

                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap table-striped" id="table_id">
                            <thead>
                                <tr>
                                    <th>SL NO</th>
                                    <th>Patient Name</th>
                                    <th>Patient Mobile</th>
                                    <th>Patient Address</th>
                                    <th>Assign Nurse</th>
                                    <th>Status</th>
                                    <th style="width: 85px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($datas as $key=>$item)


                                <tr>
                                    <td>
                                       {{$key+1}}
                                    </td>

                                    <td>
                                        {{ $item->patient_name }}

                                    </td>

                                   


                                    <td>
                                        {{$item->patient_mobile ??''}}


                                    </td>

                                    <td>
                                        {{$item->patient_address ??''}}


                                    </td>
                                    <td>
                                        {{$item->nurse_name ??''}}


                                    </td>


                                    <td>
                                        @if($item->status==0)                                       
                                      
                                          
                                        <span class="label label-info">Processing</span>
                                        @else 
                                        <span class="label label-success">Completed</span>

                                        @endif


                                    </td>





                                    <td>
                                    <a href="{{ route('patient.account.details',$item->id) }}" class="btn btn-warning" href=" " class="action-icon"> <span>Accounts</span> </a>




                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModelInfo_{{$item->id}}">

                                        Edit
                                      </button>

                                      <!-- Modal -->
                                            <div class="modal fade" id="editModelInfo_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="editModelInfo_{{$item->id}}" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Patient's information</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('patient.update',$item->id) }}" method="post" enctype="multipart/form-data">
                                                            @method('PUT')
                                                            @csrf
                                                             
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label>Patient Name <span style="color:red"> *<span></label>
                                                                    <input type="text" class="form-control" data-toggle="input-mask" value="{{ $item->patient_name}}" name="patient_name" id="Patient_name"  placeholder="Patient Name" required>
                                                                    {{-- <span style="color:red;display: none" id="error_nurse_name">Name field is Required</span> --}}
                                        
                                                                    @error('patient_name')
                                                                        <div class="alert alert-danger" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </div>
                                                                    @enderror
                                        
                                                                </div>
                                        
                                        
                                                                <div class="form-group">
                                                                    <label>Patient Age <span style="color:red"> *<span></label>
                                                                    <input type="text" class="form-control" data-toggle="input-mask" value="{{ $item->patient_age}}"  name="patient_age" id="patient_age"  placeholder="Patient Age" required>
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
                                                                            <option value="Male" {{($item->patient_gender=='Male')?'selected':''}}>Male</option>
                                                                            <option value="Female" {{($item->patient_gender=='Female')?'selected':''}}>Female</option>
                                                                            <option value="Other" {{($item->patient_gender=='Other')?'selected':''}}>Other</option>
                                                                        </select>
                                                                          
                                                                    @error('patient_gender')
                                                                        <div class="alert alert-danger" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </div>
                                                                    @enderror
                                        
                                                                </div>
                                        
                                        
                                        
                                                                
                                        
                                        
                                                                
                                        
                                                                <div class="form-group">
                                                                    <label>Patient Mobile <span style="color:red"> *<span></label>
                                                                    <input type="text" class="form-control" data-toggle="input-mask" value="{{ $item->patient_mobile}}" name="patient_mobile" id="patient_mobile"  placeholder="Patient Mobile" required>
                                                                    {{-- <span style="color:red;display: none" id="error_nurse_name">Name field is Required</span> --}}
                                        
                                                                    @error('patient_mobile')
                                                                        <div class="alert alert-danger" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </div>
                                                                    @enderror
                                        
                                                                </div>                        
                                        
                                        
                                        
                                                                <div class="form-group">
                                                                    <label>Patient Address <span style="color:red"> *<span></label>
                                                                    <input type="text" class="form-control" data-toggle="input-mask"  value="{{ $item->patient_address}}" name="patient_address" id="patient_address"  placeholder="Patient Address" required>
                                                                    {{-- <span style="color:red;display: none" id="error_nurse_name">Name field is Required</span> --}}
                                        
                                                                    @error('patient_address')
                                                                        <div class="alert alert-danger" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </div>
                                                                    @enderror
                                        
                                                                </div>
                                        
                                                                <h5>Guardian Information</h5>
                                        
                                        
                                                                <div class="form-group">
                                                                    <label>Name <span style="color:red"> *<span></label>
                                                                    <input type="text" class="form-control" data-toggle="input-mask" value="{{ $item->patient_gurdian_name}}"  name="patient_gurdian_name" id="patient_gurdian_name"  placeholder="Patient Guardian Name" required>
                                                                    {{-- <span style="color:red;display: none" id="error_nurse_name">Name field is Required</span> --}}
                                        
                                                                    @error('patient_gurdian_name')
                                                                        <div class="alert alert-danger" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </div>
                                                                    @enderror
                                        
                                                                </div>
                                        
                                        
                                                                <div class="form-group">
                                                                    <label>Age <span style="color:red"> *<span></label>
                                                                    <input type="text" class="form-control" data-toggle="input-mask" value="{{ $item->patient_gurdian_age}}"  name="patient_gurdian_age" id="patient_gurdian_age"  placeholder="Patient Guardian Age" required>
                                                                    {{-- <span style="color:red;display: none" id="error_nurse_name">Name field is Required</span> --}}
                                        
                                                                    @error('patient_gurdian_age')
                                                                        <div class="alert alert-danger" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </div>
                                                                    @enderror
                                        
                                                                    </div>
                                        
                                        
                                                                    <div class="form-group">
                                                                        <label>Address <span style="color:red"> *<span></label>
                                                                        <input type="text" class="form-control" data-toggle="input-mask" value="{{ $item->patient_gurdian_address}}"  name="patient_gurdian_address" id="patient_gurdian_address"  placeholder="Patient Guardian Address" required>
                                                                        {{-- <span style="color:red;display: none" id="error_nurse_name">Name field is Required</span> --}}
                                            
                                                                        @error('patient_gurdian_address')
                                                                            <div class="alert alert-danger" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </div>
                                                                        @enderror
                                            
                                                                     </div>
                                        
                                                                     <div class="form-group">
                                                                        <label>NID <span style="color:red"> *<span></label>
                                                                        <input type="text" class="form-control" data-toggle="input-mask" value="{{ $item->patient_gurdian_nid}}"  name="patient_gurdian_nid" id="patient_gurdian_nid"  placeholder="Patient Guardian NID" required>
                                                                        {{-- <span style="color:red;display: none" id="error_nurse_name">Name field is Required</span> --}}
                                            
                                                                        @error('patient_gurdian_nid')
                                                                            <div class="alert alert-danger" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </div>
                                                                        @enderror
                                            
                                                                     </div>
                                        
                                        
                                                                     <div class="form-group">
                                                                        <label>Birth Certificate Number <span style="color:red"> *<span></label>
                                                                        <input type="text" class="form-control" data-toggle="input-mask"  value="{{ $item->patient_gurdian_boc}}"   name="patient_gurdian_boc" id="patient_gurdian_boc"  placeholder="Guardian Birth Certificate Number" >
                                                                        {{-- <span style="color:red;display: none" id="error_nurse_name">Name field is Required</span> --}}
                                            
                                                                        @error('patient_gurdian_boc')
                                                                            <div class="alert alert-danger" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </div>
                                                                        @enderror
                                            
                                                                     </div>
                                        
                                        
                                        
                                        
                                                                     <div class="form-group">
                                                                        <label>Passport Number <span style="color:red"> *<span></label>
                                                                        <input type="text" class="form-control" data-toggle="input-mask" value="{{ $item->patient_gurdian_passport}}"  name="patient_gurdian_passport" id="patient_gurdian_passport"  placeholder="Guardian Passport Number" >
                                                                        {{-- <span style="color:red;display: none" id="error_nurse_name">Name field is Required</span> --}}
                                            
                                                                        @error('patient_gurdian_passport')
                                                                            <div class="alert alert-danger" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </div>
                                                                        @enderror
                                            
                                                                     </div>
                                        
                                        
                                                                     <div class="form-group">
                                                                        <label>Mobile Number <span style="color:red"> *<span></label>
                                                                        <input type="text" class="form-control" data-toggle="input-mask" value="{{ $item->patient_gurdian_mobile}}"  name="patient_gurdian_mobile" id="patient_gurdian_mobile"  placeholder="Guardian Mobile Number" required>
                                                                        {{-- <span style="color:red;display: none" id="error_nurse_name">Name field is Required</span> --}}
                                            
                                                                        @error('patient_gurdian_mobile')
                                                                            <div class="alert alert-danger" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </div>
                                                                        @enderror
                                            
                                                                     </div>
                                        
                                        
                                                                     <div class="form-group">
                                                                        <label>Budget <span style="color:red"> *<span></label>
                                                                        <input type="text" class="form-control" data-toggle="input-mask"  value="{{ $item->total_budget}}"  name="total_budget" id="total_budget"  placeholder="Total Project Budget" required>
                                                                        {{-- <span style="color:red;display: none" id="error_nurse_name">Name field is Required</span> --}}
                                            
                                                                        @error('total_budget')
                                                                            <div class="alert alert-danger" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </div>
                                                                        @enderror
                                            
                                                                     </div>
                                        
                                        
                                                                     {{-- <div class="form-group">
                                                                        <label>Advance Payment <span style="color:red"> *<span></label>
                                                                        <input type="text" class="form-control" data-toggle="input-mask" value="{{ $item->advance_payment}}"  name="advance_payment" id="advance_payment"  placeholder="Advance Payment">
                                                                       
                                                                        @error('advance_payment')
                                                                            <div class="alert alert-danger" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </div>
                                                                        @enderror
                                            
                                                                     </div> --}}
                                        
                                        
                                        
                                                                     <div class="form-group">
                                                                        <label>Nurse Budget <span style="color:red"> *<span></label>
                                                                        <input type="text" class="form-control" data-toggle="input-mask"  value="{{ $item->nurse_budget}}"  name="nurse_budget" id="nurse_budget"  placeholder="Nurse Budget" required>
                                                                        {{-- <span style="color:red;display: none" id="error_nurse_name">Name field is Required</span> --}}
                                            
                                                                        @error('nurse_budget')
                                                                            <div class="alert alert-danger" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </div>
                                                                        @enderror
                                            
                                                                     </div>
                                        
                                        
                                                            </div>

                                                        <div class="modal-footer">
                                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                          <button type="submit" class="btn btn-primary">Update </button>
                                                        </div>
                                                        </form>
                                                    </div>

                                                </div>
                                                </div>
                                            </div>



                                            <a href="{{ route('nurse.history',$item->id) }}" class="btn btn-info">History</a>

                                        <button type="submit" onclick="Delete({{$item->id}})" class="btn btn-danger">  <span class="fe-check" title="Project Complete"></span>   </button>

                                            <form action="{{ route('patient.service.complete',$item->id) }} }}" id="action-form-{{$item->id}}" method="GET">

                                                    @csrf
                                                    @method('GET')

                                            </form>

                                    </td>
                                </tr>





                                @endforeach



                            </tbody>
                        </table>
                    </div>

                    <ul class="pagination pagination-rounded justify-content-end mb-0">
                        {{$datas->links()}}
                    </ul>

                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->

</div> <!-- container -->

@endsection


@push('js')

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>


<script>
    $(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>
  


    <script>
          function Delete(id){
                                                        Swal.fire({
                              title: 'Are you sure?',
                              text: "You won't be able to revert this!",
                              type: 'warning',
                              showCancelButton: true,
                              confirmButtonColor: '#3085d6',
                              cancelButtonColor: '#d33',
                              confirmButtonText: 'Yes, Complete it!'
                            }).then((result) => {
                              if (result.value) {

                                    event.preventDefault();
                                    document.getElementById('action-form-'+id).submit();
                              }
                            })


                    }

    </script>

@endpush
