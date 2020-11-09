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
        'total_num',
        'filled_num',
        'personal_certificates',
        'marriage_certificates',
    ];


    public function passengers(){
        return $this->belongsToMany(Passenger::class);
    }

    public function tourServices(){
        return $this->hasMany(TourServices::class);
    }

    public function roomServices(){
        return $this->hasMany(RoomServices::class);
    }

    public function transportationServices(){
        return $this->hasMany(TransportationServices::class);
    }

    public function hotel(){
        return $this->belongsTo(Hotel::class);
    }
}
