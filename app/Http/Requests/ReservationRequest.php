<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'national_code' => 'bail|required|string|size:10',
            'mobile_number' => 'bail|required',
            'first_name' => 'bail|required|min:3|string|max:255',
            'last_name' => 'bail|required|string|min:3|max:255',
            'birthday' => 'bail|required|date',
            'password' => 'bail|required',
        ];
    }
}
