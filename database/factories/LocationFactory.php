<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Location>
 */
class LocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $types = [
            'general',
            'puerta',
            'office',
            'barra',

        ];
        return [
            'type' => $types[array_rand($types)],
            'name' => $this->faker->company, // Random name for default
            'user_id' => User::factory(),
            'user_in_charge_id' => User::factory(),
        ];
    }
}
