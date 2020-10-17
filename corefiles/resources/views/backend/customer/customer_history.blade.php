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
                        <li class="breadcrumb-item"><a href="javascript: void(0);">History</a></li>
                    </ol>
                </div>
                <h4 class="page-title">Accounts History</h4>
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
                            <i class="mdi mdi-plus-circle mr-1"></i>Add Payment
                          </button>


                          <!-- Add Customer Modal -->
            <div class="modal fade" id="addClient" tabindex="-1" role="dialog" aria-labelledby="addClient" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="addClient">Payment Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                <form action="{{route('due.payment')}}" method="post" enctype="multipart/form-data">

                        @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Pay Amount<span style="color:red"> *<span></label>
                            <input type="text" class="form-control" data-toggle="input-mask" name="pay_amount" id="pay_amount"  placeholder="Payment Amount" required>
                            <input type="hidden" name="customer_id"  value="{{ $customer_id }}"/>
                            {{-- <span style="color:red;display: none" id="error_nurse_name">Name field is Required</span> --}}

                            @error('pay_amount')
                                <div class="alert alert-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror

                        </div>

                        <div class="form-group">
                            <label>Payment Method <span style="color:red"> *<span></label>
                                <select  name="pay_method"  class="text-left border form-control" required>

                                    <option value="">Select Method </option>
     
                                     @foreach ($accounts as $item)
                                     <option value="{{ $item->id }}">{{ $item->account_name }} </option>
                                     @endforeach
     
                                </select>

                            {{-- <span style="color:red;display: none" id="error_nurse_name">Name field is Required</span> --}}

                            @error('customer_mobile')
                                <div class="alert alert-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror

                        </div>

 
  

                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Payment </button>
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
                                    <th>Invoice No</th>
                                    <th>Due</th>
                                    <th>Payment</th>
                                    <th>Total Due</th>

                                </tr>
                            </thead>
                            <tbody>

                                @php 
                                     $remaingDue=0

                                @endphp

                                @foreach ($datas as $key=>$item)

                                        @php 
                                                   $remaingDue+=$item->credit_amount-$item->debit_amount;
                                        @endphp

                                        
                                <tr>

                                    <td>{{$key+1}}</td>
                                    <td>{{$item->date}}</td>
                                    <td>{{$item->invoice_no}}</td>
                                    <td>{{($item->credit_amount>0)?$item->credit_amount:''}}</td>   
                                    <td>{{($item->debit_amount>0)?$item->debit_amount:''}}</td>                                                                     
                                    <td>{{$remaingDue}}</td>


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
  
@endpush
