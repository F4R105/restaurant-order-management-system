<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'unit_price' => fake()->randomElement([
                fake()->numberBetween(10, 90) * 100,
                (fake()->numberBetween(10, 90) + 100) + 500
            ])
        ];
    }
}
