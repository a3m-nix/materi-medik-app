<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pasien>
 */
class PasienFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'no_pasien' => fake()->unique()->randomNumber(8),
            'nama' => fake()->name,
            'jenis_kelamin' => fake()->randomElement(['laki-laki', 'perempuan']),
            'umur' => fake()->numberBetween(20, 25),
            'alamat' => fake()->address,
        ];
    }
}
