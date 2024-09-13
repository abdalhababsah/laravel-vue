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
            ColorSeeder::class, // Assuming colors are independent and may be used in other seeders
            ProductColorSeeder::class, // Depends on ColorSeeder
            UsersTableSeeder::class, // Must be before UserAddressesTableSeeder and OrderSeeder
            UserAddressesTableSeeder::class, // Needs users to be created first
            ProductsTableSeeder::class, // Products might need categories or brands to be present
            ProductImagesTableSeeder::class, // Products should be created before adding images
            OrderSeeder::class, // Depends on UsersTableSeeder and UserAddressesTableSeeder
            OrderItemsTableSeeder::class, // Depends on OrderSeeder and Products
            PaymentsTableSeeder::class, // Payments may depend on Orders
            CartItemsTableSeeder::class, // If it depends on Products or Users, make sure those are seeded first
            InvoiceSeeder::class, // Ensure that Orders and Payments are seeded before invoices
        ]);
    }
}
