<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PassengerEditRequest extends FormRequest
{
    public $errorBag = 'passengerEdit';

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'national_code'     => 'bail|required|string|size:10|unique:passengers,national_code,' . Auth::user()->passenger->id,
            'birthday'          => 'bail|required|date',
            'email'             => 'bail|required|email|unique:passengers,email,' . Auth::user()->passenger->id,
            'telephone_number'  => 'bail|required|unique:passengers,telephone_number,' . Auth::user()->passenger->id,
            'first_name'        => 'bail|required|max:255',
            'last_name'         => 'bail|required|max:255',
            'mobile_number'     => 'bail|required|starts_with:09|unique:users,mobile_number,' . Auth::user()->id,
        ];
    }
}
