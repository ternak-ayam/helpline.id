<?php

namespace App\Http\Requests\Translator;

use Illuminate\Foundation\Http\FormRequest;

class TranslatorUpdateRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required',
            'language' => 'required',
            'password' => 'confirmed',
        ];
    }
}
