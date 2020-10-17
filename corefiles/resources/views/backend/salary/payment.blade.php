@extends('backend.app')
@section('title',"All Nurse information")
@push('css')

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
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Nurse</a></li>
                        <li class="breadcrumb-item active">Payment</li>
                    </ol>
                </div>
                <h4 class="page-title">Nurse</h4>
            </div>
        </div>
    </div>     
    <!-- end page title --> 


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    

                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap table-striped" id="products-datatable">
                            <thead>
                                <tr>
                                    <th style="width: 20px;">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1">&nbsp;</label>
                                        </div>
                                    </th>
                                    <th>Name</th>
                                    <th>Mobile</th>
                                    <th>Salary</th>
                                    <th>Current Month working Days</th>
                                    <th>Previous Month working Days</th>
                                  
                                    <th style="width: 85px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($datas as $item)


                                    @php 
                                                  $Currentmonth=date('F-Y');
                                                $lastMonth=date('F-Y', strtotime('last month'));
                                                

                                                $currentMonthWorkingDays=\App\Model\NurseHistory::where(['month'=>$Currentmonth,'nurse_id'=>$item->id])->get();
                                                $LastMonthWorkingDays=\App\Model\NurseHistory::where(['month'=>$lastMonth,'nurse_id'=>$item->id])->get();

                                    @endphp
                                <tr>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck2">
                                            <label class="custom-control-label" for="customCheck2">&nbsp;</label>
                                        </div>
                                    </td>
                                    <td class="table-user">
                                        <img src="{{asset('nurse/'.$item->photo)}}" alt="table-user" class="mr-2 rounded-circle">
                                        <a href="javascript:void(0);" class="text-body font-weight-semibold">{{$item->name ??''}}</a>
                                    </td>
                                    <td>
                                        {{$item->mobile ??''}}
                                    </td>
                                    <td>
                                        {{$item->salary ??''}} BDT
                                    </td>
                                    
                                    <td>
                                        {{count( $currentMonthWorkingDays)??0}}
                                    </td>
                                    <td>
                                        {{count( $LastMonthWorkingDays)??0}}
                                       
                                    </td>

                                    <td>
                                        
                                    

                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal_{{ $item->id }}">
                                        Payment
                                     </button>

                                     <div class="modal fade" id="exampleModal_{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Select Month and Year</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('nurse.slary.payment') }} " method="POST" >
                                                    @csrf
                                                    <input type="hidden" name="nurse_id" value="{{ $item->id }}">
                                                <div class="form-group">
                                                    <label>Month <span style="color:red">*<span></label>
                                                    <select class="form-control" name="month"  id="month" required>
                                                        <option value="">Select Month</option>    
                                                        
                                                      
                                                           
                                                      @for ($i = 0; $i < 12; ++$i) 

                                                          
                                                        <option value="{{ date("F", strtotime("January +$i months")) }}">{{date("F", strtotime("January +$i months")) }}</option>
                                                            
                                                        @endfor
                                                       

                                                        
                                                    </select>
                
                                                    <span style="color:red;display: none" id="error_nurse_gender">Gender field is Required</span>
                
                                                    @error('month')
                                                    <div class="alert alert-danger" role="alert">
                                                      <strong>{{ $message }}</strong>
                                                   </div>
                                                    @enderror
                
                
                                                </div>


                                                <div class="form-group">
                                                    <label>Year <span style="color:red">*<span></label>
                                                    <select class="form-control" name="year"  id="year" required>
                                                        <option value="">Select Year</option>    
                                                        
                                                      
                                                           
                                                      @for ($i =2020; $i < 2050; ++$i) 

                                                          
                                                        <option value="{{ $i }}"> {{ $i }}</option>
                                                            
                                                        @endfor
                                                       

                                                        
                                                    </select>
                
                                                    <span style="color:red;display: none" id="error_nurse_gender">Gender field is Required</span>
                
                                                    @error('year')
                                                    <div class="alert alert-danger" role="alert">
                                                      <strong>{{ $message }}</strong>
                                                   </div>
                                                    @enderror
                
                
                                                </div>

                                                <div class="form-group">
                                                    <label>Payment Method <span style="color:red"> *<span></label>
                                                        <select  name="account_name"  class="text-left border form-control" required>
                        
                                                            <option value="">Select Method </option>   
                        
                                                             @foreach ($accounts as $item)
                                                             <option value="{{ $item->id }}">{{ $item->account_name }} </option>
                                                             @endforeach
                             
                                                        </select>
                        
                                                    @error('account_name')
                                                        <div class="alert alert-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </div>
                                                    @enderror
                        
                                                </div>   
                                                
                                                <div class="form-group">
                                                    <label>Amount <span style="color:red"> *<span></label>
                                                        <input type="text" class="text-left border form-control" name="amount" required/>
                        
                                                    @error('amount')
                                                        <div class="alert alert-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </div>
                                                    @enderror
                        
                                                </div>  
                        


                                              
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                              <button type="submit" class="btn btn-primary">Payment</button>
                                            </div>
                                        </form>
                                          </div>
                                        </div>
                                      </div>

                                       

                                        {{-- <button type="submit" onclick="Delete({{$item->id}})" class="btn btn-danger"> <i class="mdi mdi-delete"><span></span></i>  </button> --}}

                                            <form action="{{route('nurse.destroy',$item->id)}}" method="POST" id="action-form-{{$item->id}}"> 

                                                    @csrf
                                                    @method('delete')

                                            </form>

                                    </td>
                                </tr>

                                    
                                @endforeach
                               
                               
                               
                            </tbody>
                        </table>
                    </div>

                    

                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->
    
</div> <!-- container -->

@endsection


@push('js')

    <script>
          function Delete(id){
                                                        Swal.fire({
                              title: 'Are you sure?',
                              text: "You won't be able to revert this!",
                              type: 'warning',
                              showCancelButton: true,
                              confirmButtonColor: '#3085d6',
                              cancelButtonColor: '#d33',
                              confirmButtonText: 'Yes, delete it!'
                            }).then((result) => {
                              if (result.value) {
                                    
                                    event.preventDefault();
                                    document.getElementById('action-form-'+id).submit();
                              }
                            })
                                                            
                      
                    }

    </script>

@endpush
