<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CateRequest extends Request
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
            // 'txtCateName'=>'required|unique:cates,name'
            'txtCateName'=>'required'
        ];
    }
    public function messages() {
      return [
        'txtCateName.required'=>'Please Enter Name Category'
        // 'txtCateName.unique'=>'This Name Category Is Exist'
      ];
    }
}
