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
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class PatientController extends Controller
{
    //

    public function dashboard()
    {
        $id = auth('web')->user()->id;
        $patient = User::findOrFail($id);
        $Patient_insurer = Patient_insurer::where(['patient_id' => $id, 'status' => 'active'])->orderBy('id', 'desc')->first();
        $Patient_appointments = Patient_appointment::where('patient_id', $id)->orderBy('id', 'desc')->get();
        return view('back/patient-dashboard', compact('id', 'patient', 'Patient_insurer', 'Patient_appointments'));
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
        $id = Crypt::encrypt($id);
        return view('back/patient-detail', compact('id', 'patient', 'Patient_insurer', 'Patient_appointments'));

    }
    public function patient_medical_detail(Request $request, $id)
    {

        $id = Crypt::decrypt($id);
        $patient = User::findOrFail($id);

       $Patient_order_imaginary_exams= Patient_order_imaginary_exam::with('test','doctor')->where(['patient_id'=>$id,'form_type'=>'general_form'])->get();
       $Patient_order_labs= Patient_order_lab::with('lab','doctor')->where(['patient_id'=>$id,'form_type'=>'general_form'])->get();
        $Patient_insurer = Patient_insurer::where(['patient_id' => $id, 'status' => 'active'])->select('insurer_name', 'insurance_number')->orderBy('id', 'desc')->first();
        $Patient_past_medical_history = Patient_past_medical_history::select('id', 'diseases_name', 'describe', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_past_surgical_history = Patient_past_surgical_history::select('id', 'diseases_name', 'describe', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_current_med = Patient_current_med::select('id', 'drug_name', 'frequency', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_future_plan = Patient_future_plan::select('id', 'date', 'plan_text')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Procedure = Procedure::select('id', 'procedure_name', 'summary', 'created_at', 'entry')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Prescription = Prescription::select('id', 'prescription', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $ThyroidDiagnosis = ThyroidDiagnosis::query();
        $diagnosis_cid = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'diagnosis_cid', 'patient_id' => $id, 'form_type' => 'general_form'])->orderBy('id', 'desc')->get();


        $diagnosis_general = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'diagnosis_general', 'patient_id' => $id, 'form_type' => 'general_form'])->orderBy('id', 'desc')->get();

        $symptoms = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'symptoms', 'patient_id' => $id, 'form_type' => 'general_form'])->orderBy('id', 'desc')->get();
        // dd($symptoms);
        $symptoms_scores = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'symptoms_score', 'patient_id' => $id, 'form_type' => 'general_form'])->orderBy('id', 'desc')->get();

        $Referrals = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'Referral', 'patient_id' => $id])->orderBy('id', 'desc')->get();
        $supportives = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'supportive', 'patient_id' => $id])->orderBy('id', 'desc')->get();
        $SpecialInvestigations = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'SpecialInvestigation', 'patient_id' => $id, 'form_type' => 'general_form'])->orderBy('id', 'desc')->get();
        $ElegibilitySTATUS = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'ElegibilitySTATUS', 'patient_id' => $id, 'form_type' => 'general_form'])->orderBy('id', 'desc')->get();
        $Interventions = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'Intervention', 'patient_id' => $id])->orderBy('id', 'desc')->get();
        $MDTs = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'MDT', 'patient_id' => $id, 'form_type' => 'general_form'])->orderBy('id', 'desc')->get();
        $Labs = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at','doctor_id')->where(['title_name' => 'Lab', 'patient_id' => $id, 'form_type' => 'general_form'])->orderBy('id', 'desc')->get();

        $AntithyroidAntibodiesTests = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'AntithyroidAntibodiesTests', 'patient_id' => $id])->orderBy('id', 'desc')->get();
        $ClinicalIndicator = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'ClinicalIndicator', 'patient_id' => $id, 'form_type' => 'general_form'])->orderBy('id', 'desc')->get();
        $ClinicalExam = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'ClinicalExam', 'patient_id' => $id, 'form_type' => 'general_form'])->orderBy('id', 'desc')->get();
        $rightLobeScore = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at','doctor_id')->where(['title_name' => 'rightLobeScore', 'patient_id' => $id, 'form_type' => 'general_form'])->orderBy('id', 'desc')->get();
        $leftLobeScore = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at','doctor_id')->where(['title_name' => 'leftLobeScore', 'patient_id' => $id, 'form_type' => 'general_form'])->orderBy('id', 'desc')->get();
        $Retrosternalextension = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'Retrosternalextension', 'patient_id' => $id])->orderBy('id', 'desc')->get();
        $EnlargedLymphnodes = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'EnlargedLymphnodes', 'patient_id' => $id])->orderBy('id', 'desc')->get();
        $paralysis = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'paralysis', 'patient_id' => $id])->orderBy('id', 'desc')->get();
        $MRCIR48 = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'MRCIR48', 'patient_id' => $id])->orderBy('id', 'desc')->get();
        $CTCIR48 = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'CTCIR48', 'patient_id' => $id])->orderBy('id', 'desc')->get();
        $NmThyroidScan = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'NmThyroidScan', 'patient_id' => $id])->orderBy('id', 'desc')->get();
        $HistopathRightThyroidFNA = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'HistopathRightThyroidFNA', 'patient_id' => $id])->orderBy('id', 'desc')->get();
        $data = [
            'patient' => $patient,
            'id' => Crypt::encrypt($id),
            'patient_past_history' => $Patient_past_medical_history,
            'patient_past_surgical' => $Patient_past_surgical_history,
            'patient_current_med' => $Patient_current_med,
            'patient_future_plan' => $Patient_future_plan,
            'procedures' => $Procedure,
            'prescriptions' => $Prescription,
            'insurer' => $Patient_insurer,
            'diagnosis_generals' => $diagnosis_general,
            'diagnosis_cids' => $diagnosis_cid,
            'symptoms_db' => $symptoms,
            'symptoms_scores_db' => $symptoms_scores,
            'Referrals' => $Referrals,
            'supportives' => $supportives,
            'SpecialInvestigations_db' => $SpecialInvestigations,
            'ElegibilitySTATUSDB' => $ElegibilitySTATUS,
            'Interventions' => $Interventions,
            'MDTs_db' => $MDTs,
            'Labs' => $Labs,
            'AntithyroidAntibodiesTests' => $AntithyroidAntibodiesTests,
            'ClinicalIndicator_db' => $ClinicalIndicator,
            'ClinicalExam_db' => $ClinicalExam,
            'rightLobeScores' => $rightLobeScore,
            'leftLobeScores' => $leftLobeScore,
            'Retrosternalextension' => $Retrosternalextension,
            'EnlargedLymphnodes' => $EnlargedLymphnodes,
            'paralysis' => $paralysis,
            'MRCIR48' => $MRCIR48,
            'NmThyroidScan' => $NmThyroidScan,
            'HistopathRightThyroidFNA' => $HistopathRightThyroidFNA,
            'Patient_order_imaginary_exams'=>$Patient_order_imaginary_exams,
            'Patient_order_labs'=>$Patient_order_labs

        ];
        return view('back/view-general-report')->with($data);
    }

    public function ViewThyroidAblationForm(Request $request, $id)
    {

        $id = Crypt::decrypt($id);
        $patient = User::findOrFail($id);
        $Patient_order_imaginary_exams= Patient_order_imaginary_exam::with('test','doctor')->where(['patient_id'=>$id,'form_type'=>'thyroid_form'])->get();
        $Patient_order_labs= Patient_order_lab::with('lab','doctor')->where(['patient_id'=>$id,'form_type'=>'thyroid_form'])->get();
        $Patient_insurer = Patient_insurer::where(['patient_id' => $id, 'status' => 'active'])->select('insurer_name', 'insurance_number')->orderBy('id', 'desc')->first();
        $Patient_past_medical_history = Patient_past_medical_history::select('id', 'diseases_name', 'describe', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_past_surgical_history = Patient_past_surgical_history::select('id', 'diseases_name', 'describe', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_current_med = Patient_current_med::select('id', 'drug_name', 'frequency', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_future_plan = Patient_future_plan::select('id', 'date', 'plan_text')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Procedure = Procedure::select('id', 'procedure_name', 'summary', 'created_at', 'entry')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Prescription = Prescription::select('id', 'prescription', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();

        $ThyroidDiagnosis = ThyroidDiagnosis::query();

        $diagnosis_cid = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'diagnosis_cid', 'patient_id' => $id, 'form_type' => 'thyroid_form'])->orderBy('id', 'desc')->get();

        $diagnosis_general = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'diagnosis_general', 'patient_id' => $id, 'form_type' => 'thyroid_form'])->orderBy('id', 'desc')->get();

        $symptoms = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'symptoms', 'patient_id' => $id, 'form_type' => 'thyroid_form'])->orderBy('id', 'desc')->get();
        // dd($symptoms);
        $symptoms_scores = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'symptoms_score', 'patient_id' => $id, 'form_type' => 'thyroid_form'])->orderBy('id', 'desc')->get();

        $Referrals = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'Referral', 'patient_id' => $id])->orderBy('id', 'desc')->get();
        $supportives = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'supportive', 'patient_id' => $id])->orderBy('id', 'desc')->get();
        $SpecialInvestigations = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'SpecialInvestigation', 'patient_id' => $id, 'form_type' => 'thyroid_form'])->orderBy('id', 'desc')->get();
        $ElegibilitySTATUS = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'ElegibilitySTATUS', 'patient_id' => $id, 'form_type' => 'thyroid_form'])->orderBy('id', 'desc')->get();
        $Interventions = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'Intervention', 'patient_id' => $id])->orderBy('id', 'desc')->get();
        $MDTs = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'MDT', 'patient_id' => $id, 'form_type' => 'thyroid_form'])->orderBy('id', 'desc')->get();
        $Labs = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at','doctor_id')->where(['title_name' => 'Lab', 'patient_id' => $id, 'form_type' => 'thyroid_form'])->orderBy('id', 'desc')->get();

        $AntithyroidAntibodiesTests = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'AntithyroidAntibodiesTests', 'patient_id' => $id])->orderBy('id', 'desc')->get();
        $ClinicalIndicator = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'ClinicalIndicator', 'patient_id' => $id, 'form_type' => 'thyroid_form'])->orderBy('id', 'desc')->get();
        $ClinicalExam = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'ClinicalExam', 'patient_id' => $id, 'form_type' => 'thyroid_form'])->orderBy('id', 'desc')->get();
        $rightLobeScore = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at','doctor_id')->where(['title_name' => 'rightLobeScore', 'patient_id' => $id, 'form_type' => 'thyroid_form'])->orderBy('id', 'desc')->get();
        $leftLobeScore = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at','doctor_id')->where(['title_name' => 'leftLobeScore', 'patient_id' => $id, 'form_type' => 'thyroid_form'])->orderBy('id', 'desc')->get();
        $Retrosternalextension = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'Retrosternalextension', 'patient_id' => $id])->orderBy('id', 'desc')->get();
        $EnlargedLymphnodes = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'EnlargedLymphnodes', 'patient_id' => $id])->orderBy('id', 'desc')->get();
        $paralysis = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'paralysis', 'patient_id' => $id])->orderBy('id', 'desc')->get();
        $MRCIR48 = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'MRCIR48', 'patient_id' => $id])->orderBy('id', 'desc')->get();
        $CTCIR48 = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'CTCIR48', 'patient_id' => $id])->orderBy('id', 'desc')->get();
        $NmThyroidScan = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'NmThyroidScan', 'patient_id' => $id])->orderBy('id', 'desc')->get();
        $HistopathRightThyroidFNA = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'HistopathRightThyroidFNA', 'patient_id' => $id])->orderBy('id', 'desc')->get();
        $data = [
            'patient' => $patient,
            'id' => Crypt::encrypt($id),
            'patient_past_history' => $Patient_past_medical_history,
            'patient_past_surgical' => $Patient_past_surgical_history,
            'patient_current_med' => $Patient_current_med,
            'patient_future_plan' => $Patient_future_plan,
            'procedures' => $Procedure,
            'prescriptions' => $Prescription,
            'insurer' => $Patient_insurer,
            'diagnosis_generals' => $diagnosis_general,
            'diagnosis_cids' => $diagnosis_cid,
            'symptoms_db' => $symptoms,
            'symptoms_scores_db' => $symptoms_scores,
            'Referrals' => $Referrals,
            'supportives' => $supportives,
            'SpecialInvestigations_db' => $SpecialInvestigations,
            'ElegibilitySTATUSDB' => $ElegibilitySTATUS,
            'Interventions' => $Interventions,
            'MDTs_db' => $MDTs,
            'Labs' => $Labs,
            'AntithyroidAntibodiesTests' => $AntithyroidAntibodiesTests,
            'ClinicalIndicator_db' => $ClinicalIndicator,
            'ClinicalExam_db' => $ClinicalExam,
            'rightLobeScores' => $rightLobeScore,
            'leftLobeScores' => $leftLobeScore,
            'Retrosternalextension' => $Retrosternalextension,
            'EnlargedLymphnodes' => $EnlargedLymphnodes,
            'paralysis' => $paralysis,
            'MRCIR48' => $MRCIR48,
            'NmThyroidScan' => $NmThyroidScan,
            'HistopathRightThyroidFNA' => $HistopathRightThyroidFNA,
            'Patient_order_imaginary_exams'=>$Patient_order_imaginary_exams,
            'Patient_order_labs'=>$Patient_order_labs

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


    public function Add_Diagnosis(Request $request)
    {

        $doctor_id = auth()->guard('doctor')->id();

        $id = decrypt($request->patient_id);
        $diagnosis_general = $request->Diagnosis['general'];
        $diagnosis_cid = $request->Diagnosis['icd'];
        $form_type = $request->form_type;
        $dataToInsert = [];
    // dd('diagnosis_general',$diagnosis_general,'diagnosis_cid',$diagnosis_cid,'form_type',$form_type);

        if (isset($diagnosis_general) && is_array($diagnosis_general) && !empty($diagnosis_general)) {
            $filteredDiagnosisGeneral = array_filter($diagnosis_general, function ($value) {
                return $value !== null && $value !== '';
            });


            if ($filteredDiagnosisGeneral) {
                $associativeArray = [];
                foreach ($filteredDiagnosisGeneral as $index => $value) {
                    $associativeArray['GEN' . ($index + 1)] = [$value];
                }
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'diagnosis_general',
                    'data_value' =>  json_encode($associativeArray),
                    'doctor_id' => $doctor_id,
                    'form_type' => $form_type
                ];
            }
        }
        if (isset($diagnosis_cid) && is_array($diagnosis_cid) && !empty($diagnosis_cid)) {
            $filteredDiagnosisGeneral =  array_filter($diagnosis_cid, function ($value) {
                return $value !== null && $value !== '';
            });


            if ($filteredDiagnosisGeneral) {
                $associativeArray = [];
                foreach ($filteredDiagnosisGeneral as $index => $value) {
                    $associativeArray['ICD' . ($index + 1)] =[$value];
                }
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'diagnosis_cid',
                    'data_value' =>  json_encode($associativeArray),
                    'doctor_id' => $doctor_id,
                    'form_type' => $form_type
                ];
            }
        }

        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $dataToInsert);
        // Filter out empty subarrays
        $final_result = array_filter($filteredDiagnosisGeneral, function($subarray) {
            return !empty($subarray);
        });
        $inserted=false;
        if(isset( $final_result) && count($final_result) !== 0){
            $inserted =   ThyroidDiagnosis::insert($dataToInsert);
        }
        

        return response()->json($inserted);
    }

    public function Add_Symptoms(Request $request)
    {


       $data=$request->all();

        $doctor_id = auth()->guard('doctor')->id();

        $id = decrypt($request->patient_id);

        $form_type = $request->formType;
        $dataToInsert = [];
        $combinedArray = [];

        foreach ($data['SymptomType'] as $index => $type) {
            $combinedArray[] = [
                'SymptomType' => $type ?? '',
                'SymptomDurationValue' => $data['SymptomDurationValue'][$index] ?? '',
                'SymptomDurationType' => $data['SymptomDurationType'][$index] ?? '',
                'SymptomDurationNote' => $data['SymptomDurationNote'][$index] ?? ''
            ];
        }


    if (isset($combinedArray) && is_array($combinedArray) && !empty($combinedArray)) {
        $filteredSymptoms = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $combinedArray);

        // Check if there's any non-empty array in $filteredSymptoms
        $nonEmptyArraysExist = false;
        foreach ($filteredSymptoms as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }


        if ($nonEmptyArraysExist) {
            $filteredSymptoms = array_filter($filteredSymptoms);
            // dd($filteredSymptoms);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'symptoms',
                'data_value' =>  json_encode($filteredSymptoms),
                'doctor_id' => $doctor_id,
                'form_type' => $form_type
            ];
        }
    }
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $dataToInsert);
        // Filter out empty subarrays
        $final_result = array_filter($filteredDiagnosisGeneral, function($subarray) {
            return !empty($subarray);
        });
        $inserted=false;
        if(isset( $final_result) && count($final_result) !== 0){
            $inserted =   ThyroidDiagnosis::insert($dataToInsert);
        }
        

        return response()->json($inserted);


    }

    public function OrderSpecialInvistigation(Request $request)
    {




        $doctor_id = auth()->guard('doctor')->id();

        $id = decrypt($request->patient_id);

        $form_type = $request->formType;
        $dataToInsert = [];

        $combinedArray = ['title'=>$request->Title ?? '','subtile'=>$request->SubTitle ?? '','invistigation'=>$request->Invistigation ?? ''];





        if ($combinedArray) {
            $filteredOrderSpecialInvistigation= array_filter($combinedArray);
            // dd($filteredSymptoms);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'SpecialInvestigation',
                'data_value' =>  json_encode($filteredOrderSpecialInvistigation),
                'doctor_id' => $doctor_id,
                'form_type' => $form_type
            ];
        }

        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $dataToInsert);
        // Filter out empty subarrays
        $final_result = array_filter($filteredDiagnosisGeneral, function($subarray) {
            return !empty($subarray);
        });
        $inserted=false;
        if(isset( $final_result) && count($final_result) !== 0){
            $inserted =   ThyroidDiagnosis::insert($dataToInsert);
        }
        

        return response()->json($inserted);


    }

    public function MDTReview(Request $request)
    {


        $mdt_decisions=$request->mdt_decision;
        $mdt_elaborates=$request->mdt_elaborate;
        $doctor_id = auth()->guard('doctor')->id();

        $id = decrypt($request->patient_id);

        $form_type = $request->formType;
        $dataToInsert = [];

        $newArray = [];
        // dd($request->all());
        if(!empty($mdt_decisions)){
            foreach ($mdt_decisions as $key => $value) {
                if($value === null || empty($value)){
                    continue;
                }
                $newArray[$value] = ['asd' => $mdt_elaborates[$key]];
            }
        }



        if ($newArray) {
            $filteredOrderSpecialInvistigation= array_filter($newArray);
            // dd($filteredSymptoms);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'MDT',
                'data_value' =>  json_encode($filteredOrderSpecialInvistigation),
                'doctor_id' => $doctor_id,
                'form_type' => $form_type
            ];
        }

        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $dataToInsert);
        // Filter out empty subarrays
        $final_result = array_filter($filteredDiagnosisGeneral, function($subarray) {
            return !empty($subarray);
        });
        $inserted=false;
        
        if(isset($final_result) && count($final_result) !== 0){
            $inserted =   ThyroidDiagnosis::insert($dataToInsert);
        }
        

        return response()->json($inserted);

    }


    public function EligibilityStatus(Request $request)
    {


        $eligiblity_titles=$request->eligiblity_titles;
        $eligiblity_notes=$request->eligiblity_notes;
        $doctor_id = auth()->guard('doctor')->id();

        $id = decrypt($request->patient_id);

        $form_type = $request->formType;
        $dataToInsert = [];

        $newArray = [];
        if(!empty($eligiblity_titles)){
            foreach ($eligiblity_titles as $key => $value) {
                if($value === null || empty($value)){
                    continue;
                }
                $newArray[$value] = ['asd' => $eligiblity_notes[$key]];
            }
        }



        if ($newArray) {
            $filteredOrderSpecialInvistigation= array_filter($newArray);
            // dd($filteredSymptoms);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'ElegibilitySTATUS',
                'data_value' =>  json_encode($filteredOrderSpecialInvistigation),
                'doctor_id' => $doctor_id,
                'form_type' => $form_type
            ];
        }

        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $dataToInsert);
        // Filter out empty subarrays
        $final_result = array_filter($filteredDiagnosisGeneral, function($subarray) {
            return !empty($subarray);
        });
        $inserted=false;
        
        if(isset($final_result) && count($final_result) !== 0){
            $inserted =   ThyroidDiagnosis::insert($dataToInsert);
        }
        

        return response()->json($inserted);

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
        $doctor_id=auth('doctor')->user()->id;
        $doctor_nurses=DB::table('doctor_nurse')->where('doctor_id',$doctor_id)->pluck('nurse_id');
        $patientId = decrypt($data['patient_id']);
        $result=false;
        $dataInsertedTo=[];
        $lab_test_names = $data['lab_test_names'];
        $formType=$request->formType;
        $filtered_lab_test_names  = array_filter($lab_test_names, function ($value) {
            return $value !== null && $value !== '';
        });
       
        foreach ($doctor_nurses as $nurse_id) {
            
            $dataInsertedTo[]=[
                'patient_id' => $patientId,
                'pathology_price_list_id' => json_encode($filtered_lab_test_names),
                'doctor_id'=>$doctor_id,
                'form_type'=>$formType,
                'nurse_id'=>$nurse_id,
                'test_type'=>'radiology'

            ];

        }




        // foreach ($lab_test_names as $lab_test_name) {
        //     $dataInsertedTo[]=[
        //         'patient_id' => $patientId,
        //         'pathology_price_list_id' => $lab_test_name,
        //         'doctor_id'=>$doctor_id,
        //         'form_type'=>$formType

        //     ];

        // }

        if(!empty($dataInsertedTo)){
          $result=  DB::table('nurse_tasks')->insert($dataInsertedTo);
        }


        return response()->json($result);
        // $data = $request->all();
        // $doctor_id=auth('doctor')->user()->id;
        // $patientId = decrypt($data['patient_id']);
        // $result=false;
        // $dataInsertedTo=[];
        // $testNames = $data['test_name'];
        // $formType=$request->formType;
        // $testNames = array_filter($testNames);
        // foreach ($testNames as $testName) {
        //     $dataInsertedTo[]=[
        //         'patient_id' => $patientId,
        //         'test_id' => $testName,
        //         'doctor_id'=>$doctor_id,
        //         'form_type'=>$formType,
        //         'summery'=>$request->test_summery
        //     ];

        // }
        // if(!empty($dataInsertedTo)){
        //   $result=  Patient_order_imaginary_exam::insert($dataInsertedTo);
        // }


        // return response()->json($result);
    }

    public function order_lab_test(Request $request)
    {
        $data = $request->all();
        $doctor_id=auth('doctor')->user()->id;
        $receptionists=DB::table('doctors')->where(['user_type'=>'Receptionist','role_id'=>11])->pluck('id');
        
        $doctor_nurses=DB::table('doctor_nurse')->where('doctor_id',$doctor_id)->pluck('nurse_id');
        $patientId = decrypt($data['patient_id']);
        $result=false;
        $dataInsertedTo=[];
        $dataInsertedToReceptionist=[];
        $lab_test_names = $data['lab_test_names'];
        $formType=$request->formType;
        $filtered_lab_test_names  = array_filter($lab_test_names, function ($value) {
            return $value !== null && $value !== '';
        });
       
        foreach ($doctor_nurses as $nurse_id) {
            
            $dataInsertedTo=[
                'patient_id' => $patientId,
                'pathology_price_list_id' => json_encode($filtered_lab_test_names),
                'doctor_id'=>$doctor_id,
                'form_type'=>$formType,
                'nurse_id'=>$nurse_id,
                'test_type'=>'pathology'
               

            ];
            if(!empty($dataInsertedTo)){
                $inserted_id=  DB::table('nurse_tasks')->insertGetId($dataInsertedTo);
                
                if(isset($receptionists)){

               
                foreach ($receptionists as $receptionist_id) {

                    $dataInsertedToReceptionist=[
                        'nurse_task_id' => $inserted_id,
                        'receptionist_id' => $receptionist_id
                       
                    ];
                    $result=  DB::table('receptionist_tasks')->insertGetId($dataInsertedToReceptionist);
                    $result=true;

                }
            }

              }

        }

        


        return response()->json($result);




    }

    public function order_lab_test_list(Request $request)
    {

        $patient_id = Crypt::decrypt($request->patient_id);
        $doctor_id=auth('doctor')->user()->id;

        $latestOrderLabs = DB::table('nurse_tasks')
            
            ->select(
                'id',
                'doctor_id',
                'patient_id',
                'form_type'
            )
            ->where('doctor_id',)
            ->orderByDesc('doctor_id',$doctor_id)
            ->take(5)
            ->get();

        return response()->json($latestOrderLabs);
    }
    public function order_lab_test_list_delete(Request $request)
    {

        $Patient_order_lab = DB::table('nurse_tasks')->where('id', $request->lab_id)->delete();
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
                'doctor_id' => auth()->guard('doctor')->id()
            ]);
        }



        return response()->json($data);
    }

    public function clinical_exam_add(Request $request)
    {
        $data=$request->all();
    // dd($data);
        $doctor_id = auth()->guard('doctor')->id();

        $id = decrypt($request->patient_id);

        $form_type = $request->formType;
        $dataToInsert = [];



        if (isset($request->clinical_exam) && is_array($request->clinical_exam) && !empty($request->clinical_exam)) {
            $filteredDiagnosisGeneral = array_map(function ($subarray) {
                return array_filter($subarray, function ($value) {
                    return $value !== null && $value !== '';
                });
            }, $request->clinical_exam);

            // Check if there's any non-empty array in $filteredDiagnosisGeneral
            $nonEmptyArraysExist = false;
            foreach ($filteredDiagnosisGeneral as $subarray) {
                if (!empty($subarray)) {
                    $nonEmptyArraysExist = true;
                    break;
                }
            }

            if ($nonEmptyArraysExist) {
                $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'ClinicalExam',
                    'data_value' =>  json_encode($filteredDiagnosisGeneral),
                    'doctor_id' => $doctor_id,
                    'form_type' => $form_type
                ];
            }
        }

        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $dataToInsert);
        // Filter out empty subarrays
        $final_result = array_filter($filteredDiagnosisGeneral, function($subarray) {
            return !empty($subarray);
        });
        $inserted=false;
        if(isset( $final_result) && count($final_result) !== 0){
            $inserted =   ThyroidDiagnosis::insert($dataToInsert);
        }
        

        return response()->json($inserted);



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
        $validator = Validator::make($request->all(), [
            'email' => [

                'email',
                Rule::unique('users')->ignore($patientId),
            ],
            'post_code' => 'numeric',

            'landline' => 'numeric',
            'mobile_no' => [

                'numeric',
                Rule::unique('users')->ignore($patientId),
            ],

        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }




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
            } else {
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
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email',
            'mobile_no' => 'numeric|unique:users,mobile_no',
            'post_code' => 'numeric',

        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }
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

        $patientData = [];
        foreach ($patients as $patient) {
            if (!is_null($patient->id)) {
                $encryptedId = Crypt::encrypt($patient->id);
                $patientData[] = [
                    'id' => $encryptedId,
                    'name' => $patient->name,
                    'street' => $patient->street,
                    'email' => $patient->email,
                    'post_code' => $patient->post_code,
                    'mobile_no' => $patient->mobile_no,
                    'patient_id' => $patient->patient_id,
                ];
            }
        }


        $patientDataObject = (object) $patientData;

        return response()->json($patientDataObject);
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
            return redirect()->route('user.VaricoceleEmbolizationEligibilityForms', ['patient_id' => $patient_id]);
        } elseif ($EligibilityForm == "PelvicCongEmbo") {
            return redirect()->route('user.PelvicCongEmbolizationEligibilityForms', ['patient_id' => $patient_id]);
        } elseif ($EligibilityForm == "VaricoseAblation") {
            return redirect()->route('user.VaricoseAblationlizationEligibilityForms', ['patient_id' => $patient_id]);
        }
        elseif ($EligibilityForm == "HaemorrhoidsEmbo") {
            return redirect()->route('user.HaemorrhoidsEmbolizationEligibilityForms', ['patient_id' => $patient_id]);
        }
        elseif ($EligibilityForm == "KneePain") {
            return redirect()->route('user.KneePainlizationEligibilityForms', ['patient_id' => $patient_id]);
        }
        elseif ($EligibilityForm == "SpinePain") {
            return redirect()->route('user.SpinePainlizationEligibilityForms', ['patient_id' => $patient_id]);
        }
        elseif ($EligibilityForm == "MSKPain") {
            return redirect()->route('user.MSKPainlizationEligibilityForms', ['patient_id' => $patient_id]);
        }
        elseif ($EligibilityForm == "ShoulderPain") {
            return redirect()->route('user.ShoulderPainlizationEligibilityForms', ['patient_id' => $patient_id]);
        }
        elseif ($EligibilityForm == "HeadachePain") {
            return redirect()->route('user.HeadachePainlizationEligibilityForms', ['patient_id' => $patient_id]);
        }
        elseif ($EligibilityForm == "GeneralForm") {
            return redirect()->route('user.patient_medical_detail', ['id' => $patient_id]);
        }
       
        else {
            abort(404);
        }
    }

    public function HeadachePainEmbolizationEligibilityForms(Request $request, $patient_id)
    {
        return view('back/headache-pain', compact('patient_id'));
    }
    public function ShoulderPainEmbolizationEligibilityForms(Request $request, $patient_id)
    {
        return view('back/shoulder-pain', compact('patient_id'));
    }
    public function MSKPainEmbolizationEligibilityForms(Request $request, $patient_id)
    {
        return view('back/msk-pain', compact('patient_id'));
    }
    public function SpinePainEmbolizationEligibilityForms(Request $request, $patient_id)
    {
        return view('back/spine-pain', compact('patient_id'));
    }

    public function KneePainEmbolizationEligibilityForms(Request $request, $patient_id)
    {
        return view('back/knee-pain', compact('patient_id'));
    }
    public function HaemorrhoidsEmboEmbolizationEligibilityForms(Request $request, $patient_id)
    {
        return view('back/haemorrhoids_embo', compact('patient_id'));
    }
    public function VaricoseAblationEmbolizationEligibilityForms(Request $request, $patient_id)
    {
        return view('back/varicose_ablation', compact('patient_id'));
    }
    public function PelvicCongEmboEmbolizationEligibilityForms(Request $request, $patient_id)
    {
        return view('back/pelvic_cong_embo', compact('patient_id'));
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

// Varicocele Embo form edit method
public function editVaricoceleEmboEligibilityForms(Request $request)
{
    $id = decrypt($request->patient_id);
    // $id = decrypt();
    $ThyroidDiagnosis = ThyroidDiagnosis::query();

    $diagnosis_general = $ThyroidDiagnosis->select('data_value')->where(['title_name' => 'diagnosis_general', 'patient_id' => $id, 'form_type' => 'VaricoceleEmboForm'])->get();
    $diagnosis_cid = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'diagnosis_cid', 'patient_id' => $id, 'form_type' => 'VaricoceleEmboForm'])->get();


    $symptoms = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'symptoms', 'patient_id' => $id, 'form_type' => 'VaricoceleEmboForm'])->get();
    $Imaging = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'Imaging', 'patient_id' => $id, 'form_type' => 'VaricoceleEmboForm'])->orderBy('id', 'desc')->first();
    $symptoms_scores = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'symptoms_score', 'patient_id' => $id, 'form_type' => 'VaricoceleEmboForm'])->first();

   $Referrals = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'Referral', 'patient_id' => $id, 'form_type' => 'VaricoceleEmboForm'])->first();
    $supportives = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'supportive', 'patient_id' => $id, 'form_type' => 'VaricoceleEmboForm'])->first();
    $SpecialInvestigations = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'SpecialInvestigation', 'patient_id' => $id, 'form_type' => 'VaricoceleEmboForm'])->first();
    $ElegibilitySTATUS = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'ElegibilitySTATUS', 'patient_id' => $id, 'form_type' => 'VaricoceleEmboForm'])->first();
    $Interventions = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'Intervention', 'patient_id' => $id, 'form_type' => 'VaricoceleEmboForm'])->first();
    $Prescription = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'Prescription', 'patient_id' => $id, 'form_type' => 'VaricoceleEmboForm'])->first();
    // dd($Prescription);
    $MDTs = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'MDT', 'patient_id' => $id, 'form_type' => 'VaricoceleEmboForm'])->first();
    $Labs = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'Lab', 'patient_id' => $id, 'form_type' => 'VaricoceleEmboForm'])->first();
    $AntithyroidAntibodiesTests = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'AntithyroidAntibodiesTests', 'patient_id' => $id, 'form_type' => 'VaricoceleEmboForm'])->first();
    $ClinicalIndicator = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'ClinicalIndicator', 'patient_id' => $id, 'form_type' => 'VaricoceleEmboForm'])->first();
    $ClinicalExam = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'ClinicalExam', 'patient_id' => $id, 'form_type' => 'VaricoceleEmboForm'])->first();

    $data = [
        'patient_id' => Crypt::encrypt($id),
        'diagnosis_generals_db' => $diagnosis_general,
        'diagnosis_cids_db' => $diagnosis_cid,
        'symptoms' => $symptoms,
        'symptoms_scores' => $symptoms_scores,
        'Referrals' => $Referrals,
        'supportives' => $supportives,
        'SpecialInvestigations' => $SpecialInvestigations,
        'ElegibilitySTATUS' => $ElegibilitySTATUS,
        'Interventions' => $Interventions,
        'MDTs' => $MDTs,
        'Labs' => $Labs,
        'AntithyroidAntibodiesTests' => $AntithyroidAntibodiesTests,
        'clinical_indicators' => $ClinicalIndicator,
        'ClinicalExam' => $ClinicalExam,
        'Imaging'=>$Imaging,
        'Prescription'=>$Prescription


    ];
    return view('back/Edit_varicocele_embo', $data);
}

// Varicocele Embo  form update method
public function updateVaricoceleEmboEligibilityForms(Request $request)
{
    ThyroidDiagnosis::where('form_type', 'VaricoceleEmboForm')->delete();

    $this->storeVaricoceleEmboEligibilityForms($request);
    $patientId=  $request->patient_id;
   
    return response()->json(['patient_id' => $patientId]);
}


    //Varicocele Embo  form view method
public function viewVaricoceleEmboEligibilityForms(Request $request, $id)
{
    $id = Crypt::decrypt($id);
    $patient = User::findOrFail($id);

   $Patient_order_imaginary_exams= Patient_order_imaginary_exam::with('test','doctor')->where(['patient_id'=>$id,'form_type'=>'VaricoceleEmboForm'])->get();
   $Patient_order_labs= Patient_order_lab::with('lab','doctor')->where(['patient_id'=>$id,'form_type'=>'VaricoceleEmboForm'])->get();
    $Patient_insurer = Patient_insurer::where(['patient_id' => $id, 'status' => 'active'])->select('insurer_name', 'insurance_number')->orderBy('id', 'desc')->first();
    $Patient_past_medical_history = Patient_past_medical_history::select('id', 'diseases_name', 'describe', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
    $Patient_past_surgical_history = Patient_past_surgical_history::select('id', 'diseases_name', 'describe', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
    $Patient_current_med = Patient_current_med::select('id', 'drug_name', 'frequency', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
    $Patient_future_plan = Patient_future_plan::select('id', 'date', 'plan_text')->where('patient_id', $id)->orderBy('id', 'desc')->get();
    $Procedure = Procedure::select('id', 'procedure_name', 'summary', 'created_at', 'entry')->where('patient_id', $id)->orderBy('id', 'desc')->get();
    $Prescription = Prescription::select('id', 'prescription', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
    $ThyroidDiagnosis = ThyroidDiagnosis::query();
    $diagnosis_cid = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'diagnosis_cid', 'patient_id' => $id, 'form_type' => 'VaricoceleEmboForm'])->orderBy('id', 'desc')->get();
    $Imaging = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'Imaging', 'patient_id' => $id, 'form_type' => 'VaricoceleEmboForm'])->orderBy('id', 'desc')->get();

    $diagnosis_general = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'diagnosis_general', 'patient_id' => $id, 'form_type' => 'VaricoceleEmboForm'])->orderBy('id', 'desc')->get();
    $ClinicalIndicator = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'ClinicalIndicator', 'patient_id' => $id, 'form_type' => 'VaricoceleEmboForm'])->orderBy('id', 'desc')->get();
    $ClinicalExam = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'ClinicalExam', 'patient_id' => $id, 'form_type' => 'VaricoceleEmboForm'])->orderBy('id', 'desc')->get();

    $symptoms = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'symptoms', 'patient_id' => $id, 'form_type' => 'VaricoceleEmboForm'])->orderBy('id', 'desc')->get();
    // dd($symptoms);
    $symptoms_scores = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'symptoms_score', 'patient_id' => $id, 'form_type' => 'VaricoceleEmboForm'])->orderBy('id', 'desc')->get();

    $Referrals = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'Referral', 'patient_id' => $id])->orderBy('id', 'desc')->get();
    $supportives = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'supportive', 'patient_id' => $id])->orderBy('id', 'desc')->get();
    $SpecialInvestigations = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'SpecialInvestigation', 'patient_id' => $id, 'form_type' => 'VaricoceleEmboForm'])->orderBy('id', 'desc')->get();
    $ElegibilitySTATUS = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'ElegibilitySTATUS', 'patient_id' => $id, 'form_type' => 'VaricoceleEmboForm'])->orderBy('id', 'desc')->get();
    $Interventions = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'Intervention', 'patient_id' => $id])->orderBy('id', 'desc')->get();
    $MDTs = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'MDT', 'patient_id' => $id, 'form_type' => 'VaricoceleEmboForm'])->orderBy('id', 'desc')->get();
    $Labs = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at','doctor_id')->where(['title_name' => 'Lab', 'patient_id' => $id, 'form_type' => 'VaricoceleEmboForm'])->orderBy('id', 'desc')->get();

    $data = [
        'patient' => $patient,
        'id' => Crypt::encrypt($id),
        'patient_past_history' => $Patient_past_medical_history,
        'patient_past_surgical' => $Patient_past_surgical_history,
        'patient_current_med' => $Patient_current_med,
        'patient_future_plan' => $Patient_future_plan,
        'procedures' => $Procedure,
        'prescriptions' => $Prescription,
        'insurer' => $Patient_insurer,
        'diagnosis_generals' => $diagnosis_general,
        'diagnosis_cids' => $diagnosis_cid,
        'symptoms_db' => $symptoms,
        'symptoms_scores_db' => $symptoms_scores,
        'Referrals' => $Referrals,
        'supportives' => $supportives,
        'SpecialInvestigations_db' => $SpecialInvestigations,
        'ElegibilitySTATUSDB' => $ElegibilitySTATUS,
        'Interventions' => $Interventions,
        'MDTs_db' => $MDTs,
        'Labs' => $Labs,
        'Patient_order_imaginary_exams'=>$Patient_order_imaginary_exams,
        'Patient_order_labs'=>$Patient_order_labs,
        'Imaging'=>$Imaging,
        'ClinicalIndicator_db' => $ClinicalIndicator,
        'ClinicalExam_db' => $ClinicalExam,

    ];

    return view('back/view-varicocele-embo-report')->with($data);
}

    // Varicocele Embo form save 
    public function storeVaricoceleEmboEligibilityForms(Request $request)
    {

        $doctor_id = auth()->guard('doctor')->id();

    $id = decrypt($request->patient_id);
    $dataToInsert = [];


    if (isset($request->diagnosis_general) && is_array($request->diagnosis_general) && !empty($request->diagnosis_general)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->diagnosis_general);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'diagnosis_general',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'VaricoceleEmboForm'
            ];
        }
    }
    if (isset($request->diagnosis_cid) && is_array($request->diagnosis_cid) && !empty($request->diagnosis_cid)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->diagnosis_cid);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'diagnosis_cid',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'VaricoceleEmboForm'
            ];
        }
    }
    $data=$request->symptoms;
    $newArray = [];

    foreach ($data as $item) {
        $newArray[] = [
            'SymptomType' => $item[0] ?? '',
            'SymptomDurationValue' => $item[1] ?? '',
            'SymptomDurationType' => $item[2] ?? '',
            'SymptomDurationNote' => $item[3] ?? ''
        ];
    }


    if (isset($newArray) && is_array($newArray) && !empty($newArray)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $newArray);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);

            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'symptoms',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'VaricoceleEmboForm'
            ];
        }
    }
    if (isset($request->symptoms_score) && is_array($request->symptoms_score) && !empty($request->symptoms_score)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->symptoms_score);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'symptoms_score',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'VaricoceleEmboForm'
            ];
        }
    }

    if (isset($request->Referral) && is_array($request->Referral) && !empty($request->Referral)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->Referral);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'Referral',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'VaricoceleEmboForm'
            ];
        }
    }
    if (isset($request->Supportive) && is_array($request->Supportive) && !empty($request->Supportive)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->Supportive);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'Supportive',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'VaricoceleEmboForm'
            ];
        }
    }
    if (isset($request->SpecialInvestigation) && is_array($request->SpecialInvestigation) && !empty($request->SpecialInvestigation)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->SpecialInvestigation);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'SpecialInvestigation',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'VaricoceleEmboForm'
            ];
        }
    }
    if (isset($request->ElegibilitySTATUS) && is_array($request->ElegibilitySTATUS) && !empty($request->ElegibilitySTATUS)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->ElegibilitySTATUS);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'ElegibilitySTATUS',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'VaricoceleEmboForm'
            ];
        }
    }

    if (isset($request->Intervention) && is_array($request->Intervention) && !empty($request->Intervention)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->Intervention);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'Intervention',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'VaricoceleEmboForm'
            ];
        }
    }
    if (isset($request->MDT) && is_array($request->MDT) && !empty($request->MDT)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->MDT);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'MDT',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'VaricoceleEmboForm'
            ];
        }
    }
    if (isset($request->Lab) && is_array($request->Lab) && !empty($request->Lab)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->Lab);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'Lab',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'VaricoceleEmboForm'
            ];
        }
    }

    if (isset($request->Imaging) && is_array($request->Imaging) && !empty($request->Imaging)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->Imaging);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'Imaging',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'VaricoceleEmboForm'
            ];
        }
    }


    if (isset($request->clinical_indicator) && is_array($request->clinical_indicator) && !empty($request->clinical_indicator)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->clinical_indicator);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'ClinicalIndicator',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'VaricoceleEmboForm'
            ];
        }
    }
    if (isset($request->clinical_exam) && is_array($request->clinical_exam) && !empty($request->clinical_exam)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->clinical_exam);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'ClinicalExam',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'VaricoceleEmboForm'
            ];
        }
    }




    if(!empty($dataToInsert)){
        ThyroidDiagnosis::insert($dataToInsert);

    }


    $patientId=  $request->patient_id;
   
    return response()->json(['patient_id' => $patientId]);
    }
   
// HeadachePain form edit method
public function editHeadachePainEligibilityForms(Request $request)
{
    $id = decrypt($request->patient_id);
    // $id = decrypt();
    $ThyroidDiagnosis = ThyroidDiagnosis::query();

    $diagnosis_general = $ThyroidDiagnosis->select('data_value')->where(['title_name' => 'diagnosis_general', 'patient_id' => $id, 'form_type' => 'HeadachePain'])->get();
    $diagnosis_cid = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'diagnosis_cid', 'patient_id' => $id, 'form_type' => 'HeadachePain'])->get();


    $symptoms = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'symptoms', 'patient_id' => $id, 'form_type' => 'HeadachePain'])->get();
    $Imaging = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'Imaging', 'patient_id' => $id, 'form_type' => 'HeadachePain'])->orderBy('id', 'desc')->first();
    $symptoms_scores = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'symptoms_score', 'patient_id' => $id, 'form_type' => 'HeadachePain'])->first();

   $Referrals = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'Referral', 'patient_id' => $id, 'form_type' => 'HeadachePain'])->first();
    $supportives = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'supportive', 'patient_id' => $id, 'form_type' => 'HeadachePain'])->first();
    $SpecialInvestigations = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'SpecialInvestigation', 'patient_id' => $id, 'form_type' => 'HeadachePain'])->first();
    $ElegibilitySTATUS = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'ElegibilitySTATUS', 'patient_id' => $id, 'form_type' => 'HeadachePain'])->first();
    $Interventions = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'Intervention', 'patient_id' => $id, 'form_type' => 'HeadachePain'])->first();
    $Prescription = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'Prescription', 'patient_id' => $id, 'form_type' => 'HeadachePain'])->first();
    // dd($Prescription);
    $MDTs = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'MDT', 'patient_id' => $id, 'form_type' => 'HeadachePain'])->first();
    $Labs = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'Lab', 'patient_id' => $id, 'form_type' => 'HeadachePain'])->first();
    $AntithyroidAntibodiesTests = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'AntithyroidAntibodiesTests', 'patient_id' => $id, 'form_type' => 'HeadachePain'])->first();
    $ClinicalIndicator = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'ClinicalIndicator', 'patient_id' => $id, 'form_type' => 'HeadachePain'])->first();
    $ClinicalExam = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'ClinicalExam', 'patient_id' => $id, 'form_type' => 'HeadachePain'])->first();

    $data = [
        'patient_id' => Crypt::encrypt($id),
        'diagnosis_generals_db' => $diagnosis_general,
        'diagnosis_cids_db' => $diagnosis_cid,
        'symptoms' => $symptoms,
        'symptoms_scores' => $symptoms_scores,
        'Referrals' => $Referrals,
        'supportives' => $supportives,
        'SpecialInvestigations' => $SpecialInvestigations,
        'ElegibilitySTATUS' => $ElegibilitySTATUS,
        'Interventions' => $Interventions,
        'MDTs' => $MDTs,
        'Labs' => $Labs,
        'AntithyroidAntibodiesTests' => $AntithyroidAntibodiesTests,
        'clinical_indicators' => $ClinicalIndicator,
        'ClinicalExam' => $ClinicalExam,
        'Imaging'=>$Imaging,
        'Prescription'=>$Prescription


    ];
    return view('back/Edit_headache_pain', $data);
}

// HeadachePain form update method
public function updateHeadachePainEligibilityForms(Request $request)
{
    ThyroidDiagnosis::where('form_type', 'HeadachePain')->delete();

    $this->storeHeadachePainEligibilityForms($request);
    $patientId=  $request->patient_id;
   
    return response()->json(['patient_id' => $patientId]);
}



// HeadachePain form store method
public function storeHeadachePainEligibilityForms(Request $request)
{

    $doctor_id = auth()->guard('doctor')->id();

    $id = decrypt($request->patient_id);
    $dataToInsert = [];


    if (isset($request->diagnosis_general) && is_array($request->diagnosis_general) && !empty($request->diagnosis_general)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->diagnosis_general);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'diagnosis_general',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'HeadachePain'
            ];
        }
    }
    if (isset($request->diagnosis_cid) && is_array($request->diagnosis_cid) && !empty($request->diagnosis_cid)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->diagnosis_cid);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'diagnosis_cid',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'HeadachePain'
            ];
        }
    }
    $data=$request->symptoms;
    $newArray = [];

    foreach ($data as $item) {
        $newArray[] = [
            'SymptomType' => $item[0] ?? '',
            'SymptomDurationValue' => $item[1] ?? '',
            'SymptomDurationType' => $item[2] ?? '',
            'SymptomDurationNote' => $item[3] ?? ''
        ];
    }


    if (isset($newArray) && is_array($newArray) && !empty($newArray)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $newArray);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);

            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'symptoms',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'HeadachePain'
            ];
        }
    }
    if (isset($request->symptoms_score) && is_array($request->symptoms_score) && !empty($request->symptoms_score)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->symptoms_score);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'symptoms_score',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'HeadachePain'
            ];
        }
    }

    if (isset($request->Referral) && is_array($request->Referral) && !empty($request->Referral)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->Referral);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'Referral',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'HeadachePain'
            ];
        }
    }
    if (isset($request->Supportive) && is_array($request->Supportive) && !empty($request->Supportive)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->Supportive);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'Supportive',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'HeadachePain'
            ];
        }
    }
    if (isset($request->Prescription) && is_array($request->Prescription) && !empty($request->Prescription)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->Prescription);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'Prescription',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'HeadachePain'
            ];
        }
    }
    if (isset($request->SpecialInvestigation) && is_array($request->SpecialInvestigation) && !empty($request->SpecialInvestigation)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->SpecialInvestigation);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'SpecialInvestigation',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'HeadachePain'
            ];
        }
    }
    if (isset($request->ElegibilitySTATUS) && is_array($request->ElegibilitySTATUS) && !empty($request->ElegibilitySTATUS)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->ElegibilitySTATUS);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'ElegibilitySTATUS',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'HeadachePain'
            ];
        }
    }

    if (isset($request->Intervention) && is_array($request->Intervention) && !empty($request->Intervention)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->Intervention);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'Intervention',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'HeadachePain'
            ];
        }
    }
    if (isset($request->MDT) && is_array($request->MDT) && !empty($request->MDT)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->MDT);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'MDT',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'HeadachePain'
            ];
        }
    }
    if (isset($request->Lab) && is_array($request->Lab) && !empty($request->Lab)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->Lab);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'Lab',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'HeadachePain'
            ];
        }
    }

    if (isset($request->Imaging) && is_array($request->Imaging) && !empty($request->Imaging)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->Imaging);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'Imaging',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'HeadachePain'
            ];
        }
    }


    if (isset($request->clinical_indicator) && is_array($request->clinical_indicator) && !empty($request->clinical_indicator)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->clinical_indicator);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'ClinicalIndicator',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'HeadachePain'
            ];
        }
    }
    if (isset($request->clinical_exam) && is_array($request->clinical_exam) && !empty($request->clinical_exam)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->clinical_exam);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'ClinicalExam',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'HeadachePain'
            ];
        }
    }




    if(!empty($dataToInsert)){
        ThyroidDiagnosis::insert($dataToInsert);

    }

    $patientId=  $request->patient_id;
   
    return response()->json(['patient_id' => $patientId]);
}

// HeadachePain form view method Edit_varicose_ablation
public function viewHeadachePainEligibilityForms(Request $request, $id)
{
    $id = Crypt::decrypt($id);
    $patient = User::findOrFail($id);

   $Patient_order_imaginary_exams= Patient_order_imaginary_exam::with('test','doctor')->where(['patient_id'=>$id,'form_type'=>'HeadachePain'])->get();
   $Patient_order_labs= Patient_order_lab::with('lab','doctor')->where(['patient_id'=>$id,'form_type'=>'HeadachePain'])->get();
    $Patient_insurer = Patient_insurer::where(['patient_id' => $id, 'status' => 'active'])->select('insurer_name', 'insurance_number')->orderBy('id', 'desc')->first();
    $Patient_past_medical_history = Patient_past_medical_history::select('id', 'diseases_name', 'describe', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
    $Patient_past_surgical_history = Patient_past_surgical_history::select('id', 'diseases_name', 'describe', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
    $Patient_current_med = Patient_current_med::select('id', 'drug_name', 'frequency', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
    $Patient_future_plan = Patient_future_plan::select('id', 'date', 'plan_text')->where('patient_id', $id)->orderBy('id', 'desc')->get();
    $Procedure = Procedure::select('id', 'procedure_name', 'summary', 'created_at', 'entry')->where('patient_id', $id)->orderBy('id', 'desc')->get();
    // $Prescription = Prescription::select('id', 'prescription', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
    $ThyroidDiagnosis = ThyroidDiagnosis::query();
    $diagnosis_cid = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'diagnosis_cid', 'patient_id' => $id, 'form_type' => 'HeadachePain'])->orderBy('id', 'desc')->get();
    $Imaging = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'Imaging', 'patient_id' => $id, 'form_type' => 'HeadachePain'])->orderBy('id', 'desc')->get();

    $diagnosis_general = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'diagnosis_general', 'patient_id' => $id, 'form_type' => 'HeadachePain'])->orderBy('id', 'desc')->get();
    $ClinicalIndicator = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'ClinicalIndicator', 'patient_id' => $id, 'form_type' => 'HeadachePain'])->orderBy('id', 'desc')->get();
    $ClinicalExam = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'ClinicalExam', 'patient_id' => $id, 'form_type' => 'HeadachePain'])->orderBy('id', 'desc')->get();

    $symptoms = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'symptoms', 'patient_id' => $id, 'form_type' => 'HeadachePain'])->orderBy('id', 'desc')->get();
    // dd($symptoms);
    $symptoms_scores = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'symptoms_score', 'patient_id' => $id, 'form_type' => 'HeadachePain'])->orderBy('id', 'desc')->get();

    $Referrals = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'Referral', 'patient_id' => $id])->orderBy('id', 'desc')->get();
    $supportives = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'supportive', 'patient_id' => $id])->orderBy('id', 'desc')->get();
    $Prescription = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'Prescription', 'patient_id' => $id])->orderBy('id', 'desc')->get();
    $SpecialInvestigations = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'SpecialInvestigation', 'patient_id' => $id, 'form_type' => 'HeadachePain'])->orderBy('id', 'desc')->get();
    $ElegibilitySTATUS = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'ElegibilitySTATUS', 'patient_id' => $id, 'form_type' => 'HeadachePain'])->orderBy('id', 'desc')->get();
    
    $Interventions = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'Intervention', 'patient_id' => $id])->orderBy('id', 'desc')->get();
    $MDTs = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'MDT', 'patient_id' => $id, 'form_type' => 'HeadachePain'])->orderBy('id', 'desc')->get();

    
    $Labs = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at','doctor_id')->where(['title_name' => 'Lab', 'patient_id' => $id, 'form_type' => 'HeadachePain'])->orderBy('id', 'desc')->get();

    $data = [
        'patient' => $patient,
        'id' => Crypt::encrypt($id),
        'patient_past_history' => $Patient_past_medical_history,
        'patient_past_surgical' => $Patient_past_surgical_history,
        'patient_current_med' => $Patient_current_med,
        'patient_future_plan' => $Patient_future_plan,
        'procedures' => $Procedure,
        'prescriptions' => $Prescription,
        'insurer' => $Patient_insurer,
        'diagnosis_generals' => $diagnosis_general,
        'diagnosis_cids' => $diagnosis_cid,
        'symptoms_db' => $symptoms,
        'symptoms_scores_db' => $symptoms_scores,
        'Referrals' => $Referrals,
        'supportives' => $supportives,
        'SpecialInvestigations_db' => $SpecialInvestigations,
        'ElegibilitySTATUSDB' => $ElegibilitySTATUS,
        'Interventions' => $Interventions,
        'MDTs_db' => $MDTs,
        'Labs' => $Labs,
        'Patient_order_imaginary_exams'=>$Patient_order_imaginary_exams,
        'Patient_order_labs'=>$Patient_order_labs,
        'Imaging'=>$Imaging,
        'ClinicalIndicator_db' => $ClinicalIndicator,
        'ClinicalExam_db' => $ClinicalExam,

    ];

    return view('back/view-headache-pain-report')->with($data);
}




// ShoulderPain form edit method
public function editShoulderPainEligibilityForms(Request $request)
{
    $id = decrypt($request->patient_id);
    // $id = decrypt();
    $ThyroidDiagnosis = ThyroidDiagnosis::query();

    $diagnosis_general = $ThyroidDiagnosis->select('data_value')->where(['title_name' => 'diagnosis_general', 'patient_id' => $id, 'form_type' => 'ShoulderPain'])->get();
    $diagnosis_cid = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'diagnosis_cid', 'patient_id' => $id, 'form_type' => 'ShoulderPain'])->get();


    $symptoms = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'symptoms', 'patient_id' => $id, 'form_type' => 'ShoulderPain'])->get();
    $Imaging = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'Imaging', 'patient_id' => $id, 'form_type' => 'ShoulderPain'])->orderBy('id', 'desc')->first();
    $symptoms_scores = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'symptoms_score', 'patient_id' => $id, 'form_type' => 'ShoulderPain'])->first();

   $Referrals = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'Referral', 'patient_id' => $id, 'form_type' => 'ShoulderPain'])->first();
    $supportives = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'supportive', 'patient_id' => $id, 'form_type' => 'ShoulderPain'])->first();
    $SpecialInvestigations = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'SpecialInvestigation', 'patient_id' => $id, 'form_type' => 'ShoulderPain'])->first();
    $ElegibilitySTATUS = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'ElegibilitySTATUS', 'patient_id' => $id, 'form_type' => 'ShoulderPain'])->first();
    $Interventions = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'Intervention', 'patient_id' => $id, 'form_type' => 'ShoulderPain'])->first();
    $Prescription = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'Prescription', 'patient_id' => $id, 'form_type' => 'ShoulderPain'])->first();
    // dd($Prescription);
    $MDTs = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'MDT', 'patient_id' => $id, 'form_type' => 'ShoulderPain'])->first();
    $Labs = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'Lab', 'patient_id' => $id, 'form_type' => 'ShoulderPain'])->first();
    $AntithyroidAntibodiesTests = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'AntithyroidAntibodiesTests', 'patient_id' => $id, 'form_type' => 'ShoulderPain'])->first();
    $ClinicalIndicator = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'ClinicalIndicator', 'patient_id' => $id, 'form_type' => 'ShoulderPain'])->first();
    $ClinicalExam = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'ClinicalExam', 'patient_id' => $id, 'form_type' => 'ShoulderPain'])->first();

    $data = [
        'patient_id' => Crypt::encrypt($id),
        'diagnosis_generals_db' => $diagnosis_general,
        'diagnosis_cids_db' => $diagnosis_cid,
        'symptoms' => $symptoms,
        'symptoms_scores' => $symptoms_scores,
        'Referrals' => $Referrals,
        'supportives' => $supportives,
        'SpecialInvestigations' => $SpecialInvestigations,
        'ElegibilitySTATUS' => $ElegibilitySTATUS,
        'Interventions' => $Interventions,
        'MDTs' => $MDTs,
        'Labs' => $Labs,
        'AntithyroidAntibodiesTests' => $AntithyroidAntibodiesTests,
        'clinical_indicators' => $ClinicalIndicator,
        'ClinicalExam' => $ClinicalExam,
        'Imaging'=>$Imaging,
        'Prescription'=>$Prescription


    ];
    return view('back/Edit_shoulder_pain', $data);
}

// ShoulderPain form update method
public function updateShoulderPainEligibilityForms(Request $request)
{
    ThyroidDiagnosis::where('form_type', 'ShoulderPain')->delete();

    $this->storeShoulderPainEligibilityForms($request);
    return  redirect()->route('user.viewShoulderPainEligibilityForms', ['id' => $request->patient_id]);
}


// ShoulderPain form store method
public function storeShoulderPainEligibilityForms(Request $request)
{

    $doctor_id = auth()->guard('doctor')->id();

    $id = decrypt($request->patient_id);
    $dataToInsert = [];


    if (isset($request->diagnosis_general) && is_array($request->diagnosis_general) && !empty($request->diagnosis_general)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->diagnosis_general);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'diagnosis_general',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'ShoulderPain'
            ];
        }
    }
    if (isset($request->diagnosis_cid) && is_array($request->diagnosis_cid) && !empty($request->diagnosis_cid)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->diagnosis_cid);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'diagnosis_cid',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'ShoulderPain'
            ];
        }
    }
    $data=$request->symptoms;
    $newArray = [];

    foreach ($data as $item) {
        $newArray[] = [
            'SymptomType' => $item[0] ?? '',
            'SymptomDurationValue' => $item[1] ?? '',
            'SymptomDurationType' => $item[2] ?? '',
            'SymptomDurationNote' => $item[3] ?? ''
        ];
    }


    if (isset($newArray) && is_array($newArray) && !empty($newArray)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $newArray);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);

            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'symptoms',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'ShoulderPain'
            ];
        }
    }
    if (isset($request->symptoms_score) && is_array($request->symptoms_score) && !empty($request->symptoms_score)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->symptoms_score);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'symptoms_score',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'ShoulderPain'
            ];
        }
    }

    if (isset($request->Referral) && is_array($request->Referral) && !empty($request->Referral)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->Referral);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'Referral',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'ShoulderPain'
            ];
        }
    }
    if (isset($request->Supportive) && is_array($request->Supportive) && !empty($request->Supportive)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->Supportive);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'Supportive',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'ShoulderPain'
            ];
        }
    }
    if (isset($request->Prescription) && is_array($request->Prescription) && !empty($request->Prescription)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->Prescription);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'Prescription',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'ShoulderPain'
            ];
        }
    }
    if (isset($request->SpecialInvestigation) && is_array($request->SpecialInvestigation) && !empty($request->SpecialInvestigation)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->SpecialInvestigation);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'SpecialInvestigation',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'ShoulderPain'
            ];
        }
    }
    if (isset($request->ElegibilitySTATUS) && is_array($request->ElegibilitySTATUS) && !empty($request->ElegibilitySTATUS)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->ElegibilitySTATUS);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'ElegibilitySTATUS',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'ShoulderPain'
            ];
        }
    }

    if (isset($request->Intervention) && is_array($request->Intervention) && !empty($request->Intervention)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->Intervention);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'Intervention',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'ShoulderPain'
            ];
        }
    }
    if (isset($request->MDT) && is_array($request->MDT) && !empty($request->MDT)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->MDT);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'MDT',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'ShoulderPain'
            ];
        }
    }
    if (isset($request->Lab) && is_array($request->Lab) && !empty($request->Lab)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->Lab);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'Lab',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'ShoulderPain'
            ];
        }
    }

    if (isset($request->Imaging) && is_array($request->Imaging) && !empty($request->Imaging)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->Imaging);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'Imaging',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'ShoulderPain'
            ];
        }
    }


    if (isset($request->clinical_indicator) && is_array($request->clinical_indicator) && !empty($request->clinical_indicator)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->clinical_indicator);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'ClinicalIndicator',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'ShoulderPain'
            ];
        }
    }
    if (isset($request->clinical_exam) && is_array($request->clinical_exam) && !empty($request->clinical_exam)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->clinical_exam);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'ClinicalExam',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'ShoulderPain'
            ];
        }
    }




    if(!empty($dataToInsert)){
        ThyroidDiagnosis::insert($dataToInsert);

    }


    return  redirect()->route('user.viewShoulderPainEligibilityForms', ['id' => $request->patient_id]);
}

// ShoulderPain form view method Edit_varicose_ablation
public function viewShoulderPainEligibilityForms(Request $request, $id)
{
    $id = Crypt::decrypt($id);
    $patient = User::findOrFail($id);

   $Patient_order_imaginary_exams= Patient_order_imaginary_exam::with('test','doctor')->where(['patient_id'=>$id,'form_type'=>'ShoulderPain'])->get();
   $Patient_order_labs= Patient_order_lab::with('lab','doctor')->where(['patient_id'=>$id,'form_type'=>'ShoulderPain'])->get();
    $Patient_insurer = Patient_insurer::where(['patient_id' => $id, 'status' => 'active'])->select('insurer_name', 'insurance_number')->orderBy('id', 'desc')->first();
    $Patient_past_medical_history = Patient_past_medical_history::select('id', 'diseases_name', 'describe', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
    $Patient_past_surgical_history = Patient_past_surgical_history::select('id', 'diseases_name', 'describe', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
    $Patient_current_med = Patient_current_med::select('id', 'drug_name', 'frequency', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
    $Patient_future_plan = Patient_future_plan::select('id', 'date', 'plan_text')->where('patient_id', $id)->orderBy('id', 'desc')->get();
    $Procedure = Procedure::select('id', 'procedure_name', 'summary', 'created_at', 'entry')->where('patient_id', $id)->orderBy('id', 'desc')->get();
    // $Prescription = Prescription::select('id', 'prescription', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
    $ThyroidDiagnosis = ThyroidDiagnosis::query();
    $diagnosis_cid = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'diagnosis_cid', 'patient_id' => $id, 'form_type' => 'ShoulderPain'])->orderBy('id', 'desc')->get();
    $Imaging = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'Imaging', 'patient_id' => $id, 'form_type' => 'ShoulderPain'])->orderBy('id', 'desc')->get();

    $diagnosis_general = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'diagnosis_general', 'patient_id' => $id, 'form_type' => 'ShoulderPain'])->orderBy('id', 'desc')->get();
    $ClinicalIndicator = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'ClinicalIndicator', 'patient_id' => $id, 'form_type' => 'ShoulderPain'])->orderBy('id', 'desc')->get();
    $ClinicalExam = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'ClinicalExam', 'patient_id' => $id, 'form_type' => 'ShoulderPain'])->orderBy('id', 'desc')->get();

    $symptoms = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'symptoms', 'patient_id' => $id, 'form_type' => 'ShoulderPain'])->orderBy('id', 'desc')->get();
    // dd($symptoms);
    $symptoms_scores = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'symptoms_score', 'patient_id' => $id, 'form_type' => 'ShoulderPain'])->orderBy('id', 'desc')->get();

    $Referrals = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'Referral', 'patient_id' => $id])->orderBy('id', 'desc')->get();
    $supportives = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'supportive', 'patient_id' => $id])->orderBy('id', 'desc')->get();
    $Prescription = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'Prescription', 'patient_id' => $id])->orderBy('id', 'desc')->get();
    $SpecialInvestigations = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'SpecialInvestigation', 'patient_id' => $id, 'form_type' => 'ShoulderPain'])->orderBy('id', 'desc')->get();
    $ElegibilitySTATUS = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'ElegibilitySTATUS', 'patient_id' => $id, 'form_type' => 'ShoulderPain'])->orderBy('id', 'desc')->get();
    
    $Interventions = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'Intervention', 'patient_id' => $id])->orderBy('id', 'desc')->get();
    $MDTs = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'MDT', 'patient_id' => $id, 'form_type' => 'ShoulderPain'])->orderBy('id', 'desc')->get();
    $Labs = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at','doctor_id')->where(['title_name' => 'Lab', 'patient_id' => $id, 'form_type' => 'ShoulderPain'])->orderBy('id', 'desc')->get();

    $data = [
        'patient' => $patient,
        'id' => Crypt::encrypt($id),
        'patient_past_history' => $Patient_past_medical_history,
        'patient_past_surgical' => $Patient_past_surgical_history,
        'patient_current_med' => $Patient_current_med,
        'patient_future_plan' => $Patient_future_plan,
        'procedures' => $Procedure,
        'prescriptions' => $Prescription,
        'insurer' => $Patient_insurer,
        'diagnosis_generals' => $diagnosis_general,
        'diagnosis_cids' => $diagnosis_cid,
        'symptoms_db' => $symptoms,
        'symptoms_scores_db' => $symptoms_scores,
        'Referrals' => $Referrals,
        'supportives' => $supportives,
        'SpecialInvestigations_db' => $SpecialInvestigations,
        'ElegibilitySTATUSDB' => $ElegibilitySTATUS,
        'Interventions' => $Interventions,
        'MDTs_db' => $MDTs,
        'Labs' => $Labs,
        'Patient_order_imaginary_exams'=>$Patient_order_imaginary_exams,
        'Patient_order_labs'=>$Patient_order_labs,
        'Imaging'=>$Imaging,
        'ClinicalIndicator_db' => $ClinicalIndicator,
        'ClinicalExam_db' => $ClinicalExam,

    ];

    return view('back/view-shoulder-pain-report')->with($data);
}



// MSKPain form edit method
public function editMSKPainEligibilityForms(Request $request)
{
    $id = decrypt($request->patient_id);
    // $id = decrypt();
    $ThyroidDiagnosis = ThyroidDiagnosis::query();

    $diagnosis_general = $ThyroidDiagnosis->select('data_value')->where(['title_name' => 'diagnosis_general', 'patient_id' => $id, 'form_type' => 'MSKPain'])->get();
    $diagnosis_cid = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'diagnosis_cid', 'patient_id' => $id, 'form_type' => 'MSKPain'])->get();


    $symptoms = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'symptoms', 'patient_id' => $id, 'form_type' => 'MSKPain'])->get();
    $Imaging = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'Imaging', 'patient_id' => $id, 'form_type' => 'MSKPain'])->orderBy('id', 'desc')->first();
    $symptoms_scores = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'symptoms_score', 'patient_id' => $id, 'form_type' => 'MSKPain'])->first();

   $Referrals = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'Referral', 'patient_id' => $id, 'form_type' => 'MSKPain'])->first();
    $supportives = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'supportive', 'patient_id' => $id, 'form_type' => 'MSKPain'])->first();
    $SpecialInvestigations = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'SpecialInvestigation', 'patient_id' => $id, 'form_type' => 'MSKPain'])->first();
    $ElegibilitySTATUS = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'ElegibilitySTATUS', 'patient_id' => $id, 'form_type' => 'MSKPain'])->first();
    $Interventions = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'Intervention', 'patient_id' => $id, 'form_type' => 'MSKPain'])->first();
    $Prescription = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'Prescription', 'patient_id' => $id, 'form_type' => 'MSKPain'])->first();
    // dd($Prescription);
    $MDTs = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'MDT', 'patient_id' => $id, 'form_type' => 'MSKPain'])->first();
    $Labs = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'Lab', 'patient_id' => $id, 'form_type' => 'MSKPain'])->first();
    $AntithyroidAntibodiesTests = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'AntithyroidAntibodiesTests', 'patient_id' => $id, 'form_type' => 'MSKPain'])->first();
    $ClinicalIndicator = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'ClinicalIndicator', 'patient_id' => $id, 'form_type' => 'MSKPain'])->first();
    $ClinicalExam = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'ClinicalExam', 'patient_id' => $id, 'form_type' => 'MSKPain'])->first();

    $data = [
        'patient_id' => Crypt::encrypt($id),
        'diagnosis_generals_db' => $diagnosis_general,
        'diagnosis_cids_db' => $diagnosis_cid,
        'symptoms' => $symptoms,
        'symptoms_scores' => $symptoms_scores,
        'Referrals' => $Referrals,
        'supportives' => $supportives,
        'SpecialInvestigations' => $SpecialInvestigations,
        'ElegibilitySTATUS' => $ElegibilitySTATUS,
        'Interventions' => $Interventions,
        'MDTs' => $MDTs,
        'Labs' => $Labs,
        'AntithyroidAntibodiesTests' => $AntithyroidAntibodiesTests,
        'clinical_indicators' => $ClinicalIndicator,
        'ClinicalExam' => $ClinicalExam,
        'Imaging'=>$Imaging,
        'Prescription'=>$Prescription


    ];
    return view('back/Edit_msk_pain', $data);
}

// MSKPain form update method
public function updateMSKPainEligibilityForms(Request $request)
{
    ThyroidDiagnosis::where('form_type', 'MSKPain')->delete();

    $this->storeMSKPainEligibilityForms($request);
    return  redirect()->route('user.viewMSKPainEligibilityForms', ['id' => $request->patient_id]);
}


// MSKPain form store method
public function storeMSKPainEligibilityForms(Request $request)
{

    $doctor_id = auth()->guard('doctor')->id();

    $id = decrypt($request->patient_id);
    $dataToInsert = [];


    if (isset($request->diagnosis_general) && is_array($request->diagnosis_general) && !empty($request->diagnosis_general)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->diagnosis_general);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'diagnosis_general',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'MSKPain'
            ];
        }
    }
    if (isset($request->diagnosis_cid) && is_array($request->diagnosis_cid) && !empty($request->diagnosis_cid)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->diagnosis_cid);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'diagnosis_cid',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'MSKPain'
            ];
        }
    }
    $data=$request->symptoms;
    $newArray = [];

    foreach ($data as $item) {
        $newArray[] = [
            'SymptomType' => $item[0] ?? '',
            'SymptomDurationValue' => $item[1] ?? '',
            'SymptomDurationType' => $item[2] ?? '',
            'SymptomDurationNote' => $item[3] ?? ''
        ];
    }


    if (isset($newArray) && is_array($newArray) && !empty($newArray)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $newArray);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);

            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'symptoms',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'MSKPain'
            ];
        }
    }
    if (isset($request->symptoms_score) && is_array($request->symptoms_score) && !empty($request->symptoms_score)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->symptoms_score);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'symptoms_score',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'MSKPain'
            ];
        }
    }

    if (isset($request->Referral) && is_array($request->Referral) && !empty($request->Referral)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->Referral);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'Referral',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'MSKPain'
            ];
        }
    }
    if (isset($request->Supportive) && is_array($request->Supportive) && !empty($request->Supportive)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->Supportive);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'Supportive',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'MSKPain'
            ];
        }
    }
    if (isset($request->Prescription) && is_array($request->Prescription) && !empty($request->Prescription)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->Prescription);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'Prescription',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'MSKPain'
            ];
        }
    }
    if (isset($request->SpecialInvestigation) && is_array($request->SpecialInvestigation) && !empty($request->SpecialInvestigation)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->SpecialInvestigation);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'SpecialInvestigation',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'MSKPain'
            ];
        }
    }
    if (isset($request->ElegibilitySTATUS) && is_array($request->ElegibilitySTATUS) && !empty($request->ElegibilitySTATUS)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->ElegibilitySTATUS);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'ElegibilitySTATUS',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'MSKPain'
            ];
        }
    }

    if (isset($request->Intervention) && is_array($request->Intervention) && !empty($request->Intervention)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->Intervention);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'Intervention',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'MSKPain'
            ];
        }
    }
    if (isset($request->MDT) && is_array($request->MDT) && !empty($request->MDT)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->MDT);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'MDT',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'MSKPain'
            ];
        }
    }
    if (isset($request->Lab) && is_array($request->Lab) && !empty($request->Lab)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->Lab);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'Lab',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'MSKPain'
            ];
        }
    }

    if (isset($request->Imaging) && is_array($request->Imaging) && !empty($request->Imaging)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->Imaging);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'Imaging',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'MSKPain'
            ];
        }
    }


    if (isset($request->clinical_indicator) && is_array($request->clinical_indicator) && !empty($request->clinical_indicator)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->clinical_indicator);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'ClinicalIndicator',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'MSKPain'
            ];
        }
    }
    if (isset($request->clinical_exam) && is_array($request->clinical_exam) && !empty($request->clinical_exam)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->clinical_exam);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'ClinicalExam',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'MSKPain'
            ];
        }
    }




    if(!empty($dataToInsert)){
        ThyroidDiagnosis::insert($dataToInsert);

    }


    return  redirect()->route('user.viewMSKPainEligibilityForms', ['id' => $request->patient_id]);
}

// MSKPain form view method Edit_varicose_ablation
public function viewMSKPainEligibilityForms(Request $request, $id)
{
    $id = Crypt::decrypt($id);
    $patient = User::findOrFail($id);

   $Patient_order_imaginary_exams= Patient_order_imaginary_exam::with('test','doctor')->where(['patient_id'=>$id,'form_type'=>'MSKPain'])->get();
   $Patient_order_labs= Patient_order_lab::with('lab','doctor')->where(['patient_id'=>$id,'form_type'=>'MSKPain'])->get();
    $Patient_insurer = Patient_insurer::where(['patient_id' => $id, 'status' => 'active'])->select('insurer_name', 'insurance_number')->orderBy('id', 'desc')->first();
    $Patient_past_medical_history = Patient_past_medical_history::select('id', 'diseases_name', 'describe', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
    $Patient_past_surgical_history = Patient_past_surgical_history::select('id', 'diseases_name', 'describe', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
    $Patient_current_med = Patient_current_med::select('id', 'drug_name', 'frequency', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
    $Patient_future_plan = Patient_future_plan::select('id', 'date', 'plan_text')->where('patient_id', $id)->orderBy('id', 'desc')->get();
    $Procedure = Procedure::select('id', 'procedure_name', 'summary', 'created_at', 'entry')->where('patient_id', $id)->orderBy('id', 'desc')->get();
    // $Prescription = Prescription::select('id', 'prescription', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
    $ThyroidDiagnosis = ThyroidDiagnosis::query();
    $diagnosis_cid = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'diagnosis_cid', 'patient_id' => $id, 'form_type' => 'MSKPain'])->orderBy('id', 'desc')->get();
    $Imaging = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'Imaging', 'patient_id' => $id, 'form_type' => 'MSKPain'])->orderBy('id', 'desc')->get();

    $diagnosis_general = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'diagnosis_general', 'patient_id' => $id, 'form_type' => 'MSKPain'])->orderBy('id', 'desc')->get();
    $ClinicalIndicator = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'ClinicalIndicator', 'patient_id' => $id, 'form_type' => 'MSKPain'])->orderBy('id', 'desc')->get();
    $ClinicalExam = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'ClinicalExam', 'patient_id' => $id, 'form_type' => 'MSKPain'])->orderBy('id', 'desc')->get();

    $symptoms = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'symptoms', 'patient_id' => $id, 'form_type' => 'MSKPain'])->orderBy('id', 'desc')->get();
    // dd($symptoms);
    $symptoms_scores = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'symptoms_score', 'patient_id' => $id, 'form_type' => 'MSKPain'])->orderBy('id', 'desc')->get();

    $Referrals = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'Referral', 'patient_id' => $id])->orderBy('id', 'desc')->get();
    $supportives = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'supportive', 'patient_id' => $id])->orderBy('id', 'desc')->get();
    $Prescription = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'Prescription', 'patient_id' => $id])->orderBy('id', 'desc')->get();
    $SpecialInvestigations = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'SpecialInvestigation', 'patient_id' => $id, 'form_type' => 'MSKPain'])->orderBy('id', 'desc')->get();
    $ElegibilitySTATUS = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'ElegibilitySTATUS', 'patient_id' => $id, 'form_type' => 'MSKPain'])->orderBy('id', 'desc')->get();
    
    $Interventions = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'Intervention', 'patient_id' => $id])->orderBy('id', 'desc')->get();
    $MDTs = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'MDT', 'patient_id' => $id, 'form_type' => 'MSKPain'])->orderBy('id', 'desc')->get();
    $Labs = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at','doctor_id')->where(['title_name' => 'Lab', 'patient_id' => $id, 'form_type' => 'MSKPain'])->orderBy('id', 'desc')->get();

    $data = [
        'patient' => $patient,
        'id' => Crypt::encrypt($id),
        'patient_past_history' => $Patient_past_medical_history,
        'patient_past_surgical' => $Patient_past_surgical_history,
        'patient_current_med' => $Patient_current_med,
        'patient_future_plan' => $Patient_future_plan,
        'procedures' => $Procedure,
        'prescriptions' => $Prescription,
        'insurer' => $Patient_insurer,
        'diagnosis_generals' => $diagnosis_general,
        'diagnosis_cids' => $diagnosis_cid,
        'symptoms_db' => $symptoms,
        'symptoms_scores_db' => $symptoms_scores,
        'Referrals' => $Referrals,
        'supportives' => $supportives,
        'SpecialInvestigations_db' => $SpecialInvestigations,
        'ElegibilitySTATUSDB' => $ElegibilitySTATUS,
        'Interventions' => $Interventions,
        'MDTs_db' => $MDTs,
        'Labs' => $Labs,
        'Patient_order_imaginary_exams'=>$Patient_order_imaginary_exams,
        'Patient_order_labs'=>$Patient_order_labs,
        'Imaging'=>$Imaging,
        'ClinicalIndicator_db' => $ClinicalIndicator,
        'ClinicalExam_db' => $ClinicalExam,

    ];

    return view('back/view-msk-pain-report')->with($data);
}



// SpinePain form edit method
public function editSpinePainEligibilityForms(Request $request)
{
    $id = decrypt($request->patient_id);
    // $id = decrypt();
    $ThyroidDiagnosis = ThyroidDiagnosis::query();

    $diagnosis_general = $ThyroidDiagnosis->select('data_value')->where(['title_name' => 'diagnosis_general', 'patient_id' => $id, 'form_type' => 'SpinePain'])->get();
    $diagnosis_cid = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'diagnosis_cid', 'patient_id' => $id, 'form_type' => 'SpinePain'])->get();


    $symptoms = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'symptoms', 'patient_id' => $id, 'form_type' => 'SpinePain'])->get();
    $Imaging = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'Imaging', 'patient_id' => $id, 'form_type' => 'SpinePain'])->orderBy('id', 'desc')->first();
    $symptoms_scores = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'symptoms_score', 'patient_id' => $id, 'form_type' => 'SpinePain'])->first();

   $Referrals = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'Referral', 'patient_id' => $id, 'form_type' => 'SpinePain'])->first();
    $supportives = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'supportive', 'patient_id' => $id, 'form_type' => 'SpinePain'])->first();
    $SpecialInvestigations = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'SpecialInvestigation', 'patient_id' => $id, 'form_type' => 'SpinePain'])->first();
    $ElegibilitySTATUS = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'ElegibilitySTATUS', 'patient_id' => $id, 'form_type' => 'SpinePain'])->first();
    $Interventions = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'Intervention', 'patient_id' => $id, 'form_type' => 'SpinePain'])->first();
    $Prescription = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'Prescription', 'patient_id' => $id, 'form_type' => 'SpinePain'])->first();
    // dd($Prescription);
    $MDTs = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'MDT', 'patient_id' => $id, 'form_type' => 'SpinePain'])->first();
    $Labs = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'Lab', 'patient_id' => $id, 'form_type' => 'SpinePain'])->first();
    $AntithyroidAntibodiesTests = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'AntithyroidAntibodiesTests', 'patient_id' => $id, 'form_type' => 'SpinePain'])->first();
    $ClinicalIndicator = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'ClinicalIndicator', 'patient_id' => $id, 'form_type' => 'SpinePain'])->first();
    $ClinicalExam = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'ClinicalExam', 'patient_id' => $id, 'form_type' => 'SpinePain'])->first();

    $data = [
        'patient_id' => Crypt::encrypt($id),
        'diagnosis_generals_db' => $diagnosis_general,
        'diagnosis_cids_db' => $diagnosis_cid,
        'symptoms' => $symptoms,
        'symptoms_scores' => $symptoms_scores,
        'Referrals' => $Referrals,
        'supportives' => $supportives,
        'SpecialInvestigations' => $SpecialInvestigations,
        'ElegibilitySTATUS' => $ElegibilitySTATUS,
        'Interventions' => $Interventions,
        'MDTs' => $MDTs,
        'Labs' => $Labs,
        'AntithyroidAntibodiesTests' => $AntithyroidAntibodiesTests,
        'clinical_indicators' => $ClinicalIndicator,
        'ClinicalExam' => $ClinicalExam,
        'Imaging'=>$Imaging,
        'Prescription'=>$Prescription


    ];
    return view('back/Edit_spine_pain', $data);
}

// SpinePain form update method
public function updateSpinePainEligibilityForms(Request $request)
{
    ThyroidDiagnosis::where('form_type', 'SpinePain')->delete();

    $this->storeSpinePainEligibilityForms($request);
    return  redirect()->route('user.viewSpinePainEligibilityForms', ['id' => $request->patient_id]);
}


// SpinePain form store method
public function storeSpinePainEligibilityForms(Request $request)
{

    $doctor_id = auth()->guard('doctor')->id();

    $id = decrypt($request->patient_id);
    $dataToInsert = [];


    if (isset($request->diagnosis_general) && is_array($request->diagnosis_general) && !empty($request->diagnosis_general)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->diagnosis_general);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'diagnosis_general',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'SpinePain'
            ];
        }
    }
    if (isset($request->diagnosis_cid) && is_array($request->diagnosis_cid) && !empty($request->diagnosis_cid)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->diagnosis_cid);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'diagnosis_cid',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'SpinePain'
            ];
        }
    }
    $data=$request->symptoms;
    $newArray = [];

    foreach ($data as $item) {
        $newArray[] = [
            'SymptomType' => $item[0] ?? '',
            'SymptomDurationValue' => $item[1] ?? '',
            'SymptomDurationType' => $item[2] ?? '',
            'SymptomDurationNote' => $item[3] ?? ''
        ];
    }


    if (isset($newArray) && is_array($newArray) && !empty($newArray)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $newArray);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);

            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'symptoms',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'SpinePain'
            ];
        }
    }
    if (isset($request->symptoms_score) && is_array($request->symptoms_score) && !empty($request->symptoms_score)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->symptoms_score);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'symptoms_score',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'SpinePain'
            ];
        }
    }

    if (isset($request->Referral) && is_array($request->Referral) && !empty($request->Referral)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->Referral);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'Referral',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'SpinePain'
            ];
        }
    }
    if (isset($request->Supportive) && is_array($request->Supportive) && !empty($request->Supportive)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->Supportive);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'Supportive',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'SpinePain'
            ];
        }
    }
    if (isset($request->Prescription) && is_array($request->Prescription) && !empty($request->Prescription)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->Prescription);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'Prescription',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'SpinePain'
            ];
        }
    }
    if (isset($request->SpecialInvestigation) && is_array($request->SpecialInvestigation) && !empty($request->SpecialInvestigation)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->SpecialInvestigation);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'SpecialInvestigation',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'SpinePain'
            ];
        }
    }
    if (isset($request->ElegibilitySTATUS) && is_array($request->ElegibilitySTATUS) && !empty($request->ElegibilitySTATUS)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->ElegibilitySTATUS);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'ElegibilitySTATUS',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'SpinePain'
            ];
        }
    }

    if (isset($request->Intervention) && is_array($request->Intervention) && !empty($request->Intervention)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->Intervention);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'Intervention',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'SpinePain'
            ];
        }
    }
    if (isset($request->MDT) && is_array($request->MDT) && !empty($request->MDT)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->MDT);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'MDT',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'SpinePain'
            ];
        }
    }
    if (isset($request->Lab) && is_array($request->Lab) && !empty($request->Lab)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->Lab);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'Lab',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'SpinePain'
            ];
        }
    }

    if (isset($request->Imaging) && is_array($request->Imaging) && !empty($request->Imaging)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->Imaging);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'Imaging',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'SpinePain'
            ];
        }
    }


    if (isset($request->clinical_indicator) && is_array($request->clinical_indicator) && !empty($request->clinical_indicator)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->clinical_indicator);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'ClinicalIndicator',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'SpinePain'
            ];
        }
    }
    if (isset($request->clinical_exam) && is_array($request->clinical_exam) && !empty($request->clinical_exam)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->clinical_exam);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'ClinicalExam',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'SpinePain'
            ];
        }
    }




    if(!empty($dataToInsert)){
        ThyroidDiagnosis::insert($dataToInsert);

    }


    return  redirect()->route('user.viewSpinePainEligibilityForms', ['id' => $request->patient_id]);
}

// SpinePain form view method Edit_varicose_ablation
public function viewSpinePainEligibilityForms(Request $request, $id)
{
    $id = Crypt::decrypt($id);
    $patient = User::findOrFail($id);

   $Patient_order_imaginary_exams= Patient_order_imaginary_exam::with('test','doctor')->where(['patient_id'=>$id,'form_type'=>'SpinePain'])->get();
   $Patient_order_labs= Patient_order_lab::with('lab','doctor')->where(['patient_id'=>$id,'form_type'=>'SpinePain'])->get();
    $Patient_insurer = Patient_insurer::where(['patient_id' => $id, 'status' => 'active'])->select('insurer_name', 'insurance_number')->orderBy('id', 'desc')->first();
    $Patient_past_medical_history = Patient_past_medical_history::select('id', 'diseases_name', 'describe', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
    $Patient_past_surgical_history = Patient_past_surgical_history::select('id', 'diseases_name', 'describe', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
    $Patient_current_med = Patient_current_med::select('id', 'drug_name', 'frequency', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
    $Patient_future_plan = Patient_future_plan::select('id', 'date', 'plan_text')->where('patient_id', $id)->orderBy('id', 'desc')->get();
    $Procedure = Procedure::select('id', 'procedure_name', 'summary', 'created_at', 'entry')->where('patient_id', $id)->orderBy('id', 'desc')->get();
    // $Prescription = Prescription::select('id', 'prescription', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
    $ThyroidDiagnosis = ThyroidDiagnosis::query();
    $diagnosis_cid = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'diagnosis_cid', 'patient_id' => $id, 'form_type' => 'SpinePain'])->orderBy('id', 'desc')->get();
    $Imaging = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'Imaging', 'patient_id' => $id, 'form_type' => 'SpinePain'])->orderBy('id', 'desc')->get();

    $diagnosis_general = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'diagnosis_general', 'patient_id' => $id, 'form_type' => 'SpinePain'])->orderBy('id', 'desc')->get();
    $ClinicalIndicator = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'ClinicalIndicator', 'patient_id' => $id, 'form_type' => 'SpinePain'])->orderBy('id', 'desc')->get();
    $ClinicalExam = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'ClinicalExam', 'patient_id' => $id, 'form_type' => 'SpinePain'])->orderBy('id', 'desc')->get();

    $symptoms = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'symptoms', 'patient_id' => $id, 'form_type' => 'SpinePain'])->orderBy('id', 'desc')->get();
    // dd($symptoms);
    $symptoms_scores = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'symptoms_score', 'patient_id' => $id, 'form_type' => 'SpinePain'])->orderBy('id', 'desc')->get();

    $Referrals = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'Referral', 'patient_id' => $id])->orderBy('id', 'desc')->get();
    $supportives = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'supportive', 'patient_id' => $id])->orderBy('id', 'desc')->get();
    $Prescription = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'Prescription', 'patient_id' => $id])->orderBy('id', 'desc')->get();
    $SpecialInvestigations = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'SpecialInvestigation', 'patient_id' => $id, 'form_type' => 'SpinePain'])->orderBy('id', 'desc')->get();
    $ElegibilitySTATUS = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'ElegibilitySTATUS', 'patient_id' => $id, 'form_type' => 'SpinePain'])->orderBy('id', 'desc')->get();
    
    $Interventions = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'Intervention', 'patient_id' => $id])->orderBy('id', 'desc')->get();
    $MDTs = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'MDT', 'patient_id' => $id, 'form_type' => 'SpinePain'])->orderBy('id', 'desc')->get();
    $Labs = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at','doctor_id')->where(['title_name' => 'Lab', 'patient_id' => $id, 'form_type' => 'SpinePain'])->orderBy('id', 'desc')->get();

    $data = [
        'patient' => $patient,
        'id' => Crypt::encrypt($id),
        'patient_past_history' => $Patient_past_medical_history,
        'patient_past_surgical' => $Patient_past_surgical_history,
        'patient_current_med' => $Patient_current_med,
        'patient_future_plan' => $Patient_future_plan,
        'procedures' => $Procedure,
        'prescriptions' => $Prescription,
        'insurer' => $Patient_insurer,
        'diagnosis_generals' => $diagnosis_general,
        'diagnosis_cids' => $diagnosis_cid,
        'symptoms_db' => $symptoms,
        'symptoms_scores_db' => $symptoms_scores,
        'Referrals' => $Referrals,
        'supportives' => $supportives,
        'SpecialInvestigations_db' => $SpecialInvestigations,
        'ElegibilitySTATUSDB' => $ElegibilitySTATUS,
        'Interventions' => $Interventions,
        'MDTs_db' => $MDTs,
        'Labs' => $Labs,
        'Patient_order_imaginary_exams'=>$Patient_order_imaginary_exams,
        'Patient_order_labs'=>$Patient_order_labs,
        'Imaging'=>$Imaging,
        'ClinicalIndicator_db' => $ClinicalIndicator,
        'ClinicalExam_db' => $ClinicalExam,

    ];

    return view('back/view-spine-pain-report')->with($data);
}


// KneePain form store method
public function storeKneePainEligibilityForms(Request $request)
{

    $doctor_id = auth()->guard('doctor')->id();

    $id = decrypt($request->patient_id);
    $dataToInsert = [];


    if (isset($request->diagnosis_general) && is_array($request->diagnosis_general) && !empty($request->diagnosis_general)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->diagnosis_general);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'diagnosis_general',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'KneePain'
            ];
        }
    }
    if (isset($request->diagnosis_cid) && is_array($request->diagnosis_cid) && !empty($request->diagnosis_cid)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->diagnosis_cid);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'diagnosis_cid',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'KneePain'
            ];
        }
    }
    $data=$request->symptoms;
    $newArray = [];

    foreach ($data as $item) {
        $newArray[] = [
            'SymptomType' => $item[0] ?? '',
            'SymptomDurationValue' => $item[1] ?? '',
            'SymptomDurationType' => $item[2] ?? '',
            'SymptomDurationNote' => $item[3] ?? ''
        ];
    }


    if (isset($newArray) && is_array($newArray) && !empty($newArray)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $newArray);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);

            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'symptoms',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'KneePain'
            ];
        }
    }
    if (isset($request->symptoms_score) && is_array($request->symptoms_score) && !empty($request->symptoms_score)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->symptoms_score);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'symptoms_score',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'KneePain'
            ];
        }
    }

    if (isset($request->Referral) && is_array($request->Referral) && !empty($request->Referral)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->Referral);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'Referral',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'KneePain'
            ];
        }
    }
    if (isset($request->Supportive) && is_array($request->Supportive) && !empty($request->Supportive)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->Supportive);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'Supportive',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'KneePain'
            ];
        }
    }
    if (isset($request->Prescription) && is_array($request->Prescription) && !empty($request->Prescription)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->Prescription);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'Prescription',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'KneePain'
            ];
        }
    }
    if (isset($request->SpecialInvestigation) && is_array($request->SpecialInvestigation) && !empty($request->SpecialInvestigation)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->SpecialInvestigation);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'SpecialInvestigation',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'KneePain'
            ];
        }
    }
    if (isset($request->ElegibilitySTATUS) && is_array($request->ElegibilitySTATUS) && !empty($request->ElegibilitySTATUS)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->ElegibilitySTATUS);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'ElegibilitySTATUS',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'KneePain'
            ];
        }
    }

    if (isset($request->Intervention) && is_array($request->Intervention) && !empty($request->Intervention)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->Intervention);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'Intervention',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'KneePain'
            ];
        }
    }
    if (isset($request->MDT) && is_array($request->MDT) && !empty($request->MDT)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->MDT);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'MDT',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'KneePain'
            ];
        }
    }
    if (isset($request->Lab) && is_array($request->Lab) && !empty($request->Lab)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->Lab);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'Lab',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'KneePain'
            ];
        }
    }

    if (isset($request->Imaging) && is_array($request->Imaging) && !empty($request->Imaging)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->Imaging);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'Imaging',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'KneePain'
            ];
        }
    }


    if (isset($request->clinical_indicator) && is_array($request->clinical_indicator) && !empty($request->clinical_indicator)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->clinical_indicator);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'ClinicalIndicator',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'KneePain'
            ];
        }
    }
    if (isset($request->clinical_exam) && is_array($request->clinical_exam) && !empty($request->clinical_exam)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->clinical_exam);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'ClinicalExam',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'KneePain'
            ];
        }
    }




    if(!empty($dataToInsert)){
        ThyroidDiagnosis::insert($dataToInsert);

    }


    return  redirect()->route('user.viewKneePainEligibilityForms', ['id' => $request->patient_id]);
}

// knee pain form view method Edit_varicose_ablation
public function viewKneePainEligibilityForms(Request $request, $id)
{
    $id = Crypt::decrypt($id);
    $patient = User::findOrFail($id);

   $Patient_order_imaginary_exams= Patient_order_imaginary_exam::with('test','doctor')->where(['patient_id'=>$id,'form_type'=>'KneePain'])->get();
   $Patient_order_labs= Patient_order_lab::with('lab','doctor')->where(['patient_id'=>$id,'form_type'=>'KneePain'])->get();
    $Patient_insurer = Patient_insurer::where(['patient_id' => $id, 'status' => 'active'])->select('insurer_name', 'insurance_number')->orderBy('id', 'desc')->first();
    $Patient_past_medical_history = Patient_past_medical_history::select('id', 'diseases_name', 'describe', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
    $Patient_past_surgical_history = Patient_past_surgical_history::select('id', 'diseases_name', 'describe', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
    $Patient_current_med = Patient_current_med::select('id', 'drug_name', 'frequency', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
    $Patient_future_plan = Patient_future_plan::select('id', 'date', 'plan_text')->where('patient_id', $id)->orderBy('id', 'desc')->get();
    $Procedure = Procedure::select('id', 'procedure_name', 'summary', 'created_at', 'entry')->where('patient_id', $id)->orderBy('id', 'desc')->get();
    // $Prescription = Prescription::select('id', 'prescription', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
    $ThyroidDiagnosis = ThyroidDiagnosis::query();
    $diagnosis_cid = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'diagnosis_cid', 'patient_id' => $id, 'form_type' => 'KneePain'])->orderBy('id', 'desc')->get();
    $Imaging = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'Imaging', 'patient_id' => $id, 'form_type' => 'KneePain'])->orderBy('id', 'desc')->get();

    $diagnosis_general = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'diagnosis_general', 'patient_id' => $id, 'form_type' => 'KneePain'])->orderBy('id', 'desc')->get();
    $ClinicalIndicator = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'ClinicalIndicator', 'patient_id' => $id, 'form_type' => 'KneePain'])->orderBy('id', 'desc')->get();
    $ClinicalExam = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'ClinicalExam', 'patient_id' => $id, 'form_type' => 'KneePain'])->orderBy('id', 'desc')->get();

    $symptoms = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'symptoms', 'patient_id' => $id, 'form_type' => 'KneePain'])->orderBy('id', 'desc')->get();
    // dd($symptoms);
    $symptoms_scores = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'symptoms_score', 'patient_id' => $id, 'form_type' => 'KneePain'])->orderBy('id', 'desc')->get();

    $Referrals = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'Referral', 'patient_id' => $id])->orderBy('id', 'desc')->get();
    $supportives = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'supportive', 'patient_id' => $id])->orderBy('id', 'desc')->get();
    $Prescription = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'Prescription', 'patient_id' => $id])->orderBy('id', 'desc')->get();
    $SpecialInvestigations = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'SpecialInvestigation', 'patient_id' => $id, 'form_type' => 'KneePain'])->orderBy('id', 'desc')->get();
    $ElegibilitySTATUS = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'ElegibilitySTATUS', 'patient_id' => $id, 'form_type' => 'KneePain'])->orderBy('id', 'desc')->get();
    
    $Interventions = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'Intervention', 'patient_id' => $id])->orderBy('id', 'desc')->get();
    $MDTs = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'MDT', 'patient_id' => $id, 'form_type' => 'KneePain'])->orderBy('id', 'desc')->get();
    $Labs = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at','doctor_id')->where(['title_name' => 'Lab', 'patient_id' => $id, 'form_type' => 'KneePain'])->orderBy('id', 'desc')->get();

    $data = [
        'patient' => $patient,
        'id' => Crypt::encrypt($id),
        'patient_past_history' => $Patient_past_medical_history,
        'patient_past_surgical' => $Patient_past_surgical_history,
        'patient_current_med' => $Patient_current_med,
        'patient_future_plan' => $Patient_future_plan,
        'procedures' => $Procedure,
        'prescriptions' => $Prescription,
        'insurer' => $Patient_insurer,
        'diagnosis_generals' => $diagnosis_general,
        'diagnosis_cids' => $diagnosis_cid,
        'symptoms_db' => $symptoms,
        'symptoms_scores_db' => $symptoms_scores,
        'Referrals' => $Referrals,
        'supportives' => $supportives,
        'SpecialInvestigations_db' => $SpecialInvestigations,
        'ElegibilitySTATUSDB' => $ElegibilitySTATUS,
        'Interventions' => $Interventions,
        'MDTs_db' => $MDTs,
        'Labs' => $Labs,
        'Patient_order_imaginary_exams'=>$Patient_order_imaginary_exams,
        'Patient_order_labs'=>$Patient_order_labs,
        'Imaging'=>$Imaging,
        'ClinicalIndicator_db' => $ClinicalIndicator,
        'ClinicalExam_db' => $ClinicalExam,

    ];

    return view('back/view-knee-pain-report')->with($data);
}
// KneePain form edit method
public function editKneePainEligibilityForms(Request $request)
{
    $id = decrypt($request->patient_id);
    // $id = decrypt();
    $ThyroidDiagnosis = ThyroidDiagnosis::query();

    $diagnosis_general = $ThyroidDiagnosis->select('data_value')->where(['title_name' => 'diagnosis_general', 'patient_id' => $id, 'form_type' => 'KneePain'])->get();
    $diagnosis_cid = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'diagnosis_cid', 'patient_id' => $id, 'form_type' => 'KneePain'])->get();


    $symptoms = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'symptoms', 'patient_id' => $id, 'form_type' => 'KneePain'])->get();
    $Imaging = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'Imaging', 'patient_id' => $id, 'form_type' => 'KneePain'])->orderBy('id', 'desc')->first();
    $symptoms_scores = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'symptoms_score', 'patient_id' => $id, 'form_type' => 'KneePain'])->first();

   $Referrals = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'Referral', 'patient_id' => $id, 'form_type' => 'KneePain'])->first();
    $supportives = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'supportive', 'patient_id' => $id, 'form_type' => 'KneePain'])->first();
    $SpecialInvestigations = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'SpecialInvestigation', 'patient_id' => $id, 'form_type' => 'KneePain'])->first();
    $ElegibilitySTATUS = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'ElegibilitySTATUS', 'patient_id' => $id, 'form_type' => 'KneePain'])->first();
    $Interventions = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'Intervention', 'patient_id' => $id, 'form_type' => 'KneePain'])->first();
    $Prescription = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'Prescription', 'patient_id' => $id, 'form_type' => 'KneePain'])->first();
    // dd($Prescription);
    $MDTs = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'MDT', 'patient_id' => $id, 'form_type' => 'KneePain'])->first();
    $Labs = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'Lab', 'patient_id' => $id, 'form_type' => 'KneePain'])->first();
    $AntithyroidAntibodiesTests = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'AntithyroidAntibodiesTests', 'patient_id' => $id, 'form_type' => 'KneePain'])->first();
    $ClinicalIndicator = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'ClinicalIndicator', 'patient_id' => $id, 'form_type' => 'KneePain'])->first();
    $ClinicalExam = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'ClinicalExam', 'patient_id' => $id, 'form_type' => 'KneePain'])->first();

    $data = [
        'patient_id' => Crypt::encrypt($id),
        'diagnosis_generals_db' => $diagnosis_general,
        'diagnosis_cids_db' => $diagnosis_cid,
        'symptoms' => $symptoms,
        'symptoms_scores' => $symptoms_scores,
        'Referrals' => $Referrals,
        'supportives' => $supportives,
        'SpecialInvestigations' => $SpecialInvestigations,
        'ElegibilitySTATUS' => $ElegibilitySTATUS,
        'Interventions' => $Interventions,
        'MDTs' => $MDTs,
        'Labs' => $Labs,
        'AntithyroidAntibodiesTests' => $AntithyroidAntibodiesTests,
        'clinical_indicators' => $ClinicalIndicator,
        'ClinicalExam' => $ClinicalExam,
        'Imaging'=>$Imaging,
        'Prescription'=>$Prescription


    ];
    return view('back/Edit_knee_pain', $data);
}

// KneePain form update method
public function updateKneePainEligibilityForms(Request $request)
{
    ThyroidDiagnosis::where('form_type', 'KneePain')->delete();

    $this->storeKneePainEligibilityForms($request);
    return  redirect()->route('user.viewKneePainEligibilityForms', ['id' => $request->patient_id]);
}
// HaemorrhoidsEmbo form store method
public function storeHaemorrhoidsEmboEligibilityForms(Request $request)
{

    $doctor_id = auth()->guard('doctor')->id();

    $id = decrypt($request->patient_id);
    $dataToInsert = [];


    if (isset($request->diagnosis_general) && is_array($request->diagnosis_general) && !empty($request->diagnosis_general)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->diagnosis_general);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'diagnosis_general',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'HaemorrhoidsEmbo'
            ];
        }
    }
    if (isset($request->diagnosis_cid) && is_array($request->diagnosis_cid) && !empty($request->diagnosis_cid)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->diagnosis_cid);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'diagnosis_cid',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'HaemorrhoidsEmbo'
            ];
        }
    }
    $data=$request->symptoms;
    $newArray = [];

    foreach ($data as $item) {
        $newArray[] = [
            'SymptomType' => $item[0] ?? '',
            'SymptomDurationValue' => $item[1] ?? '',
            'SymptomDurationType' => $item[2] ?? '',
            'SymptomDurationNote' => $item[3] ?? ''
        ];
    }


    if (isset($newArray) && is_array($newArray) && !empty($newArray)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $newArray);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);

            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'symptoms',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'HaemorrhoidsEmbo'
            ];
        }
    }
    if (isset($request->symptoms_score) && is_array($request->symptoms_score) && !empty($request->symptoms_score)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->symptoms_score);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'symptoms_score',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'HaemorrhoidsEmbo'
            ];
        }
    }

    if (isset($request->Referral) && is_array($request->Referral) && !empty($request->Referral)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->Referral);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'Referral',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'HaemorrhoidsEmbo'
            ];
        }
    }
    if (isset($request->Supportive) && is_array($request->Supportive) && !empty($request->Supportive)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->Supportive);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'Supportive',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'HaemorrhoidsEmbo'
            ];
        }
    }
    if (isset($request->SpecialInvestigation) && is_array($request->SpecialInvestigation) && !empty($request->SpecialInvestigation)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->SpecialInvestigation);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'SpecialInvestigation',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'HaemorrhoidsEmbo'
            ];
        }
    }
    if (isset($request->ElegibilitySTATUS) && is_array($request->ElegibilitySTATUS) && !empty($request->ElegibilitySTATUS)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->ElegibilitySTATUS);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'ElegibilitySTATUS',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'HaemorrhoidsEmbo'
            ];
        }
    }

    if (isset($request->Intervention) && is_array($request->Intervention) && !empty($request->Intervention)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->Intervention);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'Intervention',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'HaemorrhoidsEmbo'
            ];
        }
    }
    if (isset($request->MDT) && is_array($request->MDT) && !empty($request->MDT)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->MDT);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'MDT',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'HaemorrhoidsEmbo'
            ];
        }
    }
    if (isset($request->Lab) && is_array($request->Lab) && !empty($request->Lab)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->Lab);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'Lab',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'HaemorrhoidsEmbo'
            ];
        }
    }

    if (isset($request->Imaging) && is_array($request->Imaging) && !empty($request->Imaging)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->Imaging);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'Imaging',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'HaemorrhoidsEmbo'
            ];
        }
    }


    if (isset($request->clinical_indicator) && is_array($request->clinical_indicator) && !empty($request->clinical_indicator)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->clinical_indicator);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'ClinicalIndicator',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'HaemorrhoidsEmbo'
            ];
        }
    }
    if (isset($request->clinical_exam) && is_array($request->clinical_exam) && !empty($request->clinical_exam)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->clinical_exam);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'ClinicalExam',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'HaemorrhoidsEmbo'
            ];
        }
    }




    if(!empty($dataToInsert)){
        ThyroidDiagnosis::insert($dataToInsert);

    }


    return  redirect()->route('user.viewHaemorrhoidsEmboEligibilityForms', ['id' => $request->patient_id]);
}
// HaemorrhoidsEmbo form view method Edit_varicose_ablation
public function viewHaemorrhoidsEmboEligibilityForms(Request $request, $id)
{
    $id = Crypt::decrypt($id);
    $patient = User::findOrFail($id);

   $Patient_order_imaginary_exams= Patient_order_imaginary_exam::with('test','doctor')->where(['patient_id'=>$id,'form_type'=>'HaemorrhoidsEmbo'])->get();
   $Patient_order_labs= Patient_order_lab::with('lab','doctor')->where(['patient_id'=>$id,'form_type'=>'HaemorrhoidsEmbo'])->get();
    $Patient_insurer = Patient_insurer::where(['patient_id' => $id, 'status' => 'active'])->select('insurer_name', 'insurance_number')->orderBy('id', 'desc')->first();
    $Patient_past_medical_history = Patient_past_medical_history::select('id', 'diseases_name', 'describe', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
    $Patient_past_surgical_history = Patient_past_surgical_history::select('id', 'diseases_name', 'describe', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
    $Patient_current_med = Patient_current_med::select('id', 'drug_name', 'frequency', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
    $Patient_future_plan = Patient_future_plan::select('id', 'date', 'plan_text')->where('patient_id', $id)->orderBy('id', 'desc')->get();
    $Procedure = Procedure::select('id', 'procedure_name', 'summary', 'created_at', 'entry')->where('patient_id', $id)->orderBy('id', 'desc')->get();
    $Prescription = Prescription::select('id', 'prescription', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
    $ThyroidDiagnosis = ThyroidDiagnosis::query();
    $diagnosis_cid = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'diagnosis_cid', 'patient_id' => $id, 'form_type' => 'HaemorrhoidsEmbo'])->orderBy('id', 'desc')->get();
    $Imaging = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'Imaging', 'patient_id' => $id, 'form_type' => 'HaemorrhoidsEmbo'])->orderBy('id', 'desc')->get();

    $diagnosis_general = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'diagnosis_general', 'patient_id' => $id, 'form_type' => 'HaemorrhoidsEmbo'])->orderBy('id', 'desc')->get();
    $ClinicalIndicator = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'ClinicalIndicator', 'patient_id' => $id, 'form_type' => 'HaemorrhoidsEmbo'])->orderBy('id', 'desc')->get();
    $ClinicalExam = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'ClinicalExam', 'patient_id' => $id, 'form_type' => 'HaemorrhoidsEmbo'])->orderBy('id', 'desc')->get();

    $symptoms = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'symptoms', 'patient_id' => $id, 'form_type' => 'HaemorrhoidsEmbo'])->orderBy('id', 'desc')->get();
    // dd($symptoms);
    $symptoms_scores = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'symptoms_score', 'patient_id' => $id, 'form_type' => 'HaemorrhoidsEmbo'])->orderBy('id', 'desc')->get();

    $Referrals = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'Referral', 'patient_id' => $id])->orderBy('id', 'desc')->get();
    $supportives = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'supportive', 'patient_id' => $id])->orderBy('id', 'desc')->get();
    $SpecialInvestigations = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'SpecialInvestigation', 'patient_id' => $id, 'form_type' => 'HaemorrhoidsEmbo'])->orderBy('id', 'desc')->get();
    $ElegibilitySTATUS = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'ElegibilitySTATUS', 'patient_id' => $id, 'form_type' => 'HaemorrhoidsEmbo'])->orderBy('id', 'desc')->get();
    $Interventions = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'Intervention', 'patient_id' => $id])->orderBy('id', 'desc')->get();
    $MDTs = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'MDT', 'patient_id' => $id, 'form_type' => 'HaemorrhoidsEmbo'])->orderBy('id', 'desc')->get();
    $Labs = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at','doctor_id')->where(['title_name' => 'Lab', 'patient_id' => $id, 'form_type' => 'HaemorrhoidsEmbo'])->orderBy('id', 'desc')->get();

    $data = [
        'patient' => $patient,
        'id' => Crypt::encrypt($id),
        'patient_past_history' => $Patient_past_medical_history,
        'patient_past_surgical' => $Patient_past_surgical_history,
        'patient_current_med' => $Patient_current_med,
        'patient_future_plan' => $Patient_future_plan,
        'procedures' => $Procedure,
        'prescriptions' => $Prescription,
        'insurer' => $Patient_insurer,
        'diagnosis_generals' => $diagnosis_general,
        'diagnosis_cids' => $diagnosis_cid,
        'symptoms_db' => $symptoms,
        'symptoms_scores_db' => $symptoms_scores,
        'Referrals' => $Referrals,
        'supportives' => $supportives,
        'SpecialInvestigations_db' => $SpecialInvestigations,
        'ElegibilitySTATUSDB' => $ElegibilitySTATUS,
        'Interventions' => $Interventions,
        'MDTs_db' => $MDTs,
        'Labs' => $Labs,
        'Patient_order_imaginary_exams'=>$Patient_order_imaginary_exams,
        'Patient_order_labs'=>$Patient_order_labs,
        'Imaging'=>$Imaging,
        'ClinicalIndicator_db' => $ClinicalIndicator,
        'ClinicalExam_db' => $ClinicalExam,

    ];

    return view('back/view-haemorrhoids-embo-report')->with($data);
}

// HaemorrhoidsEmbo form edit method
public function editHaemorrhoidsEmboEligibilityForms(Request $request)
{
    $id = decrypt($request->patient_id);
    // $id = decrypt();
    $ThyroidDiagnosis = ThyroidDiagnosis::query();

    $diagnosis_general = $ThyroidDiagnosis->select('data_value')->where(['title_name' => 'diagnosis_general', 'patient_id' => $id, 'form_type' => 'HaemorrhoidsEmbo'])->get();
    $diagnosis_cid = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'diagnosis_cid', 'patient_id' => $id, 'form_type' => 'HaemorrhoidsEmbo'])->get();


    $symptoms = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'symptoms', 'patient_id' => $id, 'form_type' => 'HaemorrhoidsEmbo'])->get();
    $Imaging = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'Imaging', 'patient_id' => $id, 'form_type' => 'HaemorrhoidsEmbo'])->orderBy('id', 'desc')->first();
    $symptoms_scores = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'symptoms_score', 'patient_id' => $id, 'form_type' => 'HaemorrhoidsEmbo'])->first();

   $Referrals = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'Referral', 'patient_id' => $id, 'form_type' => 'HaemorrhoidsEmbo'])->first();
    $supportives = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'supportive', 'patient_id' => $id, 'form_type' => 'HaemorrhoidsEmbo'])->first();
    $SpecialInvestigations = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'SpecialInvestigation', 'patient_id' => $id, 'form_type' => 'HaemorrhoidsEmbo'])->first();
    $ElegibilitySTATUS = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'ElegibilitySTATUS', 'patient_id' => $id, 'form_type' => 'HaemorrhoidsEmbo'])->first();
    $Interventions = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'Intervention', 'patient_id' => $id, 'form_type' => 'HaemorrhoidsEmbo'])->first();
    $MDTs = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'MDT', 'patient_id' => $id, 'form_type' => 'HaemorrhoidsEmbo'])->first();
    $Labs = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'Lab', 'patient_id' => $id, 'form_type' => 'HaemorrhoidsEmbo'])->first();
    $AntithyroidAntibodiesTests = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'AntithyroidAntibodiesTests', 'patient_id' => $id, 'form_type' => 'HaemorrhoidsEmbo'])->first();
    $ClinicalIndicator = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'ClinicalIndicator', 'patient_id' => $id, 'form_type' => 'HaemorrhoidsEmbo'])->first();
    $ClinicalExam = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'ClinicalExam', 'patient_id' => $id, 'form_type' => 'HaemorrhoidsEmbo'])->first();

    $data = [
        'patient_id' => Crypt::encrypt($id),
        'diagnosis_generals_db' => $diagnosis_general,
        'diagnosis_cids_db' => $diagnosis_cid,
        'symptoms' => $symptoms,
        'symptoms_scores' => $symptoms_scores,
        'Referrals' => $Referrals,
        'supportives' => $supportives,
        'SpecialInvestigations' => $SpecialInvestigations,
        'ElegibilitySTATUS' => $ElegibilitySTATUS,
        'Interventions' => $Interventions,
        'MDTs' => $MDTs,
        'Labs' => $Labs,
        'AntithyroidAntibodiesTests' => $AntithyroidAntibodiesTests,
        'clinical_indicators' => $ClinicalIndicator,
        'ClinicalExam' => $ClinicalExam,
        'Imaging'=>$Imaging


    ];
    return view('back/Edit_haemorrhoids_embo', $data);
}

// HaemorrhoidsEmbo form update method
public function updateHaemorrhoidsEmboEligibilityForms(Request $request)
{
    ThyroidDiagnosis::where('form_type', 'HaemorrhoidsEmbo')->delete();

    $this->storeHaemorrhoidsEmboEligibilityForms($request);
    return  redirect()->route('user.viewHaemorrhoidsEmboEligibilityForms', ['id' => $request->patient_id]);
}
// VaricoseAblation form store method
public function storeVaricoseAblationEligibilityForms(Request $request)
{

    $doctor_id = auth()->guard('doctor')->id();

    $id = decrypt($request->patient_id);
    $dataToInsert = [];


    if (isset($request->diagnosis_general) && is_array($request->diagnosis_general) && !empty($request->diagnosis_general)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->diagnosis_general);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'diagnosis_general',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'VaricoseAblation'
            ];
        }
    }
    if (isset($request->diagnosis_cid) && is_array($request->diagnosis_cid) && !empty($request->diagnosis_cid)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->diagnosis_cid);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'diagnosis_cid',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'VaricoseAblation'
            ];
        }
    }
    $data=$request->symptoms;
    $newArray = [];

    foreach ($data as $item) {
        $newArray[] = [
            'SymptomType' => $item[0] ?? '',
            'SymptomDurationValue' => $item[1] ?? '',
            'SymptomDurationType' => $item[2] ?? '',
            'SymptomDurationNote' => $item[3] ?? ''
        ];
    }


    if (isset($newArray) && is_array($newArray) && !empty($newArray)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $newArray);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);

            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'symptoms',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'VaricoseAblation'
            ];
        }
    }
    if (isset($request->symptoms_score) && is_array($request->symptoms_score) && !empty($request->symptoms_score)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->symptoms_score);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'symptoms_score',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'VaricoseAblation'
            ];
        }
    }

    if (isset($request->Referral) && is_array($request->Referral) && !empty($request->Referral)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->Referral);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'Referral',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'VaricoseAblation'
            ];
        }
    }
    if (isset($request->Supportive) && is_array($request->Supportive) && !empty($request->Supportive)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->Supportive);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'Supportive',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'VaricoseAblation'
            ];
        }
    }
    if (isset($request->SpecialInvestigation) && is_array($request->SpecialInvestigation) && !empty($request->SpecialInvestigation)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->SpecialInvestigation);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'SpecialInvestigation',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'VaricoseAblation'
            ];
        }
    }
    if (isset($request->ElegibilitySTATUS) && is_array($request->ElegibilitySTATUS) && !empty($request->ElegibilitySTATUS)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->ElegibilitySTATUS);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'ElegibilitySTATUS',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'VaricoseAblation'
            ];
        }
    }

    if (isset($request->Intervention) && is_array($request->Intervention) && !empty($request->Intervention)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->Intervention);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'Intervention',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'VaricoseAblation'
            ];
        }
    }
    if (isset($request->MDT) && is_array($request->MDT) && !empty($request->MDT)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->MDT);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'MDT',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'VaricoseAblation'
            ];
        }
    }
    if (isset($request->Lab) && is_array($request->Lab) && !empty($request->Lab)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->Lab);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'Lab',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'VaricoseAblation'
            ];
        }
    }

    if (isset($request->Imaging) && is_array($request->Imaging) && !empty($request->Imaging)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->Imaging);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'Imaging',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'VaricoseAblation'
            ];
        }
    }


    if (isset($request->clinical_indicator) && is_array($request->clinical_indicator) && !empty($request->clinical_indicator)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->clinical_indicator);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'ClinicalIndicator',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'VaricoseAblation'
            ];
        }
    }
    if (isset($request->clinical_exam) && is_array($request->clinical_exam) && !empty($request->clinical_exam)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->clinical_exam);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'ClinicalExam',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'VaricoseAblation'
            ];
        }
    }




    if(!empty($dataToInsert)){
        ThyroidDiagnosis::insert($dataToInsert);

    }


    return  redirect()->route('user.viewVaricoseAblationEligibilityForms', ['id' => $request->patient_id]);
}

// VaricoseAblation form edit method
public function editVaricoseAblationEligibilityForms(Request $request)
{
    $id = decrypt($request->patient_id);
    // $id = decrypt();
    $ThyroidDiagnosis = ThyroidDiagnosis::query();

    $diagnosis_general = $ThyroidDiagnosis->select('data_value')->where(['title_name' => 'diagnosis_general', 'patient_id' => $id, 'form_type' => 'VaricoseAblation'])->get();
    $diagnosis_cid = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'diagnosis_cid', 'patient_id' => $id, 'form_type' => 'VaricoseAblation'])->get();


    $symptoms = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'symptoms', 'patient_id' => $id, 'form_type' => 'VaricoseAblation'])->get();
    $Imaging = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'Imaging', 'patient_id' => $id, 'form_type' => 'VaricoseAblation'])->orderBy('id', 'desc')->first();
    $symptoms_scores = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'symptoms_score', 'patient_id' => $id, 'form_type' => 'VaricoseAblation'])->first();

   $Referrals = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'Referral', 'patient_id' => $id, 'form_type' => 'VaricoseAblation'])->first();
    $supportives = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'supportive', 'patient_id' => $id, 'form_type' => 'VaricoseAblation'])->first();
    $SpecialInvestigations = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'SpecialInvestigation', 'patient_id' => $id, 'form_type' => 'VaricoseAblation'])->first();
    $ElegibilitySTATUS = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'ElegibilitySTATUS', 'patient_id' => $id, 'form_type' => 'VaricoseAblation'])->first();
    $Interventions = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'Intervention', 'patient_id' => $id, 'form_type' => 'VaricoseAblation'])->first();
    $MDTs = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'MDT', 'patient_id' => $id, 'form_type' => 'VaricoseAblation'])->first();
    $Labs = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'Lab', 'patient_id' => $id, 'form_type' => 'VaricoseAblation'])->first();
    $AntithyroidAntibodiesTests = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'AntithyroidAntibodiesTests', 'patient_id' => $id, 'form_type' => 'VaricoseAblation'])->first();
    $ClinicalIndicator = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'ClinicalIndicator', 'patient_id' => $id, 'form_type' => 'VaricoseAblation'])->first();
    $ClinicalExam = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'ClinicalExam', 'patient_id' => $id, 'form_type' => 'VaricoseAblation'])->first();

    $data = [
        'patient_id' => Crypt::encrypt($id),
        'diagnosis_generals_db' => $diagnosis_general,
        'diagnosis_cids_db' => $diagnosis_cid,
        'symptoms' => $symptoms,
        'symptoms_scores' => $symptoms_scores,
        'Referrals' => $Referrals,
        'supportives' => $supportives,
        'SpecialInvestigations' => $SpecialInvestigations,
        'ElegibilitySTATUS' => $ElegibilitySTATUS,
        'Interventions' => $Interventions,
        'MDTs' => $MDTs,
        'Labs' => $Labs,
        'AntithyroidAntibodiesTests' => $AntithyroidAntibodiesTests,
        'clinical_indicators' => $ClinicalIndicator,
        'ClinicalExam' => $ClinicalExam,
        'Imaging'=>$Imaging


    ];
    return view('back/Edit_varicose_ablation', $data);
}

// VaricoseAblation form update method
public function updateVaricoseAblationEligibilityForms(Request $request)
{
    ThyroidDiagnosis::where('form_type', 'VaricoseAblation')->delete();

    $this->storeVaricoseAblationEligibilityForms($request);
    return  redirect()->route('user.viewVaricoseAblationEligibilityForms', ['id' => $request->patient_id]);
}


// VaricoseAblation form view method Edit_varicose_ablation
public function viewVaricoseAblationEligibilityForms(Request $request, $id)
{
    $id = Crypt::decrypt($id);
    $patient = User::findOrFail($id);

   $Patient_order_imaginary_exams= Patient_order_imaginary_exam::with('test','doctor')->where(['patient_id'=>$id,'form_type'=>'VaricoseAblation'])->get();
   $Patient_order_labs= Patient_order_lab::with('lab','doctor')->where(['patient_id'=>$id,'form_type'=>'VaricoseAblation'])->get();
    $Patient_insurer = Patient_insurer::where(['patient_id' => $id, 'status' => 'active'])->select('insurer_name', 'insurance_number')->orderBy('id', 'desc')->first();
    $Patient_past_medical_history = Patient_past_medical_history::select('id', 'diseases_name', 'describe', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
    $Patient_past_surgical_history = Patient_past_surgical_history::select('id', 'diseases_name', 'describe', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
    $Patient_current_med = Patient_current_med::select('id', 'drug_name', 'frequency', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
    $Patient_future_plan = Patient_future_plan::select('id', 'date', 'plan_text')->where('patient_id', $id)->orderBy('id', 'desc')->get();
    $Procedure = Procedure::select('id', 'procedure_name', 'summary', 'created_at', 'entry')->where('patient_id', $id)->orderBy('id', 'desc')->get();
    $Prescription = Prescription::select('id', 'prescription', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
    $ThyroidDiagnosis = ThyroidDiagnosis::query();
    $diagnosis_cid = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'diagnosis_cid', 'patient_id' => $id, 'form_type' => 'VaricoseAblation'])->orderBy('id', 'desc')->get();
    $Imaging = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'Imaging', 'patient_id' => $id, 'form_type' => 'VaricoseAblation'])->orderBy('id', 'desc')->get();

    $diagnosis_general = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'diagnosis_general', 'patient_id' => $id, 'form_type' => 'VaricoseAblation'])->orderBy('id', 'desc')->get();
    $ClinicalIndicator = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'ClinicalIndicator', 'patient_id' => $id, 'form_type' => 'VaricoseAblation'])->orderBy('id', 'desc')->get();
    $ClinicalExam = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'ClinicalExam', 'patient_id' => $id, 'form_type' => 'VaricoseAblation'])->orderBy('id', 'desc')->get();

    $symptoms = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'symptoms', 'patient_id' => $id, 'form_type' => 'VaricoseAblation'])->orderBy('id', 'desc')->get();
    // dd($symptoms);
    $symptoms_scores = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'symptoms_score', 'patient_id' => $id, 'form_type' => 'VaricoseAblation'])->orderBy('id', 'desc')->get();

    $Referrals = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'Referral', 'patient_id' => $id])->orderBy('id', 'desc')->get();
    $supportives = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'supportive', 'patient_id' => $id])->orderBy('id', 'desc')->get();
    $SpecialInvestigations = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'SpecialInvestigation', 'patient_id' => $id, 'form_type' => 'VaricoseAblation'])->orderBy('id', 'desc')->get();
    $ElegibilitySTATUS = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'ElegibilitySTATUS', 'patient_id' => $id, 'form_type' => 'VaricoseAblation'])->orderBy('id', 'desc')->get();
    $Interventions = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'Intervention', 'patient_id' => $id])->orderBy('id', 'desc')->get();
    $MDTs = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'MDT', 'patient_id' => $id, 'form_type' => 'VaricoseAblation'])->orderBy('id', 'desc')->get();
    $Labs = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at','doctor_id')->where(['title_name' => 'Lab', 'patient_id' => $id, 'form_type' => 'VaricoseAblation'])->orderBy('id', 'desc')->get();

    $data = [
        'patient' => $patient,
        'id' => Crypt::encrypt($id),
        'patient_past_history' => $Patient_past_medical_history,
        'patient_past_surgical' => $Patient_past_surgical_history,
        'patient_current_med' => $Patient_current_med,
        'patient_future_plan' => $Patient_future_plan,
        'procedures' => $Procedure,
        'prescriptions' => $Prescription,
        'insurer' => $Patient_insurer,
        'diagnosis_generals' => $diagnosis_general,
        'diagnosis_cids' => $diagnosis_cid,
        'symptoms_db' => $symptoms,
        'symptoms_scores_db' => $symptoms_scores,
        'Referrals' => $Referrals,
        'supportives' => $supportives,
        'SpecialInvestigations_db' => $SpecialInvestigations,
        'ElegibilitySTATUSDB' => $ElegibilitySTATUS,
        'Interventions' => $Interventions,
        'MDTs_db' => $MDTs,
        'Labs' => $Labs,
        'Patient_order_imaginary_exams'=>$Patient_order_imaginary_exams,
        'Patient_order_labs'=>$Patient_order_labs,
        'Imaging'=>$Imaging,
        'ClinicalIndicator_db' => $ClinicalIndicator,
        'ClinicalExam_db' => $ClinicalExam,

    ];

    return view('back/view-varicose-ablation-report')->with($data);
}

// PelvicCongEmbo form store method
public function storePelvicCongEmboEligibilityForms(Request $request)
{

    $doctor_id = auth()->guard('doctor')->id();

    $id = decrypt($request->patient_id);
    $dataToInsert = [];


    if (isset($request->diagnosis_general) && is_array($request->diagnosis_general) && !empty($request->diagnosis_general)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->diagnosis_general);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'diagnosis_general',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'PelvicCongEmbo'
            ];
        }
    }
    if (isset($request->diagnosis_cid) && is_array($request->diagnosis_cid) && !empty($request->diagnosis_cid)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->diagnosis_cid);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'diagnosis_cid',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'PelvicCongEmbo'
            ];
        }
    }
    $data=$request->symptoms;
    $newArray = [];

    foreach ($data as $item) {
        $newArray[] = [
            'SymptomType' => $item[0] ?? '',
            'SymptomDurationValue' => $item[1] ?? '',
            'SymptomDurationType' => $item[2] ?? '',
            'SymptomDurationNote' => $item[3] ?? ''
        ];
    }


    if (isset($newArray) && is_array($newArray) && !empty($newArray)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $newArray);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);

            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'symptoms',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'PelvicCongEmbo'
            ];
        }
    }
    if (isset($request->symptoms_score) && is_array($request->symptoms_score) && !empty($request->symptoms_score)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->symptoms_score);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'symptoms_score',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'PelvicCongEmbo'
            ];
        }
    }

    if (isset($request->Referral) && is_array($request->Referral) && !empty($request->Referral)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->Referral);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'Referral',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'PelvicCongEmbo'
            ];
        }
    }
    if (isset($request->Supportive) && is_array($request->Supportive) && !empty($request->Supportive)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->Supportive);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'Supportive',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'PelvicCongEmbo'
            ];
        }
    }
    if (isset($request->SpecialInvestigation) && is_array($request->SpecialInvestigation) && !empty($request->SpecialInvestigation)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->SpecialInvestigation);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'SpecialInvestigation',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'PelvicCongEmbo'
            ];
        }
    }
    if (isset($request->ElegibilitySTATUS) && is_array($request->ElegibilitySTATUS) && !empty($request->ElegibilitySTATUS)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->ElegibilitySTATUS);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'ElegibilitySTATUS',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'PelvicCongEmbo'
            ];
        }
    }

    if (isset($request->Intervention) && is_array($request->Intervention) && !empty($request->Intervention)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->Intervention);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'Intervention',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'PelvicCongEmbo'
            ];
        }
    }
    if (isset($request->MDT) && is_array($request->MDT) && !empty($request->MDT)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->MDT);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'MDT',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'PelvicCongEmbo'
            ];
        }
    }
    if (isset($request->Lab) && is_array($request->Lab) && !empty($request->Lab)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->Lab);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'Lab',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'PelvicCongEmbo'
            ];
        }
    }

    if (isset($request->Imaging) && is_array($request->Imaging) && !empty($request->Imaging)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->Imaging);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'Imaging',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'PelvicCongEmbo'
            ];
        }
    }


    if (isset($request->clinical_indicator) && is_array($request->clinical_indicator) && !empty($request->clinical_indicator)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->clinical_indicator);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'ClinicalIndicator',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'PelvicCongEmbo'
            ];
        }
    }
    if (isset($request->clinical_exam) && is_array($request->clinical_exam) && !empty($request->clinical_exam)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->clinical_exam);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'ClinicalExam',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'PelvicCongEmbo'
            ];
        }
    }




    if(!empty($dataToInsert)){
        ThyroidDiagnosis::insert($dataToInsert);

    }


    return  redirect()->route('user.viewPelvicCongEmboEligibilityForms', ['id' => $request->patient_id]);
}
// PelvicCongEmbo form edit method
public function editPelvicCongEmboEligibilityForms(Request $request)
{
    $id = decrypt($request->patient_id);
    // $id = decrypt();
    $ThyroidDiagnosis = ThyroidDiagnosis::query();

    $diagnosis_general = $ThyroidDiagnosis->select('data_value')->where(['title_name' => 'diagnosis_general', 'patient_id' => $id, 'form_type' => 'PelvicCongEmbo'])->get();
    $diagnosis_cid = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'diagnosis_cid', 'patient_id' => $id, 'form_type' => 'PelvicCongEmbo'])->get();


    $symptoms = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'symptoms', 'patient_id' => $id, 'form_type' => 'PelvicCongEmbo'])->get();
    $Imaging = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'Imaging', 'patient_id' => $id, 'form_type' => 'PelvicCongEmbo'])->orderBy('id', 'desc')->first();
    $symptoms_scores = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'symptoms_score', 'patient_id' => $id, 'form_type' => 'PelvicCongEmbo'])->first();

   $Referrals = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'Referral', 'patient_id' => $id, 'form_type' => 'PelvicCongEmbo'])->first();
    $supportives = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'supportive', 'patient_id' => $id, 'form_type' => 'PelvicCongEmbo'])->first();
    $SpecialInvestigations = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'SpecialInvestigation', 'patient_id' => $id, 'form_type' => 'PelvicCongEmbo'])->first();
    $ElegibilitySTATUS = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'ElegibilitySTATUS', 'patient_id' => $id, 'form_type' => 'PelvicCongEmbo'])->first();
    $Interventions = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'Intervention', 'patient_id' => $id, 'form_type' => 'PelvicCongEmbo'])->first();
    $MDTs = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'MDT', 'patient_id' => $id, 'form_type' => 'PelvicCongEmbo'])->first();
    $Labs = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'Lab', 'patient_id' => $id, 'form_type' => 'PelvicCongEmbo'])->first();
    $AntithyroidAntibodiesTests = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'AntithyroidAntibodiesTests', 'patient_id' => $id, 'form_type' => 'PelvicCongEmbo'])->first();
    $ClinicalIndicator = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'ClinicalIndicator', 'patient_id' => $id, 'form_type' => 'PelvicCongEmbo'])->first();
    $ClinicalExam = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'ClinicalExam', 'patient_id' => $id, 'form_type' => 'PelvicCongEmbo'])->first();

    $data = [
        'patient_id' => Crypt::encrypt($id),
        'diagnosis_generals_db' => $diagnosis_general,
        'diagnosis_cids_db' => $diagnosis_cid,
        'symptoms' => $symptoms,
        'symptoms_scores' => $symptoms_scores,
        'Referrals' => $Referrals,
        'supportives' => $supportives,
        'SpecialInvestigations' => $SpecialInvestigations,
        'ElegibilitySTATUS' => $ElegibilitySTATUS,
        'Interventions' => $Interventions,
        'MDTs' => $MDTs,
        'Labs' => $Labs,
        'AntithyroidAntibodiesTests' => $AntithyroidAntibodiesTests,
        'clinical_indicators' => $ClinicalIndicator,
        'ClinicalExam' => $ClinicalExam,
        'Imaging'=>$Imaging


    ];
    return view('back/Edit_pelvic_cong_embo', $data);
}

// PelvicCongEmbo form update method
public function updatePelvicCongEmboEligibilityForms(Request $request)
{
    ThyroidDiagnosis::where('form_type', 'PelvicCongEmbo')->delete();

    $this->storePelvicCongEmboEligibilityForms($request);
    return  redirect()->route('user.viewPelvicCongEmboEligibilityForms', ['id' => $request->patient_id]);
}

// PelvicCongEmbo form view method
public function viewPelvicCongEmboEligibilityForms(Request $request, $id)
{
    $id = Crypt::decrypt($id);
    $patient = User::findOrFail($id);

   $Patient_order_imaginary_exams= Patient_order_imaginary_exam::with('test','doctor')->where(['patient_id'=>$id,'form_type'=>'PelvicCongEmbo'])->get();
   $Patient_order_labs= Patient_order_lab::with('lab','doctor')->where(['patient_id'=>$id,'form_type'=>'PelvicCongEmbo'])->get();
    $Patient_insurer = Patient_insurer::where(['patient_id' => $id, 'status' => 'active'])->select('insurer_name', 'insurance_number')->orderBy('id', 'desc')->first();
    $Patient_past_medical_history = Patient_past_medical_history::select('id', 'diseases_name', 'describe', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
    $Patient_past_surgical_history = Patient_past_surgical_history::select('id', 'diseases_name', 'describe', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
    $Patient_current_med = Patient_current_med::select('id', 'drug_name', 'frequency', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
    $Patient_future_plan = Patient_future_plan::select('id', 'date', 'plan_text')->where('patient_id', $id)->orderBy('id', 'desc')->get();
    $Procedure = Procedure::select('id', 'procedure_name', 'summary', 'created_at', 'entry')->where('patient_id', $id)->orderBy('id', 'desc')->get();
    $Prescription = Prescription::select('id', 'prescription', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
    $ThyroidDiagnosis = ThyroidDiagnosis::query();
    $diagnosis_cid = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'diagnosis_cid', 'patient_id' => $id, 'form_type' => 'PelvicCongEmbo'])->orderBy('id', 'desc')->get();
    $Imaging = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'Imaging', 'patient_id' => $id, 'form_type' => 'PelvicCongEmbo'])->orderBy('id', 'desc')->get();

    $diagnosis_general = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'diagnosis_general', 'patient_id' => $id, 'form_type' => 'PelvicCongEmbo'])->orderBy('id', 'desc')->get();
    $ClinicalIndicator = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'ClinicalIndicator', 'patient_id' => $id, 'form_type' => 'PelvicCongEmbo'])->orderBy('id', 'desc')->get();
    $ClinicalExam = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'ClinicalExam', 'patient_id' => $id, 'form_type' => 'PelvicCongEmbo'])->orderBy('id', 'desc')->get();

    $symptoms = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'symptoms', 'patient_id' => $id, 'form_type' => 'PelvicCongEmbo'])->orderBy('id', 'desc')->get();
    // dd($symptoms);
    $symptoms_scores = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'symptoms_score', 'patient_id' => $id, 'form_type' => 'PelvicCongEmbo'])->orderBy('id', 'desc')->get();

    $Referrals = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'Referral', 'patient_id' => $id])->orderBy('id', 'desc')->get();
    $supportives = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'supportive', 'patient_id' => $id])->orderBy('id', 'desc')->get();
    $SpecialInvestigations = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'SpecialInvestigation', 'patient_id' => $id, 'form_type' => 'PelvicCongEmbo'])->orderBy('id', 'desc')->get();
    $ElegibilitySTATUS = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'ElegibilitySTATUS', 'patient_id' => $id, 'form_type' => 'PelvicCongEmbo'])->orderBy('id', 'desc')->get();
    $Interventions = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'Intervention', 'patient_id' => $id])->orderBy('id', 'desc')->get();
    $MDTs = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'MDT', 'patient_id' => $id, 'form_type' => 'PelvicCongEmbo'])->orderBy('id', 'desc')->get();
    $Labs = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at','doctor_id')->where(['title_name' => 'Lab', 'patient_id' => $id, 'form_type' => 'PelvicCongEmbo'])->orderBy('id', 'desc')->get();

    $data = [
        'patient' => $patient,
        'id' => Crypt::encrypt($id),
        'patient_past_history' => $Patient_past_medical_history,
        'patient_past_surgical' => $Patient_past_surgical_history,
        'patient_current_med' => $Patient_current_med,
        'patient_future_plan' => $Patient_future_plan,
        'procedures' => $Procedure,
        'prescriptions' => $Prescription,
        'insurer' => $Patient_insurer,
        'diagnosis_generals' => $diagnosis_general,
        'diagnosis_cids' => $diagnosis_cid,
        'symptoms_db' => $symptoms,
        'symptoms_scores_db' => $symptoms_scores,
        'Referrals' => $Referrals,
        'supportives' => $supportives,
        'SpecialInvestigations_db' => $SpecialInvestigations,
        'ElegibilitySTATUSDB' => $ElegibilitySTATUS,
        'Interventions' => $Interventions,
        'MDTs_db' => $MDTs,
        'Labs' => $Labs,
        'Patient_order_imaginary_exams'=>$Patient_order_imaginary_exams,
        'Patient_order_labs'=>$Patient_order_labs,
        'Imaging'=>$Imaging,
        'ClinicalIndicator_db' => $ClinicalIndicator,
        'ClinicalExam_db' => $ClinicalExam,

    ];

    return view('back/view-pelvic-cong-embo-report')->with($data);
}

// uterine_embo form store method
public function storeUterineEmboEligibilityForms(Request $request)
{

    $doctor_id = auth()->guard('doctor')->id();

    $id = decrypt($request->patient_id);
    $dataToInsert = [];


    if (isset($request->diagnosis_general) && is_array($request->diagnosis_general) && !empty($request->diagnosis_general)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->diagnosis_general);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'diagnosis_general',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'uterine_embo'
            ];
        }
    }
    if (isset($request->diagnosis_cid) && is_array($request->diagnosis_cid) && !empty($request->diagnosis_cid)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->diagnosis_cid);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'diagnosis_cid',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'uterine_embo'
            ];
        }
    }
    $data=$request->symptoms;
    $newArray = [];

    foreach ($data as $item) {
        $newArray[] = [
            'SymptomType' => $item[0] ?? '',
            'SymptomDurationValue' => $item[1] ?? '',
            'SymptomDurationType' => $item[2] ?? '',
            'SymptomDurationNote' => $item[3] ?? ''
        ];
    }


    if (isset($newArray) && is_array($newArray) && !empty($newArray)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $newArray);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);

            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'symptoms',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'uterine_embo'
            ];
        }
    }
    if (isset($request->symptoms_score) && is_array($request->symptoms_score) && !empty($request->symptoms_score)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->symptoms_score);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'symptoms_score',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'uterine_embo'
            ];
        }
    }

    if (isset($request->Referral) && is_array($request->Referral) && !empty($request->Referral)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->Referral);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'Referral',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'uterine_embo'
            ];
        }
    }
    if (isset($request->Supportive) && is_array($request->Supportive) && !empty($request->Supportive)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->Supportive);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'Supportive',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'uterine_embo'
            ];
        }
    }
    if (isset($request->SpecialInvestigation) && is_array($request->SpecialInvestigation) && !empty($request->SpecialInvestigation)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->SpecialInvestigation);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'SpecialInvestigation',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'uterine_embo'
            ];
        }
    }
    if (isset($request->ElegibilitySTATUS) && is_array($request->ElegibilitySTATUS) && !empty($request->ElegibilitySTATUS)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->ElegibilitySTATUS);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'ElegibilitySTATUS',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'uterine_embo'
            ];
        }
    }

    if (isset($request->Intervention) && is_array($request->Intervention) && !empty($request->Intervention)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->Intervention);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'Intervention',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'uterine_embo'
            ];
        }
    }
    if (isset($request->MDT) && is_array($request->MDT) && !empty($request->MDT)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->MDT);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'MDT',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'uterine_embo'
            ];
        }
    }
    if (isset($request->Lab) && is_array($request->Lab) && !empty($request->Lab)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->Lab);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'Lab',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'uterine_embo'
            ];
        }
    }

    if (isset($request->Imaging) && is_array($request->Imaging) && !empty($request->Imaging)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->Imaging);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'Imaging',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'uterine_embo'
            ];
        }
    }


    if (isset($request->clinical_indicator) && is_array($request->clinical_indicator) && !empty($request->clinical_indicator)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->clinical_indicator);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'ClinicalIndicator',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'uterine_embo'
            ];
        }
    }
    if (isset($request->clinical_exam) && is_array($request->clinical_exam) && !empty($request->clinical_exam)) {
        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $request->clinical_exam);

        // Check if there's any non-empty array in $filteredDiagnosisGeneral
        $nonEmptyArraysExist = false;
        foreach ($filteredDiagnosisGeneral as $subarray) {
            if (!empty($subarray)) {
                $nonEmptyArraysExist = true;
                break;
            }
        }

        if ($nonEmptyArraysExist) {
            $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
            $dataToInsert[] = [
                'patient_id' => $id,
                'title_name' => 'ClinicalExam',
                'data_value' =>  json_encode($filteredDiagnosisGeneral),
                'doctor_id' => $doctor_id,
                'form_type' => 'uterine_embo'
            ];
        }
    }




    if(!empty($dataToInsert)){
        ThyroidDiagnosis::insert($dataToInsert);

    }


    return  redirect()->route('user.viewUterineEmboEligibilityForms', ['id' => $request->patient_id]);
}
// uterine_embo form edit method
public function editUterineEmboEligibilityForms(Request $request)
{
    $id = decrypt($request->patient_id);
    // $id = decrypt();
    $ThyroidDiagnosis = ThyroidDiagnosis::query();

    $diagnosis_general = $ThyroidDiagnosis->select('data_value')->where(['title_name' => 'diagnosis_general', 'patient_id' => $id, 'form_type' => 'uterine_embo'])->get();
    $diagnosis_cid = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'diagnosis_cid', 'patient_id' => $id, 'form_type' => 'uterine_embo'])->get();


    $symptoms = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'symptoms', 'patient_id' => $id, 'form_type' => 'uterine_embo'])->get();
    $Imaging = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'Imaging', 'patient_id' => $id, 'form_type' => 'uterine_embo'])->orderBy('id', 'desc')->first();
    $symptoms_scores = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'symptoms_score', 'patient_id' => $id, 'form_type' => 'uterine_embo'])->first();

   $Referrals = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'Referral', 'patient_id' => $id, 'form_type' => 'uterine_embo'])->first();
    $supportives = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'supportive', 'patient_id' => $id, 'form_type' => 'uterine_embo'])->first();
    $SpecialInvestigations = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'SpecialInvestigation', 'patient_id' => $id, 'form_type' => 'uterine_embo'])->first();
    $ElegibilitySTATUS = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'ElegibilitySTATUS', 'patient_id' => $id, 'form_type' => 'uterine_embo'])->first();
    $Interventions = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'Intervention', 'patient_id' => $id, 'form_type' => 'uterine_embo'])->first();
    $MDTs = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'MDT', 'patient_id' => $id, 'form_type' => 'uterine_embo'])->first();
    $Labs = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'Lab', 'patient_id' => $id, 'form_type' => 'uterine_embo'])->first();
    $AntithyroidAntibodiesTests = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'AntithyroidAntibodiesTests', 'patient_id' => $id, 'form_type' => 'uterine_embo'])->first();
    $ClinicalIndicator = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'ClinicalIndicator', 'patient_id' => $id, 'form_type' => 'uterine_embo'])->first();
    $ClinicalExam = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'ClinicalExam', 'patient_id' => $id, 'form_type' => 'uterine_embo'])->first();

    $data = [
        'patient_id' => Crypt::encrypt($id),
        'diagnosis_generals_db' => $diagnosis_general,
        'diagnosis_cids_db' => $diagnosis_cid,
        'symptoms' => $symptoms,
        'symptoms_scores' => $symptoms_scores,
        'Referrals' => $Referrals,
        'supportives' => $supportives,
        'SpecialInvestigations' => $SpecialInvestigations,
        'ElegibilitySTATUS' => $ElegibilitySTATUS,
        'Interventions' => $Interventions,
        'MDTs' => $MDTs,
        'Labs' => $Labs,
        'AntithyroidAntibodiesTests' => $AntithyroidAntibodiesTests,
        'clinical_indicators' => $ClinicalIndicator,
        'ClinicalExam' => $ClinicalExam,

        'Imaging'=>$Imaging


    ];
    return view('back/Edit_uterine_embo', $data);
}
// uterine_embo form update method
public function updateUterineEmboEligibilityForms(Request $request)
{
    ThyroidDiagnosis::where('form_type', 'uterine_embo')->delete();

    $this->storeUterineEmboEligibilityForms($request);
    return  redirect()->route('user.viewUterineEmboEligibilityForms', ['id' => $request->patient_id]);
}
// uterine_embo form view method
public function viewUterineEmboEligibilityForms(Request $request, $id)
{
    $id = Crypt::decrypt($id);
    $patient = User::findOrFail($id);

   $Patient_order_imaginary_exams= Patient_order_imaginary_exam::with('test','doctor')->where(['patient_id'=>$id,'form_type'=>'uterine_embo'])->get();
   $Patient_order_labs= Patient_order_lab::with('lab','doctor')->where(['patient_id'=>$id,'form_type'=>'uterine_embo'])->get();
    $Patient_insurer = Patient_insurer::where(['patient_id' => $id, 'status' => 'active'])->select('insurer_name', 'insurance_number')->orderBy('id', 'desc')->first();
    $Patient_past_medical_history = Patient_past_medical_history::select('id', 'diseases_name', 'describe', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
    $Patient_past_surgical_history = Patient_past_surgical_history::select('id', 'diseases_name', 'describe', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
    $Patient_current_med = Patient_current_med::select('id', 'drug_name', 'frequency', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
    $Patient_future_plan = Patient_future_plan::select('id', 'date', 'plan_text')->where('patient_id', $id)->orderBy('id', 'desc')->get();
    $Procedure = Procedure::select('id', 'procedure_name', 'summary', 'created_at', 'entry')->where('patient_id', $id)->orderBy('id', 'desc')->get();
    $Prescription = Prescription::select('id', 'prescription', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
    $ThyroidDiagnosis = ThyroidDiagnosis::query();
    $diagnosis_cid = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'diagnosis_cid', 'patient_id' => $id, 'form_type' => 'uterine_embo'])->orderBy('id', 'desc')->get();
    $Imaging = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'Imaging', 'patient_id' => $id, 'form_type' => 'uterine_embo'])->orderBy('id', 'desc')->get();

    $diagnosis_general = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'diagnosis_general', 'patient_id' => $id, 'form_type' => 'uterine_embo'])->orderBy('id', 'desc')->get();
    $ClinicalIndicator = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'ClinicalIndicator', 'patient_id' => $id, 'form_type' => 'uterine_embo'])->orderBy('id', 'desc')->get();
    $ClinicalExam = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'ClinicalExam', 'patient_id' => $id, 'form_type' => 'uterine_embo'])->orderBy('id', 'desc')->get();

    $symptoms = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'symptoms', 'patient_id' => $id, 'form_type' => 'uterine_embo'])->orderBy('id', 'desc')->get();
    // dd($symptoms);
    $symptoms_scores = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'symptoms_score', 'patient_id' => $id, 'form_type' => 'uterine_embo'])->orderBy('id', 'desc')->get();

    $Referrals = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'Referral', 'patient_id' => $id])->orderBy('id', 'desc')->get();
    $supportives = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'supportive', 'patient_id' => $id])->orderBy('id', 'desc')->get();
    $SpecialInvestigations = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'SpecialInvestigation', 'patient_id' => $id, 'form_type' => 'uterine_embo'])->orderBy('id', 'desc')->get();
    $ElegibilitySTATUS = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'ElegibilitySTATUS', 'patient_id' => $id, 'form_type' => 'uterine_embo'])->orderBy('id', 'desc')->get();
    $Interventions = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'Intervention', 'patient_id' => $id])->orderBy('id', 'desc')->get();
    $MDTs = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'MDT', 'patient_id' => $id, 'form_type' => 'uterine_embo'])->orderBy('id', 'desc')->get();
    $Labs = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at','doctor_id')->where(['title_name' => 'Lab', 'patient_id' => $id, 'form_type' => 'uterine_embo'])->orderBy('id', 'desc')->get();

    $data = [
        'patient' => $patient,
        'id' => Crypt::encrypt($id),
        'patient_past_history' => $Patient_past_medical_history,
        'patient_past_surgical' => $Patient_past_surgical_history,
        'patient_current_med' => $Patient_current_med,
        'patient_future_plan' => $Patient_future_plan,
        'procedures' => $Procedure,
        'prescriptions' => $Prescription,
        'insurer' => $Patient_insurer,
        'diagnosis_generals' => $diagnosis_general,
        'diagnosis_cids' => $diagnosis_cid,
        'symptoms_db' => $symptoms,
        'symptoms_scores_db' => $symptoms_scores,
        'Referrals' => $Referrals,
        'supportives' => $supportives,
        'SpecialInvestigations_db' => $SpecialInvestigations,
        'ElegibilitySTATUSDB' => $ElegibilitySTATUS,
        'Interventions' => $Interventions,
        'MDTs_db' => $MDTs,
        'Labs' => $Labs,
        'Patient_order_imaginary_exams'=>$Patient_order_imaginary_exams,
        'Patient_order_labs'=>$Patient_order_labs,
        'Imaging'=>$Imaging,
        'ClinicalIndicator_db' => $ClinicalIndicator,
            'ClinicalExam_db' => $ClinicalExam,

    ];

    return view('back/view-uterine-embo-report')->with($data);
}

    // prostate form store method
    public function storeProstateEligibilityForms(Request $request)
    {

        $doctor_id = auth()->guard('doctor')->id();

        $id = decrypt($request->patient_id);
        $dataToInsert = [];


        if (isset($request->diagnosis_general) && is_array($request->diagnosis_general) && !empty($request->diagnosis_general)) {
            $filteredDiagnosisGeneral = array_map(function ($subarray) {
                return array_filter($subarray, function ($value) {
                    return $value !== null && $value !== '';
                });
            }, $request->diagnosis_general);

            // Check if there's any non-empty array in $filteredDiagnosisGeneral
            $nonEmptyArraysExist = false;
            foreach ($filteredDiagnosisGeneral as $subarray) {
                if (!empty($subarray)) {
                    $nonEmptyArraysExist = true;
                    break;
                }
            }

            if ($nonEmptyArraysExist) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'diagnosis_general',
                    'data_value' =>  json_encode($filteredDiagnosisGeneral),
                    'doctor_id' => $doctor_id,
                    'form_type' => 'prostate_form'
                ];
            }
        }
        if (isset($request->diagnosis_cid) && is_array($request->diagnosis_cid) && !empty($request->diagnosis_cid)) {
            $filteredDiagnosisGeneral = array_map(function ($subarray) {
                return array_filter($subarray, function ($value) {
                    return $value !== null && $value !== '';
                });
            }, $request->diagnosis_cid);

            // Check if there's any non-empty array in $filteredDiagnosisGeneral
            $nonEmptyArraysExist = false;
            foreach ($filteredDiagnosisGeneral as $subarray) {
                if (!empty($subarray)) {
                    $nonEmptyArraysExist = true;
                    break;
                }
            }

            if ($nonEmptyArraysExist) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'diagnosis_cid',
                    'data_value' =>  json_encode($filteredDiagnosisGeneral),
                    'doctor_id' => $doctor_id,
                    'form_type' => 'prostate_form'
                ];
            }
        }
        $data=$request->symptoms;
        $newArray = [];

        foreach ($data as $item) {
            $newArray[] = [
                'SymptomType' => $item[0] ?? '',
                'SymptomDurationValue' => $item[1] ?? '',
                'SymptomDurationType' => $item[2] ?? '',
                'SymptomDurationNote' => $item[3] ?? ''
            ];
        }


        if (isset($newArray) && is_array($newArray) && !empty($newArray)) {
            $filteredDiagnosisGeneral = array_map(function ($subarray) {
                return array_filter($subarray, function ($value) {
                    return $value !== null && $value !== '';
                });
            }, $newArray);

            // Check if there's any non-empty array in $filteredDiagnosisGeneral
            $nonEmptyArraysExist = false;
            foreach ($filteredDiagnosisGeneral as $subarray) {
                if (!empty($subarray)) {
                    $nonEmptyArraysExist = true;
                    break;
                }
            }

            if ($nonEmptyArraysExist) {
                $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);

                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'symptoms',
                    'data_value' =>  json_encode($filteredDiagnosisGeneral),
                    'doctor_id' => $doctor_id,
                    'form_type' => 'prostate_form'
                ];
            }
        }
        if (isset($request->symptoms_score) && is_array($request->symptoms_score) && !empty($request->symptoms_score)) {
            $filteredDiagnosisGeneral = array_map(function ($subarray) {
                return array_filter($subarray, function ($value) {
                    return $value !== null && $value !== '';
                });
            }, $request->symptoms_score);

            // Check if there's any non-empty array in $filteredDiagnosisGeneral
            $nonEmptyArraysExist = false;
            foreach ($filteredDiagnosisGeneral as $subarray) {
                if (!empty($subarray)) {
                    $nonEmptyArraysExist = true;
                    break;
                }
            }

            if ($nonEmptyArraysExist) {
                $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'symptoms_score',
                    'data_value' =>  json_encode($filteredDiagnosisGeneral),
                    'doctor_id' => $doctor_id,
                    'form_type' => 'prostate_form'
                ];
            }
        }

        if (isset($request->Referral) && is_array($request->Referral) && !empty($request->Referral)) {
            $filteredDiagnosisGeneral = array_map(function ($subarray) {
                return array_filter($subarray, function ($value) {
                    return $value !== null && $value !== '';
                });
            }, $request->Referral);

            // Check if there's any non-empty array in $filteredDiagnosisGeneral
            $nonEmptyArraysExist = false;
            foreach ($filteredDiagnosisGeneral as $subarray) {
                if (!empty($subarray)) {
                    $nonEmptyArraysExist = true;
                    break;
                }
            }

            if ($nonEmptyArraysExist) {
                $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'Referral',
                    'data_value' =>  json_encode($filteredDiagnosisGeneral),
                    'doctor_id' => $doctor_id,
                    'form_type' => 'prostate_form'
                ];
            }
        }
        if (isset($request->Supportive) && is_array($request->Supportive) && !empty($request->Supportive)) {
            $filteredDiagnosisGeneral = array_map(function ($subarray) {
                return array_filter($subarray, function ($value) {
                    return $value !== null && $value !== '';
                });
            }, $request->Supportive);

            // Check if there's any non-empty array in $filteredDiagnosisGeneral
            $nonEmptyArraysExist = false;
            foreach ($filteredDiagnosisGeneral as $subarray) {
                if (!empty($subarray)) {
                    $nonEmptyArraysExist = true;
                    break;
                }
            }

            if ($nonEmptyArraysExist) {
                $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'Supportive',
                    'data_value' =>  json_encode($filteredDiagnosisGeneral),
                    'doctor_id' => $doctor_id,
                    'form_type' => 'prostate_form'
                ];
            }
        }
        if (isset($request->SpecialInvestigation) && is_array($request->SpecialInvestigation) && !empty($request->SpecialInvestigation)) {
            $filteredDiagnosisGeneral = array_map(function ($subarray) {
                return array_filter($subarray, function ($value) {
                    return $value !== null && $value !== '';
                });
            }, $request->SpecialInvestigation);

            // Check if there's any non-empty array in $filteredDiagnosisGeneral
            $nonEmptyArraysExist = false;
            foreach ($filteredDiagnosisGeneral as $subarray) {
                if (!empty($subarray)) {
                    $nonEmptyArraysExist = true;
                    break;
                }
            }

            if ($nonEmptyArraysExist) {
                $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'SpecialInvestigation',
                    'data_value' =>  json_encode($filteredDiagnosisGeneral),
                    'doctor_id' => $doctor_id,
                    'form_type' => 'prostate_form'
                ];
            }
        }
        if (isset($request->ElegibilitySTATUS) && is_array($request->ElegibilitySTATUS) && !empty($request->ElegibilitySTATUS)) {
            $filteredDiagnosisGeneral = array_map(function ($subarray) {
                return array_filter($subarray, function ($value) {
                    return $value !== null && $value !== '';
                });
            }, $request->ElegibilitySTATUS);

            // Check if there's any non-empty array in $filteredDiagnosisGeneral
            $nonEmptyArraysExist = false;
            foreach ($filteredDiagnosisGeneral as $subarray) {
                if (!empty($subarray)) {
                    $nonEmptyArraysExist = true;
                    break;
                }
            }

            if ($nonEmptyArraysExist) {
                $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'ElegibilitySTATUS',
                    'data_value' =>  json_encode($filteredDiagnosisGeneral),
                    'doctor_id' => $doctor_id,
                    'form_type' => 'prostate_form'
                ];
            }
        }

        if (isset($request->Intervention) && is_array($request->Intervention) && !empty($request->Intervention)) {
            $filteredDiagnosisGeneral = array_map(function ($subarray) {
                return array_filter($subarray, function ($value) {
                    return $value !== null && $value !== '';
                });
            }, $request->Intervention);

            // Check if there's any non-empty array in $filteredDiagnosisGeneral
            $nonEmptyArraysExist = false;
            foreach ($filteredDiagnosisGeneral as $subarray) {
                if (!empty($subarray)) {
                    $nonEmptyArraysExist = true;
                    break;
                }
            }

            if ($nonEmptyArraysExist) {
                $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'Intervention',
                    'data_value' =>  json_encode($filteredDiagnosisGeneral),
                    'doctor_id' => $doctor_id,
                    'form_type' => 'prostate_form'
                ];
            }
        }
        if (isset($request->MDT) && is_array($request->MDT) && !empty($request->MDT)) {
            $filteredDiagnosisGeneral = array_map(function ($subarray) {
                return array_filter($subarray, function ($value) {
                    return $value !== null && $value !== '';
                });
            }, $request->MDT);

            // Check if there's any non-empty array in $filteredDiagnosisGeneral
            $nonEmptyArraysExist = false;
            foreach ($filteredDiagnosisGeneral as $subarray) {
                if (!empty($subarray)) {
                    $nonEmptyArraysExist = true;
                    break;
                }
            }

            if ($nonEmptyArraysExist) {
                $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'MDT',
                    'data_value' =>  json_encode($filteredDiagnosisGeneral),
                    'doctor_id' => $doctor_id,
                    'form_type' => 'prostate_form'
                ];
            }
        }
        if (isset($request->Lab) && is_array($request->Lab) && !empty($request->Lab)) {
            $filteredDiagnosisGeneral = array_map(function ($subarray) {
                return array_filter($subarray, function ($value) {
                    return $value !== null && $value !== '';
                });
            }, $request->Lab);

            // Check if there's any non-empty array in $filteredDiagnosisGeneral
            $nonEmptyArraysExist = false;
            foreach ($filteredDiagnosisGeneral as $subarray) {
                if (!empty($subarray)) {
                    $nonEmptyArraysExist = true;
                    break;
                }
            }

            if ($nonEmptyArraysExist) {
                $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'Lab',
                    'data_value' =>  json_encode($filteredDiagnosisGeneral),
                    'doctor_id' => $doctor_id,
                    'form_type' => 'prostate_form'
                ];
            }
        }



        if (isset($request->Imaging) && is_array($request->Imaging) && !empty($request->Imaging)) {
            $filteredDiagnosisGeneral = array_map(function ($subarray) {
                return array_filter($subarray, function ($value) {
                    return $value !== null && $value !== '';
                });
            }, $request->Imaging);

            // Check if there's any non-empty array in $filteredDiagnosisGeneral
            $nonEmptyArraysExist = false;
            foreach ($filteredDiagnosisGeneral as $subarray) {
                if (!empty($subarray)) {
                    $nonEmptyArraysExist = true;
                    break;
                }
            }

            if ($nonEmptyArraysExist) {
                $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'Imaging',
                    'data_value' =>  json_encode($filteredDiagnosisGeneral),
                    'doctor_id' => $doctor_id,
                    'form_type' => 'prostate_form'
                ];
            }
        }

        if (isset($request->clinical_indicator) && is_array($request->clinical_indicator) && !empty($request->clinical_indicator)) {
            $filteredDiagnosisGeneral = array_map(function ($subarray) {
                return array_filter($subarray, function ($value) {
                    return $value !== null && $value !== '';
                });
            }, $request->clinical_indicator);

            // Check if there's any non-empty array in $filteredDiagnosisGeneral
            $nonEmptyArraysExist = false;
            foreach ($filteredDiagnosisGeneral as $subarray) {
                if (!empty($subarray)) {
                    $nonEmptyArraysExist = true;
                    break;
                }
            }

            if ($nonEmptyArraysExist) {
                $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'ClinicalIndicator',
                    'data_value' =>  json_encode($filteredDiagnosisGeneral),
                    'doctor_id' => $doctor_id,
                    'form_type' => 'prostate_form'
                ];
            }
        }
        if (isset($request->clinical_exam) && is_array($request->clinical_exam) && !empty($request->clinical_exam)) {
            $filteredDiagnosisGeneral = array_map(function ($subarray) {
                return array_filter($subarray, function ($value) {
                    return $value !== null && $value !== '';
                });
            }, $request->clinical_exam);

            // Check if there's any non-empty array in $filteredDiagnosisGeneral
            $nonEmptyArraysExist = false;
            foreach ($filteredDiagnosisGeneral as $subarray) {
                if (!empty($subarray)) {
                    $nonEmptyArraysExist = true;
                    break;
                }
            }

            if ($nonEmptyArraysExist) {
                $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'ClinicalExam',
                    'data_value' =>  json_encode($filteredDiagnosisGeneral),
                    'doctor_id' => $doctor_id,
                    'form_type' => 'prostate_form'
                ];
            }
        }

        if(!empty($dataToInsert)){
            ThyroidDiagnosis::insert($dataToInsert);

        }


        return  redirect()->route('user.ViewProstateEligibilityForms', ['id' => $request->patient_id]);
    }
    public function editProstateEligibilityForms(Request $request)
    {
        $id = decrypt($request->patient_id);
        // $id = decrypt();
        $ThyroidDiagnosis = ThyroidDiagnosis::query();

        $diagnosis_general = $ThyroidDiagnosis->select('data_value')->where(['title_name' => 'diagnosis_general', 'patient_id' => $id, 'form_type' => 'prostate_form'])->get();
        $diagnosis_cid = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'diagnosis_cid', 'patient_id' => $id, 'form_type' => 'prostate_form'])->get();

        $Imaging = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'Imaging', 'patient_id' => $id, 'form_type' => 'prostate_form'])->orderBy('id', 'desc')->first();
        $symptoms = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'symptoms', 'patient_id' => $id, 'form_type' => 'prostate_form'])->get();

        $symptoms_scores = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'symptoms_score', 'patient_id' => $id, 'form_type' => 'prostate_form'])->first();
        $USGENERAL70 = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'USGENERAL70', 'patient_id' => $id, 'form_type' => 'prostate_form'])->first();
        $BPHTYPE=ThyroidDiagnosis::select('data_value')->where(['title_name' => 'BPHTYPE', 'patient_id' => $id, 'form_type' => 'prostate_form'])->first();
       $rdlobe=ThyroidDiagnosis::select('data_value')->where(['title_name' => 'rdlobe', 'patient_id' => $id, 'form_type' => 'prostate_form'])->first();
       $ProstateAbscess=ThyroidDiagnosis::select('data_value')->where(['title_name' => 'ProstateAbscess', 'patient_id' => $id, 'form_type' => 'prostate_form'])->first();
       $CTCIR48RIGHT=ThyroidDiagnosis::select('data_value')->where(['title_name' => 'CTCIR48RIGHT', 'patient_id' => $id, 'form_type' => 'prostate_form'])->first();
       $CTCIR48LEFT=ThyroidDiagnosis::select('data_value')->where(['title_name' => 'CTCIR48LEFT', 'patient_id' => $id, 'form_type' => 'prostate_form'])->first();
        $USBIOPSYPROSTETE690=ThyroidDiagnosis::select('data_value')->where(['title_name' => 'USBIOPSYPROSTETE690', 'patient_id' => $id, 'form_type' => 'prostate_form'])->first();
       $Referrals = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'Referral', 'patient_id' => $id, 'form_type' => 'prostate_form'])->first();
        $supportives = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'supportive', 'patient_id' => $id, 'form_type' => 'prostate_form'])->first();
        $SpecialInvestigations = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'SpecialInvestigation', 'patient_id' => $id, 'form_type' => 'prostate_form'])->first();
        $ElegibilitySTATUS = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'ElegibilitySTATUS', 'patient_id' => $id, 'form_type' => 'prostate_form'])->first();
        $Interventions = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'Intervention', 'patient_id' => $id, 'form_type' => 'prostate_form'])->first();
        $MDTs = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'MDT', 'patient_id' => $id, 'form_type' => 'prostate_form'])->first();
        $Labs = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'Lab', 'patient_id' => $id, 'form_type' => 'prostate_form'])->first();
        $AntithyroidAntibodiesTests = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'AntithyroidAntibodiesTests', 'patient_id' => $id, 'form_type' => 'prostate_form'])->first();
        $ClinicalIndicator = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'ClinicalIndicator', 'patient_id' => $id, 'form_type' => 'prostate_form'])->first();
        $ClinicalExam = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'ClinicalExam', 'patient_id' => $id, 'form_type' => 'prostate_form'])->first();
        $rightLobeScore = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'rightLobeScore', 'patient_id' => $id, 'form_type' => 'prostate_form'])->first();
        $leftLobeScore = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'leftLobeScore', 'patient_id' => $id, 'form_type' => 'prostate_form'])->first();
        $Retrosternalextension = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'Retrosternalextension', 'patient_id' => $id, 'form_type' => 'prostate_form'])->first();
        $EnlargedLymphnodes = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'EnlargedLymphnodes', 'patient_id' => $id, 'form_type' => 'prostate_form'])->first();
        $paralysis = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'paralysis', 'patient_id' => $id, 'form_type' => 'prostate_form'])->first();
        $MRCIR48 = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'MRCIR48', 'patient_id' => $id, 'form_type' => 'prostate_form'])->first();
        $CTCIR48 = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'CTCIR48', 'patient_id' => $id, 'form_type' => 'prostate_form'])->first();
        $NmThyroidScan = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'NmThyroidScan', 'patient_id' => $id, 'form_type' => 'prostate_form'])->first();
        $NmParaThyroidScan = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'NmParaThyroidScan', 'patient_id' => $id, 'form_type' => 'prostate_form'])->first();
        $HistopathRightThyroidFNA = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'HistopathRightThyroidFNA', 'patient_id' => $id, 'form_type' => 'prostate_form'])->first();
        $HistopathLeftThyroidFNA = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'HistopathLeftThyroidFNA', 'patient_id' => $id, 'form_type' => 'prostate_form'])->first();
        $data = [
            'patient_id' => Crypt::encrypt($id),
            'diagnosis_generals_db' => $diagnosis_general,
            'diagnosis_cids_db' => $diagnosis_cid,
            'symptoms' => $symptoms,
            'symptoms_scores' => $symptoms_scores,
            'Referrals' => $Referrals,
            'supportives' => $supportives,
            'SpecialInvestigations' => $SpecialInvestigations,
            'ElegibilitySTATUS' => $ElegibilitySTATUS,
            'Interventions' => $Interventions,
            'MDTs' => $MDTs,
            'Labs' => $Labs,
            'AntithyroidAntibodiesTests' => $AntithyroidAntibodiesTests,
            'clinical_indicators' => $ClinicalIndicator,
            'ClinicalExam' => $ClinicalExam,
            'rightLobeScore' => $rightLobeScore,
            'leftLobeScore' => $leftLobeScore,
            'Retrosternalextension' => $Retrosternalextension,
            'EnlargedLymphnodes' => $EnlargedLymphnodes,
            'paralysis' => $paralysis,
            'MRCIR48' => $MRCIR48,
            'CTCIR48' => $CTCIR48,
            'NmThyroidScan' => $NmThyroidScan,
            'NmParaThyroidScan' => $NmParaThyroidScan,
            'HistopathRightThyroidFNA' => $HistopathRightThyroidFNA,
            'HistopathLeftThyroidFNA' => $HistopathLeftThyroidFNA,
            'USGENERAL70'=>$USGENERAL70,
            'BPHTYPE'=>$BPHTYPE,
            'rdlobe'=>$rdlobe,
            'ProstateAbscess'=>$ProstateAbscess,
            'CTCIR48RIGHT'=>$CTCIR48RIGHT,
            'CTCIR48LEFT'=>$CTCIR48LEFT,
            'USBIOPSYPROSTETE690'=>$USBIOPSYPROSTETE690,
            'Imaging'=>$Imaging

        ];
        return view('back/Edit_prostate', $data);
    }

    public function UpdateProstateEligibilityForms(Request $request)
    {
        ThyroidDiagnosis::where('form_type', 'prostate_form')->delete();

        $this->storeProstateEligibilityForms($request);
        return  redirect()->route('user.ViewProstateEligibilityForms', ['id' => $request->patient_id]);
    }

    public function ViewProstateEligibilityForms(Request $request, $id)
    {
        $id = Crypt::decrypt($id);
        $patient = User::findOrFail($id);

       $Patient_order_imaginary_exams= Patient_order_imaginary_exam::with('test','doctor')->where(['patient_id'=>$id,'form_type'=>'prostate_form'])->get();
       $Patient_order_labs= Patient_order_lab::with('lab','doctor')->where(['patient_id'=>$id,'form_type'=>'prostate_form'])->get();
        $Patient_insurer = Patient_insurer::where(['patient_id' => $id, 'status' => 'active'])->select('insurer_name', 'insurance_number')->orderBy('id', 'desc')->first();
        $Patient_past_medical_history = Patient_past_medical_history::select('id', 'diseases_name', 'describe', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_past_surgical_history = Patient_past_surgical_history::select('id', 'diseases_name', 'describe', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_current_med = Patient_current_med::select('id', 'drug_name', 'frequency', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_future_plan = Patient_future_plan::select('id', 'date', 'plan_text')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Procedure = Procedure::select('id', 'procedure_name', 'summary', 'created_at', 'entry')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Prescription = Prescription::select('id', 'prescription', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $ThyroidDiagnosis = ThyroidDiagnosis::query();
        $diagnosis_cid = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'diagnosis_cid', 'patient_id' => $id, 'form_type' => 'prostate_form'])->orderBy('id', 'desc')->get();


        $diagnosis_general = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'diagnosis_general', 'patient_id' => $id, 'form_type' => 'prostate_form'])->orderBy('id', 'desc')->get();
        $Imaging = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'Imaging', 'patient_id' => $id, 'form_type' => 'prostate_form'])->orderBy('id', 'desc')->get();

        $symptoms = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'symptoms', 'patient_id' => $id, 'form_type' => 'prostate_form'])->orderBy('id', 'desc')->get();
        // dd($symptoms);
        $symptoms_scores = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'symptoms_score', 'patient_id' => $id, 'form_type' => 'prostate_form'])->orderBy('id', 'desc')->get();

        $Referrals = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'Referral', 'patient_id' => $id])->orderBy('id', 'desc')->get();
        $supportives = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'supportive', 'patient_id' => $id])->orderBy('id', 'desc')->get();
        $SpecialInvestigations = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'SpecialInvestigation', 'patient_id' => $id, 'form_type' => 'prostate_form'])->orderBy('id', 'desc')->get();
        $ElegibilitySTATUS = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'ElegibilitySTATUS', 'patient_id' => $id, 'form_type' => 'prostate_form'])->orderBy('id', 'desc')->get();
        $Interventions = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'Intervention', 'patient_id' => $id])->orderBy('id', 'desc')->get();
        $MDTs = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'MDT', 'patient_id' => $id, 'form_type' => 'prostate_form'])->orderBy('id', 'desc')->get();
        $Labs = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at','doctor_id')->where(['title_name' => 'Lab', 'patient_id' => $id, 'form_type' => 'prostate_form'])->orderBy('id', 'desc')->get();

        $AntithyroidAntibodiesTests = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'AntithyroidAntibodiesTests', 'patient_id' => $id])->orderBy('id', 'desc')->get();
        $ClinicalIndicator = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'ClinicalIndicator', 'patient_id' => $id, 'form_type' => 'prostate_form'])->orderBy('id', 'desc')->get();
        $ClinicalExam = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'ClinicalExam', 'patient_id' => $id, 'form_type' => 'prostate_form'])->orderBy('id', 'desc')->get();
        // $rightLobeScore = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at','doctor_id')->where(['title_name' => 'rightLobeScore', 'patient_id' => $id, 'form_type' => 'prostate_form'])->orderBy('id', 'desc')->get();
        // $leftLobeScore = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at','doctor_id')->where(['title_name' => 'leftLobeScore', 'patient_id' => $id, 'form_type' => 'prostate_form'])->orderBy('id', 'desc')->get();
        $Retrosternalextension = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'Retrosternalextension', 'patient_id' => $id])->orderBy('id', 'desc')->get();
        $EnlargedLymphnodes = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'EnlargedLymphnodes', 'patient_id' => $id])->orderBy('id', 'desc')->get();
        $paralysis = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'paralysis', 'patient_id' => $id])->orderBy('id', 'desc')->get();
        $MRCIR48 = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'MRCIR48', 'patient_id' => $id, 'form_type' => 'prostate_form'])->orderBy('id', 'desc')->first();
        $CTCIR48 = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'CTCIR48', 'patient_id' => $id])->orderBy('id', 'desc')->get();
        $NmThyroidScan = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'NmThyroidScan', 'patient_id' => $id])->orderBy('id', 'desc')->get();
        $HistopathRightThyroidFNA = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'HistopathRightThyroidFNA', 'patient_id' => $id])->orderBy('id', 'desc')->get();
        $data = [
            'patient' => $patient,
            'id' => Crypt::encrypt($id),
            'patient_past_history' => $Patient_past_medical_history,
            'patient_past_surgical' => $Patient_past_surgical_history,
            'patient_current_med' => $Patient_current_med,
            'patient_future_plan' => $Patient_future_plan,
            'procedures' => $Procedure,
            'prescriptions' => $Prescription,
            'insurer' => $Patient_insurer,
            'diagnosis_generals' => $diagnosis_general,
            'diagnosis_cids' => $diagnosis_cid,
            'symptoms_db' => $symptoms,
            'symptoms_scores_db' => $symptoms_scores,
            'Referrals' => $Referrals,
            'supportives' => $supportives,
            'SpecialInvestigations_db' => $SpecialInvestigations,
            'ElegibilitySTATUSDB' => $ElegibilitySTATUS,
            'Interventions' => $Interventions,
            'MDTs_db' => $MDTs,
            'Labs' => $Labs,
            'AntithyroidAntibodiesTests' => $AntithyroidAntibodiesTests,
            'ClinicalIndicator_db' => $ClinicalIndicator,
            'ClinicalExam_db' => $ClinicalExam,

            'Retrosternalextension' => $Retrosternalextension,
            'EnlargedLymphnodes' => $EnlargedLymphnodes,
            'paralysis' => $paralysis,
            'MRCIR48' => $MRCIR48,
            'NmThyroidScan' => $NmThyroidScan,
            'HistopathRightThyroidFNA' => $HistopathRightThyroidFNA,
            'Patient_order_imaginary_exams'=>$Patient_order_imaginary_exams,
            'Patient_order_labs'=>$Patient_order_labs,
            'Imaging'=>$Imaging

        ];
        return view('back/view-prostate-report')->with($data);
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

    public function editThyroidEligibilityForms(Request $request)
    {
        $id = decrypt($request->patient_id);
        // $id = decrypt();
        $ThyroidDiagnosis = ThyroidDiagnosis::query();

        $diagnosis_general = $ThyroidDiagnosis->select('data_value')->where(['title_name' => 'diagnosis_general', 'patient_id' => $id, 'form_type' => 'thyroid_form'])->get();
        $diagnosis_cid = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'diagnosis_cid', 'patient_id' => $id, 'form_type' => 'thyroid_form'])->get();


        $symptoms = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'symptoms', 'patient_id' => $id, 'form_type' => 'thyroid_form'])->get();

        $symptoms_scores = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'symptoms_score', 'patient_id' => $id, 'form_type' => 'thyroid_form'])->first();
        $Referrals = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'Referral', 'patient_id' => $id, 'form_type' => 'thyroid_form'])->first();
        $supportives = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'supportive', 'patient_id' => $id, 'form_type' => 'thyroid_form'])->first();
        $SpecialInvestigations = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'SpecialInvestigation', 'patient_id' => $id, 'form_type' => 'thyroid_form'])->first();
        $ElegibilitySTATUS = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'ElegibilitySTATUS', 'patient_id' => $id, 'form_type' => 'thyroid_form'])->first();
        $Interventions = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'Intervention', 'patient_id' => $id, 'form_type' => 'thyroid_form'])->first();
        $MDTs = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'MDT', 'patient_id' => $id, 'form_type' => 'thyroid_form'])->first();
        $Labs = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'Lab', 'patient_id' => $id, 'form_type' => 'thyroid_form'])->first();
        $AntithyroidAntibodiesTests = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'AntithyroidAntibodiesTests', 'patient_id' => $id, 'form_type' => 'thyroid_form'])->first();
        $ClinicalIndicator = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'ClinicalIndicator', 'patient_id' => $id, 'form_type' => 'thyroid_form'])->first();
        $ClinicalExam = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'ClinicalExam', 'patient_id' => $id, 'form_type' => 'thyroid_form'])->first();
        $rightLobeScore = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'rightLobeScore', 'patient_id' => $id, 'form_type' => 'thyroid_form'])->first();
        $leftLobeScore = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'leftLobeScore', 'patient_id' => $id, 'form_type' => 'thyroid_form'])->first();
        $Retrosternalextension = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'Retrosternalextension', 'patient_id' => $id, 'form_type' => 'thyroid_form'])->first();
        $EnlargedLymphnodes = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'EnlargedLymphnodes', 'patient_id' => $id, 'form_type' => 'thyroid_form'])->first();
        $paralysis = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'paralysis', 'patient_id' => $id, 'form_type' => 'thyroid_form'])->first();
        $MRCIR48 = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'MRCIR48', 'patient_id' => $id, 'form_type' => 'thyroid_form'])->first();
        $CTCIR48 = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'CTCIR48', 'patient_id' => $id, 'form_type' => 'thyroid_form'])->first();
        $NmThyroidScan = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'NmThyroidScan', 'patient_id' => $id, 'form_type' => 'thyroid_form'])->first();
        $NmParaThyroidScan = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'NmParaThyroidScan', 'patient_id' => $id, 'form_type' => 'thyroid_form'])->first();
        $HistopathRightThyroidFNA = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'HistopathRightThyroidFNA', 'patient_id' => $id, 'form_type' => 'thyroid_form'])->first();
        $HistopathLeftThyroidFNA = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'HistopathLeftThyroidFNA', 'patient_id' => $id, 'form_type' => 'thyroid_form'])->first();
        $data = [
            'patient_id' => Crypt::encrypt($id),
            'diagnosis_generals_db' => $diagnosis_general,
            'diagnosis_cids_db' => $diagnosis_cid,
            'symptoms' => $symptoms,
            'symptoms_scores' => $symptoms_scores,
            'Referrals' => $Referrals,
            'supportives' => $supportives,
            'SpecialInvestigations' => $SpecialInvestigations,
            'ElegibilitySTATUS' => $ElegibilitySTATUS,
            'Interventions' => $Interventions,
            'MDTs' => $MDTs,
            'Labs' => $Labs,
            'AntithyroidAntibodiesTests' => $AntithyroidAntibodiesTests,
            'clinical_indicators' => $ClinicalIndicator,
            'ClinicalExam' => $ClinicalExam,
            'rightLobeScore' => $rightLobeScore,
            'leftLobeScore' => $leftLobeScore,
            'Retrosternalextension' => $Retrosternalextension,
            'EnlargedLymphnodes' => $EnlargedLymphnodes,
            'paralysis' => $paralysis,
            'MRCIR48' => $MRCIR48,
            'CTCIR48' => $CTCIR48,
            'NmThyroidScan' => $NmThyroidScan,
            'NmParaThyroidScan' => $NmParaThyroidScan,
            'HistopathRightThyroidFNA' => $HistopathRightThyroidFNA,
            'HistopathLeftThyroidFNA' => $HistopathLeftThyroidFNA,

        ];
        return view('back/Edit_thyroid', $data);
    }

    public function UpdateThyroidEligibilityForms(Request $request)
    {
        ThyroidDiagnosis::where('form_type', 'thyroid_form')->delete();

        $this->storeThyroidEligibilityForms($request);
        return  redirect()->route('user.ViewThyroidAblationForm', ['id' => $request->patient_id]);
    }

    public function storeThyroidEligibilityForms(Request $request)
    {


        $doctor_id = auth()->guard('doctor')->id();

        $id = decrypt($request->patient_id);
        $dataToInsert = [];


        if (isset($request->diagnosis_general) && is_array($request->diagnosis_general) && !empty($request->diagnosis_general)) {
            $filteredDiagnosisGeneral = array_map(function ($subarray) {
                return array_filter($subarray, function ($value) {
                    return $value !== null && $value !== '';
                });
            }, $request->diagnosis_general);

            // Check if there's any non-empty array in $filteredDiagnosisGeneral
            $nonEmptyArraysExist = false;
            foreach ($filteredDiagnosisGeneral as $subarray) {
                if (!empty($subarray)) {
                    $nonEmptyArraysExist = true;
                    break;
                }
            }

            if ($nonEmptyArraysExist) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'diagnosis_general',
                    'data_value' =>  json_encode($filteredDiagnosisGeneral),
                    'doctor_id' => $doctor_id,
                    'form_type' => 'thyroid_form'
                ];
            }
        }
        if (isset($request->diagnosis_cid) && is_array($request->diagnosis_cid) && !empty($request->diagnosis_cid)) {
            $filteredDiagnosisGeneral = array_map(function ($subarray) {
                return array_filter($subarray, function ($value) {
                    return $value !== null && $value !== '';
                });
            }, $request->diagnosis_cid);

            // Check if there's any non-empty array in $filteredDiagnosisGeneral
            $nonEmptyArraysExist = false;
            foreach ($filteredDiagnosisGeneral as $subarray) {
                if (!empty($subarray)) {
                    $nonEmptyArraysExist = true;
                    break;
                }
            }

            if ($nonEmptyArraysExist) {
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'diagnosis_cid',
                    'data_value' =>  json_encode($filteredDiagnosisGeneral),
                    'doctor_id' => $doctor_id,
                    'form_type' => 'thyroid_form'
                ];
            }
        }
        $data=$request->symptoms;
        $newArray = [];

        foreach ($data as $item) {
            $newArray[] = [
                'SymptomType' => $item[0] ?? '',
                'SymptomDurationValue' => $item[1] ?? '',
                'SymptomDurationType' => $item[2] ?? '',
                'SymptomDurationNote' => $item[3] ?? ''
            ];
        }


        if (isset($newArray) && is_array($newArray) && !empty($newArray)) {
            $filteredDiagnosisGeneral = array_map(function ($subarray) {
                return array_filter($subarray, function ($value) {
                    return $value !== null && $value !== '';
                });
            }, $newArray);

            // Check if there's any non-empty array in $filteredDiagnosisGeneral
            $nonEmptyArraysExist = false;
            foreach ($filteredDiagnosisGeneral as $subarray) {
                if (!empty($subarray)) {
                    $nonEmptyArraysExist = true;
                    break;
                }
            }

            if ($nonEmptyArraysExist) {
                $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);

                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'symptoms',
                    'data_value' =>  json_encode($filteredDiagnosisGeneral),
                    'doctor_id' => $doctor_id,
                    'form_type' => 'thyroid_form'
                ];
            }
        }

        if (isset($request->symptoms_score) && is_array($request->symptoms_score) && !empty($request->symptoms_score)) {
            $filteredDiagnosisGeneral = array_map(function ($subarray) {
                return array_filter($subarray, function ($value) {
                    return $value !== null && $value !== '';
                });
            }, $request->symptoms_score);

            // Check if there's any non-empty array in $filteredDiagnosisGeneral
            $nonEmptyArraysExist = false;
            foreach ($filteredDiagnosisGeneral as $subarray) {
                if (!empty($subarray)) {
                    $nonEmptyArraysExist = true;
                    break;
                }
            }

            if ($nonEmptyArraysExist) {
                $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'symptoms_score',
                    'data_value' =>  json_encode($filteredDiagnosisGeneral),
                    'doctor_id' => $doctor_id,
                    'form_type' => 'thyroid_form'
                ];
            }
        }
        if (isset($request->Referral) && is_array($request->Referral) && !empty($request->Referral)) {
            $filteredDiagnosisGeneral = array_map(function ($subarray) {
                return array_filter($subarray, function ($value) {
                    return $value !== null && $value !== '';
                });
            }, $request->Referral);

            // Check if there's any non-empty array in $filteredDiagnosisGeneral
            $nonEmptyArraysExist = false;
            foreach ($filteredDiagnosisGeneral as $subarray) {
                if (!empty($subarray)) {
                    $nonEmptyArraysExist = true;
                    break;
                }
            }

            if ($nonEmptyArraysExist) {
                $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'Referral',
                    'data_value' =>  json_encode($filteredDiagnosisGeneral),
                    'doctor_id' => $doctor_id,
                    'form_type' => 'thyroid_form'
                ];
            }
        }
        if (isset($request->Supportive) && is_array($request->Supportive) && !empty($request->Supportive)) {
            $filteredDiagnosisGeneral = array_map(function ($subarray) {
                return array_filter($subarray, function ($value) {
                    return $value !== null && $value !== '';
                });
            }, $request->Supportive);

            // Check if there's any non-empty array in $filteredDiagnosisGeneral
            $nonEmptyArraysExist = false;
            foreach ($filteredDiagnosisGeneral as $subarray) {
                if (!empty($subarray)) {
                    $nonEmptyArraysExist = true;
                    break;
                }
            }

            if ($nonEmptyArraysExist) {
                $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'Supportive',
                    'data_value' =>  json_encode($filteredDiagnosisGeneral),
                    'doctor_id' => $doctor_id,
                    'form_type' => 'thyroid_form'
                ];
            }
        }
        if (isset($request->SpecialInvestigation) && is_array($request->SpecialInvestigation) && !empty($request->SpecialInvestigation)) {
            $filteredDiagnosisGeneral = array_map(function ($subarray) {
                return array_filter($subarray, function ($value) {
                    return $value !== null && $value !== '';
                });
            }, $request->SpecialInvestigation);

            // Check if there's any non-empty array in $filteredDiagnosisGeneral
            $nonEmptyArraysExist = false;
            foreach ($filteredDiagnosisGeneral as $subarray) {
                if (!empty($subarray)) {
                    $nonEmptyArraysExist = true;
                    break;
                }
            }

            if ($nonEmptyArraysExist) {
                $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'SpecialInvestigation',
                    'data_value' =>  json_encode($filteredDiagnosisGeneral),
                    'doctor_id' => $doctor_id,
                    'form_type' => 'thyroid_form'
                ];
            }
        }
        if (isset($request->ElegibilitySTATUS) && is_array($request->ElegibilitySTATUS) && !empty($request->ElegibilitySTATUS)) {
            $filteredDiagnosisGeneral = array_map(function ($subarray) {
                return array_filter($subarray, function ($value) {
                    return $value !== null && $value !== '';
                });
            }, $request->ElegibilitySTATUS);

            // Check if there's any non-empty array in $filteredDiagnosisGeneral
            $nonEmptyArraysExist = false;
            foreach ($filteredDiagnosisGeneral as $subarray) {
                if (!empty($subarray)) {
                    $nonEmptyArraysExist = true;
                    break;
                }
            }

            if ($nonEmptyArraysExist) {
                $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'ElegibilitySTATUS',
                    'data_value' =>  json_encode($filteredDiagnosisGeneral),
                    'doctor_id' => $doctor_id,
                    'form_type' => 'thyroid_form'
                ];
            }
        }

        if (isset($request->Intervention) && is_array($request->Intervention) && !empty($request->Intervention)) {
            $filteredDiagnosisGeneral = array_map(function ($subarray) {
                return array_filter($subarray, function ($value) {
                    return $value !== null && $value !== '';
                });
            }, $request->Intervention);

            // Check if there's any non-empty array in $filteredDiagnosisGeneral
            $nonEmptyArraysExist = false;
            foreach ($filteredDiagnosisGeneral as $subarray) {
                if (!empty($subarray)) {
                    $nonEmptyArraysExist = true;
                    break;
                }
            }

            if ($nonEmptyArraysExist) {
                $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'Intervention',
                    'data_value' =>  json_encode($filteredDiagnosisGeneral),
                    'doctor_id' => $doctor_id,
                    'form_type' => 'thyroid_form'
                ];
            }
        }
        if (isset($request->MDT) && is_array($request->MDT) && !empty($request->MDT)) {
            $filteredDiagnosisGeneral = array_map(function ($subarray) {
                return array_filter($subarray, function ($value) {
                    return $value !== null && $value !== '';
                });
            }, $request->MDT);

            // Check if there's any non-empty array in $filteredDiagnosisGeneral
            $nonEmptyArraysExist = false;
            foreach ($filteredDiagnosisGeneral as $subarray) {
                if (!empty($subarray)) {
                    $nonEmptyArraysExist = true;
                    break;
                }
            }

            if ($nonEmptyArraysExist) {
                $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'MDT',
                    'data_value' =>  json_encode($filteredDiagnosisGeneral),
                    'doctor_id' => $doctor_id,
                    'form_type' => 'thyroid_form'
                ];
            }
        }
        if (isset($request->Lab) && is_array($request->Lab) && !empty($request->Lab)) {
            $filteredDiagnosisGeneral = array_map(function ($subarray) {
                return array_filter($subarray, function ($value) {
                    return $value !== null && $value !== '';
                });
            }, $request->Lab);

            // Check if there's any non-empty array in $filteredDiagnosisGeneral
            $nonEmptyArraysExist = false;
            foreach ($filteredDiagnosisGeneral as $subarray) {
                if (!empty($subarray)) {
                    $nonEmptyArraysExist = true;
                    break;
                }
            }

            if ($nonEmptyArraysExist) {
                $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'Lab',
                    'data_value' =>  json_encode($filteredDiagnosisGeneral),
                    'doctor_id' => $doctor_id,
                    'form_type' => 'thyroid_form'
                ];
            }
        }

        if (isset($request->AntithyroidAntibodiesTests) && is_array($request->AntithyroidAntibodiesTests) && !empty($request->AntithyroidAntibodiesTests)) {
            $filteredDiagnosisGeneral = array_map(function ($subarray) {
                return array_filter($subarray, function ($value) {
                    return $value !== null && $value !== '';
                });
            }, $request->AntithyroidAntibodiesTests);

            // Check if there's any non-empty array in $filteredDiagnosisGeneral
            $nonEmptyArraysExist = false;
            foreach ($filteredDiagnosisGeneral as $subarray) {
                if (!empty($subarray)) {
                    $nonEmptyArraysExist = true;
                    break;
                }
            }

            if ($nonEmptyArraysExist) {
                $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'AntithyroidAntibodiesTests',
                    'data_value' =>  json_encode($filteredDiagnosisGeneral),
                    'doctor_id' => $doctor_id,
                    'form_type' => 'thyroid_form'
                ];
            }
        }

        if (isset($request->imaging) && is_array($request->imaging) && !empty($request->imaging)) {
            $filteredDiagnosisGeneral = array_map(function ($subarray) {
                return array_filter($subarray, function ($value) {
                    return $value !== null && $value !== '';
                });
            }, $request->imaging);

            // Check if there's any non-empty array in $filteredDiagnosisGeneral
            $nonEmptyArraysExist = false;
            foreach ($filteredDiagnosisGeneral as $subarray) {
                if (!empty($subarray)) {
                    $nonEmptyArraysExist = true;
                    break;
                }
            }

            if ($nonEmptyArraysExist) {
                $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'Imaging',
                    'data_value' =>  json_encode($filteredDiagnosisGeneral),
                    'doctor_id' => $doctor_id,
                    'form_type' => 'thyroid_form'
                ];
            }
        }
        if (isset($request->clinical_indicator) && is_array($request->clinical_indicator) && !empty($request->clinical_indicator)) {
            $filteredDiagnosisGeneral = array_map(function ($subarray) {
                return array_filter($subarray, function ($value) {
                    return $value !== null && $value !== '';
                });
            }, $request->clinical_indicator);

            // Check if there's any non-empty array in $filteredDiagnosisGeneral
            $nonEmptyArraysExist = false;
            foreach ($filteredDiagnosisGeneral as $subarray) {
                if (!empty($subarray)) {
                    $nonEmptyArraysExist = true;
                    break;
                }
            }

            if ($nonEmptyArraysExist) {
                $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'ClinicalIndicator',
                    'data_value' =>  json_encode($filteredDiagnosisGeneral),
                    'doctor_id' => $doctor_id,
                    'form_type' => 'thyroid_form'
                ];
            }
        }
        if (isset($request->clinical_exam) && is_array($request->clinical_exam) && !empty($request->clinical_exam)) {
            $filteredDiagnosisGeneral = array_map(function ($subarray) {
                return array_filter($subarray, function ($value) {
                    return $value !== null && $value !== '';
                });
            }, $request->clinical_exam);

            // Check if there's any non-empty array in $filteredDiagnosisGeneral
            $nonEmptyArraysExist = false;
            foreach ($filteredDiagnosisGeneral as $subarray) {
                if (!empty($subarray)) {
                    $nonEmptyArraysExist = true;
                    break;
                }
            }

            if ($nonEmptyArraysExist) {
                $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'ClinicalExam',
                    'data_value' =>  json_encode($filteredDiagnosisGeneral),
                    'doctor_id' => $doctor_id,
                    'form_type' => 'thyroid_form'
                ];
            }
        }

        if (isset($request->right_lobe_score) && is_array($request->right_lobe_score) && !empty($request->right_lobe_score)) {
            $filteredDiagnosisGeneral = array_map(function ($subarray) {
                return array_filter($subarray, function ($value) {
                    return $value !== null && $value !== '';
                });
            }, $request->right_lobe_score);

            // Check if there's any non-empty array in $filteredDiagnosisGeneral
            $nonEmptyArraysExist = false;
            foreach ($filteredDiagnosisGeneral as $subarray) {
                if (!empty($subarray)) {
                    $nonEmptyArraysExist = true;
                    break;
                }
            }

            if ($nonEmptyArraysExist) {
                $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'rightLobeScore',
                    'data_value' =>  json_encode($filteredDiagnosisGeneral),
                    'doctor_id' => $doctor_id,
                    'form_type' => 'thyroid_form'
                ];
            }
        }

        if (isset($request->left_lobe_score) && is_array($request->left_lobe_score) && !empty($request->left_lobe_score)) {
            $filteredDiagnosisGeneral = array_map(function ($subarray) {
                return array_filter($subarray, function ($value) {
                    return $value !== null && $value !== '';
                });
            }, $request->left_lobe_score);

            // Check if there's any non-empty array in $filteredDiagnosisGeneral
            $nonEmptyArraysExist = false;
            foreach ($filteredDiagnosisGeneral as $subarray) {
                if (!empty($subarray)) {
                    $nonEmptyArraysExist = true;
                    break;
                }
            }

            if ($nonEmptyArraysExist) {
                $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'leftLobeScore',
                    'data_value' =>  json_encode($filteredDiagnosisGeneral),
                    'doctor_id' => $doctor_id,
                    'form_type' => 'thyroid_form'
                ];
            }
        }

        if (isset($request->Retrosternalextension) && is_array($request->Retrosternalextension) && !empty($request->Retrosternalextension)) {
            $filteredDiagnosisGeneral = array_map(function ($subarray) {
                return array_filter($subarray, function ($value) {
                    return $value !== null && $value !== '';
                });
            }, $request->Retrosternalextension);

            // Check if there's any non-empty array in $filteredDiagnosisGeneral
            $nonEmptyArraysExist = false;
            foreach ($filteredDiagnosisGeneral as $subarray) {
                if (!empty($subarray)) {
                    $nonEmptyArraysExist = true;
                    break;
                }
            }

            if ($nonEmptyArraysExist) {
                $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'Retrosternalextension',
                    'data_value' =>  json_encode($filteredDiagnosisGeneral),
                    'doctor_id' => $doctor_id,
                    'form_type' => 'thyroid_form'
                ];
            }
        }
        if (isset($request->EnlargedLymphnodes) && is_array($request->EnlargedLymphnodes) && !empty($request->EnlargedLymphnodes)) {
            $filteredDiagnosisGeneral = array_map(function ($subarray) {
                return array_filter($subarray, function ($value) {
                    return $value !== null && $value !== '';
                });
            }, $request->EnlargedLymphnodes);

            // Check if there's any non-empty array in $filteredDiagnosisGeneral
            $nonEmptyArraysExist = false;
            foreach ($filteredDiagnosisGeneral as $subarray) {
                if (!empty($subarray)) {
                    $nonEmptyArraysExist = true;
                    break;
                }
            }

            if ($nonEmptyArraysExist) {
                $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'EnlargedLymphnodes',
                    'data_value' =>  json_encode($filteredDiagnosisGeneral),
                    'doctor_id' => $doctor_id,
                    'form_type' => 'thyroid_form'
                ];
            }
        }

        if (isset($request->paralysis) && is_array($request->paralysis) && !empty($request->paralysis)) {
            $filteredDiagnosisGeneral = array_map(function ($subarray) {
                return array_filter($subarray, function ($value) {
                    return $value !== null && $value !== '';
                });
            }, $request->paralysis);

            // Check if there's any non-empty array in $filteredDiagnosisGeneral
            $nonEmptyArraysExist = false;
            foreach ($filteredDiagnosisGeneral as $subarray) {
                if (!empty($subarray)) {
                    $nonEmptyArraysExist = true;
                    break;
                }
            }

            if ($nonEmptyArraysExist) {
                $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'paralysis',
                    'data_value' =>  json_encode($filteredDiagnosisGeneral),
                    'doctor_id' => $doctor_id,
                    'form_type' => 'thyroid_form'
                ];
            }
        }

        if (isset($request->MRCIR48) && is_array($request->MRCIR48) && !empty($request->MRCIR48)) {
            $filteredDiagnosisGeneral = array_map(function ($subarray) {
                return array_filter($subarray, function ($value) {
                    return $value !== null && $value !== '';
                });
            }, $request->MRCIR48);

            // Check if there's any non-empty array in $filteredDiagnosisGeneral
            $nonEmptyArraysExist = false;
            foreach ($filteredDiagnosisGeneral as $subarray) {
                if (!empty($subarray)) {
                    $nonEmptyArraysExist = true;
                    break;
                }
            }

            if ($nonEmptyArraysExist) {
                $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'MRCIR48',
                    'data_value' =>  json_encode($filteredDiagnosisGeneral),
                    'doctor_id' => $doctor_id,
                    'form_type' => 'thyroid_form'
                ];
            }
        }



        if (isset($request->CTCIR48) && is_array($request->CTCIR48) && !empty($request->CTCIR48)) {
            $filteredDiagnosisGeneral = array_map(function ($subarray) {
                return array_filter($subarray, function ($value) {
                    return $value !== null && $value !== '';
                });
            }, $request->CTCIR48);

            // Check if there's any non-empty array in $filteredDiagnosisGeneral
            $nonEmptyArraysExist = false;
            foreach ($filteredDiagnosisGeneral as $subarray) {
                if (!empty($subarray)) {
                    $nonEmptyArraysExist = true;
                    break;
                }
            }

            if ($nonEmptyArraysExist) {
                $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'CTCIR48',
                    'data_value' =>  json_encode($filteredDiagnosisGeneral),
                    'doctor_id' => $doctor_id,
                    'form_type' => 'thyroid_form'
                ];
            }
        }

        if (isset($request->NmParaThyroidScan) && is_array($request->NmParaThyroidScan) && !empty($request->NmParaThyroidScan)) {
            $filteredDiagnosisGeneral = array_map(function ($subarray) {
                return array_filter($subarray, function ($value) {
                    return $value !== null && $value !== '';
                });
            }, $request->NmParaThyroidScan);

            // Check if there's any non-empty array in $filteredDiagnosisGeneral
            $nonEmptyArraysExist = false;
            foreach ($filteredDiagnosisGeneral as $subarray) {
                if (!empty($subarray)) {
                    $nonEmptyArraysExist = true;
                    break;
                }
            }

            if ($nonEmptyArraysExist) {
                $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'NmParaThyroidScan',
                    'data_value' =>  json_encode($filteredDiagnosisGeneral),
                    'doctor_id' => $doctor_id,
                    'form_type' => 'thyroid_form'
                ];
            }
        }



        if (isset($request->HistopathRightThyroidFNA) && is_array($request->HistopathRightThyroidFNA) && !empty($request->HistopathRightThyroidFNA)) {
            $filteredDiagnosisGeneral = array_map(function ($subarray) {
                return array_filter($subarray, function ($value) {
                    return $value !== null && $value !== '';
                });
            }, $request->HistopathRightThyroidFNA);

            // Check if there's any non-empty array in $filteredDiagnosisGeneral
            $nonEmptyArraysExist = false;
            foreach ($filteredDiagnosisGeneral as $subarray) {
                if (!empty($subarray)) {
                    $nonEmptyArraysExist = true;
                    break;
                }
            }

            if ($nonEmptyArraysExist) {
                $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'HistopathRightThyroidFNA',
                    'data_value' =>  json_encode($filteredDiagnosisGeneral),
                    'doctor_id' => $doctor_id,
                    'form_type' => 'thyroid_form'
                ];
            }
        }


        if (isset($request->HistopathLeftThyroidFNA) && is_array($request->HistopathLeftThyroidFNA) && !empty($request->HistopathLeftThyroidFNA)) {
            $filteredDiagnosisGeneral = array_map(function ($subarray) {
                return array_filter($subarray, function ($value) {
                    return $value !== null && $value !== '';
                });
            }, $request->HistopathLeftThyroidFNA);

            // Check if there's any non-empty array in $filteredDiagnosisGeneral
            $nonEmptyArraysExist = false;
            foreach ($filteredDiagnosisGeneral as $subarray) {
                if (!empty($subarray)) {
                    $nonEmptyArraysExist = true;
                    break;
                }
            }

            if ($nonEmptyArraysExist) {
                $filteredDiagnosisGeneral = array_filter($filteredDiagnosisGeneral);
                $dataToInsert[] = [
                    'patient_id' => $id,
                    'title_name' => 'HistopathLeftThyroidFNA',
                    'data_value' =>  json_encode($filteredDiagnosisGeneral),
                    'doctor_id' => $doctor_id,
                    'form_type' => 'thyroid_form'
                ];
            }
        }

        if(!empty($dataToInsert)){
            ThyroidDiagnosis::insert($dataToInsert);

        }


        return  redirect()->route('user.ViewThyroidAblationForm', ['id' => $request->patient_id]);
    }


   
  


    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('front.home.page');
    }
}
