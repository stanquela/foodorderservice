<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use Session;

class RestaurantsController extends Controller
{
	//Listing all restaurants. They should be displayed on a main page.
    public function listRestaurants(){
        return view('restaurant/restaurants');
    }

	//Add a restaurant to the DB. ADMIN ONLY.
	public function addRestaurant(){
		return view('restaurant/add_restaurant');
	}

	//Save added restaurant to the DB. ADMIN ONLY.
	public function saveRestaurant(Request $request){

		$name = $request['name'];
		$description = $request['description'];
		$address = $request['address'];
		$email = $request['email'];
		$phone = $request['phone'];

		$restaurant = new Restaurant();

		$restaurant->name = $name;
		$restaurant->description = $description;
		$restaurant->address = $address;
		$restaurant->email = $email;
		$restaurant->phone = $phone;

		$restaurant->save();
		
		Session::flash("message", "Congrats, successfully added a new restaurant!");
		return redirect()->back();
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
