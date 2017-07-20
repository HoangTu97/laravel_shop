<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RegisterRequest extends Request
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
          'txtUsername'=>'required|unique:users,username',
          'txtEmail'=>'required|regex:/^[a-z][a-z0-9]*(_[a-z0-9]+)*(\.[a-z0-9]+)*@[a-z0-9]([a-z0-9-][a-z0-9]+)*(\.[a-z0-9]{2,4}){1,2}$/',
          'txtPassword'=>'required',
          'txtRePassword'=>'required|same:txtPassword'
        ];
    }
    public function messages() {
      return [
        'txtUsername.required'=>'Please Enter Username',
        'txtUsername.unique'=>'User Is Exists',
        'txtEmail.required'=>'Please Enter Email',
        'txtEmail.regex'=>'Email Error Syntax',
        'txtPassword.required'=>'Please Enter Password',
        'txtRePassword.required'=>'Please Enter Re-Password',
        'txtRePassword.same'=>'Two Password Don\'t Match'
      ];
    }
}
