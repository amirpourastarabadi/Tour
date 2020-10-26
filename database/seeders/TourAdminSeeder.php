<?php

namespace Database\Seeders;

use App\Models\TourAdmin;
use App\Models\User;
use Illuminate\Database\Seeder;

class TourAdminSeeder extends Seeder
{
    public function run()
    {
        $users = User::where('role', 'tourAdmin')->get();
        foreach ($users as $user){
            $user->tourAdmin()->create(TourAdmin::factory()->make()->toArray());
        }
    }
}
