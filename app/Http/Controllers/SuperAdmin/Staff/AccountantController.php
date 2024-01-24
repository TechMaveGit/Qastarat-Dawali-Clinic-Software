<?php

namespace App\Http\Controllers\SuperAdmin\Staff;
use App\Http\Controllers\Controller;
use App\Models\superAdmin\Doctor;
use App\Models\User;
use App\Models\Accountant;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Validation\Rule;
class AccountantController extends Controller
{

    public function index()
    {
        $data['accountant'] = Doctor::where('user_type','accountant')->get();
        return view('superAdmin.accountant.index',$data);
    }

    public function create(Request $request)
    {
        if(request()->isMethod("post"))
        {
            $request->validate([
                'email' => 'required|email|unique:doctors,email',
                'mobile_no' => 'required|numeric|unique:doctors,mobile_no',
                'post_code'=>'numeric',
                'password'=>'required|min:6'
            ]);
                $doctor = $request->except(['_token','submit']);
                $doctor['doctor_id'] = "AC".rand('00000','99999'.'0');
                $doctor['user_type'] = 'accountant';
                $doctor['password']  = Hash::make($request->input('password'));
                Doctor::create($doctor);
                return to_route('accountants.index')->with('message', 'Doctor added successfully.');
        }
        return view('superAdmin.accountant.create');
    }
    public function edit(Request $request,$id)
    {
        $data['accountant']=Doctor::whereId($id)->first();
        $data['id']= $id;
        if(request()->isMethod("post"))
        {
            $request->validate([
                'email' => [
                    'required',
                    'email',
                    Rule::unique('doctors')->ignore($id),
                ],
                'post_code' => 'numeric',
                'landline' => 'numeric',
                'mobile_no' => [
                    'required',
                    'numeric',
                    Rule::unique('doctors')->ignore($id),
                ],
            ]);
            $nurse = $request->except(['_token','submit']);
            Doctor::whereId($id)->update($nurse);
            return to_route('accountants.index')->with('message', 'Accountant Updated Successfully.');
        }
        return view('superAdmin.accountant.edit',$data);
    }
    public function show(User $user)
    {

        return view('superAdmin.accountant.edit');
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate(['name' => ['required', 'min:3']]);
        $user->update($validated);

        return to_route('nurses.index')->with('message', 'Accountant Updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return back()->with('message', 'Accountant deleted.');
    }

}
