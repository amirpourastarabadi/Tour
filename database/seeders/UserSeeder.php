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
            'role' => 'super_admin',
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
            'first_name' => 'admin1',
            'last_name' => 'admin1',
            'mobile_number'=> '22221',
            'role' => 'admin',
            'password' => Hash::make('123456'),
        ]);
        User::create([
            'first_name' => 'admin2',
            'last_name' => 'admin2',
            'mobile_number'=> '22222',
            'role' => 'admin',
            'password' => Hash::make('123456'),
        ]);
        User::create([
            'first_name' => 'admin3',
            'last_name' => 'admin3',
            'mobile_number'=> '22223',
            'role' => 'admin',
            'password' => Hash::make('123456'),
        ]);
        User::create([
            'first_name' => 'admin4',
            'last_name' => 'admin4',
            'mobile_number'=> '22224',
            'role' => 'admin',
            'password' => Hash::make('123456'),
        ]);
        User::create([
            'first_name' => 'admin5',
            'last_name' => 'admin5',
            'mobile_number'=> '22225',
            'role' => 'admin',
            'password' => Hash::make('123456'),
        ]);
        User::create([
            'first_name' => 'admin6',
            'last_name' => 'admin6',
            'mobile_number'=> '22226',
            'role' => 'admin',
            'password' => Hash::make('123456'),
        ]);
        User::create([
            'first_name' => 'admin7',
            'last_name' => 'admin7',
            'mobile_number'=> '22227',
            'role' => 'admin',
            'password' => Hash::make('123456'),
        ]);
        User::create([
            'first_name' => 'admin8',
            'last_name' => 'admin8',
            'mobile_number'=> '22228',
            'role' => 'admin',
            'password' => Hash::make('123456'),
        ]);
        User::create([
            'first_name' => 'admin9',
            'last_name' => 'admin9',
            'mobile_number'=> '22229',
            'role' => 'admin',
            'password' => Hash::make('123456'),
        ]);
        User::create([
            'first_name' => 'admin10',
            'last_name' => 'admin10',
            'mobile_number'=> '222210',
            'role' => 'admin',
            'password' => Hash::make('123456'),
        ]);
        User::create([
            'first_name' => 'tour_admin',
            'last_name' => 'tour_admin',
            'mobile_number'=> '3333',
            'role' => 'tour_admin',
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
