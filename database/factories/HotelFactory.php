<?php

namespace Database\Factories;

use App\Models\Hotel;
use Illuminate\Database\Eloquent\Factories\Factory;

class HotelFactory extends Factory
{

    protected $model = Hotel::class;

    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'address' => $this->faker->address,
            'phone_number' => $this->faker->unique()->e164PhoneNumber,
            'stars' => rand(1, 5),
            'image' => $this->faker->imageUrl(),
        ];
    }
}
