<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'national_code',
        'birthday',
        'email',
        'mobile_number',
        'password'
    ];

    protected $hidden = ['password'];
}
