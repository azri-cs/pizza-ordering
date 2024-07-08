<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderTopping extends Model
{
    use HasFactory;

    protected $table = 'order_toppings';

    protected $fillable = ['order_id', 'topping_id'];
}
