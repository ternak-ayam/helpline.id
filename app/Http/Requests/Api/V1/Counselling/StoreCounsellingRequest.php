<?php

namespace App\Http\Requests\Api\V1\Counselling;

use Illuminate\Foundation\Http\FormRequest;

class StoreCounsellingRequest extends FormRequest
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
            'counsellor_id' => ['required', 'exists:counsellors,id'],
            'counselling_method' => ['required'],
            'translator_language' => ['nullable'],
            'schedule' => ['required'],
        ];
    }
}
