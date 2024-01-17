<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BranchOutletFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array{
    return [
        'outlet_id' => $this->faker->numberBetween(1, 5),
        'branch_name' => $this->faker->randomElement(['Ottokoppi', 'Nyedots', 'Dapue Kopi', 'Cafe Dari Sini', 'Lamak']),
        'telp_number' => $this->faker->phoneNumber(),
        'address' => $this->faker->address(),
    ];
    }
}
