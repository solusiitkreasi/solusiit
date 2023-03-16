<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
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
        $rules =  [
            'en.name' => 'required',
            'id.name' => 'required',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'en.name.required' => 'Nama harus diisi',
            'id.name.required' => 'Nama harus diisi',
        ];
    }
}
