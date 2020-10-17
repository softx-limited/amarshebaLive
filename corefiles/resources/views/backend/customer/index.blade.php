@extends('backend.app')
@section('title',"All Customer's information")
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
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Client</a></li>
                        <li class="breadcrumb-item active">Client</li>
                    </ol>
                </div>
                <h4 class="page-title">Client List</h4>
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
                            <i class="mdi mdi-plus-circle mr-1"></i>Add Client
                          </button>


                          <!-- Add Customer Modal -->
            <div class="modal fade" id="addClient" tabindex="-1" role="dialog" aria-labelledby="addClient" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="addClient">Client Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                <form action="{{route('customer.store')}}" method="post" enctype="multipart/form-data">

                        @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Client Name <span style="color:red"> *<span></label>
                            <input type="text" class="form-control" data-toggle="input-mask" name="customer_name" id="customer_name"  placeholder="Customer Name" required>
                            {{-- <span style="color:red;display: none" id="error_nurse_name">Name field is Required</span> --}}

                            @error('customer_name')
                                <div class="alert alert-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror

                        </div>

                        <div class="form-group">
                            <label>Client Mobile <span style="color:red"> *<span></label>
                            <input type="text" class="form-control" data-toggle="input-mask" name="customer_mobile" id="customer_mobile"  placeholder="Customer Mobile" required>
                            {{-- <span style="color:red;display: none" id="error_nurse_name">Name field is Required</span> --}}

                            @error('customer_mobile')
                                <div class="alert alert-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror

                        </div>




                        <div class="form-group">
                            <label>Client Email <span style="color:red"> *<span></label>
                            <input type="text" class="form-control" data-toggle="input-mask" name="customer_email" id="customer_email"  placeholder="Customer Email" required>
                            {{-- <span style="color:red;display: none" id="error_nurse_name">Name field is Required</span> --}}

                            @error('customer_email')
                                <div class="alert alert-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror

                        </div>



                        <div class="form-group">
                            <label>Client Address <span style="color:red"> *<span></label>
                            <input type="text" class="form-control" data-toggle="input-mask" name="customer_address" id="customer_address"  placeholder="Customer Address" required>
                            {{-- <span style="color:red;display: none" id="error_nurse_name">Name field is Required</span> --}}

                            @error('customer_address')
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
                                    <th>Customer Name</th>
                                    <th>Customer Email</th>
                                    <th>Customer Mobile</th>
                                    <th>Customer Address</th>
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
                                        {{ $item->customer_name }}

                                    </td>

                                    <td>
                                        {{$item->customer_email ??''}}
                                    </td>


                                    <td>
                                        {{$item->customer_mobile ??''}}


                                    </td>

                                    <td>
                                        {{$item->customer_address ??''}}


                                    </td>



                                    <td>
                                    <a href="{{ route('account.details',$item->id) }}" class="btn btn-warning" href=" " class="action-icon"> <span>Accounts</span> </a>




                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModelInfo_{{$item->id}}">

                                        Edit
                                      </button>

                                      <!-- Modal -->
                                            <div class="modal fade" id="editModelInfo_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="editModelInfo_{{$item->id}}" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Client's information</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{route('customer.update',$item->id)}}" method="post" enctype="multipart/form-data">
                                                            @method('PUT')
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label>Customer Name <span style="color:red"> *<span></label>
                                                                    <input type="text" class="form-control" data-toggle="input-mask" value=" {{ $item->customer_name }}" name="customer_name" id="customer_name"  placeholder="Customer Name" required>
                                                                    {{-- <span style="color:red;display: none" id="error_nurse_name">Name field is Required</span> --}}

                                                                    @error('customer_name')
                                                                        <div class="alert alert-danger" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </div>
                                                                    @enderror

                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Customer Mobile <span style="color:red"> *<span></label>
                                                                    <input type="text" class="form-control" data-toggle="input-mask" value=" {{$item->customer_email ??''}}" name="customer_mobile" id="customer_mobile"  placeholder="Customer Mobile" required>
                                                                    {{-- <span style="color:red;display: none" id="error_nurse_name">Name field is Required</span> --}}

                                                                    @error('customer_mobile')
                                                                        <div class="alert alert-danger" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </div>
                                                                    @enderror

                                                                </div>




                                                                <div class="form-group">
                                                                    <label>Customer Email <span style="color:red"> *<span></label>
                                                                    <input type="text" class="form-control" data-toggle="input-mask" value=" {{$item->customer_mobile ??''}}" name="customer_email" id="customer_email"  placeholder="Customer Email" required>
                                                                    {{-- <span style="color:red;display: none" id="error_nurse_name">Name field is Required</span> --}}

                                                                    @error('customer_email')
                                                                        <div class="alert alert-danger" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </div>
                                                                    @enderror

                                                                </div>



                                                                <div class="form-group">
                                                                    <label>Customer Address <span style="color:red"> *<span></label>
                                                                    <input type="text" class="form-control" data-toggle="input-mask" value=" {{$item->customer_address ??''}}" name="customer_address" id="customer_address"  placeholder="Customer Address" required>
                                                                    {{-- <span style="color:red;display: none" id="error_nurse_name">Name field is Required</span> --}}

                                                                    @error('customer_address')
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





                                        <button type="submit" onclick="Delete({{$item->id}})" class="btn btn-danger"> <i class="mdi mdi-delete"><span></span></i>  </button>

                                            <form action="{{route('customer.destroy',$item->id)}}" method="POST" id="action-form-{{$item->id}}">

                                                    @csrf
                                                    @method('delete')

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
