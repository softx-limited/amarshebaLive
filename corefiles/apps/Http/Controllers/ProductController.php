<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Stock;
use Brian2694\Toastr\Facades\Toastr;
class ProductController extends Controller
{

    
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\Auth::user()->role->permissions->read!=1){
            Toastr::warning(' You are not able to  access this Feature',"Access Denied");
            return redirect()->back();
        }
        $datas=Product::latest()->paginate(6);
        
        return view('backend.product.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(\Auth::user()->role->permissions->create!=1){
            Toastr::warning(' You are not able to  access this Feature',"Access Denied");
            return redirect()->back();
        }
        return view('backend.product.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(\Auth::user()->role->permissions->create!=1){
            Toastr::warning(' You are not able to  access this Feature',"Access Denied");
            return redirect()->back();
        }
        $request->validate([
                'product_name'=>'required',
                'purchase_price'=>'required',
                'sales_price'=>'required'
        ]);


            $productInfo=[];

            $productInfo['product_name']=$request->product_name;
            $productInfo['purchase_price']=$request->purchase_price;
            $productInfo['sales_price']=$request->sales_price;


            if($request->hasFile('photo')){
                $image=$request->file('photo');
                $imageName=mt_rand()."_".time();
                $imageOriginalName = $imageName."_".$image->getClientOriginalName(); 
 
             // //    Storage::disk('public')->put($imageOriginalName, 'nurse');
 
 
             // //    $image->move('nurse/', $imageOriginalName);
 
 
             //    $image->storeAs('nurse', $imageOriginalName);
 
 
                $request->photo->move(public_path('product'), $imageOriginalName);
 
 
 
             //    Storage::disk('public')->put($imageOriginalName, 'nurse');
 
 
             //    Storage::put('file.jpg', $contents, 'public');
 
 
 
               
             }
             $productInfo['photo']=$imageOriginalName;

            $productObj=Product::create($productInfo);

            if($request->stock_qty>0){


                $productStock=new Stock;

                $productStock->date=date('Y-m-d');
                $productStock->month= date("M-Y");
                $productStock->invoice_no= "opng".'_'.time();
                $productStock->product_id=  $productObj->id;             
                $productStock->product_in_qty=$request->stock_qty;      
                $productStock->created_by=\Auth::user()->name;     
                $productStock->save();     
               

            }

            Toastr::success('Product has been Added',"success");

            return redirect()->route('product.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=Product::find($id);
        return view('backend.product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(\Auth::user()->role->permissions->update!=1){
            Toastr::warning(' You are not able to  access this Feature',"Access Denied");
            return redirect()->back();
        }
        
        $productExtInfo=Product::find($id);

        $productInfo=[];

            $productInfo['product_name']=$request->product_name;
            $productInfo['purchase_price']=$request->purchase_price;
            $productInfo['sales_price']=$request->sales_price;


            if($request->hasFile('photo')){

                if($productExtInfo->photo){
                    unlink('product/'.$productExtInfo->photo);
                     }

                $image=$request->file('photo');
                $imageName=mt_rand()."_".time();
                $imageOriginalName = $imageName."_".$image->getClientOriginalName(); 
 
             // //    Storage::disk('public')->put($imageOriginalName, 'nurse');
 
 
             // //    $image->move('nurse/', $imageOriginalName);
 
 
             //    $image->storeAs('nurse', $imageOriginalName);
 
 
                $request->photo->move(public_path('product'), $imageOriginalName);
 
 
 
             //    Storage::disk('public')->put($imageOriginalName, 'nurse');
 
 
             //    Storage::put('file.jpg', $contents, 'public');
 
 
 
               
             }
             $productInfo['photo']=$productExtInfo->photo;



             $productExtInfo=Product::find($id)->update( $productInfo);


             if($request->stock_qty>0){


                $productStock=new Stock;

                $productStock->date=date('Y-m-d');
                $productStock->month= date("M-Y");
                $productStock->invoice_no= "opng".'_'.time();
                $productStock->product_id=$id;             
                $productStock->product_in_qty=$request->stock_qty;      
                $productStock->created_by=\Auth::user()->name;     
                $productStock->save();     
               

            }



            Toastr::info('Product has been Updated',"Updated");

            return redirect()->route('product.index');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        if(\Auth::user()->role->permissions->delete!=1){
            Toastr::warning(' You are not able to  access this Feature',"Access Denied");
            return redirect()->back();
        }

        $productExtInfo=Product::find($id);

        if($productExtInfo->photo){
            unlink('product/'.$productExtInfo->photo);
             }


             $productExtInfo->delete();


             $productStock=Stock::where('product_id',$id)->get();
             if( $productStock){
             foreach($productStock as $stock){

                $stock->delete();


             } }

             Toastr::warning('Product has been Deleted',"Deleted");

            return redirect()->route('product.index');

        

    }
}
