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
        $orders['data'] = Order::all(); 
        return view('order/orders', compact('orders'));   
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

        Session::flash('message', 'You successfully made an order! ID of your order is: $order_id');

        return redirect()->back();
    }

    public function showOrder(){
        //
    }
}
