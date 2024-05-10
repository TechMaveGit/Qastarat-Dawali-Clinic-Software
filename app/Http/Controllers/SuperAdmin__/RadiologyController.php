<?php

namespace App\Http\Controllers\SuperAdmin;
use App\Http\Controllers\Controller;
use App\Models\superAdmin\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Hash;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
class RadiologyController extends Controller
{

    public function index(Request $req)
    {
        $data['radiologys'] = DB::table('doctors')->where('user_type','radiology')->orderBy('id','desc')->get();
        return view('superAdmin.radiologys.index',$data);
    }

    public function add(Request $req)
    {
        $req->validate([
            'email' => [
                'required',
                'email',
                'unique:doctors,email',
                function ($attribute, $value, $fail) {
                    // Custom rule to check email domain
                    $validDomains = ['.com'];
                    $valid = false;
                    foreach ($validDomains as $domain) {
                        if (str_ends_with(strtolower($value), $domain)) {
                            $valid = true;
                        }
                    }
                    if (!$valid) {
                        $fail('The ' . $attribute . ' must end with .com');
                    }
                },
            ],
            'post_code' => 'nullable|between:4,8',
            'landline' => 'nullable|numeric|digits_between:10,15',
            'mobile_no' => 'required|numeric|unique:doctors,mobile_no|digits_between:10,15|regex:/^[0-9]{10,15}$/',
            'password' => 'required|min:6',
            'lab_name' => 'required',

        ], [
            'email.required' => 'Email is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email is already taken.',
            'post_code.digits_between' => 'Post code must be between 4 and 8 digits.',
            'landline.numeric' => 'Landline must be a number.',
            'landline.digits_between' => 'Landline must be between 10 and 15 digits.',
            'mobile_no.required' => 'Mobile Phone is required.',
            'mobile_no.numeric' => 'Mobile Phone must be a number.',
            'mobile_no.unique' => 'This mobile Phone is already taken.',
            'mobile_no.digits_between' => 'Mobile number must be between 10 and 15 digits.',
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least :min characters.',
            // 'birth_date.required' => 'Date of Birth  is required.',
            // 'birth_date.date' => 'Please enter a valid date for the birth date.',
            'lab_name.required' => 'Lab Name is required.',

        ]);
        $doctor = $req->only(['mobile_no','email','post_code','lab_name','landline','street','town','country','password']);
        $doctor['user_type']='radiology';
        $doctor['doctor_id'] = "RA" . rand('00000', '99999' . '0');
        $doctor['password']=Hash::make($doctor['password']);
        DB::table('doctors')->insert($doctor);
        return redirect()->back()->with('message', 'Radiologys added successfully!');
    }

    public function edit(Request $request)
    {
            $id=$request->input('id');
            $request->validate([
                'email' => [
                    'required',
                    'email',
                    Rule::unique('doctors')->ignore($id),
                ],
                'post_code' => 'nullable|between:4,8',
                'lab_name' => 'required',
                'landline' => 'nullable|numeric',
                'password' => 'nullable|min:6',
                'mobile_no' => [
                    'required',
                    'regex:/^[0-9]{10,15}$/',
                    'numeric',
                    Rule::unique('doctors')->ignore($id),
                ],
    
            ]);
            $radiologys = $request->except(['_token','submit']);
            if ($request->has('password') && isset($request->password)) {
    
                $radiologys['password'] = Hash::make($request->input('password'));
            }
           
            DB::table('doctors')->whereId($id)->update($radiologys);
            return to_route('radiology.index')->with('message', 'Radiologys Updated Successfully.');

    }




}
