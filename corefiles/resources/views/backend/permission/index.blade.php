
@extends('backend.app')

@section('title',"Assign Permission")
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
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Website</a></li>
                        <li class="breadcrumb-item active">Settings</li>
                    </ol>
                </div>
                <h4 class="page-title"> Access  Settings</h4>
            </div>
        </div>
    </div>     
    <!-- end page title --> 
<form action="{{route('update.access.settings',$role->id)}}" method="post">
    @method("post")
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                     
                        
                    <div class="row">
                        <div class="col-md-2"> </div>
                        <div class="col-md-6">
                            
                                <div class="form-group">
                                    <label> <input type="checkbox" name="menu_hrm" class="form-check-input" id="exampleCheck1" {{   ($menus->menu_hrm=='1')?'checked':'' }}> HRM Menu </label>
                                        <div class="form-check">
                                            <input type="checkbox" name="nurse_list" class="form-check-input" id="nurseList" {{   ($sub_menus->nurse_list=='1')?'checked':'' }}>
                                            <label class="form-check-label" for="nurseList">Nurse Lists</label>
                                          </div>
                                          <div class="form-check">
                                            <input type="checkbox" name="working_report" class="form-check-input" id="working_report" {{   ($sub_menus->working_report=='1')?'checked':'' }}>
                                            <label class="form-check-label" for="working_report">Working Report</label>
                                          </div>

                                 </div>


                                 <div class="form-group">
                                    <label> <input type="checkbox" name="menu_client" class="form-check-input" id="menu_client" {{   ($menus->menu_client=='1')?'checked':'' }}> Client Menu</label>
                                        <div class="form-check">
                                            <input type="checkbox" name="client_list" class="form-check-input" id="client_list" {{   ($sub_menus->client_list=='1')?'checked':'' }}>
                                            <label class="form-check-label" for="client_list">Client Lists</label>
                                          </div>
                                         

                                 </div>

                                 <div class="form-group">
                                    <label> <input type="checkbox" name="menu_product" class="form-check-input" id="menu_product" {{   ($menus->menu_product=='1')?'checked':'' }}> Product Menu</label>
                                        <div class="form-check">
                                            <input type="checkbox" name="product_list" class="form-check-input" id="product_list" {{   ($sub_menus->product_list=='1')?'checked':'' }}>
                                            <label class="form-check-label" for="product_list">Product Lists</label>
                                          </div>                                         

                                 </div>


                                 <div class="form-group">
                                    <label> <input type="checkbox" name="menu_service" class="form-check-input" id="menu_service" {{   ($menus->menu_service=='1')?'checked':'' }}> Service Menu</label>
                                    <div class="form-check">
                                        <input type="checkbox" name="product_rent" class="form-check-input" id="product_rent" {{   ($sub_menus->product_rent=='1')?'checked':'' }}>
                                        <label class="form-check-label" for="product_rent">Product Rent</label>
                                      </div>

                                      <div class="form-check">
                                        <input type="checkbox" name="product_rent_list" class="form-check-input" id="product_rent_list" {{   ($sub_menus->product_rent_list=='1')?'checked':'' }}>
                                        <label class="form-check-label" for="product_rent_list">Product Rent lists</label>
                                      </div>
                                     
                                      <div class="form-check">
                                        <input type="checkbox" name="call_service" class="form-check-input" id="call_service" {{   ($sub_menus->call_service=='1')?'checked':'' }}>
                                        <label class="form-check-label" for="call_service">Call Service</label>
                                      </div>


                                      <div class="form-check">
                                        <input type="checkbox" name="request_service" class="form-check-input" id="request_service" {{   ($sub_menus->request_service=='1')?'checked':'' }}>
                                        <label class="form-check-label" for="request_service">Request Service</label>
                                      </div>                                    
                                           
                                 </div>


                                 <div class="form-group">
                                    <label> <input type="checkbox" name="menu_expense" class="form-check-input" id="menu_expense" {{   ($menus->menu_expense=='1')?'checked':'' }}> Expense Menu</label>
                                    <div class="form-check">
                                        <input type="checkbox" name="expense_category" class="form-check-input" id="expense_category" {{   ($sub_menus->expense_category=='1')?'checked':'' }}>
                                        <label class="form-check-label" for="expense_category">Expense Category</label>
                                      </div>

                                      <div class="form-check">
                                        <input type="checkbox" name="expense_list" class="form-check-input" id="expense_list" {{   ($sub_menus->expense_list=='1')?'checked':'' }}>
                                        <label class="form-check-label" for="expense_list">Expense lists</label>
                                      </div>
                                     
                                      <div class="form-check">
                                        <input type="checkbox" name="salary_payment" class="form-check-input" id="salary_payment" {{   ($sub_menus->salary_payment=='1')?'checked':'' }}>
                                        <label class="form-check-label" for="salary_payment">Salary Payment</label>
                                      </div>

                                      
                                      <div class="form-check">
                                        <input type="checkbox" name="salary_payment_list" class="form-check-input" id="salary_payment_list" {{   ($sub_menus->salary_payment_list=='1')?'checked':'' }}>
                                        <label class="form-check-label" for="salary_payment_list">Salary Payment List</label>
                                      </div>                                    
                                           
                                 </div>



                                 <div class="form-group">
                                    <label> <input type="checkbox" name="menu_patient" class="form-check-input" id="menu_patient" {{   ($menus->menu_patient=='1')?'checked':'' }}> Patient Menu</label>
                                    <div class="form-check">
                                        <input type="checkbox" name="patient_list" class="form-check-input" id="patient_list" {{   ($sub_menus->patient_list=='1')?'checked':'' }}>
                                        <label class="form-check-label" for="patient_list">Patient List</label>
                                      </div>

                                      <div class="form-check">
                                        <input type="checkbox" name="assign_nurse" class="form-check-input" id="assign_nurse" {{   ($sub_menus->assign_nurse=='1')?'checked':'' }}>
                                        <label class="form-check-label" for="assign_nurse">Assign Nurse</label>
                                      </div>                                                                        
                                 </div>

                                <div class="form-group">
                                    <label> <input type="checkbox" name="menu_report" class="form-check-input" id="menu_report"  {{   ($menus->menu_report=='1')?'checked':'' }} > Report Menu</label>
                                    <div class="form-check">
                                        <input type="checkbox" name="total_expense" class="form-check-input" id="total_expense" {{   ($sub_menus->total_expense=='1')?'checked':'' }}>
                                        <label class="form-check-label" for="total_expense">Total Expense</label>
                                    </div>


                                    <div class="form-check">
                                        <input type="checkbox" name="total_profit" class="form-check-input" id="total_profit" {{   ($sub_menus->total_profit=='1')?'checked':'' }}>
                                        <label class="form-check-label" for="total_profit">Total Profit</label>
                                    </div>

                                    <div class="form-check">
                                        <input type="checkbox" name="net_profit" class="form-check-input" id="net_profit"  {{   ($sub_menus->net_profit=='1')?'checked':'' }}>
                                        <label class="form-check-label" for="net_profit">Net Profit</label>
                                    </div>                                                                      
                                </div>


                                <div class="form-group">
                                    <label> <input type="checkbox" name="menu_settings" class="form-check-input" id="menu_settings" {{   ($menus->menu_settings=='1')?'checked':'' }}> Settngs Menu</label>
                                    <div class="form-check">
                                        <input type="checkbox" name="account_settings" class="form-check-input" id="account_settings" {{   ($sub_menus->account_settings=='1')?'checked':'' }}>
                                        <label class="form-check-label" for="account_settings">Account Settings</label>
                                    </div>

                                    <div class="form-check">
                                        <input type="checkbox" name="web_settings" class="form-check-input" id="web_settings" {{   ($sub_menus->web_settings=='1')?'checked':'' }}>
                                        <label class="form-check-label" for="web_settings">Web Settings</label>
                                    </div>

                                    <div class="form-check">
                                        <input type="checkbox" name="slider_settings" class="form-check-input" id="slider_settings" {{   ($sub_menus->slider_settings=='1')?'checked':'' }}>
                                        <label class="form-check-label" for="slider_settings">Slider Settings</label>
                                    </div>
                                    
                                     <div class="form-check">
                                        <input type="checkbox" name="service_settings" class="form-check-input" id="service_settings" {{   ($sub_menus->service_settings=='1')?'checked':'' }}>
                                        <label class="form-check-label" for="service_settings">Service Settings</label>
                                    </div>


                                    <div class="form-check">
                                        <input type="checkbox" name="team_settings" class="form-check-input" id="team_settings" {{   ($sub_menus->team_settings=='1')?'checked':'' }}>
                                        <label class="form-check-label" for="team_settings">Team Settings</label>
                                    </div>


                                    <div class="form-check">
                                        <input type="checkbox" name="man_power_settings" class="form-check-input" id="man_power_settings" {{   ($sub_menus->man_power_settings=='1')?'checked':'' }}>
                                        <label class="form-check-label" for="man_power_settings">Man-Power Settings</label>
                                    </div>

                                    <div class="form-check">
                                        <input type="checkbox" name="client_settings" class="form-check-input" id="client_settings"  {{   ($sub_menus->client_settings=='1')?'checked':'' }}>
                                        <label class="form-check-label" for="client_settings">Client Settings</label>
                                    </div>

                                    <div class="form-check">
                                        <input type="checkbox" name="basic_settings" class="form-check-input" id="basic_settings"  {{   ($sub_menus->basic_settings=='1')?'checked':'' }}>
                                        <label class="form-check-label" for="basic_settings">Basic Settings</label>
                                    </div>                                                              
                                </div>


                                <div class="form-group">
                                    <label> <input type="checkbox" name="menu_user_section" class="form-check-input" id="menu_user_section" {{   ($menus->menu_user_section=='1')?'checked':'' }}>User Manage Menu</label>
                                    
                                    

                                    <div class="form-check">
                                        <input type="checkbox" name="users_settings" class="form-check-input" id="users_settings"  {{   ($sub_menus->users_settings=='1')?'checked':'' }}>
                                        <label class="form-check-label" for="users_settings">User List</label>
                                    </div>  



                                    <div class="form-check">
                                        <input type="checkbox" name="roles_settings" class="form-check-input" id="roles_settings" {{   ($sub_menus->roles_settings=='1')?'checked':'' }}>
                                        <label class="form-check-label" for="roles_settings">Roles Setting</label>
                                    </div>                           
                                </div>


                                <div class="form-group">
                                    <h2> Access </h2>
                                    
                                    

                                    <div class="form-check">
                                        <input type="checkbox" name="create" class="form-check-input" id="create" {{   ($permission->create=='1')?'checked':'' }} >
                                        <label class="form-check-label" for="create">Add</label>
                                    </div>  

                                    <div class="form-check">
                                        <input type="checkbox" name="read" class="form-check-input" id="read" {{   ($permission->read=='1')?'checked':'' }} >
                                        <label class="form-check-label" for="read">View</label>
                                    </div>  

                                    <div class="form-check">
                                        <input type="checkbox" name="update" class="form-check-input" id="update" {{   ($permission->update=='1')?'checked':'' }}>
                                        <label class="form-check-label" for="update">Edit</label>
                                    </div> 


                                    <div class="form-check">
                                        <input type="checkbox" name="delete" class="form-check-input" id="delete" {{   ($permission->delete=='1')?'checked':'' }}>
                                        <label class="form-check-label" for="delete">Delete</label>
                                    </div> 


                          
                                </div>






                        </div> <!-- end col -->

                 

                    </div>
                    
                    <!-- end row -->

                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div> <!-- end row --> 
    
    
    <button type="submit" class="btn btn-primary waves-effect waves-light pull-right" id="storeData">Update</button>
</form>
</div> <!-- container -->

@endsection


@push('js')


@endpush

