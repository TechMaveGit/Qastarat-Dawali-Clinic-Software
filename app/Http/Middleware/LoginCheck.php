<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class LoginCheck
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
            $user = Auth::user();

            if(isset($user->status) && !in_array($user->status,['active','1'])){
                Auth::logout();
                return redirect()->route('front.home.page');
            }
        }

        // If the user is not authenticated, redirect to login
        return $next($request);
    }
}
