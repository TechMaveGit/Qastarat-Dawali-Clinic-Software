<?php

namespace App\Http\Controllers\Doctor;

use App\Models\Admin;
use App\Models\User;
use App\Models\Otp;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\Controller;
use App\Models\superAdmin\Doctor;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Mail\ForgetPasswordMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Artisan;

use function Laravel\Prompts\table;

class DoctorAuthController extends Controller
{
    public function login(Request $request)
    {
        if (request()->isMethod("post")) {
            $credentials = $request->only('email', 'password');

            if (Auth::guard('doctor')->once($credentials)) {
                Auth::guard('doctor')->attempt(['email' => $request->email, 'password' => $request->password]);
                return redirect()->route('admin.dashboard');
            } elseif (Auth::guard('web')->once($credentials)) {
                if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password]))
                    
                    return redirect()->route('patient.dashboard');
            }
            else {
                
                return redirect()->back()->withErrors(['error' => 'Invalid email or password']);
            }
        }
        return view('back/admin/login');
    }



     public function patientLogin(Request $request)
        {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|string',
            ]);



            if($request->input('formValue')==='1')
            {

                $credentials = $request->only('email', 'password');
                    if (Auth::guard('doctor')->once($credentials))
                    {
                        // Attempt to authenticate the user with email and password
                        $user = Auth::guard('doctor')->getLastAttempted();

                        $roleId= DB::table('roles')->where('id',$user->role_id)->first();


                        if($user)
                            {
                                if($roleId)
                                {
                                        if ($user->status === 'active')
                                        {
                                            if($roleId->status=='1' || $user->role_id=='0')
                                            {
                                                if (Auth::guard('doctor')->attempt(['email' => $request->email, 'password' => $request->password])) {
                                                    return response()->json(['error' => 301]); // You can return any success response here
                                                } else {
                                                    // Authentication failed due to invalid email or password
                                                    return response()->json(['error' => 'Invalid email or password'], 422);
                                                }
                                            }
                                            else{
                                                return response()->json(['error' => 'Your role is inactive. Please contact support for assistance.'], 422);
                                            }
                                        }
                                        else
                                        {
                                            // if (Auth::guard('doctor')->attempt(['email' => $request->email, 'password' => $request->password])) {
                                            //     // Authentication successful
                                            //     return response()->json(['error' => 200]); // You can return any success response here
                                            // } else {
                                                // Authentication failed due to invalid email or password
                                                return response()->json(['error' => 'Your account is inactive. Please contact support for assistance.'], 422);
                                        //  }
                                        }
                                }
                                else{
                                    if (Auth::guard('doctor')->attempt(['email' => $request->email, 'password' => $request->password])) {
                                        // Authentication successful
                                        return response()->json(['error' => 301]); // You can return any success response here
                                    } else {
                                        // Authentication failed due to invalid email or password
                                        return response()->json(['error' => 'Invalid email or password'], 422);
                                    }
                                }
                            }
                            else
                            {
                                if (Auth::guard('doctor')->attempt(['email' => $request->email, 'password' => $request->password])) {
                                    // Authentication successful
                                    return response()->json(['error' => 200]); // You can return any success response here
                                } else {
                                    // Authentication failed due to invalid email or password
                                    return response()->json(['error' => 'Invalid email or password'], 422);
                                }
                            }
                    }
                    else
                    {
                            return response()->json(['error' => 'Invalid email or password'], 422);
                    }
            }

            if($request->input('formValue')==='2')
            {

                $credentials = $request->only('email', 'password');
                if (Auth::guard('web')->attempt($credentials))
                {
                    // Get the authenticated user
                    $user = Auth::guard('web')->user();

                    // Check the user's status
                    if ($user->status !== '1') {
                        // Log out the user if they are inactive
                        Auth::guard('web')->logout();

                        // Return a response indicating the user is inactive
                        return response()->json(['error' => 'User is inactive'], 403);
                    }

                    // User is authenticated and active
                    return response()->json(['error' => 200]);
                } else {
                    // Authentication failed
                    return response()->json(['error' => 'Invalid email or password'], 422);
                }

        }


    }

     
    

    

    public function staffLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Check if user exists with the given email and password
        if (Auth::guard('doctor')->once($credentials)) 
        {
            // Attempt to authenticate the user with email and password
             $user = Auth::guard('doctor')->getLastAttempted();

             $roleId= DB::table('roles')->where('id',$user->role_id)->first();


            if($user)
                {
                    if($roleId)
                    {
                            if ($user->status === 'active') 
                            {
                                if($roleId->status=='1' || $user->role_id=='0')
                                {
                                    if (Auth::guard('doctor')->attempt(['email' => $request->email, 'password' => $request->password])) {
                                        // Authentication successful
                                        return response()->json(['error' => 200]); // You can return any success response here
                                    } else {
                                        // Authentication failed due to invalid email or password
                                        return response()->json(['error' => 'Invalid email or password'], 422);
                                    }
                                } 
                                else{
                                    return response()->json(['error' => 'Your role is inactive. Please contact support for assistance.'], 422);
                                }
                            }
                            else
                            {
                                // if (Auth::guard('doctor')->attempt(['email' => $request->email, 'password' => $request->password])) {
                                //     // Authentication successful
                                //     return response()->json(['error' => 200]); // You can return any success response here
                                // } else {   
                                    // Authentication failed due to invalid email or password
                                    return response()->json(['error' => 'Your account is inactive. Please contact support for assistance.'], 422);
                              //  }
                            }
                    }
                    else{
                        if (Auth::guard('doctor')->attempt(['email' => $request->email, 'password' => $request->password])) {
                            // Authentication successful
                            return response()->json(['error' => 200]); // You can return any success response here
                        } else {
                            // Authentication failed due to invalid email or password
                            return response()->json(['error' => 'Invalid email or password'], 422);
                        }
                    }
                }
                else
                {
                    if (Auth::guard('doctor')->attempt(['email' => $request->email, 'password' => $request->password])) {
                        // Authentication successful
                        return response()->json(['error' => 200]); // You can return any success response here
                    } else {
                        // Authentication failed due to invalid email or password
                        return response()->json(['error' => 'Invalid email or password'], 422);
                    }
                }
        } 
        else
        {
                return response()->json(['error' => 'Invalid email or password'], 422);
        }
      }

    public function profile()
    {     
        $doctor =Doctor::select('id','email','role_id','password','user_type','patient_profile_img','name','title')->find(auth('doctor')->user()->id);
        return view('back/profile',compact('doctor'));
    }

    public function updateProfile(Request $request)
    
    {
        $doctor_id=auth('doctor')->user()->id;
       
        $request->validate([
            'email' => [
                'required',
                Rule::unique('doctors','email')->ignore($doctor_id)
            ],
            'title' => 'required',
            'name' => 'required',
        ]);
        $doctor=Doctor::find($doctor_id);
        $temp_data=[];
        $data= $request->only('id','email','password','user_type','patient_profile_img','name','title');

        if(isset($data['password'])){
        $temp_data['password']= Hash::make($data['password']);
        }
        if(isset($data['patient_profile_img'])){

      //     return $doctor;

        // doctor
        if($doctor->role_id=='1'){
            // if(isset($doctor->patient_profile_img)){
            //     unlink('/assets/doctor_profile'.'/'.$doctor->patient_profile_img);
            // }
            $image = $data['patient_profile_img'];
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/profileImage'), $new_name);
            $temp_data['patient_profile_img'] = $new_name;

        }
        // Nurse
        if($doctor->role_id=='2'){
            // if(isset($doctor->patient_profile_img)){
            //     unlink('/assets/nurse_profile'.'/'.$doctor->patient_profile_img);
            // }
            $image = $data['patient_profile_img'];
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/nurse_profile'), $new_name);
            $temp_data['patient_profile_img'] = $new_name;

        }
         // Accountant
         if($doctor->role_id=='5'){
            // if(isset($doctor->patient_profile_img)){
            //     unlink('/assets/accountant_profile'.'/'.$doctor->patient_profile_img);
            // }
            $image = $data['patient_profile_img'];
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/nurse_profile'), $new_name);
            $temp_data['patient_profile_img'] = $new_name;

        }
         // Telecaller
         if($doctor->role_id=='6'){
            // if(isset($doctor->patient_profile_img)){
            //     unlink('/assets/telecaller_profile'.'/'.$doctor->patient_profile_img);
            // }
            $image = $data['patient_profile_img'];
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/nurse_profile'), $new_name);
            $temp_data['patient_profile_img'] = $new_name;
        }
   
         // Telecaller
         if($doctor->role_id=='11'){
            // if(isset($doctor->patient_profile_img)){
            //     unlink('/assets/accountant_profile'.'/'.$doctor->patient_profile_img);
            // }
            $image = $data['patient_profile_img'];
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/nurse_profile'), $new_name);
            $temp_data['patient_profile_img'] = $new_name;
        }

        

     }
     $temp_data['email']=$data['email'];
     $temp_data['name']=$data['name'];
     $temp_data['title']=$data['title'];
    
    $result= $doctor->update($temp_data);
    if($result){
        return redirect()->back()->with('status','User Profile Updated Successfully!');
    }else{
        return redirect()->back()->with('status','Failed to update user Profile!');
    }
    

    }


    public function forgetPassword()
    {
        return view('back/forget-password');
    }
    public function postForgetPassword(Request $request)
    {
       
        $user = Doctor::getEmailSingle($request->email);
        if (!empty($user)) {
          
            $user->remember_token = Str::random(30);
            $user->save();
           

            Mail::to($user->email)->send(new ForgetPasswordMail($user));

           // Get the route URL
            $routeUrl = route('front.home.page');

            return response()->json([
                'user' => $user,
                'routeUrl' => $routeUrl,
            ]);
        } else {
            $user = '';
            $routeUrl = route('doctor.forget.password');
            return response()->json([
                'user' => $user,
                'routeUrl' => $routeUrl,
            ]);
        }
    }
    public function resetForgetPassword($remember_token)
    {
        $user = Doctor::getTokenSingle($remember_token);
        if (!empty($user)) {
            return view('back/reset-password',compact('remember_token'));
        } else {
            abort(404);
        }
    }


    function updateNewPassword($remember_token,Request $req)
    {
        $req->validate([
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required|string|min:6',
        ]);
        $user = Doctor::getTokenSingle($remember_token);
        if ($user) {
          $user->update(['password' => Hash::make($req->password)]);
            return redirect()->route('front.home.page');
        } else {
            return false;
        }
    }


    public function orderMedicalReport()
    {
        return view('back/orderMedicalReport');   
    }
    public function myRadiologyReport()
    {
        return view('back/myRadiologyReport');
    }
    public function myLabResult()
    {
        $patientId=auth('web')->user();
        $totalTask = DB::table('tasks')->where('patient_id',$patientId->id)->get();
        
        return view('back/myLabResult',compact('totalTask'));
    }
    public function service()
    {
        return view('back/services');
    }
    public function showRegistrationForm()
    {
        return view('front/sign-up');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|string',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
        ]);
        Admin::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->route('user.login');
    }

    public function showLinkRequestForm()
    {
        return view('front/forget-password');
    }
    function sendOtp(Request $req)
    {
        $data = Admin::where('email', $req->email)->first();
        if (!empty($data)) {
            $otp         = new Otp();
            $otp->user_id = $data->id;
            $otp->otp    = 123456;
            $otp->save();
            if (!empty($otp->id)) {
                $req->session()->put('forgot', $data);
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    function verifyOtp(Request $req)
    {
        // $credentials = ['email' => $req->email];
        // $response = Password::sendResetLink($credentials, function (Message $message) {
        //     $message->subject($this->getEmailSubject());
        // });

        // switch ($response) {
        //     case Password::RESET_LINK_SENT:
        //         return view('front/verify-otp');
        //         // return redirect()->back()->with('status', trans($response));
        //     case Password::INVALID_USER:
        //         // dd('hii');
        //         return redirect()->back()->withErrors(['email' => trans($response)]);
        // }
        return view('front/verify-otp');
    }

    function verifiedOtp(Request $req)
    {
        $data = Otp::where('otp', $req->otp)->where('status', 'inactive')->where('user_id', session('forgot')->id)->first();
        if (!empty($data)) {
            $result = Otp::where('id', $data->id)->update(['status' => 'active']);
            if ($result > 0) {
                return true;
            } else {
                return false;
            }
        }
    }

    
   

    public function logout(Request $request)
    {
        
        Auth::guard('doctor')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('front.home.page');
    }
}
