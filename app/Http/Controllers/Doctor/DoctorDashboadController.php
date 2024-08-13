<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class DoctorDashboadController extends Controller
{
    //
    public function index(Request $request)       
    {

        $id = auth('doctor')->user()->id;
      
        $labtasks= DB::table('tasks')->where('test_type','!=','other')->whereNotNull('labDocument')->where('doctor_id',$id)->count();
        
        $payAmount= DB::table('tasks')->where('test_type','!=','other')->where('paymentMethod','Cash')->where('doctor_id',$id)->count();

        $unpayAmount= DB::table('tasks')->where('test_type','!=','other')->where('toInvoiceStatus','1')->where('doctor_id',$id)->where('paidStatus','0')->count();

    
        $paid= DB::table('tasks')->where('test_type','!=','other')->where('paidstatus','1')->where('doctor_id',$id)->count();

        $imagingCount= DB::table('tasks')->where('test_type','radiology')->where('doctor_id',$id)->count();

        $user= DB::table('users')->where('doctor_id',$id)->count();

        $patient_order_procedures= DB::table('patient_order_procedures')->where('doctor_id',$id)->count();          

        $currentMonth = date('m');

        $currentYear  = date('Y');  

        $count = DB::table('tasks')->where('test_type','!=','other')
                                 ->where('toInvoiceStatus','1')
                                ->whereMonth('created_at', '=', $currentMonth)
                                ->whereYear('created_at', '=', $currentYear)
                                ->where('doctor_id',$id)
                                ->count();

         $doctorUserAmount = DB::table('users')->select('doctor_id')->where('doctor_id',$id)->pluck('doctor_id')->toArray('doctor_id');    
         


         $year = $request->input('yearName') ?? date('Y'); 
         
         for ($i = 1; $i <= 12; $i++)
          {
              $doctorRes[]  = DB::table('tasks')->where('test_type','!=','other')->whereIn('doctor_id',$doctorUserAmount)->where('paidStatus','1')->whereYear('created_at', $year)->whereMonth('created_at', $i)->sum('finalAmount');  
          }



            $currentYear = date('Y');
            $startYear = 2023; 
            $years = range($startYear, $currentYear);

            return view('back/dashboard',compact('user','labtasks','imagingCount','patient_order_procedures','paid','count','payAmount','years','year','unpayAmount','doctorRes'));
          
    }
}

