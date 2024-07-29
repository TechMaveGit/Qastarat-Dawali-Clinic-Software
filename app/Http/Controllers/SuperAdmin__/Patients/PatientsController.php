<?php

namespace App\Http\Controllers\SuperAdmin\Patients;

use App\Http\Controllers\Controller;
use App\Models\superAdmin\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Carbon;
use DB;
use Illuminate\Support\Facades\Validator;


class PatientsController extends Controller
{

    public function index()
    {   
        echo "OK"; die;
        $data['users'] = User::with('userBranch')->orderBy('id', 'desc')->select('id','patient_id','name','mobile_no','email','post_code','patient_profile_img')->get();

        return $data['users'];
        
        return view('superAdmin.patient.index', $data);
    }

    public function create(Request $request)
    {
        $data['role'] = DB::table('roles')->get();
        return view('superAdmin.patient.create', $data);
    }


    public function addCreate(Request $request)
    {
        $validatedData = $request->validate([
            'email' => [
                'required',
                'email',
                'unique:users,email',
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
            'mobile_no' => 'required|numeric|unique:users,mobile_no|regex:/^[0-9]{10,15}$/',
            'password' => 'required|min:6',
            
            'name' => 'required',
            'gendar'=>'required',
            'title' => 'required',
            'birth_date'=>'required'
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



        $patient = $request->except(['_token', 'submit']);
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
                $patient['birth_date'] = $carbonDate->format('d M, Y');
                $patient['patient_id']  = "MA" . rand('00000', '99999' . '0');
                $patient['password'] = Hash::make($request->input('password'));
        

        $patient['patient_profile_img'] = '';
        if ($request->hasFile('patient_profile_img')) {
            $files = $request->file('patient_profile_img');
            $destinationPath = '/assets/patient_profile';
            $file_name = md5(uniqid()) . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $file_name);
            $patient['patient_profile_img'] = $file_name;
        }
        User::create($patient);

        return to_route('patients.index')->with('message', 'Patient added successfully.');
    }

    public function patient_delete(Request $request)
    {
        // dd('hii');
        $id = $request->common;
        $patient=User::findOrFail($id);
        // dd($patient);
        
            $files = $request->file('patient_profile_img');
            $destinationPath = '/assets/patient_profile/';
        
            // Get the existing file path from the database
            $existingFilePath = $patient->patient_profile_img;
            $destinationPath=$destinationPath.$existingFilePath;
            
            if (isset($existingFilePath) && file_exists(public_path($destinationPath))) {
              
                unlink(public_path($existingFilePath));
            }
        
            $patient->delete();

        return to_route('patients.index')->with('message', 'Patient deleted.');
    }
    public function edit(Request $request, $id)
    {
        // $id = Crypt::decrypt($id);
       
        $data['patientId'] = User::whereId($id)->first();


        if (request()->isMethod("post")) {
            $request->validate([
                'email' => [
                    'required',
                    'email',
                    Rule::unique('users')->ignore($id),
                ],
                'birth_date'=>'required',
                'password' => 'nullable|min:6',
                'landline' => 'nullable|numeric',
                'mobile_no' => [
                    'required',
                    'numeric',
                    'regex:/^[0-9]{10,15}$/',
                    Rule::unique('users')->ignore($id),
                ],
            ]);

            $patient_info = User::where('id', $id)->first();
            $patient = $request->except(['_token','submit']);
            if ($request->hasFile('patient_profile_img')) {
                $files = $request->file('patient_profile_img');
                $destinationPath = '/assets/patient_profile';
            
                // Get the existing file path from the database
                $existingFilePath = $patient_info->patient_profile_img;
            
                // If an existing file exists, delete it
                if ($existingFilePath && file_exists(public_path($existingFilePath))) {
                    unlink(public_path($existingFilePath));
                }
           
                $file_name = md5(uniqid()) . "." . $files->getClientOriginalExtension();
                $files->move($destinationPath, $file_name);
                 $patient['patient_profile_img'] = $file_name;
            }
            if($request->has('password') && isset($request->password)){
                
                $patient['password'] = Hash::make($request->input('password'));

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
            // dd( $carbonDate);
            $patient['title'] = $request->title;
            $patient['name'] = $request->name;
            $patient['birth_date'] = $carbonDate->format('d M, Y') ?? '';
            $patient['gendar'] = $request->gendar;
            $patient['post_code'] = $request->post_code;
            $patient['street'] = $request->street;
            $patient['town'] = $request->town;
            $patient['country'] = $request->country;
            $patient['landline'] = $request->landline;
            $patient['document_type'] = $request->document_type;

            $patient_info->update($patient);
            return to_route('patients.index')->with('message', 'Patient Updated Successfully.');
        }
        return view('superAdmin.patient.edit', $data);
    }
}
