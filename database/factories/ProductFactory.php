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
            'name' => $this->faker->name,
            'description' => $this->faker->sentence,
            'image' => $this->faker->imageUrl(),//Genera una url aleatoria para una imagen
            'price' => $this->faker->randomFloat(2, 0, 1000),
            'expiration_date' => $this->faker->date(),
            'amount' => $this->faker->randomNumber(2),
        ];
    }
}
