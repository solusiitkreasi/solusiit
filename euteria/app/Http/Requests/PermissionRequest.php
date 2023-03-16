<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest
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
            'display_name' => 'required|unique:permissions,display_name,'.$this->permission
        ];
    }

    public function messages()
    {
        return [
            'display_name.unique' => 'Nama Telah Digunakan'
        ];
    }
}
