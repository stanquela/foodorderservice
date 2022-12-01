<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    
    //Relationship method with meals.    
    public function meals()
    {
        return $this->belongsTo(Meal::class, 'meal_id');
    }

    //Relationship method with orders.    
    public function orders()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
