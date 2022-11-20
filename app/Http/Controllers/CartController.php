<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meal;
use App\Models\Restaurant;
use Session;

class CartController extends Controller
{
    //List items from cart of a current session.
    public function showCart(Request $request){
       
        return view('cart/cart');
    }    

    //Add chosen product to cart, with quantity.
    public function addToCart($id, Request $request){
        $meal = Meal::find($id);
        $quantity = $request['quantity'];
        
        Session::flash("message", "Product added to your cart! ($quantity portions of $meal->name)");

        return redirect()->back(); 
    }
    
    //Delete product from cart.
    public function deleteFromCart(){
        //
    }
}
