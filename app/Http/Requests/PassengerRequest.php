<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PassengerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name' => 'required|max:255',
            'last_name'=> 'required|max:255',
            'national_code'=> 'required|unique:passengers|string|size:10',
            'birthday'=> 'required|date',
            'email'=> 'required|email|unique:passengers',
            'mobile_number'=> 'required|unique:passengers',
            'password'=> 'required',
            'confirm_password'=> 'required|same:password'
        ];
    }
}
