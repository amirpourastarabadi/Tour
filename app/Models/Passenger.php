<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'email',
        'telephone_number',
        'national_code',
        'birthday'
    ];

    public $timestamps = false;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function tours(){
        return $this->belongsToMany(Tour::class);
    }
}
