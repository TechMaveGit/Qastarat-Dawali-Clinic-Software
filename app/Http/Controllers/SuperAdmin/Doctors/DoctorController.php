<?php

namespace App\Http\Controllers\SuperAdmin\Doctors;
use App\Http\Controllers\Controller;
use App\Models\superAdmin\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Hash;
use DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Carbon;

class DoctorController extends Controller
{
    public function index()
    {
        $data['doctor']=Doctor::with(['doctorBranch.userBranchName'])->where('role_id','1')->orderBy('id','desc')->get();
        
     //   dd($data['doctor']);
        
        return view('superAdmin.doctor.index',$data);
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
                ],
                // 'post_code' => 'nullable|between:4,8',
                'landline' => 'nullable|numeric|digits_between:10,15',
                'mobile_no' => 'required|numeric|unique:doctors,mobile_no|digits_between:10,15|regex:/^[0-9]{10,15}$/',
                'password' => 'required|min:6',
                // 'birth_date' => 'required|date',
                'name' => 'required',
                'gendar'=>'required',
                'title' => 'required',
                'coordinator' => 'required',
                'birth_date'=>'required'
            ], [
                'email.required' => 'Email is required.',
                'coordinator.required' => 'coordinator is required.',
                'email.email' => 'Please enter a valid email address.',
                'email.unique' => 'This email is already taken.',
                // 'post_code.digits_between' => 'Post code must be between 4 and 8 digits.',
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

            $doctorData = $request->except(['_token','submit','coordinator','selectBranch','nurse']);

            $doctorData['doctor_id'] = "DR" . rand('00000', '99999' . '0');
            $doctorData['user_type'] = 'doctor';
            $doctorData['role_id']   = $request->input('role_id');
            // $doctorData['role_id'] = 'doctor';
            $doctorData['password'] = Hash::make($request->input('password'));
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
                 $doctorData['birth_date']=$carbonDate->format('d M, Y');

              //   License Upload

               if ($request->hasFile('profileImage')) {
                $files = $request->file('profileImage');
                $destinationPath = public_path('/assets/profileImage');

                // Get the existing file path from the database
                $existingFilePath = $request->profileImage;

                // If an existing file exists, delete it
                if ($existingFilePath && file_exists(public_path($existingFilePath))) {
                    unlink(public_path($existingFilePath));
                }

                $file_name = md5(uniqid()) . "." . $files->getClientOriginalExtension();
                $files->move($destinationPath, $file_name);
                $doctorData['patient_profile_img'] = $file_name;
            }


              if ($request->hasFile('LicenseUpload'))
              {
                  $files = $request->file('LicenseUpload');
                  $destinationPath = public_path('/assets/LicenseUpload');
                  $file_name = md5(uniqid()) . "." . $files->getClientOriginalExtension();
                  $files->move($destinationPath, $file_name);
                  $doctorData['LicenseUpload'] = $file_name;
              }

               //  Academic Document Upload
               if ($request->hasFile('AcademicDocumentUpload'))
               {
                   $files = $request->file('AcademicDocumentUpload');
                   $destinationPath = public_path('/assets/AcademicDocumentUpload');
                   $file_name = md5(uniqid()) . "." . $files->getClientOriginalExtension();
                   $files->move($destinationPath, $file_name);
                   $doctorData['AcademicDocumentUpload'] = $file_name;
               }


            $doctor = Doctor::create($doctorData);
            $lastInsertedId = $doctor->id;

            

                   $branch_type = $request->input('selectBranch');
                   if (isset($branch_type) && !empty($branch_type))
                   {
                        $hgcount1 = count($branch_type);
                        for ($i = 0; $i < $hgcount1; $i++)
                            {
                                DB::table('doctor_nurse')->insert([
                                                    'doctor_id' => $lastInsertedId,
                                                    'branch_type' => intval($branch_type[$i]),
                                                    'type' => 2
                                                ]);
                            }
                  }



                   $nurse = $request->input('coordinator');
                   if (isset($nurse) && !empty($nurse))
                   {
                        $hgcount1 = count($nurse);
                        for ($i = 0; $i < $hgcount1; $i++)
                            {
                                DB::table('doctor_nurse')->insert([
                                                    'doctor_id' => $lastInsertedId,
                                                    'nurse_id' => intval($nurse[$i]),
                                                    'type' => 0
                                                ]);
                            }
                  }


                  $addnurse = $request->input('nurse');
                  if (isset($addnurse) && !empty($addnurse))
                  {
                       $hgcount1 = count($addnurse);
                       for ($i = 0; $i < $hgcount1; $i++)
                           {
                               DB::table('doctor_nurse')->insert([
                                                   'doctor_id' => $lastInsertedId,
                                                   'nurse_id' => intval($addnurse[$i]),
                                                   'type' => 1
                                               ]);
                           }
                 }


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
                                 'patient_id'        => $lastInsertedId,
                                 'add_branch'        => $request->input('selectBranch')[$i],
                                 'branch_type'       => 'doctor'
                             ]);
                       }
                 }


                return to_route('doctors.index')->with('message', 'Doctor added successfully.');
        }

        $data['role'] = DB::table('roles')->where('status','1')->get();
        return view('superAdmin.doctor.create',$data);
    }


    
    public function getStaff(Request $request)
    {

         $btanchId = $request=$request->input('nurse_id');

         $branchIds = DB::table('user_branchs')
                                    ->where('branch_type','nurse')
                                    ->whereIn('add_branch', $btanchId)
                                    ->pluck('patient_id')
                                    ->toArray();


         $branchData = DB::table('doctors')->select('id','name')
                                    ->whereIn('id', $branchIds)
                                    ->get();


         $nurseId = DB::table('user_branchs')
                                   ->where('branch_type','coordinator')
                                     ->whereIn('add_branch', $btanchId)
                                     ->pluck('patient_id')
                                     ->toArray();
 
        $nurseData = DB::table('doctors')->select('id','name')
                                     ->whereIn('id', $nurseId)
                                     ->get();

         return response()->json(['data' => $branchData ,'nurseData' =>$nurseData]);

    }



    public function edit(Request $request,$id)
    {
        
        $data['doctor']=Doctor::whereId($id)->first();

        $user_branchs = DB::table('user_branchs')->where('patient_id',$id)->where('branch_type','doctor')->get();
        $data['user_branchs']  = $user_branchs->pluck('add_branch')->toArray();
        

        $data['id']= $id;
        
        if(request()->isMethod("post"))
        {
            // $request->validate([
            //     'post_code' => 'nullable|between:4,8',
            //     'birth_date' => 'required',
            //     'landline' => 'nullable|numeric',
            //     'password' => 'nullable|min:6',
            //     'email' => [
            //         'required',
            //         'email',
            //         function ($attribute, $value, $fail) use ($id) {
            //             // Check email uniqueness in users table, excluding the current user
            //             $userExists = DB::table('users')
            //                 ->where('email', $value)
            //                 ->where('id', '!=', $id)
            //                 ->exists();
            //             if ($userExists) {
            //                 $fail('The ' . $attribute . ' has already been taken.');
            //             }
        
            //             // Check email uniqueness in doctors table
            //             $doctorExists = DB::table('doctors')
            //                 ->where('email', $value)
            //                 ->where('id', '!=', $id)
            //                 ->exists();
            //             if ($doctorExists) {
            //                 $fail('The ' . $attribute . ' has already been taken.');
            //             }
            //         },
            //     ],
            // ]);

            $request->validate([
                // 'post_code' => 'nullable|between:4,8',
                'birth_date' => 'required',
                'landline' => 'nullable|numeric',
                'password' => 'nullable|min:6',
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

                'mobile_no' => [
                    'nullable',
                    'numeric',   
                    function ($attribute, $value, $fail) use ($id) {
                        // Check mobile_no uniqueness in users table, excluding the current user
                        $userExists = DB::table('users')
                            ->where('mobile_no', $value)
                            ->where('id', '!=', $id)
                            ->exists();
                        if ($userExists) {
                            $fail('The ' . $attribute . ' has already been taken.');
                        }
            
                        // Check mobile_no uniqueness in doctors table
                        $doctorExists = DB::table('doctors')
                            ->where('mobile_no', $value)
                            ->where('id', '!=', $id)
                            ->exists();
                        if ($doctorExists) {
                            $fail('The mobile no  has already been taken.');
                        }
                    },
                ],
            ]);
            

            $doctorData = $request->except(['_token','submit','coordinator','nurse','selectBranch']);
            // $doctorData['role_id'] = intval($doctorData['role_id']);
            $doctor_info = Doctor::where('id', $id)->first();

              if ($request->hasFile('profileImage')) {
                $files = $request->file('profileImage');
                $destinationPath = public_path('/assets/profileImage');

                // Get the existing file path from the database
                $existingFilePath = $doctor_info->profileImage;

                // If an existing file exists, delete it
                if ($existingFilePath && file_exists(public_path($existingFilePath))) {
                    unlink(public_path($existingFilePath));
                }

                $file_name = md5(uniqid()) . "." . $files->getClientOriginalExtension();
                $files->move($destinationPath, $file_name);
                $doctorData['patient_profile_img'] = $file_name;
            }


            if ($request->hasFile('LicenseUpload')) {
                $files = $request->file('LicenseUpload');
                $destinationPath =public_path('/assets/LicenseUpload');

                // Get the existing file path from the database
                $existingFilePath = $doctor_info->LicenseUpload;

                // If an existing file exists, delete it
                if ($existingFilePath && file_exists(public_path($existingFilePath))) {
                    unlink(public_path($existingFilePath));
                }

                $file_name = md5(uniqid()) . "." . $files->getClientOriginalExtension();
                $files->move($destinationPath, $file_name);
                $doctorData['LicenseUpload'] = $file_name;
            }

            if ($request->hasFile('AcademicDocumentUpload')) {
                $files = $request->file('AcademicDocumentUpload');
                $destinationPath = public_path('/assets/AcademicDocumentUpload');

                // Get the existing file path from the database
                $existingFilePath = $doctor_info->AcademicDocumentUpload;

                // If an existing file exists, delete it
                if ($existingFilePath && file_exists(public_path($existingFilePath))) {
                    unlink(public_path($existingFilePath));
                }

                $file_name = md5(uniqid()) . "." . $files->getClientOriginalExtension();
                $files->move($destinationPath, $file_name);
                $doctorData['AcademicDocumentUpload']= $file_name;
            }

         
            if($request->has('password') && isset($request->password)){
                $doctorData['password'] = Hash::make($request->input('password'));
            }
            else{
                $doctorData['password'] = $data['doctor']->password;
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
                 $doctorData['birth_date']=$carbonDate->format('d M, Y');

                 $doctorData['mobile_no']=$request->input('mobile_no');

                Doctor::whereId($id)->update($doctorData);   


                $branch_type = $request->input('selectBranch');

                 if($branch_type)
                 {
                    $result= DB::table('doctor_nurse')->where('doctor_id',$id)->where('type',2)->delete();
                    
                    if (isset($branch_type) && !empty($branch_type))
                    {
                        $hgcount1 = count($branch_type);
                        for ($i = 0; $i < $hgcount1; $i++)
                            {
                                DB::table('doctor_nurse')->insert([
                                                    'doctor_id' => $id,
                                                    'branch_type' => intval($branch_type[$i]),
                                                    'type' => 2
                                                ]);
                            }
                    }
                }




                $coordinator = $request->input('coordinator');
                if($coordinator)
                {
                        $result= DB::table('doctor_nurse')->where('doctor_id',$id)->where('type',0)->delete();
                        if(isset($coordinator) && !empty($coordinator)  ){
                            if (isset($coordinator) && !empty($coordinator)) {
                                    $hgcount1 = count($coordinator);

                            for ($i = 0; $i < $hgcount1; $i++)
                                {
                                    DB::table('doctor_nurse')->insert([
                                                        'doctor_id' => $id,
                                                        'nurse_id' => intval($coordinator[$i]),
                                                        'type' => '0'
                                                    ]);
                                }
                            }
                        }
                }

                $nurse = $request->input('nurse');
                if($nurse)
                {
                        $result= DB::table('doctor_nurse')->where('doctor_id',$id)->where('type',1)->delete();
                        if(isset($nurse) && !empty($nurse)  ){
                            if (isset($nurse) && !empty($nurse)) {
                                    $hgcount1 = count($nurse);
     
                            for ($i = 0; $i < $hgcount1; $i++)
                                {
                                    DB::table('doctor_nurse')->insert([
                                                        'doctor_id' => $id,
                                                        'nurse_id' => intval($nurse[$i]),
                                                        'type' => '1'
                                                    ]);
                                }
                            }
                        }
                }

                DB::table('user_branchs')->where('patient_id',$id)->where('branch_type','doctor')->delete();
                
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
                                 'branch_type'       => 'doctor'
                             ]);
                       }
                 }




           
            return to_route('doctors.index')->with('message', 'Doctor Updated Successfully.');

        }

        $data['roles'] = DB::table('roles')->get();
        return view('superAdmin.doctor.edit',$data);

        
    }
    public function view(Request $request,$id)
    {
        $data['doctor']=Doctor::with(['userBranch.userBranchName'])->whereId($id)->first();
        $currentDate = now();

         $data['book_appointments']=DB::table('book_appointments')->where('doctor_id',$id)->whereDate('created_at', $currentDate)->get();

        return view('superAdmin.doctor.view',$data);
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate(['name' => ['required', 'min:3']]);
        $user->update($validated);

        return to_route('doctors.index')->with('message', 'Doctor Updated successfully.');
    }

    public function doctor_delete(Request $request)
    {
        // dd('hii');
        $id = $request->common;
        $Doctor=Doctor::findOrFail($id);
        // dd($patient);

            $files = $request->file('patient_profile_img');
            $destinationPath = public_path('/assets/doctor_profile/');

            // Get the existing file path from the database
            $existingFilePath = $Doctor->patient_profile_img;
            $destinationPath=$destinationPath.$existingFilePath;

            if (isset($existingFilePath) && file_exists(public_path($destinationPath))) {

                unlink(public_path($existingFilePath));
            }

            $Doctor->delete();

        return to_route('doctors.index')->with('message', 'Doctor deleted.');
    }

}