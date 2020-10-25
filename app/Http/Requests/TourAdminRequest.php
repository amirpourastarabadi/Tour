<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TourAdminRequest extends FormRequest
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
            'guild_code'=> 'required|unique:tour_admins|string|size:10',
            'start_at'=> 'required|date',
            'email'=> 'required|email|unique:passengers',
            'mobile_number'=> 'required|unique:users',
            'telephone_number'=> 'required|unique:tour_admins',
            'agency'=> 'required|string|max:255',
        ];
    }
}
