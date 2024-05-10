<?php

namespace App\Http\Controllers\SuperAdmin;
use App\Http\Controllers\Controller;
use App\Models\superAdmin\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Hash;
use DB;

class BranchManagementController extends Controller
{

    public function index(Request $req)
    {
        $data['branch'] = DB::table('branchs')->orderBy('id','desc')->get();
        return view('superAdmin.branch.index',$data);
    }

    public function add(Request $req)
    {
        $doctor = $req->except(['_token','submit']);
        DB::table('branchs')->insert($doctor);
        return redirect()->back()->with('message', 'branch added successfully!');
    }

    public function edit(Request $request)
    {
            $id=$request->input('id');
            $branch = $request->except(['_token','submit']);
            DB::table('branchs')->whereId($id)->update($branch);
            return to_route('branch.management.index')->with('message', 'branch Updated Successfully.');

    }




}
