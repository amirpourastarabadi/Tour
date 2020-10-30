<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TourAdminEditRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'first_name' => 'bail|required|string|min:3|max:255',
            'last_name' => 'bail|required|string|min:3|max:255',
            'agency' => 'bail|required|string|min:3|max:255',
            'guild_code' => 'bail|required|string|size:10|unique:tour_admins,id',
            'start_at' => 'bail|required|date',
            'email' => 'bail|required|email|unique:tour_admins,id',
            'telephone_number' => 'bail|required|max:14|min:11',

        ];
    }
}
