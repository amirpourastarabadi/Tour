<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourServices extends Model
{
    use HasFactory;

    protected $fillable = [
        'tour_id',
        'service',
        'service_price',
    ];
}
