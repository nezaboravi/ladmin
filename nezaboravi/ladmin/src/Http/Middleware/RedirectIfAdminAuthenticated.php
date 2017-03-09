<?php
namespace Nezaboravi\Ladmin\Http\Middleware;

use Closure;

//Auth Facade
use Illuminate\Support\Facades\Auth;

class RedirectIfAdminAuthenticated
{

    public function handle($request, Closure $next)
    {
        //If request comes from logged in user, he will
        //be redirect to home page.
        if (Auth::guard()->check())
        {
            return redirect('/profile');
        }

        // If request comes from logged in admin, he will
        // be redirected to admin's home page.
        if (Auth::guard('web_admin')->check())
        {
            return redirect('/admin/dashboard/test');
        }

        return $next($request);
    }
}