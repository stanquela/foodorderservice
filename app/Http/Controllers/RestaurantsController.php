<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RestaurantsController extends Controller
{
	//Listing all restaurants. They should be displayed on a main page.
    public function listRestaurants(){
        return view('restaurant/restaurants');
    }

	//Add a restaurant to the DB. ADMIN ONLY.
	public function addRestaurant(){
		//
	}

	//Display a single restaurant page.
	public function showRestaurant(){
		//
	}

	//Edit data of a restaurant in DB. ADMIN ONLY.
	public function editRestaurant(){
		//
	}
	//Delete a restaurant from the DB. ADMIN ONLY.
	public function deleteRestaurant(){
		//
	}
}
