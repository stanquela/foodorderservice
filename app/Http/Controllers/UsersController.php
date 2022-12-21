<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
	//Listing all users. Only admin should see that.
    public function listUsers(){
		$user['data'] = User::all();
        return view('user/users', compact('user'));
    }

	//Add a user to the DB. ADMIN ONLY.
	public function addUser(){
		return view('user/add_user');
	}

	//Save added user to the DB. ADMIN ONLY.
	public function saveUser(Request $request){

        $name = $request['name'];
		$email = $request['email'];
		$phone = $request['phone'];
        $address = $request['address'];
        $restaurant_id = $request['restaurant_id'];
        $role = $request['role'];
        $password = $request['password'];


		$user = new User();

		$user->name = $name;
		$user->email = $email;
        $user->phone = $phone;
		$user->address = $address;
		$user->restaurant_id = $restaurant_id;
        $user->role = $role;
        $user->password = Hash::make($password);		

		$user->save();
		
		Session::flash("message", "Congrats, successfully added a new user!");
		return redirect()->back();
	}

	//Display a single restaurant page.
	/*public function showRestaurant($id){
		$data = Restaurant::find($id);
		$meals = Restaurant::find($id)->meals;
		return view('restaurant/single_restaurant')->with('data', $data)->with('meals', $meals);
	}*/

	//Edit data of a user in DB. ADMIN ONLY.
	public function editUser($id){
		$data = User::find($id);

		return view('user/edit_user')->with('data', $data);
	}

	//Save edited data of a user in DB. ADMIN ONLY.
	public function saveEditUser($id, Request $request){

        $name = $request['name'];
		$email = $request['email'];
		$phone = $request['phone'];
        $address = $request['address'];
        $restaurant_id = $request['restaurant_id'];
        $role = $request['role'];
        $password = $request['password'];

		$user = User::find($id);

        $user->name = $name;
		$user->email = $email;
        $user->phone = $phone;
		$user->address = $address;
		$user->restaurant_id = $restaurant_id;
        $user->role = $role;
        $user->password = Hash::make($password);

		$user->save();
		
		Session::flash("message", "Congrats, successfully edited user info!");
		return redirect()->back();
	}

	//Delete a restaurant from the DB. ADMIN ONLY.
	public function deleteUser($id){
		$data = User::find($id);
		$data->delete();

		Session::flash('message', 'You just deleted a user from the DB!');
		return redirect()->route('users');
	}

}
