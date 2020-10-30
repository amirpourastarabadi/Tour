<?php

namespace Database\Factories;

use App\Models\Hotel;
use App\Models\Tour;
use App\Models\TourAdmin;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Collection;

class TourFactory extends Factory
{
    protected $model = Tour::class;
    private $tourAdmins;
    private $hotels;

    public function __construct($count = null, ?Collection $states = null, ?Collection $has = null, ?Collection $for = null, ?Collection $afterMaking = null, ?Collection $afterCreating = null, $connection = null)
    {
        parent::__construct($count, $states, $has, $for, $afterMaking, $afterCreating, $connection);
        $this->tourAdmins = TourAdmin::count();
        $this->hotels = Hotel::count();
    }

    public function definition()
    {
        return [
            'hotel_id' => rand(1, $this->hotels),
            'tour_admin_id' => rand(1, $this->tourAdmins),
            'origin' => $this->faker->city,
            'destination' => $this->faker->city,
            'start_at' => $this->faker->date(),
            'duration' => rand(1,7),
            'total_num' => $total = rand(10,30),
            'filled_num' => rand(0,$total),
            'price' => $this->faker->randomNumber(6),
            'marriage_certificates' => array_rand([true, false]),
            'personal_certificates' => array_rand([true, false]),

        ];
    }
}
