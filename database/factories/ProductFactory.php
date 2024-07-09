<?php

namespace Database\Factories;

use Domain\Catalog\Models\Brand;
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
            'title'    => ucfirst($this->faker->words(2, true)),
            'price'    => $this->faker->numberBetween(10000, 1000000),
            'quantity' => $this->faker->numberBetween(0, 20),
        ];
    }

}
