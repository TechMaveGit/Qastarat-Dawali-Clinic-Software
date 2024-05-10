<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class DoctorDashboadController extends Controller
{
    //
    public function index()       
    {
     //   echo "ok"; die;
      $labtasks= DB::table('tasks')->whereNotNull('labDocument')->count();
      
      $payAmount= DB::table('tasks')->whereNotNull('payAmount')->count();

      $imagingCount= DB::table('tasks')->where('test_type','radiology')->count();
      $user= DB::table('users')->count();
      
      $patient_order_procedures= DB::table('patient_order_procedures')->count();

      $currentMonth = date('m');
      $currentYear  = date('Y');   
      $count = DB::table('tasks')
                              ->whereMonth('created_at', '=', $currentMonth)
                              ->whereYear('created_at', '=', $currentYear)
                              ->count();


      return view('back/dashboard',compact('user','labtasks','imagingCount','patient_order_procedures','count','payAmount'));
    }
}


