
@extends('backend.app')
@section('title',"Customer  Invoice")
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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Invoice</a></li>
                                            <li class="breadcrumb-item active">Invoice</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Invoice</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <!-- Logo & title -->
                                    <div class="clearfix">
                                        <div class="float-left">
                                            <div class="auth-logo">
                                                <div class="logo logo-dark">
                                                    <span class="logo-lg">
                                                        <img src="{{ asset('website/'.$site_info->logo) }}" alt="" height="22">
                                                    </span>
                                                </div>
                            
                                                <div class="logo logo-light">
                                                    <span class="logo-lg">
                                                        <img src="{{asset('backend/assets/images/logo-light.png')}}" alt="" height="22">
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                      
                                    </div>
        
        
                                    <div class="row mt-3">
                                        <div class="col-sm-4">
                                            <h6>Billing Address</h6>
                                            <address>
                                                {{ $site_info->org_name }}<br>
                                                {{ $site_info->address }}<br> 
                                                <abbr title="Mobile">Mobile: {{ $site_info->mobile_no }}</abbr>  <br>
                                                <abbr title="Phone">Phone: {{ $site_info->telephone_no }}</abbr> 
                                            </address>
                                        </div> <!-- end col -->
        
                                            
                                        <div class="col-sm-4">
                                            <h6>Shipping Address</h6>
                                            <address>

                                                {{ $data->customer->customer_name }}<br>
                                                {{ $data->customer->customer_address }}
                                                <br>
                                                <abbr title="Mobile">Mobile:</abbr>  {{ $data->customer->customer_mobile }}
                                            </address>
                                        </div> <!-- end col -->

                                        <div class="col-sm-4">
                                            <h6>Invoice Info</h6>
                                            <address>
                                                Date:  {{ $data->date}}<br>
                                                Invoice No: {{ $data->invoice_no}}<br>
                                               
                                            </address>
                                        </div> <!-- end col -->

                                    </div> 
                                    <div class="col-sm-412">
                                        <h6>Dear sir/Madam,</h6>
                                        <address>
                                            Thanks for giving us the opportunity to serve you. We always hope and pray you and your family stay safe and healthy. Your satisfication and suggestion will help us to improve the quality of our service.
                                           
                                        </address>
                                    </div>
                                    <!-- end row -->


                                
        
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="table-responsive">
                                                <table class="table mt-4 table-centered">
                                                    <thead>
                                                    <tr><th>#</th>
                                                        <th>Product Name</th>
                                                        <th style="">Qy</th>
                                                        <th style="">Price</th>
                                                        <th style="" class="text-right">Total</th>
                                                    </tr></thead>
                                                    <tbody>

                                                        @if(count($data->products)>0)
                                                        @foreach ($data->products as  $key=>$item)

                                                        <tr>
                                                            <td>{{ ++$key }}</td>
                                                            <td>
                                                                {{ $item->product_name ?? '' }}                                                              
                                                            </td>
                                                            <td>{{ $item->product_qty??'' }}</td>
                                                            <td>{{ $item->product_price??'' }}</td>
                                                            <td class="text-right">{{ $item->total??'' }}</td>
                                                        </tr>
                                                            
                                                        @endforeach
                                                        @endif
        
                                                    </tbody>
                                                </table>
                                            </div> <!-- end table-responsive -->
                                        </div> <!-- end col -->
                                    </div>
                                    <!-- end row -->
        
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="clearfix pt-5">
                                                 
        
                                                
                                            </div>
                                        </div> <!-- end col -->
                                        <div class="col-sm-6">
                                            <div class="float-right">
                                                <p><b>Sub-total:</b> <span class="float-right"> {{ $data->total_amount??''}}</span></p>
                                                <p><b>Discount:</b> <span class="float-right"> &nbsp;&nbsp;&nbsp; - {{$data->discount_amount??''}}</span></p>
                                                <h3>Total: {{ $data->total_amount-$data->discount_amount }}</h3>
                                                <h4>Pay: {{ $data->payment??'' }}</h4>
                                                <h4>Due: {{ $data->total_amount-($data->payment+$data->discount_amount) }}</h4>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div> <!-- end col -->
                                    </div>
                                    <!-- end row -->
        
                                    <div class="mt-4 mb-1">
                                        <div class="text-right d-print-none">
                                            <a href="javascript:window.print()" class="btn btn-primary waves-effect waves-light"><i class="mdi mdi-printer mr-1"></i> Print</a>
                                           
                                        </div>
                                    </div>
                                </div> <!-- end card-box -->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row --> 
                        
                    </div> <!-- container -->
@endsection


@push('js')



@endpush

