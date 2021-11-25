<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, String $role)
    {
        if (!Auth::check()) // This isnt necessary, it should be part of your 'auth' middleware
        return redirect('/login');
        
        $user = Auth::user();
        if($user->roleId == $role)
            return $next($request);
            
        return redirect('/login');
    }
}
