<?php

namespace App\Http\Controllers\SuperAdmin\Staff;
use App\Http\Controllers\Controller;
use App\Models\Nurse;
use App\Models\superAdmin\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Validation\Rule;
class NurseController extends Controller
{

    public function index()
    {
        $data['nurse'] = Doctor::where('user_type','nurse')->orderBy('id','desc')->get();
        return view('superAdmin.nurse.index',$data);
    }

    public function create(Request $request)
    {
        if(request()->isMethod("post"))
        {
            $request->validate([
                'email' => 'required|email|unique:nurses,email',
                'mobile_no' => 'required|numeric|unique:nurses,mobile_no',
                'post_code' =>'numeric',
                'password'  =>'required|min:6'
            ]);
            $nurses = $request->except(['_token','submit']);
            // dd($nurses);
            $nurses['doctor_id'] = "NA".rand('00000','99999'.'0');
            $nurses['user_type'] = 'nurse';
            $nurses['password'] = Hash::make($request->input('password'));
            Doctor::create($nurses);
            return to_route('nurses.index')->with('message', 'Nurse Updated Successfully.');
        }
        return view('superAdmin.nurse.create');
    }

    public function edit(Request $request,$id)
    {

        $data['nurse']=Doctor::whereId($id)->first();
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
            return to_route('nurses.index')->with('message', 'Nurse Updated Successfully.');
        }
        return view('superAdmin.nurse.edit',$data);
    }


    public function store(Request $request)
    {
        $validated = $request->validate(['name' => ['required', 'min:3']]);
        Doctor::create($validated);

        return to_route('nurses.index')->with('message', 'Nurse Created successfully.');
    }


    public function show(User $user)
    {

        return view('superAdmin.nurse.edit');
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate(['name' => ['required', 'min:3']]);
        $user->update($validated);

        return to_route('nurses.index')->with('message', 'Nurse Updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return back()->with('message', 'Nurse deleted.');
    }
}
