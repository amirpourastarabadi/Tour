<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomServices extends Model
{
    use HasFactory;

    protected $fillable = [
        'tour_id',
        'beds',
        'room_type',
        'room_service',
        'service_price',
    ];
}
