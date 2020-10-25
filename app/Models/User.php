<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'mobile_number',
        'role',
        'password',
    ];


    protected $hidden = [
        'remember_token',
    ];


    protected $casts = [
        'mobile_number_verified_at' => 'datetime',
    ];

    public function passenger(){
        return $this->hasOne(Passenger::class);
    }

    public function tourAdmin(){
        return $this->hasOne(TourAdmin::class);
    }
}
