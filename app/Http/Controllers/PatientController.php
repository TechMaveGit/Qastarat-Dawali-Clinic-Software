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
use App\Models\patient\Patient_progress_predefine_note_detail;
use App\Models\patient\Patient_insurer;
use App\Models\patient\Prescription;
use App\Models\patient\Invistigation;
use App\Models\patient\Procedure;
use App\Models\patient\Patient_progress_note;
use App\Models\patient\Diagnosis;
use App\Models\patient\ThyroidDiagnosis;
use App\Models\patient\UterineEmboDiagnosis;
use App\Models\patient\VaricoceleEmboDiagnosis;
use App\Models\patient\PelvicCongEmbo_diagnosis;
use App\Models\patient\VaricoseAblationDiagnosis;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Throwable;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class PatientController extends Controller
{
    //

    public function home()
    {
        return view('front/home');
    }


    public function index()
    {
        return view('back/patient');
    }
    public function patient_delete(Request $request)
    {
        $patient_id = Crypt::decrypt($request->patient_id);

        $User = User::where('id', $patient_id)->delete();
        return response()->json($User);
    }
    public function patient_detail(Request $request, $id)
    {
        $id = Crypt::decrypt($id);
        $patient = User::findOrFail($id);
        $Patient_insurer = Patient_insurer::where(['patient_id' => $id, 'status' => 'active'])->orderBy('id', 'desc')->first();
        $Patient_appointments = Patient_appointment::where('patient_id', $id)->orderBy('id', 'desc')->get();
        return view('back/patient-detail', compact('id', 'patient', 'Patient_insurer', 'Patient_appointments'));
    }
    public function patient_medical_detail(Request $request, $id)
    {

        $id = Crypt::decrypt($id);
        $patient = User::findOrFail($id);
        $Patient_insurer = Patient_insurer::where(['patient_id' => $id, 'status' => 'active'])->select('insurer_name', 'insurance_number')->orderBy('id', 'desc')->first();
        $Patient_past_medical_history = Patient_past_medical_history::select('id', 'diseases_name', 'describe', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_past_surgical_history = Patient_past_surgical_history::select('id', 'diseases_name', 'describe', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_current_med = Patient_current_med::select('id', 'drug_name', 'frequency', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_future_plan = Patient_future_plan::select('id', 'date', 'plan_text')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Procedure = Procedure::select('id', 'procedure_name', 'summary', 'created_at', 'entry')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Prescription = Prescription::select('id', 'prescription', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $data = [
            'patient' => $patient,
            'id' => Crypt::encrypt($id),
            'patient_past_history' => $Patient_past_medical_history,
            'patient_past_surgical' => $Patient_past_surgical_history,
            'patient_current_med' => $Patient_current_med,
            'patient_future_plan' => $Patient_future_plan,
            'procedures' => $Procedure,
            'prescriptions' => $Prescription,
            'insurer' => $Patient_insurer
        ];
        return view('back/view-medical-report')->with($data);
    }

    public function ViewThyroidAblationForm(Request $request, $id)
    {
        $id = Crypt::decrypt($id);
        $patient = User::findOrFail($id);
        $Patient_insurer = Patient_insurer::where(['patient_id' => $id, 'status' => 'active'])->select('insurer_name', 'insurance_number')->orderBy('id', 'desc')->first();
        $Patient_past_medical_history = Patient_past_medical_history::select('id', 'diseases_name', 'describe', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_past_surgical_history = Patient_past_surgical_history::select('id', 'diseases_name', 'describe', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_current_med = Patient_current_med::select('id', 'drug_name', 'frequency', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_future_plan = Patient_future_plan::select('id', 'date', 'plan_text')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Procedure = Procedure::select('id', 'procedure_name', 'summary', 'created_at', 'entry')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Prescription = Prescription::select('id', 'prescription', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $data = [
            'patient' => $patient,
            'id' => Crypt::encrypt($id),
            'patient_past_history' => $Patient_past_medical_history,
            'patient_past_surgical' => $Patient_past_surgical_history,
            'patient_current_med' => $Patient_current_med,
            'patient_future_plan' => $Patient_future_plan,
            'procedures' => $Procedure,
            'prescriptions' => $Prescription,
            'insurer' => $Patient_insurer
        ];
        return view('back/view-thyroid-ablation-report')->with($data);
    }
    public function ViewUterineEmboForm(Request $request, $id)
    {
        $id = Crypt::decrypt($id);
        $patient = User::findOrFail($id);
        $Patient_insurer = Patient_insurer::where(['patient_id' => $id, 'status' => 'active'])->select('insurer_name', 'insurance_number')->orderBy('id', 'desc')->first();
        $Patient_past_medical_history = Patient_past_medical_history::select('id', 'diseases_name', 'describe', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_past_surgical_history = Patient_past_surgical_history::select('id', 'diseases_name', 'describe', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_current_med = Patient_current_med::select('id', 'drug_name', 'frequency', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_future_plan = Patient_future_plan::select('id', 'date', 'plan_text')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Procedure = Procedure::select('id', 'procedure_name', 'summary', 'created_at', 'entry')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Prescription = Prescription::select('id', 'prescription', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $data = [
            'patient' => $patient,
            'id' => Crypt::encrypt($id),
            'patient_past_history' => $Patient_past_medical_history,
            'patient_past_surgical' => $Patient_past_surgical_history,
            'patient_current_med' => $Patient_current_med,
            'patient_future_plan' => $Patient_future_plan,
            'procedures' => $Procedure,
            'prescriptions' => $Prescription,
            'insurer' => $Patient_insurer
        ];
        return view('back/view-uterine-embo-report')->with($data);
    }
    public function ViewVaricoceleEmboForm(Request $request, $id)
    {
        $id = Crypt::decrypt($id);
        $patient = User::findOrFail($id);
        $Patient_insurer = Patient_insurer::where(['patient_id' => $id, 'status' => 'active'])->select('insurer_name', 'insurance_number')->orderBy('id', 'desc')->first();
        $Patient_past_medical_history = Patient_past_medical_history::select('id', 'diseases_name', 'describe', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_past_surgical_history = Patient_past_surgical_history::select('id', 'diseases_name', 'describe', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_current_med = Patient_current_med::select('id', 'drug_name', 'frequency', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_future_plan = Patient_future_plan::select('id', 'date', 'plan_text')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Procedure = Procedure::select('id', 'procedure_name', 'summary', 'created_at', 'entry')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Prescription = Prescription::select('id', 'prescription', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $data = [
            'patient' => $patient,
            'id' => Crypt::encrypt($id),
            'patient_past_history' => $Patient_past_medical_history,
            'patient_past_surgical' => $Patient_past_surgical_history,
            'patient_current_med' => $Patient_current_med,
            'patient_future_plan' => $Patient_future_plan,
            'procedures' => $Procedure,
            'prescriptions' => $Prescription,
            'insurer' => $Patient_insurer
        ];
        return view('back/view-varicocele-embo-report')->with($data);
    }
    public function ViewCongEmboForm(Request $request, $id)
    {
        $id = Crypt::decrypt($id);
        $patient = User::findOrFail($id);
        $Patient_insurer = Patient_insurer::where(['patient_id' => $id, 'status' => 'active'])->select('insurer_name', 'insurance_number')->orderBy('id', 'desc')->first();
        $Patient_past_medical_history = Patient_past_medical_history::select('id', 'diseases_name', 'describe', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_past_surgical_history = Patient_past_surgical_history::select('id', 'diseases_name', 'describe', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_current_med = Patient_current_med::select('id', 'drug_name', 'frequency', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_future_plan = Patient_future_plan::select('id', 'date', 'plan_text')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Procedure = Procedure::select('id', 'procedure_name', 'summary', 'created_at', 'entry')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Prescription = Prescription::select('id', 'prescription', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $data = [
            'patient' => $patient,
            'id' => Crypt::encrypt($id),
            'patient_past_history' => $Patient_past_medical_history,
            'patient_past_surgical' => $Patient_past_surgical_history,
            'patient_current_med' => $Patient_current_med,
            'patient_future_plan' => $Patient_future_plan,
            'procedures' => $Procedure,
            'prescriptions' => $Prescription,
            'insurer' => $Patient_insurer
        ];
        return view('back/view-cong-embo-report')->with($data);
    }
    public function ViewVaricoseAblationForm(Request $request, $id)
    {
        $id = Crypt::decrypt($id);
        $patient = User::findOrFail($id);
        $Patient_insurer = Patient_insurer::where(['patient_id' => $id, 'status' => 'active'])->select('insurer_name', 'insurance_number')->orderBy('id', 'desc')->first();
        $Patient_past_medical_history = Patient_past_medical_history::select('id', 'diseases_name', 'describe', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_past_surgical_history = Patient_past_surgical_history::select('id', 'diseases_name', 'describe', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_current_med = Patient_current_med::select('id', 'drug_name', 'frequency', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_future_plan = Patient_future_plan::select('id', 'date', 'plan_text')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Procedure = Procedure::select('id', 'procedure_name', 'summary', 'created_at', 'entry')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Prescription = Prescription::select('id', 'prescription', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $data = [
            'patient' => $patient,
            'id' => Crypt::encrypt($id),
            'patient_past_history' => $Patient_past_medical_history,
            'patient_past_surgical' => $Patient_past_surgical_history,
            'patient_current_med' => $Patient_current_med,
            'patient_future_plan' => $Patient_future_plan,
            'procedures' => $Procedure,
            'prescriptions' => $Prescription,
            'insurer' => $Patient_insurer
        ];
        return view('back/view-varicose-ablation-report')->with($data);
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
    public function patient_progress_list(Request $request)
    {

        $data = [
            'note_contents' => DB::table('progress_note_contents')->select('id', 'note_name')->get(),
            'canned_texts' => DB::table('progress_note_canned_text')->select('id', 'canned_name')->get()
        ];
        return response()->json($data);
    }
    public function patient_progress_predefine_notes_list(Request $request)
    {
        $describe =  Patient_progress_predefine_note_detail::select('describe')->where(['progress_note_canned_text_id' => $request->canned_texts_id, 'progress_note_contents_id' => $request->note_contents_id])->first();
        $data = [
            'describe' => $describe
        ];
        return response()->json($data);
    }

    public function patient_progress_list_save(Request $request)
    {


        $add_progress = [
            'patient_id' => !empty($request->patient_id) ? decrypt($request->patient_id) : null,
            'progress_note_contents_id' => !empty($request->note_contents) ? $request->note_contents : null,
            'progress_note_canned_text_id' => !empty($request->canned_texts) ? $request->canned_texts : null,
            'voice_recognition' => !empty($request->prog_voice_recognition) ? $request->prog_voice_recognition : null,
            'day' => !empty($request->prog_day) ? $request->prog_day : null,
            'date' => !empty($request->prog_date) ? $request->prog_date : null,
            'details' => !empty($request->prog_details) ? $request->prog_details : null,
            'email' => !empty($request->prog_email) ? $request->prog_email : null,
            'mobile_no' =>  !empty($request->prog_mobile_no) ? $request->prog_mobile_no : null,
            'recall_reminder' => $request->has('prog_recall_reminder') ? $request->has('prog_recall_reminder') : 'inactive',
            'invoice_item' => $request->has('prog_invoice_item') ? $request->has('prog_invoice_item') : 'inactive',
            'appointment_type' => !empty($request->prog_appointment_type) ? $request->prog_appointment_type : null,
        ];

        if (!empty($add_progress)) {
            $add_progress = Patient_progress_note::insert($add_progress);
            return response()->json($add_progress);
        }
    }
    public function patient_vital_list_delete(Request $request)
    {

        $Patient_vitals = Patient_vital::where('id', $request->measurement_id)->delete();
        return response()->json($Patient_vitals);
    }

    public function order_imaginary_exam(Request $request)
    {
        $data = $request->all();
        $patientId = decrypt($data['patient_id']);

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

        $patientId = decrypt($data['patient_id']);

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

        $patient_id = Crypt::decrypt($request->patient_id);
        $latestOrderLabs = DB::table('patient_order_labs')
            ->join('order_lab_tests', 'patient_order_labs.order_lab_tests_id', '=', 'order_lab_tests.id')
            ->select(
                'patient_order_labs.id as lab_id',
                'patient_order_labs.created_at as lab_created_at',
                'order_lab_tests.test_name as test_name'
            )
            ->where('patient_order_labs.patient_id', $patient_id)
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
        $patientId = decrypt($data['patient_id']);

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
        $patient_id = decrypt($request->patient_id);
        $Patient_order_labs = Patient_invoice_item::where('patient_id', $patient_id)->orderBy('id', 'desc')->get();
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
        $patientId = decrypt($data['patient_id']);

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
        $patientId = decrypt($data['patient_id']);

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

        $patientId = decrypt($data['patient_id']);

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
        $patientId = decrypt($data['patient_id']);

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

        $patient_id = decrypt($request->patient_id);
        $Patient_order_labs = Patient_current_med::where('patient_id', $patient_id)->orderBy('id', 'desc')->get();
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
        $patientId = decrypt($data['patient_id']);

        $allergy = $data['allergy'];

        Patient_allergy::create([
            'patient_id' => $patientId,
            'allergy_name' => $allergy
        ]);



        return response()->json($data);
    }


    public function add_patient_prescription(Request $request)
    {
        $data = $request->all();
        $patientId = decrypt($data['patient_id']);

        $prescription = $data['prescription'];

        Prescription::create([
            'patient_id' => $patientId,
            'prescription' => $prescription
        ]);



        return response()->json($data);
    }


    public function add_patient_invistigation(Request $request)
    {
        $data = $request->all();
        $patientId = decrypt($data['patient_id']);

        $invistigation = $data['invistigation'];

        Invistigation::create([
            'patient_id' => $patientId,
            'invistigation' => $invistigation
        ]);



        return response()->json($data);
    }
    public function add_patient_procedure(Request $request)
    {
        $data = $request->all();
        $patientId = decrypt($data['patient_id']);

        $procedure = $data['procedure'];
        $entry = $data['entry'];
        $summary = $data['summary'];

        Procedure::create([
            'patient_id' => $patientId,
            'procedure_name' => $procedure,
            'entry' => $entry,
            'summary' => $summary
        ]);



        return response()->json($data);
    }
    public function symptom_add(Request $request)
    {
        $data = $request->all();
        $patientId = decrypt($data['patient_id']);

        $symptom_value = $data['symptom_name'];


        if ($request->has('symptom_name')) {
            Diagnosis::create([
                'patient_id' => $patientId,
                'title_name' => 'Symptoms',
                'data_value' => json_encode($symptom_value),
                'doctor_id' =>auth()->guard('doctor')->id()
            ]);
        }



        return response()->json($data);
    }

    public function clinical_exam_add(Request $request)
    {
        $data = $request->all();
        $patientId = decrypt($data['patient_id']);

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
        $patientId = decrypt($data['patient_id']);

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
        $patientId = decrypt($data['patient_id']);

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
        $patientId = decrypt($data['patient_id']);
        $diseases_names = $data['diseases_name'];
        $describes = $data['describe'];

        $count = count($diseases_names);
        $add_medical_histories = [];

        for ($i = 0; $i < $count; $i++) {
            if ($diseases_names[$i] !== null && $describes[$i] !== null) {
                $add_medical_histories[] = [
                    'patient_id' => $patientId,
                    'diseases_name' => $diseases_names[$i],
                    'describe' => $describes[$i]
                ];
            }
        }
        Patient_past_medical_history::insert($add_medical_histories);


        return response()->json($add_medical_histories);
    }
    public function past_surgical_history_add(Request $request)
    {
        $data = $request->all();
        $patientId = decrypt($data['patient_id']);

        $surgery_names = $data['surgery_name'];
        $surgery_describes = $data['surgery_describe'];


        $count = count($surgery_names);

        for ($i = 0; $i < $count; $i++) {
            // Check if both surgery_name and describe are not null before inserting
            if ($surgery_names[$i] !== null && $surgery_describes[$i] !== null) {
                Patient_past_surgical_history::create([
                    'patient_id' => $patientId,
                    'diseases_name' => $surgery_names[$i],
                    'describe' => $surgery_describes[$i]
                ]);
            }
        }

        return response()->json($data);
    }

    public function insurer_add(Request $request)
    {
        $data = $request->all();
        $patientId = decrypt($data['patient_id']);

        $insurer_name = $data['insurer_name'];
        $insurer_number = $data['insurer_number'];
        $total_insurer =  Patient_insurer::where('patient_id', $patientId)->orderBy('id', 'desc');
        if ($total_insurer->count() >= 1) {

            $total_insurer->update(['status' => 'inactive']);
        }
        Patient_insurer::create([
            'patient_id' => $patientId,
            'insurer_name' => $insurer_name,
            'insurance_number' => $insurer_number,
            'status' => 'active'
        ]);
        return response()->json($data);
    }
    public function insurer_list(Request $request)
    {

        $patient_id = decrypt($request->patient_id);
        $Patient_insurer = Patient_insurer::where(['patient_id' => $patient_id, 'status' => 'active'])->orderBy('id', 'desc')->first();

        return response()->json($Patient_insurer);
    }
    public function patient_info_edit(Request $request)
    {
        $patient_id = decrypt($request->patient_id);
        $Patient_info = User::where('id', $patient_id)->orderBy('id', 'desc')->first();
        $Patient_insurer = Patient_insurer::select('id', 'insurer_name', 'status')->where('patient_id', $patient_id)->orderBy('id', 'desc')->get();


        $data = [
            'patient_info' => $Patient_info,
            'patient_insurer' => $Patient_insurer,

        ];
        return response()->json($data);
    }
    public function patient_info_update(Request $request)
    {

        $data = $request->all();

        $patientId = decrypt($data['patient_id']);

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
        $PatientInsurerExists = Patient_insurer::where(['patient_id' => $patientId, 'status' => 'active'])->orderBy('id', 'desc')
            ->exists();
        $PatientInsurerExistsStatusActive = Patient_insurer::where(['patient_id' => $patientId, 'status' => 'active'])->orderBy('id', 'desc')->orderBy('id', 'desc')->first();
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
        if (!$PatientInsurerExists) {
            $Patient_insurer = Patient_insurer::where(['patient_id' => $patientId, 'id' => $patient_insurer])->orderBy('id', 'desc')->first();
            $Patient_insurer->status = 'active';
            $Patient_insurer->save();
        } elseif ($PatientInsurerExistsStatusActive) {
            $PatientInsurerExistsStatusActive->status = 'inactive';
            $PatientInsurerExistsStatusActive->save();
            $Patient_insurer = Patient_insurer::where(['patient_id' => $patientId, 'id' => $patient_insurer])->orderBy('id', 'desc')->first();
            $Patient_insurer->status = 'active';
            $Patient_insurer->save();
        }
            // handle profile_image 
            if ($request->hasFile('profile_image')) {
                
                $oldFilePath = public_path('assets/patient_profile') . '/' . $patient_info->patient_profile_img;

                if (file_exists($oldFilePath) && is_file($oldFilePath)) {
            //    dd($oldFilePath);
                    unlink($oldFilePath);
                    $image = $request->file('profile_image');
                    $new_name = rand() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('assets/patient_profile'), $new_name);
                    $patient_info->patient_profile_img = $new_name;
                }else{
                    $image = $request->file('profile_image');
                    $new_name = rand() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('assets/patient_profile'), $new_name);
                    $patient_info->patient_profile_img = $new_name;
                }
            }

        $patient_info->save();
        return response()->json($data);
    }

    private function generateRandomMA()
    {
        $randomMA = 'MA' . str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);


        return $randomMA;
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $new_name = '';
        if ($request->file('profile_image') != '') {
            $image = $request->file('profile_image');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/patient_profile'), $new_name);
            $data['image'] = $new_name;
        }

        $add_patient = [
            'sirname' => !empty($request->sirname) ? $request->sirname : null,
            'name' => !empty($request->name) ? $request->name : null,
            'birth_date' => !empty($request->birth_date) ? $request->birth_date : null,
            'post_code' => !empty($request->post_code) ? $request->post_code : null,
            'street' => !empty($request->street) ? $request->street : null,
            'town' => !empty($request->town) ? $request->town : null,
            'country' => !empty($request->country) ? $request->country : null,
            'country' => !empty($request->country) ? $request->country : null,
            'password' => !empty($request->password) ? Hash::make($request->password) : null,
            'email' => !empty($request->email) ? $request->email : null,
            'mobile_no' => !empty($request->mobile_no) ? $request->mobile_no : null,
            'gendar' =>  !empty($request->gender) ? $request->gender : null,
            'landline' => !empty($request->landline) ? $request->landline : null,
            'document_type' => !empty($request->document_type) ? $request->document_type : null,
            'gendar' => !empty($request->gender) ? $request->gender : null,
            'patient_id' => $this->generateRandomMA(),
            'patient_profile_img' => !empty($new_name) ? $new_name : null,
        ];

        if (!empty($add_patient)) {
            $add_patient = User::insert($add_patient);
            return response()->json(['message' => 'User created successfully'], 201);
        } else {

            return response()->json(['error' => 'Failed to add patient details. Please try again.'], 'error');
        }
    }

    public function getPatientsData(Request $request)
    {

        $patient = User::query();
        if ($request->has('searchInput')) {
            $searchInput = $request->input('searchInput');
            $patient->where(function ($query) use ($searchInput) {
                $query->where('name', 'like',  $searchInput . '%')
                    ->orWhere('street', 'like',  $searchInput . '%')
                    ->orWhere('email', 'like',  $searchInput . '%')
                    ->orWhere('post_code', 'like', $searchInput . '%')
                    ->orWhere('mobile_no', 'like', $searchInput . '%')
                    ->orWhere('patient_id', 'like', $searchInput . '%');
            });
        }
        //
        $patients = $patient->orderBy('id', 'desc')->get();

        return response()->json($patients);
    }
    public function slectEligibilityForms(Request $request)
    {
        $EligibilityForm = $request->EligibilityForm;
        $patient_id = $request->patient_id;

        if ($EligibilityForm == "ThyroidAblation") {

            return redirect()->route('user.ThroidEmbolizationEligibilityForms', ['patient_id' => $patient_id]);
        } elseif ($EligibilityForm == "ProstateArteryEmbolizationEligibility") {
            return redirect()->route('user.ProstateArteryEmbolizationEligibility', ['patient_id' => $patient_id]);
        } elseif ($EligibilityForm == "UterineEmboForm") {
            return redirect()->route('user.UterineEmboEmbolizationEligibilityForms', ['patient_id' => $patient_id]);
        } elseif ($EligibilityForm == "VaricoceleEmboForm") {
            return redirect()->route('user.VaricoceleEmboEmbolizationEligibilityForms', ['patient_id' => $patient_id]);
        } elseif ($EligibilityForm == "PelvicCongEmbo") {
            return redirect()->route('user.PelvicCongEmboEligibilityForms', ['patient_id' => $patient_id]);
        } elseif ($EligibilityForm == "VaricoseAblation") {
            return redirect()->route('user.VaricoseAblationEligibilityForms', ['patient_id' => $patient_id]);
        } else {
            abort(404);
        }
    }
    public function PelvicCongEmboEligibilityForms(Request $request, $patient_id)
    {
        return view('back/pelvic_cong_embo', compact('patient_id'));
    }
    public function VaricoseAblationEligibilityForms(Request $request, $patient_id)
    {
        return view('back/varicose_ablation', compact('patient_id'));
    }
    public function ProstateArteryEmbolizationEligibilityForm(Request $request, $patient_id)
    {
        return view('back/prostate', compact('patient_id'));
    }
    public function ThyroidEligibilityForm(Request $request, $patient_id)
    {
        return view('back/thyroid', compact('patient_id'));
    }
    public function UterineEmboEmbolizationEligibilityForms(Request $request, $patient_id)
    {
        return view('back/uterine_embo', compact('patient_id'));
    }
    public function VaricoceleEmboEmbolizationEligibilityForms(Request $request, $patient_id)
    {
        return view('back/varicocele_embo', compact('patient_id'));
    }


    public function storeProstateEligibilityForms(Request $request)
    {

        $doctor_id = auth()->guard('doctor')->id();

        $id = decrypt($request->patient_id);
        $dataToInsert = [];
       

        if (isset($request->diagnosis_general) && is_array($request->diagnosis_general) && !empty($request->diagnosis_general)) {
            $filteredDiagnosisGeneral = array_map(function ($subarray) {
                return array_filter($subarray, function ($value) {
                    return $value != null && $value != '';
                });
            }, $request->diagnosis_general);
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'diagnosis_general',
                    'data_value' => json_encode($filteredDiagnosisGeneral),

                    'doctor_id' => $doctor_id
                ];
            }
        }
        if (isset($request->diagnosis_cid) && is_array($request->diagnosis_cid) && !empty($request->diagnosis_cid)) {
            $filteredDiagnosisGeneral = array_map(function ($subarray) {
                return array_filter($subarray, function ($value) {
                    return $value != null && $value != '';
                });
            }, $request->diagnosis_cid);
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'diagnosis_cid',
                    'data_value' =>  json_encode($filteredDiagnosisGeneral),
                    'doctor_id' => $doctor_id
                ];
            }
        }
        if (isset($request->symptoms_score) && is_array($request->symptoms_score) && !empty($request->symptoms_score)) {
            $filteredDiagnosisGeneral = array_map(function ($subarray) {
                return array_filter($subarray, function ($value) {
                    return $value != null && $value != '';
                });
            }, $request->symptoms_score);
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'symptoms_score',
                    'data_value' => json_encode($filteredDiagnosisGeneral),
                    'doctor_id' => $doctor_id
                ];
            }
        }
        if (isset($request->Referral) && is_array($request->Referral) && !empty($request->Referral)) {
            $filteredDiagnosisGeneral = array_map(function ($subarray) {
                return array_filter($subarray, function ($value) {
                    return $value != null && $value != '';
                });
            }, $request->Referral);
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'referral',
                    'data_value' => json_encode($filteredDiagnosisGeneral),
                    'doctor_id' => $doctor_id
                ];
            }
        }
        if (isset($request->Supportive) && is_array($request->Supportive) && !empty($request->Supportive)) {
            $filteredDiagnosisGeneral = array_map(function ($subarray) {
                return array_filter($subarray, function ($value) {
                    return $value != null && $value != '';
                });
            }, $request->Supportive);
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'supportive',
                    'data_value' => json_encode($filteredDiagnosisGeneral),
                    'doctor_id' => $doctor_id
                ];
            }
        }
        if (isset($request->InterventionProcedure) && is_array($request->InterventionProcedure) && !empty($request->InterventionProcedure)) {
            $filteredDiagnosisGeneral =  array_map(function ($subarray) {
                return array_filter($subarray, function ($value) {
                    return $value != null && $value != '';
                });
            }, $request->InterventionProcedure);
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'intervention_procedure',
                    'data_value' => json_encode($filteredDiagnosisGeneral),
                    'doctor_id' => $doctor_id
                ];
            }
        }
        if (isset($request->elegibilityStatus) && is_array($request->elegibilityStatus) && !empty($request->elegibilityStatus)) {
            $filteredDiagnosisGeneral =  array_map(function ($subarray) {
                return array_filter($subarray, function ($value) {
                    return $value != null && $value != '';
                });
            }, $request->elegibilityStatus);
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'elegibility_status',
                    'data_value' => json_encode($filteredDiagnosisGeneral),
                    'doctor_id' => $doctor_id
                ];
            }
        }
        if (isset($request->mdt) && is_array($request->mdt) && !empty($request->mdt)) {
            $filteredDiagnosisGeneral = array_map(function ($subarray) {
                return array_filter($subarray, function ($value) {
                    return $value != null && $value != '';
                });
            }, $request->mdt);
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'mdt',
                    'data_value' => json_encode($filteredDiagnosisGeneral),
                    'doctor_id' => $doctor_id
                ];
            }
        }
        if (isset($request->lab) && is_array($request->lab) && !empty($request->lab)) {
            $filteredDiagnosisGeneral = array_map(function ($subarray) {
                return array_filter($subarray, function ($value) {
                    return $value != null && $value != '';
                });
            }, $request->lab);
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'lab',
                    'data_value' => json_encode($filteredDiagnosisGeneral),
                    'doctor_id' => $doctor_id
                ];
            }
        }
        // $dataToInsert[] = [
        //     'patient_id' => $id,
        //     'title_name' => 'image_annotation',
        //     'data_value' => json_encode(array_filter($request->ImageAnnotation)),
        // ];
        if (isset($request->imaging) && is_array($request->imaging) && !empty($request->imaging)) {
            $filteredDiagnosisGeneral =  array_map(function ($subarray) {
                return array_filter($subarray, function ($value) {
                    return $value != null && $value != '';
                });
            }, $request->imaging);
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'Imaging',
                    'data_value' => json_encode($filteredDiagnosisGeneral),
                    'doctor_id' => $doctor_id
                ];
            }
        }
        if (isset($request->clinical_indicator) && is_array($request->clinical_indicator) && !empty($request->clinical_indicator)) {
            $filteredDiagnosisGeneral =  array_map(function ($subarray) {
                return array_filter($subarray, function ($value) {
                    return $value != null && $value != '';
                });
            }, $request->clinical_indicator);
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'ClinicalIndicator',
                    'data_value' => json_encode($filteredDiagnosisGeneral),
                    'doctor_id' => $doctor_id
                ];
            }
        }

        Diagnosis::insert($dataToInsert);

        return  redirect()->route('user.patient_medical_detail', ['id' => $request->patient_id]);
    }

    public function ProstateArteryEmbolizationEligibilityFormDiagnosisList(Request $request)
    {
        $patient_id = decrypt($request->patient_id);
        $Diagnosis = Diagnosis::where('patient_id', $patient_id)
            ->whereIn('title_name', ['diagnosis_general', 'diagnosis_cid'])
            ->where('patient_id', $patient_id)
            ->orderBy('id', 'desc')
            ->get();
        // dd($Diagnosis);
        return response()->json($Diagnosis);
    }

    public function storeThyroidEligibilityForms(Request $request)
    {

        // dd($request->all());
        $id = decrypt($request->patient_id);
        $dataToInsert = [];
        //    $diagnosis_general= $request->diagnosis_general;
        //    $diagnosis_cid= $request->diagnosis_cid;


        if (isset($request->diagnosis_general) && is_array($request->diagnosis_general) && !empty($request->diagnosis_general)) {
            // Remove elements with null values
            $filteredDiagnosisGeneral = array_filter($request->diagnosis_general, function ($value) {
                return $value != null;
            });
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'diagnosis_general',
                    'data_value' => json_encode($filteredDiagnosisGeneral)
                ];
            }
        }
        if (isset($request->diagnosis_cid) && is_array($request->diagnosis_cid) && !empty($request->diagnosis_cid)) {
            $filteredDiagnosisGeneral = array_filter($request->diagnosis_cid, function ($value) {
                return $value != null;
            });
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'diagnosis_cid',
                    'data_value' =>  json_encode($filteredDiagnosisGeneral)
                ];
            }
        }
        if (isset($request->symptoms_score) && is_array($request->symptoms_score) && !empty($request->symptoms_score)) {
            $filteredDiagnosisGeneral = array_filter($request->symptoms_score, function ($value) {
                return $value != null;
            });
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'symptoms_score',
                    'data_value' => json_encode($filteredDiagnosisGeneral)
                ];
            }
        }
        if (isset($request->clinical_indicator) && is_array($request->clinical_indicator) && !empty($request->clinical_indicator)) {
            $filteredDiagnosisGeneral = array_filter($request->clinical_indicator, function ($value) {
                return $value != null;
            });
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'ClinicalIndicator',
                    'data_value' => json_encode($filteredDiagnosisGeneral),
                ];
            }
        }
        if (isset($request->right_lobe_score) && is_array($request->right_lobe_score) && !empty($request->right_lobe_score)) {
            $filteredDiagnosisGeneral = array_filter($request->right_lobe_score, function ($value) {
                return $value != null;
            });
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'right_lobe_score',
                    'data_value' => json_encode($filteredDiagnosisGeneral)
                ];
            }
        }
        if (isset($request->left_lobe_score) && is_array($request->left_lobe_score) && !empty($request->left_lobe_score)) {
            $filteredDiagnosisGeneral = array_filter($request->left_lobe_score, function ($value) {
                return $value != null;
            });
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'left_lobe_score',
                    'data_value' => json_encode($filteredDiagnosisGeneral)
                ];
            }
        }
        if (isset($request->Retrosternalextension) && is_array($request->Retrosternalextension) && !empty($request->Retrosternalextension)) {
            $filteredDiagnosisGeneral = array_filter($request->Retrosternalextension, function ($value) {
                return $value != null;
            });
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'Retrosternalextension',
                    'data_value' => json_encode($filteredDiagnosisGeneral)
                ];
            }
        }
        if (isset($request->EnlargedLymphnodes) && is_array($request->EnlargedLymphnodes) && !empty($request->EnlargedLymphnodes)) {
            $filteredDiagnosisGeneral = array_filter($request->EnlargedLymphnodes, function ($value) {
                return $value != null;
            });
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'EnlargedLymphnodes',
                    'data_value' => json_encode($filteredDiagnosisGeneral)
                ];
            }
        }
        if (isset($request->EnlargedLymphnodes) && is_array($request->EnlargedLymphnodes) && !empty($request->EnlargedLymphnodes)) {
            $filteredDiagnosisGeneral = array_filter($request->EnlargedLymphnodes, function ($value) {
                return $value != null;
            });
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'EnlargedLymphnodes',
                    'data_value' => json_encode($filteredDiagnosisGeneral)
                ];
            }
        }
        if (isset($request->paralysis) && is_array($request->paralysis) && !empty($request->paralysis)) {
            $filteredDiagnosisGeneral = array_filter($request->paralysis, function ($value) {
                return $value != null;
            });
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'paralysis',
                    'data_value' => json_encode($filteredDiagnosisGeneral)
                ];
            }
        }
        if (isset($request->MRCIR48) && is_array($request->MRCIR48) && !empty($request->MRCIR48)) {
            $filteredDiagnosisGeneral = array_filter($request->MRCIR48, function ($value) {
                return $value != null;
            });
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'MRCIR48',
                    'data_value' => json_encode($filteredDiagnosisGeneral)
                ];
            }
        }
        if (isset($request->CTCIR48) && is_array($request->CTCIR48) && !empty($request->CTCIR48)) {
            $filteredDiagnosisGeneral = array_filter($request->CTCIR48, function ($value) {
                return $value != null;
            });
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'CTCIR48',
                    'data_value' => json_encode($filteredDiagnosisGeneral)
                ];
            }
        }
        if (isset($request->NMTHYROIDSCANCEIR78) && is_array($request->NMTHYROIDSCANCEIR78) && !empty($request->NMTHYROIDSCANCEIR78)) {
            $filteredDiagnosisGeneral = array_filter($request->NMTHYROIDSCANCEIR78, function ($value) {
                return $value != null;
            });
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'NMTHYROIDSCANCEIR78',
                    'data_value' => json_encode($filteredDiagnosisGeneral)
                ];
            }
        }
        if (isset($request->Hashimoto) && is_array($request->Hashimoto) && !empty($request->Hashimoto)) {
            $filteredDiagnosisGeneral = array_filter($request->Hashimoto, function ($value) {
                return $value != null;
            });
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'Hashimoto',
                    'data_value' => json_encode($filteredDiagnosisGeneral)
                ];
            }
        }
        if (isset($request->diffuse) && is_array($request->diffuse) && !empty($request->diffuse)) {
            $filteredDiagnosisGeneral = array_filter($request->diffuse, function ($value) {
                return $value != null;
            });
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'diffuse',
                    'data_value' => json_encode($filteredDiagnosisGeneral)
                ];
            }
        }
        if (isset($request->NMPARATHYROIDSCANCEIR78) && is_array($request->NMPARATHYROIDSCANCEIR78) && !empty($request->NMPARATHYROIDSCANCEIR78)) {
            $filteredDiagnosisGeneral = array_filter($request->NMPARATHYROIDSCANCEIR78, function ($value) {
                return $value != null;
            });
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'NMPARATHYROIDSCANCEIR78',
                    'data_value' => json_encode($filteredDiagnosisGeneral)
                ];
            }
        }
        if (isset($request->USFNATHYROIDUL320) && is_array($request->USFNATHYROIDUL320) && !empty($request->USFNATHYROIDUL320)) {
            $filteredDiagnosisGeneral = array_filter($request->USFNATHYROIDUL320, function ($value) {
                return $value != null;
            });
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'USFNATHYROIDUL320',
                    'data_value' => json_encode($filteredDiagnosisGeneral)
                ];
            }
        }
        if (isset($request->USFNATHYROIDBL380) && is_array($request->USFNATHYROIDBL380) && !empty($request->USFNATHYROIDBL380)) {
            $filteredDiagnosisGeneral = array_filter($request->USFNATHYROIDBL380, function ($value) {
                return $value != null;
            });
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'USFNATHYROIDBL380',
                    'data_value' => json_encode($filteredDiagnosisGeneral)
                ];
            }
        }
        if (isset($request->Lab) && is_array($request->Lab) && !empty($request->Lab)) {
            $filteredDiagnosisGeneral = array_filter($request->Lab, function ($value) {
                return $value != null;
            });
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'lab',
                    'data_value' => json_encode($filteredDiagnosisGeneral),
                ];
            }
        }
        if (isset($request->MDT) && is_array($request->MDT) && !empty($request->MDT)) {
            $filteredDiagnosisGeneral = array_filter($request->MDT, function ($value) {
                return $value != null;
            });
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'MDT',
                    'data_value' => json_encode($filteredDiagnosisGeneral),
                ];
            }
        }

        if (isset($request->Referral) && is_array($request->Referral) && !empty($request->Referral)) {
            $filteredDiagnosisGeneral = array_filter($request->Referral, function ($value) {
                return $value != null;
            });
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'referral',
                    'data_value' => json_encode($filteredDiagnosisGeneral),
                ];
            }
        }
        if (isset($request->Supportive) && is_array($request->Supportive) && !empty($request->Supportive)) {
            $filteredDiagnosisGeneral = array_filter($request->Supportive, function ($value) {
                return $value != null;
            });
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'supportive',
                    'data_value' => json_encode($filteredDiagnosisGeneral),
                ];
            }
        }
        if (isset($request->Intervention) && is_array($request->Intervention) && !empty($request->Intervention)) {
            $filteredDiagnosisGeneral = array_filter($request->Intervention, function ($value) {
                return $value != null;
            });
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'Intervention',
                    'data_value' => json_encode($filteredDiagnosisGeneral),
                ];
            }
        }
        if (isset($request->elegibility_status) && is_array($request->elegibility_status) && !empty($request->elegibility_status)) {
            $filteredDiagnosisGeneral = array_filter($request->elegibility_status, function ($value) {
                return $value != null;
            });
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'elegibility_status',
                    'data_value' => json_encode($filteredDiagnosisGeneral),
                ];
            }
        }


        // $dataToInsert[] = [
        //     'patient_id' => $id,
        //     'title_name' => 'image_annotation',
        //     'data_value' => json_encode(array_filter($request->ImageAnnotation)),
        // ];
        if (isset($request->imaging) && is_array($request->imaging) && !empty($request->imaging)) {
            $filteredDiagnosisGeneral = array_filter($request->imaging, function ($value) {
                return $value != null;
            });
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'Imaging',
                    'data_value' => json_encode($filteredDiagnosisGeneral),
                ];
            }
        }

        ThyroidDiagnosis::insert($dataToInsert);

        return  redirect()->route('user.patient_medical_detail', ['id' => $request->patient_id]);
    }

    public function storeUterineEmboEligibilityForms(Request $request)
    {

        // echo "<pre>";
        // print_r($request->all());
        // die;
        $id = decrypt($request->patient_id);
        $dataToInsert = [];
        //    $diagnosis_general= $request->diagnosis_general;
        //    $diagnosis_cid= $request->diagnosis_cid;


        if (isset($request->diagnosis_general) && is_array($request->diagnosis_general) && !empty($request->diagnosis_general)) {
            // Remove elements with null values
            $filteredDiagnosisGeneral = array_filter($request->diagnosis_general, function ($value) {
                return $value != null;
            });
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'diagnosis_general',
                    'data_value' => json_encode($filteredDiagnosisGeneral)
                ];
            }
        }
        if (isset($request->diagnosis_cid) && is_array($request->diagnosis_cid) && !empty($request->diagnosis_cid)) {
            $filteredDiagnosisGeneral = array_filter($request->diagnosis_cid, function ($value) {
                return $value != null;
            });
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'diagnosis_cid',
                    'data_value' =>  json_encode($filteredDiagnosisGeneral)
                ];
            }
        }
        if (isset($request->symptoms_score) && is_array($request->symptoms_score) && !empty($request->symptoms_score)) {
            $filteredDiagnosisGeneral = array_filter($request->symptoms_score, function ($value) {
                return $value != null;
            });
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'symptoms_score',
                    'data_value' => json_encode($filteredDiagnosisGeneral)
                ];
            }
        }
        if (isset($request->Imaging) && is_array($request->Imaging) && !empty($request->Imaging)) {
            $filteredDiagnosisGeneral = array_filter($request->Imaging, function ($value) {
                return $value != null;
            });
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'Imaging',
                    'data_value' => json_encode($filteredDiagnosisGeneral),
                ];
            }
        }
        if (isset($request->clinical_indicator) && is_array($request->clinical_indicator) && !empty($request->clinical_indicator)) {
            $filteredDiagnosisGeneral = array_filter($request->clinical_indicator, function ($value) {
                return $value != null;
            });
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'ClinicalIndicator',
                    'data_value' => json_encode($filteredDiagnosisGeneral),
                ];
            }
        }
        if (isset($request->Lab) && is_array($request->Lab) && !empty($request->Lab)) {
            $filteredDiagnosisGeneral = array_filter($request->Lab, function ($value) {
                return $value != null;
            });
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'Lab',
                    'data_value' => json_encode($filteredDiagnosisGeneral),
                ];
            }
        }
        if (isset($request->MDT) && is_array($request->MDT) && !empty($request->MDT)) {
            $filteredDiagnosisGeneral = array_filter($request->MDT, function ($value) {
                return $value != null;
            });
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'MDT',
                    'data_value' => json_encode($filteredDiagnosisGeneral),
                ];
            }
        }
        if (isset($request->Referral) && is_array($request->Referral) && !empty($request->Referral)) {
            $filteredDiagnosisGeneral = array_filter($request->Referral, function ($value) {
                return $value != null;
            });
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'referral',
                    'data_value' => json_encode($filteredDiagnosisGeneral),
                ];
            }
        }
        if (isset($request->Supportive) && is_array($request->Supportive) && !empty($request->Supportive)) {
            $filteredDiagnosisGeneral = array_filter($request->Supportive, function ($value) {
                return $value != null;
            });
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'supportive',
                    'data_value' => json_encode($filteredDiagnosisGeneral),
                ];
            }
        }
        if (isset($request->InterventionProcedure) && is_array($request->InterventionProcedure) && !empty($request->InterventionProcedure)) {
            $filteredDiagnosisGeneral = array_filter($request->InterventionProcedure, function ($value) {
                return $value != null;
            });
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'intervention_procedure',
                    'data_value' => json_encode($filteredDiagnosisGeneral),
                ];
            }
        }
        if (isset($request->elegibilityStatus) && is_array($request->elegibilityStatus) && !empty($request->elegibilityStatus)) {
            $filteredDiagnosisGeneral = array_filter($request->elegibilityStatus, function ($value) {
                return $value != null;
            });
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'elegibility_status',
                    'data_value' => json_encode($filteredDiagnosisGeneral),
                ];
            }
        }


        // $dataToInsert[] = [
        //     'patient_id' => $id,
        //     'title_name' => 'image_annotation',
        //     'data_value' => json_encode(array_filter($request->ImageAnnotation)),
        // ];


        UterineEmboDiagnosis::insert($dataToInsert);

        return  redirect()->route('user.patient_medical_detail', ['id' => $request->patient_id]);
    }
    public function storeVaricoceleEmboEligibilityForms(Request $request)
    {

        // echo "<pre>";
        // print_r($request->all());
        // die;
        $id = decrypt($request->patient_id);
        $dataToInsert = [];
        //    $diagnosis_general= $request->diagnosis_general;
        //    $diagnosis_cid= $request->diagnosis_cid;


        if (isset($request->diagnosis_general) && is_array($request->diagnosis_general) && !empty($request->diagnosis_general)) {
            // Remove elements with null values
            $filteredDiagnosisGeneral = array_filter($request->diagnosis_general, function ($value) {
                return $value != null;
            });
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'diagnosis_general',
                    'data_value' => json_encode($filteredDiagnosisGeneral)
                ];
            }
        }
        if (isset($request->diagnosis_cid) && is_array($request->diagnosis_cid) && !empty($request->diagnosis_cid)) {
            $filteredDiagnosisGeneral = array_filter($request->diagnosis_cid, function ($value) {
                return $value != null;
            });
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'diagnosis_cid',
                    'data_value' =>  json_encode($filteredDiagnosisGeneral)
                ];
            }
        }
        if (isset($request->symptoms_score) && is_array($request->symptoms_score) && !empty($request->symptoms_score)) {
            $filteredDiagnosisGeneral = array_filter($request->symptoms_score, function ($value) {
                return $value != null;
            });
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'symptoms_score',
                    'data_value' => json_encode($filteredDiagnosisGeneral)
                ];
            }
        }
        if (isset($request->Imaging) && is_array($request->Imaging) && !empty($request->Imaging)) {
            $filteredDiagnosisGeneral = array_filter($request->Imaging, function ($value) {
                return $value != null;
            });
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'Imaging',
                    'data_value' => json_encode($filteredDiagnosisGeneral),
                ];
            }
        }
        if (isset($request->clinical_indicator) && is_array($request->clinical_indicator) && !empty($request->clinical_indicator)) {
            $filteredDiagnosisGeneral = array_filter($request->clinical_indicator, function ($value) {
                return $value != null;
            });
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'ClinicalIndicator',
                    'data_value' => json_encode($filteredDiagnosisGeneral),
                ];
            }
        }
        if (isset($request->Lab) && is_array($request->Lab) && !empty($request->Lab)) {
            $filteredDiagnosisGeneral = array_filter($request->Lab, function ($value) {
                return $value != null;
            });
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'Lab',
                    'data_value' => json_encode($filteredDiagnosisGeneral),
                ];
            }
        }
        if (isset($request->mdt) && is_array($request->mdt) && !empty($request->mdt)) {
            $filteredDiagnosisGeneral = array_filter($request->mdt, function ($value) {
                return $value != null;
            });
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'mdt',
                    'data_value' => json_encode($filteredDiagnosisGeneral),
                ];
            }
        }
        if (isset($request->Referral) && is_array($request->Referral) && !empty($request->Referral)) {
            $filteredDiagnosisGeneral = array_filter($request->Referral, function ($value) {
                return $value != null;
            });
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'referral',
                    'data_value' => json_encode($filteredDiagnosisGeneral),
                ];
            }
        }
        if (isset($request->Supportive) && is_array($request->Supportive) && !empty($request->Supportive)) {
            $filteredDiagnosisGeneral = array_filter($request->Supportive, function ($value) {
                return $value != null;
            });
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'supportive',
                    'data_value' => json_encode($filteredDiagnosisGeneral),
                ];
            }
        }
        if (isset($request->InterventionProcedure) && is_array($request->InterventionProcedure) && !empty($request->InterventionProcedure)) {
            $filteredDiagnosisGeneral = array_filter($request->InterventionProcedure, function ($value) {
                return $value != null;
            });
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'intervention_procedure',
                    'data_value' => json_encode($filteredDiagnosisGeneral),
                ];
            }
        }
        if (isset($request->elegibilityStatus) && is_array($request->elegibilityStatus) && !empty($request->elegibilityStatus)) {
            $filteredDiagnosisGeneral = array_filter($request->elegibilityStatus, function ($value) {
                return $value != null;
            });
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'elegibility_status',
                    'data_value' => json_encode($filteredDiagnosisGeneral),
                ];
            }
        }


        // $dataToInsert[] = [
        //     'patient_id' => $id,
        //     'title_name' => 'image_annotation',
        //     'data_value' => json_encode(array_filter($request->ImageAnnotation)),
        // ];


        VaricoceleEmboDiagnosis::insert($dataToInsert);

        return  redirect()->route('user.patient_medical_detail', ['id' => $request->patient_id]);
    }
    // StorePelvicCongEmboEligibilityForms
    public function StorePelvicCongEmboEligibilityForms(Request $request)
    {

        // echo "<pre>";
        // print_r($request->all());
        // die;
        $id = decrypt($request->patient_id);
        $dataToInsert = [];
        //    $diagnosis_general= $request->diagnosis_general;
        //    $diagnosis_cid= $request->diagnosis_cid;


        if (isset($request->diagnosis_general) && is_array($request->diagnosis_general) && !empty($request->diagnosis_general)) {
            // Remove elements with null values
            $filteredDiagnosisGeneral = array_filter($request->diagnosis_general, function ($value) {
                return $value != null;
            });
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'diagnosis_general',
                    'data_value' => json_encode($filteredDiagnosisGeneral)
                ];
            }
        }
        if (isset($request->diagnosis_cid) && is_array($request->diagnosis_cid) && !empty($request->diagnosis_cid)) {
            $filteredDiagnosisGeneral = array_filter($request->diagnosis_cid, function ($value) {
                return $value != null;
            });
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'diagnosis_cid',
                    'data_value' =>  json_encode($filteredDiagnosisGeneral)
                ];
            }
        }
        if (isset($request->symptoms_score) && is_array($request->symptoms_score) && !empty($request->symptoms_score)) {
            $filteredDiagnosisGeneral = array_filter($request->symptoms_score, function ($value) {
                return $value != null;
            });
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'symptoms_score',
                    'data_value' => json_encode($filteredDiagnosisGeneral)
                ];
            }
        }
        if (isset($request->imaging) && is_array($request->imaging) && !empty($request->imaging)) {
            $filteredDiagnosisGeneral = array_filter($request->imaging, function ($value) {
                return $value != null;
            });
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'Imaging',
                    'data_value' => json_encode($filteredDiagnosisGeneral),
                ];
            }
        }
        if (isset($request->clinical_indicator) && is_array($request->clinical_indicator) && !empty($request->clinical_indicator)) {
            $filteredDiagnosisGeneral = array_filter($request->clinical_indicator, function ($value) {
                return $value != null;
            });
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'ClinicalIndicator',
                    'data_value' => json_encode($filteredDiagnosisGeneral),
                ];
            }
        }
        if (isset($request->lab) && is_array($request->lab) && !empty($request->lab)) {
            $filteredDiagnosisGeneral = array_filter($request->lab, function ($value) {
                return $value != null;
            });
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'lab',
                    'data_value' => json_encode($filteredDiagnosisGeneral),
                ];
            }
        }
        if (isset($request->mdt) && is_array($request->mdt) && !empty($request->mdt)) {
            $filteredDiagnosisGeneral = array_filter($request->mdt, function ($value) {
                return $value != null;
            });
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'mdt',
                    'data_value' => json_encode($filteredDiagnosisGeneral),
                ];
            }
        }
        if (isset($request->Referral) && is_array($request->Referral) && !empty($request->Referral)) {
            $filteredDiagnosisGeneral = array_filter($request->Referral, function ($value) {
                return $value != null;
            });
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'referral',
                    'data_value' => json_encode($filteredDiagnosisGeneral),
                ];
            }
        }
        if (isset($request->Supportive) && is_array($request->Supportive) && !empty($request->Supportive)) {
            $filteredDiagnosisGeneral = array_filter($request->Supportive, function ($value) {
                return $value != null;
            });
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'supportive',
                    'data_value' => json_encode($filteredDiagnosisGeneral),
                ];
            }
        }
        if (isset($request->InterventionProcedure) && is_array($request->InterventionProcedure) && !empty($request->InterventionProcedure)) {
            $filteredDiagnosisGeneral = array_filter($request->InterventionProcedure, function ($value) {
                return $value != null;
            });
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'intervention_procedure',
                    'data_value' => json_encode($filteredDiagnosisGeneral),
                ];
            }
        }
        if (isset($request->elegibilityStatus) && is_array($request->elegibilityStatus) && !empty($request->elegibilityStatus)) {
            $filteredDiagnosisGeneral = array_filter($request->elegibilityStatus, function ($value) {
                return $value != null;
            });
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'elegibility_status',
                    'data_value' => json_encode($filteredDiagnosisGeneral),
                ];
            }
        }


        // $dataToInsert[] = [
        //     'patient_id' => $id,
        //     'title_name' => 'image_annotation',
        //     'data_value' => json_encode(array_filter($request->ImageAnnotation)),
        // ];


        PelvicCongEmbo_diagnosis::insert($dataToInsert);

        return  redirect()->route('user.patient_medical_detail', ['id' => $request->patient_id]);
    }
    // StoreVaricoseAblationEligibilityForms
    public function StoreVaricoseAblationEligibilityForms(Request $request)
    {



        $id = decrypt($request->patient_id);
        $dataToInsert = [];
        //    $diagnosis_general= $request->diagnosis_general;
        //    $diagnosis_cid= $request->diagnosis_cid;


        if (isset($request->diagnosis_general) && is_array($request->diagnosis_general) && !empty($request->diagnosis_general)) {
            // Remove elements with null values
            $filteredDiagnosisGeneral = array_filter($request->diagnosis_general, function ($value) {
                return $value != null;
            });
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'diagnosis_general',
                    'data_value' => json_encode($filteredDiagnosisGeneral)
                ];
            }
        }
        if (isset($request->diagnosis_cid) && is_array($request->diagnosis_cid) && !empty($request->diagnosis_cid)) {
            $filteredDiagnosisGeneral = array_filter($request->diagnosis_cid, function ($value) {
                return $value != null;
            });
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'diagnosis_cid',
                    'data_value' =>  json_encode($filteredDiagnosisGeneral)
                ];
            }
        }
        if (isset($request->symptoms_score) && is_array($request->symptoms_score) && !empty($request->symptoms_score)) {
            $filteredDiagnosisGeneral = array_filter($request->symptoms_score, function ($value) {
                return $value != null;
            });
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'symptoms_score',
                    'data_value' => json_encode($filteredDiagnosisGeneral)
                ];
            }
        }
        if (isset($request->imaging) && is_array($request->imaging) && !empty($request->imaging)) {
            $filteredDiagnosisGeneral = array_filter($request->imaging, function ($value) {
                return $value != null;
            });
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'Imaging',
                    'data_value' => json_encode($filteredDiagnosisGeneral),
                ];
            }
        }
        if (isset($request->clinical_indicator) && is_array($request->clinical_indicator) && !empty($request->clinical_indicator)) {
            $filteredDiagnosisGeneral = array_filter($request->clinical_indicator, function ($value) {
                return $value != null;
            });
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'ClinicalIndicator',
                    'data_value' => json_encode($filteredDiagnosisGeneral),
                ];
            }
        }
        if (isset($request->lab) && is_array($request->lab) && !empty($request->lab)) {
            $filteredDiagnosisGeneral = array_filter($request->lab, function ($value) {
                return $value != null;
            });
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'lab',
                    'data_value' => json_encode($filteredDiagnosisGeneral),
                ];
            }
        }
        if (isset($request->mdt) && is_array($request->mdt) && !empty($request->mdt)) {
            $filteredDiagnosisGeneral = array_filter($request->mdt, function ($value) {
                return $value != null;
            });
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'mdt',
                    'data_value' => json_encode($filteredDiagnosisGeneral),
                ];
            }
        }
        if (isset($request->Referral) && is_array($request->Referral) && !empty($request->Referral)) {
            $filteredDiagnosisGeneral = array_filter($request->Referral, function ($value) {
                return $value != null;
            });
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'referral',
                    'data_value' => json_encode($filteredDiagnosisGeneral),
                ];
            }
        }
        if (isset($request->Supportive) && is_array($request->Supportive) && !empty($request->Supportive)) {
            $filteredDiagnosisGeneral = array_filter($request->Supportive, function ($value) {
                return $value != null;
            });
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'supportive',
                    'data_value' => json_encode($filteredDiagnosisGeneral),
                ];
            }
        }
        if (isset($request->InterventionProcedure) && is_array($request->InterventionProcedure) && !empty($request->InterventionProcedure)) {
            $filteredDiagnosisGeneral = array_filter($request->InterventionProcedure, function ($value) {
                return $value != null;
            });
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'intervention_procedure',
                    'data_value' => json_encode($filteredDiagnosisGeneral),
                ];
            }
        }
        if (isset($request->elegibilityStatus) && is_array($request->elegibilityStatus) && !empty($request->elegibilityStatus)) {
            $filteredDiagnosisGeneral = array_filter($request->elegibilityStatus, function ($value) {
                return $value != null;
            });
            if ($filteredDiagnosisGeneral) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'elegibility_status',
                    'data_value' => json_encode($filteredDiagnosisGeneral),
                ];
            }
        }


        // $dataToInsert[] = [
        //     'patient_id' => $id,
        //     'title_name' => 'image_annotation',
        //     'data_value' => json_encode(array_filter($request->ImageAnnotation)),
        // ];


        VaricoseAblationDiagnosis::insert($dataToInsert);

        return  redirect()->route('user.patient_medical_detail', ['id' => $request->patient_id]);
    }


    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
       
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('common.login');
    }
}
