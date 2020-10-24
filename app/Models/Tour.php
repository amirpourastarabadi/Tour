<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    protected $fillable = [
        'hotel_id',
        'tour_admin_id',
        'origin',
        'destination',
        'start_at',
        'duration',
        'price',
        'count',
        'personal_certificates',
        'marriage_certificates',
    ];
}