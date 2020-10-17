@extends('backend.app')
@section('title',"All Users information")
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
                        <li class="breadcrumb-item"><a href="javascript: void(0);">User</a></li>
                        <li class="breadcrumb-item active">Settings</li>
                    </ol>
                </div>
                <h4 class="page-title">User List</h4>
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
                            <i class="mdi mdi-plus-circle mr-1"></i>Add User
                          </button>


                          <!-- Add Customer Modal -->
            <div class="modal fade" id="addClient" tabindex="-1" role="dialog" aria-labelledby="addClient" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="addClient">User's Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                <form action="{{route('add.user')}}" method="post" enctype="multipart/form-data">

                        @csrf
                    <div class="modal-body">
                         
                        <div class="form-group">
                            <label for="fullname">Name</label>
                            <input name="name" class="form-control" type="text" id="fullname" placeholder="Enter your name" required> <br>

                  
                     @error('name')
                            <div class="alert alert-danger" role="alert">
                              <strong>{{ $message }}</strong>
                           </div>
                      @enderror

                        </div>

                          <div class="form-group">
                            <label for="emailaddress">Email address</label>
                            <input class="form-control" type="email" id="emailaddress"  placeholder="Enter your email" name="email" required><br>

                       
                            @error('email')
                            <div class="alert alert-danger" role="alert">
                            <strong>{{ $message }}</strong>
                            </div>
                            @enderror

                        </div>

                        
                   




                        <div class="form-group">
                            <label for="mobile_no">Mobile No</label>
                            <input  name="mobile_no"  class="form-control" type="nubmer" id="mobile_no" placeholder="Enter mobile nubmer" required><br>

                            @error('mobile_no')
                            <div class="alert alert-danger" role="alert">
                              <strong>{{ $message }}</strong>
                           </div>
                            @enderror

                        </div>


                        <div class="form-group">
                            <label>Role <span style="color:red">*<span></label>
                                <select class="form-control" name="role_id"  id="role_id" required>
                                    <option value="">Select Gender</option>
                                    @foreach ($roles as $item)
                                    <option value="{{ $item->id }}">{{ $item->role_name }}</option>
                                        
                                    @endforeach
                                   
                                </select>
                                  
                            @error('patient_gender')
                                <div class="alert alert-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror

                        </div>


                         <div class="form-group">
                            <label for="address">Address</label>
                            <input   name="address" class="form-control" type="text" id="address" placeholder="Enter your address" required><br>

                            @error('address')
                            <div class="alert alert-danger" role="alert">
                              <strong>{{ $message }}</strong>
                           </div>
                            @enderror

                        </div>




                      
                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="input-group input-group-merge">
                                <input   type="password" id="password" class="form-control" placeholder="Enter your password" name="password" required>
                                <div class="input-group-append" data-password="false">
                                    <div class="input-group-text">
                                        <span class="password-eye"></span>
                                    </div>
                                </div>
                            </div><br>

                            @error('password')
                            <div class="alert alert-danger" role="alert">
                              <strong>{{ $message }}</strong>
                           </div>
                            @enderror

                        </div>


                          <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password_confirmation" class="form-control" placeholder="Retype password" name="password_confirmation" required><br>
                                <div class="input-group-append" data-password="false">
                                    <div class="input-group-text">
                                        <span class="password-eye"></span>
                                    </div>
                                </div>
                            </div>


                            @error('confirm_password')
                            <div class="alert alert-danger" role="alert">
                              <strong>{{ $message }}</strong>
                           </div>
                            @enderror

           

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
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Mobile No</th> 
                                    <th style="width: 85px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($datas as $key=>$item)


                                <tr>
                                    <td>
                                       {{$key+1}}
                                    </td>

                                    <td>{{ $item->name }} </td>

                                    <td> {{ $item->email }} </td>
                                    <td> {{ $item->role_name }} </td>

                                    <td> {{ $item->mobile_no }}</td>
                                     

                                  

                                    <td>
                                    {{-- <a href="{{route('client.edit',$item->id)}}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a> --}}




                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModelInfo_{{$item->id}}">

                                        Edit
                                      </button>

                                      <button type="submit" onclick="Delete({{$item->id}})" class="btn btn-danger"> <i class="mdi mdi-delete"><span></span></i>  </button>


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
                                                        <form action="{{route('user.info.update',$item->id)}}" method="post" enctype="multipart/form-data">
                                                            @method('PUT')
                                                            @csrf
                                                            <div class="modal-body">
                         
                                                                <div class="form-group">
                                                                    <label for="fullname">Name</label>
                                                                    <input name="name" class="form-control" value="{{ $item->name }}" type="text" id="fullname" placeholder="Enter your name" required> <br>
                                        
                                                          
                                                             @error('name')
                                                                    <div class="alert alert-danger" role="alert">
                                                                      <strong>{{ $message }}</strong>
                                                                   </div>
                                                              @enderror
                                        
                                                                </div>
                                        
                                                                  <div class="form-group">
                                                                    <label for="emailaddress">Email address</label>
                                                                    <input class="form-control" type="email"  value="{{ $item->email }}" id="emailaddress"  placeholder="Enter your email" name="email" required><br>
                                        
                                                               
                                                                    @error('email')
                                                                    <div class="alert alert-danger" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                    </div>
                                                                    @enderror
                                        
                                                                </div>
                                        
                                                                
                                                           
                                                                <div class="form-group">
                                                                    <label>Role <span style="color:red">*<span></label>
                                                                        <select class="form-control" name="role_id"  id="role_id" required>
                                                                            <option value="">Select Role</option>
                                                                            @foreach ($roles as $items)
                                                                            <option value="{{ $items->id }}" {{($items->id==$item->role_id)?'selected':'' }}>{{ $items->role_name }}</option>
                                                                                
                                                                            @endforeach
                                                                           
                                                                        </select>
                                                                          
                                                                    @error('patient_gender')
                                                                        <div class="alert alert-danger" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </div>
                                                                    @enderror
                                        
                                                                </div>
                                        
                                        
                                        
                                                                <div class="form-group">
                                                                    <label for="mobile_no">Mobile No</label>
                                                                    <input  name="mobile_no"  value="{{$item->mobile_no }}" class="form-control" type="nubmer" id="mobile_no" placeholder="Enter mobile nubmer" required><br>
                                        
                                                                    @error('mobile_no')
                                                                    <div class="alert alert-danger" role="alert">
                                                                      <strong>{{ $message }}</strong>
                                                                   </div>
                                                                    @enderror
                                        
                                                                </div>
                                        
                                        
                                                                 <div class="form-group">
                                                                    <label for="address">Address</label>
                                                                    <input   name="address" value="{{ $item->address }}"  class="form-control" type="text" id="address" placeholder="Enter your address" ><br>
                                        
                                                                    @error('address')
                                                                    <div class="alert alert-danger" role="alert">
                                                                      <strong>{{ $message }}</strong>
                                                                   </div>
                                                                    @enderror
                                        
                                                                </div>
                                        
                                        
                                        
                                        
                                                              
                                                                <div class="form-group">
                                                                    <label for="password">Password</label>
                                                                    <div class="input-group input-group-merge">
                                                                        <input   type="password" id="password" class="form-control" placeholder="Enter your password" name="password" >
                                                                        <div class="input-group-append" data-password="false">
                                                                            <div class="input-group-text">
                                                                                <span class="password-eye"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div><br>
                                        
                                                                    @error('password')
                                                                    <div class="alert alert-danger" role="alert">
                                                                      <strong>{{ $message }}</strong>
                                                                   </div>
                                                                    @enderror
                                        
                                                                </div>
                                        
                                        
                                                                  <div class="form-group">
                                                                    <label for="password_confirmation">Confirm Password</label>
                                                                    <div class="input-group input-group-merge">
                                                                        <input type="password" id="password_confirmation" class="form-control" placeholder="Retype password" name="password_confirmation" ><br>
                                                                        <div class="input-group-append" data-password="false">
                                                                            <div class="input-group-text">
                                                                                <span class="password-eye"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                        
                                        
                                                                    @error('confirm_password')
                                                                    <div class="alert alert-danger" role="alert">
                                                                      <strong>{{ $message }}</strong>
                                                                   </div>
                                                                    @enderror
                                        
                                                   
                                        
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





                                       
                                            <form action="{{route('user.destroy',$item->id)}}" method="POST" id="action-form-{{$item->id}}">

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
