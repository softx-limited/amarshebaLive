@extends('backend.app')
@section('title',"Call Service List")
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
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Call Service List</a></li> 
                    </ol>
                </div>
                <h4 class="page-title">Call Service List</h4>
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

                        {{-- <a href=" " class="btn btn-danger waves-effect waves-light"> <i class="mdi mdi-plus-circle mr-1"></i>Add Client </a> --}}

                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addClient">
                            <i class="mdi mdi-plus-circle mr-1"></i>Add Service
                          </button>


                          <!-- Add Customer Modal -->
            <div class="modal fade" id="addClient" tabindex="-1" role="dialog" aria-labelledby="addClient" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="addClient">Service Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                <form action="{{route('call.service.store')}}" method="post">
                        
                    @csrf

                    <div class="modal-body">

                        
                        <div class="form-group">
                            <label>Client Name <span style="color:red"> *<span></label>
                                <input type="text" name="client_Name" id="client_Name" value=""  class="text-left border form-control" required>

                            @error('client_Name')
                                <div class="alert alert-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror

                        </div>


                        <div class="form-group">
                            <label>Address <span style="color:red"> *<span></label>
                                <input type="text" name="address" id="address" value=""  class="text-left border form-control" required>

                            @error('address')
                                <div class="alert alert-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror

                        </div>




                          
                        <div class="form-group">
                            <label>Designation <span style="color:red"> *<span></label>
                                <input type="text" name="designation" id="designation" value=""  class="text-left border form-control" required>

                            @error('designation')
                                <div class="alert alert-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror

                        </div>


                         



                        <div class="form-group">
                            <label>Nurse <span style="color:red">*<span></label>
                                <select class="form-control" name="nurse_id"  id="assigned_nurse" required>
                                    <option value="">Select Nurse</option>
                                    @foreach ($nurses as $items)
                                    
                                    <option value="{{$items->id  }}">{{ $items->name }}</option>                                                                        
                                    @endforeach
                                   
                                </select>
                                  
                            @error('nurse_id')
                                <div class="alert alert-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror

                        </div>


                        <div class="form-group">
                            <label>Nurse Budget <span style="color:red">*<span></label>
                                <input type="text" name="nurse_budget" id="nurse_budget" value=""  class="text-left border form-control" required>       
                                  
                            @error('nurse_budget')
                                <div class="alert alert-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror

                        </div>





                        <div class="form-group">
                            <label>Notation <span style="color:red"> *<span></label>
                                <input type="text" name="notation" id="notation" value=""  class="text-left border form-control">

                            @error('notation')
                                <div class="alert alert-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror

                        </div>

                        
                        <div class="form-group">
                            <label>Amount <span style="color:red"> *<span></label>
                                <input type="text" name="amount" id="amount" value=""  class="text-left border form-control" required>

                            @error('amount')
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
                                    <th>Date</th>
                                    <th>Client Name</th>
                                    <th>Address</th>
                                    <th>Amount</th>
                                    <th>Nurse Name</th>
                                    <th>Designation</th>
                                    <th>Payment Method</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($datas as $key=>$item)


                                <tr>
                                    <td>
                                       {{$key+1}}
                                    </td>

                                    <td>
                                        {{$item->date ??''}}
                                    </td>

                                    <td>
                                        {{$item->client_name??''}}
                                    </td>

                                    <td>
                                        {{$item->address ??''}}
                                    </td>

                                    
                                    <td>
                                        {{$item->amount ??''}}
                                    </td>

                                    <td>
                                        {{$item->nurse_name ??''}}
                                    </td>

                                    <td>
                                        {{$item->designation ??''}}
                                    </td>
                                    <td>
                                        {{$item->method_name ??''}}
                                    </td>
                                    <td>
                                        {{$item->notation ??''}}
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
