<?php

namespace Database\Seeders;

use App\Models\OrderItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OrderItem::insert([
            ['order_id' => 1, 'product_id' => 1, 'quantity' => 2, 'unit_price' => 99.99],
            ['order_id' => 2, 'product_id' => 2, 'quantity' => 1, 'unit_price' => 199.99],
        ]);
    }
}
