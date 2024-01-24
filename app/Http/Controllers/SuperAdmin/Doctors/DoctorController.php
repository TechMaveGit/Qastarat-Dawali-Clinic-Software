<?php

namespace App\Http\Controllers\SuperAdmin\Doctors;
use App\Http\Controllers\Controller;
use App\Models\superAdmin\Doctor;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Hash;
use DB;
use Illuminate\Validation\Rule;
class DoctorController extends Controller
{
    public function index()
    {
        $data['doctor']=Doctor::where('user_type','doctor')->get();
        return view('superAdmin.doctor.index',$data);
    }

    public function create(Request $request)
    {
        if(request()->isMethod("post"))
        {
            $request->validate([
                'email' => 'required|email|unique:doctors,email',
                'mobile_no' => 'required|numeric|unique:doctors,mobile_no',
                'post_code' =>'numeric',
                'password' =>'required|min:6'
            ]);

            $doctorData = $request->except(['_token','submit','lab','nurse']);
            $doctorData['doctor_id'] = "MA" . rand('00000', '99999' . '0');
            $doctorData['user_type'] = 'doctor';
            $doctorData['password'] = Hash::make($request->input('password'));
            $doctor = Doctor::create($doctorData);
            // Access the id property on the created Doctor model instance
            $lastInsertedId = $doctor->id;


                // Nurse insert
                $nurse = $request->input('nurse');
                $nurse = json_decode(json_encode($nurse));
                   if ($nurse) {
                       $hgcount1 = count($nurse);
                   }
                   for ($i = 0; $i < $hgcount1; $i++)
                    {
                        DB::table('doctor_nurse')->insert([
                                            'doctor_id' => $lastInsertedId,
                                            'nurse_id' => $lastInsertedId,
                                        ]);
                    }
                    // Last insert nurse

                    // Lab Insert
                    $lab   = $request->input('lab');
                    $lab = json_decode(json_encode($lab));
                    if ($lab) {
                        $hgcount2 = count($lab);
                    }
                    for ($i = 0; $i < $hgcount2; $i++)
                     {
                         DB::table('doctor_labs')->insert([
                                             'doctor_id' => $lastInsertedId,
                                             'lab_id' => $lastInsertedId,
                                         ]);
                     }
                     // End lab insert





                return to_route('doctors.index')->with('message', 'Doctor added successfully.');
        }

        return view('superAdmin.doctor.create');
    }


    public function edit(Request $request,$id)
    {
        // dd($id);
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
                'post_code' => 'numeric',
                'landline' => 'numeric',
                'mobile_no' => [
                    'required',
                    'numeric',
                    Rule::unique('doctors')->ignore($id),
                ],
            ]);
            $doctor = $request->except(['_token','submit']);
            // dd($doctor);
            Doctor::whereId($id)->update($doctor);
            return to_route('doctors.index')->with('message', 'Doctor Updated Successfully.');

        }
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

    public function destroy(User $user)
    {
        $user->delete();

        return back()->with('message', 'Doctor deleted.');
    }

}
