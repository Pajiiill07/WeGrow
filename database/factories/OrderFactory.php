<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array{
    return [
        'reserve_id' => $this->faker->numberBetween(1, 5),
        'menu_id' => $this->faker->numberBetween(1, 5),
        'quantity' => $this->faker->numberBetween(1, 10), // Adjust the range as needed
    ];
    }

}
