<?php

namespace Database\Seeders;

use App\Models\Color;
use App\Models\Product;
use App\Models\ProductColor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Seed product colors for each product and color
        $products = Product::all();
        $colors = Color::all();

        foreach ($products as $product) {
            foreach ($colors as $color) {
                ProductColor::factory()->create([
                    'product_id' => $product->id,
                    'color_id' => $color->id,
                ]);
            }
        }
    }
}
