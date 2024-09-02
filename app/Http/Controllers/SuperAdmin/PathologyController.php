<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\PathologyPriceList;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Hash;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class PathologyController extends Controller
{

    public function index(Request $req)
    {
        $data['pathologys'] = DB::table('doctors')->where('user_type', 'pathology')->orderBy('id', 'desc')->get();
        $data['branchs'] = DB::table('branchs')->where('status','1')->get();
        return view('superAdmin.pathology.index', $data);
    }

    public function add(Request $req)
    {

        $req->validate([
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
                        $fail('The ' . $attribute . ' must end with .com');
                    }
                },
            ],
            'post_code' => 'nullable|between:4,8',
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

        $doctor = $req->only(['dial_code','mobile_no', 'email', 'post_code', 'lab_name', 'status','landline', 'street', 'town', 'country', 'password']);
        $doctor['user_type'] = 'pathology';
        $doctor['doctor_id'] = "PA" . rand('00000', '99999' . '0');
        $doctor['password'] = Hash::make($doctor['password']);
        
        $lastInsertedId = DB::table('doctors')->insertGetId($doctor);

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
                        'branch_type'       => 'pathology'
                    ]);
              }
        }

        return redirect()->back()->with('message', 'Pathology added successfully!');
    }




    public function edit(Request $request)
    {
        $id = $request->input('id');
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

       

        $id = $request->input('id');
        $pathologys = $request->except(['selectBranch','_token', 'submit']);

        if (!empty($request->password)) {  
            $pathologys['password'] = Hash::make($request->input('password'));
        }
        if(empty($request->password))
        {
            $pathologys['password'] = DB::table('doctors')->where('id',$id)->first()->password??'';
        }



        DB::table('doctors')->whereId($id)->update($pathologys);

        

        DB::table('user_branchs')->where('patient_id',$id)->where('branch_type','pathology')->delete();

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
                        'branch_type'       => 'pathology'
                    ]);
              }
        }


        return to_route('pathology.index')->with('message', 'Pathology Updated Successfully.');
    }

    public function pathologyPriceList(Request $req)
    {
        $data['pathology_price_list'] = DB::table('pathology_price_list')->where('price_type', 'Pathology')->orderBy('id', 'desc')->get();
        if (request()->isMethod("post")) {
            $PathologyPriceList = $req->except(['_token', 'submit']);
            if($PathologyPriceList['price_type']=='Other'){
                $PathologyPriceList['price_type'] = $req->input('mulipleTypeOt');
            }
            unset($PathologyPriceList['mulipleTypeOt']);
            $id = $req->input('id');
            DB::table('pathology_price_list')->whereId($id)->update($PathologyPriceList);
            return redirect()->back()->with('message', 'Pathology price updated successfully!');
        }
        return view('superAdmin.price.pathologyPrice.index', $data);
    }

    public function addPathologyPrice(Request $req)
    {
        if (request()->isMethod("post")) {
            
            if ($req->has('test_name') && count($req->input('test_name')) > 0) {
                $testNames = $req->input('test_name');
                $testCodes = $req->input('test_code');
                $turnarounds = $req->input('turnaround');
                $prices = $req->input('price');
                $includedTests = $req->input('included_tests');
                $notes = $req->input('note');
                $filteredValues=[];
                for ($i = 0; $i < count($testNames); $i++) {
                    // Filter out null or empty values

                    $filteredValues[] = [
                        'test_name'     => isset($testNames[$i]) ? $testNames[$i] : '',
                        'test_code'     => isset($testCodes[$i]) ? $testCodes[$i] : '' ,
                        'turnaround'    => isset($turnarounds[$i]) ? $turnarounds[$i] : '',
                        'price'         => isset($prices[$i]) ? $prices[$i] : '',
                        'included_tests' => isset($includedTests[$i]) ? $includedTests[$i] : '',
                        'note'          => isset($notes[$i]) ? $notes[$i] : '',
                        'price_type'    => isset($testNames[$i]) ? 'Pathology' : ''
                    ];
                }

                $filteredTest = array_map(function ($subarray) {
                    return array_filter($subarray, function ($value) {
                        return $value !== null && $value !== '';
                    });
                }, $filteredValues);
                // Filter out empty subarrays
                $final = array_filter($filteredTest, function($subarray) {
                    return !empty($subarray);
                });

                // Check if any non-null or non-empty values exist
                if (!empty($final)) {
                    // dd($$final);
                    PathologyPriceList::insert($final);
                }
            }



            return redirect()->route('price.pathologyPriceList')->with('message', 'Pathology price added successfully!');
        }
        return view('superAdmin.price.pathologyPrice.create');
    }





    public function radiologyPriceList(Request $req)
    {
        $data['pathology_price_list'] = DB::table('pathology_price_list')->orderBy('id', 'desc')->get();
        $data['patho_types'] = $data['pathology_price_list'] ? $data['pathology_price_list']->unique('price_type')->pluck('price_type') : [];
        if (request()->isMethod("post")) {
            $PathologyPriceList = $req->except(['_token', 'submit']);
            if($PathologyPriceList['price_type']=='Other'){
                $PathologyPriceList['price_type'] = $req->input('mulipleTypeOt');
            }
            unset($PathologyPriceList['mulipleTypeOt']);
            $id = $req->input('id');
            DB::table('pathology_price_list')->whereId($id)->update($PathologyPriceList);
            return redirect()->back()->with('message', 'Radiology price updated successfully!');
        }
        return view('superAdmin.price.radiologyPrice.index', $data);
    }


    public function addradiologyPrice(Request $req)
    {
        if (request()->isMethod("post")) {

            if ($req->has('test_name') && count($req->input('test_name')) > 0) {
                $testNames = $req->input('test_name');
                $testCodes = $req->input('test_code');
                $turnarounds = $req->input('turnaround');
                $prices = $req->input('price');
                $includedTests = $req->input('included_tests');
                $notes = $req->input('note');
                $mulipleType = $req->input('mulipleType');
                if($mulipleType=='Other'){
                    $mulipleType = $req->input('mulipleTypeOt');
                }
                $colourId = $req->input('colourId');
                $filteredValues=[];
                for ($i = 0; $i < count($testNames); $i++) {
                    // Filter out null or empty values

                    $filteredValues[] = [
                        'test_name'     => isset($testNames[$i]) ? $testNames[$i] : '',
                        'test_code'     => isset($testCodes[$i]) ? $testCodes[$i] : '' ,
                        'turnaround'    => isset($turnarounds[$i]) ? $turnarounds[$i] : '',
                        'price'         => isset($prices[$i]) ? $prices[$i] : '',
                        'included_tests' => isset($includedTests[$i]) ? $includedTests[$i] : '',
                        'note'          => isset($notes[$i]) ? $notes[$i] : '',
                        'price_type'    => isset($mulipleType[$i]) ? $mulipleType[$i] : '',
                        'colour_type'    => isset($colourId[$i]) ? $colourId[$i] : '',
                    ];
                }

             //   return $filteredValues;

                $filteredTest = array_map(function ($subarray) {
                    return array_filter($subarray, function ($value) {
                        return $value !== null && $value !== '';
                    });
                }, $filteredValues);
                // Filter out empty subarrays
                $final = array_filter($filteredTest, function($subarray) {
                    return !empty($subarray);
                });

                // Check if any non-null or non-empty values exist
                if (!empty($final)) {
                    // dd($$final);
                    PathologyPriceList::insert($final);
                }
                return redirect()->route('price.radiologyPriceList')->with('message', 'Radiology  price added successfully!');
            }
            return redirect()->back();
            
        }
        $patho_types =  DB::table('pathology_price_list')->distinct()->orderBy('id', 'desc')->get()->unique('price_type')->pluck('price_type');
        return view('superAdmin.price.radiologyPrice.create',compact('patho_types'));
    }


    public function addNewTestName(Request $request)
    {


            $request->validate([
                'test_name'=>'required|string',
                'price'=>'required|numeric'
            ]);

           $filteredValues = $request->only([
                            'test_name', 'test_code', 'turnaround', 'price', 'color_type',
                            'included_test', 'note', 'price_type'
                               ]);

            if($filteredValues['price_type']=='Other'){
                $filteredValues['price_type'] = $request->input('mulipleTypeOt');
            }

         if (!empty($filteredValues)) {

            PathologyPriceList::insert([
                'test_name'=>$filteredValues['test_name'],
                'test_code'=>$filteredValues['test_code'],
                'turnaround'=>$filteredValues['turnaround'],
                'price'=>$filteredValues['price'],
                'colour_type'=>$filteredValues['color_type'],
                'note'=>$filteredValues['note'],
                'price_type'=>$filteredValues['price_type'],
                'included_tests'=>$filteredValues['included_test'],
            ]);
        }
        return response()->json(['message' => 'Pathology Price List added successfully'], 201);

    }

    public function getService(Request $request)
    {
        $services=  PathologyPriceList::orderBy('id','desc')->get();
        return response()->json($services);
    }

    public function checkPostCode(Request $request)
    {
        $testCode =  $request->input('testCode');
        $checktest_code=DB::table('pathology_price_list')->where('test_code',$testCode)->first();
        if ($checktest_code) {
            return response()->json(['message' =>400]);
        }
        else{
            return response()->json(['message' => 200]);
        }


    }

    public function setLocation(Request $request)
    {
        
            $request->validate([
                'location_name'=>'required|string',
            ]);

           $filteredValues = $request->only(['location_name', 'geographicLocation', 'postalAddress']);

           if(isset($request->location_update)){

            DB::table('branchs')->where('id', $request->location_update)->update([
                'branch_name'=>$filteredValues['location_name'],
                'phone_no'=>$filteredValues['geographicLocation'],
                'address'=>$filteredValues['postalAddress'],
            ]);

            return response()->json(['message' => 'location Updated successfully!'], 201);
           }
           else{
            if (!empty($filteredValues)) {

                DB::table('branchs')->insert([
                    'branch_name'=>$filteredValues['location_name'],
                    'phone_no'=>$filteredValues['geographicLocation'],
                    'address'=>$filteredValues['postalAddress'],
                ]);
            }
            return response()->json(['message' => 'location added successfully!'], 201);
           }
    }


    public function getLocation()
    {
        $locations = DB::table('branchs')->orderBy('id','desc')->get();
        return response()->json($locations);
    }


    
    public function getLocationDetail(Request $request)
    {
        $location = DB::table('branchs')->where('id',$request->location_id)->orderBy('id','desc')->first();
        return response()->json($location);
    }
}
