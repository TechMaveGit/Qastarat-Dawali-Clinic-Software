<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\InvoiceController;
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


Route::prefix('login')->group(function () {
    Route::get('dashboard', [PatientController::class, 'home'])->name('patients.dashboard');
    Route::any('/', [DoctorAuthController::class, 'login'])->name('common.login');
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


    // patient route 
    Route::group(['middleware' => ['auth:web']], function () {
       
        Route::get('logout', [PatientController::class, 'logout'])->name('patients.logout');
    });

    // doctor route 
    Route::group(['middleware' => ['auth:doctor']], function () {
        Route::get('patient', [PatientController::class, 'index'])->name('user.patient');
        Route::get('dashboard', [DoctorDashboadController::class, 'index'])->name('admin.dashboard');
        Route::get('logout', [DoctorAuthController::class, 'logout'])->name('doctor.logout');
        Route::post('patient-delete', [PatientController::class, 'patient_delete'])->name('user.patient_delete');
        Route::post('add-patient-vital/{id?}', [PatientController::class, 'patient_vital'])->name('user.patient_vital');
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
        Route::post('UterineEmboEligibilityForms', [PatientController::class, 'storeUterineEmboEligibilityForms'])->name('user.storeUterineEmboEligibilityForms');
        Route::post('storeVaricoceleEmboEligibilityForms', [PatientController::class, 'storeVaricoceleEmboEligibilityForms'])->name('user.storeVaricoceleEmboEligibilityForms');
        Route::get('prostate-artery-embolization-eligibility-form/{patient_id}', [PatientController::class, 'ProstateArteryEmbolizationEligibilityForm'])->name('user.ProstateArteryEmbolizationEligibility');
        Route::get('thyroid-eligibility-form/{patient_id}', [PatientController::class, 'ThyroidEligibilityForm'])->name('user.ThroidEmbolizationEligibilityForms');
        Route::get('uterine-embo-eligibility-form/{patient_id}', [PatientController::class, 'UterineEmboEmbolizationEligibilityForms'])->name('user.UterineEmboEmbolizationEligibilityForms');
        Route::get('varicocele-embo-eligibility-form/{patient_id}', [PatientController::class, 'VaricoceleEmboEmbolizationEligibilityForms'])->name('user.VaricoceleEmboEmbolizationEligibilityForms');
        Route::post('storeProstateEligibilityForms', [PatientController::class, 'storeProstateEligibilityForms'])->name('user.storeProstateEligibilityForms');
        Route::get('varicose-ablation-eligibility-form/{patient_id}', [PatientController::class, 'VaricoseAblationEligibilityForms'])->name('user.VaricoseAblationEligibilityForms');
        Route::post('ThyroidEligibilityForms', [PatientController::class, 'storeThyroidEligibilityForms'])->name('user.storeThyroidEligibilityForms');
        Route::post('store-varicose-ablation-eligibility-form/', [PatientController::class, 'StoreVaricoseAblationEligibilityForms'])->name('user.StoreVaricoseAblationEligibilityForms');
        // Other admin dashboard routes.
        Route::get('View-Thyroid-Ablation-Form/{id}', [PatientController::class, 'ViewThyroidAblationForm'])->name('user.ViewThyroidAblationForm');
        //  all forms view route.
        Route::get('view-uterine-embo-ablation-form/{id}', [PatientController::class, 'ViewUterineEmboForm'])->name('user.ViewUterineEmboForm');
        Route::get('view-varicocele-embo-form/{id}', [PatientController::class, 'ViewVaricoceleEmboForm'])->name('user.ViewVaricoceleEmboForm');
        Route::get('view-cong-embo-form/{id}', [PatientController::class, 'ViewCongEmboForm'])->name('user.ViewCongEmboForm');
        Route::get('view-varicose-ablation-form/{id}', [PatientController::class, 'ViewVaricoseAblationForm'])->name('user.ViewVaricoseAblationForm');

        // AddRemoveListDiagnosis form route
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
            Route::any('/{id}', 'edit')->name('edit');
            Route::post('/delete', 'delete')->name('delete');
        });

        Route::name('doctors.')->prefix('doctors')->controller(DoctorController::class)->group(function () {

            Route::get('/', 'index')->name('index');
            Route::any('/create', 'create')->name('create');
            Route::get('/view/{id}', 'view')->name('view');
            Route::any('/edit/{id}', 'edit')->name('edit');
        });


        Route::prefix('staffs')->group(function () {

            // Nurse Routes
            Route::name('nurses.')->prefix('nurses')->controller(NurseController::class)->group(function () {
                Route::get('/', 'index')->name('index');
                Route::any('/create', 'create')->name('create');
                Route::match(['get', 'post'], '/edit/{id}', 'edit')->name('edit');
                Route::get('/show/{doctor}', 'show')->name('show');
                Route::delete('/nurse/{nurse}', 'destroy')->name('destroy');
            });

            // Accountant Routes
            Route::name('accountants.')->prefix('accountants')->controller(AccountantController::class)->group(function () {
                Route::get('/', 'index')->name('index');
                Route::any('/create', 'create')->name('create');
                Route::match(['get', 'post'], '/edit/{id}', 'edit')->name('edit');
                Route::get('/show/{id}', 'show')->name('show');
                Route::delete('/accountant/{accountant}', 'destroy')->name('destroy');
            });

            // Telecaller Routes
            Route::name('telecallers.')->prefix('telecallers')->controller(TelecallerController::class)->group(function () {
                Route::get('/', 'index')->name('index');
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


        Route::name('expense.')->prefix('other-expense')->controller(OtherExpenseController::class)->group(function () {
            Route::match(['get', 'post'], '/', 'index')->name('index');
            Route::match(['get', 'post'], '/add', 'add')->name('add');
            Route::post('/update', 'edit')->name('edit');
        });
    });
});
