<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array{
    return [
        'reserve_date' => $this->faker->date('Y-m-d'), // Add this line for the reserve_date field
        'reserve_time' => $this->faker->time('H:i'),
        'num_visitors' => $this->faker->numberBetween(1, 10),
        'meja_id' => $this->faker->numberBetween(1,5),
        'branch_id' => $this->faker->numberBetween(1, 5),
        'customer_id' => $this->faker->numberBetween(1, 5),
    ];
    }
}
