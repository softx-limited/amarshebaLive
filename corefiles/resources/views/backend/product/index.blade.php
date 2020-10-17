@extends('backend.app')
@section('title',"All Product information")
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
                                            <li class="breadcrumb-item active">Product</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Product List</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                      
                        <!-- end row-->
                        <div class="col-12">
                            <div class="card-box">
                                <div class="row">
                                                                           
                                        <div class="text-lg-right mt-3 mt-lg-0">
                                            
                                            <a href="{{route('product.create')}}" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-plus-circle mr-1"></i> Add New</a>
                                        </div>                                           
                                                                          
                                </div> <!-- end row -->
                            </div> <!-- end card-box -->
                        </div> <!-- end col-->

                        <div class="row">
                          
                            
                           
                            @foreach ($datas as $item)

                            {{-- /Stock Calculation/ --}}


                            @php 
                                            $totalStock=App\Model\Stock::where('product_id', $item->id)->sum('product_in_qty');
                                            $totalSale=App\Model\Stock::where('product_id', $item->id)->sum('product_out_qty');
                                            $availQty=$totalStock-$totalSale;
                            @endphp
                                
                           
                            <div class="col-md-6 col-xl-3">
                                <div class="card-box product-box">
                                    
                                    <div class="product-action">
                                        <a href="{{route('product.edit',$item->id)}}" class="btn btn-success btn-xs waves-effect waves-light"><i class="mdi mdi-pencil"></i></a>
             
                                        
                                        <button type="submit" onclick="Delete({{$item->id}})" class="btn btn-danger btn-xs waves-effect waves-light"><i class="mdi mdi-close"></i> </button>

                                        <form action="{{route('product.destroy',$item->id)}}" method="POST" id="action-form-{{$item->id}}"> 

                                                @csrf
                                                @method('delete')

                                        </form>

                                    </div>

                                    <div class="bg-light">
                                        <img src="{{asset('product/'.$item->photo)}}" alt="product-pic" class="img-fluid" />
                                    </div>

                                    <div class="product-info">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h5 class="font-16 mt-0 sp-line-1">{{$item->product_name}}</h5>
                                               
                                                <h5 class="m-0"> <span class="text-muted"> Stocks : {{$availQty}} pcs</span></h5>
                                            </div>
                                            <div class="col-auto">
                                                <div class="product-price-tag">
                                                    {{$item->sales_price}} Tk
                                                </div>
                                            </div>
                                        </div> <!-- end row -->
                                    </div> <!-- end product info-->
                                </div> <!-- end card-box-->
                            </div> <!-- end col-->

                            @endforeach
                        </div>
                        <!-- end row-->

                        <div class="row">
                            <div class="col-12">
                                <ul class="pagination pagination-rounded justify-content-end mb-3">
                                    <li class="page-item">
                                        {{$datas->links()}}
                                    </li>
                                    
                                </ul>
                            </div> <!-- end col-->
                        </div>
                        <!-- end row-->
                        
                   
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
