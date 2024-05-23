<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'customer_id'=>\App\Models\Customer::factory(),

            'product_id' => Product::factory(),
            'customer_id' => Customer::factory(),
            'date' => $this->faker->dateTime(),
            'total' => $this->faker->randomFloat(2, 10, 1000),
            'status' => '1',
            'registerby' => $this->faker->name(),
        ];
    }
}
