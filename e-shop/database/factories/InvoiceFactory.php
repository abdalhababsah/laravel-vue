<?php
namespace Database\Factories;

use App\Models\Invoice;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceFactory extends Factory
{
    protected $model = Invoice::class;

    public function definition()
    {
        return [
            'order_id' => Order::factory(), // Assumes you have an Order factory
            'amount' => $this->faker->randomFloat(2, 10, 1000), // Random amount between 10 and 1000
            'status' => $this->faker->randomElement(['pending', 'paid', 'canceled']),
            'issued_at' => $this->faker->dateTimeBetween('-1 year', 'now'), // Random date within the past year
        ];
    }
}
