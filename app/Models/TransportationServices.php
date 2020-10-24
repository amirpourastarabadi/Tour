<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransportationServices extends Model
{
    use HasFactory;

    protected $fillable = [
        'tour_id',
        'vehicle',
        'transition_type',
        'company',
        'departure_time',
        'arrival_time',
        'origin_address',
        'destination_address',
        'ticket_code',
        'conditions',
        'percentage_reduction',
    ];
}
