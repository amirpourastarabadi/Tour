<?php

namespace Database\Seeders;

use App\Models\Passenger;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PassengerSeeder extends Seeder
{

    public function run()
    {
        $faker = Factory::create();
        for ($i = 0; $i <= 20; $i++) {
            Passenger::create([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'national_code' => Str::random(10),
                'birthday' => $faker->date(),
                'email' => $faker->email,
                'mobile_number' => '0912345678'. "$i",
                'password' => Hash::make('111111')
            ]);
        }
    }
}
