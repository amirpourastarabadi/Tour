<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TourAdminCompletionValidation extends FormRequest
{
    protected $errorBag = 'tourAdminCompletion';

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'agency' => ['bail', 'required', 'max:255'],
            'start_at' => ['bail', 'required'],
            'guild_code' => ['bail', 'required', 'unique:tour_admins'],
            'email' => ['bail', 'nullable', 'email', 'unique:tour_admins'],
            'telephone_number' => ['bail', 'required', 'min:10', 'unique:tour_admins'],
        ];
    }
}
