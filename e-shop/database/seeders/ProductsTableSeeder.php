<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::insert([
            ['title' => 'Product A', 'slug' => 'product-a', 'quantity' => 10, 'price' => 99.99],
            ['title' => 'Product B', 'slug' => 'product-b', 'quantity' => 20, 'price' => 199.99],
        ]);    }
}
