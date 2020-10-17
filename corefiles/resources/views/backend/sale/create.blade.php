@extends('backend.app')
@section('title',"Add  Product Sale")
@push('css')

        <link href="{{asset('backend/assets/libs/multiselect/css/multi-select.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('backend/assets/libs/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('backend/assets/libs/selectize/css/selectize.bootstrap3.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('backend/assets/libs/bootstrap-select/css/bootstrap-select.min.css')}}" rel="stylesheet" type="text/css" />
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
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Product</a></li>

                    </ol>
                </div>
                <h4 class="page-title">Sale</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <form action="{{ route('product.sale') }}" method="post">

      @csrf
    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-body">


                  <div class="row">


                    <h3 id="showError" style="color: red;display: none" class="text-center"> Please select Customer or Product</h3>
                  </div>
                    <div class="row">

                       <div class="col-md-2">
                            <label for="selected_product">Customer</label>
                            <select class="form-control CustomerId"  id="customer_id" name="customer_id" required>
                                <option>Select Customer </option>
                                @foreach ($customers as $item)




                                <option value="{{$item->id}}">{{$item->customer_name}} -- {{$item->customer_mobile}} </option>
                                @endforeach
                            </select>
                        </div>


                        <div class="col-md-2">
                            <label for="selected_product">Product</label>
                            <select class="form-control select2-hidden-accessible" data-toggle="select2" data-select2-id="1" tabindex="-1" aria-hidden="true" id="selected_productss">
                                <option>Select Product </option>
                                @foreach ($products as $item)


                                @php
                                                $totalStock=App\Model\Stock::where('product_id', $item->id)->sum('product_in_qty');
                                                $totalSale=App\Model\Stock::where('product_id', $item->id)->sum('product_out_qty');
                                                $availQty=$totalStock-$totalSale;
                                @endphp




                                <option value="{{$item->id}}">{{$item->product_name}} -- {{$availQty}} Pcs </option>
                                @endforeach
                            </select>
                        </div>

                    <div class="col-md-2">

                        <label for="product_qty">Qty</label>
                          <div class="input-group">

                                  <input type="text" class="form-control"  value="" name="pro_qty" id="pro_qty" >


                                </div>



                    </div>


                     <div class="col-md-2">

                        <label for="product_qty">Price</label>
                           <div class="input-group">

                                  <input type="text" class="form-control"  value=""  name="pro_price"  id="pro_price" >


                                </div>



                    </div>

                      <div class="col-md-2 mb-3">
                                <label for="total_price">Total</label>
                                <!-- Input group -->
                                <div class="input-group">

                                  <input type="text" class="form-control"  value="" name="total_price" id="total_price" >


                                </div>
                              </div>




                    <div class="col-md-2  pt-3">

                        <button type="button" id="btn-product_added" class="btn btn-primary">
                            <i class="fa fa-plus-circle"></i> Add
                        </button>

                    </div>

                    </div>

                </div>


                    <div class="row">
                        <div class="col-lg-8">
                            <div class="table-responsive">
                                <table class="table table-borderless table-centered mb-0" id="show-tests">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                            <th style="width: 50px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                    </tbody>
                                </table>
                            </div> <!-- end table-responsive-->

                            <!-- Add note input-->
                            <div class="mt-3">
                                <label for="example-textarea">Add a Note:</label>
                                <textarea class="form-control" id="example-textarea" rows="3" cols="3" placeholder="Write some note.." name="notation"></textarea>
                            </div>

                            <!-- action buttons-->
                            <div class="row mt-4">
                                <div class="col-sm-6">

                                </div> <!-- end col -->
                                <div class="col-sm-6">
                                    <div class="text-sm-right">
                                        <button type="submit" class="btn btn-danger" id="btn_sale" style="display: "><i class="mdi mdi-cart-plus mr-1"></i> Checkout </button>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row-->
                        </div>
                        <!-- end col -->

                        <div class="col-lg-4">
                            <div class="border p-3 mt-4 mt-lg-0 rounded">
                                <h4 class="header-title mb-3">Order Summary</h4>

                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <tbody>
                                            <tr>




                                                  <div class="float-right text-right p-4 border" >
                        <p>
                           <h4>Total Price :</h4>  <span id="total_Amount" style="font-size:20px">0.00</span> Tk

                           <input type="hidden" value="" name="total_amount" id="t_amount">

                          </p>



                          <p style="">
                            Discount Type:
                           <select  name="discount_type" id='discount_type' class="text-right border">
                               <option value="flat">Flat </option>
                               <option value="percentage">percentage </option>
                           </select><br>
                           <br>
                              Discount Amount:

                        <input type="text" name="dis_amount" id="dis_amount" value="0">
                             <br>
                        </p>


                        <p>
                            Customer Pay :
                            <input type="text" name="customer_pay" id="customer_pay" value="" class="text-right border">
                            <br>
                        </p>

                        <p style="">
                            <label class="pull-left"> Payment Methods:</label>

                           <select  name="pay_method"  class="text-left border form-control">

                               <option value="">Select Method </option>

                                @foreach ($accounts as $item)
                                <option value="{{ $item->id }}">{{ $item->account_name }} </option>
                                @endforeach

                           </select><br>

                             <br>
                        </p>





                        <p>
                            <b style="color:red">Due</b> :
                            <span id="due">0.00</span>
                        </p>



                    </div>

                                                                </tr>
                                          <!--   <tr>
                                                <td>Discount : </td>
                                                <td>-$157.11</td>
                                            </tr>
                                            <tr>
                                                <td>Shipping Charge :</td>
                                                <td>$25</td>
                                            </tr>
                                            <tr>
                                                <td>Estimated Tax : </td>
                                                <td>$19.22</td>
                                            </tr>
                                            <tr>
                                                <th>Total :</th>
                                                <th>$1458.3</th>
                                            </tr> -->
                                        </tbody>
                                    </table>
                                </div>
                                <!-- end table-responsive -->
                            </div>


                        </div> <!-- end col -->

                    </div> <!-- end row -->
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->



    </div>
    </form>
    <!-- end row -->

</div> <!-- container -->

@endsection


@push('js')


 <script src="{{asset('backend/assets/libs/selectize/js/standalone/selectize.min.js')}}"></script>
 <script src="{{asset('backend/assets/libs/multiselect/js/jquery.multi-select.js')}}"></script>
<script src="{{asset('backend/assets/libs/select2/js/select2.min.js')}}"></script>
   <!-- Init js-->
 <script src="{{asset('backend/assets/js/pages/form-advanced.init.js')}}"></script>


 <script>


// $(window).load(function() {
//     confirm("Are You sure to Cance to delete?");
// if (result) {
//     //Logic to delete the item
// }

// });


let productCheck=[];
let countClick=0;




 $(document).ready(function () {
      $('.CustomerId').selectize({
          sortField: 'text'
      });
  });




$(document).ready(function(){



  $(document).on('change', '#selected_productss',  function() {


    $('#pro_qty').val(0)
    $('#total_price').val(0);

           var pro_id =  $('#selected_productss').find(":selected").val();

console.log(pro_id);

  var _token = '{{ csrf_token() }}';
$.ajax({
    url: "find/product/price",
    method: "POST",
    data: {_token:_token, pro_id:pro_id},
    dataType: "json",
    success: function (response) {


      console.log(response);

      $('#pro_price').val(response.sales_price);


    }
})



});




$("#pro_qty").keyup(function(){

  var  qty =$(this).val();

  if(qty==""){

    $('#total_price').val(0);

  }else{


   var product_price= $('#pro_price').val();;

 var total_amount=parseFloat(qty)*parseFloat(product_price);


    $('#total_price').val(total_amount);
  }

});


$("#pro_price").keyup(function(){

var  price =$(this).val();

if(price==""){

  $('#total_price').val(0);

}else{


 var pro_qty= $('#pro_qty').val();;

var total_amount=parseFloat(pro_qty)*parseFloat(price);

//  var pro_vats= 0;

  $('#total_price').val(total_amount);
}

});






$(document).on('click', '#btn-product_added',  function() {

    console.log(productCheck);


    var pro_qty = $('#pro_qty').val();
    if(pro_qty<=0){

        toastr.error('Invalid Product Quantity','Error',{
                        closeButton:true,
                        progressBar:true,
                    });


    }else{



    var pro_id =  $('#selected_productss').find(":selected").val()


    if(productCheck.indexOf(pro_id) !== -1){

        // alert("Value exists!")

        toastr.error('product already added','Error',{
                        closeButton:true,
                        progressBar:true,
                    });


    } else{

        productCheck.push(pro_id)





++countClick;


if(countClick>0){

    $('#showError').hide();

 $(':input[type="submit"]').prop('disabled', false);

}else{
    $('#showError').show();
     $(':input[type="submit"]').prop('disabled', true);

}

  $('#total_price').val(0);



// var productQty = $('#pro_qty').val();
var productPrice = $('#pro_price').val();


    // var pro_qty = $('#pro_qty').val();

        //    var pro_id = $(this).val();
        // alert(pro_id)



        if(pro_id){

           var _token = '{{ csrf_token() }}';
           $.ajax({
               url: "{{ route('sale.add.cart') }}",
               method: "POST",
               data: {_token:_token, pro_id:pro_id,pro_qty:pro_qty,productPrice:productPrice},
               dataType: "json",
               success: function (response) {

                   console.log(response)
                //    $('#table-head').show();
                //    console.log(response);
                    $('#show-tests').append(response);

                    $('#qtty').val('');
                    $('#pro_total').val(0);
                    $('#u_price').val(0);


                     getTotalPrice();

               }
           });
           }else{


            //   $("#pro_check").show();


           }
        }
    }


         });



     $(document).on('click', '.btn-remove', function() {


        var r = confirm("Are you sure to Remove Product");


        if(r==true){

            toastr.warning('Product has been Removed','Removed',{
                        closeButton:true,
                        progressBar:true,
                    });


      --countClick;

      if(countClick>0){
        $('#showError').hide();

     $(':input[type="submit"]').prop('disabled', false);
}else{
    $(':input[type="submit"]').prop('disabled', true);

    $('#showError').show();

}


// var myArray = ["cat","dog","mouse","rat","mouse","lion"]
var count = 0; // To keep a count of how many times the value is removed
for(var i=0; i<productCheck.length;i++) {
    //Here we are going to remove 'mouse'
    if(productCheck[i] == $(this).data('testid')) {
        productCheck .splice(i,1);
        count = count + 1;
    }
}



// let index= productCheck.indexOf($(this).data('testid'))
// productCheck.splice(index, 1);

// productCheck.includes($(this).data('testid'));


// console.log(productCheck);

// productCheck.pop($(this).data('testid'));

          $('#test_row_' + $(this).data('testid')).remove();
            getTotalPrice();
           $('#due').html(total_test_price() - $('#customer_pay').val());
        }else{

            toastr.info('Product has been cancled','Cancled',{
                        closeButton:true,
                        progressBar:true,
                    });
        }

       });


function getTotalPrice() {
          var totalamount= $('#total_Amount').html(total_test_price());
          console.log(totalamount);

         $('#t_amount').val(total_test_price())

       }
function total_test_price() {
           var total = 0;
           $('.total_amount').each(function(index, element) {
               total += parseInt(element.textContent);
           });

             // console.log(total);
           return total;
       }




       $("#dis_amount").keyup(function(){


var dis_type = $('#discount_type').val();


var  dis_amnt =$(this).val();

     if(dis_type=='percentage'){

         var total=total_test_price();

           var count_dis_value=( (parseFloat(total)*parseFloat(dis_amnt))/100);









         $('#due').html(Math.round(total_test_price() -  parseFloat(count_dis_value) ) );



     }
     else{

           $('#due').html(Math.round ((total_test_price() - $('#dis_amount').val() )) );


     }


     if(dis_amnt==''){


                    $('#due').html(Math.round(total_test_price()));
               }







});



$("#customer_pay").keyup(function(){

var dis_amouts = $('#dis_amount').val();

var dis_type = $('#discount_type').val();

var cust_pay=  $(this).val();




if(dis_type=='percentage'){



                 var total=total_test_price();

                   var count_dis_value=( (parseFloat(total)*parseFloat(dis_amouts))/100);

                   var final_result=parseFloat(cust_pay)+parseFloat(count_dis_value);




                   $('#due').html(Math.round(total_test_price() - final_result ) );


             }

             else{





 var final_result=parseFloat(dis_amouts)+parseFloat(cust_pay);


$('#due').html(Math.round(total_test_price() - final_result ) );


             }




           if(cust_pay==''){


                $('#due').html(Math.round(total_test_price()));
           }





});


          })




   $(document).on('click', '#btn_sale', function() {


      if(countClick>0){
        $('#showError').hide();

       $(':input[type="submit"]').prop('disabled', false);
}else{
     $(':input[type="submit"]').prop('disabled', true);

    $('#showError').show();

}
   })
</script>


@endpush
