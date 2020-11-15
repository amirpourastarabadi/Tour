<?php

namespace Database\Seeders;

use App\Models\Passenger;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PassengerSeeder extends Seeder
{

    public function run()
    {
        $users = User::where('role', 'passenger')->get();
        foreach ($users as $user){
            $user->passenger()->create(Passenger::factory()->make()->toArray());
        }
    }
}



