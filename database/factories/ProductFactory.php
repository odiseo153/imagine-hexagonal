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
            'cost_price' => $this->faker->randomFloat(2, 1, 1000),
            'sale_price' => $this->faker->randomFloat(2, 1, 1000),
            'filled_weight' => $this->faker->randomFloat(2, 1, 1000),
            'empty_weight' => $this->faker->randomFloat(2, 1, 1000),
            'can_sell_in_vip' => $this->faker->boolean,
            'can_sell_in_gate' => $this->faker->boolean,
            'size_id' => \App\Models\Size::factory(),
            'category_id' => \App\Models\Category::factory(),
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
