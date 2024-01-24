<?php

namespace App\Http\Controllers\SuperAdmin\Patients;
use App\Http\Controllers\Controller;
use App\Models\superAdmin\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Hash;
use Illuminate\Validation\Rule;

class PatientsController extends Controller
{

    public function index()
    {
       $data['users'] = User::orderBy('id','DESC')->get();
        return view('superAdmin.patient.index',$data);
    }

    public function create(Request $request)
    {
        return view('superAdmin.patient.create');
    }


    public function addCreate(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'post_code' => 'numeric',
            'landline' => 'numeric',
            'mobile_no' => 'required|numeric|unique:users,mobile_no',
            'password'=>'required|min:6'
        ]);
            $patient = $request->except(['_token','submit']);
          
            $patient['patient_id']  = "MA".rand('00000','99999'.'0');
            $patient['password'] = Hash::make($request->input('password'));
           
            User::create($patient);
            return to_route('patients.index')->with('message', 'Patient added successfully.');
    }

    public function delete(Request $request)
    {
        // dd($request->all());
       $id=$request->input('common');
       $patientId = Crypt::decrypt($id);
       User::whereId($patientId)->delete();
        return to_route('patients.index')->with('message', 'Patient deleted.');
    }
    public function edit(Request $request,$id)
    {
        $id = Crypt::decrypt($id);
        $data['patientId']=User::whereId($id)->first();


        if(request()->isMethod("post"))
        {
            $request->validate([
                'email' => [
                    'required',
                    'email',
                    Rule::unique('users')->ignore($id),
                ],
                'post_code' => 'numeric',
                'landline' => 'numeric',
                'mobile_no' => [
                    'required',
                    'numeric',
                    Rule::unique('users')->ignore($id),
                ],
            ]);
           
            $patient_info = User::where('id', $id)->first();
            
                $patient_info->title=$request->title;
                $patient_info->name=$request->name;
                $patient_info->birth_date=$request->birth_date;
                $patient_info->gendar=$request->gendar;
                $patient_info->post_code=$request->post_code;
                $patient_info->street=$request->street;
                $patient_info->town=$request->town;
                $patient_info->country=$request->country;
                $patient_info->landline=$request->landline;
                $patient_info->document_type=$request->document_type;

           $patient_info->save();
            return to_route('patients.index')->with('message', 'Patient Updated Successfully.');

        }
        return view('superAdmin.patient.edit',$data);
    }




}
