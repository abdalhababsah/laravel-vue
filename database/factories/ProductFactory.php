<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
// In ProductFactory.php
// In ProductFactory.php
public function definition()
{
    return [
        'title' => $this->faker->word(),
        'slug' => $this->faker->slug(),
        'quantity' => $this->faker->numberBetween(1, 100),
        'description' => $this->faker->paragraph(),
        'published' => $this->faker->boolean(),
        'in_stock' => $this->faker->boolean(),
        'price' => $this->faker->randomFloat(2, 10, 500),
        'created_by' => \App\Models\User::factory(),
        'updated_by' => \App\Models\User::factory(),
        'deleted_by' => null,
        'brand_id' => Brand::factory(),
        'category_id' => Category::factory(),
        'deleted_at' => null,
        'product_type' => $this->faker->randomElement(['new', 'featured', 'normal']),
    ];
}


}
