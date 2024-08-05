<?php

namespace App\Http\Controllers\SuperAdmin\Staff;
use App\Http\Controllers\Controller;
use App\Models\superAdmin\Doctor;
use App\Models\Telecallers;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Carbon;
class TelecallerController extends Controller
{
    public function index()
    {
        $data['tls']=Doctor::select('patient_profile_img', 'doctor_id', 'name', 'email', 'id', 'post_code', 'mobile_no')
                            ->where('user_type','telecaller')->orderBy('id','desc')->get();
        return view('superAdmin.telecaller.index')->with($data);
    }
    public function create(Request $request)
    {
        if(request()->isMethod("post"))
        {  
            $request->validate([
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
                            $fail('The ' . $attribute . ' must end with .com ');
                        }
                    },
                ],
                'post_code' => 'between:4,8',
                'graduation_year' => 'nullable|regex:/^\d{4}$/',
                'birth_date'=>'required',
                'landline' => 'nullable|numeric|digits_between:10,15',
                'mobile_no' => 'required|numeric|unique:doctors,mobile_no|digits_between:10,15|regex:/^[0-9]{10,15}$/',
                'password' => 'required|min:6',
                // 'birth_date' => 'required|date',
                'name' => 'required',
                'gendar'=>'required',
                'title' => 'required'
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
                'name.required' => 'Name is required.',
                'gendar.required' => 'Gender  is required.',
                'title.required' => 'Title  is required.',
            ]);
            $telecaller = $request->except(['_token','submit']);
          
            $telecaller['doctor_id'] = "TC".rand('00000','99999'.'0');
            $telecaller['password']  = Hash::make($request->input('password'));
            $telecaller['user_type']  = 'telecaller';
            $currentDate = $request->input('birth_date');
             // Regular expressions to match the two date formats
             $regexDMY = '/^\d{2}-\d{2}-\d{4}$/';
             $regexDFY = '/^\d{2} [a-zA-Z]{3}, \d{4}$/';

             if (preg_match($regexDMY, $currentDate)) {
                 // '22-02-2024' format matches
                 $carbonDate = Carbon::createFromFormat('d-m-Y', $currentDate);
             } elseif (preg_match($regexDFY, $currentDate)) {
                 // '01 May, 2000' format matches
                 $carbonDate = Carbon::createFromFormat('d M, Y', $currentDate);
             }
             else {
                 // '14-Jun-2004' format matches
                 $carbonDate = Carbon::createFromFormat('d-M-Y', $currentDate);
             }
            $telecaller['birth_date']=$carbonDate->format('d M, Y'); 
            if ($request->hasFile('patient_profile_img')) {
                $files = $request->file('patient_profile_img');
                $destinationPath = public_path('/assets/telecaller_profile');
                $file_name = md5(uniqid()) . "." . $files->getClientOriginalExtension();
                $files->move($destinationPath, $file_name);
                $telecaller['patient_profile_img'] = $file_name;
            }
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
                'graduation_year' => 'nullable|regex:/^\d{4}$/',
                'birth_date'=>'required',
                'landline' => 'nullable|numeric',
                'password' => 'nullable|min:6',
                'mobile_no' => [
                    'required',
                    'numeric',
                    'regex:/^[0-9]{10,15}$/',
                    Rule::unique('doctors')->ignore($id),
                ],
            ]);

            $nurse = $request->except(['_token','submit']);
           $nurse_info=Doctor::findOrFail($id);
            if ($request->hasFile('patient_profile_img')) {
                $files = $request->file('patient_profile_img');
                $destinationPath = public_path('/assets/telecaller_profile');
            
                // Get the existing file path from the database
                $existingFilePath = $nurse_info->patient_profile_img;
            
                // If an existing file exists, delete it
                if ($existingFilePath && file_exists(public_path($existingFilePath))) {
                    unlink(public_path($existingFilePath));
                }
           
                $file_name = md5(uniqid()) . "." . $files->getClientOriginalExtension();
                $files->move($destinationPath, $file_name);
                 $nurse['patient_profile_img'] = $file_name;
            }
            if($request->has('password') && isset($request->password)){
                
                $nurse['password'] = Hash::make($request->input('password'));

            }
            

            
            $currentDate = $request->input('birth_date');
            // Regular expressions to match the two date formats
            $regexDMY = '/^\d{2}-\d{2}-\d{4}$/';
            $regexDFY = '/^\d{2} [a-zA-Z]{3}, \d{4}$/';

            if (preg_match($regexDMY, $currentDate)) {
                // '22-02-2024' format matches
                $carbonDate = Carbon::createFromFormat('d-m-Y', $currentDate);
            } elseif (preg_match($regexDFY, $currentDate)) {
                // '01 May, 2000' format matches
                $carbonDate = Carbon::createFromFormat('d M, Y', $currentDate);
            }
            else {
                // '14-Jun-2004' format matches
                $carbonDate = Carbon::createFromFormat('d-M-Y', $currentDate);
            }
                $nurse['birth_date'] = $carbonDate->format('d M, Y');
                $nurse_info->update($nurse);
            return to_route('telecallers.index')->with('message', 'Telecaller Updated Successfully.');
        }
        return view('superAdmin.telecaller.edit',$data);
    }
    public function telecaller_delete(Request $request)
    {
        // dd('hii');
        $id = $request->common;
        $Doctor=Doctor::findOrFail($id);
        // dd($patient);
        
            $files = $request->file('patient_profile_img');
            $destinationPath = public_path('/assets/telecaller_profile/');
        
            // Get the existing file path from the database
            $existingFilePath = $Doctor->patient_profile_img;
            $destinationPath=$destinationPath.$existingFilePath;
            
            if (isset($existingFilePath) && file_exists(public_path($destinationPath))) {
              
                unlink(public_path($existingFilePath));
            }
        
            $Doctor->delete();

        return to_route('telecallers.index')->with('message', 'Doctor deleted.');
    }
}
