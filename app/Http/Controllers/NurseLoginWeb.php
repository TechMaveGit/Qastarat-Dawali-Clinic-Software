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
        $user=DB::table('doctors')->select('id','user_type')->where('id',$user_id)->first();
       

        if($user->user_type =="doctor"){
            $nurse_tasks=DB::table('nurse_tasks')->where('doctor_id',$user_id)->get();
            return view('back/doctor_task', compact('nurse_tasks'));
        }elseif($user->user_type =="Coordinator"){
            $nurse_tasks=DB::table('nurse_tasks')->where('nurse_id',$user_id)->get();
            return view('back/coordinator_task', compact('nurse_tasks'));
        }
        elseif($user->user_type =="Receptionist"){
            $receptionists= DB::table('receptionist_tasks')->where('receptionist_id',$user_id)->pluck('nurse_task_id');
            $nurse_tasks=DB::table('nurse_tasks')->whereIn('id',$receptionists)->get();
            return view('back/receptionist_task', compact('nurse_tasks'));
        }
        elseif($user->user_type =="Nurse"){
            $nurse_has_tasks= DB::table('nurse_has_tasks')->where('nurse_id',$user_id)->pluck('nurse_task_id');
            $nurse_tasks=DB::table('nurse_tasks')->whereIn('id',$nurse_has_tasks)->get();
            return view('back/nurse_task', compact('nurse_tasks'));
        }
        elseif($user->user_type =="pathology" || $user->user_type =="radiology"){
           
            $lab_has_tasks= DB::table('lab_has_tasks')->where('lab_id',$user_id)->pluck('nurse_task_id');
            $nurse_tasks=DB::table('nurse_tasks')->whereIn('id',$lab_has_tasks)->get();
            return view('back/lab_task', compact('nurse_tasks'));
        }

    //    $nurse_tasks= DB::table('nurse_tasks')->where('nurse_id',$user_id)->get();
       
        

       
    }

    public function taskAssignedToNurse(Request $request)
    {
        $task_id=(int)$request->task_id;
        $nurse_id=(int)$request->nurse;
        $date=$request->date;
        $time=$request->time;
        $dataInsertedToNurse=[];
        $receptionists= DB::table('receptionist_tasks')->where('nurse_task_id',$task_id)->update(['status'=>'assigned_to_nurse','appoinment_date'=>$date,'appoinment_time'=>$time]);

        $dataInsertedToNurse=[
        'nurse_task_id'=> isset($task_id) ? $task_id : null,
        'nurse_id'=> isset($nurse_id) ? $nurse_id : null,
        'appoinment_date'=> isset($date) ? $date : null,
        'appoinment_time'=> isset($time) ? $time : null,

        ];
      $nurse_has_tasks_inserted_id=  DB::table('nurse_has_tasks')->insertGetId($dataInsertedToNurse);

        if(!empty($nurse_has_tasks_inserted_id)){
            return response()->json(['error' => 200]);
        }
       
    }


    public function taskAssignedToLab(Request $request)
    {
       
        
        $task_id=(int)$request->task_id;
        $lab_id=(int)$request->lab_id;
        $dataInsertedToLab=[];
        $nurse_has_tasks= DB::table('nurse_has_tasks')->where('nurse_task_id',$task_id)->update(['status'=>'assigned_to_lab']);

        $dataInsertedToLab=[
            'nurse_task_id'=> isset($task_id) ? $task_id : null,
            'lab_id'=> isset($lab_id) ? $lab_id : null,
            ];

        $lab_has_tasks_inserted_id=  DB::table('lab_has_tasks')->insertGetId($dataInsertedToLab);

        if(!empty($lab_has_tasks_inserted_id)){
            return response()->json(['error' => 200]);
        }
    }

    public function labDocumentUpload(Request $request)
    {
            // dd($request->all());
            $task_id=(int)$request->task_id;
        if ($request->file('document') != '') {
            $document = $request->file('document');
            $rename_document = rand() . '.' . $document->getClientOriginalExtension();
            $document->move(public_path('assets/labTestDocument'), $rename_document);
           
        }
        $result=  DB::table('lab_has_tasks')->where('nurse_task_id',$task_id)->update(['document'=>$rename_document,'status'=>'lab_report_uploaded','appoinment_date'=>now()]);
        if(!empty($result)){
            return response()->json(['error' => 200]);
        }
        
    }
}
