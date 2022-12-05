<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    //Relationship method for Meal model;    
    public function meals()
    {
        return $this->hasMany(Meal::class);        
    }
    
    //Relationship method for User model - in case user is part of the STAFF;
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
