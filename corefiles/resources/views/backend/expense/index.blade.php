@extends('backend.app')
@section('title',"Expense List")
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
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Expense</a></li> 
                    </ol>
                </div>
                <h4 class="page-title">Expense List</h4>
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
                            <i class="mdi mdi-plus-circle mr-1"></i>Add Expense
                          </button>


                          <!-- Add Customer Modal -->
            <div class="modal fade" id="addClient" tabindex="-1" role="dialog" aria-labelledby="addClient" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="addClient">Expense Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                <form action="{{route('expense.store')}}" method="post">
                        
                    @csrf

                    <div class="modal-body">
                        <div class="form-group">
                            <label>Expense Category <span style="color:red"> *<span></label>
                        <select  name="expense_category"  class="text-left border form-control" required>

                                    <option value="">Select Category </option>
     
                                     @foreach ($categories as $item)
                                     <option value="{{ $item->id }}">{{ $item->category_name }} </option>
                                     @endforeach
     
                                </select>

                            @error('expense_category')
                                <div class="alert alert-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror

                        </div>

                        <div class="form-group">
                            <label>Expense Amount <span style="color:red"> *<span></label>
                                <input type="text" name="expense_amount" id="expense_amount" value=""  class="text-left border form-control" required>

                            @error('expense_amount')
                                <div class="alert alert-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror

                        </div>


                        <div class="form-group">
                            <label>Expense Notation <span style="color:red"> *<span></label>
                                <input type="text" name="expense_notation" id="expense_notation" value=""  class="text-left border form-control">

                            @error('expense_notation')
                                <div class="alert alert-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror

                        </div>

                        <div class="form-group">
                            <label>Expense Method <span style="color:red"> *<span></label>
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
                                    <th>Category Name</th>
                                    <th>Amount</th>
                                    <th>Expense. Method</th>
                                    <th>Action</th>
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
                                        {{$item->category_name ??''}}
                                    </td>

                                    <td>
                                        {{$item->expense_amount ??''}}
                                    </td>

                                    <td>
                                        {{$item->account_name ??''}}
                                    </td>

                                    <td>                                   

                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModelInfo_{{$item->id}}">

                                        Edit
                                      </button>

                                      <!-- Modal -->
                                            <div class="modal fade" id="editModelInfo_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="editModelInfo_{{$item->id}}" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Expense's information</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{route('expense.update',$item->id)}}" method="post" >
                                                            @method('PUT')
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label>Expense Category <span style="color:red"> *<span></label>
                                                                <select  name="expense_category"  class="text-left border form-control" required>
                                        
                                                                            <option value="">Select Category </option>
                                             
                                                                             @foreach ($categories as $items)
                                                                             <option value="{{ $items->id }}" {{ ($items->id==$item->category_id)?'selected':'' }}>{{ $items->category_name }} </option>
                                                                             @endforeach
                                             
                                                                        </select>
                                        
                                                                    @error('expense_category')
                                                                        <div class="alert alert-danger" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </div>
                                                                    @enderror
                                        
                                                                </div>
                                        
                                                                <div class="form-group">
                                                                    <label>Expense Amount <span style="color:red"> *<span></label>
                                                                        <input type="text" name="expense_amount" id="expense_amount" value="{{ $item->expense_amount }}"  class="text-left border form-control" required>
                                        
                                                                    @error('expense_amount')
                                                                        <div class="alert alert-danger" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </div>
                                                                    @enderror
                                        
                                                                </div>
                                        
                                        
                                                                <div class="form-group">
                                                                    <label>Expense Notation <span style="color:red"> *<span></label>
                                                                        <input type="text" name="expense_notation" id="expense_notation" value="{{ $item->expense_notation }}"  class="text-left border form-control">
                                        
                                                                    @error('expense_notation')
                                                                        <div class="alert alert-danger" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </div>
                                                                    @enderror
                                        
                                                                </div>
                                        
                                                                <div class="form-group">
                                                                    <label>Expense Method <span style="color:red"> *<span></label>
                                                                        <select  name="account_name"  class="text-left border form-control" required>
                                        
                                                                            <option value="">Select Method </option>   
                                        
                                                                             @foreach ($accounts as $items)
                                                                             <option value="{{ $items->id }}" {{ ($items->id==$item->account_id)?'selected':'' }}>{{ $items->account_name }} </option>
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
                                                          <button type="submit" class="btn btn-primary">Update </button>
                                                        </div>
                                                        </form>
                                                    </div>

                                                </div>
                                                </div>
                                            </div>





                                        <button type="submit" onclick="Delete({{$item->id}})" class="btn btn-danger"> <i class="mdi mdi-delete"><span></span></i>  </button>

                                            <form action="{{route('expense.delete',$item->id)}}" method="POST" id="action-form-{{$item->id}}">

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
