<?php

namespace Database\Factories;

use App\Models\TourAdmin;
use Illuminate\Database\Eloquent\Factories\Factory;

class TourAdminFactory extends Factory
{

    protected $model = TourAdmin::class;


    public function definition()
    {
        return [
            'agency' => $this->faker->company,
            'start_at' => $this->faker->date(),
            'guild_code' => $this->faker->randomNumber(8),
            'email' => $this->faker->companyEmail,
            'telephone_number' => $this->faker->randomNumber(8),
        ];
    }
}
