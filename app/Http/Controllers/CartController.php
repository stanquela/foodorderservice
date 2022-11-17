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
        $quantity = $request->session()->pull('quantity');
        $meal = $request->session()->pull('meal');
        
        return view('cart/cart')->with('quantity', $quantity)->with('meal',$meal);
    }    

    //Add chosen product to cart, with quantity.
    public function addToCart($id, Request $request){
        $meal = Meal::find($id);
        $quantity = $request['quantity'];
        
        Session::flash("message", "Product added to your cart!");
        Session::put([
                        'meal' => $meal,
                        'quantity' => $quantity,
                    ]);
        return redirect()->route('showCart'); 
    }
    
    //Delete product from cart.
    public function deleteFromCart(){
        //
    }
}
