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
            $nurse_tasks=DB::table('nurse_tasks')->orderBy('created_at', 'DESC')->where('doctor_id',$user_id)->get();
            return view('back/doctor_task', compact('nurse_tasks'));
        }

        elseif($user->role_id =="10" || $user->role_id =="11"){
            $nurse_tasks = DB::table('tasks')->orderBy('created_at', 'DESC')->get();
            return view('back/receptionist_task', compact('nurse_tasks'));
        }

        elseif($user->role_id =="2"){
            $nurse_tasks=DB::table('tasks')->orderBy('created_at', 'DESC')->where('assigned','!=','9')->where('assignTo',$user->id)->get();
            return view('back/nurse_task', compact('nurse_tasks'));
        }


        elseif($user->user_type =="pathology" || $user->user_type =="radiology"){
            $nurse_tasks=DB::table('tasks')->orderBy('created_at', 'DESC')->where('assignToLabPerson',$user->id)->whereNotNull('assignToLab')->where('assignToLab','1')->get();
            return view('back/lab_task', compact('nurse_tasks'));
        }

      $nurse_tasks= DB::table('nurse_tasks')->where('nurse_id',$user_id)->get();

    }



    public function taskAssignedToNurse(Request $request)
    {

      //  return $request->all();

        $task_id=(int)$request->task_id;
        $nurse_id=(int)$request->nurse;
        $date=$request->date;
        $receptionists= DB::table('tasks')->where('id',$task_id)->update(['assigned'=>'4', 'assignTo'=>$nurse_id, 'assignDate'=>$date]);
        if(!empty($receptionists)){
            return response()->json(['error' => 200]);
        }

    //     $task_id=(int)$request->task_id;
    //     $nurse_id=(int)$request->nurse;
    //     $date=$request->date;
    //     $time=$request->time;
    //     $dataInsertedToNurse=[];

    //     $receptionists= DB::table('receptionist_tasks')->where('nurse_task_id',$task_id)->update(['status'=>'assigned_to_nurse','appoinment_date'=>$date,'appoinment_time'=>$time]);

    //     $dataInsertedToNurse=[
    //     'nurse_task_id'=> isset($task_id) ? $task_id : null,
    //     'nurse_id'=> isset($nurse_id) ? $nurse_id : null,
    //     'appoinment_date'=> isset($date) ? $date : null,
    //     'appoinment_time'=> isset($time) ? $time : null,

    //     ];
    //   $nurse_has_tasks_inserted_id=  DB::table('nurse_has_tasks')->insertGetId($dataInsertedToNurse);

    //     if(!empty($nurse_has_tasks_inserted_id)){
    //         return response()->json(['error' => 200]);
    //     }

    }


    public function taskAssignedToLab(Request $request)
    {

        // $task_id=(int)$request->task_id;
        // $lab_id=(int)$request->lab_id;
        // $dataInsertedToLab=[];
        // $nurse_has_tasks= DB::table('nurse_has_tasks')->where('nurse_task_id',$task_id)->update(['status'=>'assigned_to_lab']);

        // $dataInsertedToLab=[
        //     'nurse_task_id'=> isset($task_id) ? $task_id : null,
        //     'lab_id'=> isset($lab_id) ? $lab_id : null,
        //     ];

        // $lab_has_tasks_inserted_id=  DB::table('lab_has_tasks')->insertGetId($dataInsertedToLab);

        // if(!empty($lab_has_tasks_inserted_id)){
        //     return response()->json(['error' => 200]);
        // }

         $task_id  = (int)$request->task_id;
         $lab_id   = (int)$request->lab_id;
         $labType  = $request->assignPerson;



         $labAssign= DB::table('tasks')->where('id',$task_id)->update(['assigned'=>'5','assignToLab'=>$lab_id,'assignToLabPerson'=>$labType]);

           if(!empty($labAssign))
           {
            return response()->json(['error' => 200]);
           }
    }


    // public function taskAssignedToNurse(Request $request)
    // {
    //     $task_id=(int)$request->task_id;
    //     $nurse_id=(int)$request->nurse;
    //     $date=$request->date;
    //     $time=$request->time;
    //     $dataInsertedToNurse=[];
    //     $receptionists= DB::table('receptionist_tasks')->where('nurse_task_id',$task_id)->update(['status'=>'assigned_to_nurse','appoinment_date'=>$date,'appoinment_time'=>$time]);

    //     $dataInsertedToNurse=[
    //     'nurse_task_id'=> isset($task_id) ? $task_id : null,
    //     'nurse_id'=> isset($nurse_id) ? $nurse_id : null,
    //     'appoinment_date'=> isset($date) ? $date : null,
    //     'appoinment_time'=> isset($time) ? $time : null,

    //     ];
    //   $nurse_has_tasks_inserted_id=  DB::table('nurse_has_tasks')->insertGetId($dataInsertedToNurse);

    //     if(!empty($nurse_has_tasks_inserted_id)){
    //         return response()->json(['error' => 200]);
    //     }

    // }


    // public function taskAssignedToLab(Request $request)
    // {


    //     $task_id=(int)$request->task_id;
    //     $lab_id=(int)$request->lab_id;
    //     $dataInsertedToLab=[];
    //     $nurse_has_tasks= DB::table('nurse_has_tasks')->where('nurse_task_id',$task_id)->update(['status'=>'assigned_to_lab']);

    //     $dataInsertedToLab=[
    //         'nurse_task_id'=> isset($task_id) ? $task_id : null,
    //         'lab_id'=> isset($lab_id) ? $lab_id : null,
    //         ];

    //     $lab_has_tasks_inserted_id=  DB::table('lab_has_tasks')->insertGetId($dataInsertedToLab);

    //     if(!empty($lab_has_tasks_inserted_id)){
    //         return response()->json(['error' => 200]);
    //     }
    // }




    // public function labDocumentUpload(Request $request)
    // {

    //         $task_id=(int)$request->task_id;
    //     if ($request->file('document') != '') {
    //         $document = $request->file('document');

    //         $rename_document = rand() . '.' . $document->getClientOriginalExtension();
    //         $document->move(public_path('assets/labTestDocument'), $rename_document);

    //     }
    //     $result=  DB::table('lab_has_tasks')->where('nurse_task_id',$task_id)->update(['document'=>$rename_document,'status'=>'lab_report_uploaded','appoinment_date'=>now()]);
    //     if(!empty($result)){
    //         return response()->json(['error' => 200]);
    //     }

    // }

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

        $patientId = decrypt($request->input('patient_id'));
        $doctorIds = $request->input('doctorId'); // Assuming this is an array of doctor IDs

        $countDoctors = count($doctorIds);

        for ($i = 0; $i < $countDoctors; $i++) {  
            DB::table('doctors')->where('id', $doctorIds[$i])->update([      
                'referal_status' => '1'
            ]);

            // Insert into referal_patients table
            DB::table('referal_patients')->insert([
                'patient_id' => $patientId,
                'doctor_id' => $doctorIds[$i]
            ]);
        }

        // Redirect back with a success message after all doctors are processed
        return redirect()->back()->with('message', 'Patient referred successfully!');

        
    }
}
