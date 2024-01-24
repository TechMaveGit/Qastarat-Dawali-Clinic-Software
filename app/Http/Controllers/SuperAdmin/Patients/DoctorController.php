<?php

namespace App\Http\Controllers\SuperAdmin;
use App\Http\Controllers\Controller;
use App\Models\superAdmin\Doctor;
use Illuminate\Http\Request;

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
            Doctor::create($doctor);
            return redirect()->back()->with('message', 'Doctor added successfully!');
        }
        return view('superAdmin.doctor.doctor-add');
    }

}
