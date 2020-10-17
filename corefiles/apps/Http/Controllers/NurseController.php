<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Nurse;
use App\Model\NurseExperience;
use App\Model\Reference;
use App\Model\NurseQualification;
use App\Model\NurseHistory;

use Illuminate\Support\Facades\Storage;
use Brian2694\Toastr\Facades\Toastr;
use PDF;

class NurseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index()
    {
        if(\Auth::user()->role->permissions->read!=1){
            Toastr::warning(' You are not able to  access this Feature',"Access Denied");
            return redirect()->back();
        }
        $datas=Nurse::latest()->paginate(50);
        return view('backend.nurse.index',compact('datas'));
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
        return view('backend.nurse.create');
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
                'name'=>'required',
                'mobile'=>'required',
                'father_name'=>'required',
                'mother_name'=>'required',
                'dob'=>'required',
                'maritual_status'=>'required',

                'nurse_salary'=>'required',
                'gender'=>'required',
                'nationality'=>'required',
                'religion'=>'required',

                'present_address'=>'required',
                'permanent_address'=>'required',
                'photo'=>'required|mimes:jpg,png,jpeg',
        ]);


        $nurseData=[];

// photo
        $nurseData['name']=$request->name;
        $nurseData['date']=date('Y-m-d');

        $nurseData['mobile']=$request->mobile;
        $nurseData['father_name']=$request->father_name;
        $nurseData['mother_name']=$request->mother_name;
        $nurseData['dob']=$request->dob;
        $nurseData['maritual_status']=$request->maritual_status;
        $nurseData['gender']=$request->gender;
        $nurseData['nationality']=$request->nationality;
        $nurseData['religion']=$request->religion;
        $nurseData['salary']=$request->nurse_salary;
        $nurseData['permanent_address']=$request->permanent_address;
        $nurseData['present_address']=$request->present_address;
        $nurseData['refer_name']=$request->refer_name;

            if($request->hasFile('photo')){
               $image=$request->file('photo');
               $imageName=mt_rand()."_".time();
               $imageOriginalName = $imageName."_".$image->getClientOriginalName();

            // //    Storage::disk('public')->put($imageOriginalName, 'nurse');


            // //    $image->move('nurse/', $imageOriginalName);


            //    $image->storeAs('nurse', $imageOriginalName);


               $request->photo->move(public_path('nurse'), $imageOriginalName);



            //    Storage::disk('public')->put($imageOriginalName, 'nurse');


            //    Storage::put('file.jpg', $contents, 'public');




            }


            $nurseData['photo']=$imageOriginalName;


           $nurse_obj= Nurse::create( $nurseData );
        //  dd($nurse_obj);





            /*Referal User information*/

            $checkRefUserInfo=$request->ref_user_name;

            if( $checkRefUserInfo){

               foreach($checkRefUserInfo as $key=>$ref_value){
                $referal_object =new Reference;

            $referal_object->nurse_id=$nurse_obj->id;
            $referal_object->referral_user_name=$request->ref_user_name[$key];
            $referal_object->referral_user_designation =$request->ref_user_designation[$key];
            $referal_object->referral_user_mobile_no = $request->ref_user_mobile[$key];
            $referal_object->referral_user_relation =$request->ref_use_relation[$key];
            $referal_object->referral_user_address =$request->ref_use_address[$key];
            $referal_object->save();




                }
            }

            /*Referal user information section end here*/




            
            $checkQulafication=$request->exam_name;

            if( gettype($request->exam_name)=='array'){

               foreach($checkQulafication as $key=>$examValues){
                $qualification_obj =new NurseQualification;

            $qualification_obj->nurse_id=$nurse_obj->id;
            $qualification_obj->exam_name=$request->exam_name[$key];
            $qualification_obj->group =$request->exam_group[$key];
            $qualification_obj->year = $request->exam_year[$key];
            $qualification_obj->grade =$request->exam_grade[$key];
            $qualification_obj->board =$request->exam_board[$key];
            $qualification_obj->save();




                }
            }



              // $output .= '<td> '.$request->orgName.'</td>';
            //   $output .= '<td >'.$request->orgName.' <input type="hidden" name="org_name[]" value="'.$request->orgName.'" />';
            //   $output .= '<td >'.$request->expYear.' <input type="hidden" name="exp_year[]" value="'.$request->expYear.'" />';
            //   $output .= '<td >'.$request->startinDate.' <input type="hidden" name="exp_starting_date[]" value="'.$request->startinDate.'" />';
            //   $output .= '<td >'.$request->endingDate.' <input type="hidden" name="exp_ending_date[]" value="'.$request->endingDate.'" />';


           
            if(gettype($request->org_name)=='array'){

                foreach($request->org_name as $key=>$orgName){

                    $experience_obj =new NurseExperience;




             $experience_obj->nurse_id=$nurse_obj->id;
             $experience_obj->org_name=$request->org_name[$key];
             $experience_obj->total_exp =$request->exp_year[$key];
             $experience_obj->starting_date = $request->exp_starting_date[$key];
             $experience_obj->ending_date =$request->exp_ending_date[$key];
             $experience_obj->save();




                 }
             }




            Toastr::success('Nurse has been Added',"success");

            return redirect()->route('nurse.index');




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
        if(\Auth::user()->role->permissions->update!=1){
            Toastr::warning(' You are not able to  access this Feature',"Access Denied");
        }

        $nurse_info=Nurse::find($id);
        $experience_info=NurseExperience::where('nurse_id',$id)->get();
        $qualification_info=NurseQualification::where('nurse_id',$id)->get();
        $referral_info=Reference::where('nurse_id',$id)->get();
        return  view('backend.nurse.edit',compact('nurse_info','experience_info','qualification_info','referral_info'));
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

            $nurseInfo=Nurse::find($id);
    $nurseData=[];

// photo
    $nurseData['name']=$request->name;
    $nurseData['date']=date('Y-m-d');

    $nurseData['mobile']=$request->mobile;
    $nurseData['father_name']=$request->father_name;
    $nurseData['mother_name']=$request->mother_name;
    $nurseData['dob']=$request->dob;
    $nurseData['maritual_status']=$request->maritual_status;
    $nurseData['gender']=$request->gender;
    $nurseData['nationality']=$request->nationality;
    $nurseData['religion']=$request->religion;
    $nurseData['salary']=$request->nurse_salary;
    $nurseData['permanent_address']=$request->permanent_address;
    $nurseData['present_address']=$request->present_address;
    $nurseData['refer_name']=$request->refer_name;

        if($request->hasFile('photo')){
            if($nurseInfo->photo){
                unlink('nurse/'.$nurseData->photo);
                 }

           $image=$request->file('photo');
           $imageName=mt_rand()."_".time();
           $imageOriginalName = $imageName."_".$image->getClientOriginalName();

        // //    Storage::disk('public')->put($imageOriginalName, 'nurse');


        // //    $image->move('nurse/', $imageOriginalName);


        //    $image->storeAs('nurse', $imageOriginalName);


           $request->photo->move(public_path('nurse'), $imageOriginalName);



        //    Storage::disk('public')->put($imageOriginalName, 'nurse');


        //    Storage::put('file.jpg', $contents, 'public');




        }else{
            $imageOriginalName=$nurseInfo->photo;
        }


        $nurseData['photo']=$imageOriginalName;


       $nurse_obj= Nurse::find($id)->update($nurseData);
    


    $nurseExtQualification=NurseQualification::where('nurse_id',$id)->get();



  $referral_info=Reference::where('nurse_id',$id)->get();


   foreach($referral_info as $item){

        $item->delete();

    }
/*Referal User information*/

            $checkRefUserInfo=$request->ref_user_name;

            if( $checkRefUserInfo){

               foreach($checkRefUserInfo as $key=>$ref_value){
                $referal_object =new Reference;

            $referal_object->nurse_id=$id;
            $referal_object->referral_user_name=$request->ref_user_name[$key];
            $referal_object->referral_user_designation =$request->ref_user_designation[$key];
            $referal_object->referral_user_mobile_no = $request->ref_user_mobile[$key];
            $referal_object->referral_user_relation =$request->ref_use_relation[$key];
            $referal_object->referral_user_address =$request->ref_use_address[$key];
            $referal_object->save();




                }
            }

            /*Referal user information section end here*/



    foreach($nurseExtQualification as $nurseEqft){

        $nurseEqft->delete();

    }


        $checkQulafication= is_array($request->exam_name);

        if( $checkQulafication){

           foreach($request->exam_name as $key=>$examValues){
            $qualification_obj =new NurseQualification;

        $qualification_obj->nurse_id=$id;
        $qualification_obj->exam_name=$request->exam_name[$key];
        $qualification_obj->group =$request->exam_group[$key];
        $qualification_obj->year = $request->exam_year[$key];
        $qualification_obj->grade =$request->exam_grade[$key];
        $qualification_obj->board =$request->exam_board[$key];
        $qualification_obj->save();




            }
        }



          // $output .= '<td> '.$request->orgName.'</td>';
        //   $output .= '<td >'.$request->orgName.' <input type="hidden" name="org_name[]" value="'.$request->orgName.'" />';
        //   $output .= '<td >'.$request->expYear.' <input type="hidden" name="exp_year[]" value="'.$request->expYear.'" />';
        //   $output .= '<td >'.$request->startinDate.' <input type="hidden" name="exp_starting_date[]" value="'.$request->startinDate.'" />';
        //   $output .= '<td >'.$request->endingDate.' <input type="hidden" name="exp_ending_date[]" value="'.$request->endingDate.'" />';




        $nurseExtExp=NurseExperience::where('nurse_id',$id)->get();


    foreach($nurseExtExp as $nurseexp){

        $nurseexp->delete();

    }


            $checkExperice=is_array($request->org_name);

        if($checkExperice){

            foreach($request->org_name as $key=>$orgName){

                $experience_obj =new NurseExperience;




         $experience_obj->nurse_id=$id;
         $experience_obj->org_name=$request->org_name[$key];
         $experience_obj->total_exp =$request->exp_year[$key];
         $experience_obj->starting_date = $request->exp_starting_date[$key];
         $experience_obj->ending_date =$request->exp_ending_date[$key];
         $experience_obj->save();




             }
         }




        Toastr::info('Nurse informatin=on has been Updated',"Updated");



        return redirect()->route('nurse.index');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if(\Auth::user()->role->permissions->delete!=1){
            Toastr::warning(' You are not able to  access this Feature',"Access Denied");
            return redirect()->back();
        }
       $nurseData= Nurse::find($id);
       if($nurseData->photo){
      unlink('nurse/'.$nurseData->photo);
       }

       $nurseData->delete();


       $qtyDatas=NurseQualification::where('nurse_id',$id)->get();


       if( $qtyDatas){


           foreach($qtyDatas as $qtyData){

               $qtyData->delete();
           }

       }


       $expDatas=NurseExperience::where('nurse_id',$id)->get();


       if( $expDatas){


           foreach($expDatas as $expData){

               $expData->delete();
           }

       }

       Toastr::warning('Nurse Data has been deleted',"Deleted");

     return redirect()->route('nurse.index');
    }


    public function addQutalification(Request $request){




        if ($request->ajax()) {

            $output  = '<tr id="test_row_'.$request->exam_qty.'">';



            $output .= '<input type="hidden" name="exam_name[]" value="'.$request->examName.'" />';
            $output .= '<td> '.$request->examName.' </td>';
             $output .= '<td >'.$request->examGroup.' <input type="hidden" name="exam_group[]" value="'.$request->examGroup.'" />';
             $output .= '<td >'.$request->examYear.' <input type="hidden" name="exam_year[]" value="'.$request->examYear.'" />';
             $output .= '<td >'.$request->examGrade.' <input type="hidden" name="exam_grade[]" value="'.$request->examGrade.'" />';
             $output .= '<td >'.$request->universityName.' <input type="hidden" name="exam_board[]" value="'.$request->universityName.'" />';

            $output .= '<td width="10%">
                        <button type="button" class="btn-remove btn btn-sm btn-danger"  data-testid="'.$request->exam_qty.'">
                            Delete
                        </button>
                        </td>';
            $output .= '</tr>';





            echo json_encode($output);
        }

    }


    public function addExpericence(Request $request){


            // return $request->all();
            if ($request->ajax()) {


                $output  = '<tr id="test_exp_row_'.$request->exp_qty.'">';



                // $output .= ''" />';
                // $output .= '<td> '.$request->orgName.'</td>';
                $output .= '<td >'.$request->orgName.' <input type="hidden" name="org_name[]" value="'.$request->orgName.'" />';
                 $output .= '<td >'.$request->expYear.' <input type="hidden" name="exp_year[]" value="'.$request->expYear.'" />';
                 $output .= '<td >'.$request->startinDate.' <input type="hidden" name="exp_starting_date[]" value="'.$request->startinDate.'" />';
                 $output .= '<td >'.$request->endingDate.' <input type="hidden" name="exp_ending_date[]" value="'.$request->endingDate.'" />';

                $output .= '<td width="10%">
                            <button type="button" class="btn-remove-nurse btn btn-sm btn-danger"  data-exp_testid="'.$request->exp_qty.'">
                                Delete
                            </button>
                            </td>';
                $output .= '</tr>';





                echo json_encode($output);



            }



    }


    public  function addReferences(Request $request)
    {
        // return ($request->all());


        if ($request->ajax()) {


            $output  = '<tr id="test_ref_row_'.$request->referral_qty.'">';



            // $output .= ''" />';
            // $output .= '<td> '.$request->orgName.'</td>';
            $output .= '<td >'.$request->refUserName.' <input type="hidden" name="ref_user_name[]" value="'.$request->refUserName.'" />';
             $output .= '<td >'.$request->refUserDesignation.' <input type="hidden" name="ref_user_designation[]" value="'.$request->refUserDesignation.'" />';
             $output .= '<td >'.$request->refuserMobileNo.' <input type="hidden" name="ref_user_mobile[]" value="'.$request->refuserMobileNo.'" />';
             $output .= '<td >'.$request->refUserRelation.' <input type="hidden" name="ref_use_relation[]" value="'.$request->refUserRelation.'" />';
             $output .= '<td >'.$request->refUserAddress.' <input type="hidden" name="ref_use_address[]" value="'.$request->refUserAddress.'" />';

            $output .= '<td width="10%">
                        <button type="button" class="btn-remove-nurse-reference btn btn-sm btn-danger"  data-ref_testid="'.$request->referral_qty.'">
                            Delete
                        </button>
                        </td>';
            $output .= '</tr>';





            return json_encode($output);



        }
    }

    public function downloadCv($id)
    {
         
    //    return view('backend.pdf.index');
         $info=Nurse::find($id);
         $education_info=NurseQualification::where('nurse_id',$id)->get();    
         $nurseExtExp=NurseExperience::where('nurse_id',$id)->get();
         $referral_info=Reference::where('nurse_id',$id)->get();
         $data = ['info' => $info,'education_info'=>$education_info,'reference_info'=>$referral_info,'exp_info'=>$nurseExtExp];
         $pdf = PDF::loadView('backend.pdf.index', $data);
   
          return $pdf->download(time().'.pdf');
    }


    public function nurseWorkingHistory(Request $request){

     
 
        $month=$request->month."-".$request->year;


        
        $datas=NurseHistory::with('patient')->where(['nurse_id'=>$request->nurse_id,'month'=>$month])->get();
        $salary=NurseHistory::with('patient')->where(['nurse_id'=>$request->nurse_id,'month'=>$month])->sum('amount');


        return view('backend.history.nurse_working_record',compact('datas','salary'));
    }
}
