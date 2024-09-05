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

    public function index(Request $request) 
    {  
        $patient = User::with(['userBranch.userBranchName']);
        if(isset($request->paname) && $request->paname != '')
        {
            $patient->where('name','LIKE',"%{$request->paname}%");
        }

        if(isset($request->status) && $request->status != '')
        {
            $patient->where('status',$request->status);
        }

        if(isset($request->branch) && $request->branch && !in_array(0,$request->branch)){
            $patient->whereHas('userBranch',function ($query) use($request) {
                $query->whereIn('add_branch',$request->branch);
            });
        }

        if(isset($request->doctors) && $request->doctors && !in_array(0,$request->doctors)){
            $patient->whereIn('doctor_id',$request->doctors);
        }


        $data['users'] = $patient->orderBy('id', 'DESC')->select('id','status','doctor_id','patient_id','name','dial_code','mobile_no','email','post_code','patient_profile_img')->get();
        $data['branchs'] = DB::table('branchs')->get();
        $data['doctors'] = DB::table('doctors')->where('user_type','doctor')->get();

        $data['countryCode'] = DB::table('dial_codes')->where('status', '1')->get();
        return view('superAdmin.patient.index', $data);
    }

    public function create()
    {
        $data['doctors'] = DB::table('doctors')->where('status','active')->where('user_type','doctor')->get();
        $data['branchs'] = DB::table('branchs')->where('status','1')->get();
        $data['countryCode'] = DB::table('dial_codes')->where('status', '1')->get();
        return view('superAdmin.patient.create', $data);
    }


    public function view(Request $request ,$id)
    {
        $data['doctor']=User::whereId($id)->with(['userBranch.userBranchName'])->first();
        $data['book_appointments']=DB::table('book_appointments')->where('patient_id', $id)->get();
        return view('superAdmin.patient.view',$data);
    }


    public function addCreate(Request $request)
    {

      $validatedData = $request->validate([
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
                        break; // Stop the loop once a valid domain is found
                    }
                }
                if (!$valid) {
                    $fail('The ' . $attribute . ' must end with .com');
                }
            },
        ],
        'selectBranch'=>'required|array',
        'doctorName'=>'required',
        // 'post_code' => 'nullable|digits_between:4,8',
        'landline' => 'nullable|numeric|digits_between:10,15',
        'mobile_no' => 'required|numeric|unique:users,mobile_no|regex:/^[0-9]{10,15}$/',
        'password' => 'required|min:6',
        'name' => 'required',
        'gendar' => 'required',
        'title' => 'required',
        'birth_date' => 'required'
    ], [
        'email.required' => 'Email is required.',
        'email.email' => 'Please enter a valid email address.',
        'selectBranch.required' => 'Branch is required.',
        'selectBranch.array' => 'Branch is required.',
        'doctorName.required' => 'Doctor is required.',
        // 'post_code.digits_between' => 'Post code must be between 4 and 8 digits.',
        'landline.numeric' => 'Landline must be a number.',
        'landline.digits_between' => 'Landline must be between 10 and 15 digits.',
        'mobile_no.required' => 'Mobile Phone is required.',
        'mobile_no.numeric' => 'Mobile Phone must be a number.',
        'mobile_no.unique' => 'This mobile Phone is already taken.',
        'mobile_no.digits_between' => 'Mobile number must be between 10 and 15 digits.',
        'password.required' => 'Password is required.',
        'password.min' => 'Password must be at least :min characters.',
        'name.required' => 'Name is required.',
        'gendar.required' => 'Gender is required.',
        'title.required' => 'Title is required.',
        'birth_date.required' => 'Date of Birth is required.'
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


                $carbonDate->format('d M, Y');
                $patient['birth_date'] = $carbonDate->format('d M, Y');
                $patient['patient_id']  = "PA" . rand('00000', '99999' . '0');
                $patient['doctor_id'] = $request->input('doctorName');
                $patient['password'] = Hash::make($request->input('password'));


        $patient['patient_profile_img'] = '';
        if ($request->hasFile('patient_profile_img')) {
            $files = $request->file('patient_profile_img');
            $destinationPath = public_path('/assets/patient_profile');
            $file_name = md5(uniqid()) . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $file_name);
            $patient['patient_profile_img'] = $file_name;
        }

        $patient['id_proof'] = '';
        if ($request->hasFile('id_proof')) {
            $files = $request->file('id_proof');
            $destinationPath = public_path('/assets/patient_id');
            $file_name = md5(uniqid()) . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $file_name);
            $patient['id_proof'] = $file_name;
        }

        $user = User::create($patient);
        $lastId = $user->id;


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
                        'patient_id' =>$lastId,
                        'add_branch'     => $request->input('selectBranch')[$i],
                        'branch_type' =>'patient'
                    ]);
              }
        }
          return to_route('patients.index')->with('message', 'Patient added successfully.');
    }

    public function patient_delete(Request $request)
    {
        // dd('hii');
        $id = $request->common;
        $patient=User::findOrFail($id);
        // dd($patient);

            $files = $request->file('patient_profile_img');
            $destinationPath = public_path('/assets/patient_profile/');

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
      
        $user_branchs = DB::table('user_branchs')->where('patient_id',$id)->where('branch_type','patient')->get();

        $data['userDetail']=User::whereId($id)->first();

        $data['user_branchs']  = $user_branchs->pluck('add_branch')->toArray();

        $data['patientId'] = User::whereId($id)->first();

        if (request()->isMethod("post")) {

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
                'birth_date' => 'required|date', // Added date validation
                'password' => 'nullable|min:6',
                'landline' => 'nullable|numeric',
                'selectBranch'=>'required|array',
                'doctorName'=>'required',
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
                $destinationPath = public_path('/assets/patient_profile');

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
            else{
                $patient['password'] = $data['userDetail']->password;
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
            $patient['birth_date'] = $carbonDate->format('d M, Y');
            $patient['gendar'] = $request->gendar;
            $patient['post_code'] = $request->post_code;
            $patient['street'] = $request->street;
            $patient['town'] = $request->town;
            $patient['country'] = $request->country;
            $patient['landline'] = $request->landline;
            $patient['document_type'] = $request->document_type;
            $patient['doctor_id'] =    $request->doctorName;
            $patient['status'] =    $request->status;

            
            $patient_info->update($patient);


            DB::table('user_branchs')->where('patient_id',$id)->where('branch_type','patient')->delete();
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
                             'branch_type'       => 'patient'
                         ]);
                   }
             }




            return to_route('patients.index')->with('message', 'Patient Updated Successfully.');
        }

        $data['doctors']=Doctor::where('user_type','doctor')->get();
        $data['countryCode'] = DB::table('dial_codes')->where('status', '1')->get();
        return view('superAdmin.patient.edit', $data);
    }
}
