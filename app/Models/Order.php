<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'pizza_size_id', 'total_price'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pizzaSize()
    {
        return $this->belongsTo(PizzaSize::class);
    }

    public function toppings()
    {
        return $this->belongsToMany(Topping::class, 'order_toppings');
    }
}
