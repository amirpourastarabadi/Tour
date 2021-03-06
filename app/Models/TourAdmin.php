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

    public $timestamps = false;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function tours(){
        return $this->hasMany(Tour::class);
    }
}
