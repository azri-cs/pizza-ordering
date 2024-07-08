# Pizza Order Application

This Laravel application allows users to create and manage pizza orders with customizable sizes and toppings.

## Features

- User authentication
- Pizza size selection
- Topping customization
- Dynamic price calculation
- Order creation and management
- Order summary and bill generation

## Installation

1. Clone the repository:
   ```
   git clone https://github.com/azri-cs/pizza-ordering.git
   ```

2. Navigate to the project directory:
   ```
   cd pizza-ordering
   ```

3. Install dependencies:
   ```
   composer install
   npm install
   ```

4. Copy the `.env.example` file to `.env` and configure your database settings.

5. Generate an application key:
   ```
   php artisan key:generate
   ```

6. Run database migrations and seeders:
   ```
   php artisan migrate --seed
   ```

7. Compile assets:
   ```
   npm run dev
   ```

8. Start the development server:
   ```
   php artisan serve
   ```

## Usage

1. Register a new user account or login with existing credentials.
2. Navigate to the "Create Order" page.
3. Select a pizza size from the dropdown menu.
4. Choose desired toppings by checking the corresponding boxes.
5. The total price will update dynamically as you make selections.
6. Submit the order to create a new pizza order.
7. View the order summary and bill on the order details page.

## Database Structure

The application uses the following database tables:

- `users`: Stores user information
- `pizza_sizes`: Contains available pizza sizes and their base prices
- `toppings`: Stores available toppings and their prices
- `orders`: Manages order information including user, pizza size, and total price
- `order_toppings`: Pivot table for managing toppings associated with each order

## Technologies Used

- Laravel 11.x
- MySQL
- Tailwind CSS

## Contributing

Contributions is closed.

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
