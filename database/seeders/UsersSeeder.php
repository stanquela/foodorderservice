<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create users: one admin, one restaurant staff, one client;
         DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('admin'),
            'role' => '2',
            'address' => 'Admin address',
            'phone' => mt_rand(1000000,9999999),
            'restaurant_id' => NULL,
          ]);
         DB::table('users')->insert([
            'name' => 'staff',
            'email' => 'staff@mail.com',
            'password' => Hash::make('staff'),
            'role' => '1',
            'address' => 'Staff address',
            'phone' => mt_rand(1000000,9999999),
            'restaurant_id' => '1',
          ]);
         DB::table('users')->insert([
            'name' => 'client',
            'email' => 'client@mail.com',
            'password' => Hash::make('client'),
            'role' => '0',
            'address' => 'Client address',
            'phone' => mt_rand(1000000,9999999),
            'restaurant_id' => NULL,
          ]);
    }
}
