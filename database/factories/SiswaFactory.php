<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Siswa>
 */
class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nis' => $this->faker->unique()->numberBetween(1000,9999),
            'nisn' => $this->faker->unique()->numberBetween(1000,9999),
            'nama_lengkap' => $this->faker->name(),
            'gender' => $this->faker->randomElement(['L','P']),
        ];
    }
}
