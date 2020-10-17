@extends('backend.app')
@section('title',"All Nurse information")
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
                        <li class="breadcrumb-item"><a href="javascript: void(0);">HRM</a></li>
                        <li class="breadcrumb-item active">Nurse</li>
                    </ol>
                </div>
                <h4 class="page-title">Nurse</h4>
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

                        <a href="{{route('nurse.create')}}" class="btn btn-danger waves-effect waves-light"> <i class="mdi mdi-plus-circle mr-1"></i> Add Nurse </a>
                        </div>
                        <div class="col-sm-8">
                            
                        </div><!-- end col-->
                    </div>

                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap table-striped" id="products-datatable">
                            <thead>
                                <tr>
                                    <th style="width: 20px;">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1">&nbsp;</label>
                                        </div>
                                    </th>
                                    <th>Name</th>
                                    <th>Mobile</th>
                                    <th>Religion</th>
                                    <th>Create Date</th>
                                    <th>Status</th>
                                    <th style="width: 85px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($datas as $item)


                                <tr>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck2">
                                            <label class="custom-control-label" for="customCheck2">&nbsp;</label>
                                        </div>
                                    </td>
                                    <td class="table-user">
                                        <img src="{{asset('nurse/'.$item->photo)}}" alt="table-user" class="mr-2 rounded-circle">
                                        <a href="javascript:void(0);" class="text-body font-weight-semibold">{{$item->name ??''}}</a>
                                    </td>
                                    <td>
                                        {{$item->mobile ??''}}
                                    </td>
                                    <td>
                                        {{$item->religion ??''}}
                                    </td>
                                    
                                    <td>
                                        {{$item->created_at->toDateString() ??''}}
                                    </td>
                                    <td>
                                        @if($item->status==1)
                                        <span class="badge bg-soft-success text-success">Active</span>
                                        @else 
                                        <span class="badge bg-soft-danger text-danger">Deactive</span>

                                        @endif
                                    </td>

                                    <td>
                                         <a href="{{route('nurse.cv.download',$item->id)}}"> <i class="dripicons-download"></i> CV</a>
                                    <a href="{{route('nurse.edit',$item->id)}}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
									
									 

                                    
                                       

                                        <button type="submit" onclick="Delete({{$item->id}})" class="btn btn-danger"> <i class="mdi mdi-delete"><span></span></i>  </button>

                                            <form action="{{route('nurse.destroy',$item->id)}}" method="POST" id="action-form-{{$item->id}}"> 

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
