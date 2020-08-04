<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    //  ...$roles merupakan spread operator, baca lebih lanjut mengenai
    // spread operator
    public function handle($request, Closure $next, ...$roles)
    {
        // check user auth
        if (!Auth::check()) return response('Unauthorized.', 401);
        //get data user via auth
        $user = Auth::user();
        
        //check user memiliki role yang sesuai
        foreach($roles as $role) {
            if($user->role == $role)
            
                return $next($request);
        }
        return response('Unauthorized.', 401);
    }
}
