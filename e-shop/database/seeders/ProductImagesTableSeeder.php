<?php

namespace Database\Seeders;

use App\Models\ProductImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductImage::insert([
            ['image' => 'image1.jpg', 'product_id' => 1],
            ['image' => 'image2.jpg', 'product_id' => 2],
        ]);
    }
}
