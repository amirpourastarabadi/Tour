<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TourServiceRequest extends FormRequest
{
    protected $errorBag = 'tourService';

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'service' => ['bail', 'nullable', 'max:100'],
            'service_price' => ['bail', 'nullable', 'max:8'],
        ];
    }
}
