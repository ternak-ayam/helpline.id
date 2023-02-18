<?php

namespace App\Http\Controllers\Api\V1\Counselling\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\User\Profile\ProfileResource;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function index()
    {
        $user = request()->user();

        return new ProfileResource($user);
    }

    public function update(Request $request)
    {
        $user = $request->user();

        $request->validate([
            'name' => ['required', 'string', 'unique:users,name,'.$user->id],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$user->id],
            'password' => ['required', 'string', 'min:8'],
            'country' => ['required', 'string'],
            'city' => ['required', 'string'],
            'birthdate' => ['required', 'string'],
            'sex' => ['required', 'string', Rule::in([
                'male',
                'female',
                'others'
            ])],
        ]);

        $request->user()->update($request->all());

        return $this->success();
    }
}
