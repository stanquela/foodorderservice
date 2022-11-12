<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use Session;

class RestaurantsController extends Controller
{
	//Listing all restaurants. They should be displayed on a main page.
    public function listRestaurants(){
		$restaurant['data'] = Restaurant::all();
        return view('restaurant/restaurants', compact('restaurant'));
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
	public function showRestaurant($id){
		$data = Restaurant::find($id);
		$meals = Restaurant::find($id)->meals;
		return view('restaurant/single_restaurant')->with('data', $data)->with('meals', $meals);
	}

	//Edit data of a restaurant in DB. ADMIN ONLY.
	public function editRestaurant($id){
		$data = Restaurant::find($id);

		return view('restaurant/edit_restaurant')->with('data', $data);
	}

	//Save edited data of a restaurant in DB. ADMIN ONLY.
	public function saveEditRestaurant($id, Request $request){

		$name = $request['name'];
		$description = $request['description'];
		$address = $request['address'];
		$email = $request['email'];
		$phone = $request['phone'];

		$restaurant = Restaurant::find($id);

		$restaurant->name = $name;
		$restaurant->description = $description;
		$restaurant->address = $address;
		$restaurant->email = $email;
		$restaurant->phone = $phone;

		$restaurant->save();
		
		Session::flash("message", "Congrats, successfully edited a restaurant!");
		return redirect()->back();
	}

	//Delete a restaurant from the DB. ADMIN ONLY.
	public function deleteRestaurant($id){
		$data = Restaurant::find($id);
		$data->delete();

		Session::flash('message', 'You just deleted a restaurant from the DB!');
		return redirect()->route('restaurants');
	}
}
