<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Order::insert([
            [
                'total_price' => 199.99,
                'status' => 'pending',
                'session_id' => 'session123',
                'user_address_id' => 1, // Ensure this matches an existing user address ID
                'created_by' => 1, // Ensure this matches an existing user ID
                'updated_by' => 1, // Ensure this matches an existing user ID
            ],

            [
                'total_price' => 299.99,
                'status' => 'completed',
                'session_id' => 'session1234',
                'user_address_id' => 2, // Ensure this matches an existing user address ID
                'created_by' => 2, // Ensure this matches an existing user ID
                'updated_by' => 2, // Ensure this matches an existing user ID
            ],
        ]);
    }
}
