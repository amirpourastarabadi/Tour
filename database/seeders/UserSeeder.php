<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'first_name' => 'super_admin',
            'last_name' => 'super_admin',
            'mobile_number'=> '1111',
            'role' => 'superAdmin',
            'password' => Hash::make('123456'),
        ]);
        User::create([
            'first_name' => 'admin',
            'last_name' => 'admin',
            'mobile_number'=> '2222',
            'role' => 'admin',
            'password' => Hash::make('123456'),
        ]);
        User::create([
            'first_name' => 'tour_admin',
            'last_name' => 'tour_admin',
            'mobile_number'=> '3333',
            'role' => 'tourAdmin',
            'password' => Hash::make('123456'),
        ]);
        User::create([
            'first_name' => 'customer',
            'last_name' => 'customer',
            'mobile_number'=> '4444',
            'role' => 'customer',
            'password' => Hash::make('123456'),
        ]);

    }
}
