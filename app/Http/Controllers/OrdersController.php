<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meal;
use App\Models\Restaurant;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Session;
use DB;

class OrdersController extends Controller
{
    //List all orders in the view orders. AUTHORISATION LEVELS NEED TO BE CONFIGURED.    
    public function listOrders(){
        //if user is not logged in, redirect them to login page - home.        
        if (!Auth::check()){
            return redirect()->route('home');        
        };
        
        //get the data of the logged user.
        $user = Auth::user();    
      
        //check the role of the user.
        if ($user->role == 2)
        {
            //Admin can overlook all orders and order items.            
            $orders['data'] = Order::all(); 
            $order_items['data'] = OrderItem::all();

            return view('order/orders', compact(['orders','order_items'])); 
        }
        elseif ($user->role == 1) 
        {
           // $order_items_restaurant = array();

            //Staff should see Order items only for meals from it's own restaurant            
            //$orders['data'] = Order::all();
            $orders['data'] = Order::select('orders.*')
                ->join('order_items', 'order_items.order_id', '=', 'orders.id')
                ->join('meals', 'meals.id', '=', 'order_items.meal_id')
                ->join('restaurants', 'restaurants.id', '=', 'meals.restaurant_id') 
                ->where('restaurant_id', $user->restaurant_id) 
                ->get();

            $order_items['data'] = OrderItem::select('order_items.*')
                ->join('meals', 'meals.id', '=', 'order_items.meal_id')
                ->join('restaurants', 'restaurants.id', '=', 'meals.restaurant_id')
                ->where('meals.restaurant_id', $user->restaurant_id)
                ->get();

        
            return view('order/orders', compact(['orders', 'order_items']));
            /*$order_item = OrderItem::find(6);
            
            return "Yes, user(restaurant id) ".$user->restaurant_id." and item/meal/restaurant id: ".$order_item->meals->restaurant_id;*/

        }  
        elseif ($user->role == 0)
        {
            //Client should see only orders that they made            
            $orders['data'] = Order::where('user_id', $user->id)->get();
            //$order_items['data'] = OrderItem::all();
            $order_items['data'] = OrderItem::select('order_items.*')
                ->join('orders', 'orders.id', '=', 'order_items.order_id')
                ->join('users', 'users.id', '=', 'orders.user_id')
                ->where('orders.user_id', $user->id)
                ->get();
            
            return view('order/orders', compact('orders', 'order_items'));
        }
        else 
        {
            return redirect()->route('home');       
        }   
    }

    //Add order method. Unique order id is generated. Items from cart table are stored in order_items table.    
    public function addOrder(Request $request){
        $user_id = Auth::id(); //Get the id of logged user.        
        $user_cart = Cart::where('user_id', $user_id)->get();       
        $total_price = 0;
        foreach($user_cart as $cart_item)
        {
        $total_price += $cart_item->meals->price * $cart_item->quantity;    
        }
        $details = $request['details'];   

        $order = new Order();

        $order->order_id = date('Y-m-d')."-".Str::random(10);
        $order->user_id = $user_id;
        $order->price = $total_price;
        $order->details = $details;
        //$order->status is FALSE by default. When the order is fullfilled, the status value is changed to TRUE by STAFF/ADMIN.

        $order->save();

        //Adding order items to the order_items table
        foreach($user_cart as $cart_item)
        {
            $order_item = new OrderItem();
    
            $order_item->order_id = $order->id;            
            $order_item->meal_id = $cart_item->meal_id;
            $order_item->quantity = $cart_item->quantity;

            $order_item->save();
        }

        Session::flash('message', 'You successfully made an order! ID of your order is: '.$order->order_id);

        return redirect()->back();
    }

    //Show order (single order)    
    public function showOrder(){
        //
    }
    
    //Delete orders.
    public function deleteOrder(){
        //
    }
}
