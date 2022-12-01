<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;


    //Relationship method with users.    
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    //Relationship method for Cart model
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);   
    }
}
