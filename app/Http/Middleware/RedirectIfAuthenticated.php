<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string[]|null  ...$guards
     * @return mixed
     */
    public function handle($request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {

                if($guard === 'admin'){
                    return redirect()->route('admin.profile');
                }
                if($guard === 'web'){
                    return redirect()->route('user.tableu');
                }
            }
        }
       
        // If the user is authenticated as an admin and is not on the admin login page,
        // redirect them to the admin profile page.
        if (Auth::guard('admin')->check() && !$request->routeIs('admin.login')) {
            return redirect()->route('admin.profile');
        }

        // If the user is authenticated as a regular user and is not on the user login page,
        // redirect them to the user profile page.
        if (Auth::guard('web')->check() && !$request->routeIs('user.login')) {
            return redirect()->route('user.tableu');
        }

        // Otherwise, allow the user to access the requested page.
        return $next($request);

    
      
 
    }
}
