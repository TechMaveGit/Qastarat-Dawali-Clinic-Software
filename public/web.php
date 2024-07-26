<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\admin\loginController;
use App\Http\Controllers\admin\clientController;
use App\Http\Controllers\admin\questionController;
use App\Http\Controllers\rolePermissionController;
use App\Http\Controllers\admin\dashboardController;
use App\Http\Controllers\admin\reportingController;
use App\Http\Controllers\admin\manageStaffController;
use App\Http\Controllers\admin\taskManagementController;

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

Route::get('cache', function () {
    Artisan::call('optimize');
    Artisan::call('cache:clear');
    Artisan::call('route:cache');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('config:clear');
});

Route::get('/login', function () {
    return response()->json(['error' => "unauthorised", ], 200);})->name('login');


Route::get('/', function () { 
    return redirect()->route('admin.login');
});

Route::prefix('login')->group(function () 
{
    
    Route::any('/', [loginController::class, 'login'])->name('admin.login');
    Route::group(['middleware' => ['auth']], function () 
    {

        Route::get('profile', [LoginController::class, 'profile'])->name('admin.profile');
        Route::post('update-profile', [LoginController::class, 'updateprofile'])->name('update.profile');

        Route::any('pending-task', [dashboardController::class, 'manageStaff'])->name('admin.manage.staff');

        Route::get('logout', [LoginController::class, 'logout'])->name('logout');
        Route::match(['get', 'post'], '/dashboard',[dashboardController::class, 'index'])->name('admin.dashboard');

        Route::prefix('client')->group(function () {
        Route::get('/',[clientController::class, 'allClient'])->name('client');
        Route::post('/addClient',[clientController::class, 'addClient'])->name('add.Client');
        Route::post('/editClient',[clientController::class, 'editClient'])->name('edit.Client');
        Route::delete('/deleteClient/{id}',[clientController::class, 'deleteClient'])->name('delete.Client');
        Route::match(['get', 'post'], '/manage-site',[clientController::class, 'manageSite'])->name('manage.site');
        Route::match(['get', 'post'], '/location-add',[clientController::class, 'locationAdd'])->name('manage.location.add');
        Route::match(['get', 'post'], '/location-view/{id}',[clientController::class, 'locationView'])->name('location.view');
        Route::match(['get', 'post'], '/add-task/{id}',[clientController::class, 'addTask'])->name('add.task');
        Route::match(['get','post'], '/add-more-task',[clientController::class, 'addMoreTask'])->name('add.more.task');
        Route::any('/location-edit/{id}',[clientController::class, 'locationEdit'])->name('location.edit');
        
        Route::match(['get', 'post'],'/location/{id}',[clientController::class, 'location'])->name('location');
        
    });

        Route::prefix('manage-staff')->group(function () {
            Route::get('/',[manageStaffController::class, 'staff'])->name('staff');
            Route::get('/staff-detail-view/{id}',[manageStaffController::class, 'staffView'])->name('staff.detail.view');
            Route::post('/staff-detail-edit',[manageStaffController::class, 'staffEdit'])->name('staff.edit');
            Route::post('/add-shift',[manageStaffController::class, 'addShift'])->name('add.shift');

        });


        Route::prefix('task-management')->group(function () {
            Route::get('/',[taskManagementController::class, 'allTask'])->name('task');
            Route::get('/detail',[taskManagementController::class, 'detail'])->name('task.detail');
        });

        Route::prefix('report')->group(function () {
            Route::get('/client',[reportingController::class, 'reportClient'])->name('report.client');
            Route::get('/staff',[reportingController::class, 'reportStaff'])->name('report.staff');
            Route::get('/location-list/{id}',[reportingController::class, 'locationList'])->name('location.list');
            Route::any('/reporting/{id}',[reportingController::class, 'reporting'])->name('report.reporting');
            Route::any('/staff-reporting/{id}',[reportingController::class, 'staffReporting'])->name('staff.reporting');
            Route::get('/task-detail/{id}',[reportingController::class, 'taskDetail'])->name('report.task.detail');        
        });
        
        Route::prefix('question')->group(function () {
        Route::get('/',[questionController::class, 'allQuestion'])->name('all.question');
        Route::post('/questions', [questionController::class, 'store'])->name('questions.store');
        Route::post('/update', [questionController::class, 'update'])->name('questions.update');

        });

        Route::prefix('role')->group(function () {
            Route::get('/',[rolePermissionController::class, 'userpermission'])->name('role');    
            Route::any('create-userpermission/',[rolePermissionController::class, 'createUserPermission'])->name('userpermission');   
            Route::match(['get', 'post'], '/view-permission/{id}', [rolePermissionController::class, 'viewPermission'])->name('viewPermission');   
             
            });
    });
});
