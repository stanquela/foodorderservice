<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RestaurantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Populate DB table restaurants with dummy data;
        for ($i=0; $i<10; $i++) {
          DB::table('restaurants')->insert([
            'name' => Str::random(7),
            'description' => Str::random(20),
            'email' => Str::random(10).'@mail.com',
            'address' => Str::random(10),
            'phone' => mt_rand(1000000,9999999),
          ]);
        };
    }
}
