<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\patient\ThyroidDiagnosis;
use App\Models\patient\DoctorNurse;
use App\Models\User;
use Carbon\Carbon;
use DB;

class NurseLoginWeb extends Controller
{
    //
    public function nurseTask()
    {    

        $user_id=auth('doctor')->user()->id;
        $user=DB::table('doctors')->select('id','role_id','user_type')->where('id',$user_id)->first();

        if($user->role_id =="1"){ 
            $nurse_tasks=DB::table('tasks')->where('test_type','!=','other')->orderBy('created_at', 'DESC')->get();
            return view('back/doctor_task', compact('nurse_tasks'));   
        }     

        elseif($user->role_id =="10" || $user->role_id =="11"){
            $nurse_tasks = DB::table('tasks')->where('test_type','!=','other')->orderBy('created_at', 'DESC')->get();
            return view('back/receptionist_task', compact('nurse_tasks'));
        }

        elseif($user->role_id =="2"){
            $nurse_tasks=DB::table('tasks')->where('test_type','!=','other')->orderBy('created_at', 'DESC')->where('assigned','!=','9')->where('assignTo',$user->id)->get();
         //   dd($nurse_tasks);
            return view('back/nurse_task', compact('nurse_tasks'));
        }

        elseif($user->user_type =="pathology" || $user->user_type =="radiology"){
          
             $nurse_tasks=DB::table('tasks')->where('test_type','!=','other')->orderBy('created_at', 'DESC')->where('assignToLabPerson',$user->id)->whereNotNull('assignToLab')->where('assignToLab','1')->get();
            return view('back/lab_task', compact('nurse_tasks'));
        }

      $nurse_tasks= DB::table('nurse_tasks')->where('test_type','!=','other')->where('nurse_id',$user_id)->get();
      

    }



    public function taskAssignedToNurse(Request $request)
    {


        $task_id=(int)$request->task_id;
        $nurse_id=(int)$request->nurse;
        $date=$request->date;
        
        $receptionists= DB::table('tasks')->where('id',$task_id)->update(['assigned'=>'4', 'assignTo'=>$nurse_id, 'assignDate'=>$date]);
        if(!empty($receptionists)){
            return response()->json(['error' => 200]);
        }

    }


    public function taskAssignedToLab(Request $request)
    {

         $task_id  = (int)$request->task_id;
         $lab_id   = (int)$request->lab_id;
         $labType  = $request->assignPerson;

         $labAssign= DB::table('tasks')->where('id',$task_id)->update(['assigned'=>'5','assignToLab'=>$lab_id,'assignToLabPerson'=>$labType]);

        //    if(!empty($labAssign))
        //    {
            return response()->json(['error' => 200]);
         //  }
    }


    public function labDocumentUpload(Request $request)
    {
        $task_id=(int)$request->task_id;

        if ($request->file('document') != '')
        {
            $document = $request->file('document');
            $rename_document = rand() . '.' . $document->getClientOriginalExtension();
            $document->move(public_path('assets/labTestDocument'), $rename_document);
        }

        $result=  DB::table('tasks')->where('id',$task_id)->update(['labDocument'=>$rename_document,'assigned'=>'7','appoinment_date'=>now()]);
        if(!empty($result)){
            return response()->json(['error' => 200]);
        }
    }

    public function approveDocument(Request $request)
    {
        $result=  DB::table('tasks')->where('id',$request->input('taskId'))->update(['approveDocumentSts'=>'1']);
        return redirect()->back();
    }

    public function rejectDocument(Request $request)
    {
        $result=  DB::table('tasks')->where('id',$request->input('taskId'))->update(['approveDocumentSts'=>'0']);
        return redirect()->back();
    }

    public function referalPatient(Request $request)
    {

        if($request->input('patient_id'))
        {
            $patientId = decrypt($request->input('patient_id'));
        }
         else
         {
            $patientId = $request->session()->get('id');
        }
        
        $doctorIds = $request->input('doctorId'); // Assuming this is an array of doctor IDs

        if($doctorIds)
        {
                $countDoctors = count($doctorIds);
                DB::table('users')->where('id', $patientId)->update([      
                                                'referal_status' => '1',
                                                'check_edit_referal' =>$request->input('checkViewPatient')??'0'
                                            ]);

                for ($i = 0; $i < $countDoctors; $i++) {  
                                DB::table('doctors')->where('id', $doctorIds[$i])->update([      
                                    'referal_status' => '1'
                                ]);
                
                    $exists = DB::table('referal_patients')
                                        ->where('patient_id', $patientId)
                                        ->where('doctor_id', $doctorIds[$i])
                                        ->exists();
                                        
                    if ($request->file('uplaodDocument') != '')
                    {
                        $uplaodDocument = $request->file('uplaodDocument');
                        $upload_uplaodDocument = rand() . '.' . $uplaodDocument->getClientOriginalExtension();
                        $uplaodDocument->move(public_path('assets/referalDocument'), $upload_uplaodDocument);
                    }
                    else{
                        $upload_uplaodDocument='';
                    }
                    if (!$exists) {
                        DB::table('referal_patients')->insert(
                                        [
                                            'patient_id' => $patientId,
                                            'patient_summary' => $request->input('patientSummary'),
                                            'doctor_id' => $doctorIds[$i],
                                            'referal_doctor' =>auth('doctor')->user()->id,
                                            'upload_document' =>$upload_uplaodDocument
                                        ]);
                    }
                    else{
                        return redirect()->back()->with('referralAlreadyRfd', 'Patient Already Referred!');

                    }
                }
                return redirect()->back()->with('referralMessage', 'Patient referred successfully!');
        }
        else{
            return redirect()->back()->with('referralError', 'pokj');
        }
                                    


        
    }
}