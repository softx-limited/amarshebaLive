@extends('backend.app')
@section('title',"Net Profit Reports")
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
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Net Profit </a></li>
                         
                    </ol>
                </div>
                <h4 class="page-title">Net Profit Report </h4>
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
                           
                         
                         


                        </div>
                        <div class="col-sm-8">
                            

                        </div><!-- end col-->
                    </div>

                    <div class="table-responsive">
                        <div class="col-sm-8">
                            <h4>Search by date</h4>
                            <form action="{{ route('profit.report.date') }}" method="POST">
                                @csrf
                            <div class="row">  


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
                            </form>

                            <br>
                            <br>
                            <br>
                            <br>

                            <p>Details :</p>
                            <h4>Total Income : {{ $total_income }} Tk </h4>
                            <h4>Expense  : {{ $expense }} Tk</h4>
                            <h4>Discount  : {{ $discount_amount }} Tk </h4>
                            <h4>Salary Payment  : {{ $total_salary }} Tk </h4>
                            <hr>

                            @if($net_profit<0)
                            <h2>Net Loss : {{ abs($net_profit) }} Tk</h2>
                            @else
                            <h2>Net Profit : {{ $net_profit }} Tk</h2>
                            @endif
                            <p>Net profit= Total Income-(expense+discount+salary payment) </p>

                            
                        </div>
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
