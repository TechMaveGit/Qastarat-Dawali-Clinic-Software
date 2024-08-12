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
use App\Models\AttachDocument;

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
use App\Models\Task;
use App\Models\patient\SupportiveTreatment;
use App\Models\patient\Patient_progress_note;
use App\Models\patient\Diagnosis;
use App\Models\patient\ThyroidDiagnosis;
use App\Models\patient\GeneralDiagnosis;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class PatientController extends Controller
{
    public function dashboard()
    {
        $id = auth('web')->user();
        $patient = User::with(['userBranch.userBranchName'])->where('id', $id->id)->first();
        $doctors = DB::table('doctors')->where('id', $id->doctor_id)->first();
        $Patient_insurer = Patient_insurer::where(['patient_id' => $id->id, 'status' => 'active'])->orderBy('id', 'desc')->first();

        $Patient_appointments = DB::table('book_appointments')->where('patient_id', $id->id)->orderBy('id', 'desc')->get();
        $doctorId = DB::table('referal_patients')->where('patient_id', $id->id)->pluck('doctor_id')->toArray();
        $doctorDetail = DB::table('doctors')->whereIn('id', $doctorId)->get();

        return view('front/patient-dashboard', compact('id', 'patient', 'Patient_insurer', 'Patient_appointments', 'doctors', 'doctorDetail'));
    }

    public function allSnippets()
    {
        $data['snippets'] = DB::table('patient_progress_note_details')->get();
        return view('superAdmin/snippets/index', $data);
    }


    public function addSnippets()
    {
        // $data['snippets'] = DB::table('snippets')->get();
        return view('superAdmin/snippets/create');
    }

    public function editSnippets(Request $request, $id)
    {
        $data['snippets'] = DB::table('patient_progress_note_details')->where('id', $id)->first();
        $template = $request->input('Titledescription');
        if ($template) {
            DB::table('patient_progress_note_details')->where('id', $id)->update(['describe' => $template]);
            return redirect()->route('snippets')->with('message', 'Snippet Updated Successfully');
        }
        return view('superAdmin/snippets/edit', $data);
    }



    public function index()
    {
        return view('back/patient');
    }

    public function service()
    {
        return view('front/services');
    }

    public function profile()
    {
        $doctor = User::select('id', 'email', 'password', 'patient_profile_img', 'name', 'title')->find(auth('web')->user()->id);
        return view('front/profile', compact('doctor'));
    }

    public function updateProfile(Request $request)

    {

        $doctor_id = auth('web')->user()->id;

        $request->validate([
            'email' => [
                'required',
                Rule::unique('users', 'email')->ignore($doctor_id)
            ],
            'title' => 'required',
            'name' => 'required',
        ]);
        $doctor = User::find($doctor_id);
        $temp_data = [];
        $data = $request->only('id', 'email', 'password', 'patient_profile_img', 'name', 'title');

        if (isset($data['password'])) {
            $temp_data['password'] = Hash::make($data['password']);
        }
        if (isset($data['patient_profile_img'])) {

            if (isset($doctor->patient_profile_img)) {
                $filePath = public_path('assets/patient_profile/' . $doctor->patient_profile_img);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }
            $image = $data['patient_profile_img'];
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/patient_profile'), $new_name);
            $temp_data['patient_profile_img'] = $new_name;
        }
        $temp_data['email'] = $data['email'];
        $temp_data['name'] = $data['name'];
        $temp_data['title'] = $data['title'];

        $result = $doctor->update($temp_data);
        if ($result) {
            return redirect()->back()->with('status', 'User Profile Updated Successfully!');
        } else {
            return redirect()->back()->with('status', 'Failed to update user Profile!');
        }
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

        $Patient_appointments = DB::table('book_appointments')->where('patient_id', $id)->orderBy('id', 'desc')->get();

        $id = Crypt::encrypt($id);

        return view('back/patient-detail', compact('id', 'patient', 'Patient_insurer', 'Patient_appointments'));
    }

    public function submitInvoice(Request $request)
    {

        //  return $request->all();

        $amountPaid  = $request->input('amountPaid');
        $invoiceName = $request->input('invoiceId');
        $datePaid    = $request->input('datePaid');
        $paymentMethod = $request->input('paymentMethod');

        DB::table('tasks')->where('id', $invoiceName)->update(['paidStatus' => '1', 'paymentNote' => $request->input('paymentNote'), 'payAmount' => 'full payment', 'datePaid' => $datePaid, 'paymentMethod' => $paymentMethod]);

        return redirect()->back();
    }


    public function patient_medical_detail(Request $request, $id)
    {

        // dd($request->all());
        $id = Crypt::decrypt($id);

        $request->session()->put('id', $id);

        $patient = User::findOrFail($id);

        $Patient_order_labs = Task::where(['patient_id' => $id, 'form_type' => $request->form_print_type??'general_form'])->get();

        $VaricoceleEmboForm = DB::table('patient_thyroid_diagnosis')->select('id', 'AnnotateimageData')->where(['patient_id' => $id, 'form_type' => 'VaricoceleEmboForm'])->latest('id')->first();
        $Patient_insurer = Patient_insurer::where(['patient_id' => $id, 'status' => 'active'])->select('insurer_name', 'insurance_number')->orderBy('id', 'desc')->first();


        $Patient_past_medical_history = Patient_past_medical_history::select('id', 'diseases_name', 'describe', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();


        $Patient_past_surgical_history = Patient_past_surgical_history::select('id', 'diseases_name', 'describe', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_current_med = Patient_current_med::select('id', 'drug_name', 'frequency', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_future_plan = Patient_future_plan::with('doctor')->select('id', 'doctor_id', 'date', 'plan_text', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Procedure = Procedure::with('doctor')->select('id', 'doctor_id', 'procedure_name', 'summary', 'created_at', 'entry')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $SupportiveTreatment = SupportiveTreatment::with('doctor')->select('id', 'doctor_id', 'title', 'sub_title', 'created_at', 'treatment')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_progress_note = Patient_progress_note::with(['doctor', 'progressNote'])->select('id', 'doctor_id', 'progress_note_canned_text_id', 'voice_recognition', 'created_at', 'summery')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Prescription = Prescription::select('id', 'prescription', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();

        $ThyroidDiagnosis = ThyroidDiagnosis::query();



        //     if($request->input('form_print_type')=='general_form')
        //     {
        //         $diagnosis_general = GeneralDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'diagnosis_general', 'patient_id' => $id])->where('form_type','general_form')->get();
        //         $diagnosis_general->checkValData='';
        //     }
        //     else
        //     {
        //         $diagnosis_general = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'diagnosis_general', 'patient_id' => $id, 'form_type' => $request->input('form_print_type')])->orderBy('id', 'desc')->get();
        //         $diagnosis_general->checkValData="netGeneral";
        //     }


        //     if($request->input('form_print_type')=='general_form')
        //     {
        //         $diagnosis_cid = GeneralDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'diagnosis_cid', 'patient_id' => $id, 'form_type' => 'general_form'])->get();
        //         $diagnosis_cid->checkValData='';
        //     }
        //     else
        //     {   

        //          $diagnosis_cid = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'diagnosis_cid', 'patient_id' => $id, 'form_type' => $request->input('form_print_type')])->orderBy('id', 'desc')->get();

        //         $diagnosis_cid->checkValData="netGeneral";
        //     }

        //  //   return $request->all();



        //     if($request->input('form_print_type')=='general_form')
        //     {
        //         $ClinicalExam = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'ClinicalExam', 'patient_id' => $id, 'form_type' =>'general_form'])->orderBy('id', 'desc')->get();
        //         $ClinicalExam->checkValData='';

        //         $RegionalpatientGeneralDiagnosis = GeneralDiagnosis::with('doctor')->whereNotNull('RegionalExam')->where(['title_name'=>'ClinicalExam', 'patient_id' => $id, 'form_type' =>'general_form'])->orderBy('id', 'ASC')->get();
        //         $SystemicpatientGeneralDiagnosis = GeneralDiagnosis::with('doctor')->whereNotNull('SystemicExam')->where(['title_name'=>'ClinicalExam',  'patient_id' => $id, 'form_type' =>'general_form'])->orderBy('id', 'desc')->get();



        //     }
        //     else
        //     {     
        //         $ClinicalExam = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'ClinicalExam', 'patient_id' => $id, 'form_type' =>$request->input('form_print_type')])->orderBy('id', 'desc')->get();

        //         $ClinicalExam->checkValData="netGeneral";

        //         $RegionalpatientGeneralDiagnosis = GeneralDiagnosis::with('doctor')->whereNotNull('RegionalExam')->where(['title_name'=>'ClinicalExam', 'patient_id' => $id, 'form_type' => $request->input('form_print_type')])->orderBy('id', 'ASC')->get();
        //         $SystemicpatientGeneralDiagnosis = GeneralDiagnosis::with('doctor')->whereNotNull('SystemicExam')->where(['title_name'=>'ClinicalExam',  'patient_id' => $id, 'form_type' => $request->input('form_print_type')])->orderBy('id', 'desc')->get();

        //     }


        if ($request->input('form_print_type') == 'general_form') {
            $diagnosis_general = GeneralDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'diagnosis_general', 'patient_id' => $id])->where('form_type', 'general_form')->get();
            $diagnosis_general->checkValData = '';
        } else {
            $diagnosis_general = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'diagnosis_general', 'patient_id' => $id, 'form_type' => $request->input('form_print_type')])->orderBy('id', 'desc')->get();
            $diagnosis_general->checkValData = "netGeneral";
        }


        // dd($request->input('form_print_type'));
        // VaricoceleEmboForm

        if ($request->input('form_print_type') == 'general_form') {
            $diagnosis_cid = GeneralDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'diagnosis_cid', 'patient_id' => $id, 'form_type' => 'general_form'])->get();
            $diagnosis_cid->checkValData = '';
        } else {
            $diagnosis_cid = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'diagnosis_cid', 'patient_id' => $id, 'form_type' => $request->input('form_print_type')])->orderBy('id', 'desc')->get();
            $diagnosis_cid->checkValData = "netGeneral";
        }

        if ($request->input('form_print_type') == 'general_form') {
            $ClinicalExam = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'ClinicalExam', 'patient_id' => $id, 'form_type' => 'general_form'])->orderBy('id', 'desc')->get();
            $ClinicalExam->checkValData = '';
            $RegionalpatientGeneralDiagnosis = GeneralDiagnosis::with('doctor')->whereNotNull('RegionalExam')->where(['title_name' => 'ClinicalExam', 'patient_id' => $id, 'form_type' => 'general_form'])->orderBy('id', 'ASC')->get();
            $SystemicpatientGeneralDiagnosis = GeneralDiagnosis::with('doctor')->whereNotNull('SystemicExam')->where(['title_name' => 'ClinicalExam',  'patient_id' => $id, 'form_type' => 'general_form'])->orderBy('id', 'desc')->get();
        } else {
            $ClinicalExam = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'ClinicalExam', 'patient_id' => $id, 'form_type' => $request->input('form_print_type')])->orderBy('id', 'desc')->get();

            $ClinicalExam->checkValData = "netGeneral";

            $RegionalpatientGeneralDiagnosis = GeneralDiagnosis::with('doctor')->whereNotNull('RegionalExam')->where(['title_name' => 'ClinicalExam', 'patient_id' => $id, 'form_type' => $request->input('form_print_type')])->orderBy('id', 'ASC')->get();
            $SystemicpatientGeneralDiagnosis = GeneralDiagnosis::with('doctor')->whereNotNull('SystemicExam')->where(['title_name' => 'ClinicalExam',  'patient_id' => $id, 'form_type' => $request->input('form_print_type')])->orderBy('id', 'desc')->get();
        }


        $symptoms = GeneralDiagnosis::with('doctor')->select('SymptomType', 'SymptomDurationValue', 'SymptomDurationType', 'SymptomDurationNote', 'created_at', 'doctor_id')->where(['title_name' => 'Symptom', 'patient_id' => $id, 'form_type' => $request->input('form_print_type') ??'general_form'])->get();
        $symptoms_scores = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'symptoms', 'patient_id' => $id, 'form_type' => $request->input('form_print_type') ?? 'general_form'])->get();
        $Referrals = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'Referral', 'patient_id' => $id])->orderBy('id', 'desc')->get();
        $supportives = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'supportive', 'patient_id' => $id, 'form_type' => $request->input('form_print_type') ?? 'general_form'])->orderBy('id', 'desc')->get();
        
        $SpecialInvestigations = GeneralDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id', 'Title', 'SubTitle', 'Invistigation')->where(['title_name' => 'SpecialInvestigation', 'patient_id' => $id, 'form_type' => $request->input('form_print_type') ??'general_form'])->orderBy('id', 'desc')->get();
        $SpecialInvestigations_db = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'SpecialInvestigation', 'patient_id' => $id, 'form_type' => $request->input('form_print_type') ??'general_form'])->orderBy('id', 'desc')->get();

        $ElegibilitySTATUS = ThyroidDiagnosis::with('doctor')->select('id', 'data_value', 'created_at', 'doctor_id')->where(['title_name' => 'ElegibilitySTATUS', 'patient_id' => $id, 'form_type' => $request->input('form_print_type') ?? 'general_form'])->orderBy('id', 'desc')->get();
        $Interventions = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'Intervention', 'patient_id' => $id, 'form_type' => $request->input('form_print_type') ?? 'general_form'])->orderBy('id', 'desc')->get();

        $MDTs = ThyroidDiagnosis::with('doctor')->select('id', 'data_value', 'created_at', 'doctor_id')->where(['title_name' => 'MDT', 'patient_id' => $id, 'form_type' => $request->input('form_print_type') ?? 'general_form'])->orderBy('id', 'desc')->get();

        $Labs = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'Lab', 'patient_id' => $id, 'form_type' => $request->input('form_print_type') ?? 'general_form'])->orderBy('id', 'desc')->get();
        $AntithyroidAntibodiesTests = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'AntithyroidAntibodiesTests', 'patient_id' => $id, 'form_type' => $request->input('form_print_type') ?? 'general_form'])->orderBy('id', 'desc')->get();
        $ClinicalIndicator = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'ClinicalIndicator', 'patient_id' => $id, 'form_type' => $request->input('form_print_type') ?? 'general_form'])->orderBy('id', 'desc')->get();


        $rightLobeScore = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'rightLobeScore', 'patient_id' => $id, 'form_type' => $request->input('form_print_type') ?? 'general_form'])->orderBy('id', 'desc')->get();
        $leftLobeScore = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'leftLobeScore', 'patient_id' => $id, 'form_type' => $request->input('form_print_type') ?? 'general_form'])->orderBy('id', 'desc')->get();
        $Retrosternalextension = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'Retrosternalextension', 'patient_id' => $id, 'form_type' => $request->input('form_print_type') ?? 'general_form'])->orderBy('id', 'desc')->get();
        $EnlargedLymphnodes = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'EnlargedLymphnodes', 'patient_id' => $id, 'form_type' => $request->input('form_print_type') ?? 'general_form'])->orderBy('id', 'desc')->get();
        $paralysis = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'paralysis', 'patient_id' => $id, 'form_type' => $request->input('form_print_type') ?? 'general_form'])->orderBy('id', 'desc')->get();
        $MRCIR48 = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'MRCIR48', 'patient_id' => $id, 'form_type' => $request->input('form_print_type') ?? 'general_form'])->orderBy('id', 'desc')->get();
        $CTCIR48 = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'CTCIR48', 'patient_id' => $id, 'form_type' => $request->input('form_print_type') ?? 'general_form'])->orderBy('id', 'desc')->get();
        $NmThyroidScan = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'NmThyroidScan', 'patient_id' => $id, 'form_type' => $request->input('form_print_type') ?? 'general_form'])->orderBy('id', 'desc')->get();
        $HistopathRightThyroidFNA = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'HistopathRightThyroidFNA', 'patient_id' => $id, 'form_type' => $request->input('form_print_type') ?? 'general_form'])->orderBy('id', 'desc')->get();
        $document_file = AttachDocument::where(['form_type' => $request->form_print_type??'general_form', 'patient_id' => $id])->get();


        $generalDiagnosis =  GeneralDiagnosis::where(['form_type' => $request->form_print_type??'general_form', 'title_name' => 'Symptom', 'patient_id' => $id])->get();
        

        $checkGenerateData = DB::table('general_reports')->where(['form_type' => $request->form_print_type??'general_form', 'patient_id' => $id])->get();
        $VaricoceleEmboForm = DB::table('patient_thyroid_diagnosis')->select('id', 'AnnotateimageData')->where(['patient_id' => $id, 'form_type' => $request->input('form_type')])->latest('id')->first();

        // SpinePain
        // dd($MDTs, $request->input('form_print_type')); 

        
        $data = [
            'patient' => $patient,
            'id' => Crypt::encrypt($id),
            'patient_past_history' => $Patient_past_medical_history,
            'patient_past_surgical' => $Patient_past_surgical_history,
            'patient_current_med' => $Patient_current_med,
            'patient_future_plans' => $Patient_future_plan,
            'procedures' => $Procedure,
            'prescriptions' => $Prescription,
            'insurer' => $Patient_insurer,
            'diagnosis_generals' => $diagnosis_general,
            'diagnosis_cids' => $diagnosis_cid,
            'symptoms_db' => $symptoms,
            'symptoms_scores_db' => $symptoms_scores,
            'Referrals' => $Referrals,
            'generalDiagnosis' => $generalDiagnosis,
            'supportives' => $supportives,
            'SpecialInvestigations_db' => $SpecialInvestigations,
            'SpecialInvestigations_db1' => $SpecialInvestigations_db,
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
            'Patient_order_labs' => $Patient_order_labs,
            'supportiveTreatments' => $SupportiveTreatment,
            'Patient_progress_notes' => $Patient_progress_note,
            'regionalpatientGeneralDiagnosis' => $RegionalpatientGeneralDiagnosis,
            'systemicpatientGeneralDiagnosis' => $SystemicpatientGeneralDiagnosis,
            'checkGenerateData' => $checkGenerateData,
            'VaricoceleEmboForm' => $VaricoceleEmboForm,
            'document_file' => $document_file
        ];
        // dd($data,$id);


        if ($request->input('print_form') == "print_form") {
            $request->all();
            $checkPrint = [
                "generalDiagnosis_"              => $request->input('sympotms'),
                "pastMedicalHistory"         => $request->input('pastMedicalHistory'),
                "pastSurgicalHistory"         => $request->input('pastSurgicalHistory'),
                "oldCurrentMeds"         => $request->input('oldCurrentMeds'),
                "allergies"         => $request->input('allergies'),
                "clinicalExam"         => $request->input('clinicalExam'),
                "imagingExam"         => $request->input('imagingExam'),
                "lab_"         => $request->input('lab'),
                "specialInvestigation"         => $request->input('specialInvestigatior'),
                "mdtReview"         => $request->input('mdtReview'),
                "diagnosis"         => $request->input('diagnosisi'),
                "eligibility"         => $request->input('Eligiblity'),
                "list"         => $request->input('list'),
                "supportiveTreatment"         => $request->input('supportiveTreatement'),
                "listOfPrescribed"         => $request->input('listOfPrescribed'),
                "planRecommendation"       => $request->input('planRecommandation'),
                'VaricoceleEmboForm'       => $request->input('ImagingExam'),
                'patient_id'              => $id,
                'form_type'               => $request->input('form_print_type')
            ];

            // dd($checkPrint);
            DB::table('general_reports')->insert($checkPrint);

            return view('back/print-medical/print-medical-report', $data, $checkPrint, $patient);
        }



        if ($request->input('checkReport')) {
            if ($checkGenerateData) {
                $request->all();
                $general_reports = DB::table('general_reports')->where('id', $request->input('checkReport'))->where('patient_id', $id)->first();
                $checkPrint = [
                    "generalDiagnosis_"        => $general_reports->generalDiagnosis_ ?? '',
                    "pastMedicalHistory"       =>  $general_reports->pastMedicalHistory ?? '',
                    "pastSurgicalHistory"      =>  $general_reports->pastSurgicalHistory ?? '',
                    "oldCurrentMeds"           => $general_reports->oldCurrentMeds ?? '',
                    "allergies"                =>  $general_reports->allergies ?? '',
                    "clinicalExam"             =>  $general_reports->clinicalExam ?? '',
                    "imagingExam"              =>  $general_reports->imagingExam ?? '',
                    "lab_"                     =>  $general_reports->lab_ ?? '',
                    "specialInvestigation"     =>  $general_reports->specialInvestigation ?? '',
                    "mdtReview"                =>  $general_reports->mdtReview ?? '',
                    "diagnosis"                =>  $general_reports->diagnosis ?? '',
                    "eligibility"              => $general_reports->eligibility ?? '',
                    "list"                     => $general_reports->list ?? '',
                    "supportiveTreatment"      =>  $general_reports->supportiveTreatment ?? '',
                    "listOfPrescribed"         =>  $general_reports->listOfPrescribed ?? '',
                    "planRecommendation"       =>  $general_reports->planRecommendation ?? ''
                ];
                return view('back/print-medical/print-medical-report', $data, $checkPrint, $patient, $checkGenerateData);
            }
        }

        return view('back/view-general-report')->with($data);
    }



    public function referalReplySummary(Request $request)
    {
        DB::table('referal_patients')->where('id', $request->input('referalName'))->update(['reply_summary' => $request->input('replySummary')]);
        return redirect()->back()->with('message', 'Reply added successfully');
    }



    public function removeExistingSymptom(Request $request)
    {

        $existingSymptoms = GeneralDiagnosis::where(['id' => $request->id])->delete();
        return redirect()->back()->with('existingSymptoms', 'Symptom deleted successfully');
    }

    public function ViewThyroidAblationForm(Request $request, $id)
    {

        $id = Crypt::decrypt($id);
        $patient = User::findOrFail($id);
        // $Patient_order_labs= Task::where(['patient_id'=>$id,'form_type'=>'general_form','approveDocumentSts'=>'1'])->get();
        $Patient_order_labs = Task::where(['patient_id' => $id, 'form_type' => 'thyroid_form'])->get();

        $Patient_future_plan = Patient_future_plan::with('doctor')->select('id', 'doctor_id', 'date', 'plan_text', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Procedure = Procedure::with('doctor')->select('id', 'doctor_id', 'procedure_name', 'summary', 'created_at', 'entry')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $SupportiveTreatment = SupportiveTreatment::with('doctor')->select('id', 'doctor_id', 'title', 'sub_title', 'created_at', 'treatment')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_progress_note = Patient_progress_note::with(['doctor', 'progressNote'])->select('id', 'doctor_id', 'progress_note_canned_text_id', 'voice_recognition', 'created_at', 'summery')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_insurer = Patient_insurer::where(['patient_id' => $id, 'status' => 'active'])->select('insurer_name', 'insurance_number')->orderBy('id', 'desc')->first();
        $Patient_past_medical_history = Patient_past_medical_history::select('id', 'diseases_name', 'describe', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_past_surgical_history = Patient_past_surgical_history::select('id', 'diseases_name', 'describe', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_current_med = Patient_current_med::select('id', 'drug_name', 'frequency', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();

        $Procedure = Procedure::with('doctor')->select('id', 'doctor_id', 'procedure_name', 'summary', 'created_at', 'entry')->where('patient_id', $id)->orderBy('id', 'desc')->get();
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
        $Labs = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'Lab', 'patient_id' => $id, 'form_type' => 'thyroid_form'])->orderBy('id', 'desc')->get();

        $AntithyroidAntibodiesTests = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'AntithyroidAntibodiesTests', 'patient_id' => $id])->orderBy('id', 'desc')->get();
        $ClinicalIndicator = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'ClinicalIndicator', 'patient_id' => $id, 'form_type' => 'thyroid_form'])->orderBy('id', 'desc')->get();
        $ClinicalExam = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'ClinicalExam', 'patient_id' => $id, 'form_type' => 'thyroid_form'])->orderBy('id', 'desc')->get();
        $rightLobeScore = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'rightLobeScore', 'patient_id' => $id, 'form_type' => 'thyroid_form'])->orderBy('id', 'desc')->get();
        $leftLobeScore = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'leftLobeScore', 'patient_id' => $id, 'form_type' => 'thyroid_form'])->orderBy('id', 'desc')->get();
        $Retrosternalextension = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'Retrosternalextension', 'patient_id' => $id])->orderBy('id', 'desc')->get();
        $EnlargedLymphnodes = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'EnlargedLymphnodes', 'patient_id' => $id])->orderBy('id', 'desc')->get();
        $paralysis = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'paralysis', 'patient_id' => $id])->orderBy('id', 'desc')->get();
        $MRCIR48 = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'MRCIR48', 'patient_id' => $id])->orderBy('id', 'desc')->get();
        $CTCIR48 = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'CTCIR48', 'patient_id' => $id])->orderBy('id', 'desc')->get();
        $NmThyroidScan = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'NmThyroidScan', 'patient_id' => $id])->orderBy('id', 'desc')->get();
        $HistopathRightThyroidFNA = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'HistopathRightThyroidFNA', 'patient_id' => $id])->orderBy('id', 'desc')->get();




        $VaricoceleEmboForm = DB::table('patient_thyroid_diagnosis')->select('id', 'AnnotateimageData')->where(['patient_id' => $id, 'form_type' => 'thyroid_form'])->latest('id')->first();

        $checkGenerateData = DB::table('general_reports')->where(['form_type' => 'thyroid_form', 'patient_id' => $id])->get();


        $document_file = AttachDocument::where(['form_type' => 'thyroid_ablation', 'patient_id' => $id])->get();

        $data = [
            'patient' => $patient,
            'id' => Crypt::encrypt($id),
            'patient_past_history' => $Patient_past_medical_history,
            'patient_past_surgical' => $Patient_past_surgical_history,
            'patient_current_med' => $Patient_current_med,
            'patient_future_plans' => $Patient_future_plan,
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
            'Patient_order_labs' => $Patient_order_labs,
            'supportiveTreatments' => $SupportiveTreatment,
            'Patient_progress_notes' => $Patient_progress_note,
            'VaricoceleEmboForm'   => $VaricoceleEmboForm,
            'checkGenerateData'   => $checkGenerateData,
            'document_file' => $document_file

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
        $checkGenerateData = DB::table('general_reports')->where(['form_type' => 'prostate_form', 'patient_id' => $id])->get();
        $document_file = AttachDocument::where(['form_type' => 'prostate_report', 'patient_id' => $id])->get();

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
            'checkGenerateData' => $checkGenerateData,
            'document_file' => $document_file
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

        //  return $request->all();
        $doctor_id = auth()->guard('doctor')->id();
        $id = $request->patient_id;

        GeneralDiagnosis::where(['title_name' => 'diagnosis_general', 'patient_id' => $id])->delete();
        GeneralDiagnosis::where(['title_name' => 'diagnosis_cid', 'patient_id' => $id])->delete();


        $diagnosis_general = $request->Diagnosis['general'];
        $diagnosis_cid = $request->Diagnosis['icd'];
        $form_type = $request->form_type;
        $hiddenDiagnosis = $request->hiddenDiagnosis;


        $dataToInsert = [];
        // dd('diagnosis_general',$diagnosis_general,'diagnosis_cid',$diagnosis_cid,'form_type',$form_type);
        if (isset($diagnosis_general) && is_array($diagnosis_general) && !empty($diagnosis_general)) {
            $filteredDiagnosisGeneral = array_filter($diagnosis_general, function ($value) {
                return $value !== null && $value !== '';
            });


            if ($filteredDiagnosisGeneral) {

                foreach ($filteredDiagnosisGeneral as $index => $value) {
                    $dataToInsert[] = [
                        'patient_id' => $id,
                        'title_name' => 'diagnosis_general',
                        'data_value' =>  $value,
                        'doctor_id' => $doctor_id,
                        'form_type' => $form_type
                    ];
                }
            }
        }
        if (isset($diagnosis_cid) && is_array($diagnosis_cid) && !empty($diagnosis_cid)) {
            $filteredDiagnosisGeneral =  array_filter($diagnosis_cid, function ($value) {
                return $value !== null && $value !== '';
            });


            if ($filteredDiagnosisGeneral) {

                foreach ($filteredDiagnosisGeneral as $index => $value) {
                    $dataToInsert[] = [
                        'patient_id' => $id,
                        'title_name' => 'diagnosis_cid',
                        'data_value' =>  $value,
                        'doctor_id' => $doctor_id,
                        'form_type' => $form_type
                    ];
                }
            }
        }




        $filteredDiagnosisGeneral = array_map(function ($subarray) {
            return array_filter($subarray, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $dataToInsert);

        $final_result = array_filter($filteredDiagnosisGeneral, function ($subarray) {
            return !empty($subarray);
        });
        $inserted = false;
        if (isset($final_result) && count($final_result) !== 0) {
            $inserted =   GeneralDiagnosis::insert($dataToInsert);
        }
        return response()->json($inserted);
    }


    public function editDiagnosis(Request $request)
    {
        $diagnosisType =  $request->input('diagnosisType');
        $diagnosisName =  $request->input('diagnosisName');
        $diagnosisCategory = $request->input('diagnosisCategory');

        DB::table('patient_general_diagnosis')
            ->where('data_value', $diagnosisName)
            ->update(['data_value' => $diagnosisCategory]);

        return redirect()->back()->with('updateDiagnosis', 'Edit Updated Successfully!');
    }
    public function getDiagnosis(Request $request)
    {
        $id = $request->session()->get('id');
        $general = GeneralDiagnosis::where('title_name', 'diagnosis_general')->where('patient_id', $id)->pluck('data_value');
        $icd = GeneralDiagnosis::where('title_name', 'diagnosis_cid')->where('patient_id', $id)->pluck('data_value');
        return response()->json([
            'general' => $general,
            'icd' => $icd
        ]);
    }


    
    

    public function Add_Symptoms(Request $request)
    {


        $inserted = '';
        $form_type = $request->formType;
        $doctor_id = auth()->guard('doctor')->id();
        $id = decrypt($request->patient_id);
        GeneralDiagnosis::where(['form_type' => $form_type, 'title_name' => 'Symptom', 'patient_id' => $id])->delete();
        if ($request->input('formType')) {
            $data = $request->all();
            $dataToInsert = [];

            foreach ($data['SymptomType'] as $index => $type) {
                $dataToInsert[] = [
                    'SymptomType' => $type ?? '',
                    'patient_id' => $id,
                    'doctor_id' => $doctor_id,
                    'title_name' => 'Symptom',
                    'form_type' => $form_type,
                    'SymptomDurationValue' => $data['SymptomDurationValue'][$index] ?? '',
                    'SymptomDurationType' => $data['SymptomDurationType'][$index] ?? '',
                    'SymptomDurationNote' => $data['SymptomDurationNote'][$index] ?? ''
                ];
            }

            $inserted = false;
            if (isset($dataToInsert) && count($dataToInsert) !== 0) {
                $inserted =   GeneralDiagnosis::insert($dataToInsert);
            }
            return response()->json($inserted);
        }
        return response()->json($inserted);
    }

    public function editSymptoms(Request $request)
    {
        // dd('----');
        $patient_id = $request->input('patient_id');
        $doctor_id = $request->input('doctor_id');
        $SymptomType = $request->input('SymptomType');
        $SymptomDurationValue = $request->input('SymptomDurationValue');
        $SymptomDurationType = $request->input('SymptomDurationType');
        $Note = $request->input('Note');

        // dd(['SymptomType'=>$SymptomType,'patient_id'=>$patient_id,'title_name'=>'Symptom'],['SymptomDurationValue'=>$SymptomDurationValue,'SymptomDurationType'=>$SymptomDurationType,'SymptomDurationNote'=>$Note]);


        GeneralDiagnosis::where(['SymptomType'=>$SymptomType,'patient_id'=>$patient_id,'title_name'=>'Symptom'])->update(['SymptomDurationValue'=>$SymptomDurationValue,'SymptomDurationType'=>$SymptomDurationType,'SymptomDurationNote'=>$Note]);

        return redirect()->back()->with('updateDiagnosis', 'Edit Updated Successfully!');
    }

    public function fetchExistingSymptoms(Request $request)
    {
        $id = $request->session()->get('id');
        $existingSymptoms = GeneralDiagnosis::where(['form_type' => 'general_form', 'title_name' => 'Symptom', 'patient_id' => $id])->get();

        return response()->json($existingSymptoms);
    }

    public function checkSpecialInvestigation(Request $request)
    {

        // return $request->all();

        $patient_id = decrypt($request->patient_id);
        $formType = $request->input('formType');
        $id = $request->session()->get('id');
        $exists = GeneralDiagnosis::where('patient_id', $patient_id)
            ->where('form_type', $formType)
            ->where('patient_id', $id)
            ->whereNotNull('SubTitle')
            ->exists();

        return response()->json(['exists' => $exists]);
    }

    public function updateSpecialInvestigation(Request $request)
    {
        $patient_id = decrypt($request->patient_id);
        $formType = $request->input('formType');
        $Title = $request->input('Title');
        $SubTitle = $request->input('SubTitle');
        $Invistigation = $request->input('Invistigation');
        $doctor_id = auth()->guard('doctor')->id();
        DB::table('patient_general_diagnosis')->where('patient_id', $patient_id)
            ->where('form_type', $formType)
            ->where('title_name', 'SpecialInvestigation')
            ->update([
                'Title' => $Title,
                'SubTitle' => $SubTitle,
                'Invistigation' => $Invistigation
            ]);

        return response()->json(['message' => 'Special investigation data updated']);
    }

    public function insertSpecialInvestigation(Request $request)
    {
        $patient_id = decrypt($request->patient_id);
        $formType = $request->input('formType');
        $Title = $request->input('Title');
        $SubTitle = $request->input('SubTitle');
        $Invistigation = $request->input('Invistigation');
        $doctor_id = auth()->guard('doctor')->id();
        DB::table('patient_general_diagnosis')->insert([
            'patient_id' => $patient_id,
            'doctor_id' => $doctor_id,
            'title_name' => 'SpecialInvestigation',
            'form_type' => $formType,
            'Title' => $Title,
            'SubTitle' => $SubTitle,
            'Invistigation' => $Invistigation
        ]);

        return response()->json(['message' => 'Special investigation data inserted']);
    }



    public function getSpecialInvestigation(Request $request)
    {
        $patient_id = decrypt($request->patient_id);
        $formType = $request->input('formType');

        $specialInvestigation = DB::table('patient_general_diagnosis')->where('patient_id', $patient_id)
            ->where('form_type', $formType)
            ->where('title_name', 'SpecialInvestigation')
            ->first();

        if ($specialInvestigation) {
            return response()->json($specialInvestigation);
        }

        return response()->json(null);
    }


    public function OrderSpecialInvistigation(Request $request)
    {
        $doctor_id = auth()->guard('doctor')->id();

        $id = decrypt($request->patient_id);

        $form_type = $request->formType;
        $dataToInsert = [];
        $dataToInsert[] = [
            'patient_id' => $id,
            'title_name' => 'SpecialInvestigation',
            'Title' => $request->Title,
            'SubTitle' => $request->SubTitle,
            'Invistigation' => $request->Invistigation,
            'doctor_id' => $doctor_id,
            'form_type' => $form_type
        ];

        $inserted = false;
        if (isset($dataToInsert) && count($dataToInsert) !== 0) {
            $inserted = GeneralDiagnosis::insert($dataToInsert);
        }

        return response()->json($inserted);
    }


    public function getClinicalExam(Request $request)
    {
        $patient_id = decrypt($request->patient_id);
        $formType = $request->input('formType');

        $clinicalExam = DB::table('patient_general_diagnosis')->where('patient_id', $patient_id)
            ->where('form_type', $formType)
            ->where('title_name', 'ClinicalExam')
            ->orderBy('id', 'DESC')
            ->first();

        return response()->json($clinicalExam);
    }

    // public function saveClinicalExam(Request $request)
    // {

    //     $patient_id = decrypt($request->patient_id);
    //     $doctor_id = auth()->guard('doctor')->id();

    //     $formType = $request->input('formType');

    //     $RegionalExamRadio = $request->input('RegionalExamRadio');
    //     $RegionalExamNote = $request->input('RegionalExamRadioNote');
    //     $SystemicExamRadio = $request->input('SystemicExamRadio');
    //     $SystemicExamRadioNote = $request->input('SystemicExamRadioNote');

    //         DB::table('patient_general_diagnosis')->insert([
    //             'patient_id' => $patient_id,
    //             'doctor_id' => $doctor_id,
    //             'form_type' => $formType,
    //             'title_name' => 'ClinicalExam',
    //             'RegionalExam' => $RegionalExamRadio??'Abnormal',
    //             'RegionalExamNote' => $RegionalExamNote,
    //             'SystemicExam' => $SystemicExamRadio??'Abnormal',
    //             'SystemicExamNote' => $SystemicExamRadioNote,
    //         ]);

    //     return response()->json(['message' => 'Clinical exam data saved/updated']);
    // }


    public function saveClinicalExam(Request $request)
    {

        // $request->all();

        $patient_id = decrypt($request->patient_id);
        $doctor_id = auth()->guard('doctor')->id();

        $formType = $request->input('formType');

        $RegionalExamRadio = $request->input('RegionalExamRadio');
        $RegionalExamNote = $request->input('RegionalExamRadioNote');
        $SystemicExamRadio = $request->input('SystemicExamRadio');
        $SystemicExamRadioNote = $request->input('SystemicExamRadioNote');

        $clinicalExam = DB::table('patient_general_diagnosis')->where(['title_name' => 'ClinicalExam', 'patient_id' => $patient_id,'form_type' => $formType])->first();

            // dd($formType,$clinicalExam,$patient_id,$request->all());

        if ($clinicalExam) {

            DB::table('patient_general_diagnosis')->where(['title_name' => 'ClinicalExam', 'patient_id' => $patient_id,'form_type' => $formType])->update([
                'RegionalExam' => $RegionalExamRadio,
                'RegionalExamNote' => $RegionalExamNote,
                'SystemicExam' => $SystemicExamRadio,
                'SystemicExamNote' => $SystemicExamRadioNote,
            ]);
        } else {

            DB::table('patient_general_diagnosis')->insert([
                'patient_id' => $patient_id,
                'doctor_id' => $doctor_id,
                'form_type' => $formType,
                'title_name' => 'ClinicalExam',
                'RegionalExam' => $RegionalExamRadio,
                'RegionalExamNote' => $RegionalExamNote,
                'SystemicExam' => $SystemicExamRadio,
                'SystemicExamNote' => $SystemicExamRadioNote,
            ]);
        }

        return response()->json(['message' => 'Clinical exam data saved/updated']);
    }


    public function MDTReview(Request $request)
    {

        $mdt_decisions = $request->mdt_decision;
        $mdt_elaborates = $request->mdt_elaborate;
        $doctor_id = auth()->guard('doctor')->id();
        $id = decrypt($request->patient_id);
        $form_type = $request->formType;
        $dataToInsert = [];

        $newArray = [];
        if (!empty($mdt_decisions)) {
            foreach ($mdt_decisions as $key => $value) {
                if ($value === null || empty($value)) {
                    continue;
                }
                $newArray[$value] = ['asd' => $mdt_elaborates[$key]];
            }
        }


        if ($newArray) {
            $filteredOrderSpecialInvistigation = array_filter($newArray);
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
        $final_result = array_filter($filteredDiagnosisGeneral, function ($subarray) {
            return !empty($subarray);
        });
        $inserted = false;

        // return $dataToInsert;

        if (isset($final_result) && count($final_result) !== 0) {
            $inserted =   ThyroidDiagnosis::insert($dataToInsert);
        }

        return response()->json($inserted);
    }

    public function saveDocuments(Request $request)
    {

        if ($request->hasFile('file')) {

            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $fileName);

            $formType = $request->input('formType');
            $documentName = $request->input('documentName');

            $formSection = $request->input('formSection');

            $attachDocument = new AttachDocument();

            $id = $request->session()->get('id');
            $attachDocument->patient_id = $id;
            $attachDocument->form_type = $formType;
            $attachDocument->upload_file = $fileName;
            $attachDocument->document_title = $documentName;
            $attachDocument->form_section_type = $formSection;
            $attachDocument->save();

            return response()->json(['success' => true, 'message' => 'File uploaded successfully']);
        }
        return response()->json(['success' => false, 'message' => 'File upload failed']);
    }


    public function getDocuments()
    {
        $documents = AttachDocument::all();
        return response()->json(['success' => true, 'documents' => $documents]);
    }

    public function deleteDocument($id)
    {
        $document = AttachDocument::find($id);
        $document->delete();
        return redirect()->back()->with('deleteDocument', 'Document deleted successfully');
    }


    public function EligibilityStatus(Request $request)
    {


        $eligiblity_titles = $request->eligiblity_titles;
        $eligiblity_notes = $request->eligiblity_notes;
        $doctor_id = auth()->guard('doctor')->id();

        $id = decrypt($request->patient_id);

        $form_type = $request->formType;
        $dataToInsert = [];

        $newArray = [];
        if (!empty($eligiblity_titles)) {
            foreach ($eligiblity_titles as $key => $value) {
                if ($value === null || empty($value)) {
                    continue;
                }
                $newArray[$value] = ['asd' => $eligiblity_notes[$key]];
            }
        }



        if ($newArray) {
            $filteredOrderSpecialInvistigation = array_filter($newArray);
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
        $final_result = array_filter($filteredDiagnosisGeneral, function ($subarray) {
            return !empty($subarray);
        });
        $inserted = false;

        if (isset($final_result) && count($final_result) !== 0) {
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
        $describe =  Patient_progress_predefine_note_detail::select('describe')->where(['progress_note_canned_text_id' => $request->canned_texts_id])->first();
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
            'summery' => !empty($request->summerynote) ? $request->summerynote : null,
            'day' => !empty($request->prog_day) ? $request->prog_day : null,
            'date' => !empty($request->prog_date) ? $request->prog_date : null,
            'details' => !empty($request->prog_details) ? $request->prog_details : null,
            'email' => !empty($request->prog_email) ? $request->prog_email : null,
            'mobile_no' =>  !empty($request->prog_mobile_no) ? $request->prog_mobile_no : null,
            'recall_reminder' => $request->has('prog_recall_reminder') ? $request->has('prog_recall_reminder') : 'inactive',
            'invoice_item' => $request->has('prog_invoice_item') ? $request->has('prog_invoice_item') : 'inactive',
            'appointment_type' => !empty($request->prog_appointment_type) ? $request->prog_appointment_type : null,
            'doctor_id' => auth('doctor')->user()->id
        ];

        if (!empty($add_progress)) {
            $add_progress = Patient_progress_note::insert($add_progress);
            return response()->json($add_progress);
        }
    }


    public function save_patient_note(Request $request)
    {

        $newContextData = [
            'canned_name' => $request->newContext,
        ];

        $progressNoteCannedTextId = DB::table('progress_note_canned_text')->insertGetId($newContextData);

        $progressNoteContentData = [
            'note_name' => $request->snippetText,
            'progress_note_id' => $progressNoteCannedTextId,
        ];


        $progressNoteContentId = DB::table('progress_note_contents')->insertGetId($progressNoteContentData);

        $patientProgressNoteData = [
            'progress_note_canned_text_id' => $progressNoteCannedTextId,
            'progress_note_contents_id' => $progressNoteContentId,
            'describe' => $request->snippetDescription,
        ];

        $inserted = DB::table('patient_progress_note_details')->insert($patientProgressNoteData);

        return response()->json(['success' => $inserted]);
    }

    public function deleteNote(Request $request)
    {
        $id = $request->input('note_id');
        try {
            $prgNoteId =  DB::table('progress_note_contents')->where('id', $id)->first();
            DB::table('progress_note_canned_text')->where('id', $prgNoteId->progress_note_id)->delete();

            // Delete the note from the progress_note_contents table
            DB::table('progress_note_contents')->where('id', $id)->delete();

            return response()->json(['success' => true, 'message' => 'Note deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to delete note']);
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
        $doctor_id = $request->input('doctorId');
        $receptionists = DB::table('doctors')->where(['user_type' => 'Receptionist', 'role_id' => 11])->pluck('id');
        $patientId = decrypt($data['patient_id']);
        $result = false;
        $dataInsertedTo = [];
        $dataInsertedToReceptionist = [];
        $formType = $request->formType;
        $lab_test_names = $request->input('lab_test_names');
        $lab_test_names = json_decode(json_encode($lab_test_names));
        if ($lab_test_names) {
            $lab_test_names = count($lab_test_names);
        }

        $ltsId = DB::table('tasks')->latest()->value('id');

        for ($i = 0; $i < $lab_test_names; $i++) {
            DB::table('tasks')->insertGetId([
                'invoiceNumber'  => sprintf("%06d", rand(0, 999999)) . $ltsId,
                'patient_id'      => $patientId,
                'doctor_id'       => $doctor_id,
                'task'            => $request->input('lab_test_names')[$i],
                'form_type'       => $request->input('formType'),
                'test_type'       => 'radiology',
                'order_summary'   => $request->input('test_summery')
            ]);
            $result = true;
        }

        return response()->json($result);
    }


    public function order_lab_test(Request $request)
    {
        //  dd("ok");
        $data = $request->all();
        $doctor_id = $request->input('doctorId');
        $receptionists = DB::table('doctors')->where(['user_type' => 'Receptionist', 'role_id' => 11])->pluck('id');
        // $doctor_nurses=DB::table('doctor_nurse')->where('doctor_id',$doctor_id)->pluck('nurse_id');
        $patientId = decrypt($data['patient_id']);
        $result = false;
        $dataInsertedTo = [];
        $dataInsertedToReceptionist = [];
        $formType = $request->formType;

        // $dataInsertedTo=[
        //     'patient_id' => $patientId,
        //     'doctor_id'=>$doctor_id,
        //     'form_type'=>$formType,
        //     'test_type'=>'pathology'
        // ];
        // if(!empty($dataInsertedTo))
        // {
        //     $inserted_id=  DB::table('nurse_tasks')->insertGetId($dataInsertedTo);

        // $lab_test_names = $request->input('lab_test_names');
        // $lab_test_names = json_decode(json_encode($lab_test_names));
        // if ($lab_test_names) {
        //     $lab_test_names = count($lab_test_names);
        // }
        // }

        $lab_test_names = $request->input('lab_test_names');
        $lab_test_names = json_decode(json_encode($lab_test_names));
        if ($lab_test_names) {
            $lab_test_names = count($lab_test_names);
        }

        $ltsId = DB::table('tasks')->latest()->value('id');

        for ($i = 0; $i < $lab_test_names; $i++) {
            DB::table('tasks')->insertGetId([
                'invoiceNumber'  => sprintf("%06d", rand(0, 999999)) . $ltsId,
                'patient_id'      => $patientId,
                'doctor_id'       => $doctor_id,
                'task'            => $request->input('lab_test_names')[$i],
                'form_type'       => $request->input('formType'),
                'test_type'       => 'pathology',
                'order_summary'         =>  $request->input('test_summery')
            ]);
            $result = true;
        }

        return response()->json($result);
    }


    public function order_lab_test_list(Request $request)
    {

        $patient_id = Crypt::decrypt($request->patient_id);
        $doctor_id = auth('doctor')->user()->id;

        $latestOrderLabs = DB::table('nurse_tasks')

            ->select(
                'id',
                'doctor_id',
                'patient_id',
                'form_type'
            )
            ->where('doctor_id',)
            ->orderByDesc('doctor_id', $doctor_id)
            ->take(5)
            ->get();

        return response()->json($latestOrderLabs);
    }
    public function order_lab_test_list_delete(Request $request)
    {

        $Patient_order_lab = DB::table('nurse_tasks')->where('id', $request->lab_id)->delete();
        return response()->json($Patient_order_lab);
    }
    // public function invoice_item_add(Request $request)
    // {
    //     $data = $request->all();
    //     $patientId = decrypt($data['patient_id']);

    //     $date = $data['date'];
    //     $item_name = $data['item_name'];
    //     $code = $data['code'];
    //     $cost = $data['cost'];

    //     Patient_invoice_item::create([
    //         'patient_id' => $patientId,
    //         'date' => $date,
    //         'item_name' => $item_name,
    //         'code' => $code,
    //         'cost' => $cost

    //     ]);
    //     return response()->json($data);
    // }


    public function invoice_item_add(Request $request)
    {

        $taskId = $request->input('taskId');
        $discount = $request->input('discount');
        $vatDiscount = $request->input('vatDiscount');
        $finalAmount = $request->input('finalAmount');
        $taskPrice = $request->input('taskPrice');
        $taskIdCount = count($taskId);

        $invoice_data = [];
        $task_data = [];
        if ($taskIdCount > 0) {
            for ($i = 0; $i < $taskIdCount; $i++) {
                $tasks = DB::table('tasks')->where('id', $taskId[$i])->first();
                $pdid = $tasks->doctor_id.'_'.$tasks->patient_id;
                DB::table('tasks')->where('id', $taskId[$i])->update(['discount' => $discount[$i], 'vatDiscount' => $vatDiscount[$i], 'amountPaid'  => $taskPrice[$i], 'toInvoiceStatus' => '1', 'finalAmount' => $finalAmount[$i]]);

                $task_data[$pdid][]=$taskId[$i];
                $invoice_data[$pdid]['doctor_id'] = $tasks->doctor_id;
                $invoice_data[$pdid]['patient_id'] = $tasks->patient_id;
                $invoice_data[$pdid]['invoice_no'] = $tasks->id.sprintf("%06d", rand(111111, 999999));

                if(isset($invoice_data[$pdid]) && isset($invoice_data[$pdid]['finalAmount'])) {
                    $invoice_data[$pdid]['finalAmount'] += (float)$finalAmount[$i];
                }
                else {
                    $invoice_data[$pdid]['finalAmount'] = (float)$finalAmount[$i];
                }
            }
        }
        // dd($invoice_data,$task_data);

        if($invoice_data){
            foreach($invoice_data as $kk=>$idata){
                $inId = DB::table('invoices')->insertGetId($idata);
                if($task_data[$kk]){
                    foreach($task_data[$kk] as $inva){
                        DB::table('tasks')->where('id', $inva)->update(['invoice_id'=>$inId]);
                    }
                }
            }
        }
        

        return redirect()->back()->with('message', 'Create invoice Successfully');
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


        $task_id = DB::table('pathology_price_list')->where('price_type', 'Other')->latest('id')->first();



        $data = $request->all();

        $patientId = decrypt($data['patient_id']);

        $appointmentDate = Carbon::createFromFormat('Y-m-d\TH:i',  $data['meeting_date'])->format('Y-m-d H:i:s');

        $meeting_date = $appointmentDate;

        $meeting_url = $data['meeting_url'];
        $doctor_id = auth('doctor')->user()->id;
        $isConfirmation = $request->has('is_confirmation') ? 'yes' : 'no';

        $videoCall = Patient_video_call::create([
            'patient_id' => $patientId,
            'date' => $meeting_date,
            'meeting_url' => $meeting_url,
        ]);


        $task = DB::table('tasks')->insert([
            'patient_id' => $patientId,
            'doctor_id' => $doctor_id,
            'invoiceNumber'  => sprintf("%06d", rand(0, 9999999)),
            'form_type'  => 'Meeting',
            'task'       => $task_id->id ?? "'",
            'appoinment_date' => $appointmentDate ?? '0:0:0'
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

        $patient_id = $request->patient_id;
        $Patient_order_labs = Patient_current_med::where('patient_id', $patient_id)->orderBy('id', 'desc')->get();
        return response()->json(['patient_current_med' => $Patient_order_labs]);
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
        $formType = $data['formType'];

        Patient_allergy::create([
            'patient_id' => $patientId,
            'allergy_name' => $allergy,
            'form_type' => $formType
        ]);



        return response()->json($data);
    }


    public function deletePatientAllergy($id)
    {
        $allergy = Patient_allergy::findOrFail($id);
        $allergy->delete();

        return response()->json(['success' => 'Allergy deleted successfully.']);
    }

    public function deleteReport($id)
    {
        $allergy = DB::table('general_reports')->whereId($id)->delete();
        return response()->json(['success' => 'Report Deleted successfully.']);
    }



    public function deletePatientPastMediacl($id)
    {
        $allergy = Patient_past_medical_history::findOrFail($id);
        $allergy->delete();

        return response()->json(['success' => 'Allergy deleted successfully.']);
    }

    public function deletePatientPastSurgical($id)
    {
        $allergy = Patient_past_surgical_history::findOrFail($id);
        $allergy->delete();

        return response()->json(['success' => 'Patient past surgical history deleted successfully.']);
    }

    public function deleteOrderProcedure($id)
    {
        $allergy = DB::table('patient_order_procedures')->where('id', $id)->delete();
        return response()->json(['success' => 'Patient order procedures deleted successfully.']);
    }

    public function patientSupportiveTreatments($id)
    {
        $allergy = DB::table('patient_supportive_treatments')->where('id', $id)->delete();
        return response()->json(['success' => 'Patient order procedures deleted successfully.']);
    }


    public function patientFuturePlans($id)
    {
        $allergy = DB::table('patient_future_plans')->where('id', $id)->delete();
        return response()->json(['success' => 'Patient deleted successfully.']);
    }

    public function patientRemoveDrug($id)
    {
        $allergy = DB::table('patient_current_meds')->where('id', $id)->delete();
        return response()->json(['success' => 'Patient deleted successfully.']);
    }

    public function listofprocedure($id)
    {
        $allergy = DB::table('patient_order_procedures')->where('id', $id)->delete();
        return response()->json(['success' => 'successfully.']);
    }






    public function patientProgressNote($id)
    {
        $allergy = DB::table('patient_progress_notes')->where('id', $id)->delete();
        return response()->json(['success' => 'Patient deleted successfully.']);
    }

    public function PatientPrescribedMedicines($id)
    {
        //return $id;
        $allergy = DB::table('patient_prescriptions')->where('id', $id)->delete();
        return response()->json(['success' => 'Patient prescriptions deleted successfully.']);
    }


    public function patientReferrals($id)
    {
        $allergy = DB::table('referal_patients')->where('id', $id)->delete();
        return response()->json(['success' => 'referal_patients deleted successfully.']);
    }


    public function patientMbt($id)
    {
        //  return $request->all();
        $patient_thyroid_diagnosis = DB::table('patient_thyroid_diagnosis')->where('id', $id)->delete();
        return response()->json(['success' => 'patient thyroid diagnosis deleted successfully.']);
    }

    public function patientEligibilityStatus($id)
    {
        // echo "ok"; die;
        $patient_thyroid_diagnosis = DB::table('patient_thyroid_diagnosis')->where('id', $id)->delete();
        return response()->json(['success' => 'patient thyroid diagnosis deleted successfully.']);
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
        $doctor_id = auth('doctor')->user()->id;
        $procedure = $data['procedure'];
        $entry = $data['entry'];
        $summary = $data['summary'];

        Procedure::create([
            'patient_id' => $patientId,
            'procedure_name' => $procedure,
            'entry' => $entry,
            'summary' => $summary,
            'doctor_id' => $doctor_id
        ]);



        return response()->json($data);
    }
    public function add_patient_supportive_treatment(Request $request)
    {
        $data = $request->all();
        $patientId = decrypt($data['patient_id']);
        $doctor_id = auth('doctor')->user()->id;
        $title = $data['supportiveTitle'];
        $sub_title = $data['supportiveSubTitle'];
        $Treatment = $data['Treatment'];

        SupportiveTreatment::create([
            'patient_id' => $patientId,
            'title' => $title,
            'sub_title' => $sub_title,
            'treatment' => $Treatment,
            'doctor_id' => $doctor_id
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
        $data = $request->all();
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
        $final_result = array_filter($filteredDiagnosisGeneral, function ($subarray) {
            return !empty($subarray);
        });
        $inserted = false;
        if (isset($final_result) && count($final_result) !== 0) {
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
            'plan_text' => $future_write,
            'doctor_id' => auth('doctor')->user()->id
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

        $patient_sirname = $data['patient_sirname'] ?? '';
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
        $patient_policy_no = $data['patient_policy_no'];
        $patient_gp = $data['patient_gp'];
        $patient_additional_info = $data['patient_additional_info'];
        $patient_tags_list = $data['patient_tags_list'];
        $document_type = $data['document_type'];
        $enterIdNumber = $data['enterIdNumber'];
        $patient_info = User::where('email', $patient_email)->first();
        $userEmailExists = User::where('email', $patient_email)
            ->exists();
        $userMobExists = User::where('mobile_no', $patient_mobile_no)
            ->exists();



        $patient_info->sirname = $patient_sirname ?? '';
        $patient_info->name = $patient_name ?? '';
        $patient_info->birth_date = $patient_birth ?? '';
        $patient_info->gendar = $patient_gendar ?? '';
        $patient_info->post_code = $patient_post_code ?? '';
        $patient_info->street = $patient_street ?? '';
        $patient_info->town = $patient_town ?? '';
        if (!$userMobExists) {
            $patient_info->mobile_no = $patient_mobile_no ?? '';
        }
        $patient_info->landline = $patient_landline ?? '';
        $patient_info->country = $patient_country ?? '';
        if (!$userEmailExists) {
            $patient_info->email = $patient_email ?? '';
        }
        $patient_info->kin = $patient_kin ?? '';
        $patient_info->policy_no = $patient_policy_no;
        $patient_info->gp = $patient_gp;
        $patient_info->additional_info = $patient_additional_info;
        // $patient_info->patient_id = $patient_edit_id;
        $patient_info->tags = $patient_tags_list;
        $patient_info->document_type = $document_type;
        $patient_info->enterIdNumber = $enterIdNumber;
        // handle profile_image

        if ($request->hasFile('profile_image')) {
            $oldFilePath = public_path('assets/patient_profile') . '/' . $patient_info->patient_profile_img;
            if (file_exists($oldFilePath) && is_file($oldFilePath)) {
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
        $randomMA = 'PA' . str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);
        return $randomMA;
    }




    public function store(Request $request)
    {

        // return $request->all();

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email',
            'mobile_no' => 'numeric|unique:users,mobile_no',

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
        if ($request->file('customFile') != '') {
            $image1 = $request->file('customFile');
            $customFile = rand() . '.' . $image1->getClientOriginalExtension();
            $image1->move(public_path('assets/patient_profile'), $customFile);
            $data['customFile'] = $customFile;
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
            'doctor_id' =>  !empty($request->doctor_id) ? $request->doctor_id : null,
            'landline' => !empty($request->landline) ? $request->landline : null,
            'document_type' => !empty($request->document_type) ? $request->document_type : null,
            'enterIdNumber' => !empty($request->enterIdNumber) ? $request->enterIdNumber : null,
            'gendar' => !empty($request->gender) ? $request->gender : null,
            'patient_id' => $this->generateRandomMA(),
            'patient_profile_img' => !empty($new_name) ? $new_name : null,
            'customFile' => !empty($customFile) ? $customFile : null,
        ];

        if (!empty($add_patient)) {
            $add_patient = User::create($add_patient);
            $lastId = $add_patient->id;

            DB::table('user_branchs')->insertGetId([
                'patient_id'     =>  $lastId,
                'add_branch'     =>  $request->input('selectBranch'),
                'branch_type'    => 'patient'
            ]);

            return response()->json(['message' => 'Patient created successfully'], 201);
        } else {
            return response()->json(['error' => 'Failed to add patient details. Please try again.'], 'error');
        }
    }

    public function getUsers()
    {
        $users = User::select('id', 'name')->orderBy('id', 'desc')->get();
        return response()->json($users);
    }



    public function getPatientsData(Request $request)
    {


        $getType = Auth::guard('doctor')->user();
        $patient = User::query();
        if ($request->input('dropdownBranchValue')) {
            // return $req = $request->input('dropdownBranchValue');
            $searchInput = $request->input('searchInput');
            $patient->where(function ($query) use ($searchInput) {
                $query->where('name', 'like',  $searchInput . '%')
                    ->orWhere('street', 'like',  $searchInput . '%')
                    ->orWhere('email', 'like',  $searchInput . '%')
                    ->orWhere('post_code', 'like', $searchInput . '%')
                    ->orWhere('mobile_no', 'like', $searchInput . '%')
                    ->orWhere('patient_id', 'like', $searchInput . '%');
            });

            $patients = $patient->orderBy('id', 'desc')->Where('status', '1');
            $patientBranch = DB::table('user_branchs')->select('patient_id')->where('add_branch', $request->input('dropdownBranchValue'))->pluck('patient_id')->toArray();


            $patients = $patients->whereIn('id', $patientBranch);


            $patients = $patients->get();

            $patientData = [];
            foreach ($patients as $patient) {
                if (!is_null($patient->id)) {
                    $encryptedId = Crypt::encrypt($patient->id);
                    $patientData[] = [
                        'id' => $encryptedId,
                        'name' => $patient->name,
                        'street' => $patient->street,
                        'email' => $patient->email ?? '--',
                        'post_code' => $patient->post_code ?? '--',
                        'mobile_no' => $patient->mobile_no,
                        'patient_id' => $patient->patient_id,
                    ];
                }
            }
            $patientDataObject = (object) $patientData;
            return response()->json($patientDataObject);
        }


        if (empty($request->input('dropdownValue'))) {
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

            $patients = $patient->orderBy('id', 'desc')->Where('status', '1');


            if ($getType->role_id == '1') {
                // $patients=$patients->where('doctor_id',$getType->id);
            }

            $patients = $patients->get();

            $patientData = [];
            foreach ($patients as $patient) {
                if (!is_null($patient->id)) {
                    $encryptedId = Crypt::encrypt($patient->id);
                    $patientData[] = [
                        'id' => $encryptedId,
                        'name' => $patient->name,
                        'street' => $patient->street,
                        'email' => $patient->email ?? '--',
                        'post_code' => $patient->post_code ?? '--',
                        'mobile_no' => $patient->mobile_no,
                        'patient_id' => $patient->patient_id,
                    ];
                }
            }
            $patientDataObject = (object) $patientData;
        } else {

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

            $patients = $patient->orderBy('id', 'desc')->Where('status', '1');

            if ($getType->role_id == '1') {
                $referalPatients = DB::table('referal_patients')->select('patient_id')->where('doctor_id', $getType->id)->pluck('patient_id')->toArray();
            } else {
                $nursePatient  = DB::table('doctor_nurse')->where('nurse_id', $getType->id)->pluck('doctor_id')->toArray();
                $referalPatients = DB::table('referal_patients')->select('patient_id')->whereIn('doctor_id', $nursePatient)->pluck('patient_id')->toArray();
            }

            $patients = $patients->whereIn('id', $referalPatients);


            $patients = $patients->get();

            $patientData = [];
            foreach ($patients as $patient) {
                if (!is_null($patient->id)) {
                    $encryptedId = Crypt::encrypt($patient->id);
                    $patientData[] = [
                        'id' => $encryptedId,
                        'name' => $patient->name,
                        'street' => $patient->street,
                        'email' => $patient->email ?? '--',
                        'post_code' => $patient->post_code ?? '--',
                        'mobile_no' => $patient->mobile_no,
                        'patient_id' => $patient->patient_id,
                    ];
                }
            }
            $patientDataObject = (object) $patientData;
        }

        return response()->json($patientDataObject);
    }


    // public function getPatientsData(Request $request)
    // {
    //     $patient = User::query();
    //     if ($request->has('searchInput')) {

    //         $searchInput = $request->input('searchInput');
    //         $patient->where(function ($query) use ($searchInput) {
    //             $query->where('name', 'like',  $searchInput . '%')
    //                 ->orWhere('street', 'like',  $searchInput . '%')
    //                 ->orWhere('email', 'like',  $searchInput . '%')
    //                 ->orWhere('post_code', 'like', $searchInput . '%')
    //                 ->orWhere('mobile_no', 'like', $searchInput . '%')
    //                 ->orWhere('patient_id', 'like', $searchInput . '%');
    //         });

    //     }
    //     //
    //     $patients = $patient->orderBy('id', 'desc')->Where('status','1');

    //     $getType=Auth::guard('doctor')->user();
    //     if($getType->role_id=='1')
    //     {
    //         $patients=$patients->where('doctor_id',$getType->id);
    //     }

    //     $patients = $patients->get();

    //     $patientData = [];
    //     foreach ($patients as $patient) {
    //         if (!is_null($patient->id)) {
    //             $encryptedId = Crypt::encrypt($patient->id);
    //             $patientData[] = [
    //                 'id' => $encryptedId,
    //                 'name' => $patient->name,    
    //                 'street' => $patient->street,
    //                 'email' => $patient->email,
    //                 'post_code' => $patient->post_code,
    //                 'mobile_no' => $patient->mobile_no,
    //                 'patient_id' => $patient->patient_id,
    //                 'referal_status'=> $patient->referal_status,
    //             ];
    //         }
    //     }


    //     $patientDataObject = (object) $patientData;

    //     DB::table('referal_patients')->where('doctor_id',$getType->id)->get();

    //     return response()->json($patientDataObject);
    // }

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
        } elseif ($EligibilityForm == "HaemorrhoidsEmbo") {
            return redirect()->route('user.HaemorrhoidsEmbolizationEligibilityForms', ['patient_id' => $patient_id]);
        } elseif ($EligibilityForm == "KneePain") {
            return redirect()->route('user.KneePainlizationEligibilityForms', ['patient_id' => $patient_id]);
        } elseif ($EligibilityForm == "SpinePain") {
            return redirect()->route('user.SpinePainlizationEligibilityForms', ['patient_id' => $patient_id]);
        } elseif ($EligibilityForm == "msk_pain_report") {
            return redirect()->route('user.MSKPainlizationEligibilityForms', ['patient_id' => $patient_id]);
        } elseif ($EligibilityForm == "ShoulderPain") {
            return redirect()->route('user.ShoulderPainlizationEligibilityForms', ['patient_id' => $patient_id]);
        } elseif ($EligibilityForm == "HeadachePain") {
            return redirect()->route('user.HeadachePainlizationEligibilityForms', ['patient_id' => $patient_id]);
        } elseif ($EligibilityForm == "GeneralForm") {
            return redirect()->route('user.patient_medical_detail', ['id' => $patient_id]);
        } else {
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

        $VaricoceleEmboForm = DB::table('patient_thyroid_diagnosis')->select('id', 'AnnotateimageData')->where(['patient_id' => $id, 'form_type' => 'VaricoceleEmboForm'])->latest('id')->first();


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
            'Imaging' => $Imaging,
            'Prescription' => $Prescription,
            'VaricoceleEmboForm' => $VaricoceleEmboForm


        ];
        
        return view('back/Edit_varicocele_embo', $data);
    }

    // Varicocele Embo  form update method
    public function updateVaricoceleEmboEligibilityForms(Request $request)
    {
        ThyroidDiagnosis::where(['form_type' => 'VaricoceleEmboForm', 'patient_id' => decrypt($request->patient_id)])->delete();

        $this->storeVaricoceleEmboEligibilityForms($request);
        $patientId =  $request->patient_id;

        return response()->json(['patient_id' => $patientId]);
    }


    //Varicocele Embo  form view method
    public function viewVaricoceleEmboEligibilityForms(Request $request, $id)
    {
        $id = Crypt::decrypt($id);
        $patient = User::findOrFail($id);

        // $Patient_order_labs= Task::where(['patient_id'=>$id,'form_type'=>'general_form','approveDocumentSts'=>'1'])->get();
        $Patient_order_labs = Task::where(['patient_id' => $id, 'form_type' => 'VaricoceleEmboForm'])->get();


        $viewImage = DB::table('patient_thyroid_diagnosis')->select('id', 'AnnotateimageData')->where(['patient_id' => $id, 'form_type' => 'VaricoseAblation'])->latest('id')->first();


        $Patient_future_plan = Patient_future_plan::with('doctor')->select('id', 'doctor_id', 'date', 'plan_text', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Procedure = Procedure::with('doctor')->select('id', 'doctor_id', 'procedure_name', 'summary', 'created_at', 'entry')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $SupportiveTreatment = SupportiveTreatment::with('doctor')->select('id', 'doctor_id', 'title', 'sub_title', 'created_at', 'treatment')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_progress_note = Patient_progress_note::with(['doctor', 'progressNote'])->select('id', 'doctor_id', 'progress_note_canned_text_id', 'voice_recognition', 'created_at', 'summery')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_insurer = Patient_insurer::where(['patient_id' => $id, 'status' => 'active'])->select('insurer_name', 'insurance_number')->orderBy('id', 'desc')->first();
        $Patient_past_medical_history = Patient_past_medical_history::select('id', 'diseases_name', 'describe', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_past_surgical_history = Patient_past_surgical_history::select('id', 'diseases_name', 'describe', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_current_med = Patient_current_med::select('id', 'drug_name', 'frequency', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();


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
        $ElegibilitySTATUS = ThyroidDiagnosis::with('doctor')->select('id', 'data_value', 'created_at', 'doctor_id')->where(['title_name' => 'ElegibilitySTATUS', 'patient_id' => $id, 'form_type' => 'VaricoceleEmboForm'])->orderBy('id', 'desc')->get();
        $Interventions = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'Intervention', 'patient_id' => $id])->orderBy('id', 'desc')->get();
        $MDTs = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'MDT', 'patient_id' => $id, 'form_type' => 'VaricoceleEmboForm'])->orderBy('id', 'desc')->get();
        $Labs = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'Lab', 'patient_id' => $id, 'form_type' => 'VaricoceleEmboForm'])->orderBy('id', 'desc')->get();

        $checkGenerateData = DB::table('general_reports')->where(['form_type' => 'VaricoceleEmboForm', 'patient_id' => $id])->get();
        $document_file = AttachDocument::where(['form_type' => 'varicoceleEmbo_form', 'patient_id' => $id])->get();




        $data = [
            'patient' => $patient,
            'id' => Crypt::encrypt($id),
            'patient_past_history' => $Patient_past_medical_history,
            'patient_past_surgical' => $Patient_past_surgical_history,
            'patient_current_med' => $Patient_current_med,
            'patient_future_plans' => $Patient_future_plan,
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
            'Patient_order_labs' => $Patient_order_labs,
            'supportiveTreatments' => $SupportiveTreatment,
            'Patient_progress_notes' => $Patient_progress_note,
            'Imaging' => $Imaging,
            'ClinicalIndicator_db' => $ClinicalIndicator,
            'ClinicalExam_db' => $ClinicalExam,
            'viewForm' => $viewImage,
            'checkGenerateData' => $checkGenerateData,
            'document_file'  => $document_file


        ];

        return view('back/view-varicocele-embo-report')->with($data);
    }

    // Varicocele Embo form save
    public function storeVaricoceleEmboEligibilityForms(Request $request)
    {

        $doctor_id = auth()->guard('doctor')->id();
        $id = decrypt($request->patient_id);
        $dataToInsert = [];

        if ($request->input('canvasImage')) {
            $canvasImage = $request->input('canvasImage');

            $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $canvasImage));

            $newFileName = time().'.png'; // You can change the file extension based on the image type

            $filePath = public_path('assets/thyroid-eligibility-form/') . $newFileName;

            file_put_contents($filePath, $imageData);
        } else {
            $newFileName = '';
        }


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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
                    'form_type' => 'VaricoceleEmboForm'
                ];
            }
        }
        $data = $request->symptoms;
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
                    'form_type' => 'VaricoceleEmboForm'
                ];
            }
        }

        if (!empty($dataToInsert)) {
            ThyroidDiagnosis::insert($dataToInsert);
        }

        if($newFileName) ThyroidDiagnosis::where(['patient_id' => $id,'form_type' => 'VaricoceleEmboForm','doctor_id' => $doctor_id])->update(['AnnotateimageData' => $newFileName]);
        $patientId =  $request->patient_id;

        return response()->json(['patient_id' => $patientId]);
    }

    // HeadachePain form edit method
    public function editHeadachePainEligibilityForms(Request $request)
    {



        $id = decrypt($request->patient_id);
        // $id = decrypt();


        $VaricoceleEmboForm = DB::table('patient_thyroid_diagnosis')->select('id', 'AnnotateimageData')->where(['patient_id' => $id, 'form_type' => 'HeadachePain'])->latest('id')->first();


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
            'Imaging' => $Imaging,
            'Prescription' => $Prescription,
            'VaricoceleEmboForm' => $VaricoceleEmboForm


        ];
        return view('back/Edit_headache_pain', $data);
    }

    // HeadachePain form update method
    public function updateHeadachePainEligibilityForms(Request $request)
    {
        ThyroidDiagnosis::where(['form_type' => 'HeadachePain', 'patient_id' => decrypt($request->patient_id)])->delete();

        $this->storeHeadachePainEligibilityForms($request);
        $patientId =  $request->patient_id;

        return response()->json(['patient_id' => $patientId]);
    }



    // HeadachePain form store method
    public function storeHeadachePainEligibilityForms(Request $request)
    {


        if ($request->input('canvasImage')) {
            $canvasImage = $request->input('canvasImage');

            $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $canvasImage));

            $newFileName = time().'.png'; // You can change the file extension based on the image type

            $filePath = public_path('assets/thyroid-eligibility-form/') . $newFileName;

            file_put_contents($filePath, $imageData);
        } else {
            $newFileName = '';
        }


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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
                    'form_type' => 'HeadachePain'
                ];
            }
        }
        $data = $request->symptoms;
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
                    'form_type' => 'HeadachePain'
                ];
            }
        }

        if (!empty($dataToInsert)) {
            ThyroidDiagnosis::insert($dataToInsert);
        }
        if($newFileName) ThyroidDiagnosis::where(['patient_id' => $id,'form_type' => 'HeadachePain','doctor_id' => $doctor_id])->update(['AnnotateimageData' => $newFileName]);

        $patientId =  $request->patient_id;

        return response()->json(['patient_id' => $patientId]);
    }

    // HeadachePain form view method Edit_varicose_ablation
    public function viewHeadachePainEligibilityForms(Request $request, $id)
    {
        $id = Crypt::decrypt($id);
        $patient = User::findOrFail($id);

        // $Patient_order_labs= Task::where(['patient_id'=>$id,'form_type'=>'general_form','approveDocumentSts'=>'1'])->get();

        $Patient_order_labs = Task::where(['patient_id' => $id, 'form_type' => 'general_form'])->get();


        $ViewImage = DB::table('patient_thyroid_diagnosis')->select('id', 'AnnotateimageData')->where(['patient_id' => $id, 'form_type' => 'HeadachePain'])->latest('id')->first();




        $Patient_future_plan = Patient_future_plan::with('doctor')->select('id', 'doctor_id', 'date', 'plan_text', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Procedure = Procedure::with('doctor')->select('id', 'doctor_id', 'procedure_name', 'summary', 'created_at', 'entry')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $SupportiveTreatment = SupportiveTreatment::with('doctor')->select('id', 'doctor_id', 'title', 'sub_title', 'created_at', 'treatment')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_progress_note = Patient_progress_note::with(['doctor', 'progressNote'])->select('id', 'doctor_id', 'progress_note_canned_text_id', 'voice_recognition', 'created_at', 'summery')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_insurer = Patient_insurer::where(['patient_id' => $id, 'status' => 'active'])->select('insurer_name', 'insurance_number')->orderBy('id', 'desc')->first();
        $Patient_past_medical_history = Patient_past_medical_history::select('id', 'diseases_name', 'describe', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_past_surgical_history = Patient_past_surgical_history::select('id', 'diseases_name', 'describe', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_current_med = Patient_current_med::select('id', 'drug_name', 'frequency', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        // $Patient_future_plan = Patient_future_plan::select('id', 'date', 'plan_text')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        // $Procedure = Procedure::select('id', 'procedure_name', 'summary', 'created_at', 'entry')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Prescription = Prescription::select('id', 'prescription', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
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
        // $Prescription = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'Prescription', 'patient_id' => $id])->orderBy('id', 'desc')->get();
        $SpecialInvestigations = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'SpecialInvestigation', 'patient_id' => $id, 'form_type' => 'HeadachePain'])->orderBy('id', 'desc')->get();
        $ElegibilitySTATUS = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'ElegibilitySTATUS', 'patient_id' => $id, 'form_type' => 'HeadachePain'])->orderBy('id', 'desc')->get();

        $Interventions = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'Intervention', 'patient_id' => $id])->orderBy('id', 'desc')->get();
        $MDTs = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'MDT', 'patient_id' => $id, 'form_type' => 'HeadachePain'])->orderBy('id', 'desc')->get();


        $Labs = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'Lab', 'patient_id' => $id, 'form_type' => 'HeadachePain'])->orderBy('id', 'desc')->get();


        $checkGenerateData = DB::table('general_reports')->where(['form_type' => 'HeadachePain', 'patient_id' => $id])->get();
        $document_file = AttachDocument::where(['form_type' => 'HeadachePain', 'patient_id' => $id])->get();


        $data = [
            'patient' => $patient,
            'id' => Crypt::encrypt($id),
            'patient_past_history' => $Patient_past_medical_history,
            'patient_past_surgical' => $Patient_past_surgical_history,
            'patient_current_med' => $Patient_current_med,
            'patient_future_plans' => $Patient_future_plan,
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
            'Patient_order_labs' => $Patient_order_labs,
            'supportiveTreatments' => $SupportiveTreatment,
            'Patient_progress_notes' => $Patient_progress_note,
            'Imaging' => $Imaging,
            'ClinicalIndicator_db' => $ClinicalIndicator,
            'ClinicalExam_db' => $ClinicalExam,
            'viewForm' => $ViewImage,
            'checkGenerateData' => $checkGenerateData,
            'document_file' => $document_file


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


        $VaricoceleEmboForm = DB::table('patient_thyroid_diagnosis')->select('id', 'AnnotateimageData')->where(['patient_id' => $id, 'form_type' => 'ShoulderPain'])->latest('id')->first();


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
            'Imaging' => $Imaging,
            'VaricoceleEmboForm' => $VaricoceleEmboForm,
            'Prescription' => $Prescription
        ];
        return view('back/Edit_shoulder_pain', $data);
    }

    // ShoulderPain form update method
    public function updateShoulderPainEligibilityForms(Request $request)
    {
        ThyroidDiagnosis::where(['form_type' => 'ShoulderPain', 'patient_id' => decrypt($request->patient_id)])->delete();

        $this->storeShoulderPainEligibilityForms($request);
        $patientId =  $request->patient_id;

        return response()->json(['patient_id' => $patientId]);
    }


    // ShoulderPain form store method
    public function storeShoulderPainEligibilityForms(Request $request)
    {


        if ($request->input('canvasImage')) {
            $canvasImage = $request->input('canvasImage');

            $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $canvasImage));

            $newFileName = time().'.png'; // You can change the file extension based on the image type

            $filePath = public_path('assets/thyroid-eligibility-form/') . $newFileName;

            file_put_contents($filePath, $imageData);
        } else {
            $newFileName = '';
        }

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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
                    'form_type' => 'ShoulderPain'
                ];
            }
        }
        $data = $request->symptoms;
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
                    'form_type' => 'ShoulderPain'
                ];
            }
        }




        if (!empty($dataToInsert)) {
            ThyroidDiagnosis::insert($dataToInsert);
        }
        if($newFileName) ThyroidDiagnosis::where(['patient_id' => $id,'form_type' => 'ShoulderPain','doctor_id' => $doctor_id])->update(['AnnotateimageData' => $newFileName]);


        $patientId =  $request->patient_id;

        return response()->json(['patient_id' => $patientId]);
    }

    // ShoulderPain form view method Edit_varicose_ablation
    public function viewShoulderPainEligibilityForms(Request $request, $id)
    {
        $id = Crypt::decrypt($id);
        $patient = User::findOrFail($id);

        $Patient_order_labs = Task::where(['patient_id' => $id, 'form_type' => 'ShoulderPain'])->get();


        $Viewimage = DB::table('patient_thyroid_diagnosis')->select('id', 'AnnotateimageData')->where(['patient_id' => $id, 'form_type' => 'ShoulderPain'])->latest('id')->first();



        $Patient_future_plan = Patient_future_plan::with('doctor')->select('id', 'doctor_id', 'date', 'plan_text', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Procedure = Procedure::with('doctor')->select('id', 'doctor_id', 'procedure_name', 'summary', 'created_at', 'entry')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $SupportiveTreatment = SupportiveTreatment::with('doctor')->select('id', 'doctor_id', 'title', 'sub_title', 'created_at', 'treatment')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_progress_note = Patient_progress_note::with(['doctor', 'progressNote'])->select('id', 'doctor_id', 'progress_note_canned_text_id', 'voice_recognition', 'created_at', 'summery')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_insurer = Patient_insurer::where(['patient_id' => $id, 'status' => 'active'])->select('insurer_name', 'insurance_number')->orderBy('id', 'desc')->first();
        $Patient_past_medical_history = Patient_past_medical_history::select('id', 'diseases_name', 'describe', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_past_surgical_history = Patient_past_surgical_history::select('id', 'diseases_name', 'describe', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_current_med = Patient_current_med::select('id', 'drug_name', 'frequency', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        // $Patient_future_plan = Patient_future_plan::select('id', 'date', 'plan_text')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        // $Procedure = Procedure::select('id', 'procedure_name', 'summary', 'created_at', 'entry')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Prescription = Prescription::select('id', 'prescription', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
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
        // $Prescription = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'Prescription', 'patient_id' => $id])->orderBy('id', 'desc')->get();
        $SpecialInvestigations = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'SpecialInvestigation', 'patient_id' => $id, 'form_type' => 'ShoulderPain'])->orderBy('id', 'desc')->get();
        $ElegibilitySTATUS = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'ElegibilitySTATUS', 'patient_id' => $id, 'form_type' => 'ShoulderPain'])->orderBy('id', 'desc')->get();

        $Interventions = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'Intervention', 'patient_id' => $id])->orderBy('id', 'desc')->get();
        $MDTs = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'MDT', 'patient_id' => $id, 'form_type' => 'ShoulderPain'])->orderBy('id', 'desc')->get();
        $Labs = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'Lab', 'patient_id' => $id, 'form_type' => 'ShoulderPain'])->orderBy('id', 'desc')->get();

        $checkGenerateData = DB::table('general_reports')->where(['form_type' => 'ShoulderPain', 'patient_id' => $id])->get();
        $document_file = AttachDocument::where(['form_type' => 'ShoulderPain', 'patient_id' => $id])->get();



        $data = [
            'patient' => $patient,
            'id' => Crypt::encrypt($id),
            'patient_past_history' => $Patient_past_medical_history,
            'patient_past_surgical' => $Patient_past_surgical_history,
            'patient_current_med' => $Patient_current_med,
            'patient_future_plans' => $Patient_future_plan,
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
            'Patient_order_labs' => $Patient_order_labs,
            'supportiveTreatments' => $SupportiveTreatment,
            'Patient_progress_notes' => $Patient_progress_note,
            'Imaging' => $Imaging,
            'ClinicalIndicator_db' => $ClinicalIndicator,
            'ClinicalExam_db' => $ClinicalExam,
            'viewForm'   => $Viewimage,
            'checkGenerateData' => $checkGenerateData,
            'document_file' => $document_file


        ];

        return view('back/view-shoulder-pain-report')->with($data);
    }



    // msk_pain_report form edit method
    public function editMSKPainEligibilityForms(Request $request)
    {
        $id = decrypt($request->patient_id);
        // $id = decrypt();
        $ThyroidDiagnosis = ThyroidDiagnosis::query();

        $diagnosis_general = $ThyroidDiagnosis->select('data_value')->where(['title_name' => 'diagnosis_general', 'patient_id' => $id, 'form_type' => 'msk_pain_report'])->get();
        $diagnosis_cid = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'diagnosis_cid', 'patient_id' => $id, 'form_type' => 'msk_pain_report'])->get();
        $VaricoceleEmboForm = DB::table('patient_thyroid_diagnosis')->select('id', 'AnnotateimageData')->whereNotNull('AnnotateimageData')->where(['patient_id' => $id, 'form_type' => 'msk_pain_report'])->latest('id')->first();

        // dd($VaricoceleEmboForm);
        $symptoms = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'symptoms', 'patient_id' => $id, 'form_type' => 'msk_pain_report'])->get();
        $Imaging = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'Imaging', 'patient_id' => $id, 'form_type' => 'msk_pain_report'])->orderBy('id', 'desc')->first();
        $symptoms_scores = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'symptoms_score', 'patient_id' => $id, 'form_type' => 'msk_pain_report'])->first();

        $Referrals = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'Referral', 'patient_id' => $id, 'form_type' => 'msk_pain_report'])->first();
        $supportives = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'supportive', 'patient_id' => $id, 'form_type' => 'msk_pain_report'])->first();
        $SpecialInvestigations = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'SpecialInvestigation', 'patient_id' => $id, 'form_type' => 'msk_pain_report'])->first();
        $ElegibilitySTATUS = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'ElegibilitySTATUS', 'patient_id' => $id, 'form_type' => 'msk_pain_report'])->first();
        $Interventions = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'Intervention', 'patient_id' => $id, 'form_type' => 'msk_pain_report'])->first();
        $Prescription = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'Prescription', 'patient_id' => $id, 'form_type' => 'msk_pain_report'])->first();
        // dd($Prescription);
        $MDTs = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'MDT', 'patient_id' => $id, 'form_type' => 'msk_pain_report'])->first();
        $Labs = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'Lab', 'patient_id' => $id, 'form_type' => 'msk_pain_report'])->first();
        $AntithyroidAntibodiesTests = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'AntithyroidAntibodiesTests', 'patient_id' => $id, 'form_type' => 'msk_pain_report'])->first();
        $ClinicalIndicator = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'ClinicalIndicator', 'patient_id' => $id, 'form_type' => 'msk_pain_report'])->first();
        $ClinicalExam = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'ClinicalExam', 'patient_id' => $id, 'form_type' => 'msk_pain_report'])->first();

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
            'VaricoceleEmboForm'=>$VaricoceleEmboForm,
            'Imaging' => $Imaging,
            'Prescription' => $Prescription


        ];
        return view('back/Edit_msk_pain', $data);
    }

    // msk_pain_report form update method
    public function updateMSKPainEligibilityForms(Request $request)
    {
        ThyroidDiagnosis::where(['form_type' => 'msk_pain_report', 'patient_id' => decrypt($request->patient_id)])->delete();

        // dd($request->all());
        $this->storeMSKPainEligibilityForms($request);
        $patientId =  $request->patient_id;

        return response()->json(['patient_id' => $patientId]);
    }


    // msk_pain_report form store method
    public function storeMSKPainEligibilityForms(Request $request)
    {

        $doctor_id = auth()->guard('doctor')->id();

        $id = decrypt($request->patient_id);
        $dataToInsert = [];

        $newFileName = '';
        $fileName = time();
        if ($request->input('canvasImage')) {
            $canvasImage = trim($request->input('canvasImage'));

            $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $canvasImage));

            $newFileName = $fileName.'.png'; // You can change the file extension based on the image type

            $filePath = public_path('assets/thyroid-eligibility-form/') . $newFileName;

            file_put_contents($filePath, $imageData);
        }

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
                    'AnnotateimageData' => $newFileName,
                    'form_type' => 'msk_pain_report'
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
                    'AnnotateimageData' => $newFileName,
                    'form_type' => 'msk_pain_report'
                ];
            }
        }
        $data = $request->symptoms;
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
                    'AnnotateimageData' => $newFileName,
                    'form_type' => 'msk_pain_report'
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
                    'AnnotateimageData' => $newFileName,
                    'form_type' => 'msk_pain_report'
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
                    'AnnotateimageData' => $newFileName,
                    'form_type' => 'msk_pain_report'
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
                    'AnnotateimageData' => $newFileName,
                    'form_type' => 'msk_pain_report'
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
                    'AnnotateimageData' => $newFileName,
                    'form_type' => 'msk_pain_report'
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
                    'AnnotateimageData' => $newFileName,
                    'form_type' => 'msk_pain_report'
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
                    'AnnotateimageData' => $newFileName,
                    'form_type' => 'msk_pain_report'
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
                    'AnnotateimageData' => $newFileName,
                    'form_type' => 'msk_pain_report'
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
                    'AnnotateimageData' => $newFileName,
                    'form_type' => 'msk_pain_report'
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
                    'AnnotateimageData' => $newFileName,
                    'form_type' => 'msk_pain_report'
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
                    'AnnotateimageData' => $newFileName,
                    'form_type' => 'msk_pain_report'
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
                    'AnnotateimageData' => $newFileName,
                    'form_type' => 'msk_pain_report'
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
                    'AnnotateimageData' => $newFileName,
                    'form_type' => 'msk_pain_report'
                ];
            }
        }




        if (!empty($dataToInsert)) {
            ThyroidDiagnosis::insert($dataToInsert);
        }
        if($newFileName) ThyroidDiagnosis::where(['patient_id' => $id,'form_type' => 'msk_pain_report','doctor_id' => $doctor_id])->update(['AnnotateimageData' => $newFileName]);

        $patientId =  $request->patient_id;

        return response()->json(['patient_id' => $patientId]);
    }

    // msk_pain_report form view method Edit_varicose_ablation
    public function viewMSKPainEligibilityForms(Request $request, $id)
    {
        $id = Crypt::decrypt($id);
        $patient = User::findOrFail($id);

        // $Patient_order_labs= Task::where(['patient_id'=>$id,'form_type'=>'general_form','approveDocumentSts'=>'1'])->get();
        $Patient_order_labs = Task::where(['patient_id' => $id, 'form_type' => 'general_form'])->get();


        $Patient_future_plan = Patient_future_plan::with('doctor')->select('id', 'doctor_id', 'date', 'plan_text', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Procedure = Procedure::with('doctor')->select('id', 'doctor_id', 'procedure_name', 'summary', 'created_at', 'entry')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $SupportiveTreatment = SupportiveTreatment::with('doctor')->select('id', 'doctor_id', 'title', 'sub_title', 'created_at', 'treatment')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_progress_note = Patient_progress_note::with(['doctor', 'progressNote'])->select('id', 'doctor_id', 'progress_note_canned_text_id', 'voice_recognition', 'created_at', 'summery')->where('patient_id', $id)->orderBy('id', 'desc')->get();

        $Patient_insurer = Patient_insurer::where(['patient_id' => $id, 'status' => 'active'])->select('insurer_name', 'insurance_number')->orderBy('id', 'desc')->first();
        $Patient_past_medical_history = Patient_past_medical_history::select('id', 'diseases_name', 'describe', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_past_surgical_history = Patient_past_surgical_history::select('id', 'diseases_name', 'describe', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_current_med = Patient_current_med::select('id', 'drug_name', 'frequency', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();

        // $Procedure = Procedure::select('id', 'procedure_name', 'summary', 'created_at', 'entry')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Prescription = Prescription::select('id', 'prescription', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $ThyroidDiagnosis = ThyroidDiagnosis::query();
        $diagnosis_cid = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'diagnosis_cid', 'patient_id' => $id, 'form_type' => 'msk_pain_report'])->orderBy('id', 'desc')->get();
        $Imaging = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'Imaging', 'patient_id' => $id, 'form_type' => 'msk_pain_report'])->orderBy('id', 'desc')->get();

        $diagnosis_general = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'diagnosis_general', 'patient_id' => $id, 'form_type' => 'msk_pain_report'])->orderBy('id', 'desc')->get();
        $ClinicalIndicator = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'ClinicalIndicator', 'patient_id' => $id, 'form_type' => 'msk_pain_report'])->orderBy('id', 'desc')->get();
        $ClinicalExam = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'ClinicalExam', 'patient_id' => $id, 'form_type' => 'msk_pain_report'])->orderBy('id', 'desc')->get();

        $symptoms = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'symptoms', 'patient_id' => $id, 'form_type' => 'msk_pain_report'])->orderBy('id', 'desc')->get();
        // dd($symptoms);
        $symptoms_scores = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'symptoms_score', 'patient_id' => $id, 'form_type' => 'msk_pain_report'])->orderBy('id', 'desc')->get();

        $Referrals = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'Referral', 'patient_id' => $id])->orderBy('id', 'desc')->get();
        $supportives = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'supportive', 'patient_id' => $id])->orderBy('id', 'desc')->get();

        $SpecialInvestigations = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'SpecialInvestigation', 'patient_id' => $id, 'form_type' => 'msk_pain_report'])->orderBy('id', 'desc')->get();
        $ElegibilitySTATUS = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'ElegibilitySTATUS', 'patient_id' => $id, 'form_type' => 'msk_pain_report'])->orderBy('id', 'desc')->get();

        $Interventions = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'Intervention', 'patient_id' => $id])->orderBy('id', 'desc')->get();
        $MDTs = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'MDT', 'patient_id' => $id, 'form_type' => 'msk_pain_report'])->orderBy('id', 'desc')->get();
        $Labs = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'Lab', 'patient_id' => $id, 'form_type' => 'msk_pain_report'])->orderBy('id', 'desc')->get();

        $checkGenerateData = DB::table('general_reports')->where(['form_type' => 'msk_pain_report', 'patient_id' => $id])->get();
        $document_file = AttachDocument::where(['form_type' => 'msk_pain_report', 'patient_id' => $id])->get();


        $data = [
            'patient' => $patient,
            'id' => Crypt::encrypt($id),
            'patient_past_history' => $Patient_past_medical_history,
            'patient_past_surgical' => $Patient_past_surgical_history,
            'patient_current_med' => $Patient_current_med,
            'patient_future_plans' => $Patient_future_plan,
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
            'Patient_order_labs' => $Patient_order_labs,
            'supportiveTreatments' => $SupportiveTreatment,
            'Patient_progress_notes' => $Patient_progress_note,
            'Imaging' => $Imaging,
            'ClinicalIndicator_db' => $ClinicalIndicator,
            'ClinicalExam_db' => $ClinicalExam,
            'checkGenerateData' => $checkGenerateData,
            'document_file' => $document_file




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
        $VaricoceleEmboForm = DB::table('patient_thyroid_diagnosis')->select('id', 'AnnotateimageData')->where(['patient_id' => $id, 'form_type' => 'SpinePain'])->latest('id')->first();

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
            'VaricoceleEmboForm'=>$VaricoceleEmboForm,
            'MDTs' => $MDTs,
            'Labs' => $Labs,
            'AntithyroidAntibodiesTests' => $AntithyroidAntibodiesTests,
            'clinical_indicators' => $ClinicalIndicator,
            'ClinicalExam' => $ClinicalExam,
            'Imaging' => $Imaging,
            'Prescription' => $Prescription


        ];
        return view('back/Edit_spine_pain', $data);
    }

    // SpinePain form update method
    public function updateSpinePainEligibilityForms(Request $request)
    {
        ThyroidDiagnosis::where(['form_type' => 'SpinePain', 'patient_id' => decrypt($request->patient_id)],)->delete();

        $this->storeSpinePainEligibilityForms($request);
        $patientId =  $request->patient_id;

        return response()->json(['patient_id' => $patientId]);
    }


    // SpinePain form store method
    public function storeSpinePainEligibilityForms(Request $request)
    {

        $doctor_id = auth()->guard('doctor')->id();

        $id = decrypt($request->patient_id);
        $dataToInsert = [];

        if ($request->input('canvasImage')) {
            $canvasImage = $request->input('canvasImage');

            $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $canvasImage));

            $newFileName = time().'.png'; // You can change the file extension based on the image type

            $filePath = public_path('assets/thyroid-eligibility-form/') . $newFileName;

            file_put_contents($filePath, $imageData);
        } else {
            $newFileName = '';
        }


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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
                    'form_type' => 'SpinePain'
                ];
            }
        }
        $data = $request->symptoms;
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
                    'form_type' => 'SpinePain'
                ];
            }
        }




        if (!empty($dataToInsert)) {
            ThyroidDiagnosis::insert($dataToInsert);
        }

        if($newFileName) ThyroidDiagnosis::where(['patient_id' => $id,'form_type' => 'SpinePain','doctor_id' => $doctor_id])->update(['AnnotateimageData' => $newFileName]);


        $patientId =  $request->patient_id;

        return response()->json(['patient_id' => $patientId]);
    }

    // SpinePain form view method Edit_varicose_ablation
    public function viewSpinePainEligibilityForms(Request $request, $id)
    {
        $id = Crypt::decrypt($id);
        $patient = User::findOrFail($id);

        // $Patient_order_labs= Task::where(['patient_id'=>$id,'form_type'=>'general_form','approveDocumentSts'=>'1'])->get();
        $Patient_order_labs = Task::where(['patient_id' => $id, 'form_type' => 'SpinePain'])->get();


        $Patient_future_plan = Patient_future_plan::with('doctor')->select('id', 'doctor_id', 'date', 'plan_text', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Procedure = Procedure::with('doctor')->select('id', 'doctor_id', 'procedure_name', 'summary', 'created_at', 'entry')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $SupportiveTreatment = SupportiveTreatment::with('doctor')->select('id', 'doctor_id', 'title', 'sub_title', 'created_at', 'treatment')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_progress_note = Patient_progress_note::with(['doctor', 'progressNote'])->select('id', 'doctor_id', 'progress_note_canned_text_id', 'voice_recognition', 'created_at', 'summery')->where('patient_id', $id)->orderBy('id', 'desc')->get();

        $Patient_insurer = Patient_insurer::where(['patient_id' => $id, 'status' => 'active'])->select('insurer_name', 'insurance_number')->orderBy('id', 'desc')->first();
        $Patient_past_medical_history = Patient_past_medical_history::select('id', 'diseases_name', 'describe', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_past_surgical_history = Patient_past_surgical_history::select('id', 'diseases_name', 'describe', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_current_med = Patient_current_med::select('id', 'drug_name', 'frequency', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();


        $Prescription = Prescription::select('id', 'prescription', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
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

        $SpecialInvestigations = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'SpecialInvestigation', 'patient_id' => $id, 'form_type' => 'SpinePain'])->orderBy('id', 'desc')->get();
        $ElegibilitySTATUS = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'ElegibilitySTATUS', 'patient_id' => $id, 'form_type' => 'SpinePain'])->orderBy('id', 'desc')->get();

        $Interventions = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'Intervention', 'patient_id' => $id])->orderBy('id', 'desc')->get();
        $MDTs = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'MDT', 'patient_id' => $id, 'form_type' => 'SpinePain'])->orderBy('id', 'desc')->get();
        $Labs = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'Lab', 'patient_id' => $id, 'form_type' => 'SpinePain'])->orderBy('id', 'desc')->get();

        $checkGenerateData = DB::table('general_reports')->where(['form_type' => 'print_form', 'patient_id' => $id])->get();

        $document_file = AttachDocument::where(['form_type' => 'spine_pain', 'patient_id' => $id])->get();


        $data = [
            'patient' => $patient,
            'id' => Crypt::encrypt($id),
            'patient_past_history' => $Patient_past_medical_history,
            'patient_past_surgical' => $Patient_past_surgical_history,
            'patient_current_med' => $Patient_current_med,
            'patient_future_plans' => $Patient_future_plan,
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
            'Patient_order_labs' => $Patient_order_labs,
            'supportiveTreatments' => $SupportiveTreatment,
            'Patient_progress_notes' => $Patient_progress_note,
            'Imaging' => $Imaging,
            'ClinicalIndicator_db' => $ClinicalIndicator,
            'ClinicalExam_db' => $ClinicalExam,
            'checkGenerateData' => $checkGenerateData,
            'document_file' => $document_file


        ];

        return view('back/view-spine-pain-report')->with($data);
    }


    // KneePain form store method
    public function storeKneePainEligibilityForms(Request $request)
    {

        if ($request->input('canvasImage')) {
            $canvasImage = $request->input('canvasImage');

            $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $canvasImage));

            $newFileName = time().'.png'; // You can change the file extension based on the image type

            $filePath = public_path('assets/thyroid-eligibility-form/') . $newFileName;

            file_put_contents($filePath, $imageData);
        } else {
            $newFileName = '';
        }


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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
                    'form_type' => 'KneePain'
                ];
            }
        }
        $data = $request->symptoms;
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
                    'form_type' => 'KneePain'
                ];
            }
        }




        if (!empty($dataToInsert)) {
            ThyroidDiagnosis::insert($dataToInsert);
        }
        if($newFileName) ThyroidDiagnosis::where(['patient_id' => $id,'form_type' => 'KneePain','doctor_id' => $doctor_id])->update(['AnnotateimageData' => $newFileName]);


        $patientId =  $request->patient_id;

        return response()->json(['patient_id' => $patientId]);
    }

    // knee pain form view method Edit_varicose_ablation
    public function viewKneePainEligibilityForms(Request $request, $id)
    {
        $id = Crypt::decrypt($id);
        $patient = User::findOrFail($id);

        // $Patient_order_labs= Task::where(['patient_id'=>$id,'form_type'=>'general_form','approveDocumentSts'=>'1'])->get();
        $Patient_order_labs = Task::where(['patient_id' => $id, 'form_type' => 'KneePain'])->get();


        $viewForm = DB::table('patient_thyroid_diagnosis')->select('id', 'AnnotateimageData')->where(['patient_id' => $id, 'form_type' => 'KneePain'])->latest('id')->first();


        $Patient_future_plan = Patient_future_plan::with('doctor')->select('id', 'doctor_id', 'date', 'plan_text', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Procedure = Procedure::with('doctor')->select('id', 'doctor_id', 'procedure_name', 'summary', 'created_at', 'entry')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $SupportiveTreatment = SupportiveTreatment::with('doctor')->select('id', 'doctor_id', 'title', 'sub_title', 'created_at', 'treatment')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_progress_note = Patient_progress_note::with(['doctor', 'progressNote'])->select('id', 'doctor_id', 'progress_note_canned_text_id', 'voice_recognition', 'created_at', 'summery')->where('patient_id', $id)->orderBy('id', 'desc')->get();

        $Patient_insurer = Patient_insurer::where(['patient_id' => $id, 'status' => 'active'])->select('insurer_name', 'insurance_number')->orderBy('id', 'desc')->first();
        $Patient_past_medical_history = Patient_past_medical_history::select('id', 'diseases_name', 'describe', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_past_surgical_history = Patient_past_surgical_history::select('id', 'diseases_name', 'describe', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_current_med = Patient_current_med::select('id', 'drug_name', 'frequency', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();


        $Prescription = Prescription::select('id', 'prescription', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
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

        $SpecialInvestigations = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'SpecialInvestigation', 'patient_id' => $id, 'form_type' => 'KneePain'])->orderBy('id', 'desc')->get();
        $ElegibilitySTATUS = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'ElegibilitySTATUS', 'patient_id' => $id, 'form_type' => 'KneePain'])->orderBy('id', 'desc')->get();

        $Interventions = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'Intervention', 'patient_id' => $id])->orderBy('id', 'desc')->get();
        $MDTs = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'MDT', 'patient_id' => $id, 'form_type' => 'KneePain'])->orderBy('id', 'desc')->get();
        $Labs = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'Lab', 'patient_id' => $id, 'form_type' => 'KneePain'])->orderBy('id', 'desc')->get();

        $checkGenerateData = DB::table('general_reports')->where(['form_type' => 'KneePain', 'patient_id' => $id])->get();
        $document_file = AttachDocument::where(['form_type' => 'KneePain', 'patient_id' => $id])->get();


        $data = [
            'patient' => $patient,
            'id' => Crypt::encrypt($id),
            'patient_past_history' => $Patient_past_medical_history,
            'patient_past_surgical' => $Patient_past_surgical_history,
            'patient_current_med' => $Patient_current_med,
            'patient_future_plans' => $Patient_future_plan,
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
            'Patient_order_labs' => $Patient_order_labs,
            'supportiveTreatments' => $SupportiveTreatment,
            'Patient_progress_notes' => $Patient_progress_note,
            'Imaging' => $Imaging,
            'ClinicalIndicator_db' => $ClinicalIndicator,
            'ClinicalExam_db' => $ClinicalExam,
            'viewForm'  => $viewForm,
            'checkGenerateData' => $checkGenerateData,
            'document_file' => $document_file


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

        $VaricoceleEmboForm = DB::table('patient_thyroid_diagnosis')->select('id', 'AnnotateimageData')->where(['patient_id' => $id, 'form_type' => 'KneePain'])->latest('id')->first();

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
            'Imaging' => $Imaging,
            'Prescription' => $Prescription,
            'VaricoceleEmboForm' => $VaricoceleEmboForm
        ];
        return view('back/Edit_knee_pain', $data);
    }

    // KneePain form update method
    public function updateKneePainEligibilityForms(Request $request)
    {
        ThyroidDiagnosis::where(['form_type' => 'KneePain', 'patient_id' => decrypt($request->patient_id)])->delete();

        $this->storeKneePainEligibilityForms($request);
        $patientId =  $request->patient_id;

        return response()->json(['patient_id' => $patientId]);
    }
    // HaemorrhoidsEmbo form store method
    public function storeHaemorrhoidsEmboEligibilityForms(Request $request)
    {

        $doctor_id = auth()->guard('doctor')->id();

        $id = decrypt($request->patient_id);
        $dataToInsert = [];


        if ($request->input('canvasImage')) {
            $canvasImage = $request->input('canvasImage');

            $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $canvasImage));

            $newFileName = time().'.png'; // You can change the file extension based on the image type

            $filePath = public_path('assets/thyroid-eligibility-form/') . $newFileName;

            file_put_contents($filePath, $imageData);
        } else {
            $newFileName = '';
        }




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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
                    'form_type' => 'HaemorrhoidsEmbo'
                ];
            }
        }
        $data = $request->symptoms;
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
                    'form_type' => 'HaemorrhoidsEmbo'
                ];
            }
        }

        if (!empty($dataToInsert)) {
            ThyroidDiagnosis::insert($dataToInsert);
        }
        if($newFileName) ThyroidDiagnosis::where(['patient_id' => $id,'form_type' => 'HaemorrhoidsEmbo','doctor_id' => $doctor_id])->update(['AnnotateimageData' => $newFileName]);


        $patientId =  $request->patient_id;

        return response()->json(['patient_id' => $patientId]);
    }
    // HaemorrhoidsEmbo form view method Edit_varicose_ablation
    public function viewHaemorrhoidsEmboEligibilityForms(Request $request, $id)
    {
        $id = Crypt::decrypt($id);
        $patient = User::findOrFail($id);

        //  $Patient_order_labs= Task::where(['patient_id'=>$id,'form_type'=>'general_form','approveDocumentSts'=>'1'])->get();
        $Patient_order_labs = Task::where(['patient_id' => $id, 'form_type' => 'HaemorrhoidsEmbo'])->get();


        $ViewImage = DB::table('patient_thyroid_diagnosis')->select('id', 'AnnotateimageData')->where(['patient_id' => $id, 'form_type' => 'HaemorrhoidsEmbo'])->latest('id')->first();



        $Patient_future_plan = Patient_future_plan::with('doctor')->select('id', 'doctor_id', 'date', 'plan_text', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Procedure = Procedure::with('doctor')->select('id', 'doctor_id', 'procedure_name', 'summary', 'created_at', 'entry')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $SupportiveTreatment = SupportiveTreatment::with('doctor')->select('id', 'doctor_id', 'title', 'sub_title', 'created_at', 'treatment')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_progress_note = Patient_progress_note::with(['doctor', 'progressNote'])->select('id', 'doctor_id', 'progress_note_canned_text_id', 'voice_recognition', 'created_at', 'summery')->where('patient_id', $id)->orderBy('id', 'desc')->get();

        $Patient_insurer = Patient_insurer::where(['patient_id' => $id, 'status' => 'active'])->select('insurer_name', 'insurance_number')->orderBy('id', 'desc')->first();
        $Patient_past_medical_history = Patient_past_medical_history::select('id', 'diseases_name', 'describe', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_past_surgical_history = Patient_past_surgical_history::select('id', 'diseases_name', 'describe', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_current_med = Patient_current_med::select('id', 'drug_name', 'frequency', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();


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
        $Labs = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'Lab', 'patient_id' => $id, 'form_type' => 'HaemorrhoidsEmbo'])->orderBy('id', 'desc')->get();

        $checkGenerateData = DB::table('general_reports')->where(['form_type' => 'HaemorrhoidsEmbo', 'patient_id' => $id])->get();
        $document_file = AttachDocument::where(['form_type' => 'HaemorrhoidsEmbo', 'patient_id' => $id])->get();


        $data = [
            'patient' => $patient,
            'id' => Crypt::encrypt($id),
            'patient_past_history' => $Patient_past_medical_history,
            'patient_past_surgical' => $Patient_past_surgical_history,
            'patient_current_med' => $Patient_current_med,
            'patient_future_plans' => $Patient_future_plan,
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
            'Patient_order_labs' => $Patient_order_labs,
            'supportiveTreatments' => $SupportiveTreatment,
            'Patient_progress_notes' => $Patient_progress_note,
            'Imaging' => $Imaging,
            'ClinicalIndicator_db' => $ClinicalIndicator,
            'ClinicalExam_db' => $ClinicalExam,
            'ViewImage'      => $ViewImage,
            'checkGenerateData' => $checkGenerateData,
            'document_file' => $document_file
        ];

        return view('back/view-haemorrhoids-embo-report')->with($data);
    }

    // HaemorrhoidsEmbo form edit method
    public function editHaemorrhoidsEmboEligibilityForms(Request $request)
    {

        $id = decrypt($request->patient_id);
        // $id = decrypt();
        $ThyroidDiagnosis = ThyroidDiagnosis::query();


        $VaricoceleEmboForm = DB::table('patient_thyroid_diagnosis')->select('id', 'AnnotateimageData')->where(['patient_id' => $id, 'form_type' => 'HaemorrhoidsEmbo'])->latest('id')->first();


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
            'VaricoceleEmboForm' => $VaricoceleEmboForm,
            'AntithyroidAntibodiesTests' => $AntithyroidAntibodiesTests,
            'clinical_indicators' => $ClinicalIndicator,
            'ClinicalExam' => $ClinicalExam,
            'Imaging' => $Imaging


        ];
        return view('back/Edit_haemorrhoids_embo', $data);
    }

    // HaemorrhoidsEmbo form update method
    public function updateHaemorrhoidsEmboEligibilityForms(Request $request)
    {
        ThyroidDiagnosis::where(['form_type' => 'HaemorrhoidsEmbo', 'patient_id' => decrypt($request->patient_id)])->delete();

        $this->storeHaemorrhoidsEmboEligibilityForms($request);
        $patientId =  $request->patient_id;

        return response()->json(['patient_id' => $patientId]);
    }



    public function storeVaricoseAblationEligibilityForms(Request $request)
    {

        $doctor_id = auth()->guard('doctor')->id();

        $id = decrypt($request->patient_id);

        $dataToInsert = [];

        if ($request->input('canvasImage')) {
            $canvasImage = $request->input('canvasImage');

            $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $canvasImage));

            $newFileName = time().'.png'; // You can change the file extension based on the image type

            $filePath = public_path('assets/thyroid-eligibility-form/') . $newFileName;

            file_put_contents($filePath, $imageData);
        } else {
            $newFileName = '';
        }

        

        // dd($request->all());

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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
                    'form_type' => 'VaricoseAblation'
                ];
            }
        }
        $data = $request->symptoms;
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
                    'form_type' => 'VaricoseAblation'
                ];
            }
        }

        if (!empty($dataToInsert)) {
            ThyroidDiagnosis::insert($dataToInsert);
        }
        
        
        $patientId =  $request->patient_id;
        
        if($newFileName){
            ThyroidDiagnosis::where(['patient_id'=>$id,'doctor_id' => $doctor_id,'form_type' => 'VaricoseAblation'])->update(['AnnotateimageData' => $newFileName]);
        }
        // dd($dataToInsert);

        return response()->json(['patient_id' => $patientId]);

        // return redirect()->route('user.updateVaricoseAblationEligibilityForms')->with('success', 'Your success message here!');



    }



    // VaricoseAblation form edit method
    public function editVaricoseAblationEligibilityForms(Request $request)
    {
        $id = decrypt($request->patient_id);
        // $id = decrypt();
        $ThyroidDiagnosis = ThyroidDiagnosis::query();

        $VaricoceleEmboForm = DB::table('patient_thyroid_diagnosis')->select('id', 'AnnotateimageData')->where(['patient_id' => $id, 'form_type' => 'VaricoseAblation'])->latest('id')->first();
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
            'Imaging' => $Imaging,
            'VaricoceleEmboForm' => $VaricoceleEmboForm
        ];
        return view('back/Edit_varicose_ablation', $data);
    }


    // VaricoseAblation form update method   
    public function updateVaricoseAblationEligibilityForms(Request $request)
    {

        ThyroidDiagnosis::where(['form_type' => 'VaricoseAblation', 'patient_id' => decrypt($request->patient_id)])->delete();
        $this->storeVaricoseAblationEligibilityForms($request);
        $patientId =  $request->patient_id;
        // dd($request->all());

        return response()->json(['patient_id' => $patientId]);
        // return redirect()->route('user.viewVaricoseAblationEligibilityForms', ['id' => $patientId])->with('updateVaricoseAblationEligibilityForms', 'Form updated successfully!');
    }

    // VaricoseAblation form view method Edit_varicose_ablation
    public function viewVaricoseAblationEligibilityForms(Request $request, $id)
    {
        $id = Crypt::decrypt($id);
        $patient = User::findOrFail($id);

        // $Patient_order_labs= Task::where(['patient_id'=>$id,'form_type'=>'general_form','approveDocumentSts'=>'1'])->get();
        $Patient_order_labs = Task::where(['patient_id' => $id, 'form_type' => 'VaricoseAblation'])->get();


        $viewImage = DB::table('patient_thyroid_diagnosis')->select('id', 'AnnotateimageData')->where(['patient_id' => $id, 'form_type' => 'VaricoceleEmboForm'])->latest('id')->first();



        $Patient_future_plan = Patient_future_plan::with('doctor')->select('id', 'doctor_id', 'date', 'plan_text', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Procedure = Procedure::with('doctor')->select('id', 'doctor_id', 'procedure_name', 'summary', 'created_at', 'entry')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $SupportiveTreatment = SupportiveTreatment::with('doctor')->select('id', 'doctor_id', 'title', 'sub_title', 'created_at', 'treatment')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_progress_note = Patient_progress_note::with(['doctor', 'progressNote'])->select('id', 'doctor_id', 'progress_note_canned_text_id', 'voice_recognition', 'created_at', 'summery')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_insurer = Patient_insurer::where(['patient_id' => $id, 'status' => 'active'])->select('insurer_name', 'insurance_number')->orderBy('id', 'desc')->first();
        $Patient_past_medical_history = Patient_past_medical_history::select('id', 'diseases_name', 'describe', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_past_surgical_history = Patient_past_surgical_history::select('id', 'diseases_name', 'describe', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_current_med = Patient_current_med::select('id', 'drug_name', 'frequency', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();


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
        $Labs = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'Lab', 'patient_id' => $id, 'form_type' => 'VaricoseAblation'])->orderBy('id', 'desc')->get();

        $checkGenerateData = DB::table('general_reports')->where(['form_type' => 'VaricoseAblation', 'patient_id' => $id])->get();
        $document_file = AttachDocument::where(['form_type' => 'VaricoseAblation', 'patient_id' => $id])->get();

        $data = [
            'patient' => $patient,
            'id' => Crypt::encrypt($id),
            'patient_past_history' => $Patient_past_medical_history,
            'patient_past_surgical' => $Patient_past_surgical_history,
            'patient_current_med' => $Patient_current_med,
            'patient_future_plans' => $Patient_future_plan,
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
            'Patient_order_labs' => $Patient_order_labs,
            'supportiveTreatments' => $SupportiveTreatment,
            'Patient_progress_notes' => $Patient_progress_note,
            'Imaging' => $Imaging,
            'ClinicalIndicator_db' => $ClinicalIndicator,
            'ClinicalExam_db' => $ClinicalExam,
            'viewImage'  => $viewImage,
            'checkGenerateData' => $checkGenerateData,
            'document_file' => $document_file

        ];

        return view('back/view-varicose-ablation-report')->with($data);
    }

    // PelvicCongEmbo form store method
    public function storePelvicCongEmboEligibilityForms(Request $request)
    {

        $doctor_id = auth()->guard('doctor')->id();

        $id = decrypt($request->patient_id);
        $dataToInsert = [];

        if ($request->input('canvasImage')) {
            $canvasImage = $request->input('canvasImage');

            $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $canvasImage));

            // return $imageData;

            $newFileName = time().'.png'; // You can change the file extension based on the image type

            $filePath = public_path('assets/thyroid-eligibility-form/') . $newFileName;

            file_put_contents($filePath, $imageData);
        } else {
            $newFileName = '';
        }


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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
                    'form_type' => 'PelvicCongEmbo'
                ];
            }
        }
        $data = $request->symptoms;
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
                    'form_type' => 'PelvicCongEmbo'
                ];
            }
        }




        if (!empty($dataToInsert)) {
            ThyroidDiagnosis::insert($dataToInsert);
        }
        if($newFileName){
            ThyroidDiagnosis::where(['patient_id'=>$id,'doctor_id' => $doctor_id,'form_type' => 'PelvicCongEmbo'])->update(['AnnotateimageData' => $newFileName]);
        }
        

        $patientId =  $request->patient_id;

        return response()->json(['patient_id' => $patientId]);
    }
    // PelvicCongEmbo form edit method
    public function editPelvicCongEmboEligibilityForms(Request $request)
    {
        $id = decrypt($request->patient_id);
        // $id = decrypt();
        $ThyroidDiagnosis = ThyroidDiagnosis::query();


        $VaricoceleEmboForm = DB::table('patient_thyroid_diagnosis')->select('id', 'AnnotateimageData')->where(['patient_id' => $id, 'form_type' => 'PelvicCongEmbo'])->latest('id')->first();


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
            'Imaging' => $Imaging,
            'VaricoceleEmboForm' => $VaricoceleEmboForm


        ];
        return view('back/Edit_pelvic_cong_embo', $data);
    }

    // PelvicCongEmbo form update method
    public function updatePelvicCongEmboEligibilityForms(Request $request)
    {
        ThyroidDiagnosis::where(['form_type' => 'PelvicCongEmbo', 'patient_id' => decrypt($request->patient_id)])->delete();

        $this->storePelvicCongEmboEligibilityForms($request);
        $patientId =  $request->patient_id;

        return response()->json(['patient_id' => $patientId]);
    }



    public function viewPelvicCongEmboEligibilityForms(Request $request, $id)
    {
        $id = Crypt::decrypt($id);
        $patient = User::findOrFail($id);

        $Patient_order_labs = Task::where(['patient_id' => $id, 'form_type' => 'PelvicCongEmbo'])->get();

        $viewForm = DB::table('patient_thyroid_diagnosis')->select('id', 'AnnotateimageData')->where(['patient_id' => $id, 'form_type' => 'PelvicCongEmbo'])->latest('id')->first();


        $Patient_future_plan = Patient_future_plan::with('doctor')->select('id', 'doctor_id', 'date', 'plan_text', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Procedure = Procedure::with('doctor')->select('id', 'doctor_id', 'procedure_name', 'summary', 'created_at', 'entry')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $SupportiveTreatment = SupportiveTreatment::with('doctor')->select('id', 'doctor_id', 'title', 'sub_title', 'created_at', 'treatment')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_progress_note = Patient_progress_note::with(['doctor', 'progressNote'])->select('id', 'doctor_id', 'progress_note_canned_text_id', 'voice_recognition', 'created_at', 'summery')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_insurer = Patient_insurer::where(['patient_id' => $id, 'status' => 'active'])->select('insurer_name', 'insurance_number')->orderBy('id', 'desc')->first();
        $Patient_past_medical_history = Patient_past_medical_history::select('id', 'diseases_name', 'describe', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_past_surgical_history = Patient_past_surgical_history::select('id', 'diseases_name', 'describe', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_current_med = Patient_current_med::select('id', 'drug_name', 'frequency', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();


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
        $Labs = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'Lab', 'patient_id' => $id, 'form_type' => 'PelvicCongEmbo'])->orderBy('id', 'desc')->get();

        $checkGenerateData = DB::table('general_reports')->where(['form_type' => 'PelvicCongEmbo', 'patient_id' => $id])->get();
        $document_file = AttachDocument::where(['form_type' => 'view_pelvic_cong', 'patient_id' => $id])->get();

        $data = [
            'patient' => $patient,
            'id' => Crypt::encrypt($id),
            'patient_past_history' => $Patient_past_medical_history,
            'patient_past_surgical' => $Patient_past_surgical_history,
            'patient_current_med' => $Patient_current_med,
            'patient_future_plans' => $Patient_future_plan,
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
            'Patient_order_labs' => $Patient_order_labs,
            'supportiveTreatments' => $SupportiveTreatment,
            'Patient_progress_notes' => $Patient_progress_note,
            'Imaging' => $Imaging,
            'ClinicalIndicator_db' => $ClinicalIndicator,
            'ClinicalExam_db' => $ClinicalExam,
            'viewForm'        => $viewForm,
            'checkGenerateData' => $checkGenerateData,
            'document_file' => $document_file


        ];

        return view('back/view-pelvic-cong-embo-report')->with($data);
    }

    // uterine_embo form store method
    public function storeUterineEmboEligibilityForms(Request $request)
    {

        if ($request->input('canvasImage')) {
            $canvasImage = $request->input('canvasImage');

            $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $canvasImage));

            $newFileName = time().'.png'; // You can change the file extension based on the image type

            $filePath = public_path('assets/thyroid-eligibility-form/') . $newFileName;

            file_put_contents($filePath, $imageData);
        } else {
            $newFileName = '';
        }


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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
                    'form_type' => 'uterine_embo'
                ];
            }
        }
        $data = $request->symptoms;
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
                    'form_type' => 'uterine_embo'
                ];
            }
        }


        if (!empty($dataToInsert)) {
            ThyroidDiagnosis::insert($dataToInsert);
        }
        if($newFileName){
            ThyroidDiagnosis::where(['patient_id'=>$id,'doctor_id' => $doctor_id,'form_type' => 'uterine_embo'])->update(['AnnotateimageData' => $newFileName]);
        }

        $patientId =  $request->patient_id;

        return response()->json(['patient_id' => $patientId]);
    }


    // uterine_embo form edit method
    public function editUterineEmboEligibilityForms(Request $request)
    {

        $id = decrypt($request->patient_id);
        // $id = decrypt();
        $ThyroidDiagnosis = ThyroidDiagnosis::query();
        $diagnosis_general = $ThyroidDiagnosis->select('data_value')->where(['title_name' => 'diagnosis_general', 'patient_id' => $id, 'form_type' => 'uterine_embo'])->get();
        $diagnosis_cid = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'diagnosis_cid', 'patient_id' => $id, 'form_type' => 'uterine_embo'])->get();



        $postStateFormsImage = DB::table('patient_thyroid_diagnosis')->select('id', 'AnnotateimageData')->where(['patient_id' => $id, 'form_type' => 'uterine_embo'])->latest('id')->first();



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
            'postStateFormsImage' => $postStateFormsImage,
            'Imaging' => $Imaging


        ];
        return view('back/Edit_uterine_embo', $data);
    }
    // uterine_embo form update method
    public function updateUterineEmboEligibilityForms(Request $request)
    {
        ThyroidDiagnosis::where(['form_type' => 'uterine_embo', 'patient_id' => decrypt($request->patient_id)])->delete();

        $this->storeUterineEmboEligibilityForms($request);

        $patientId =  $request->patient_id;

        return response()->json(['patient_id' => $patientId]);
    }
    // uterine_embo form view method
    public function viewUterineEmboEligibilityForms(Request $request, $id)
    {
        $id = Crypt::decrypt($id);
        $patient = User::findOrFail($id);

        // $Patient_order_labs= Task::where(['patient_id'=>$id,'form_type'=>'general_form','approveDocumentSts'=>'1'])->get();
        $Patient_order_labs = Task::where(['patient_id' => $id, 'form_type' => 'uterine_embo'])->get();


        $viewImage = DB::table('patient_thyroid_diagnosis')->select('id', 'AnnotateimageData')->where(['patient_id' => $id, 'form_type' => 'uterine_embo'])->latest('id')->first();


        $Patient_future_plan = Patient_future_plan::with('doctor')->select('id', 'doctor_id', 'date', 'plan_text', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Procedure = Procedure::with('doctor')->select('id', 'doctor_id', 'procedure_name', 'summary', 'created_at', 'entry')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $SupportiveTreatment = SupportiveTreatment::with('doctor')->select('id', 'doctor_id', 'title', 'sub_title', 'created_at', 'treatment')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_progress_note = Patient_progress_note::with(['doctor', 'progressNote'])->select('id', 'doctor_id', 'progress_note_canned_text_id', 'voice_recognition', 'created_at', 'summery')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_insurer = Patient_insurer::where(['patient_id' => $id, 'status' => 'active'])->select('insurer_name', 'insurance_number')->orderBy('id', 'desc')->first();
        $Patient_past_medical_history = Patient_past_medical_history::select('id', 'diseases_name', 'describe', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_past_surgical_history = Patient_past_surgical_history::select('id', 'diseases_name', 'describe', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_current_med = Patient_current_med::select('id', 'drug_name', 'frequency', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();




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
        $Labs = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'Lab', 'patient_id' => $id, 'form_type' => 'uterine_embo'])->orderBy('id', 'desc')->get();

        $checkGenerateData = DB::table('general_reports')->where(['form_type' => 'uterine_embo', 'patient_id' => $id])->get();
        $document_file = AttachDocument::where(['form_type' => 'uterine_embo', 'patient_id' => $id])->get();



        $data = [
            'patient' => $patient,
            'id' => Crypt::encrypt($id),
            'patient_past_history' => $Patient_past_medical_history,
            'patient_past_surgical' => $Patient_past_surgical_history,
            'patient_current_med' => $Patient_current_med,
            'patient_future_plans' => $Patient_future_plan,
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
            'Patient_order_labs' => $Patient_order_labs,
            'supportiveTreatments' => $SupportiveTreatment,
            'Patient_progress_notes' => $Patient_progress_note,
            'Imaging' => $Imaging,
            'ClinicalIndicator_db' => $ClinicalIndicator,
            'ClinicalExam_db' => $ClinicalExam,
            'viewImage' => $viewImage,
            'checkGenerateData' => $checkGenerateData,
            'document_file' => $document_file

        ];


        return view('back/view-uterine-embo-report')->with($data);
    }

    // prostate form store method
    public function storeProstateEligibilityForms(Request $request)
    {

        if ($request->input('canvasImage')) {
            $canvasImage = $request->input('canvasImage');

            $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $canvasImage));

            $newFileName = time().'.png'; // You can change the file extension based on the image type

            $filePath = public_path('assets/thyroid-eligibility-form/') . $newFileName;

            file_put_contents($filePath, $imageData);
        } else {
            $newFileName = '';
        }


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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
                    'form_type' => 'prostate_form'
                ];
            }
        }
        $data = $request->symptoms;
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
                    'form_type' => 'prostate_form'
                ];
            }
        }

        if (!empty($dataToInsert)) {
            ThyroidDiagnosis::insert($dataToInsert);
        }
        if($newFileName){
            ThyroidDiagnosis::where(['patient_id'=>$id,'doctor_id' => $doctor_id,'form_type' => 'prostate_form'])->update(['AnnotateimageData' => $newFileName]);
        }

        $patientId =  $request->patient_id;

        return response()->json(['patient_id' => $patientId]);
    }

    public function editProstateEligibilityForms(Request $request)
    {
        $id = decrypt($request->patient_id);
        // echo $id; die;
        // $id = decrypt();
        $ThyroidDiagnosis = ThyroidDiagnosis::query();

        $postStateFormsImage = DB::table('patient_thyroid_diagnosis')->select('id', 'AnnotateimageData')->where(['title_name' => 'diagnosis_general', 'patient_id' => $id, 'form_type' => 'prostate_form'])->latest('id')->first();

        $diagnosis_general = $ThyroidDiagnosis->select('data_value')->where(['title_name' => 'diagnosis_general', 'patient_id' => $id, 'form_type' => 'prostate_form'])->get();
        $diagnosis_cid = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'diagnosis_cid', 'patient_id' => $id, 'form_type' => 'prostate_form'])->get();

        $Imaging = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'Imaging', 'patient_id' => $id, 'form_type' => 'prostate_form'])->orderBy('id', 'desc')->first();
        $symptoms = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'symptoms', 'patient_id' => $id, 'form_type' => 'prostate_form'])->get();

        $symptoms_scores = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'symptoms_score', 'patient_id' => $id, 'form_type' => 'prostate_form'])->first();
        $USGENERAL70 = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'USGENERAL70', 'patient_id' => $id, 'form_type' => 'prostate_form'])->first();
        $BPHTYPE = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'BPHTYPE', 'patient_id' => $id, 'form_type' => 'prostate_form'])->first();
        $rdlobe = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'rdlobe', 'patient_id' => $id, 'form_type' => 'prostate_form'])->first();
        $ProstateAbscess = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'ProstateAbscess', 'patient_id' => $id, 'form_type' => 'prostate_form'])->first();
        $CTCIR48RIGHT = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'CTCIR48RIGHT', 'patient_id' => $id, 'form_type' => 'prostate_form'])->first();
        $CTCIR48LEFT = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'CTCIR48LEFT', 'patient_id' => $id, 'form_type' => 'prostate_form'])->first();
        $USBIOPSYPROSTETE690 = ThyroidDiagnosis::select('data_value')->where(['title_name' => 'USBIOPSYPROSTETE690', 'patient_id' => $id, 'form_type' => 'prostate_form'])->first();
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
            'USGENERAL70' => $USGENERAL70,
            'BPHTYPE' => $BPHTYPE,
            'rdlobe' => $rdlobe,
            'ProstateAbscess' => $ProstateAbscess,
            'CTCIR48RIGHT' => $CTCIR48RIGHT,
            'CTCIR48LEFT' => $CTCIR48LEFT,
            'USBIOPSYPROSTETE690' => $USBIOPSYPROSTETE690,
            'Imaging' => $Imaging,
            'postStateFormsImage' => $postStateFormsImage

        ];
        return view('back/Edit_prostate', $data);
    }

    public function UpdateProstateEligibilityForms(Request $request)
    {
        ThyroidDiagnosis::where(['form_type' => 'prostate_form', 'patient_id' => decrypt($request->patient_id)])->delete();

        $this->storeProstateEligibilityForms($request);
        $patientId =  $request->patient_id;
        return response()->json(['patient_id' => $patientId]);
    }



    public function ViewProstateEligibilityForms(Request $request, $id)
    {

        $id = Crypt::decrypt($id);
        $patient = User::findOrFail($id);

        $ViewImage = DB::table('patient_thyroid_diagnosis')->select('id', 'AnnotateimageData')->where(['patient_id' => $id, 'form_type' => 'prostate_form'])->latest('id')->first();

        $Patient_order_labs = Task::where(['patient_id' => $id, 'form_type' => 'prostate_form'])->get();

        $Patient_future_plan = Patient_future_plan::with('doctor')->select('id', 'doctor_id', 'date', 'plan_text', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Procedure = Procedure::with('doctor')->select('id', 'doctor_id', 'procedure_name', 'summary', 'created_at', 'entry')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $SupportiveTreatment = SupportiveTreatment::with('doctor')->select('id', 'doctor_id', 'title', 'sub_title', 'created_at', 'treatment')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_progress_note = Patient_progress_note::with(['doctor', 'progressNote'])->select('id', 'doctor_id', 'progress_note_canned_text_id', 'voice_recognition', 'created_at', 'summery')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_insurer = Patient_insurer::where(['patient_id' => $id, 'status' => 'active'])->select('insurer_name', 'insurance_number')->orderBy('id', 'desc')->first();
        $Patient_past_medical_history = Patient_past_medical_history::select('id', 'diseases_name', 'describe', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_past_surgical_history = Patient_past_surgical_history::select('id', 'diseases_name', 'describe', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Patient_current_med = Patient_current_med::select('id', 'drug_name', 'frequency', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $Prescription = Prescription::select('id', 'prescription', 'created_at')->where('patient_id', $id)->orderBy('id', 'desc')->get();
        $ThyroidDiagnosis = ThyroidDiagnosis::query();
        $diagnosis_cid = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'diagnosis_cid', 'patient_id' => $id, 'form_type' => 'prostate_form'])->orderBy('id', 'desc')->get();

        $diagnosis_general = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'diagnosis_general', 'patient_id' => $id, 'form_type' => 'prostate_form'])->orderBy('id', 'desc')->get();

        $Imaging = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'Imaging', 'patient_id' => $id, 'form_type' => 'prostate_form'])->orderBy('id', 'desc')->get();
        $symptoms = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'symptoms', 'patient_id' => $id, 'form_type' => 'prostate_form'])->orderBy('id', 'desc')->get();
        $symptoms_scores = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'symptoms_score', 'patient_id' => $id, 'form_type' => 'prostate_form'])->orderBy('id', 'desc')->get();
        $Referrals = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'Referral', 'patient_id' => $id])->orderBy('id', 'desc')->get();
        $supportives = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'supportive', 'patient_id' => $id])->orderBy('id', 'desc')->get();
        $SpecialInvestigations = GeneralDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id', 'Title', 'SubTitle', 'Invistigation')->where(['title_name' => 'SpecialInvestigation', 'patient_id' => $id, 'form_type' => 'prostate_form'])->orderBy('id', 'desc')->get();

        $ElegibilitySTATUS = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'ElegibilitySTATUS', 'patient_id' => $id, 'form_type' => 'prostate_form'])->orderBy('id', 'desc')->get();
        $Interventions = $ThyroidDiagnosis->with('doctor')->select('data_value', 'created_at')->where(['title_name' => 'Intervention', 'patient_id' => $id])->orderBy('id', 'desc')->get();
        $MDTs = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'MDT', 'patient_id' => $id, 'form_type' => 'prostate_form'])->orderBy('id', 'desc')->get();

        $Labs = ThyroidDiagnosis::with('doctor')->select('data_value', 'created_at', 'doctor_id')->where(['title_name' => 'Lab', 'patient_id' => $id, 'form_type' => 'prostate_form'])->orderBy('id', 'desc')->get();
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
        $checkGenerateData = DB::table('general_reports')->where(['form_type' => 'prostate_form', 'patient_id' => $id])->get();
        $document_file = AttachDocument::where(['form_type' => 'prostate_report', 'patient_id' => $id])->get();




        $data = [
            'patient' => $patient,
            'id' => Crypt::encrypt($id),
            'patient_past_history' => $Patient_past_medical_history,
            'patient_past_surgical' => $Patient_past_surgical_history,
            'patient_current_med' => $Patient_current_med,
            'patient_future_plans' => $Patient_future_plan,
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
            'document_file' => $document_file,
            'Retrosternalextension' => $Retrosternalextension,
            'EnlargedLymphnodes' => $EnlargedLymphnodes,
            'paralysis' => $paralysis,
            'MRCIR48' => $MRCIR48,
            'NmThyroidScan' => $NmThyroidScan,
            'HistopathRightThyroidFNA' => $HistopathRightThyroidFNA,

            'Patient_order_labs' => $Patient_order_labs,
            'supportiveTreatments' => $SupportiveTreatment,
            'Patient_progress_notes' => $Patient_progress_note,
            'ViewImage' => $ViewImage,
            'Imaging' => $Imaging,
            'checkGenerateData' => $checkGenerateData
        ];

        return view('back/view-prostate-report')->with($data);
    }

    // diagnosis_generals


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

        $thyroidEligibilityFormsImage = DB::table('patient_thyroid_diagnosis')->select('id', 'AnnotateimageData')->where(['title_name' => 'diagnosis_general', 'patient_id' => $id, 'form_type' => 'thyroid_form'])->first();

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
        $checkGenerateData = DB::table('general_reports')->where(['form_type' => 'prostate_form', 'patient_id' => $id])->get();
        $document_file = AttachDocument::where(['form_type' => 'prostate_report', 'patient_id' => $id])->get();
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
            'thyroidEligibilityFormsImage' => $thyroidEligibilityFormsImage,
            'checkGenerateData' => $checkGenerateData,
            'document_file' => $document_file


        ];
        return view('back/Edit_thyroid', $data);
    }

    public function UpdateThyroidEligibilityForms(Request $request)
    {
        ThyroidDiagnosis::where(['form_type' => 'thyroid_form', 'patient_id' => decrypt($request->patient_id)])->delete();

        $this->storeThyroidEligibilityForms($request);
        $patientId =  $request->patient_id;

        return response()->json(['patient_id' => $patientId]);
    }

    public function storeThyroidEligibilityForms(Request $request)
    {


        if ($request->input('canvasImage')) {
            $canvasImage = $request->input('canvasImage');

            $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $canvasImage));

            $newFileName = time().'.png'; // You can change the file extension based on the image type

            $filePath = public_path('assets/thyroid-eligibility-form/') . $newFileName;

            file_put_contents($filePath, $imageData);
        } else {
            $newFileName = '';
        }


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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
                    'form_type' => 'thyroid_form'
                ];
            }
        }
        $data = $request->symptoms;
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,
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
                    'AnnotateimageData' => $newFileName,

                    'form_type' => 'thyroid_form'
                ];
            }
        }
        //  return $dataToInsert;

        if (!empty($dataToInsert)) {
            ThyroidDiagnosis::insert($dataToInsert);
        }
        if($newFileName){
            ThyroidDiagnosis::where(['patient_id'=>$id,'doctor_id' => $doctor_id,'form_type' => 'thyroid_form'])->update(['AnnotateimageData' => $newFileName]);
        }



        $patientId =  $request->patient_id;

        return response()->json(['patient_id' => $patientId]);
    }






    public function logout(Request $request)
    {

        Auth::guard('web')->logout();
        // $request->session()->invalidate();
        // $request->session()->regenerateToken();
        return redirect()->route('front.home.page');
    }


}
