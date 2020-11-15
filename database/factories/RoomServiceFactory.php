<?php

namespace Database\Factories;

use App\Models\RoomServices;
use App\Models\Tour;
use App\Models\TourAdmin;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Collection;

class RoomServiceFactory extends Factory
{

    protected $model = RoomServices::class;
    private $tours;

    public function __construct($count = null, ?Collection $states = null, ?Collection $has = null, ?Collection $for = null, ?Collection $afterMaking = null, ?Collection $afterCreating = null, $connection = null)
    {
        $this->tours = Tour::all()->pluck('id');

    }

    public function definition()
    {

        return [
            'tour_id' => array_rand($this->tours->toArray()),
            'beds' => rand(1, 10),
            'room_type' => $this->faker->sentence(2),
            'room_service' => $this->faker->sentence(10),
            'room_service_price' => $this->faker->randomNumber(3)
        ];
    }
}
