<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Customer;
use App\Model\Account;
use App\Model\SalesInvoice;
use App\Model\SalesMaster;
use App\Model\Income;
use App\Model\CustomerHistory;
use App\Model\AccountHistory;
use App\Model\Discount;
use App\Model\Stock;

use Brian2694\Toastr\Facades\Toastr;

use Auth;

class SaleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index(){
        if(\Auth::user()->role->permissions->read!=1){
            Toastr::warning(' You are not able to  access this Feature',"Access Denied");
            return redirect()->back();
        }

        $products=Product::latest()->get();
        $customers=Customer::latest()->get();
        $accounts=Account::latest()->get();


        return view('backend.sale.create',compact('products','customers','accounts'));


    }


    // find Product info


     public function findProductInfo(Request $request)
    {
        $products=Product::find($request->pro_id);

        return $products;
    }


    public function CartProducts(Request $request){

      // return $request->all();


      if(\Auth::user()->role->permissions->create!=1){
        Toastr::warning(' You are not able to  access this Feature',"Access Denied");
        return redirect()->back();
    }



        if ($request->ajax()) {

             $product = Product::find($request->pro_id);



        $totalAmount= $request->productPrice*$request->pro_qty;

             $output  = '<tr id="test_row_'.$request->pro_id.'">';

             $output .= '<input type="hidden" name="pro_id[]" value="'.$request->pro_id.'" />';
             $output .= '<td> '.$product->product_name.' </td>';
            //  $output .= '<td> '.$product->product_name.' </td>';

             $output .= ' </td> <td >'.$request->productPrice.'</td> <input type="hidden" name="unit_price[]" value="'.$request->productPrice.'" /> ';

              $output .= '<td >'.$request->pro_qty.' <input type="hidden" name="pro_qty[]" value="'.$request->pro_qty.'" />';



        $output .= ' </td> <td class="total_amount" >'.$totalAmount.'</td> <input type="hidden" name="total_amount[]" value="'.$totalAmount.'" /> ';


             // $output .= '<td class="test-price" >'.$totalPrice.'</td> <input type="hidden" class="total_amount" name="total_amount[]" value="'.$totalPrice.'" /> ';

             $output .= '<td width="10%">
                         <button type="button" class="btn-remove btn btn-sm btn-danger"  data-testid="'.$request->pro_id.'">
                             Delete
                         </button>
                         </td>';
             $output .= '</tr>';





             echo json_encode($output);

         } }

         public function saleProduct(Request $request)
         {


            $request->validate([

                'customer_id'=>'required',
                'total_amount'=>'required',
                'pro_id'=>'required',
                'pro_qty'=>'required',

            ]);

            /*

                


 





            */


        $month=date('F-Y');
        $date=date('Y-m-d');

        $invoice_no='sale_'.rand(0,9).time();
            /*Sales Invoice Route start here*/

                    if($request->pro_qty && $request->pro_id ){
                        foreach ($request->pro_id as $key => $item) {

                     if($request->pro_qty[$key]>0){
                            $productStock=new Stock;
                            $productStock->date=$date;
                            $productStock->month= $month;
                            $productStock->invoice_no=$invoice_no;
                            $productStock->product_id=$request->pro_id[$key];             
                            $productStock->product_out_qty=$request->pro_qty[$key];      
                            $productStock->created_by=\Auth::user()->name;     
                            $productStock->save();    
                           

                        }


                        $product=Product::find($request->pro_id[$key]);                             
                        $salesInvoice=new SalesInvoice;
                        $salesInvoice->date=$date;
                        $salesInvoice->month=$month;
                        $salesInvoice->invoice_no=$invoice_no;
                        $salesInvoice->product_id=$request->pro_id[$key];
                        $salesInvoice->product_name=$product->product_name;
                        $salesInvoice->product_qty=$request->pro_qty[$key];
                        $salesInvoice->product_price=$request->unit_price[$key];
                        $salesInvoice->total=$request->pro_qty[$key]*$request->unit_price[$key];
                        $salesInvoice->save();


                        }
                        

                    }

                /*Sales Invoice Route End*/



                /*Sales Master Data Entried*/



                /*Discount Calculation*/




            if($request->discount_type=='percentage'){

                $dis_amount=($request->total_amount*$request->dis_amount)/100; 

                $dis_amount=(int) $dis_amount;       


            }else{            



                $dis_amount=(int)$request->dis_amount;
            } 


                /*Discount Calculation End*/


                   $customerInfo=Customer::find($request->customer_id);  

                    $salesMaster=new SalesMaster;
                    $salesMaster->date=$date;
                    $salesMaster->month=$month;
                    $salesMaster->invoice_no=$invoice_no;
                    $salesMaster->customer_id=$request->customer_id;
                    $salesMaster->customer_name=$customerInfo->customer_name;
                    $salesMaster->total_amount=$request->total_amount;
                    $salesMaster->discount_amount=$dis_amount;
                    $salesMaster->payment=$request->customer_pay;
                    $salesMaster->due=($request->total_amount-$dis_amount)-$request->customer_pay;

                    if($request->pay_method){
                            $accountInfo=Account::find($request->pay_method);

                            $salesMaster->account_id=$request->pay_method;
                            $salesMaster->account_name=$accountInfo->account_name;

                          /*Account History Start here*/

                           $accountHistory=new AccountHistory;
                           $accountHistory->date=$date;
                           $accountHistory->month=$month;
                           $accountHistory->account_id=$request->pay_method; 
                           $accountHistory->account_name=$accountInfo->account_name;
                           $accountHistory->debit_amount=$request->customer_pay;  /* if the Customer pay */  
                           $accountHistory->save();  

                          /*Account History End here*/

                          /*income Entry section*/
        
                            $incomeObj=new Income;
                            $incomeObj->date=$date;
                            $incomeObj->month=$month;
                            $incomeObj->notation="Income from  Sale";
                            $incomeObj->category_name="sale";
                            $incomeObj->amount=$request->customer_pay??0 ;
                            $incomeObj->save();
    
    
    
    

                    /*income Entry section End*/




                    }

                    $salesMaster->save();

                  /*Sales Master Data Entried*/

                  /*Customer Account Historytart here*/

                $custAccountHistory=new CustomerHistory;    
                $custAccountHistory->date=$date;
                $custAccountHistory->month=$month;
                $custAccountHistory->customer_id=$request->customer_id;
                $custAccountHistory->customer_name=$customerInfo->customer_name;
                $custAccountHistory->invoice_no=$invoice_no;
                $custAccountHistory->credit_amount=$request->total_amount- $dis_amount;
                $custAccountHistory->debit_amount=$request->customer_pay?? 0;
                $custAccountHistory->created_by=Auth::user()->name??'Unknown';
                $custAccountHistory->save();
                  /*Customer Account History  End here*/


                  /*Discount Calculation section Start here*/

                  if($request->dis_amount){
                  $disObj=new Discount;
                  $disObj->date=$date;
                  $disObj->month=$month;
                  $disObj->invoice_no=$invoice_no;
                  $disObj->discount_type=$request->discount_type;
                  $disObj->discount_amount=$dis_amount;
                  $disObj->save();

                  }

                  /*Discount Calculation section End here*/

                  Toastr::success('Your Product has been sold','Success');
                return redirect()->back();

         }


            public function allInvoiceList(Type $var = null)
            {
                 
                $datas=SalesMaster::latest()->paginate(30);


                return view('backend.invoice.invoice-list',compact('datas'));
            }
        


        public function showCustomerInvoice($invoiceNo)
        {   
            $data=SalesMaster::where('invoice_no',$invoiceNo)->first();

            return view('backend.invoice.invoice',compact('data'));
        }

        }
