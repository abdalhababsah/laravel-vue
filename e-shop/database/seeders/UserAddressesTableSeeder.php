<?php

namespace Database\Seeders;

use App\Models\UserAddress;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserAddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserAddress::insert([
            ['type' => 'home', 'address1' => '123 Main St', 'city' => 'City A', 'zipcode' => '12345', 'country_code' => 'US', 'user_id' => 1],
            ['type' => 'office', 'address1' => '456 Main St', 'city' => 'City B', 'zipcode' => '67890', 'country_code' => 'US', 'user_id' => 2],
        ]);
    }
}
