<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meal;
use App\Models\Restaurant;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Session;
use DB;

class CartController extends Controller
{
    //List items from cart of a current session.
    public function showCart(){
        $user_id = Auth::id();
        $meals = DB::table('carts')->where('user_id', $user_id)->get();
        return view('cart/cart')->with('user_id', $user_id)->with('meals', $meals);
    }    

    //Add chosen product to cart, with quantity.
    public function addToCart($id, Request $request){
        $user_id = Auth::id();
        $meal = Meal::find($id);
        $meal_id = $meal->id;
        $quantity = $request['quantity'];
        
        $cart = new Cart();

        $cart->user_id = $user_id;
        $cart->meal_id = $meal_id;
        $cart->quantity = $quantity;
    
        $cart->save();
        
        Session::flash("message", "Product added to your cart! ($quantity portions of $meal->name)");

        return redirect()->back(); 
    }
    
    //Delete product from cart.
    public function deleteFromCart(){
        //
    }
}
