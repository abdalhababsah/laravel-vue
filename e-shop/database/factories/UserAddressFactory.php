<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserAddressFactory extends Factory
{
    protected $model = UserAddress::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'type' => $this->faker->word(), // Random word for address type
            'address1' => $this->faker->streetAddress(), // Random street address
            'address2' => $this->faker->optional()->secondaryAddress(), // Optional secondary address
            'city' => $this->faker->city(), // Random city
            'state' => $this->faker->optional()->state(), // Optional state
            'zipcode' => $this->faker->postcode(), // Random postcode
            'isMain' => $this->faker->boolean(80), // 80% chance of being true
            'country_code' => $this->faker->countryCode(), // Random country code
            'user_id' => User::factory(), // Assumes you have a User factory
        ];
    }
}
