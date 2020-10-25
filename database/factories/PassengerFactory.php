<?php

namespace Database\Factories;

use App\Models\Passenger;
use Illuminate\Database\Eloquent\Factories\Factory;

class PassengerFactory extends Factory
{
    protected $model = Passenger::class;

    public function definition()
    {
        return [
            'email' => $this->faker->email,
            'telephone_number' => $this->faker->unique()->randomNumber(8),
            'national_code' => $this->faker->unique()->randomNumber(8),
            'birthday' => $this->faker->date(),
        ];
    }
}
