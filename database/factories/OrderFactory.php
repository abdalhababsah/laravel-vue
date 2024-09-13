<?php
namespace Database\Factories;

use App\Models\Order;
use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(), // Assumes you have a User factory
            'total_price' => $this->faker->randomFloat(2, 20, 500), // Random total amount between 20 and 500
            'status' => $this->faker->randomElement(['pending', 'completed', 'shipped', 'active']),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'), // Random date within the past year
            'session_id' => $this->faker->uuid(), // Generate a random UUID
            'user_address_id' => $this->faker->numberBetween(1, 10),
            'created_by' => User::factory(), // Assumes you have a User factory
            'updated_by' => User::factory(), // Assumes you have a User factory
        ];
    }
}
