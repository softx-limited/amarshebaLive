<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Register & Signup</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('backend/assets/images/favicon.ico')}}">

    <!-- App css -->
    <link href="{{asset('backend/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
    <link href="{{asset('backend/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

    <link href="{{asset('backend/assets/css/bootstrap-dark.min.css')}}" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" />
    <link href="{{asset('backend/assets/css/app-dark.min.css')}}" rel="stylesheet" type="text/css" id="app-dark-stylesheet" />

    <!-- icons -->
    <link href="{{asset('backend/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

</head>

<body class="loading authentication-bg authentication-bg-pattern">

    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-pattern">

                        <div class="card-body p-4">
                            
                            <div class="text-center w-75 m-auto">
                                <div class="auth-logo">
                                    <a href="index.html" class="logo logo-dark text-center">
                                        <span class="logo-lg">
                                            <img src="{{asset('backend/assets/images/logo-dark.png')}}" alt="" height="22">
                                        </span>
                                    </a>
                
                                    <a href="index.html" class="logo logo-light text-center">
                                        <span class="logo-lg">
                                            <img src="{{asset('backend/assets/images/logo-light.png')}}" alt="" height="22">
                                        </span>
                                    </a>
                                </div>
                                <p class="text-muted mb-4 mt-3">Don't have an account? Create your account, it takes less than a minute</p>
                            </div>

                        <form action="{{route('become.member')}}" method="post">


                                @csrf

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

                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkbox-signup" name="trems_conds" required>
                                        <label class="custom-control-label" for="checkbox-signup">I accept <a href="#" class="text-dark">Terms and Conditions</a></label><br>

                                        <br>
                                        @error('trems_conds')
                                        <div class="alert alert-danger" role="alert">
                                          <strong>{{ $message }}</strong>
                                       </div>
                                        @enderror

                                        

                                    </div>


                                </div>
                                <div class="form-group mb-0 text-center">
                                    <button class="btn btn-success btn-block" type="submit"> Sign Up </button>
                                </div>

                            </form>


                            <!-- <div class="text-center">
                                <h5 class="mt-3 text-muted">Sign up using</h5>
                                <ul class="social-list list-inline mt-3 mb-0">
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="mdi mdi-facebook"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="mdi mdi-github"></i></a>
                                    </li>
                                </ul>
                            </div> -->



                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p class="text-white-50">Already have account?  <a href="{{route('login')}}" class="text-white ml-1"><b>Sign In</b></a></p>
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <footer class="footer footer-alt">
        2015 - <script>document.write(new Date().getFullYear())</script> &copy;  Developed by <a href="https://softx.com.bd/" target="_blank" style="color:#fff">softX</a> 
    </footer>

    <!-- Vendor js -->
    <script src="{{asset('backend/assets/js/vendor.min.js')}}"></script>

    <!-- App js -->
    <script src="{{asset('backend/assets/js/app.min.js')}}"></script>


    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

    
    {!! Toastr::message() !!}

    <script>
    @if($errors->any())
            @foreach($errors->all() as $error)
                toastr.error('{{ $error }}','Error',{
                    closeButton:true,
                    progressBar:true,
                });
            @endforeach
        @endif
    </script>

      @stack('js')

    
</body>
</html>