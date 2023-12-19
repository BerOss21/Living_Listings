<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'beds'=>fake()->numberBetween(0,10),
            'baths'=>fake()->numberBetween(0,10),
            'area'=>fake()->numberBetween(30,200),
            'city'=>fake()->city,
            'code'=>fake()->countryCode,
            'street'=>fake()->streetName(),
            'street_nr'=>fake()->numberBetween(30,2000),
            'price'=>fake()->numberBetween(30000,5000000),
            'user_id'=>User::factory()
        ];
    }
}
