<?php

namespace App\Http\Controllers\SuperAdmin;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Admin;
use App\Models\superAdmin\Doctor;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if(request()->isMethod("post"))
        {
         $request->validate([
            'email' => 'required:rfc',
            'password' => 'required'
            ]);

            if(Auth::guard('admin')->attempt($request->only('email','password'))){
                return redirect()->route('super-admin.dashboard');
            }
            return redirect()->back()->withInput()->with('success' , 'Login failed, please try again!');
        };

        return view('superAdmin.login');

    }
    //
    public function index(Request $request)
    {
        $doctor=Doctor::query();
       $data['patients']=User::count();
       $data['doctors']=$doctor->where('user_type','doctor')->count();
       $data['nurses']=$doctor->where('user_type','nurse')->count();
       $data['telecallers']=$doctor->where('user_type','telecaller')->count();
       $data['accountants']=$doctor->where('user_type','accountant')->count();
       $data['labs']=$doctor->where('user_type','lab')->count();
       $data['adddoctor']=Doctor::where('user_type','doctor')->get();
     
        return view('superAdmin.index',$data);
    }
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
