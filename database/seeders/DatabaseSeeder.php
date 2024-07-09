<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\CategoryFactory;
use Database\Factories\ProductFactory;
use Database\Factories\PropertyFactory;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $properties = PropertyFactory::new()
            ->count(10)
            ->create();

        $products = ProductFactory::new()->count(120)
            ->create();

        foreach ($products as $product) {
            foreach ($properties as $property) {
                $product->properties()->attach($property->id, [
                    'value' => fake()->word(),
                ]);
            }
        }

        // User::factory(10)->create();

        User::factory()->create([
            'name'  => 'Test User',
            'email' => 'test@example.com',
        ]);
    }

}
