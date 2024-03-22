<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Otp;
use Illuminate\Mail\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use App\Mail\ForgetPasswordMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Artisan;


class AuthController extends Controller
{
    //
    public function showLoginForm()
    {
        return view('front/login');
    }

    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email|string',
            'password' => 'string|min:8'
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('user.dashboard');
        } else {
            return redirect()->back();
        }
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
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->route('user.login');
    }

    public function forgetPassword()
    {
        return view('front/forget-password');
    }
    public function postForgetPassword(Request $request)
    {
        $user = User::getEmailSingle($request->email);
        if (!empty($user)) {
            Artisan::call('optimize:clear');
            Artisan::call('config:clear');
            $user->remember_token = Str::random(30);
            $user->save();
            $otp = rand(100000,999999);
            $time = time();
    
            Otp::updateOrCreate(
                ['user_id' => $user->id],
                [
                'user_id' => $user->id,
                'otp' => $otp,
                'created_at' => $time
                ]
            );
    
            Mail::to($user->email)->send(new ForgetPasswordMail($user,$otp));
            return response()->json($user);
        } else {
            $user = '';
            return response()->json($user);
        }
    }
    public function resetForgetPassword($remember_token)
    {
        $user = User::getTokenSingle($remember_token);
        if (!empty($user)) {
            return view('front/reset-password',compact('remember_token'));
        } else {
            abort(404);
        }
    }
 

    function verifyOtp($email)
    {
       
        return view('front/verify-otp',compact('email'));
    }

   
   
    public function verifiedOtp(Request $request)
    {
        $user = User::where('email',$request->email)->first();
        $otpData = Otp::where('otp',$request->otp)->first();
        if(!$otpData){
            return response()->json(['success' => false,'msg'=> 'You entered wrong OTP']);
        }
        else{

            $currentTime = time();
            $time = $otpData->created_at;

            if($currentTime >= $time && $time >= $currentTime - (90+5)){//90 seconds
                User::where('id',$user->id)->update([
                    'is_verified' => 1
                ]);
                return response()->json(['success' => true,'msg'=> 'Mail has been verified']);
            }
            else{
                return response()->json(['success' => false,'msg'=> 'Your OTP has been Expired']);
            }

        }
    }

    public function resendOtp(Request $request)
    {
        $user = User::where('email',$request->email)->first();
        $otpData = Otp::where('user_id',$user->id)->first();

        $currentTime = time();
        $time = $otpData->created_at;

        if($currentTime >= $time && $time >= $currentTime - (90+5)){//90 seconds
            return response()->json(['success' => false,'msg'=> 'Please try after some time']);
        }
        else{

            $this->postForgetPassword($user);//OTP SEND
            return response()->json(['success' => true,'msg'=> 'OTP has been sent']);
        }

    }
    function updatePassword()
    {
        return view('front/reset-password');
    }

    function updateNewPassword($remember_token,Request $req)
    {
        $req->validate([
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
        ]);
        $user = User::getTokenSingle($remember_token);
        if ($user) {
          $user->update(['password' => Hash::make($req->password)]);
            return redirect()->route('user.login');
        } else {
            return false;
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('user.login');
    }
}
