<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
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
            'email' => ['required', 'string', 'email', 'max:255',
                Rule::unique('users')->ignore($this->route('user'), 'id')],
            'password' => ['required', 'string', 'min:8'],
            'country' => ['required', 'string'],
            'name' => ['required', 'string'],
            'birthdate' => ['required', 'string'],
            'sex' => ['required', 'string', Rule::in([
                'male',
                'female',
                'others'
            ])],
        ];
    }
}
