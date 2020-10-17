@extends('backend.app')
@section('title',"All Invoice Lists")
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
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Invoice</a></li> 
                    </ol>
                </div>
                <h4 class="page-title">Invoice List</h4>
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

                        <a href="{{route('sale.create')}} " class="btn btn-danger waves-effect waves-light"> <i class="mdi mdi-plus-circle mr-1"></i>Sale Product </a>
{{-- 
                        <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#addClient">
                            <i class="mdi mdi-plus-circle mr-1"></i>Add Invoice
                        </a> --}}


                          <!-- Add Customer Modal -->
            


                        </div>
                        <div class="col-sm-8">

                        </div><!-- end col-->
                    </div>

                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap table-striped" id="products-datatable">
                            <thead>
                                <tr>
                                    <th>SL NO</th>
                                    <th>Date</th>
                                    <th>Customer Name</th>
                                    <th>Total</th>
                                    <th>Payment</th>
                                    <th>Due</th>
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
                                        {{ $item->date }}

                                    </td>

                                    <td>
                                        {{$item->customer_name ??''}}
                                    </td>


                                    <td>
                                        {{($item->total_amount-$item->discount_amount) ??''}}


                                    </td>
                                    <td>
                                        {{$item->payment ??''}}


                                    </td>

                                    <td>
                                        {{$item->due ??''}}


                                    </td>



                                    <td>
                                  

                                        <a href="{{route('customer.invoice',$item->invoice_no)}} " class="btn btn-primary waves-effect waves-light"> <i class="mdi mdi-plus-circle mr-1"></i>View Invoice </a>


                                        

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

   
@endpush
