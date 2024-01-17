<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DeskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        return [
            'no_desk' => $this->faker->bothify('D###'),
            'capacity' => $this->faker->randomNumber(), // Change 'amount()' to 'randomNumber()'
            'lokasi_meja' => $this->faker->randomElement(['outdoor', 'indoor']),
            'file_upload' => $this->faker->randomElement(['ini.jpg', 'indoor.png', 'jsdjks.jpg', 'hs.png', 'jsbs.png']),
            'branch_id' => $this->faker->numberBetween(1, 5),
        ];
    }    
}
