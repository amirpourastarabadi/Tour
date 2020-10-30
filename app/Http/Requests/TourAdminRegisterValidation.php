<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TourAdminRegisterValidation extends FormRequest
{
    protected $errorBag = 'tourAdminRegister';

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name' => ['bail', 'required', 'max:255'],
            'last_name' => ['bail', 'required', 'max:255'],
            'mobile_number' => ['bail', 'required', 'starts_with:09', 'unique:users'],
            'password' => ['bail', 'required', 'min:6', 'confirmed'],
        ];
    }
}
