@extends('backend.app')
@section('title',"Edit Product")
@push('css')

   <!-- Plugins css-->
        <link href="{{asset('backend/assets/libs/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('backend/assets/libs/summernote/summernote-bs4.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('backend/assets/libs/dropzone/min/dropzone.min.css')}}" rel="stylesheet" type="text/css" />
        
        
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
                                    <h4 class="page-title">Edit Product</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card-box">
                                    <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">Product Information</h5>
                                <form action="{{route('product.update',$product->id)}}" enctype="multipart/form-data" method="post">
                                    @csrf

                                   @method("PUT")
                                    <div class="form-group mb-3">
                                        <label for="product-name">Product Name <span class="text-danger">*</span></label>
                                    <input type="text" id="product-name" value="{{$product->product_name}}" class="form-control" name="product_name" placeholder="Product Name" required>

                                        @error('product_name')
                                        <div class="alert alert-danger" role="alert">
                                          <strong>{{ $message }}</strong>
                                       </div>
                                        @enderror

                                    </div> 


                                    <div class="form-group mb-3">
                                        <label for="product-name">Product Image  <span class="text-danger">(200X200)PX</span> <span class="text-danger">*</span></label>
                                        <input type="file" id="product-image" class="form-control" name="photo" >

                                        @error('photo')
                                        <div class="alert alert-danger" role="alert">
                                          <strong>{{ $message }}</strong>
                                       </div>
                                        @enderror

                                    </div> 


                                    <div class="form-group mb-3">
                                        <label for="product-price">Purchase Price <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control"  value="{{$product->purchase_price}}" id="product-price" name="purchase_price" placeholder="Purchase Price" required>

                                        
                                        @error('purchase_price')
                                        <div class="alert alert-danger" role="alert">
                                          <strong>{{ $message }}</strong>
                                       </div>
                                        @enderror

                                    </div>


                                    <div class="form-group mb-3">
                                        <label for="product-price">Sales Price <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" value="{{$product->sales_price}}"  id="product-price" name="sales_price" placeholder="Sales price" required>

                                        @error('sales_price')
                                        <div class="alert alert-danger" role="alert">
                                          <strong>{{ $message }}</strong>
                                       </div>
                                        @enderror
                                    </div>


                                    <div class="form-group mb-3">
                                        <label for="product-price">Opening Stock </label>
                                        <input type="text" class="form-control" id="product-price" name="stock_qty" placeholder="Opening Stock">

                                        @error('stock_qty')
                                        <div class="alert alert-danger" role="alert">
                                          <strong>{{ $message }}</strong>
                                       </div>
                                        @enderror
                                    </div>


                                    <div class="row">
                                        <div class="col-12">
                                            <div class="text-center mb-3">
                                            <a href="{{route('product.index')}}" class="btn w-sm btn-light waves-effect">Cancel</a>
                                                <button type="submit" class="btn w-sm btn-success waves-effect waves-light">Save</button>
                                            </div>
                                        </div> <!-- end col -->
                                    </div>
                                </form>
                                </div> <!-- end card-box -->
                            </div> <!-- end col -->

                        </div>
                        <!-- end row -->

                    

               
                        <!-- end row -->


                        <!-- file preview template -->
                        <div class="d-none" id="uploadPreviewTemplate">
                            <div class="card mt-1 mb-0 shadow-none border">
                                <div class="p-2">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <img data-dz-thumbnail src="#" class="avatar-sm rounded bg-light" alt="">
                                        </div>
                                        <div class="col pl-0">
                                            <a href="javascript:void(0);" class="text-muted font-weight-bold" data-dz-name></a>
                                            <p class="mb-0" data-dz-size></p>
                                        </div>
                                        <div class="col-auto">
                                            <!-- Button -->
                                            <a href="" class="btn btn-link btn-lg text-muted" data-dz-remove>
                                                <i class="dripicons-cross"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                    </div> <!-- container -->

@endsection


@push('js')


 <!-- Summernote js -->
        <script src="{{asset('backend/assets/libs/summernote/summernote-bs4.min.js')}}"></script>
        <!-- Select2 js-->
        <script src="{{asset('backend/assets/libs/select2/js/select2.min.js')}}"></script>
        <!-- Dropzone file uploads-->
        <script src="{{asset('backend/assets/libs/dropzone/min/dropzone.min.js')}}"></script>

        <!-- Init js-->
        <script src="{{asset('backend/assets/js/pages/form-fileuploads.init.js')}}"></script>

        <!-- Init js -->
        <script src="{{asset('backend/assets/js/pages/add-product.init.js')}}"></script>

        <!-- App js -->
        <script src="{{asset('backend/assets/js/app.min.js')}}"></script>



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
