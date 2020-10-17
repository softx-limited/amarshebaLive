@extends('backend.app')
@section('title',"Call Service List")
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
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Call Service List</a></li> 
                    </ol>
                </div>
                <h4 class="page-title">Call Service List</h4>
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
                        <table class="table table-centered table-nowrap table-striped" id="table_id">
                            <thead>
                                <tr>
                                    <th>SL NO</th>
                                    <th>Date</th>
                                    <th>Client Name</th>
                                    <th>Client Mobile</th>
                                    <th>Email</th>
                                    <th>Address</th>                                    
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($datas as $key=>$item)


                                <tr>
                                    <td>
                                       {{$key+1}}
                                    </td>

                                    <td>
                                        {{$item->created_at->diffForHumans()??''}}
                                    </td>

                                    <td>
                                        {{$item->customer_name??''}}
                                    </td>

                                    <td>
                                        {{$item->customer_mobile ??''}}
                                    </td>

                                    
                                    <td>
                                        {{$item->customer_email ??''}}
                                    </td>

                                    <td>
                                        {{$item->customer_email ??''}}
                                    </td>

                                    <td>
                                        {{$item->checked_status ??''}}
                                    </td>
                                    
                                    <td>
                                       @if($item->checked_status=="pending")
                                        <button type="submit" onclick="Delete({{$item->id}})" class="btn btn-primary"> <i class="fe-check"><span></span></i>  </button>

                                        <form action="{{route('service.accept',$item->id)}}" method="POST" id="action-form-{{$item->id}}">

                                                @csrf
                                                @method('post')

                                        </form>
                                        @else 
                                        <button  class="btn btn-success">  Completed  </button>

                                        @endif
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
                              confirmButtonText: 'Yes, Confirm  it!'
                            }).then((result) => {
                              if (result.value) {

                                    event.preventDefault();
                                    document.getElementById('action-form-'+id).submit();
                              }
                            })


                    }

    </script>

@endpush
