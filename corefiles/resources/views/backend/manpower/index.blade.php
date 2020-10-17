@extends('backend.app')
@section('title',"All Manpower information")
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
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Manpower</a></li>
                    </ol>
                </div>
                <h4 class="page-title">Manpower List</h4>
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
                            <i class="mdi mdi-plus-circle mr-1"></i>Add Man power 
                          </button>


                          <!-- Add Customer Modal -->
            <div class="modal fade" id="addClient" tabindex="-1" role="dialog" aria-labelledby="addClient" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="addClient">Man power's Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                <form action="{{route('manpower.store')}}" method="post" enctype="multipart/form-data">

                        @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Manpower Title <span style="color:red"> *<span></label>
                            <input type="text" class="form-control" data-toggle="input-mask" name="service_title" id="image_title"  placeholder="Service Title" required>
                            {{-- <span style="color:red;display: none" id="error_nurse_name">Name field is Required</span> --}}

                            @error('service_title')
                                <div class="alert alert-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror

                        </div>

                       
                        <div class="form-group">
                            <label>Thumb Image <span style="color:red">(300 X 160) *<span></label>
                            <input type="file" class="form-control"   data-toggle="input-mask" name="service_front_image" id="thumb_image"   required>
                            
                            @error('service_front_image')
                                <div class="alert alert-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror

                        </div>



                        <div class="form-group">
                            <label>Desciption Image <span style="color:red"> (700 X 380)*<span></label>
                            <input type="file" class="form-control"   data-toggle="input-mask" name="service_image" id="slider_image"   required>
                            
                            @error('service_image')
                                <div class="alert alert-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror

                        </div>

                        <div class="form-group">
                                <label><strong>Description :</strong></label>
                                <textarea   class="ckeditor form-control" name="service_details" require></textarea>
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
                        <table class="table table-centered table-nowrap table-striped" id="products-datatable">
                            <thead>
                                <tr>
                                    <th>SL NO</th>
                                    <th>Thumb Image</th>
                                    <th>Main Image</th>
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
                                    
                                        <img src="{{asset('manpower/'.$item->service_front_image)}}" height="100" width="100" alt="{{$item->image_title}}"/>

                                    </td>

                                    <td>
                                    
                                        <img src="{{asset('manpower/'.$item->service_image)}}" height="100" width="250" alt="{{$item->image_title}}"/>

                                    </td>

                                  


                                  

                                    <td>
                                    {{-- <a href="{{route('client.edit',$item->id)}}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a> --}}




                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModelInfo_{{$item->id}}">

                                        Edit
                                      </button>

                                      <!-- Modal -->
                                            <div class="modal fade" id="editModelInfo_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="editModelInfo_{{$item->id}}" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Account's information</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{route('manpower.update',$item->id)}}" method="post" enctype="multipart/form-data">
                                                            @method('PUT')
                                                            @csrf
                                                            <div class="modal-body">
                                                             
                                                            <div class="form-group">
                            <label>Service Title <span style="color:red"> *<span></label>
                            <input type="text" class="form-control" data-toggle="input-mask" value="{{$item->service_title}}" name="service_title" id="image_title"  placeholder="Service Title" required>
                            {{-- <span style="color:red;display: none" id="error_nurse_name">Name field is Required</span> --}}

                            @error('image_title')
                                <div class="alert alert-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror

                        </div>


                        <div class="form-group">
                            <label>Thumb Image <span style="color:red">(300 X 160) *<span></label>
                            <input type="file" class="form-control"   data-toggle="input-mask" name="service_front_image" id="service_front_image"   >
                            
                            @error('image_title')
                                <div class="alert alert-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror

                        </div>



                        <div class="form-group">
                            <label>Desciption Image <span style="color:red"> (700 X 380)*<span></label>
                            <input type="file" class="form-control"   data-toggle="input-mask" name="service_image" id="slider_image"   >
                            
                            @error('image_title')
                                <div class="alert alert-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror

                        </div>


                        <div class="form-group">
                                <label><strong>Description :</strong></label>
                                <textarea   class="ckeditor form-control" name="service_details" require>{{ $item->service_details}}</textarea>
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

                                            <form action="{{route('manpower.destroy',$item->id)}}" method="POST" id="action-form-{{$item->id}}">

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
