<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestimonyRequest extends FormRequest
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
        $file_rule = 'mimes:png,jpg,jpeg';
        
        if($this->method() == 'POST')
        {
            $file_rule = 'required|mimes:png,jpg,jpeg';
            
        }
        

        $rules =  [
            'file' => $file_rule,
            'name' => 'required',
            'en.description' => 'required',
            'id.description' => 'required'
        ];



        return $rules;
    }

    public function messages()
    {
        return [
            'file.required' => 'Anda Blum Upload File',
            'name.required' => 'Nama harus diisi',
            'en.description.required' => 'Deskripsi [EN] Harus Diisi',
            'id.description.required' => 'Deskripsi [ID] Harus Diisi',
        ];
    }
}
