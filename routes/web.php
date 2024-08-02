<?php

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NurseLoginWeb;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\CalendarController;

use App\Http\Controllers\DashboardController;

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\SuperAdmin\LoginController;
use App\Http\Controllers\Doctor\DoctorAuthController;
use App\Http\Controllers\ViewMedicalReportController;
use App\Http\Controllers\SuperAdmin\PathologyController;
use App\Http\Controllers\SuperAdmin\RadiologyController;
use App\Http\Controllers\Doctor\DoctorDashboadController;
use App\Http\Controllers\SuperAdmin\Staff\NurseController;
use App\Http\Controllers\SuperAdmin\Doctors\DoctorController;
use App\Http\Controllers\SuperAdmin\website\WebsiteController;
use App\Http\Controllers\SuperAdmin\BranchManagementController;
use App\Http\Controllers\SuperAdmin\Staff\AccountantController;

use App\Http\Controllers\SuperAdmin\Staff\TeleCallerController;

use App\Http\Controllers\SuperAdmin\Patients\PatientsController;

use App\Http\Controllers\SuperAdmin\Price\OtherExpenseController;
use App\Http\Controllers\SuperAdmin\Permission\RolePermissionController;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*
|--------------------------------------------------------------------------
| Web front Routes
|--------------------------------------------------------------------------
*/

Route::get('submit', function () {


    $data = [
        'email' => 'qastaratclinics@yopmail.com',
        'password' => 'ok',
        'first_name' => 'manish',
        'last_name' => 'rajput'
    ];

    $to = 'qastaratclinics@yopmail.com';
    $subject = 'Customer-Registration';

    Mail::send('appointment', $data, function ($message) use ($to, $subject) {
        $message->to($to)->subject($subject);
    });
});


Route::get('cache', function () {
    Artisan::call('optimize');

    Artisan::call('cache:clear');

    Artisan::call('route:cache');

    Artisan::call('route:clear');

    Artisan::call('view:clear');

    Artisan::call('config:clear');
});


Route::get('/login', function () {
    return redirect('/');
})->name('login');





Route::get('/', function () {
    // return view('front/home');
    return view('front/webLogin');
})->name('front.home.page');





Route::get('/service', function () {
    return view('front/service');
})->name('front.service.page');

Route::get('/terms', function () {
    return view('front/terms');
})->name('front.terms.page');

Route::get('/privacy', function () {
    return view('front/privacy');
})->name('front.privacy.terms');

Route::get('/cookie', function () {
    return view('front/cookie');
})->name('front.cookie.page');


/*
|--------------------------------------------------------------------------
| Admin user Routes
|--------------------------------------------------------------------------
*/


// patient route
Route::prefix('patient')->name('patient.')->group(function () {

    Route::group(['middleware' => ['auth:web']], function () {
        Route::get('dashboard', [PatientController::class, 'dashboard'])->name('dashboard');

        Route::get('my-records', [DoctorAuthController::class, 'myLabResult'])->name('myLabResult');


        Route::get('service', [PatientController::class, 'service'])->name('service');

        Route::get('profile', [PatientController::class, 'profile'])->name('profile');

        Route::post('update-profile', [PatientController::class, 'updateProfile'])->name('update_profile');

        Route::get('patient-info-edit_1', [PatientController::class, 'patient_info_edit'])->name('patient-info-edit-edt');

        Route::get('patient-info-edit', [PatientController::class, 'patient_info_edit'])->name('patient-info-edit');

        Route::post('patient-info-update', [PatientController::class, 'patient_info_update'])->name('patient-info-update');

        Route::post('patient-delete', [PatientController::class, 'patient_delete'])->name('patient_delete');
        Route::get('logout', [PatientController::class, 'logout'])->name('logout');
    });
});



Route::prefix('auth')->group(function () {
    Route::any('/common-login', [DoctorAuthController::class, 'login'])->name('common.login');
    Route::post('/patient-login', [DoctorAuthController::class, 'patientLogin'])->name('patient.login');
    Route::post('/staff-login', [DoctorAuthController::class, 'staffLogin'])->name('staff.login');
    Route::get('register', [DoctorAuthController::class, 'showRegistrationForm'])->name('admin.register');
    Route::post('register', [DoctorAuthController::class, 'register'])->name('admin.register.submit');

    Route::post('send-otp', [DoctorAuthController::class, 'sendOtp'])->name('');
    Route::get('verify-otp', [DoctorAuthController::class, 'verifyOtp']);
    Route::post('verified-otp', [DoctorAuthController::class, 'verifiedOtp']);

    // patient forget password  route
    Route::get('forget-password', [AuthController::class, 'forgetPassword'])->name('patient.forget.password');
    Route::post('forget-password', [AuthController::class, 'postForgetPassword'])->name('patient.forget.password.post');
    Route::get('reset-forget-password/{token}', [AuthController::class, 'resetForgetPassword'])->name('patient.forget.password.reset');
    Route::post('reset-forget-password/{token}', [AuthController::class, 'updateNewPassword'])->name('patient.forget.password.reset.update');

    // doctor forget password  route
    Route::get('staff-forget-password', [DoctorAuthController::class, 'forgetPassword'])->name('doctor.forget.password');
    Route::post('staff-forget-password', [DoctorAuthController::class, 'postForgetPassword'])->name('doctor.forget.password.post');
    Route::get('staff-reset-forget-password/{token}', [DoctorAuthController::class, 'resetForgetPassword'])->name('doctor.forget.password.reset');
    Route::post('staff-reset-forget-password/{token}', [DoctorAuthController::class, 'updateNewPassword'])->name('doctor.forget.password.reset.update');
});
// doctor route
Route::group(['middleware' => ['auth:doctor'],'prefix'=>'doctor'], function () {
    Route::get('/get-users', [PatientController::class, 'getUsers'])->name('getUsers');
    Route::get('patient', [PatientController::class, 'index'])->name('user.patient');
    Route::get('task', [NurseLoginWeb::class, 'nurseTask'])->name('nurseTask');
    Route::post('task-assigned-to-nurse', [NurseLoginWeb::class, 'taskAssignedToNurse'])->name('taskAssignedToNurse');
    Route::get('task-assigned-to-lab', [NurseLoginWeb::class, 'taskAssignedToLab'])->name('taskAssignedToLab');
    Route::post('add-new-test-name', [PathologyController::class, 'addNewTestName'])->name('addNewTest');
    Route::get('get-services', [PathologyController::class, 'getService'])->name('getServices');
    Route::post('set-location', [PathologyController::class, 'setLocation'])->name('setLocations');
    Route::get('get-location', [PathologyController::class, 'getLocation'])->name('getLocations');
    Route::get('get-doctor', [AppointmentController::class, 'geDoctor'])->name('getdoctors');

    Route::post('add-availability', [AppointmentController::class, 'addAvailability'])->name('add.Availability');


    Route::get('get-single-location-details', [PathologyController::class, 'getLocationDetail'])->name('getLocationDetails');


    Route::post('approve-document', [NurseLoginWeb::class, 'approveDocument'])->name('approveDocument');
    Route::post('reject-document', [NurseLoginWeb::class, 'rejectDocument'])->name('rejectDocument');
    Route::post('referal-patient', [NurseLoginWeb::class, 'referalPatient'])->name('referalPatient');


    Route::post('lab-document-upload', [NurseLoginWeb::class, 'labDocumentUpload'])->name('labDocumentUpload');
    Route::get('profile', [DoctorAuthController::class, 'profile'])->name('profile');
    Route::post('update-profile', [DoctorAuthController::class, 'updateProfile'])->name('update_profile');

    Route::get('service', [DoctorAuthController::class, 'service'])->name('service');

    Route::any('dashboard', [DoctorDashboadController::class, 'index'])->name('admin.dashboard');

    Route::get('logout', [DoctorAuthController::class, 'logout'])->name('doctor.logout');
    Route::post('patient-delete', [PatientController::class, 'patient_delete'])->name('user.patient_delete');
    Route::post('add-patient-vital/{id?}', [PatientController::class, 'patient_vital'])->name('user.patient_vital');
    Route::post('add-patient-diagnosis/{id?}', [PatientController::class, 'Add_Diagnosis'])->name('user.Add_Diagnosis');
    Route::post('edit-patient-diagnosis', [PatientController::class, 'editDiagnosis'])->name('user.edit_Diagnosis');
    Route::post('edit-patient-symptoms', [PatientController::class, 'editSymptoms'])->name('user.edit_Symptoms');

    Route::get('get-Diagnosis-Data', [PatientController::class, 'getDiagnosis'])->name('getDiagnosisData');
    Route::get('get-Symptoms-Data', [PatientController::class, 'fetchExistingSymptoms'])->name('fetchExistingSymptom');
    Route::post('referalReplySummary', [PatientController::class, 'referalReplySummary'])->name('referalReplySummary');

    Route::any('remove-Existing-Symptom/', [PatientController::class, 'removeExistingSymptom'])->name('removeExistingSymptom');
    Route::get('get-special-investigation', [PatientController::class, 'getSpecialInvestigation'])->name('getSpecialInvestigations');
    Route::get('get-clinical-exam', [PatientController::class, 'getClinicalExam'])->name('getClinicalExams');
    Route::post('check-special-investigation', [PatientController::class, 'checkSpecialInvestigation'])->name('checkSpecialInvestigations');

    Route::post('save-clinical-exam', [PatientController::class, 'saveClinicalExam'])->name('saveClinicalExams');
    Route::post('update-special-investigation', [PatientController::class, 'updateSpecialInvestigation'])->name('updateSpecialInvestigations');
    Route::post('insert-special-investigation', [PatientController::class, 'insertSpecialInvestigation'])->name('insertSpecialInvestigations');
    Route::post('add-patient-Symptoms/{id?}', [PatientController::class, 'Add_Symptoms'])->name('user.Add_Symptoms');
    Route::post('add-patient-OrderSpecialInvistigation/{id?}', [PatientController::class, 'OrderSpecialInvistigation'])->name('user.OrderSpecialInvistigation');
    Route::post('add-patient-MDTReview/{id?}', [PatientController::class, 'MDTReview'])->name('user.MDTReview');
    Route::post('add-patient-EligibilityStatus/{id?}', [PatientController::class, 'EligibilityStatus'])->name('user.EligibilityStatus');
    Route::get('patient-vital-list', [PatientController::class, 'patient_vital_list'])->name('user.patient_vital_list');
    Route::get('patient-progress-list', [PatientController::class, 'patient_progress_list'])->name('user.patient_progress_list');
    Route::get('patient-progress-predefine-note-list', [PatientController::class, 'patient_progress_predefine_notes_list'])->name('user.patient_progress_predefine_notes_list');
    Route::post('patient-progress-list-save', [PatientController::class, 'patient_progress_list_save'])->name('user.patient_progress_list_save');
    Route::post('save-patient-note', [PatientController::class, 'save_patient_note'])->name('user.save_patient_note');
    Route::post('/deleteNote', [PatientController::class, 'deleteNote'])->name('note.delete');


    Route::post('/save-documents', [PatientController::class, 'saveDocuments'])->name('save-document');
    Route::get('/get-documents', [PatientController::class, 'getDocuments'])->name('get-documents');
    Route::get('/delete-document/{id}', [PatientController::class, 'deleteDocument'])->name('delete-document');




    Route::post('patient-vital-list-delete', [PatientController::class, 'patient_vital_list_delete'])->name('user.patient_vital_list_delete');
    Route::post('order-imaginary-exam', [PatientController::class, 'order_imaginary_exam'])->name('user.order_imaginary_exam');
    Route::post('order-lab-test', [PatientController::class, 'order_lab_test'])->name('user.order_lab_test');
    Route::get('order-lab-test-list', [PatientController::class, 'order_lab_test_list'])->name('user.order_lab_test_list');
    Route::post('order-lab-test-list-delete', [PatientController::class, 'order_lab_test_list_delete'])->name('user.order_lab_test_list_delete');
    Route::post('invoice-item-add', [PatientController::class, 'invoice_item_add'])->name('user.invoice_item_add');
    Route::get('invoice-item-list', [PatientController::class, 'invoice_item_list'])->name('user.invoice_item_list');
    Route::post('invoice-item-list-delete', [PatientController::class, 'invoice_item_list_delete'])->name('user.invoice_item_list_delete');
    Route::post('new-task-add', [PatientController::class, 'new_task_add'])->name('user.new_task_add');
    Route::post('appointment-add', [PatientController::class, 'appointment_add'])->name('user.appointment_add');
    Route::post('video-call-add', [PatientController::class, 'video_call_add'])->name('user.video_call_add');
    Route::post('drug-add', [PatientController::class, 'drug_add'])->name('user.drug_add');
    Route::get('drug-item-list', [PatientController::class, 'drug_item_list'])->name('user.drug_item_list');
    Route::post('drug-item-list-delete', [PatientController::class, 'drug_item_list_delete'])->name('user.drug_item_list_delete');
    Route::post('allergy-add', [PatientController::class, 'allergy_add'])->name('user.allergy_add');
    Route::post('add-patient-prescription', [PatientController::class, 'add_patient_prescription'])->name('user.add_patient_prescription');
    Route::post('add-patient-invistigation', [PatientController::class, 'add_patient_invistigation'])->name('user.add_patient_invistigation');
    Route::post('add-patient-procedure', [PatientController::class, 'add_patient_procedure'])->name('user.add_patient_procedure');
    Route::post('add-patient-supportive-treatment', [PatientController::class, 'add_patient_supportive_treatment'])->name('user.add_patient_supportive_treatment');
    Route::post('symptom-add', [PatientController::class, 'symptom_add'])->name('user.symptom_add');
    Route::post('clinical-exam-add', [PatientController::class, 'clinical_exam_add'])->name('user.clinical_exam_add');
    Route::post('future-plan-add', [PatientController::class, 'future_plan_add'])->name('user.future_plan_add');
    Route::post('special-note-add', [PatientController::class, 'special_note_add'])->name('user.special_note_add');
    Route::post('past-medical-histories-add', [PatientController::class, 'past_medical_histories_add'])->name('user.past_medical_histories_add');
    Route::post('past-surgical-history-add', [PatientController::class, 'past_surgical_history_add'])->name('user.past_surgical_history_add');
    Route::post('insurer-add', [PatientController::class, 'insurer_add'])->name('user.insurer_add');
    Route::get('insurer-list', [PatientController::class, 'insurer_list'])->name('user.insurer_list');
    Route::get('getPatientsData', [PatientController::class, 'getPatientsData'])->name('user.getPatientsData');
    Route::post('patient-store', [PatientController::class, 'store'])->name('user.patient.store');
    Route::get('patient-detail/{id}', [PatientController::class, 'patient_detail'])->name('user.patient-detail');
    Route::get('patient-info-edit', [PatientController::class, 'patient_info_edit'])->name('user.patient-info-edit');
    Route::post('patient-info-update', [PatientController::class, 'patient_info_update'])->name('user.patient-info-update');

    Route::get('patient-medical-detail/{id}', [PatientController::class, 'patient_medical_detail'])->name('user.patient_medical_detail');

    Route::delete('/patient-allergy/{id}', [PatientController::class, 'deletePatientAllergy'])->name('patient.allergy.delete');

    Route::delete('/delete-report/{id}', [PatientController::class, 'deleteReport'])->name('deleteReport');

    Route::delete('/patient-past-medical/{id}', [PatientController::class, 'deletePatientPastMediacl'])->name('patient.past.medical.delete');
    Route::delete('/patient-patient-surgical/{id}', [PatientController::class, 'deletePatientPastSurgical'])->name('patient.past.surgical');
    Route::delete('/deleteOrderProcedure/{id}', [PatientController::class, 'deleteOrderProcedure'])->name('patient.order.procedure');
    Route::delete('/patient-supportive-treatments/{id}', [PatientController::class, 'patientSupportiveTreatments'])->name('patient.supportive.treatments');

    Route::delete('/patient-progress-note/{id}', [PatientController::class, 'patientProgressNote'])->name('patient.progress.note');
    Route::delete('/patient-future-plans/{id}', [PatientController::class, 'patientFuturePlans'])->name('patient.future.plans');
    Route::delete('/patientRemoveDrug/{id}', [PatientController::class, 'patientRemoveDrug'])->name('patientRemoveDrug');
    Route::delete('/listofprocedure/{id}', [PatientController::class, 'listofprocedure'])->name('list.of.procedure');

    Route::delete('/patient-prescribed Medicines/{id}', [PatientController::class, 'PatientPrescribedMedicines'])->name('patient.prescribed.medicines');
    Route::delete('/patient-referrals/{id}', [PatientController::class, 'patientReferrals'])->name('patient.referrals');
    Route::delete('/patient-mbt/{id}', [PatientController::class, 'patientMbt'])->name('patient.mbt');
    Route::delete('/patient-eligibility-status/{id}', [PatientController::class, 'patientEligibilityStatus'])->name('patient.eligibility.status');

    Route::any('invoice', [InvoiceController::class, 'index'])->name('user.invoice');

    Route::post('submit-invoice', [PatientController::class, 'submitInvoice'])->name('submit.invoice');

    Route::get('print-invoice/{id}', [InvoiceController::class, 'printInvoice'])->name('user.print.invoice');

    Route::match(['get', 'post'], 'fullcalendar', [CalendarController::class, 'index'])->name('user.calendar');

    Route::post('deleteInvoice', [InvoiceController::class, 'deleteInvoice'])->name('delete.invoice');

    Route::post('add-appontment-availability', [CalendarController::class, 'addAppontmentAvailability'])->name('add.appontment.availability');

    Route::get('/user/calendar', [CalendarController::class, 'getEvents'])->name('user.calendar.getEvents');
    Route::post('/create-update-event', [CalendarController::class, 'createOrUpdateEvent'])->name('user.calendar.event');
    Route::get('/delete-event/{id}', [CalendarController::class, 'deleteEvent'])->name('user.delete.event');
    Route::get('view-medical-report', [ViewMedicalReportController::class, 'index'])->name('user.view-medical-report');
    Route::post('EligibilityForms', [PatientController::class, 'slectEligibilityForms'])->name('user.slectEligibilityForms');


    // ThyroidEligibilityForms start
    Route::get('thyroid-eligibility-form/{patient_id}', [PatientController::class, 'ThyroidEligibilityForm'])->name('user.ThroidEmbolizationEligibilityForms');
    Route::post('ThyroidEligibilityForms-store', [PatientController::class, 'storeThyroidEligibilityForms'])->name('user.storeThyroidEligibilityForms');
    Route::get('ThyroidEligibilityForms-edit/{patient_id}', [PatientController::class, 'editThyroidEligibilityForms'])->name('user.editThyroidEligibilityForms');
    Route::post('ThyroidEligibilityForms-update', [PatientController::class, 'UpdateThyroidEligibilityForms'])->name('user.UpdateThyroidEligibilityForms');
    Route::get('view-thyroid-ablation-form/{id}', [PatientController::class, 'ViewThyroidAblationForm'])->name('user.ViewThyroidAblationForm');
    // end

    // ProstateEligibilityForms start
    Route::get('prostate-artery-embolization-eligibility-form/{patient_id}', [PatientController::class, 'ProstateArteryEmbolizationEligibilityForm'])->name('user.ProstateArteryEmbolizationEligibility');
    Route::post('storeProstateEligibilityForms', [PatientController::class, 'storeProstateEligibilityForms'])->name('user.storeProstateEligibilityForms');
    Route::get('ProstateEligibilityForms-edit/{patient_id}', [PatientController::class, 'editProstateEligibilityForms'])->name('user.EditProstateEligibilityForms');
    Route::post('ProstateEligibilityForms-update', [PatientController::class, 'UpdateProstateEligibilityForms'])->name('user.UpdateProstateEligibilityForms');
    Route::get('view-prostate-Form/{id}', [PatientController::class, 'ViewProstateEligibilityForms'])->name('user.ViewProstateEligibilityForms');
    // end


    // uterine_embo start
    Route::get('uterine-embo-eligibility-form/{patient_id}', [PatientController::class, 'UterineEmboEmbolizationEligibilityForms'])->name('user.UterineEmboEmbolizationEligibilityForms');
    Route::post('store-uterine-embo-eligibilityForms', [PatientController::class, 'storeUterineEmboEligibilityForms'])->name('user.storeUterineEmboEligibilityForms');
    Route::get('uterine-embo-eligibilityForms-edit/{patient_id}', [PatientController::class, 'editUterineEmboEligibilityForms'])->name('user.editUterineEmboEligibilityForms');
    Route::post('uterine-embo-eligibilityForms-update', [PatientController::class, 'updateUterineEmboEligibilityForms'])->name('user.updateUterineEmboEligibilityForms');
    Route::get('view-uterine-embo-Form/{id}', [PatientController::class, 'viewUterineEmboEligibilityForms'])->name('user.viewUterineEmboEligibilityForms');
    // end

    // Pelvic Cong Embo (PCE) Form start
    Route::get('pelvicCongEmbo-eligibility-form/{patient_id}', [PatientController::class, 'PelvicCongEmboEmbolizationEligibilityForms'])->name('user.PelvicCongEmbolizationEligibilityForms');
    Route::post('store-pelvicCongEmbo-EligibilityForms', [PatientController::class, 'storePelvicCongEmboEligibilityForms'])->name('user.storePelvicCongEmboEligibilityForms');
    Route::get('pelvicCongEmbo-eligibilityForms-edit/{patient_id}', [PatientController::class, 'editPelvicCongEmboEligibilityForms'])->name('user.editPelvicCongEmboEligibilityForms');
    Route::post('pelvicCongEmbo-eligibilityForms-update', [PatientController::class, 'updatePelvicCongEmboEligibilityForms'])->name('user.updatePelvicCongEmboEligibilityForms');
    Route::get('view-pelvicCongEmbo-Form/{id}', [PatientController::class, 'viewPelvicCongEmboEligibilityForms'])->name('user.viewPelvicCongEmboEligibilityForms');
    // end

    // Varicose Ablation (VA) Form start
    Route::get('varicoseablation-eligibility-form/{patient_id}', [PatientController::class, 'VaricoseAblationEmbolizationEligibilityForms'])->name('user.VaricoseAblationlizationEligibilityForms');
    Route::post('store-VaricoseAblation-eligibilityForms', [PatientController::class, 'storeVaricoseAblationEligibilityForms'])->name('user.storeVaricoseAblationEligibilityForms');
    Route::get('varicoseablation-eligibilityForms-edit/{patient_id}', [PatientController::class, 'editVaricoseAblationEligibilityForms'])->name('user.editVaricoseAblationEligibilityForms');
    Route::post('varicoseablation-eligibilityForms-update', [PatientController::class, 'updateVaricoseAblationEligibilityForms'])->name('user.updateVaricoseAblationEligibilityForms');
    Route::get('view-varicoseablation-Form/{id}', [PatientController::class, 'viewVaricoseAblationEligibilityForms'])->name('user.viewVaricoseAblationEligibilityForms');
    // end

    // Varicocele-Embo form  start
    Route::get('VaricoceleEmbo-eligibility-form/{patient_id}', [PatientController::class, 'VaricoceleEmboEmbolizationEligibilityForms'])->name('user.VaricoceleEmbolizationEligibilityForms');
    Route::post('store-VaricoceleEmbo-eligibilityForms', [PatientController::class, 'storeVaricoceleEmboEligibilityForms'])->name('user.storeVaricoceleEmboEligibilityForms');
    Route::get('VaricoceleEmbo-eligibilityForms-edit/{patient_id}', [PatientController::class, 'editVaricoceleEmboEligibilityForms'])->name('user.editVaricoceleEmboEligibilityForms');
    Route::post('VaricoceleEmbo-eligibilityForms-update', [PatientController::class, 'updateVaricoceleEmboEligibilityForms'])->name('user.updateVaricoceleEmboEligibilityForms');
    Route::get('view-VaricoceleEmbo-Form/{id}', [PatientController::class, 'viewVaricoceleEmboEligibilityForms'])->name('user.viewVaricoceleEmboEligibilityForms');
    // end

    // Haemorrhoids Embo (HE) Form start
    Route::get('haemorrhoidsembo-eligibility-form/{patient_id}', [PatientController::class, 'HaemorrhoidsEmboEmbolizationEligibilityForms'])->name('user.HaemorrhoidsEmbolizationEligibilityForms');
    Route::post('store-haemorrhoidsembo-eligibilityForms', [PatientController::class, 'storeHaemorrhoidsEmboEligibilityForms'])->name('user.storeHaemorrhoidsEmboEligibilityForms');
    Route::get('haemorrhoidsembo-eligibilityForms-edit/{patient_id}', [PatientController::class, 'editHaemorrhoidsEmboEligibilityForms'])->name('user.editHaemorrhoidsEmboEligibilityForms');
    Route::post('HaemorrhoidsEmbo-eligibilityForms-update', [PatientController::class, 'updateHaemorrhoidsEmboEligibilityForms'])->name('user.updateHaemorrhoidsEmboEligibilityForms');
    Route::get('view-haemorrhoidsembo-Form/{id}', [PatientController::class, 'viewHaemorrhoidsEmboEligibilityForms'])->name('user.viewHaemorrhoidsEmboEligibilityForms');
    // end

    // knee pain  Form start
    Route::get('KneePain-eligibility-form/{patient_id}', [PatientController::class, 'KneePainEmbolizationEligibilityForms'])->name('user.KneePainlizationEligibilityForms');
    Route::post('store-KneePain-eligibilityForms', [PatientController::class, 'storeKneePainEligibilityForms'])->name('user.storeKneePainEligibilityForms');
    Route::get('KneePain-eligibilityForms-edit/{patient_id}', [PatientController::class, 'editKneePainEligibilityForms'])->name('user.editKneePainEligibilityForms');
    Route::post('KneePain-eligibilityForms-update', [PatientController::class, 'updateKneePainEligibilityForms'])->name('user.updateKneePainEligibilityForms');
    Route::get('view-KneePain-Form/{id}', [PatientController::class, 'viewKneePainEligibilityForms'])->name('user.viewKneePainEligibilityForms');
    // end


    // Spine pain  Form start
    Route::get('SpinePain-eligibility-form/{patient_id}', [PatientController::class, 'SpinePainEmbolizationEligibilityForms'])->name('user.SpinePainlizationEligibilityForms');
    Route::post('store-SpinePain-eligibilityForms', [PatientController::class, 'storeSpinePainEligibilityForms'])->name('user.storeSpinePainEligibilityForms');
    Route::get('SpinePain-eligibilityForms-edit/{patient_id}', [PatientController::class, 'editSpinePainEligibilityForms'])->name('user.editSpinePainEligibilityForms');
    Route::post('SpinePain-eligibilityForms-update', [PatientController::class, 'updateSpinePainEligibilityForms'])->name('user.updateSpinePainEligibilityForms');
    Route::get('view-SpinePain-Form/{id}', [PatientController::class, 'viewSpinePainEligibilityForms'])->name('user.viewSpinePainEligibilityForms');
    // end

    // MSK pain  Form start
    Route::get('MSKPain-eligibility-form/{patient_id}', [PatientController::class, 'MSKPainEmbolizationEligibilityForms'])->name('user.MSKPainlizationEligibilityForms');
    Route::post('store-MSKPain-eligibilityForms', [PatientController::class, 'storeMSKPainEligibilityForms'])->name('user.storeMSKPainEligibilityForms');
    Route::get('MSKPain-eligibilityForms-edit/{patient_id}', [PatientController::class, 'editMSKPainEligibilityForms'])->name('user.editMSKPainEligibilityForms');
    Route::post('MSKPain-eligibilityForms-update', [PatientController::class, 'updateMSKPainEligibilityForms'])->name('user.updateMSKPainEligibilityForms');
    Route::get('view-MSKPain-Form/{id}', [PatientController::class, 'viewMSKPainEligibilityForms'])->name('user.viewMSKPainEligibilityForms');
    // end

    // ShoulderPain   Form start
    Route::get('ShoulderPain-eligibility-form/{patient_id}', [PatientController::class, 'ShoulderPainEmbolizationEligibilityForms'])->name('user.ShoulderPainlizationEligibilityForms');
    Route::post('store-ShoulderPain-eligibilityForms', [PatientController::class, 'storeShoulderPainEligibilityForms'])->name('user.storeShoulderPainEligibilityForms');
    Route::get('ShoulderPain-eligibilityForms-edit/{patient_id}', [PatientController::class, 'editShoulderPainEligibilityForms'])->name('user.editShoulderPainEligibilityForms');
    Route::post('ShoulderPain-eligibilityForms-update', [PatientController::class, 'updateShoulderPainEligibilityForms'])->name('user.updateShoulderPainEligibilityForms');
    Route::get('view-ShoulderPain-Form/{id}', [PatientController::class, 'viewShoulderPainEligibilityForms'])->name('user.viewShoulderPainEligibilityForms');
    // end

    // HeadachePain   Form start
    Route::get('HeadachePain-eligibility-form/{patient_id}', [PatientController::class, 'HeadachePainEmbolizationEligibilityForms'])->name('user.HeadachePainlizationEligibilityForms');
    Route::post('store-HeadachePain-eligibilityForms', [PatientController::class, 'storeHeadachePainEligibilityForms'])->name('user.storeHeadachePainEligibilityForms');
    Route::get('HeadachePain-eligibilityForms-edit/{patient_id}', [PatientController::class, 'editHeadachePainEligibilityForms'])->name('user.editHeadachePainEligibilityForms');
    Route::post('HeadachePain-eligibilityForms-update', [PatientController::class, 'updateHeadachePainEligibilityForms'])->name('user.updateHeadachePainEligibilityForms');
    Route::get('view-HeadachePain-Form/{id}', [PatientController::class, 'viewHeadachePainEligibilityForms'])->name('user.viewHeadachePainEligibilityForms');
    // end

    // AddRemoveListDiagnosis View-Thyroid-Ablation-Form route
    Route::post('ProstateArteryEmbolizationEligibilityFormDiagnosisStore', [PatientController::class, 'ProstateArteryEmbolizationEligibilityFormDiagnosisStore'])->name('user.ProstateArteryEmbolizationEligibilityFormDiagnosisStore');
    Route::get('ProstateArteryEmbolizationEligibilityFormDiagnosisList', [PatientController::class, 'ProstateArteryEmbolizationEligibilityFormDiagnosisList'])->name('user.ProstateArteryEmbolizationEligibilityFormDiagnosisList');
    Route::post('ProstateArteryEmbolizationEligibilityFormDiagnosisStore', [PatientController::class, 'ProstateArteryEmbolizationEligibilityFormDiagnosisDelete'])->name('user.ProstateArteryEmbolizationEligibilityFormDiagnosisDelete');
});



Route::prefix('admin')->group(function () {
    Route::any('/', [LoginController::class, 'login'])->name('admin.login');
    
    Route::group(['middleware' => ['auth:admin']], function () {
        Route::any('snippets', [PatientController::class, 'allSnippets'])->name('snippets');
        Route::any('add-snippets', [PatientController::class, 'addSnippets'])->name('add.snippets');
        Route::any('/edit-snippets/{id}', [PatientController::class, 'editSnippets'])->name('edit.snippets');
        Route::get('/dashboard', [LoginController::class, 'index'])->name('super-admin.dashboard');
        Route::any('/profile', [AccountantController::class, 'profile'])->name('super-admin.profile');
        Route::get('/logout', [LoginController::class, 'logout'])->name('super-admin.logout');


        Route::name('permissions.')->prefix('user-permission')->controller(RolePermissionController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::any('/create', 'create')->name('create');
            Route::any('/edit/{id}', 'edit')->name('edit');
        });

        Route::name('patients.')->prefix('patients')->controller(PatientsController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/add-create', 'addCreate')->name('addCreate');
            Route::post('/delete', 'patient_delete')->name('patient_delete');
            Route::any('/{id}', 'edit')->name('edit');
            Route::any('view/{id}', 'view')->name('view');
        });

        Route::name('doctors.')->prefix('doctors')->controller(DoctorController::class)->group(function () {

            Route::get('/', 'index')->name('index');
            Route::post('/delete', 'doctor_delete')->name('doctor_delete');
            Route::any('/create', 'create')->name('create');
            Route::any('/view/{id}', 'view')->name('view');
            Route::any('/edit/{id}', 'edit')->name('edit');
            Route::post('/getStaff', 'getStaff')->name('getStaff');
            // Route::get('doctorview/{id}', function()
            // {
            //    // return view('superAdmin/doctor/editlist');
            // });
        });


        Route::prefix('staffs')->group(function () {

            // Nurse Routes
            Route::name('nurses.')->controller(NurseController::class)->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/delete', 'nurse_delete')->name('nurse_delete');
                Route::any('/create', 'create')->name('create');
                Route::match(['get', 'post'], '/edit/{id}', 'edit')->name('edit');
                Route::get('/show/{doctor}', 'show')->name('show');
                Route::any('view/{id}', 'view')->name('view');
            });

            // Accountant Routes
            Route::name('accountants.')->prefix('accountants')->controller(AccountantController::class)->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/delete', 'accountant_delete')->name('accountant_delete');
                Route::any('/create', 'create')->name('create');
                Route::match(['get', 'post'], '/edit/{id}', 'edit')->name('edit');
                Route::get('/show/{id}', 'show')->name('show');
                Route::delete('/accountant/{accountant}', 'destroy')->name('destroy');
            });

            // Telecaller Routes
            Route::name('telecallers.')->prefix('telecallers')->controller(TelecallerController::class)->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/delete', 'telecaller_delete')->name('telecaller_delete');
                Route::any('/create', 'create')->name('create');
                Route::match(['get', 'post'], '/edit/{id}', 'edit')->name('edit');
                Route::delete('/telecaller/{telecaller}', 'destroy')->name('destroy');
            });
        });

        // pathology
        Route::name('pathology.')->prefix('pathology')->controller(PathologyController::class)->group(function () {
            Route::match(['get', 'post'], '/', 'index')->name('index');
            Route::match(['get', 'post'], '/add', 'add')->name('add');
            Route::post('/update', 'edit')->name('edit');
        });

        // pathology
        Route::name('price.')->prefix('price')->controller(PathologyController::class)->group(function () {
            Route::match(['get', 'post'], '/pathology-price-list', 'pathologyPriceList')->name('pathologyPriceList');
            Route::match(['get', 'post'], '/add-new-pathology-test', 'addPathologyPrice')->name('addPathologyPrice');
        });

        // radiology
        Route::name('price.')->prefix('price')->controller(PathologyController::class)->group(function () {
            Route::match(['get', 'post'], '/radiology-price-list', 'radiologyPriceList')->name('radiologyPriceList');
            Route::match(['get', 'post'], '/add-new-radiology-test', 'addradiologyPrice')->name('addradiologyPrice');
            Route::match(['get', 'post'], '/checkPostCode', 'checkPostCode')->name('checkPostCode');
        });


        // pathology
        Route::name('radiology.')->prefix('radiology-department')->controller(RadiologyController::class)->group(function () {
            Route::match(['get', 'post'], '/', 'index')->name('index');
            Route::match(['get', 'post'], '/add', 'add')->name('add');
            Route::post('/update', 'edit')->name('edit');
        });


        //  // Price Management
        //  Route::name('price.')->prefix('price')->controller(PathologyController::class)->group(function () {
        //     Route::match(['get','post'], '/pathology-price-list', ' pathologyPriceList')->name('pathologyPriceList');
        //     // Route::match(['get','post'], '/add', 'add')->name('add');
        //     //  Route::post('/update', 'edit')->name('edit');
        // });

        Route::name('branch.management.')->prefix('branch-management')->controller(BranchManagementController::class)->group(function () {
            Route::match(['get', 'post'], '/', 'index')->name('index');
            Route::match(['get', 'post'], '/add', 'add')->name('add');
            Route::post('/update', 'edit')->name('edit');
        });

        // wesite dynamic design page route start

        Route::prefix('website')->group(function () {

            // home banner  Routes
            Route::name('homes.')->prefix('home')->controller(WebsiteController::class)->group(function () {
                Route::any('/', 'index')->name('index');
            });

            // ABOUT US Routes
            Route::name('aboutUs.')->prefix('aboutUs')->controller(WebsiteController::class)->group(function () {
                Route::any('/', 'aboutUs')->name('aboutUs');
            });

            // OUR TREATMENTS  Routes
            Route::name('ourTreatments.')->prefix('ourTreatment')->controller(WebsiteController::class)->group(function () {
                Route::any('/', 'ourTreatment')->name('ourTreatment');
            });

            // OUR SERVICES  Routes
            Route::name('ourServices.')->prefix('ourService')->controller(WebsiteController::class)->group(function () {
                Route::any('/', 'ourService')->name('ourService');
            });

            // OUR UNIQUE SOFTWARE Routes
            Route::name('ourUniqueSoftwares.')->prefix('ourUniqueSoftware')->controller(WebsiteController::class)->group(function () {
                Route::any('/', 'ourUniqueSoftware')->name('ourUniqueSoftware');
            });

            // OUR BRANCHES Routes
            Route::name('ourBranches.')->prefix('ourBranch')->controller(WebsiteController::class)->group(function () {
                Route::any('/', 'ourBranch')->name('ourBranch');
            });

            // OUR TEAMS Routes
            Route::name('ourTeams.')->prefix('ourTeam')->controller(WebsiteController::class)->group(function () {
                Route::any('/', 'ourTeam')->name('ourTeam');
                Route::any('/delete', 'deleteTeam')->name('deleteTeam');
                Route::any('/addTeam', 'addTeam')->name('addTeam');
            });

            // CONTACT US Routes
            Route::name('contactUs.')->prefix('contactUs')->controller(WebsiteController::class)->group(function () {
                Route::any('/', 'contactUs')->name('contactUs');
            });

            // FAQ Routes
            Route::name('faqs.')->prefix('faq')->controller(WebsiteController::class)->group(function () {
                Route::any('/', 'faq')->name('faq');
                Route::any('/add', 'addFaq')->name('add');
            });

            // footer Routes
            Route::name('footers.')->prefix('footer')->controller(WebsiteController::class)->group(function () {
                Route::any('/', 'footer')->name('footer');
            });
        });
        //  end

        Route::name('expense.')->prefix('other-price')->controller(OtherExpenseController::class)->group(function () {
            Route::match(['get', 'post'], '/', 'index')->name('index');
            Route::match(['get', 'post'], '/add', 'add')->name('add');
            Route::post('/update', 'edit')->name('edit');
        });
    });
});
