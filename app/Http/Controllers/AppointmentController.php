<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\superAdmin\Doctor;
use DB;
class AppointmentController extends Controller
{
    //
    public function geDoctor()
    {
        $locations = DB::table('doctors')->select('id','name')->where(['user_type'=>'doctor','status'=>'active'])->orderBy('id','desc')->get();
        return response()->json($locations);
       
    }


    public function addAvailability(Request $request)
    {
          $allAvailability= $request->only('doctor_id','location','day_of_the_week','date','repeats','start_time','end_time','appointment_types');
          DB::table('appontment_availability')->where('id', $request->location_update)->insert($allAvailability);
          return to_route('user.calendar')->with('message', 'Availability added successfully.');

    } 
    
}
