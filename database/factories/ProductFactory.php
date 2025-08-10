<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->words(3, true), // e.g., "Vintage Coffee Mug"
            'description' => $this->faker->paragraph(),
            'price' => $this->faker->randomFloat(2, 50, 500), // ₱50.00 - ₱500.00
            'stock' => $this->faker->numberBetween(0, 100),
            'image' => $this->faker->imageUrl(640, 480, 'product', true), // Fake product image
        ];
    }
}
