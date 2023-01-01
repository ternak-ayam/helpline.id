<?php

namespace App\Http\Controllers\Counsellor\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = RouteServiceProvider::COUNSELLOR;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:counsellor')->except('logout');
    }

    public function showLoginForm()
    {
        return view('admin.pages.auth.counsellor.login');
    }

    protected function guard()
    {
        return Auth::guard('counsellor');
    }

    protected function authenticated(Request $request, $user)
    {
        $user->update([
            'timezone' => $request->timezone,
        ]);
    }
}
