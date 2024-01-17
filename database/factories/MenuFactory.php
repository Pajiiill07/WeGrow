<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array{
    return [
        'menu_name' => $this->faker->word(),
        'description' => $this->faker->text(100), // Adjust the length as needed
        'price' => $this->faker->randomFloat(2, 1, 100),
        'branch_id' => $this->faker->numberBetween(1, 5),
    ];
    }
}
