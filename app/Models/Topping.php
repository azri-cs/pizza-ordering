<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topping extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price'];

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_toppings');
    }
}
