<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomServices extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'room_services';

    protected $fillable = [
        'tour_id',
        'beds',
        'room_type',
        'room_service',
        'room_service_price',
    ];

    public function tour(){
        return $this->belongsTo(Tour::class);
    }
}
