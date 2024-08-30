<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

class CheckUserDetails
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            $user = Auth::guard('doctor')->user();

            $isEditAllowed = false;
            $decryptedId = Crypt::decrypt($request->route('id'));
            

            if($user->user_type == "Nurse" || $user->user_type == "Receptionist" || $user->user_type == "Coordinator"){
                $doctorId = DB::table('doctor_nurse')->where('nurse_id',$user->id)->get()->pluck('doctor_id')->toArray();
            }else{
                $doctorId = [$user->id];
            }

            if(DB::table('users')->whereIn('doctor_id',$doctorId)->exists()){
                $isEditAllowed = true;
            }else if(DB::table('referal_patients')->whereIn('doctor_id',$doctorId)->where(['patient_id'=>$decryptedId,'referal_status'=>'1'])->exists()){
                $isEditAllowed = true;
            }

            // dd($isEditAllowed);

            View::share('isEditAllowed', $isEditAllowed);
        }

        // If the user is not authenticated, redirect to login
        return $next($request);
    }
}
