<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourAdmin extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'agency',
        'start_at',
        'guild_code',
        'email',
        'telephone_number',
    ];
}
