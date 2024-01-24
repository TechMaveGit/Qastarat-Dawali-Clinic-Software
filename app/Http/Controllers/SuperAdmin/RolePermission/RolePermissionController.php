<?php

namespace App\Http\Controllers\SuperAdmin;
use App\Http\Controllers\Controller;
use App\Models\superAdmin\Doctor;
use Illuminate\Http\Request;

class RolePermissionController extends Controller
{
    //
    public function index(Request $req)
    {
        return view('superAdmin..doctor-list');
    }

    public function create(Request $request)
    {
        if(request()->isMethod("post"))
        {
            $doctor = $request->except(['_token','submit']);
            Doctor::create($doctor);
            return redirect()->back()->with('message', 'Doctor added successfully!');
        }
        return view('superAdmin.doctor.doctor-add');
    }

}
