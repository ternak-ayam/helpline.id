<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'unhcr_number' => ['required', 'string', 'unique:users', 'exists:unhcrs'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'city' => ['required', 'string'],
            'country' => ['required', 'string'],
            'birthdate' => ['required', 'string'],
            'sex' => ['required', 'string', Rule::in([
                'male',
                'female',
                'others'
            ])],
        ];
    }
}
