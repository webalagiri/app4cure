<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class DoctorRegisterRequest extends Request
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

        $rules['doctor_specialty'] = 'required';

        $rules['name'] = 'required | max:255';
        $rules['email'] = 'required | email | max:100 | unique:users,email';
        $rules['password'] = 'required | max:255';
        $rules['telephone'] = 'required | max:255';

        $rules['address'] = 'required ';
        $rules['country'] = 'required';
        $rules['state'] = 'required';
        $rules['city'] = 'required';
        $rules['area'] = 'required';

        $rules['doctor_details'] = 'required';
        $rules['doctor_contact_name'] = 'required';
        $rules['doctor_contact_mobile'] = 'required';

        return $rules;
    }
}
