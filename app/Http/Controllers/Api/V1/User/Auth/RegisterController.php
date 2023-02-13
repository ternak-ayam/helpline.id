<?php

namespace App\Http\Controllers\Api\V1\User\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\User\Auth\LoginResource;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:web');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'unique:users'],
            'unhcr_number' => ['required', 'string', 'exists:unhcrs'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'city' => ['required', 'string'],
            'country' => ['required', 'string'],
            'timezone' => ['nullable', 'string'],
            'birthdate' => ['required', 'string'],
            'sex' => ['required', 'string', Rule::in([
                'male',
                'female',
                'others'
            ])],
            'informed_consent' => ['required'],
            'informed_address' => ['required'],
            'informed_limitation' => ['required'],
        ], [
            'informed_consent.required' => 'Please check the informed consent',
            'informed_address.required' => 'Please check the informed address',
            'informed_limitation.required' => 'Please check the informed limitation',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'timezone' => $data['timezone'],
            'unhcr_number' => $data['unhcr_number'],
            'country' => $data['country'],
            'birthdate' => $data['birthdate'],
            'sex' => $data['sex'],
            'password' => Hash::make($data['password']),
            'city' => $data['city'],
        ]);
    }

    protected function registered(Request $request, $user)
    {
        return new LoginResource($user);
    }
}
