<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CheckoutRequest extends Request
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
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required|regex:/^[a-z][a-z0-9]*(_[a-z0-9]+)*(\.[a-z0-9]+)*@[a-z0-9]([a-z0-9-][a-z0-9]+)*(\.[a-z0-9]{2,4}){1,2}$/',
            'phone'=>'required',
            'address1'=>'required',
            'city'=>'required'
        ];
    }
    public function messages() {
      return [
        'first_name.required'=>'Please Enter First Name',
        'last_name.required'=>'Please Enter Last Name',
        'email.required'=>'Please Enter E-Mail',
        'email.regex'=>'E-Mail Syntax Error',
        'phone.required'=>'Please Enter Phone',
        'address1.required'=>'Please Enter Address',
        'city.required'=>'Please Enter City'
      ];
    }
}
