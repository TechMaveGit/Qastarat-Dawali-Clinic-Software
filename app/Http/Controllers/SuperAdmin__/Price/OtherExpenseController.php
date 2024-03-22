<?php

namespace App\Http\Controllers\SuperAdmin\Price;
use App\Http\Controllers\Controller;
use App\Models\superAdmin\Doctor;
use App\Models\User;
use App\Models\Accountant;
use Illuminate\Http\Request;
use Hash;
use DB;

class OtherExpenseController extends Controller
{

    public function index(Request $req)
    {
        $data['allexpenses'] = DB::table('allexpenses')->get();
        return view('superAdmin.price.index',$data);
    }

    public function add(Request $req)
    {
        $doctor = $req->except(['_token','submit']);
        DB::table('allexpenses')->insert($doctor);
        return redirect()->back()->with('message', 'Price added successfully!');
    }

    public function edit(Request $request)
    {
            $id=$request->input('id');
            $allexpenses = $request->except(['_token','submit']);
            DB::table('allexpenses')->whereId($id)->update($allexpenses);
            return to_route('expense.index')->with('message', 'Price Updated Successfully.');
    }

}
