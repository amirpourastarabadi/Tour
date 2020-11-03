<?php

namespace App\Models;

use Carbon\Carbon;
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
        return $this->belongsToMany(Passenger::class)->withTimestamps();
    }

    public function hotel(){
        return $this->belongsTo(Hotel::class);
    }

    public function tourAdmin(){
        return $this->belongsTo(TourAdmin::class);
    }

    public function prettyPrice(){
        $price = chunk_split(strval($this->price), 3, ',');
        $pretty = '';
        for ($i = 0; $i < strlen($price)-1; $i++){
            $pretty .= $price[$i];
        }
        return "$ ".$pretty;
    }

    public function hasCapacity(){
        return (($this->total_num - $this->filled_num)> 0) ? true : false;
    }

    public function addToDate($duration){
        $date = Carbon::createFromFormat('Y-m-d', $this->start_at);
        $date = $date->addDays(2)->format('Y-m-d');
        return $date;
    }

    public function   makeReservation(User $user){
        $user->passenger->tours()->attach($this['id']);
        $this->filled_num += 1;
        $this->save();
    }
}
