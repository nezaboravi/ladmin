<?php
namespace Nezaboravi\Ladmin\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class SessionsController extends Controller
{
    public function create()
    {
        return view('ladmin::admin.forms.login');
    }
    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        // validate the form
        $validator = Validator::make($request->all(),
            [
                'email'                 => 'required|email',
                'password'              => 'required'
            ],
            [
                'email.required'        => 'Email is required',
                'email.email'           => 'Email is invalid',
                'password.required'     => 'Password is required'
            ]
        );
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput($request->all());
        }
        dd( Auth::user());
        $user = Auth::attempt(request(['email', 'password']));
dd($user);
        return redirect('/admin/dashboard');
    }

    /**
     * Logout
     *
     * @return Redirect
     **/
    public function destroy()
    {
        auth()->logout();
        return redirect('/');
    }
}