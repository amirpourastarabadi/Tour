<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TourCreationValidation extends FormRequest
{
    protected $errorBag = 'tourCreation';

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'origin'                        => ['bail', 'required', 'string', 'max:100'],
            'destination'                   => ['bail', 'required', 'string', 'max:100'],
            'start_at'                      => ['bail', 'required', 'date'],
            'duration'                      => ['bail', 'required'],
            'price'                         => ['bail', 'required'],
            'total_num'                     => ['bail', 'required'],
            'personal_certificates'         => ['bail', 'required', 'boolean'],
            'marriage_certificates'         => ['bail', 'required', 'boolean'],
            'service'                       => ['bail', 'nullable', 'string', 'max:100'],
            'tour_service_price'            => ['bail', 'nullable'],
            'beds'                          => ['bail', 'nullable', 'numeric', 'max:10'],
            'room_type'                     => ['bail', 'nullable', 'string', 'max:100'],
            'room_service'                  => ['bail', 'nullable', 'string', 'max:100'],
            'room_service_price'            => ['bail', 'nullable'],
            'vehicle'                       => ['bail', 'nullable', 'string', 'max:20'],
            'transition_type'               => ['bail', 'nullable', 'string', 'max:15'],
            'company'                       => ['bail', 'nullable', 'string', 'max:100'],
            'transition_service_price'      => ['bail', 'nullable'],
            'origin_address'                => ['bail', 'nullable', 'string', 'max:100'],
            'destination_address'           => ['bail', 'nullable', 'string', 'max:100'],
            'departure_time'                => ['bail', 'nullable'],
            'arrival_time'                  => ['bail', 'nullable'],
            'conditions'                    => ['bail', 'nullable', 'string', 'max:255'],
            'percentage_reduction'          => ['bail', 'nullable', 'string', 'max:3'],
        ];
    }
}
