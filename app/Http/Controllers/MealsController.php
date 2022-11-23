<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meal;
use App\Models\Restaurant;
use App\Models\Cart;
use Session;

class MealsController extends Controller
{
	//Listing all meals. They should be displayed on a single-restaurant page. For now, they will be all displayed on a single page, not sorted by restaurants. To be edited!!!
    public function listMeals(){
		$meal['data'] = Meal::all();
        $restaurants = Restaurant::all();
        return view('meal/meals', compact('meal'))->with('restaurants', $restaurants);
    }

	//Add a meal to the DB. ADMIN ONLY.
	public function addMeal(){
        $restaurants = Restaurant::all();	
        return view('meal/add_meal')->with('restaurants', $restaurants);
	}

	//Save added meal to the DB. ADMIN ONLY. (For now, restaurant manager should also be able to add meal)
	public function saveMeal(Request $request){

		$restaurant_id = $request['restaurant_id'];
		$name = $request['name'];
		$description = $request['description'];
		
		$meal = new Meal();

		$meal->restaurant_id = $restaurant_id;
		$meal->name = $name;
		$meal->description = $description;

		$meal->save();
		
		Session::flash("message", "Congrats, successfully added a new meal!");
		return redirect()->back();
	}

	//Display a single meal page.
	public function showMeal($id){
		$data = Meal::find($id);
        $restaurant = $data->restaurants->name;
		return view('meal/single_meal')->with('data', $data)->with('restaurant', $restaurant);
	}

	
	//Edit data of a meal in DB. ADMIN ONLY.
	public function editMeal($id){
		$data = Meal::find($id);
        $restaurants = Restaurant::all();
		return view('meal/edit_meal')->with('data', $data)->with('restaurants', $restaurants);
	}

	//Save edited data of a meal in DB. ADMIN ONLY.
	public function saveEditMeal($id, Request $request){

		$restaurant_id = $request['restaurant_id'];
		$name = $request['name'];
		$description = $request['description'];
		
		$meal = Meal::find($id);

		$meal->restaurant_id = $restaurant_id;
		$meal->name = $name;
		$meal->description = $description;

		$meal->save();
		
		Session::flash("message", "Congrats, successfully edited a meal!");
		return redirect()->back();
	}

	//Delete a restaurant from the DB. ADMIN ONLY.
	public function deleteMeal($id){
		$data = Meal::find($id);
		$data->delete();

		Session::flash('message', 'You just deleted a meal from the DB!');
		return redirect()->route('meals');
	}
}
