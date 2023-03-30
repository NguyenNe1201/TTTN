<?php

namespace App\Http\Requests\AddEmployce;

use Illuminate\Foundation\Http\FormRequest;

class CreateFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules()
    {
        return [
            'name' => 'required|min:5',
             'email'=>'required|email|unique:users',
            'password'=>'required|confirmed|min:5',
            'phone'=>'required|digits:10|numeric'

        ];
    }
    public function messages()
    {
        return [
         

        ];
    }
   

}
