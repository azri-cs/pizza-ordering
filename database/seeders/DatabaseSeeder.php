<?php

namespace Database\Seeders;

use App\Models\PizzaSize;
use App\Models\Topping;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
        ]);

        // Seed pizza sizes
        PizzaSize::create(['name' => 'Small', 'price' => 15]);
        PizzaSize::create(['name' => 'Medium', 'price' => 22]);
        PizzaSize::create(['name' => 'Large', 'price' => 30]);

        // Seed toppings
        Topping::create(['name' => 'Pepperoni (Small)', 'price' => 3]);
        Topping::create(['name' => 'Pepperoni (Medium)', 'price' => 5]);
        Topping::create(['name' => 'Extra Cheese', 'price' => 6]);
    }
}
