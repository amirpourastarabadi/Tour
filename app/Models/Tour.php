<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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


    public function passengers()
    {
        return $this->belongsToMany(Passenger::class)->withTimestamps();
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function tourAdmin()
    {
        return $this->belongsTo(TourAdmin::class);
    }

    public function prettyPrice($price)
    {
        $price = chunk_split(strval($price), 3, ',');
        $pretty = '';
        for ($i = 0; $i < strlen($price) - 1; $i++) {
            $pretty .= $price[$i];
        }
        return "$ " . $pretty;
    }

    public function hasCapacity()
    {
        return (($this->total_num - $this->filled_num) > 0) ? true : false;
    }

    public function addToDate($duration)
    {
        $date = Carbon::createFromFormat('Y-m-d', $this->start_at);
        $date = $date->addDays(2)->format('Y-m-d');
        return $date;
    }

    public function makeReservation($passenger, $count)
    {

        if ($item = DB::table('passenger_tour')
            ->where('tour_id', $this['id'])
            ->where('passenger_id', $passenger->id)
            ->first()) {
            DB::table('passenger_tour')
                ->where('tour_id', $this['id'])
                ->where('passenger_id', $passenger->id)
                ->increment('count', $count);
        } else {
            DB::table('passenger_tour')->insert([
                'tour_id' => $this['id'],
                'passenger_id' => $passenger->id,
                'count' => $count,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        $this->filled_num += $count;
        $this->save();

    }

    public function updateCount($passenger, $count)
    {
        $item = DB::table('passenger_tour')
            ->where('tour_id', $this['id'])
            ->where('passenger_id', $passenger->id)
            ->first();
        $this->filled_num -= $item->count;
        $this->filled_num += $count;
        $this->save();

        DB::table('passenger_tour')
            ->where('tour_id', $this['id'])
            ->where('passenger_id', $passenger->id)
            ->decrement('count', $item->count);

        DB::table('passenger_tour')
            ->where('tour_id', $this['id'])
            ->where('passenger_id', $passenger->id)
            ->increment('count', $count);

    }

    public static function search($request)
    {
        $result = Tour::where('origin', request('origin'))
            ->where('destination', request('destination'))
            ->where('start_at', request('start_at'))
            ->where('duration', request('duration'))
            ->get();
        $result = $result->filter(function ($item) {
            return ($item['total_num'] - $item['filled_num']) >= request('count');
        });
        return $result;
    }

    public function tourServices()
    {
        return $this->hasMany(TourServices::class);
    }

    public function roomServices()
    {
        return $this->hasMany(RoomServices::class);
    }

    public function transportationServices()
    {
        return $this->hasMany(TransportationServices::class);
    }

    public function roomService($id){
        return RoomServices::find($id);
    }
    public function transportationService($id){
        return TransportationServices::find($id);
    }
    public function tourServices2($ids){
        return TourServices::find($ids);
    }
}
