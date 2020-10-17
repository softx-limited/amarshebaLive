@extends('backend.app')
@section('title',"Assign Nurse to Patient")
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
                        <li class="breadcrumb-item active">Nurse Assign</li>
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

                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModelInfo_{{$item->id}}">

                                        Assing Nurse
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
                                                        <form action="{{ route('patient.nurse.update',$item->id) }}" method="post">
                                                            @method('PUT')
                                                            @csrf
                                                             
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label>Patient Name <span style="color:red"> *<span></label>
                                                                    <input type="text" class="form-control" data-toggle="input-mask" value="{{ $item->patient_name}}" name="patient_name" id="Patient_name"  placeholder="Patient Name" required>
                                                                    
                                        
                                                                   
                                                                    @error('patient_name')
                                                                        <div class="alert alert-danger" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </div>
                                                                    @enderror
                                        
                                                                </div>
                                        
                                        
                                                                <div class="form-group">
                                                                    <label>Nurse <span style="color:red">*<span></label>
                                                                        <select class="form-control" name="assigned_nurse"  id="assigned_nurse" required>
                                                                            <option value="">Select Nurse</option>
                                                                            @foreach ($nurses as $items)
                                                                            
                                                                            <option value="{{$items->id  }}"    {{($items->id==$item->assign_nurse_id)?'selected':''}}>{{ $items->name }}</option>                                                                        
                                                                            @endforeach
                                                                           
                                                                        </select>
                                                                          
                                                                    @error('assigned_nurse')
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

                                        <button type="submit" onclick="Delete({{$item->id}})" class="btn btn-danger">  <span class="fe-check" title="Present"></span> Attendance  </button>

                                            <form action="{{ route('nurse.attendance',$item->id) }}" id="action-form-{{$item->id}}" method="POST">

                                                    @csrf
                                                   
                                                    <input type="hidden" name="nurse_id" value="{{ $item->assign_nurse_id }}">

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
                              confirmButtonText: 'Yes, Take Attendance!'
                            }).then((result) => {
                              if (result.value) {

                                    event.preventDefault();
                                    document.getElementById('action-form-'+id).submit();
                              }
                            })


                    }

    </script>

@endpush
