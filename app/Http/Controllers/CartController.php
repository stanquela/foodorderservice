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
        if (Auth::check()) {  
            $user_id = Auth::id(); //Get the id of logged user.        
            $user_name = Auth::user()->name;
            $user_cart = Cart::where('user_id', $user_id)->get();       
            
            $total_price = 0;
            foreach($user_cart as $cart_item)
            {
                $total_price += $cart_item->meals->price * $cart_item->quantity;    
            }
            
            return view('cart/cart')->with('user_id', $user_id)->with('user_cart', $user_cart)->with('total_price', $total_price)->with('user_name', $user_name);
        }
        else{
            return redirect()->route('home');                        
        } 
    }    

    //Add chosen product to cart, with quantity.
    public function addToCart($id, Request $request){
        //Check to see if user is logged. If not, send the to login page.
        if (Auth::check()) {        
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
        else{
            return redirect()->route('home');                        
        } 
    }
    
    //Delete product from cart.
    public function deleteFromCart($id){
        $cart_id = Cart::find($id);
        $cart_id->delete();

		Session::flash('message', 'You just deleted an item (items) from your cart!');
		return redirect()->route('showCart');
    }
}
