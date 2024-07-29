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
        $data['doctor']=Doctor::where('user_type','doctor')->select('patient_profile_img','doctor_id','name','specialty','email','id','post_code','mobile_no')->orderBy('id','desc')->get();
        return view('superAdmin.doctor.index',$data);
    }

    public function create(Request $request)
    {
        if(request()->isMethod("post"))
        {
            // dd($request->all());
            $validatedData = $request->validate([
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

            $doctorData = $request->except(['_token','submit','coordinator']);
            
            $doctorData['doctor_id'] = "DR" . rand('00000', '99999' . '0');
            $doctorData['user_type'] = 'doctor';
            $doctorData['role_id'] = intval($doctorData['role_id']);
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

              //   patient_profile_img

           
            // if ($request->hasFile('patient_profile_img'))
            // {
            //     $files = $request->file('patient_profile_img');
            //     $destinationPath = '/assets/doctor_profile';
            //     $file_name = md5(uniqid()) . "." . $files->getClientOriginalExtension();
            //     $files->move($destinationPath, $file_name);
            //     $doctorData['patient_profile_img'] = $file_name;
            // }

              //   License Upload

            
              if ($request->hasFile('LicenseUpload'))
              {
                  $files = $request->file('LicenseUpload');
                  $destinationPath = '/assets/LicenseUpload';
                  $file_name = md5(uniqid()) . "." . $files->getClientOriginalExtension();
                  $files->move($destinationPath, $file_name);
                  $doctorData['LicenseUpload'] = $file_name;
              }

               //  Academic Document Upload

             
               if ($request->hasFile('AcademicDocumentUpload'))
               {
                   $files = $request->file('AcademicDocumentUpload');
                   $destinationPath = '/assets/AcademicDocumentUpload';
                   $file_name = md5(uniqid()) . "." . $files->getClientOriginalExtension();
                   $files->move($destinationPath, $file_name);
                   $doctorData['AcademicDocumentUpload'] = $file_name;
               }
            $doctor = Doctor::create($doctorData);
            $lastInsertedId = $doctor->id;

                // Nurse insert
                $nurse = $request->input('coordinator');
            //    dd(intval($nurse[0]));
                   if (isset($nurse) && !empty($nurse)) {
                        $hgcount1 = count($nurse);

                   for ($i = 0; $i < $hgcount1; $i++)
                    {
                        DB::table('doctor_nurse')->insert([
                                            'doctor_id' => $lastInsertedId,
                                            'nurse_id' => intval($nurse[$i]),
                                        ]);
                    }
                }
                    // Last insert nurse

                    // Lab Insert
                    // $lab   = $request->input('lab');
                    // $lab = json_decode(json_encode($lab));
                    // if ($lab) {
                    //     $hgcount2 = count($lab);

                    // for ($i = 0; $i < $hgcount2; $i++)
                    //  {
                    //      DB::table('doctor_labs')->insert([
                    //                          'doctor_id' => $lastInsertedId,
                    //                          'lab_id' => $lastInsertedId,
                    //                      ]);
                    //  }
                    // }
                     // End lab insert

                return to_route('doctors.index')->with('message', 'Doctor added successfully.');
        }

        $data['role'] = DB::table('roles')->get();
        return view('superAdmin.doctor.create',$data);
    }


    public function edit(Request $request,$id)
    {
        
        $data['doctor']=Doctor::whereId($id)->first();
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
            $doctorData = $request->except(['_token','submit','coordinator']);
            $doctorData['role_id'] = intval($doctorData['role_id']);

            $doctor_info = Doctor::where('id', $id)->first();

            if ($request->hasFile('LicenseUpload')) {
                $files = $request->file('LicenseUpload');
                $destinationPath = '/assets/LicenseUpload';
            
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
                $destinationPath = '/assets/AcademicDocumentUpload';
            
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

                $result= DB::table('doctor_nurse')->where('doctor_id',$id)->delete();
                $nurse = $request->input('coordinator');
                if(isset($nurse) && !empty($nurse)  ){

                    // Nurse insert
              
                //    dd(intval($nurse[0]));
                       if (isset($nurse) && !empty($nurse)) {
                            $hgcount1 = count($nurse);
    
                       for ($i = 0; $i < $hgcount1; $i++)
                        {
                            DB::table('doctor_nurse')->insert([
                                                'doctor_id' => $id,
                                                'nurse_id' => intval($nurse[$i]),
                                            ]);
                        }
                    }

                }


            Doctor::whereId($id)->update($doctorData);
            return to_route('doctors.index')->with('message', 'Doctor Updated Successfully.');

        }

        $data['roles'] = DB::table('roles')->get();
        return view('superAdmin.doctor.edit',$data);
    }
    public function view(Request $request,$id)
    {
        $data['doctor']=Doctor::whereId($id)->first();
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
            $destinationPath = '/assets/doctor_profile/';
        
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
