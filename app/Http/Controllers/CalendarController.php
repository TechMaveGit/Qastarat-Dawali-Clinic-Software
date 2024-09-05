<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\superAdmin\Doctor;
use App\Models\User;
use App\Models\BookAppointment;
use Auth;
use DB;
class CalendarController extends Controller
{

    public function index(Request $request)
    {


        $allDoctor = Doctor::select('id','name')->where('role_id','1')->orderBy('id','desc')->get();
        
        $users=DB::table('users')->orderBy('id','desc')->get();

        $doctors= Doctor::select('id','name')->where('role_id','1')->get();
        $dtype = 'doctor';
        if(Auth::guard('doctor')->user()->user_type == "Nurse"){
            $dtype = 'Nurse';

            $nuDoctor = DB::table('doctor_nurse')->where('nurse_id',Auth::guard('doctor')->user()->id)->get()->pluck('doctor_id')->toArray()??null;
            $doctors= null;
            if($nuDoctor){
                $doctors= Doctor::select('id','name')->whereIn('id',$nuDoctor)->where('role_id','1')->orderBy('id','desc')->get();
            }
            
        }else if(Auth::guard('doctor')->user()->user_type == "Receptionist"){
            $dtype = 'receptionist';

            $nuDoctor = DB::table('doctor_nurse')->where('nurse_id',Auth::guard('doctor')->user()->id)->get()->pluck('doctor_id')->toArray()??null;
            $doctors= null;
            if($nuDoctor){
                $doctors= Doctor::select('id','name')->whereIn('id',$nuDoctor)->where('role_id','1')->orderBy('id','desc')->get();
            }
        }else if(Auth::guard('doctor')->user()->user_type == "Coordinator"){
            $dtype = 'coordinator';
            
            $nuDoctor = DB::table('doctor_nurse')->where('nurse_id',Auth::guard('doctor')->user()->id)->get()->pluck('doctor_id')->toArray()??null;
            $doctors= null;
            if($nuDoctor){
                $doctors= Doctor::select('id','name')->whereIn('id',$nuDoctor)->where('role_id','1')->orderBy('id','desc')->get();
            }
        }
        
        $doctorBranch = DB::table('user_branchs')->where(['patient_id'=>Auth::guard('doctor')->user()->id,'branch_type'=>$dtype])->get()->pluck('add_branch')->toArray();
        $allpatientBranch = DB::table('user_branchs')->whereIn('add_branch',$doctorBranch)->where('branch_type','patient')->get()->pluck('patient_id')->toArray();
        
        $docterPatient = User::where('doctor_id',Auth::guard('doctor')->user()->id)->get()->pluck('id')->toArray();

        $allpatient = array_unique(array_merge($allpatientBranch??[],$docterPatient??[]));
        
        $locations=  DB::table('branchs')->whereIn('id',$doctorBranch)->get();
        $dlocations=  DB::table('branchs')->get();
        // $locations=DB::table('branchs')->orderBy('id','desc')->get();
        $patients = User::orderBy('id','desc')->get();


        $pathology_price_list = DB::table('pathology_price_list')->where('status','1')->get();
        $book_appointments= null;
        if($pathology_price_list){
            $book_appointments= DB::table('book_appointments')->select('appointment_type')->whereIn('appointment_type',$pathology_price_list->pluck('test_name')->toArray())->distinct()->get();
        }

        // dd($allpatientBranch,$book_appointments);

        $patho_types = $pathology_price_list ? $pathology_price_list->unique('price_type')->pluck('price_type') : [];

        $searchPatient =$request->input('searchPatient');
        $appontment_availability = [];   
        $countData = [];
        $matchingAppointments = [];

        if (request()->isMethod("post"))    
        {
           // echo "ok"; die;  user_id
        //    dd('--');
                 
            $appointmentType  =  $request->input('appointmentType');    
            $location         = $request->input('location');      
            $selectClinician  =  $request->input('user_id');



            if(empty($searchPatient))
                {
                    $appontment_availability = DB::table('appontment_availability');
                    if ($appointmentType) {
                        $appontment_availability->where('appointment_types', $appointmentType);
                    }
                    
                    if ($location) {
                        $appontment_availability->where('location', $location);
                    }
                    
                    if ($selectClinician) {
                        $appontment_availability->where('doctor_id', $selectClinician);
                    }
                    $countData = $appontment_availability->count(); 
                    $appontment_availability = $appontment_availability->get(); 
                }

             if($searchPatient)
               {
                    if ($searchPatient) {

                        $searchPatientName = $searchPatient;
                    
                        $matchingUsers = DB::table('users')
                                                    ->where('name', 'like', '%' . $searchPatientName . '%')
                                                    ->pluck('id')
                                                    ->toArray();

                        $matchingAppointments = DB::table('book_appointments')
                                                    ->whereIn('patient_id', $matchingUsers)
                                                    ->get();
                                                    
                    }    
                }     

        }
        $countryCode = DB::table('dial_codes')->where('status', '1')->get();
    //    dd($doctors);
        return view('back/calendar',compact('doctors','patients','searchPatient','matchingAppointments','book_appointments','users','locations','dlocations','pathology_price_list','appontment_availability','countData','patho_types','allDoctor','countryCode'));
    }

    

    

    public function createOrUpdateEvent(Request $request)
    {
    //    return $request->all();

        $eventId = $request->input('event_id');
        $eventData = [
            'patient_id' => $request->input('patintValue'),
            'doctor_id' => $request->input('doctor_id'),
            'clinician_id' => $request->input('doctor_id'),
            'priority' => $request->input('priority'),
            'appointment_type' => $request->input('appointment_type'),
            'location' => $request->input('location'),
            'start_date' => $request->input('start_date') .  ' ' . $request->input('start_time'),
            'start_time' => $request->input('start_time'),
            'end_date' => $request->input('end_date') . ' ' .  $request->input('end_time'),
            'end_time' => $request->input('end_time'),
            'cost' => $request->input('cost'),
            'code' => $request->input('code'),
            'confirmation' => isset($request->confirmation) ? 'yes' : 'no',
        ];


        if ($eventId){
            $event = BookAppointment::find($eventId);
            if (!$event) {
                return response()->json(['error' => 'Event not found'], 404);
            }
            $event->update($eventData);
            $message = 'Event updated successfully';
        }else {
            $event = BookAppointment::create($eventData);
            $message = 'Appointment added successfully';
        }

        $task= DB::table('pathology_price_list')->where('test_name',$request->input('appointment_type'))->first()??'';

        // dd($task);

        $test_type = 'other';
        if($task && trim($task->price_type) =='Radiology'){
            $test_type = 'radiology';
        }else if($task && trim($task->price_type) =='Pathology'){
            $test_type = 'pathology';
        }

        $ltsId = DB::table('tasks')->latest()->value('id');
        if(DB::table('tasks')->where('appointment_id',$eventId)->exists()){
            DB::table('tasks')->where('appointment_id',$eventId)->delete();
        }
        DB::table('tasks')->insert([
            'appointment_id' => $eventId,
            'invoiceNumber'  => sprintf("%06d", rand(0, 999999)) . $ltsId,
            'patient_id'      => $request->input('patintValue'),
            'doctor_id'       => $request->input('doctor_id'),
            'task'            => $task->id??null,
            'form_type'       => 'general_form',
            'test_type'       => $test_type,
            'order_summary'   => ''
        ]);

        return response()->json(['message' => $message, 'event' => $event], 200);
    }

    public function deleteEvent(Request $request)
    {
        $event = BookAppointment::find($request->id);
        if(DB::table('tasks')->where('appointment_id',$request->id)->exists()){
            DB::table('tasks')->where('appointment_id',$request->id)->delete();
        }
        if (!$event) {
            return response()->json(['error' => 'Event not found'], 404);
        }

        $event->delete();

        return response()->json(['message' => 'Event deleted successfully'], 200);
    }


 public function getEvents(Request $request)
    {

      //  return $request->all();

      
        $dtype = 'doctor';
        if(Auth::guard('doctor')->user()->user_type == "Nurse"){
            $dtype = 'Nurse';
        }else if(Auth::guard('doctor')->user()->user_type == "Receptionist"){
            $dtype = 'receptionist';
        }else if(Auth::guard('doctor')->user()->user_type == "Coordinator"){
            $dtype = 'coordinator';
        }

        $doctorBranch = DB::table('user_branchs')->where(['patient_id'=>Auth::guard('doctor')->user()->id,'branch_type'=>$dtype])->get()->pluck('add_branch')->toArray();
        $allpatientBranch = DB::table('user_branchs')->whereIn('add_branch',$doctorBranch)->where('branch_type','patient')->get()->pluck('patient_id')->toArray();
        $docterPatient = User::where('doctor_id',Auth::guard('doctor')->user()->id)->get()->pluck('id')->toArray();

        $allpatient = array_unique(array_merge($allpatientBranch??[],$docterPatient??[]));

            $checkdoctor=Auth::guard('doctor')->user();

            $events = BookAppointment::select(
                                                'id',
                                                'patient_id',
                                                'doctor_id',
                                                'priority',
                                                'appointment_type as title',
                                                'location',
                                                'start_date as start',
                                                'end_date as end',
                                                'start_time',
                                                'end_time',
                                                'cost',
                                                'code',
                                                'clinician_id',
                                                'confirmation'
                                              );



            if ($checkdoctor->role_id=='1') {
            //    $events=$events->where('doctor_id',$checkdoctor->id);
            }

            $patientValue=$request->input('patientValue');

            if($patientValue)
            {
                $events=$events->where('patient_id',$patientValue);
            }

            if ($request->input('user_id')) {
                $events=$events->where('doctor_id',$request->input('user_id'));
            }

            if ($request->input('appointment_type')) {
                $events=$events->where('appointment_type',$request->input('appointment_type'));
            }

            if ($request->input('location')) {  
                $events=$events->where('location',$request->input('location'));
            }

            $events  =  $events->get();

            foreach($events as $allevents)
            {
                $allevents->colour_type=DB::table('pathology_price_list')->where('status','1')->where('test_name',$allevents->title)->first()->colour_type??'#fffff';
            }
            $events->push($allpatient);

        return response()->json($events);
    }
}
