<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        
        if (!$request->expectsJson()) {
            $guard = $this->getGuard($request);
            switch ($guard) {
                case 'admin':
                    return route('admin.login');
                    break;
                case 'user':
                    return route('login');
                    break;
                default:
                    return route('login');
                    break;
            }
            return route('home');
        }
    }
    

    protected function getGuard(Request $request)
    {
        if ($request->is('seller/*')) {
            return 'seller';
        }

        if ($request->is('api/*')) {
            abort(response()->json(['status'=>false,'error' => 'Unauthenticated.'], 401));
        }

        return 'user';
    }
}
