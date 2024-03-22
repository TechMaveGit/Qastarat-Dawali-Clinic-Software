<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\patient\Patient_vital;
use App\Models\patient\Patient_order_imaginary_exam;
use App\Models\patient\Patient_order_lab;
use App\Models\patient\Patient_invoice_item;
use App\Models\patient\Patient_task;
use App\Models\patient\Patient_appointment;
use App\Models\patient\Patient_video_call;
use App\Models\patient\Patient_current_med;
use App\Models\patient\Patient_symptom;
use App\Models\patient\Patient_allergy;
use App\Models\patient\Patient_clinical_exam;
use App\Models\patient\Patient_future_plan;
use App\Models\patient\Patient_special_note;
use App\Models\patient\Patient_past_medical_history;
use App\Models\patient\Patient_past_surgical_history;
use App\Models\patient\Patient_insurer;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PatientController extends Controller
{
    //
    public function index()
    {
        return view('back/patient');
    }
    public function patient_detail(Request $request, $id)
    {
        $patient = User::findOrFail($id);
        $Patient_insurer = Patient_insurer::where('patient_id', $id)->orderBy('id', 'desc')->first();
        $Patient_appointments = Patient_appointment::where('patient_id', $id)->orderBy('id', 'desc')->get();
        return view('back/patient-detail', compact('id', 'patient', 'Patient_insurer', 'Patient_appointments'));
    }
    public function patient_medical_detail(Request $request, $id)
    {
        try{
            $patient = User::findOrFail($id);
            $patientMedicalHistory = DB::table('patient_past_medical_histories')->where('patient_id',$id)->get(['diseases_name','describe','created_at'])->toArray();
            $patientSurgicalHistory = DB::table('patient_past_surgical_histories')->where('patient_id',$id)->get(['diseases_name','describe','created_at'])->toArray();
            $patentientDetails = [
                'patientMedicalHistory'=>!empty($patientMedicalHistory) ? $patientMedicalHistory : null,
                'patientSurgicalHistory' =>!empty($patientSurgicalHistory) ? $patientSurgicalHistory :null,
               ];
               $patentientDetails = !empty($patentientDetails) ? $patentientDetails : null;
            return view('back/view-medical-report', compact('id', 'patient','patentientDetails'));

        }catch(Throwable $ex){
                $result=[
                    'line'=>$ex->getLine(),
                    'message'=>$ex->getFile(),

                ];
        }

    }

    public function patient_vital(Request $request)
    {

        Patient_vital::create($request->except('_token'));
        $Patient_vitals = Patient_vital::orderBy('id', 'desc')->get();
        return response()->json($Patient_vitals);
    }
    public function patient_vital_list(Request $request)
    {

        $Patient_vitals = Patient_vital::where('patient_id', $request->patient_id)->orderBy('id', 'desc')->get();
        return response()->json($Patient_vitals);
    }
    public function patient_vital_list_delete(Request $request)
    {

        $Patient_vitals = Patient_vital::where('id', $request->measurement_id)->delete();
        return response()->json($Patient_vitals);
    }

    public function order_imaginary_exam(Request $request)
    {
        $data = $request->all();
        $patientId = $data['patient_id'];

        $testNames = $data['test_name'];
        foreach ($testNames as $testName) {
            Patient_order_imaginary_exam::create([
                'patient_id' => $patientId,
                'order_imaginary_exam_tests_id' => $testName,

            ]);
        }


        return response()->json($testNames);
    }

    public function order_lab_test(Request $request)
    {

        $data = $request->all();

        $patientId = $data['patient_id'];

        $lab_test_names = $data['lab_test_names'];
        foreach ($lab_test_names as $testName) {
            Patient_order_lab::create([
                'patient_id' => $patientId,
                'order_lab_tests_id' => $testName,

            ]);
        }


        return response()->json($lab_test_names);
    }

    public function order_lab_test_list(Request $request)
    {

        $latestOrderLabs = DB::table('patient_order_labs')
            ->join('order_lab_tests', 'patient_order_labs.order_lab_tests_id', '=', 'order_lab_tests.id')
            ->select(
                'patient_order_labs.id as lab_id',
                'patient_order_labs.created_at as lab_created_at',
                'order_lab_tests.test_name as test_name'
            )
            ->where('patient_order_labs.patient_id', $request->patient_id)
            ->orderByDesc('patient_order_labs.id')
            ->take(5)
            ->get();

        return response()->json($latestOrderLabs);
    }
    public function order_lab_test_list_delete(Request $request)
    {

        $Patient_order_lab = Patient_order_lab::where('id', $request->lab_id)->delete();
        return response()->json($Patient_order_lab);
    }
    public function invoice_item_add(Request $request)
    {
        $data = $request->all();
        $patientId = $data['patient_id'];

        $date = $data['date'];
        $item_name = $data['item_name'];
        $code = $data['code'];
        $cost = $data['cost'];

        Patient_invoice_item::create([
            'patient_id' => $patientId,
            'date' => $date,
            'item_name' => $item_name,
            'code' => $code,
            'cost' => $cost

        ]);



        return response()->json($data);
    }
    public function invoice_item_list(Request $request)
    {

        $Patient_order_labs = Patient_invoice_item::where('patient_id', $request->patient_id)->orderBy('id', 'desc')->get();
        return response()->json($Patient_order_labs);
    }
    public function invoice_item_list_delete(Request $request)
    {

        $Patient_invoice_item = Patient_invoice_item::where('id', $request->invoice_id)->delete();
        return response()->json($Patient_invoice_item);
    }

    public function new_task_add(Request $request)
    {
        $data = $request->all();
        $patientId = $data['patient_id'];

        $date = $data['task_date'];
        $task = $data['task_name'];
        $option_name = $data['option_name'];
        $text = $data['task_text'];

        Patient_task::create([
            'patient_id' => $patientId,
            'date' => $date,
            'task' => $task,
            'name' => $option_name,
            'text' => $text

        ]);



        return response()->json($data);
    }

    public function appointment_add(Request $request)
    {
        $data = $request->all();
        // dd($data);
        $patientId = $data['patient_id'];

        $appointment_date = $data['appointment_date'];
        $appointment_type = $data['appointment_type'];
        $location = $data['location'];
        $start_date = $data['start_date'];
        $start_time = $data['start_time'];
        $end_date = $data['end_date'];
        $end_time = $data['end_time'];
        $app_cost = $data['app_cost'];
        $app_code = $data['app_code'];
        $clinician = $data['clinician'];

        $isConfirmation = $request->has('is_confirmation') ? 'yes' : 'no';

        Patient_appointment::create([
            'patient_id' => $patientId,
            'date' => $appointment_date,
            'appointment_type' => $appointment_type,
            'location' => $location,
            'start_date' => $start_date,
            'start_time' => $start_time,
            'end_date' => $end_date,
            'end_time' => $end_time,
            'cost' => $app_cost,
            'code' => $app_code,
            'clinic_type' => $clinician,
            'confirmation_immediately' => $isConfirmation


        ]);



        return response()->json($data);
    }
    public function video_call_add(Request $request)
    {
        $data = $request->all();

        $patientId = $data['patient_id'];

        $meeting_date = $data['meeting_date'];
        $meeting_url = $data['meeting_url'];


        $isConfirmation = $request->has('is_confirmation') ? 'yes' : 'no';

        Patient_video_call::create([
            'patient_id' => $patientId,
            'date' => $meeting_date,
            'meeting_url' => $meeting_url

        ]);



        return response()->json($data);
    }

    public function drug_add(Request $request)
    {
        $data = $request->all();
        $patientId = $data['patient_id'];

        $drug_name = $data['drug_name'];
        $frequency = $data['frequency'];
        $today_date = $data['today_date'];
        $duration = $data['duration'];
        $isstopped = $request->has('stopped') ? 'yes' : 'no';
        $stopped_date = $data['stopped_date'];
        $drug_code = $data['drug_code'];
        Patient_current_med::create([
            'patient_id' => $patientId,
            'drug_name' => $drug_name,
            'frequency' => $frequency,
            'today_date' => $today_date,
            'duration' => $duration,
            'stopped' => $isstopped,
            'stopped_date' => $stopped_date,
            'code' => $drug_code


        ]);



        return response()->json($data);
    }
    public function drug_item_list(Request $request)
    {

        $Patient_order_labs = Patient_current_med::where('patient_id', $request->patient_id)->orderBy('id', 'desc')->get();
        return response()->json($Patient_order_labs);
    }
    public function drug_item_list_delete(Request $request)
    {

        $Patient_current_med = Patient_current_med::where('id', $request->drug_id)->delete();
        return response()->json($Patient_current_med);
    }

    public function allergy_add(Request $request)
    {
        $data = $request->all();
        $patientId = $data['patient_id'];

        $allergy = $data['allergy'];

        Patient_allergy::create([
            'patient_id' => $patientId,
            'allergy_name' => $allergy
        ]);



        return response()->json($data);
    }
    public function symptom_add(Request $request)
    {
        $data = $request->all();
        $patientId = $data['patient_id'];

        $symptom_name = $data['symptom_name'];

        Patient_symptom::create([
            'patient_id' => $patientId,
            'symptom_name' => $symptom_name
        ]);



        return response()->json($data);
    }

    public function clinical_exam_add(Request $request)
    {
        $data = $request->all();
        $patientId = $data['patient_id'];

        $write_text = $data['write_text'];

        Patient_clinical_exam::create([
            'patient_id' => $patientId,
            'write_text' => $write_text
        ]);



        return response()->json($data);
    }
    public function future_plan_add(Request $request)
    {
        $data = $request->all();
        $patientId = $data['patient_id'];

        $future_write = $data['future_write'];
        $future_date = $data['future_date'];
        Patient_future_plan::create([
            'patient_id' => $patientId,
            'date' => $future_date,
            'plan_text' => $future_write
        ]);



        return response()->json($data);
    }

    public function special_note_add(Request $request)
    {
        $data = $request->all();
        $patientId = $data['patient_id'];

        $note_text = $data['note_text'];

        Patient_special_note::create([
            'patient_id' => $patientId,
            'note_text' => $note_text
        ]);



        return response()->json($data);
    }

    public function past_medical_histories_add(Request $request)
    {
        $data = $request->all();
        $patientId = $data['patient_id'];

        $diseases_name = $data['diseases_name'];
        $describe = $data['describe'];
        $created_at =$data['created_at'];
        $Patient_past_medical_history = Patient_past_medical_history::create([
            'patient_id' => $patientId,
            'diseases_name' => $diseases_name,
            'describe' => $describe,
        ]);
        $Patient_past_medical_history['createdat'] = Carbon::parse($Patient_past_medical_history['created_at'])->format('l d M Y');
        return response()->json($Patient_past_medical_history);
    }
    public function past_surgical_history_add(Request $request)
    {
        $data = $request->all();
        $patientId = $data['patient_id'];

        $surgery_name = $data['surgery_name'];
        $surgery_describe = $data['surgery_describe'];

        Patient_past_surgical_history::create([
            'patient_id' => $patientId,
            'diseases_name' => $surgery_name,
            'describe' => $surgery_describe
        ]);



        return response()->json($data);
    }

    public function insurer_add(Request $request)
    {
        $data = $request->all();
        $patientId = $data['patient_id'];

        $insurer_name = $data['insurer_name'];
        $insurer_number = $data['insurer_number'];

        Patient_insurer::create([
            'patient_id' => $patientId,
            'insurer_name' => $insurer_name,
            'insurance_number' => $insurer_number
        ]);



        return response()->json($data);
    }
    public function insurer_list(Request $request)
    {

        $Patient_insurer = Patient_insurer::where('patient_id', $request->patient_id)->orderBy('id', 'desc')->first();

        return response()->json($Patient_insurer);
    }
    public function patient_info_edit(Request $request)
    {

        $Patient_info = User::where('id', $request->patient_id)->orderBy('id', 'desc')->first();
        $Patient_insurer = Patient_insurer::where('patient_id', $request->patient_id)->orderBy('id', 'desc')->first();

        $data = [
            'patient_info' => $Patient_info,
            'patient_insurer' => $Patient_insurer
        ];
        return response()->json($data);
    }
    public function patient_info_update(Request $request)
    {

        $data = $request->all();
        $patientId = $data['patient_id'];

        $patient_sirname = $data['patient_sirname'];
        $patient_name = $data['patient_name'];
        $patient_birth = $data['patient_birth'];
        $patient_gendar = $data['patient_gendar'];
        $patient_post_code = $data['patient_post_code'];
        $patient_street = $data['patient_street'];
        $patient_town = $data['patient_town'];
        $patient_country = $data['patient_country'];
        $patient_email = $data['patient_email'];
        $patient_mobile_no = $data['patient_mobile_no'];
        $patient_landline = $data['patient_landline'];
        $patient_kin = $data['patient_kin'];
        $patient_insurer = $data['patient_insurer'];
        $patient_policy_no = $data['patient_policy_no'];
        $patient_gp = $data['patient_gp'];
        $patient_additional_info = $data['patient_additional_info'];
        $patient_document_type = $data['patient_document_type'];
        $patient_edit_id = $data['patient_edit_id'];
        $patient_tags_list = $data['patient_tags_list'];
        $patient_info = User::where('id', $patientId)->first();
        $userEmailExists = User::where('email', $patient_email)
            ->exists();
        $userMobExists = User::where('mobile_no', $patient_mobile_no)
            ->exists();

        $patient_info->sirname = $patient_sirname;
        $patient_info->name = $patient_name;
        $patient_info->birth_date = $patient_birth;
        $patient_info->gendar = $patient_gendar;
        $patient_info->post_code = $patient_post_code;
        $patient_info->street = $patient_street;
        $patient_info->town = $patient_town;
        if (!$userMobExists) {
            $patient_info->mobile_no = $patient_mobile_no;
        }
        $patient_info->landline = $patient_landline;
        $patient_info->country = $patient_country;
        if (!$userEmailExists) {
            $patient_info->email = $patient_email;
        }
        $patient_info->kin = $patient_kin;
        $patient_info->policy_no = $patient_policy_no;
        $patient_info->gp = $patient_gp;
        $patient_info->additional_info = $patient_additional_info;
        $patient_info->document_type = $patient_document_type;
        $patient_info->patient_id = $patient_edit_id;
        $patient_info->tags = $patient_tags_list;
        $Patient_insurer = Patient_insurer::where('patient_id', $patientId)->orderBy('id', 'desc')->first();
        $Patient_insurer->insurer_name= $patient_insurer;
        $Patient_insurer->save();
        $patient_info->save();
        return response()->json($data);
    }
    public function store(Request $request)
    {

        $user = User::create($request->except('_token'));
        $userId = $user->id;
        return response()->json(['message' => 'User created successfully'], 201);
    }
    public function getPatientsData(Request $request)
    {
        $currentUserId = Auth::id();
        $patient = User::where('id', '!=', $currentUserId);
        if (isset($request->searchInput)) {
            $searchInput = $request->input('searchInput');
            $patient->where(function ($query) use ($searchInput) {
                $query->where('name', 'like', '%' . $searchInput . '%')
                    ->orWhere('street', 'like', '%' . $searchInput . '%')
                    ->orWhere('email', 'like', '%' . $searchInput . '%')
                    ->orWhere('post_code', 'like', '%' . $searchInput . '%')
                    ->orWhere('mobile_no', 'like', '%' . $searchInput . '%')
                    ->orWhere('patient_id', 'like', '%' . $searchInput . '%');
            });
        }
        $patients = $patient->orderBy('id', 'desc')->get();

        return response()->json($patients);
    }

    public function getPatientsMedicalDetails(Request $request)
    {
        try{
            $patientMedicalHistory = DB::table('patient_past_medical_histories')->where('patient_id',$id)->get(['diseases_name','describe','created_at']);
            // $patientSurgicalHistory = DB::table('patient_past_surgical_histories')->where('patient_id',$id)->get(['diseases_name','describe','created_at']);
            // $patientDrugsHistory = DB::table('patient_current_meds')->where('patient_id',$id)->get(['drug_name','code','today_date']);
            // $patientAllergies = DB::table('patient_allergies')->where('patient_id',$id)->get(['allergy_name']);
            // $patientSymptoms = DB::table('patient_symptoms')->where('patient_id',$id)->get(['symptom_name']);
            // $patientClinicalExam = DB::table('patient_clinical_exams')->where('patient_id',$id)->get(['write_text']);
            // $patientFuturePlans = DB::table('patient_future_plans')->where('patient_id',$id)->get(['plan_text']);
            // $patientSpecialNotes = DB::table('patient_special_notes')->where('patient_id',$id)->get(['note_text']);
            // $patentientDetails = [
            //     'patientMedicalHistory'=>!empty($patientMedicalHistory) ? $patientMedicalHistory : null,
            //     'patientSurgicalHistory'=>!empty($patientSurgicalHistory) ? $patientSurgicalHistory :null,
            //     'patientDrugsHistory'=>!empty($patientDrugsHistory) ? $patientDrugsHistory : null,
            //     'patientAllergies'=> !empty($patientAllergies) ? $patientAllergies : null,
            //     'patientSymptoms'=> !empty($patientSymptoms) ? $patientSymptoms : null,
            //     'patientClinicalExam'=>!empty($patientClinicalExam) ? $patientClinicalExam : null,
            //     'patientFuturePlans'=>!empty($patientFuturePlans) ? $patientFuturePlans : null,
            //     'patientSpecialNotes'=>!empty($patientSpecialNotes) ? $patientSpecialNotes :null,
            // ];
            $patientMedicalHistory = !empty($patientMedicalHistory) ? $patientMedicalHistory : null;
            return response()->json(['patientMedicalHistory'=>$patientMedicalHistory,'status'=>200,'message'=>'Data Found']);
            // dd($patentientDetails);
        }catch(Throwable $ex){
                $result=[
                    'line'=>$ex->getLine(),
                    'message'=>$ex->getFile(),

                ];
        }
    }


}
