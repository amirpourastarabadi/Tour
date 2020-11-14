<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PassengerRequest extends FormRequest
{
    public $errorBag = 'passengerCompletion';

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'national_code'     => 'bail|required|unique:passengers|string|size:10',
            'birthday'          => 'bail|required|date',
            'email'             => 'bail|required|email|unique:passengers',
            'telephone_number'  => 'bail|required|unique:passengers',
        ];
    }
}
