<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RestaurantsController extends Controller
{
    public function listRestaurants(){
        return view('restaurant/restaurants');
    }
}
