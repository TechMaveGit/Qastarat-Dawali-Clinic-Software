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
}
