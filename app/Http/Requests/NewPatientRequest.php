<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class NewPatientRequest extends Request
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

        $rules['first_name'] = 'required | max:255';
        $rules['last_name'] = 'required | max:255';
        $rules['mobile'] = 'required | max:255';
        $rules['email'] = 'required | email';
        $rules['dob'] = 'required ';
        $rules['age'] = 'required | numeric';
        $rules['gender'] = 'required | boolean';

        return $rules;
    }
}
