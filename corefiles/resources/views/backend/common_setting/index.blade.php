@extends('backend.app')
@section('title',"All Service information")
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
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Service</a></li>
                    </ol>
                </div>
                <h4 class="page-title">Service List</h4>
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

                     

                          <!-- Add Customer Modal -->
           


                        </div>
                        <div class="col-sm-8">

                        </div><!-- end col-->
                    </div>

                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap table-striped" id="products-datatable">
                           
                            <tbody>

                            


                                <tr>
                                   <form action="{{ route('site.info.update') }}" method="post">

                                    @csrf
            
            
                                    <div class="form-group">
                                        <label>Facebook <span style="color:red"> <span></label>
                                        <input type="text" class=" form-control" value="{{ $item->facebook }}"  data-toggle="input-mask" name="facebook" id="facebook"    >
                                        
                                        @error('facebook')
                                            <div class="alert alert-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
            
                                    </div>


                                    <div class="form-group">
                                        <label>Twitter <span style="color:red"> <span></label>
                                        <input type="text" class=" form-control"  value="{{ $item->twitter }}"  data-toggle="input-mask" name="twitter" id="twitter"    >
                                        
                                        @error('twitter')
                                            <div class="alert alert-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
            
                                    </div>


                                    <div class="form-group">
                                        <label>Youtube <span style="color:red"> <span></label>
                                        <input type="text" class=" form-control" value="{{ $item->youtube }}"  data-toggle="input-mask" name="youtube" id="youtube"    >
                                        
                                        @error('youtube')
                                            <div class="alert alert-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
            
                                    </div>

            
                                    <div class="form-group">
                                        <label>Google Map Address <span style="color:red"> <span></label>
                                        <input type="text" class="ckeditor form-control" value="{{ $item->google_map }}"   data-toggle="input-mask" name="google_map" id="google_map"    >
                                        
                                        @error('short_desc')
                                            <div class="alert alert-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
            
                                    </div>

                                    
                                    <div class="form-group">
                                        <label><strong>Short Description :</strong></label>
                                        <textarea   class="ckeditor form-control" name="short_description" require>{{ $item->short_description}}</textarea>
                                </div>
            
            
                                    <div class="form-group">
                                            <label><strong>About us :</strong></label>
                                            <textarea   class="ckeditor form-control" name="about_us" require>{{ $item->about_us}}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label><strong>Contact us :</strong></label>
                                        <textarea   class="ckeditor form-control" name="contact_us" require>{{ $item->contact_us}}</textarea>
                                </div>

                                <div class="form-group pull-right">
                                    <button type="submit" class="btn btn-primary ">Update </button>
                                </div>

                              

                                        </div>

                                    </form>
                                </tr>

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
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
       $('#ckeditor').ckeditor();
    });
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
