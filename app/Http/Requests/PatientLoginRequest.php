<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PatientLoginRequest extends Request
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
        //dd($this);
        $rules = [];

        $rules['email'] = 'required | email';
        $rules['password'] = 'required';

        return $rules;
    }
}
