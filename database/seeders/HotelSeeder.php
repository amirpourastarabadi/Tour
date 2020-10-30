<?php

namespace Database\Seeders;

use App\Models\Hotel;
use App\Models\TourAdmin;
use Illuminate\Database\Seeder;

class HotelSeeder extends Seeder
{
    public function run()
    {
        Hotel::factory(10)->create();
    }
}
