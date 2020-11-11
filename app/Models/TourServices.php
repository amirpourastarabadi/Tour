<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourServices extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'tour_id',
        'service',
        'tour_service_price',
    ];

    public function tour(){
        return $this->belongsTo(Tour::class);
    }
}
