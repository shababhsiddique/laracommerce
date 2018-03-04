<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;

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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    
    /**
     * Trying to get ban status check
     * @param \App\Http\Controllers\Auth\Request $request
     * @param type $user
     * @return type
     */
    public function authenticated(Request $request, $user)
    {
        if ($user->ban_status) {
            auth()->logout();
            return back()->with('warning', 'Your account is banned, please contact admininstrator.');
        }
        return redirect()->intended($this->redirectPath());
    }
}
