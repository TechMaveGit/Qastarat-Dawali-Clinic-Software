<?php

namespace App\Http\Controllers\SuperAdmin\Staff;
use App\Http\Controllers\Controller;
use App\Models\superAdmin\Doctor;
use App\Models\User;
use App\Models\Accountant;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Carbon;
class AccountantController extends Controller
{

    public function index()
    {
        $data['accountant'] = Doctor::where('user_type','accountant')->select('patient_profile_img','doctor_id','name','email','id','post_code','mobile_no')->orderBy('id','desc')->get();
        return view('superAdmin.accountant.index',$data);
    }

    public function create(Request $request)
    {
        if(request()->isMethod("post"))
        {
            $request->validate([
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
                'birth_date'=>'required',
                'password' => 'required|min:6',
                'landline' => 'nullable|numeric|digits_between:10,15',
                'mobile_no' => 'required|numeric|unique:doctors,mobile_no|digits_between:10,15|regex:/^[0-9]{10,15}$/',
                // 'birth_date' => 'required|date',
                'name' => 'required',
                'gendar'=>'required',
                'graduation_year' => 'nullable|regex:/^\d{4}$/',
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
                $doctor = $request->except(['_token','submit']);
                $doctor['doctor_id'] = "AC".rand('00000','99999'.'0');
                $doctor['user_type'] = 'accountant';
                $doctor['password']  = Hash::make($request->input('password'));
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
               
               $doctor['birth_date']=$carbonDate->format('d M, Y');
                if ($request->hasFile('patient_profile_img')) {
                    $files = $request->file('patient_profile_img');
                    $destinationPath = 'public/assets/accountant_profile';
                    $file_name = md5(uniqid()) . "." . $files->getClientOriginalExtension();
                    $files->move($destinationPath, $file_name);
                    $doctor['patient_profile_img'] = $file_name;
                }
                Doctor::create($doctor);
                return to_route('accountants.index')->with('message', 'Accountant added successfully.');
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
                $destinationPath = 'public/assets/accountant_profile';
            
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

    public function accountant_delete(Request $request)
    {
        // dd('hii');
        $id = $request->common;
        $Doctor=Doctor::findOrFail($id);
        // dd($patient);
        
            $files = $request->file('patient_profile_img');
            $destinationPath = 'public/assets/accountant_profile/';
        
            // Get the existing file path from the database
            $existingFilePath = $Doctor->patient_profile_img;
            $destinationPath=$destinationPath.$existingFilePath;
            
            if (isset($existingFilePath) && file_exists(public_path($destinationPath))) {
              
                unlink(public_path($existingFilePath));
            }
        
            $Doctor->delete();

        return to_route('accountants.index')->with('message', 'Doctor deleted.');
    }

}
