<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PatientRegisterRequest extends Request
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
        $rules = [];
        $rules['name'] = 'required | max:50';
        $rules['email'] = 'required | email | max:100 | unique:users,email';
        $rules['password'] = 'required | min: 6 | max:12';
        return $rules;
    }
}
