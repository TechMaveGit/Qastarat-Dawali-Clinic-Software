<?php

namespace App\Http\Controllers\Doctor;
use App\Models\Admin;
use App\Models\Otp;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DoctorAuthController extends Controller
{
     public function login(Request $request)
     {
        if(request()->isMethod("post"))
        {
            $credentials = $request->only('email', 'password');

            if (Auth::guard('doctor')->once($credentials)) {
                Auth::guard('doctor')->attempt(['email' => $request->email, 'password' => $request->password]);
                    return redirect()->route('admin.dashboard');
                }
                if (Auth::guard('web')->once($credentials)) {
                    Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password]); 
                    return redirect()->route('patients.dashboard');
                }

                // if (Auth::validate($credentials)) {
                //     Auth::guard('doctor')->attempt(['email' => $request->email, 'password' => $request->password]);
                //     return redirect()->route('admin.dashboard');
                // }
                else{
                    echo "else"; die;
                }
        }
         return view('back/admin/login');
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

     function updatePassword()
     {
         return view('front/reset-password');
     }

     function updateNewPassword(Request $req)
     {
         $req->validate([
             'password' => 'required|string|min:8|confirmed',
             'password_confirmation' => 'required|string|min:8',
         ]);
         $result = Admin::where('id', session('forgot')->id)->update(['password' => Hash::make($req->password)]);
         if ($result > 0) {
             $req->session()->pull('forgot');
             return redirect()->route('common.login');
         } else {
             return false;
         }
     }

     public function logout(Request $request)
     {
         Auth::guard('doctor')->logout();

         $request->session()->invalidate();

         $request->session()->regenerateToken();

         return redirect()->route('common.login');
     }
}
