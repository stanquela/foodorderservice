<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MealsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Make dummy data for meals
        for ($i=0; $i<20; $i++) {
            DB::table('meals')->insert([
                'name' => Str::random(7),
                'description' => Str::random(10),
                'restaurant_id' => mt_rand(1,10),
            ]);
        }
    }
}
