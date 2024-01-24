<?php

namespace App\Http\Controllers\SuperAdmin;
use App\Http\Controllers\Controller;
use App\Models\superAdmin\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Hash;
use DB;

class RadiologyController extends Controller
{

    public function index(Request $req)
    {
        $data['radiologys'] = DB::table('radiologys')->get();
        return view('superAdmin.radiologys.index',$data);
    }

    public function add(Request $req)
    {
        $doctor = $req->except(['_token','submit']);
        DB::table('radiologys')->insert($doctor);
        return redirect()->back()->with('message', 'Radiologys added successfully!');
    }

    public function edit(Request $request)
    {
            $id=$request->input('id');
            $radiologys = $request->except(['_token','submit']);
            DB::table('radiologys')->whereId($id)->update($radiologys);
            return to_route('radiology.index')->with('message', 'Radiologys Updated Successfully.');

    }




}
