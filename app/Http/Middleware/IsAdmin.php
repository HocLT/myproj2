<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($user = \Sentinel::check())
        {
            // $roles = $user->roles;
            // dd($roles);
            $isAdmin = false;
            foreach($user->roles as $role) {
                if ($role->slug=='admin') {
                    $isAdmin = true;
                    break;
                }
            }
            if ($isAdmin) {
                return $next($request); // đã login, xử lý tiếp
            }
        }
        
        return redirect()->route('login');
    }
}
