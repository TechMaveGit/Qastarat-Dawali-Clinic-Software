<?php

namespace App\Http\Controllers\SuperAdmin\Staff;
use App\Http\Controllers\Controller;
use App\Models\Nurse;
use App\Models\superAdmin\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Carbon;
use DB;
class NurseController extends Controller
{

    public function index()
    {
        $data['nurse'] =   Doctor::select('id', 'patient_profile_img', 'doctor_id', 'name', 'email', 'post_code', 'mobile_no', 'user_type')
                                    ->whereNotIn('user_type', ['doctor', 'radiology','pathology'])
                                    ->orderBy('id', 'desc')
                                    ->get();
                            

        $data['role'] = DB::table('roles')->where('id','!=',1)->get();
        return view('superAdmin.nurse.index',$data);
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
            
            
            $nurses = $request->except(['_token','submit','WorkUnder']);
            if ($request->hasFile('patient_profile_img'))
            {
                
                $files = $request->file('patient_profile_img');
                
                $destinationPath = '/assets/nurse_profile';
                $file_name = md5(uniqid()) . "." . $files->getClientOriginalExtension();
                $files->move($destinationPath, $file_name);
             
                $nurses['patient_profile_img'] = $file_name;
            }
           
            if($nurses['role_id']==11){
                $nurses['doctor_id'] = "CO".rand('00000','99999'.'0');
                $nurses['user_type'] = 'Coordinator';

            }elseif($nurses['role_id']==10){
                $nurses['doctor_id'] = "REC".rand('00000','99999'.'0');
                $nurses['user_type'] = 'Receptionist';
            }elseif($nurses['role_id']==6){
                $nurses['doctor_id'] = "TEL".rand('00000','99999'.'0');
                $nurses['user_type'] = 'Telecaller';
            }elseif($nurses['role_id']==5){
                $nurses['doctor_id'] = "Acc".rand('00000','99999'.'0');
                $nurses['user_type'] = 'Accountant';
            }elseif($nurses['role_id']==2){
                $nurses['doctor_id'] = "NUR".rand('00000','99999'.'0');
                $nurses['user_type'] = 'Nurse';
            }

           


            $nurses['role_id'] = intval($nurses['role_id']);
            $nurses['password'] = Hash::make($request->input('password'));
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
            
            $nurses['birth_date']=$carbonDate->format('d M, Y');
            $nurse = Doctor::create($nurses);
            $lastInsertedId = $nurse->id;
             // Nurse insert
             $doctor = $request->input('WorkUnder');
             //    dd(intval($doctor[0]));
                    if (isset($doctor) && !empty($doctor)) {
                         $hgcount1 = count($doctor);
 
                    for ($i = 0; $i < $hgcount1; $i++)
                     {
                         DB::table('nurse_doctor')->insert([
                                             'nurse_id' =>  $lastInsertedId,
                                             'doctor_id' => intval($doctor[$i])
                                             
                                             
                                         ]);
                     }
                 }
            return to_route('nurses.index')->with('message', 'Nurse Updated Successfully.');
        }
        $data['roles'] = DB::table('roles')
                            ->where('id', '!=', 1)
                            ->get();
                            
        return view('superAdmin.nurse.create',$data);
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
            $nurse = $request->except(['_token','submit','WorkUnder']);
            $nurse_info=Doctor::findOrFail($id);
            if ($request->hasFile('patient_profile_img')) {
                $files = $request->file('patient_profile_img');
                $destinationPath = '/assets/nurse_profile';
            
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


                $result= DB::table('nurse_doctor')->where('nurse_id',$id)->delete();
                $doctor = $request->input('WorkUnder');
                if(isset($doctor) && !empty($doctor)){

                    // doctor insert
                
                //    dd(intval($doctor[0]));
                       if (isset($doctor) && !empty($doctor)) {
                            $hgcount1 = count($doctor);
    
                       for ($i = 0; $i < $hgcount1; $i++)
                        {
                            DB::table('nurse_doctor')->insert([
                                        'nurse_id' =>  $id,
                                        'doctor_id' => intval($doctor[$i])
                                            ]);
                        }
                    }

                }

                $nurse_info->update($nurse);
            return to_route('nurses.index')->with('message', 'Nurse Updated Successfully.');
        }
        return view('superAdmin.nurse.edit',$data);
    }


    public function store(Request $request)
    {
        $validated = $request->validate(['name' => ['required', 'min:3']]);
        $currentDate=$request->input('birth_date');
            $carbonDate = Carbon::createFromFormat('d/m/Y', $currentDate);
            $validated['birth_date']=$carbonDate->format('d M, Y');
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
        $currentDate=$request->input('birth_date');
        $carbonDate = Carbon::createFromFormat('d/m/Y', $currentDate);
        $validated['birth_date']=$carbonDate->format('d M, Y');
        $user->update($validated);

        return to_route('nurses.index')->with('message', 'Nurse Updated successfully.');
    }

    public function nurse_delete(Request $request)
    {
        // dd('hii');
        $id = $request->common;
        $Doctor=Doctor::findOrFail($id);
        // dd($patient);
        
            $files = $request->file('patient_profile_img');
            $destinationPath = '/assets/doctor_profile/';
        
            // Get the existing file path from the database
            $existingFilePath = $Doctor->patient_profile_img;
            $destinationPath=$destinationPath.$existingFilePath;
            
            if (isset($existingFilePath) && file_exists(public_path($destinationPath))) {
              
                unlink(public_path($existingFilePath));
            }
        
            $Doctor->delete();

        return to_route('nurses.index')->with('message', 'Doctor deleted.');
    }
}
