
@extends('backend.app')

@section('title',"Edit Web Settings")
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
                <h4 class="page-title">Update Website Settings</h4>
            </div>
        </div>
    </div>     
    <!-- end page title --> 
<form action="{{route('website.settings.update')}}" method="post" enctype="multipart/form-data">
    @method("PUT")
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                     
                        <h4> Site Informaiton </h4>
                    <div class="row">
                        <div class="col-md-6">
                            
                                <div class="form-group">
                                    <label>Org Name <span style="color:red">*<span></label>
                                    <input type="text" class="form-control" data-toggle="input-mask" value="{{$data->org_name}}" name="org_name" value="{{old('org_name')}}" id="Organization"  placeholder="Organization Name" required>
                                    <span style="color:red;display: none" id="error_nurse_name">orgnization field is Required</span>

                                    @error('org_name')
                                    <div class="alert alert-danger" role="alert">
                                      <strong>{{ $message }}</strong>
                                   </div>
                                    @enderror

                                 </div>
                                <div class="form-group">
                                    <label>Mobile No <span style="color:red">*<span></label>
                                    <input type="text" class="form-control" data-toggle="input-mask" value="{{$data->mobile_no}}"  name="mobile_no"  id="mobile_no" value="{{old('mobile_no')}}" placeholder="Mobile No" >
                                    {{-- <span style="color:red;display: none" id="error_nurse_mobile">Mobile field is Required</span> --}}

                                    @error('mobile_no')
                                    <div class="alert alert-danger" role="alert">
                                      <strong>{{ $message }}</strong>
                                   </div>
                                    @enderror
                                    {{-- <span class="font-13 text-muted">e.g "HH:MM:SS"</span> --}}
                                </div>

                                <div class="form-group">
                                    <label>Telephone No <span style="color:red">*<span></label>
                                    <input type="text" class="form-control" data-toggle="input-mask"  value="{{$data->telephone_no}}" name="telephone_no" id="telephone_no"  value="{{old('telephone_no')}}" placeholder="Telephone No" >
                                    
                                   
                                    @error('telephone_no')
                                    <div class="alert alert-danger" role="alert">
                                      <strong>{{ $message }}</strong>
                                   </div>
                                    @enderror
                                </div>

                              

                           


                              

                            
                        </div> <!-- end col -->

                        <div class="col-md-6">


                            <div class="form-group">
                                <label>Address<span style="color:red">*<span></label>
                                <input type="text" class="form-control" data-toggle="input-mask"  value="{{$data->address}}" name="address"  id="address" value="{{old('address')}}" placeholder="Address"
                                required>    
                                {{-- <span style="color:red;display: none" id="error_nurse_mother_name">Adddress field is Required</span> --}}

                                @error('address')
                                <div class="alert alert-danger" role="alert">
                                  <strong>{{ $message }}</strong>
                               </div>
                                @enderror


                            </div>


                           
                                <div class="form-group">
                                    <label>Logo (150 X 40 PX)</label> <span><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#previewimage">Preview
                                      </button> </span>
                                    <input type="file" class="form-control" data-toggle="input-mask"  id="logo" name="logo" >
                                    {{-- <span style="color:red;display: none" id="error_nurse_photo">Photo field is Required</span> --}}

                                    @error('logo')
                                    <div class="alert alert-danger" role="alert">
                                      <strong>{{ $message }}</strong>
                                   </div>
                                    @enderror

                                    <!-- Modal -->
                                <div class="modal fade" id="previewimage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Site Logo</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                                <img class="thumb" src="{{ asset('website/'.$data->logo) }}" />
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>

                                    
                                </div>


                                
                                <div class="form-group">
                                    <label>Favicon </label>  <span><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#previewicon">Preview
                                    </button> </span>
                                    <input type="file" class="form-control" data-toggle="input-mask"  id="fav_icon" name="fav_icon" >
                                    {{-- <span style="color:red;display: none" id="error_nurse_photo">Photo field is Required</span> --}}

                                    @error('fav_icon')
                                    <div class="alert alert-danger" role="alert">
                                      <strong>{{ $message }}</strong>
                                   </div>
                                    @enderror


                                            <!-- Modal -->
                                <div class="modal fade" id="previewicon" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Site Favicon</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                                <img class="thumb" src="{{ asset('website/'.$data->fav_icon) }}" />
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                    </div>
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


<script>

var exam_qty=0;
var exp_qty=0;
var referral_qty=0;



//Referral user name


$(document).on('click','#add_referral',function(){


++referral_qty;

var refUserName=$('.referral_name').val();
var refUserDesignation=$('.designation').val();
var refuserMobileNo=$('.mobile_no').val();
var refUserRelation=$('.relation').val();
var refUserAddress=$('.address').val();

/*Hide the Error Msg*/
$('#error_referral_name').hide()
$('#error_referral_designation').hide()
$('#error_referral_mobile_no').hide()
$('#error_referral_relation').hide()
$('#error_referral_address').hide()


// console.log(examName);

if(refUserName && refUserDesignation && refuserMobileNo  && refUserRelation && refUserAddress){



    var _token = '{{ csrf_token() }}';
       $.ajax({
           url: "{{ route('add.nurse.reference') }}",
           method: "POST",
           data: {_token:_token, refUserName:refUserName,refUserDesignation:refUserDesignation,refuserMobileNo:refuserMobileNo,refUserRelation:refUserRelation,refUserAddress:refUserAddress ,referral_qty:referral_qty},
           dataType: "json",
           success: function (response) {

               // console.log(response);
               $('#reference_tbl_head').show();
               // console.log(response);
                $('#referral_body').append(response);

            //     $('#qtty').val('');
            //     $('#pro_total').val(0);
            //     $('#u_price').val(0);


            //      getTotalPrice();

           }
       });



}else{
            if(refUserName==''){
            $('#error_referral_name').show()
            }else if(refUserDesignation ==''){

            $('#error_referral_designation').show()


            }else if(refuserMobileNo ==''){
            $('#error_referral_mobile_no').show()

            }else if(refUserRelation ==''){
            $('#error_referral_relation').show()

            }else{
            $('#error_referral_address').show()
            }

}



})




$(document).on('click', '.btn-remove-nurse-reference', function() {
          $('#test_ref_row_' + $(this).data('ref_testid')).remove();

        // alert('HI');


       });



$(document).on('click','#add_exam',function(){

    ++exam_qty;

    var examName=$('.exam_name').val();
     
    var examGroup=$('.group_name').val();
    var examYear=$('.exam_year').val();
    var examGrade=$('.grade').val();
    var universityName=$('.university').val();

    /*Hide the Error Msg*/
    $('#error_exam').hide()
    $('#error_group').hide()
    $('#error_exam_year').hide()
    $('#error_grade').hide()
    $('#error_borad').hide()
    
    
    // console.log(examName);

    if(examName && examGroup && examYear  && examGrade && universityName){
        


        var _token = '{{ csrf_token() }}';
           $.ajax({
               url: "{{ route('add.nurse.qualification') }}",
               method: "POST",
               data: {_token:_token, examName:examName,examGroup:examGroup,examYear:examYear,examGrade:examGrade,universityName:universityName ,exam_qty:exam_qty},
               dataType: "json",
               success: function (response) {

                   console.log(response);
                //    $('#exam_tbl_head').show();
                //    console.log(response);
                    $('#exam_body').append(response);

                //     $('#qtty').val('');
                //     $('#pro_total').val(0);
                //     $('#u_price').val(0);
                    

                //      getTotalPrice();

               }
           });



    }else{
                if(examName==''){                            
                $('#error_exam').show()
                }else if(examGroup ==''){

                $('#error_group').show()


                }else if(examYear ==''){
                $('#error_exam_year').show()

                }else if(examGrade ==''){
                $('#error_grade').show()

                }else{
                $('#error_borad').show()
                }

    }

    

})

$(document).on('click', '.btn-remove', function() {
          $('#test_row_' + $(this).data('testid')).remove();           

           
       });
       


/*function for Add multiple Expericence*/


       $(document).on('click','#add_experice',function(){   // alert("HI");
        var orgName=$('#org_name').val();
        var expYear=$('#total_year').val();
        var startinDate=$('#job_starting_date').val();
        var endingDate=$('#job_ending_date').val();


            $('#error_org_name').hide()
            $('#error_total_year').hide()
            $('#error_job_starting_date').hide()
            $('#error_job_ending_date').hide()



            if(orgName && expYear && startinDate && endingDate){

                ++exp_qty;
                var _token="{{csrf_token()}}"


                $.ajax({

                            url:"{{route('add.nurse.experience')}}",
                            method:"post",
                            data:{_token:_token,orgName:orgName,expYear:expYear,startinDate:startinDate,endingDate:endingDate,exp_qty:exp_qty},
                            dataType:"json",

                            success:function(response){

                                // console.log(response);

                                $('#experience_tbl').append(response);


                                // console.log(response)


                            }

                })

            }else{


                if(orgName==''){   

                    $('#error_org_name').show()

                }else if(expYear ==''){

                    $('#error_total_year').show()


                }else if(startinDate ==''){
                    $('#error_job_starting_date').show()

                }else if(endingDate ==''){
                    $('#error_job_ending_date').show()

                }else{
                    
                }


            }    
        
        
        

       })

       


       $(document).on('click', '.btn-remove-nurse', function() {

          $('#test_exp_row_' + $(this).data('exp_testid')).remove();           

           
       });


       $(document).on('click','#storeData',function(){  
    
        $(':input[type="submit"]').prop('disabled', false);

        /*Hide the Form Erro*/

            $('#error_nurse_name').hide()
            $('#error_nurse_mobile').hide()
            $('#error_nurse_father_name').hide()
            $('#error_nurse_mother_name').hide()
            $('#error_nurse_dob').hide()
            $('#error_nurse_status').hide()
            $('#error_nurse_photo').hide()
            $('#error_nurse_gender').hide()
            $('#error_nurse_nationality').hide()
            $('#error_nurse_religion').hide()
            $('#error_nurse_present_address').hide()
            $('#error_nurse_permanent_address').hide()
            $('#error_nurse_salary').hide()
            
            
                /*Cath The Input Field Values*/

                let nurseName=$('#nurseName').val()
                let nurseSalary=$('#nurse_salary').val()
                let nurseMobile=$('#nurseMobile').val()
                let nurseFatherName=$('#nurseFatherName').val()
                let nurseMotherName=$('#nurseMotherName').val()                
                let nurseBirthDate=$('#nurseBirthDate').val()
                let nurseMaritualStatus=$('#nurseMaritualStatus').val()
                let nursePhoto=1
                let nurseGender=$('#nurseGender').val()

                let nurseNationality=$('#nurseNationality').val()
                let nurseReligion=$('#nurseReligion').val()
                let nursePresentAddress=$('#nursePresentAddress').val()
                let nursePermanentAddress=$('#nursePermanentAddress').val()
              


   

if(nurseName && nurseMobile && nurseFatherName && nurseMotherName && nurseBirthDate && nurseMaritualStatus && nursePhoto && nurseGender && nurseNationality && nurseReligion && nursePresentAddress && nursePermanentAddress  && nurseSalary){

$(':input[type="submit"]').prop('disabled', false);


}else{

    if(nurseName==""){
            $('#error_nurse_name').show()
    }else if(nurseMobile==""){
        $('#error_nurse_mobile').show()

    }else if(nurseFatherName==""){
         $('#error_nurse_father_name').show()

    }else if(nurseMotherName==""){
         $('#error_nurse_mother_name').show()

    }else if(nurseBirthDate==""){
          $('#error_nurse_dob').show()

    }else if(nurseMaritualStatus==""){
           $('#error_nurse_status').show()

    }else if(nurseSalary==""){
        $('#error_nurse_salary').show()


    }
    else if(nursePhoto==""){
           $('#error_nurse_photo').show()
    }else if(nurseGender==""){
      $('#error_nurse_gender').show()
    }else if(nurseNationality==""){

           $('#error_nurse_nationality').show()

    }else if(nurseReligion==""){
        $('#error_nurse_religion').show()

    }else if(nursePresentAddress==""){
          $('#error_nurse_present_address').show()
    }
    
    else if(nursePermanentAddress==""){
         $('#error_nurse_permanent_address').show()
    }




    



}






       


       })


       

</script>




@endpush

