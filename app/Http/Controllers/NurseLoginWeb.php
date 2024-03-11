<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\patient\ThyroidDiagnosis;
use App\Models\patient\DoctorNurse;
use App\Models\User;
use Carbon\Carbon;
use DB;

class NurseLoginWeb extends Controller
{
    //
    public function nurseTask()
    {
        $nurse_id=auth('doctor')->user()->id;
       $nurse_tasks= DB::table('nurse_tasks')->where('nurse_id',$nurse_id)->get();
        // $doctorIds = DoctorNurse::where('nurse_id', $userType->id)->pluck('doctor_id')->toArray();

        // $today = Carbon::today()->toDateString();



        // if ($userType->user_type == 'nurse') {
        //     $thyroidDiagnosesData = User::select('id', 'patient_id', 'name', 'mobile_no', 'created_at')->with('thyroidDiagnoses')
        //         ->whereHas('thyroidDiagnoses', function ($query) use ($doctorIds) {
        //             $query->whereIn('doctor_id', $doctorIds);
        //         })
        //         ->get();
        //     $usersWithThyroidDiagnoses = User::select('id', 'patient_id', 'name', 'mobile_no', 'created_at')
        //         ->with(['thyroidDiagnoses' => function ($query) use ($doctorIds, $today) {
        //             $query->whereIn('doctor_id', $doctorIds)
        //                 ->whereDate('created_at', $today);
        //         }])
        //         ->whereHas('thyroidDiagnoses', function ($query) use ($doctorIds, $today) {
        //             $query->whereIn('doctor_id', $doctorIds)
        //                 ->whereDate('created_at', $today);
        //         })
        //         ->get();
        // }

        

        return view('back/task', compact('nurse_tasks'));
    }
}
