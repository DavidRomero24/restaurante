<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>$this->faker->name,
            'identification_document' => $this->faker->randomNumber(4),
            'address'=>$this->faker->address,
            'phone_number'=>$this->faker->phoneNumber,
            'email'=>$this->faker->email,
            'image' => $this->faker->imageUrl(),
        ];
    }
}
