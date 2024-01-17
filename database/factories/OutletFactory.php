<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OutletFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array{
    return [
        'outlet_name' => $this->faker->randomElement(['Ottokoppi', 'Nyedots', 'Dapue Kopi', 'Cafe Dari Sini', 'Lamak']),
        'file_upload' => $this->faker->randomElement(['ottokopi.png', 'nyedot.png','dapue.png','darisini.png','lamak.png']),
        'telp_number' => $this->faker->phoneNumber(),
        'address' => $this->faker->address(),
    ];
    }

}
