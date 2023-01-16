<?php

namespace App\Http\Controllers\Translator\Auth;

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
    protected $redirectTo = RouteServiceProvider::TRANSLATOR;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:translator')->except('logout');
    }

    public function showLoginForm()
    {
        return view('admin.pages.auth.translator.login');
    }

    protected function guard()
    {
        return Auth::guard('translator');
    }

    protected function authenticated(Request $request, $user)
    {
        $user->update([
            'timezone' => $request->timezone,
        ]);
    }

    protected function attemptLogin(Request $request)
    {
        $request->session()->flush();

        return $this->guard()->attempt(
            $this->credentials($request), $request->boolean('remember')
        );
    }
}
