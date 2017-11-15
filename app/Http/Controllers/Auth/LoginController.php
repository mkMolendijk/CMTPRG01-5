<?php

namespace myGamesList\Http\Controllers\Auth;

use myGamesList\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;


//    protected $redirectTo = '/dashboard';
    protected function authenticated($request, $user)
    {
        if ($user->enabled === 1) {
            if ($user->admin === 1) {
                return redirect()->intended('/admin');
            }

            return redirect()->intended('/dashboard');
        } else {
            // TODO Make redirect back to home without logging in
            return redirect('/');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
