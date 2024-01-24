<?php

namespace App\Http\Controllers\SuperAdmin\Staff;
use App\Http\Controllers\Controller;
use App\Models\superAdmin\Doctor;
use App\Models\Telecallers;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TelecallerController extends Controller
{
    public function index()
    {
        $data['tls']=Doctor::where('user_type','telecaller')->orderBy('id','desc')->get();
        return view('superAdmin.telecaller.index')->with($data);
    }
    public function create(Request $request)
    {
        if(request()->isMethod("post"))
        {  
            $request->validate([
                'email' => 'required|email|unique:doctors,email',
                'mobile_no' => 'required|numeric|unique:doctors,mobile_no',
                'password' =>'required|min:6',
                'post_code' =>'numeric'
            ]);
            $telecaller = $request->except(['_token','submit']);
          
            $telecaller['doctor_id'] = "TC".rand('00000','99999'.'0');
            $telecaller['password']  = Hash::make($request->input('password'));
            $telecaller['user_type']  = 'telecaller';
            Doctor::create($telecaller);
            return to_route('telecallers.index')->with('message', 'Telecaller Updated Successfully.');
        }
        return view('superAdmin.telecaller.create');
    }

    public function edit(Request $request,$id)
    {
        $data['telecaller']=Doctor::whereId($id)->first();
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
            return to_route('telecallers.index')->with('message', 'Telecaller Updated Successfully.');
        }
        return view('superAdmin.telecaller.edit',$data);
    }

}
