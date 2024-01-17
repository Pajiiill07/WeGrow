<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array{
    return [
        'reserve_id' => $this->faker->numberBetween(1, 5),
        'amount' => $this->faker->randomFloat(2, 0, 1000), // Adjust the range as needed
        'payment_methode' => $this->faker->randomElement(['bank transfer','Dana','OVO','Gopay','LinkAja']),
        'payment_date' => $this->faker->date('Y-m-d'),
        'status' => $this->faker->sentence($this->faker->numberBetween(1, 2)),
    ];
    }
}
