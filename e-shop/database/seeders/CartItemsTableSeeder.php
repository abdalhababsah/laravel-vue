<?php

namespace Database\Seeders;

use App\Models\CartItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CartItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CartItem::insert([
            ['user_id' => 1, 'product_id' => 1, 'quantity' => 1],
            ['user_id' => 2, 'product_id' => 2, 'quantity' => 2],
        ]);
    }
}
