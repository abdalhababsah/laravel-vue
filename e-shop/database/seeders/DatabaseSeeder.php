<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            BrandsTableSeeder::class,
            CategoriesTableSeeder::class,
            UsersTableSeeder::class,
            ProductsTableSeeder::class,
            OrdersTableSeeder::class,
            PaymentsTableSeeder::class,
            ProductImagesTableSeeder::class,
            UserAddressesTableSeeder::class,
            OrderItemsTableSeeder::class,
            CartItemsTableSeeder::class,
        ]);
    }
}
