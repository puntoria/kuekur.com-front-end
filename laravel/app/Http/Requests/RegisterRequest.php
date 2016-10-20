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
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return RegisterRequest::getRules();
    }


    /**
     * Get the validation rules that apply to the request.
     * Added this static method to also get these rules on AuthController
     * 
     *
     * @return array
     */
    public static function getRules(){
        return [
            'firstname' => 'required|max:255',
            'lastname'  => 'required|max:255',
            'email'     => 'required|email|max:255|unique:users',
            'birthdate' => 'required|date|before:now',
            'gender'    => 'required|in:0,1',
            'password'  => 'required|confirmed|min:6',
        ];
    }
}
