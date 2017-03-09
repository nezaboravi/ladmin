<?php
namespace Nezaboravi\Ladmin\Http\Middleware;

use Closure;

//Auth Facade
use Illuminate\Support\Facades\Auth;

class AuthenticateAdmin
{
    public function handle($request, Closure $next)
    {
        //If request does not comes from logged in admin
        //then he shall be redirected to Admin Login page
        if (!Auth::guard('web_admin')->check())
        {
            return redirect('/admin');
        }

        return $next($request);
    }
}