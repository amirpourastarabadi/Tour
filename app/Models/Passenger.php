<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function tours()
    {
        return $this->belongsToMany(Tour::class)->withTimestamps();
    }

    public function tour(Tour $tour)
    {
        $record = DB::table('passenger_tour')
            ->where('tour_id', $tour->id)
            ->where('passenger_id', $this->id)
            ->first();
        return $record;
    }
}
