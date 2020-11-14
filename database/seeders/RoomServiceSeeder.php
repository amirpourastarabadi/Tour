<?php

namespace Database\Seeders;

use App\Models\RoomServices;
use App\Models\TourServices;
use Illuminate\Database\Seeder;

class RoomServiceSeeder extends Seeder
{
    public function run()
    {
        RoomServices::factory(150)->create();
    }
}
