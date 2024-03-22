<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ViewMedicalReportController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
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

Route::get('/', function () {
    return view('front/home');
})->name('front.home.page');
Route::get('/service', function () {
    return view('front/service');
})->name('front.service.page');
// Route::get('/front/signup', function () {
//     return view('front/sign-up');
// })->name('front.signup.page');
// Route::get('/front/login', function () {
//     return view('front/login');
// })->name('front.login.page');
// Route::get('/front/forget', function () {
//     return view('front/forget-password');
// })->name('front.forget.page');

// Routes for user login
Route::prefix('patient')->group(function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('user.login');
    Route::post('login', [AuthController::class, 'login'])->name('user.login.submit');
    Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('user.register');
    Route::post('register', [AuthController::class, 'register'])->name('user.register.submit');
    Route::get('forget-password', [AuthController::class, 'forgetPassword'])->name('user.forget.password');
    Route::post('forget-password-post', [AuthController::class, 'postForgetPassword'])->name('user.forget.password.post');
    Route::get('reset/{token}', [AuthController::class, 'resetForgetPassword'])->name('user.forget.password.reset');
    Route::get('verify-otp/{email}',[AuthController::class,'verifyOtp'])->name('user.verify-otp');
    Route::post('verified-otp',[AuthController::class,'verifiedOtp'])->name('user.verified-otp');
    Route::get('resend-otp',[AuthController::class,'resendOtp'])->name('user.resendOtp');
    Route::get('change-password',[AuthController::class,'updatePassword'])->name('user.change-password');
    Route::post('update-new-password/{token}',[AuthController::class,'updateNewPassword'])->name('user.reset');
    // Authenticated route for the dashboard 
    Route::middleware(['auth'])->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('user.dashboard');
        Route::get('logout', [AuthController::class, 'logout'])->name('user.logout');
        // Route::get('patient', [PatientController::class, 'index'])->name('user.patient');
        // Route::get('getPatientsData', [PatientController::class, 'getPatientsData'])->name('user.getPatientsData');
        // Route::post('patient-store', [PatientController::class, 'store'])->name('user.patient.store');
        // Route::get('patient-detail/{id}', [PatientController::class, 'patient_detail'])->name('user.patient-detail');
        // Route::get('patient-medical-detail/{id}', [PatientController::class, 'patient_medical_detail'])->name('user.patient_medical_detail');
        // Route::get('invoice', [InvoiceController::class, 'index'])->name('user.invoice');
        // Route::get('calendar', [CalendarController::class, 'index'])->name('user.calendar');
        // Route::get('view-medical-report', [ViewMedicalReportController::class, 'index'])->name('user.view-medical-report');
        // Other user dashboard routes...
    });
});




/*
|--------------------------------------------------------------------------
| Admin user Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->group(function () {
    Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
    Route::get('register', [AdminAuthController::class, 'showRegistrationForm'])->name('admin.register');
    Route::post('register', [AdminAuthController::class, 'register'])->name('admin.register.submit');
    Route::get('forget-password', [AdminAuthController::class, 'showLinkRequestForm'])->name('admin.forget.password');
    Route::post('send-otp',[AdminAuthController::class,'sendOtp']);
    Route::get('verify-otp',[AdminAuthController::class,'verifyOtp']);
    Route::post('verified-otp',[AdminAuthController::class,'verifiedOtp']);
    Route::get('change-password',[AdminAuthController::class,'updatePassword']);
    Route::post('update-new-password',[AdminAuthController::class,'updateNewPassword'])->name('admin.reset');
    // Authenticated route for the dashboard
    Route::middleware(['IsAdmin'])->group(function () {
        Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
        Route::get('patient', [PatientController::class, 'index'])->name('user.patient');
        Route::post('patient-delete', [PatientController::class, 'patient_delete'])->name('user.patient_delete');
        Route::post('add-patient-vital/{id?}', [PatientController::class, 'patient_vital'])->name('user.patient_vital');
        Route::get('patient-vital-list', [PatientController::class, 'patient_vital_list'])->name('user.patient_vital_list');
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
        // Other admin dashboard routes...
    });
});
