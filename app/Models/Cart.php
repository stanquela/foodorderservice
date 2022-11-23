<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    //Relationship method with users.    
    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }
    
    //Relationship method with meals.    
    public function meals(){
        return $this->belongsTo(Meal::class, 'meal_id');
    }
}
