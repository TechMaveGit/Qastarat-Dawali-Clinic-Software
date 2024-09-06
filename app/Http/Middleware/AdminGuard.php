<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class AdminGuard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
      
        $D = json_decode(json_encode(Auth::guard('doctor')->user()->get_role()),true);
        $arr = [];
        
        foreach($D as $v)
        {
          $arr[] = $v['permission_id'];
        }
          // Check if the user is authenticated and has admin role
          if ($arr) {
            return $next($request);
        }else{
            abort(403, 'Unauthorized access.');
        }
    }
}
