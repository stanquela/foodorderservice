<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;
    
    //Relationship method for Restaurant model
    public function restaurants()
    {
        return $this->belongsTo(Restaurant::class, 'restaurant_id');    
    }

    //Relationship method for Cart model
    public function carts()
    {
        return $this->hasMany(Cart::class);   
    }
}
