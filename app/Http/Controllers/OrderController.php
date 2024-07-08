<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Models\Order;
use App\Models\OrderTopping;
use App\Models\PizzaSize;
use App\Models\Topping;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pizza_sizes = PizzaSize::all();
        $toppings = Topping::all();

        return view('order.create', [
            'pizza_sizes' => $pizza_sizes,
            'toppings' => $toppings,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        $order = Order::create([
            'user_id' => $request->get('user_id'),
            'pizza_size_id' => $request->get('pizza_size_id'),
            'total_price' => $request->get('total_price'),
        ]);

        foreach ($request->get('toppings') as $topping) {
            $toppings[] = OrderTopping::create([
                'order_id' => $order->id,
                'topping_id' => $topping,
            ]);
        }

        if ($order && $toppings) {
            return view('bill.index', [
                'order' => $order,
            ]);
        }

        return to_route('welcome')->with('error', __('Something went wrong. Please try again.'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
