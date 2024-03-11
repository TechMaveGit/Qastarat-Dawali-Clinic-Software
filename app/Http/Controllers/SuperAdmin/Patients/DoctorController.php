<?php

namespace App\Http\Controllers\SuperAdmin;
use App\Http\Controllers\Controller;
use App\Models\superAdmin\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DoctorController extends Controller
{
    //
    public function index(Request $req)
    {
        return view('superAdmin.doctor.doctor-list');
    }

    public function addDoctor(Request $req)
    {
        if(request()->isMethod("post"))
        {
            $doctor = $req->except(['_token','submit']);
            $currentDate=$req->input('birth_date');
            $carbonDate = Carbon::createFromFormat('d/m/Y', $currentDate);
            $doctor['birth_date']=$carbonDate->format('d M, Y'); 
            
            Doctor::create($doctor);
            return redirect()->back()->with('message', 'Doctor added successfully!');
        }
        return view('superAdmin.doctor.doctor-add');
    }

}
