@extends('backend.app')
@section('title',"All Expense Reports")
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
                        <li class="breadcrumb-item"><a href="javascript: void(0);">All Expense </a></li>
                        <li class="breadcrumb-item active">History</li>
                    </ol>
                </div>
                <h4 class="page-title">Expense Report List</h4>
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
                          <p>Expense: {{ $total_expense }}    @if($total_salary)  + Salary: {{ $total_salary }} @endif  @if($discount_amount) + Discount: {{ $discount_amount }}   @endif  <h2>Total Expense:{{ ($total_expense +$discount_amount+$total_salary) }} </h2></p>
                         
                         


                        </div>
                        <div class="col-sm-8">

                            <form action="{{ route('expense.report.category') }}" method="POST">
                                @csrf
                            <div class="row">
                                
                                <div class="col">
                                    
                                        <select  name="expense_category"  class="text-left border form-control" required>

                                            <option value="">Select Category </option>
             
                                             @foreach ($categories as $item)
                                             <option value="{{ $item->id }}">{{ $item->category_name }} </option>
                                             @endforeach
                                             <option value="salaries">Salary </option>
                                             <option value="allcategories">All Categories </option>
                                             
             
                                        </select>
                                    
                                   
                                </div>
                                <div class="col">
                                  <input type="date" class="form-control" placeholder="start_date" name='start_date' required>
                                </div>
                                <div class="col">
                                    <input type="date" class="form-control" placeholder="End Date" name="end_date" required>
                                  </div>
                                  <div class="col">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                  </div>
                              </div>

                            
                        </div>
                    </form>

                        </div><!-- end col-->
                    </div>

                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap table-striped" id="table_id">
                            <thead>
                                <tr>
                                    <th>SL NO</th>
                                    <th>Date</th>
                                    <th>Month</th>
                                    <th>Category</th>
                                    <th>Amount</th>
                                    <th>Notation </th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($datas as $key=>$item)


                                <tr>
                                    <td>
                                       {{$key+1}}
                                    </td>

                                    <td>
                                        {{ $item->date }}                                       

                                    </td>

                                    <td>
                                        {{ $item->month}}                                       

                                    </td>

                                   


                                    <td>
                                        
                                        {{ $item->category_name }} 

                                    </td>

                                    <td>
                                        {{$item->expense_amount ??''}}


                                    </td>
                                    <td>
                                        {{$item->expense_notation ??''}}


                                    </td>

                                </tr>





                                @endforeach


                                @foreach ($salaries as $key=>$item)


                                <tr>
                                    <td>
                                       {{$key+1}}
                                    </td>

                                    <td>
                                        {{ $item->date }}                                       

                                    </td>

                                    <td>
                                        {{ $item->month}}                                       

                                    </td>

                                   


                                    <td>
                                        
                                     
                                            Salary Payment

                                    </td>

                                    <td>
                                        {{$item->salary ??''}}


                                    </td>
                                    <td>
                                         ""


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
