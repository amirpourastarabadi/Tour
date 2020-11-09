<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HotelCreationValidation extends FormRequest
{
    protected $errorBag = 'hotelCreation';

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            //
        ];
    }
}
