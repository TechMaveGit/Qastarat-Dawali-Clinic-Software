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
        $data['branchs'] = DB::table('branchs')->where('status','1')->get();
        return view('superAdmin.radiologys.index',$data);
    }

    public function add(Request $req)
    {

        $req->validate([
            'email' => [
                'required',
                'email' => [
                    'required',
                    'email',
                    function ($attribute, $value, $fail) {
                        // Check email uniqueness in users table
                        $userExists = DB::table('users')->where('email', $value)->exists();
                        if ($userExists) {
                            $fail('The ' . $attribute . ' has already been taken.');
                        }
            
                        // Check email uniqueness in doctors table
                        $doctorExists = DB::table('doctors')->where('email', $value)->exists();
                        if ($doctorExists) {
                            $fail('The ' . $attribute . ' has already been taken.');
                        }
                    },
                ],
            ],
           
            'post_code' => 'nullable|between:4,8|unique:doctors,post_code',
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
        $doctor = $req->only(['dial_code','mobile_no','email','post_code','lab_name','landline','status','street','town','country','password']);
        $doctor['user_type']='radiology';
        $doctor['doctor_id'] = "RA" . rand('00000', '99999' . '0');
        $doctor['password']=Hash::make($doctor['password']);
        $lastInsertedId= DB::table('doctors')->insertGetId($doctor);



        $branchName=$req->input('selectBranch');
        $branchName = json_decode(json_encode($branchName));
        if ($branchName) {
            $branchName = count($branchName);
        }
        if ($branchName > 0) 
        {
            for ($i = 0; $i < $branchName; $i++) 
              {
                    DB::table('user_branchs')->insertGetId([
                        'patient_id'        => $lastInsertedId,
                        'add_branch'        => $req->input('selectBranch')[$i],
                        'branch_type'       => 'radiology'
                    ]);
              }
        }




        return redirect()->back()->with('message', 'Lab Added Successfully');
    }

    public function edit(Request $request)
    {
            $id=$request->input('id');
            $request->validate([
                'email' => [
                    'required',
                    'email',
                    function ($attribute, $value, $fail) use ($id) {
                        // Check email uniqueness in users table, excluding the current user
                        $userExists = DB::table('users')
                            ->where('email', $value)
                            ->where('id', '!=', $id)
                            ->exists();
                        if ($userExists) {
                            $fail('The ' . $attribute . ' has already been taken.');
                        }
        
                        // Check email uniqueness in doctors table
                        $doctorExists = DB::table('doctors')
                            ->where('email', $value)
                            ->where('id', '!=', $id)
                            ->exists();
                        if ($doctorExists) {
                            $fail('The ' . $attribute . ' has already been taken.');
                        }
                    },
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

            $radiologys = $request->except(['selectBranch','_token','submit']);
           
            if (!empty($request->password)) {  
                $radiologys['password'] = Hash::make($request->input('password'));
            }
            if(empty($request->password))
            {
                $radiologys['password'] = DB::table('doctors')->where('id',$id)->first()->password??'';
            }

            DB::table('doctors')->whereId($id)->update($radiologys);


            DB::table('user_branchs')->where('patient_id',$id)->where('branch_type','radiology')->delete();
            $branchName=$request->input('selectBranch');
            $branchName = json_decode(json_encode($branchName));
            if ($branchName) {
                $branchName = count($branchName);
            }
            if ($branchName > 0) 
            {
                for ($i = 0; $i < $branchName; $i++) 
                  {
                        DB::table('user_branchs')->insertGetId([
                            'patient_id'        => $id,
                            'add_branch'        => $request->input('selectBranch')[$i],
                            'branch_type'       => 'radiology'
                        ]);
                  }
            }
    
            return to_route('radiology.index')->with('message', 'Lab Updated Successfully');
    }
}
