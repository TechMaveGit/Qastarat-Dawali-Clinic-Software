<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\NurseLoginWeb;
use App\Http\Controllers\ViewMedicalReportController;
use App\Http\Controllers\SuperAdmin\LoginController;
use App\Http\Controllers\SuperAdmin\Permission\RolePermissionController;
use App\Http\Controllers\SuperAdmin\Patients\PatientsController;
use App\Http\Controllers\SuperAdmin\Price\OtherExpenseController;

use App\Http\Controllers\SuperAdmin\RadiologyController;
use App\Http\Controllers\SuperAdmin\BranchManagementController;

use App\Http\Controllers\SuperAdmin\Doctors\DoctorController;
use App\Http\Controllers\SuperAdmin\Staff\AccountantController;
use App\Http\Controllers\SuperAdmin\PathologyController;
use App\Http\Controllers\SuperAdmin\Staff\NurseController;
use App\Http\Controllers\SuperAdmin\Staff\TeleCallerController;
use App\Http\Controllers\Doctor\DoctorAuthController;
use App\Http\Controllers\Doctor\DoctorDashboadController;

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


Route::get('cache', function () {
    Artisan::call('optimize');

    Artisan::call('cache:clear');

    Artisan::call('route:cache');

    Artisan::call('route:clear');

    Artisan::call('view:clear');

    Artisan::call('config:clear');
});



Route::get('/', function () {
    return view('front/home');
})->name('front.home.page');
Route::get('/service', function () {
    return view('front/service');
})->name('front.service.page');

/*
|--------------------------------------------------------------------------
| Admin user Routes
|--------------------------------------------------------------------------
*/


    // patient route
    Route::prefix('patient')->name('patient.')->group(function () {
    Route::group(['middleware' => ['auth:web']], function () {
         Route::get('dashboard', [PatientController::class, 'dashboard'])->name('dashboard');
         Route::get('patient-info-edit', [PatientController::class, 'patient_info_edit'])->name('patient-info-edit');
         Route::post('patient-info-update', [PatientController::class, 'patient_info_update'])->name('patient-info-update');
         Route::post('patient-delete', [PatientController::class, 'patient_delete'])->name('patient_delete');
        Route::get('logout', [PatientController::class, 'logout'])->name('logout');
     });
    });

Route::prefix('login')->group(function () {

    Route::any('/common-login', [DoctorAuthController::class, 'login'])->name('common.login');
    Route::post('/patient-login', [DoctorAuthController::class, 'patientLogin'])->name('patient.login');
    Route::post('/staff-login', [DoctorAuthController::class, 'staffLogin'])->name('staff.login');
    Route::get('register', [DoctorAuthController::class, 'showRegistrationForm'])->name('admin.register');
    Route::post('register', [DoctorAuthController::class, 'register'])->name('admin.register.submit');
    Route::get('forget-password', [DoctorAuthController::class, 'showLinkRequestForm'])->name('admin.forget.password');
    Route::post('send-otp', [DoctorAuthController::class, 'sendOtp']);
    Route::get('verify-otp', [DoctorAuthController::class, 'verifyOtp']);
    Route::post('verified-otp', [DoctorAuthController::class, 'verifiedOtp']);
    Route::get('change-password', [DoctorAuthController::class, 'updatePassword']);
    Route::post('update-new-password', [DoctorAuthController::class, 'updateNewPassword'])->name('admin.reset');
    // Authenticated route for the dashboard
    // Route::middleware(['IsDoctor'])->group(function () {



    // doctor route
    Route::group(['middleware' => ['auth:doctor']], function () {

        Route::get('patient', [PatientController::class, 'index'])->name('user.patient');
        Route::get('task', [NurseLoginWeb::class, 'nurseTask'])->name('nurseTask');
        Route::post('task-assigned-to-nurse', [NurseLoginWeb::class, 'taskAssignedToNurse'])->name('taskAssignedToNurse');
        Route::get('task-assigned-to-lab', [NurseLoginWeb::class, 'taskAssignedToLab'])->name('taskAssignedToLab');
        Route::post('lab-document-upload', [NurseLoginWeb::class, 'labDocumentUpload'])->name('labDocumentUpload');

        Route::get('dashboard', [DoctorDashboadController::class, 'index'])->name('admin.dashboard');
        Route::get('logout', [DoctorAuthController::class, 'logout'])->name('doctor.logout');
        Route::post('patient-delete', [PatientController::class, 'patient_delete'])->name('user.patient_delete');
        Route::post('add-patient-vital/{id?}', [PatientController::class, 'patient_vital'])->name('user.patient_vital');
        Route::post('add-patient-diagnosis/{id?}', [PatientController::class, 'Add_Diagnosis'])->name('user.Add_Diagnosis');
        Route::post('add-patient-Symptoms/{id?}', [PatientController::class, 'Add_Symptoms'])->name('user.Add_Symptoms');
        Route::post('add-patient-OrderSpecialInvistigation/{id?}', [PatientController::class, 'OrderSpecialInvistigation'])->name('user.OrderSpecialInvistigation');
        Route::post('add-patient-MDTReview/{id?}', [PatientController::class, 'MDTReview'])->name('user.MDTReview');
        Route::post('add-patient-EligibilityStatus/{id?}', [PatientController::class, 'EligibilityStatus'])->name('user.EligibilityStatus');
        Route::get('patient-vital-list', [PatientController::class, 'patient_vital_list'])->name('user.patient_vital_list');
        Route::get('patient-progress-list', [PatientController::class, 'patient_progress_list'])->name('user.patient_progress_list');
        Route::get('patient-progress-predefine-note-list', [PatientController::class, 'patient_progress_predefine_notes_list'])->name('user.patient_progress_predefine_notes_list');
        Route::post('patient-progress-list-save', [PatientController::class, 'patient_progress_list_save'])->name('user.patient_progress_list_save');
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
        Route::get('invoice', [InvoiceController::class, 'index'])->name('user.invoice');
        Route::get('calendar', [CalendarController::class, 'index'])->name('user.calendar');
        Route::get('view-medical-report', [ViewMedicalReportController::class, 'index'])->name('user.view-medical-report');
        Route::post('EligibilityForms', [PatientController::class, 'slectEligibilityForms'])->name('user.slectEligibilityForms');
      
        
       
       
    
            /*
            |--------------------------------------------------------------------------
            | all forms view route below.
            |--------------------------------------------------------------------------
            */
        

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















        // Route::get('view-uterine-embo-ablation-form/{id}', [PatientController::class, 'ViewUterineEmboForm'])->name('user.ViewUterineEmboForm');
        // Route::get('view-varicocele-embo-form/{id}', [PatientController::class, 'ViewVaricoceleEmboForm'])->name('user.ViewVaricoceleEmboForm');
        // Route::get('view-cong-embo-form/{id}', [PatientController::class, 'ViewCongEmboForm'])->name('user.ViewCongEmboForm');
        // Route::get('view-varicose-ablation-form/{id}', [PatientController::class, 'ViewVaricoseAblationForm'])->name('user.ViewVaricoseAblationForm');










        // AddRemoveListDiagnosis View-Thyroid-Ablation-Form route
        Route::post('ProstateArteryEmbolizationEligibilityFormDiagnosisStore', [PatientController::class, 'ProstateArteryEmbolizationEligibilityFormDiagnosisStore'])->name('user.ProstateArteryEmbolizationEligibilityFormDiagnosisStore');
        Route::get('ProstateArteryEmbolizationEligibilityFormDiagnosisList', [PatientController::class, 'ProstateArteryEmbolizationEligibilityFormDiagnosisList'])->name('user.ProstateArteryEmbolizationEligibilityFormDiagnosisList');
        Route::post('ProstateArteryEmbolizationEligibilityFormDiagnosisStore', [PatientController::class, 'ProstateArteryEmbolizationEligibilityFormDiagnosisDelete'])->name('user.ProstateArteryEmbolizationEligibilityFormDiagnosisDelete');
    });
});


Route::prefix('admin')->group(function () {
    Route::any('/', [LoginController::class, 'login'])->name('admin.login');
    Route::group(['middleware' => ['auth:admin']], function () {

        Route::get('/dashboard', [LoginController::class, 'index'])->name('super-admin.dashboard');
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
            
        });

        Route::name('doctors.')->prefix('doctors')->controller(DoctorController::class)->group(function () {

            Route::get('/', 'index')->name('index');
            Route::post('/delete', 'doctor_delete')->name('doctor_delete');
            Route::any('/create', 'create')->name('create');
            Route::any('/view/{id}', 'view')->name('view');
            Route::any('/edit/{id}', 'edit')->name('edit');
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


        Route::name('expense.')->prefix('other-price')->controller(OtherExpenseController::class)->group(function () {
            Route::match(['get', 'post'], '/', 'index')->name('index');
            Route::match(['get', 'post'], '/add', 'add')->name('add');
            Route::post('/update', 'edit')->name('edit');
        });
    });
});
