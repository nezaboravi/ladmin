<?php

namespace Nezaboravi\Ladmin\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

//Class needed for login and Logout logic
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Support\Facades\Auth;
use Validator;
class LoginController extends Controller
{
    use AuthenticatesUsers;
    //Where to redirect admin after login.
    protected $redirectTo = '/admin/dashboard';

    //Custom guard for admin
    protected function guard()
    {
        return Auth::guard('web_admin');
    }
    //Shows admin login form
    public function showLoginForm()
    {
        // dd(Auth::guard('web_admin'));
        return view('ladmin::admin.forms.login');
    }

}
